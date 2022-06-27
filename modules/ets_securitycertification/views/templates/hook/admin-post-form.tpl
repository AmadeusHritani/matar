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

<form class="listing-row{if $hidden} hide{/if}" id="form_id_{if isset($image.id_ets_sc_certification)}{$image.id_ets_sc_certification|intval}{else}0{/if}" action="{$action nofilter}{if isset($image.id_ets_sc_certification)}&id_ets_sc_certification={$image.id_ets_sc_certification|intval}{/if}" method="POST" enctype="multipart/form-data">
    <div class="column left">
        <div class="ets-sc-img-upload{if isset($image.image_url) && $image.image_url|trim !== ''} img_base{/if}">
            <input type="file" name="image" value="" accept="image/png, image/gif, image/jpeg, image/jpg" class="hide">
            <span class="ets-sc-drag-drop-upload-file" title="{l s='Choose file' mod='ets_securitycertification'}">
                <svg class="w-14 h-14" width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z"/></svg>
            </span>
            <div class="ets-sc-thumbnail-wrapper">
                {if isset($image.image_url)}
                    <img class="imgm image-thumbnail" src="{$image.image nofilter}" width="80" alt="{$image.title|escape:'html':'UTF-8'}"/>
                {/if}
            </div>
        </div>
        <br/>
        <p class="help-block">{l s='Accept format: jpg, jpeg, png, gif. Limit %s' sprintf=[$PS_ATTACHMENT_MAXIMUM_SIZE] mod='ets_securitycertification'}</p>
    </div>
    <div class="column left">
        <input type="text" name="link" value="{if isset($image.link)}{$image.link nofilter}{/if}" class="form-control">
    </div>
    <div class="column left">
        <input type="text" name="title" value="{if isset($image.title)}{$image.title|escape:'html':'UTF-8'}{/if}" class="form-control">
    </div>
    <div class="column left">
        <input type="text" name="alt" value="{if isset($image.alt)}{$image.alt|escape:'html':'UTF-8'}{/if}" class="form-control">
    </div>
    <div class="column center">
        <a class="ets-sc-btn-delete{if !isset($image.delete_url)} hide{/if}" href="{if isset($image.delete_url)}{$image.delete_url nofilter}{/if}" title="{l s='Delete' mod='ets_securitycertification'}">
            <svg class="w_14 h_14" width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M704 736v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm128 724v-948h-896v948q0 22 7 40.5t14.5 27 10.5 8.5h832q3 0 10.5-8.5t14.5-27 7-40.5zm-672-1076h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z"/></svg>
        </a>
    </div>
</form>