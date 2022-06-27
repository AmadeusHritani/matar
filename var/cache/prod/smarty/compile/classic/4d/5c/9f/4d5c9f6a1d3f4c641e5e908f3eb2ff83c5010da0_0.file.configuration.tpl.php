<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/_partials/configuration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4663e498055_70050704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d5c9f6a1d3f4c641e5e908f3eb2ff83c5010da0' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/_partials/configuration.tpl',
      1 => 1655988927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4663e498055_70050704 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="configuration_form" class="defaultForm form-horizontal stripe_official" action="#stripe_step_1" method="post" enctype="multipart/form-data" novalidate="">
	<input type="hidden" name="submit_login" value="1">
	<input type="hidden" name="order_status_select" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['orderStatusSelected']->value,'htmlall','UTF-8' ));?>
">
	<div class="panel" id="fieldset_0">
		<div class="form-wrapper">
			<div class="form-group stripe-connection">
				<?php $_smarty_tpl->_assignInScope('stripe_url', 'https://partners-subscribe.prestashop.com/stripe/connect.php?params[return_url]=');?>
				<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'[a @href1@]Create your Stripe account in 10 minutes[/a] and immediately start accepting card payments as well as local payment methods (no additional contract/merchant ID needed from your bank).','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( ($_smarty_tpl->tpl_vars['stripe_url']->value).($_smarty_tpl->tpl_vars['return_url']->value),'htmlall','UTF-8' ));
$_prefixVariable2 = ob_get_clean();
ob_start();
echo $_prefixVariable2;
$_prefixVariable3 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable4 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable1,array('@href1@'=>$_prefixVariable3,'@target@'=>$_prefixVariable4));?>
<br>

				<div class="connect_btn">
					<a href="https://partners-subscribe.prestashop.com/stripe/connect.php?params[return_url]=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['return_url']->value,'htmlall','UTF-8' ));?>
" class="stripe-connect">
						<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connect with Stripe','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</span>
					</a>
				</div>
			</div>
			<hr/>
			<div class="form-group">
				<label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mode','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="STRIPE_MODE" id="STRIPE_MODE_ON" value="1" <?php if ($_smarty_tpl->tpl_vars['stripe_mode']->value == 1) {?>checked="checked"<?php }?>>
						<label for="STRIPE_MODE_ON"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'test','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
						<input type="radio" name="STRIPE_MODE" id="STRIPE_MODE_OFF" value="0" <?php if ($_smarty_tpl->tpl_vars['stripe_mode']->value == 0) {?>checked="checked"<?php }?>>
						<label for="STRIPE_MODE_OFF"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'live','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
						<a class="slide-button btn"></a>
					</span>
					<p class="help-block"></p>
				</div>
				<span>
					<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can find your API keys in the Developers section of your Stripe [a @href1@]dashboard[/a].','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable5 = ob_get_clean();
ob_start();
echo 'https://dashboard.stripe.com/account/apikeys';
$_prefixVariable6 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable7 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable5,array('@href1@'=>$_prefixVariable6,'@target@'=>$_prefixVariable7));?>

				</span>
			</div>

			<div class="form-group" <?php if ($_smarty_tpl->tpl_vars['stripe_mode']->value == 1) {?>style="display: none;"<?php }?>>
				<label class="control-label col-lg-3 required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Publishable key (live mode)','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9">
					<input type="text" name="STRIPE_PUBLISHABLE" id="public_key" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['stripe_publishable']->value,'htmlall','UTF-8' ));?>
" class="fixed-width-xxl" size="20" required="required">
				</div>
			</div>
			<div class="form-group" <?php if ($_smarty_tpl->tpl_vars['stripe_mode']->value == 1) {?>style="display: none;"<?php }?>>
				<label class="control-label col-lg-3 required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Secret key (live mode)','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9">
					<input type="password" name="STRIPE_KEY" id="secret_key" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['stripe_key']->value,'htmlall','UTF-8' ));?>
" class="fixed-width-xxl" size="20" required="required">
				</div>
			</div>
			<div class="form-group"<?php if ($_smarty_tpl->tpl_vars['stripe_mode']->value == 0) {?>style="display: none;"<?php }?>>
				<label class="control-label col-lg-3 required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Publishable key (test mode)','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9">
					<input type="text" name="STRIPE_TEST_PUBLISHABLE" id="test_public_key" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['stripe_test_publishable']->value,'htmlall','UTF-8' ));?>
