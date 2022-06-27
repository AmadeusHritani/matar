<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:52
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_testimonial/views/templates/admin/_configure/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b46698372827_60513267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8129da0290598995b3405f0e1538c895cbfd2e93' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_testimonial/views/templates/admin/_configure/helpers/form/form.tpl',
      1 => 1655989613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b46698372827_60513267 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_201113280162b4669833b218_55893504', "input");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "input"} */
class Block_201113280162b4669833b218_55893504 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input' => 
  array (
    0 => 'Block_201113280162b4669833b218_55893504',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'file_lang') {?>
        <?php if ((isset($_smarty_tpl->tpl_vars['is15']->value)) && $_smarty_tpl->tpl_vars['is15']->value) {?>
            <div class="translatable">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
					<div class="lang_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['id_lang'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['id_lang'],'html','UTF-8' ));?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] == $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>block<?php } else { ?>none<?php }?>; float: left;">
						<input type="file" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {?>id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['id'],'html','UTF-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['id_lang'],'html','UTF-8' ));?>
"<?php }?> />
		                <?php if ((isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']])) && $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] && $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']]) {?>
                            <label class="control-label col-lg-3 uploaded_image_label" style="font-style: italic;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Uploaded image: ','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</label>
                            <div class="col-lg-9 uploaded_img_wrapper">
                        		<img style="display: inline-block; max-width: 200px;" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']],'html','UTF-8' ));?>
" />
                                <?php if (!((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required'])) {?>
                                    <a onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this image?','mod'=>'ets_testimonial','js'=>1),$_smarty_tpl ) );?>
');" class="delete_url"  style="display: inline-block; text-decoration: none!important;" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_del_link']->value,'html','UTF-8' ));?>
&id_lang=<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
"><span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete"></i></span></a>
                                <?php }?>
                            </div>
						<?php }?>  
					</div>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
        <?php } else { ?>
    		<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
    		  <div class="form-group">
    		<?php }?>
    			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
    				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
    					<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
    				<?php }?>
    					<div class="col-lg-9">
    						<div class="dummyfile input-group sass">
    							<input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" type="file" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" class="hide-file-upload" />
    							<span class="input-group-addon"><i class="icon-file"></i></span>
    							<input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-name" type="text" class="disabled" name="filename" readonly />
    							<span class="input-group-btn">
    								<button id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
    									<i class="icon-folder-open"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose a file','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

    								</button>
    							</span>
    						</div>
                            <?php if ((isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']])) && $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] && $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']]) {?>
                                <label class="control-label col-lg-3 uploaded_image_label" style="font-style: italic;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Uploaded image: ','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</label>
                                <div class="col-lg-9 uploaded_img_wrapper">
                            		<img style="display: inline-block; max-width: 200px;" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']],'html','UTF-8' ));?>
" />
                                    <?php if (!((isset($_smarty_tpl->tpl_vars['input']->value['required'])) && $_smarty_tpl->tpl_vars['input']->value['required'])) {?>
                                        <a onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this image?','mod'=>'ets_testimonial','js'=>1),$_smarty_tpl ) );?>
');" class="delete_url"  style="display: inline-block; text-decoration: none!important;" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_del_link']->value,'html','UTF-8' ));?>
&id_lang=<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
"><span style="color: #666"><i style="font-size: 20px;" class="process-icon-delete"></i></span></a>
                                    <?php }?>
                                </div>
    						<?php }?>
    					</div>
    				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
    					<div class="col-lg-2">
    						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
    							<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

    							<span class="caret"></span>
    						</button>
    						<ul class="dropdown-menu">
    							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
    							<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
    							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    						</ul>
    					</div>
    				<?php }?>
    				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
    					</div>
    				<?php }?>
    				<?php echo '<script'; ?>
>
    				$(document).ready(function(){
    					$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-selectbutton,#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-name").click(function(e){
    						$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
").trigger('click');
    					});
    					$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
").change(function(e){
    						var val = $(this).val();
    						var file = val.split(/[\\/]/);
    						$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-name").val(file[file.length-1]);
    					});
    				});
    			<?php echo '</script'; ?>
>
    			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    		<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
    		  </div>
    		<?php }?>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'switch') {?>
    	<?php if ((isset($_smarty_tpl->tpl_vars['is15']->value)) && $_smarty_tpl->tpl_vars['is15']->value) {?>
            <span class="switch prestashop-switch fixed-width-lg">
        		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['values'], 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
        		<input type="radio" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
"<?php if ($_smarty_tpl->tpl_vars['value']->value['value'] == 1) {?> id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_on"<?php } else { ?> id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_off"<?php }?> value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value']->value['value'],'html','UTF-8' ));?>
"<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['value']->value['value']) {?> checked="checked"<?php }
if (((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) || ((isset($_smarty_tpl->tpl_vars['value']->value['disabled'])) && $_smarty_tpl->tpl_vars['value']->value['disabled'])) {?> disabled="disabled"<?php }?>/>
        		<label <?php if ($_smarty_tpl->tpl_vars['value']->value['value'] == 1) {?> for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_on"<?php } else { ?> for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_off"<?php }?>><?php if ($_smarty_tpl->tpl_vars['value']->value['value'] == 1) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'ets_testimonial'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'ets_testimonial'),$_smarty_tpl ) );
}?></label>
        		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        		<a class="slide-button btn"></a>
        	</span>
        <?php } else { ?>
            <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
  
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'rate') {?>
        <div class="ets_ttn_star_content">
    		<input class="star not_uniform" type="radio" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" value="1" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Terrible','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == 1) {?>checked="checked"<?php }?> />
    		<input class="star not_uniform" type="radio" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" value="2" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Acceptable','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == 2) {?>checked="checked"<?php }?>/>
    		<input class="star not_uniform" type="radio" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" value="3" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Fairly Good','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == 3) {?>checked="checked"<?php }?>/>
    		<input class="star not_uniform" type="radio" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" value="4" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Good','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == 4) {?>checked="checked"<?php }?> />
    		<input class="star not_uniform" type="radio" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" value="5" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Excellent','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == 5) {?>checked="checked"<?php }?>/>
    	</div>
    <?php } else { ?>
        <?php if ((isset($_smarty_tpl->tpl_vars['is15']->value)) && $_smarty_tpl->tpl_vars['is15']->value && (isset($_smarty_tpl->tpl_vars['input']->value['form_group_class'])) && $_smarty_tpl->tpl_vars['input']->value['form_group_class']) {?>
            <div class="form-group <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['form_group_class'],'html','UTF-8' ));?>
">
        <?php }?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
  
        <?php if ((isset($_smarty_tpl->tpl_vars['is15']->value)) && $_smarty_tpl->tpl_vars['is15']->value && (isset($_smarty_tpl->tpl_vars['input']->value['form_group_class'])) && $_smarty_tpl->tpl_vars['input']->value['form_group_class']) {?>
            </div>
        <?php }?>             
    <?php }?>            
<?php
}
}
/* {/block "input"} */
}
