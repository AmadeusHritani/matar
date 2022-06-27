<?php
/**
 * 2007-2022 ETS-Soft
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
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

if (!defined('_PS_VERSION_'))
    exit;
require_once(dirname(__FILE__) . '/classes/ph_pcms_defines.php');
require_once(dirname(__FILE__) . '/classes/ph_pcms_obj.php');
require_once(dirname(__FILE__) . '/classes/ph_pcms_product.php');
require_once(dirname(__FILE__) . '/classes/ph_pcms_paggination_class.php');
class Ph_products_cms extends Module
{
    public $is17 =false;
    public $html = '';
    public $_errors =array();
    public $hooks = array(
        'displayBackOfficeHeader',
        'displayHeader',
        'actionOutputHTMLBefore',
    );
    public function __construct()
    {
        $this->name = 'ph_products_cms';
        $this->tab = 'front_office_features';
        $this->version = '1.0.4';
        $this->author = 'ETS-Soft';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;
        parent::__construct();
		$this->module_key = '7a77b0a666933ff72256b7e373193511';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->module_dir = $this->_path;
        $this->displayName = $this->l('Products on CMS or anywhere');
        $this->description = $this->l('Display selected products on CMS pages, product description, or .tpl file using short code.');
$this->refs = 'https://prestahero.com/';
        if(version_compare(_PS_VERSION_, '1.7', '>='))
            $this->is17 = true;
    }
    public function install()
    {
        return parent::install() && $this->_installHooks() &&  $this->installDb();
    }
    public function unInstall()
    {
        return parent::unInstall() && $this->_unInstallHooks() && $this->unInstallDb();
    }
    public function _installHooks()
    {
        foreach($this->hooks as $hook)
            $this->registerHook($hook);
        return true;
    }
    public function _unInstallHooks()
    {
        foreach($this->hooks as $hook)
            $this->unRegisterHook($hook);
        return true;
    }
    public function installDb()
    {
        return Ph_pcms_defines::getInstance()->installDb();
    }
    public function unInstallDb()
    {
        return Ph_pcms_defines::getInstance()->unInstallDb();
    }
    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/slick.css', 'all');
        $this->context->controller->addCSS($this->_path . 'views/css/front.css', 'all');
        $this->context->controller->addJS($this->_path . 'views/js/slick.js');
        $this->context->controller->addJS($this->_path . 'views/js/front.js');
    }
    public function hookDisplayBackOfficeHeader()
    {
        $controller = Tools::getValue('controller');
        $configure = Tools::getValue('configure'); 
        if(($controller=='AdminModules' && $configure== $this->name))
        {
            $this->context->controller->addCSS($this->_path.'views/css/admin.css');
            if (version_compare(_PS_VERSION_, '1.7.6.0', '>=') && version_compare(_PS_VERSION_, '1.7.7.1', '<') )
                $this->context->controller->addJS(_PS_JS_DIR_ . 'jquery/jquery-'.(version_compare(_PS_VERSION_, '1.7.7.0', '>=') ?'3.4.1':_PS_JQUERY_VERSION_ ).'.min.js');
            else
                $this->context->controller->addJquery();
            $this->context->controller->addJS($this->_path.'views/js/admin.js');
        }
    }
    public function submitSaveCmsProduct()
    {
        $id_ph_pcms_product = (int)Tools::getValue('id_ph_pcms_product');
        if($id_ph_pcms_product)
            $cmsProduct = new Ph_pcms_product($id_ph_pcms_product);
        else
            $cmsProduct = new Ph_pcms_product();
        $save = $cmsProduct->saveData();
        if(isset($save['errors']) && $save['errors'])
            $this->html .= $this->displayError($save['errors']);
        elseif(isset($save['success']) && $save['success'])
        {
            $this->context->cookie->_success = $this->l('Save successfully');
            if(Tools::isSubmit('btnSubmitProductCmsStay'))
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&editcms_product=1&id_ph_pcms_product='.$cmsProduct->id);
            else
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->name);
        }
    }
    public function hookActionOutputHTMLBefore($params)
    {
        if (isset($params['html']) && $params['html'])
        {
            $params['html'] = $this->doShortcode($params['html']);
        }
    }
    public function getContent()
    {
        if(Tools::isSubmit('submitBulkEnabled') && ($ids = Tools::getValue('bulk_action_selected_products_cms')) && is_array($ids) && self::validateArray($ids) )
        {
            Ph_pcms_defines::submitBulkEnabled($ids);
            $this->context->cookie->_success = $this->l('Updated successfully');
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->name);
        }
        if(Tools::isSubmit('submitBulkDiasabled') && ($ids = Tools::getValue('bulk_action_selected_products_cms')) && is_array($ids) && self::validateArray($ids) )
        {
            Ph_pcms_defines::submitBulkDiasabled($ids);
            $this->context->cookie->_success = $this->l('Updated successfully');
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->name);
        }
        if(Tools::isSubmit('submitBulkDelete') && ($ids = Tools::getValue('bulk_action_selected_products_cms'))&& is_array($ids) && self::validateArray($ids) )
        {
            Ph_pcms_defines::submitBulkDelete($ids);
            $this->context->cookie->_success = $this->l('Updated successfully');
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->name);
        }
        if(Tools::isSubmit('change_enabled') && ($id_ph_pcms_product = (int)Tools::getValue('id_ph_pcms_product')))
        {
            $change_enabled = (int)Tools::getValue('change_enabled');
            $productCms = new Ph_pcms_product($id_ph_pcms_product);
            $productCms->active = $change_enabled;
            if($productCms->update())
            {
                $this->context->cookie->_success = $this->l('Updated successfully');
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->name);
            }
        }
        if(Tools::isSubmit('del') && ($id_ph_pcms_product=(int)Tools::getValue('id_ph_pcms_product')))
        {
            $productCms = new Ph_pcms_product($id_ph_pcms_product);
            if($productCms->delete())
            {
                $this->context->cookie->_success = $this->l('Deleted successfully');
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->name);
            }
        }
        if(Tools::isSubmit('save_cms_product'))
        {
            $this->submitSaveCmsProduct();
        }
        if(Tools::isSubmit('search_product'))
        {
            Ph_pcms_defines::getInstance()->searchProduct();
        }
        $this->smarty->assign(
            array(
                'link' => $this->context->link,
                'ph_pcms_link_search_product' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&search_product=1',
            )
        );
        if($this->context->cookie->_success)
        {
            $this->html .= $this->displayConfirmation($this->context->cookie->_success);
            $this->context->cookie->_success ='';
        }
        $this->html .= $this->renderProductCms();
        $this->html .= $this->displayIframe();
        $this->smarty->assign(
            array(
                'html_content' => $this->html,
            )
        );
        return $this->display(__FILE__,'admin.tpl');
    }
    public function renderFormProductCms()
    {
        if($id_ph_pcms_product = (int)Tools::getValue('id_ph_pcms_product'))
        {
            $productCms = new Ph_pcms_product($id_ph_pcms_product);
        }
        else
            $productCms = new Ph_pcms_product();
        return $productCms->renderForm();
            
    }
    public function renderProductCms()
    {
        if(Tools::isSubmit('addNewProductCms') || Tools::isSubmit('editcms_product'))
            return $this->renderFormProductCms();
        $fields_list = array(
            'input_box' => array(
                'title' => '',
                'width' => 40,
                'type' => 'text',
                'strip_tag'=> false,
            ),
            'id_ph_pcms_product' => array(
                'title' => $this->l('ID'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
            ),
            'title' => array(
                'title' => $this->l('Title'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
            ),
            'products' => array(
                'title' => $this->l('Products'),
                'type' => 'text',
                'sort' => false,
                'filter' => false,
                'strip_tag' => false,
            ),
            'short_code' => array(
                'title' => $this->l('Short code'),
                'type' => 'text',
                'sort' => false,
                'filter' => false,
                'strip_tag'=> false,
            ),
            'active' => array(
                'title' => $this->l('Active'),
                'type' => 'active',
                'sort' => true,
                'filter' => true,
                'filter_list' => array(
                    'id_option' => 'active',
                    'value' => 'title',
                    'list' => array(
                        0 => array(
                            'active' => 0,
                            'title' => $this->l('Disabled')
                        ),
                        1 => array(
                            'active' => 1,
                            'title' => $this->l('Enabled')
                        ),
                    )
                )
            )
        );
        $filter = '';
        $show_resset = false;
        if(($id_ph_pcms_product = Tools::getValue('id_ph_pcms_product'))!='' && Validate::isCleanHtml($id_ph_pcms_product))
        {
            $filter .= ' AND p.id_ph_pcms_product='.(int)$id_ph_pcms_product;
            $show_resset = true;
        }
        if(($title = Tools::getValue('title'))!='' && Validate::isCleanHtml($title))
        {
            $filter .=' AND pl.title LIKE "%'.pSQL($title).'%"';
            $show_resset = true;
        } 
        if(($active = Tools::getValue('active'))!='' && Validate::isCleanHtml($active))
        {
            $filter .=' AND p.active="'.(int)$active.'"';
            $show_resset = true;
        }   
        $sort = "";
        $sort_type=Tools::getValue('sort_type','desc');
        $sort_value = Tools::getValue('sort','id_ph_pcms_product');
        if($sort_value)
        {
            switch ($sort_value) {
                case 'id_ph_pcms_product':
                    $sort .=' p.id_ph_pcms_product';
                    break;
                case 'title':
                    $sort .=' pl.title';
                    break;
                case 'active':
                    $sort .=' p.active';
                    break;
            }
            if($sort && $sort_type && in_array($sort_type,array('asc','desc')))
                $sort .= ' '.$sort_type;
        }
        $page = (int)Tools::getValue('page');
        if($page<=0)
            $page = 1;
        $totalRecords = (int)Ph_pcms_product::getCmsProducts($filter,$sort,0,0,true);
        $paggination = new Ph_pcms_paggination_class();            
        $paggination->total = $totalRecords;
        $paggination->url = $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&page=_page_'.$this->getFilterParams($fields_list,'rule');
        $paggination->limit =  (int)Tools::getValue('paginator_cms_product_select_limit',20);
        $paggination->name ='cms_product';
        $totalPages = ceil($totalRecords / $paggination->limit);
        if($page > $totalPages)
            $page = $totalPages;
        $paggination->page = $page;
        $start = $paggination->limit * ($page - 1);
        if($start < 0)
            $start = 0;
        $products= Ph_pcms_product::getCmsProducts($filter,$sort,$start,$paggination->limit,false);
        if($products)
        {
            foreach($products as &$product)
            {
                $this->smarty->assign(
                    array(
                        'short_code' => '[ph-product-cms id="'.(int)$product['id_ph_pcms_product'].'"]',
                    )
                );
                $product['short_code'] = $this->display(__FILE__,'short_code.tpl');
                $product['products'] = $this->displayCmsProducts($product['id_products']);
                $product['input_box'] = $this->displayText('','input','','bulk_action_selected-product-cms'.$product['id_ph_pcms_product'],'','','','bulk_action_selected_products_cms[]',$product['id_ph_pcms_product'],'checkbox');
            }
        }
        $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
        $paggination->style_links = $this->l('links');
        $paggination->style_results = $this->l('results');
        $listData = array(
            'name' => 'cms_product',
            'actions' => array('view','delete'),
            'icon' => 'icon-rule',
            'currentIndex' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.($paggination->limit!=20 ? '&paginator_cms_product_select_limit='.$paggination->limit:''),
            'postIndex' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name,
            'identifier' => 'id_ph_pcms_product',
            'show_toolbar' => true,
            'show_action' => true,
            'show_add_new' => true,
            'link_new' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&addNewProductCms=1',
            'add_new_text' => $this->l('Add new'),
            'title' => $this->l('Product list'),
            'fields_list' => $fields_list,
            'field_values' => $products,
            'paggination' => $paggination->render(),
            'filter_params' => $this->getFilterParams($fields_list,'cms_product'),
            'show_reset' =>$show_resset,
            'totalRecords' => $totalRecords,
            'show_bulk_action'=> true,
            'sort'=> $sort_value,
            'sort_type' => $sort_type,
        );            
        return  $this->renderList($listData);
    }
    public function renderList($listData)
    { 
        if(isset($listData['fields_list']) && $listData['fields_list'])
        {
            foreach($listData['fields_list'] as $key => &$val)
            {
                $value_key = (string)Tools::getValue($key);
                $value_key_max = (string)Tools::getValue($key.'_max');
                $value_key_min = (string)Tools::getValue($key.'_min');
                if(isset($val['filter']) && $val['filter'] && ($val['type']=='int' || $val['type']=='date'))
                {
                    if(Tools::isSubmit('ph_pcms_submit_'.$listData['name']))
                    {
                        $val['active']['max'] =  trim($value_key_max);   
                        $val['active']['min'] =  trim($value_key_min); 
                    }
                    else
                    {
                        $val['active']['max']='';
                        $val['active']['min']='';
                    }  
                }  
                elseif(!Tools::isSubmit('del') && Tools::isSubmit('ph_pcms_submit_'.$listData['name']))               
                    $val['active'] = trim($value_key);
                else
                    $val['active']='';
            }
        }  
        if(!isset($listData['class']))
            $listData['class']='';  
        $this->smarty->assign($listData);
        return $this->display(__FILE__, 'list_helper.tpl');
    }
    public function getFilterParams($field_list,$table='')
    {
        $params = '';        
        if($field_list)
        {
            if(Tools::isSubmit('ph_pcms_submit_'.$table))
                $params .='&ph_pcms_submit_'.$table.='=1';
            foreach($field_list as $key => $val)
            {
                $value_key = (string)Tools::getValue($key);
                $value_key_max = (string)Tools::getValue($key.'_max');
                $value_key_min = (string)Tools::getValue($key.'_min');
                if($value_key!='')
                {
                    $params .= '&'.$key.'='.urlencode($value_key);
                }
                if($value_key_max!='')
                {
                    $params .= '&'.$key.'_max='.urlencode($value_key_max);
                }
                if($value_key_min!='')
                {
                    $params .= '&'.$key.'_min='.urlencode($value_key_min);
                } 
            }
            unset($val);
        }
        return $params;
    }
    public function displayText($content=null,$tag,$class=null,$id=null,$href=null,$blank=false,$src = null,$name = null,$value = null,$type = null,$data_id_product = null,$rel = null,$attr_datas=null)
    {
        $this->smarty->assign(
            array(
                'content' =>$content,
                'tag' => $tag,
                'tag_class'=> $class,
                'tag_id' => $id,
                'href' => $href,
                'blank' => $blank,
                'src' => $src,
                'name' => $name,
                'value' => $value,
                'type' => $type,
                'data_id_product' => $data_id_product,
                'attr_datas' => $attr_datas,
                'rel' => $rel,
            )
        );
        return $this->display(__FILE__,'html.tpl');
    }
    public function displayPaggination($limit,$name)
    {
        $this->context->smarty->assign(
            array(
                'limit' => $limit,
                'pageName' => $name,
            )
        );
        return $this->display(__FILE__,'limit.tpl');
    }
    public function displayListProducts($productIds)
    {
        if($productIds)
        {
            $products = Ph_pcms_defines::getInstance()->getProductsByIds($productIds);
            $this->smarty->assign('products', $products);
            return $this->display(__FILE__, 'product-item.tpl');
        }
    }
    public function displayCmsProducts($productIds)
    {
        if($productIds)
        {
            $products = Ph_pcms_defines::getInstance()->getProductsByIds($productIds);
            $this->smarty->assign('products', $products);
            return $this->display(__FILE__, 'cms_products.tpl');
        }
    }
    public function doShortcode($str)
    {
        return preg_replace_callback('~\[ph\-product\-cms id="(\d+)"\]~',array($this,'replace'), $str);//[social-locker ]
    }
    public function replace ($matches)
    {
        if(is_array($matches) && count($matches)==2)
        {
            return $this->displayProductCms((int)$matches[1]);
        }
    }
    public function displayProductCms($id)
    {
        $productCms = new Ph_pcms_product($id);
        if($productCms && Validate::isLoadedObject($productCms) && $productCms->active && $productCms->id_products)
        {
            $products = $this->getBlockProducts($productCms->id_products);
            $this->smarty->assign(
                array(
                    'products' => $products,
                    'PH_PCMS_DISPLAY_TYPE' => $productCms->layout ? :'grid',
                    'PH_PCMS__NUMBER_PRODUCT_DESKTOP' => (int)$productCms->row_desktop ? : 4,
                    'PH_PCMS__NUMBER_PRODUCT_TABLET' => (int)$productCms->row_tablet ? : 3,
                    'PH_PCMS__NUMBER_PRODUCT_MOBILE' => (int)$productCms->row_mobile ? : 2,
                )
            );
            $controller = Tools::getValue('controller');
            $this->smarty->assign('name_page', Validate::isControllerName($controller) ? $controller :'' ) ;
            return  $this->display(__FILE__, 'product_list' . ($this->is17 ? '_17' : '') . '.tpl');
        }
    }
    public function getBlockProducts($products)
    {
        if (!$products)
            return false;
        if (!is_array($products))
        {
            $IDs = explode(',', $products);
            $products = array();
            foreach ($IDs as $ID) {
                if ($ID &&($tmpIDs = explode('-', $ID))) {
                    $products[] = array(
                        'id_product' => $tmpIDs[0],
                        'id_product_attribute' => !empty($tmpIDs[1])? $tmpIDs[1] : 0,
                    );
                }
            }
        }
        if($products)
        {
            $context = Context::getContext();
            $id_group = isset($context->customer->id) && $context->customer->id? Customer::getDefaultGroupId((int)$context->customer->id) : (int)Group::getCurrent()->id;
            $group = new Group($id_group);
            $useTax = $group->price_display_method? false : true;
            foreach($products as &$product)
            {
                $p = new Product($product['id_product'], true, $this->context->language->id, $this->context->shop->id);
                $product['link_rewrite'] = $p->link_rewrite;
                $product['price'] = Tools::displayPrice($p->getPrice($useTax,$product['id_product_attribute'] ? $product['id_product_attribute'] : null));
                if(($oldPrice = $p->getPriceWithoutReduct(!$useTax,$product['id_product_attribute'] ? $product['id_product_attribute'] : null)) && $oldPrice!=$product['price'])
                {
                    $product['price_without_reduction'] = Tools::convertPrice($oldPrice);
                }
                if (isset($product['price_without_reduction']) && $product['price_without_reduction'] != $product['price'])
                {
                    $product['specific_prices'] = $p->specificPrice;
                }
                if(isset($product['specific_prices']) && $product['specific_prices'] && $product['specific_prices']['to']!='0000-00-00 00:00:00')
                {
                    $product['specific_prices_to'] = $product['specific_prices']['to'];
                }
                $product['name'] = $p->name;
                $product['description_short'] = $p->description_short;
                $image = ($product['id_product_attribute'] && ($image =Ph_pcms_defines::getCombinationImageById($product['id_product_attribute'],$context->language->id))) ? $image : Product::getCover($product['id_product']);
                $product['link'] = $context->link->getProductLink($product,null,null,null,null,null,$product['id_product_attribute'] ? $product['id_product_attribute'] : 0);
                $product['id_image'] = isset($image['id_image']) && $image['id_image'] ? $image['id_image'] : $context->language->iso_code.'-default';
                if (!$this->is17 || $this->context->controller->controller_type == 'admin')
                {
                    $product['add_to_cart_url'] = isset($context->customer) && $this->is17 ? $context->link->getAddToCartURL((int)$product['id_product'], (int)$product['id_product_attribute']) : '';
                    $imageType = 'home';
                    $product['image'] = $context->link->getImageLink($p->link_rewrite, isset($image['id_image']) ? $image['id_image'] : $context->language->iso_code.'-default', $imageType);
                    $product['price_tax_exc'] = Product::getPriceStatic( (int)$product['id_product'], false, (int)$product['id_product_attribute'], (!$useTax ? 2 : 6), null, false, true, $p->minimal_quantity);
                    $product['available_for_order'] = $p->available_for_order;
                    if($product['id_product_attribute'])
                    {
                        $p->id_product_attribute = $product['id_product_attribute'];
                        $product['attributes'] = $p->getAttributeCombinationsById((int)$product['id_product_attribute'],$context->language->id);
                    }
                }
                
                if ($this->is17 && $this->context->controller->controller_type != 'admin')
                {
                    $product['image_id'] = $product['id_image'];
                }
                $product['is_available'] = $p->checkQty(1);
                $product['allow_oosp'] = Product::isAvailableWhenOutOfStock($p->out_of_stock);
                $product['show_price'] = $p->show_price;
                if (!$this->is17)
                {
                    $product['out_of_stock'] = $p->out_of_stock;
                    $product['id_category_default'] = $p->id_category_default;
                    $product['ean13'] = $p->ean13;
                }
            }
            unset($context);
        }
        if($products && $this->context->controller->controller_type != 'admin')
        {
            return $this->is17? $this->productsForTemplate($products) : Product::getProductsProperties($this->context->language->id, $products);
        }
        return $products;
    }
    public function productsForTemplate($products)
    {
        if (!$products || !is_array($products))
            return array();
        $assembler = new ProductAssembler($this->context);
        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new PrestaShop\PrestaShop\Core\Product\ProductListingPresenter(
            new PrestaShop\PrestaShop\Adapter\Image\ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PrestaShop\PrestaShop\Adapter\Product\PriceFormatter(),
            new PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever(),
            $this->context->getTranslator()
        );
        $products_for_template = array();
        foreach ($products as $item) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($item),
                $this->context->language
            );
        }
        return $products_for_template;
    }
    public static function validateArray($array,$validate='isCleanHtml')
    {
        if(method_exists('Validate',$validate))
        {
            if($array && is_array($array))
            {
                $ok= true;
                foreach($array as $val)
                {
                    if(!is_array($val))
                    {
                        if($val && !Validate::$validate($val))
                        {
                            $ok= false;
                            break;
                        }
                    }
                    else
                        $ok = self::validateArray($val,$validate);
                }
                return $ok;
            }
        }
        return true;
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