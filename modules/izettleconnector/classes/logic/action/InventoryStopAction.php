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

class InventoryStopAction extends InventoryImportAction
{
    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        $success = $this->processInventoryBulk('STOP_TRACKING');
        return $success;
    }

    protected function undoInner($actual_list, $params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
        if ($actual_list) {
            $this->module->logger->debug(count($actual_list));
        }
        return $this->processInventoryBulk('START_TRACKING');
    }
}
