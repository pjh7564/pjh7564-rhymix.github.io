<?php if(!defined("__XE__"))exit;?><section class="section">
	<h1><?php echo $lang->comment ?></h1>
	<?php Context::addJsFile("modules/comment/ruleset/insertCommentModuleConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertCommentModuleConfig" />
		<input type="hidden" name="module" value="comment" />
		<input type="hidden" name="act" value="procCommentInsertModuleConfig" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		<input type="hidden" name="target_module_srl" value="<?php echo $__Context->module_info->module_srl?$__Context->module_info->module_srl:$__Context->module_srls ?>" />
		<div class="x_control-group">
			<label for="comment_count" class="x_control-label"><?php echo $lang->comment_count ?></label>
			<div class="x_controls">
				<input type="number" min="1" name="comment_count" id="comment_count" value="<?php echo $__Context->comment_config->comment_count ?>" />
				<p class="x_help-inline"><?php echo $lang->about_comment_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="comment_count" class="x_control-label"><?php echo $lang->comment_page_count ?></label>
			<div class="x_controls">
				<input type="number" min="1" name="comment_page_count" id="comment_page_count" value="<?php echo $__Context->comment_config->comment_page_count ?>" />
				<p class="x_help-inline"><?php echo $lang->about_comment_page_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="comment_count" class="x_control-label"><?php echo $lang->comment_default_page ?></label>
			<div class="x_controls">
				<select name="default_page" id="default_page">
					<option value="first"<?php if($__Context->comment_config->default_page === 'first'){ ?> selected="selected"<?php } ?>><?php echo $lang->comment_default_page_first ?></option>
					<option value="last"<?php if($__Context->comment_config->default_page !== 'first'){ ?> selected="selected"<?php } ?>><?php echo $lang->comment_default_page_last ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label for="use_vote_up" class="x_control-label"><?php echo $lang->cmd_vote ?></label>
			<div class="x_controls">
				<select name="use_vote_up" id="use_vote_up">
					<option value="Y"<?php if($__Context->comment_config->use_vote_up=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->use ?></option>
					<option value="S"<?php if($__Context->comment_config->use_vote_up=='S'){ ?> selected="selected"<?php } ?>><?php echo $lang->use_and_display ?></option>
					<option value="N"<?php if($__Context->comment_config->use_vote_up=='N'){ ?> selected="selected"<?php } ?>><?php echo $lang->notuse ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label for="use_vote_down" class="x_control-label"><?php echo $lang->cmd_vote_down ?></label>
			<div class="x_controls">
				<select name="use_vote_down" id="use_vote_down">
					<option value="Y"<?php if($__Context->comment_config->use_vote_down=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->use ?></option>
					<option value="S"<?php if($__Context->comment_config->use_vote_down=='S'){ ?> selected="selected"<?php } ?>><?php echo $lang->use_and_display ?></option>
					<option value="N"<?php if($__Context->comment_config->use_vote_down=='N'){ ?> selected="selected"<?php } ?>><?php echo $lang->notuse ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label for="use_comment_validation" class="x_control-label"><?php echo $lang->cmd_comment_validation ?></label>
			<div class="x_controls">
				<select name="use_comment_validation" id="use_comment_validation">
					<option value="N"<?php if($__Context->comment_config->use_comment_validation=='N'){ ?> selected="selected"<?php } ?>><?php echo $lang->notuse ?></option>
					<option value="Y"<?php if($__Context->comment_config->use_comment_validation=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->use ?></option>
				</select>
				<p class="x_help-inline"><?php echo $lang->about_comment_validation ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo lang('document.cmd_declared_message') ?></label>
			<div class="x_controls">
				<label class="x_inline" for="comment_declared_message_admin"><input type="checkbox" name="declared_message[]" id="comment_declared_message_admin" value="admin"<?php if($__Context->comment_config->declared_message && in_array('admin', $__Context->comment_config->declared_message)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_declared_message_admin ?></label>
				<label class="x_inline" for="comment_declared_message_manager"><input type="checkbox" name="declared_message[]" id="comment_declared_message_manager" value="manager"<?php if($__Context->comment_config->declared_message && in_array('manager', $__Context->comment_config->declared_message)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_declared_message_manager ?></label>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</div>
	</form>
</section>
