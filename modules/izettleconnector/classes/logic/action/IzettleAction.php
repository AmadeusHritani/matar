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

abstract class IzettleAction implements ActionInterface
{

    const MAX_DELETE_COUNT = 100;
    const MAX_UPLOAD_COUNT = 300;
    const MAX_IMPORT_COUNT = 2000;

    protected $task;
    protected $module;

    protected $autostate = true;
    protected $undo_active = false;
    protected $is_archived = false;

    /**
     * IzettleAction constructor.
     * @param  $task
     */
    public function __construct($task)
    {
        $this->task = $task;
        $this->module = Module::getInstanceByName(IZETTLECONNECTOR_NAME);
        $this->is_archived = $this->task instanceof IzettleTaskHistory;
    }

    public function run($params = null)
    {
        try {
            ObjectModel::disableCache();
            $this->refreshTask();
            if ($this->task->id_izettle_task_state == IzettleTask::FINISHED_STATE) {
                ObjectModel::enableCache();
                return true;
            }

//            if ($this->task->id_izettle_task_state == IzettleTask::CANCELLED_STATE) {
//                return false;
//            }


            if ($this->autostate) {
                $this->task->id_izettle_task_state = IzettleTask::RUNNING_STATE;
                $this->task->date_start = date('Y-m-d H:i:s');
                $this->task->save();
            }

            $return = $this->runInner($params);

            if ($return && $this->autostate) {
                $this->refreshTask();
                $this->task->id_izettle_task_state = IzettleTask::FINISHED_STATE;
                $this->task->current_info = $this->module->l('Successfully completed');
                $this->task->date_end = date('Y-m-d H:i:s');
                $this->task->save();
            }
            if (!$return && $this->autostate) {
                $this->refreshTask();
                $this->task->id_izettle_task_state = IzettleTask::STOPPED_STATE;
                $this->task->current_info = $this->module->l('The main method returns [false]');
                $this->task->date_end = date('Y-m-d H:i:s');
                $this->task->save();
            }
            ObjectModel::enableCache();

            return $return;
        } catch (Exception $e) {
            $this->refreshTask();
            $this->task->id_izettle_task_state = IzettleTask::ERROR_STATE;
            $msg = $e->getMessage();
            $this->task->current_info =
                $this->task->current_info
                    ? ($this->task->current_info.', Error: '.$msg)
                    : ('Error: '.$msg);
            $this->task->date_end = date('Y-m-d H:i:s');
            $this->task->save();
            ObjectModel::enableCache();
            //throw $e;
            return false;
        }
    }

    public function undo($params = null)
    {
        try {
            ObjectModel::disableCache();
            $this->refreshTask();
            $list = $this->task->getProductList();

            $actual_list = array_filter(
                $list,
                function ($item) {
                    return $item['processed'];
                }
            );


            if (!count($actual_list)) {
                return false;
            }

            $this->undo_active = true;
            if ($this->autostate) {
                $this->task->id_izettle_task_state = IzettleTask::UNDO_RUNNING_STATE;
                $this->task->date_start =  date('Y-m-d H:i:s');
                $this->task->save();
            }

            $return =
                $this->undoInner(
                    $actual_list,
                    $params
                );

            if ($this->autostate) {
                $this->task->id_izettle_task_state = IzettleTask::UNDONE_STATE;
                $this->task->current_info = $this->module->l('Successfully reverted');
                $this->task->date_end =  date('Y-m-d H:i:s');
                $this->task->save();
            }
            ObjectModel::enableCache();
            $this->undo_active = false;

            return $return;
        } catch (Exception $e) {
            $this->refreshTask();
            $this->task->id_izettle_task_state = IzettleTask::ERROR_STATE;
            $this->task->current_info = 'Error: '.$e->getMessage();
            $this->task->date_end =  date('Y-m-d H:i:s');
            $this->task->save();
            ObjectModel::enableCache();
            //throw $e;
            $this->undo_active = false;
            return false;
        }
    }

