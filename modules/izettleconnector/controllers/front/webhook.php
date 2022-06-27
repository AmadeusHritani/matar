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

include_once dirname(__FILE__) . '/cronasync.php';


class IzettleConnectorWebhookModuleFrontController extends IzettleConnectorCronAsyncModuleFrontController
{
    public function initContent()
    {
        if (Tools::getValue('token')
            && Tools::getValue('token') == Configuration::get(IZETTLECONNECTOR_CRON_CODE)
            && $this->module->isIzettleConnected()
        ) {
            if (!empty($entity_body = Tools::file_get_contents('php://input'))) {
                $received_data =
                    json_decode(
                        $entity_body,
                        false,
                        2
                    );

                $eventName = $received_data->eventName;
                $this->module->logger->info(
                    sprintf(
                        'Wehbook "%s" received.',
                        $eventName
                    )
                );

                $webhook = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'izettle_webhook_subscription`');
                $sha256 =
                    IzettleHelper::customHmac(
                        'sha256',
                        $received_data->timestamp.'.'.$received_data->payload,
                        $webhook['signing_key']
                    );


                if ($_SERVER["HTTP_X_IZETTLE_SIGNATURE"] == $sha256
                    && $received_data->organizationUuid == Configuration::get(IZETTLECONNECTOR_USER_UUID)
                ) {
                    $this->module->logger->debug(
                        sprintf(
                            'Wehbook "%s", payload: %s',
                            $eventName,
                            $received_data->payload
                        )
                    );

                    $payload = json_decode($received_data->payload, true);

                    //PurchaseCreated need to use only for orders sync
                    //InventoryBalanceChanged contains all information about qty

                    if ('PurchaseCreated' == $eventName) {
                        if ($payload && Configuration::get(IZETTLECONNECTOR_USE_PURCHASES)) {
                            $this->preparePurchaseImport($payload);
                            $force = true;
                            $this->module->queueSyncIfNeeded($force);
                        }
                    }

                    if ('InventoryBalanceChanged' == $eventName) {
                        //$preparedData = $this->prepareBalanceChangeData($payload);
                        if ($payload) {
                            //$this->respondOK();//async run
                            //register_shutdown_function(array($this, 'processQtyChanges'), $payload, $eventName);
                            $this->prepareQtyChanges($payload);
                            $force = true;
                            $this->module->queueSyncIfNeeded($force);
                        }
                    }

                    if ('InventoryTrackingStarted' == $eventName) {
                        $productUuid = $payload['productUuid'];
                        if ($productUuid) {
                            $this->processStartTracking($productUuid);
                        }
                    }

                    if ('InventoryTrackingStopped' == $eventName) {
                        $productUuid = $payload['productUuid'];
                        if ($productUuid) {
                            $this->processStopTracking($productUuid);
                        }
                    }
                }

                die(json_encode(array("status" => 'ok')));
            } else {
                die(json_encode(array("status" => 'no_payload')));
            }
        } else {
            die(json_encode(array("status" => 'ignored')));
        }
    }


    /**
     * @param $payload
     * @param $eventName
     * @throws PrestaShopDatabaseException
     * @throws PrestaShopException
     */
    public function prepareQtyChanges($payload)
    {
        if (IzettleHelper::isExternalChangesSource($payload['externalUuid'])) {
            $this->module->logger->info('inventory sync payload was saved in DB');
            $run = new IzettleRun();
            $run->active = false;
            $run->success = false;
            $run->id_izettle_initial_type = IzettleRun::EXTERNAL;
            $run->params = json_encode($payload);
            $run->save();

            $export_stock_task = new IzettleTask();
            $export_stock_task->id_izettle_task_state = IzettleTask::READY_STATE;
            $export_stock_task->id_izettle_action_type = IzettleTask::STOCK_EXPORT_ACTION;
            $export_stock_task->id_izettle_run = $run->id;
            $export_stock_task->save();
        } else {
            $this->module->logger->debug('an internal changes source detected, the webhook is ignored');
        }
//       COMMENTED SINCE ZETTLE SETS 30 SECONDS LIMIT IN WEBHOOK REQUEST
//        $action = ActionFactory::getAction($export_stock_task);
//
//        try {
//            $success = $action->run($payload);
//            if (!$success) {
//                $this->mail("webhook was finished, but returned [false], see log for details");
//            }
//        } catch (Exception $e) {
//            $this->module->logger->info(
//                sprintf(
//                    'Wehbook "%s" Error: %s',
//                    $eventName,
//                    $e->getMessage()
//                )
//            );
//            $this->mail($e->getMessage());
//        } finally {
//            $action->archive();
//        }
//        $this->module->logger->info('inventory sync end');
    }

    private function isStartTraking($payload)
    {
        foreach ($payload['balanceBefore'] as $item) {
            if ((int) $item['balance'] != 0) {
                return false;
            }
        }
        return true;
    }

    private function preparePurchaseData($payload)
    {
        if (!isset($payload['source']) || $payload['source'] != 'POS') {
            return false;
        }

        if (!isset($payload['products']) || count($payload['products']) < 1) {
            return false;
        }

        $refund = false;
        if (isset($payload['refund']) && $payload['refund']) {
            $refund = true;
        }

        $data = array();
        foreach ($payload['products'] as $product) {
            $variant = IzettleVariant::getItemByUuid($product['variantUuid']);
            if (!$variant) {
                continue;
            }

            $config = new IzettleConfiguration($variant->id_product);
            if (!$config->active || $config->id_inventory_sync_policy != IzettleConfiguration::INVENTORY_BOTH_POLICY) {
                continue;
            }
            $data[] = array(
                'id_product'           => $variant->id_product,
                'id_product_attribute' => $variant->id_product_attribute,
                'qty'                  => (int)$product['quantity'],
                'refund'               => $refund,
                'is_purchase'          => true,
            );
        }

        return $data;
    }



