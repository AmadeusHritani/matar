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

class IzettleImport extends ObjectModel
{
    public $id;

    public $id_izettle_task;
    public $uuid;
    public $active;
    public $total_count;
    public $imported_count;
    public $success;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_import',
        'primary' => 'id_izettle_import',
        'fields' => array(
            'id_izettle_task' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'uuid' =>     array('type' => self::TYPE_STRING, 'size' => 36),
            'total_count' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'imported_count' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'success' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );
}
