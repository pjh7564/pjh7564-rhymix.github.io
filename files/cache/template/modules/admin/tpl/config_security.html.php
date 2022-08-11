<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<?php if(!empty($__Context->XE_VALIDATOR_MESSAGE) && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_security/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
	<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminUpdateSecurity" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_security/1" />
		<div class="x_control-group">
			<label class="x_control-label" for="mediafilter_whitelist"><?php echo $lang->mediafilter_whitelist ?></label>
			<div class="x_controls" style="margin-right:14px">
				<textarea name="mediafilter_whitelist" id="mediafilter_whitelist" rows="8" style="width:100%;"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->mediafilter_whitelist, ENT_QUOTES, 'UTF-8', false) : ($__Context->mediafilter_whitelist)) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_mediafilter_whitelist ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mediafilter_classes"><?php echo $lang->mediafilter_classes ?></label>
			<div class="x_controls" style="margin-right:14px">
				<textarea name="mediafilter_classes" id="mediafilter_classes" rows="4" style="width:100%;"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->mediafilter_classes, ENT_QUOTES, 'UTF-8', false) : ($__Context->mediafilter_classes)) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_mediafilter_classes ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="robot_user_agents"><?php echo $lang->robot_user_agents ?></label>
			<div class="x_controls" style="margin-right:14px">
				<textarea name="robot_user_agents" id="robot_user_agents" rows="4" style="width:100%;"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->robot_user_agents, ENT_QUOTES, 'UTF-8', false) : ($__Context->robot_user_agents)) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_robot_user_agents ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="admin_allowed_ip"><?php echo $lang->admin_ip_allow ?></label>
			<div class="x_controls">
				<textarea name="admin_allowed_ip" id="admin_allowed_ip" rows="4" cols="42" placeholder="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->remote_addr, ENT_QUOTES, 'UTF-8', false) : ($__Context->remote_addr)) ?> (<?php echo $lang->local_ip_address ?>)" style="margin-right:10px"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->admin_allowed_ip, ENT_QUOTES, 'UTF-8', false) : ($__Context->admin_allowed_ip)) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_admin_ip_allow ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="admin_denied_ip"><?php echo $lang->admin_ip_deny ?></label>
			<div class="x_controls">
				<textarea name="admin_denied_ip" id="admin_denied_ip" rows="4" cols="42" style="margin-right:10px"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->admin_denied_ip, ENT_QUOTES, 'UTF-8', false) : ($__Context->admin_denied_ip)) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_admin_ip_deny ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_samesite ?></label>
			<div class="x_controls">
				<label for="use_samesite_strict" class="x_inline"><input type="radio" name="use_samesite" id="use_samesite_strict" value="Strict"<?php if($__Context->use_samesite === 'Strict'){ ?> checked="checked"<?php } ?> /> Strict</label>
				<label for="use_samesite_lax" class="x_inline"><input type="radio" name="use_samesite" id="use_samesite_lax" value="Lax"<?php if($__Context->use_samesite === 'Lax'){ ?> checked="checked"<?php } ?> /> Lax</label>
				<label for="use_samesite_none" class="x_inline"><input type="radio" name="use_samesite" id="use_samesite_none" value="None"<?php if($__Context->use_samesite === 'None'){ ?> checked="checked"<?php };
if(!$__Context->use_session_ssl || $__Context->site_module_info->security !== 'always'){ ?> disabled="disabled"<?php } ?> /> None</label>
				<label for="use_samesite_empty" class="x_inline"><input type="radio" name="use_samesite" id="use_samesite_empty" value=""<?php if(!$__Context->use_samesite){ ?> checked="checked"<?php } ?> /> <?php echo $lang->use_samesite_empty ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_use_samesite ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_session_keys ?></label>
			<div class="x_controls">
				<label for="use_session_keys_y" class="x_inline"><input type="radio" name="use_session_keys" id="use_session_keys_y" value="Y"<?php if($__Context->use_session_keys !== false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_session_keys_n" class="x_inline"><input type="radio" name="use_session_keys" id="use_session_keys_n" value="N"<?php if($__Context->use_session_keys === false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_use_session_keys ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_session_ssl ?></label>
			<div class="x_controls">
				<label for="use_session_ssl_y" class="x_inline"><input type="radio" name="use_session_ssl" id="use_session_ssl_y" value="Y"<?php if($__Context->use_session_ssl && $__Context->site_module_info->security === 'always'){ ?> checked="checked"<?php };
if($__Context->site_module_info->security !== 'always'){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_session_ssl_n" class="x_inline"><input type="radio" name="use_session_ssl" id="use_session_ssl_n" value="N"<?php if(!$__Context->use_session_ssl || $__Context->site_module_info->security !== 'always'){ ?> checked="checked"<?php };
if($__Context->site_module_info->security !== 'always'){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_use_session_ssl ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_cookies_ssl ?></label>
			<div class="x_controls">
				<label for="use_cookies_ssl_y" class="x_inline"><input type="radio" name="use_cookies_ssl" id="use_cookies_ssl_y" value="Y"<?php if($__Context->use_cookies_ssl && $__Context->site_module_info->security === 'always'){ ?> checked="checked"<?php };
if($__Context->site_module_info->security !== 'always'){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_cookies_ssl_n" class="x_inline"><input type="radio" name="use_cookies_ssl" id="use_cookies_ssl_n" value="N"<?php if(!$__Context->use_cookies_ssl || $__Context->site_module_info->security !== 'always'){ ?> checked="checked"<?php };
if($__Context->site_module_info->security !== 'always'){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_use_cookies_ssl ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->check_csrf_token ?></label>
			<div class="x_controls">
				<label for="check_csrf_token_y" class="x_inline"><input type="radio" name="check_csrf_token" id="check_csrf_token_y" value="Y"<?php if($__Context->check_csrf_token){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="check_csrf_token_n" class="x_inline"><input type="radio" name="check_csrf_token" id="check_csrf_token_n" value="N"<?php if(!$__Context->check_csrf_token){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_check_csrf_token ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_nofollow ?></label>
			<div class="x_controls">
				<label for="use_nofollow_y" class="x_inline"><input type="radio" name="use_nofollow" id="use_nofollow_y" value="Y"<?php if($__Context->use_nofollow){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_nofollow_n" class="x_inline"><input type="radio" name="use_nofollow" id="use_nofollow_n" value="N"<?php if(!$__Context->use_nofollow){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_use_nofollow ?></p>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
