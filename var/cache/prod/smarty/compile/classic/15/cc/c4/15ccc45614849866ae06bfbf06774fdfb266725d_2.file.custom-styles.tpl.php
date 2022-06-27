<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/ph_scrolltotop/views/templates/hook/custom-styles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658aa2fa03_76498323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15ccc45614849866ae06bfbf06774fdfb266725d' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ph_scrolltotop/views/templates/hook/custom-styles.tpl',
      1 => 1655989614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658aa2fa03_76498323 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .back-to-top .back-icon {
        width: 40px;
        height: 40px;
        position: fixed;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-flow: column;
        <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_POSITION']->value,'htmlall','UTF-8' ))) {?>
            left: <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_LEFT']->value,'htmlall','UTF-8' ))) {?> <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_LEFT']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
px <?php } else { ?> 50px <?php }?>;
            bottom: <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_BOTTOM']->value,'htmlall','UTF-8' ))) {?> <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_BOTTOM']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
px <?php } else { ?> 50px <?php }?>;
        <?php } else { ?>
            right: <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_RIGHT']->value,'htmlall','UTF-8' ))) {?> <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_RIGHT']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
px <?php } else { ?> 50px <?php }?>;
            bottom: <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_BOTTOM']->value,'htmlall','UTF-8' ))) {?> <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_FLOATING_BY_BOTTOM']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
px <?php } else { ?> 50px <?php }?>;
        <?php }?>
        border: 1px solid transparent;
        <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_ICON_SELECT']->value,'htmlall','UTF-8' )) == 'icon') {?>
            background-color: <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_BACKGROUND_COLOR']->value,'htmlall','UTF-8' ))) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_BACKGROUND_COLOR']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>#4545f7<?php }?>;
        <?php } else { ?>
            background-color: transparent;
        <?php }?>
        border-radius: <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BORDER_TYPE']->value,'htmlall','UTF-8' )) == 'circle') {?> 50% <?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BORDER_TYPE']->value,'htmlall','UTF-8' )) == 'rounded') {?> 3px <?php } else { ?> 0 <?php }?>;
    }
    .back-to-top i,
    .back-to-top .back-icon svg {
        font-size: 24px;
    }
    .back-to-top .back-icon svg path {
        color: <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_ICON_COLOR']->value,'htmlall','UTF-8' ))) {?> <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_ICON_COLOR']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php } else { ?>white<?php }?> ;
    }
    .back-to-top .back-icon:hover {
        <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_ICON_SELECT']->value,'htmlall','UTF-8' )) == 'icon') {?>
            background-color: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BUTTON_HOVER_COLOR']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
        <?php }?>
    }
</style><?php }
}
