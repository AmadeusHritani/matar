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
<div class="ph_pcms_block_product_list">
    {if isset($products) && $products}
         <div class="featured-products product_list">
        	<div id="" class="{$name_page|escape:'html':'UTF-8'} product_list grid products ph_pcms_product_list_wrapper layout-{$PH_PCMS_DISPLAY_TYPE|escape:'html':'utf-8'} ph_pcms_desktop_{$PH_PCMS__NUMBER_PRODUCT_DESKTOP|intval} ph_pcms_tablet_{$PH_PCMS__NUMBER_PRODUCT_TABLET|intval} ph_pcms_mobile_{$PH_PCMS__NUMBER_PRODUCT_MOBILE|intval}" data-desktop="{$PH_PCMS__NUMBER_PRODUCT_DESKTOP|intval}" data-tablet="{$PH_PCMS__NUMBER_PRODUCT_TABLET|intval}" data-mobile="{$PH_PCMS__NUMBER_PRODUCT_MOBILE|intval}">
        	{foreach from=$products item="product"}
                  {include file="catalog/_partials/miniatures/product.tpl" product=$product}
            {/foreach}
            </div>
        </div>
    {/if}   
</div>