    public function setState($state_id, $processed_count = null)
    {
        $this->refreshTask();

        switch ($state_id) {
            case IzettleTask::READY_STATE:
                $this->task->id_izettle_task_state = IzettleTask::READY_STATE;
                break;
            case IzettleTask::RUNNING_STATE:
                $this->task->id_izettle_task_state = IzettleTask::RUNNING_STATE;
                break;
            case IzettleTask::RUNNING_ASYNC_STATE:
                $this->task->id_izettle_task_state = IzettleTask::RUNNING_ASYNC_STATE;
                break;
            case IzettleTask::STOPPED_STATE:
                $this->task->date_end = date('Y-m-d H:i:s');
                $this->task->id_izettle_task_state = IzettleTask::STOPPED_STATE;
                break;
            case IzettleTask::CANCELLED_STATE:
                $this->task->date_end = date('Y-m-d H:i:s');
                $this->task->id_izettle_task_state = IzettleTask::CANCELLED_STATE;
                break;
            case IzettleTask::FINISHED_STATE:
                $this->task->id_izettle_task_state = IzettleTask::FINISHED_STATE;
                break;
            case IzettleTask::ERROR_STATE:
                $this->task->date_end = date('Y-m-d H:i:s');
                $this->task->id_izettle_task_state = IzettleTask::ERROR_STATE;
                break;
            case IzettleTask::UNDO_RUNNING_STATE:
                $this->task->id_izettle_task_state = IzettleTask::UNDO_RUNNING_STATE;
                break;
            case IzettleTask::UNDONE_STATE:
                $this->task->id_izettle_task_state = IzettleTask::UNDONE_STATE;
                break;
            default:
                throw new Exception("Unknown state ID");
        }

        if (!is_null($processed_count)) {
            $this->task->processed_count = (int)$processed_count;
        }
        $this->task->save();
    }

    public function getState()
    {
        $this->refreshTask();
        return $this->task->id_izettle_task_state;
    }

    public function archive()
    {
        $sql = 'INSERT INTO `'._DB_PREFIX_.'izettle_task_history`
                SELECT * FROM `'._DB_PREFIX_.'izettle_task`
                WHERE `id_izettle_task` = '.(int)$this->task->id;
        $res = Db::getInstance()->execute($sql);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'izettle_task`
                WHERE `id_izettle_task` = '.(int)$this->task->id;
        $res &= Db::getInstance()->execute($sql);

        $sql = 'INSERT INTO `'._DB_PREFIX_.'izettle_task_product_history`
                SELECT * FROM `'._DB_PREFIX_.'izettle_task_product`
                WHERE `id_izettle_task` = '.(int)$this->task->id;
        $res &= Db::getInstance()->execute($sql);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'izettle_task_product`
                WHERE `id_izettle_task` = '.(int)$this->task->id;
        $res &= Db::getInstance()->execute($sql);

        return $res;
    }

    protected function isKeepGoing()
    {
        $this->refreshTask();
        if ($this->task->id_izettle_task_state == IzettleTask::CANCELLED_STATE) {
            $this->task->current_info = $this->module->l('Pause');
            $this->task->date_end = date('Y-m-d H:i:s');
            $this->task->save();
            $this->autostate = false;
            //stop running if cancelled or stopped
            return false;
        }

        if ($this->task->id_izettle_task_state == IzettleTask::STOPPED_STATE) {
            $this->task->current_info = $this->module->l('Stopping');
            $this->task->date_end = date('Y-m-d H:i:s');
            $this->task->save();
            $this->autostate = false;
            //stop running if cancelled or stopped
            return false;
        }


        return true;
    }

    protected function refreshTask()
    {
        $this->task = $this->task instanceof IzettleTaskHistory
            ? new IzettleTaskHistory($this->task->id)
            : new IzettleTask($this->task->id);
    }

    abstract protected function runInner($params);

    protected function undoInner($actual_list, $params)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        if ($actual_list) {
            $this->module->logger->debug(count($actual_list));
        }
        $this->autostate = false;
        $this->task->id_izettle_task_state = IzettleTask::FINISHED_STATE;
        $this->task->current_info = $this->module->l('Rollback not required for this task');
        $this->task->date_end = date('Y-m-d H:i:s');
        $this->task->save();

