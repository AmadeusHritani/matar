<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 web site only.
 * If you want to use this file on more web sites (or projects), you need to purchase additional licenses.
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
 * @license    Valid for 1 web site (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

class EtsSCCertification extends ObjectModel
{
    const DEFAULT_MAX_TITLE = 255;
    public $id_shop;
    public $image;
    public $link;
    public $title;
    public $alt;
    public $active;

    public static $definition = [
        'table' => 'ets_sc_certification',
        'primary' => 'id_ets_sc_certification',
        'fields' => [
            'id_shop' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId'],
            'image' => ['type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 500],
            'link' => ['type' => self::TYPE_STRING, 'validate' => 'isAbsoluteUrl', 'size' => 255],
            'title' => ['type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 255],
            'alt' => ['type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 255],
            'active' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
        ]
    ];

    public static function getImages($id_ets_sc_certification = 0, $context = null, $active = true)
    {
        if ($context == null)
            $context = Context::getContext();

        $images = Db::getInstance()->executeS('
            SELECT * FROM `' . _DB_PREFIX_ . 'ets_sc_certification` 
            WHERE `id_shop`=' . (int)$context->shop->id
            . ($id_ets_sc_certification > 0 ? ' AND `id_ets_sc_certification`=' . (int)$id_ets_sc_certification : '')
            . ($active ? ' AND `active`=1' : '')
        );
        if ($id_ets_sc_certification > 0 && isset($images[0]))
            return $images[0];
        return $images;
    }
}