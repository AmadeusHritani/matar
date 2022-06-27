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

class IzettlePartialSync extends ObjectModel
{
    public $id;
    public $params;
    public $active;
    public $imported_info;
    public $total_info;
    public $hours_wait;
    public $last_sync_date;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_partial_sync',
        'primary' => 'id_izettle_partial_sync',
        'fields' => array(
            'params' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'imported_info' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'total_info' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'hours_wait' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'last_sync_date' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );
}
