<?php
/* Smarty version 3.1.32, created on 2022-03-16 19:57:28
  from '/var/www/sample/forum/themes/default/ajax_preview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_62324128da0c51_96505947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a9541776eae63b5ef8644c0d0e1592a34ff4d2' => 
    array (
      0 => '/var/www/sample/forum/themes/default/ajax_preview.tpl',
      1 => 1647460281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62324128da0c51_96505947 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax-preview-top"></div>
<div id="ajax-preview-main">
 <div id="ajax-preview-body">
  <img id="ajax-preview-close" src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/close.png" alt="[x]" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'close');?>
" />
  <div id="ajax-preview-content"></div>
 </div>
</div>
<?php }
}
