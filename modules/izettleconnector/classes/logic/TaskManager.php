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

class TaskManager
{
    public static function getReadyTasks()
    {
        $ids = Db::getInstance()->executeS(
            'SELECT id_izettle_task
			 FROM `'._DB_PREFIX_.'izettle_task` izettle_task
			 WHERE izettle_task.id_izettle_task_state = '.(int)IzettleTask::READY_STATE.' 
			       AND (izettle_task.id_izettle_run is null
			            OR izettle_task.id_izettle_run = 0) 
			 ORDER by izettle_task.date_add ASC'
        );

        $result = array();
        foreach ($ids as $id) {
            $result[] = new IzettleTask($id['id_izettle_task']);
        }
        return $result;
    }

    public static function getExternalStockSyncTasks()
    {
        $ids = Db::getInstance()->executeS(
            'SELECT id_izettle_task
			 FROM `'._DB_PREFIX_.'izettle_task` izettle_task
			 WHERE izettle_task.id_izettle_task_state = '.(int)IzettleTask::READY_STATE.' 
			       AND izettle_task.id_izettle_action_type = '.(int)IzettleTask::STOCK_EXPORT_ACTION.'
			 ORDER by izettle_task.date_add ASC'
        );

        $result = array();
        foreach ($ids as $id) {
            $result[] = new IzettleTask($id['id_izettle_task']);
        }
        return $result;
    }


    public static function addItemsToActualTask($products, $type)
    {
        $task = self::getActualTask($type);
        $task->addProductList($products);
    }

    public static function getActualClearTask()
    {
        return self::getActualTask(IzettleTask::CLEAR_ACTION);
    }

    public static function getActualTask($type)
    {
        $task = self::getExistTask($type);
        if ($task) {
            return $task;
        } else {
            return self::createNewTask($type);
        }
    }

    public static function createNewTask($type)
    {
        $task = new IzettleTask();
        $task->id_izettle_action_type = $type;
        $task->id_izettle_task_state = IzettleTask::READY_STATE;
        $task->processed_count = 0;

        $task->save();

        return $task;
    }

    private static function getExistTask($type)
    {
        $id = Db::getInstance()->getValue(
            'SELECT id_izettle_task
			 FROM `'._DB_PREFIX_.'izettle_task` izettle_task
			 WHERE izettle_task.id_izettle_task_state = '.(int)IzettleTask::READY_STATE.' 
			       AND izettle_task.id_izettle_action_type  = '.(int)$type.' 
			       AND (izettle_task.id_izettle_run is null OR izettle_task.id_izettle_run = 0)
			 ORDER by izettle_task.date_add desc'
        );

        return $id ? new IzettleTask($id) : false;
    }
}
