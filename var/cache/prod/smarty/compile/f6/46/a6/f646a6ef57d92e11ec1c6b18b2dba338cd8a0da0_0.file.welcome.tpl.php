<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:24
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465c863ac00_19740066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f646a6ef57d92e11ec1c6b18b2dba338cd8a0da0' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/welcome.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465c863ac00_19740066 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="onboarding-welcome izettle izettle-settings">
  <i class="material-icons onboarding-button-shut-down">close</i>
  <p class="welcome"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Welcome to Zettle POS!','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
  <div class="content">
    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Now we could start initial configuration.','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You will discover a few essential steps before you can launch product export:','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create API Key and customize synchronization settings','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
  </div>
  <div class="started">
    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Let\'s get started!','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
  </div>
  <div class="buttons">
    <a class="onboarding-button-shut-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No, thanks','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</a>
    <button class="blue-balloon btn btn-primary btn-lg with-spinner onboarding-button-next"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Start','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</button>
  </div>
</div>
<?php }
}
