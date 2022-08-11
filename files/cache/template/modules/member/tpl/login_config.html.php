<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<?php Context::addJsFile("modules/member/ruleset/insertLoginConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="x_form-horizontal"  method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertLoginConfig" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertLoginConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<div class="x_control-group">
		<p class="x_control-label"><?php echo $lang->identifier ?></p>
		<div class="x_controls">
			<label class="x_inline" for="identifiers_user_id">
				<input type="checkbox" name="identifiers[]" id="identifiers_user_id" value="user_id"<?php if($__Context->config->identifier === 'user_id' || (is_array($__Context->config->identifiers) && in_array('user_id', $__Context->config->identifiers))){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->user_id ?>
			</label>
			<label class="x_inline" for="identifiers_email_address">
				<input type="checkbox" name="identifiers[]" id="identifiers_email_address" value="email_address"<?php if($__Context->config->identifier === 'email_address' || (is_array($__Context->config->identifiers) && in_array('email_address', $__Context->config->identifiers))){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->email_address ?>
			</label>
			<label class="x_inline" for="identifiers_phone_number">
				<input type="checkbox" name="identifiers[]" id="identifiers_phone_number" value="phone_number"<?php if($__Context->config->identifier === 'phone_number' || (is_array($__Context->config->identifiers) && in_array('phone_number', $__Context->config->identifiers))){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->phone_number ?>
			</label>
			<p class="x_help-block"><?php echo $lang->about_identifier ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="change_password_date"><?php echo $lang->change_password_date ?></label>
		<div class="x_controls">
			<input type="number" min="0" id="change_password_date" name="change_password_date" value="<?php echo $__Context->config->change_password_date ?>" /> <?php echo $lang->unit_day ?>
			<p class="x_help-block"><?php echo $lang->about_change_password_date ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<p class="x_control-label"><?php echo $lang->enable_login_fail_report ?></p>
		<div class="x_controls">
			<p>
				<label class="x_inline" for="enable_login_fail_report_yes"><input type="radio" name="enable_login_fail_report" id="enable_login_fail_report_yes" value="Y"<?php if($__Context->config->enable_login_fail_report != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label class="x_inline" for="enable_login_fail_report_no"><input type="radio" name="enable_login_fail_report" id="enable_login_fail_report_no" value="N"<?php if($__Context->config->enable_login_fail_report == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</p>
			<p>
				<input type="number" min="0" id="max_error_count" name="max_error_count" value="<?php echo $__Context->config->max_error_count ?>" /> <?php echo $lang->unit_count ?> /
				<input type="number" min="0" id="max_error_count_time" name="max_error_count_time" value="<?php echo $__Context->config->max_error_count_time ?>" /> <?php echo $lang->unit_sec ?>
			</p>
			<p class="x_help-block"><?php echo $lang->about_login_trial_limit ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_login_invalidate_other_sessions ?></label>
		<div class="x_controls">
			<label for="login_invalidate_other_sessions_y" class="x_inline"><input type="radio" name="login_invalidate_other_sessions" id="login_invalidate_other_sessions_y" value="Y"<?php if($__Context->config->login_invalidate_other_sessions === 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label for="login_invalidate_other_sessions_n" class="x_inline"><input type="radio" name="login_invalidate_other_sessions" id="login_invalidate_other_sessions_n" value="N"<?php if($__Context->config->login_invalidate_other_sessions !== 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $lang->about_login_invalidate_other_sessions ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="after_login_url"><?php echo $lang->after_login_url ?></label>
		<div class="x_controls">
			<input type="url" id="after_login_url" name="after_login_url" value="<?php echo $__Context->config->after_login_url ?>" />
			<p class="x_help-block"><?php echo $lang->about_after_login_url ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="after_logout_url"><?php echo $lang->after_logout_url ?></label>
		<div class="x_controls">
			<input type="url" id="after_logout_url" name="after_logout_url" value="<?php echo $__Context->config->after_logout_url ?>" />
			<p class="x_help-block"><?php echo $lang->about_after_logout_url ?></p>
		</div>
	</div>
	<div class="x_clearfix btnArea">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
