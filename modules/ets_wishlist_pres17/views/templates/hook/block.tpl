{*
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
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
<section class="wishlist_products_list_section featured-products clearfix mt-3{if $blockName=='left' or $blockName=='right'} block left_right{/if}">
    <div class="wl-box-header">
        <h2 class="h2 products-section-title text-uppercase">
            {$block_title|escape:'html':'UTF-8'}
        </h2>
        {if count($wishlists) >1}
            <select name="select-wislist-products" data-page-name="{$controller|escape:'html':'UTF-8'}" data-position="{$blockName|escape:'html':'UTF-8'}" data-link-action="{$link->getModuleLink('ets_wishlist_pres17','action',['action'=>'getProductList']) nofilter}">
                {foreach from=$wishlists item='wishlist'}
                    <option value="{$wishlist.id_ets_wishlist|intval}">{$wishlist.name|escape:'html':'UTF-8'}</option>
                {/foreach}
            </select>
        {/if}
    </div>
    <div class="wl-box-products">
        {$list_product nofilter}
    </div>
</section>
