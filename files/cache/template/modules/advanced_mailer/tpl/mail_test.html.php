<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/advanced_mailer/tpl','common.html') ?>
<!--#Meta:modules/advanced_mailer/tpl/css/config.css--><?php Context::loadFile(['modules/advanced_mailer/tpl/css/config.css', '', '', '', []]); ?>
<!--#Meta:modules/advanced_mailer/tpl/js/config.js--><?php Context::loadFile(['modules/advanced_mailer/tpl/js/config.js', '', '', '']); ?>
<form class="x_form-horizontal" action="./" method="post" id="advanced_mailer"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="advanced_mailer" />
	<input type="hidden" name="act" value="procAdvanced_mailerAdminTestSendMail" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	
	<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	
	<section class="section">
		
		<h2><?php echo $lang->cmd_advanced_mailer_mail_test ?></h2>
		
		<div class="x_control-group">
			<label class="x_control-label" for="advanced_mailer_recipient_name"><?php echo $lang->cmd_advanced_mailer_recipient_name ?></label>
			<div class="x_controls">
				<input type="text" id="advanced_mailer_recipient_name" value="<?php echo Context::get('logged_info')->nick_name ?>" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="advanced_mailer_recipient_email"><?php echo $lang->cmd_advanced_mailer_recipient_email ?></label>
			<div class="x_controls">
				<input type="text" id="advanced_mailer_recipient_email" value="<?php echo Context::get('logged_info')->email_address ?>" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_test_result ?></label>
			<div class="x_controls">
				<div id="advanced_mailer_test_result"></div>
			</div>
		</div>
		
	</section>
	
	<div class="btnArea x_clearfix">
		<button id="advanced_mailer_test_send_mail" type="submit" class="x_btn x_btn-primary x_pull-right"><?php echo $lang->cmd_advanced_mailer_send ?></button>
	</div>
	
</form>
