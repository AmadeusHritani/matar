<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:48
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_securitycertification/views/templates/hook/admin-list-images.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b466945e1159_48525386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c786439ca59c68d4902fa9eed062a89e105326b0' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_securitycertification/views/templates/hook/admin-list-images.tpl',
      1 => 1655989613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./admin-post-form.tpl' => 2,
  ),
),false)) {
function content_62b466945e1159_48525386 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="panel col-lg-12">
    <div class="panel-heading">
        <i class="icon-list"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cerfitication','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>

    </div>
    <div class="list-images">
        <div class="table-heading">
            <div class="column left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
<span class="ets-sc-tooltip">?<span class="ets-sc-tooltip-content"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Accept format: jpg, jpeg, png, gif. Limit %s','sprintf'=>array($_smarty_tpl->tpl_vars['PS_ATTACHMENT_MAXIMUM_SIZE']->value),'mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
</span></span></div>
            <div class="column left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Link','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
</div>
            <div class="column left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Description','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
</div>
            <div class="column left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Alt description','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
</div>
            <div class="column center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Action','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
</div>
        </div>
        <div class="table-body">
            <?php $_smarty_tpl->_assignInScope('hidden', false);?>
            <?php if ($_smarty_tpl->tpl_vars['images']->value) {?>
                <?php $_smarty_tpl->_assignInScope('hidden', true);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./admin-post-form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('image'=>$_smarty_tpl->tpl_vars['image']->value,'hidden'=>false), 0, true);
?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
            <?php $_smarty_tpl->_subTemplateRender("file:./admin-post-form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('image'=>array(),'hidden'=>$_smarty_tpl->tpl_vars['hidden']->value), 0, true);
?>
        </div>
        <div class="table-footer">
            <div class="table-tfoot">
                <button type="button" name="postImage" class="btn btn-primary" data-edit-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save certification','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
" data-add-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new certification','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
">
                    <svg class="w_14 h_14" width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1344 960v-128q0-26-19-45t-45-19h-256v-256q0-26-19-45t-45-19h-128q-26 0-45 19t-19 45v256h-256q-26 0-45 19t-19 45v128q0 26 19 45t45 19h256v256q0 26 19 45t45 19h128q26 0 45-19t19-45v-256h256q26 0 45-19t19-45zm320-64q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>&nbsp;
                    <span class="ets-sc-title">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new certification','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>

                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php }
}
