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
{if $products}
    {foreach from=$products item='product'}
        <li class="ph_pcms_product_item " data-id="{$product.id_product|intval}-{$product.id_product_attribute|intval}">
            <a class="product_img_link" href="{$product.link|escape:'html':'UTF-8'}" target="_blank">
                <img class="ph_pcms_product_image" src="{$product.image|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}{if isset($product.attributes) && $product.attributes} - {$product.attributes|escape:'html':'UTF-8'}{/if}" />
                <div class="ph_pcms_product_info">
                    <span class="product_name">{$product.name|escape:'html':'UTF-8'}{if isset($product.attributes) && $product.attributes} - {$product.attributes|escape:'html':'UTF-8'}{/if}</span>
                </div>
            </a>
            <div class="ph_pcms_block_item_close" title="{l s='Delete' mod='ph_products_cms'}">
                <i class="ets_svg_fill_lightgray">
                    <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z">
                    </svg>
                </i>
            </div>
        </li>
    {/foreach}
{/if}