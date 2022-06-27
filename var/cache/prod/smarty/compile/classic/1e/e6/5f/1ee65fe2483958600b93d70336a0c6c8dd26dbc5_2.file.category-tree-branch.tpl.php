<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:09:14
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/category-tree-branch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465fa76d3c4_83820763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ee65fe2483958600b93d70336a0c6c8dd26dbc5' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/category-tree-branch.tpl',
      1 => 1655989017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465fa76d3c4_83820763 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="category_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['node']->value['id_category']), ENT_QUOTES, 'UTF-8');
if ((isset($_smarty_tpl->tpl_vars['last']->value)) && $_smarty_tpl->tpl_vars['last']->value == 'true') {?> last<?php }?> <?php if ($_smarty_tpl->tpl_vars['node']->value['id_category'] == $_smarty_tpl->tpl_vars['active']->value) {?>active<?php }?>">
	<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['node']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['node']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&nbsp;(<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['node']->value['count_posts']), ENT_QUOTES, 'UTF-8');?>
)</a>
	<?php if (count($_smarty_tpl->tpl_vars['node']->value['children']) > 0) {?>
        <span class="ets-category-blog-parent">click</span>
		<ul class="children">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['node']->value['children'], 'child', false, NULL, 'categoryTreeBranch', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_categoryTreeBranch']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_categoryTreeBranch']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_categoryTreeBranch']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_categoryTreeBranch']->value['total'];
?>
			<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_categoryTreeBranch']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categoryTreeBranch']->value['last'] : null)) {?>
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'true'), 0, true);
?>
			<?php } else { ?>
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'false'), 0, true);
?>
			<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	<?php }?>
</li><?php }
}
