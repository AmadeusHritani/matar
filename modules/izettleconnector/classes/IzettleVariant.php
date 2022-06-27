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

class IzettleVariant extends ObjectModel
{
    public $id;
    public $id_product;
    public $id_product_attribute;
    public $uuid;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_variant',
        'primary' => 'id_izettle_variant',
        'fields' => array(
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_product_attribute' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'uuid' =>  array('type' => self::TYPE_STRING, 'size' => 36),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );


    public static function getItem($id_product, $id_product_attribute)
    {
        $id = Db::getInstance()->getValue(
            'SELECT id_izettle_variant
			 FROM `'._DB_PREFIX_.'izettle_variant` izettle_variant
			 WHERE izettle_variant.id_product = '.(int) $id_product.' 
			       AND izettle_variant.id_product_attribute  = '.(int) $id_product_attribute
        );
        return $id ? new IzettleVariant($id) : false;
    }

    public static function getItemByUuid($uuid)
    {
        $id = Db::getInstance()->getValue(
            'SELECT id_izettle_variant
			 FROM `'._DB_PREFIX_.'izettle_variant` izettle_variant
			 WHERE izettle_variant.uuid = \''. pSQL($uuid).'\''
        );

        return $id ? new IzettleVariant($id) : false;
    }
}
