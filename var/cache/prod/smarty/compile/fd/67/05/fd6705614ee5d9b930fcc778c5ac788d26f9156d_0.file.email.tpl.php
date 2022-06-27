<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:24
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/email.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465c86681f7_51170179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd6705614ee5d9b930fcc778c5ac788d26f9156d' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/email.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465c86681f7_51170179 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h4 class="margin-top-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</h4>

<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If a problem occured while sync, notification will be sent on this email. Keep empty to disable notification.','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
<small class="help-block margin-top-1">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Defaul value - ','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

    <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'store contact email','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong>

</small>

<?php }
}
