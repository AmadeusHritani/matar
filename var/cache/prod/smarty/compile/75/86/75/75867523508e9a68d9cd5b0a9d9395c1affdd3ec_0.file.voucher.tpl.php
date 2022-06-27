<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:43
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/voucher.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46653a7f3a9_25148721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75867523508e9a68d9cd5b0a9d9395c1affdd3ec' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/voucher.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46653a7f3a9_25148721 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h4 class="margin-top-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Vouchers','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</h4>

<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable/Disable vouchers synchronisation.','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
<small class="help-block margin-top-1">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Defaul state - ','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

    <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' vouchers sync is disabled','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong>

</small>

<?php }
}
