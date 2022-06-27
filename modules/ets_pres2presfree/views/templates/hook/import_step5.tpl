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
<p class="alert alert-success">{l s='Data migrated successfully. See import result below.' mod='ets_pres2presfree'}</p>
<p class="alert alert-warning">
    {l s='Please clear your Prestashop cache and reindex Prestashop search and everything is done.' mod='ets_pres2presfree'}
</p>
<div class="import_title_step5">{l s='MIGRATION RESULT:' mod='ets_pres2presfree'}</div>
<ul class="list-data-to-imported">
    {if $ets_pres2pres_import}
        {foreach from=$ets_pres2pres_import item='data_import'}
            {if $data_import!='page_cms'}
                <li>
                    {if $data_import=='cms' && isset($assign['page_cms'])}
                        {$assign[$data_import]+$assign['page_cms']|escape:'html':'UTF-8'}
                    {else}
                        {$assign[$data_import]|escape:'html':'UTF-8'}
                    {/if}
                    {if $data_import=='employees'}
                        {l s='employees' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='categories'}
                        {l s='product categories' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='manufactures'}
                        {l s='manufactures' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='suppliers'}
                        {l s='suppliers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='products'}
                        {l s='products' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='customers'}
                        {l s='customers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='carriers'}
                        {l s='carriers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='cart_rules'}
                        {l s='cart rules' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='catelog_rules'}
                        {l s='catelog rules' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='orders'}
                        {l s='orders' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='CMS_categories'}
                        {l s='CMS categories' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='cms'}
                        {l s='CMSs' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='messages'}
                        {l s='contact form messages' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='vouchers'}
                        {l s='vouchers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='shops'}
                        {l s='shops' mod='ets_pres2presfree'}
                    {/if}
                    {l s='migrated' mod='ets_pres2presfree'}
                    {if $data_import=='customers'}
                        {if $pres_version==1.4}
                            {if $new_passwd_customer}
                                <a href="index.php?tab=AdminModules&configure=ets_pres2pres&token={$token|escape:'html':'UTF-8'}&tab_module=front_office_features&module_name=ets_pres2pres&tabmodule=history&downloadpasscustomer&id_import_history={$id_import_history|intval}"><i class="fa fa-cloud-download"> </i> {l s='Download customer password' mod='ets_pres2presfree'}</a>
                            {/if}
                        {else}
                            {if $new_passwd_customer}
                                <a href="{$link_history|escape:'html':'UTF-8'}&downloadpasscustomer&id_import_history={$id_import_history|intval}"><i class="icon icon-cloud-download"> </i>  {l s='Download customer passwords' mod='ets_pres2presfree'}</a>
                            {/if}
                        {/if}
                    {/if}
                    {if $data_import=='employees'}
                        {if $pres_version==1.4}
                            {if $new_passwd_employee}
                                <a href="index.php?tab=AdminModules&configure=ets_pres2pres&token={$token|escape:'html':'UTF-8'}&tab_module=front_office_features&module_name=ets_pres2pres&tabmodule=history&downloadpassemployee&id_import_history={$id_import_history|intval}"><i class="fa fa-cloud-download"> </i> {l s='Download employee password' mod='ets_pres2presfree'}</a>
                            {/if}
                        {else}
                            {if $new_passwd_employee}
                                <a href="{$link_history|escape:'html':'UTF-8'}&downloadpassemployee&id_import_history={$id_import_history|intval}"><i class="icon icon-cloud-download"> </i> {l s='Download employee passwords' mod='ets_pres2presfree'}</a>
                            {/if}
                        {/if}
                    {/if}
                </li>
            {/if}
        {/foreach}
    {/if}
</ul> 
{if !Configuration::get('ETS_PRES2PRES_NEW_PASSWD') && (in_array('customers',$ets_datamaster_import) || in_array('employees',$ets_datamaster_import))}
    <p class="link_download_plugin alert alert-info">
        <a href="{$mod_dr_pres2pres|escape:'html':'UTF-8'}plugins/ets_pres2prespwkeeper.zip" target="_blank"><b>{l s='Download Prestashop Password Keeper module' mod='ets_pres2presfree'}</b></a>&nbsp;{l s='and install the module on this website to recover customer passwords from Source website' mod='ets_pres2presfree'}
            <br /><span class="cookie_key" >_COOKIE_KEY_ {l s='of source website' mod='ets_pres2presfree'}: <span>{$OLD_COOKIE_KEY|escape:'html':'UTF-8'}</span>
    </p>
{/if}