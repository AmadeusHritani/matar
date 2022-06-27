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

function upgrade_module_1_8_15($module)
{
    // Process Module upgrade to 1.8.15
    $update_sql = 'ALTER TABLE `'._DB_PREFIX_.'kpmpclasses` MODIFY';
    $update_sql .= ' `expire` VARCHAR(20) NOT NULL;';
    return Db::getInstance()->execute($update_sql);
}
