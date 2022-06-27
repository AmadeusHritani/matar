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

use IzettleApi\API\Inventory\ProductInventoryChange;
use IzettleApi\API\Inventory\ProductInventoryChangeCollection;
use IzettleApi\API\Inventory\VariantInventoryChange;

/**
 *  2020 iZettle Prestashop Connector
 * @author    : iZettle
 * @copyright : 2020 iZettle
 * @license   : MIT
 * @contact   : prestashop.com
 * @homepage  : iZettle
 */

class InventoryImportAction extends IzettleAction
{

    const MAX_INVENTORY_IMPORT_COUNT = 100;
    const MAX_ALLOWED_QTY = 200000;

    protected $supplierLocation;
    protected $storeLocation;
    protected $soldLocation;
    protected $binLocation;
    protected $needCreate = false;


    public function __construct($task)
    {
        parent::__construct($task);
        $this->initLocation();
    }

    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $success = $this->processInventoryBulk('START_TRACKING');
        if ($success) {
            if (!$this->subscribeWebhook()) {
                $this->refreshTask();
                $this->task->current_info = $this->module->l('Webhook subscription failed, see log files for details');
                $this->task->id_izettle_task_state = IzettleTask::ERROR_STATE;
                $this->task->date_end = date('Y-m-d H:i:s');
                $this->task->save();
                $this->autostate = false;
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

    protected function undoInner($actual_list, $params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        if ($actual_list) {
            $this->module->logger->debug(count($actual_list));
        }
        return $this->processInventoryBulk('STOP_TRACKING');
    }

    protected function processInventoryBulk($trackingStatusChange)
    {
        $productTaskList = $this->task->getProductList();

        $this->refreshTask();
        $this->task->total_count = count($productTaskList);
        $this->task->save();

        if (count($productTaskList) < 1) {
            return true;
        }

        if ($this->undo_active) {
            $count = 0;
            foreach ($productTaskList as $productTask) {
                //$processed[] = $productTask['id_izettle_task_product'];
                if (!isset($productTask['id_product']) || !$productTask['id_product']) {
                    continue;
                }
                if ($this->undo_active && !$productTask['processed']) {
                    continue;
                }
                $count++;
            }
            $this->refreshTask();
            $this->task->total_count = $count;
            $this->task->save();
        }

        $inventoryClient = $this->module->getIzettleInventoryClient();
        $this->processLocations($inventoryClient);
        $this->refreshTask();
        $this->task->current_info = $this->module->l('Preparing stock import');
        $this->task->save();



        //$trackingStatusChange = 'START_TRACKING';
        $is_stop_tracking = $trackingStatusChange == 'STOP_TRACKING';
        $data = array();
        $counter = 1;

        $processed_counter = 0;

        foreach ($productTaskList as $productTask) {
            //$processed[] = $productTask['id_izettle_task_product'];
            if (!isset($productTask['id_product']) || !$productTask['id_product']) {
                continue;
            }
            if ($this->undo_active && !$productTask['processed']) {
                continue;
            }
            if ($this->undo_active && $productTask['undone']) {
                $processed_counter++;
                continue;
            }
            if (!$this->undo_active && $productTask['processed']) {
                $processed_counter++;
                continue;
            }

            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }

            $id_product = (int)$productTask['id_product'];
            $izettleProduct = IzettleProduct::getItemByProductId($id_product);
            $product_uuid = $izettleProduct->uuid;

            $product =
                new Product(
                    $id_product,
                    true
                );
            $config = new IzettleConfiguration($id_product);

            $variantChanges = array();

            if (!$is_stop_tracking) {
                if ($product->hasAttributes()) {
                    $attributes = $product->getAttributesResume($config->id_lang);
                    foreach ($attributes as $attribute) {
                        $id_product_attribute = (int)$attribute['id_product_attribute'];
                        $qty = Product::getQuantity(
                            $id_product,
                            $id_product_attribute
                        );
                        if ($qty > 0) {
                            $variant_uuid = (IzettleVariant::getItem($id_product, $id_product_attribute))->uuid;
                            $variantChanges[] =
                                VariantInventoryChange::create(
                                    $product_uuid,
                                    $variant_uuid,
                                    min($qty, self::MAX_ALLOWED_QTY),
                                    $this->supplierLocation->uuid,
                                    $this->storeLocation->uuid
                                );
                        }
                    }
                } else {
                    $qty = Product::getQuantity(
                        $id_product
                    );
                    if ($qty > 0) {
                        $variant_uuid = (IzettleVariant::getItem($id_product, 0))->uuid;
                        $variantChanges[] = VariantInventoryChange::create(
                            $product_uuid,
                            $variant_uuid,
                            min($qty, self::MAX_ALLOWED_QTY),
                            $this->supplierLocation->uuid,
                            $this->storeLocation->uuid
                        );
                    }
                }
            }
            $productChange =
                ProductInventoryChange::create(
                    $product_uuid,
                    $trackingStatusChange,
                    $variantChanges
                );

            $data[] = array(
                'izettle_item' => $productChange,
                'id_izettle_task_product' => $productTask['id_izettle_task_product']
            );

            $this->refreshTask();
            $this->task->prepared_count = $counter++;
            $this->task->save();
        }

        $this->refreshTask();
        $this->task->prepared_count = 0;
        $this->task->save();
        $count = count($data);

        $current_max = (int) ($count * 0.2);

        if ($current_max < 1) {
            $current_max = 1;
        }

        if ($current_max > self::MAX_INVENTORY_IMPORT_COUNT) {
            $current_max = self::MAX_INVENTORY_IMPORT_COUNT;
        }

        $this->refreshTask();
        $this->task->current_info = $this->module->l('Exporting product quantity');
        $this->task->save();




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

            $productChanges = array_map(
                function ($v) {
                    return $v['izettle_item'];
                },
                $subarray
            );

            $productChangesCollection = ProductInventoryChangeCollection::create(
                $productChanges,
                $this->storeLocation->uuid
            );

            $inventoryClient->createProductInventoryBulk($productChangesCollection);


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
            $this->refreshTask();
            $this->task->processed_count = $processed_counter + min(($i + 1) * $current_max, $count);
            $this->task->save();
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }
        }

