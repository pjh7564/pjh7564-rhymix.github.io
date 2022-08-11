<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/point/tpl/js/point_admin.js--><?php Context::loadFile(['modules/point/tpl/js/point_admin.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->point ?> <?php echo $lang->cmd_management ?></h1>
</div>
<?php if($__Context->module=='admin'){ ?><ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act=='dispPointAdminConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispPointAdminConfig') ?>"><?php echo $lang->cmd_point_config ?></a></li>
	<li<?php if($__Context->act=='dispPointAdminModuleConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispPointAdminModuleConfig') ?>"><?php echo $lang->cmd_point_module_config ?></a></li>
	<li<?php if($__Context->act=='dispPointAdminPointList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispPointAdminPointList') ?>"><?php echo $lang->cmd_point_member_list ?></a></li>
</ul><?php } ?>
