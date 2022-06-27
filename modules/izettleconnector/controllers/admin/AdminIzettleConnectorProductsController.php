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

class AdminIzettleConnectorProductsController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
        $this->allow_export = true;
        $this->table = 'izettle_product';
        $this->className = 'IzettleProduct';
        $this->lang = false;
        $this->addRowAction('view');
        $this->explicitSelect = true;
        $this->allow_export = true;
        $this->deleted = false;
        $this->multishop_context = Shop::CONTEXT_ALL;
        $this->context = Context::getContext();
        $this->identifier = 'id_izettle_product';
        $this->_select = "
        a.id_izettle_product,
        a.id_product,
        a.uuid,
        pl.name,
        a.date_upd";

        $this->_join =
            'LEFT JOIN `'._DB_PREFIX_.'izettle_configuration` izettle_configuration
                ON izettle_configuration.`id_product` = a.`id_product`
             LEFT JOIN 
             (select  id_product, id_lang, max(name) name 
              from `'._DB_PREFIX_.'product_lang` group by  id_product, id_lang
              ) pl
                ON pl.`id_product` = a.`id_product` AND izettle_configuration.id_lang = pl.id_lang';

        $this->_orderBy = 'id_product';
        $this->_orderWay = 'ASC';


        $this->fields_list = array(
            'id_product' => array(
                'title'       => $this->module->l('ID'),
                'align'       => 'text-center',
                'class'       => 'fixed-width-xs',
                'filter_key'  => 'a!id_product',
                'filter_type' => 'int',
            ),
            'uuid'       => array(
                'title'      => $this->module->l('UUID'),
                'filter_key' => 'a!uuid'
            ),
            'name'       => array(
                'title'      => $this->module->l('Product name'),
                'filter_key' => 'pl!name'
            ),

            'date_upd' => array(
                'title'      => $this->l('Created'),
                'align'      => 'text-right',
                'type'       => 'datetime',
                'filter_key' => 'a!date_upd'
            )
        );

        $this->bulk_actions = array(
            'updateConfig' => array('text' => $this->module->l('Change iZettle configuration'), 'icon' => 'icon-cog')
        );
    }

    private function getItem($id)
    {
        foreach ($this->_list as $tr) {
            if ($tr['id_izettle_product'] == $id) {
                return $tr;
            }
        }
    }

    public function renderList()
    {
        $bulkEdit = '';
        if (Tools::isSubmit('submitBulkupdateConfig'.$this->table)) {
            if (Tools::getIsset('cancel')) {
                Tools::redirectAdmin(self::$currentIndex.'&token='.$this->token);
            }

            $bulkEdit = $this->module->hookDisplayAdminProductsExtra(
                array(
                    'id_product' => 0,
                    'bulk_mode' => true,
                    'REQUEST_URI' => $_SERVER['REQUEST_URI'],
                    'POST' => $_POST
                )
            );
        }

        $widget = $this->module->getConnectorWidget();

        $header = $this->getHeader();

        $footer = $this->getFooter();

        $confirm = Tools::getValue('confirm', '');
        if ($confirm) {
            $confirm = $this->module->displayConfirmation($confirm);
        }

        $delay = Tools::getValue('delay', false);
        if ($delay) {
            usleep((int) $delay);
        }


        return $this->module->getAdminTopMenu().$widget.$header.$confirm.$bulkEdit.parent::renderList().$footer;
    }

    public function processBulkUpdateConfig()
    {
        if (Tools::isSubmit('submitUpdateiZettleConfig')) {
            if (!$this->tabAccess['edit']) {
                $this->errors[] = Tools::displayError('You do not have permission to edit this.');
            } else {
                try {
                    $izettle_product_ids = Tools::getValue('izettle_productBox');
                    $sql = 'SELECT id_product FROM '._DB_PREFIX_.'izettle_product
                            WHERE id_izettle_product in ('.implode(',', array_map('intval', $izettle_product_ids)).')';
                    $candidates = Db::getInstance()->executeS($sql);
                    $active = (int)Tools::getValue('useizettle');
                    $id_lang = (int)Tools::getValue('uselang');
                    $id_inventory_sync_policy = (int)Tools::getValue('usestock');
                    $use_price = (int)Tools::getValue('useprice');
                    $use_wholesale_price = (int)Tools::getValue('use_wholesale_price');

                    foreach ($candidates as $candidate) {
                        $this->module->bindWithIzettle(
                            (int)$candidate['id_product'],
                            $active,
                            $use_price,
                            $use_wholesale_price,
                            $id_inventory_sync_policy,
                            $id_lang,
                            '',
                            ''
                        );
                    }

                    $link = '&confirm=OK&token=';

                    if (!$active) {
                        $link = '&delay=9000000'.$link;
                    }

                    Tools::redirectAdmin(self::$currentIndex.$link.$this->token);
                } catch (Exception $e) {
                    $this->errors[] = Tools::displayError($e->getMessage());
                }
            }
        }
    }

    public function renderView()
    {
        $id_izettle_product = Tools::getValue('id_izettle_product');
        $izettle_product = new IzettleProduct($id_izettle_product);

        $widget = $this->module->getConnectorWidget();

        $header = $this->getHeader();

        $footer = $this->getFooter();

        return
            $this->module->getAdminTopMenu()
            .$widget
            .$header
            .$this->module->hookDisplayAdminProductsExtra(array('id_product' => $izettle_product->id_product))
            .$footer;
    }

    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();
        if (Tools::getValue('id_izettle_product')) {
            $this->page_header_toolbar_btn['back '] = array(
                'href' => $this->context->link->getAdminLink('AdminIzettleConnectorProducts'),
                'desc' => $this->module->l('Back to task list'),
                'icon' => 'process-icon-back'
            );
        }
        unset($this->page_header_toolbar_btn['new_order']);
        $this->context->smarty->clearAssign('help_link');
    }

    public function renderKpis()
    {
        if (Tools::getValue('id_izettle_product') > 0) {
            parent::renderKpis();
        }
    }

    public function initToolbar()
    {
        parent::initToolbar();

        if (Tools::getValue('id_izettle_product')) {
            $this->getList((int)Configuration::get('PS_LANG_DEFAULT'), null, null, 0, 1000000);
            $row = $this->getItem(Tools::getValue('id_izettle_product'));
            if ($row) {
                $this->toolbar_title = "[".$row['id_product']."] ".$row['name'];
            }
        }
        unset($this->toolbar_btn['new']);
    }

    /**
     * @return array
     * @throws PrestaShopException
     * @throws SmartyException
     */
    public function getHeader()
    {
        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/history/header.tpl';
        $base_ajax_url =
            $this->context->link->getAdminLink('AdminIzettleConnectorRoot')
            ."&ajax=1&wizard=1";
        $query = array(
            'token'  => Tools::getAdminToken(_COOKIE_KEY_),
            'wizard' => 1,
            'ajax'   => 1,
        );
        $base_status_url = $this->context->link->getModuleLink($this->module->name, 'ajax', $query, true);
        $this->context->smarty->assign(
            array(
                'base_ajax_url'   => $base_ajax_url,
                'base_status_url' => $base_status_url
            )
        );
        $header = $this->context->smarty->fetch($tpl);
        return $header;
    }

    /**
     * @return string
     * @throws SmartyException
     */
    public function getFooter()
    {
        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/history/footer.tpl';
        $footer = $this->context->smarty->fetch($tpl);
        return $footer;
    }
}
