<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/_partials/messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4663e460804_95889745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2415ea7c91b85cc2dd201da6d8932befdedecbd4' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/_partials/messages.tpl',
      1 => 1655988927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4663e460804_95889745 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['success']->value))) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['success']->value, 'success_message');
$_smarty_tpl->tpl_vars['success_message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['success_message']->value) {
$_smarty_tpl->tpl_vars['success_message']->do_else = false;
?>
    	<div class="alert alert-success clearfix">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['success_message']->value,'htmlall','UTF-8' ));?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
if ((isset($_smarty_tpl->tpl_vars['warnings']->value))) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warnings']->value, 'warnings_message');
$_smarty_tpl->tpl_vars['warnings_message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['warnings_message']->value) {
$_smarty_tpl->tpl_vars['warnings_message']->do_else = false;
?>
        <div class="alert alert-warning clearfix">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['warnings_message']->value,'htmlall','UTF-8' ));?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
if ((isset($_smarty_tpl->tpl_vars['errors']->value))) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'errors_message');
$_smarty_tpl->tpl_vars['errors_message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['errors_message']->value) {
$_smarty_tpl->tpl_vars['errors_message']->do_else = false;
?>
        <div class="alert alert-danger clearfix">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['errors_message']->value,'htmlall','UTF-8' ));?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
