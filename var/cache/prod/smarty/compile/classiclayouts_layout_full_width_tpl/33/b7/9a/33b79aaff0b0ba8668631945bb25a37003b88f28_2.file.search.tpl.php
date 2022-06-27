<?php
/* Smarty version 3.1.43, created on 2022-06-23 16:58:02
  from '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/catalog/listing/search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b47f7a9977f4_71101696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33b79aaff0b0ba8668631945bb25a37003b88f28' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/catalog/listing/search.tpl',
      1 => 1655979592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/products.tpl' => 1,
  ),
),false)) {
function content_62b47f7a9977f4_71101696 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130141214662b47f7a9922b5_08418910', "error_content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9883325162b47f7a995009_54334445', 'product_list');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'catalog/listing/product-list.tpl');
}
/* {block "error_content"} */
class Block_130141214662b47f7a9922b5_08418910 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'error_content' => 
  array (
    0 => 'Block_130141214662b47f7a9922b5_08418910',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No matches were found for your search','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</h4>
  <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please try other keywords to describe what you are looking for.','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</p>
<?php
}
}
/* {/block "error_content"} */
/* {block 'product_list'} */
class Block_9883325162b47f7a995009_54334445 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list' => 
  array (
    0 => 'Block_9883325162b47f7a995009_54334445',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/products.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value,'productClass'=>"col-xs-6 col-xl-3"), 0, false);
}
}
/* {/block 'product_list'} */
}
