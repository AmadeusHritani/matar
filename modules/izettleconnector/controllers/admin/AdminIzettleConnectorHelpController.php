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

class AdminIzettleConnectorHelpController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
    }

    public function initContent()
    {
        parent::initContent();

        $this->addJs(_PS_MODULE_DIR_.$this->module->name.'/views/js/accordion.js');

        $default_tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/faq/en.tpl';

        $context = Context::getContext();
        $iso = $context->language->iso_code;

        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/faq/'.$iso.'.tpl';

        if (!file_exists($tpl)) {
            $tpl = $default_tpl;
        }


        $this->context->smarty->assign(
            array(
                'logo'    => '/modules/'.$this->module->name.'/views/img/logo.png',
                'version' => $this->module->version
            )
        );
        $content = $this->context->smarty->fetch($tpl);

        $widget = $this->module->getConnectorWidget();

        $this->context->smarty->assign(
            array(
                'content' => $this->content.$this->module->getAdminTopMenu().$widget.$content,
            )
        );
    }
}
