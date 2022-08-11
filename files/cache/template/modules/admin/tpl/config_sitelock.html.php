<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<?php if(!empty($__Context->XE_VALIDATOR_MESSAGE) && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_sitelock/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
	<?php Context::addJsFile("modules/admin/ruleset/sitelock.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" class="x_form-horizontal" ><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="sitelock" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminUpdateSitelock" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_sitelock/1" />
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_sitelock ?></label>
			<div class="x_controls">
				<label for="sitelock_locked_y" class="x_inline"><input type="radio" name="sitelock_locked" id="sitelock_locked_y" value="Y"<?php if($__Context->sitelock_locked){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="sitelock_locked_n" class="x_inline"><input type="radio" name="sitelock_locked" id="sitelock_locked_n" value="N"<?php if(!$__Context->sitelock_locked){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="sitelock_allowed_ip"><?php echo $lang->sitelock_whitelist ?></label>
			<div class="x_controls">
				<textarea name="sitelock_allowed_ip" id="sitelock_allowed_ip" rows="4" cols="42" style="margin-right:10px"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->sitelock_allowed_ip, ENT_QUOTES, 'UTF-8', false) : ($__Context->sitelock_allowed_ip)) ?></textarea>
				<span class="x_help-block"><?php echo $lang->your_ip ?> : <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->remote_addr, ENT_QUOTES, 'UTF-8', false) : ($__Context->remote_addr)) ?></span>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="sitelock_title"><?php echo $lang->sitelock_title ?></label>
			<div class="x_controls">
				<input type="text" name="sitelock_title" id="sitelock_title" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->sitelock_title, ENT_QUOTES, 'UTF-8', false) : ($__Context->sitelock_title)) ?>"/>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="sitelock_message"><?php echo $lang->sitelock_message ?></label>
			<div class="x_controls" style="margin-right:14px">
				<textarea name="sitelock_message" id="sitelock_message" rows="6" style="width:100%;"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->sitelock_message, ENT_QUOTES, 'UTF-8', false) : ($__Context->sitelock_message)) ?></textarea>
				<span class="x_help-block"><?php echo $lang->sitelock_message_help ?></span>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
