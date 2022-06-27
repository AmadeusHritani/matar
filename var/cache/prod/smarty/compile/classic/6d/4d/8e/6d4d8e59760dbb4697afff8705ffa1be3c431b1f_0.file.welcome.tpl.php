<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:43
  from '/var/www/vhosts/dreamsat.online/matar/modules/welcome/views/contents/welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46653a19b52_57110581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d4d8e59760dbb4697afff8705ffa1be3c431b1f' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/welcome/views/contents/welcome.tpl',
      1 => 1655979591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46653a19b52_57110581 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="onboarding-welcome">
  <i class="material-icons onboarding-button-shut-down">close</i>
  <p class="welcome"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Welcome to your shop!','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</p>
  <div class="content">
    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hi! My name is Preston and I\'m here to show you around.','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</p>
    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You will discover a few essential steps before you can launch your shop:','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create your first product, customize your shop, configure shipping and payments...','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</p>
  </div>
  <div class="started">
    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Let\'s get started!','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</p>
  </div>
  <div class="buttons">
    <button class="btn btn-tertiary-outline btn-lg onboarding-button-shut-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Later','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</button>
    <button class="blue-balloon btn btn-primary btn-lg with-spinner onboarding-button-next"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Start','d'=>'Modules.Welcome.Admin'),$_smarty_tpl ) );?>
</button>
  </div>
</div>
<?php }
}
