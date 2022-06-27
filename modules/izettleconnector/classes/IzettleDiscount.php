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

class IzettleDiscount extends ObjectModel
{
    public $id;
    public $id_cart_rule;
    public $uuid;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_discount',
        'primary' => 'id_izettle_discount',
        'fields' => array(
            'id_cart_rule' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'uuid' =>  array('type' => self::TYPE_STRING, 'size' => 36),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    public static function getUuid($id_cart_rule)
    {
        $uuid = Db::getInstance()->getValue(
            'SELECT uuid
			 FROM `'._DB_PREFIX_.'izettle_discount` izettle_discount
			 WHERE izettle_discount.id_cart_rule = '.(int)$id_cart_rule
        );
        return $uuid;
    }
}
