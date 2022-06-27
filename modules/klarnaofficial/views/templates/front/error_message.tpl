<div class="alert alert-warning">
	{if $klarna_error=='empty_cart'}
        {l s='Your cart is empty' mod='klarnaofficial'}
    {elseif $klarna_error=='purchase_currency'}
            {l s='The selected currency can not be used for deliveries to your country.' mod='klarnaofficial'}
            {l s='Currency' mod='klarnaofficial'}:{$klarnaCurrency}
            {l s='Country' mod='klarnaofficial'}:{$klarnaCountry}
	{else}
        {$klarna_error|escape:'html':'UTF-8'}
	{/if}
</div>