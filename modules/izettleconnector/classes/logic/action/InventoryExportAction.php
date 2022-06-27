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

class InventoryExportAction extends IzettleAction
{
    protected function runInner($params = null)
    {
        if (!$params) {
            return true;
        }

        $preparedData = $this->prepareBalanceChangeData($params);
        $this->module->logger->debug('prepared import data: '.json_encode($preparedData));
        if (!$preparedData) {
            return true;
        }

        foreach ($preparedData as $item) {
            $id_product = (int) $item['id_product'];
            $id_product_attribute = (int) $item['id_product_attribute'];
            $izettle_qty = (int) $item['qty'];
            $actual_qty = Product::getQuantity(
                $id_product,
                $id_product_attribute ? $id_product_attribute : null
            );

            if (isset($item['is_purchase']) && $item['is_purchase']) {
                if ($item['refund']) {
                    $new_qty = $actual_qty + $izettle_qty;
                } else {
                    $new_qty = $actual_qty - $izettle_qty;
                }
            } else {
                $new_qty = $izettle_qty;
            }



            $this->module->disableUpdateHook();
            StockAvailable::setQuantity($id_product, $id_product_attribute, $new_qty);
            $this->module->enableUpdateHook();

            if ($this->is_archived) {
                $dbItem = new IzettleTaskProductHistory();
            } else {
                $dbItem = new IzettleTaskProduct();
            }

            $dbItem->id_izettle_task = $this->task->id;
            $dbItem->id_product = $id_product;
            $dbItem->processed = true;
            $dbItem->desc = $actual_qty." -> ".$new_qty;
            $dbItem->save();
        }

        $this->refreshTask();
        $count = count($preparedData);
        $this->task->processed_count = $count;
        $this->task->total_count = $count;
        $this->task->save();

        return true;
    }

    private function prepareBalanceChangeData($payload)
    {
        if (IzettleHelper::isExternalChangesSource($payload['externalUuid'])) {
            $data = array();
            foreach ($payload['balanceAfter'] as $product) {
                $variant = IzettleVariant::getItemByUuid($product['variantUuid']);
                if (!$variant) {
                    continue;
                }

                $config = new IzettleConfiguration($variant->id_product);
                if (!$config->active
                    || $config->id_inventory_sync_policy != IzettleConfiguration::INVENTORY_BOTH_POLICY
                ) {
                    continue;
                }
                $data[] = array(
                    'id_product'           => $variant->id_product,
                    'id_product_attribute' => $variant->id_product_attribute,
                    'qty'                  => (int)$product['balance'],
                    'refund'               => false,
                    'is_purchase'          => false,
                );
            }

            return $data;
        }

        return false;
    }
}
