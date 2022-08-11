<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/integration_search/tpl/js/integration_search_admin.js--><?php Context::loadFile(['modules/integration_search/tpl/js/integration_search_admin.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->integration_search ?></h1>
</div>
<ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act=='dispIntegration_searchAdminContent'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispIntegration_searchAdminContent') ?>"><?php echo $lang->cmd_setup ?></a></li>
	<li<?php if($__Context->act=='dispIntegration_searchAdminSkinInfo'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispIntegration_searchAdminSkinInfo') ?>"><?php echo $lang->cmd_manage_skin ?></a></li>
	<?php if($__Context->module != 'admin'){ ?><li><a href="<?php echo getUrl('act','IS') ?>"><?php echo $lang->cmd_back ?></a></li><?php } ?>
</ul>
