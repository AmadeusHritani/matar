<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:26
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-add-carrier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4664200d422_58305620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce606f9b108ccadcb8f6936b09bdd6d6cfd6b2dc' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-add-carrier.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4664200d422_58305620 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value,'htmlall','UTF-8' ));?>
" class="button btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new carrier','mod'=>'dhldp'),$_smarty_tpl ) );?>
</a>
<?php }
}
