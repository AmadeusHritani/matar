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

function upgrade_module_2_2_0($module)
{
    $kpm_settings = array('KCO_SWEDEN',
        'KCO_SWEDEN_B2B',
        'KCO_SWEDEN_EID',
        'KCO_SWEDEN_SECRET',
        'KCO_NORWAY',
        'KCO_NORWAY_EID',
        'KCO_NORWAY_SECRET',
        'KCO_NORWAY_B2B',
        'KCO_FINLAND',
        'KCO_FINLAND_EID',
        'KCO_FINLAND_SECRET',
        'KCO_FINLAND_B2B',
        'KCO_GERMANY_EID',
        'KCO_GERMANY_SECRET',
        'KCO_AUSTRIA',
        'KCOV3_AUSTRIA',
        'KCO_AUSTRIA_EID',
        'KCO_AUSTRIA_SECRET',
        'KCO_GLOBAL_SECRET',
        'KCO_GLOBAL_EID',
        'KCO_GLOBAL',
        'KCO_GERMANY',
        'KCO_DE_PREFILNOT',
        'KCOV3_FINLAND',
        'KPM_INVOICEFEE',
        'KPM_NL_EID',
        'KPM_NL_SECRET',
        'KPM_UK_EID',
        'KPM_SV_EID',
        'KPM_SV_SECRET',
        'KPM_NO_EID',
        'KPM_NO_SECRET',
        'KPM_FI_EID',
        'KPM_FI_SECRET',
        'KPM_DE_EID',
        'KPM_DE_SECRET',
        'KPM_DA_EID',
        'KPM_DA_SECRET',
        'KPM_AT_EID',
        'KPM_AT_SECRET',
        'KCO_SHOWPRODUCTPAGE',
        'KCO_PRODUCTPAGELAYOUT',
        'KCO_FOOTERLAYOUT',
        'KCO_SENDTYPE',
        'KCO_UK_EID',
        'KCO_UK_SECRET',
        'KCO_NL',
        'KCO_NL_SECRET',
        'KCO_NL_EID',
        'KCO_US_SECRET',
        'KCO_US_EID',
        'KCO_US',
        'KCO_UK',
        'KCO_IS_ACTIVE'
    );
    foreach ($kpm_settings as $kpm_setting) {
        @Configuration::deleteByName($kpm_setting);
    }

    try {
        /*REMOVE footer tpl*/
        unlink(dirname(__FILE__). '/../views/templates/hook/klarnafooter.tpl');
    } catch (Exception $e) {
        /*REMOVAL IS NOT ESSENTIAL*/
    }
    /*TRY TO REMOVE UNWANTED FILES*/
    try {
        rrmdir2_2_0(dirname(__FILE__). '/../libraries/lib');
    } catch (Exception $e) {
        /*REMOVAL IS NOT ESSENTIAL*/
    }
    try {
        rrmdir2_2_0(dirname(__FILE__). '/../libraries/Checkout');
    } catch (Exception $e) {
        /*REMOVAL IS NOT ESSENTIAL*/
    }
    
    $sql = "SELECT `id_hook` FROM `"._DB_PREFIX_."hook` WHERE `name` = 'displayFooter'";
    $id_hook = Db::getInstance()->getValue($sql);
    if ((int)$id_hook) {
        $module->unregisterHook($id_hook);
    }
    return true;
}

function rrmdir2_2_0($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) {
                    rrmdir2_2_0($dir. DIRECTORY_SEPARATOR .$object);
                } else {
                    unlink($dir. DIRECTORY_SEPARATOR .$object);
                }
            }
        }
        rmdir($dir);
    }
}
