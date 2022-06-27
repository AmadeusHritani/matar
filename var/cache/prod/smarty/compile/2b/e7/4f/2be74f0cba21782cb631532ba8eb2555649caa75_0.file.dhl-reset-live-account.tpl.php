<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:25
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-reset-live-account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46641f2db69_33074009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2be74f0cba21782cb631532ba8eb2555649caa75' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-reset-live-account.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46641f2db69_33074009 (Smarty_Internal_Template $_smarty_tpl) {
?><button name="resetLiveAccount" id="resetLiveAccount" class="button btn btn-default" value="1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset "live" account data','mod'=>'dhldp'),$_smarty_tpl ) );?>
</button><?php }
}
