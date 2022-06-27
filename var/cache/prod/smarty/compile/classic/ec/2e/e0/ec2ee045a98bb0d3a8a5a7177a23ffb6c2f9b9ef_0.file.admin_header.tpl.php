<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:08:25
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/admin_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b465c9d6d066_29407077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec2ee045a98bb0d3a8a5a7177a23ffb6c2f9b9ef' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/admin_header.tpl',
      1 => 1655989017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b465c9d6d066_29407077 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var ets_blog_link_ajax_comment='<?php echo $_smarty_tpl->tpl_vars['ets_blog_link_ajax_comment']->value;?>
';
$(document).ready(function(){
    $.ajax({
        url: ets_blog_link_ajax_comment,
        data: 'action=getCountCommentsNoViewed',
        type: 'post',
        dataType: 'json',                
        success: function(json){ 
            if(parseInt(json.count) >0)
            {
                if($('#subtab-AdminEtsBlogComment span').length)
                    $('#subtab-AdminEtsBlogComment span').append('<span class="count_messages ">'+json.count+'</span>'); 
                else
                    $('#subtab-AdminEtsBlogComment a').append('<span class="count_messages ">'+json.count+'</span>');
            }
            else
            {
                if($('#subtab-AdminEtsBlogComment span').length)
                    $('#subtab-AdminEtsBlogComment span').append('<span class="count_messages hide">'+json.count+'</span>'); 
                else
                    $('#subtab-AdminEtsBlogComment a').append('<span class="count_messages hide">'+json.count+'</span>');
            }
                                                              
        },
    });
});
<?php echo '</script'; ?>
><?php }
}