" class="fixed-width-xxl" size="20" required="required">
				</div>
			</div>
			<div class="form-group"<?php if ($_smarty_tpl->tpl_vars['stripe_mode']->value == 0) {?>style="display: none;"<?php }?>>
				<label class="control-label col-lg-3 required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Secret key (test mode)','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-9">
					<input type="password" name="STRIPE_TEST_KEY" id="test_secret_key" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['stripe_test_key']->value,'htmlall','UTF-8' ));?>
" class="fixed-width-xxl" size="20" required="required">
				</div>
			</div>

			<div id="conf-payment-methods">
				<p><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Testing Stripe','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</b></p>
				<ul>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Toggle the button above to Test Mode.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</li>
					<li>
						<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You\'ll find test card numbers in our [a @href1@]documentation[/a].','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable8 = ob_get_clean();
ob_start();
echo 'http://www.stripe.com/docs/testing';
$_prefixVariable9 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable10 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable8,array('@href1@'=>$_prefixVariable9,'@target@'=>$_prefixVariable10));?>

					</li>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In test mode, real cards are not accepted.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</li>
				</ul>
				<p><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Going live with Stripe','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</b></p>
				<ul>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Toggle the button above to Live Mode.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</li>
					<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In live mode, tests are no longer allowed.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</li>
				</ul>
				<p><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Getting support','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</b></p>
				<ul>
					<li><?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you have any questions, please check out [a @href1@]our FAQs[/a] first.','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable11 = ob_get_clean();
ob_start();
echo 'https://support.stripe.com/questions/prestashop';
$_prefixVariable12 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable13 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable11,array('@href1@'=>$_prefixVariable12,'@target@'=>$_prefixVariable13));?>
</li>
					<li><?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For questions regarding the module itself, feel free to [a @href1@]each out to the developers[/a].','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable14 = ob_get_clean();
ob_start();
echo 'https://addons.prestashop.com/en/contact-us?id_product=24922';
$_prefixVariable15 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable16 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable14,array('@href1@'=>$_prefixVariable15,'@target@'=>$_prefixVariable16));?>
</li>
					<li><?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For questions regarding your Stripe account, contact the [a @href1@]Stripe support[/a].','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable17 = ob_get_clean();
ob_start();
echo 'https://support.stripe.com/contact';
$_prefixVariable18 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable19 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable17,array('@href1@'=>$_prefixVariable18,'@target@'=>$_prefixVariable19));?>
</li>
				</ul>

				<p><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Payment form settings','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</b></p>
				<ol item="1">
					<li>
						<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cards','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</p>

						<div class="form-group">
							<input type="checkbox" id="reinsurance" name="reinsurance" <?php if ($_smarty_tpl->tpl_vars['reinsurance']->value) {?>checked="checked"<?php }?>/>
							<label for="reinsurance"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display an extended version of the form with card logos instead of the compact version. Choose the logos to display below based on the brands accepted by your Stripe account.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
							<div class="left20">
								<input type="checkbox" id="visa" name="visa" class="child" <?php if ($_smarty_tpl->tpl_vars['visa']->value) {?>checked="checked"<?php }?>/>
								<label for="visa"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Visa','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
								<input type="checkbox" id="mastercard" name="mastercard" class="child" <?php if ($_smarty_tpl->tpl_vars['mastercard']->value) {?>checked="checked"<?php }?>/>
								<label for="mastercard"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mastercard','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
								<input type="checkbox" id="american_express" name="american_express" class="child" <?php if ($_smarty_tpl->tpl_vars['american_express']->value) {?>checked="checked"<?php }?>/>
								<label for="american_express"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'American Express','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
								<input type="checkbox" id="cb" name="cb" class="child" <?php if ($_smarty_tpl->tpl_vars['cb']->value) {?>checked="checked"<?php }?>/>
								<label for="cb"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'CB (Cartes Bancaires)','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
								<input type="checkbox" id="diners_club" name="diners_club" class="child" <?php if ($_smarty_tpl->tpl_vars['diners_club']->value) {?>checked="checked"<?php }?>/>
								<label for="diners_club"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Diners Club / Discover','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
								<input type="checkbox" id="union_pay" name="union_pay" class="child" <?php if ($_smarty_tpl->tpl_vars['union_pay']->value) {?>checked="checked"<?php }?>/>
								<label for="union_pay"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'China UnionPay','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
								<input type="checkbox" id="jcb" name="jcb" class="child" <?php if ($_smarty_tpl->tpl_vars['jcb']->value) {?>checked="checked"<?php }?>/>
								<label for="jcb"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'JCB','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
								<input type="checkbox" id="discovers" name="discovers" class="child" <?php if ($_smarty_tpl->tpl_vars['discovers']->value) {?>checked="checked"<?php }?>/>
								<label for="discovers"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Discovers','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
							</div>
						</div>

						<div class="form-group">
							<input type="checkbox" id="applepay_googlepay" name="applepay_googlepay" <?php if ($_smarty_tpl->tpl_vars['applepay_googlepay']->value) {?>checked="checked"<?php }?>/>
							<label for="applepay_googlepay">
								<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Digital wallets, i.e. Apple Pay and Google Pay.[br]By using Apple Pay, you agree to [a @href1@]Stripe[/a] and [a @href2@]Apple[/a]\'s terms of service.','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable20 = ob_get_clean();
