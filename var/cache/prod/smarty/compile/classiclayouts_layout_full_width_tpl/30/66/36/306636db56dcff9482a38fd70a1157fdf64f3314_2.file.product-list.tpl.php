<?php
/* Smarty version 3.1.43, created on 2022-06-23 16:58:02
  from '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/catalog/listing/product-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b47f7a9b32a2_34764192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '306636db56dcff9482a38fd70a1157fdf64f3314' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/catalog/listing/product-list.tpl',
      1 => 1655979592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_partials/microdata/product-list-jsonld.tpl' => 1,
    'file:catalog/_partials/subcategories.tpl' => 1,
    'file:catalog/_partials/products-top.tpl' => 1,
    'file:catalog/_partials/products.tpl' => 1,
    'file:catalog/_partials/products-bottom.tpl' => 1,
    'file:errors/not-found.tpl' => 1,
  ),
),false)) {
function content_62b47f7a9b32a2_34764192 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_77859111862b47f7a9a3b33_22960063', 'head_microdata_special');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155349998562b47f7a9a44f5_67606893', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'head_microdata_special'} */
class Block_77859111862b47f7a9a3b33_22960063 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head_microdata_special' => 
  array (
    0 => 'Block_77859111862b47f7a9a3b33_22960063',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php $_smarty_tpl->_subTemplateRender('file:_partials/microdata/product-list-jsonld.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value), 0, false);
}
}
/* {/block 'head_microdata_special'} */
/* {block 'product_list_header'} */
class Block_8893798362b47f7a9a47f5_00069081 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <h1 id="js-product-list-header" class="h2"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing']->value['label'], ENT_QUOTES, 'UTF-8');?>
</h1>
    <?php
}
}
/* {/block 'product_list_header'} */
/* {block 'subcategory_list'} */
class Block_130057071162b47f7a9a61f6_09865869 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php if ((isset($_smarty_tpl->tpl_vars['subcategories']->value)) && count($_smarty_tpl->tpl_vars['subcategories']->value) > 0) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/subcategories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('subcategories'=>$_smarty_tpl->tpl_vars['subcategories']->value), 0, false);
?>
      <?php }?>
    <?php
}
}
/* {/block 'subcategory_list'} */
/* {block 'product_list_top'} */
class Block_66491725662b47f7a9ad325_86657806 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/products-top.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value), 0, false);
?>
        <?php
}
}
/* {/block 'product_list_top'} */
/* {block 'product_list_active_filters'} */
class Block_207108254062b47f7a9adbb5_86251091 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <div class="hidden-sm-down">
            <?php echo $_smarty_tpl->tpl_vars['listing']->value['rendered_active_filters'];?>

          </div>
        <?php
}
}
/* {/block 'product_list_active_filters'} */
/* {block 'product_list'} */
class Block_89054085762b47f7a9ae4e2_02797284 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/products.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value,'productClass'=>"col-xs-6 col-xl-4"), 0, false);
?>
        <?php
}
}
/* {/block 'product_list'} */
/* {block 'product_list_bottom'} */
class Block_117666808462b47f7a9aee49_12878432 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/products-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value), 0, false);
?>
        <?php
}
}
/* {/block 'product_list_bottom'} */
/* {block 'content'} */
class Block_155349998562b47f7a9a44f5_67606893 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_155349998562b47f7a9a44f5_67606893',
  ),
  'product_list_header' => 
  array (
    0 => 'Block_8893798362b47f7a9a47f5_00069081',
  ),
  'subcategory_list' => 
  array (
    0 => 'Block_130057071162b47f7a9a61f6_09865869',
  ),
  'product_list_top' => 
  array (
    0 => 'Block_66491725662b47f7a9ad325_86657806',
  ),
  'product_list_active_filters' => 
  array (
    0 => 'Block_207108254062b47f7a9adbb5_86251091',
  ),
  'product_list' => 
  array (
    0 => 'Block_89054085762b47f7a9ae4e2_02797284',
  ),
  'product_list_bottom' => 
  array (
    0 => 'Block_117666808462b47f7a9aee49_12878432',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8893798362b47f7a9a47f5_00069081', 'product_list_header', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130057071162b47f7a9a61f6_09865869', 'subcategory_list', $this->tplIndex);
?>

    
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayHeaderCategory"),$_smarty_tpl ) );?>


    <section id="products">
      <?php if (count($_smarty_tpl->tpl_vars['listing']->value['products'])) {?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_66491725662b47f7a9ad325_86657806', 'product_list_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_207108254062b47f7a9adbb5_86251091', 'product_list_active_filters', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_89054085762b47f7a9ae4e2_02797284', 'product_list', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_117666808462b47f7a9aee49_12878432', 'product_list_bottom', $this->tplIndex);
?>


      <?php } else { ?>
        <div id="js-product-list-top"></div>

        <div id="js-product-list">
          <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "errorContent", null);?>
            <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No products available yet','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</h4>
            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Stay tuned! More products will be shown here as they are added.','d'=>'Shop.Theme.Catalog'),$_smarty_tpl ) );?>
</p>
          <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

          <?php $_smarty_tpl->_subTemplateRender('file:errors/not-found.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('errorContent'=>$_smarty_tpl->tpl_vars['errorContent']->value), 0, false);
?>
        </div>

        <div id="js-product-list-bottom"></div>
      <?php }?>
    </section>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayFooterCategory"),$_smarty_tpl ) );?>


  </section>
<?php
}
}
/* {/block 'content'} */
}
