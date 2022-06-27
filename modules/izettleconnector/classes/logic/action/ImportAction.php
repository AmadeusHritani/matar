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

use IzettleApi\API\Product\Presentation;
use IzettleApi\API\Product\Price;
use IzettleApi\API\Product\Variant;
use IzettleApi\API\Product\VariantOption;
use IzettleApi\API\Product\VariantOptionDefinition;
use IzettleApi\API\Product\VariantOptionDefinitionCollection;
use IzettleApi\API\Product\VariantOptionDefinitionProperty;

/**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : iZettle
 */

class ImportAction extends IzettleAction
{

    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $tax_type = Configuration::get(IZETTLECONNECTOR_TAX_TYPE);

        $this->refreshTask();
        $this->task->current_info = $this->module->l('Prepare data for export');
        $this->task->save();

        $productTaskList = $this->task->getProductList();
        if (count($productTaskList) < 1) {
            return true;
        }

        $replace_mode = true;

        $data = array();
        $counter = 1;
        $processed_counter = 0;

        foreach ($productTaskList as $productTask) {
            if (!isset($productTask['id_product']) || !$productTask['id_product']) {
                continue;
            }
            if ($productTask['processed']) {
                $processed_counter++;
                continue;
            }

            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }

            $id_product = (int) $productTask['id_product'];

            $product = new Product($id_product, true);
            $config = new IzettleConfiguration($id_product);

            if (!$config->active) {
                $config->active = true;
                $config->save();
            }
            if (!$config->id_lang) {
                $config->id_lang = (int) Configuration::get('PS_LANG_DEFAULT');
                $config->save();
            }

            if ($config->active) {
                $izettleProduct =
                    IzettleItemsConverter::convertToIzettleProduct(
                        $product,
                        $config->id_lang,
                        $replace_mode,
                        $config->use_price,
                        $config->use_wholesale_price,
                        $config->custom_name,
                        $config->custom_barcode,
                        $tax_type,
                        $params
                    );

                $data[] = array(
                    'izettle_item' => $izettleProduct,
                    'id_izettle_task_product' => $productTask['id_izettle_task_product']
                );
            }

            $this->refreshTask();
            $this->task->prepared_count = $counter++;
            $this->task->save();
        }

        $this->refreshTask();
        $this->task->current_info = $this->module->l('Importing');
        $this->task->prepared_count = 0;
        $this->task->save();

        if (!$this->bulkProductsImport($data, $processed_counter)) {
            return false;
        }

        return true;
    }

    protected function undoInner($actual_list, $params)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }

        $count = count($actual_list);
        $this->refreshTask();
        $this->task->total_count = $count;
        $this->task->prepared_count = 0;
        $this->task->processed_count = 0;
        $this->task->current_info = $this->module->l('Reverting imported products');
        $this->task->save();

        $processed_counter = 0;
        $itemsToDelete = array();
        foreach ($actual_list as $productTask) {
            if ($productTask['undone']) {
                $processed_counter++;
            } else {
                $itemsToDelete[] = $productTask;
            }
        }

        $product_ids = array_map(
            function ($v) {
                return $v['id_product'];
            },
            $itemsToDelete
        );

        $product_ids = array_unique($product_ids);

        $sql = 'SELECT *
				FROM `'._DB_PREFIX_.'izettle_product` izettle_product
				WHERE izettle_product.id_product in('.implode(',', array_map('intval', $product_ids)).')';

        $products = Db::getInstance()->executeS($sql);

        $this->refreshTask();
        $this->task->total_count = count($products);
        $this->task->save();

        if (!$this->bulkProductsDelete($products, $processed_counter)) {
            return false;
        }

        //delete all products after successful finish
        //maybe better put this logic inside bulkProductsDelete
        $product_ids = array_map(
            function ($v) {
                return $v['id_product'];
            },
            $actual_list//delete all products after successful finish
        );

        $product_ids = array_unique($product_ids);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'izettle_product`
				WHERE id_product in('.implode(',', array_map('intval', $product_ids)).')';

        Db::getInstance()->execute($sql);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'izettle_variant`
				WHERE id_product in('.implode(',', array_map('intval', $product_ids)).')';

        Db::getInstance()->execute($sql);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'izettle_configuration`
				WHERE id_product in('.implode(',', array_map('intval', $product_ids)).')';

        Db::getInstance()->execute($sql);

        return true;
    }
}
