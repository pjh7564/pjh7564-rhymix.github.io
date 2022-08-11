<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php if($__Context->logged_info->is_admin === 'Y'){ ?>
<section class="section">
	<h1><?php echo $lang->cmd_board_combined_board ?></h1>
	<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="document" />
		<input type="hidden" name="act" value="procBoardAdminInsertCombinedConfig" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		<input type="hidden" name="target_module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
		<?php  $__Context->include_modules = explode(',', $__Context->module_info->include_modules ?? '') ?>
		<div class="x_control-group">
			<label for="include_modules" class="x_control-label"><?php echo $lang->cmd_board_include_modules ?></label>
			<div class="x_controls">
				<select name="include_modules[]" id="include_modules" size="8" multiple="multiple">
					<option value=""><?php echo $lang->cmd_board_include_modules_none ?></option>
					<?php if($__Context->board_list)foreach($__Context->board_list as $__Context->board_info){ ?>
						<option value="<?php echo $__Context->board_info->module_srl ?>"<?php if(in_array($__Context->board_info->module_srl, $__Context->include_modules)){ ?> selected="selected"<?php } ?>><?php echo $__Context->board_info->browser_title ?></option>
					<?php } ?>
				</select>
				<p class="x_help-block"><?php echo $lang->about_board_combined_board ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="include_days" class="x_control-label"><?php echo $lang->cmd_board_include_days ?></label>
			<div class="x_controls">
				<input name="include_days" id="include_days" type="number" min="0" step="0.01" value="<?php echo $__Context->module_info->include_days ?: 0 ?>" /> <?php echo $lang->unit_day ?>
				<p class="x_help-block"><?php echo $lang->about_board_include_days ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_board_include_notice ?></label>
			<div class="x_controls">
				<label class="x_inline"><input name="include_notice" type="radio" value="Y"<?php if($__Context->module_info->include_notice !== 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?> </label>
				<label class="x_inline"><input name="include_notice" type="radio" value="N"<?php if($__Context->module_info->include_notice === 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?> </label>
			</div>
		</div>
		<div class="btnArea">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</div>
	</form>
</section>
<?php } ?>
<?php echo $__Context->setup_content ?>
