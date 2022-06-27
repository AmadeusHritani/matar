<?php
/* Smarty version 3.1.43, created on 2022-06-23 16:58:03
  from 'module:etsblogviewstemplatesfron' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b47f7b7a9a45_19054529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4021e7125d808924f9313702d292303e9725dd52' => 
    array (
      0 => 'module:etsblogviewstemplatesfron',
      1 => 1655989017,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b47f7b7a9a45_19054529 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_131532865662b47f7b7a8c42_48311675', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "page.tpl");
}
/* {block "content"} */
class Block_131532865662b47f7b7a8c42_48311675 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_131532865662b47f7b7a8c42_48311675',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
        <div class="ets_blog_sidebar ">
            <?php echo $_smarty_tpl->tpl_vars['blog_left_sidebar']->value;?>

        </div>
    </div>
    <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-9">
        <?php echo $_smarty_tpl->tpl_vars['blog_content']->value;?>

    </div>
<?php
}
}
/* {/block "content"} */
}
