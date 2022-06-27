<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:05
  from '/var/www/vhosts/dreamsat.online/matar/modules/blockreassurance/views/templates/admin/tabs/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b466699dcd61_96456196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59dcf6998d78e57a05769dd75519a0a4fa1a2ccb' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/blockreassurance/views/templates/admin/tabs/content.tpl',
      1 => 1655988858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./content/listing.tpl' => 1,
    'file:./content/config.tpl' => 1,
  ),
),false)) {
function content_62b466699dcd61_96456196 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./content/listing.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:./content/config.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
