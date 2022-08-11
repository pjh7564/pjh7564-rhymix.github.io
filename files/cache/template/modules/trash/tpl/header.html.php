<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/trash/tpl/js/trash_admin.js--><?php Context::loadFile(['modules/trash/tpl/js/trash_admin.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->cmd_trash ?></h1>
</div>
<div class="header4">
	<ul class="x_nav x_nav-tabs">
		<li<?php if($__Context->act=='dispTrashAdminList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispTrashAdminList') ?>"><?php echo $lang->cmd_trash_list ?></a></li>
	</ul>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
