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

use IzettleApi\Client\Image\ImageUrlUpload;

class UpdateAction extends IzettleAction
{
    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $tax_type = Configuration::get(IZETTLECONNECTOR_TAX_TYPE);

        $this->refreshTask();
        $this->task->current_info = $this->module->l('Refresh images');
        $this->task->save();

        if (!$this->refreshImages()) {
            return false;
        }

        $this->refreshTask();
        $this->task->prepared_count = 0;
        $this->task->current_info = $this->module->l('Prepare data for sync');
        $this->task->save();

        $productClient = $this->module->getIzettleProductClient();

        $context = Context::getContext();
//        $previous_lang = $context->language;

        $productTaskList = $this->task->getProductList();
        $count = count($productTaskList);
        if ($count < 1) {
            return true;
        }
        $this->refreshTask();
        $this->task->total_count = $count;
        $this->task->save();

        $replace_mode = false;

        //$processed = array();

        $processedIds = array();
        $counter = 1;
        $processed_counter = 0;

        foreach ($productTaskList as $productTask) {
            //$processed[] = $productTask['id_izettle_task_product'];
            if (!isset($productTask['id_product']) || !$productTask['id_product']) {
                continue;
            }

            $id_izettle_task_product = (int)$productTask['id_izettle_task_product'];

            if ($productTask['processed']) {
                $processed_counter++;
                $processedIds[] = $id_izettle_task_product;
                continue;
            }

            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }

            $id_product = (int)$productTask['id_product'];
            $config = new IzettleConfiguration($id_product);

            if (!$config->active) {
                continue;
            }

            $product =
                new Product(
                    $id_product,
                    true
                );

            $this->refreshTask();
            $this->task->current_info =
                $this->module->l('Processing, current product:').' '.$product->name[$config->id_lang];
            $this->task->save();

            //getAttributesParams get lang from context;
            $context->language = new Language($config->id_lang);
            $izettleProduct =
                IzettleItemsConverter::convertToIzettleProduct(
                    $product,
                    $config->id_lang,
                    $replace_mode,
                    $config->use_price,
                    $config->use_wholesale_price,
                    $config->custom_name,
                    $config->custom_barcode,
                    $tax_type
                );


            try {
                $retrievedIzettleProduct = $productClient->getProduct($izettleProduct->getUuid());
            } catch (Exception $e) {
                if (strpos($e->getMessage(), "ENTITY_NOT_FOUND") > -1) {
                    $data = array('id_product' => $id_product);
                    $this->module->innerHookUpdateProduct($data, IzettleTask::IMAGE_ACTION);
                    $this->module->innerHookUpdateProduct($data, IzettleTask::IMPORT_ACTION);
                    if ($config->id_inventory_sync_policy > 0) {
                        $this->module->innerHookUpdateProduct($data, IzettleTask::STOCK_IMPORT_ACTION);
                    }
                    $retrievedIzettleProduct = false;
                } else {
                    throw $e;
                }
            }
            $processed = 0;
            $desc = 'ENTITY_NOT_FOUND';

