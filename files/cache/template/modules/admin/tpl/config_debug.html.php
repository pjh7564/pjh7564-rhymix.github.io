<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<?php if(!empty($__Context->XE_VALIDATOR_MESSAGE) && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_debug/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
	<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminUpdateDebug" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_debug/1" />
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->debug_enabled ?></label>
			<div class="x_controls">
				<label for="debug_enabled_y" class="x_inline"><input type="radio" name="debug_enabled" id="debug_enabled_y" value="Y"<?php if($__Context->debug_enabled){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="debug_enabled_n" class="x_inline"><input type="radio" name="debug_enabled" id="debug_enabled_n" value="N"<?php if(!$__Context->debug_enabled){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_log_slow_queries"><?php echo $lang->debug_log_slow_queries ?></label>
			<div class="x_controls">
				<input type="text" name="debug_log_slow_queries" id="debug_log_slow_queries" size="5" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->debug_log_slow_queries, ENT_QUOTES, 'UTF-8', false) : ($__Context->debug_log_slow_queries)) ?>" style="width:60px" />
				&nbsp;<?php echo $lang->debug_seconds ?>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_log_slow_triggers"><?php echo $lang->debug_log_slow_triggers ?></label>
			<div class="x_controls">
				<input type="text" name="debug_log_slow_triggers" id="debug_log_slow_triggers" size="5" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->debug_log_slow_triggers, ENT_QUOTES, 'UTF-8', false) : ($__Context->debug_log_slow_triggers)) ?>" style="width:60px" />
				&nbsp;<?php echo $lang->debug_seconds ?>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_log_slow_widgets"><?php echo $lang->debug_log_slow_widgets ?></label>
			<div class="x_controls">
				<input type="text" name="debug_log_slow_widgets" id="debug_log_slow_widgets" size="5" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->debug_log_slow_widgets, ENT_QUOTES, 'UTF-8', false) : ($__Context->debug_log_slow_widgets)) ?>" style="width:60px" />
				&nbsp;<?php echo $lang->debug_seconds ?>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_log_slow_remote_requests"><?php echo $lang->debug_log_slow_remote_requests ?></label>
			<div class="x_controls">
				<input type="text" name="debug_log_slow_remote_requests" id="debug_log_slow_remote_requests" size="5" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->debug_log_slow_remote_requests, ENT_QUOTES, 'UTF-8', false) : ($__Context->debug_log_slow_remote_requests)) ?>" style="width:60px" />
				&nbsp;<?php echo $lang->debug_seconds ?>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_log_slow_widgets"><?php echo $lang->debug_display_type ?></label>
			<div class="x_controls">
				<label for="debug_display_type_comment" class="x_inline"><input type="checkbox" name="debug_display_type[]" id="debug_display_type_comment" value="comment"<?php if(in_array('comment', $__Context->debug_display_type)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_type_comment ?></label>
				<label for="debug_display_type_panel" class="x_inline"><input type="checkbox" name="debug_display_type[]" id="debug_display_type_panel" value="panel"<?php if(in_array('panel', $__Context->debug_display_type)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_type_panel ?></label>
				<label for="debug_display_type_file" class="x_inline"><input type="checkbox" name="debug_display_type[]" id="debug_display_type_file" value="file"<?php if(in_array('file', $__Context->debug_display_type)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_type_file ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_log_slow_widgets"><?php echo $lang->debug_display_content ?></label>
			<div class="x_controls">
				<label for="debug_display_content_request_info" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_request_info" value="request_info"<?php if(in_array('request_info', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_request_info ?></label>
				<label for="debug_display_content_entries" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_entries" value="entries"<?php if(in_array('entries', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_entries ?></label>
				<label for="debug_display_content_errors" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_errors" value="errors"<?php if(in_array('errors', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_errors ?></label>
				<label for="debug_display_content_queries" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_queries" value="queries"<?php if(in_array('queries', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_queries ?></label>
				<label for="debug_display_content_slow_queries" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_slow_queries" value="slow_queries"<?php if(in_array('slow_queries', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_slow_queries ?></label>
				<label for="debug_display_content_slow_triggers" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_slow_triggers" value="slow_triggers"<?php if(in_array('slow_triggers', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_slow_triggers ?></label>
				<label for="debug_display_content_slow_widgets" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_slow_widgets" value="slow_widgets"<?php if(in_array('slow_widgets', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_slow_widgets ?></label>
				<label for="debug_display_content_slow_remote_requests" class="x_inline"><input type="checkbox" name="debug_display_content[]" id="debug_display_content_slow_remote_requests" value="slow_remote_requests"<?php if(in_array('slow_remote_requests', $__Context->debug_display_content)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_content_slow_remote_requests ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_log_filename"><?php echo $lang->debug_log_filename ?></label>
			<div class="x_controls">
				<input type="text" name="debug_log_filename" id="debug_log_filename" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->debug_log_filename, ENT_QUOTES, 'UTF-8', false) : ($__Context->debug_log_filename)) ?>" style="min-width: 80%" />
				<p class="x_help-block"><?php echo $lang->about_debug_log_filename ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->debug_display_to ?></label>
			<div class="x_controls">
				<label for="debug_display_to_admin" class="x_inline"><input type="radio" name="debug_display_to" id="debug_display_to_admin" value="admin"<?php if($__Context->debug_display_to=='admin'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_to_admin ?></label>
				<label for="debug_display_to_ip" class="x_inline"><input type="radio" name="debug_display_to" id="debug_display_to_ip" value="ip"<?php if($__Context->debug_display_to=='ip'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_to_ip ?></label>
				<label for="debug_display_to_everyone" class="x_inline"><input type="radio" name="debug_display_to" id="debug_display_to_everyone" value="everyone"<?php if($__Context->debug_display_to=='everyone'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_display_to_everyone ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="debug_allowed_ip"><?php echo $lang->debug_allowed_ip ?></label>
			<div class="x_controls">
				<textarea name="debug_allowed_ip" id="debug_allowed_ip" rows="4" cols="42" placeholder="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->remote_addr, ENT_QUOTES, 'UTF-8', false) : ($__Context->remote_addr)) ?> (<?php echo $lang->local_ip_address ?>)" style="margin-right:10px"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->debug_allowed_ip, ENT_QUOTES, 'UTF-8', false) : ($__Context->debug_allowed_ip)) ?></textarea>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->debug_query_comment ?></label>
			<div class="x_controls">
				<label for="debug_query_comment_Y" class="x_inline"><input type="radio" name="debug_query_comment" id="debug_query_comment_Y" value="Y"<?php if($__Context->debug_query_comment){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="debug_query_comment_N" class="x_inline"><input type="radio" name="debug_query_comment" id="debug_query_comment_N" value="N"<?php if(!$__Context->debug_query_comment){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<p class="x_help-block"><?php echo $lang->about_debug_query_comment ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->debug_write_error_log ?></label>
			<div class="x_controls">
				<label for="debug_write_error_log_all" class="x_inline"><input type="radio" name="debug_write_error_log" id="debug_write_error_log_all" value="all"<?php if($__Context->debug_write_error_log=='all'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_write_error_log_all ?></label>
				<label for="debug_write_error_log_fatal" class="x_inline"><input type="radio" name="debug_write_error_log" id="debug_write_error_log_fatal" value="fatal"<?php if($__Context->debug_write_error_log=='fatal' || !$__Context->debug_write_error_log){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_write_error_log_fatal ?></label>
				<label for="debug_write_error_log_none" class="x_inline"><input type="radio" name="debug_write_error_log" id="debug_write_error_log_none" value="none"<?php if($__Context->debug_write_error_log=='none'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->debug_write_error_log_none ?></label>
				<p class="x_help-block"><?php echo $lang->about_debug_write_error_log ?></p>
				<p class="x_help-block"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(sprintf($lang->about_debug_error_log_path, escape(ini_get('error_log')) ?: $lang->about_debug_error_log_path_empty), ENT_QUOTES, 'UTF-8', false) : (sprintf($lang->about_debug_error_log_path, escape(ini_get('error_log')) ?: $lang->about_debug_error_log_path_empty))) ?></p>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
