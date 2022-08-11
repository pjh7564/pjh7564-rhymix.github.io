<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<!--#Meta:modules/member/tpl/js/default_config.js--><?php Context::loadFile(['modules/member/tpl/js/default_config.js', '', '', '']); ?>
<form action="./" class="x_form-horizontal" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertAgreementsConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<?php for($__Context->i = 1; $__Context->i <= 5; $__Context->i++){ ?>
	<section class="section">
		<h2><?php echo $lang->agreement ?> <?php echo $__Context->i ?></h2>
		<div class="x_control-group">
			<div class="x_control-label" for="agreement_<?php echo $__Context->i ?>_title"><?php echo $lang->cmd_agreement_title ?></div>
			<div class="x_controls">
				<input type="text" name="agreement_<?php echo $__Context->i ?>_title" id="agreement_<?php echo $__Context->i ?>_title" value="<?php echo $__Context->config->agreements[$__Context->i]->title ?>" />
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label"><?php echo $lang->cmd_agreement_content ?></div>
			<div class="x_controls">
				<input type="hidden" class="editable_preview_content" name="agreement_<?php echo $__Context->i ?>_content" id="agreement_<?php echo $__Context->i ?>_content" value="<?php echo escape($__Context->config->agreements[$__Context->i]->content) ?>" />
				<div class="editable_preview"><?php echo $__Context->config->agreements[$__Context->i]->content ?></div>
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label"><?php echo $lang->cmd_agreement_type ?></div>
			<div class="x_controls">
				<label class="x_inline" for="agreement_<?php echo $__Context->i ?>_required"><input type="radio" name="agreement_<?php echo $__Context->i ?>_type" id="agreement_<?php echo $__Context->i ?>_required" value="required"<?php if($__Context->config->agreements[$__Context->i]->type === 'required'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_required ?></label>
				<label class="x_inline" for="agreement_<?php echo $__Context->i ?>_optional"><input type="radio" name="agreement_<?php echo $__Context->i ?>_type" id="agreement_<?php echo $__Context->i ?>_optional" value="optional"<?php if($__Context->config->agreements[$__Context->i]->type === 'optional'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_optional ?></label>
				<label class="x_inline" for="agreement_<?php echo $__Context->i ?>_disabled"><input type="radio" name="agreement_<?php echo $__Context->i ?>_type" id="agreement_<?php echo $__Context->i ?>_disabled" value="disabled"<?php if($__Context->config->agreements[$__Context->i]->type === 'disabled' || !$__Context->config->agreements[$__Context->i]->type){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_disabled ?></label>
			</div>
		</div>
	</section>
	<?php } ?>
	
	<div class="btnArea x_clearfix">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
