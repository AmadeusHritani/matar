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

class IzettleTaskProductHistory extends IzettleTaskProduct
{
    public static $definition = array(
        'table' => 'izettle_task_product_history',
        'primary' => 'id_izettle_task_product',
        'fields' => array(
            'id_izettle_task' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_product_attribute' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'processed' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'undone' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'undo_json' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'desc' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );
}
