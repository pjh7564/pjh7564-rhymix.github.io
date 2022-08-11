<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_domains_edit/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
	<form action="./" method="post" class="x_form-horizontal" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminInsertDomain" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_domains_edit/1" />
		<input type="hidden" name="domain_srl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? $__Context->domain_info->domain_srl : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? $__Context->domain_info->domain_srl : '')) ?>" />
		<input type="hidden" name="copy_domain_srl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_copy ? $__Context->domain_srl : -1, ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_copy ? $__Context->domain_srl : -1)) ?>" />
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->site_title ?></label>
			<div class="x_controls">
				<input type="text" name="title" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? escape($__Context->domain_info->settings->title) : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? escape($__Context->domain_info->settings->title) : '')) ?>" class="lang_code" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->site_subtitle ?></label>
			<div class="x_controls">
				<input type="text" name="subtitle" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? escape($__Context->domain_info->settings->subtitle) : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? escape($__Context->domain_info->settings->subtitle) : '')) ?>" class="lang_code" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="domain"><?php echo $lang->domain ?></label>
			<div class="x_controls">
				<input type="text" name="domain" id="domain" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? escape($__Context->domain_info->domain) : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? escape($__Context->domain_info->domain) : '')) ?>"/>
				&nbsp;
				<label for="is_default_domain" class="x_inline">
					<input type="checkbox" name="is_default_domain" id="is_default_domain" value="Y"<?php if($__Context->domain_info && $__Context->domain_info->is_default_domain === 'Y'){ ?> checked="checked"<?php };
