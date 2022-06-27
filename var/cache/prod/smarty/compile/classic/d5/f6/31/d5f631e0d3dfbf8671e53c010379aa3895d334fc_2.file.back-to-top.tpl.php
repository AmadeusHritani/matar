<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/ph_scrolltotop/views/templates/hook/back-to-top.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658ae71db1_48784091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5f631e0d3dfbf8671e53c010379aa3895d334fc' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ph_scrolltotop/views/templates/hook/back-to-top.tpl',
      1 => 1655989614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658ae71db1_48784091 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ETS_SCROLLTOTOP_LIVE_MODE']->value) {?>
    <div class="back-to-top">
        <a href="#">
            <?php if ($_smarty_tpl->tpl_vars['ETS_BUTTON_ICON_SELECT']->value == 'icon') {?>
            <span class="back-icon">
            <i class="<?php if ($_smarty_tpl->tpl_vars['ETS_BUTTON_ICON']->value) {?>fa <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ETS_BUTTON_ICON']->value, ENT_QUOTES, 'UTF-8');
} else { ?>fa fa-arrow-circle-up<?php }?>" aria-hidden="true"></i>
      <?php } else { ?>
        <span class="back-icon"
              style="
                      background-image: url(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ETS_CUSTOM_ICON']->value, ENT_QUOTES, 'UTF-8');?>
);
                      background-repeat: no-repeat;
                      background-position: center;
                      background-size: cover;
                      width: 40px;
                      height: 40px;
                      ">
      <?php }?>
        </span>
        </a>
    </div>
<?php }
}
}
