<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:48
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_securitycertification/views/templates/hook/admin-post-form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b466945f6768_25246480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18607f7f7a6edb60eb9062236c7f359fd711c667' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_securitycertification/views/templates/hook/admin-post-form.tpl',
      1 => 1655989613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b466945f6768_25246480 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form class="listing-row<?php if ($_smarty_tpl->tpl_vars['hidden']->value) {?> hide<?php }?>" id="form_id_<?php if ((isset($_smarty_tpl->tpl_vars['image']->value['id_ets_sc_certification']))) {
echo intval($_smarty_tpl->tpl_vars['image']->value['id_ets_sc_certification']);
} else { ?>0<?php }?>" action="<?php echo $_smarty_tpl->tpl_vars['action']->value;
if ((isset($_smarty_tpl->tpl_vars['image']->value['id_ets_sc_certification']))) {?>&id_ets_sc_certification=<?php echo intval($_smarty_tpl->tpl_vars['image']->value['id_ets_sc_certification']);
}?>" method="POST" enctype="multipart/form-data">
    <div class="column left">
        <div class="ets-sc-img-upload<?php if ((isset($_smarty_tpl->tpl_vars['image']->value['image_url'])) && trim($_smarty_tpl->tpl_vars['image']->value['image_url']) !== '') {?> img_base<?php }?>">
            <input type="file" name="image" value="" accept="image/png, image/gif, image/jpeg, image/jpg" class="hide">
            <span class="ets-sc-drag-drop-upload-file" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose file','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
">
                <svg class="w-14 h-14" width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z"/></svg>
            </span>
            <div class="ets-sc-thumbnail-wrapper">
                <?php if ((isset($_smarty_tpl->tpl_vars['image']->value['image_url']))) {?>
                    <img class="imgm image-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
" width="80" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['title'],'html','UTF-8' ));?>
"/>
                <?php }?>
            </div>
        </div>
        <br/>
        <p class="help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Accept format: jpg, jpeg, png, gif. Limit %s','sprintf'=>array($_smarty_tpl->tpl_vars['PS_ATTACHMENT_MAXIMUM_SIZE']->value),'mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
</p>
    </div>
    <div class="column left">
        <input type="text" name="link" value="<?php if ((isset($_smarty_tpl->tpl_vars['image']->value['link']))) {
echo $_smarty_tpl->tpl_vars['image']->value['link'];
}?>" class="form-control">
    </div>
    <div class="column left">
        <input type="text" name="title" value="<?php if ((isset($_smarty_tpl->tpl_vars['image']->value['title']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['title'],'html','UTF-8' ));
}?>" class="form-control">
    </div>
    <div class="column left">
        <input type="text" name="alt" value="<?php if ((isset($_smarty_tpl->tpl_vars['image']->value['alt']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['alt'],'html','UTF-8' ));
}?>" class="form-control">
    </div>
    <div class="column center">
        <a class="ets-sc-btn-delete<?php if (!(isset($_smarty_tpl->tpl_vars['image']->value['delete_url']))) {?> hide<?php }?>" href="<?php if ((isset($_smarty_tpl->tpl_vars['image']->value['delete_url']))) {
echo $_smarty_tpl->tpl_vars['image']->value['delete_url'];
}?>" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_securitycertification'),$_smarty_tpl ) );?>
">
            <svg class="w_14 h_14" width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M704 736v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm128 724v-948h-896v948q0 22 7 40.5t14.5 27 10.5 8.5h832q3 0 10.5-8.5t14.5-27 7-40.5zm-672-1076h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z"/></svg>
        </a>
    </div>
</form><?php }
}
