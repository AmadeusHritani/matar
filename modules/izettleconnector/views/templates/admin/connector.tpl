{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}
{if $is_connected}
    <div class="col-lg-12 bootstrap">
        <div class="izettle izettle-settings">
            <div class="panel padding-2" id="izettle-info">
                <div>
                    <div>
                        <img class="align-middle" src="{$logo|escape:'javascript':'UTF-8'}" alt="iZettle logo">
                        <span class="padding-4" style="position: relative; top:4px; left: 10px;">
                                {l s='Connected to' mod='izettleconnector'} {$display_name|escape:'javascript':'UTF-8'}
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
{else}
    <div class="col-lg-12 col-md-12 bootstrap">
        <div class="izettle izettle-settings">

            <div class="panel" id="izettle-info">

                <div class="row text-center">
                    <div class="text-center ">
                        <div class="col-lg-4 col-sm-12">
                            <img class="align-middle margin-top-4" src="{$logo|escape:'javascript':'UTF-8'}"
                                 alt="iZettle logo">
                        </div>
                        <div class="col-lg-4 col-sm-12">

                            <h4 class="margin-top-4">{l s='Connect your iZettle account to Prestashop' mod='izettleconnector'}</h4>
                            <a {if $is_mac}{else}{literal}onclick="setTimeout(function(){window.location = '{/literal}{$connect_url|escape:'javascript':'UTF-8'}'{literal}},0); return true;"{/literal} {/if}
                               target="_blank" class="btn btn-primary padding-left-4 padding-right-4"
                               href="https://my.zettle.com/apps/api-keys?name=Prestashop%20Integration&scopes=READ:FINANCE%20READ:PURCHASE%20READ:USERINFO%20READ:PRODUCT%20WRITE:PRODUCT">
                                {l s='Get API Key' mod='izettleconnector'}
                            </a>
                            <small class="help-block margin-top-4">
                                {l s='You will be redirect to iZettle to login and connect your account with PrestaShop' mod='izettleconnector'}
                            </small>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <h4 class="margin-bottom-2 margin-top-4">{l s='Need an iZettle account?' mod='izettleconnector'}</h4>
                            <a href="{$help_url|escape:'javascript':'UTF-8'}?utm_source=local_partnership&utm_medium=ecommerce&utm_campaign=prestashop"
                               target="_blank"
                               class="btn btn-primary">{l s='Sign up' mod='izettleconnector'}</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
{/if}