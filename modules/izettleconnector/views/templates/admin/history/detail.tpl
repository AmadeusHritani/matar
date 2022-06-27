{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="izettle">
    <div class="col-lg-4 col-md-12 ">
        <div id="task-{$item.id_izettle_task|escape:'javascript':'UTF-8'}" class="panel col-md-12 task-state-{$item['state_name']|escape:'javascript':'UTF-8'}">
            <div class="col-lg-12 task-info finished">
                <div class="col-lg-12">
                    <h3 class="task-action_desc">{$item['action_desc']|escape:'javascript':'UTF-8'}</h3>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4 bold">{l s='Last operation' mod='izettleconnector'}:</div>
                    <div class="col-lg-8" style="overflow-x: auto;margin-bottom: 10px;">{$item['current_info']|escape:'javascript':'UTF-8'}</div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4 bold">{l s='Status' mod='izettleconnector'}:</div>
                    <div class="col-lg-8 "><span
                                class="task-state_name">{$item['state_name']|escape:'javascript':'UTF-8'}</span></div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4 bold">{l s='Total' mod='izettleconnector'}:</div>
                    <div class="col-lg-8 task-total_count">{$item['total_count']|escape:'javascript':'UTF-8'}</div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4 bold">{l s='Processed' mod='izettleconnector'}</div>
                    <div class="col-lg-8">
                        <span class="task-processed_count">{$item['processed_count']|escape:'javascript':'UTF-8'}</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4 bold">{l s='Elapsed time' mod='izettleconnector'}:</div>
                    <div class="col-lg-8 task-elapsed">{$item['elapsed']|escape:'javascript':'UTF-8'}</div>
                </div>
                <div class="col-lg-12 progressbar-container">
                    <div class="progressbar">
                        <div style="width:{$item['percent']|escape:'javascript':'UTF-8'}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-12 ">
        <div class="panel">
        <table class="table">
            <thead>
            <tr>
                <th>{l s='ID' mod='izettleconnector'}</th>
                <th>{l s='State' mod='izettleconnector'}</th>
                {if $show_product}
                    <th>{l s='Product' mod='izettleconnector'}</th>
                {/if}
                {if $show_desc}
                    <th>{l s='Description' mod='izettleconnector'}</th>
                {/if}

            </tr>
            </thead>
            <tbody>

            {foreach $products as $product}
                <tr>
                    <td>{$product['id_izettle_task_product']|escape:'javascript':'UTF-8'}</td>
                    <td>
                        {if $product['undone']}
                            <span style="padding: 3px; margin: 3px; background: blue; color: white"> {l s='Undone' mod='izettleconnector'}</span>
                        {else}
                            {if $product['processed']}
                                <span style="padding: 3px; margin: 3px;background: green; color: white"> {l s='Processed' mod='izettleconnector'}</span>
                            {else}
                                <span style="padding: 3px; margin: 3px;background: yellow; color: black"> {l s='Not processed' mod='izettleconnector'}</span>
                            {/if}
                        {/if}
                    </td>
                    {if $show_product}
                        <td>[{$product['id_product']|escape:'javascript':'UTF-8'}] {$product['name']|escape:'javascript':'UTF-8'}</td>
                    {/if}
                    {if $show_desc}
                        <td>{$product['desc']|escape:'javascript':'UTF-8'}</td>
                    {/if}

                </tr>
            {/foreach}
            </tbody>
        </table>
        </div>
    </div>
</div>