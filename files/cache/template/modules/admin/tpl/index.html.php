<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','_header.html') ?>
<!--#Meta:modules/admin/tpl/js/excanvas.min.js--><?php Context::loadFile(['modules/admin/tpl/js/excanvas.min.js', '', 'lt IE 9', '']); ?>
<!--#Meta:modules/admin/tpl/js/jquery.jqplot.min.js--><?php Context::loadFile(['modules/admin/tpl/js/jquery.jqplot.min.js', '', '', '']); ?>
<!--#Meta:modules/admin/tpl/js/jqplot.barRenderer.min.js--><?php Context::loadFile(['modules/admin/tpl/js/jqplot.barRenderer.min.js', '', '', '']); ?>
<!--#Meta:modules/admin/tpl/js/jqplot.categoryAxisRenderer.min.js--><?php Context::loadFile(['modules/admin/tpl/js/jqplot.categoryAxisRenderer.min.js', '', '', '']); ?>
<!--#Meta:modules/admin/tpl/js/jqplot.pointLabels.min.js--><?php Context::loadFile(['modules/admin/tpl/js/jqplot.pointLabels.min.js', '', '', '']); ?>
<!--#Meta:modules/admin/tpl/css/jquery.jqplot.min.css--><?php Context::loadFile(['modules/admin/tpl/css/jquery.jqplot.min.css', '', '', '', []]); ?>
<div class="content" id="content">
	<div class="x_page-header">
		<h1><?php echo $lang->control_panel ?></h1>
	</div>
	<div id="checkBrowserMessage" class="message error" style="display:none;">
		<h2><?php echo $lang->checkBrowserIE8 ?></h2>
	</div>
	<?php if(isset($__Context->XE_VALIDATOR_MESSAGE) && ($__Context->XE_VALIDATOR_ID ?? '') == 'modules/admin/tpl/index/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
		<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
	</div><?php } ?>
	<?php if(config('lock.locked')){ ?><div class="message error">
		<h2><?php echo $lang->sitelock_in_use ?></h2>
		<p><?php echo $lang->about_sitelock_in_use ?> <a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['module' => 'admin', 'act' => 'dispAdminConfigSitelock']), ENT_QUOTES, 'UTF-8', false) : (getUrl(['module' => 'admin', 'act' => 'dispAdminConfigSitelock']))) ?>"><?php echo $lang->cmd_configure ?></a></p>
	</div><?php } ?>
	<?php if($__Context->wrongPaths){ ?><div class="message error">
		<h2><?php echo $lang->module_exists_in_wrong_path ?></h2>
		<p><?php echo $lang->about_module_exists_in_wrong_path ?></p>
		<ul>
			<?php $__loop_tmp=$__Context->wrongPaths;if($__loop_tmp)foreach($__loop_tmp as $__Context->value){ ?>
				<li><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value, ENT_QUOTES, 'UTF-8', false) : ($__Context->value)) ?></li>
			<?php } ?>
		</ul>
	</div><?php } ?>
	<div class="message update core_update" data-current-version="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(\RX_VERSION, ENT_QUOTES, 'UTF-8', false) : (\RX_VERSION)) ?>">
		<h2><?php echo $lang->update_available ?></h2>
		<p><?php echo $lang->core_update_available ?> <a href="https://rhymix.org/" target="_blank"><?php echo $lang->core_update_link ?></a></p>
	</div>
	
	<?php if($__Context->addTables || $__Context->needUpdate){ ?><div class="message update">
		<h2><?php echo $lang->need_complete_configuration ?></h2>
		<p><?php echo $lang->need_complete_configuration_details ?></p>
		<ul>
			<?php $__loop_tmp=$__Context->module_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->value){ ?>
				<?php if($__Context->value->need_install && !in_array($__Context->value->module, $__Context->wrongPaths)){ ?><li style="margin:0 0 4px 0">
					<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->title)) ?> (<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->module, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->module)) ?>)
					&nbsp; <button type="button" onclick="doInstallModule('<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->module, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->module)) ?>')" class="x_btn x_btn-small"><?php echo $lang->need_table ?></button>
				</li><?php } ?>
				<?php if($__Context->value->need_update && !in_array($__Context->value->module, $__Context->wrongPaths)){ ?><li style="margin:0 0 4px 0">
					<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->title)) ?> (<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->module, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->module)) ?>)
					&nbsp; <button type="button" onclick="doUpdateModule('<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->module, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->module)) ?>')" class="x_btn x_btn-small"><?php echo $lang->need_update ?></button>
				</li><?php } ?>
			<?php } ?>
		</ul>
	</div><?php } ?>
	<?php if(count($__Context->newVersionList)){ ?><div class="message update">
		<h2><?php echo $lang->available_new_version ?></h2>
		<p><?php echo $lang->available_new_version_details ?></p>
		<ul>
			<?php $__loop_tmp=$__Context->newVersionList;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->package){ ?><li style="margin:0 0 4px 0">
				[<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($lang->typename[$__Context->package->type], ENT_QUOTES, 'UTF-8', false) : ($lang->typename[$__Context->package->type])) ?>] <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->package->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->package->title)) ?> ver. <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->package->currentVersion, ENT_QUOTES, 'UTF-8', false) : ($__Context->package->currentVersion)) ?> → <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->package->version, ENT_QUOTES, 'UTF-8', false) : ($__Context->package->version)) ?>
				&nbsp; <a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->package->url, ENT_QUOTES, 'UTF-8', false) : ($__Context->package->url)) ?>&amp;return_url=<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(urlencode(getRequestUriByServerEnviroment()), ENT_QUOTES, 'UTF-8', false) : (urlencode(getRequestUriByServerEnviroment()))) ?>"><?php echo $lang->update ?></a>
			</li><?php } ?>
		</ul>
	</div><?php } ?>
	<div class="dashboard">
		<?php if($__Context->counterAddonActivated){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','_dashboard_counter.html') ?>
		<?php } ?>
		<?php if(!$__Context->counterAddonActivated){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','_dashboard_default.html') ?>
		<?php } ?>
	</div>
	<?php if(version_compare(PHP_VERSION, __XE_MIN_PHP_VERSION__, '<')){ ?><div class="message error">
		<h2><?php echo $lang->msg_php_warning_title ?></h2>
		<p><?php echo $lang->msg_php_warning_notice ?></p>
		<p><?php echo $lang->msg_php_warning_now_version ?> : <strong><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(phpversion(), ENT_QUOTES, 'UTF-8', false) : (phpversion())) ?></strong></p>
		<p><a href="https://secure.php.net/downloads.php" target="_blank"><?php echo $lang->msg_php_warning_latest_version_check ?></a></p>
		<ul><?php echo $lang->msg_php_warning_notice_explain ?></ul>
	</div><?php } ?>
</div>
<!--[if lt IE 9]>
<script>
jQuery(function($) {
	$('#checkBrowserMessage').show();
});
</script>
<![endif]-->
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','_footer.html') ?>
