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
{extends file="helpers/form/form.tpl"}
{block name="label"}
	{if isset($input.label)}
		<label class="control-label col-lg-3 {if (isset($input.required) && $input.required && $input.type != 'radio') || (isset($input.showRequired) && $input.showRequired)} required{/if}">
			{if isset($input.hint)}
			<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="{if is_array($input.hint)}
						{foreach $input.hint as $hint}
							{if is_array($hint)}
								{$hint.text|escape:'html':'UTF-8'}
							{else}
								{$hint|escape:'html':'UTF-8'}
							{/if}
						{/foreach}
					{else}
						{$input.hint|escape:'html':'UTF-8'}
					{/if}">
			{/if}
			{$input.label|escape:'html':'UTF-8'}
			{if isset($input.hint)}
			</span>
			{/if}
		</label>
	{/if}
{/block}
{block name="input"}
    {if $input.type == 'search_product'}
        <div class="ph_pcms_search_product_form">
            <div class="input-group ">
                <input class="ph_pcms_search_product" name="ph_pcms_search_product" {if isset($input.placeholder)}placeholder="{$input.placeholder|escape:'html':'UTF-8'}"{/if} autocomplete="off" type="text" data-name="{$input.name|escape:'html':'UTF-8'}" />
                <span class="input-group-addon"> <i class="icon-search"></i> </span>
            </div>
            <input class="ph_pcms_ids_product" name="{$input.name|escape:'html':'UTF-8'}" value="{$fields_value[$input.name]|escape:'html':'UTF-8'}" type="hidden" />
            <ul class="ph_pcms_products" id="block_search_{$input.name|escape:'html':'UTF-8'}">
                {Module::getInstanceByName('ph_products_cms')->displayListProducts($fields_value[$input.name]) nofilter}
                <li class="ph_pcms_product_loading"></li>
            </ul>
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}