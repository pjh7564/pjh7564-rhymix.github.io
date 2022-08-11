<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/document/tpl/js/document_admin.js--><?php Context::loadFile(['modules/document/tpl/js/document_admin.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->document ?></h1>
</div>
<ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act == 'dispDocumentAdminList'){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminList') ?>"><?php echo $lang->document_list ?></a>
	</li>
	<li<?php if($__Context->act == 'dispDocumentAdminConfig'){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminConfig') ?>"><?php echo $lang->cmd_document_module_config ?></a>
	</li>
	<li<?php if($__Context->act == 'dispDocumentAdminDeclared'){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminDeclared') ?>"><?php echo $lang->cmd_declared_list ?></a>
	</li>
</ul>
