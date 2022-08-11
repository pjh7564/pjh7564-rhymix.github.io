<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','_admin_common.html') ?>
<div class="x">
	<div class="content" id="content">
		<?php echo $__Context->content ?>
	</div>
</div>
<script>opener.top.fullSetupWinLoaded();</script>
