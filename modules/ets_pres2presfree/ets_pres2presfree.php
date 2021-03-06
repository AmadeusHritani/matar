<?php
/**
 * 2007-2021 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 wesite only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses. 
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 * 
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 *  @author ETS-Soft <etssoft.jsc@gmail.com>
 *  @copyright  2007-2021 ETS-Soft
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

if (!defined('_PS_VERSION_'))
	exit;
if(!class_exists('Pres2PresExtraImport'))
    include_once(_PS_MODULE_DIR_.'ets_pres2presfree/classes/ExtraImport.php');
if(!class_exists('Pres2PresDataImport'))
    include_once(_PS_MODULE_DIR_.'ets_pres2presfree/classes/DataImport.php');
if(!class_exists('Pres2PresImportHistory'))
    include_once(_PS_MODULE_DIR_.'ets_pres2presfree/classes/ImportHistory.php');
if(!class_exists('Uploader'))
    include_once(_PS_MODULE_DIR_.'ets_pres2presfree/classes/Uploader.php');   
if (version_compare(_PS_VERSION_, '1.5', '<') && !class_exists('Context'))
    require_once (_PS_MODULE_DIR_ .'/ets_pres2presfree/backward_compatibility/Context.php');     
class Ets_pres2presfree extends Module
{
    private $errorMessage;
    public $configs;
    public $baseAdminPath;
    private $_html;
    public $emotions = array();
    public $url_module;
    public $errors = array();
    public $tables;
    public $categoryDropDown;
    private $depthLevel = false;
    private $excludedCats = array();
    private $categoryPrefix = '- ';
    private $cmsCategoryDropDown;
    public $pres_version;
    public $context;
    public function __construct()
	{
		$this->name = 'ets_pres2presfree';
		$this->tab = 'front_office_features';
		$this->version = '1.1.7';
		$this->author = 'ETS-Soft';
		$this->need_instance = 0;
		$this->secure_key = Tools::encrypt($this->name);  
		$this->ps_versions_compliancy = array('min' => '1.5.0.0', 'max' => _PS_VERSION_);
		$this->bootstrap = true;        
        if(version_compare(_PS_VERSION_, '1.7', '>='))
            $this->pres_version=1.7;
        elseif(version_compare(_PS_VERSION_, '1.7', '<') && version_compare(_PS_VERSION_, '1.6', '>=') )
            $this->pres_version=1.6;
        elseif(version_compare(_PS_VERSION_, '1.6', '<') && version_compare(_PS_VERSION_, '1.5', '>=') )
            $this->pres_version=1.5;
        elseif(version_compare(_PS_VERSION_, '1.5', '<') && version_compare(_PS_VERSION_, '1.4', '>=') )
            $this->pres_version=1.4;
        else
            $this->pres_version=1.3;
		parent::__construct();
        $this->context = Context::getContext();
        $this->url_module = $this->_path;
        $this->displayName = $this->l('Prestashop Migrator - FREE VERSION');
		$this->description = $this->l('Upgrade Prestashop to latest version, migrate data between Prestashop websites');
$this->refs = 'https://prestahero.com/';
        if(isset($this->context->controller->controller_type) && $this->context->controller->controller_type =='admin')
            $this->baseAdminPath = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $this->tables = array(
            'employee',
            'shop_group',
            'shop',
            'lang',
            'currency',
            'category',
            'image',
            'product_attribute',
            'attribute',
            'attribute_group',
            'feature_value',
            'feature',
            'product',
            'customer',
            'group',
            'supplier',
            'manufacturer',
            'tax_rule',
            'tax_rules_group',
            'tax',
            'specific_price_rule',
            'cart_rule',
            'carrier',
            'address',
            'specific_price',
            'order_state',
            'cart',
            'orders',
            'order_invoice',
            'order_slip',
            'order_detail',
            'order_carrier',
            'order_cart_rule',
            'order_history',
            'order_message',
            'order_payment',
            'order_return',
            'range_price',
            'range_weight',
            'delivery',
            'zone',
            'country',
            'state',
            'reference',
            'stock_available',
            'cms_category',
            'cms',
            'message',
            'discount',
            'discount_type',
            'customization_field',
            'customization',
            'tag',
            'contact',
            'customer_thread',
            'customer_message'
        );
        $this->context->smarty->assign(
            array(
                'mod_dr_pres2pres'=> $this->_path,
            )
        );     
    }
    /**
	 * @see Module::install()
	 */
    public function install()
	{
	   if($this->pres_version==1.4)
       {
            if(parent::install()&& $this->_installDb())    
            {
                chmod(dirname(__FILE__).'/ajax.php',0644);
                chmod(dirname(__FILE__).'/ajax_init.php',0644);
                chmod(dirname(__FILE__).'/../ets_pres2presfree',0755);
                return true;
            }
            else
                return false;
       }
	   else
       {
            if(parent::install()        
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('displayBackOfficeFooter')
            && $this->registerHook('pres2presLeftBlok')
            && $this->_installDb()&& $this->_installTabs())
            {
                chmod(dirname(__FILE__).'/ajax.php',0644);
                chmod(dirname(__FILE__).'/ajax_init.php',0644);
                chmod(dirname(__FILE__).'/../ets_pres2presfree',0755);
                return true;
            }
       }
       return false;        
    }
    /**
	 * @see Module::uninstall()
	 */
	public function uninstall()
	{
        return parent::uninstall()&& $this->_uninstallTabs() && $this->_uninstallDb();
    }    
    public function _installDb()
    {
        Configuration::updateValue('ETS_PRES2PRES_NEW_PASSWD',0);
        Configuration::updateValue('ETS_PRES2PRES_DIVIDE_FILE',0);
        Configuration::updateValue('ETS_DT_NUMBER_RECORD',500);
        $data='shops,employees,categories,customers,manufactures,suppliers,carriers,cart_rules,catelog_rules,vouchers,products,orders,CMS_categories,CMS,messages';
        Configuration::updateValue('ETS_PRES2PRES_EXPORT',$data);
        $res = Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_pres2pres_import_history` ( 
        `id_import_history` INT(11) NOT NULL AUTO_INCREMENT, 
        `file_name` VARCHAR(222) NOT NULL ,`data` TEXT NOT NULL,
        `id_category_default` INT(11) NOT NULL,
        `id_manufacture` INT(11) NOT NULL,
        `id_supplier` INT(11) NOT NULL,
        `id_category_cms` INT(11) NOT NULL,
        `import_multi_shop` INT(11) NOT NULL,
        `delete_before_importing` INT(11) NOT NULL,
        `force_all_id_number` INT(11) NOT NULL,
        `content` TEXT NOT NULL, 
        `content_free` TEXT NOT NULL, 
        `currentindex` INT(11) NOT NULL,
        `number_import` INT(11) NOT NULL,
        `number_import2` INT(11) NOT NULL,
        `cookie_key` text,
        `date_import` datetime NOT NULL,
        PRIMARY KEY (`id_import_history`) ) ENGINE = InnoDB');
        $res &= Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_pres2pres_customer_pasword` ( 
        `id_ets_pres2pres_customer_pasword` INT(11) NOT NULL AUTO_INCREMENT , 
        `id_import_history` INT(11) NOT NULL , 
        `first_name` VARCHAR(222) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , 
        `last_name` VARCHAR(222) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , 
        `email` VARCHAR(222) NOT NULL ,
        `passwd` VARCHAR(222) NOT NULL ,  
        PRIMARY KEY (`id_ets_pres2pres_customer_pasword`)) ENGINE = InnoDB');
        $res &= Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_pres2pres_employee_pasword` ( 
        `id_ets_pres2pres_employee_pasword` INT(11) NOT NULL AUTO_INCREMENT , 
        `id_import_history` INT(11) NOT NULL , 
        `first_name` VARCHAR(222) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , 
        `last_name` VARCHAR(222) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , 
        `email` VARCHAR(222) NOT NULL , 
        `passwd` VARCHAR(222) NOT NULL , 
        PRIMARY KEY (`id_ets_pres2pres_employee_pasword`)) ENGINE = InnoDB');
        if($this->tables)
        {
            foreach($this->tables as $table)
            {
                $res &=Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ets_pres2pres_'.pSQL($table).'_import`(
                `id_import` INT(11) NOT NULL AUTO_INCREMENT , 
                `id_old` INT(11) NOT NULL , 
                `id_new` INT(11) NOT NULL,
                `id_import_history` INT(11) NOT NULL,
                PRIMARY KEY (`id_import`) ) ENGINE = InnoDB');
            }
        }
        return $res;
    }    
    private function _installTabs()
    {
        if($this->pres_version==1.4)
            return true;
        $languages = Language::getLanguages(false);
        $tab = new Tab();
        $tab->class_name = 'AdminPresToPresFree';
        $tab->module = 'ets_pres2presfree';
        $tab->id_parent = 0;            
        foreach($languages as $lang){
            $tab->name[$lang['id_lang']] = $this->l('Presta Migrator - FREE');
        }
        $tab->save();
        $tabId = Tab::getIdFromClassName('AdminPresToPresFree');
        if($tabId)
        {
            $subTabs = array(
                array(
                    'class_name' => 'AdminPresToPresFreeImport',
                    'tab_name' => $this->l('Migration'),
                    'icon'=>'icon icon-cloud-upload',
                ),
                array(
                    'class_name' => 'AdminPresToPresFreeHistory',
                    'tab_name' => $this->l('History'),
                    'icon'=>'icon icon-history',
                ),
                array(
                    'class_name' => 'AdminPresToPresFreeClean',
                    'tab_name' => $this->l('Clean-up'),
                    'icon'=>'icon icon-eraser',
                ),
                array(
                    'class_name' => 'AdminPresToPresFreeHelp',
                    'tab_name' => $this->l('Help'),
                    'icon'=>'icon icon-question-circle',
                ),
            );
            foreach($subTabs as $tabArg)
            {
                $tab = new Tab();
                $tab->class_name = $tabArg['class_name'];
                $tab->module = 'ets_pres2presfree';
                $tab->id_parent = $tabId; 
                $tab->icon=$tabArg['icon'];           
                foreach($languages as $lang){
                        $tab->name[$lang['id_lang']] = $tabArg['tab_name'];
                }
                $tab->save();
            }                
        }            
        return true;
    }
    private function _uninstallTabs()
    {
        if($this->pres_version==1.4)
            return true;
        $tabs = array('AdminPresToPresFree','AdminPresToPresFreeGeneral','AdminPresToPresFreeImport','AdminPresToPresFreeHistory','AdminPresToPresFreeHelp','AdminPresToPresFreeClean');
        if($tabs)
        foreach($tabs as $classname)
        {
            if($tabId = Tab::getIdFromClassName($classname))
            {
                $tab = new Tab($tabId);
                if($tab)
                    $tab->delete();
            }                
        }
        return true;
    }
    private function _uninstallDb()
    {
        if(Module::isInstalled('ets_pres2pres'))
            return true;
        foreach (glob(dirname(__FILE__).'/cache/export/*.*') as $filename) {
            if($filename!=dirname(__FILE__).'/cache/export/index.php')
                @unlink($filename);
        }
        foreach (glob(dirname(__FILE__).'/cache/import/*.*') as $filename) {
            if($filename!=dirname(__FILE__).'/cache/import/index.php')
                @unlink($filename);
        }
        foreach (glob(dirname(__FILE__).'/xml/*',GLOB_ONLYDIR) as $folder) { 
            foreach (glob($folder.'/*.*') as $filename) {
                @unlink($filename);
            }
            @rmdir($folder);
        }
        $res = Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ets_pres2pres_export_history`');
        $res &= Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ets_pres2pres_import_history`');
        $res &= Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ets_pres2pres_customer_pasword`');
        $res &= Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ets_pres2pres_employee_pasword`');
        if($this->tables)
        {
            foreach($this->tables as $table)
            {
                $res &= Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ets_pres2pres_'.pSQL($table).'_import`');
            }
        }
        return $res;
    }    
    public function getContent()
	{
	   @ini_set('display_errors', 'off');
       if(!defined('PS_INSTALLATION_IN_PROGRESS'))
        {
            define('PS_INSTALLATION_IN_PROGRESS',1);
        }
        if(!$this->active)
            return '';
	   if($this->pres_version==1.4)
       {
            if(Tools::getValue('presconnector') && Tools::getValue('zip_file_name')&&Tools::getValue('ajaxPercentageExport')&&Tools::getValue('link_site'))
            {
                $url = Tools::getValue('link_site').(strpos(Tools::getValue('link_site'),'?')===false ? '?' :'&').'presconnector=1&ajaxPercentageExport=1&zip_file_name='.Tools::getValue('zip_file_name');
                $content = Tools::file_get_contents($url);
                die($content);
            }
            if(Tools::getValue('presconnector') && Tools::getValue('pres2prestocken') && Tools::getValue('zip_file_name') && Tools::getValue('link_site'))
            {
                $url = Tools::getValue('link_site').(strpos(Tools::getValue('link_site'),'?')===false ? '?' :'&').'presconnector=1&pres2prestocken='.Tools::getValue('pres2prestocken').'&zip_file_name='.Tools::getValue('zip_file_name');
                $content = Tools::file_get_contents($url);
                if($content)
                {
                    $content= Tools::jsonDecode($content);
                    if(!is_array($content))
                        $content =(array)$content;
                    if(is_array($content))
                    {
                        if(isset($content['link_site_connector']) && $content['link_site_connector'])
                        {
                            die(Tools::jsonEncode($content));
                        }
                    }
                }
                die(
                    Tools::jsonEncode(
                        array(
                            'tieptuc'=>true,
                        )
                    )
                );
            }
            include(dirname(__FILE__).'/importer.php');
            if(Tools::isSubmit('ajax_percentage_import'))
            {
                if (ob_get_length() > 0) {
                    ob_end_clean();
                }
                $this->processAjaxImport();
            }
            if(Tools::isSubmit('ajax_change_data_import'))
            {
                if (ob_get_length() > 0) {
                    ob_end_clean();
                }
                $id_import_history = $this->context->cookie->id_import_history;
                $importHistory = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);
                if($importHistory['file_name'] &&  file_exists(dirname(__FILE__).'/cache/import/'.$importHistory['file_name'].'.zip'))
                    @unlink(dirname(__FILE__).'/cache/import/'.$importHistory['file_name'].'.zip');
                foreach (glob(dirname(__FILE__).'/xml/'.$importHistory['file_name'].'/*.*') as $filename) {
                    @unlink($filename);
                }
                @rmdir(dirname(__FILE__).'/xml/'.$importHistory['file_name']);
                Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'ets_pres2pres_import_history set file_name="" WHERE id_import_history="'.(int)$id_import_history.'"');
                die(
                    Tools::jsonEncode(
                        array(
                            'upload_form'=>$this->displayFromUloadLoad(),
                        )
                    )
                );
            }
            $step=Tools::getValue('step');
            $this->context->smarty->assign(
                array(
                    'token' =>Tools::getValue('token'),
                    'tabmodule'=>Tools::getValue('tabmodule'),
                    'dir_path'=> $this->_path,
                    'step' => isset($step) && (int)$step?(int)$step:1,
                    'errors' => $this->_errors,
                    'ets_pres2pres_export' =>Tools::isSubmit('submitExport')? Tools::getValue('data_export',array()):explode(',',Configuration::get('ETS_PRES2PRES_EXPORT')),
                    'ets_pres2pres_format' => Configuration::get('ETS_PRES2PRES_FORMAT'),
                )
            );
            $this->_html = $this->display(__FILE__,'views/templates/hook/admin_left_block.tpl');
            if(!Tools::getValue('tabmodule')||Tools::getValue('tabmodule')=='import')
            {
                $this->processAssignImport();
                return $this->_html.$this->display(__FILE__,'views/templates/hook/admin_import.tpl');
            }
            elseif(Tools::getValue('tabmodule')=='history')
            {
                if(Tools::isSubmit('deleteimporthistory')&&Tools::isSubmit('id_import_history') && $id_import_history=Tools::getValue('id_import_history'))
                {
                    $file_name= Db::getInstance()->getValue('SELECT file_name FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);
                    if(file_exists(dirname(__FILE__).'/cache/import/'.$file_name.'.zip'))
                        @unlink(dirname(__FILE__).'/cache/import/'.$file_name.'.zip');
                    foreach (glob(dirname(__FILE__).'/cache/import/'.$file_name.'/*.*') as $filename) {
                        @unlink($filename);
                    }
                    @rmdir(dirname(__FILE__).'/cache/import/'.$file_name);
                    Db::getInstance()->Execute('DELETE FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);
                    Tools::redirectAdmin('index.php?tab=AdminModules&configure=ets_pres2pres&token='.Tools::getValue('token').'&tab_module=front_office_features&module_name=ets_pres2pres&tabmodule=history&conf=1&tabhistory=import');
                }
                $this->assignHistory();
                return $this->_html.$this->display(__FILE__,'views/templates/hook/admin_history.tpl');
            }
            elseif(Tools::getValue('tabmodule')=='help')
            {
                return $this->_html.$this->display(__FILE__,'views/templates/hook/admin_help.tpl');
            }
            elseif(Tools::getValue('tabmodule')=='clear_up')
            {
                $this->processClean();
                return $this->_html.$this->display(__FILE__,'views/templates/hook/admin_clear.tpl');
            }
       }
       else
       {
            $token=Tools::getAdminTokenLite('AdminPresToPresFreeImport');
            Tools::redirectAdmin('index.php?controller=AdminPresToPresFreeImport&token='.$token);
       }
    }
    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/admin-icon.css','all');
        if (version_compare(_PS_VERSION_, '1.7.4', '>='))
            $this->context->controller->addCSS($this->_path . 'views/css/ps1.7.4.css','all'); 
        if(Tools::isSubmit('controller') && (Tools::getValue('controller')=='AdminPresToPresFreeImport'||Tools::getValue('controller')=='AdminPresToPresFreeHistory') || Tools::getValue('controller')=='AdminPresToPresGeneral' || Tools::getValue('controller')=='AdminPresToPresFreeHelp' || Tools::getValue('controller')=='AdminPresToPresFreeClean')
        {
            $this->context->controller->addCSS($this->_path.'views/css/pres2pres.admin.css','all');
            if($this->pres_version==1.5)
            {
                $this->context->controller->addCSS($this->_path.'views/css/font-awesome.css','all');
                $this->context->controller->addCSS($this->_path.'views/css/fic14.css','all');
            }
            $this->context->controller->addJquery();    
            $this->context->controller->addJS($this->_path.'views/js/pres2pres.admin.js');
            $this->context->controller->addJS($this->_path.'views/js/easytimer.min.js');
            $this->context->controller->addJS($this->_path.'views/js/tree.js');
        }
    }
    public function getNewID($table_import,$id_old)
    {
        return (int)Db::getInstance()->getValue('SELECT id_new FROM '._DB_PREFIX_.'ets_pres2pres_'.pSQL($table_import).'_import WHERE id_old='.(int)$id_old.' AND id_import_history="'.(int)$this->context->cookie->id_import_history.'"');
    }     
    public function displayError($error)
    {
        $this->context->smarty->assign(
            array(
                'ybc_errors'=>$error,
            )
        );
        return $this->display(__FILE__,'views/templates/hook/errors.tpl');
    }  
    public function displayUploadSussecfull($file_name,$file_size)
    {
        $this->context->smarty->assign(
            array(
                'file_name'=>$file_name,
                'file_size'=>$file_size,
            )
        );
        return $this->display(__FILE__,'upload_sussecfully.tpl');
    }
    public function displayPopupHtml()
    {
        $id_import_history = $this->context->cookie->id_import_history;
        if($id_import_history)
        {
            $import_history = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);;
            $xml = simplexml_load_file(dirname(__FILE__).'/xml/'.$import_history['file_name'].'/DataInfo.xml');
            $export_datas= explode(',',(string)$xml->exporteddata);
            $this->context->smarty->assign(
                array(
                    'assign'=>$this->getInformationImport($export_datas,$xml),
                    'export_datas'=>$export_datas,
                    'ets_pres2pres_import' =>explode(',',$import_history['data']),
                )
            );
            return $this->display(__FILE__,'views/templates/hook/popup_import.tpl');
        }
    }
    public function displayFromStep($step)
    {
        $id_import_history = $this->context->cookie->id_import_history;
        if($id_import_history)
        {
            $import_history = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);;
            $xml = simplexml_load_file(dirname(__FILE__).'/xml/'.$import_history['file_name'].'/DataInfo.xml');
            $export_datas= explode(',',(string)$xml->exporteddata);
            $this->context->smarty->assign(
                array(
                    'assign'=>$this->getInformationImport($export_datas,$xml),
                    'export_datas'=>$export_datas,
                    'link_sites'=> isset($xml->link_site) ? explode(',',(string)$xml->link_site):array('domain.com'),
                    'link_history'=>'index.php?controller=AdminPresToPresFreeHistory&token='.Tools::getAdminTokenLite('AdminPresToPresFreeHistory'),
                    'vertion'=> isset($xml->pres_version)?(string)$xml->pres_version:'',
                    'platform'=> isset($xml->platform)?(string)$xml->platform:'Prestashop',
                    'OLD_COOKIE_KEY'=>isset($xml->cookie_key)?(string)$xml->cookie_key:'',
                    'ets_pres2pres_import' =>explode(',',$import_history['data']),
                    'ets_pres2pres_import_delete' =>$import_history['delete_before_importing'],
                    'ets_pres2pres_import_multi_shop' => (int)$import_history['import_multi_shop'],
                    'ets_pres2pres_import_force_all_id' => (int)$import_history['force_all_id_number'],
                    'ets_regenerate_customer_passwords'=>Configuration::get('ETS_PRES2PRES_NEW_PASSWD'),
                    'version_wp' => isset( $xml->version_wp)? $xml->version_wp:'',
                    'version_woo' => isset( $xml->version_woo)? $xml->version_woo:'',
                    'resumeImport' => Tools::isSubmit('resumeImport'),
                    'pres_version' => _PS_VERSION_,
                )
            );
            switch ($step) {
                case 1:
                    $fileSize=filesize(dirname(__FILE__).'/cache/import/'.$import_history['file_name'].'.zip')/1024;
                    $this->context->smarty->assign(
                        array(
                            'file_name'=>$import_history['file_name'],
                            'file_size'=>$fileSize>1024 ? round($fileSize/1024,2).'MB'  : round($fileSize,2).'Kb',
                        )
                    );
                    return $this->display(__FILE__,'views/templates/hook/upload_sussecfully.tpl');
                case 2:
                       return $this->display(__FILE__,'views/templates/hook/import_step2.tpl'); 
                case 3:
                    if(in_array('products',$export_datas) && (int)$xml->countproduct)
                    {
                        $root_id=Db::getInstance()->getValue('SELECT id_category from '._DB_PREFIX_.'category where id_parent=0');
                        $categoriesTree = $this->getCategoriesTree($root_id,false);
                        $depth_level =-1;
                        $this->getCategoriesDropdown($categoriesTree,$depth_level,$import_history['id_category_default']);  
                        $categoryotpionsHtml = $this->categoryDropDown;
                        $suppliers = Db::getInstance()->executeS('SELECT s.id_supplier,s.name FROM '._DB_PREFIX_.'supplier s INNER JOIN '._DB_PREFIX_.'supplier_shop ss ON (s.id_supplier = ss.id_supplier AND ss.id_shop="'.(int)$this->context->shop->id.'") GROUP  BY s.id_supplier');
                        $manufacturers = Db::getInstance()->executeS('SELECT m.id_manufacturer, m.name FROM '._DB_PREFIX_.'manufacturer m, '._DB_PREFIX_.'manufacturer_shop ms WHERE m.id_manufacturer= ms.id_manufacturer AND ms.id_shop="'.(int)$this->context->shop->id.'"');
                        $this->context->smarty->assign(
                            array(
                                'categoryotpionsHtml'=>$categoryotpionsHtml,
                                'suppliers'=>$suppliers,
                                'manufacturers'=>$manufacturers,
                                'selected_id_supplier' =>$import_history['id_supplier'],
                                'selected_id_manufacturer'=>$import_history['id_manufacture'],
                                'import_product'=>1,
                            )
                        );
                    }
                    if(in_array('cms',$export_datas) && (int)$xml->countcms)
                    {
                        $id_root_cms_category = (int)Db::getInstance()->getValue('SELECT id_cms_category FROM '._DB_PREFIX_.'cms_category WHERE id_parent=0');
                        $cmscategoriesTree= $this->getCmsCategoriesTree($id_root_cms_category);
                        $depth_level =-1;
                        $this->getCMSCategoriesDropdown($cmscategoriesTree,$depth_level,$import_history['id_category_cms']);  
                        $cmsCategoryotpionsHtml = $this->cmsCategoryDropDown;
                        $this->context->smarty->assign(
                            array(
                                'import_cms'=>1,
                                'cmsCategoryotpionsHtml'=>$cmsCategoryotpionsHtml
                            )
                        );
                    }
                    return $this->display(__FILE__,'views/templates/hook/import_step3.tpl');
                case 4:
                {
                    if(!Configuration::get('ETS_PRES2PRES_NEW_PASSWD'))
                        Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'ets_pres2pres_import_history SET cookie_key="' .pSQL((string )$xml->cookie_key) . '" WHERE id_import_history='.(int)$id_import_history);
                    else
                        Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'ets_pres2pres_import_history SET cookie_key="" WHERE id_import_history='.(int)$id_import_history);
                    return $this->display(__FILE__,'views/templates/hook/import_step4.tpl');
                } 
                 case 5:
                 {
                    $new_passwd_customer = count(Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_customer_pasword WHERE id_import_history='.(int)$id_import_history));
                    $new_passwd_employee = count(Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_employee_pasword WHERE id_import_history='.(int)$id_import_history));
                    $this->cleanForderImported($id_import_history);
                    $import_history = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);;
                    $this->context->smarty->assign(
                        array(
                            'new_passwd_customer'=>$new_passwd_customer,
                            'new_passwd_employee'=>$new_passwd_employee,
                            'id_import_history'=>$id_import_history,
                            'OLD_COOKIE_KEY'=>$import_history['cookie_key'],
                            'error_log' => file_exists(dirname(__FILE__).'/xml/'.$import_history['file_name'].'/errors.log') ? $this->_path.'/xml/'.$import_history['file_name'].'/errors.log':'',
                        )
                    );
                    return $this->display(__FILE__,'views/templates/hook/import_step5.tpl');
                 }
                    
            }
        }
        
    }
    public function hookPres2PresLeftBlok()
    {
        if(Tools::isSubmit('controller') && (Tools::getValue('controller')=='AdminPresToPresFreeImport'||Tools::getValue('controller')=='AdminPresToPresFreeHistory') || Tools::getValue('controller')=='AdminPresToPresFreeGeneral' || Tools::getValue('controller')=='AdminPresToPresFreeHelp' || Tools::getValue('controller')=='AdminPresToPresFreeClean')
        {
            $this->context->smarty->assign(
                array(
                    'controller'=>Tools::getValue('controller'),
                    'link'=>$this->context->link,
                )
            );
            return $this->display(__FILE__,'left_block.tpl');
        }
    }
    public function displayFromUloadLoad()
    {
        $this->context->smarty->assign(
            array(
                'id_import_history'=>$this->context->cookie->id_import_history,
            )
        );
        return $this->display(__FILE__,'views/templates/hook/upload_form.tpl');
    }
    public function getCategoriesTree($id_root, $active = true, $id_lang = null)
    {
        $tree = array();
        if(is_null($id_lang))
            $id_lang = (int)$this->context->language->id;
        $sql = "SELECT c.id_category, cl.name
                FROM "._DB_PREFIX_."category c
                LEFT JOIN "._DB_PREFIX_."category_lang cl ON c.id_category = cl.id_category AND cl.id_lang = ".(int)$id_lang."
                WHERE c.id_category = ".(int)$id_root." ".($active ? " AND  c.active = 1" : "")." GROUP BY c.id_category";
        if($category = Db::getInstance()->getRow($sql))
        {            
            $cat = array(
                            'id_category' => $id_root,
                            'name' => $category['name']
                        );            
            $children = $this->getChildrenCategories($id_root, $active, $id_lang);
            $temp = array();
            if($children)
            {
                foreach($children as $child)
                {
                    $arg = $this->getCategoriesTree($child['id_category'], $active, $id_lang);
                    if($arg && isset($arg[0]))
                        $temp[] = $arg[0];
                }                    
            }
            $cat['children'] = $temp;
            $tree[] = $cat;
        }
        return $tree;            
    }
    public function getChildrenCategories($id_root, $active = true, $id_lang = null)
    {
        if(is_null($id_lang))
            $id_lang = (int)$this->context->language->id;
        $sql = "SELECT c.id_category, cl.name
                FROM "._DB_PREFIX_."category c
                LEFT JOIN "._DB_PREFIX_."category_lang cl ON c.id_category = cl.id_category AND cl.id_lang = ".(int)$id_lang."
                WHERE c.id_parent = ".(int)$id_root." ".($active ? " AND  c.active = 1" : "")." GROUP BY c.id_category";
        return Db::getInstance()->executeS($sql);
    }
    public function displayOption($selected_category,$id_category,$depth_level,$levelSeparator,$name)
    {
        $this->context->smarty->assign(array(
            'selected_category' => $selected_category,
            'id_category' => $id_category,
            'depth_level' => $depth_level,
            'levelSeparator' => $levelSeparator,
            'name' => $name,
        ));
        return $this->display(__FILE__,'views/templates/hook/option.tpl');
    }
    public function getCategoriesDropdown($categories, &$depth_level = -1,$selected_category=0)
    {        
        if($categories)
        {
            $depth_level++;
            foreach($categories as $category)
            {
                if((!$this->depthLevel || $this->depthLevel && (int)$depth_level <= $this->depthLevel))
                {
                    $levelSeparator = '';
                    if($depth_level >= 2)
                    {
                        for($i = 1; $i <= $depth_level-1; $i++)
                        {
                            $levelSeparator .= $this->categoryPrefix;
                        }
                    }       
                    if(isset($category['id_category'])&&$category['id_category'] > 1)
                        $this->categoryDropDown .= $this->displayOption((int)$selected_category,(int)$category['id_category'],$depth_level,$levelSeparator,$category['name']);
                    if(isset($category['children']) && $category['children'])
                    {                        
                        $this->getCategoriesDropdown($category['children'], $depth_level,$selected_category);
                    }   
                }                                 
            } 
            $depth_level--;           
        }
    }
    public function getCmsCategoriesTree($id_root,$active=true,$id_lang=null)
    {
        $tree = array();
        if(is_null($id_lang))
            $id_lang = (int)$this->context->language->id;
        $sql = "SELECT c.id_cms_category, cl.name
                FROM "._DB_PREFIX_."cms_category c
                LEFT JOIN "._DB_PREFIX_."cms_category_lang cl ON c.id_cms_category = cl.id_cms_category AND cl.id_lang = ".(int)$id_lang."
                WHERE c.id_cms_category = ".(int)$id_root." ".($active ? " AND  c.active = 1" : "")." GROUP BY c.id_cms_category";
        if($category = Db::getInstance()->getRow($sql))
        {            
            $cat = array(
                            'id_cms_category' => $id_root,
                            'name' => $category['name']
                        );            
            $children = $this->getChildrenCSMCategories($id_root, $active, $id_lang);
            $temp = array();
            if($children)
            {
                foreach($children as $child)
                {
                    $arg = $this->getCmsCategoriesTree($child['id_cms_category'], $active, $id_lang);
                    if($arg && isset($arg[0]))
                        $temp[] = $arg[0];
                }                    
            }
            $cat['children'] = $temp;
            $tree[] = $cat;
        }
        return $tree; 
    }
    public function getChildrenCSMCategories($id_root, $active=true, $id_lang=null)
    {
        if(is_null($id_lang))
            $id_lang = (int)$this->context->language->id;
        $sql = "SELECT c.id_cms_category, cl.name
                FROM "._DB_PREFIX_."cms_category c
                LEFT JOIN "._DB_PREFIX_."cms_category_lang cl ON c.id_cms_category = cl.id_cms_category AND cl.id_lang = ".(int)$id_lang."
                WHERE c.id_parent = ".(int)$id_root." ".($active ? " AND  c.active = 1" : "")." GROUP BY c.id_cms_category";
        return Db::getInstance()->executeS($sql);
    }
    public function getCMSCategoriesDropdown($cmscategories, &$depth_level = -1,$selected_cms_category=0)
    {        
        if($cmscategories)
        {
            $depth_level++;
            foreach($cmscategories as $category)
            {
                if((!$this->depthLevel || $this->depthLevel && (int)$depth_level <= $this->depthLevel))
                {
                    $levelSeparator = '';
                    if($depth_level >= 2)
                    {
                        for($i = 1; $i <= $depth_level-1; $i++)
                        {
                            $levelSeparator .= $this->categoryPrefix;
                        }
                    }       
                    if($category['id_cms_category'] > 0)
                        $this->cmsCategoryDropDown .= $this->displayCSMOption((int)$selected_cms_category,(int)$category['id_cms_category'],$depth_level,$levelSeparator,$category['name']);
                    if(isset($category['children']) && $category['children'])
                    {                        
                        $this->getCMSCategoriesDropdown($category['children'], $depth_level,$selected_cms_category);
                    }   
                }                                 
            } 
            $depth_level--;           
        }
    }
    public function displayCSMOption($selected_cms_category,$id_cms_category,$depth_level,$levelSeparator,$name)
    {
        $this->context->smarty->assign(array(
            'selected_cms_category' => $selected_cms_category,
            'id_cms_category' => $id_cms_category,
            'depth_level' => $depth_level,
            'levelSeparator' => $levelSeparator,
            'name' => $name,
        ));
        return $this->display(__FILE__,'cmsoption.tpl');
    }
   public function assignHistory()
   {
        if(Tools::isSubmit('downloadpasscustomer') && Tools::isSubmit('id_import_history')&&$id_import_history=Tools::getValue('id_import_history'))
        {
            $customers= Db::getInstance()->executeS('SELECT first_name,last_name,email,passwd FROM '._DB_PREFIX_.'ets_pres2pres_customer_pasword WHERE id_import_history='.(int)$id_import_history);
            ob_get_clean();
            ob_start();
            $filename='list_new_customer_'.time().'.csv';
        	header('Content-Encoding: UTF-8');
        	header("Content-type: text/csv; charset=UTF-8");
        	header("Content-Disposition: attachment; filename=$filename");
        	header("Pragma: no-cache");
        	header("Expires: 0");
        	echo "\xEF\xBB\xBF";
        	$file = fopen('php://output', 'w');                              
        	  fputcsv($file, array('First name', 'Last name', 'Email','Password'));      
        	  foreach( $customers as $row) {
        		fputcsv($file, $row);              
        	  }
            exit(); 
        }
        if(Tools::isSubmit('downloadpassemployee') && Tools::isSubmit('id_import_history')&&$id_import_history=Tools::getValue('id_import_history'))
        {
            $employees= Db::getInstance()->executeS('SELECT first_name,last_name,email,passwd FROM '._DB_PREFIX_.'ets_pres2pres_employee_pasword WHERE id_import_history='.(int)$id_import_history);
            ob_get_clean();
            ob_start();
            $filename='list_new_employee_'.time().'.csv';
        	header('Content-Encoding: UTF-8');
        	header("Content-type: text/csv; charset=UTF-8");
        	header("Content-Disposition: attachment; filename=$filename");
        	header("Pragma: no-cache");
        	header("Expires: 0");
        	echo "\xEF\xBB\xBF";
        	$file = fopen('php://output', 'w');                              
        	  fputcsv($file, array('First name', 'Last name', 'Email','Password'));      
        	  foreach( $employees as $row) {
        		fputcsv($file, $row);              
        	  }
            exit();
        }
        $imports = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history ORDER BY date_import DESC');
        if($imports)
        {
            foreach($imports as $key=> &$import)
            {
                if(($import['file_name'] && file_exists(dirname(__FILE__).'/cache/import/'.$import['file_name'].'.zip'))|| (Module::isInstalled('ets_pres2pres') && $import['file_name'] && file_exists(_PS_MODULE_DIR_.'ets_pres2pres/cache/import/'.$import['file_name'].'.zip')))
                {
                    $import['import_ok'] = $this->cleanForderImported($import['id_import_history']);
                    $import['content'] = Db::getInstance()->getValue('SELECT content FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$import['id_import_history']);
                    $import['new_passwd_customer'] = count(Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_customer_pasword WHERE id_import_history='.(int)$import['id_import_history']));
                    $import['new_passwd_employee'] = count(Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_employee_pasword WHERE id_import_history='.(int)$import['id_import_history']));
                }
                else
                {
                    unset($imports[$key]);
                }
            }
        }
        $this->context->smarty->assign(
            array(
                'imports' =>$imports,
                'link' => $this->context->link,
                'tab_history' => Tools::getValue('tabhistory','import'),
                'pres2pres_import_last'=>Configuration::get('ETS_PRES2PRES_IMPORT_LAST'),
                'url_cache' => Tools::getShopDomainSsl(true).($this->pres_version!=1.4? Context::getContext()->shop->getBaseURI():__PS_BASE_URI__).'modules/ets_pres2presfree/cache/',
            )
        );
   }
   public function processAssignImport()
   {
        Configuration::updateValue('ETS_PRES2PRES_IMPORT','');
        if(Tools::isSubmit('restartImport') && $id_import_history=Tools::getValue('id_import_history'))
        {
            $importHistory = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);
            if(($importHistory['file_name'] && file_exists(dirname(__FILE__).'/cache/import/'.$importHistory['file_name'].'.zip'))|| (Module::isInstalled('ets_pres2pres') && $importHistory['file_name'] && file_exists(_PS_MODULE_DIR_.'ets_pres2pres/cache/import/'.$importHistory['file_name'].'zip')))
            {
                if($this->extractFileData($importHistory['file_name']))
                {
                    if($this->tables)
                    {
                        foreach($this->tables as $table)
                        {
                            Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'ets_pres2pres_'.pSQL($table).'_import where id_import_history="'.(int)$id_import_history.'"');
                        }
                    }
                    Configuration::updateValue('ETS_PRES2PRES_IMPORT',$importHistory['data']);
                    $this->context->smarty->assign(
                        array(
                            'form_step1'=>$this->displayFromStep(1),
                        )
                    );
                }  
            }
        }   
        if(Tools::isSubmit('resumeImport') && $id_import_history=Tools::getValue('id_import_history'))
        {
            if($id_import_history==(int)Configuration::get('ETS_PRES2PRES_IMPORT_LAST'))
            {
                $importHistory = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);
                if(Module::isInstalled('ets_pres2pres') && $importHistory['file_name'] && file_exists(_PS_MODULE_DIR_.'ets_pres2pres/cache/import/'.$importHistory['file_name'].'.zip') && file_exists(_PS_MODULE_DIR_.'ets_pres2pres/xml/'.$importHistory['file_name'].'/DataInfo.xml') && !file_exists(dirname(__FILE__).'/xml/'.$importHistory['file_name'].'/DataInfo.xml'))
                {
                    Pres2PresDataImport::copy_directory(_PS_MODULE_DIR_.'ets_pres2pres/xml/'.$importHistory['file_name'],dirname(__FILE__).'/xml/'.$importHistory['file_name']);
                }
                if($importHistory['file_name'] && file_exists(dirname(__FILE__).'/xml/'.$importHistory['file_name'].'/DataInfo.xml'))
                {
                    Configuration::updateValue('ETS_PRES2PRES_IMPORT',$importHistory['data']);
                    $this->context->cookie->id_import_history= $id_import_history;
                    $this->context->cookie->write();
                    if($importHistory['data'])
                    {
                        $step=3;
                        $this->context->smarty->assign(
                            array(
                                'form_step1'=>$this->displayFromStep(1),
                                'form_step2'=>$this->displayFromStep(2),
                                'form_step3'=>$this->displayFromStep($step),
                            )
                        );
                    }
                    else
                    {
                        $step=2;
                        $this->context->smarty->assign(
                            array(
                                'form_step1'=>$this->displayFromStep(1),
                                'form_step2'=>$this->displayFromStep(2)
                            )
                        );
                    }    
                }
                
            }
        }
        $this->context->smarty->assign(
            array(
                'step' => isset($step)&&(int)$step ? (int)$step:1,
                'errors' => $this->errors,
                'link' => Context::getContext()->link,
                'token'=>Tools::getValue('token'),
                'ETS_DT_MODULE_URL_AJAX' =>$this->_path.'ajax.php?token='.Tools::getAdminTokenLite('AdminModules'),
                'ets_pres2pres_import' =>Tools::isSubmit('submitImport')? Tools::getValue('data_import',array()):explode(',',Configuration::get('ETS_PRES2PRES_IMPORT')),
                'ets_pres2pres_import_delete' => isset($importHistory) ? $importHistory['delete_before_importing']:0,
                'ets_pres2pres_import_multi_shop' => isset($importHistory)?$importHistory['import_multi_shop']:0,
                'ets_pres2pres_import_force_all_id' => isset($importHistory)?$importHistory['import_multi_shop']:0,
            )
        );
   }
   public function extractFileData($file_name)
   {
        $savePath = dirname(__FILE__).'/cache/import/';
        $extractUrl = $savePath.$file_name.'.zip';
        if(!@file_exists($extractUrl))
        {
            if(Module::isInstalled('ets_pres2pres') && @file_exists(_PS_MODULE_DIR_.'ets_pres2pres/cache/import/'.$file_name.'.zip'))
                $extractUrl=_PS_MODULE_DIR_.'ets_pres2pres/cache/import/'.$file_name.'.zip';
            else
                $this->errors[] = $this->l('Zip file does not exist');
        }
        if(!$this->errors)
        {
            $zip = new ZipArchive();
            if($zip->open($extractUrl) === true)
            {
                if ($zip->locateName('DataInfo.xml') === false)
                {
                    $this->errors[] = $this->l('Data package is not valid Prestashop data file');                    
                    if($extractUrl)
                    {
                        @unlink($extractUrl);                        
                    }                      
                }
            }
            else
                $this->errors[] = $this->l('Cannot open zip file. It might be broken or damaged. You should also double check to make sure Prestashop Site URL and secure access token are correct');
        } 
        if(!$this->errors)
        {
            if(!is_dir(dirname(__FILE__).'/xml/'.$file_name.'/'))
                mkdir(dirname(__FILE__).'/xml/'.$file_name.'/',0755);
            if(!Tools::ZipExtract($extractUrl, dirname(__FILE__).'/xml/'.$file_name.'/'))
                $this->errors[] = $this->l('Cannot extract zip data');
        }        
        if(!$this->errors)
        {
            if($id_import_history=(int)Tools::getValue('id_import_history'))
            {
                $sql = 'UPDATE '._DB_PREFIX_.'ets_pres2pres_import_history SET file_name="'.pSQL($file_name).'",date_import=NOW(),currentindex=1,number_import2=0,number_import=0 WHERE id_import_history='.(int)$id_import_history;
                Db::getInstance()->Execute($sql);
                $this->context->cookie->id_import_history= $id_import_history;
                $this->context->cookie->write();
                Configuration::updateValue('ETS_PRES2PRES_IMPORT_LAST',$id_import_history);
                return true;
            }
            else
            {
                $data='shops,employees,categories,customers,manufactures,suppliers,carriers,cart_rules,catelog_rules,vouchers,products,orders,CMS_categories,CMS,page_cms,messages';
                $sql='INSERT INTO '._DB_PREFIX_.'ets_pres2pres_import_history (data,file_name,date_import,number_import,number_import2,currentindex,delete_before_importing,force_all_id_number) VALUES("'.pSQL($data).'","'.pSQL($file_name).'",NOW(),0,0,1,0,1)';
                Db::getInstance()->Execute($sql);
                $id_import_history=Db::getInstance()->Insert_ID();
                $this->context->cookie->id_import_history= $id_import_history;
                $this->context->cookie->write();
                Configuration::updateValue('ETS_PRES2PRES_IMPORT_LAST',$id_import_history);
                return true;
            }
        }
        else
        {
            if($extractUrl)
            {
                @unlink($extractUrl);                        
            }
            return false;
        }
             
    }
    public function processAjaxImport()
    {
        $id_import_history = $this->context->cookie->id_import_history;
        $import_history = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);
        if($id_import_history && file_exists(dirname(__FILE__).'/xml/'.$import_history['file_name'].'/DataInfo.xml'))
        {            
            $xml = simplexml_load_file(dirname(__FILE__).'/xml/'.$import_history['file_name'].'/DataInfo.xml');
            $export_datas= explode(',',(string)$xml->exporteddata);
            $pres2pres_import =explode(',',$import_history['data']);
            $total_imported=(int)$import_history['number_import'];
            $total_imported2=(int)$import_history['number_import2'];;
            Db::getInstance()->execute('update '._DB_PREFIX_.'ets_pres2pres_import_history set number_import2="'.(int)$total_imported.'"');
            $total = 0;
            $total = (int)$xml->countlang + (int)$xml->countcurrency + (int)$xml->countzone + (int)
                $xml->countcountry + (int)$xml->countstate;
            if (in_array('employees', $export_datas) && in_array('employees', $pres2pres_import)) {
                $total += (int)$xml->countemployee;
            }
            if (in_array('categories', $export_datas) && in_array('categories', $pres2pres_import)) {
                $total += (int)$xml->counttotalcategory;
            }
            if (in_array('manufactures', $export_datas) && in_array('manufactures', $pres2pres_import))
                $total += (int)$xml->countmanufacturer;
            if (in_array('suppliers', $export_datas) && in_array('suppliers', $pres2pres_import))
                $total += (int)$xml->countsupplier;
            if (in_array('products', $export_datas) && in_array('products', $pres2pres_import)) {
                $total += (int)$xml->counttotalproduct;
            }
            if (in_array('carriers', $export_datas) && in_array('carriers', $pres2pres_import)) {
                $total += (int)$xml->counttotalcarrier;;
            }
            if (in_array('cart_rules', $export_datas) && in_array('cart_rules', $pres2pres_import))
                $total += (int)$xml->countcartrule;
            if (in_array('catelog_rules', $export_datas) && in_array('catelog_rules', $pres2pres_import))
                $total += (int)$xml->countspecificpriceRule;
            if (in_array('customers', $export_datas) && in_array('customers', $pres2pres_import))
                $total += (int)$xml->counttotalcustomer;
            if (in_array('orders', $export_datas) && in_array('orders', $pres2pres_import))
                $total += (int)$xml->countorder + (int)$xml->countorderstate + (int)$xml->
                    countcart + (int)$xml->countorderdetail + (int)$xml->countorderinvoice + (int)$xml->
                    countorderslip + (int)$xml->countordercarrier + (int)$xml->countordercartrule + (int)
                    $xml->countorderhistory + (int)$xml->countordermessage + (int)$xml->
                    countorderpayment + (int)$xml->countorderreturn;
            $total =$total*2;
            if($total_imported && $total)
            {
                $percent=(float)round($total_imported*100/$total,2);
                die(
                    Tools::jsonEncode(
                        array(
                            'percent'=> $percent<100? $percent : 98,
                            'list_import_active'=>trim(Configuration::get('ETS_DT_IMPORT_ACTIVE'),','),
                            'speed' =>($total_imported > $total_imported2 ? ceil(($total_imported - $total_imported2) / 3): 1 ) ,
                            'table_importing' => Configuration::get('PS_PRES2PRES_IMPORTING'),
                            'totalItemImported'=> (int)$total_imported,
                        )
                    )
                );
            }
            else
                die(
                    Tools::jsonEncode(
                        array(
                            'percent'=> 1,
                        )
                    )
                );
        }
        else
        {
            die(
                Tools::jsonEncode(
                    array(
                        'percent'=> 1,
                    )
                )
            );
        }
   } 
   public function processImport($url = false)
   {
        if(!$url)
        {
            $file_name= 'oc2m_data_'.$this->genSecure(7);
            $savePath = dirname(__FILE__).'/cache/import/';
            if(@file_exists($savePath.$file_name.'.zip'))
                @unlink($savePath.$file_name.'.zip');
            $uploader = new Uploader('file_import');
            $uploader->setMaxSize(1048576000);
            $uploader->setAcceptTypes(array('zip'));        
            $uploader->setSavePath($savePath);
            $file = $uploader->process($file_name.'.zip');  
            if ($file[0]['error'] === 0) {
                if (!Tools::ZipTest($savePath.$file_name.'.zip')) 
                    $this->errors[] = $this->l('Zip file seems to be broken');
            } else {
                $this->errors[] = $file[0]['error'];
            }
            $this->extractFileData($file_name);   
        }
        else
        {
            $url = urldecode(trim($url));
            $parced_url = parse_url($url);
            if (!function_exists('http_build_url')) {
                if(version_compare(_PS_VERSION_, '1.6', '<'))
                    include_once(_PS_MODULE_DIR_.'ets_pres2presfree/classes/http_build_url.php');  
                else
                    require_once(_PS_TOOL_DIR_.'http_build_url/http_build_url.php');
            }
            $url = http_build_url('', $parced_url);
            $file_name= 'oc2m_data_'.$this->genSecure(7);
            $savePath = dirname(__FILE__).'/cache/import/';
            $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
            
            if(Pres2PresDataImport::copy($url,$savePath.$file_name.'.zip',$context))
            {
                $this->extractFileData($file_name);
            }
            else
                $this->errors[] = $this->l('Can not download data from source website. May be the source website is timed out. Please manually download data of source website using Prestashop Connector or <a href="'.$url.'" target="_blank" >click here</a> then select "Uplaod data file from computer" option to import the data into target website.');
        } 
        if($this->errors)
        {
            die(
                Tools::jsonEncode(
                    array(
                        'error'=>true,
                        'errors' => $this->displayError($this->errors),
                    )
                )
            );
        }    
    }
    public function processImportdata14()
    {
        $id_import_history = $this->context->cookie->id_import_history;
        $import_history = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$id_import_history);
        $file_name= $import_history['file_name'];
        Configuration::updateValue('ETS_DT_IMPORT_ACTIVE','');
        Configuration::updateValue('PS_ALLOW_HTML_IFRAME',1);
        if(!file_exists(dirname(__FILE__).'/xml/'.$file_name.'/DataInfo.xml'))
        {
            $this->errors[]=$this->l('Data import not vailidate');
            return false;
        }
        $import= new Pres2PresDataImport();
        $extra_Import= new Pres2PresExtraImport();
        $datas_import = explode(',',$import_history['data']);
        $import->importData14('Language','Language');
        $import->importData14('Currency','Currency');
        $xml = simplexml_load_file(dirname(__FILE__).'/xml/'.$file_name.'/DataInfo.xml');
        $id_currency_default_old= (int)$xml->id_currency_default;
        $id_currency_default= $this->getNewID('currency',$id_currency_default_old);
        if($id_currency_default)
            Configuration::updateValue('PS_CURRENCY_DEFAULT',(int)$id_currency_default);
        $foreign_key_country=array(
            'id_zone'=>array(
                'table_parent'=>'zone',
                'key'=>'id_zone',
            )
        );
        $import->importData14('Country','Country',$foreign_key_country);
        $foreign_key_state=array(
            'id_country'=>array(
                'table_parent'=>'country',
                'key'=>'id_country',
            ),
            'id_zone'=>array(
                'table_parent'=>'zone',
                'key'=>'id_zone',
            )
        );
        $import->importData14('State','State',$foreign_key_state);
        Configuration::updateValue('ETS_DT_IMPORT_ACTIVE','minor_data,');
        if(in_array('categories',$datas_import))
        {
            $import->importData14('Group','Group');
            $foreign_key_category = array(
                'id_parent' => array(
                    'table_parent' =>'category',
                    'key'=>'id_category',
                )
            );
            $import->importData14('Category','Category',$foreign_key_category);
            $extra_Import->importCategoryGroup(true);
            $import_acitve=Configuration::get('ETS_DT_IMPORT_ACTIVE');
            $import_acitve .='categories,';
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE',$import_acitve);
        }
        if(in_array('customers',$datas_import))
        {
            $import->importData14('Group','Group');
            $foreign_key_customer=array(
                'id_default_group' =>array(
                   'table_parent'=>'group',
                   'key' =>'id_group', 
                )
            );
            $import->importData14('Customer','Customer',$foreign_key_customer);
            $extra_Import->importCustomerGroup('customergroup');
            $foreign_key_address = array(
                'id_customer' =>array(
                    'table_parent'=>'customer',
                    'key'=>'id_customer'
                ),
                'id_manufacturer' =>array(
                    'table_parent' =>'manufacturer',
                    'key' =>'id_manufacturer',
                ),
                'id_supplier' =>array(
                    'table_parent'=>'supplier',
                    'key'=>'id_supplier'
                ),
                'id_country'=>array(
                    'table_parent'=>'country',
                    'key'=>'id_country'
                ),
                'id_state'=>array(
                    'table_parent'=>'state',
                    'key'=>'id_state'
                )
            );
            $import->importData14('Address','Address',$foreign_key_address);
            $import_acitve=Configuration::get('ETS_DT_IMPORT_ACTIVE');
            $extra_Import->importCategoryGroup(false);
            $import_acitve .='customers,';
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE',$import_acitve);
        }
        $this->addPaymentMethod();
        if(in_array('products',$datas_import))
        {
             $foreign_key_tag=array(
                'id_lang'=>array(
                    'table_parent'=>'lang',
                    'key'=>'id_lang'
                )
            );
            $import->importData14('Tag','Tag',$foreign_key_tag);
            $import->importData14('Tax','Tax');
            $import->importData14('TaxRulesGroup','TaxRulesGroup');
            $foreign_key_tax_rule = array(
                'id_tax_rules_group' => array(
                    'table_parent' =>'tax_rules_group',
                    'key'=>'id_tax_rules_group'
                ),
                'id_tax' => array(
                    'table_parent' =>'tax',
                    'key'=>'id_tax'
                ),
            );
            $import->importData14('TaxRule','TaxRule',$foreign_key_tax_rule);
            $foreign_key_product=array(
                'id_category_default' =>array(
                    'table_parent' =>'category',
                    'key' =>'id_category',
                ),
                'id_tax_rules_group' =>array(
                    'table_parent' =>'tax_rules_group',
                    'key' =>'id_tax_rules_group',
                ),
                'id_manufacturer'=>array(
                    'table_parent' =>'manufacturer',
                    'key'=>'id_manufacturer'
                ),
                'id_supplier' =>array(
                    'table_parent'=>'supplier',
                    'key'=>'id_supplier',  
                ),
            );
            $import->importData14('Product','Product',$foreign_key_product);
            $extra_Import->importProductCategory('categoryproduct');
            $extra_Import->importAccessory('accessory');
            $import->importData14('Feature','Feature');
            $foreign_key_feature_value = array(
                'id_feature' =>array(
                    'table_parent' =>'feature',
                    'key'=>'id_feature',
                )
            );
            $import->importData14('FeatureValue','FeatureValue',$foreign_key_feature_value);
            $extra_Import->importFeatureProduct('featureproduct');
            $import->importData14('AttributeGroup','AttributeGroup');
            $foreign_key_attribute = array(
                'id_attribute_group' =>array(
                    'table_parent'=> 'attribute_group',
                    'key' => 'id_attribute_group'
                ),
            );
            $import->importData14('Attribute','Attribute',$foreign_key_attribute);
            $foreign_key_product_attribute = array(
                'id_product' =>array(
                    'table_parent'=>'product',
                    'key' =>'id_product',  
                ),
            );
            $import->importData14('Combination','Combination',$foreign_key_product_attribute);
            $extra_Import->importProductAttributeCombination('productattributecombination');
            $foreign_key_image = array(
                'id_product'=>array(
                    'table_parent' =>'product',
                    'key' =>'id_product',
                ),
            );
            $import->importData14('Image','Image',$foreign_key_image);
             $foreign_key_specific_price = array(
                'id_product' =>array(
                    'table_parent'=>'product',
                    'key' =>'id_product',  
                ),
            );
            $import->importData14('SpecificPrice','SpecificPrice',$foreign_key_specific_price);
            $extra_Import->ImportProductAttributeImages('productattributeimage');
            $extra_Import->importProductTag('producttag');
            $import_acitve=Configuration::get('ETS_DT_IMPORT_ACTIVE');
            $currentindex= Db::getInstance()->getValue('SELECT currentindex FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$this->context->cookie->id_import_history);
            if(file_exists(dirname(__FILE__).'/xml/'.$file_name.'/StockAvailable.xml')||file_exists(dirname(__FILE__).'/xml/'.$file_name.'/StockAvailable_'.$currentindex.'.xml'))
            {
                $extra_Import->importDataQuantity14('StockAvailable');
            }
            $import_acitve .='products,';
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE',$import_acitve); 
        }
    }
    public function processImportdata()
    {
        $id_import_history = $this->context->cookie->id_import_history;
        $import_history = new Pres2PresImportHistory($id_import_history);
        $file_name= $import_history->file_name;
        Configuration::updateValue('ETS_PRES2PRES_IMPORTED',0);
        Configuration::updateValue('ETS_PRES2PRES_IMPORTED2',0);
        Configuration::updateValue('PS_ALLOW_HTML_IFRAME',1);
        Configuration::updateValue('ETS_DT_IMPORT_ACTIVE','');
        Configuration::updateValue('PS_PRODUCT_SHORT_DESC_LIMIT',10000);
        if(!file_exists(dirname(__FILE__).'/xml/'.$file_name.'/DataInfo.xml'))
        {
            $this->errors[]=$this->l('Data import not vailidate');
            return false;
        }
        $import= new Pres2PresDataImport();
        $extra_Import= new Pres2PresExtraImport();
        $datas_import = explode(',',$import_history->data);
        if(in_array('shops',$datas_import))
        {
            Configuration::updateValue('PS_MULTISHOP_FEATURE_ACTIVE',1);
            $tab = Tab::getInstanceFromClassName('AdminShopGroup');
            $tab->active = (bool)Configuration::get('PS_MULTISHOP_FEATURE_ACTIVE');
            $tab->update();
            $multishop=true;
            $import->importData('ShopGroup','ShopGroup',ShopGroup::$definition);
            $foreign_key_shop=array(
                'id_shop_group' =>array(
                    'table_parent' =>'shop_group',
                    'key' => 'id_shop_group'
                )
            );
            $import->importData('Shop','Shop',Shop::$definition,$foreign_key_shop,$multishop);
            $import_acitve=Configuration::get('ETS_DT_IMPORT_ACTIVE');
            $import_acitve .='shops,';
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE',$import_acitve);
        }
        else
            $multishop=false;
        $import->importData('Language','Language',Language::$definition);
        $import->importData('Currency','Currency',Currency::$definition,array(),$multishop);
        $import->importData('Zone','Zone',Zone::$definition,array(),$multishop);
        $foreign_key_country=array(
            'id_zone'=>array(
                'table_parent'=>'zone',
                'key'=>'id_zone',
            )
        );
        $import->importData('Country','Country',Country::$definition,$foreign_key_country,$multishop);
        $foreign_key_state=array(
            'id_country'=>array(
                'table_parent'=>'country',
                'key'=>'id_country',
            ),
            'id_zone'=>array(
                'table_parent'=>'zone',
                'key'=>'id_zone',
            )
        );
        $import->importData('State','State',State::$definition,$foreign_key_state,$multishop);
        if(!in_array('shops',$datas_import))
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE','minor_data,');
        if(in_array('categories',$datas_import))
        {
            $import->importData('Group','Group',Group::$definition,array(),$multishop);
            $foreign_key_category = array(
                'id_parent' => array(
                    'table_parent' =>'category',
                    'key'=>'id_category',
                )
            );
            $import->importData('Category','Category',Category::$definition,$foreign_key_category,$multishop);
            $extra_Import->importCategoryGroup(true);
            $import_acitve=Configuration::get('ETS_DT_IMPORT_ACTIVE');
            $import_acitve .='categories,';
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE',$import_acitve);
            Category::regenerateEntireNtree();
        }
        if(in_array('customers',$datas_import))
        {
            $import->importData('Group','Group',Group::$definition,array(),$multishop);
            $foreign_key_customer=array(
                'id_default_group' =>array(
                   'table_parent'=>'group',
                   'key' =>'id_group', 
                ),
                'id_lang' =>array(
                   'table_parent'=>'lang',
                   'key' =>'id_lang', 
                )
            );
            $import->importData('Customer','Customer',Customer::$definition,$foreign_key_customer,$multishop);
            $extra_Import->importCustomerGroup('customergroup');
            $foreign_key_address = array(
                'id_customer' =>array(
                    'table_parent'=>'customer',
                    'key'=>'id_customer'
                ),
                'id_manufacturer' =>array(
                    'table_parent' =>'manufacturer',
                    'key' =>'id_manufacturer',
                ),
                'id_supplier' =>array(
                    'table_parent'=>'supplier',
                    'key'=>'id_supplier'
                ),
                'id_country'=>array(
                    'table_parent'=>'country',
                    'key'=>'id_country'
                ),
                'id_state'=>array(
                    'table_parent'=>'state',
                    'key'=>'id_state'
                )
            );
            $import->importData('Address','Address',Address::$definition,$foreign_key_address,$multishop);
            $extra_Import->importCategoryGroup(false);
            $import_acitve=Configuration::get('ETS_DT_IMPORT_ACTIVE');
            $import_acitve .='customers,';
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE',$import_acitve);
        }
        $this->addPaymentMethod();
        if(in_array('products',$datas_import))
        {
            $foreign_key_tag=array(
                'id_lang'=>array(
                    'table_parent'=>'lang',
                    'key'=>'id_lang'
                )
            );
            $import->importData('Tag','Tag',Tag::$definition,$foreign_key_tag,$multishop);
            $import->importData('Tax','Tax',Tax::$definition,array(),$multishop);
            $import->importData('TaxRulesGroup','TaxRulesGroup',TaxRulesGroup::$definition,array(),$multishop);
            $foreign_key_tax_rule = array(
                'id_tax_rules_group' => array(
                    'table_parent' =>'tax_rules_group',
                    'key'=>'id_tax_rules_group'
                ),
                'id_tax' => array(
                    'table_parent' =>'tax',
                    'key'=>'id_tax'
                ),
                'id_country'=>array(
                    'table_parent'=>'country',
                    'key'=>'id_country'
                ),
                'id_state'=>array(
                    'table_parent'=>'state',
                    'key'=>'id_state'
                )
            );
            $import->importData('TaxRule','TaxRule',TaxRule::$definition,$foreign_key_tax_rule,$multishop);
            $foreign_key_product=array(
                'id_category_default' =>array(
                    'table_parent' =>'category',
                    'key' =>'id_category',
                ),
                'id_tax_rules_group' =>array(
                    'table_parent' =>'tax_rules_group',
                    'key' =>'id_tax_rules_group',
                ),
                'id_manufacturer'=>array(
                    'table_parent' =>'manufacturer',
                    'key'=>'id_manufacturer'
                ),
                'id_supplier' =>array(
                    'table_parent'=>'supplier',
                    'key'=>'id_supplier',  
                ),
            );
            
            $import->importData('Product','Product',Product::$definition,$foreign_key_product,$multishop);
            $extra_Import->importProductCategory('categoryproduct');
            $extra_Import->importAccessory('accessory');
            $extra_Import->importProductTag('producttag');
            $import->importData('Feature','Feature',Feature::$definition,array(),$multishop);
            $foreign_key_feature_value = array(
                'id_feature' =>array(
                    'table_parent' =>'feature',
                    'key'=>'id_feature',
                )
            );
            $import->importData('FeatureValue','FeatureValue',FeatureValue::$definition,$foreign_key_feature_value,$multishop);
            $extra_Import->importFeatureProduct('featureproduct');
            $import->importData('AttributeGroup','AttributeGroup',AttributeGroup::$definition,array(),$multishop);
            $foreign_key_attribute = array(
                'id_attribute_group' =>array(
                    'table_parent'=> 'attribute_group',
                    'key' => 'id_attribute_group'
                ),
            );
            $import->importData('Attribute','Attribute',Attribute::$definition,$foreign_key_attribute,$multishop);
            $foreign_key_product_attribute = array(
                'id_product' =>array(
                    'table_parent'=>'product',
                    'key' =>'id_product',  
                ),
            );
            $import->importData('Combination','Combination',Combination::$definition,$foreign_key_product_attribute,$multishop);
            $extra_Import->importProductAttributeCombination('productattributecombination');
            $extra_Import->importProductAttributeGenerator('product_attribute');
            $extra_Import->importProductSupplier('productsupplier');
            if(in_array('carriers',$datas_import))
            {
                $extra_Import->importProductCarrier('productcarrier');
            }
            $foreign_key_image = array(
                'id_product'=>array(
                    'table_parent' =>'product',
                    'key' =>'id_product',
                ),
            );
            $import->importData('Image','Image',Image::$definition,$foreign_key_image,$multishop);
            $extra_Import->ImportProductAttributeImages('productattributeimage');
            $foreign_key_specific_price = array(
                'id_product' =>array(
                    'table_parent'=>'product',
                    'key' =>'id_product',  
                ),
            );
            $import->importData('SpecificPrice','SpecificPrice',SpecificPrice::$definition,$foreign_key_specific_price,$multishop);
            Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'specific_price WHERE id_product=0');
            $currentindex= Db::getInstance()->getValue('SELECT currentindex FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$this->context->cookie->id_import_history);
            if(file_exists(dirname(__FILE__).'/xml/'.$file_name.'/StockAvailable.xml')||file_exists(dirname(__FILE__).'/xml/'.$file_name.'/StockAvailable_'.$currentindex.'.xml'))
            {
                $foreign_key_sotck_availible = array(
                    'id_product' =>array(
                        'table_parent'=>'product',
                        'key'=>'id_product'
                    ),
                    'id_product_attribute' =>array(
                        'table_parent'=>'product_attribute',
                        'key'=>'id_product_attribute'
                    ),
                    'id_shop' =>array(
                        'table_parent'=>'shop',
                        'key'=>'id_shop'
                    ),
                    'id_shop_group' =>array(
                        'table_parent'=>'shop_group',
                        'key'=>'id_shop_group'
                    ),
                );
                
                $import->importData('StockAvailable','StockAvailable',StockAvailable::$definition,$foreign_key_sotck_availible,$multishop);
            }
            else
            {
                if(!Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_stock_available_import where id_import_history='.(int)$id_import_history))
                {
                    $stockAvailables = Db::getInstance()->executeS('SELECT pa.id_product,pa.id_product_attribute,pas.id_shop,pa.quantity FROM '._DB_PREFIX_.'product_attribute pa,'._DB_PREFIX_.'product_attribute_shop pas WHERE pa.id_product_attribute =pas.id_product_attribute AND pa.id_product IN (SELECT id_new FROM '._DB_PREFIX_.'ets_pres2pres_product_import WHERE id_import_history='.(int)$id_import_history.') GROUP BY pa.id_product,pa.id_product_attribute,pas.id_shop');
                    if($stockAvailables)
                    {
                        foreach($stockAvailables as $stockAvailable)
                        {
                            if(Shop::getContext() == Shop::CONTEXT_ALL)
                            {
                                $shops= Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'shop');
                                foreach($shops as $shop)
                                {
                                    if($id_stock_available=Db::getInstance()->getValue('SELECT id_stock_available FROM '._DB_PREFIX_.'stock_available WHERE id_product="'.(int)$stockAvailable['id_product'].'" AND id_product_attribute="'.(int)$stockAvailable['id_product_attribute'].'" AND id_shop="'.(int)$shop['id_shop'].'"'))
                                    {
                                        $class_stock= new StockAvailable($id_stock_available);
                                        $class_stock->quantity= (int)$stockAvailable['quantity'];
                                        $class_stock->update();
                                    }
                                    else
                                    {
                                        $class_stock = new StockAvailable();
                                        $class_stock->id_product = (int)$stockAvailable['id_product'];
                                        $class_stock->id_product_attribute = (int)$stockAvailable['id_product_attribute'];
                                        $class_stock->quantity = (int)$stockAvailable['quantity'];
                                        $class_stock->id_shop = (int)$shop['id_shop'];
                                        $class_stock->out_of_stock=2;
                                        $class_stock->add();
                                    }
                                }
                            }
                            else
                            {
                                if($id_stock_available=Db::getInstance()->getValue('SELECT id_stock_available FROM '._DB_PREFIX_.'stock_available WHERE id_product="'.(int)$stockAvailable['id_product'].'" AND id_product_attribute="'.(int)$stockAvailable['id_product_attribute'].'" AND id_shop="'.(int)$stockAvailable['id_shop'].'"'))
                                {
                                    $class_stock= new StockAvailable($id_stock_available);
                                    $class_stock->quantity= (int)$stockAvailable['quantity'];
                                    $class_stock->update();
                                }
                                else
                                {
                                    $class_stock = new StockAvailable();
                                    $class_stock->id_product = (int)$stockAvailable['id_product'];
                                    $class_stock->id_product_attribute = (int)$stockAvailable['id_product_attribute'];
                                    $class_stock->quantity = (int)$stockAvailable['quantity'];
                                    $class_stock->id_shop = (int)$stockAvailable['id_shop'];
                                    $class_stock->out_of_stock=2;
                                    $class_stock->add();
                                }
                            }
                            
                        }
                    }
                }
                
            }
            if(version_compare(_PS_VERSION_, '1.6', '>='))
            {
                $foreign_key_customization_field= array(
                    'id_product' =>array(
                        'table_parent'=>'product',
                        'key'=>'id_product'
                    ), 
                );
                $import->importData('CustomizationField','CustomizationField',CustomizationField::$definition,$foreign_key_customization_field,$multishop);
            }
            $import_acitve=Configuration::get('ETS_DT_IMPORT_ACTIVE');
            $import_acitve .='products,';
            Configuration::updateValue('ETS_DT_IMPORT_ACTIVE',$import_acitve); 
            
        }
    }
    public function getInformationImport($export_datas,$xml)
    {
        $assign = array();
        if(in_array('shops',$export_datas))
            $assign['shops'] = (int)$xml->countshop;
        if(in_array('employees',$export_datas))
            $assign['employees'] = (int)$xml->countemployee;
        if(in_array('categories',$export_datas))
            $assign['categories'] = (int)$xml->countcategory;
        if(in_array('manufactures',$export_datas))
            $assign['manufactures'] = (int)$xml->countmanufacturer;
        if(in_array('suppliers',$export_datas))
            $assign['suppliers'] = (int)$xml->countsupplier;
        if(in_array('products',$export_datas))
            $assign['products'] = (int)$xml->countproduct;
        if(in_array('carriers',$export_datas))
            $assign['carriers'] = (int)$xml->countcarrier;
        if(in_array('cart_rules',$export_datas))
            $assign['cart_rules'] = (int)$xml->countcartrule;
        if(in_array('catelog_rules',$export_datas))
            $assign['catelog_rules'] = (int)$xml->countspecificpriceRule;
        if(in_array('vouchers',$export_datas))
            $assign['vouchers'] = (int)$xml->countvoucher;
        if(in_array('customers',$export_datas))
            $assign['customers'] = (int)$xml->countcustomer;
        if(in_array('orders',$export_datas))
            $assign['orders'] = (int)$xml->countorder;
        if(in_array('CMS_categories',$export_datas))
            $assign['CMS_categories'] = (int)$xml->countcmscategory;
        if(in_array('CMS',$export_datas))
            $assign['CMS'] = (int)$xml->countcms;
        if(in_array('page_cms',$export_datas))
            $assign['page_cms'] = (int)$xml->countpage;
        if(in_array('messages',$export_datas))
            $assign['messages'] = (int)$xml->countmessage;
        return $assign;
    }
    public function genSecure($size)
    {
        $chars = md5(time());
        $code = '';
        for ($i = 1; $i <= $size; ++$i)
        {
            $char= Tools::substr($chars, rand(0, Tools::strlen($chars) - 1), 1);
            if($char=='e')
                $char='a';
            $code .= $char;
        }
        return $code;
    }
    public static function upperFirstChar($t)
    {
        return Tools::ucfirst($t);
    }
    public function processClean()
    {
        $errors=array();
        if(Tools::isSubmit('submit_clear_history'))
        {
            $clear=Tools::getValue('ETS_DATAMATER_CLEAR');
            switch ($clear) {
                case 'last_hour':
                    $date=date('Y-m-d h:i:s',strtotime('-1 HOUR'));
                    break;
                case 'last_tow_hours':
                    $date=date('Y-m-d h:i:s',strtotime('-2 HOUR'));
                    break;
                case 'last_four_hours':
                    $date=date('Y-m-d h:i:s',strtotime('-4 HOUR'));
                    break;
                case 'today':
                    $date=date('Y-m-d');
                    break;
                case '1_week':
                    $date=date('Y-m-d',strtotime('-1 WEEK'));
                    break;
                case '1_month_ago':
                    $date=date('Y-m-d',strtotime('-1 MONTH'));
                    break;
                case '1_year_ago':
                    $date=date('Y-m-d h:i:s',strtotime('-4 YEAR'));
                    break;
                case 'everything':
                    $date='';
                    break;
            }
            $sql_import= 'SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history'.($date!='' ? ' WHERE date_import>="'.pSQL($date).'"':'');
            $imports = Db::getInstance()->executeS($sql_import);
            if($imports)
            {
                foreach($imports as $import)
                {
                    if($import['file_name'] &&  file_exists(dirname(__FILE__).'/cache/import/'.$import['file_name'].'.zip'))
                        @unlink(dirname(__FILE__).'/cache/import/'.$import['file_name'].'.zip');
                    foreach (glob(dirname(__FILE__).'/xml/'.$import['file_name'].'/*.*') as $filename) {
                        @unlink($filename);
                    }
                    @rmdir(dirname(__FILE__).'/xml/'.$import['file_name']);
                    Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'ets_pres2pres_import_history WHERE id_import_history='.(int)$import['id_import_history']);
                }
            }
        }
        $this->context->smarty->assign(
            array(
                'link'=>$this->context->link,
                'submit_clear_history'=> Tools::isSubmit('submit_clear_history'),
                'message_error'=> $errors ? $this->displayError($errors):false,
            )
        );   
    }
    public function cleanForderImported($id_history)
    {
        $sql_import= 'SELECT * FROM '._DB_PREFIX_.'ets_pres2pres_import_history where id_import_history='.(int)$id_history;
        $import = Db::getInstance()->getRow($sql_import);
        $currentindex = $import['currentindex'];
        $ok=true;
        if(!file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/DataInfo.xml'))
        {
            if(file_exists(_PS_MODULE_DIR_.'ets_pres2pres/xml/'.$import['file_name'].'/DataInfo.xml'))
                return false;
            return true;
        }
            
        $xml = simplexml_load_file(dirname(__FILE__).'/xml/'.$import['file_name'].'/DataInfo.xml');
        $data_exports= explode(',',(string)$xml->exporteddata);
        $contents =array();
        if(in_array('shops',$data_exports))
        {
            $countShop = Db::getInstance()->getValue('SELECT count(*) FROM '._DB_PREFIX_.'ets_pres2pres_shop_import where id_import_history="'.(int)$import['id_import_history'].'"');
            $contents[]=array(
                'title' => $this->l('Shops:'),
                'count'=>$countShop,
                'count_xml'=>(int)$xml->countshop,
            );
            if(file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Shop.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Shop_'.$currentindex.'.xml') || file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Shop_1.xml'))
                $ok=false;
        }
        if(in_array('categories',$data_exports))
        {
            $countCategory = Db::getInstance()->getValue('SELECT count(*) FROM '._DB_PREFIX_.'ets_pres2pres_category_import where id_import_history="'.(int)$import['id_import_history'].'"');
            $contents[]=array(
                'title' => $this->l('Categories:'),
                'count'=>$countCategory,
                'count_xml'=>(int)$xml->countcategory,
            );
            if(file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Category.xml') || file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Category_1.xml') || file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Category_'.$currentindex.'.xml'))
                $ok=false;
        }
        if(in_array('products',$data_exports))
        {
            $countProduct= Db::getInstance()->getValue('SELECT count(*) FROM '._DB_PREFIX_.'ets_pres2pres_product_import where id_import_history="'.(int)$import['id_import_history'].'"');
            $contents[]=array(
                'title' => $this->l('Products:'),
                'count'=>$countProduct,
                'count_xml'=>(int)$xml->countproduct,
            );
            if(file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Image.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Image_1.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Image_'.$currentindex.'.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Product.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Product_1.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Product_'.$currentindex.'.xml'))
                $ok=false;
        }
        if(in_array('customers',$data_exports))
        {
            $countCustomer = Db::getInstance()->getValue('SELECT count(*) FROM '._DB_PREFIX_.'ets_pres2pres_customer_import where id_import_history="'.(int)$import['id_import_history'].'"');
            $contents[]=array(
                'title' => $this->l('Customers:'),
                'count'=>$countCustomer,
                'count_xml'=>(int)$xml->countcustomer,
            );
            if(file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Customer.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Customer_1.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Customer_'.$currentindex.'.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Address.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Address_1.xml')||file_exists(dirname(__FILE__).'/xml/'.$import['file_name'].'/Address_'.$currentindex.'.xml'))
                $ok=false;
        }
        $this->context->smarty->assign(
            array(
                'contents'=>$contents,
            )
        );
        $content=$this->display(__FILE__,'views/templates/hook/contents.tpl');
        Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'ets_pres2pres_import_history SET content="'.pSQL($content,true).'" WHERE id_import_history='.(int)$id_history);
        if ($ok && !file_exists(dirname(__file__) . '/xml/' . $import['file_name'] .'/errors.log'))
        {
            foreach($this->tables as $table)
            {
                Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'ets_pres2pres_'.pSQL($table).'_import` WHERE id_import_history="'.(int)$id_history.'"');
            }
            foreach (glob(dirname(__FILE__).'/xml/'.$import['file_name'].'/*.*') as $filename) {
                @unlink($filename);
            }
            @rmdir(dirname(__FILE__).'/xml/'.$import['file_name']);
        }
        return $ok;
    }
    public function addPaymentMethod()
    {
        $modules = Module::getModulesOnDisk(true);
        if($modules)
        {
            foreach($modules as $module)
            {
                if($module->id && $module->tab=='payments_gateways')
                {
                    $countries= Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'country');
                    $groups= Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'group');
                    $currencies = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'currency');
                    if($this->pres_version!=1.4)
                    {
                        $shops= Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'shop');
                        if($countries)
                        {
                            foreach($countries as $country)
                            {
                                foreach($shops as $shop)
                                {
                                    if(!Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'module_country WHERE id_shop="'.(int)$shop['id_shop'].'" AND id_country ="'.(int)$country['id_country'].'" AND id_module='.(int)$module->id))
                                    {
                                        Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'module_country(id_country,id_module,id_shop) values("'.(int)$country['id_country'].'","'.(int)$module->id.'","'.(int)$shop['id_shop'].'")');
                                    }
                                }
                            }
                        }
                        if($currencies)
                        {
                            foreach($currencies as $currency)
                            {
                                foreach($shops as $shop)
                                {
                                    if(!Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'module_currency WHERE id_module="'.(int)$module->id.'" AND id_currency="'.(int)$currency['id_currency'].'" AND id_shop="'.(int)$shop['id_shop'].'"'))
                                    {
                                        Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'module_currency(id_module,id_currency,id_shop) values("'.(int)$module->id.'","'.(int)$currency['id_currency'].'","'.(int)$shop['id_shop'].'")');
                                    }
                                }
                            }
                        }
                        if($groups)
                        {
                            foreach($groups as $group)
                            {
                                foreach($shops as $shop)
                                {
                                    if(!Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'module_group where id_group="'.(int)$group['id_group'].'" AND id_shop="'.(int)$shop['id_shop'].'" AND id_module="'.(int)$module->id.'"'))
                                    {
                                        Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'module_group (id_module,id_group,id_shop) values("'.(int)$module->id.'","'.(int)$group['id_group'].'","'.(int)$shop['id_shop'].'")');
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        if($countries)
                        {
                            foreach($countries as $country)
                            {
                                if(!Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'module_country WHERE id_country ="'.(int)$country['id_country'].'" AND id_module='.(int)$module->id))
                                {
                                    Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'module_country(id_country,id_module) values("'.(int)$country['id_country'].'","'.(int)$module->id.'")');
                                }
                            }
                        }
                        if($currencies)
                        {
                            foreach($currencies as $currency)
                            {
                                if(!Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'module_currency WHERE id_module="'.(int)$module->id.'" AND id_currency="'.(int)$currency['id_currency'].'"'))
                                {
                                    Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'module_currency(id_module,id_currency) values("'.(int)$module->id.'","'.(int)$currency['id_currency'].'")');
                                }
                            }
                        }
                        if($groups)
                        {
                            foreach($groups as $group)
                            {
                                if(!Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'module_group where id_group="'.(int)$group['id_group'].'" AND id_module="'.(int)$module->id.'"'))
                                {
                                    Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'module_group (id_module,id_group) values("'.(int)$module->id.'","'.(int)$group['id_group'].'")');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    public function displayIframe()
    {
        switch($this->context->language->iso_code) {
            case 'en':
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'it':
                $url = 'https://cdn.prestahero.com/it/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'fr':
                $url = 'https://cdn.prestahero.com/fr/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            case 'es':
                $url = 'https://cdn.prestahero.com/es/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
                break;
            default:
                $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
        }
        $this->smarty->assign(
            array(
                'url_iframe' => $url
            )
        );
        return $this->display(__FILE__,'iframe.tpl');
    }
}