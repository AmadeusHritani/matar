{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<script>
    function cancelPartialSync() {
        if (confirm(`{l s='Once the partial sync is cancelled, it cannot be reverted. Do you want to continue?' mod='izettleconnector'}`)) {
            $.ajax({
                method: "GET",
                dataType: 'html',
                timeout: 0,
                async: true,
                cache: false,
                url: `{$partial_sync_close|escape:'javascript':'UTF-8'}`
            }).done(function (res) {
                window.location.reload();
            }).fail(function (err) {
                alert('partial sync cancellation failed, please try again');
            });
        }

    }
</script>
{if isset($is_partial_sync_panel) && $is_partial_sync_panel}<div class="col-lg-12 bootstrap izettle panel" style="position: relative; text-align: center">{/if}

    {l s='Your Zettle export can be continued' mod='izettleconnector'}.<br><br>
            {if $is_partial_sync_valid}
                <span class="izettle" style="line-height: 16px"><a style="padding: 5px 10px; margin: 0px 15px"
                                                                  {if isset($is_partial_sync_panel) && $is_partial_sync_panel}class="btn btn-primary"{else}class="btn btn-primary pull-right"{/if}
                                                                   href="{$partial_sync_link|escape:'javascript':'UTF-8'}">{l s='Continue now' mod='izettleconnector'}</a></span><br>
            {else}
                <span style="background:yellow">{l s='Last partial sync' mod='izettleconnector'} {$last_sync_time|escape:'javascript':'UTF-8'}, {l s='please wait 24h' mod='izettleconnector'}</span>
            {/if}
            <br>
            <span class="izettle"><a style="cursor: pointer; text-decoration: underline"
                                     onclick="cancelPartialSync(); return true;">{l s='cancel partial sync' mod='izettleconnector'}</a></span>

    {if isset($is_partial_sync_panel) && $is_partial_sync_panel}</div>{/if}
