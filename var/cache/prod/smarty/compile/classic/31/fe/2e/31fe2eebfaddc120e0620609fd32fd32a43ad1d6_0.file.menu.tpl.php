<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:25
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46641f203c3_32592471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31fe2eebfaddc120e0620609fd32fd32a43ad1d6' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/menu.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46641f203c3_32592471 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="menu-dhldp navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav menu">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu_items']->value, 'menu_item', false, 'menu_item_key');
$_smarty_tpl->tpl_vars['menu_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu_item_key']->value => $_smarty_tpl->tpl_vars['menu_item']->value) {
$_smarty_tpl->tpl_vars['menu_item']->do_else = false;
?>
                <li<?php if ($_smarty_tpl->tpl_vars['menu_item']->value['active'] == true) {?> class="active"<?php }?>><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu_item']->value['url'],'html','UTF-8' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu_item']->value['name'],'htmlall','UTF-8' ));
if ($_smarty_tpl->tpl_vars['menu_item']->value['icon'] != '') {?> <i class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['menu_item']->value['icon'],'htmlall','UTF-8' ));?>
"></i><?php }?></a></li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <ul class="nav navbar-nav navbar-right info">
            <li><a href="#" rel="nofollow"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_name']->value,'htmlall','UTF-8' ));?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Version','mod'=>'dhldp'),$_smarty_tpl ) );?>
: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_version']->value,'htmlall','UTF-8' ));?>
</a></li>
            <?php if ($_smarty_tpl->tpl_vars['changelog']->value == true) {?>
                <li><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['changelog_path']->value,'htmlall','UTF-8' ));?>
" class="readme-fancybox"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Changelog','mod'=>'dhldp'),$_smarty_tpl ) );?>
</a></li>
            <?php }?>
            <li><a href="https://addons.prestashop.com/de/contact-us?id_product=20569" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'contact us','mod'=>'dhldp'),$_smarty_tpl ) );?>
</a></li>
            <li><a href="https://addons.prestashop.com/de/20_silbersaiten" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'our modules','mod'=>'dhldp'),$_smarty_tpl ) );?>
</a></li>
        </ul>
    </div>
</nav>
<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function() {
        $('.readme-fancybox').fancybox({
            type: 'iframe',
            autoDimensions: false,
            autoSize: false,
            width: 600,
            height: 'auto',
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    });
<?php echo '</script'; ?>
>
<?php }
}
