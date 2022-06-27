<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:24
  from '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/end.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465c8679616_41203144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd8131f37c8cec849497ec5b8a7f33c58e7540ab' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/izettleconnector/views/templates/admin/onboarding/contents/end.tpl',
      1 => 1655988989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465c8679616_41203144 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal-body bootstrap">
    <div class="izettle">
        <div class="col-12">
            <button class="onboarding-button-next pull-right close" type="button">&times;</button>
            <h2 class="text-center text-md-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Congratulations!','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</h2>
        </div>
        <div class="col-12">
            <p class="text-center text-md-center">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You have successfully finished configuration process.','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
<br/>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You are ready to start product export.','mod'=>'izettleconnector'),$_smarty_tpl ) );?>

            </p>
        </div>
        <div class="modal-footer">
            <div class="col-12">
                <div class="text-center text-md-center">
                    <button class="btn btn-primary onboarding-button-next"  onclick="setTimeout(function(){$('#smartwizard').hide().fadeIn(300);}, 800)" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Let\'s start export','mod'=>'izettleconnector'),$_smarty_tpl ) );?>
</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
