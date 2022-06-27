<?php
/* Smarty version 3.1.43, created on 2022-06-23 16:58:03
  from '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/blog_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b47f7b74e660_18142031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '916775934eca91513bdcddaafea509b61d0a11ae' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/modules/ets_blog/views/templates/hook/blog_list.tpl',
      1 => 1655989017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b47f7b74e660_18142031 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ets_blog_layout_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blog_layout']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 ets-blog-wrapper ets-blog-wrapper-blog-list<?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_AUTO_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_AUTO_LOAD']) {?> loadmore<?php }?> <?php if ($_smarty_tpl->tpl_vars['blog_latest']->value) {?>ets-page-latest<?php } elseif ($_smarty_tpl->tpl_vars['blog_category']->value) {?>ets-page-category<?php } elseif ($_smarty_tpl->tpl_vars['blog_search']->value) {?>ets-page-search<?php } elseif ($_smarty_tpl->tpl_vars['author']->value) {?>ets-page-author<?php } else { ?>ets-page-home<?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['blog_category']->value) {?>
        <?php if ((isset($_smarty_tpl->tpl_vars['blog_category']->value['enabled'])) && $_smarty_tpl->tpl_vars['blog_category']->value['enabled']) {?>
            <div class="blog-category <?php if ($_smarty_tpl->tpl_vars['blog_category']->value['image']) {?>has-blog-image<?php }?>">
                <?php if ($_smarty_tpl->tpl_vars['blog_category']->value['image']) {?>
                    <div class="ets_item_img">
                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_PS_ETS_BLOG_IMG_') ? constant('_PS_ETS_BLOG_IMG_') : null))."category/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blog_category']->value['image'],'htmlall','UTF-8' ))))), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blog_category']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blog_category']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" width="1920px" height="750px" />  
                    </div>
                <?php }?>
                <h1 class="page-heading product-listing"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blog_category']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</h1>            
                <?php if ($_smarty_tpl->tpl_vars['blog_category']->value['description']) {?>
                    <div class="blog-category-desc">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['blog_category']->value['description'] ));?>

                    </div>
                <?php }?>
            </div>
        <?php } else { ?>
            <p class="alert alert-warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This category is not available','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</p>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['blog_latest']->value) {?>
       <h1 class="page-heading product-listing"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Latest posts','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</h1>
    <?php } elseif ($_smarty_tpl->tpl_vars['blog_search']->value) {?>
        <h1 class="page-heading product-listing"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search: ','mod'=>'ets_blog'),$_smarty_tpl ) );?>
"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( ucfirst(str_replace('+',' ',$_smarty_tpl->tpl_vars['blog_search']->value)),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"</h1>
    <?php } elseif ($_smarty_tpl->tpl_vars['author']->value) {?>
        <?php if ((isset($_smarty_tpl->tpl_vars['author']->value['disabled'])) && $_smarty_tpl->tpl_vars['author']->value['disabled']) {?>
            <p class="alert alert-warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This author is not available','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</p>
        <?php } else { ?>
            <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_AUTHOR_INFORMATION'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_AUTHOR_INFORMATION']) {?>
                
                <?php if ((isset($_smarty_tpl->tpl_vars['author']->value['description'])) && $_smarty_tpl->tpl_vars['author']->value['description']) {?>
                    <div class="ets-block-author ets-block-author-avata">
                        <?php if ($_smarty_tpl->tpl_vars['author']->value['avata']) {?>
                            <div class="avata_img">
                                <img class="avata" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_PS_ETS_BLOG_IMG_') ? constant('_PS_ETS_BLOG_IMG_') : null))."avata/".((string)(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['author']->value['avata'],'html','UTF-8' ))))), ENT_QUOTES, 'UTF-8');?>
"/>
                            </div>
                        <?php }?>
                        <div class="ets-des-and-author">
                            <div class="ets-author-name">
                                <h1 class="page-heading product-listing">
                                    <a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['author']->value['author_link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Author','mod'=>'ets_blog'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['author']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                                    </a>
                                </h1>
                            </div>
                            <?php if ((isset($_smarty_tpl->tpl_vars['author']->value['description'])) && $_smarty_tpl->tpl_vars['author']->value['description']) {?>
                                <div class="ets-author-description">
                                    <?php echo $_smarty_tpl->tpl_vars['author']->value['description'];?>

                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="ets-author-name">
                        <h1 class="page-heading product-listing">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Author','mod'=>'ets_blog'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['author']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

                        </h1>
                    </div>
                <?php }?>
            <?php } else { ?>
            <h1 class="page-heading product-listing"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Author: ','mod'=>'ets_blog'),$_smarty_tpl ) );?>
"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['author']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"</h1>
            <?php }?>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['month']->value) {?>
        <h1 class="page-heading product-listing"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Posted in: ','mod'=>'ets_blog'),$_smarty_tpl ) );?>
"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['month']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"</h1>
    <?php } elseif ($_smarty_tpl->tpl_vars['year']->value) {?>
        <h1 class="page-heading product-listing"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Posted in: ','mod'=>'ets_blog'),$_smarty_tpl ) );?>
"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['year']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"</h1>
    <?php }?>
    <?php if (!($_smarty_tpl->tpl_vars['blog_category']->value && (!(isset($_smarty_tpl->tpl_vars['blog_category']->value['enabled'])) || (isset($_smarty_tpl->tpl_vars['blog_category']->value['enabled'])) && !$_smarty_tpl->tpl_vars['blog_category']->value['enabled'])) && ($_smarty_tpl->tpl_vars['blog_category']->value || $_smarty_tpl->tpl_vars['blog_search']->value || $_smarty_tpl->tpl_vars['author']->value || $_smarty_tpl->tpl_vars['is_main_page']->value || $_smarty_tpl->tpl_vars['blog_latest']->value || $_smarty_tpl->tpl_vars['month']->value || $_smarty_tpl->tpl_vars['year']->value) && (!$_smarty_tpl->tpl_vars['author']->value || ($_smarty_tpl->tpl_vars['author']->value && !(isset($_smarty_tpl->tpl_vars['author']->value['disabled']))))) {?>
        <?php if ((isset($_smarty_tpl->tpl_vars['blog_posts']->value)) && $_smarty_tpl->tpl_vars['blog_posts']->value) {?>
            <ul class="ets-blog-list row <?php if ($_smarty_tpl->tpl_vars['is_main_page']->value) {?>blog-main-page<?php }?>">
                <?php $_smarty_tpl->_assignInScope('first_post', true);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blog_posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>            
                    <li>                         
                        <div class="post-wrapper">
                            <?php if ($_smarty_tpl->tpl_vars['is_main_page']->value && $_smarty_tpl->tpl_vars['first_post']->value && ($_smarty_tpl->tpl_vars['blog_layout']->value == 'large_list' || $_smarty_tpl->tpl_vars['blog_layout']->value == 'large_grid')) {?>
                                <?php if ($_smarty_tpl->tpl_vars['post']->value['image']) {?>
                                    <a class="ets_item_img<?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?> ets_item_img_ladyload<?php }?>" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                        <img title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" src="<?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_MODULE_DIR_') ? constant('_MODULE_DIR_') : null))."ets_blog/views/img/bg-grey.png"),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?> data-original="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="lazyload"<?php }?> />
                                        <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?>
                                         <svg width="<?php echo htmlspecialchars(Configuration::get(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( 'ETS_BLOG_IMAGE_BLOG_WIDTH','html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars(Configuration::get(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( 'ETS_BLOG_IMAGE_BLOG_HEIGHT','html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" style="width: 100%;height: auto">
                                         </svg>
                                         <?php }?>
                                    </a>                              
                                <?php } elseif ($_smarty_tpl->tpl_vars['post']->value['thumb']) {?>
                                    <a class="ets_item_img<?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?> ets_item_img_ladyload<?php }?>" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                        <img title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" src="<?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_MODULE_DIR_') ? constant('_MODULE_DIR_') : null))."ets_blog/views/img/bg-grey.png"),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['thumb'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?> data-original="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['thumb'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="lazyload"<?php }?> />
                                        <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?>
                                         <svg width="<?php echo htmlspecialchars(Configuration::get(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( 'ETS_BLOG_IMAGE_BLOG_THUMB_WIDTH','html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars(Configuration::get(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( 'ETS_BLOG_IMAGE_BLOG_THUMB_HEIGHT','html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" style="width: 100%;height: auto">
                                         </svg>
                                         <?php }?>
                                    </a>
                                <?php }?>
                                <?php $_smarty_tpl->_assignInScope('first_post', false);?>
                            <?php } elseif ($_smarty_tpl->tpl_vars['post']->value['thumb']) {?>
                                <a class="ets_item_img<?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?> ets_item_img_ladyload<?php }?>" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                                    <img title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" src="<?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)(defined('_MODULE_DIR_') ? constant('_MODULE_DIR_') : null))."ets_blog/views/img/bg-grey.png"),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['thumb'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
}?>" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?> data-original="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['thumb'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="lazyload"<?php }?> />
                                    <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_LAZY_LOAD']) {?>
                                         <svg width="<?php echo htmlspecialchars(Configuration::get(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( 'ETS_BLOG_IMAGE_BLOG_THUMB_WIDTH','html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars(Configuration::get(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( 'ETS_BLOG_IMAGE_BLOG_THUMB_HEIGHT','html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
" style="width: 100%;height: auto">
                                         </svg>
                                         <?php }?>
                                </a>
                            <?php }?>
                            <div class="ets-blog-wrapper-content">
                            <div class="ets-blog-wrapper-content-main">
                                <a class="ets_title_block" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a>
                                <?php if ($_smarty_tpl->tpl_vars['show_categories']->value && $_smarty_tpl->tpl_vars['post']->value['categories']) {?>
                                    <div class="ets-blog-sidear-post-meta"> 
                                        <?php if (!$_smarty_tpl->tpl_vars['date_format']->value) {
$_smarty_tpl->_assignInScope('date_format', 'F jS Y');
}?>
                                        <?php if ($_smarty_tpl->tpl_vars['show_categories']->value && $_smarty_tpl->tpl_vars['post']->value['categories']) {?>
                                            <div class="ets-blog-categories">
                                                <?php $_smarty_tpl->_assignInScope('ik', 0);?>
                                                <?php $_smarty_tpl->_assignInScope('totalCat', count($_smarty_tpl->tpl_vars['post']->value['categories']));?>
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
</a><?php if ($_smarty_tpl->tpl_vars['ik']->value < $_smarty_tpl->tpl_vars['totalCat']->value) {?>, <?php }?>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </div>
                                        <?php }?>
                                    </div> 
                                <?php }?>
                                <div class="ets-blog-latest-toolbar">	
                                    <?php if ($_smarty_tpl->tpl_vars['allow_rating']->value && $_smarty_tpl->tpl_vars['post']->value['total_review']) {?>
                                         <div class="blog_rating_wrapper">
                                             <span class="total_views" ><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['post']->value['total_review']), ENT_QUOTES, 'UTF-8');?>
</span>
                                             <span>
                                                <?php if ($_smarty_tpl->tpl_vars['post']->value['total_review'] != 1) {?>
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Comments','mod'=>'ets_blog'),$_smarty_tpl ) );?>

                                                <?php } else { ?>
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Comment','mod'=>'ets_blog'),$_smarty_tpl ) );?>

                                                <?php }?>
                                            </span>
                                            <?php if ($_smarty_tpl->tpl_vars['allow_rating']->value && (isset($_smarty_tpl->tpl_vars['post']->value['everage_rating'])) && $_smarty_tpl->tpl_vars['post']->value['everage_rating']) {?>
                                                <?php $_smarty_tpl->_assignInScope('everage_rating', $_smarty_tpl->tpl_vars['post']->value['everage_rating']);?>
                                                <div class="blog-extra-item be-rating-block item">
                                                    <div class="blog_rating_wrapper">
                                                        <div class="ets_blog_review" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Average rating','mod'=>'ets_blog'),$_smarty_tpl ) );?>
">
                                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['everage_rating']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['everage_rating']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                                <?php if ($_smarty_tpl->tpl_vars['i']->value <= $_smarty_tpl->tpl_vars['everage_rating']->value) {?>
                                                                    <div class="star star_on"></div>
                                                                <?php } else { ?>
                                                                    <div class="star star_on_<?php echo htmlspecialchars(($_smarty_tpl->tpl_vars['i']->value-$_smarty_tpl->tpl_vars['everage_rating']->value)*intval(10), ENT_QUOTES, 'UTF-8');?>
"></div>
                                                                <?php }?>
                                                            <?php }
}
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['everage_rating']->value < 5) {?>
                                                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - ($_smarty_tpl->tpl_vars['everage_rating']->value+1) : $_smarty_tpl->tpl_vars['everage_rating']->value+1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['everage_rating']->value+1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                                    <div class="star"></div>
                                                                <?php }
}
?>
                                                            <?php }?>
                                                            (<span class="ets-blog-rating-value" ><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( number_format((float)$_smarty_tpl->tpl_vars['everage_rating']->value,1,'.',''),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>)
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?> 
                                         </div>
                                    <?php }?>                    
                                </div>
                                <div class="blog_description">
                                     <?php if ($_smarty_tpl->tpl_vars['post']->value['short_description']) {?>
                                        <p><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( strip_tags($_smarty_tpl->tpl_vars['post']->value['short_description']),500,'...' )),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</p>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['post']->value['description']) {?>
                                        <p><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( strip_tags($_smarty_tpl->tpl_vars['post']->value['description']),500,'...' )),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</p>
                                    <?php }?>                                  
                                </div>
                                <a class="read_more" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_TEXT_READMORE']) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_TEXT_READMORE'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read More','mod'=>'ets_blog'),$_smarty_tpl ) );
}?></a>
                              </div>
                            </div>
                        </div>
                    </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if ($_smarty_tpl->tpl_vars['blog_paggination']->value) {?>
                <div class="blog-paggination">
                    <?php echo $_smarty_tpl->tpl_vars['blog_paggination']->value;?>

                </div>
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_AUTO_LOAD'])) && $_smarty_tpl->tpl_vars['ets_blog_config']->value['ETS_BLOG_AUTO_LOAD']) {?>
                <div class="ets_blog_loading">
                    <span id="squaresWaveG">
                        <span id="squaresWaveG_1" class="squaresWaveG"></span>
                        <span id="squaresWaveG_2" class="squaresWaveG"></span>
                        <span id="squaresWaveG_3" class="squaresWaveG"></span>
                        <span id="squaresWaveG_4" class="squaresWaveG"></span>
                        <span id="squaresWaveG_5" class="squaresWaveG"></span>
                    </span>
                </div>
                <div class="clearfix"></div>
            <?php }?>
        <?php } else { ?>
            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No posts found','mod'=>'ets_blog'),$_smarty_tpl ) );?>
</p>
        <?php }?>
    <?php }?>
</div><?php }
}
