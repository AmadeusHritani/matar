<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:09:14
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/block_archives.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465fa785f60_18924481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd24685f195c85febd9073c602b40dc6eadd23415' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/block_archives.tpl',
      1 => 1655989017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465fa785f60_18924481 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['years']->value) {?>
    <div class="block ets_block_archive <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BLOG_RTL_CLASS']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
        <h4 class="title_blog title_block">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Archived posts','mod'=>'ets_blog'),$_smarty_tpl ) );?>

        </h4>
        <div class="content_block block_content">
            <ul class="list-year row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['years']->value, 'year');
$_smarty_tpl->tpl_vars['year']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
$_smarty_tpl->tpl_vars['year']->do_else = false;
?>
                    <li class="year-item">
                        <a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['year']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Posted in','mod'=>'ets_blog'),$_smarty_tpl ) );?>
&nbsp;<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['year']->value['year_add'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 (<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['year']->value['total_post']), ENT_QUOTES, 'UTF-8');?>
)</a>
                                                <?php if ($_smarty_tpl->tpl_vars['year']->value['months']) {?>
                            <ul class="list-months">                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['year']->value['months'], 'month');
$_smarty_tpl->tpl_vars['month']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
$_smarty_tpl->tpl_vars['month']->do_else = false;
?>
                                    <li class="month-item"><a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['month']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['month']->value['month_add'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 (<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['month']->value['total_post']), ENT_QUOTES, 'UTF-8');?>
)</a></li>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php }?>
                    </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div> 
<?php }
}
}
