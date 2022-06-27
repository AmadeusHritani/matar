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
<div class="ets_baw_display_banner {$banner_class|escape:'html':'UTF-8'} {$position|escape:'html':'UTF-8'}">
    {if $banner.content_before_image}
        <div class="content_before_image">
            {$banner.content_before_image nofilter}
        </div>
    {/if}
    {if $banner.image}
        {if $position == 'displaybanner'}
                <div{if $banner.title} title="{$banner.title|escape:'html':'UTF-8'}"{/if} class="banner_top_site" style="background-image: url({$link->getMediaLink("`$smarty.const._PS_ETS_BAW_IMG_``$banner.image|escape:'htmlall':'UTF-8'`")})"></div>
        {else}
                <img {if $banner.title} title="{$banner.title|escape:'html':'UTF-8'}"{/if} src="{$link->getMediaLink("`$smarty.const._PS_ETS_BAW_IMG_``$banner.image|escape:'htmlall':'UTF-8'`")}"{if $banner.image_alt} alt="{$banner.image_alt|escape:'html':'UTF-8'}"{/if} />
        {/if}
    {/if}
    {if $banner.content_after_image}
        <div class="content_after_image">
            {$banner.content_after_image nofilter}
        </div>
    {/if}
</div>
<div class="clearfix"></div>