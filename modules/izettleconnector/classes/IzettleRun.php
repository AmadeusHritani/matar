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

class IzettleRun extends ObjectModel
{

    const INTERNAL = 0;
    const EXTERNAL = 1;


    public $id;

    public $id_izettle_initial_type;
    public $active;
    public $success;
    public $params;

    public $date_add;

    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_run',
        'primary' => 'id_izettle_run',
        'fields' => array(
            'id_izettle_initial_type' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'success' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'params' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    /**
     * @param array IzettleTask $tasks
     * @return mixed
     */
    public function addTaskList($tasks)
    {
        foreach ($tasks as $task) {
            $task->id_izettle_run = $this->id;
            $task->save();
        }
        return true;
    }

    public function getTaskList()
    {
        $ids = Db::getInstance()->executeS(
            'SELECT id_izettle_task
			 FROM `'._DB_PREFIX_.'izettle_task` izettle_task
			 WHERE izettle_task.id_izettle_run = '.(int) $this->id.'
			 ORDER by izettle_task.date_add ASC'
        );

        $result = array();
        foreach ($ids as $id) {
            $result[] = new IzettleTask((int) $id['id_izettle_task']);
        }

        $ids = Db::getInstance()->executeS(
            'SELECT id_izettle_task
			 FROM `'._DB_PREFIX_.'izettle_task_history` izettle_task
			 WHERE izettle_task.id_izettle_run = '.(int) $this->id.'
			 ORDER by izettle_task.date_add ASC'
        );

        foreach ($ids as $id) {
            $result[] = new IzettleTaskHistory((int) $id['id_izettle_task']);
        }
        return $result;
    }

    public function getActionList()
    {
        $actions = array();
        $tasks = $this->getTaskList();
        foreach ($tasks as $task) {
            try {
                $actions[] = ActionFactory::getAction($task);
            } catch (Exception $ignored) {
                //ignored
            }
        }
        return $actions;
    }
}
