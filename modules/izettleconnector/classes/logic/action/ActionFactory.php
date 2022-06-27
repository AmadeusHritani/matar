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

class ActionFactory
{
    public static function getAction($task)
    {
        if (is_int($task)) {
            $task = new IzettleTask($task);
        } elseif (!is_object($task) || !($task instanceof IzettleTask)) {
            return null;
        }
        $action = null;
        switch ($task->id_izettle_action_type) {
            case IzettleTask::CLEAR_ACTION:
                $action = new ClearIzettleAction($task);
                break;
            case IzettleTask::IMPORT_ACTION:
                $action = new ImportAction($task);
                break;
            case IzettleTask::CREATE_ACTION:
                $action = new CreateAction($task);
                break;
            case IzettleTask::UPDATE_ACTION:
                $action = new UpdateAction($task);
                break;
            case IzettleTask::DELETE_ACTION:
                $action = new DeleteAction($task);
                break;
            case IzettleTask::IMAGE_ACTION:
                $action = new ImageProcessAction($task);
                break;
            case IzettleTask::STOCK_IMPORT_ACTION:
                $action = new InventoryImportAction($task);
                break;
            case IzettleTask::STOCK_EXPORT_ACTION:
                $action = new InventoryExportAction($task);
                break;
            case IzettleTask::STOCK_SYNC_ACTION:
                $action = new InventorySyncAction($task);
                break;
            case IzettleTask::STOCK_STOP_ACTION:
                $action = new InventoryStopAction($task);
                break;
            case IzettleTask::DISCOUNT_ACTION:
                $action = new DiscountAction($task);
                break;
            case IzettleTask::PURCHASE_IMPORT_ACTION:
                $action = new PurchaseImportAction($task);
                break;
            default:
                throw new Exception("Unknown action ID");
        }

        return $action;
    }
}
