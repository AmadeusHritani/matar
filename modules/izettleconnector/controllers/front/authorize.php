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

use IzettleApi\Utils\Cipher;

class IzettleConnectorAuthorizeModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        //parent::initContent();
        $forbidden = '{"message":"Unauthorized access"}';
        $code = Tools::getValue('code');
        $authorization_code = Tools::getValue('authorization_code');
        $state = Tools::getValue('state');
        if ($code || $authorization_code) {
            $redirect_url = 'https://izettle16.local:4433/module/izettleconnector/authorize';
            Configuration::updateValue(
                IZETTLECONNECTOR_MODE,
                IZETTLECONNECTOR_MODE_CODE
            );
            $client = $this->module->getIzettleClient();
            $token = $client->getRefreshTokenFromAuthorizedCode($redirect_url, $code ? $code : $authorization_code);

            if (empty($token)) {
                die($forbidden);
            }

            try {
                $this->module->refreshTokenChanged($token);
                $cipher = new Cipher(_COOKIE_KEY_);
                $payload =
                    json_decode(
                        IzettleHelper::decodeStr($state),
                        true
                    );
                $uri = $cipher->decrypt($payload['data']);
                $token = $cipher->decrypt($payload['token']);
                $url =
                    Tools::getHttpHost(true)
                    .__PS_BASE_URI__
                    .$uri
                    .'/'
                    .$this->context->link->getAdminLink('AdminIzettleConnectorRoot', false)
                    .'&token='.$token;

                $this->module->setIzettleConnected(true);
                $this->module->setIzettleAccountInfo();

                Tools::redirect($url);
            } catch (Exception $e) {
                $this->module->isIzettleConnected(false);
                die($forbidden);
            }
        }

        die($forbidden);
    }
}
