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

class DeleteAction extends IzettleAction
{
    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $productClient = $this->module->getIzettleProductClient();

        $this->refreshTask();
        $this->task->current_info = $this->module->l('Deleting');
        $this->task->save();

        $productTaskList = $this->task->getProductList();
        if (count($productTaskList) < 1) {
            return true;
        }
        $this->refreshTask();
        $this->task->total_count = count($productTaskList);
        $this->task->save();


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

            $id_izettle_task_product = (int)$productTask['id_izettle_task_product'];
            $id_product = (int)$productTask['id_product'];
            $izettle_product = IzettleProduct::getItemByProductId($id_product);

            if (!$izettle_product || !$izettle_product->uuid) {
                continue;
            }

            $config = new IzettleConfiguration($id_product);

            $productClient->deleteProductBulk(array($izettle_product->uuid));

            $izettle_product->delete();
            if ($config) {
                //$config->delete();
                $config->active = false;
                $config->save();
            }

            if ($this->is_archived) {
                $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product_history`
                            SET `processed` = 1
                            WHERE `id_izettle_task_product` = '.(int)$id_izettle_task_product;
            } else {
                $sql = 'UPDATE `'._DB_PREFIX_.'izettle_task_product`
                            SET `processed` = 1
                            WHERE `id_izettle_task_product` = '.(int)$id_izettle_task_product;
            }
            Db::getInstance()->execute($sql);

            $this->refreshTask();
            $this->task->processed_count = $processed_counter + $counter++;
            $this->task->save();
        }

        return true;
    }
}
