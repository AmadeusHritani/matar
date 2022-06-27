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

function upgrade_module_2_0_8($module)
{
    $result = true;
    $module->registerHook('displayOrderConfirmation');
    
    $sql = "SELECT `id_hook` FROM `"._DB_PREFIX_."hook` WHERE `name` = 'displayPaymentReturn'";
    $id_hook = Db::getInstance()->getValue($sql);
    if ((int)$id_hook) {
        $module->unregisterHook($id_hook);
    }
    
    $states = OrderState::getOrderStates(Configuration::get('PS_LANG_DEFAULT'));
    $name = 'Klarna payment accepted';
    $config_name = 'KCO_PENDING_PAYMENT_ACCEPTED';
    $module->createOrderStatus($name, $states, $config_name, false);
    $name = 'Klarna pending payment';
    $config_name = 'KCO_PENDING_PAYMENT';
    $module->createOrderStatus($name, $states, $config_name, false);
    $name = 'Klarna payment rejected';
    $config_name = 'KCO_PENDING_PAYMENT_REJECTED';
    $module->createOrderStatus($name, $states, $config_name, false);
    
    foreach (Tools::scandir($module->getLocalPath().'override', 'php', '', true) as $file) {
        if ($file == "classes/Cart.php") {
            $class = basename($file, '.php');
            if (PrestaShopAutoload::getInstance()->getClassPath($class.'Core') || Module::getModuleIdByName($class)) {
                $result &= $module->addOverride($class);
            }
        }
    }
    
    return $result;
}
