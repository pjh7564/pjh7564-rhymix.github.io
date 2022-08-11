<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/file/tpl/js/file_admin.js--><?php Context::loadFile(['modules/file/tpl/js/file_admin.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->file_management ?></h1>
</div>
<ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act == 'dispFileAdminList'){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispFileAdminList') ?>"><?php echo $lang->file_list ?></a>
	</li>
	<li<?php if($__Context->act == 'dispFileAdminUploadConfig'){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispFileAdminUploadConfig') ?>"><?php echo $lang->file_upload_config ?></a>
	</li>
	<li<?php if($__Context->act == 'dispFileAdminDownloadConfig'){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispFileAdminDownloadConfig') ?>"><?php echo $lang->file_download_config ?></a>
	</li>
	<li<?php if($__Context->act == 'dispFileAdminOtherConfig'){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispFileAdminOtherConfig') ?>"><?php echo $lang->file_other_config ?></a>
	</li>
</ul>
