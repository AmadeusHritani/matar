<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:10
  from '/var/www/vhosts/dreamsat.online/matar/modules/doofinder/views/templates/admin/configure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4666ed44a79_81110164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1be2bf4e76ea96819bf133ce6200ac82e0ee16f' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/doofinder/views/templates/admin/configure.tpl',
      1 => 1655988946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./onboarding_tab.tpl' => 1,
  ),
),false)) {
function content_62b4666ed44a79_81110164 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['oldPS']->value) {
echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(){
        $("#content").addClass("bootstrap");
        $(".defaultForm").addClass("panel");
        $("input[type='submit']").addClass("btn-lg");
    });
<?php echo '</script'; ?>
>
<?php }
if ((isset($_smarty_tpl->tpl_vars['formUpdatedToClick']->value))) {
echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(){
        $('.nav-tabs a[href="#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['formUpdatedToClick']->value,'htmlall','UTF-8' ));?>
"]').trigger('click');
    });
<?php echo '</script'; ?>
>
<?php }?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <?php if (!$_smarty_tpl->tpl_vars['configured']->value) {?>
    <li class="active"><a href="#onboarding_tab" role="tab" data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'On Boarding','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a></li>
    <?php } else { ?>
    <li class="active"><a href="#data_feed_tab" role="tab" data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Data Feed','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a></li>
    <?php if (!$_smarty_tpl->tpl_vars['dfEnabledV9']->value) {?>
        <li><a href="#internal_search_tab" role="tab" data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Internal Search','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a></li>
        <li><a href="#custom_css_tab" role="tab" data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Custom CSS','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a></li>
    <?php }?>
    <li><a href="#support_tab" role="tab" data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Support','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['adv']->value && $_smarty_tpl->tpl_vars['configured']->value) {?>
    <li><a href="#advanced_tab" role="tab" data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Advanced','mod'=>'doofinder'),$_smarty_tpl ) );?>
</a></li>
    <?php }?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <?php if (!$_smarty_tpl->tpl_vars['configured']->value) {?>
    <div class="tab-pane active" id="onboarding_tab"><?php $_smarty_tpl->_subTemplateRender('file:./onboarding_tab.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
    <?php }
}
}
