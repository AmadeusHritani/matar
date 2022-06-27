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

function upgrade_module_1_8_11($module)
{
    // Process Module upgrade to 1.8.11
    $update_sql = 'ALTER TABLE `'._DB_PREFIX_.'klarna_orders` ADD';
    $update_sql .= ' COLUMN `id_cart` INT(10) UNSIGNED NOT NULL AFTER `id`;';
    return Db::getInstance()->execute($update_sql);
}
