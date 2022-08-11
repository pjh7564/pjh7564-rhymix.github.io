<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<!--#Meta:modules/member/tpl/js/default_config.js--><?php Context::loadFile(['modules/member/tpl/js/default_config.js', '', '', '']); ?>
<?php Context::addJsFile("modules/member/ruleset/insertDefaultConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="x_form-horizontal"  method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertDefaultConfig" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertDefaultConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->enable_join ?></div>
		<div class="x_controls">
			<label class="x_inline" for="enable_join_yes"><input type="radio" name="enable_join" id="enable_join_yes" value="Y"<?php if($__Context->config->enable_join == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="enable_join_no"><input type="radio" name="enable_join" id="enable_join_no" value="N"<?php if($__Context->config->enable_join != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->enable_confirm ?></div>
		<div class="x_controls">
			<label class="x_inline" for="enable_confirm_yes"><input type="radio" name="enable_confirm" id="enable_confirm_yes" value="Y"<?php if($__Context->config->enable_confirm == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="enable_confirm_no"><input type="radio" name="enable_confirm" id="enable_confirm_no" value="N"<?php if($__Context->config->enable_confirm != 'Y'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $lang->about_enable_confirm ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_authmail_expires ?></label>
		<div class="x_controls">
			<input type="number" name="authmail_expires" value="<?php echo $__Context->config->authmail_expires ?: 1 ?>" />
			<select name="authmail_expires_unit" style="width:auto;min-width:0">
				<option value="86400"<?php if($__Context->config->authmail_expires_unit == 86400){ ?> selected="selected"<?php } ?>><?php echo $lang->unit_day ?></option>
				<option value="3600"<?php if($__Context->config->authmail_expires_unit == 3600){ ?> selected="selected"<?php } ?>><?php echo $lang->unit_hour ?></option>
				<option value="60"<?php if($__Context->config->authmail_expires_unit == 60){ ?> selected="selected"<?php } ?>><?php echo $lang->unit_min ?></option>
				<option value="1"<?php if($__Context->config->authmail_expires_unit == 1){ ?> selected="selected"<?php } ?>><?php echo $lang->unit_sec ?></option>
			</select>
			<p class="x_help-block"><?php echo $lang->about_authmail_expires ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_member_profile_view ?></div>
		<div class="x_controls">
			<label class="x_inline" for="member_profile_view_yes"><input type="radio" name="member_profile_view" id="member_profile_view_yes" value="Y"<?php if($__Context->config->member_profile_view == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="member_profile_view_no"><input type="radio" name="member_profile_view" id="member_profile_view_no" value="N"<?php if($__Context->config->member_profile_view != 'Y'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $lang->about_member_profile_view ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_modify_nickname_log ?></div>
		<div class="x_controls">
			<label class="x_inline" for="update_nickname_log_yes"><input type="radio" name="update_nickname_log" id="update_nickname_log_yes" value="Y"<?php if($__Context->config->update_nickname_log == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="update_nickname_log_no"><input type="radio" name="update_nickname_log" id="update_nickname_log_no" value="N"<?php if($__Context->config->update_nickname_log != 'Y'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $lang->about_update_nickname_log ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_nickname_symbols ?></div>
		<div class="x_controls">
			<label class="x_inline" for="nickname_symbols_yes"><input type="radio" name="nickname_symbols" id="nickname_symbols_yes" value="Y"<?php if($__Context->config->nickname_symbols == 'Y' || !isset($__Context->config->nickname_symbols)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="nickname_symbols_no"><input type="radio" name="nickname_symbols" id="nickname_symbols_no" value="N"<?php if($__Context->config->nickname_symbols == 'N'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->cmd_no ?></label>
			<label class="x_inline" for="nickname_symbols_list"><input type="radio" name="nickname_symbols" id="nickname_symbols_list" value="LIST"<?php if($__Context->config->nickname_symbols == 'LIST'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->cmd_nickname_symbols_list ?></label>
			<input type="text" name="nickname_symbols_allowed_list" value="<?php echo $__Context->config->nickname_symbols_allowed_list ?: '' ?>" />
			<p class="x_help-block"><?php echo $lang->about_nickname_symbols ?></p>
		</div>
	</div>
	<div class="x_control-group"<?php if($__Context->config->allow_duplicate_nickname != 'Y'){ ?> style="display:none"<?php } ?>>
		<div class="x_control-label"><?php echo $lang->cmd_allow_duplicate_nickname ?></div>
		<div class="x_controls">
			<label class="x_inline" for="allow_duplicate_nickname_yes"><input type="radio" name="allow_duplicate_nickname" id="allow_duplicate_nickname_yes" value="Y"<?php if($__Context->config->allow_duplicate_nickname == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="allow_duplicate_nickname_no"><input type="radio" name="allow_duplicate_nickname" id="allow_duplicate_nickname_no" value="N"<?php if($__Context->config->allow_duplicate_nickname != 'Y'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $lang->about_allow_duplicate_nickname ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_config_password_strength ?></div>
		<div class="x_controls">
			<label class="x_inline" for="password_strength1"><input type="radio" name="password_strength" id="password_strength1" value="low"<?php if($__Context->config->password_strength == 'low'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->password_strength_low ?>(<?php echo $lang->about_password_strength['low'] ?>)</label><br>
			<label class="x_inline" for="password_strength2"><input type="radio" name="password_strength" id="password_strength2" value="normal"<?php if(!$__Context->config->password_strength || $__Context->config->password_strength == 'normal'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->password_strength_normal ?>(<?php echo $lang->about_password_strength['normal'] ?>)</label><br>
			<label class="x_inline" for="password_strength3"><input type="radio" name="password_strength" id="password_strength3" value="high"<?php if($__Context->config->password_strength == 'high'){ ?> checked="checked"<?php } ?>/> <?php echo $lang->password_strength_high ?>(<?php echo $lang->about_password_strength['high'] ?>)</label><br>
			<p class="x_help-block"><?php echo $lang->about_password_strength_config ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_password_hashing_algorithm ?></label>
		<div class="x_controls">
			<select name="password_hashing_algorithm" id="password_hashing_algorithm" style="width:auto">
				<?php if($__Context->password_hashing_algos)foreach($__Context->password_hashing_algos as $__Context->key => $__Context->val){ ?>
					<option value="<?php echo $__Context->key ?>"<?php if($__Context->config->password_hashing_algorithm === $__Context->key){ ?> selected="selected"<?php };
if($__Context->val === false){ ?> disabled="disabled"<?php } ?>><?php echo $__Context->val ?: $__Context->key ?></option>
				<?php } ?>
			</select>
			<p class="x_help-block"><?php echo $lang->about_password_hashing_algorithm ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_password_hashing_work_factor ?></label>
		<div class="x_controls">
			<select name="password_hashing_work_factor" id="password_hashing_work_factor" style="width:auto">
				<?php for($__Context->i=4;$__Context->i<=16;$__Context->i++){ ?><option value="<?php echo $__Context->i ?>"<?php if($__Context->config->password_hashing_work_factor==$__Context->i){ ?> selected="selected"<?php } ?>><?php echo sprintf('%02d', $__Context->i) ?></option><?php } ?>
			</select>
			<p class="x_help-block"><?php echo $lang->about_password_hashing_work_factor ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_password_hashing_auto_upgrade ?></label>
		<div class="x_controls">
			<label for="password_hashing_auto_upgrade_y" class="x_inline"><input type="radio" name="password_hashing_auto_upgrade" id="password_hashing_auto_upgrade_y" value="Y"<?php if($__Context->config->password_hashing_auto_upgrade == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label for="password_hashing_auto_upgrade_n" class="x_inline"><input type="radio" name="password_hashing_auto_upgrade" id="password_hashing_auto_upgrade_n" value="N"<?php if($__Context->config->password_hashing_auto_upgrade != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $lang->about_password_hashing_auto_upgrade ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_password_change_invalidate_other_sessions ?></label>
		<div class="x_controls">
			<label for="password_change_invalidate_other_sessions_y" class="x_inline"><input type="radio" name="password_change_invalidate_other_sessions" id="password_change_invalidate_other_sessions_y" value="Y"<?php if($__Context->config->password_change_invalidate_other_sessions == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label for="password_change_invalidate_other_sessions_n" class="x_inline"><input type="radio" name="password_change_invalidate_other_sessions" id="password_change_invalidate_other_sessions_n" value="N"<?php if($__Context->config->password_change_invalidate_other_sessions != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $lang->about_password_change_invalidate_other_sessions ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="member_sync"><?php echo $lang->cmd_member_sync ?></label>
		<div class="x_controls">
			<input id="member_sync" type="button" value="<?php echo $lang->cmd_member_sync ?>" class="__sync x_btn x_btn-warning" />
			<p class="x_help-inline"><?php echo $lang->about_member_sync ?></p>
		</div>
	</div>
	<div class="btnArea x_clearfix">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
