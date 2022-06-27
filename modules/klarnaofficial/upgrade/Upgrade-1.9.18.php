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

function upgrade_module_1_9_18($module)
{
    $states = OrderState::getOrderStates(Configuration::get('PS_LANG_DEFAULT'));
    $name = 'Klarna pending payment';
    $config_name = 'KCO_PENDING_PAYMENT';
    $module->createOrderStatus($name, $states, $config_name, false);
  
    return true;
}
