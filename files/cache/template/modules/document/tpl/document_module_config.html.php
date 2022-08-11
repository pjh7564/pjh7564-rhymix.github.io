<?php if(!defined("__XE__"))exit;?><section class="section">
	<h1><?php echo $lang->document ?></h1>
	<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="document" />
		<input type="hidden" name="act" value="procDocumentInsertModuleConfig" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		<input type="hidden" name="target_module_srl" value="<?php echo $__Context->module_info->module_srl?$__Context->module_info->module_srl:$__Context->module_srls ?>" />
		<div class="x_control-group">
			<label for="use_history" class="x_control-label"><?php echo $lang->history ?></label>
			<div class="x_controls">
				<select name="use_history" id="use_history">
					<option value="N"<?php if($__Context->document_config->use_history=='N'){ ?> selected="selected"<?php } ?>><?php echo $lang->notuse ?></option>
					<option value="Y"<?php if($__Context->document_config->use_history=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->use ?></option>
					<option value="Trace"<?php if($__Context->document_config->use_history=='Trace'){ ?> selected="selected"<?php } ?>><?php echo $lang->trace_only ?></option>
				</select>
				<p class="x_help-inline"><?php echo $lang->about_use_history ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="use_vote_up" class="x_control-label"><?php echo $lang->cmd_vote ?></label>
			<div class="x_controls">
				<select name="use_vote_up" id="use_vote_up">
					<option value="Y"<?php if($__Context->document_config->use_vote_up=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->use ?></option>
					<option value="S"<?php if($__Context->document_config->use_vote_up=='S'){ ?> selected="selected"<?php } ?>><?php echo $lang->use_and_display ?></option>
					<option value="N"<?php if($__Context->document_config->use_vote_up=='N'){ ?> selected="selected"<?php } ?>><?php echo $lang->notuse ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label for="use_vote_down" class="x_control-label"><?php echo $lang->cmd_vote_down ?></label>
			<div class="x_controls">
				<select name="use_vote_down" id="use_vote_down">
					<option value="Y"<?php if($__Context->document_config->use_vote_down=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->use ?></option>
					<option value="S"<?php if($__Context->document_config->use_vote_down=='S'){ ?> selected="selected"<?php } ?>><?php echo $lang->use_and_display ?></option>
					<option value="N"<?php if($__Context->document_config->use_vote_down=='N'){ ?> selected="selected"<?php } ?>><?php echo $lang->notuse ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_declared_message ?></label>
			<div class="x_controls">
				<label class="x_inline" for="document_declared_message_admin"><input type="checkbox" name="declared_message[]" id="document_declared_message_admin" value="admin"<?php if($__Context->document_config->declared_message && in_array('admin', $__Context->document_config->declared_message)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_declared_message_admin ?></label>
				<label class="x_inline" for="document_declared_message_manager"><input type="checkbox" name="declared_message[]" id="document_declared_message_manager" value="manager"<?php if($__Context->document_config->declared_message && in_array('manager', $__Context->document_config->declared_message)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_declared_message_manager ?></label>
			</div>
		</div>
		<div class="btnArea">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</div>
	</form>
</section>
