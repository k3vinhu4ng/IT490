<?php
/* Smarty version 3.1.32, created on 2022-03-17 14:42:56
  from '/var/www/sample/forum/themes/default/subtemplates/entry.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_623348f0862b39_03958760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '040601d58f00dea53638879d55e3326962e2d59c' => 
    array (
      0 => '/var/www/sample/forum/themes/default/subtemplates/entry.inc.tpl',
      1 => 1647460281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_623348f0862b39_03958760 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'tree' => 
  array (
    'compiled_filepath' => '/var/www/sample/forum/templates_c/040601d58f00dea53638879d55e3326962e2d59c_0.file.entry.inc.tpl.php',
    'uid' => '040601d58f00dea53638879d55e3326962e2d59c',
    'call_name' => 'smarty_template_function_tree_124173668623348f071e345_20653797',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/sample/forum/modules/smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "entry", 0);
?>

<?php $_smarty_tpl->_assignInScope('email_alt', $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'email'));
$_smarty_tpl->_assignInScope('homepage_alt', $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'homepage'));
if ($_smarty_tpl->tpl_vars['hp']->value && !$_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->_assignInScope('email_hp', " <a href=\"".((string)$_smarty_tpl->tpl_vars['hp']->value)."\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/homepage.png\" title=\"".((string)$_smarty_tpl->tpl_vars['homepage_alt']->value)."\" alt=\"⌂\" width=\"13\" height=\"13\" /></a>");
} elseif (!$_smarty_tpl->tpl_vars['hp']->value && $_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->_assignInScope('email_hp', " <a href=\"index.php?mode=contact&amp;id=".((string)$_smarty_tpl->tpl_vars['id']->value)."\" rel=\"nofollow\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/email.png\" title=\"".((string)$_smarty_tpl->tpl_vars['email_alt']->value)."\" alt=\"@\" width=\"13\" height=\"10\" /></a>");
} elseif ($_smarty_tpl->tpl_vars['hp']->value && $_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->_assignInScope('email_hp', " <a href=\"".((string)$_smarty_tpl->tpl_vars['hp']->value)."\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/homepage.png\" title=\"".((string)$_smarty_tpl->tpl_vars['homepage_alt']->value)."\" alt=\"⌂\" width=\"13\" height=\"13\" /></a> <a href=\"index.php?mode=contact&amp;id=".((string)$_smarty_tpl->tpl_vars['id']->value)."\" rel=\"nofollow\"><img src=\"".((string)$_smarty_tpl->tpl_vars['THEMES_DIR']->value)."/".((string)$_smarty_tpl->tpl_vars['theme']->value)."/images/email.png\" title=\"".((string)$_smarty_tpl->tpl_vars['email_alt']->value)."\" alt=\"@\" width=\"13\" height=\"10\" /></a>");
} else {
$_smarty_tpl->_assignInScope('email_hp', '');
}
if ($_smarty_tpl->tpl_vars['user_type']->value == 2) {
$_smarty_tpl->_assignInScope('admin_title', $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'administrator_title'));
$_smarty_tpl->_assignInScope('name', "<span class=\"admin registered_user\" title=\"".((string)$_smarty_tpl->tpl_vars['admin_title']->value)."\">".((string)$_smarty_tpl->tpl_vars['name']->value)."</span>");
} elseif ($_smarty_tpl->tpl_vars['user_type']->value == 1) {
$_smarty_tpl->_assignInScope('mod_title', $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'moderator_title'));
$_smarty_tpl->_assignInScope('name', "<span class=\"mod registered_user\" title=\"".((string)$_smarty_tpl->tpl_vars['mod_title']->value)."\">".((string)$_smarty_tpl->tpl_vars['name']->value)."</span>");
} elseif ($_smarty_tpl->tpl_vars['posting_user_id']->value > 0) {
$_smarty_tpl->_assignInScope('name', "<span class=\"registered_user\">".((string)$_smarty_tpl->tpl_vars['name']->value)."</span>");
} else {
$_smarty_tpl->_assignInScope('name', ((string)$_smarty_tpl->tpl_vars['name']->value));
}
if ($_smarty_tpl->tpl_vars['posting_user_id']->value > 0 && ($_smarty_tpl->tpl_vars['user']->value || $_smarty_tpl->tpl_vars['settings']->value['user_area_public'] == 1)) {
$_smarty_tpl->_assignInScope('name', "<a href=\"index.php?mode=user&amp;show_user=".((string)$_smarty_tpl->tpl_vars['posting_user_id']->value)."\">".((string)$_smarty_tpl->tpl_vars['name']->value)."</a>");
}?>
<div class="posting<?php if ($_smarty_tpl->tpl_vars['is_read']->value) {?> read<?php }?>"><?php if ($_smarty_tpl->tpl_vars['spam']->value) {?><p class="spam-note"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'spam_note');?>
</p><?php }
if ($_smarty_tpl->tpl_vars['avatar']->value) {?><img class="avatar" src="<?php echo $_smarty_tpl->tpl_vars['avatar']->value['image'];?>
" alt="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'avatar_img_alt');?>
" width="<?php echo $_smarty_tpl->tpl_vars['avatar']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['avatar']->value['height'];?>
" /><?php }?>
<h1><?php echo $_smarty_tpl->tpl_vars['subject']->value;
if ($_smarty_tpl->tpl_vars['category_name']->value) {?> <span class="category">(<?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
)</span><?php }?></h1>
<p class="author"><?php if ($_smarty_tpl->tpl_vars['location']->value) {
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posted_by_location'),"[name]",$_smarty_tpl->tpl_vars['name']->value),"[email_hp]",$_smarty_tpl->tpl_vars['email_hp']->value),"[location]",$_smarty_tpl->tpl_vars['location']->value),"[time]",$_smarty_tpl->tpl_vars['formated_time']->value);
} else {
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posted_by'),"[name]",$_smarty_tpl->tpl_vars['name']->value),"[email_hp]",$_smarty_tpl->tpl_vars['email_hp']->value),"[time]",$_smarty_tpl->tpl_vars['formated_time']->value);
}?> <span class="ago">(<?php if ($_smarty_tpl->tpl_vars['ago']->value['days'] > 1) {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posting_several_days_ago'),"[days]",$_smarty_tpl->tpl_vars['ago']->value['days_rounded']);
} else {
if ($_smarty_tpl->tpl_vars['ago']->value['days'] == 0 && $_smarty_tpl->tpl_vars['ago']->value['hours'] == 0) {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posting_minutes_ago'),"[minutes]",$_smarty_tpl->tpl_vars['ago']->value['minutes']);
} elseif ($_smarty_tpl->tpl_vars['ago']->value['days'] == 0 && $_smarty_tpl->tpl_vars['ago']->value['hours'] != 0) {
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posting_hours_ago'),"[hours]",$_smarty_tpl->tpl_vars['ago']->value['hours']),"[minutes]",$_smarty_tpl->tpl_vars['ago']->value['minutes']);
} else {
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posting_one_day_ago'),"[hours]",$_smarty_tpl->tpl_vars['ago']->value['hours']),"[minutes]",$_smarty_tpl->tpl_vars['ago']->value['minutes']);
}
}?>)</span><?php if ($_smarty_tpl->tpl_vars['admin']->value && $_smarty_tpl->tpl_vars['ip']->value) {?> <span class="ip">(<?php echo $_smarty_tpl->tpl_vars['ip']->value;?>
)</span><?php }
if ($_smarty_tpl->tpl_vars['pid']->value != 0) {?> <span class="op-link"><a href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" title="<?php echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'original_posting_linktitle'),"[name]",$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['pid']->value]['name']);?>
">@ <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['pid']->value]['name'];?>
</a></span><?php }
if ($_smarty_tpl->tpl_vars['edited']->value) {?><br />
<span class="edited"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'edited_by'),"[name]",$_smarty_tpl->tpl_vars['edited_by']->value),"[time]",$_smarty_tpl->tpl_vars['formated_edit_time']->value);?>
</span><?php }?></p>
<?php if ($_smarty_tpl->tpl_vars['posting']->value) {
echo $_smarty_tpl->tpl_vars['posting']->value;?>

<?php } else { ?>
<p><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_text');?>
</p>
<?php }
if ($_smarty_tpl->tpl_vars['signature']->value) {?>
<p class="signature">--<br />
<?php echo $_smarty_tpl->tpl_vars['signature']->value;?>
</p>
<?php }
if ($_smarty_tpl->tpl_vars['tags']->value) {?>
<p class="tags"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'tags_marking');?>
<br />
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag', false, NULL, 'tags', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_tags']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_tags']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_tags']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_tags']->value['total'];
?><a href="index.php?mode=search&amp;search=<?php echo $_smarty_tpl->tpl_vars['tag']->value['escaped'];?>
&amp;method=tags"><?php echo $_smarty_tpl->tpl_vars['tag']->value['display'];?>
</a><?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_tags']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tags']->value['last'] : null)) {?>, <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></p>
<?php }?>
</div>
<div class="posting-footer">
<div class="reply"><?php if ($_smarty_tpl->tpl_vars['locked']->value == 0) {?><a class="stronglink" href="index.php?mode=posting&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'reply_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'reply_link');?>
</a><?php } else { ?><span class="locked"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'posting_locked');?>
</span><?php }?></div>
<div class="info">
<?php if ($_smarty_tpl->tpl_vars['views']->value) {?><span class="views"><?php if ($_smarty_tpl->tpl_vars['views']->value == 1) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'one_view');
} else {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'several_views'),"[views]",$_smarty_tpl->tpl_vars['views']->value);
}?></span><?php } else { ?>&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['options']->value) {?>
<ul class="options">
<li><a href="#top" class="go-to-top-link" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'back_to_top_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'back_to_top_link');?>
</a></li>
<?php if ($_smarty_tpl->tpl_vars['options']->value['add_bookmark']) {?><li><a href="index.php?mode=posting&amp;bookmark=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="add-bookmark" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'add_bookmark_message_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'add_bookmark_message_linkname');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['options']->value['delete_bookmark']) {?><li><a href="index.php?mode=posting&amp;bookmark=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="delete-bookmark" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'delete_bookmark_message_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'delete_bookmark_message_linkname');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['options']->value['edit']) {?><li><a href="index.php?mode=posting&amp;edit=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="edit" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'edit_message_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'edit_message_linkname');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['options']->value['delete']) {?><li><a href="index.php?mode=posting&amp;delete_posting=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;csrf_token=<?php echo $_smarty_tpl->tpl_vars['CSRF_TOKEN']->value;?>
&amp;back=entry" class="delete" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'delete_message_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'delete_message_linkname');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['options']->value['move']) {?><li><a href="index.php?mode=posting&amp;move_posting=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="move" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'move_posting_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'move_posting_linkname');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['options']->value['report_spam']) {?><li><a href="index.php?mode=posting&amp;report_spam=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="report" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'report_spam_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'report_spam_linkname');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['options']->value['flag_ham']) {?><li><a href="index.php?mode=posting&amp;flag_ham=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="report" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'flag_ham_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'flag_ham_linkname');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['options']->value['lock']) {?><li><a href="index.php?mode=posting&amp;lock=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="<?php if ($_smarty_tpl->tpl_vars['locked']->value == 0) {?>lock<?php } else { ?>unlock<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['locked']->value == 0) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'lock_linktitle');
} else {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'unlock_linktitle');
}?>"><?php if ($_smarty_tpl->tpl_vars['locked']->value == 0) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'lock_linkname');
} else {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'unlock_linkname');
}?></a></li>
<li><a href="index.php?mode=posting&amp;lock_thread=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="lock-thread" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'lock_thread_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'lock_thread_linkname');?>
</a></li>
<li><a href="index.php?mode=posting&amp;unlock_thread=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;back=entry" class="unlock-thread" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'unlock_thread_linktitle');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'unlock_thread_linkname');?>
</a></li><?php }?>
</ul>
<?php }?>
</div>
</div>

<hr class="entryline" />
<div class="complete-thread">
<p class="left"><strong><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'complete_thread_marking');?>
</strong></p><p class="right">&nbsp;<?php if ($_smarty_tpl->tpl_vars['settings']->value['rss_feed'] == 1) {?><a class="rss" href="index.php?mode=rss&amp;thread=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'rss_feed_thread_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'rss_feed_thread');?>
</a><?php }?></p>
</div>

<ul class="thread openthread">

<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tree', array('element'=>$_smarty_tpl->tpl_vars['tid']->value), true);?>

</ul>
<?php }
/* smarty_template_function_tree_124173668623348f071e345_20653797 */
if (!function_exists('smarty_template_function_tree_124173668623348f071e345_20653797')) {
function smarty_template_function_tree_124173668623348f071e345_20653797(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('level'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

<li><?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'] != $_smarty_tpl->tpl_vars['id']->value) {?><a class="<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['pid'] == 0 && $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['new']) {?>threadnew<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['pid'] == 0) {?>thread<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['pid'] != 0 && $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['new']) {?>replynew<?php } else { ?>reply<?php }
if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['is_read']) {?> read<?php }?>" href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['subject'];?>
</a><?php } else { ?><span class="<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['pid'] == 0) {
if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['new']) {?>currentthreadnew<?php } else { ?>currentthread<?php }
} else {
if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['new']) {?>currentreplynew<?php } else { ?>currentreply<?php }
}?>"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['subject'];?>
</span><?php }
if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['no_text']) {?> <img class="no-text" src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/no_text.png" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_text_title');?>
" alt="[ <?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_text_alt');?>
 ]" width="11" height="9" /><?php }?> - 

<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['user_type'] == 2) {?>
<strong class="admin registered_user"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['name'];?>
</strong>, 
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['user_type'] == 1) {?>
<strong class="mod registered_user"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['name'];?>
</strong>, 
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['user_id'] > 0) {?>
<strong class="registered_user"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['name'];?>
</strong>, 
<?php } else { ?>
<strong><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['name'];?>
</strong>, 
<?php }?>

