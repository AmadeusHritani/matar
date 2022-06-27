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

class IzettleProduct extends ObjectModel
{
    public $id;
    public $id_product;
    public $uuid;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_product',
        'primary' => 'id_izettle_product',
        'fields' => array(
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'uuid' =>  array('type' => self::TYPE_STRING, 'size' => 36),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
        'associations' => array(
            'products' => array('type' => self::HAS_ONE)
        ),
    );

    public static function getItemByProductId($id_product)
    {
        $id = Db::getInstance()->getValue(
            'SELECT id_izettle_product
			 FROM `'._DB_PREFIX_.'izettle_product` izettle_product
			 WHERE izettle_product.id_product = '.(int)$id_product
        );
        return $id ? new IzettleProduct($id) : false;
    }

    public static function getItemByUuid($uuid)
    {
        $id = Db::getInstance()->getValue(
            'SELECT id_izettle_product
			 FROM `'._DB_PREFIX_.'izettle_product` izettle_product
			 WHERE izettle_product.uuid = \''.pSQL($uuid).'\''
        );
        return $id ? new IzettleProduct($id) : false;
    }
}
