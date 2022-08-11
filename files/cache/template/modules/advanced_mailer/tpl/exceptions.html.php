<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/advanced_mailer/tpl','common.html') ?>
<!--#Meta:modules/advanced_mailer/tpl/css/config.css--><?php Context::loadFile(['modules/advanced_mailer/tpl/css/config.css', '', '', '', []]); ?>
<form class="x_form-horizontal" action="./" method="post" id="advanced_mailer"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="advanced_mailer" />
	<input type="hidden" name="act" value="procAdvanced_mailerAdminInsertExceptions" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	
	<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	
	<section class="section">
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_sending_method_default ?></label>
			<div class="x_controls margin-top">
				<?php echo $__Context->sending_methods[$__Context->sending_method]['name'] ?>
				<?php if($__Context->sending_method === 'woorimail'){ ?>
					<?php if(config('mail.woorimail.api_type') === 'free'){ ?>
						(<?php echo $lang->cmd_advanced_mailer_api_type_free ?>)
					<?php }else{ ?>
						(<?php echo $lang->cmd_advanced_mailer_api_type_paid ?>)
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		
	</section>
	
	<?php for($__Context->i = 1; $__Context->i <= 3; $__Context->i++){ ?>
	<section class="section">
		
		<h2 style="padding-top:12px"><?php echo $lang->cmd_advanced_mailer_exception_group ?> <?php echo $__Context->i ?></h2>
		
		<div class="x_control-group">
			<label class="x_control-label" for="advanced_mailer_exception_<?php echo $__Context->i ?>_method"><?php echo $lang->cmd_advanced_mailer_sending_method ?></label>
			<div class="x_controls">
				<select name="exception_<?php echo $__Context->i ?>_method" id="advanced_mailer_exception_<?php echo $__Context->i ?>_method">
				<option value="default"><?php echo $lang->cmd_advanced_mailer_exception_disabled ?></option>
					<?php if($__Context->sending_methods)foreach($__Context->sending_methods as $__Context->driver_name => $__Context->driver_definition){ ?>
						<option value="<?php echo $__Context->driver_name ?>"<?php if($__Context->advanced_mailer_config->exceptions[$__Context->i]['method'] === $__Context->driver_name){ ?> selected="selected"<?php } ?>><?php echo $__Context->driver_definition['name'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="advanced_mailer_exception_<?php echo $__Context->i ?>_domains"><?php echo $lang->cmd_advanced_mailer_exception_domains_list ?></label>
			<div class="x_controls">
				<textarea name="exception_<?php echo $__Context->i ?>_domains" id="advanced_mailer_exception_<?php echo $__Context->i ?>_domains" class="exception-domains"><?php echo implode(', ', $__Context->advanced_mailer_config->exceptions[$__Context->i]['domains']) ?></textarea>
				<p class="x_help-block"><?php echo $lang->cmd_advanced_mailer_about_exception_domains_list ?></p>
			</div>
		</div>
		
	</section>
	<?php } ?>
	
	<div style="margin-top:32px">
		※ <?php echo $lang->cmd_advanced_mailer_about_exception_domains ?>
	</div>
	
	<div class="btnArea x_clearfix">
		<button type="submit" class="x_btn x_btn-primary x_pull-right"><?php echo $lang->cmd_registration ?></button>
	</div>
	
</form>