//    private function mail($message)
//    {
//        $template_path = _PS_MODULE_DIR_.$this->module->name.DIRECTORY_SEPARATOR.'mails'.DIRECTORY_SEPARATOR;
//        $email = Configuration::get(IZETTLECONNECTOR_SYNC_EMAIL);
//        if ($email && Validate::isEmail($email)) {
//            Mail::Send(
//                (int)(Configuration::get('PS_LANG_DEFAULT')),
//                'sync_fail',
//                $this->module->l('Error while iZettle syncronization'),
//                array(
//                    '{email}'   => Configuration::get('PS_SHOP_EMAIL'),
//                    '{message}' => $message
//                ),
//                $email,
//                null,
//                null,
//                null,
//                null,
//                null,
//                $template_path
//            );
//        }
//    }

    protected function processStartTracking($productUuid)
    {
        $product = IzettleProduct::getItemByUuid($productUuid);
        if (!$product || !IzettleConfiguration::isConfigExist($product->id_product)) {
            return;
        }

        $config = new IzettleConfiguration($product->id_product);
        $config->id_inventory_sync_policy = IzettleConfiguration::INVENTORY_BOTH_POLICY;
        $config->save();

        $data = array('id_product' => $product->id_product);
        $this->module->innerHookUpdateProduct($data, IzettleTask::STOCK_SYNC_ACTION);
    }

    protected function processStopTracking($productUuid)
    {
        $product = IzettleProduct::getItemByUuid($productUuid);
        if (!$product || !IzettleConfiguration::isConfigExist($product->id_product)) {
            return;
        }

        $config = new IzettleConfiguration($product->id_product);
        $config->id_inventory_sync_policy = IzettleConfiguration::INVENTORY_DISABLE_POLICY;
        $config->save();
    }

    private function preparePurchaseImport($payload)
    {
        if (!IzettleHelper::isPurchaseImported($payload['purchaseUuid'])) {
            $message = 'Purchase '.$payload['purchaseUuid'].' payload was saved in DB';
            $this->module->logger->info($message);

            $purchase_task = TaskManager::getActualTask(IzettleTask::PURCHASE_IMPORT_ACTION);
            $purchase = array(
                'undo_json' => json_encode($payload)
            );
            $purchase_task->addProductList(array($purchase));
            $purchase_task->total_count = 1;
            $purchase_task->save();
        } else {
            $message = 'Zettle purchase '.$payload['purchaseUuid'].' already imported, the webhook is ignored';
            $this->module->logger->debug($message);
        }
    }
}
