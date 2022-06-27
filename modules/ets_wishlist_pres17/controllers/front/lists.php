<?php
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
class Ets_wishlist_pres17ListsModuleFrontController extends ModuleFrontController
{
    /**
     * @var bool If set to true, will be redirected to authentication page
     */
    public $auth = true;

    public function initContent()
    {
        parent::initContent();
        $wishlists = $this->module->getAllWishList();
        if($wishlists)
        {
            foreach($wishlists as &$wishlist)
            {
                $wishlist['products'] = Ets_wl_wishList::printProductsById($wishlist['id_ets_wishlist']);
            }
        }
        $this->context->smarty->assign(
            array(
            'url' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'getAllWishlist']),
            'createUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'createNewWishlist']),
            'deleteListUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'deleteWishlist']),
            'deleteProductUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'deleteProductFromWishlist']),
            'renameUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'renameWishlist']),
            'shareUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'getUrlByIdWishlist']),
            'addUrl' => $this->context->link->getModuleLink($this->module->name, 'action', ['action' => 'addProductToWishlist']),
            'accountLink' => '#',
            'wishlistsTitlePage' => Configuration::get('ETS_WL_MY_WISHLISTS', $this->context->language->id),
            'newWishlistCTA' => Configuration::get('ETS_WL_CREATE_BUTTON_LABEL', $this->context->language->id),
            'wishlists' => $wishlists,
            )
        );
        $this->setTemplate('module:'.$this->module->name.'/views/templates/front/pages/lists.tpl');
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();
        $breadcrumb['links'][] = [
          'title' => Configuration::get('ETS_WL_MY_WISHLISTS', $this->context->language->id),
          'url' => $this->context->link->getModuleLink($this->module->name, 'lists'),
        ];

        return $breadcrumb;
    }
}