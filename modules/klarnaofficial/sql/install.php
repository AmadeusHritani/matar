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

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'klarna_orders` (
		  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		  `id_cart` INTEGER UNSIGNED NOT NULL,
		  `id_order` INTEGER UNSIGNED NOT NULL,
		  `id_shop` INTEGER UNSIGNED NOT NULL,
		  `ssn` VARCHAR(20) NOT NULL,
		  `invoicenumber` VARCHAR(256) NOT NULL,
		  `eid` VARCHAR(100) NOT NULL,
		  `reservation` VARCHAR(256) NOT NULL,
		  `risk_status` VARCHAR(10) NOT NULL,
		  PRIMARY KEY (`id`)
		)
		ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
        
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'klarna_errors` (
		  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		  `id_order` INTEGER UNSIGNED NOT NULL,
		  `error_message` VARCHAR(256) NOT NULL,
		  PRIMARY KEY (`id`)
		)
		ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
           
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'klarna_checkbox` (
		  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		  `id_cart` INTEGER UNSIGNED NOT NULL,
		  `text_at_time_of_purchase` VARCHAR(256) NOT NULL,
		  `checked` tinyint(1) NOT NULL,
		  PRIMARY KEY (`id`)
		)
		ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'klarna_osm_configurations` (
            `id_klarna_osm_configurations` INT(11) NOT NULL AUTO_INCREMENT,
            `id_country` INT(11) NOT NULL,
            `product_page` VARCHAR(255) NOT NULL,
            `product_page_theme` VARCHAR(255) NOT NULL,
            `cart_page` VARCHAR(255) NOT NULL,
            `cart_page_theme` VARCHAR(255) NOT NULL,
            `footer_placement` VARCHAR(255) NOT NULL,
            `footer_theme` VARCHAR(255) NOT NULL,
            `topofpage_placement` VARCHAR(255) NOT NULL,
            `topofpage_theme` VARCHAR(255) NOT NULL,
            `leftcolumn_placement` VARCHAR(255) NOT NULL,
            `leftcolumn_theme` VARCHAR(255) NOT NULL,
            `rightcolumn_placement` VARCHAR(255) NOT NULL,
            `rightcolumn_theme` VARCHAR(255) NOT NULL,
            `id_shop` INT(11) NOT NULL,
            `active` TINYINT(1) NOT NULL,
            PRIMARY KEY  (`id_klarna_osm_configurations`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
        
foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
