<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:37
  from '/var/www/vhosts/dreamsat.online/matar/modules/ph_products_cms/views/templates/hook/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46689c1ae89_30208511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6dddd073487cc7c450694597dad43e143b16fee0' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ph_products_cms/views/templates/hook/admin.tpl',
      1 => 1655989031,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46689c1ae89_30208511 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var ph_pcms_link_search_product = '<?php echo $_smarty_tpl->tpl_vars['ph_pcms_link_search_product']->value;?>
';
var Delete_text ='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ph_products_cms','js'=>1),$_smarty_tpl ) );?>
';
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->tpl_vars['html_content']->value;
}
}
