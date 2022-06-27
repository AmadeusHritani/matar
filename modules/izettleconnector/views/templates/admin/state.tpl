{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

{if $is_connected}
    <div class="izettle izettle-settings" style="position: relative; top: 3px">
        <i class="icon-chain"></i>
        {l s='Connected' mod='izettleconnector'} &nbsp;&nbsp;&nbsp;
        <a {literal}onclick="if (confirm(`{/literal}{l s='Once the disconnect is confirmed, it cannot be reverted. Remove API key and product export?' mod='izettleconnector'}{literal}`))setTimeout(function(){window.location = `{/literal}{$disconnect_url|escape:'javascript':'UTF-8'}`{literal}},0); return true;"{/literal}
           href="#">[{l s='Disconnect' mod='izettleconnector'}]</a>
    </div>
{else}
    <div class="izettle izettle-settings" style="position: relative; top: -3px">
        <i class="icon-chain-broken"></i>
        {l s='Disconnected' mod='izettleconnector'} &nbsp;&nbsp;&nbsp;
        <a
           href="https://my.izettle.com/apps/api-keys?name=Prestashop%20Integration&scopes=READ:FINANCE%20READ:PURCHASE%20READ:USERINFO%20READ:PRODUCT%20WRITE:PRODUCT">
            [{l s='Get API Key' mod='izettleconnector'}]
        </a>
    </div>
{/if}
