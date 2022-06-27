<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:11:52
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_testimonial/views/templates/hook/list_helper.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b466984299d2_98764336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '303a1dc4f262c776ca76a3550e3032ee0a098aa8' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_testimonial/views/templates/hook/list_helper.tpl',
      1 => 1655989613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b466984299d2_98764336 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var text_update_position='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Successfully updated','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
';
<?php echo '</script'; ?>
>
<div class="panel ets_ttn-panel<?php if ((isset($_smarty_tpl->tpl_vars['class']->value))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['class']->value,'html','UTF-8' ));
}?>">
    <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        <?php if ((isset($_smarty_tpl->tpl_vars['totalRecords']->value)) && $_smarty_tpl->tpl_vars['totalRecords']->value > 0) {?><span class="badge"><?php echo intval($_smarty_tpl->tpl_vars['totalRecords']->value);?>
</span><?php }?>
        <span class="panel-heading-action">
            <?php if ((isset($_smarty_tpl->tpl_vars['show_add_new']->value)) && $_smarty_tpl->tpl_vars['show_add_new']->value) {?>            
                <a class="list-toolbar-btn add_new_link" href="<?php if ((isset($_smarty_tpl->tpl_vars['link_new']->value))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_new']->value,'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));
}?>">
                    <span title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
">
        				<i class="process-icon-new fa fa-plus-circle"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add new','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>

                    </span>
                </a>            
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['preview_link']->value)) && $_smarty_tpl->tpl_vars['preview_link']->value) {?>            
                <a target="_blank" class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['preview_link']->value,'html','UTF-8' ));?>
">
                    <span title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Preview ','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' ));?>
)" >
        				<i style="margin-left: 5px;" class="icon-search-plus"></i>
                    </span>
                </a>            
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['link_export']->value)) && $_smarty_tpl->tpl_vars['link_export']->value) {?>            
                <a  class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_export']->value,'html','UTF-8' ));?>
">
                    <span title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Export ','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' ));?>
)" >
        				<i style="margin-left: 5px;" class="icon icon-import fa fa-import"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Export','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>

                    </span>
                </a>            
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['link_import']->value)) && $_smarty_tpl->tpl_vars['link_import']->value) {?>            
                <a class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_import']->value,'html','UTF-8' ));?>
">
                    <span title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Import ','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' ));?>
)">
        				<i style="margin-left: 5px;" class="icon icon-export fa fa-export"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Import','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>

                    </span>
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
                <table class="table configuration alltab_ss list-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
">
                    <thead>
                        <tr class="nodrag nodrop">
                            <?php if ((isset($_smarty_tpl->tpl_vars['bulk_actions']->value)) && $_smarty_tpl->tpl_vars['bulk_actions']->value) {?>
                                 <th class="fixed-width-xs">
                                    <span class="title_box">
                                        <?php if (count($_smarty_tpl->tpl_vars['field_values']->value)) {?>
                                            <input value="" class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_readed_all" type="checkbox" />
                                        <?php }?>
                                    </span>
                                </th>
                            <?php }?>
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
                                <th class="table_action" style="text-align: right;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Action','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</th>
                            <?php }?>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['show_toolbar']->value) {?>
                            <tr class="nodrag nodrop filter row_hover">
                                <?php if ((isset($_smarty_tpl->tpl_vars['bulk_actions']->value)) && $_smarty_tpl->tpl_vars['bulk_actions']->value) {?>
                                    <th>&nbsp;</th>
                                <?php }?>
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
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['value']->value],'html','UTF-8' ));?>
</option>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    <?php }?>
                                                </select>                                            
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'int') {?>
                                                <label for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min"><input type="text" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Min','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['min'],'html','UTF-8' ));?>
" /></label>
                                                <label for="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max"><input type="text" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Max','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['active']['max'],'html','UTF-8' ));?>
" /></label>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'date') {?>
                                                <fieldset class="form-group"> 
                                                    <div class="input-group ets_ttn_datepicker">
                                                        <input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" autocomplete="off" class="form-control" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_min" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
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
                                                    <div class="input-group ets_ttn_datepicker">
                                                        <input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" autocomplete="off" class="form-control" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['index']->value,'html','UTF-8' ));?>
