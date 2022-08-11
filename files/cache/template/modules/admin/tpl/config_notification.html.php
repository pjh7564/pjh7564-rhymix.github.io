<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<!--#Meta:modules/admin/tpl/js/notification_config.js--><?php Context::loadFile(['modules/admin/tpl/js/notification_config.js', '', '', '']); ?>
<?php if(!empty($__Context->XE_VALIDATOR_MESSAGE) && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_notification/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<script type="text/javascript">
	var mail_drivers = <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(json_encode($__Context->mail_drivers), ENT_QUOTES, 'UTF-8', false) : (json_encode($__Context->mail_drivers))) ?>;
	var sms_drivers = <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(json_encode($__Context->sms_drivers), ENT_QUOTES, 'UTF-8', false) : (json_encode($__Context->sms_drivers))) ?>;
</script>
	
<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="admin" />
	<input type="hidden" name="act" value="procAdminUpdateNotification" />
	<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_notification/1" />
	
	<section class="section">
		
		<h2><?php echo $lang->email ?></h2>
		
		<div class="x_control-group">
			<label class="x_control-label" for="mail_default_name"><?php echo $lang->cmd_admin_default_from_name ?></label>
			<div class="x_controls">
				<input type="text" name="mail_default_name" id="mail_default_name" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(escape($__Context->webmaster_name), ENT_QUOTES, 'UTF-8', false) : (escape($__Context->webmaster_name))) ?>" />
				<br />
				<p class="x_help-block" style="margin-top:10px"><?php echo $lang->cmd_admin_default_from_name_help ?></p>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="mail_default_from"><?php echo $lang->cmd_admin_default_from_email ?></label>
			<div class="x_controls">
				<input type="text" name="mail_default_from" id="mail_default_from" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(escape($__Context->webmaster_email), ENT_QUOTES, 'UTF-8', false) : (escape($__Context->webmaster_email))) ?>" />
				&nbsp;
				<label for="mail_force_default_sender" class="x_inline">
					<input type="checkbox" name="mail_force_default_sender" id="mail_force_default_sender" value="Y"<?php if(toBool($__Context->advanced_mailer_config->force_sender)){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_admin_force_default_sender ?>
				</label>
				<br />
				<p class="x_help-block" style="margin-top:10px"><?php echo $lang->cmd_admin_default_from_email_help ?></p>
			</div>
		</div>
	
		<div class="x_control-group">
			<label class="x_control-label" for="mail_default_reply_to"><?php echo $lang->cmd_admin_default_reply_to ?></label>
			<div class="x_controls">
				<input type="text" name="mail_default_reply_to" id="mail_default_reply_to" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(escape($__Context->advanced_mailer_config->reply_to ?? config('mail.default_reply_to')), ENT_QUOTES, 'UTF-8', false) : (escape($__Context->advanced_mailer_config->reply_to ?? config('mail.default_reply_to')))) ?>" />
				<br />
				<p class="x_help-block" style="margin-top:10px"><?php echo $lang->cmd_admin_default_reply_to_help ?></p>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="mail_driver"><?php echo $lang->cmd_admin_sending_method ?></label>
			<div class="x_controls">
				<select name="mail_driver" id="mail_driver">
					<?php if($__Context->mail_drivers)foreach($__Context->mail_drivers as $__Context->driver_name => $__Context->driver_definition){ ?>
						<option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>"<?php if($__Context->mail_driver === $__Context->driver_name){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name === 'dummy' ? $lang->notuse : $__Context->driver_definition['name'], ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name === 'dummy' ? $lang->notuse : $__Context->driver_definition['name'])) ?></option>
					<?php } ?>
				</select>
				<p class="x_help-block hidden-by-default show-for-dummy" style="margin-top:10px">
					<?php echo $lang->msg_advanced_mailer_about_dummy ?><br /><?php echo $lang->msg_advanced_mailer_about_dummy_exceptions ?>
				</p>
				<p class="x_help-block hidden-by-default show-for-mailfunction" style="margin-top:10px">
					<?php echo $lang->msg_advanced_mailer_about_mailfunction ?>
				</p>
			</div>
		</div>
		
		<?php if($__Context->mail_drivers)foreach($__Context->mail_drivers as $__Context->driver_name => $__Context->driver_definition){ ?>
		
			<?php if($__Context->driver_definition['required'])foreach($__Context->driver_definition['required'] as $__Context->conf_name){ ?>
			
				<?php  $__Context->conf_value = escape(config("mail.$__Context->driver_name.$__Context->conf_name")) ?>
			
				<?php if($__Context->conf_name === 'smtp_host'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_host"><?php echo $lang->cmd_advanced_mailer_smtp_host ?></label>
					<div class="x_controls">
						<input type="text" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_host" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_host" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
						<select id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_manual_entry">
							<option value=""><?php echo $lang->cmd_advanced_mailer_smtp_manual_entry ?></option>
							<option value="gmail">Gmail</option>
							<option value="hanmail">Hanmail</option>
							<option value="naver">Naver</option>
							<option value="worksmobile">Works Mobile</option>
							<option value="outlook">Outlook.com</option>
							<option value="yahoo">Yahoo</option>
						</select>
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'smtp_port'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_port"><?php echo $lang->cmd_advanced_mailer_smtp_port ?></label>
					<div class="x_controls">
						<input type="text" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_port" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_port" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value ?: '465', ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value ?: '465')) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'smtp_security'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_smtp_security ?></label>
					<div class="x_controls">
						<label class="x_inline" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_security_ssl"><input type="radio" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_security" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_security_ssl" value="ssl"<?php if($__Context->conf_value === 'ssl' || !$__Context->conf_value){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_advanced_mailer_smtp_security_ssl ?></label>
						<label class="x_inline" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_security_tls"><input type="radio" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_security" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_security_tls" value="tls"<?php if($__Context->conf_value === 'tls'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_advanced_mailer_smtp_security_tls ?></label>
						<label class="x_inline" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_security_none"><input type="radio" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_security" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_security_none" value="none"<?php if($__Context->conf_value === 'none'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_advanced_mailer_smtp_security_none ?></label>
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'smtp_user'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_user"><?php echo $lang->cmd_advanced_mailer_smtp_user ?></label>
					<div class="x_controls">
						<input type="text" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_user" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_user" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'smtp_pass'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_smtp_pass"><?php echo $lang->cmd_advanced_mailer_smtp_pass ?></label>
					<div class="x_controls">
						<input type="password" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_pass" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_smtp_pass" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" autocomplete="new-password" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_type'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_type"><?php echo $lang->cmd_advanced_mailer_api_type ?></label>
					<div class="x_controls">
						<select id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_type" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_type">
							<?php if($__Context->driver_definition['api_types'])foreach($__Context->driver_definition['api_types'] as $__Context->api_type){ ?>
								<option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->api_type, ENT_QUOTES, 'UTF-8', false) : ($__Context->api_type)) ?>"<?php if($__Context->api_type === $__Context->conf_value){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->api_type, ENT_QUOTES, 'UTF-8', false) : ($__Context->api_type)) ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_domain'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_domain"><?php echo $lang->cmd_advanced_mailer_api_domain ?></label>
					<div class="x_controls">
						<input type="text" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_domain" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_domain" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_user'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_user"><?php echo $lang->cmd_advanced_mailer_api_user ?></label>
					<div class="x_controls">
						<input type="text" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_user" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_user" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_pass'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_pass"><?php echo $lang->cmd_advanced_mailer_api_pass ?></label>
					<div class="x_controls full-width">
						<input type="password" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_pass" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_pass" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" autocomplete="new-password" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_token'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_token"><?php echo $lang->cmd_advanced_mailer_api_token ?></label>
					<div class="x_controls full-width">
						<input type="text" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_token" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_token" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_key'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key"><?php echo $lang->cmd_advanced_mailer_api_key ?></label>
					<div class="x_controls">
						<input type="text" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_secret'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_secret"><?php echo $lang->cmd_advanced_mailer_api_secret ?></label>
					<div class="x_controls">
						<input type="password" name="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_secret" id="mail_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_secret" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" autocomplete="new-password" />
					</div>
				</div>
				<?php } ?>
				
			<?php } ?>
			
		<?php } ?>
		
	</section>
	
	<section class="section">
		
		<h2><?php echo $lang->sms ?></h2>
	
		<div class="x_control-group">
			<label class="x_control-label" for="sms_default_from"><?php echo $lang->cmd_admin_default_from_phone ?></label>
			<div class="x_controls">
				<input type="text" name="sms_default_from" id="sms_default_from" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(escape(config('sms.default_from')), ENT_QUOTES, 'UTF-8', false) : (escape(config('sms.default_from')))) ?>" />
				&nbsp;
				<label for="sms_force_default_sender" class="x_inline">
					<input type="checkbox" name="sms_force_default_sender" id="sms_force_default_sender" value="Y"<?php if(config('sms.default_force') !== false){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_admin_force_default_sender ?>
				</label>
				<br />
				<p class="x_help-block" style="margin-top:10px"><?php echo $lang->cmd_admin_default_from_phone_help ?></p>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="sms_driver"><?php echo $lang->cmd_admin_sending_method ?></label>
			<div class="x_controls">
				<select name="sms_driver" id="sms_driver">
					<?php if($__Context->sms_drivers)foreach($__Context->sms_drivers as $__Context->driver_name => $__Context->driver_definition){ ?>
						<option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>"<?php if($__Context->sms_driver === $__Context->driver_name){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name === 'dummy' ? $lang->notuse : $__Context->driver_definition['name'], ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name === 'dummy' ? $lang->notuse : $__Context->driver_definition['name'])) ?></option>
					<?php } ?>
				</select>
				<p class="x_help-block hidden-by-default show-for-dummy" style="margin-top:10px">
					<?php echo $lang->cmd_admin_sms_dummy_driver_help ?>
				</p>
			</div>
		</div>
		
		<?php if($__Context->sms_drivers)foreach($__Context->sms_drivers as $__Context->driver_name => $__Context->driver_definition){ ?>
		
			<?php  $__Context->conf_names = array_merge($__Context->driver_definition['required'], $__Context->driver_definition['optional']) ?>
			
			<?php if($__Context->conf_names)foreach($__Context->conf_names as $__Context->conf_name){ ?>
			
				<?php  $__Context->conf_value = escape(config("sms.$__Context->driver_name.$__Context->conf_name")) ?>
				
				<?php if($__Context->conf_name === 'api_user'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_user"><?php echo $lang->cmd_advanced_mailer_api_user ?></label>
					<div class="x_controls">
						<input type="text" name="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_user" id="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_user" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_pass'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_pass"><?php echo $lang->cmd_advanced_mailer_api_pass ?></label>
					<div class="x_controls full-width">
						<input type="password" name="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_pass" id="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_pass" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" autocomplete="new-password" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_token'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_token"><?php echo $lang->cmd_advanced_mailer_api_token ?></label>
					<div class="x_controls full-width">
						<input type="text" name="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_token" id="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_token" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_key'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key"><?php echo $lang->cmd_advanced_mailer_api_key ?></label>
					<div class="x_controls">
						<input type="text" name="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key" id="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'api_secret'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_secret"><?php echo $lang->cmd_advanced_mailer_api_secret ?></label>
					<div class="x_controls">
						<input type="password" name="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_secret" id="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_secret" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" autocomplete="new-password" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'sender_key'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_sender_key"><?php echo $lang->cmd_advanced_mailer_sender_key ?></label>
					<div class="x_controls">
						<input type="password" name="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_sender_key" id="sms_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_sender_key" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', false) : ($__Context->conf_value)) ?>" autocomplete="new-password" />
						<p class="x_help-block"><?php echo $lang->cmd_admin_sms_sender_key_help ?></p>
					</div>
				</div>
				<?php } ?>
				
			<?php } ?>
			
		<?php } ?>
	
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_admin_allow_split_sms ?></label>
			<div class="x_controls">
				<label for="allow_split_sms_y" class="x_inline">
					<input type="radio" name="allow_split_sms" id="allow_split_sms_y" value="Y"<?php if(config('sms.allow_split.sms') !== false){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_yes ?>
				</label>
				<label for="allow_split_sms_n" class="x_inline">
					<input type="radio" name="allow_split_sms" id="allow_split_sms_n" value="N"<?php if(config('sms.allow_split.sms') === false){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_no ?>
				</label>
				<br />
				<p class="x_help-block"><?php echo $lang->cmd_admin_allow_split_sms_help ?></p>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_admin_allow_split_lms ?></label>
			<div class="x_controls">
				<label for="allow_split_lms_y" class="x_inline">
					<input type="radio" name="allow_split_lms" id="allow_split_lms_y" value="Y"<?php if(config('sms.allow_split.lms') !== false){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_yes ?>
				</label>
				<label for="allow_split_lms_n" class="x_inline">
					<input type="radio" name="allow_split_lms" id="allow_split_lms_n" value="N"<?php if(config('sms.allow_split.lms') === false){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_no ?>
				</label>
				<br />
				<p class="x_help-block"><?php echo $lang->cmd_admin_allow_split_lms_help ?></p>
			</div>
		</div>
		
	</section>
	
	<section class="section">
		
		<h2><?php echo $lang->push_notification ?></h2>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_admin_sending_method ?></label>
			<div class="x_controls">
				<?php if($__Context->push_drivers)foreach($__Context->push_drivers as $__Context->driver_name => $__Context->driver_definition){ ?>
					<label for="push_driver_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>" class="x_inline"><input type="checkbox" name="push_driver[]" id="push_driver_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>"<?php if(isset($__Context->push_config['types'][$__Context->driver_name])){ ?> checked="checked"<?php } ?> /> <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_definition['name'], ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_definition['name'])) ?></label>
				<?php } ?>
			</div>
		</div>
		
		<?php if($__Context->push_drivers)foreach($__Context->push_drivers as $__Context->driver_name => $__Context->driver_definition){ ?>
		
			<?php  $__Context->conf_names = array_merge($__Context->driver_definition['required'], $__Context->driver_definition['optional']) ?>
			
			<?php if($__Context->conf_names)foreach($__Context->conf_names as $__Context->conf_name){ ?>
			
				<?php  $__Context->conf_value = escape(config("push.$__Context->driver_name.$__Context->conf_name")) ?>
				
				<?php if($__Context->conf_name === 'api_key'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key"><?php echo $lang->cmd_advanced_mailer_fcm_api_key ?></label>
					<div class="x_controls">
						<input type="password" name="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key" id="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_api_key" value="<?php echo htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', true) ?>" autocomplete="new-password" />
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'certificate'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_certificate"><?php echo $lang->cmd_advanced_mailer_apns_certificate ?></label>
					<div class="x_controls full-width">
						<textarea name="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_certificate" id="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_certificate"><?php echo htmlspecialchars($__Context->apns_certificate, ENT_QUOTES, 'UTF-8', true) ?></textarea>
					</div>
				</div>
				<?php } ?>
				
				<?php if($__Context->conf_name === 'passphrase'){ ?>
				<div class="x_control-group hidden-by-default show-for-<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>">
					<label class="x_control-label" for="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_passphrase"><?php echo $lang->cmd_advanced_mailer_apns_passphrase ?></label>
					<div class="x_controls">
						<input type="password" name="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_passphrase" id="push_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->driver_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->driver_name)) ?>_passphrase" value="<?php echo htmlspecialchars($__Context->conf_value, ENT_QUOTES, 'UTF-8', true) ?>" autocomplete="new-password" />
					</div>
				</div>
				<?php } ?>
				
			<?php } ?>
			
		<?php } ?>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_allow_guest_device ?></label>
			<div class="x_controls">
				<label for="allow_guest_device_y" class="x_inline">
					<input type="radio" name="allow_guest_device" id="allow_guest_device_y" value="Y"<?php if(config('push.allow_guest_device')){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_yes ?>
				</label>
				<label for="allow_guest_device_n" class="x_inline">
					<input type="radio" name="allow_guest_device" id="allow_guest_device_n" value="N"<?php if(!config('push.allow_guest_device')){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_no ?>
				</label>
				<br />
				<p class="x_help-block"><?php echo $lang->cmd_advanced_mailer_about_allow_guest_device ?></p>
			</div>
		</div>
		
	</section>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</div>
	</div>
</form>
