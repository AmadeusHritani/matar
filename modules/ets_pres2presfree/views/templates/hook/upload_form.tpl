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
<div class="form-group">
    <label class="control-label col-lg-4" for="source_type">{l s='Source type' mod='ets_pres2presfree'}</label>
    <div class="col-lg-8">
        <select id="source_type" name="source_type">
            <option value="url_site">{l s='Use connector URL' mod='ets_pres2presfree'}</option>
            <option value="upload_file">{l s='Upload data file from computer' mod='ets_pres2presfree'}</option>
            <option value="link">{l s='Upload data file from URL' mod='ets_pres2presfree'}</option>
        </select>
    </div>
</div>
<div class="form-group source upload">
    <label class="control-label col-lg-4" for="file_import">{l s='Select data file' mod='ets_pres2presfree'}<span class="required">*</span></label>
    <div class="col-lg-8">
        <div class="data_upload_button_wrap">
            <input type="file" name="file_import" id="file_import"/>
            <div class="data_upload_button">
                <input readonly="true" type="text" name="data_upload_button" id="data_upload_button_input" value="{l s='No file selected.' mod='ets_pres2presfree'}" />
                <div class="data_upload_button_right">
                    <i class="icon icon-file"></i> {l s='Choose file' mod='ets_pres2presfree'}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group source link">
    <label class="control-label col-lg-4" for="link_file">{l s='Enter data file URL' mod='ets_pres2presfree'}<span class="required">*</span></label>
    <div class="col-lg-8">
        <input type="text" name="link_file" id="link_file" placeholder="{l s='URL to .zip file' mod='ets_pres2presfree'}" />
    </div>
</div>
<div class="form-group source url_site">
    <label class="control-label col-lg-4" for="link_site">{l s='Connector URL' mod='ets_pres2presfree'}<span class="required">*</span></label>
    <div class="col-lg-8">
        <input style="width: 100%;" type="text" name="link_site" id="link_site" placeholder="{l s='Connector URL (eg: http://yourwebstie.com/modules/ets_pres2presconnector/connector.php)' mod='ets_pres2presfree'}" />
    </div>
</div>
<div class="form-group source url_site">
    <label class="control-label col-lg-4" for="secure_access_tocken">{l s='Secure access token' mod='ets_pres2presfree'}<span class="required">*</span></label>
    <div class="col-lg-8">
        <input type="text" name="secure_access_tocken" id="secure_access_tocken" placeholder="{l s='Secure access token' mod='ets_pres2presfree'}" />
    </div>
</div>
<input type="hidden" id="link_site_connector" value="" name="link_site_connector" />
<p class="link_download_plugin">{l s='Before getting started with the migration, please Download' mod='ets_pres2presfree'}&nbsp;<a href="{$mod_dr_pres2pres|escape:'html':'UTF-8'}plugins/ets_pres2presconnector.zip" target="_blank">{l s='Prestashop Connector' mod='ets_pres2presfree'}</a>&nbsp;{l s=' module  and install the module on Source Prestashop website. This Connector module gives you the "Secure access token" (and data file) that is required above' mod='ets_pres2presfree'}</p>