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

include_once dirname(__FILE__) . '/cron.php';

class IzettleConnectorCronAsyncModuleFrontController extends IzettleConnectorCronModuleFrontController
{
    public function initContent()
    {
        //$this->respondOK();
        if (Configuration::get(IZETTLECONNECTOR_CRON_ALLOW)
            && $this->module->isIzettleConnected()
            && Tools::getValue('token')
            && Tools::getValue('token') == Configuration::get(IZETTLECONNECTOR_CRON_CODE)
        ) {
            $this->isAsync = true;
            $force = true;
            $this->module->queueSyncIfNeeded($force);
            $this->module->logger->info('async mode initiated');
        }
    }

    protected function respondOK()
    {
        @ignore_user_abort(1);

        if (is_callable('fastcgi_finish_request')) {
            session_write_close();
            fastcgi_finish_request();
            return;
        }

        ob_start();
        $serverProtocol = filter_input(INPUT_SERVER, 'SERVER_PROTOCOL', FILTER_SANITIZE_STRING);
        if ($serverProtocol) {
            header($serverProtocol.' 200 OK');
        }

        header('Content-Encoding: none');
        header('Content-Length: '.ob_get_length());
        header('Connection: close');

        ob_end_flush();
        ob_flush();
        flush();
    }
}
