<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 web site only.
 * If you want to use this file on more web sites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 web site (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

$sql = array();

$sql[] = '
    CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_sc_certification` (
      `id_ets_sc_certification` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `id_shop` int(10) UNSIGNED NOT NULL,
      `image` varchar(500) NOT NULL,
      `link` varchar(255) DEFAULT NULL,
      `title` varchar(255) DEFAULT NULL,
      `alt` varchar(255) DEFAULT NULL,
      `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
      PRIMARY KEY (`id_ets_sc_certification`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8mb4;
';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
