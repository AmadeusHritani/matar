<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:24
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/voucher.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465c8670669_89260699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7adbb1fbdc2d006c181f5ce81c39787221dd175b' => 
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
function content_62b465c8670669_89260699 (Smarty_Internal_Template $_smarty_tpl) {
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
