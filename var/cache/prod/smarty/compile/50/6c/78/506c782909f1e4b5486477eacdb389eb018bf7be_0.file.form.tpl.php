<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:56
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_whatsapp/views/templates/admin/_configure/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4669c17a0c9_05083225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '506c782909f1e4b5486477eacdb389eb018bf7be' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_whatsapp/views/templates/admin/_configure/helpers/form/form.tpl',
      1 => 1655989013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4669c17a0c9_05083225 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2102307762b4669c159d99_01445325', "label");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_135622313062b4669c165e83_32773928', 'input_row');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "label"} */
class Block_2102307762b4669c159d99_01445325 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'label' => 
  array (
    0 => 'Block_2102307762b4669c159d99_01445325',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?>
		<label class="control-label col-lg-3 <?php if (((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required'] && $_smarty_tpl->tpl_vars['input']->value['type'] != 'radio') || ((isset($_smarty_tpl->tpl_vars['input']->value['showRequired'])) && $_smarty_tpl->tpl_vars['input']->value['showRequired'])) {?> required<?php }?>">
			<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['hint']))) {?>
			<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="<?php if (is_array($_smarty_tpl->tpl_vars['input']->value['hint'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['hint'], 'hint');
$_smarty_tpl->tpl_vars['hint']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hint']->value) {
$_smarty_tpl->tpl_vars['hint']->do_else = false;
?>
							<?php if (is_array($_smarty_tpl->tpl_vars['hint']->value)) {?>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['hint']->value['text'],'html','UTF-8' ));?>

							<?php } else { ?>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['hint']->value,'html','UTF-8' ));?>

							<?php }?>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php } else { ?>
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['hint'],'html','UTF-8' ));?>

					<?php }?>">
			<?php }?>
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['label'],'html','UTF-8' ));?>

			<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['hint']))) {?>
			</span>
			<?php }?>
		</label>
	<?php }
}
}
/* {/block "label"} */
/* {block 'input_row'} */
class Block_135622313062b4669c165e83_32773928 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_row' => 
  array (
    0 => 'Block_135622313062b4669c165e83_32773928',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WA_ADJUST_RIGHT' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WA_ADJUST_BOTTOM' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WA_ADJUST_LEFT') {?>
        <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WA_ADJUST_RIGHT') {?>
            <div class="form-group">
                <label class="control-label col-lg-3"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Adjust display position','mod'=>'ets_whatsapp'),$_smarty_tpl ) );?>
 </label>
                <div class="col-lg-9 form-group">
                    <div class="col-sm-4 col-md-3 col-lg-2 ETS_WA_ADJUST_RIGHT_item">
                        <label class="control-label"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Right padding','mod'=>'ets_whatsapp'),$_smarty_tpl ) );?>
 </label>
                        <div class="input-group col-lg-12">
                            <input id="ETS_WA_ADJUST_RIGHT" class="" name="ETS_WA_ADJUST_RIGHT" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WA_ADJUST_RIGHT'],'html','UTF-8' ));?>
" type="text" />
                            <span class="input-group-addon"> px </span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2 ETS_WA_ADJUST_RIGHT_item">
                        <label class="control-label"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Bottom padding','mod'=>'ets_whatsapp'),$_smarty_tpl ) );?>
 </label>
                        <div class="input-group col-lg-12">
                            <input id="ETS_WA_ADJUST_BOTTOM" class="" name="ETS_WA_ADJUST_BOTTOM" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WA_ADJUST_BOTTOM'],'html','UTF-8' ));?>
" type="text" />
                            <span class="input-group-addon"> px </span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2 ETS_WA_ADJUST_RIGHT_item">
                        <label class="control-label"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Left padding','mod'=>'ets_whatsapp'),$_smarty_tpl ) );?>
 </label>
                        <div class="input-group col-lg-12">
                            <input id="ETS_WA_ADJUST_LEFT" class="" name="ETS_WA_ADJUST_LEFT" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WA_ADJUST_LEFT'],'html','UTF-8' ));?>
" type="text" />
                            <span class="input-group-addon"> px </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WA_CALL_PREFIX' || $_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WA_NUMBER_PHONE') {?>
        <?php if ($_smarty_tpl->tpl_vars['input']->value['name'] == 'ETS_WA_NUMBER_PHONE') {?>
            <div class="form-group">
                <input type="hidden" name="ETS_WA_CALL_PREFIX" id="ETS_WA_CALL_PREFIX" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WA_CALL_PREFIX'],'html','UTF-8' ));?>
"/>
                <label class="control-label col-lg-3"> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['label'],'html','UTF-8' ));?>
 </label>
                <div class="input-group ets-wa-group-number-phone">
                    <span class="input-group-addon country">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-flip="false"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_MODULE_DIR_') ? constant('_MODULE_DIR_') : null))."ets_whatsapp/views/img/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country_iso_code']->value,'htmlall','UTF-8' )))));?>
.gif" />&nbsp; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country_name']->value,'html','UTF-8' ));?>
 </button>
                            <div class="dropdown-menu js-choice-options">
                                <?php if ($_smarty_tpl->tpl_vars['countries']->value) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                                        <button type="button" class="js-dropdown-item dropdown-item" data-call_prefix="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country']->value['call_prefix'],'html','UTF-8' ));?>
" data-value="<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_MODULE_DIR_') ? constant('_MODULE_DIR_') : null))."ets_whatsapp/views/img/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country']->value['iso_code'],'htmlall','UTF-8' )))));?>
.gif" />&nbsp;<span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country']->value['name'],'html','UTF-8' ));?>
</span></button>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>
                            </div>
                        </div>
                    </span>
                    <span class="input-group-addon call_prefix">+<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['call_prefix']->value,'html','UTF-8' ));?>
</span>
                    <input type="text" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['ETS_WA_NUMBER_PHONE'],'html','UTF-8' ));?>
" name="ETS_WA_NUMBER_PHONE" id="ETS_WA_NUMBER_PHONE" />
                </div>
            </div>
        <?php }?>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block 'input_row'} */
}