ob_start();
echo 'https://stripe.com/us/legal';
$_prefixVariable21 = ob_get_clean();
ob_start();
echo 'https://www.apple.com/legal/internet-services/terms/site.html';
$_prefixVariable22 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable23 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable20,array('@href1@'=>$_prefixVariable21,'@href2@'=>$_prefixVariable22,'@target@'=>$_prefixVariable23));?>

							</label>
						</div>

						<div class="form-group">
							<input type="checkbox" id="postcode" name="postcode" <?php if ($_smarty_tpl->tpl_vars['postcode']->value) {?>checked="checked"<?php }?>/>
							<label for="postcode"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Never collect the postal code (not recommended*).','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
							<span class="left20">*<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This information improves the acceptance rates for cards issued in the United States, the United Kingdom and Canada.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</span>
						</div>

						<div class="form-group">
							<input type="checkbox" id="cardholdername" name="cardholdername" <?php if ($_smarty_tpl->tpl_vars['cardholdername']->value) {?>checked="checked"<?php }?>/>
							<label for="cardholdername"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Collect the card holder name','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
						</div>

						<div class="form-group">
							<input type="checkbox" id="save_card" name="save_card" <?php if ($_smarty_tpl->tpl_vars['save_card']->value) {?>checked="checked"<?php }?>/>
							<label for="save_card"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save customer cards (for later one-click payments)','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>
							<div class="left20">
								<input type="radio" name="ask_customer" id="ask_yes" value="1" class="child" <?php if ($_smarty_tpl->tpl_vars['ask_customer']->value == 1) {?>checked<?php }?>/>
								<label for="ask_yes"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Ask the customer','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label><br/>

								<input type="radio" name="ask_customer" id="ask_no" value="0" class="child" <?php if ($_smarty_tpl->tpl_vars['ask_customer']->value == 0) {?>checked<?php }?>/>
								<label for="ask_no"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save without asking','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
							</div>
						</div>

						<div class="form-group">
							<input type="checkbox" id="catchandauthorize" name="catchandauthorize" <?php if ($_smarty_tpl->tpl_vars['catchandauthorize']->value) {?>checked="checked"<?php }?>/>
							<label for="catchandauthorize"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable separate authorization and capture. If enabled, Stripe will place a hold on the card for the amount of the order during checkout. That authorization will be captured and the money settled to your account when the order transitions to the status of your choice.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
							<p class="left20">
								<b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Warning: you have 7 calendar days to capture the authorization before it expires and the hold on the card is released.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</b>
							</p>
							<span class="left20"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Capture the payment when transitioning to the following order statuses.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</span>
							<div id="status_restrictions" class="left20">
								<br />
								<table class="table">
									<tr>
										<td class="col-md-6">
											<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your status','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</p>
											<select id="order_status_select_1" class="input-large child" multiple <?php if ($_smarty_tpl->tpl_vars['catchandauthorize']->value == false) {?>disabled<?php }?>>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderStatus']->value['unselected'], 'orderState');
