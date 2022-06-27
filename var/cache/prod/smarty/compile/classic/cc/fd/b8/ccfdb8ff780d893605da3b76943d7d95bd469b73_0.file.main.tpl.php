<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4663e4500b7_91030269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccfdb8ff780d893605da3b76943d7d95bd469b73' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/main.tpl',
      1 => 1655988927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./_partials/messages.tpl' => 1,
    'file:./_partials/configuration.tpl' => 1,
    'file:./_partials/refund.tpl' => 1,
  ),
),false)) {
function content_62b4663e4500b7_91030269 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./_partials/messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="tabs">
	<div class="sidebar navigation col-md-2">
		<?php if ((isset($_smarty_tpl->tpl_vars['logo']->value))) {?>
		  <img class="tabs-logo" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['logo']->value,'htmlall','UTF-8' ));?>
"/>
		<?php }?>
		<nav class="list-group categorieList">
			<a class="list-group-item migration-tab" href="#stripe_step_1">
			  	<i class="icon-power-off pstab-icon"></i>
			  	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connection','mod'=>'stripe_official'),$_smarty_tpl ) );?>

			  	<span class="badge-module-tabs pull-right <?php if ($_smarty_tpl->tpl_vars['keys_configured']->value === true) {?>tab-success<?php } else { ?>tab-warning<?php }?>"></span>
			</a>
			<a class="list-group-item migration-tab" href="#stripe_step_2">
			  	<i class="icon-ticket pstab-icon"></i>
			  	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refund','mod'=>'stripe_official'),$_smarty_tpl ) );?>

			</a>
		</nav>
	</div>

	<div class="col-md-10">
		<div class="content-wrap panel">
			<section id="section-shape-1">
				<?php $_smarty_tpl->_subTemplateRender("file:./_partials/configuration.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			</section>
			<section id="section-shape-2">
				<?php $_smarty_tpl->_subTemplateRender("file:./_partials/refund.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			</section>
		</div>
	</div>

</div><?php }
}
