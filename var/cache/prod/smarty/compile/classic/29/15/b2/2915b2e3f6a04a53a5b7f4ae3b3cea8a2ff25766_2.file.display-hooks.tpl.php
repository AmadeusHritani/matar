<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_htmlbox/views/templates/hook/display-hooks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658a9ae870_28123099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2915b2e3f6a04a53a5b7f4ae3b3cea8a2ff25766' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_htmlbox/views/templates/hook/display-hooks.tpl',
      1 => 1655989008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658a9ae870_28123099 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['hooks']->value)) && sizeof($_smarty_tpl->tpl_vars['hooks']->value) > 0) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hooks']->value, 'hook');
$_smarty_tpl->tpl_vars['hook']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hook']->value) {
$_smarty_tpl->tpl_vars['hook']->do_else = false;
?>
        <style>
            <?php echo $_smarty_tpl->tpl_vars['hook']->value['style'];?>

        </style>
        <?php echo $_smarty_tpl->tpl_vars['hook']->value['html'];?>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
