<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/ncenterlite/tpl/js/ncenter_admin.js--><?php Context::loadFile(['modules/ncenterlite/tpl/js/ncenter_admin.js', '', '', '']); ?>
<!--#Meta:modules/ncenterlite/tpl/css/ncenter_admin.css--><?php Context::loadFile(['modules/ncenterlite/tpl/css/ncenter_admin.css', '', '', '', []]); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/ncenterlite/tpl','header.html') ?>
<?php Context::addJsFile("modules/ncenterlite/ruleset/insertConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal" id="fo_ncenterlite"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertConfig" />
	<input type="hidden" name="module" value="ncenterlite" />
	<input type="hidden" name="disp_act" value="dispNcenterliteAdminConfig" />
	<input type="hidden" name="act" value="procNcenterliteAdminInsertConfig" />
	<section class="section">
		<div class="x_control-group">
			<?php if($__Context->notify_types)foreach($__Context->notify_types as $__Context->notify_type => $__Context->notify_srl){ ?>
			<?php if($__Context->notify_srl > 0 && lang('ncenterlite_type_' . $__Context->notify_type) === 'ncenterlite_type_' . $__Context->notify_type){ ?>
			<label class="x_control-label"><?php echo $__Context->notify_type ?> <?php echo $lang->ncenterlite_notify ?></label>
			<?php }else{ ?>
			<label class="x_control-label"><?php echo $lang->get('ncenterlite_type_' . $__Context->notify_type) ?></label>
			<?php } ?>
				<div class="x_controls">
					<label class="x_inline"><input type="checkbox" name="use[<?php echo $__Context->notify_type ?>][web]" value="1"<?php if(isset($__Context->config->use[$__Context->notify_type]['web'])){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_web_notify ?></label>
					<label class="x_inline"><input type="checkbox" name="use[<?php echo $__Context->notify_type ?>][mail]" value="1"<?php if(isset($__Context->config->use[$__Context->notify_type]['mail'])){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_mail_notify ?></label>
					<label class="x_inline"<?php if(!$__Context->sms_available){ ?> disabled="disabled"<?php } ?>><input type="checkbox" name="use[<?php echo $__Context->notify_type ?>][sms]" value="1"<?php if(!$__Context->sms_available){ ?> disabled="disabled"<?php };
if(isset($__Context->config->use[$__Context->notify_type]['sms'])){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_sms_notify ?></label>
					<label class="x_inline"<?php if(!$__Context->push_available){ ?> disabled="disabled"<?php } ?>><input type="checkbox" name="use[<?php echo $__Context->notify_type ?>][push]" value="1"<?php if(!$__Context->push_available){ ?> disabled="disabled"<?php };
if(isset($__Context->config->use[$__Context->notify_type]['push'])){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_push_notify ?></label>
				</div>
			<?php } ?>
			<label class="x_control-label">&nbsp;</label>
			<div class="x_controls">
				<p class="x_help-block"><?php echo $lang->ncenterlite_use_help ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="display_use"><?php echo $lang->ncenterlite_display ?></label>
			<div class="x_controls">
				<select name="display_use" id="display_use">
					<option value="all"<?php if($__Context->config->display_use == 'all'){ ?> selected="selected"<?php } ?>><?php echo $lang->ncenterlite_display_all ?></option>
					<option value="none"<?php if($__Context->config->display_use == 'none'){ ?> selected="selected"<?php } ?>><?php echo $lang->ncenterlite_display_none ?></option>
					<option value="pc"<?php if($__Context->config->display_use == 'pc'){ ?> selected="selected"<?php } ?>><?php echo $lang->ncenterlite_display_pc ?></option>
					<option value="mobile"<?php if($__Context->config->display_use == 'mobile'){ ?> selected="selected"<?php } ?>><?php echo $lang->ncenterlite_display_mobile ?></option>
				</select>
				<p class="x_help-block"><?php echo $lang->ncenterlite_display_about ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->ncenterlite_always_display ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="always_display_y" name="always_display" value="Y"<?php if($__Context->config->always_display == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->use ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="always_display_n" name="always_display" value="N"<?php if($__Context->config->always_display != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->notuse ?>
				</label>
				<p class="x_help-block"><?php echo $lang->ncenterlite_always_display_about ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->member_menu_view ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="user_config_list_id" name="user_config_list" value="Y"<?php if($__Context->config->user_config_list == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->member_menu_on ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="user_config_list_nick_name" name="user_config_list" value="N"<?php if($__Context->config->user_config_list != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->member_menu_off ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_member_menu_view ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->user_notify_setting ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="user_notify_setting_y" name="user_notify_setting" value="Y"<?php if($__Context->config->user_notify_setting == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->use ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="user_notify_setting_n" name="user_notify_setting" value="N"<?php if($__Context->config->user_notify_setting != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->notuse ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_user_notify_setting ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->ncenterlite_document_event_read ?></label>
			<div class="x_controls">
				<label class="x_inline"><input type="radio" name="document_read" value="Y"<?php if($__Context->config->document_read == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->ncenterlite_document_event_read_delete ?></label>
				<label class="x_inline"><input type="radio" name="document_read" value="N"<?php if($__Context->config->document_read != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->ncenterlite_document_event_read_preserve ?></label>
				<p class="x_help-block"><?php echo $lang->ncenterlite_document_event_read_about ?></p>
			</div>
		</div>
	</section>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button class="x_btn x_btn-primary" type="submit"><?php echo $lang->cmd_registration ?></button>
		</div>
	</div>
</form>
