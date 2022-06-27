{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="col-lg-12 col-md-12 ">
    <div class="izettle izettle-settings">
        <div class="panel"  style="text-align: center;">
            <div class="row">
                <div class="padding-top-4">
                    <p>
                        {if $is_immediately_sync}
                            <i class="icon-info-circle"></i> {l s='Product data changes for synchronization are collected and propagated automatically.' mod='izettleconnector'}
                        {else}
                            <i class="icon-info-circle"></i> {l s='Product data changes for synchronization are collected automatically.' mod='izettleconnector'}
                        {/if}
                    </p>
                </div>
            </div>
            <div class="list-empty-msg">
                <i class="icon-check"></i>
                {l s='No items to sync' mod='izettleconnector'}
            </div>


            {if !$is_immediately_sync}
                {include file="$sync_tpl_dir/warning.tpl"}
            {/if}

        </div>
    </div>
</div>