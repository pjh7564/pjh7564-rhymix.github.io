<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/board/tpl/category_list/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php echo $__Context->category_content ?>
<form class="x_form-horizontal" action="./" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" />
	<input type="hidden" name="module" value="board" />
	<input type="hidden" name="act" value="procBoardAdminSaveCategorySettings" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->module_info->mid ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/board/tpl/category_list/1" />
	<section class="section">
		<h1><?php echo $lang->category_settings ?></h1>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->hide_category ?></label>
			<div class="x_controls">
				<label class="x_inline" for="hide_category"><input type="checkbox" name="hide_category" id="hide_category" value="Y"<?php if($__Context->module_info->hide_category == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->about_hide_category ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->allow_no_category ?></label>
			<div class="x_controls">
				<label class="x_inline" for="allow_no_category"><input type="checkbox" name="allow_no_category" id="allow_no_category" value="Y"<?php if($__Context->module_info->allow_no_category == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->about_allow_no_category ?></label>
			</div>
		</div>
	</section>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button class="x_btn x_btn-primary" type="submit"><?php echo $lang->cmd_registration ?></button>
		</div>
	</div>
</form>