        return true;
    }


    protected function bulkProductsImport($data, $processed_counter = 0)
    {
        $productClient = $this->module->getIzettleProductClient();
        $count = count($data);

        $this->refreshTask();
        $this->task->total_count = $count + $processed_counter;
        $this->task->save();

        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }

        $current_max = (int) ($count * 0.2);

        if ($current_max < 1) {
            $current_max = 1;
        }

        if ($current_max > self::MAX_IMPORT_COUNT) {
            $current_max = self::MAX_IMPORT_COUNT;
        }

        $portions = ceil($count / $current_max);
        for ($i = 0; $i < $portions; $i++) {
            //if ($i > 3) throw new Exception('synthetic error');
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }
            $subarray = array_slice(
                $data,
                $i * $current_max,
                $current_max
            );
            $products = array_map(
                function ($v) {
                    return $v['izettle_item'];
                },
                $subarray
            );

            if ($this->bulkProductsImportInner($products, $productClient)) {
                $this->refreshTask();
                $this->task->processed_count = $processed_counter + min(($i + 1) * $current_max, $count);
                $this->task->save();

                $ids = array_map(
                    function ($v) {
                        return $v['id_izettle_task_product'];
                    },
                    $subarray
                );

                if ($this->undo_active) {
                    $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history` SET `undone` = 1
                        where `id_izettle_task_product` in ( '.implode(',', array_map('intval', $ids)).')';
                } else {
                    if ($this->is_archived) {
                        $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history` SET `processed` = 1
                        where `id_izettle_task_product` in ( '.implode(',', array_map('intval', $ids)).')';
                    } else {
                        $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product` SET `processed` = 1
                        where `id_izettle_task_product` in ( '.implode(',', array_map('intval', $ids)).')';
                    }
                }
                Db::getInstance()->execute($sql);
            } else {
                return false;
            }
        }

        $this->refreshTask();
        $this->task->processed_count = $processed_counter + $count;
        $this->task->save();

        return true;
    }

    protected function bulkProductsImportInner($products, $productClient)
    {
        $this->refreshTask();
        $this->task->current_info = $this->module->l('Sending data to iZettle');
        $this->task->save();

        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }

        $uuids = $productClient->importProductsAsync($products);

        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }

        $this->refreshTask();
        $this->task->current_info = $this->module->l('Importing');
        $this->task->save();

        if (count($uuids) < 1) {
            throw new Error('Error while import: no import created after API call');
        }
        $uuid = $uuids[0];//only one import simultaneously available
        $import_data = new IzettleImport();
        $import_data->uuid = $uuid;
        $import_data->active = true;
        $import_data->success = false;
        $import_data->total_count = count($products);
        $import_data->imported_count = 0;
        $import_data->id_izettle_task = $this->task->id;
        $import_data->save();

        $importing = true;
        $counter = 0;
        while ($importing && $counter < 1000) {
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }

            $this->refreshTask();
            $this->task->current_info = $this->module->l('Importing, last refresh').' '.date('H:i:s');
            $this->task->save();

            $importStatus = $productClient->getImportStatus($uuid);
            $info =
                json_decode(
                    $importStatus->getBody(),
                    true
                );
            if (isset($info['errorMessage']) && $info['errorMessage']) {
                throw new Error('Error while import: '.json_encode($info));
            }

            if (isset($info['finished']) && $info['finished']) {
                if (isset($info['items']) && $info['items']) {
                    $import_data->imported_count = (int)$info['items'];
                    $import_data->save();
                }
                $import_data->active = false;
                $import_data->success = true;
                $import_data->save();
                $importing = false;
            }
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }
            $counter++;
        }

        if ($importing) {
            $this->refreshTask();
            $this->setState(IzettleTask::CANCELLED_STATE);
            $this->task->current_info = $this->module->l('Import runs too long');
            $this->task->save();
        }

        return !$importing;
    }


    protected function bulkProductsDelete($products, $processed_counter = 0)
    {
        $productClient = $this->module->getIzettleProductClient();
        $count = count($products);

        $this->refreshTask();
        $this->task->total_count = $processed_counter + $count;
        $this->task->current_info = $this->module->l('Deleting');
        $this->task->save();

        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }

        $current_max = (int) ($count * 0.2);

        if ($current_max < 1) {
            $current_max = 1;
        }

        if ($current_max > self::MAX_DELETE_COUNT) {
            $current_max = self::MAX_DELETE_COUNT;
        }

        $portions = ceil($count / $current_max);
        for ($i = 0; $i < $portions; $i++) {
            //if ($i > 3) throw new Exception('synthetic error');
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }
            $subarray = array_slice(
                $products,
                $i * $current_max,
                $current_max
            );

            //$this->refreshTask();
//            $this->task->prepared_count = $i * $current_max;
            //$this->task->save();

            $productClient->deleteProductBulk($subarray);

            if ($this->undo_active) {
                $product_ids = array_map(
                    function ($v) {
                        return $v['id_product'];
                    },
                    $subarray
                );
                $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history` SET `undone` = 1
                        where id_izettle_task = '.(int) $this->task->id.'
                              AND `id_product` in ( '.implode(',', array_map('intval', $product_ids)).')';
                Db::getInstance()->execute($sql);
            } else {
                $productTaskList = array();
                foreach ($subarray as $deleted_product) {
                    $productTaskItem = array(
                        'processed' => true,
                        'desc'      => pSQL($deleted_product->getName()),
                        'undo_json' => pSQL($deleted_product->getPostBodyData())
                    );
                    $product = IzettleProduct::getItemByUuid($deleted_product->getUuid());
                    if ($product) {
                        $productTaskItem['id_product'] = $product->id_product;
                        $is_config_exist = Db::getInstance()->getRow(
                            'SELECT
                               id_product
                            FROM '._DB_PREFIX_.'izettle_configuration
                            WHERE id_product = '.(int) $product->id_product
                        );


                        if ($is_config_exist) {
                            $config = new IzettleConfiguration($product->id_product);
                            $config->active = false;
                            $config->save();
                        }

                        $product->delete();
                    }
                    $productTaskList[] = $productTaskItem;
                }

                $this->task->addProductList($productTaskList);
            }

            $this->refreshTask();
            $this->task->processed_count = $processed_counter + min(($i + 1) * $current_max, $count);
            $this->task->save();
        }


        $this->refreshTask();
