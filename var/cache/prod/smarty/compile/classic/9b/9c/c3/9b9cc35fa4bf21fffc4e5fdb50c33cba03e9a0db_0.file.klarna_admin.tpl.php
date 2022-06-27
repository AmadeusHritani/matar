<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:17
  from '/var/www/vhosts/dreamsat.online/matar/modules/klarnaofficial/views/templates/admin/klarna_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46639ae97c3_07182879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b9cc35fa4bf21fffc4e5fdb50c33cba03e9a0db' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/klarnaofficial/views/templates/admin/klarna_admin.tpl',
      1 => 1655988987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46639ae97c3_07182879 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="klarna-banners">
<?php if ($_smarty_tpl->tpl_vars['showbanner1']->value) {?>
	<section class="col-xs-12 col-md-6 banner banner--klarna<?php if ($_smarty_tpl->tpl_vars['showbanner1']->value) {?>2<?php }?>">
		<h2 class="banner__title">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Go live with Klarna','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

		</h2>
            <p>
                <strong>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You just downloaded our Klarna module. Fantastic!','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

                </strong>
            </p>
            <p>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To offer your customers the benefit of paying with Klarna, you must first retrieve your credentials. Sign up for a Klarna account and gain access to the Klarna Merchant Portal where you can generate and download your credentials. You\'ll be up an running in no time!','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

            </p>
		<div style="position:relative;width:100%;">
			<a class="banner__cta" target="_blank" href="https://eu.portal.klarna.com/signup/prestashop?country=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country']->value,'htmlall','UTF-8' ));?>
&platformVersion=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['platformVersion']->value,'htmlall','UTF-8' ));?>
&plugin=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['plugin']->value,'htmlall','UTF-8' ));?>
&pluginVersion=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pluginVersion']->value,'htmlall','UTF-8' ));?>
">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Go live now','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

            </a>
			<img class="lockup" src="../modules/klarnaofficial/views/img/klarna_lockup_logo.png" />
		</div>
	</section>
<?php }?>
	<section class="banner banner--docs <?php if (!$_smarty_tpl->tpl_vars['showbanner1']->value) {?>banner--small<?php }?>">
		<svg xmlns="http://www.w3.org/2000/svg" style="height:64px;width:64px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
		<h2 class="banner__title">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Documentation','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

		</h2>
		<p>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Link and information to documentation comes here...','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

		</p>
		<a class="banner__cta" href="https://klarnadocs.prestaworks.se?cron_token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cron_token']->value,'url','UTF-8' ));?>
&cron_domain=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cron_domain']->value,'url','UTF-8' ));?>
" target="_blank" id="__fancydocs" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read documentation here','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read documentation here','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

		</a>
	</section>
</div>
<?php if ($_smarty_tpl->tpl_vars['isRounding_warning']->value) {?>
    <div class="alert alert-danger">
		 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For the best experience, you should set rounding to "on each article".','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

	</div>
<?php }
if ($_smarty_tpl->tpl_vars['isNoSll_warning']->value) {?>
    <div class="alert alert-danger">
		 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Klarna Checkout V3 requires SSL','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

	</div>
<?php }
if ($_smarty_tpl->tpl_vars['address_check_done']->value) {?>		
	<div class="alert alert-success">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Address check done!','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

	</div>
<?php }
if ($_smarty_tpl->tpl_vars['isSaved']->value) {?>	
	<div class="alert alert-success">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Settings updated','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

	</div>
<?php }
if ($_smarty_tpl->tpl_vars['errorMSG']->value != '') {?>	
	<div class="alert alert-danger">
		 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['errorMSG']->value,'htmlall','UTF-8' ));?>

	</div>
<?php }?>
<link href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
views/css/klarnacheckout_admin.css" rel="stylesheet" type="text/css" media="all" />
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
views/js/admin.js"><?php echo '</script'; ?>
>

<div class="tabbable">
	<ul class="nav nav-tabs">
        <li class="active"><a href="#pane7" data-toggle="tab"><i class="icon-AdminParentOrders"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Klarna Checkout V3 (KCO)','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
		<li><a href="#pane8" data-toggle="tab"><i class="icon-AdminParentOrders"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Klarna Checkout Common','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
		<li><a href="#pane3" data-toggle="tab"><i class="icon-cogs"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Common settings','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
		<li><a href="#pane5" data-toggle="tab"><i class="icon-list-alt"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Terms and Conditions','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
		<li><a href="#pane6" data-toggle="tab"><i class="icon-list-alt"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Setup','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
		<li><a href="#pane9" data-toggle="tab"><i class="icon-list-alt"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'On Site Messaging','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
	</ul>
	<div class="panel">
	<div class="tab-content">

        
        <div id="pane8" class="tab-pane">
			<div class="tabbable row klarnacheckout-admin">
				<div class="col-lg-12 tab-content">
					<div class="sidebar col-lg-2">
						<ul class="nav nav-tabs">	
                            <li class="nav-item"><a href="javascript:;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'General settings','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
" data-panel="8" data-fieldset="0"><i class="icon-AdminAdmin"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'General settings','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
							<li class="nav-item"><a href="javascript:;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Color settings','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
" data-panel="8" data-fieldset="1"><i class="icon-AdminParentPreferences"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Color settings','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
                        </ul>
                    </div>
                    <div id="klarnacheckout-admin" class="col-lg-10">
                        <?php echo $_smarty_tpl->tpl_vars['kcocommonform']->value;?>

                        * <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'These fields are only applicable in certain markets','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>

                    </div>
                </div>
            </div>
        </div>
        <div id="pane7" class="tab-pane active">
			<div class="tabbable row klarnacheckout-admin">
				<div class="col-lg-12 tab-content">
					<div class="sidebar col-lg-2">
						<ul class="nav nav-tabs">
                            <li class="nav-item"><a href="javascript:;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'KCO V3','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