            if ($retrievedIzettleProduct) {
                $etag = $retrievedIzettleProduct->getETag();
                $retrievedIzettleProduct->setETag(null);

                if ((!$config->use_price || !$config->use_wholesale_price)
                    && $productTask['desc'] != IZETTLECONNECTOR_DISABLE_PRICE
                ) {
                    foreach ($izettleProduct->getVariants() as &$variant) {
                        $retrievedVariant = $retrievedIzettleProduct->getVariants()->get($variant->getUuid());
                        if ($retrievedVariant) {
                            $price = $retrievedVariant->getPrice();
                            if ($price && !$config->use_price) {
                                $variant->setPrice($price);
                            }

                            $costPrice = $retrievedVariant->getCostPrice();
                            if ($costPrice && !$config->use_wholesale_price) {
                                $variant->setCostPrice($costPrice);
                            }
                        }
                    }
                    $unitName = $retrievedIzettleProduct->getUnitName();
                    $izettleProduct->setUnitName($unitName ? $unitName : null);
                }

                if ($tax_type == 'SALES_TAX') {
                    $taxRates = $retrievedIzettleProduct->getTaxRates();

                    $saved_zettle_taxes = $productTask['undo_json'];
                    if ($saved_zettle_taxes) {
                        $saved_zettle_taxes = json_decode($saved_zettle_taxes, true);
                        if (isset($saved_zettle_taxes['zettle_taxes'])) {
                            $saved_zettle_taxes = $saved_zettle_taxes['zettle_taxes'];
                            if (is_array($saved_zettle_taxes) && $saved_zettle_taxes) {
                                $taxRates = $saved_zettle_taxes;
                            }
                        }
                    }

                    $izettleProduct->setTaxRates($taxRates);
                    $izettleProduct->setCreateWithDefaultTax($retrievedIzettleProduct->getCreateWithDefaultTax());
                    $izettleProduct->setTaxExempt($retrievedIzettleProduct->getTaxExempt());
                }

                $diff =
                    IzettleHelper::arrayRecursiveDiff(
                        $izettleProduct->getAsArray(),
                        $retrievedIzettleProduct->getAsArray()
                    );
                $desc = $this->module->l('no changes needed');
                if ($diff) {
                    $uuid = $izettleProduct->getUuid();
                    $izettleProduct->setUuid(null);
                    $json = $izettleProduct->getPostBodyData();
                    $headers = array('If-Match' => $etag);
                    $productClient->updateProduct(
                        $uuid,
                        $json,
                        $headers
                    );
                    $diffDotNotation = IzettleHelper::convertArrayToDotNotation($diff);
                    $desc =
                        implode(
                            ", ",
                            array_map(
                                function ($value, $key = null) {
                                    return ($key ? ($key.' -> ') : '')."'".$value."'";
                                },
                                array_values($diffDotNotation),
                                array_keys($diffDotNotation)
                            )
                        );
                }

                $this->refreshTask();
                $this->task->processed_count = $processed_counter + $counter++;
                $this->task->save();
                $processed = 1;
            }

            $processedIds[] = $id_izettle_task_product;

            if ($this->is_archived) {
                $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history`
                            SET `processed` = '.(int) $processed.', `desc` = \''.pSQL($desc).'\'
                            WHERE `id_izettle_task_product` = '.(int)$id_izettle_task_product;
            } else {
                $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product`
                            SET `processed` = '.(int) $processed.', `desc` = \''.pSQL($desc).'\'
                            WHERE `id_izettle_task_product` = '.(int)$id_izettle_task_product;
            }
            Db::getInstance()->execute($sql);
        }


        if ($this->is_archived) {
            $sql = 'DELETE FROM `'._DB_PREFIX_.'izettle_task_product_history`
                    WHERE `id_izettle_task` = '.(int)$this->task->id.'
                           AND `id_izettle_task_product` NOT IN ('.implode(',', array_map('intval', $processedIds)).')';
        } else {
            $sql = 'DELETE FROM `'._DB_PREFIX_.'izettle_task_product`
                    WHERE `id_izettle_task` = '.(int)$this->task->id.'
                           AND `id_izettle_task_product` NOT IN ('.implode(',', array_map('intval', $processedIds)).')';
        }
        Db::getInstance()->execute($sql);

        $this->refreshTask();
        $this->task->total_count = $this->task->processed_count;
        $this->task->save();

        return true;
    }

    protected function refreshImages()
    {
        $context = Context::getContext();
        $imageClient = $this->module->getIzettleImageClient();
        $imageAssociationList = $this->getImageAssociation();

        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }

        $counter = 1;

        foreach ($imageAssociationList as $row) {
            $id_image = (int)$row['id_image'];

            if ($id_image == 0) {
                continue;
            }

            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }

            $image = IzettleImage::getItemByImageId($id_image);
            if (!$image) {
                $data = array();
                $hash = array();
                $url =
                    $context->link->getImageLink(
                        urlencode(utf8_decode($row['link_rewrite'])),
                        $id_image,
                        ImageType::getFormatedName('large')
                    );

                $hash[md5($url)] = $id_image;

                $data[$id_image] = array(
                    'item' => new ImageUrlUpload($url, "JPEG"),
                    'url'  => $url,
                    'list' => array()
                );
                $this->bulkImagesUploadInner($data, $imageClient, $hash);
            }

            $this->refreshTask();
            $this->task->prepared_count = $counter++;
            $this->task->save();
        }

        return true;
    }
}