_max" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
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
                                        <?php } else { ?>
                                           <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' -- ','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>

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
"><i class="icon-eraser"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</a> &nbsp;<?php }?>
                                            <button class="btn btn-default" name="ets_ttn_submit_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" id="ets_ttn_submit_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" type="submit">
            									<i class="icon-search"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Filter','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>

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
                            <tr id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
-<?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value]);?>
" <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['read'])) && !$_smarty_tpl->tpl_vars['row']->value['read']) {?>class="no-read"<?php }?> data-id="<?php echo intval($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value]);?>
">
                                <?php if ((isset($_smarty_tpl->tpl_vars['bulk_actions']->value)) && $_smarty_tpl->tpl_vars['bulk_actions']->value) {?>
                                     <td class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
-more-action">
                                        <input type="checkbox" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_readed[<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
]" class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_readed" value="1" />
                                    </td>
                                <?php }?>
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
                                            
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' -- ','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>

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
                                                    <a class="ets_ttn_fancy" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value]['img_url'],'html','UTF-8' ));?>
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
                                                <?php if ($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] == -1) {?>
                                                    <?php if ((!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit']) && ($_smarty_tpl->tpl_vars['name']->value != 'mp_front_products' || ((isset($_smarty_tpl->tpl_vars['row']->value['approved'])) && $_smarty_tpl->tpl_vars['row']->value['approved'] == 1))) {?>
                                                        <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=1&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-pending  list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php if ($_smarty_tpl->tpl_vars['key']->value == 'reported') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to mark as reported','mod'=>'ets_testimonial'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to enable','mod'=>'ets_testimonial'),$_smarty_tpl ) );
}?>">
                                                            <i class="icon-clock-o fa fa-clock-o"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <span class="list-action-enable action-pending" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pending','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
">
                                                            <i class="icon-clock-o fa fa-clock-o"></i>
                                                        </span>
                                                    <?php }?>
                                                <?php } else { ?>
                                                    <?php if ($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['key']->value] == -2) {?>
                                                        <?php if ((!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit']) && $_smarty_tpl->tpl_vars['name']->value != 'mp_front_products') {?>
                                                            <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=1&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-disabled  list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to enable','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
"><i class="icon-ban fa fa-ban"></i></a>
                                                        <?php } else { ?>
                                                            <span class="list-action-enable action-disabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Declined','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
">
                                                                <i class="icon-ban fa fa-ban"></i>
                                                            </span>
                                                        <?php }?>
                                                    <?php } else { ?>
                                                        <?php if ((!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit']) && ($_smarty_tpl->tpl_vars['name']->value != 'mp_front_products' || ((isset($_smarty_tpl->tpl_vars['row']->value['approved'])) && $_smarty_tpl->tpl_vars['row']->value['approved'] == 1))) {?>
                                                            <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
"  href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=0&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-enabled list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php if ($_smarty_tpl->tpl_vars['key']->value == 'reported') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to unreport','mod'=>'ets_testimonial'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to disable','mod'=>'ets_testimonial'),$_smarty_tpl ) );
}?>">
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        <?php } else { ?>
                                                            <span class="list-action-enable action-enabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enabled','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
">
                                                                <i class="fa fa-check"></i>
                                                            </span>
                                                        <?php }?>
                                                    <?php }?>
                                                <?php }?>
                                            <?php } else { ?>
                                                <?php if (!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit']) {?>
                                                    <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&change_enabled=1&field=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
" class="list-action field-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['key']->value,'html','UTF-8' ));?>
 list-action-enable action-disabled  list-item-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" data-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" title="<?php if ($_smarty_tpl->tpl_vars['key']->value == 'reported') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to mark as reported','mod'=>'ets_testimonial'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click to enable','mod'=>'ets_testimonial'),$_smarty_tpl ) );
}?>">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <span class="list-action-enable action-disabled" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disabled','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
">
                                                        <i class="fa fa-remove"></i>
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
" <?php if ((isset($_smarty_tpl->tpl_vars['view_new_tab']->value)) && $_smarty_tpl->tpl_vars['view_new_tab']->value) {?> target="_blank" <?php }?>><i class="icon-search-plus fa fa-search-plus"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</a>
                                                            <?php } elseif (!(isset($_smarty_tpl->tpl_vars['row']->value['action_edit'])) || $_smarty_tpl->tpl_vars['row']->value['action_edit']) {?>
                                                                <a class="btn btn-default link_edit" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&edit<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
=1&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
" ><i class="icon-pencil fa fa-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</a>
                                                            <?php }?>
                                                        <?php }?>
                                                        <?php if ($_smarty_tpl->tpl_vars['actions']->value[0] == 'delete') {?>
                                                            <a class="btn btn-default" onclick="return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this item?','mod'=>'ets_testimonial','js'=>1),$_smarty_tpl ) );?>
');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&del=yes"><i class="icon-trash fa fa-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
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
                                                                            <li><a class="btn btn-default" onclick="return confirm('<?php if ($_smarty_tpl->tpl_vars['name']->value == 'mp_front_products' || $_smarty_tpl->tpl_vars['name']->value == 'mp_products') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this product?','mod'=>'ets_testimonial'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to delete this item?','mod'=>'ets_testimonial'),$_smarty_tpl ) );
}?>');" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
&del=yes<?php if ((isset($_smarty_tpl->tpl_vars['row']->value['type']))) {?>&type=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['type'],'html','UTF-8' ));
}?>"><i class="fa fa-trash icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'view') {?>
                                                                            <?php if ((isset($_smarty_tpl->tpl_vars['row']->value['child_view_url'])) && $_smarty_tpl->tpl_vars['row']->value['child_view_url']) {?>
                                                                                <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['child_view_url'],'html','UTF-8' ));?>
