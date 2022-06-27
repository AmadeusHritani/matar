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

function upgrade_module_2_2_9($module)
{
    // Process Module upgrade to 1.8.11
    $update_sqls = [];
    $base_update_sql = 'ALTER TABLE `'._DB_PREFIX_.'klarna_osm_configurations` ADD';
    $update_sqls[] = $base_update_sql.' COLUMN `footer_placement` VARCHAR(255) NOT NULL AFTER `cart_page_theme`;';
    $update_sqls[] = $base_update_sql.' COLUMN `footer_theme` VARCHAR(255) NOT NULL AFTER `footer_placement`;';
    $update_sqls[] = $base_update_sql.' COLUMN `topofpage_placement` VARCHAR(255) NOT NULL AFTER `footer_theme`;';
    $update_sqls[] = $base_update_sql.' COLUMN `topofpage_theme` VARCHAR(255) NOT NULL AFTER `topofpage_placement`;';
    $update_sqls[] = $base_update_sql.' COLUMN `leftcolumn_placement` VARCHAR(255) NOT NULL AFTER `topofpage_theme`;';
    $update_sqls[] = $base_update_sql.' COLUMN `leftcolumn_theme` VARCHAR(255) NOT NULL AFTER `leftcolumn_placement`;';
    $update_sqls[] = $base_update_sql.' COLUMN `rightcolumn_placement` VARCHAR(255) NOT NULL AFTER `leftcolumn_theme`;';
    $update_sqls[] = $base_update_sql.' COLUMN `rightcolumn_theme` VARCHAR(255) NOT NULL AFTER `rightcolumn_placement`;';
    
    foreach ($update_sqls as $sql) {
        if (Db::getInstance()->execute($sql) == false) {
            return false;
        }
    }
    
    if ($module->registerHook('displayFooter') == false
        || $module->registerHook('displayBanner') == false
        || $module->registerHook('displayRightColumn') == false
        || $module->registerHook('displayLeftColumn') == false
        ) {
        return false;
    }
    
    @Configuration::deleteByName('KCOV3_FOOTERBANNER');
    @Configuration::deleteByName('KCOV3_SHOWPRODUCTPAGE');
    return true;
}
