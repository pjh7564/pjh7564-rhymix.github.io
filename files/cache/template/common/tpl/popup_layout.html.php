<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/admin/tpl/css/admin.bootstrap.css--><?php Context::loadFile(['modules/admin/tpl/css/admin.bootstrap.css', '', '', '', []]); ?>
<!--#Meta:modules/admin/tpl/css/admin.css--><?php Context::loadFile(['modules/admin/tpl/css/admin.css', '', '', '', []]); ?>
<div class="x popup">
    <?php echo $__Context->content ?>
</div>
<script>
	jQuery(function() {
		setTimeout(setFixedPopupSize, 500);
	});
    var _isPoped = true;
</script>
