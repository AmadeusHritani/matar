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

class IzettleRunHistory extends IzettleRun
{
    public static $definition = array(
        'table' => 'izettle_run',
        'primary' => 'id_izettle_run_history',
        'fields' => array(
            'id_izettle_initial_type' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'success' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'params' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );
}
