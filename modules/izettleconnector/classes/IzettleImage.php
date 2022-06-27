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

class IzettleImage extends ObjectModel
{
    public $id;
    public $id_image;
    public $key;
    public $url;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_image',
        'primary' => 'id_izettle_image',
        'fields' => array(
            'id_image' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'key' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'url' =>  array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
//        'associations' => array(
//            'products' => array('type' => self::HAS_ONE),
//            'product_attributes' => array('type' => self::HAS_ONE),
//            'images' => array('type' => self::HAS_ONE)
//        ),
    );

    public static function getItemByImageId($id_image)
    {
        $id = Db::getInstance()->getValue(
            'SELECT id_izettle_image
			 FROM `'._DB_PREFIX_.'izettle_image` izettle_image
			 WHERE izettle_image.id_image = '.(int)$id_image
        );
        return $id ? new IzettleImage($id) : false;
    }
}
