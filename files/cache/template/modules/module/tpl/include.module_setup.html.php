<?php if(!defined("__XE__"))exit;
Context::addJsFile("modules/module/ruleset/insertModuleSetup.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal" id="manageSelectedModuleSetup"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertModuleSetup" />
	<input type="hidden" name="module" value="module" />
	<input type="hidden" name="act" value="procModuleAdminModuleSetup" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	<input type="hidden" name="module_srls" value="" />
	<input type="hidden" name="xe_validator_id" value="modules/module/tpl/manage_selected" />
	<div class="x_control-group">
		<label class="x_control-label" for="module_category_srl"><?php echo $lang->module_category ?></label>
		<div class="x_controls">
			<select name="module_category_srl" id="module_category_srl">
				<option value="" selected="selected"><?php echo $lang->keep_existing_value ?></option>
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->module_category;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if(isset($__Context->module_info) && $__Context->module_info && $__Context->module_info->module_category_srl==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<p class="x_help-inline"><?php echo $lang->about_module_category ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="layout_srl"><?php echo $lang->layout ?></label>
		<div class="x_controls">
			<select name="layout_srl" id="layout_srl">
				<option value="" selected="selected"><?php echo $lang->keep_existing_value ?></option>
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->layout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if(isset($__Context->module_info) && $__Context->module_info && $__Context->module_info->layout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
			<p class="x_help-inline"><?php echo $lang->about_layout ?></p>
		</div>
	</div>
	<?php if(count($__Context->skin_list)){ ?><div class="x_control-group">
		<label class="x_control-label" for="skin"><?php echo $lang->skin ?></label>
		<div class="x_controls">
			<select name="skin" id="skin">
				<option value="" selected="selected"><?php echo $lang->keep_existing_value ?></option>
				<?php $__loop_tmp=$__Context->skin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if(isset($__Context->module_info) && $__Context->module_info && $__Context->module_info->skin==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<p class="x_help-inline"><?php echo $lang->about_skin ?></p>
		</div>
	</div><?php } ?>
	<div class="x_control-group">
		<label class="x_control-label" for="use_mobile"><?php echo $lang->mobile_view ?></label>
		<div class="x_controls">
			<select name="use_mobile" id="use_mobile">
				<option value="" selected="selected"><?php echo $lang->keep_existing_value ?></option>
				<option value="Y"><?php echo $lang->use ?></option>
				<option value="N"><?php echo $lang->notuse ?></option>
			</select>
			<p class="x_help-inline"><?php echo $lang->about_mobile_view ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mlayout_srl"><?php echo $lang->mobile_layout ?></label>
		<div class="x_controls">
			<select name="mlayout_srl" id="mlayout_srl">
				<option value="" selected="selected"><?php echo $lang->keep_existing_value ?></option>
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->mlayout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if(isset($__Context->module_info) && $__Context->module_info && $__Context->module_info->mlayout_srl== $__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mskin"><?php echo $lang->mobile_skin ?></label>
		<div class="x_controls">
			<select name="mskin" id="mskin">
				<option value="" selected="selected"><?php echo $lang->keep_existing_value ?></option>
				<?php $__loop_tmp=$__Context->mskin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if(isset($__Context->module_info) && $__Context->module_info && $__Context->module_info->mskin== $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="description"><?php echo $lang->description ?></label>
		<div class="x_controls">
			<textarea name="description" id="description" rows="8" cols="42"><?php echo htmlspecialchars($__Context->module_info->description ?? '', ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?></textarea>
			<label class="x_inline" for="description_delete"><input name="description_delete" id="description_delete" type="checkbox" value="Y" /> <?php echo $lang->cmd_delete ?></label>
			<p class="x_help-block"><?php echo $lang->about_description ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_header_text"><?php echo $lang->header_text ?></label>
		<div class="x_controls">
			<?php $__Context->use_multilang_textarea=true ?>
			<textarea id="header_text" name="header_text" class="lang_code" rows="8" cols="42"></textarea>
			<label class="x_inline" for="header_text_delete"><input name="header_text_delete" id="header_text_delete" type="checkbox" value="Y" /> <?php echo $lang->cmd_delete ?></label>
			<p class="x_help-block" style="vertical-align:top"><?php echo $lang->about_header_text ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_footer_text"><?php echo $lang->footer_text ?></label>
		<div class="x_controls">
			<textarea id="footer_text" name="footer_text" class="lang_code" rows="8" cols="42"></textarea>
			<label class="x_inline" for="footer_text_delete"><input name="footer_text_delete" id="footer_text_delete" type="checkbox" value="Y" /> <?php echo $lang->cmd_delete ?></label>
			<p class="x_help-block" style="vertical-align:top"><?php echo $lang->about_footer_text ?></p>
		</div>
	</div>
	<div class="btnArea">
		<input type="submit" class="x_btn x_btn-primary" value="<?php echo $lang->cmd_registration ?>" />
	</div>
</form>
