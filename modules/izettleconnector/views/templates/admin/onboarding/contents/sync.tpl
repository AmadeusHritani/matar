{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}


<h4 class="margin-top-1">{l s='Synchronisation' mod='izettleconnector'}</h4>

<p>{l s='Please choose sync mode between your store and Zettle' mod='izettleconnector'}</p>
{l s='Available options' mod='izettleconnector'}:
<p>

<ul>
    <li>{l s='Sync changes immediately' mod='izettleconnector'}</li>
    <li>{l s='Sync changes by Cron job' mod='izettleconnector'}</li>
    <li>{l s='Manual sync' mod='izettleconnector'}</li>
</ul>
<small class="help-block margin-top-1">
    <p>
        <strong>{l s='Sync changes immediately' mod='izettleconnector'}</strong> {l s='is more preferable for most customer it does not require any additional settings' mod='izettleconnector'}
        <br>
        <strong>{l s='Sync changes by Cron job' mod='izettleconnector'}</strong> {l s='is usefull, if you are handling large numbers of products and transactions or if you see performance issues when using the automatic synchronization' mod='izettleconnector'}
        <br>
        <strong>{l s='Manual sync' mod='izettleconnector'}</strong> {l s='is usually used for debug mode' mod='izettleconnector'}
        <br>
    </p>

    </p>


    {l s='Defaul option - ' mod='izettleconnector'}
    <strong>{l s='Sync changes immediately' mod='izettleconnector'}</strong>

</small>


<br>