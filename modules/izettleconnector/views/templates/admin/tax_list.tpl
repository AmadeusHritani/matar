{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

{if count($taxes) > 0}

    <div class="padding-top-1">
        {foreach $taxes as $tax}
            <div class="no-zettle-style padding-top-4">
               <input class="zettle-tax-checkbox tax option-input"
                      onclick="is_changed_tax_settings = true; return true;"
                                                                       style="position: relative;top: -5px;"
                                                                       {if $tax['checked']}checked="checked"{/if}
                                                                       name="{$tax['uuid']|escape:'javascript':'UTF-8'}"
                                                                       data-uuid="{$tax['uuid']|escape:'javascript':'UTF-8'}"
                                                                       id="{$tax['uuid']|escape:'javascript':'UTF-8'}"
                                                                       type="checkbox">
                <label for="{$tax['uuid']|escape:'javascript':'UTF-8'}" style="line-height: 20px; padding-left: 5px"><strong style="font-size: 14px; line-height: 14px">{$tax['label']|escape:'javascript':'UTF-8'} </strong><br><small>{$tax['percentage']|escape:'javascript':'UTF-8'}%  {if $tax['default']}, default{/if}</small></label>
            </div>
        {/foreach}
    </div>
    {else}
    {l s='There is no Zettle taxes' mod='izettleconnector'}
{/if}

