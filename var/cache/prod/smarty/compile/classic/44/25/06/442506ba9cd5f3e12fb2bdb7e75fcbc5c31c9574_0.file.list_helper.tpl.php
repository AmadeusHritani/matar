<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:54
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_banneranywhere/views/templates/hook/list_helper.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465e60b3099_52085423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '442506ba9cd5f3e12fb2bdb7e75fcbc5c31c9574' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_banneranywhere/views/templates/hook/list_helper.tpl',
      1 => 1655989011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465e60b3099_52085423 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/vhosts/dreamsat.online/matar/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
echo '<script'; ?>
 type="text/javascript">
var text_update_position='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Successfully updated','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
';
<?php echo '</script'; ?>
>
<div class="panel ph_pcms-panel<?php if ((isset($_smarty_tpl->tpl_vars['class']->value))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['class']->value,'html','UTF-8' ));
}?>">
    <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        <?php if ((isset($_smarty_tpl->tpl_vars['totalRecords']->value)) && $_smarty_tpl->tpl_vars['totalRecords']->value > 0) {?><span class="badge"><?php echo intval($_smarty_tpl->tpl_vars['totalRecords']->value);?>
</span><?php }?>
        <span class="panel-heading-action">
            <?php if ((isset($_smarty_tpl->tpl_vars['show_add_new']->value)) && $_smarty_tpl->tpl_vars['show_add_new']->value) {?>            
                <a class="btn btn-default add_new_link" href="<?php if ((isset($_smarty_tpl->tpl_vars['link_new']->value))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_new']->value,'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));
}?>">  
        		     <i class="ets_icon">
                            <svg width="14" height="14" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1600 736v192q0 40-28 68t-68 28h-416v416q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-416h-416q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h416v-416q0-40 28-68t68-28h192q40 0 68 28t28 68v416h416q40 0 68 28t28 68z"/></svg>
                        </i> <?php if ((isset($_smarty_tpl->tpl_vars['add_new_text']->value))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['add_new_text']->value,'html','UTF-8' ));
} else { ?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );
}?>
                </a>            
            <?php }?>
        </span>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['fields_list']->value) {?>
        <div class="table-responsive clearfix">
            <form method="post" action="<?php if ((isset($_smarty_tpl->tpl_vars['postIndex']->value))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['postIndex']->value,'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));
}?>">
                <?php if ((isset($_smarty_tpl->tpl_vars['bulk_action_html']->value))) {?>
                    <?php echo $_smarty_tpl->tpl_vars['bulk_action_html']->value;?>

                <?php }?>
                <table class="table configuration list-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
">
                    <thead>
                        <tr class="nodrag nodrop">
                            <?php $_smarty_tpl->_assignInScope('i', 1);?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_list']->value, 'field', false, 'index');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
                                <th class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));
if ((isset($_smarty_tpl->tpl_vars['field']->value['class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['class'],'html','UTF-8' ));
}?>" <?php if ($_smarty_tpl->tpl_vars['show_action']->value && !$_smarty_tpl->tpl_vars['actions']->value && count($_smarty_tpl->tpl_vars['fields_list']->value) == $_smarty_tpl->tpl_vars['i']->value) {?>colspan="2"<?php }?>>
                                    <span class="title_box">
                                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['title'],'html','UTF-8' ));?>

                                        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['toltip']))) {?>
                                        <span class="ets_bn_tooltip">
                                        ?<span class="toltip"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['toltip'],'html','UTF-8' ));?>
</span>
                                        </span>
                                            
                                        <?php }?>
                                        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['sort'])) && $_smarty_tpl->tpl_vars['field']->value['sort']) {?>
                                            <span class="soft">
                                            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&sort=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
&sort_type=desc<?php echo $_smarty_tpl->tpl_vars['filter_params']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['sort']->value)) && $_smarty_tpl->tpl_vars['sort']->value == $_smarty_tpl->tpl_vars['index']->value && (isset($_smarty_tpl->tpl_vars['sort_type']->value)) && $_smarty_tpl->tpl_vars['sort_type']->value == 'desc') {?> class="active"<?php }?>><i class="icon-caret-down"></i></a>
                                            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&sort=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
