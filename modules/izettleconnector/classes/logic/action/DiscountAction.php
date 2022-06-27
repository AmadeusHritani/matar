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

use \IzettleApi\API\Product\Price;
use \IzettleApi\API\Product\Discount;

class DiscountAction extends IzettleAction
{

    protected function runInner($params)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $discounts = IzettleHelper::getReadyToSyncDiscounts();
        $count = count($discounts);
        if (!$count) {
            $this->refreshTask();
            $this->task->current_info = $this->module->l('No discounts to sync');
            $this->task->save();
            return true;
        }

        $productClient = $this->module->getIzettleProductClient();
        $this->refreshTask();
        $this->task->total_count = $count;
        $this->task->current_info = $this->module->l('Sync discounts');
        $this->task->save();
        $counter = 1;
        foreach ($discounts as $discountInfo) {
            if (!$this->isKeepGoing()) {
                //stop running if cancelled or stopped
                return false;
            }
            switch ($discountInfo['action']) {
                case 'create':
                    $this->create($discountInfo, $productClient);
                    break;
                case 'update':
                    $this->update($discountInfo, $productClient);
                    break;
                case 'delete':
                    $this->delete($discountInfo, $productClient);
                    break;
            }

            $this->refreshTask();
            $this->task->processed_count = $counter++;
            $this->task->save();
        }
        return true;
    }

    private function create($discountInfo, $productClient)
    {
        $cartRule = new CartRule($discountInfo['id_cart_rule']);
        $currency = new Currency($cartRule->reduction_currency);
        $is_percent = $cartRule->reduction_percent ? true : false;

        $discount = Discount::create(
            UUID::generateV1(),
            $discountInfo['name'],
            $discountInfo['description'],
            $is_percent ? null : new Price($discountInfo['reduction_amount'], $currency->iso_code),
            $is_percent ? $discountInfo['reduction_percent'] : null,
            $discountInfo['id_cart_rule']
        );
        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }

        try {
            $productClient->createDiscount($discount);

            $dbItem = new IzettleDiscount();
            $dbItem->uuid = $discount->getUuid();
            $dbItem->id_cart_rule = $cartRule->id;
            $dbItem->save();

            $taskProduct = new IzettleTaskProduct();
            $taskProduct->id_izettle_task = $this->task->id;
            $taskProduct->processed = true;
            $taskProduct->id_product_attribute = $cartRule->id;
            $taskProduct->desc = 'created';
            $taskProduct->undo_json = $discount->getUuid();
            $taskProduct->undone = false;
            $taskProduct->save();
        } catch (Exception $e) {
            $taskProduct = new IzettleTaskProduct();
            $taskProduct->id_izettle_task = $this->task->id;
            $taskProduct->processed = false;
            $taskProduct->id_product_attribute = $cartRule->id;
            $taskProduct->desc = $e->getMessage();
            $taskProduct->undone = false;
            $taskProduct->save();
        }

        return true;
    }

    private function update($discountInfo, $productClient)
    {
        $dbItem = new IzettleDiscount($discountInfo['id_izettle_discount']);
        //$oldDiscount = $productClient->getDiscount($discountInfo['uuid']);


        $cartRule = new CartRule($discountInfo['id_cart_rule']);
        $currency = new Currency($cartRule->reduction_currency);
        $is_percent = $cartRule->reduction_percent ? true : false;

        $discount = Discount::create(
            UUID::generateV1(),
            $discountInfo['name'],
            $discountInfo['description'],
            $is_percent ? null : new Price($discountInfo['reduction_amount'], $currency->iso_code),
            $is_percent ? $discountInfo['reduction_percent'] : null,
            $discountInfo['id_cart_rule']
        );

        if (!$this->isKeepGoing()) {
            //stop running if cancelled or stopped
            return false;
        }
        try {
            $productClient->updateDiscount($discount);
            $dbItem->date_upd = date('Y-m-d H:i:s');
            $dbItem->save();

            $taskProduct = new IzettleTaskProduct();
            $taskProduct->id_izettle_task = $this->task->id;
            $taskProduct->processed = true;
            $taskProduct->id_product_attribute = $cartRule->id;
            $taskProduct->desc = 'updated';
            //$taskProduct->undo_json = $oldDiscount->getPostBodyData();
            $taskProduct->undone = false;
            $taskProduct->save();
        } catch (Exception $e) {
            $taskProduct = new IzettleTaskProduct();
            $taskProduct->id_izettle_task = $this->task->id;
            $taskProduct->processed = false;
            $taskProduct->id_product_attribute = $cartRule->id;
            $taskProduct->desc = $e->getMessage();
            $taskProduct->undone = false;
            $taskProduct->save();
        }

        return true;
    }

    private function delete($discountInfo, $productClient)
    {
        $dbItem = new IzettleDiscount($discountInfo['id_izettle_discount']);
        //$oldDiscount = $productClient->getDiscount($discountInfo['uuid']);
        $deleted = true;
        try {
            $productClient->deleteDiscount($discountInfo['uuid']);
            $taskProduct = new IzettleTaskProduct();
            $taskProduct->id_izettle_task = $this->task->id;
            $taskProduct->processed = true;

            $taskProduct->desc = 'deleted';
            //$taskProduct->undo_json = $oldDiscount->getPostBodyData();
            $taskProduct->undone = false;
            $taskProduct->save();
        } catch (Exception $e) {
            $deleted = false;
            $taskProduct = new IzettleTaskProduct();
            $taskProduct->id_izettle_task = $this->task->id;
            $taskProduct->processed = false;

            $taskProduct->desc = $e->getMessage();
            $taskProduct->undone = false;
            $taskProduct->save();
        }

        if ($deleted) {
            $dbItem->delete();
        }

        return true;
    }
}
