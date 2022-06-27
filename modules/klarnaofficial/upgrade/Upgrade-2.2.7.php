<?php
/**
 * Prestaworks AB
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the End User License Agreement(EULA)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://license.prestaworks.se/license.html
 *
 * @author    Prestaworks AB <info@prestaworks.se>
 * @copyright Copyright Prestaworks AB (https://www.prestaworks.se/)
 * @license   http://license.prestaworks.se/license.html
 */

function upgrade_module_2_2_7($module)
{
    $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'klarna_osm_configurations` (
            `id_klarna_osm_configurations` INT(11) NOT NULL AUTO_INCREMENT,
            `id_country` INT(11) NOT NULL,
            `product_page` VARCHAR(255) NOT NULL,
            `product_page_theme` VARCHAR(255) NOT NULL,
            `cart_page` VARCHAR(255) NOT NULL,
            `cart_page_theme` VARCHAR(255) NOT NULL,
            `id_shop` INT(11) NOT NULL,
            `active` TINYINT(1) NOT NULL,
            PRIMARY KEY  (`id_klarna_osm_configurations`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    if (Db::getInstance()->execute($sql) == false) {
        return false;
    }

    $module->installTabs();
    return true;
}
