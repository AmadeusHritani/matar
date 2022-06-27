{*
* 2007-2021 ETS-Soft
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
*  @copyright  2007-2021 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
<ul>
    <li{if $controller=='AdminPresToPresFreeImport'} class="active"{/if}><a href="{$link->getAdminLink('AdminPresToPresFreeImport',true)|escape:'html':'UTF-8'}"><i class="icon icon-cloud-upload"> </i> {l s='Migration' mod='ets_pres2presfree'}</a></li>
    <li{if $controller=='AdminPresToPresFreeHistory'} class="active"{/if}><a href="{$link->getAdminLink('AdminPresToPresFreeHistory',true)|escape:'html':'UTF-8'}"><i class="icon icon-history"> </i> {l s='History' mod='ets_pres2presfree'}</a></li>
    <li{if $controller=='AdminPresToPresFreeClean'} class="active"{/if}><a href="{$link->getAdminLink('AdminPresToPresFreeClean',true)|escape:'html':'UTF-8'}"><i class="icon icon-eraser"> </i> {l s='Clean-up' mod='ets_pres2presfree'}</a></li>
    <li{if $controller=='AdminPresToPresFreeHelp'} class="active"{/if}><a href="{$link->getAdminLink('AdminPresToPresFreeHelp',true)|escape:'html':'UTF-8'}"><i class="icon icon-question-circle"> </i> {l s='Help' mod='ets_pres2presfree'}</a></li>
</ul>