<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/my-account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658ade0529_47174025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f77f7043266092ac1ed6d78b7a9a0b90411ff617' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/my-account.tpl',
      1 => 1655989017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658ade0529_47174025 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="col-lg-4 col-md-6 col-sm-6 col-xs-12" >
    <a id="author-blog-comment-link" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getModuleLink('ets_blog','comments'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My blog comments','mod'=>'ets_blog'),$_smarty_tpl ) );?>
">
        <span class="link-item">
            <span class="ss_icon_group">
                <i class="fa fa-comments"></i>
            </span>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My blog comments','mod'=>'ets_blog'),$_smarty_tpl ) );?>

        </span>
    </a>
</li> <?php }
}
