<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from 'module:etssecuritycertificationv' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658ae92972_74227850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55f5bca12d04ea24bcec00f7d4867f49d4978cdc' => 
    array (
      0 => 'module:etssecuritycertificationv',
      1 => 1655989613,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658ae92972_74227850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '116283700162b4658ae86cb7_89232705';
if ((isset($_smarty_tpl->tpl_vars['images']->value)) && $_smarty_tpl->tpl_vars['images']->value) {?>
    <div class="ets-sc-certification<?php if (mb_strtolower($_smarty_tpl->tpl_vars['positionAt']->value, 'UTF-8') == 'displayfooter') {?> links wrapper<?php }?> ets-sc-position-at-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( mb_strtolower($_smarty_tpl->tpl_vars['positionAt']->value, 'UTF-8'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (intval($_smarty_tpl->tpl_vars['ETS_SC_HIDE_ON_MOBILE']->value) > 0) {?> hidden-on-mobile<?php }?> col-xs-12 col-sm-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['ETS_SC_COLUMN_WIDTH']->value), ENT_QUOTES, 'UTF-8');?>
">
        <?php if (mb_strtolower($_smarty_tpl->tpl_vars['positionAt']->value, 'UTF-8') == 'displayfooter') {?>
            <div class="title clearfix hidden-md-up" data-target="#ets-sc-certification-item" data-toggle="collapse">
                <span class="h3"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_SC_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
                <span class="float-xs-right">
                  <span class="navbar-toggler collapse-icons">
                    <i class="material-icons add">keyboard_arrow_down</i>
                    <i class="material-icons remove">keyboard_arrow_up</i>
                  </span>
                </span>
            </div>
            <p class="h4 text-uppercase block-sc-certification-title hidden-sm-down">
                <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_SC_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

            </p>
        <?php } elseif (mb_strtolower($_smarty_tpl->tpl_vars['positionAt']->value, 'UTF-8') == 'displaynav1') {?>
            <a class="ets-sc-heading" href="javascript:void(0)">
                <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_SC_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

            </a>
        <?php } else { ?>
            <h4 class="ets-sc-heading">
                <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_SC_TITLE']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

            </h4>
        <?php }?>
        <?php if (mb_strtolower($_smarty_tpl->tpl_vars['positionAt']->value, 'UTF-8') == 'displayfooter') {?><div id="ets-sc-certification-item" class="ets-sc-certification-items-footer collapse"><?php }?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
            <div class="ets-sc-certification-item">
                <?php if (trim($_smarty_tpl->tpl_vars['image']->value['link']) !== '') {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['image']->value['link'];?>
">
                <?php }?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['image_url'];?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['alt'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" style="<?php if (intval($_smarty_tpl->tpl_vars['ETS_SC_MAX_WIDTH']->value) > 0) {?>max-width: <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['ETS_SC_MAX_WIDTH']->value), ENT_QUOTES, 'UTF-8');?>
px;<?php }
if (intval($_smarty_tpl->tpl_vars['ETS_SC_MAX_HEIGHT']->value) > 0) {?> max-height: <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['ETS_SC_MAX_HEIGHT']->value), ENT_QUOTES, 'UTF-8');?>
px;<?php }?>">
                <?php if (trim($_smarty_tpl->tpl_vars['image']->value['link']) !== '') {?>
                    </a>
                <?php }?>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if (mb_strtolower($_smarty_tpl->tpl_vars['positionAt']->value, 'UTF-8') == 'displayfooter') {?></div><?php }?>
    </div>
<?php }
}
}
