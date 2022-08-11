<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/comment/tpl/js/comment_admin.js--><?php Context::loadFile(['modules/comment/tpl/js/comment_admin.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->comment ?> <?php echo $lang->cmd_management ?></h1>
</div>
<script type="text/javascript">
	var secret_name_list = <?php echo json_encode($lang->secret_name_list->getArrayCopy()) ?>;
	var published_name_list = <?php echo json_encode($lang->published_name_list->getArrayCopy()) ?>;
</script>
