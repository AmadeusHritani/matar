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
* needs please, contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
{if isset($images) && $images}
    <div class="ets-sc-certification{if $positionAt|lower == 'displayfooter'} links wrapper{/if} ets-sc-position-at-{$positionAt|lower|escape:'html':'UTF-8'}{if $ETS_SC_HIDE_ON_MOBILE|intval > 0} hidden-on-mobile{/if} col-xs-12 col-sm-{$ETS_SC_COLUMN_WIDTH|intval}">
        {if $positionAt|lower == 'displayfooter'}
            <div class="title clearfix hidden-md-up" data-target="#ets-sc-certification-item" data-toggle="collapse">
                <span class="h3">{$ETS_SC_TITLE|escape:'html':'UTF-8'}</span>
                <span class="float-xs-right">
                  <span class="navbar-toggler collapse-icons">
                    <i class="material-icons add">keyboard_arrow_down</i>
                    <i class="material-icons remove">keyboard_arrow_up</i>
                  </span>
                </span>
            </div>
            <p class="h4 text-uppercase block-sc-certification-title hidden-sm-down">
                {$ETS_SC_TITLE|escape:'html':'UTF-8'}
            </p>
        {elseif $positionAt|lower == 'displaynav1'}
            <a class="ets-sc-heading" href="javascript:void(0)">
                {$ETS_SC_TITLE|escape:'html':'UTF-8'}
            </a>
        {else}
            <h4 class="ets-sc-heading">
                {$ETS_SC_TITLE|escape:'html':'UTF-8'}
            </h4>
        {/if}
        {if $positionAt|lower == 'displayfooter'}<div id="ets-sc-certification-item" class="ets-sc-certification-items-footer collapse">{/if}
        {foreach from=$images item='image'}
            <div class="ets-sc-certification-item">
                {if $image.link|trim !== ''}
                    <a href="{$image.link nofilter}">
                {/if}
                    <img src="{$image.image_url nofilter}" title="{$image.title|escape:'html':'UTF-8'}" alt="{$image.alt|escape:'html':'UTF-8'}" style="{if $ETS_SC_MAX_WIDTH|intval > 0}max-width: {$ETS_SC_MAX_WIDTH|intval}px;{/if}{if $ETS_SC_MAX_HEIGHT|intval > 0} max-height: {$ETS_SC_MAX_HEIGHT|intval}px;{/if}">
                {if $image.link|trim !== ''}
                    </a>
                {/if}
            </div>
        {/foreach}
        {if $positionAt|lower == 'displayfooter'}</div>{/if}
    </div>
{/if}