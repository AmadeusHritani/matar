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

function upgrade_module_2_1_12($module)
{
    $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'klarna_checkbox` (
		  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		  `id_cart` INTEGER UNSIGNED NOT NULL,
		  `text_at_time_of_purchase` VARCHAR(256) NOT NULL,
		  `checked` tinyint(1) NOT NULL,
		  PRIMARY KEY (`id`)
		)
		ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';


    if (Db::getInstance()->execute($sql) == false) {
        return false;
    } else {
        return true;
    }
}