&sort_type=asc<?php echo $_smarty_tpl->tpl_vars['filter_params']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['sort']->value)) && $_smarty_tpl->tpl_vars['sort']->value == $_smarty_tpl->tpl_vars['index']->value && (isset($_smarty_tpl->tpl_vars['sort_type']->value)) && $_smarty_tpl->tpl_vars['sort_type']->value == 'asc') {?> class="active"<?php }?>><i class="icon-caret-up"></i></a>
                                            </span>
                                         <?php }?>
                                    </span>
                                </th>  
                                <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>                          
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php if ($_smarty_tpl->tpl_vars['show_action']->value && $_smarty_tpl->tpl_vars['actions']->value) {?>
                                <th class="table_action" style="text-align: right;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Action','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</th>
                            <?php }?>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['show_toolbar']->value) {?>
                            <tr class="nodrag nodrop filter row_hover">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_list']->value, 'field', false, 'index');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
                                    <th class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));
if ((isset($_smarty_tpl->tpl_vars['field']->value['class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['class'],'html','UTF-8' ));
}?>">
                                        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['filter'])) && $_smarty_tpl->tpl_vars['field']->value['filter']) {?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'text') {?>
                                                <input class="filter" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
" type="text" <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['width']))) {?>style="width: <?php echo intval($_smarty_tpl->tpl_vars['field']->value['width']);?>
px;"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['active']))) {?>value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active'],'html','UTF-8' ));?>
"<?php }?>/>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'select' || $_smarty_tpl->tpl_vars['field']->value['type'] == 'active') {?>
                                                <select  <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['width']))) {?>style="width: <?php echo intval($_smarty_tpl->tpl_vars['field']->value['width']);?>
px;"<?php }?>  name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
">
                                                    <option value=""> -- </option>
                                                    <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['filter_list']['list'])) && $_smarty_tpl->tpl_vars['field']->value['filter_list']['list']) {?>
                                                        <?php $_smarty_tpl->_assignInScope('id_option', $_smarty_tpl->tpl_vars['field']->value['filter_list']['id_option']);?>
                                                        <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['field']->value['filter_list']['value']);?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['filter_list']['list'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                                                            <option <?php if (($_smarty_tpl->tpl_vars['field']->value['active'] !== '' && $_smarty_tpl->tpl_vars['field']->value['active'] == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['id_option']->value]) || ($_smarty_tpl->tpl_vars['field']->value['active'] == '' && $_smarty_tpl->tpl_vars['index']->value == 'has_post' && $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['id_option']->value] == 1)) {?> selected="selected"<?php }?> value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['id_option']->value],'html','UTF-8' ));?>
"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['value']->value],'[highlight]',''),'[end_highlight]','');?>
</option>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    <?php }?>
                                                </select>                                            
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'int') {?>
                                                <label for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min"><input type="text" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Min','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['min'],'html','UTF-8' ));?>
" /></label>
                                                <label for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max"><input type="text" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Max','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['max'],'html','UTF-8' ));?>
" /></label>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'date') {?>
                                                <fieldset class="form-group"> 
                                                    <div class="input-group ets_baw_datepicker">
                                                        <input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" autocomplete="off" class="form-control" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['min'],'html','UTF-8' ));?>
" type="text" autocomplete="off" />
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="icon icon-date"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group"> 
                                                    <div class="input-group ets_baw_datepicker">
                                                        <input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" autocomplete="off" class="form-control" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['max'],'html','UTF-8' ));?>
" type="text" autocomplete="off" />
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="icon icon-date"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            <?php }?>
                                        <?php } elseif ((($_smarty_tpl->tpl_vars['name']->value == 'mp_front_products' || $_smarty_tpl->tpl_vars['name']->value == 'mp_products') && $_smarty_tpl->tpl_vars['field']->value['type'] == 'text' && (isset($_smarty_tpl->tpl_vars['index']->value)) && $_smarty_tpl->tpl_vars['index']->value == 'input_box')) {?>
                                            <div class="md-checkbox">
                                                <label>
                                                  <input id="bulk_action_select_all" onclick="$('table').find('td input:checkbox').prop('checked', $(this).prop('checked')); ets_baw_updateBulkMenu();" value="" type="checkbox">
                                                  <i class="md-checkbox-control"></i>
                                                </label>
                                            </div>
                                        <?php } elseif (($_smarty_tpl->tpl_vars['field']->value['type'] == 'text' && (isset($_smarty_tpl->tpl_vars['index']->value)) && $_smarty_tpl->tpl_vars['index']->value == 'input_box')) {?>
                                            <div class="md-checkbox">
                                                <label>
                                                  <input id="bulk_action_select_all" onclick="$('table').find('td input:checkbox').prop('checked', $(this).prop('checked')); ets_baw_updateBulkMenu();" value="" type="checkbox">
                                                  <i class="md-checkbox-control"></i>
                                                </label>
                                            </div>
                                        <?php } else { ?>
                                           <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' -- ','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>

                                        <?php }?>
                                    </th>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php if ($_smarty_tpl->tpl_vars['show_action']->value) {?>
                                    <th class="actions">
                                        <span class="pull-right flex">
                                            <input type="hidden" name="post_filter" value="yes" />
                                            <?php if ($_smarty_tpl->tpl_vars['show_reset']->value) {?><a  class="btn btn-warning"  href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
"><i class="icon-eraser"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a> &nbsp;<?php }?>
                                            <button class="btn btn-default" name="ets_baw_submit_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" id="ets_baw_submit_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" type="submit">
            									<i class="icon-search"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Filter','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>

            								</button>
                                        </span>
                                    </th>
                                <?php }?>
                            </tr>
                        <?php }?>
                    </thead>
                    <tbody id="list-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
