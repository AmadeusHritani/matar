<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:43
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/token.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46653a6ff50_09897399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33f7957beb2f6eda5cd0e68d31a572bd6f43a414' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/token.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46653a6ff50_09897399 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h4 class="margin-top-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Token','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</h4>

<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This is a unique identifier for sync query from external sources (Zettle webhook, cron job  or manual sync)','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
<?php }
}
