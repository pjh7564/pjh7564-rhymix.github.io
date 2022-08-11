<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/advanced_mailer/tpl','common.html') ?>
<!--#Meta:modules/advanced_mailer/tpl/css/spf_dkim.css--><?php Context::loadFile(['modules/advanced_mailer/tpl/css/spf_dkim.css', '', '', '', []]); ?>
<!--#Meta:modules/advanced_mailer/tpl/js/spf_dkim.js--><?php Context::loadFile(['modules/advanced_mailer/tpl/js/spf_dkim.js', '', '', '']); ?>
<div id="spf_dkim_setting" class="x_form-horizontal"
	data-nothing-to-check="<?php echo $lang->cmd_advanced_mailer_nothing_to_check ?>"
	data-check-no-records="<?php echo $lang->cmd_advanced_mailer_check_no_records ?>"
	data-check-failure="<?php echo $lang->cmd_advanced_mailer_check_failure ?>"
	data-check-result="<?php echo $lang->cmd_advanced_mailer_check_result ?>">
	
	<div class="advanced_mailer_description">
		※ <?php echo $lang->cmd_advanced_mailer_about_spf_dkim_setting ?>
	</div>
	
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
	
	<?php if(count($__Context->used_methods) > 1){ ?><div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_sending_method_exceptions ?></label>
		<div class="x_controls">
			<?php if($__Context->advanced_mailer_config->exceptions)foreach($__Context->advanced_mailer_config->exceptions as $__Context->exception){ ?>
			<?php if(in_array($__Context->exception['method'], $__Context->used_methods)){ ?>
			<div class="spf_dkim_item">
				<?php echo $__Context->sending_methods[$__Context->exception['method']]['name'] ?>
				<?php if($__Context->exception['method'] === 'woorimail'){ ?>
					<?php if(config('mail.woorimail.api_type') === 'free'){ ?>
						(<?php echo $lang->cmd_advanced_mailer_api_type_free ?>)
					<?php }else{ ?>
						(<?php echo $lang->cmd_advanced_mailer_api_type_paid ?>)
					<?php } ?>
				<?php } ?>
				&mdash; <?php echo sprintf($lang->cmd_advanced_mailer_domain_count, count($__Context->exception['domains'])) ?>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
	</div><?php } ?>
	
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->cmd_advanced_mailer_sender_email ?></label>
		<div class="x_controls margin-top"><?php echo $__Context->advanced_mailer_config->sender_email ?></div>
	</div>
	
	<?php  $__Context->ignore_domains = '/^(g(oogle)?mail\.com|(daum|hanmail2?)\.net|(naver|outlook|hotmail|yahoo)\.com|(hotmail|yahoo)\.co\.kr)$/i' ?>
	
	<div class="x_control-group">
		<label class="x_control-label">SPF</label>
		<div class="x_controls">
			<?php if(preg_match($__Context->ignore_domains, $__Context->sending_domain)){ ?>
			<div class="spf_dkim_item">
				<?php echo $lang->cmd_advanced_mailer_not_applicable_because_sender_domain ?>
			</div>
			<?php }elseif(!count($__Context->used_methods_with_usable_spf)){ ?>
			<div class="spf_dkim_item">
				<?php echo $lang->cmd_advanced_mailer_not_applicable_because_sending_method ?>
			</div>
			<?php }else{ ?>
				<div class="spf_dkim_item">
					<span class="label"><?php echo $lang->cmd_advanced_mailer_dns_hostname ?></span>
					<span class="monospace"><?php echo $__Context->sending_domain ?></span> &nbsp;
					<a href="#" id="advanced_mailer_check_spf"><?php echo $lang->cmd_advanced_mailer_check ?></a>
				</div>
				<div class="spf_dkim_item">
					<span class="label"><?php echo $lang->cmd_advanced_mailer_txt_record ?></span>
					<span class="monospace">v=spf1 a mx <?php echo implode(' ', $__Context->used_methods_with_usable_spf) ?> ~all</span>
				</div>
				<?php  $__Context->other_infos = array() ?>
				<?php if($__Context->used_methods_with_usable_spf)foreach($__Context->used_methods_with_usable_spf as $__Context->method => $__Context->spf){ ?>
				<?php  $__Context->other_info = Context::getLang('cmd_advanced_mailer_other_info_' . $__Context->method . '_spf') ?>
				<?php  if(strncmp('cmd_', $__Context->other_info, 4)) $__Context->other_infos[] = $__Context->other_info ?>
				<?php } ?>
				<?php if(count($__Context->other_infos)){ ?><div class="spf_dkim_item">
					<?php if($__Context->other_infos)foreach($__Context->other_infos as $__Context->other_info){ ?>
					<span class="label"><?php echo $lang->cmd_advanced_mailer_other_info ?></span>
					<span><?php echo $__Context->other_info ?></span><br />
					<?php } ?>
				</div><?php } ?>
			<?php } ?>
		</div>
	</div>
	
	<div class="x_control-group">
		<label class="x_control-label">DKIM</label>
		<div class="x_controls">
			<?php if(preg_match($__Context->ignore_domains, $__Context->sending_domain)){ ?>
			<div class="spf_dkim_item">
				<?php echo $lang->cmd_advanced_mailer_not_applicable_because_sender_domain ?>
			</div>
			<?php }elseif(!count($__Context->used_methods_with_usable_dkim)){ ?>
			<div class="spf_dkim_item">
				<?php echo $lang->cmd_advanced_mailer_not_applicable_because_sending_method ?>
			</div>
			<?php }else{ ?>
				<?php if($__Context->used_methods_with_usable_dkim)foreach($__Context->used_methods_with_usable_dkim as $__Context->method => $__Context->dkim){ ?>
				<div class="spf_dkim_item">
					<span class="label"><?php echo $lang->cmd_advanced_mailer_dns_hostname ?></span>
					<span class="monospace"><?php echo $__Context->dkim ?>.<?php echo $__Context->sending_domain ?></span> &nbsp;
					<a href="#" id="advanced_mailer_check_spf"><?php echo $lang->cmd_advanced_mailer_check ?></a>
				</div>
				<div class="spf_dkim_item">
					<span class="label"><?php echo $lang->cmd_advanced_mailer_txt_record ?></span>
					<span class="monospace">v=DKIM1; k=rsa; p=MIGfMA...<?php echo $lang->cmd_advanced_mailer_ellipsis ?>...QAB;</span>
				</div>
				<?php  $__Context->other_info = Context::getLang('cmd_advanced_mailer_other_info_' . $__Context->method . '_dkim') ?>
				<?php  if(!strncmp('cmd_', $__Context->other_info, 4)) $__Context->other_info = false ?>
				<?php if($__Context->other_info){ ?><div class="spf_dkim_item">
					<span class="label"><?php echo $lang->cmd_advanced_mailer_other_info ?></span>
					<span><?php echo $__Context->other_info ?></span><br />
				</div><?php } ?>
				<div class="spf_dkim_separator"></div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
