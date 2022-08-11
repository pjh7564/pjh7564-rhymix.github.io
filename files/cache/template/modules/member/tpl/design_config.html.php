<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<!--#Meta:modules/member/tpl/js/design_config.js--><?php Context::loadFile(['modules/member/tpl/js/design_config.js', '', '', '']); ?>
<form action="./" class="x_form-horizontal" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertDesignConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<div class="x_control-group">
		<label class="x_control-label" for="layout"><?php echo $lang->layout ?></label>
		<div class="x_controls">
			<select id="layout" name="layout_srl">
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->layout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->val->layout_srl == $__Context->config->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="skin"><?php echo $lang->skin ?></label>
		<div class="x_controls">
			<select id="skin" name="skin" onchange="doGetSkinColorset(this.options[this.selectedIndex].value)">
				<?php $__loop_tmp=$__Context->skin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->config->skin==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->key ?>)</option><?php } ?>
			</select>
		</div>
	</div>
	<div id="colorset" class="x_control-group"<?php if(!$__Context->config->colorset){ ?> style="display:none"<?php } ?>>
		<label class="x_control-label" for="member_colorset"><?php echo $lang->colorset ?></label>
		<div class="x_controls"><div id="member_colorset"></div></div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mlayout"><?php echo $lang->mobile_layout ?></label>
		<div class="x_controls">
			<select id="mlayout" name="mlayout_srl">
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->mlayout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->val->layout_srl == $__Context->config->mlayout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> <?php if($__Context->val->layout){ ?>(<?php echo $__Context->val->layout ?>)<?php } ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mskin"><?php echo $lang->mobile_skin ?></label>
		<div class="x_controls">
			<select id="mskin" name="mskin">
				<?php $__loop_tmp=$__Context->mskin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->config->mskin==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> <?php if(!starts_with('/', $__Context->key)){ ?>(<?php echo $__Context->key ?>)<?php } ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div class="x_clearfix btnArea">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
<script>
    jQuery(function() { doGetSkinColorset("<?php echo $__Context->config->skin ?>"); });
</script>
