<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/integration_search/tpl','header.html') ?>
<!--#Meta:modules/module/tpl/js/module_list.js--><?php Context::loadFile(['modules/module/tpl/js/module_list.js', '', '', '']); ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/integration_search/tpl/index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/integration_search/ruleset/insertConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertConfig" />
	<input type="hidden" name="act" value="procIntegration_searchAdminInsertConfig" />
	<input type="hidden" name="module" value="admin" />
	<input type="hidden" name="xe_validator_id" value="modules/integration_search/tpl/index/1" />
	<div class="x_control-group">
		<label for="sample_code" class="x_control-label"><?php echo $lang->sample_code ?></label>
		<div class="x_controls" style="margin-right:14px">
			<textarea id="sample_code" readonly style="width:100%;height:100px;cursor:text;font-family:'Courier New', Courier, monospace"><?php echo $__Context->sample_code ?></textarea>
			<p class="x_help-block"><?php echo $lang->about_sample_code ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label for="skin" class="x_control-label"><?php echo $lang->skin ?></label>
		<div class="x_controls">
			<select name="skin" id="skin">
				<?php $__loop_tmp=$__Context->skin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option  value="<?php echo $__Context->key ?>"<?php if($__Context->config->skin == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label for="mskin" class="x_control-label"><?php echo $lang->mobile_skin ?></label>
		<div class="x_controls">
			<select name="mskin" id="mskin">
				<?php $__loop_tmp=$__Context->mskin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option  value="<?php echo $__Context->key ?>"<?php if($__Context->config->mskin == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->target ?></label>
		<div class="x_controls">
			<select name="target">
				<option value="include"><?php echo $lang->include_search_target ?></option>
				<option value="exclude"<?php if($__Context->config->target=='exclude'){ ?> selected="selected"<?php } ?>><?php echo $lang->exclude_search_target ?></option>
			</select>
			<input type="hidden" name="target_module_srl" id="target_module_srl" value="<?php echo $__Context->config->target_module_srl ?>" />
			<select class="modulelist_selected" size="8" multiple="multiple" style="display:block;vertical-align:top;margin:5px 0"></select>
			<a href="#" id="__module_srl_list_target_module_srl" class="x_btn moduleTrigger" data-multiple="true" style="margin:0 -5px 0 0;border-radius:2px 0 0 0px"><?php echo $lang->cmd_add ?></a>
			<button type="button" class="x_btn modulelist_del" style="border-radius:0 2px 2px 0"><?php echo $lang->cmd_delete ?></button>
			<p class="x_help-block"><strong><?php echo $lang->about_target_module ?></strong></p>
			<script>
				xe.registerApp(new xe.ModuleListManager('target_module_srl'));
			</script>
		</div>
	</div>
	<div class="btnArea">
		<button class="x_btn x_btn-primary" type="submit"><?php echo $lang->cmd_registration ?></button>
	</div>
</form>
