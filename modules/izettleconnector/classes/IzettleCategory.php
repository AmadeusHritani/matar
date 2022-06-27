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

class IzettleCategory extends ObjectModel
{
    public $id;
    public $id_category;
    public $uuid;
    public $date_add;
    public $date_upd;

    public static $definition = array(
        'table' => 'izettle_category',
        'primary' => 'id_izettle_category',
        'fields' => array(
            'id_category' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'uuid' =>  array('type' => self::TYPE_STRING, 'size' => 36),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
        'associations' => array(
            'categories' => array('type' => self::HAS_ONE)
        ),
    );

    public static function getUuid($id_category)
    {
        $uuid = Db::getInstance()->getValue(
            'SELECT uuid
			 FROM `'._DB_PREFIX_.'izettle_category` izettle_category
			 WHERE izettle_category.id_category = '.(int)$id_category
        );
        return $uuid;
    }
}
