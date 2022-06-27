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

class CartController extends CartControllerCore
{
    public function initContent()
    {
        if ($this->context->cart->checkQuantities()) {
            if ((int)Configuration::get('KCOV3') &&
                Tools::getValue('action') === 'show' &&
                (int)Tools::getValue('ajax') !== 1 &&
                (int)Tools::getValue('update') !== 1 &&
                (int)Tools::getValue('forceview') !== 1
                ) {
                    $url = $this->context->link->getModuleLink(
                        'klarnaofficial',
                        'checkoutklarna',
                        array(),
                        Tools::usingSecureMode()
                    );
                    Tools::redirect($url);
                    die;
            }
        }
        parent::initContent();
    }
}
