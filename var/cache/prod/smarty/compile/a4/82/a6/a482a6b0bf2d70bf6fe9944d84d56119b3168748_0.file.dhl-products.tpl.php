<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:26
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4664202ef41_20557636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a482a6b0bf2d70bf6fe9944d84d56119b3168748' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-products.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4664202ef41_20557636 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="carrier-list col-xs-10 col-sm-10 col-md-10" style="border: 1px solid #ddd; border-radius: 4px 4px 0 0; padding: 10px;">
	<div class="dhl-products">
		<input type="hidden" name="dhl_products" value="">
		<table class="table">
			<tr>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product','mod'=>'dhldp'),$_smarty_tpl ) );?>
</td>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Participation','mod'=>'dhldp'),$_smarty_tpl ) );?>
</td>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'GoGreen','mod'=>'dhldp'),$_smarty_tpl ) );?>
</td>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Action','mod'=>'dhldp'),$_smarty_tpl ) );?>
</td>
			<tr>
			<tr id="add-dhl-product">
				<td>
					<select name="product" id="dhl-product-name">
					</select>
				</td>
				<td>
					<input type="text" name="participation" size="2" maxlength="2" id="dhl-product-participation">
				</td>
				<td>
					<select name="gogreen" id="dhl-product-gogreen">
					</select>
				</td>
				<td><button name="addDhlProduct" id="addDhlProduct" class="btn btn-default"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','mod'=>'dhldp'),$_smarty_tpl ) );?>
</button></td>
			<tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['added_dhl_products']->value, 'added_dhl_product');
$_smarty_tpl->tpl_vars['added_dhl_product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['added_dhl_product']->value) {
$_smarty_tpl->tpl_vars['added_dhl_product']->do_else = false;
?>
				<tr>
				<td><input type="hidden" class="added_dhl_products" name="added_dhl_products[]" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['code'],'htmlall','UTF-8' ));?>
:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['part'],'htmlall','UTF-8' ));?>
:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['gogreen'],'htmlall','UTF-8' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['name'],'htmlall','UTF-8' ));?>
</td>
				<td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['part'],'htmlall','UTF-8' ));?>
</td>
				<td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['gogreen'],'htmlall','UTF-8' ));?>
</td>
				<td><input type="button" name="removeDhlProduct" id="removeDhlProduct" class="btn btn-default" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove','mod'=>'dhldp'),$_smarty_tpl ) );?>
"/></td>
				</tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</table>
	</div>
</div>
<?php }
}
