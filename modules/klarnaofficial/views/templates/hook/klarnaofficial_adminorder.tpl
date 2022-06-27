{**
* Prestaworks AB
*
* NOTICE OF LICENSE
*
* This source file is subject to the End User License Agreement(EULA)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://license.prestaworks.se/license.html
*
* @author    Prestaworks AB <info@prestaworks.se>
* @copyright Copyright Prestaworks AB (https://www.prestaworks.se/)
* @license   http://license.prestaworks.se/license.html
*}
<div class="row">
	<div class="col-md-4">
		<div class="panel card">
			<div class="card-header"><h3 class="card-header-title">{l s='Klarna' mod='klarnaofficial'}</h3></div>
			<div class="card-body">
				{*{l s='Social security number' mod='klarnaofficial'}: {$klarnacheckout_ssn|escape:'html':'UTF-8'}<br />*}
				{if (isset($klarna_checkbox_info.text_at_time_of_purchase))}
                    {l s='Custom checkbox' mod='klarnaofficial'}:{if ($klarna_checkbox_info.checked)}{l s='True' mod='klarnaofficial'}{else}{l s='False' mod='klarnaofficial'}{/if}
                    {$klarna_checkbox_info.text_at_time_of_purchase|escape:'html':'UTF-8'}<br />
                {/if}
				{l s='Invoice number' mod='klarnaofficial'}: {$klarnacheckout_invoicenumber|escape:'html':'UTF-8'}<br />
				{l s='Reservation' mod='klarnaofficial'}: <a href="{$klarnainfolink}">{$klarnacheckout_reservation|escape:'html':'UTF-8'}</a><br />
				<span{if $klarnacheckout_risk_status == 'Pending'} style="color:orange; font-weight:bold;"{/if}{if $klarnacheckout_risk_status == 'cancel' || $klarnacheckout_risk_status == 'credit'} style="color:red; font-weight:bold;"{/if}{if $klarnacheckout_risk_status == 'ok' || $klarnacheckout_risk_status == 'ACCEPTED'}  style="color:green; font-weight:bold;"{/if}>
				{l s='Risk status' mod='klarnaofficial'}: {$klarnacheckout_risk_status|escape:'html':'UTF-8'}<br />
				</span>
                {if $klarnacheckout_risk_status == 'Pending'}<a href="../modules/klarnaofficial/checkpendingorders.php" target="_blank">{l s='Check Pending status' mod='klarnaofficial'}</a>{/if}
			</div>
			{foreach from=$klarna_errors item=klarna_error}
				<div class="alert alert-danger"><p>{$klarna_error.error_message|escape:'html':'UTF-8'}</p></div>
			{/foreach}
		</div>
	</div>
</div>

<script type="text/javascript">
var confirmchangeklarnatext = "{l s='If you change the address, Klarna will not accept the risk of the order. Do you wish to continue?' js=1 mod='klarnaofficial'}";

$("#addressShipping .btn").off("click").on("click", function(e){
return confirm(confirmchangeklarnatext);
});
$("#addressInvoice .btn").off("click").on("click", function(e){
return confirm(confirmchangeklarnatext);
});
</script>