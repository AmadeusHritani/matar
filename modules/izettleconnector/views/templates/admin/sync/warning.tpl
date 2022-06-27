{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="text-center padding-4" style="width: 100%;">

    <aside class="padding-top-4">
        <p>
            <i class="icon-info-circle"></i> {l s='For automatic synchronization, please copy the URL below and setup a cron job. Cron job tools are provided by your hosting provider. For assistance, please reach out to your hosting partner or technical support.' mod='izettleconnector'}

        </p>

        <p>
            <strong style="text-decoration: underline; text-transform: lowercase">{$cron_link|escape:'javascript':'UTF-8'}</strong>
        </p>

        <p>
            {l s='Configure cron job access and URL.' mod='izettleconnector'} <a href="{$settings_link|escape:'javascript':'UTF-8'}">[{l s='Configure' mod='izettleconnector'}]</a>
        </p>

    </aside>
</div>