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

class KlarnaOfficialCheckoutKlarnaModuleFrontController extends ModuleFrontController
{
    public function init()
    {
        $kcov3link = $this->context->link->getModuleLink(
            'klarnaofficial',
            'checkoutklarnakco',
            array(),
            true
        );
        Tools::redirect($kcov3link);
    }
}