" data-panel="7" data-fieldset="0"><i class="icon-AdminParentLocalization"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'KCO V3','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
						</ul>
					</div>
					<div id="klarnacheckout-admin" class="col-lg-10">
						<?php echo $_smarty_tpl->tpl_vars['kcov3form']->value;?>

					</div>
				</div>
			</div>
		</div>
		<div id="pane3" class="tab-pane">
			<div class="tabbable row klarnacheckout-admin">
				<div class="col-lg-12 tab-content">
					<div class="sidebar col-lg-2" style="display: none;">
						<ul class="nav nav-tabs">
							<li class="nav-item"><a href="javascript:;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'General settings','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
" data-panel="3" data-fieldset="0"><i class="icon-AdminAdmin"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'General settings','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
						</ul>
					</div>
					<div id="klarnacheckout-admin" class="col-lg-12">
						<?php echo $_smarty_tpl->tpl_vars['commonform']->value;?>

					</div>
				</div>
			</div>
		</div>
		
		<div id="pane5" class="tab-pane">
			<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Germany','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</h3>
			<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The following text needs to be present in your terms and conditions page under AGP/Payments.','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</p>
			
				In Zusammenarbeit mit Klarna bieten wir die folgenden Zahlungsoptionen an. <br />
				Die Zahlung erfolgt jeweils an Klarna:
			<ul>
				<li>Klarna Rechnung: Zahlbar innerhalb von 14 Tagen ab Rechnungsdatum. Die
				Rechnung wird bei Versand der Ware ausgestellt und per Email
				übersandt. Die Rechnungsbedingungen finden Sie hier (https://cdn.klarna.com/1.0/shared/content/legal/terms/<strong style="color:#00aff0">EID</strong>/de_de/invoice?fee=0).</li>
				<li>Klarna Ratenkauf: Mit dem Finanzierungsservice von Klarna können Sie Ihren Einkauf
				flexibel in monatlichen Raten von mindestens 1/24 des Gesamtbetrages (mindestens
				jedoch 6,95 EUR) bezahlen. Weitere Informationen zum Klarna Ratenkauf
				einschließlich der Allgemeinen Geschäftsbedingungen und der europäischen
				Standardinformationen für Verbraucherkredite finden Sie hier. (https://cdn.klarna.com/1.0/shared/content/legal/terms/<strong style="color:#00aff0">EID</strong>/de_de/account)</li>
				<li>Sofortüberweisung</li>
				<li>Kreditkarte (Visa/ Mastercard)</li>
				<li>Lastschrift</li>
			</ul>
				Die Zahlungsoptionen werden im Rahmen von Klarna Checkout angeboten. Nähere
				Informationen und die Nutzungsbedingungen für Klarna Checkout finden Sie hier(https://cdn.klarna.com/1.0/shared/content/legal/terms/<strong style="color:#00aff0">EID</strong>/de_de/checkout).
				Allgemeine Informationen zu Klarna erhalten Sie hier (https://www.klarna.com/de).
			<br />
				Ihre Personenangaben werden von Klarna in Übereinstimmung mit den geltenden Datenschutzbestimmungen und entsprechend den Angaben in Klarnas Datenschutzbestimmungen behandelt (https://cdn.klarna.com/1.0/shared/content/policy/data/de_at/data_protection.pdf).
		</div>
		
		<div id="pane6" class="tab-pane">
			<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Setup','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</h3>
			<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The following button will run a setup check and see if all default addresses is set up correctly for this shop.','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</p>
			<div class="form-wrapper">
				<form class="defaultForm form-horizontal" method="post" action="index.php?controller=AdminModules&configure=klarnaofficial&token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'htmlall','UTF-8' ));?>
&module_name=klarnaofficial">
				<input type="hidden" name="runcheckup" value="1" />
			</div>
			<div class="panel-footer">
				<button id="module_form_submit_btn" class="btn btn-default pull-right" name="btnRunaddressCheckSubmit" value="1" type="submit">
					<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Run address check','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</button>
				</form>
                <a class="btn btn-default pull-right" href="<?php echo $_smarty_tpl->tpl_vars['linkToOrderInfo']->value;?>
"><i class="process-icon-help"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order info','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a>
			</div>
		</div>
		<div id="pane9" class="tab-pane">
			<div class="tabbable row klarnacheckout-admin">
				<div class="col-lg-12 tab-content">
					<div class="sidebar col-lg-2" style="display: none;">
						<ul class="nav nav-tabs">
							<li class="nav-item"><a href="javascript:;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'On Site Messaging','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
" data-panel="9" data-fieldset="0"><i class="icon-AdminAdmin"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'On Site Messaging','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a></li>
						</ul>
					</div>
					<div id="klarnacheckout-admin" class="col-lg-12">
                    <a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['linkToOsmConfig']->value;?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Handle OSM options','mod'=>'klarnaofficial'),$_smarty_tpl ) );?>
</a><br /><br />
						<?php echo $_smarty_tpl->tpl_vars['osmform']->value;?>

					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<?php echo '<script'; ?>
>
var toggle_js_inputs = <?php echo $_smarty_tpl->tpl_vars['toggle_js_inputs']->value;?>
;
<?php echo '</script'; ?>
><?php }
}
