<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:26
  from '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-ind-notif.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46642035c76_21137408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a5c09d93c09e5deed9857dac8488545fd1c4267' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/dhldp/views/templates/admin/dhl-ind-notif.tpl',
      1 => 1655988944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46642035c76_21137408 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Would you like to individualise the DHL parcel notification? You can now display your logo and the desired shop name in the parcel notification. Use the following form to do so','mod'=>'dhldp'),$_smarty_tpl ) );?>
:
    <p><a href="https://www.dhl.de/de/geschaeftskunden/paket/versandsoftware/dhl-paketankuendigung/formular.html" target="_blank">https://www.dhl.de/de/geschaeftskunden/paket/versandsoftware/dhl-paketankuendigung/formular.html</a>
    <i class="icon-external-link"></i></p>
</div><?php }
}