//        $this->task->prepared_count = $count;
        $this->task->processed_count = $processed_counter + $count;
        $this->task->save();

        return true;
    }

    /**
     * @return array
     * @throws PrestaShopDatabaseException
     */
    protected function getImageAssociation()
    {
        $default_lang = Configuration::get('PS_LANG_DEFAULT');
        $context = Context::getContext();
        $query = 'SELECT DISTINCT
                    id_izettle_task_product,
				    processed,
				    id_product,
				    link_rewrite,
				    id_product_attribute,
				    id_image
                from (

                SELECT
				    id_izettle_task_product,
				    processed,
				    id_product,
				    link_rewrite,
				    id_product_attribute,
				    max(id_image) id_image
				FROM (
                    SELECT DISTINCT
                        itp.id_izettle_task_product,
                        itp.processed,
                        pl.link_rewrite,
                        p.id_product,
                        IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
                        IFNULL(product_attribute_image.id_image, IFNULL(i.id_image, 0)) AS id_image
                    FROM `'._DB_PREFIX_.'izettle_task_product` itp
                    LEFT JOIN `'._DB_PREFIX_.'product` p 
                        ON itp.`id_product` = p.`id_product`
                    LEFT JOIN `'._DB_PREFIX_.'product_lang` pl 
                        ON pl.`id_product` = p.`id_product` AND pl.id_lang = '.(int)$default_lang.'
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                        ON i.`id_product` = p.`id_product` AND i.cover = 1
                    LEFT JOIN `'._DB_PREFIX_.'product_shop` product_shop
                        ON product_shop.`id_product` = p.`id_product`
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                        ON (p.`id_product` = product_attribute_shop.`id_product`
                        AND product_attribute_shop.id_shop= '.(int)$context->shop->id.')
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` product_attribute_image
                        ON product_attribute_shop.id_product_attribute = product_attribute_image.id_product_attribute 
                    WHERE product_shop.`id_shop` = '.(int)$context->shop->id.'
                          AND itp.`id_izettle_task` = ('.(int)$this->task->id.')
                    ORDER BY  p.id_product, product_attribute_shop.id_product_attribute
                    ) tmp
 
                GROUP BY id_izettle_task_product, id_product, link_rewrite, id_product_attribute
                UNION ALL
                SELECT
				    id_izettle_task_product,
				    processed,
				    id_product,
				    link_rewrite,
				    id_product_attribute,
				    max(id_image) id_image
				FROM (
                    SELECT DISTINCT
                        itp.id_izettle_task_product,
                        itp.processed,
                        pl.link_rewrite,
                        p.id_product,
                        0 as id_product_attribute,
                        i.id_image AS id_image
                    FROM `'._DB_PREFIX_.'izettle_task_product` itp
                    LEFT JOIN `'._DB_PREFIX_.'product` p 
                        ON itp.`id_product` = p.`id_product`
                    LEFT JOIN `'._DB_PREFIX_.'product_lang` pl 
                        ON pl.`id_product` = p.`id_product` AND pl.id_lang = '.(int)$default_lang.'
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                        ON i.`id_product` = p.`id_product` AND i.cover = 1
                    LEFT JOIN `'._DB_PREFIX_.'product_shop` product_shop
                        ON product_shop.`id_product` = p.`id_product`
                    WHERE product_shop.`id_shop` = '.(int)$context->shop->id.'
                          AND itp.`id_izettle_task` = ('.(int)$this->task->id.')
                    ORDER BY  p.id_product
                    ) tmp
 
                GROUP BY id_izettle_task_product, id_product, link_rewrite, id_product_attribute
                UNION ALL
                SELECT
				    id_izettle_task_product,
				    processed,
				    id_product,
				    link_rewrite,
				    id_product_attribute,
				    max(id_image) id_image
				FROM (
                    SELECT DISTINCT
                        itp.id_izettle_task_product,
                        itp.processed,
                        pl.link_rewrite,
                        p.id_product,
                        IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
                        IFNULL(product_attribute_image.id_image, IFNULL(i.id_image, 0)) AS id_image
                    FROM `'._DB_PREFIX_.'izettle_task_product_history` itp
                    LEFT JOIN `'._DB_PREFIX_.'product` p 
                        ON itp.`id_product` = p.`id_product`
                    LEFT JOIN `'._DB_PREFIX_.'product_lang` pl 
                        ON pl.`id_product` = p.`id_product` AND pl.id_lang = '.(int)$default_lang.'
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                        ON i.`id_product` = p.`id_product` AND i.cover = 1
                    LEFT JOIN `'._DB_PREFIX_.'product_shop` product_shop
                        ON product_shop.`id_product` = p.`id_product`
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
                        ON (p.`id_product` = product_attribute_shop.`id_product`
                        AND product_attribute_shop.id_shop= '.(int)$context->shop->id.')
                    LEFT JOIN `'._DB_PREFIX_.'product_attribute_image` product_attribute_image
                        ON product_attribute_shop.id_product_attribute = product_attribute_image.id_product_attribute 
                    WHERE product_shop.`id_shop` = '.(int)$context->shop->id.'
                          AND itp.`id_izettle_task` = ('.(int)$this->task->id.')
                    ORDER BY  p.id_product, product_attribute_shop.id_product_attribute
                    ) tmp
 
                GROUP BY id_izettle_task_product, id_product, link_rewrite, id_product_attribute
                UNION ALL
                SELECT
				    id_izettle_task_product,
				    processed,
				    id_product,
				    link_rewrite,
				    id_product_attribute,
				    max(id_image) id_image
				FROM (
                    SELECT DISTINCT
                        itp.id_izettle_task_product,
                        itp.processed,
                        pl.link_rewrite,
                        p.id_product,
                        0 AS id_product_attribute,
                        i.id_image AS id_image
                    FROM `'._DB_PREFIX_.'izettle_task_product_history` itp
                    LEFT JOIN `'._DB_PREFIX_.'product` p 
                        ON itp.`id_product` = p.`id_product`
                    LEFT JOIN `'._DB_PREFIX_.'product_lang` pl 
                        ON pl.`id_product` = p.`id_product` AND pl.id_lang = '.(int)$default_lang.'
                    LEFT JOIN `'._DB_PREFIX_.'image` i
                        ON i.`id_product` = p.`id_product` AND i.cover = 1
                    LEFT JOIN `'._DB_PREFIX_.'product_shop` product_shop
                        ON product_shop.`id_product` = p.`id_product`
                    WHERE product_shop.`id_shop` = '.(int)$context->shop->id.'
                          AND itp.`id_izettle_task` = ('.(int)$this->task->id.')
                    ORDER BY  p.id_product
                    ) tmp
 
                GROUP BY id_izettle_task_product, id_product, link_rewrite, id_product_attribute
                ) outer_table';

//        error_log(
//            "\n[".date('d-m-Y h:i:s')."] "
//            .__FILE__.": getImageAssociation, Query:\n"
//            .$query."\n",
//            3,
//            _PS_MODULE_DIR_.'izettleconnector/var/izettle.log'
//        );

        $rows = Db::getInstance()->executeS(
            $query
        );
        return $rows;
    }

    protected function bulkImagesUpload($data, $hash, $processed_counter = 0)
    {
        $count = count($data);
        $imageClient = $this->module->getIzettleImageClient();

        $current_max = (int) ($count * 0.2);

        if ($current_max < 1) {
            $current_max = 1;
        }

        if ($current_max > self::MAX_UPLOAD_COUNT) {
            $current_max = self::MAX_UPLOAD_COUNT;
        }

        $invalid_count = 0;

        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }


        $portions = ceil($count / $current_max);
        for ($i = 0; $i < $portions; $i++) {
            //if ($i > 3) throw new Exception('synthetic error');
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }
            $subarray = array_slice(
                $data,
                $i * $current_max,
                $current_max,
                true
            );

            $invalid_count += $this->bulkImagesUploadInner($subarray, $imageClient, $hash);
            $this->refreshTask();
            $this->task->processed_count = $processed_counter + min(($i + 1) * $current_max, $count);
            $this->task->save();
        }


        if ($invalid_count) {
            $this->autostate = false;
            $this->refreshTask();
            $this->task->id_izettle_task_state = IzettleTask::FINISHED_STATE;
            $this->task->date_end = date('Y-m-d H:i:s');
            $this->task->current_info = $this->module->l('Invalid images')
                ." ($invalid_count), "
                .$this->module->l('see history for information');
            $this->task->save();
        } else {
            $this->refreshTask();
            $this->task->current_info = $this->module->l('Uploaded');
            $this->task->save();
        }
        return true;
    }


    protected function bulkImagesUploadInner($data, $imageClient, $hash)
    {
        $images = array();

        foreach ($data as $item) {
            $images[] = $item['item'];
        }

        $response = $imageClient->bulkUploadImage($images);

        //$idTaskProductProcessedList = array();

        if (isset($response['uploaded']) && $response['uploaded'] && count($response['uploaded'])) {
            foreach ($response['uploaded'] as $uploadedImg) {
                if (isset($hash[md5($uploadedImg['source'])]) && count($uploadedImg['imageUrls']) > 0) {
                    //$hash[md5($uploadedImg['source'])] is image id
                    $id_image = $hash[md5($uploadedImg['source'])];
                    $dbItem = IzettleImage::getItemByImageId($id_image);
                    if (!$dbItem) {
                        $dbItem = new IzettleImage();
                        $dbItem->id_image = $id_image;
                    }
                    $dbItem->key = $uploadedImg['imageLookupKey'];
                    $dbItem->url = $uploadedImg['imageUrls'][0];
                    $dbItem->save();

                    //$idTaskProductProcessedList[] =
                    foreach ($data[$id_image]['list'] as $list) {
                        //$idTaskProductProcessedList[] = $list['id_izettle_task_product'];
                        if ($this->is_archived) {
                            $dbItem = new IzettleTaskProductHistory((int) $list['id_izettle_task_product']);
                        } else {
                            $dbItem = new IzettleTaskProduct((int) $list['id_izettle_task_product']);
                        }

                        $dbItem->processed = true;
                        $dbItem->desc = $dbItem->desc." ".$uploadedImg['imageUrls'][0];

                        $dbItem->save();
                    }
                }
            }

//            if (count($idTaskProductProcessedList)) {
//                if ($this->is_archived) {
//                    $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history` SET `processed` = 1
//                        where `id_izettle_task_product`
//                            in ( '.implode(',', array_map('intval', $idTaskProductProcessedList)).')';
//                } else {
//                    $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product` SET `processed` = 1
//                        where `id_izettle_task_product`
//                            in ( '.implode(',', array_map('intval', $idTaskProductProcessedList)).')';
//                }
//
//                Db::getInstance()->execute($sql);
//            }
        }

        $invalid_count = 0;

        $info = "";

        if (isset($response['invalid']) && $response['invalid'] && count($response['invalid'])) {
            foreach ($response['invalid'] as $url) {
                $desc = 'INVALID URL: '.$url;
                if (isset($hash[md5($url)])) {
                    foreach ($data[$hash[md5($url)]]['list'] as $list) {
                        if ($this->is_archived) {
                            $dbItem = new IzettleTaskProductHistory((int) $list['id_izettle_task_product']);
                        } else {
                            $dbItem = new IzettleTaskProduct((int) $list['id_izettle_task_product']);
                        }

                        $dbItem->processed = false;
                        $dbItem->desc = $desc;

                        $dbItem->save();
                    }
                }
                $info .= $desc . "\n";
                $invalid_count++;
            }
        }

        if ($invalid_count > 0) {
            throw new Exception($info);
        }

        return $invalid_count;
    }

    public function getProcessedCount()
    {
        return $this->task->processed_count;
    }
}