">
                        <?php if ($_smarty_tpl->tpl_vars['field_values']->value) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field_values']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                            <tr id="list-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
-<?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value]);?>
" <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['read'])) && !$_smarty_tpl->tpl_vars['row']->value['read']) {?>class="no-read"<?php }?> data-id="<?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value]);?>
">
                                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_list']->value, 'field', false, 'key');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>                             
                                    <td class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 <?php if ((isset($_smarty_tpl->tpl_vars['sort']->value)) && $_smarty_tpl->tpl_vars['sort']->value == $_smarty_tpl->tpl_vars['key']->value && (isset($_smarty_tpl->tpl_vars['sort_type']->value)) && $_smarty_tpl->tpl_vars['sort_type']->value == 'asc' && (isset($_smarty_tpl->tpl_vars['field']->value['update_position'])) && $_smarty_tpl->tpl_vars['field']->value['update_position']) {?>pointer dragHandle center<?php }
if ((isset($_smarty_tpl->tpl_vars['field']->value['class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['class'],'html','UTF-8' ));
}?>" <?php if ($_smarty_tpl->tpl_vars['show_action']->value && !$_smarty_tpl->tpl_vars['actions']->value && count($_smarty_tpl->tpl_vars['fields_list']->value) == $_smarty_tpl->tpl_vars['i']->value) {?>colspan="2"<?php }?> >
                                        <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['rating_field'])) && $_smarty_tpl->tpl_vars['field']->value['rating_field']) {?>
                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] > 0) {?>
                                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1 - (1) : 1-((int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                    <div class="star star_on"></div>
                                                <?php }
}
?>
                                                <?php if ((int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] < 5) {?>
                                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - ((int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1) : (int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = (int)$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]+1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                        <div class="star"></div>
                                                    <?php }
}
?>
                                                <?php }?>
                                            <?php } else { ?>
                                            
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' -- ','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>

                                            <?php }?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] != 'active') {?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'date') {?>
                                                <?php if (!$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
                                                --
                                                <?php } else { ?>
                                                    <?php if ($_smarty_tpl->tpl_vars['key']->value != 'date_from' && $_smarty_tpl->tpl_vars['key']->value != 'date_to') {?>
                                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>1),$_smarty_tpl ) );?>

                                                    <?php } else { ?>
                                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>0),$_smarty_tpl ) );?>

                                                    <?php }?>
                                                <?php }?>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'checkbox') {?>
                                                <input type="checkbox" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_boxs[]" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_boxs" />
                                            <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type'] == 'input_number') {?>
                                                <?php $_smarty_tpl->_assignInScope('field_input', $_smarty_tpl->tpl_vars['field']->value['field']);?>
                                                <div class="qty edit_quantity" data-v-599c0dc5="">
                                                    <div class="ps-number edit-qty hover-buttons" data-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
">
                                                        <input class="form-control <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_input']->value,'html','UTF-8' ));?>
" type="number" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field_input']->value,'html','UTF-8' ));?>
[<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
]" value="" placeholder="0" />
                                                        <div class="ps-number-spinner d-flex">
                                                            <span class="ps-number-up"></span>
                                                            <span class="ps-number-down"></span>
                                                        </div>
                                                    </div>
                                                    <button class="check-button" disabled="disabled"><i class="fa fa-check icon-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['update_position'])) && $_smarty_tpl->tpl_vars['field']->value['update_position']) {?>
                                                    <div class="dragGroup">
                                                    <span class="positions">
                                                <?php }?>
                                                <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] !== '' && !is_array($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) {
if ((isset($_smarty_tpl->tpl_vars['field']->value['strip_tag'])) && !$_smarty_tpl->tpl_vars['field']->value['strip_tag']) {
echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value];
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( strip_tags($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]),120,'...' )),'html','UTF-8' ));
}
} else { ?>--<?php }?>
                                                <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && is_array($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]) && (isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['image_field'])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['image_field']) {?>
                                                    <a class="ets_baw_fancy" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['img_url'],'html','UTF-8' ));?>
