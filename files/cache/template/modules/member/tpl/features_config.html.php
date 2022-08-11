<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<!--#Meta:modules/member/tpl/js/default_config.js--><?php Context::loadFile(['modules/member/tpl/js/default_config.js', '', '', '']); ?>
<form action="./" class="x_form-horizontal" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertFeaturesConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_view_scrapped_document ?></div>
		<div class="x_controls">
			<label class="x_inline" for="scrapped_documents_Y"><input type="radio" name="scrapped_documents" id="scrapped_documents_Y" value="Y"<?php if($__Context->config->features['scrapped_documents'] !== false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="scrapped_documents_N"><input type="radio" name="scrapped_documents" id="scrapped_documents_N" value="N"<?php if($__Context->config->features['scrapped_documents'] === false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_view_saved_document ?></div>
		<div class="x_controls">
			<label class="x_inline" for="saved_documents_Y"><input type="radio" name="saved_documents" id="saved_documents_Y" value="Y"<?php if($__Context->config->features['saved_documents'] !== false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="saved_documents_N"><input type="radio" name="saved_documents" id="saved_documents_N" value="N"<?php if($__Context->config->features['saved_documents'] === false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_view_own_document ?></div>
		<div class="x_controls">
			<label class="x_inline" for="my_documents_Y"><input type="radio" name="my_documents" id="my_documents_Y" value="Y"<?php if($__Context->config->features['my_documents'] !== false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="my_documents_N"><input type="radio" name="my_documents" id="my_documents_N" value="N"<?php if($__Context->config->features['my_documents'] === false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_view_own_comment ?></div>
		<div class="x_controls">
			<label class="x_inline" for="my_comments_Y"><input type="radio" name="my_comments" id="my_comments_Y" value="Y"<?php if($__Context->config->features['my_comments'] !== false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="my_comments_N"><input type="radio" name="my_comments" id="my_comments_N" value="N"<?php if($__Context->config->features['my_comments'] === false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_view_active_logins ?></div>
		<div class="x_controls">
			<label class="x_inline" for="active_logins_Y"><input type="radio" name="active_logins" id="active_logins_Y" value="Y"<?php if($__Context->config->features['active_logins'] !== false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="active_logins_N"><input type="radio" name="active_logins" id="active_logins_N" value="N"<?php if($__Context->config->features['active_logins'] === false){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $lang->cmd_modify_nickname_log ?></div>
		<div class="x_controls">
			<label class="x_inline" for="nickname_log_Y"><input type="radio" name="nickname_log" id="nickname_log_Y" value="Y"<?php if($__Context->config->update_nickname_log === 'Y' && $__Context->config->features['nickname_log'] !== false){ ?> checked="checked"<?php };
if($__Context->config->update_nickname_log !== 'Y'){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="nickname_log_N"><input type="radio" name="nickname_log" id="nickname_log_N" value="N"<?php if($__Context->config->update_nickname_log !== 'Y' || $__Context->config->features['nickname_log'] === false){ ?> checked="checked"<?php };
if($__Context->config->update_nickname_log !== 'Y'){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="btnArea x_clearfix">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
