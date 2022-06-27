<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:25
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/log_information.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46641f3efe8_01943082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b45787aae88ba0a41251a7ccf6438b4fb9a63adc' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/log_information.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46641f3efe8_01943082 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <a class="btn button btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['general_log_file_path']->value,'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download General log file','mod'=>'dhldp'),$_smarty_tpl ) );?>
</a>
    <a class="btn button btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['api_log_file_path']->value,'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Download API log file','mod'=>'dhldp'),$_smarty_tpl ) );?>
</a>
</div><?php }
}