"><img style="<?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['height'])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['height']) {?>max-height: <?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['height']);?>
px;<?php }
if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['width'])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['width']) {?>max-width: <?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['width']);?>
px;<?php }?>" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['img_url'],'html','UTF-8' ));?>
" /></a>
                                                <?php }?> 
                                                <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['update_position'])) && $_smarty_tpl->tpl_vars['field']->value['update_position']) {?>
                                                    </div>
                                                    </span>
                                                <?php }?>  
                                            <?php }?>                                     
                                        <?php } else { ?>
                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value])) && $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
                                                <?php if ((!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit'])) {?>
                                                    <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
"  href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=0&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-enabled list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php if ($_smarty_tpl->tpl_vars['key']->value == 'reported') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to unreport','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to disable','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );
}?>">
                                                        <i class="icon icon-check fa fa-check"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <span class="list-action-enable action-enabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enabled','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
">
                                                        <i class="icon icon-check fa fa-check"></i>
                                                    </span>
                                                <?php }?>
                                            <?php } else { ?>
                                                <?php if ((!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit'])) {?>
                                                    <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=1&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-disabled  list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php if ($_smarty_tpl->tpl_vars['key']->value == 'reported') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to mark as reported','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to enable','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );
}?>">
                                                        <i class="icon icon-remove fa fa-remove"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <span class="list-action-enable action-disabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disabled','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
">
                                                        <i class="icon icon-remove fa fa-remove"></i>
                                                    </span>
                                                <?php }?>
                                            <?php }?>
                                        <?php }?>
                                    </td>
                                    <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php if ($_smarty_tpl->tpl_vars['show_action']->value) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['actions']->value) {?>  
                                        <td class="text-right">                            
                                            <div class="btn-group-action">
                                                <div class="btn-group pull-right">
                                                        <?php if ($_smarty_tpl->tpl_vars['actions']->value[0] == 'view') {?>
                                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['child_view_url'])) && $_smarty_tpl->tpl_vars['row']->value['child_view_url']) {?>
                                                                <a class="btn btn-default link_view" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['child_view_url'],'html','UTF-8' ));?>
" <?php if ((isset($_smarty_tpl->tpl_vars['view_new_tab']->value)) && $_smarty_tpl->tpl_vars['view_new_tab']->value) {?> target="_blank" <?php }?>><i class="icon-search-plus fa fa-search-plus"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a>
                                                            <?php } elseif (!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit']) {?>
                                                                <a class="btn btn-default link_edit" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&edit<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
=1&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" ><i class="icon icon-pencil fa fa-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a>
                                                            <?php }?>
                                                        <?php }?>
                                                        <?php if ($_smarty_tpl->tpl_vars['actions']->value[0] == 'delete') {?>
                                                            <a class="btn btn-default" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this item?','mod'=>'ets_banneranywhere','js'=>1),$_smarty_tpl ) );?>
');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&del=yes"><i class="icon icon-trash fa fa-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a>
                                                        <?php }?>
                                                        <?php if (count($_smarty_tpl->tpl_vars['actions']->value) >= 2 && (!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit'] || in_array('action',$_smarty_tpl->tpl_vars['actions']->value) || ((isset($_smarty_tpl->tpl_vars['row']->value['action_delete'])) && $_smarty_tpl->tpl_vars['row']->value['action_delete']))) {?>
                                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                        						<i class="icon-caret-down"></i>&nbsp;
                                        					</button>
                                                            <ul class="dropdown-menu">
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action', false, 'key');
$_smarty_tpl->tpl_vars['action']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->do_else = false;
?>
                                                                    <?php if ($_smarty_tpl->tpl_vars['key']->value != 0) {?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'delete' && (!(isset($_smarty_tpl->tpl_vars['row']->value['view_order_url'])) || ((isset($_smarty_tpl->tpl_vars['row']->value['view_order_url'])) && !$_smarty_tpl->tpl_vars['row']->value['view_order_url']))) {?>
                                                                            <li><a class="btn btn-default" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this item?','mod'=>'ets_banneranywhere','js'=>1),$_smarty_tpl ) );?>
');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&del=yes<?php if ((isset($_smarty_tpl->tpl_vars['row']->value['type']))) {?>&type=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['type'],'html','UTF-8' ));
}?>"><i class="fa fa-trash icon icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                        
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'delete_all') {?>
                                                                            <li><a class="btn btn-default" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this shop and all of its data?','mod'=>'ets_banneranywhere','js'=>1),$_smarty_tpl ) );?>
');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&delall=yes<?php if ((isset($_smarty_tpl->tpl_vars['row']->value['type']))) {?>&type=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['type'],'html','UTF-8' ));
}?>"><i class="fa fa-trash icon icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete all','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'view') {?>
                                                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['child_view_url'])) && $_smarty_tpl->tpl_vars['row']->value['child_view_url']) {?>
                                                                                <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['child_view_url'],'html','UTF-8' ));?>
