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
 *  @author ETS-Soft <etssoft.jsc@gmail.com>
 *  @copyright  2007-2022 ETS-Soft
 *  @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

if (!defined('_PS_VERSION_'))
	exit;
class Ph_pcms_product extends Ph_pcms_obj
{
    public static $instance;
    public $title;
    public $active;
    public $id_shop;
    public $id_products;
    public $date_add;
    public $date_upd;
    public $description;
    public $layout;
    public $row_desktop;
    public $row_mobile;
    public $row_tablet;
    public static $definition = array(
		'table' => 'ph_pcms_product',
		'primary' => 'id_ph_pcms_product',
		'multilang' => true,
		'fields' => array(
            'active' => array('type' => self::TYPE_INT),
            'id_products' => array('type' => self::TYPE_STRING),
            'layout' => array('type' => self::TYPE_STRING),
            'row_desktop' => array('type' => self::TYPE_INT),
            'row_mobile' => array('type' => self::TYPE_INT),
            'row_tablet' => array('type' => self::TYPE_INT),
            'id_shop' => array('type' => self::TYPE_INT),
            'date_add' => array('type' => self::TYPE_DATE),
            'date_upd' => array('type' => self::TYPE_DATE),
            'title' => array('type' => self::TYPE_STRING,'lang'=>true),
            'description' => array('type' => self::TYPE_HTML,'lang'=>true),
        )
	);
    public	function __construct($id_item = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_item, $id_lang, $id_shop);
	}
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ph_pcms_product();
        }
        return self::$instance;
    }
    public function l($string,$file_name='')
    {
        return Translate::getModuleTranslation('ph_products_cms', $string, $file_name ? : pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function getListFields()
    {
        if($this->id)
        {
            Context::getContext()->smarty->assign(
                array(
                    'short_code' => '[ph-product-cms id="'.(int)$this->id.'"]',
                )
            );
            $short_code = Context::getContext()->smarty->fetch(_PS_MODULE_DIR_.'ph_products_cms/views/templates/hook/short_code.tpl');
        }
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->id ? $this->l('Edit product') :$this->l('Add product')  ,
                ),
                'description' => $this->id ? sprintf($this->l('Product(s) short code: %s Copy the short code above, paste into anywhere on your product description, CMS page content, .tpl files, etc. in order to display this product(s) on the position you want'),$short_code): false,
                'input' => array(),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
                'buttons'=> array(
                    array(
                        'title' => $this->l('Save & Stay'),
                        'type' => 'submit',
                        'class' => 'pull-right',
                        'name' => 'btnSubmitProductCmsStay',
                        'icon' => 'process-icon-save',
                    ),
                    array(
                        'title' => $this->l('Cancel'),
                        'type' => 'submit',
                        'class' => 'pull-left',
                        'href' => Context::getContext()->link->getAdminLink('AdminModules').'&configure=ph_products_cms',
                        'name' => 'btnSubmitRuleStay',
                        'icon' => 'process-icon-cancel',
                    )
                ),
                'name' => 'cms_product',
                'key' => 'id_ph_pcms_product',
            ),
            'configs' => array(
                'title' => array(
                    'type' => 'text',
                    'label' => $this->l('Title'),
                    'desc' => $this->l('Enter the title of product section'),
                    'lang'=>true,
                    'required' => true,
                    'validate' => 'isCleanHtml',
                ),
                'description' => array(
                    'type' => 'textarea',
                    'label' => $this->l('Description'),
                    'lang'=>true,
                    'validate' => 'isCleanHtml',
                ),
                'id_products' => array(
                    'type' => 'search_product',
                    'label' => $this->l('Select product(s) to display'),
                    'validate' => 'isCleanHtml',
                    'placeholder' => $this->l('Search by product name, reference, id'),
                    'required' => true,
                ),
                'layout' => array(
                    'type' => 'radio',
                    'label' => $this->l('Display layout'),
                    'default' => 'grid',
                    'values' => array(
                        array(
                            'label' => $this->l('Grid view'),
                            'value' => 'grid',
                            'id' => 'layout_grid',
                        ),
                        array(
                            'label' => $this->l('Carousel slider'),
                            'value' => 'slide',
                            'id' => 'layout_slide',
                        )
                    ),
                    'validate' => 'isCleanHtml'
                ),
                'row_desktop' => array(
                    'type' => 'select',
                    'label' => $this->l('Number of products displayed per row on desktop'),
                    'options' => array(
                        'query' => array(
                            array(
                                'id' => 6,
                                'name' =>6
                            ),
                            array(
                                'id' => 5,
                                'name' =>5
                            ),
                            array(
                                'id' => 4,
                                'name' =>4
                            ),
                            array(
                                'id' => 3,
                                'name' =>3
                            ),
                            array(
                                'id' => 2,
                                'name' =>2
                            ),
                            array(
                                'id' => 1,
                                'name' =>1
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'default' => 4,
                    'validate' => 'isUnsignedInt',
                ),
                'row_tablet' => array(
                    'type' => 'select',
                    'label' => $this->l('Number of products displayed per row on tablet'),
                    'options' => array(
                        'query' => array(
                            array(
                                'id' => 6,
                                'name' =>6
                            ),
                            array(
                                'id' => 5,
                                'name' =>5
                            ),
                            array(
                                'id' => 4,
                                'name' =>4
                            ),
                            array(
                                'id' => 3,
                                'name' =>3
                            ),
                            array(
                                'id' => 2,
                                'name' =>2
                            ),
                            array(
                                'id' => 1,
                                'name' =>1
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'default' => 3,
                    'validate' => 'isUnsignedInt',
                ),
                'row_mobile' => array(
                    'type' => 'select',
                    'label' => $this->l('Number of products displayed per row on mobile'),
                    'options' => array(
                        'query' => array(
                            array(
                                'id' => 6,
                                'name' =>6
                            ),
                            array(
                                'id' => 5,
                                'name' =>5
                            ),
                            array(
                                'id' => 4,
                                'name' =>4
                            ),
                            array(
                                'id' => 3,
                                'name' =>3
                            ),
                            array(
                                'id' => 2,
                                'name' =>2
                            ),
                            array(
                                'id' => 1,
                                'name' =>1
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'default' => 1,
                    'validate' => 'isUnsignedInt',
                ),
                'active'=>array(
                    'type'=>'switch',
                    'label'=>$this->l('Enabled'),
                    'default' => 1,
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'active_on',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'active_off',
                            'value' => 0,
                        )
                    ),
                    'tab' => 'information'
                ),
            )
        );
    }
    public static function getCmsProducts($filter='',$sort='',$start=0,$limit=10,$total=false)
    {
        $id_lang = (int)Context::getContext()->language->id;
        $id_shop = (int)Context::getContext()->shop->id;   
        if($total)
            $sql ='SELECT COUNT(DISTINCT p.id_ph_pcms_product) FROM `'._DB_PREFIX_.'ph_pcms_product` p';
        else
            $sql ='SELECT p.*,pl.title FROM `'._DB_PREFIX_.'ph_pcms_product` p';
        $sql .=' LEFT JOIN `'._DB_PREFIX_.'ph_pcms_product_lang` pl ON (p.id_ph_pcms_product=pl.id_ph_pcms_product AND pl.id_lang="'.(int)$id_lang.'")
        WHERE p.id_shop= "'.(int)$id_shop.'" '.($filter ? $filter: '');
        if($total)
            return Db::getInstance()->getValue($sql);
        else
        {
            $sql .=($sort ? ' ORDER BY '.$sort: ' ORDER BY p.id_ph_pcms_product asc').' LIMIT '.(int)$start.','.(int)$limit.'';
            return Db::getInstance()->executeS($sql);
        }
    }
 }