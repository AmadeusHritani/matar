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

class CreateAction extends IzettleAction
{
    protected function runInner($params = null)
    {
        if ($params) {
            $this->module->logger->debug($params);
        }
    }
}
