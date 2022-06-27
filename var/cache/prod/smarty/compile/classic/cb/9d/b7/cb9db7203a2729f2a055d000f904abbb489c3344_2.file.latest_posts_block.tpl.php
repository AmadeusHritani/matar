<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/latest_posts_block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658abfe961_86696617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb9db7203a2729f2a055d000f904abbb489c3344' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/latest_posts_block.tpl',
      1 => 1655989017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658abfe961_86696617 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['posts']->value) {?>
    <div class="block ets_block_latest <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ETS_BLOG_RTL_CLASS']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php if ((isset($_smarty_tpl->tpl_vars['page']->value)) && $_smarty_tpl->tpl_vars['page']->value) {?>page_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['page']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>page_blog<?php }?> ets_block_slider">
        <h4 class="title_blog title_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Latest posts','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</h4>
        <?php $_smarty_tpl->_assignInScope('product_row', 4);?>
        <div class="block_content row">
            <ul class="owl-rtl <?php if (count($_smarty_tpl->tpl_vars['posts']->value) > 1) {?>owl-carousel<?php }?>">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                    <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'home') {?>class="col-xs-12 col-sm-4 col-lg-<?php echo htmlspecialchars(12/intval($_smarty_tpl->tpl_vars['product_row']->value), ENT_QUOTES, 'UTF-8');?>
"<?php }?>> 
                        <?php if ($_smarty_tpl->tpl_vars['post']->value['thumb']) {?>
                            <a class="ets_item_img" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                <img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['thumb'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
                            </a>
                        <?php }?>
                        <div class="ets-blog-latest-post-content">
                            <a class="ets_title_block" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a>
                            <div class="ets-blog-sidear-post-meta">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post']->value['categories'])) && $_smarty_tpl->tpl_vars['post']->value['categories']) {?>
                                    <div class="ets-blog-categories">
                                        <?php $_smarty_tpl->_assignInScope('ik', 0);?>
                                        <?php $_smarty_tpl->_assignInScope('totalCat', count($_smarty_tpl->tpl_vars['post']->value['categories']));?>                        
                                        <div class="be-categories">
                                            <span class="be-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Posted in','mod'=>'ets_blog'),$_smarty_tpl ) );?>
: </span>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                                                <?php $_smarty_tpl->_assignInScope('ik', $_smarty_tpl->tpl_vars['ik']->value+1);?>                                        
                                                <a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( ucfirst($_smarty_tpl->tpl_vars['cat']->value['title']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a><?php if ($_smarty_tpl->tpl_vars['ik']->value < $_smarty_tpl->tpl_vars['totalCat']->value) {?><span class="comma">, </span><?php }?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </div>
                                    </div>
                                <?php }?>
                                <span class="post-date"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['post']->value['date_add'],'full'=>0),$_smarty_tpl ) );?>
</span>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['allowComments']->value || $_smarty_tpl->tpl_vars['show_views']->value || $_smarty_tpl->tpl_vars['allow_like']->value) {?> 
                                <div class="ets-blog-latest-toolbar">
                                    <?php if ($_smarty_tpl->tpl_vars['show_views']->value) {?>
                                        <span class="ets-blog-latest-toolbar-views"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['click_number']), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['post']->value['click_number'] != 1) {?><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'views','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</span><?php } else { ?><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'view','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</span><?php }?></span> 
                                    <?php }?>   
                                    <?php if ($_smarty_tpl->tpl_vars['allowComments']->value && $_smarty_tpl->tpl_vars['post']->value['comments_num'] > 0) {?>
                                        <span class="ets-blog-latest-toolbar-comments"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['comments_num']), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['post']->value['comments_num'] != 1) {?><span>
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'comments','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</span><?php } else { ?><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'comment','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</span><?php }?></span> 
                                    <?php }?>                                 
                                    <?php if ($_smarty_tpl->tpl_vars['allow_like']->value) {?>
                                        <span title="<?php if ($_smarty_tpl->tpl_vars['post']->value['liked']) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Liked','mod'=>'ets_blog'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Like this post','mod'=>'ets_blog'),$_smarty_tpl ) );
}?>" class="ets-blog-like-span ets-blog-like-span-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['id_post']), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['post']->value['liked']) {?>active<?php }?>"  data-id-post="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['id_post']), ENT_QUOTES, 'UTF-8');?>
">                        
                                            <span class="ben_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['id_post']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['likes']), ENT_QUOTES, 'UTF-8');?>
</span>
                                            <span class="blog-post-like-text blog-post-like-text-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['id_post']), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Liked','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</span>
                                            
                                        </span> 
                                    <?php }?>
                                </div>
                            <?php }?>                         
                            <?php if ($_smarty_tpl->tpl_vars['post']->value['short_description']) {?>
                                <div class="blog_description">
                                    <p>
                                        <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( strip_tags($_smarty_tpl->tpl_vars['post']->value['short_description']),120,'...' )),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                                    </p>
                                </div>
                            <?php } elseif ($_smarty_tpl->tpl_vars['post']->value['description']) {?>
                                <div class="blog_description">
                                    <p>
                                        <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( strip_tags($_smarty_tpl->tpl_vars['post']->value['description']),120,'...' )),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                                    </p>                               
                                </div>
                            <?php }?>
                            <a class="read_more" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['ets_blog_text_Readmore']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ets_blog_text_Readmore']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read More','mod'=>'ets_blog'),$_smarty_tpl ) );
}?></a>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if ($_smarty_tpl->tpl_vars['page']->value != 'home') {?>
                <div class="blog_view_all_button">
                    <a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['latest_link']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="view_all_link"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View all latest posts','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</a>
                </div>
            <?php }?>
        </div>
        <div class="clear"></div>
    </div>
<?php }
}
}
