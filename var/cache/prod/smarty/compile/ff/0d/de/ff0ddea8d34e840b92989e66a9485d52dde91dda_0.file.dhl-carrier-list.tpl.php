<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:26
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-carrier-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b466420227f4_35549119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff0ddea8d34e840b92989e66a9485d52dde91dda' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-carrier-list.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b466420227f4_35549119 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="carrier-list col-xs-10 col-sm-10 col-md-10" style="border: 1px solid #ddd; border-radius: 4px 4px 0 0; padding: 10px;">
	<div class="dhl-list-carriers">
		<table class="table">
			<tr>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','mod'=>'dhldp'),$_smarty_tpl ) );?>
</td>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable','mod'=>'dhldp'),$_smarty_tpl ) );?>
</td>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Default DHL Product','mod'=>'dhldp'),$_smarty_tpl ) );?>
</td>
			<tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carriers']->value, 'carrier');
$_smarty_tpl->tpl_vars['carrier']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->do_else = false;
?>
			<tr>
				<td>
					<label for="dhlc_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],'htmlall','UTF-8' ));?>
"> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['name'],'htmlall','UTF-8' ));?>
 </label>
				</td>
				<td>
					<input class="dhlc" id="dhlc_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],'htmlall','UTF-8' ));?>
" type="checkbox" name="dhl_carriers[<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],'htmlall','UTF-8' ));?>
][carrier]" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],'htmlall','UTF-8' ));?>
"
					<?php if (is_array($_smarty_tpl->tpl_vars['dhl_carriers']->value) && in_array($_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],array_keys($_smarty_tpl->tpl_vars['dhl_carriers']->value))) {?> checked <?php }?>>
				</td>
				<td>
					<select class="dhlcp" id="dhlcp_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],'htmlall','UTF-8' ));?>
" name="dhl_carriers[<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],'htmlall','UTF-8' ));?>
][product]">
						<option value=""></option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['added_dhl_products']->value, 'added_dhl_product');
$_smarty_tpl->tpl_vars['added_dhl_product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['added_dhl_product']->value) {
$_smarty_tpl->tpl_vars['added_dhl_product']->do_else = false;
?>
							<?php ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['code'],'htmlall','UTF-8' ));
$_prefixVariable1=ob_get_clean();
ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['part'],'htmlall','UTF-8' ));
$_prefixVariable2=ob_get_clean();
ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['gogreen'],'htmlall','UTF-8' ));
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('item_value', $_prefixVariable1.":".$_prefixVariable2.":".$_prefixVariable3);?>
						<option value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item_value']->value,'htmlall','UTF-8' ));?>
"
						<?php if ((isset($_smarty_tpl->tpl_vars['dhl_carriers']->value[$_smarty_tpl->tpl_vars['carrier']->value['id_carrier']])) && (isset($_smarty_tpl->tpl_vars['dhl_carriers']->value[$_smarty_tpl->tpl_vars['carrier']->value['id_carrier']]['product'])) && $_smarty_tpl->tpl_vars['dhl_carriers']->value[$_smarty_tpl->tpl_vars['carrier']->value['id_carrier']]['product'] == $_smarty_tpl->tpl_vars['item_value']->value) {?> selected="selected"<?php }?>
						><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['name'],'htmlall','UTF-8' ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['part'],'htmlall','UTF-8' ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['added_dhl_product']->value['gogreen'],'htmlall','UTF-8' ));?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</td>
			</tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</table>
	</div>
</div>
<?php }
}
