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

function upgrade_module_1_0_25($object)
{
    $result = true;

    Configuration::updateValue(IZETTLECONNECTOR_SYNC_VOUCHER, true);

    $sql = 'ALTER TABLE  `'._DB_PREFIX_.'izettle_configuration`
            ADD COLUMN `use_wholesale_price` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `use_price`';

    if (Db::getInstance()->Execute($sql)) {
        $update = 'UPDATE `'._DB_PREFIX_.'izettle_configuration` SET  `use_wholesale_price` = `use_price`';
        $result = Db::getInstance()->Execute($update);
    } else {
        $object->upgrade_detail['1.0.25'][] = 'iZettle upgrade error! The table izettle_configuration is not updated.';
        $result = false;
    }

    return $result;
}