$_smarty_tpl->tpl_vars['orderState']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['orderState']->value) {
$_smarty_tpl->tpl_vars['orderState']->do_else = false;
?>
													<option value="<?php echo intval($_smarty_tpl->tpl_vars['orderState']->value['id_order_state']);?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['orderState']->value['name'] ));?>
</option>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</select>
											<a id="order_status_select_add" class="btn btn-default btn-block clearfix" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','mod'=>'stripe_official'),$_smarty_tpl ) );?>
 <i class="icon-arrow-right"></i></a>
										</td>
										<td class="col-md-6">
											<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Catch status','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</p>
											<select id="order_status_select_2" class="input-large child" multiple <?php if ($_smarty_tpl->tpl_vars['catchandauthorize']->value == false) {?>disabled<?php }?>>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderStatus']->value['selected'], 'orderState');
$_smarty_tpl->tpl_vars['orderState']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['orderState']->value) {
$_smarty_tpl->tpl_vars['orderState']->do_else = false;
?>
													<option value="<?php echo intval($_smarty_tpl->tpl_vars['orderState']->value['id_order_state']);?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['orderState']->value['name'] ));?>
</option>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</select>
											<a id="order_status_select_remove" class="btn btn-default btn-block clearfix"><i class="icon-arrow-left"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove','mod'=>'stripe_official'),$_smarty_tpl ) );?>
 </a>
										</td>
									</tr>
								</table>
							</div>

							<div class="left20">
								<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Transition to the following order status if the authorization expires before being captured.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</p>
								<select name="capture_expired" id="capture_expired" class="child" <?php if ($_smarty_tpl->tpl_vars['catchandauthorize']->value == false) {?>disabled<?php }?>>
									<option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select a status','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</option>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allOrderStatus']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
										<option value="<?php echo intval($_smarty_tpl->tpl_vars['status']->value['id_order_state']);?>
" <?php if ((isset($_smarty_tpl->tpl_vars['captureExpire']->value)) && $_smarty_tpl->tpl_vars['captureExpire']->value == $_smarty_tpl->tpl_vars['status']->value['id_order_state']) {?>selected="selected"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['status']->value['name'] ));?>
</option>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
						</div>
					</li>
					<li>
						<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Local payment methods','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</p>
						<table class="table">
							<thead>
								<th class="col-md-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</th>
								<th class="col-md-2"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Payment method','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</th>
								<th class="col-md-6"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Relevant countries','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</th>
								<th class="col-md-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Require activation','mod'=>'stripe_official'),$_smarty_tpl ) );?>
 *</th>
							</thead>
							<tbody>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_methods']->value, 'payment_method', false, 'key');
$_smarty_tpl->tpl_vars['payment_method']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->do_else = false;
?>
									<?php if ($_smarty_tpl->tpl_vars['payment_method']->value['display_in_back_office']) {?>
										<tr>
											<td class="center">
												<input type="checkbox"
													   id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'htmlall','UTF-8' ));?>
"
													   name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'htmlall','UTF-8' ));?>
"
													   <?php if ($_smarty_tpl->tpl_vars[''.($_smarty_tpl->tpl_vars['key']->value)]->value) {?>checked="checked"<?php }?>/>
											</td>
											<td>
												<span class="payment_method_name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['payment_method']->value['name'],'htmlall','UTF-8' ));?>
</span>
												<?php if ($_smarty_tpl->tpl_vars['payment_method']->value['new_payment'] == 'Yes') {?>
													<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/new_payment.png" />
												<?php }?>
											</td>
											<td>
												<?php if ((isset($_smarty_tpl->tpl_vars['payment_method']->value['countries_names'][$_smarty_tpl->tpl_vars['language_iso_code']->value]))) {?>
													<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['payment_method']->value['countries_names'][$_smarty_tpl->tpl_vars['language_iso_code']->value],'htmlall','UTF-8' ));?>

												<?php } else { ?>
													<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['payment_method']->value['countries_names']['en'],'htmlall','UTF-8' ));?>

												<?php }?>
											</td>
											<td>
												<?php if ($_smarty_tpl->tpl_vars['payment_method']->value['require_activation'] == 'No') {?>
													<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'stripe_official'),$_smarty_tpl ) );?>

												<?php } else { ?>
													<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'stripe_official'),$_smarty_tpl ) );?>

												<?php }?>
											</td>
										</tr>
									<?php }?>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</tbody>
						</table><br/>
						<p>* <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You need to activate these payments methods in your [a @href2@]Stripe Dashboard[/a] first','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable24 = ob_get_clean();
ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['stripe_payments_url']->value,'htmlall','UTF-8' ));
$_prefixVariable25 = ob_get_clean();
ob_start();
echo $_prefixVariable25;
$_prefixVariable26 = ob_get_clean();
ob_start();
echo 'target="blank"';
$_prefixVariable27 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable24,array('@href2@'=>$_prefixVariable26,'@target@'=>$_prefixVariable27));?>
</p>
					</li>
				</ol>


			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" value="1" id="configuration_form_submit_btn" name="submit_login" class="btn btn-default pull-right button">
				<i class="process-icon-save"></i>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'stripe_official'),$_smarty_tpl ) );?>

			</button>
		</div>
	</div>
</form>
<?php }
}
