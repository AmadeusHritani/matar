<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:47
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_wishlist_pres17/views/templates/hook/tabs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465dfe3cc30_64647252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75f088d24e509ecd5e4e1c26edebb7d0be48b428' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_wishlist_pres17/views/templates/hook/tabs.tpl',
      1 => 1655989612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465dfe3cc30_64647252 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="ets_wlp_tabs">
    <li class="tab tab_settings<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'settings') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_config']->value,'html','UTF-8' ));?>
&current_tab=settings">
             <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Settings','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

        </a>
    </li>
    <li class="tab tab_settings<?php if ($_smarty_tpl->tpl_vars['current_tab']->value == 'statistics') {?> active<?php }?>">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_config']->value,'html','UTF-8' ));?>
&current_tab=statistics">
             <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Statistics','mod'=>'ets_wishlist_pres17'),$_smarty_tpl ) );?>

        </a>
    </li>
</ul>
<div class="ets_wlp_tabs_height"></div><?php }
}
