<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:10
  from '/var/www/vhosts/dreamsat.online/matar/modules/doofinder/views/templates/admin/configure_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4666ed60b59_87550521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4dfe3d537d32316ee262f7b57ce6d9d421f5e8a9' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/doofinder/views/templates/admin/configure_footer.tpl',
      1 => 1655988946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./support_tab.tpl' => 1,
  ),
),false)) {
function content_62b4666ed60b59_87550521 (Smarty_Internal_Template $_smarty_tpl) {
?>	
	<?php if ($_smarty_tpl->tpl_vars['configured']->value) {?>
		<div class="tab-pane" id="support_tab"><?php $_smarty_tpl->_subTemplateRender('file:./support_tab.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
	<?php }?>
</div>
<!-- End Tab panes -->
<?php }
}
