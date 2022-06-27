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

{extends $layout}

{block name='content'}
{if isset($klarna_checkout_cart_changed) && $klarna_checkout_cart_changed}
<div class="alert alert-warning">
    {l s='Your cart have changed.' mod='klarnaofficial'}<br />
    {l s='Please check all information below and then continue with the checkout.' mod='klarnaofficial'}
</div>
{/if}

{capture name=path}{l s='Checkout' mod='klarnaofficial'}{/capture}

{if isset($vouchererrors) && $vouchererrors!=''}
<div class="alert alert-warning">
	{$vouchererrors|escape:'html':'UTF-8'}
</div>
{/if}

<script type="text/javascript">
	// <![CDATA[
	var txtProduct = "{l s='product' js=1 mod='klarnaofficial'}";
	var txtProducts = "{l s='products' js=1 mod='klarnaofficial'}";
	var freeShippingTranslation = "{l s='Free Shipping!' js=1 mod='klarnaofficial'}";
	var kcourl = "{$kcourl|escape:'javascript':'UTF-8'}";
	var isv3 = true;
	// ]]>
</script>
<style type="text/css">
    .kco-btn--default {
        background: #343434;
        color: #fff;
    }
    .kco-btn--default:hover {
        background: #191919;
        color: #fff;
    }
    .kco-btn--default:active, .kco-btn--default:focus {
        background: #343434;
        color: #fff;
    }
</style>
<div class="kco-cf kco-main">
	<div id="kco_cart_summary_div">
    <div class="cart-grid-body col-xs-12 col-lg-8">

        <!-- cart products detailed -->
        <div class="card cart-container">
          <div class="card-block">
            <h1 class="h1">{l s='Shopping Cart' mod='klarnaofficial'}</h1>
          </div>
          <hr class="separator">
        {include file='checkout/_partials/cart-detailed.tpl' cart=$cart}
        </div>
        </div>

        <div class="cart-grid-right col-xs-12 col-lg-4">

        {block name='cart_summary'}
          <div class="card cart-summary">

            {block name='hook_shopping_cart'}
              {hook h='displayShoppingCart'}
            {/block}

            {block name='cart_totals'}
              {include file='checkout/_partials/cart-detailed-totals.tpl' cart=$cart}
            {/block}

          </div>
        {/block}


      </div>

	</div><!-- /#kco_cart_summary_div -->
		<div class="col-xs-12">
			{if isset($left_to_get_free_shipping) AND $left_to_get_free_shipping>0}
			<div class="kco-infobox">
				{l s='By shopping for' mod='klarnaofficial'}&nbsp;<strong>{Tools::displayPrice($left_to_get_free_shipping)}</strong>&nbsp;{l s='more, you will qualify for free shipping.' mod='klarnaofficial'}
			</div>
			{/if}
		</div><!-- /.col-xs-12-->

		<div class="cart-grid-body kco-box col-xs-12">
            <div class="card">
                <div class="row">
                    {if 1 == $KCO_ALLOWMESSAGE}
                    <div class="col-md-12">
                        <div class="xcard">
                                <form action="{$link->getModuleLink('klarnaofficial', $controllername, [], true)|escape:'html':'UTF-8'}" method="post" id="klarnamessage">
                                    <div class="">
                                        <div class="card-block">
                                            <span class="kco-step-heading">
                                            {l s='Message' mod='klarnaofficial'}
                                            </span>
                                            <p id="messagearea">
                                                <textarea id="message" name="message" class="kco-input kco-input--area kco-input--full" placeholder="{l s='Add additional information to your order (optional)' mod='klarnaofficial'}">{if isset($message) && isset($message.message)}{$message.message|escape:'htmlall':'UTF-8'}{/if}</textarea>
                                                <button type="submit" name="savemessagebutton" id="savemessagebutton" class="kco-btn kco-btn--default">
                                                    <span>{l s='Save' mod='klarnaofficial'}</span>
                                                </button>
                                            </p><!-- /#messagearea -->
                                        </div>
                                    </div><!-- /.kco-target -->
                                </form><!-- /#klarnamessage -->
                        </div>
                    </div>
                    {/if}
                </div>
                <div class="xcard">
                    {if $giftAllowed==1}
                        <form action="{$link->getModuleLink('klarnaofficial', $controllername, [], true)|escape:'html':'UTF-8'}" method="post" id="klarnagift">
                            <div class="card-block">
                                <h1 class="h1 kco-trigger {if !$message.message}kco-trigger--inactive{/if}">
                                    {l s='Gift-wrapping' mod='klarnaofficial'}
                                </h1>
                            </div>
                            <div class="kco-target" {if $gift_message == '' && (!isset($gift) || $gift==0)}style="display: none;"{/if}>
                                <div class="card-block">
                                    <p id="giftmessagearea_long">
                                        <textarea id="gift_message" name="gift_message" class="kco-input kco-input--area kco-input--full" placeholder="{l s='Gift message (optional)' mod='klarnaofficial'}">{$gift_message|escape:'htmlall':'UTF-8'}</textarea>
                                        <input type="hidden" name="savegift" id="savegift" value="1" />
                                        <button type="submit" name="savegiftbutton" id="savegiftbutton" class="btn btn-primary">
                                            <span>{l s='Save' mod='klarnaofficial'}</span>
                                        </button>
                                        <span class="kco-check-group fl-r">
                                            <input type="checkbox" onchange="$('#klarnagift').submit();" class="giftwrapping_radio" id="gift" name="gift" value="1"{if isset($gift) AND $gift==1} checked="checked"{/if} />
                                            <span id="giftwrappingextracost">{l s='Additional cost:' mod='klarnaofficial'} {Tools::displayPrice($gift_wrapping_price)}</span>
                                        </span>
                                    </p><!-- /#giftmessagearea_long -->
                                </div>
                            </div><!-- /.kco-target -->
                        </form><!-- /#klarnagift -->
                    {/if}
                </div>
                <div class="xcard">
                    <div class="card-block">
                        <h1 class="h1">
                            {l s='Pay for your order' mod='klarnaofficial'}
                            <span>
                                {if isset($KCO_SHOWLINK) && $KCO_SHOWLINK}
                                    <a
                                        href="{$link->getPageLink('order', true, NULL, 'step=1')|escape:'html':'UTF-8'}"
                                        class="alternative_methods"
                                        title="{l s='Alternative payment methods' mod='klarnaofficial'}">
                                        <span>{l s='Alternative payment methods' mod='klarnaofficial'}<i class="icon-chevron-right right"></i></span>
                                    </a>
                                {/if}
                            </span>
                        </h1>
                    </div>
                    <div class="card-block">
                    <div id="checkoutdiv">{if isset($klarna_checkout)}{$klarna_checkout nofilter}{/if}</div>
                    </div>
                </div>
            </div>
        </div>
<!-- /#checkoutdiv.col-xs-12 -->
</div><!-- /#height_kco_div -->
{/block}