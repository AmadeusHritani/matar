<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

class IzettleConnectorCronModuleFrontController extends ModuleFrontController
{
    protected $isAsync = false;
    public function initContent()
    {
        $this->sync();
    }

    protected function mail($message)
    {
        $template_path = _PS_MODULE_DIR_.$this->module->name.DIRECTORY_SEPARATOR.'mails'.DIRECTORY_SEPARATOR;
        $email = Configuration::get(IZETTLECONNECTOR_SYNC_EMAIL);
        if ($email && Validate::isEmail($email)) {
            Mail::Send(
                (int)(Configuration::get('PS_LANG_DEFAULT')),
                'sync_fail',
                $this->module->l('Error while iZettle syncronization'),
                array(
                    '{email}'   => Configuration::get('PS_SHOP_EMAIL'),
                    '{message}' => $message
                ),
                $email,
                null,
                null,
                null,
                null,
                null,
                $template_path
            );
        }
    }

    protected function sync()
    {
        $start = microtime(true);
        if (Configuration::get(IZETTLECONNECTOR_CRON_ALLOW)
            && $this->module->isIzettleConnected()
            && Tools::getValue('token')
            && Tools::getValue('token') == Configuration::get(IZETTLECONNECTOR_CRON_CODE)
        ) {
            $readyTasks = TaskManager::getReadyTasks();
            $discount_counter = count(IzettleHelper::getReadyToSyncDiscounts());
            if ($discount_counter) {
                $discount_task = new IzettleTask();
                $discount_task->id_izettle_task_state = IzettleTask::READY_STATE;
                $discount_task->id_izettle_action_type = IzettleTask::DISCOUNT_ACTION;
                $discount_task->id_izettle_run = 0;
                $discount_task->total_count = $discount_counter;
                $discount_task->save();
                $readyTasks = array_merge($readyTasks, array($discount_task));
            }
            $externalStockSyncTasks = TaskManager::getExternalStockSyncTasks();

            if ($readyTasks || $externalStockSyncTasks/* && !RunManager::getCurrentRunObjects()*/) {
                @ignore_user_abort(1);
                @set_time_limit(0);

                $runs = array();

                foreach ($externalStockSyncTasks as $externalStockSyncTask) {
                    $id_izettle_run = $externalStockSyncTask->id_izettle_run;
                    if ($id_izettle_run && !isset($runs[$id_izettle_run])) {
                        $runs[$id_izettle_run] = new IzettleRun($id_izettle_run);
                    }
                }

                if ($readyTasks) {
                    $run = RunManager::createNewRunObject();
                    $runs[$run->id] = $run;
                }
                $total_processed = 0;
                $errors = '';
                foreach ($runs as $run_id => $run) {
                    $run->active = true;
                    $run->save();
                    $params = json_decode($run->params, true);

                    $max_attempt = 3;

                    for ($i = 0; $i < $max_attempt; $i++) {
                        $total_attempt_processed = 0;
                        try {
                            $is_keep_going = true;
                            $is_error = false;
                            $actions = $run->getActionList();
                            foreach ($actions as $action) {
                                if ($is_error && !$is_keep_going) {
                                    if ($action->getState() == IzettleTask::READY_STATE) {
                                        $action->setState(
                                            IzettleTask::STOPPED_STATE,
                                            0
                                        );
                                    }
                                }
                                if ($is_keep_going) {
                                    $is_keep_going &= $action->run($params);
                                }
                                $total_attempt_processed += $action->getProcessedCount();
                                if ($action->getState() == IzettleTask::ERROR_STATE) {
                                    $is_error = true;
                                    //$is_keep_going = false;
                                }
                                $action->archive();
                            }

                            if ($is_keep_going) {
                                $run->success = true;
                                $run->active = false;
                                $run->save();
                                $total_processed += $total_attempt_processed;
                                break;
                            }
                        } catch (Exception $e) {
                            if ($i == $max_attempt - 1) {
                                $run->active = false;
                                $run->save();
                                $this->mail($e->getMessage());
                                if ($this->isAsync) {
                                    $this->module->logger->error("ID_RUN: $run_id ,".$e->getMessage());
                                }
                                $errors .= $e->getMessage();
                                $errors .= "---------------\n";
                            }
                        }
                    }
                    $run->active = false;
                    $run->save();
                }

                $diff = (microtime(true) - $start);

                $msg = "sync completed – $total_processed change(s) applied, elapsed time: $diff sec\n";

                if ($errors) {
                    $msg .= 'error, see history';
                    $this->mail($msg."\n errors: $errors");
                }

                if ($this->isAsync) {
                    $this->module->logger->info($msg);
                }
                die($msg);
            } else {
                if (!$readyTasks && !$externalStockSyncTasks) {
                    $msg = "no update necessary – all products are up to date";
                    if ($this->isAsync) {
                        $this->module->logger->info($msg);
                    }
                    die($msg);
                }

                $msg = "sync is already running";
                if ($this->isAsync) {
                    $this->module->logger->info($msg);
                }
                die($msg);
            }
        } else {
            $msg = 'sync request is ignored, REMOTE_ADDR:'.$_SERVER['REMOTE_ADDR'];
            $this->module->logger->warning($msg);
            die($msg);
        }
    }
}
