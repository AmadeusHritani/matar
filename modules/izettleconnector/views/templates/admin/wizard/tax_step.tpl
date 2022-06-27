{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}


<div class="customradiobutton-container" id="tax-main-container">
    <style>
        hr {
            border: none; /* Убираем границу для браузера Firefox */
            color: #bbb; /* Цвет линии для остальных браузеров */
            background-color: #bbb; /* Цвет линии для браузера Firefox и Opera */
            height: 2px; /* Толщина линии */
        }
    </style>
    {if $is_tax_exist}

        {if !$is_default_exist}
            <div class="text-center padding-4" style="width: 100%;">

                <aside class="padding-top-4">
                    <p>
                        <i class="icon-info-circle"></i> {l s='There are no default taxes in Zettle.' mod='izettleconnector'}
                        {l s='You could go to Zettle system to ' mod='izettleconnector'}
                        <a
                                target="_blank"
                                href="https://my.izettle.com/settings/products/tax">
                            {l s='select default taxes' mod='izettleconnector'}
                        </a>.
                        <br>
                        {l s='Please, reload step after setting' mod='izettleconnector'}.
                        <a href="#" onclick="loadTaxStep(); return true;">
                            <i class="icon-refresh"></i> {l s='Reload' mod='izettleconnector'}
                        </a>
                    </p>


                </aside>
            </div>
        {else}
            <div class="option">
                <input type="radio" {if $is_default_exist}checked="checked"{/if} name="taxes" id="only-default"
                       value="only-default">
                <label for="only-default" aria-label="only default">
                    <span></span>

                    {l s='Use your default Zettle tax rules' mod='izettleconnector'}
                    <small>
                        {l s='The products you export to Zettle, will adopt the tax rules you configured in Zettle. PrestaShop taxes will not be changed' mod='izettleconnector'}
                    </small>
                    <br>
                    <small>
                        {l s='Zettle tax(es) will be applied:' mod='izettleconnector'}<br>
                        {foreach $default_taxes as $tax}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- {$tax->getLabel()|escape:'javascript':'UTF-8'} ({$tax->getPercentage()|escape:'javascript':'UTF-8'}%)
                            <br>
                        {/foreach}
                    </small>
                </label>
            </div>
        {/if}
        <div class="option">
            <input type="radio" {if !$is_default_exist}checked="checked"{/if} name="taxes" id="custom" value="custom">
            <label for="custom" aria-label="Custom">
                <span></span>

                {l s='Link your PrestaShop taxes with Zettle' mod='izettleconnector'}
                <small>
                    {l s='The products you export to Zettle, will use the tax rules as configured below. PrestaShop taxes will not be changed' mod='izettleconnector'}
                </small>
                <hr>
                {if count($prestashop_taxes) > 0}
                    <div class="row taxmap">
                        <div class="col-lg-3 col-md-5 col-sm-11 padding-bottom-2" style="text-align: center">
                            <strong>{l s='PrestaShop taxes' mod='izettleconnector'}</strong>
                            <span class="help-box" data-toggle="popover" data-content="Used when you sell your products online via PrestaShop." data-original-title="" title=""></span>
                        </div>
                        <div class="col-lg-1 col-md-1 hidden-sm">

                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12  padding-bottom-2" style="text-align: center">
                            <strong>{l s='Zettle taxes' mod='izettleconnector'}</strong>
                            <span class="help-box" data-toggle="popover" data-content="Used when you sell your products offline at the POS via Zettle" data-original-title="" title=""></span>
                        </div>
                    </div>
                {/if}
                {foreach $prestashop_taxes as $prestashop_tax}
                    <div class="row taxmap">
                        <div class="col-lg-3 col-md-5 col-sm-11">
                            <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$prestashop_tax['tax_name']|escape:'html':'UTF-8'}</small>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <small>-></small>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <small>
                                <select onclick="$('input[type=radio][name=taxes][value=custom]').prop('checked', true); return true;"
                                        data-taxid="{$prestashop_tax['id_tax']|escape:'html':'UTF-8'}"
                                        class="taxmap-selector form-control form-control-select">
                                    <option value=""
                                            {if !$prestashop_tax['associated_zettle_uuid']}selected="selected"{/if}>-
                                    </option>
                                    {foreach from=$zettle_taxes item=$tax}
                                        <option value="{$tax->getUuid()|escape:'javascript':'UTF-8'}"
                                                {if $prestashop_tax['associated_zettle_uuid'] == $tax->getUuid()}selected="selected"{/if}>{$tax->getLabel()|escape:'html':'UTF-8'} ({$tax->getPercentage()|escape:'javascript':'UTF-8'}%)</option>
                                    {/foreach}
                                </select>
                            </small>
                        </div>
                    </div>
                {/foreach}
                <hr>
                {if $is_default_exist}
                    <small>{l s='Optional: Additionally, you can apply your default Zettle tax rules to the exported products.' mod='izettleconnector'}
                    </small>

                    {foreach $default_taxes as $tax}
                        <small class="no-zettle-style">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="custom-explicitly-defaul-tax option-input" style="position: relative;top: 5px;"
                                   onclick="$('input[type=radio][name=taxes][value=custom]').prop('checked', true); return true;"
                                   name="{$tax->getUuid()|escape:'javascript':'UTF-8'}"
                                   data-uuid="{$tax->getUuid()|escape:'javascript':'UTF-8'}"
                                   id="{$tax->getUuid()|escape:'javascript':'UTF-8'}"
                                   type="checkbox">
                            <label for="{$tax->getUuid()|escape:'javascript':'UTF-8'}">{$tax->getLabel()|escape:'javascript':'UTF-8'} ({$tax->getPercentage()|escape:'javascript':'UTF-8'}%)</label>
                        </small>
                    {/foreach}
                {/if}
            </label>
        </div>
    {else}
        <div class="text-center padding-4" style="width: 100%;">

            <aside class="padding-top-4">
                <p>
                    <i class="icon-info-circle"></i> {l s='There are no taxes in Zettle.' mod='izettleconnector'}
                    {l s='You could go to Zettle system to ' mod='izettleconnector'}
                    <a
                            target="_blank"
                            href="https://my.izettle.com/settings/products/tax">
                        {l s='add taxes' mod='izettleconnector'}
                    </a>.
                    <br>
                    {l s='Please, reload step after setting' mod='izettleconnector'}.
                    <a href="#" onclick="loadTaxStep(); return true;">
                        <i class="icon-refresh"></i> {l s='Reload' mod='izettleconnector'}
                    </a>
                </p>


            </aside>
        </div>
    {/if}
    <div class="option">
        <input type="radio" name="taxes" {if !$is_tax_exist}checked="checked"{/if} id="no-taxes" value="no-taxes">
        <label for="no-taxes" aria-label="no taxes">
            <span></span>

            {l s='No action on taxes applied' mod='izettleconnector'}
        </label>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
