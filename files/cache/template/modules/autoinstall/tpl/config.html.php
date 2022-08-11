<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/autoinstall/tpl','header.html') ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/autoinstall/tpl','category.html') ?>
<?php 
	$__Context->from_id = array(
		'modules/autoinstall/tpl/config/1' => 1
	);
 ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && isset($__Context->from_id[$__Context->XE_VALIDATOR_ID])){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/autoinstall/ruleset/insert_config.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="x_form-horizontal"  method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insert_config" />
	<input type="hidden" name="module" value="autoinstall" />
	<input type="hidden" name="act" value="procAutoinstallAdminInsertConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/autoinstall/tpl/config/1" />
	<div class="x_control-group">
		<label class="x_control-label" for="location_site"><?php echo $lang->location_site ?></label>
		<div class="x_controls">
			<input type="url" id="location_site" name="location_site" style="min-width:90%" value="<?php echo $__Context->config->location_site ?>" />
			<p class="x_help-block"><?php echo $lang->about_location_site ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="download_server"><?php echo $lang->download_server ?></label>
		<div class="x_controls">
			<input type="url" id="download_server" name="download_server" style="min-width:90%" value="<?php echo $__Context->config->download_server ?>" />
			<p class="x_help-block"><?php echo $lang->about_download_server ?></p>
		</div>
	</div>
	<div class="x_clearfix btnArea">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
