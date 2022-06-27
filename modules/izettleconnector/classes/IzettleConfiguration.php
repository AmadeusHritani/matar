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

class IzettleConfiguration extends ObjectModel
{
    const INVENTORY_DISABLE_POLICY = 0;
    const STOCK_IMPORT_POLICY = 1;
    const INVENTORY_TO_PS_POLICY = 2;
    const INVENTORY_BOTH_POLICY = 3;

    public $id;
//    public $id_product;
    public $id_lang;
    public $id_inventory_sync_policy;
    public $active;
    public $use_price;
    public $use_wholesale_price;
    public $custom_name;
    public $custom_barcode;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_configuration',
        'primary' => 'id_product',
        'fields' => array(
//            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_lang' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_inventory_sync_policy' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'use_price' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'use_wholesale_price' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'custom_name' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'custom_barcode' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    public static function isConfigExist($id_product)
    {
        $config = Db::getInstance()->getValue(
            'SELECT id_product
             FROM '._DB_PREFIX_.'izettle_configuration
             WHERE id_product = '.(int)$id_product
        );

        return $config ? true : false;
    }
}
