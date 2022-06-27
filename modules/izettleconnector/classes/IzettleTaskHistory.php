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

class IzettleTaskHistory extends IzettleTask
{
    public static $definition = array(
        'table' => 'izettle_task_history',
        'primary' => 'id_izettle_task',
        'fields' => array(
            'id_izettle_run' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_izettle_action_type' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_izettle_task_state' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'total_count' => array('type' => self::TYPE_INT),
            'prepared_count' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'processed_count' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'current_info' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_start' => array('type' => self::TYPE_DATE),
            'date_end' => array('type' => self::TYPE_DATE),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );


    public function getProductList()
    {
        return Db::getInstance()->executeS(
            'SELECT *
			 FROM `'._DB_PREFIX_.'izettle_task_product_history` izettle_task_product
			 WHERE izettle_task_product.id_izettle_task = '.(int) $this->id.'
			 ORDER by izettle_task_product.date_add ASC, izettle_task_product.id_izettle_task_product ASC'
        );
    }
}
