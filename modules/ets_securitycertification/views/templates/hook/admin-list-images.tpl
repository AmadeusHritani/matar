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


<div class="panel col-lg-12">
    <div class="panel-heading">
        <i class="icon-list"></i>{l s='Cerfitication' mod='ets_securitycertification'}
    </div>
    <div class="list-images">
        <div class="table-heading">
            <div class="column left">{l s='Image' mod='ets_securitycertification'}<span class="ets-sc-tooltip">?<span class="ets-sc-tooltip-content">{l s='Accept format: jpg, jpeg, png, gif. Limit %s' sprintf=[$PS_ATTACHMENT_MAXIMUM_SIZE] mod='ets_securitycertification'}</span></span></div>
            <div class="column left">{l s='Link' mod='ets_securitycertification'}</div>
            <div class="column left">{l s='Description' mod='ets_securitycertification'}</div>
            <div class="column left">{l s='Alt description' mod='ets_securitycertification'}</div>
            <div class="column center">{l s='Action' mod='ets_securitycertification'}</div>
        </div>
        <div class="table-body">
            {assign var="hidden" value=false}
            {if $images}
                {assign var="hidden" value=true}
                {foreach from=$images item='image'}
                    {include file="./admin-post-form.tpl" image=$image hidden=false}
                {/foreach}
            {/if}
            {include file="./admin-post-form.tpl" image=[] hidden=$hidden}
        </div>
        <div class="table-footer">
            <div class="table-tfoot">
                <button type="button" name="postImage" class="btn btn-primary" data-edit-title="{l s='Save certification' mod='ets_securitycertification'}" data-add-title="{l s='Add new certification' mod='ets_securitycertification'}">
                    <svg class="w_14 h_14" width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1344 960v-128q0-26-19-45t-45-19h-256v-256q0-26-19-45t-45-19h-128q-26 0-45 19t-19 45v256h-256q-26 0-45 19t-19 45v128q0 26 19 45t45 19h256v256q0 26 19 45t45 19h128q26 0 45-19t19-45v-256h256q26 0 45-19t19-45zm320-64q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>&nbsp;
                    <span class="ets-sc-title">
                        {l s='Add new certification' mod='ets_securitycertification'}
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
