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
<p>{l s='Please review and confirm the migration before processing it!' mod='ets_pres2presfree'}</p>
<div class="data-to-export">
    <div>{l s='Data migrated:' mod='ets_pres2presfree'}</div>
    <ul class="list-data-to-import">
        {if $ets_pres2pres_import}
            {foreach from=$ets_pres2pres_import item='data_import'}
                {if $data_import!='page_cms'}
                <li>
                    {if $data_import=='employees'}
                        {l s='Employees' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='categories'}
                        {l s='Product categories' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='manufactures'}
                        {l s='Manufactures' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='suppliers'}
                        {l s='Suppliers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='products'}
                        {l s='Products' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='customers'}
                        {l s='Customers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='carriers'}
                        {l s='Carriers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='cart_rules'}
                        {l s='Cart rules' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='catelog_rules'}
                        {l s='Catelog rules' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='orders'}
                        {l s='Orders' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='CMS_categories'}
                        {l s='CMS categories' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='CMS'}
                        {l s='CMSs' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='messages'}
                        {l s='Contact form messages' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='vouchers'}
                        {l s='Vouchers' mod='ets_pres2presfree'}
                    {/if}
                    {if $data_import=='shops'}
                        {l s='Shops' mod='ets_pres2presfree'}
                    {/if}
                    ({if $data_import=='cms' && isset($assign['page_cms'])}{$assign[$data_import]+$assign['page_cms']|escape:'html':'UTF-8'}{else}{$assign[$data_import]|escape:'html':'UTF-8'}{/if} {if $assign[$data_import]<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if})
                </li>
                {/if}
            {/foreach}
        {/if}
        {if isset($assign['employees']) && $assign['employees'] && in_array('employees',$export_datas)}
            <li class="extra_pro">
                {l s='Employees' mod='ets_pres2presfree'} ({$assign['employees']|intval} {if $assign['employees']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
        {if isset($assign['manufactures']) && $assign['manufactures'] && in_array('manufactures',$export_datas)}
            <li class="extra_pro">
                {l s='Manufactures' mod='ets_pres2presfree'} ({$assign['manufactures']|intval} {if $assign['manufactures']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
        {if isset($assign['suppliers']) && $assign['suppliers'] && in_array('suppliers',$export_datas)}
            <li class="extra_pro">
                {l s='Suppliers' mod='ets_pres2presfree'} ({$assign['suppliers']|intval} {if $assign['suppliers']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
        {if isset($assign['carriers']) && $assign['carriers'] && in_array('carriers',$export_datas)}
            <li class="extra_pro">
                {l s='Carriers' mod='ets_pres2presfree'} ({$assign['carriers']|intval} {if $assign['carriers']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
        {if $pres_version==1.4}
            {if isset($assign['vouchers']) && $assign['vouchers'] && in_array('vouchers',$export_datas)}
                <li class="extra_pro">
                    {l s='Vouchers' mod='ets_pres2presfree'} ({$assign['vouchers']|intval} {if $assign['vouchers']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
                </li>
            {/if}
        {else}
            {if isset($assign['cart_rules']) && $assign['cart_rules'] && in_array('cart_rules',$export_datas)}
                <li class="extra_pro">
                    {l s='Cart rules' mod='ets_pres2presfree'} ({$assign['cart_rules']|intval} {if $assign['cart_rules']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
                </li>
            {/if}
            {if isset($assign['catelog_rules']) && $assign['catelog_rules'] && in_array('catelog_rules',$export_datas)}
                <li class="extra_pro">
                    {l s='Catelog rules' mod='ets_pres2presfree'} ({$assign['catelog_rules']|intval} {if $assign['catelog_rules']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
                </li>
            {/if}
        {/if}
        {if isset($assign['orders']) && $assign['orders'] && in_array('orders',$export_datas)}
            <li class="extra_pro">
                {l s='Orders' mod='ets_pres2presfree'} ({$assign['orders']|intval} {if $assign['orders']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
        {if isset($assign['CMS_categories']) && $assign['CMS_categories'] && in_array('CMS_categories',$export_datas)}
            <li class="extra_pro">
                {l s='Cms categories' mod='ets_pres2presfree'} ({$assign['CMS_categories']|intval} {if $assign['CMS_categories']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
        {if isset($assign['CMS']) && $assign['CMS'] && in_array('CMS',$export_datas)}
            <li class="extra_pro">
                {l s='CMSs' mod='ets_pres2presfree'} ({$assign['CMS']|intval} {if $assign['CMS']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
        {if isset($assign['messages']) && $assign['messages'] && in_array('messages',$export_datas)}
            <li class="extra_pro">
                {l s='Messages' mod='ets_pres2presfree'} ({$assign['messages']|intval} {if $assign['messages']<=1}{l s='item' mod='ets_pres2presfree'}{else}{l s='items' mod='ets_pres2presfree'}{/if}) <span class="note_c"><strong><span class="note_c">- {l s='Available on premium version only' mod='ets_pres2presfree'}</span></strong></span>
            </li>
        {/if}
    </ul>
</div>
<p class="extra_pro2">
    {l s='You are using Free version of Prestashop Migrator that only allows you to migrate essential data (products, product categories and customers) to the target website. If you would like to migrate EVERYTHING and get 24/7 support, please download Premium Version' mod='ets_pres2presfree'}
</p>
<a href="https://addons.prestashop.com/en/data-migration-backup/32298-prestashop-migrator-upgrade-prestashop-to-17.html" class="btn btn-default extra_pro extra_pro_download" target="_blank" style="">{l s='DOWNLOAD PREMIUM VERSION' mod='ets_pres2presfree'}</a>
<button type="button" class="btn btn-default not_interested extra_pro extra_pro_close">{l s='NO, I AM NOT INTERESTED' mod='ets_pres2presfree'}</button>
<br /><br />
<div class="data-format-to-import">
    <div>{l s='Activated migration option:' mod='ets_pres2presfree'}</div>
    <ul>
        <li>
            <span>{l s='Delete data before importing:' mod='ets_pres2presfree'}&nbsp;{if $ets_pres2pres_import_delete}{l s='YES' mod='ets_pres2presfree'}{else}{l s='NO' mod='ets_pres2presfree'}{/if}</span>
        </li>
        <li>
            <span>{l s='Force all ID numbers:' mod='ets_pres2presfree'}&nbsp;{if $ets_pres2pres_import_force_all_id}{l s='YES' mod='ets_pres2presfree'}{else}{l s='NO' mod='ets_pres2presfree'}{/if}</span>
        </li>
        <li>
            <span>{l s='Keep customer passwords:' mod='ets_pres2presfree'}&nbsp;{if $ets_regenerate_customer_passwords}{l s='NO' mod='ets_pres2presfree'}{else}{l s='YES' mod='ets_pres2presfree'}{/if}</span>
        </li>
    </ul>
</div>
<div class="data-format-to-import">
    <div>{l s='Source website information:' mod='ets_pres2presfree'}</div>
    <ul>
        <li>
            <span>{l s='Site URL: ' mod='ets_pres2presfree'}
            {if count($link_sites)>1}
                {foreach from=$link_sites key='key' item='link_site'}
                    <p>{l s='Shop' mod='ets_pres2presfree'}{$key+1|intval}: &nbsp;<a target="_blank" href="{$link_site|escape:'html':'UTF-8'}">{$link_site|escape:'html':'UTF-8'}</a></p>
                {/foreach}
            {else}
                <a target="_blank" href="{$link_sites[0]|escape:'html':'UTF-8'}">{$link_sites[0]|escape:'html':'UTF-8'}</a>
            {/if}
            
            </span>
        </li>
        <li>
            <span>{l s='Platform: ' mod='ets_pres2presfree'}{$platform|escape:'html':'UTF-8'}</span>
        </li>
        <li>
            <span>{l s='Version Prestashop: ' mod='ets_pres2presfree'}{$vertion|escape:'html':'UTF-8'}</span>
        </li>
    </ul>
</div>
<div class="alert alert-warning">
    {l s='You are going to make big changes to website database and images.' mod='ets_pres2presfree'}
    {l s='Make sure you have a complete backup of your website (both files and database)' mod='ets_pres2presfree'}
</div>
<div class="form-group">
    <div class="checkbox col-xs-12">
        <label for="have_made_backup" class="one-line">
            <input id="have_made_backup" name="have_made_backup" type="checkbox"/><span class="data_checkbox_style"><i class="icon icon-check"></i></span> {l s='I have made a complete backup of this website' mod='ets_pres2presfree'}
        </label>
    </div>
</div>
<script type="text/javascript">
$(document).on('click','.not_interested',function(){
    $('.extra_pro2,.extra_pro').hide();
    return false;
});
</script>