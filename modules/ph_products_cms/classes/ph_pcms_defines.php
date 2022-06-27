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

class Ph_pcms_defines
{
    public static $instance;
    public function __construct()
    {
        $this->context = Context::getContext();
        if (is_object($this->context->smarty)) {
            $this->smarty = $this->context->smarty;
        }
    }
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ph_pcms_defines();
        }
        return self::$instance;
    }
    public function installDb(){
        $res =  Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ph_pcms_product` ( 
        `id_ph_pcms_product` INT(11) NOT NULL AUTO_INCREMENT , 
        `active` INT(1) , 
        `id_products` VARCHAR(1000) , 
        `id_shop` INT(11),
        `layout` VARCHAR(1000) , 
        `row_desktop` INT(2), 
        `row_mobile` INT(2),
        `row_tablet` INT(2),
        `date_add` DATETIME ,
        `date_upd` DATETIME ,
        PRIMARY KEY (`id_ph_pcms_product`)) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci');
        $res &=  Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ph_pcms_product_lang` ( 
        `id_ph_pcms_product` INT(11) NOT NULL , 
        `id_lang` INT(11) NOT NULL,
        `title` VARCHAR(1000), 
        `description` text,
        PRIMARY KEY (`id_ph_pcms_product`,`id_lang`)) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci') ;
        return $res;
    }
    public function unInstallDb()
    {
        $tables = array(
            'ph_pcms_product',
            'ph_pcms_product_lang',
        );
        if($tables)
        {
            foreach($tables as $table)
               Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . pSQL($table).'`'); 
        }
        return true;
    }
    public function getProductsByIds($products)
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
            $imageType = !version_compare(_PS_VERSION_, '1.7', '<') ? ImageType::getFormattedName('cart') : ImageType::getFormatedName('cart');
            foreach($products as &$product)
            {
                $p = new Product($product['id_product'], true, $context->language->id, $context->shop->id);
                $product['link_rewrite'] = $p->link_rewrite;
                $product['price_float'] = $p->getPrice($useTax,$product['id_product_attribute'] ? $product['id_product_attribute'] : null);
                $product['price'] = Tools::displayPrice($product['price_float']);
                $product['name'] = $p->name;
                $product['description_short'] = $p->description_short;
                $image = ($product['id_product_attribute'] && ($image = self::getCombinationImageById($product['id_product_attribute'],$context->language->id))) ? $image : Product::getCover($product['id_product']);
                $product['link'] = $context->link->getProductLink($product,null,null,null,null,null,$product['id_product_attribute'] ? $product['id_product_attribute'] : 0);
                $product['id_image'] = isset($image['id_image']) && $image['id_image'] ? $image['id_image'] : $context->language->iso_code.'-default';
                $product['image'] = $context->link->getImageLink($p->link_rewrite, isset($image['id_image']) ? $image['id_image'] : $context->language->iso_code.'-default', $imageType);
                if($product['id_product_attribute'])
                {
                    $attributes = $p->getAttributeCombinationsById((int)$product['id_product_attribute'],$context->language->id);
                    if($attributes)
                    {
                        $product['attributes']='';
                        foreach($attributes as $attribute)
                        {
                            $product['attributes'] .= $attribute['group_name'].': '.$attribute['attribute_name'].', ';
                        }
                        $product['attributes'] = trim($product['attributes'],', ');
                    }
                }
            }
            unset($context);
        }
        return $products;
    }
    public function searchProduct()
    {
        if (($query = Tools::getValue('q', false)) && Validate::isCleanHtml($query))
        {
            $imageType = $this->is17 ? ImageType::getFormattedName('cart') : ImageType::getFormatedName('cart');
            if ($pos = strpos($query, ' (ref:')) {
                $query = Tools::substr($query, 0, $pos);
            }
            $excludeIds = Tools::getValue('excludeIds', false);
            $excludedProductIds = array();
            if ($excludeIds && $excludeIds != 'NaN' && Validate::isCleanHtml($excludeIds)) {
                $excludeIds = implode(',', array_map('intval', explode(',', $excludeIds)));
                if($excludeIds && ($ids = explode(',',$excludeIds)) ) {
                    foreach($ids as $id) {
                        $id = explode('-',$id);
                        if(isset($id[0]) && isset($id[1]) && !$id[1]) {
                            $excludedProductIds[] = (int)$id[0];
                        }
                    }
                }
            } else {
                $excludeIds = false;
            }
            $excludeVirtuals = (bool)Tools::getValue('excludeVirtuals', false);
            $exclude_packs = (bool)Tools::getValue('exclude_packs', false);
            if (version_compare(_PS_VERSION_, '1.6.1.0', '<'))
            {
                $imgLeftJoin = ' LEFT JOIN `' . _DB_PREFIX_ . 'image` i ON (i.`id_product` = p.`id_product`) '.Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover = 1');
            }
            else
            {
                $imgLeftJoin = ' LEFT JOIN `' . _DB_PREFIX_ . 'image_shop` image_shop ON (image_shop.`id_product` = p.`id_product` AND image_shop.id_shop=' . (int)$this->context->shop->id . ' AND image_shop.cover = 1) ';
            }
            $sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, image_shop.`id_image` id_image, il.`legend`, p.`cache_default_attribute`
            		FROM `' . _DB_PREFIX_ . 'product` p
            		' . Shop::addSqlAssociation('product', 'p') . '
                    LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (pl.id_product = p.id_product AND pl.id_lang = ' . (int)$this->context->language->id . Shop::addSqlRestrictionOnLang('pl') . ')
            		'. pSQL($imgLeftJoin) .' 
            		LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = ' . (int)$this->context->language->id . ')
            		LEFT JOIN `'._DB_PREFIX_.'product_shop` ps ON (p.`id_product` = ps.`id_product`) 
            		WHERE '.($excludedProductIds ? 'p.`id_product` NOT IN('.pSQL(implode(',',$excludedProductIds)).') AND ' : '').' (pl.name LIKE \'%' . pSQL($query) . '%\' OR p.reference LIKE \'%' . pSQL($query) . '%\' OR p.id_product = '.(int)$query.') AND ps.`active` = 1 AND ps.`id_shop` = '.(int)$this->context->shop->id .
                   ($excludeVirtuals ? ' AND NOT EXISTS (SELECT 1 FROM `' . _DB_PREFIX_ . 'product_download` pd WHERE (pd.id_product = p.id_product))' : '') .
                   ($exclude_packs ? ' AND (p.cache_is_pack IS NULL OR p.cache_is_pack = 0)' : '') .
                   '  GROUP BY p.id_product';

            if (($items = Db::getInstance()->executeS($sql)))
            {
                $results = array();
                foreach ($items as $item)
                {
                    if (Combination::isFeatureActive() && (int)$item['cache_default_attribute'])
                    {
                        $sql = 'SELECT pa.`id_product_attribute`, pa.`reference`, ag.`id_attribute_group`, pai.`id_image`, agl.`name` AS group_name, al.`name` AS attribute_name, NULL as `attribute`, a.`id_attribute`
            					FROM `' . _DB_PREFIX_ . 'product_attribute` pa
            					' . Shop::addSqlAssociation('product_attribute', 'pa') . '
            					LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_combination` pac ON pac.`id_product_attribute` = pa.`id_product_attribute`
            					LEFT JOIN `' . _DB_PREFIX_ . 'attribute` a ON a.`id_attribute` = pac.`id_attribute`
            					LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group` ag ON ag.`id_attribute_group` = a.`id_attribute_group`
            					LEFT JOIN `' . _DB_PREFIX_ . 'attribute_lang` al ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = ' . (int)$this->context->language->id . ')
            					LEFT JOIN `' . _DB_PREFIX_ . 'attribute_group_lang` agl ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = ' . (int)$this->context->language->id . ')
            					LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_image` pai ON pai.`id_product_attribute` = pa.`id_product_attribute`
            					WHERE pa.`id_product` = ' . (int)$item['id_product'] . ($excludeIds ? ' AND NOT FIND_IN_SET(CONCAT(pa.`id_product`,"-", IF(pa.`id_product_attribute` IS NULL,0,pa.`id_product_attribute`)), "' . pSQL($excludeIds) . '")' : '') . '
            					GROUP BY pa.`id_product_attribute`, ag.`id_attribute_group`
            					ORDER BY pa.`id_product_attribute`';
                        if (($combinations = Db::getInstance()->executeS($sql)))
                        {
                            foreach ($combinations as $combination) {
                                $results[$combination['id_product_attribute']]['id_product'] = $item['id_product'];
                                $results[$combination['id_product_attribute']]['id_product_attribute'] = $combination['id_product_attribute'];
                                $results[$combination['id_product_attribute']]['name'] = $item['name'];
                                // get name attribute with combination
                                !empty($results[$combination['id_product_attribute']]['attribute']) ? $results[$combination['id_product_attribute']]['attribute'] .= ' ' . $combination['group_name'] . '-' . $combination['attribute_name']
                                    : $results[$combination['id_product_attribute']]['attribute'] = $item['attribute'] . ' ' . $combination['group_name'] . '-' . $combination['attribute_name'];
                                // get reference combination
                                if (!empty($combination['reference'])) {
                                    $results[$combination['id_product_attribute']]['ref'] = $combination['reference'];
                                } else {
                                    $results[$combination['id_product_attribute']]['ref'] = !empty($item['reference']) ? $item['reference'] : '';
                                }
                                // get image combination
                                if (empty($results[$combination['id_product_attribute']]['image']))
                                {
                                    $results[$combination['id_product_attribute']]['image'] = str_replace('http://', Tools::getShopProtocol(), $this->context->link->getImageLink($item['link_rewrite'], (!empty($combination['id_image'])? (int)$combination['id_image'] : (int)$item['id_image']),$imageType));
                                }
                            }
                        }
                    }
                    else
                    {
                        $results[] = array(
                            'id_product' => (int)($item['id_product']),
                            'id_product_attribute' => 0,
                            'name' => $item['name'],
                            'attribute' => '',
                            'ref' => (!empty($item['reference']) ? $item['reference'] : ''),
                            'image' =>$item['id_image'] ?  str_replace('http://', Tools::getShopProtocol(), $this->context->link->getImageLink($item['link_rewrite'], $item['id_image'], $imageType)):'../modules/ets_prettymenu/views/img/2.jpg',
                        );
                    }
                }
                if ($results)
                {
                    foreach ($results as &$item)
                        echo trim($item['id_product'] . '|' . (int)($item['id_product_attribute']) . '|' . Tools::ucfirst($item['name']). '|' . $item['attribute'] . '|' . $item['ref'] . '|' . $item['image']).'|'.Context::getContext()->link->getProductLink($item['id_product'],null,null,null,null,null,$item['id_product_attribute']). "\n";
                }
            }
            die;
        }
        die;
    }
    public static function getCombinationImageById($id_product_attribute, $id_lang)
    {
        if(version_compare(_PS_VERSION_,'1.6.1.0', '>=')) {
            return Product::getCombinationImageById($id_product_attribute, $id_lang);
        }
        else
        {
            if (!Combination::isFeatureActive() || !$id_product_attribute) {
                return false;
            }
            $result = Db::getInstance()->executeS('
                SELECT pai.`id_image`, pai.`id_product_attribute`, il.`legend`
                FROM `'._DB_PREFIX_.'product_attribute_image` pai
                LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (il.`id_image` = pai.`id_image`)
                LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_image` = pai.`id_image`)
                WHERE pai.`id_product_attribute` = '.(int)$id_product_attribute.' AND il.`id_lang` = '.(int)$id_lang.' ORDER by i.`position` LIMIT 1'
            );
            if (!$result) {
                return false;
            }
            return $result[0];
        }
    }
    public static function submitBulkEnabled($ids)
    {
        return Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ph_pcms_product` set active=1 WHERE id_ph_pcms_product IN ('.implode(',',array_map('intval',$ids)).')');
    }
    public static function submitBulkDiasabled($ids)
    {
        return Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ph_pcms_product` set active=0 WHERE id_ph_pcms_product IN ('.implode(',',array_map('intval',$ids)).')');
    }
    public static function submitBulkDelete($ids)
    {
       $res = Db::getInstance()->execute('DELETE FROM  `'._DB_PREFIX_.'ph_pcms_product` WHERE id_ph_pcms_product IN ('.implode(',',array_map('intval',$ids)).')');
       $res &= Db::getInstance()->execute('DELETE FROM  `'._DB_PREFIX_.'ph_pcms_product_lang` WHERE id_ph_pcms_product IN ('.implode(',',array_map('intval',$ids)).')');
       return $res;
    }
}