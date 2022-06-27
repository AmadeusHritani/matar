{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

{if isset($panel) && $panel}
<div class="izettle panel col-md-12 col-sm-12">

{else}
    <div class="col-md-12 col-sm-12">
        <div style="padding: 20px;">
            <strong>{l s='Confirm settings' mod='izettleconnector'}:</strong>
        </div>
{/if}
    <div {if isset($use_tax) && $use_tax && count($labels)} class="row" {/if}>
        <div {if isset($use_tax) && $use_tax && count($labels)}class="  col-md-6 col-sm-12"{/if} >
            <table class="izettle-table">

                <tbody>


                <tr>
                    <td>{l s='Total products' mod='izettleconnector'}</td>
                    <td class="bold">{$product_counter|escape:'javascript':'UTF-8'}</td>
                </tr>

                <tr>
                    <td>{l s='Synchronization' mod='izettleconnector'}:</td>
                    <td class="bold">{if $mode == 'replace'}

                            {l s='Replace iZettle library' mod='izettleconnector'}
                        {else}

                            {l s='Add products to iZettle library' mod='izettleconnector'}
                        {/if}</td>
                </tr>
                {if isset($use_tax) && $use_tax}
                    <tr>
                        <td>{l s='Use taxes' mod='izettleconnector'}:</td>
                        <td class="bold">
                            {if $assign_tax}
                                {l s='Yes' mod='izettleconnector'}
                            {else}
                                {l s='No' mod='izettleconnector'}
                            {/if}</td>
                    </tr>
                    {if $assign_tax}
                        <tr>
                            <td>{l s='Assign default taxes' mod='izettleconnector'}:</td>
                            <td class="bold">
                                {if $createWithDefaultTax}
                                    {l s='Yes' mod='izettleconnector'}
                                {else}
                                    {l s='No' mod='izettleconnector'}
                                {/if}
                            </td>
                        </tr>
                    {/if}

                {/if}

                <tr>
                    <td>{l s='Price' mod='izettleconnector'}:</td>
                    <td class="bold">
                        {if $price == 'yes'}
                            {l s='Yes' mod='izettleconnector'}
                        {elseif $price == 'retail'}
                            {l s='Retail price only' mod='izettleconnector'}
                        {elseif $price == 'wholesale'}
                            {l s='Wholesale price only' mod='izettleconnector'}
                        {else}
                            {l s='No' mod='izettleconnector'}
                        {/if}
                    </td>
                </tr>

                <tr>
                    <td>{l s='Language' mod='izettleconnector'}:</td>
                    <td class="bold">{$lang|escape:'javascript':'UTF-8'}</td>
                </tr>


                <tr>
                    <td>{l s='Inventory' mod='izettleconnector'}:</td>
                    <td class="bold">{if $inventory == 'both'}

                            {l s='Continuous sync' mod='izettleconnector'}
                        {elseif $inventory == 'ps'}

                            {l s='From store to iZettle' mod='izettleconnector'}
                        {elseif $inventory == 'iz'}

                            {l s='From iZettle to store' mod='izettleconnector'}
                        {elseif $inventory == 'noinventory'}

                            {l s='No' mod='izettleconnector'}
                        {/if}</td>
                </tr>


                </tbody>
            </table>

        </div>

        {if isset($use_tax) && $use_tax && count($labels)}
            <div class="  col-md-6 col-sm-12">

                {if count($labels)}
                    <table class="table">
                        <thead>
                        <tr>
                            <th colspan="3"
                                style="text-align: center">{l s='Taxes mapping' mod='izettleconnector'} </th>

                        </tr>
                        </thead>
                        <tbody>

                        {foreach $labels as $label}
                            <tr>
                                {if $label['explicit']}
                                    <td colspan="3">{l s='explicitly add' mod='izettleconnector'} <span
                                                class="bold">{$label['zettle_label']|escape:'htmlall':'UTF-8'}</span>
                                    </td>
                                {else}
                                    <td>{$label['prestashop_label']|escape:'htmlall':'UTF-8'}</td>
                                    <td> -></td>
                                    <td class="bold">{$label['zettle_label']|escape:'htmlall':'UTF-8'}</td>
                                {/if}

                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                {/if}

            </div>
        {/if}
    </div>
    {if $product_counter > $day_count_limit}
        <div {if isset($use_tax) && $use_tax && count($labels)} class="row" {/if}>
            <script>
                create_new_partial_sync = {if $create_new_partial_sync}true{else}false{/if};
                partial_sync_pages = JSON.parse("{$json_pages|escape:'javascript':'UTF-8'}");
            </script>
            <div {if isset($use_tax) && $use_tax && count($labels)}class="col-md-12 col-sm-12"{/if}>
                <div class="text-center padding-4" style="width: 100%;">

                    <aside class="padding-top-4">
                         <div style="padding: 20px;">
                                <strong>{l s='Partial sync' mod='izettleconnector'}:</strong>
                            </div>
                        <p>
                            <i class="icon-info-circle"></i> {l s='The data will be split due to a limit of ' mod='izettleconnector'}
                            <b>{$day_count_limit|escape:'htmlall':'UTF-8'} {l s='products per day' mod='izettleconnector'}</b>.

                        </p>

                        <p>
                            {l s='Partial sync status' mod='izettleconnector'}:<br>

                            {*                        <select class="data-page-selector form-control form-control-select" style="width: auto;display: inline-block;">*}
                            {foreach from=$pages item=$page}
                                {*                                <option value="{$page['page']|escape:'javascript':'UTF-8'}"*}
                                {*                                        {if $page['page'] == $current_data_page} selected="selected"{/if}>{$page['label']|escape:'html':'UTF-8'}</option>*}
                                <small {if $page['page'] == $current_data_page}class="data-page-selector"{/if}
                                       data-value="{$page['page']|escape:'javascript':'UTF-8'}">
                                        {l s='Products' mod='izettleconnector'}
                                        {$page['label']|escape:'html':'UTF-8'}
                                        {if $page['page'] == $current_data_page}
                                            <b>[ {l s='ready for sync' mod='izettleconnector'} ] </b>{/if}
                                    {if $page['page'] < $current_data_page}

                                        {if ((int) $page['id_run']) > 0}
                                            [ {l s='completed' mod='izettleconnector'}, <a style="text-decoration: underline" target="_blank" href='{$history_url|escape:'javascript':'UTF-8'}{$page['id_run']|escape:'javascript':'UTF-8'}&no_partial_sync=1'> {l s='show details' mod='izettleconnector'}</a> ]
                                        {else}
                                            [ {l s='completed' mod='izettleconnector'} ]
                                        {/if}
                                    {/if}
                                </small>
                                <br>
                            {/foreach}
                            {*                        </select>*}

                        </p>
                    </aside>
                </div>
            </div>
        </div>
    {/if}
</div>