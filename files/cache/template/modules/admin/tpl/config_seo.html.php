<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<?php if(!empty($__Context->XE_VALIDATOR_MESSAGE) && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_seo/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
	<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminUpdateSEO" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_seo/1" />
		<div class="x_control-group">
			<label class="x_control-label" for="seo_main_title"><?php echo $lang->seo_main_title ?></label>
			<div class="x_controls">
				<input type="text" name="seo_main_title" id="seo_main_title" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->seo_main_title, ENT_QUOTES, 'UTF-8', false) : ($__Context->seo_main_title)) ?>" style="min-width: 80%" class="lang_code" />
				<p class="x_help-block"><?php echo $lang->about_seo_main_title ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="seo_subpage_title"><?php echo $lang->seo_subpage_title ?></label>
			<div class="x_controls">
				<input type="text" name="seo_subpage_title" id="seo_subpage_title" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->seo_subpage_title, ENT_QUOTES, 'UTF-8', false) : ($__Context->seo_subpage_title)) ?>" style="min-width: 80%" class="lang_code" />
				<p class="x_help-block"><?php echo $lang->about_seo_subpage_title ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="seo_document_title"><?php echo $lang->seo_document_title ?></label>
			<div class="x_controls">
				<input type="text" name="seo_document_title" id="seo_document_title" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->seo_document_title, ENT_QUOTES, 'UTF-8', false) : ($__Context->seo_document_title)) ?>" style="min-width: 80%" class="lang_code" />
				<p class="x_help-block"><?php echo $lang->about_seo_document_title ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="site_meta_keywords"><?php echo $lang->site_meta_keywords ?></label>
			<div class="x_controls">
				<input type="text" name="site_meta_keywords" id="site_meta_keywords" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->site_meta_keywords, ENT_QUOTES, 'UTF-8', false) : ($__Context->site_meta_keywords)) ?>" style="min-width: 80%" class="lang_code" />
				<p class="x_help-block"><?php echo $lang->about_site_meta_keywords ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="site_meta_description"><?php echo $lang->site_meta_description ?></label>
			<div class="x_controls">
				<input type="text" name="site_meta_description" id="site_meta_description" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->site_meta_description, ENT_QUOTES, 'UTF-8', false) : ($__Context->site_meta_description)) ?>" style="min-width: 80%" class="lang_code" />
				<p class="x_help-block"><?php echo $lang->about_site_meta_description ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->og_enabled ?></label>
			<div class="x_controls">
				<label for="og_enabled_y" class="x_inline"><input type="radio" name="og_enabled" id="og_enabled_y" value="Y"<?php if($__Context->og_enabled){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="og_enabled_n" class="x_inline"><input type="radio" name="og_enabled" id="og_enabled_n" value="N"<?php if(!$__Context->og_enabled){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->twitter_enabled ?></label>
			<div class="x_controls">
				<label for="twitter_enabled_y" class="x_inline"><input type="radio" name="twitter_enabled" id="twitter_enabled_y" value="Y"<?php if($__Context->twitter_enabled){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="twitter_enabled_n" class="x_inline"><input type="radio" name="twitter_enabled" id="twitter_enabled_n" value="N"<?php if(!$__Context->twitter_enabled){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->og_extract_description ?></label>
			<div class="x_controls">
				<label for="og_extract_description_y" class="x_inline"><input type="radio" name="og_extract_description" id="og_extract_description_y" value="Y"<?php if($__Context->og_extract_description){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="og_extract_description_n" class="x_inline"><input type="radio" name="og_extract_description" id="og_extract_description_n" value="N"<?php if(!$__Context->og_extract_description){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?> (<?php echo $lang->og_extract_description_fallback ?>)</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->og_extract_images ?></label>
			<div class="x_controls">
				<label for="og_extract_images_y" class="x_inline"><input type="radio" name="og_extract_images" id="og_extract_images_y" value="Y"<?php if($__Context->og_extract_images){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="og_extract_images_n" class="x_inline"><input type="radio" name="og_extract_images" id="og_extract_images_n" value="N"<?php if(!$__Context->og_extract_images){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?> (<?php echo $lang->og_extract_images_fallback ?>)</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->og_extract_hashtags ?></label>
			<div class="x_controls">
				<label for="og_extract_hashtags_y" class="x_inline"><input type="radio" name="og_extract_hashtags" id="og_extract_hashtags_y" value="Y"<?php if($__Context->og_extract_hashtags){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="og_extract_hashtags_n" class="x_inline"><input type="radio" name="og_extract_hashtags" id="og_extract_hashtags_n" value="N"<?php if(!$__Context->og_extract_hashtags){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->og_use_nick_name ?></label>
			<div class="x_controls">
				<label for="og_use_nick_name_y" class="x_inline"><input type="radio" name="og_use_nick_name" id="og_use_nick_name_y" value="Y"<?php if($__Context->og_use_nick_name){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="og_use_nick_name_n" class="x_inline"><input type="radio" name="og_use_nick_name" id="og_use_nick_name_n" value="N"<?php if(!$__Context->og_use_nick_name){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->og_use_timestamps ?></label>
			<div class="x_controls">
				<label for="og_use_timestamps_y" class="x_inline"><input type="radio" name="og_use_timestamps" id="og_use_timestamps_y" value="Y"<?php if($__Context->og_use_timestamps){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="og_use_timestamps_n" class="x_inline"><input type="radio" name="og_use_timestamps" id="og_use_timestamps_n" value="N"<?php if(!$__Context->og_use_timestamps){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
