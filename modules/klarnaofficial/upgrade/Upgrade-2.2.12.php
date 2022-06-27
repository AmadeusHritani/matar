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

function upgrade_module_2_2_12($module)
{
    $module->removeOverride("Tools");
    try {
        /*REMOVE footer tpl*/
        unlink(dirname(__FILE__). '/../override/classes/Tools.php');
    } catch (Exception $e) {
        /*REMOVAL IS NOT ESSENTIAL*/
    }
    return true;
}