"><i class="fa fa-search-plus icon-search-plus"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</a></li>
                                                                            <?php } else { ?>
                                                                                <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
"><i class="fa fa-pencil icon-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</a></li>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
                                                                            <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&edit<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
=1&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
"><i class="fa fa-pencil icon-pencil"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</a></li>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'duplicate') {?>
                                                                            <li><a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&duplicate<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
=1&<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8' ));?>
=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8' ));?>
"><i class="fa fa-copy icon-copy"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Duplicate','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
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
                           <tr class="no-record not_items_found"> <td colspan="100%"><p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No items found','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</p></td></tr> 
                        <?php }?>                
                    </tbody>
                </table>
                <?php if ((isset($_smarty_tpl->tpl_vars['bulk_actions']->value)) && $_smarty_tpl->tpl_vars['bulk_actions']->value) {?>
                    <select id="bulk_action_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" name="bulk_action_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" style="display:none;">
                        <option value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Bulk actions','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</option>
                        <option value="delete_all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete all selected','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</option>
                        <option value="duplicate_all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Duplicate all selected','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</option>
                        <option value="active_all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Active all selected','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</option>
                        <option value="deactive_all"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Deactive all selected','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</option>
                    </select>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['paggination']->value) {?>
                    <div class="ets_ttn_paggination" style="margin-top: 10px;">
                        <?php echo $_smarty_tpl->tpl_vars['paggination']->value;?>

                    </div>
                    <?php echo '<script'; ?>
 type="text/javascript">
                        $(document).on('change','.paginator_select_limit',function(e){
                            $(this).parents('form').submit();
                        });
                    <?php echo '</script'; ?>
>
                <?php }?>
            </form>
        </div>
    <?php }?>
    <?php if ((isset($_smarty_tpl->tpl_vars['link_back_to_list']->value))) {?>
        <div class="panel-footer">
            <a id="desc-attribute-back" class="btn btn-default btn-primary" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_back_to_list']->value,'html','UTF-8' ));?>
">
        		<i class="process-icon-back "></i> <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back to list','mod'=>'ets_testimonial'),$_smarty_tpl ) );?>
</span>
        	</a>
        </div>
    <?php }?>
</div>


<?php }
}
