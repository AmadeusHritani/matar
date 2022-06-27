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

function upgrade_module_2_0_1($module)
{
    $result = true;
    $module->registerHook('displayOrderConfirmation');
    
    $sql = "SELECT `id_hook` FROM `"._DB_PREFIX_."hook` WHERE `name` = 'displayPaymentReturn'";
    $id_hook = Db::getInstance()->getValue($sql);
    if ((int)$id_hook) {
        $module->unregisterHook($id_hook);
    }
    
    return $result;
}
