<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/advanced_mailer/tpl','common.html') ?>
<!--#Meta:modules/advanced_mailer/tpl/css/config.css--><?php Context::loadFile(['modules/advanced_mailer/tpl/css/config.css', '', '', '', []]); ?>
<!--#Meta:modules/advanced_mailer/tpl/js/config.js--><?php Context::loadFile(['modules/advanced_mailer/tpl/js/config.js', '', '', '']); ?>
<form class="x_form-horizontal" action="./" method="post" id="advanced_mailer"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="advanced_mailer" />
	<input type="hidden" name="act" value="procAdvanced_mailerAdminInsertConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	
	<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	
	<section class="section">
		
		<h2 style="padding-top:12px"><?php echo $lang->cmd_advanced_mailer_sending_method_config ?></h2>
		
		<div class="advanced_mailer_description">
			※ <?php echo $lang->cmd_advanced_mailer_about_sending_method ?>
		</div>
		
	</section>
	
	<section class="section">
		
		<h2 style="padding-top:12px"><?php echo $lang->cmd_advanced_mailer_sender_identity ?></h2>
		
		<div class="advanced_mailer_description">
			※ <?php echo $lang->cmd_advanced_mailer_about_sender_identity ?>
		</div>
	
	</section>
	
	<section class="section">
		
		<h2 style="padding-top:12px"><?php echo $lang->cmd_advanced_mailer_logging ?></h2>
		
		<div class="x_control-group">
			<label class="x_control-label" for="advanced_mailer_log_sent_mail"><?php echo $lang->cmd_advanced_mailer_log_mail ?></label>
			<div class="x_controls">
				<select name="log_sent_mail" id="advanced_mailer_log_sent_mail">
					<option value="Y"<?php if(toBool($__Context->advanced_mailer_config->log_sent_mail)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_yes ?></option>
					<option value="N"<?php if(!toBool($__Context->advanced_mailer_config->log_sent_mail)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_no ?></option>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_log_mail_errors ?></label>
			<div class="x_controls">
				<select name="log_errors" id="advanced_mailer_log_errors">
					<option value="Y"<?php if(toBool($__Context->advanced_mailer_config->log_errors)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_yes ?></option>
					<option value="N"<?php if(!toBool($__Context->advanced_mailer_config->log_errors)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_no ?></option>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="advanced_mailer_log_sent_sms"><?php echo $lang->cmd_advanced_mailer_log_sms ?></label>
			<div class="x_controls">
				<select name="log_sent_sms" id="advanced_mailer_log_sent_sms">
					<option value="Y"<?php if(toBool($__Context->advanced_mailer_config->log_sent_sms)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_yes ?></option>
					<option value="N"<?php if(!toBool($__Context->advanced_mailer_config->log_sent_sms)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_no ?></option>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_log_sms_errors ?></label>
			<div class="x_controls">
				<select name="log_sms_errors" id="advanced_mailer_log_sms_errors">
					<option value="Y"<?php if(toBool($__Context->advanced_mailer_config->log_sms_errors)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_yes ?></option>
					<option value="N"<?php if(!toBool($__Context->advanced_mailer_config->log_sms_errors)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_no ?></option>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="advanced_mailer_log_sent_push"><?php echo $lang->cmd_advanced_mailer_log_push ?></label>
			<div class="x_controls">
				<select name="log_sent_push" id="advanced_mailer_log_sent_push">
					<option value="Y"<?php if(toBool($__Context->advanced_mailer_config->log_sent_push)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_yes ?></option>
					<option value="N"<?php if(!toBool($__Context->advanced_mailer_config->log_sent_push)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_no ?></option>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_log_push_errors ?></label>
			<div class="x_controls">
				<select name="log_push_errors" id="advanced_mailer_log_push_errors">
					<option value="Y"<?php if(toBool($__Context->advanced_mailer_config->log_push_errors)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_yes ?></option>
					<option value="N"<?php if(!toBool($__Context->advanced_mailer_config->log_push_errors)){ ?> selected="selected"<?php } ?> /><?php echo $lang->cmd_advanced_mailer_log_no ?></option>
				</select>
			</div>
		</div>
		
	</section>
	
	<div class="btnArea x_clearfix">
		<button type="submit" class="x_btn x_btn-primary x_pull-right"><?php echo $lang->cmd_registration ?></button>
	</div>
	
</form>
