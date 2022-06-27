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

use IzettleApi\API\Inventory\ProductInventoryCreate;
use IzettleApi\API\Inventory\ProductInventorySyncCollection;
use IzettleApi\API\Inventory\VariantInventoryChange;

class InventorySyncAction extends InventoryImportAction
{

    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $this->refreshTask();
        $this->task->current_info = $this->module->l('Prepare stock data for sync');
        $this->task->save();

        $inventoryClient = $this->module->getIzettleInventoryClient();
        $this->processLocations($inventoryClient);

        $productTaskList = $this->task->getProductList();
        $processed_counter = 0;
        $data = array();
        foreach ($productTaskList as $productTask) {
            //$processed[] = $productTask['id_izettle_task_product'];
            if (!isset($productTask['id_product']) || !$productTask['id_product']) {
                continue;
            }
            if ($productTask['processed']) {
                $processed_counter++;
                continue;
            }
            $id_product = (int)$productTask['id_product'];

            if (!isset($data[$id_product])) {
                $data[$id_product] = array(
                    'list' => array()
                );
            }

            $data[$id_product]['list'][] = $productTask['id_izettle_task_product'];
        }

        $this->refreshTask();
        $this->task->total_count = $processed_counter + count($data);
        $this->task->save();

//        $izettle_data = $inventoryClient->getInventory($this->storeLocation->uuid);
//        $variantIzettleData = array();
//
//        foreach ($izettle_data['variants'] as $izettleVariantInventory) {
//            $variantIzettleData[$izettleVariantInventory['variantUuid']] = (int) $izettleVariantInventory['balance'];
//        }

        $variantChanges = array();
        $ids = array();
        $counter = 0;

        foreach ($data as $id_product => $row) {
            $config = new IzettleConfiguration($id_product);
            if (!$config
                ||!$config->active
                || $config->id_inventory_sync_policy == IzettleConfiguration::INVENTORY_DISABLE_POLICY
            ) {
                continue;
            }

            $product_uuid = (IzettleProduct::getItemByProductId($id_product))->uuid;
            if (!$product_uuid) {
                continue;
            }


            try {
                $izettle_data =
                    $inventoryClient->getProductInventory(
                        $this->storeLocation->uuid,
                        $product_uuid
                    );
            } catch (Exception $e) {
                if (strpos($e->getMessage(), "PRODUCT_NOT_TRACKED") > -1) {
                    $inventoryClient->createProductInventory(ProductInventoryCreate::create($product_uuid));
                    $izettle_data =
                        $inventoryClient->getProductInventory(
                            $this->storeLocation->uuid,
                            $product_uuid
                        );
                } else {
                    throw $e;
                }
            }
            $variantIzettleData = array();

            foreach ($izettle_data['variants'] as $izettleVariantInventory) {
                $variantIzettleData[$izettleVariantInventory['variantUuid']] =
                    (int)$izettleVariantInventory['balance'];
            }

            $product =
                new Product(
                    $id_product,
                    true
                );

            //$variantChanges = array();

            if ($product->hasAttributes()) {
                $attributes = $product->getAttributesResume($config->id_lang);
                foreach ($attributes as $attribute) {
                    $id_product_attribute = (int)$attribute['id_product_attribute'];
                    $variantChange =
                        $this->getVariantChange(
                            $id_product,
                            $id_product_attribute,
                            $variantIzettleData,
                            $product_uuid
                        );
                    if ($variantChange) {
                        $variantChanges[] = $variantChange;
                    }
                }
            } else {
                $variantChange =
                    $this->getVariantChange(
                        $id_product,
                        null,
                        $variantIzettleData,
                        $product_uuid
                    );
                if ($variantChange) {
                    $variantChanges[] = $variantChange;
                }
            }
            $ids = array_merge($ids, $row['list']);

            $this->refreshTask();
            $this->task->prepared_count = $counter++;
            $this->task->save();

//            if ($variantChanges) {
//
//            }
        }

        if ($variantChanges) {
            $externalUuid = UUID::generateV1();
            $syncCollection =
                ProductInventorySyncCollection::create(
                    $variantChanges,
                    $externalUuid
                );

            //insert data before update inventory to prevent webhook processing
            //if update failing this record will be dead, but nothing dangerous happened
            Db::getInstance()->insert(
                'izettle_inventory_sync',
                array(
                    'uuid' => $externalUuid,
                    'date_add' => date('Y-m-d H:i:s'),
                )
            );

            $inventoryClient->updateInventory($syncCollection);
        } else {
            $this->refreshTask();
            $this->task->current_info = $this->module->l('Product data is up to date');
            $this->task->save();
        }

        $this->refreshTask();
        $this->task->processed_count = $processed_counter + count($data);
        $this->task->save();

        $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product` SET `processed` = 1
                        where `id_izettle_task` = '.(int)$this->task->id;
        Db::getInstance()->execute($sql);

        $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history` SET `processed` = 1
                        where `id_izettle_task` = '.(int)$this->task->id;
        Db::getInstance()->execute($sql);

        return true;
        //return $this->processInventory('START_TRACKING');
    }

    protected function undoInner($actual_list, $params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        if ($actual_list) {
            throw new Exception("The 'Sync inventory' task does`t support undo action");
        }
        return false;
    }

    private function getVariantChange($id_product, $id_product_attribute, $variantIzettleData, $product_uuid)
    {
        $variantChange = false;
        $qty = Product::getQuantity(
            $id_product,
            $id_product_attribute
        );
        //if ($qty > 0) {
        $variant =
            IzettleVariant::getItem(
                $id_product,
                $id_product_attribute ? $id_product_attribute : 0
            );

        if (!$variant->uuid) {
            return $variantChange;
        }

        $izettleQty = 0;
        if (isset($variantIzettleData[$variant->uuid])) {
            $izettleQty = (int)$variantIzettleData[$variant->uuid];
        }

        if ($izettleQty != $qty) {
            $change = $qty - $izettleQty;

            $from = $this->supplierLocation->uuid;
            $to = $this->storeLocation->uuid;

            if ($change < 0) {
                $from = $this->storeLocation->uuid;
                $to = $qty > -1 ? $this->soldLocation->uuid : $this->binLocation->uuid;//TODO BIN or SOLD?
            }

            $variantChange =
                VariantInventoryChange::create(
                    $product_uuid,
                    $variant->uuid,
                    abs($change),
                    $from,
                    $to
                );
        }
        //}

        return $variantChange;
    }
}
