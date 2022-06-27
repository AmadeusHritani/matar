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

class IzettleLocation extends ObjectModel
{
    public $id;
    public $uuid;
    public $type;
    public $name;
    public $description;
    public $default;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_location',
        'primary' => 'id_izettle_location',
        'fields' => array(
            'uuid' =>  array('type' => self::TYPE_STRING, 'size' => 36),
            'type' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'name' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'description' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'default' =>  array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );
}
