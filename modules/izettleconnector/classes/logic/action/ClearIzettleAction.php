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

use IzettleApi\Client\Product\CategoryBuilder;
use IzettleApi\Client\Product\ProductBuilder;
use IzettleApi\Client\Product\VariantBuilder;
use IzettleApi\Client\Universal\ImageBuilder;

class ClearIzettleAction extends IzettleAction
{

    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $productClient = $this->module->getIzettleProductClient();
        $this->refreshTask();
        $this->task->current_info = $this->module->l('Getting data from iZettle').$this->module->l('[long operation]');
        $this->task->save();

        $productTaskList = $this->task->getProductList();

        $products = $productClient->getProducts();

        if (!$this->bulkProductsDelete($products, count($productTaskList))) {
            return false;
        }

        return true;
    }

    protected function undoInner($actual_list, $params)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        if ($actual_list) {
            $this->module->logger->debug(count($actual_list));
        }
        $tax_type = Configuration::get(IZETTLECONNECTOR_TAX_TYPE);
        $categoryBuilder = new CategoryBuilder();
        $imageBuilder = new ImageBuilder();
        $variantBuilder = new VariantBuilder();
        $productBuilder = new ProductBuilder($categoryBuilder, $imageBuilder, $variantBuilder);

        $count = count($actual_list);
        $this->refreshTask();
        $this->task->total_count = $count;
        $this->task->prepared_count = 0;
        $this->task->processed_count = 0;
        $this->task->current_info = $this->module->l('Reverting deleted product');
        $this->task->save();

        $data = array();
        $counter = 1;
        $processed_counter = 0;

        foreach ($actual_list as $recoverProduct) {
            //$processed[] = $recoverProduct['id_izettle_task_product'];
            if (!isset($recoverProduct['undo_json']) || !$recoverProduct['undo_json']) {
                continue;
            }
            if ($recoverProduct['undone']) {
                $processed_counter++;
                continue;
            }

            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }

            if ($recoverProduct['id_product']) {
                $id_product = (int) $recoverProduct['id_product'];
                $dbItem = IzettleProduct::getItemByProductId($id_product);
                if ($dbItem) {
                    $processed_counter++;
                    continue;
                }

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
                            true,
                            $config->use_price,
                            $config->use_wholesale_price,
                            $config->custom_name,
                            $config->custom_barcode,
                            $tax_type
                        );
                }
            } else {
                $json = $recoverProduct['undo_json'];
                $izettleProduct = $productBuilder->buildFromJson($json);
            }



            $data[] = array(
                'izettle_item'            => $izettleProduct,
                'id_izettle_task_product' => $recoverProduct['id_izettle_task_product']
            );
            $this->refreshTask();
            $this->task->prepared_count = $counter++;
            $this->task->save();
        }

        $this->refreshTask();
        $this->task->prepared_count = 0;
        $this->task->save();

        if (!$this->bulkProductsImport($data, $processed_counter)) {
            return false;
        }

//        $actual_ids = array_map(
//            function ($v) {
//                return $v['id_izettle_task_product'];
//            },
//            $actual_list
//        );

//        $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history` SET `undone` = 1
//                        where `id_izettle_task_product` in ( '.implode(',', array_map('intval', $actual_ids)).')';
//        Db::getInstance()->execute($sql);

        return true;
    }
}
