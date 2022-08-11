<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/document/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/document/tpl/document_config/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<form action="./" method="post" class="x_form-horizontal" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="document" />
	<input type="hidden" name="act" value="procDocumentAdminInsertConfig" />
	<input type="hidden" name="xe_validator_id" value="modules/document/tpl/document_config/1" />
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->view_count_option ?></label>
		<div class="x_controls">
			<select name="view_count_option">
				<option value="all"<?php if($__Context->config->view_count_option=='all'){ ?> selected="selected"<?php } ?>><?php echo $lang->view_count_option_all ?></option>
				<option value="some"<?php if($__Context->config->view_count_option=='some'){ ?> selected="selected"<?php } ?>><?php echo $lang->view_count_option_some ?></option>
				<option value="once"<?php if($__Context->config->view_count_option=='once' || !$__Context->config->view_count_option){ ?> selected="selected"<?php } ?>><?php echo $lang->view_count_option_once ?></option>
				<option value="none"<?php if($__Context->config->view_count_option=='none'){ ?> selected="selected"<?php } ?>><?php echo $lang->view_count_option_none ?></option>
			</select>
			<p class="x_help-block"><?php echo $lang->about_view_count_option ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="icons"><?php echo $lang->cmd_pc_icon_setting ?></label>
		<div class="x_controls">
			<select name="icons" id="icons">
				<option value=""><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->pcIconSkinList;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->title ?>"<?php if($__Context->config->icons == $__Context->val->title){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<p id="icons_help" class="x_help-block"><?php echo $lang->about_cmd_pc_icon_setting ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="micons"><?php echo $lang->cmd_mobile_icon_setting ?></label>
		<div class="x_controls">
			<select name="micons" id="micons">
				<option value=""><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->pcIconSkinList;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->title ?>"<?php if($__Context->config->micons == $__Context->val->title){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<p id="micons_help" class="x_help-block"><?php echo $lang->about_cmd_mobile_icon_setting ?></p>
		</div>
	</div>
	<div class="btnArea x_clearfix">
		<span class="x_pull-right" style="margin-left:10px;"><input class="btn" type="button" value="<?php echo $lang->cmd_delete_all_thumbnail ?>" onclick="doDeleteAllThumbnail()"/></span>
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
