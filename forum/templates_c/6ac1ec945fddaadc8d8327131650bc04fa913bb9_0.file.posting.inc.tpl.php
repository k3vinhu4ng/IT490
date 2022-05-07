<?php
/* Smarty version 3.1.32, created on 2022-03-16 19:59:19
  from '/var/www/sample/forum/themes/default/subtemplates/posting.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_62324197bc5428_24644098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ac1ec945fddaadc8d8327131650bc04fa913bb9' => 
    array (
      0 => '/var/www/sample/forum/themes/default/subtemplates/posting.inc.tpl',
      1 => 1647460281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62324197bc5428_24644098 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/sample/forum/modules/smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "posting", 0);
?>

<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "thread_entry", 0);
?>

<?php if ($_smarty_tpl->tpl_vars['captcha']->value) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "captcha", 0);
}
if ($_smarty_tpl->tpl_vars['no_authorisation']->value) {?>
<p class="caution"><?php echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['no_authorisation']->value),"[minutes]",$_smarty_tpl->tpl_vars['settings']->value['edit_period']);?>
</p>
<?php if ($_smarty_tpl->tpl_vars['text']->value) {?>
<textarea onfocus="this.select()" onclick="this.select()" readonly="readonly" cols="80" rows="21" name="text"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</textarea>
<?php }
} else { ?>
<h1><?php if ($_smarty_tpl->tpl_vars['posting_mode']->value == 0 && $_smarty_tpl->tpl_vars['id']->value == 0) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'new_topic_hl');
} elseif ($_smarty_tpl->tpl_vars['posting_mode']->value == 0 && $_smarty_tpl->tpl_vars['id']->value > 0) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'reply_hl');
} elseif ($_smarty_tpl->tpl_vars['posting_mode']->value == 1) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'edit_hl');
}?></h1>
<?php if ($_smarty_tpl->tpl_vars['posting_mode']->value == 0 && $_smarty_tpl->tpl_vars['id']->value > 0 && $_smarty_tpl->tpl_vars['name_repl_subnav']->value) {?>
<p id="reply-to"><?php echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'reply_to_posting_marking'),"[name]",$_smarty_tpl->tpl_vars['name_repl_subnav']->value);?>
</p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
<p class="caution"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'error_headline');?>
</p>
<ul style="margin-bottom:25px;">
<?php
$__section_mysec_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['errors']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_mysec_0_total = $__section_mysec_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_mysec'] = new Smarty_Variable(array());
if ($__section_mysec_0_total !== 0) {
for ($__section_mysec_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index'] = 0; $__section_mysec_0_iteration <= $__section_mysec_0_total; $__section_mysec_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index']++){
?>
<li><?php $_smarty_tpl->_assignInScope('error', $_smarty_tpl->tpl_vars['errors']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index'] : null)]);
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['error']->value),"[text_length]",$_smarty_tpl->tpl_vars['text_length']->value),"[text_maxlength]",$_smarty_tpl->tpl_vars['settings']->value['text_maxlength']),"[word]",$_smarty_tpl->tpl_vars['word']->value),"[minutes]",$_smarty_tpl->tpl_vars['minutes']->value),"[not_accepted_word]",$_smarty_tpl->tpl_vars['not_accepted_word']->value),"[not_accepted_words]",$_smarty_tpl->tpl_vars['not_accepted_words']->value);?>
</li>
<?php
}
}
?>
</ul>
<?php } elseif (isset($_smarty_tpl->tpl_vars['minutes_left_to_edit']->value)) {?>
<p class="caution"><?php if ($_smarty_tpl->tpl_vars['settings']->value['user_edit_if_no_replies'] == 1) {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'minutes_left_to_edit_reply'),"[minutes]",$_smarty_tpl->tpl_vars['minutes_left_to_edit']->value);
} else {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'minutes_left_to_edit'),"[minutes]",$_smarty_tpl->tpl_vars['minutes_left_to_edit']->value);
}?></p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['preview']->value) {
if ($_smarty_tpl->tpl_vars['preview_hp']->value && !$_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->_assignInScope('email_hp', " <a href=\"".((string)$_smarty_tpl->tpl_vars['preview_hp']->value)."\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/homepage.png\" alt=\"".((string)$_smarty_tpl->tpl_vars['homepage_alt']->value)."\" width=\"13\" height=\"13\" /></a>");
} elseif (!$_smarty_tpl->tpl_vars['preview_hp']->value && $_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->_assignInScope('email_hp', " <a href=\"index.php?mode=contact&amp;id=".((string)$_smarty_tpl->tpl_vars['id']->value)."\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/email.png\" alt=\"".((string)$_smarty_tpl->tpl_vars['email_alt']->value)."\" width=\"13\" height=\"10\" /></a>");
} elseif ($_smarty_tpl->tpl_vars['preview_hp']->value && $_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->_assignInScope('email_hp', " <a href=\"".((string)$_smarty_tpl->tpl_vars['preview_hp']->value)."\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/homepage.png\" alt=\"".((string)$_smarty_tpl->tpl_vars['homepage_alt']->value)."\" width=\"13\" height=\"13\" /></a> <a href=\"index.php?mode=contact&amp;id=".((string)$_smarty_tpl->tpl_vars['id']->value)."\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/email.png\" alt=\"".((string)$_smarty_tpl->tpl_vars['email_alt']->value)."\" width=\"13\" height=\"10\" /></a>");
} else {
$_smarty_tpl->_assignInScope('email_hp', '');
}?>
<h3 class="preview"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'preview_headline');?>
</h3>
<div class="preview">
<div class="posting">
<h1 class="postingheadline"><?php echo $_smarty_tpl->tpl_vars['preview_subject']->value;
if ($_smarty_tpl->tpl_vars['category_name']->value) {?> <span class="category">(<?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
)</span><?php }?></h1>
<p class="author"><?php if ($_smarty_tpl->tpl_vars['preview_location']->value) {
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posted_by_location'),"[name]",$_smarty_tpl->tpl_vars['preview_name']->value),"[email_hp]",$_smarty_tpl->tpl_vars['email_hp']->value),"[location]",$_smarty_tpl->tpl_vars['preview_location']->value),"[time]",$_smarty_tpl->tpl_vars['preview_formated_time']->value);
} else {
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posted_by'),"[name]",$_smarty_tpl->tpl_vars['preview_name']->value),"[email_hp]",$_smarty_tpl->tpl_vars['email_hp']->value),"[time]",$_smarty_tpl->tpl_vars['preview_formated_time']->value);
}?></p>
<?php if ($_smarty_tpl->tpl_vars['preview_text']->value) {
echo $_smarty_tpl->tpl_vars['preview_text']->value;
} else { ?><p><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_text');?>
</p><?php }
if ($_smarty_tpl->tpl_vars['preview_signature']->value && $_smarty_tpl->tpl_vars['show_signature']->value == 1) {?>
<p class="signature">---<br />
<?php echo $_smarty_tpl->tpl_vars['preview_signature']->value;?>
</p>
<?php }?>
</div>
</div>
<?php }?>
<form action="index.php" method="post" id="postingform" accept-charset="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'charset');?>
">
<div>
<input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['CSRF_TOKEN']->value;?>
" />
<input type="hidden" name="back" value="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" />
<input type="hidden" name="mode" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
<input type="hidden" name="uniqid" value="<?php echo $_smarty_tpl->tpl_vars['uniqid']->value;?>
" />
<input type="hidden" name="posting_mode" value="<?php echo $_smarty_tpl->tpl_vars['posting_mode']->value;?>
" />
<?php if ($_smarty_tpl->tpl_vars['session']->value) {?>
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['session']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['session']->value['id'];?>
" />
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['quote']->value) {?>
<input type="hidden" id="quote" value="true" />
<?php }
if ($_smarty_tpl->tpl_vars['form_type']->value == 0) {?>
<input type="hidden" id="name_required" value="true" />
<?php }
if (!$_smarty_tpl->tpl_vars['settings']->value['empty_postings_possible']) {?>
<input type="hidden" id="text_required" value="true" />
<?php }
if ($_smarty_tpl->tpl_vars['terms_of_use_agreement']->value) {?>
<input type="hidden" id="terms_of_use_required" value="true" />
<?php }
if ($_smarty_tpl->tpl_vars['data_privacy_agreement']->value) {?>
<input type="hidden" id="data_privacy_agreement_required" value="true" />
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['form_type']->value == 0) {?>
<fieldset>

<p>
<label for="name" class="input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'name_marking');?>
</label>
<input id="name" type="text" size="40" name="<?php echo $_smarty_tpl->tpl_vars['fld_user_name']->value;?>
" value="<?php if ($_smarty_tpl->tpl_vars['name']->value) {
echo $_smarty_tpl->tpl_vars['name']->value;
}?>" maxlength="<?php echo $_smarty_tpl->tpl_vars['settings']->value['username_maxlength'];?>
"  tabindex="1" />
</p>

<p>
<label for="email" class="input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'email_marking');?>
</label>
<input id="email" type="text" size="40" name="<?php echo $_smarty_tpl->tpl_vars['fld_user_email']->value;?>
" value="<?php if ($_smarty_tpl->tpl_vars['email']->value) {
echo $_smarty_tpl->tpl_vars['email']->value;
}?>" maxlength="<?php echo $_smarty_tpl->tpl_vars['settings']->value['email_maxlength'];?>
" tabindex="2" />&nbsp;<span class="xsmall"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'optional_email');?>
</span>
</p>

<p class="hp">
<label for="repeat_email" class="main"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'honeypot_field_marking');?>
</label>
<input id="repeat_email" type="text" size="40" name="<?php echo $_smarty_tpl->tpl_vars['fld_repeat_email']->value;?>
" value="<?php if ($_smarty_tpl->tpl_vars['honey_pot_email']->value) {
echo $_smarty_tpl->tpl_vars['honey_pot_email']->value;
}?>" maxlength="<?php echo $_smarty_tpl->tpl_vars['settings']->value['email_maxlength'];?>
" tabindex="-1" />
</p>

<p>
<label for="hp" class="input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'hp_marking');?>
</label>
<input id="hp" type="text" size="40" name="<?php echo $_smarty_tpl->tpl_vars['fld_hp']->value;?>
" value="<?php if ($_smarty_tpl->tpl_vars['hp']->value) {
echo $_smarty_tpl->tpl_vars['hp']->value;
}?>" maxlength="<?php echo $_smarty_tpl->tpl_vars['settings']->value['hp_maxlength'];?>
" tabindex="3" />&nbsp;<span class="xsmall"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'optional');?>
</span>
</p>

<p class="hp">
<label for="phone" class="main"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'honeypot_field_marking');?>
</label>
<input id="phone" class="login" type="text" size="30" name="<?php echo $_smarty_tpl->tpl_vars['fld_phone']->value;?>
" value="<?php if ($_smarty_tpl->tpl_vars['honey_pot_phone']->value) {
echo $_smarty_tpl->tpl_vars['honey_pot_phone']->value;
}?>" maxlength="35" tabindex="-1" />
</p>

<p>
<label for="location" class="input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'location_marking');?>
</label>
<input id="location" type="text" size="40" name="<?php echo $_smarty_tpl->tpl_vars['fld_location']->value;?>
" value="<?php if ($_smarty_tpl->tpl_vars['location']->value) {
echo $_smarty_tpl->tpl_vars['location']->value;
}?>" maxlength="<?php echo $_smarty_tpl->tpl_vars['settings']->value['location_maxlength'];?>
" tabindex="4" />&nbsp;<span class="xsmall"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'optional');?>
</span>
</p>

<?php if ($_smarty_tpl->tpl_vars['settings']->value['remember_userdata'] == 1 && $_smarty_tpl->tpl_vars['posting_mode']->value == 0 && !$_smarty_tpl->tpl_vars['user']->value) {?>
<p>
<input id="setcookie" class="checkbox" type="checkbox" name="setcookie" value="1"<?php if ($_smarty_tpl->tpl_vars['setcookie']->value) {?> checked="checked"<?php }?> />&nbsp;<label for="setcookie"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'remember_userdata_marking');?>
</label><?php if ($_smarty_tpl->tpl_vars['cookie']->value) {?> &nbsp;<span id="delete_cookie"><a href="index.php?mode=delete_cookie"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'delete_cookie_linkname');?>
</a></span><?php }?>
</p>
<?php }?>

</fieldset>
<?php }?>

<fieldset>
<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
	<p><label for="p_category" class="input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'category_marking');?>
</label>
	<select id="p_category" size="1" name="p_category" tabindex="5"<?php if ($_smarty_tpl->tpl_vars['posting_mode']->value == 0 && $_smarty_tpl->tpl_vars['id']->value > 0 || $_smarty_tpl->tpl_vars['posting_mode']->value == 1 && $_smarty_tpl->tpl_vars['pid']->value > 0) {?> disabled="disabled"<?php }?>>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['key']->value != 0) {?><option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == $_smarty_tpl->tpl_vars['p_category']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option><?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</select></p>
	<?php if ($_smarty_tpl->tpl_vars['posting_mode']->value == 0 && $_smarty_tpl->tpl_vars['id']->value > 0 || $_smarty_tpl->tpl_vars['posting_mode']->value == 1 && $_smarty_tpl->tpl_vars['pid']->value > 0) {?>
		<input type="hidden" name="p_category" value="<?php echo $_smarty_tpl->tpl_vars['p_category']->value;?>
" />
	<?php }
}?>

<p><label for="subject" class="input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'subject_marking');?>
</label>
<input id="subject" type="text" size="50" name="<?php echo $_smarty_tpl->tpl_vars['fld_subject']->value;?>
" value="<?php if ($_smarty_tpl->tpl_vars['subject']->value) {
echo $_smarty_tpl->tpl_vars['subject']->value;
}?>" maxlength="<?php echo $_smarty_tpl->tpl_vars['settings']->value['subject_maxlength'];?>
" tabindex="6" />
</p>

<?php if (($_smarty_tpl->tpl_vars['admin']->value || $_smarty_tpl->tpl_vars['mod']->value) && $_smarty_tpl->tpl_vars['settings']->value['tags']) {?>
<p>
<label for="tags" class="input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'tags_marking');?>
</label>
<input id="tags" type="text" size="50" name="tags" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tags']->value)===null||$tmp==='' ? '' : $tmp);?>
" maxlength="253" tabindex="-1" />&nbsp;<span class="xsmall"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'tags_note');?>
</span>
</p>
<?php }?>
</fieldset>

<fieldset id="message">
<label for="text" class="textarea"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'message_marking');?>
</label><br />

<textarea id="text" cols="80" rows="21" name="text" tabindex="7"><?php if ($_smarty_tpl->tpl_vars['text']->value) {
echo $_smarty_tpl->tpl_vars['text']->value;
}?></textarea>

<div id="format-bar">
<?php if ($_smarty_tpl->tpl_vars['settings']->value['bbcode']) {?>
<div id="bbcode-bar">
</div>
<?php if ($_smarty_tpl->tpl_vars['settings']->value['smilies'] && $_smarty_tpl->tpl_vars['smilies']->value) {?>
<div id="smiley-bar">
</div>
<?php }?>

<dl id="bbcode-instructions">
<dt id="b" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_bold_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_bold_title');?>
</dt>
<dd><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_bold_instruction');?>
</dd>
<dt id="i" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_italic_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_italic_title');?>
</dt>
<dd><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_italic_instruction');?>
</dd>
<dt id="link" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_link_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_link_title');?>
</dt>
<dd><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_link_instruction');?>
</dd>
<?php if ($_smarty_tpl->tpl_vars['settings']->value['bbcode_color']) {?>
<dt id="color" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_color_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_color_title');?>
</dt>
<dd><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_color_instruction');?>
</dd>
<?php }
if ($_smarty_tpl->tpl_vars['settings']->value['bbcode_size']) {?>
<dt id="size" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_size_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_size_title');?>
</dt>
<dd id="small" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_size_label_small');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_size_instruction_small');?>
</dd>
<dd id="large" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_size_label_large');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_size_instruction_large');?>
</dd>
<?php }?>
<dt id="list" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_list_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_list_title');?>
</dt>
<dd><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_list_instruction');?>
</dd>
<?php if ($_smarty_tpl->tpl_vars['settings']->value['bbcode_img']) {?>
<dt id="img" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_title');?>
</dt>
<dd title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_label_default');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_instr_default');?>
</dd>
<dd id="left" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_label_left');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_instr_left');?>
</dd>
<dd id="right" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_label_right');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_instr_right');?>
</dd>
<dd id="thumbnail" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_label_thumb');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_instr_thumb');?>
</dd>
<dd id="thumbnail-left" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_label_thumb_left');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_instr_thumb_left');?>
</dd>
<dd id="thumbnail-right" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_label_thumb_right');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_image_instr_thumb_right');?>
</dd>
<?php }
if ($_smarty_tpl->tpl_vars['upload_images']->value) {?>
<dt id="upload" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_upload_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_upload_title');?>
</dt>
<dd><a href="index.php?mode=upload_image"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_upload_instruction');?>
</a></dd>
<?php }
if ($_smarty_tpl->tpl_vars['settings']->value['bbcode_flash']) {?>
<dt id="flash" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_flash_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_flash_title');?>
</dt>
<dd><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_flash_instruction');?>
</dd>
<?php }
if ($_smarty_tpl->tpl_vars['settings']->value['bbcode_tex']) {?>
<dt id="tex" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_tex_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_tex_title');?>
</dt>
<dd><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_tex_instruction');?>
</dd>
<?php }
if ($_smarty_tpl->tpl_vars['settings']->value['bbcode_code']) {?>
<dt id="code" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_label');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_title');?>
</dt>
<dd id="inlinecode" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_label_inline');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_instruction_inline');?>
</dd>
<dd title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_label_general');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_instruction_general');?>
</dd>
<?php if ($_smarty_tpl->tpl_vars['code_languages']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['code_languages']->value, 'code_language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['code_language']->value) {
?>
<dd id="<?php echo $_smarty_tpl->tpl_vars['code_language']->value;?>
" title="<?php echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_label_specific'),"[language]",$_smarty_tpl->tpl_vars['code_language']->value);?>
"><?php echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bbcode_code_instruction_spec'),"[language]",$_smarty_tpl->tpl_vars['code_language']->value);?>
</dd>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}?>
</dl>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['settings']->value['smilies'] && $_smarty_tpl->tpl_vars['smilies']->value) {?>
<dl id="smiley-instructions">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['smilies']->value, 'smiley', false, NULL, 'smilies', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['smiley']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_smilies']->value['index']++;
?>
<dt class="<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_smilies']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_smilies']->value['index'] : null) < 6) {?>default<?php } else { ?>additional<?php }?>" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'insert_smiley_title');?>
"><?php echo $_smarty_tpl->tpl_vars['smiley']->value['code'];?>
</dt>
<dd><img src="images/smilies/<?php echo $_smarty_tpl->tpl_vars['smiley']->value['file'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['smiley']->value['code'];?>
" /></dd>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</dl>
<?php }?>

</div>
</fieldset>

<?php if ($_smarty_tpl->tpl_vars['signature']->value || $_smarty_tpl->tpl_vars['provide_email_notification']->value || $_smarty_tpl->tpl_vars['provide_sticky']->value || $_smarty_tpl->tpl_vars['terms_of_use_agreement']->value || $_smarty_tpl->tpl_vars['data_privacy_agreement']->value) {?>
<fieldset>
<?php if ($_smarty_tpl->tpl_vars['signature']->value) {?>
<p>
<input id="show_signature" type="checkbox" name="show_signature" value="1"<?php if ($_smarty_tpl->tpl_vars['show_signature']->value && $_smarty_tpl->tpl_vars['show_signature']->value == 1) {?> checked="checked"<?php }?> />&nbsp;<label for="show_signature"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'show_signature_marking');?>
</label>
</p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['provide_email_notification']->value) {?>
<p>
<input id="email_notification" type="checkbox" name="email_notification" value="1"<?php if ($_smarty_tpl->tpl_vars['email_notification']->value && $_smarty_tpl->tpl_vars['email_notification']->value == 1) {?> checked="checked"<?php }?> />&nbsp;<label for="email_notification"><?php if ($_smarty_tpl->tpl_vars['id']->value == 0) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'email_notific_reply_thread');
} else {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'email_notific_reply_post');
}?></label>
</p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['provide_sticky']->value) {?>
<p>
<input id="sticky" type="checkbox" name="sticky" value="1"<?php if ($_smarty_tpl->tpl_vars['sticky']->value && $_smarty_tpl->tpl_vars['sticky']->value == 1) {?> checked="checked"<?php }?> />&nbsp;<label for="sticky"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'sticky_thread');?>
</label>
</p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['terms_of_use_agreement']->value) {
$_smarty_tpl->_assignInScope('terms_of_use_url', $_smarty_tpl->tpl_vars['settings']->value['terms_of_use_url']);?>
<p>
<input id="terms_of_use_agree" tabindex="8" type="checkbox" name="terms_of_use_agree" value="1"<?php if ($_smarty_tpl->tpl_vars['terms_of_use_agree']->value && $_smarty_tpl->tpl_vars['terms_of_use_agree']->value == 1) {?> checked="checked"<?php }?> />&nbsp;<label for="terms_of_use_agree"><?php if ($_smarty_tpl->tpl_vars['terms_of_use_url']->value) {
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'terms_of_use_agreement'),"[[","<a id=\"terms_of_use\" href=\"".((string)$_smarty_tpl->tpl_vars['terms_of_use_url']->value)."\">"),"]]","</a>");
} else {
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'terms_of_use_agreement'),"[[",''),"]]",'');
}?></label>
</p>
<?php }
if ($_smarty_tpl->tpl_vars['data_privacy_agreement']->value) {
$_smarty_tpl->_assignInScope('data_privacy_statement_url', $_smarty_tpl->tpl_vars['settings']->value['data_privacy_statement_url']);?>
<p>
<input id="data_privacy_statement_agree" tabindex="9" type="checkbox" name="data_privacy_statement_agree" value="1"<?php if ($_smarty_tpl->tpl_vars['data_privacy_statement_agree']->value && $_smarty_tpl->tpl_vars['data_privacy_statement_agree']->value == 1) {?> checked="checked"<?php }?> />&nbsp;<label for="data_privacy_statement_agree"><?php if ($_smarty_tpl->tpl_vars['data_privacy_statement_url']->value) {
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'data_privacy_agreement'),"[[","<a id=\"data_privacy_statement\" href=\"".((string)$_smarty_tpl->tpl_vars['data_privacy_statement_url']->value)."\">"),"]]","</a>");
} else {
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'data_privacy_agreement'),"[[",''),"]]",'');
}?></label>
</p>
<?php }?>
</fieldset>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['captcha']->value) {?>
<fieldset>
<legend><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_marking');?>
</legend>
<?php if ($_smarty_tpl->tpl_vars['captcha']->value['type'] == 2) {?>
<p><img class="captcha" src="modules/captcha/captcha_image.php?<?php echo $_smarty_tpl->tpl_vars['session']->value['name'];?>
=<?php echo $_smarty_tpl->tpl_vars['session']->value['id'];?>
" alt="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_image_alt');?>
" width="180" height="40" /><br />
<label for="captcha_code"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_expl_image');?>
</label><br />
<input id="captcha_code" type="text" name="captcha_code" value="" size="10" tabindex="9" /></p>
<?php } else { ?>
<p><label for="captcha_code"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_expl_math');?>
 <?php echo $_smarty_tpl->tpl_vars['captcha']->value['number_1'];?>
 + <?php echo $_smarty_tpl->tpl_vars['captcha']->value['number_2'];?>
 = </label><input id="captcha_code" type="text" name="captcha_code" value="" size="5" maxlength="5" tabindex="10" /></p>
<?php }?>
</fieldset>
<?php }?>

<fieldset>
<p><input type="submit" name="save_entry" value="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'message_submit_button');?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'message_submit_title');?>
" tabindex="11" />&nbsp;<input type="submit" name="preview" value="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'message_preview_button');?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'message_preview_title');?>
" tabindex="11" /> <img id="throbber-submit" class="js-visibility-hidden" src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/throbber_submit.gif" alt="" width="16" height="16" /></p>
</fieldset>

</div>
</form>
<?php }
}
}
