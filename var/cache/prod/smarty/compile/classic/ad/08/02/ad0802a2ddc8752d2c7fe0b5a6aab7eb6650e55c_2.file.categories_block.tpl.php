<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:09:14
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/categories_block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465fa761354_39361924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad0802a2ddc8752d2c7fe0b5a6aab7eb6650e55c' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/categories_block.tpl',
      1 => 1655989017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465fa761354_39361924 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['blockCategTree']->value) {?>
    <?php if ((isset($_smarty_tpl->tpl_vars['link_view_all']->value))) {?>
    <div class="block ets_block_categories <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BLOG_RTL_CLASS']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
        <h4 class="title_blog title_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Blog categories','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</h4>    
        <div class="content_block block_content">
    <?php }?>
            <ul class="tree">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blockCategTree']->value[0]['children'], 'child', false, NULL, 'blockCategTree', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_blockCategTree']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_blockCategTree']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_blockCategTree']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_blockCategTree']->value['total'];
?>
        			<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_blockCategTree']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_blockCategTree']->value['last'] : null)) {?>
        				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'true'), 0, true);
?>
        			<?php } else { ?>
        				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value), 0, true);
?>
        			<?php }?>
        		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
    <?php if ((isset($_smarty_tpl->tpl_vars['link_view_all']->value))) {?>
            <div class="blog_view_all_button">
                <a class="blog_view_all" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_view_all']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View all categories','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</a>
            </div>
        </div>    
    </div>
    <?php }
}
}
}
