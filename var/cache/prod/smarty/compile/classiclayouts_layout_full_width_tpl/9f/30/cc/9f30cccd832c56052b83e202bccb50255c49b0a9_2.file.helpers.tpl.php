<?php
/* Smarty version 3.1.43, created on 2022-06-23 15:07:22
  from '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/_partials/helpers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b4658ac66d59_12198490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f30cccd832c56052b83e202bccb50255c49b0a9' => 
    array (
      0 => '/var/www/vhosts/dreamsat.online/matar/themes/classic/templates/_partials/helpers.tpl',
      1 => 1655979592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b4658ac66d59_12198490 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'renderLogo' => 
  array (
    'compiled_filepath' => '/var/www/vhosts/dreamsat.online/matar/var/cache/prod/smarty/compile/classiclayouts_layout_full_width_tpl/9f/30/cc/9f30cccd832c56052b83e202bccb50255c49b0a9_2.file.helpers.tpl.php',
    'uid' => '9f30cccd832c56052b83e202bccb50255c49b0a9',
    'call_name' => 'smarty_template_function_renderLogo_22184309762b4658ac60a60_38158444',
  ),
));
?> 

<?php }
/* smarty_template_function_renderLogo_22184309762b4658ac60a60_38158444 */
if (!function_exists('smarty_template_function_renderLogo_22184309762b4658ac60a60_38158444')) {
function smarty_template_function_renderLogo_22184309762b4658ac60a60_38158444(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
">
    <img
      class="logo img-fluid"
      src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo_details']['src'], ENT_QUOTES, 'UTF-8');?>
"
      alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
      width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo_details']['width'], ENT_QUOTES, 'UTF-8');?>
"
      height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo_details']['height'], ENT_QUOTES, 'UTF-8');?>
">
  </a>
<?php
}}
/*/ smarty_template_function_renderLogo_22184309762b4658ac60a60_38158444 */
}
