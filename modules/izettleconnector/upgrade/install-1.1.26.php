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

function upgrade_module_1_1_26($object)
{
    Configuration::updateValue(IZETTLECONNECTOR_PARTIAL_SYNC, false);

    $result = (bool)Db::getInstance()->Execute(
        'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_partial_sync`  (
			    `id_izettle_partial_sync` int(10) unsigned NOT NULL AUTO_INCREMENT,
			    `params` text NULL,
				`active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				`imported_info` text NULL,
				`total_info` text NULL,
				`hours_wait` int(10) unsigned NOT NULL DEFAULT 24,
				`last_sync_date` datetime NOT NULL,
				`date_add` datetime NOT NULL,
                `date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_izettle_partial_sync`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
    );

    $result &= (bool)Db::getInstance()->Execute(
        'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_purchase`  (
				`uuid` varchar(36) NOT NULL,
				`id_order` int(10) unsigned NOT NULL,
				`date_add` datetime NOT NULL,
				PRIMARY KEY (`uuid`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
    );

    $result &= (bool)Db::getInstance()->insert(
        'izettle_action_type',
        array(
            'id_izettle_action_type' => IzettleTask::PURCHASE_IMPORT_ACTION,
            'name'                   => 'PURCHASE_IMPORT',
            'desc'                   => pSQL($object->l('Import purchases from Zettle to Prestashop'))
        )
    );

    Configuration::updateValue(IZETTLECONNECTOR_USE_PURCHASES, false);

    if (!$object->installCarrier()) {
        $result = false;
    }

    $object->registerHook('updateCarrier');

    $object->createZettleOrderState();

    if (!$result) {
        $object->upgrade_detail['1.1.26'][] = 'Zettle upgrade error!';
        return false;
    }

    return $result;
}
