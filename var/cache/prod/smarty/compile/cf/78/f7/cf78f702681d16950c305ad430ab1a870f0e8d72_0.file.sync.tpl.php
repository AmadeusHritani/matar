<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:43
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/sync.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46653a602e4_57047800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf78f702681d16950c305ad430ab1a870f0e8d72' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/sync.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46653a602e4_57047800 (Smarty_Internal_Template $_smarty_tpl) {
?>

<h4 class="margin-top-1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Synchronisation','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</h4>

<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please choose sync mode between your store and Zettle','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</p>
<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Available options','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
:
<p>

<ul>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sync changes immediately','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sync changes by Cron job','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Manual sync','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</li>
</ul>
<small class="help-block margin-top-1">
    <p>
        <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sync changes immediately','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'is more preferable for most customer it does not require any additional settings','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

        <br>
        <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sync changes by Cron job','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'is usefull, if you are handling large numbers of products and transactions or if you see performance issues when using the automatic synchronization','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

        <br>
        <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Manual sync','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'is usually used for debug mode','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

        <br>
    </p>

    </p>


    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Defaul option - ','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

    <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sync changes immediately','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</strong>

</small>


<br><?php }
}