<span id="p<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
" class="tail"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['formated_time'];
if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['pid'] == 0) {?> <a href="index.php?mode=thread&amp;id=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'open_whole_thread');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/complete_thread.png" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'open_whole_thread');?>
" alt="[*]" width="11" height="11" /></a><?php }
if ($_smarty_tpl->tpl_vars['admin']->value || $_smarty_tpl->tpl_vars['mod']->value) {?> <a id="marklink_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
" href="index.php?mode=posting&amp;mark=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
&amp;back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'mark_linktitle');?>
" onclick="mark(<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/marked.png','<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/unmarked.png','<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/mark_process.png','<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'mark_linktitle');?>
','<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'unmark_linktitle');?>
'); return false"><?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['marked'] == 0) {?><img id="markimg_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/unmarked.png" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'mark_linktitle');?>
" alt="[○]" width="11" height="11" /><?php } else { ?><img id="markimg_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/marked.png" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'unmark_linktitle');?>
" alt="[●]" width="11" height="11" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'unmark_linktitle');?>
" /><?php }?></a> <a href="index.php?mode=posting&amp;delete_posting=<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['element']->value]['id'];?>
&amp;csrf_token=<?php echo $_smarty_tpl->tpl_vars['CSRF_TOKEN']->value;?>
&amp;back=entry" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'delete_posting_title');?>
" onclick="return delete_posting_confirm(this, '<?php echo rawurlencode($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'delete_posting_confirm'));?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/delete_posting.png" alt="[x]" width="9" height="9" /></a><?php }?></span>
<?php if (is_array($_smarty_tpl->tpl_vars['child_array']->value[$_smarty_tpl->tpl_vars['element']->value])) {?>
<ul class="<?php if ($_smarty_tpl->tpl_vars['level']->value < $_smarty_tpl->tpl_vars['settings']->value['deep_reply']) {?>reply<?php } elseif ($_smarty_tpl->tpl_vars['level']->value >= $_smarty_tpl->tpl_vars['settings']->value['deep_reply'] && $_smarty_tpl->tpl_vars['level']->value < $_smarty_tpl->tpl_vars['settings']->value['very_deep_reply']) {?>deep-reply<?php } else { ?>very-deep-reply<?php }?>"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child_array']->value[$_smarty_tpl->tpl_vars['element']->value], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'tree', array('element'=>$_smarty_tpl->tpl_vars['child']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }?></li>
<?php
}}
/*/ smarty_template_function_tree_124173668623348f071e345_20653797 */
}
