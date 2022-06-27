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

function upgrade_module_1_1_14($object)
{

    Configuration::updateValue(IZETTLECONNECTOR_BARCODE_FIELD, 'ean13');
    Configuration::updateValue('IZETTLEONBOARD_CURRENT_STEP', 12);
    Configuration::updateValue('IZETTLEONBOARD_SHUT_DOWN', true);

    if (!Configuration::updateValue(IZETTLECONNECTOR_TAX_TYPE, 'VAT')) {
        $object->upgrade_detail['1.1.14'][] = 'Zettle upgrade error! IZETTLECONNECTOR_TAX_MODE is not updated.';
        return false;
    }


    $result = (bool)Db::getInstance()->Execute(
        'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'izettle_tax`  (
				`uuid` varchar(36) NOT NULL,
				`label` text NULL,
				`percentage` FLOAT NULL,
				`default` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
				PRIMARY KEY (`uuid`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'
    );

    $result &= (bool) Db::getInstance()->Execute(
        'ALTER TABLE `' . _DB_PREFIX_ . 'izettle_run` ADD `params` text NULL AFTER `success`'
    );

    $result &= (bool) Db::getInstance()->Execute(
        'ALTER TABLE `' . _DB_PREFIX_ . 'izettle_run_history` ADD `params` text NULL AFTER `success`'
    );

    if (!$result) {
        $object->upgrade_detail['1.1.14'][] = 'Zettle upgrade error! zettle_xxxxx tables are not created.';
        return false;
    }

    return $result;
}
