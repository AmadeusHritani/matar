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
<div class="dtm-right-block">
    <div class="panel data_tab_help">
        <div class="panel-heading"><i class="icon-import"></i>{l s='Help' mod='ets_pres2presfree'}</div>            
        <h4>{l s='Steps to migrate old Prestashop versions (1.4.x, 1.5.x and 1.6.x) to Prestashop 1.7' mod='ets_pres2presfree'}</h4>
        <ul>
            <li>{l s='1. Install "Prestashop Connector" on source website. Download Prestashop connector module' mod='ets_pres2presfree'}&nbsp;<a href="{$mod_dr_pres2pres|escape:'html':'UTF-8'}plugins/ets_pres2presconnector.zip">{l s='here.' mod='ets_pres2presfree'}</a></li>
            <li>{l s='3. Install a fresh Prestashop 1.7 website (target website)' mod='ets_pres2presfree'}</li>
            <li>{l s='4. Install "Prestashop Migrator" on target website' mod='ets_pres2presfree'}</li>
            <li>{l s='5. Enter "Secure access token" (or import data file) that is available on "Prestashop Connector" module' mod='ets_pres2presfree'}</li>
            <li>{l s='6. Final tweaks (Clear cache, Regenerate friendly URL, reindex data, recover passwords). Download Prestashop password keeper' mod='ets_pres2presfree'}&nbsp;<a href="{$mod_dr_pres2pres|escape:'html':'UTF-8'}plugins/ets_pres2prespwkeeper.zip">{l s='here.' mod='ets_pres2presfree'}</a></li>
        </ul>
        <h4>{l s='Other applications' mod='ets_pres2presfree'}</h4>
        <ul>
            <li>{l s='Migrate data between Prestashop websites' mod='ets_pres2presfree'}</li>
            <li>{l s='Migrate data from many websites into 1 website (merge shops)' mod='ets_pres2presfree'}</li>
            <li>{l s='Data backup, import and export' mod='ets_pres2presfree'}</li>
            <li>{l s='Bulk upload (valid XML format required, you can get sample XML files by exporting your website data using "Prestashop Connector")' mod='ets_pres2presfree'}</li>
        </ul>
    </div>
</div>
<div class="dtm-clearfix"></div>