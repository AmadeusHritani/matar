<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:09:06
  from '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/catalog/_partials/product-additional-info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465f2ce1050_65395688',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6554b826c15d391de46fbc3c98327a2e687e38c5' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/catalog/_partials/product-additional-info.tpl',
      1 => 1655979592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465f2ce1050_65395688 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product-additional-info js-product-additional-info">
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

</div>
<?php }
}
