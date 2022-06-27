<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_manufacturerslider/views/templates/hook/manufacturers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658abd1035_84452160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4acd16cddded18bd235b4d63fa12d400b4589e6c' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_manufacturerslider/views/templates/hook/manufacturers.tpl',
      1 => 1655989009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658abd1035_84452160 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['manufacturers']->value) {?>
    <div id="ybc-mnf-block">
        <h4 class="h2 ybc-mnf-block-title text-uppercase"><span class="title_cat"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['YBC_MF_TITLE']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span></h4>
        <ul id="ybc-mnf-block-ul" class="owl-carousel">
        	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['manufacturers']->value, 'manufacturer');
$_smarty_tpl->tpl_vars['manufacturer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->do_else = false;
?>
        		<li class="ybc-mnf-block-li<?php if ($_smarty_tpl->tpl_vars['YBC_MF_SHOW_NAME']->value) {?> ybc_mnf_showname<?php }?>">
                    <a class="ybc-mnf-block-a-img" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']),'html' )), ENT_QUOTES, 'UTF-8');?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value['image'];?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['manufacturer']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['manufacturer']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['YBC_MF_SHOW_NAME']->value) {?>
                        <a class="ybc-mnf-block-a-name" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']),'html' )), ENT_QUOTES, 'UTF-8');?>
">
                            <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['manufacturer']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        </a>
                    <?php }?>
                </li>
        	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
<?php }
echo '<script'; ?>
 type="text/javascript">
    var YBC_MF_PER_ROW_DESKTOP = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['YBC_MF_PER_ROW_DESKTOP']->value), ENT_QUOTES, 'UTF-8');?>
;
    var YBC_MF_PER_ROW_MOBILE = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['YBC_MF_PER_ROW_MOBILE']->value), ENT_QUOTES, 'UTF-8');?>
;
    var YBC_MF_PER_ROW_TABLET = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['YBC_MF_PER_ROW_TABLET']->value), ENT_QUOTES, 'UTF-8');?>
;
    var YBC_MF_SHOW_NAV = <?php if ($_smarty_tpl->tpl_vars['YBC_MF_SHOW_NAV']->value) {?>true<?php } else { ?>false<?php }?>;
    var YBC_MF_AUTO_PLAY = <?php if ($_smarty_tpl->tpl_vars['YBC_MF_AUTO_PLAY']->value) {?>true<?php } else { ?>false<?php }?>;
    var YBC_MF_PAUSE = <?php if ($_smarty_tpl->tpl_vars['YBC_MF_PAUSE']->value) {?>true<?php } else { ?>false<?php }?>;
    var YBC_MF_SPEED = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['YBC_MF_SPEED']->value), ENT_QUOTES, 'UTF-8');?>
;
<?php echo '</script'; ?>
><?php }
}
