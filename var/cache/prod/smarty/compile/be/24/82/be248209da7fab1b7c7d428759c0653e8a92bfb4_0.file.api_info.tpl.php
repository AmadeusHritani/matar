<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:24
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/api_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465c8644048_42976464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be248209da7fab1b7c7d428759c0653e8a92bfb4' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/api_info.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465c8644048_42976464 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h4 class="margin-top-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connect your iZettle account to Prestashop','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</h4>

<small class="help-block margin-top-1">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Follow this link below and you will be redirect to iZettle to login and connect your account with PrestaShop','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
<br>
    <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(for returning to this page just go back in browser history)','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong>

</small>
<br>
<br>
<a class="btn btn-primary padding-top-2 padding-bottom-2"  href="https://my.izettle.com/apps/api-keys?name=Prestashop%20Integration&scopes=READ:FINANCE%20READ:PURCHASE%20READ:USERINFO%20READ:PRODUCT%20WRITE:PRODUCT">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get API Key','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

</a><br><br><?php }
}