"><i class="fa fa-search-plus icon icon-search-plus"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a></li>
                                                                            <?php } else { ?>
                                                                                <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
"><i class="fa fa-pencil icon icon-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a></li>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
                                                                            <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&edit<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
=1&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
"><i class="fa fa-pencil icon icon-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                    <?php }?>
                                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                            </ul>
                                                        <?php }?>
                                                </div>
                                            </div>
                                        </td>
                                    <?php }?>
                                <?php }?>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                        <?php }?>  
                        <?php if (!$_smarty_tpl->tpl_vars['field_values']->value) {?>
                           <tr class="no-record not_items_found list-empty">
                               <td colspan="100%">
                                   <p class="list-empty-msg">
                                       <i class="icon-warning-sign list-empty-icon"></i>
                                       <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No items found','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>
</p>
                               </td>
                           </tr>
                        <?php }?>                
                    </tbody>
                </table>
                <?php if ((isset($_smarty_tpl->tpl_vars['show_bulk_action']->value)) && $_smarty_tpl->tpl_vars['show_bulk_action']->value) {?>
                    <div id="catalog-actions" class="col order-first">
                        <div class="row">
                            <div class="col">
                                <div class="d-inline-block hide">
                                    <div class="btn-group dropdown bulk-catalog">
                                        <button id="product_bulk_menu" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="color:black;">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Bulk actions','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>

                                            <i class="icon-caret-up"></i>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <div class="dropdown-divider"></div>
                                            <button class="dropdown-item" name="submitBulkEnabled" type="submit" style="border:none;background:none" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to enable selected items?','mod'=>'ets_banneranywhere','js'=>1),$_smarty_tpl ) );?>
');">
                                                <i class="icon-check" aria-hidden="true"></i>
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enable selection','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>

                                            </button>
                                            <button class="dropdown-item" name="submitBulkDiasabled" type="submit" style="border:none;background:none" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to disable selected items?','mod'=>'ets_banneranywhere','js'=>1),$_smarty_tpl ) );?>
');">
                                                <i class="icon-remove" aria-hidden="true"></i>
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disable selection','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>

                                            </button>
                                            <button class="dropdown-item" name="submitBulkDelete" type="submit" style="border:none;background:none" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete selected items?','mod'=>'ets_banneranywhere','js'=>1),$_smarty_tpl ) );?>
');">
                                                <i class="icon-trash-o" aria-hidden="true"></i>
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete selected','mod'=>'ets_banneranywhere'),$_smarty_tpl ) );?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['paggination']->value) {?>
                    <div class="ets_baw_paggination" style="margin-top: 10px;">
                        <?php echo $_smarty_tpl->tpl_vars['paggination']->value;?>

                    </div>
                <?php }?>
            </form>
        </div>
    <?php }?>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    function ets_baw_updateBulkMenu()
    {
        $('tbody input[type="checkbox"]').parent().removeClass('checked');
        $('tbody input[type="checkbox"]:checked').parent().addClass('checked');
        if($('tbody input[type="checkbox"]:checked').length) {
            $('#product_bulk_menu').removeAttr('disabled').parents('.d-inline-block').removeClass('hide');
        } else {
            $('#product_bulk_menu').attr('disabled','disabled').parents('.d-inline-block').addClass('hide');
        }
    }
    $(document).ready(function(){
       $(document).on('click','tbody input[type="checkbox"]',function(){
            ets_baw_updateBulkMenu();
        }); 
    });
$(document).on('change','.paginator_select_limit',function(e){
    $(this).parents('form').submit();
});
<?php echo '</script'; ?>
>

<?php }
}