if($__Context->domain_info && $__Context->domain_info->is_default_domain === 'Y'){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_is_default_domain ?>
				</label>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="http_port"><?php echo $lang->cmd_http_port ?></label>
			<div class="x_controls">
				<input type="number" name="http_port" id="http_port" size="5" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(($__Context->domain_info && $__Context->domain_info->http_port) ? $__Context->domain_info->http_port : '', ENT_QUOTES, 'UTF-8', false) : (($__Context->domain_info && $__Context->domain_info->http_port) ? $__Context->domain_info->http_port : '')) ?>" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="https_port"><?php echo $lang->cmd_https_port ?></label>
			<div class="x_controls">
				<input type="number" name="https_port" id="https_port" size="5" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(($__Context->domain_info && $__Context->domain_info->https_port) ? $__Context->domain_info->https_port : '', ENT_QUOTES, 'UTF-8', false) : (($__Context->domain_info && $__Context->domain_info->https_port) ? $__Context->domain_info->https_port : '')) ?>" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="domain_security"><?php echo $lang->use_ssl ?></label>
			<div class="x_controls">
				<select id="domain_security" name="domain_security">
					<option value="none"<?php if(($__Context->domain_info && $__Context->domain_info->security === 'none') || (!$__Context->domain_info && config('url.ssl') === 'none')){ ?> selected="selected"<?php } ?> /><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($lang->ssl_options['none'], ENT_QUOTES, 'UTF-8', false) : ($lang->ssl_options['none'])) ?></option>
					<option value="always"<?php if(($__Context->domain_info && $__Context->domain_info->security !== 'none') || (!$__Context->domain_info && config('url.ssl') !== 'none')){ ?> selected="selected"<?php } ?> /><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($lang->ssl_options['always'], ENT_QUOTES, 'UTF-8', false) : ($lang->ssl_options['always'])) ?></option>
				</select>
				<div class="x_help-block"><?php echo lang('admin.about_use_ssl') ?></div>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="index_module_srl"><?php echo $lang->cmd_index_module_srl ?></label>
			<div class="x_controls">
				<input class="module_search" type="text" id="index_module_srl" name="index_module_srl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->index_module_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->index_module_srl)) ?>" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="index_document_srl"><?php echo $lang->cmd_index_document_srl ?></label>
			<div class="x_controls">
				<input type="number" name="index_document_srl" id="index_document_srl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(($__Context->domain_info && $__Context->domain_info->index_document_srl) ? $__Context->domain_info->index_document_srl : '', ENT_QUOTES, 'UTF-8', false) : (($__Context->domain_info && $__Context->domain_info->index_document_srl) ? $__Context->domain_info->index_document_srl : '')) ?>"/>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="default_lang"><?php echo $lang->default_lang ?></label>
			<div class="x_controls">
				<select name="default_lang" id="default_lang">
					<option value="default"<?php if($__Context->domain_lang === 'default'){ ?> selected="selected"<?php } ?>><?php echo $lang->follow_default_lang ?></option>
					<?php $__loop_tmp=$__Context->enabled_lang;if($__loop_tmp)foreach($__loop_tmp as $__Context->key){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->key == $__Context->domain_lang){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->supported_lang[$__Context->key]['name'], ENT_QUOTES, 'UTF-8', false) : ($__Context->supported_lang[$__Context->key]['name'])) ?></option><?php } ?>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="default_timezone"><?php echo $lang->timezone ?></label>
			<div class="x_controls">
				<select name="default_timezone">
					<option value="default"<?php if($__Context->domain_timezone === 'default'){ ?> selected="selected"<?php } ?>><?php echo $lang->follow_default_lang ?></option>
					<?php $__loop_tmp=$__Context->timezones;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->key == $__Context->domain_timezone){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val, ENT_QUOTES, 'UTF-8', false) : ($__Context->val)) ?></option><?php } ?>
				</select>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="meta_keywords"><?php echo $lang->site_meta_keywords ?></label>
			<div class="x_controls">
				<input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? $__Context->domain_info->settings->meta_keywords : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? $__Context->domain_info->settings->meta_keywords : '')) ?>" class="lang_code" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="meta_description"><?php echo $lang->site_meta_description ?></label>
			<div class="x_controls">
				<input type="text" name="meta_description" id="meta_description" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? $__Context->domain_info->settings->meta_description : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? $__Context->domain_info->settings->meta_description : '')) ?>" class="lang_code" />
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="html_header"><?php echo $lang->input_header_script ?></label>
			<div class="x_controls" style="margin-right:14px">
				<textarea name="html_header" id="html_header" rows="6" style="width:100%"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? $__Context->domain_info->settings->html_header : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? $__Context->domain_info->settings->html_header : '')) ?></textarea>
				<div class="x_help-block"><?php echo $lang->detail_input_header_script ?></div>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="html_footer"><?php echo $lang->input_footer_script ?></label>
			<div class="x_controls" style="margin-right:14px">
				<textarea name="html_footer" id="html_footer" rows="6" style="width:100%"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain_info ? $__Context->domain_info->settings->html_footer : '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain_info ? $__Context->domain_info->settings->html_footer : '')) ?></textarea>
				<div class="x_help-block"><?php echo $lang->detail_input_footer_script ?></div>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->allow_use_favicon ?></label>
			<div class="x_controls">
				<p id="faviconPreview">
					<img src="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->favicon_url ?: (\RX_BASEURL . 'common/img/icon.png'), ENT_QUOTES, 'UTF-8', false) : ($__Context->favicon_url ?: (\RX_BASEURL . 'common/img/icon.png'))) ?>" alt="Favicon" class="fn1" style="width:16px;height:16px">
					<img src="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->favicon_url ?: (\RX_BASEURL . 'common/img/icon.png'), ENT_QUOTES, 'UTF-8', false) : ($__Context->favicon_url ?: (\RX_BASEURL . 'common/img/icon.png'))) ?>" alt="Favicon" class="fn2" style="width:16px;height:16px">
				</p>
				<?php if($__Context->favicon_url){ ?><label for="delete_favicon">
					<input type="checkbox" name="delete_favicon" id="delete_favicon" value="1" /> <?php echo $lang->cmd_delete ?>
				</label><?php } ?>
				<input type="file" name="favicon" id="favicon" title="Favicon" />
				<span class="x_help-block"><?php echo $lang->about_use_favicon ?></span>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->allow_use_mobile_icon ?></label>
			<div class="x_controls">
				<p id="mobiconPreview">
					<img src="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->mobicon_url ?: (\RX_BASEURL . 'common/img/icon.png'), ENT_QUOTES, 'UTF-8', false) : ($__Context->mobicon_url ?: (\RX_BASEURL . 'common/img/icon.png'))) ?>" alt="Mobile Home Icon" width="32" height="32" />
					<span>Rhymix</span>
				</p>
				<?php if($__Context->mobicon_url){ ?><label for="delete_mobicon">
					<input type="checkbox" name="delete_mobicon" id="delete_mobicon" value="1" /> <?php echo $lang->cmd_delete ?>
				</label><?php } ?>
				<input type="file" name="mobicon" id="mobicon" title="Mobile Home Icon" />
				<span class="x_help-block"><?php echo $lang->detail_use_mobile_icon ?></span>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_site_default_image ?></label>
			<div class="x_controls">
				<?php if($__Context->default_image_url){ ?><p id="default_imagePreview">
					<img src="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->default_image_url, ENT_QUOTES, 'UTF-8', false) : ($__Context->default_image_url)) ?>" alt="Default Image" style="width:200px;height:auto" />
				</p><?php } ?>
				<?php if($__Context->default_image_url){ ?><label for="delete_default_image">
					<input type="checkbox" name="delete_default_image" id="delete_default_image" value="1" /> <?php echo $lang->cmd_delete ?>
				</label><?php } ?>
				<input type="file" name="default_image" id="default_image" title="Default Image" />
				<span class="x_help-block"><?php echo $lang->about_site_default_image ?></span>
			</div>
		</div>
		
		<div class="x_control-group">
			<label class="x_control-label" for="color_scheme"><?php echo lang('admin.cmd_site_default_color_scheme') ?></label>
			<div class="x_controls">
				<select id="color_scheme" name="color_scheme">
					<?php if(lang('admin.site_default_color_scheme_options'))foreach(lang('admin.site_default_color_scheme_options') as $__Context->color_scheme_key => $__Context->color_scheme_val){ ?>
						<option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->color_scheme_key, ENT_QUOTES, 'UTF-8', false) : ($__Context->color_scheme_key)) ?>"<?php if($__Context->color_scheme === $__Context->color_scheme_key){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->color_scheme_val, ENT_QUOTES, 'UTF-8', false) : ($__Context->color_scheme_val)) ?></option>
					<?php } ?>
				</select>
				<div class="x_help-block"><?php echo lang('admin.about_site_default_color_scheme') ?></div>
			</div>
		</div>
		
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
		
	</form>
</section>
