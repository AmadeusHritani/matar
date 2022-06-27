<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:26
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-shipper-country.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4664203d3e0_35098782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d898806531030673b4c48e50cf5bfbbecb10669' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-shipper-country.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4664203d3e0_35098782 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <input id="DHL_COUNTRY" style="display: inline-block;" class="fixed-width-sm" type="text" disabled="disabled" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_country']->value,'htmlall','UTF-8' ));?>
" name="DHLDP_DHL_COUNTRY"></div><?php }
}
