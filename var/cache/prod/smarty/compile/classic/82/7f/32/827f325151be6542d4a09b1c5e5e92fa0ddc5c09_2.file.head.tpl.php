<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_testimonial/views/templates/hook/head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658aa0b6e4_32993937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '827f325151be6542d4a09b1c5e5e92fa0ddc5c09' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_testimonial/views/templates/hook/head.tpl',
      1 => 1655989613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658aa0b6e4_32993937 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var ETS_TTN_AUTOPLAY_SLIDESHOW =<?php if ($_smarty_tpl->tpl_vars['ETS_TTN_AUTOPLAY_SLIDESHOW']->value) {?> true<?php } else { ?>false<?php }?>;
var ETS_TTN_TIME_SPEED_SLIDESHOW =<?php if ($_smarty_tpl->tpl_vars['ETS_TTN_TIME_SPEED_SLIDESHOW']->value) {
echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['ETS_TTN_TIME_SPEED_SLIDESHOW']->value), ENT_QUOTES, 'UTF-8');
} else { ?>5000<?php }?>;
<?php echo '</script'; ?>
><?php }
}