        return true;
    }




    private function initLocation()
    {
        $locations = Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'izettle_location`');
        if (count($locations) < 4) {// STORE, SUPPLIER, SOLD, BIN
            $this->needCreate = true;
            return false;
        }
        foreach ($locations as $location) {
            switch ($location['type']) {
                case 'STORE':
                    $this->storeLocation = new IzettleLocation($location['id_izettle_location']);
                    break;
                case 'SUPPLIER':
                    $this->supplierLocation = new IzettleLocation($location['id_izettle_location']);
                    break;
                case 'SOLD':
                    $this->soldLocation = new IzettleLocation($location['id_izettle_location']);
                    break;
                case 'BIN':
                    $this->binLocation = new IzettleLocation($location['id_izettle_location']);
                    break;
            }
        }
    }

    private function recreateLocation($inventoryClient)
    {
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'izettle_location`');

        $locations = $inventoryClient->getLocations();
        foreach ($locations as $location) {
            $dbItem = new IzettleLocation();
            $dbItem->uuid = $location->getUuid();
            $dbItem->type = $location->getType();
            $dbItem->name = $location->getName();
            $dbItem->description = $location->getDescription();
            $dbItem->default = $location->getDefault();
            $dbItem->save();
        }
    }

    /**
     * @return mixed
     */
    protected function processLocations($inventoryClient)
    {
        if ($this->needCreate) {
            $this->refreshTask();
            $this->task->current_info = $this->module->l('Create inventory locations');
            $this->task->save();
            $this->recreateLocation($inventoryClient);
            $this->initLocation();
        }
    }

    protected function subscribeWebhook()
    {
        $this->refreshTask();
        $this->task->current_info = $this->module->l('Webhook subscription process');
        $this->task->save();

        return IzettleHelper::createWebhook($this->module, true);
    }
}
