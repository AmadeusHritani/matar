<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

class AdminIzettleConnectorOnBoardingController extends ModuleAdminController
{
    public function postProcess()
    {
        if (!Tools::getIsset('action')) {
            throw new Exception('The action to call is not defined.');
        }
        if (!Tools::getIsset('value')) {
            throw new Exception('The value to set is not defined.');
        }

        $onBoarding = new IzettleConnector();
        $onBoarding->onBoardingCall(Tools::getValue('action'), Tools::getValue('value'));

        die('0');
    }
}
