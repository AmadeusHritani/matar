<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:10:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/_partials/refund.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4663e4aed88_76273342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b72c058d548fe6fd5bdbd94bf574e66b518b73a' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/stripe_official/views/templates/admin/_partials/refund.tpl',
      1 => 1655988927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4663e4aed88_76273342 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="configuration_form" class="defaultForm form-horizontal stripe_official" action="#stripe_step_2" method="post" enctype="multipart/form-data" novalidate="">
    <input type="hidden" name="submit_refund_id" value="1">
    <div class="panel" id="fieldset_1">
        <div class="panel-heading">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose an Order you want to Refund','mod'=>'stripe_official'),$_smarty_tpl ) );?>

        </div>
        <div class="form-wrapper">
            <div class="form-group">
                <label class="control-label col-lg-3 required">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Stripe Payment ID','mod'=>'stripe_official'),$_smarty_tpl ) );?>

                </label>
                <div class="col-lg-9">
                    <input type="text" name="STRIPE_REFUND_ID" id="STRIPE_REFUND_ID" value="" class="fixed-width-xxl" required="required">
                    <p class="help-block">
                        <i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can find that ID in the Stripe tab of the order you\'d like to refund. It starts with "ch_" or "py_".','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</i>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <div class="radio">
                        <label>
                            <input type="radio" name="STRIPE_REFUND_MODE" id="active_on_refund" value="1" checked="checked"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Full refund','mod'=>'stripe_official'),$_smarty_tpl ) );?>

                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="STRIPE_REFUND_MODE" id="active_off_refund" value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Partial refund','mod'=>'stripe_official'),$_smarty_tpl ) );?>

                        </label>
                    </div>
                    <p class="help-block">
                        <i>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'We\'ll submit any refund you make to your customer\'s bank immediately.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
<br>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your customer will then receive the funds from a refund approximately 2-3 business days after the date on which the refund was initiated.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
<br>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refunds take 5 to 10 days to appear on your cutomer’s statement.','mod'=>'stripe_official'),$_smarty_tpl ) );?>

                        </i>
                    </p>
                </div>
            </div>
        </div>
        <div class="form-group partial-amount" style="display: none;">
            <label class="control-label col-lg-3 required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-9">
                <input type="text" name="STRIPE_REFUND_AMOUNT" id="refund_amount" value="" class="fixed-width-sm" size="20" required="required">
                <p class="help-block">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please, enter an amount your want to refund','mod'=>'stripe_official'),$_smarty_tpl ) );?>

                </p>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" value="1" id="configuration_form_submit_btn" name="submit_refund_id" class="btn btn-default pull-right button">
                <i class="process-icon-save"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Request Refund','mod'=>'stripe_official'),$_smarty_tpl ) );?>

            </button>
        </div>
    </div>
</form><?php }
}
