<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<?php if(!empty($__Context->XE_VALIDATOR_MESSAGE) && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_advanced/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
	<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminUpdateAdvanced" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_advanced/1" />
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_rewrite ?></label>
			<div class="x_controls">
				<label for="use_rewrite_0" class="x_inline"><input type="radio" name="use_rewrite" id="use_rewrite_0" value="0"<?php if($__Context->use_rewrite == 0){ ?> checked="checked"<?php } ?> /> <?php echo $lang->use_rewrite_0 ?></label>
				<label for="use_rewrite_1" class="x_inline"><input type="radio" name="use_rewrite" id="use_rewrite_1" value="1"<?php if($__Context->use_rewrite == 1){ ?> checked="checked"<?php } ?> /> <?php echo $lang->use_rewrite_1 ?></label>
				<label for="use_rewrite_2" class="x_inline"><input type="radio" name="use_rewrite" id="use_rewrite_2" value="2"<?php if($__Context->use_rewrite == 2){ ?> checked="checked"<?php } ?> /> <?php echo $lang->use_rewrite_2 ?></label>
				<p class="x_help-block"><?php echo $lang->about_use_rewrite ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_mobile_view ?></label>
			<div class="x_controls">
				<label for="use_mobile_view_y" class="x_inline">
					<input type="radio" name="use_mobile_view" id="use_mobile_view_y" value="Y"<?php if($__Context->use_mobile_view){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_yes ?>
				</label>
				<label for="use_mobile_view_n" class="x_inline">
					<input type="radio" name="use_mobile_view" id="use_mobile_view_n" value="N"<?php if(!$__Context->use_mobile_view){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_no ?>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->tablets_as_mobile ?></label>
			<div class="x_controls">
				<label for="tablets_as_mobile_y" class="x_inline">
					<input type="radio" name="tablets_as_mobile" id="tablets_as_mobile_y" value="Y"<?php if($__Context->tablets_as_mobile){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_yes ?>
				</label>
				<label for="tablets_as_mobile_n" class="x_inline">
					<input type="radio" name="tablets_as_mobile" id="tablets_as_mobile_n" value="N"<?php if(!$__Context->tablets_as_mobile){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_no ?>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->auto_select_lang ?></label>
			<div class="x_controls">
				<label for="auto_select_lang_y" class="x_inline">
					<input type="radio" name="auto_select_lang" id="auto_select_lang_y" value="Y"<?php if($__Context->auto_select_lang){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_yes ?>
				</label>
				<label for="auto_select_lang_n" class="x_inline">
					<input type="radio" name="auto_select_lang" id="auto_select_lang_n" value="N"<?php if(!$__Context->auto_select_lang){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_no ?>
				</label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_auto_select_lang ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->lang_select ?></label>
			<div class="x_controls">
				<?php $__loop_tmp=$__Context->supported_lang;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><label for="lang_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>" class="x_inline">
					<input type="checkbox" name="enabled_lang[]" id="lang_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if(in_array($__Context->key, $__Context->enabled_lang)){ ?> checked="checked"<?php } ?> />
					<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val['name'], ENT_QUOTES, 'UTF-8', false) : ($__Context->val['name'])) ?>
				</label><?php } ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="default_lang" class="x_control-label"><?php echo $lang->default_lang ?></label>
			<div class="x_controls">
				<select name="default_lang" id="default_lang">
					<?php $__loop_tmp=$__Context->enabled_lang;if($__loop_tmp)foreach($__loop_tmp as $__Context->key){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->key==$__Context->default_lang){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->supported_lang[$__Context->key]['name'], ENT_QUOTES, 'UTF-8', false) : ($__Context->supported_lang[$__Context->key]['name'])) ?></option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="default_timezone"><?php echo $lang->timezone ?></label>
			<div class="x_controls">
				<select name="default_timezone">
					<?php $__loop_tmp=$__Context->timezones;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->key==$__Context->selected_timezone){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val, ENT_QUOTES, 'UTF-8', false) : ($__Context->val)) ?></option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mobile_viewport"><?php echo $lang->mobile_viewport ?></label>
			<div class="x_controls">
				<input type="text" name="mobile_viewport" id="mobile_viewport" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->mobile_viewport, ENT_QUOTES, 'UTF-8', false) : ($__Context->mobile_viewport)) ?>" style="min-width: 80%" />
				<p class="x_help-block"><?php echo $lang->about_mobile_viewport ?> <a href="javascript:restoreDefaultViewport()"><?php echo $lang->restore_default_viewport ?></a></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_db_session ?></label>
			<div class="x_controls">
				<label for="use_db_session_y" class="x_inline"><input type="radio" name="use_db_session" id="use_db_session_y" value="Y"<?php if($__Context->use_db_session){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_db_session_n" class="x_inline"><input type="radio" name="use_db_session" id="use_db_session_n" value="N"<?php if(!$__Context->use_db_session){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_db_session ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->delay_session ?></label>
			<div class="x_controls">
				<label for="delay_session_y" class="x_inline"><input type="radio" name="delay_session" id="delay_session_y" value="Y"<?php if($__Context->delay_session){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="delay_session_n" class="x_inline"><input type="radio" name="delay_session" id="delay_session_n" value="N"<?php if(!$__Context->delay_session){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_delay_session ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->thumbnail_target ?></label>
			<div class="x_controls">
				<label for="thumbnail_target_all" class="x_inline">
					<input type="radio" name="thumbnail_target" id="thumbnail_target_all" value="all"<?php if($__Context->thumbnail_target == 'all' || !$__Context->thumbnail_target){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->thumbnail_target_all ?>
				</label>
				<label for="thumbnail_target_attachment" class="x_inline">
					<input type="radio" name="thumbnail_target" id="thumbnail_target_attachment" value="attachment"<?php if($__Context->thumbnail_target == 'attachment'){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->thumbnail_target_attachment ?>
				</label>
				<label for="thumbnail_target_none" class="x_inline">
					<input type="radio" name="thumbnail_target" id="thumbnail_target_none" value="none"<?php if($__Context->thumbnail_target == 'none'){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->thumbnail_none ?>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="thumbnail_type"><?php echo $lang->thumbnail_type ?></label>
			<div class="x_controls">
				<select name="thumbnail_type" id="thumbnail_type">
					<option value="fill"<?php if($__Context->thumbnail_type == 'fill'){ ?> selected="selected"<?php } ?>><?php echo $lang->thumbnail_fill ?></option>
					<option value="ratio"<?php if($__Context->thumbnail_type == 'ratio'){ ?> selected="selected"<?php } ?>><?php echo $lang->thumbnail_ratio ?></option>
					<option value="crop"<?php if($__Context->thumbnail_type == 'crop'){ ?> selected="selected"<?php } ?>><?php echo $lang->thumbnail_crop ?></option>
					<option value="stretch"<?php if($__Context->thumbnail_type == 'stretch'){ ?> selected="selected"<?php } ?>><?php echo $lang->thumbnail_stretch ?></option>
					<option value="center"<?php if($__Context->thumbnail_type == 'center'){ ?> selected="selected"<?php } ?>><?php echo $lang->thumbnail_center ?></option>
				</select>
				<label class="x_inline" for="thumbnail_quality" style="margin-left:16px"><?php echo $lang->image_quality ?>:
					<select name="thumbnail_quality" id="thumbnail_quality" style="min-width:120px">
						<?php for($__Context->q = 50; $__Context->q <= 100; $__Context->q += 5){ ?>
							<option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->q, ENT_QUOTES, 'UTF-8', false) : ($__Context->q)) ?>"<?php if($__Context->thumbnail_quality === $__Context->q){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->q, ENT_QUOTES, 'UTF-8', false) : ($__Context->q)) ?>%<?php if($__Context->q === 75){ ?> (<?php echo $lang->standard ?>)<?php } ?></option>
						<?php } ?>
					</select>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_object_cache ?></label>
			<div class="x_controls">
				<select name="object_cache_type" id="object_cache_type">
					<?php $__loop_tmp=$__Context->object_cache_types;if($__loop_tmp)foreach($__loop_tmp as $__Context->key){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if(($__Context->key == $__Context->object_cache_type) || (!$__Context->object_cache_type && $__Context->key == 'dummy')){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key === 'dummy' ? $lang->msg_dummy_or_do_not_use : $__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key === 'dummy' ? $lang->msg_dummy_or_do_not_use : $__Context->key)) ?></option><?php } ?>
				</select>
				<div id="object_cache_additional_config" class="x_inline" style="display:none;margin-left:16px">
					<label for="object_cache_host" class="x_inline"><?php echo $lang->cache_host ?>: <input type="text" name="object_cache_host" id="object_cache_host" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->object_cache_host, ENT_QUOTES, 'UTF-8', false) : ($__Context->object_cache_host)) ?>" /></label>
					<label for="object_cache_port" class="x_inline"><?php echo $lang->cache_port ?>: <input type="number" name="object_cache_port" id="object_cache_port" size="5" style="min-width:70px" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->object_cache_port, ENT_QUOTES, 'UTF-8', false) : ($__Context->object_cache_port)) ?>" /></label>
				</div>
				<div id="object_cache_redis_config" style="display:none">
					<label for="object_cache_user" class="x_inline"><?php echo $lang->cache_user ?>: <input type="text" name="object_cache_user" id="object_cache_user" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->object_cache_user, ENT_QUOTES, 'UTF-8', false) : ($__Context->object_cache_user)) ?>" /></label>
					<label for="object_cache_pass" class="x_inline"><?php echo $lang->cache_pass ?>: <input type="password" name="object_cache_pass" id="object_cache_pass" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->object_cache_pass, ENT_QUOTES, 'UTF-8', false) : ($__Context->object_cache_pass)) ?>" autocomplete="new-password" /></label>
					<label for="object_cache_dbnum" class="x_inline"><?php echo $lang->cache_dbnum ?>: <input type="number" name="object_cache_dbnum" id="object_cache_dbnum" size="3" style="min-width:70px" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->object_cache_dbnum, ENT_QUOTES, 'UTF-8', false) : ($__Context->object_cache_dbnum)) ?>" /></label>
				</div>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="cache_default_ttl"><?php echo $lang->cache_default_ttl ?></label>
			<div class="x_controls">
				<input type="text" name="cache_default_ttl" id="cache_default_ttl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->cache_default_ttl, ENT_QUOTES, 'UTF-8', false) : ($__Context->cache_default_ttl)) ?>" /> <?php echo $lang->unit_sec ?>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cache_truncate_method ?></label>
			<div class="x_controls">
				<label for="cache_truncate_method_delete" class="x_inline"><input type="radio" name="cache_truncate_method" id="cache_truncate_method_delete" value="delete"<?php if($__Context->cache_truncate_method !== 'empty'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cache_truncate_method_delete ?></label>
				<label for="cache_truncate_method_empty" class="x_inline"><input type="radio" name="cache_truncate_method" id="cache_truncate_method_empty" value="empty"<?php if($__Context->cache_truncate_method === 'empty'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cache_truncate_method_empty ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_cache_truncate_method ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->manager_layout ?></label>
			<div class="x_controls">
				<label for="manager_layout_module" class="x_inline"><input type="radio" name="manager_layout" id="manager_layout_module" value="module"<?php if($__Context->manager_layout != 'admin'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_manager_layout_module ?></label>
				<label for="manager_layout_admin" class="x_inline"><input type="radio" name="manager_layout" id="manager_layout_admin" value="admin"<?php if($__Context->manager_layout == 'admin'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_manager_layout_admin ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_manager_layout ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->minify_scripts ?></label>
			<div class="x_controls">
				<label for="minify_scripts_none" class="x_inline"><input type="radio" name="minify_scripts" id="minify_scripts_none" value="none"<?php if($__Context->minify_scripts=='none'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_minify_none ?></label>
				<label for="minify_scripts_common" class="x_inline"><input type="radio" name="minify_scripts" id="minify_scripts_common" value="common"<?php if($__Context->minify_scripts!='all' && $__Context->minify_scripts!='none'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_minify_common ?></label>
				<label for="minify_scripts_all" class="x_inline"><input type="radio" name="minify_scripts" id="minify_scripts_all" value="all"<?php if($__Context->minify_scripts=='all'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_minify_all ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_minify_scripts ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->concat_scripts ?></label>
			<div class="x_controls">
				<label for="concat_scripts_none" class="x_inline"><input type="radio" name="concat_scripts" id="concat_scripts_none" value="none"<?php if(!contains('css', $__Context->concat_scripts) && !contains('js', $__Context->concat_scripts)){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_concat_none ?></label>
				<label for="concat_scripts_css_only" class="x_inline"><input type="radio" name="concat_scripts" id="concat_scripts_css_only" value="css"<?php if($__Context->concat_scripts=='css'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_concat_css_only ?></label>
				<label for="concat_scripts_js_only" class="x_inline"><input type="radio" name="concat_scripts" id="concat_scripts_js_only" value="js"<?php if($__Context->concat_scripts=='js'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_concat_js_only ?></label>
				<label for="concat_scripts_css_js" class="x_inline"><input type="radio" name="concat_scripts" id="concat_scripts_css_js" value="css,js"<?php if($__Context->concat_scripts=='css,js'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_concat_css_js ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_concat_scripts ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_server_push ?></label>
			<div class="x_controls">
				<label for="use_server_push_y" class="x_inline"><input type="radio" name="use_server_push" id="use_server_push_y" value="Y"<?php if($__Context->use_server_push){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_server_push_n" class="x_inline"><input type="radio" name="use_server_push" id="use_server_push_n" value="N"<?php if(!$__Context->use_server_push){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_gzip ?></label>
			<div class="x_controls">
				<label for="use_gzip_y" class="x_inline"><input type="radio" name="use_gzip" id="use_gzip_y" value="Y"<?php if($__Context->use_gzip){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_gzip_n" class="x_inline"><input type="radio" name="use_gzip" id="use_gzip_n" value="N"<?php if(!$__Context->use_gzip){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<script>
	function restoreDefaultViewport() {
		$('#mobile_viewport').val(<?php echo json_encode(\HTMLDisplayHandler::DEFAULT_VIEWPORT) ?>);
	}
</script>
