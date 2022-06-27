<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:24
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/barcode.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465c8658700_34810032',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '583bb09fa5ec9f3bf5e3c6dda8ee0d71c04431a3' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/barcode.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465c8658700_34810032 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h4 class="margin-top-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Barcode','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</h4>
<p class="margin-top-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please choose product field that will be used as barcode while sync between your store and Zettle','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>

<p>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Available options','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
:
<ul>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'EAN 13','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'UPC','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ISBN','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'MPN','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'your store product reference','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
</ul>

</p>

<small class="help-block margin-top-1">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Defaul option - ','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

    <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'EAN 13','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong>

</small>
<br><?php }
}
