<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/editor/tpl/css/editor_module_config.css--><?php Context::loadFile(['modules/editor/tpl/css/editor_module_config.css', '', '', '', []]); ?>
<!--#Meta:modules/editor/tpl/js/editor_module_config.js--><?php Context::loadFile(['modules/editor/tpl/js/editor_module_config.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->editor ?></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/editor/tpl/admin_index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<!-- Editor Preview -->
<section class="section collapsed">
	<h1><?php echo $lang->editor_now ?></h1>
	<div class="x_tabbable _preview">
		<ul class="x_nav x_nav-tabs" style="margin-bottom:0;border-bottom:0">
			<li class="x_active"><a href="#pre_document"><?php echo $lang->main_editor ?></a></li>
			<li><a href="#pre_comment"><?php echo $lang->comment_editor ?></a></li>
		</ul>
		<div class="x_tab-content x_thumbnail">
			<div class="x_tab-pane x_active" id="pre_document">
				<iframe src="<?php echo getUrl('','act', 'dispEditorConfigPreview', 'type', 'document') ?>" id="pre_document_frame" frameborder="0" style="border:0"></iframe>
			</div>
			<div class="x_tab-pane" id="pre_comment">
				<iframe src="<?php echo getUrl('','act', 'dispEditorConfigPreview', 'type', 'comment') ?>" id="pre_comment_frame" frameborder="0" style="border:0"></iframe> 
			</div>
		</div>
	</div>
</section>
<!-- Editor Option -->
<section class="section">
	<?php Context::addJsFile("modules/editor/ruleset/generalConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post"  class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="generalConfig" />
		<input type="hidden" name="module" value="editor" />
		<input type="hidden" name="act" value="procEditorAdminGeneralConfig" />
		<input type="hidden" name="xe_validator_id" value="modules/editor/tpl/admin_index/1" />
		<h1><?php echo $lang->main_editor ?></h1>
		<div class="x_control-group">
			<label for="change_lang_type" class="x_control-label"><?php echo $lang->pc ?></label>
			<div class="x_controls">
				<p>
					<select name="editor_skin" class="editor_skin_selector">
						<?php if($__Context->editor_skin_list)foreach($__Context->editor_skin_list as $__Context->skin_name => $__Context->skin_info){ ?>
							<option value="<?php echo $__Context->skin_name ?>" data-colorsets="<?php echo htmlspecialchars(json_encode($__Context->skin_info->colorset), ENT_QUOTES, 'UTF-8', true) ?>"<?php if($__Context->skin_name === $__Context->editor_config->editor_skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->skin_info->title ?></option>
						<?php } ?>
					</select>
					<select name="editor_colorset" class="editor_colorset_selector">
						<?php if($__Context->editor_skin_list[$__Context->editor_config->editor_skin]->colorset)foreach($__Context->editor_skin_list[$__Context->editor_config->editor_skin]->colorset ?: [] as $__Context->colorset){ ?>
							<option value="<?php echo $__Context->colorset->name ?>"<?php if($__Context->colorset->name === $__Context->editor_config->editor_colorset){ ?> selected="selected"<?php } ?>><?php echo $__Context->colorset->title ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_height ?></span>
					<input type="number" name="editor_height" value="<?php echo $__Context->editor_config->editor_height ?>" /> px
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_toolbar ?></span>
					<select name="editor_toolbar" style="min-width:104px">
						<option value="default"<?php if(!$__Context->editor_config->editor_toolbar || $__Context->editor_config->editor_toolbar === 'default'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_default ?></option>
						<option value="simple"<?php if($__Context->editor_config->editor_toolbar === 'simple'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_simple ?></option>
					</select> &nbsp;
					<label class="x_inline"><input type="checkbox" name="editor_toolbar_hide" value="Y"<?php if($__Context->editor_config->editor_toolbar_hide === 'Y'){ ?> checked="checked"<?php } ?>> <?php echo $lang->editor_toolbar_hide ?></label>
				</p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="editor_height" class="x_control-label"><?php echo $lang->mobile ?></label>
			<div class="x_controls">
				<p>
					<select name="mobile_editor_skin" class="editor_skin_selector">
						<?php if($__Context->editor_skin_list)foreach($__Context->editor_skin_list as $__Context->skin_name => $__Context->skin_info){ ?>
						<option value="<?php echo $__Context->skin_name ?>" data-colorsets="<?php echo htmlspecialchars(json_encode($__Context->skin_info->colorset), ENT_QUOTES, 'UTF-8', true) ?>"<?php if($__Context->skin_name === $__Context->editor_config->mobile_editor_skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->skin_info->title ?></option>
						<?php } ?>
					</select>
					<select name="mobile_editor_colorset" class="editor_colorset_selector">
						<?php if($__Context->editor_skin_list[$__Context->editor_config->mobile_editor_skin]->colorset)foreach($__Context->editor_skin_list[$__Context->editor_config->mobile_editor_skin]->colorset ?: [] as $__Context->colorset){ ?>
							<option value="<?php echo $__Context->colorset->name ?>"<?php if($__Context->colorset->name === $__Context->editor_config->mobile_editor_colorset){ ?> selected="selected"<?php } ?>><?php echo $__Context->colorset->title ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_height ?></span>
					<input type="number" name="mobile_editor_height" value="<?php echo $__Context->editor_config->mobile_editor_height ?>" /> px</p>
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_toolbar ?></span>
					<select name="mobile_editor_toolbar" style="min-width:104px">
						<option value="default"<?php if(!$__Context->editor_config->mobile_editor_toolbar || $__Context->editor_config->mobile_editor_toolbar === 'default'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_default ?></option>
						<option value="simple"<?php if($__Context->editor_config->mobile_editor_toolbar === 'simple'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_simple ?></option>
					</select> &nbsp;
					<label class="x_inline"><input type="checkbox" name="mobile_editor_toolbar_hide" value="Y"<?php if($__Context->editor_config->mobile_editor_toolbar_hide === 'Y'){ ?> checked="checked"<?php } ?>> <?php echo $lang->editor_toolbar_hide ?></label>
				</p>
			</div>
		</div>
		
		<h1><?php echo $lang->comment_editor ?></h1>
	
		<div class="x_control-group">
			<label for="change_lang_type" class="x_control-label"><?php echo $lang->pc ?></label>
			<div class="x_controls">
				<p>
					<select name="comment_editor_skin" class="editor_skin_selector">
						<?php if($__Context->editor_skin_list)foreach($__Context->editor_skin_list as $__Context->skin_name => $__Context->skin_info){ ?>
							<option value="<?php echo $__Context->skin_name ?>" data-colorsets="<?php echo htmlspecialchars(json_encode($__Context->skin_info->colorset), ENT_QUOTES, 'UTF-8', true) ?>"<?php if($__Context->skin_name === $__Context->editor_config->comment_editor_skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->skin_info->title ?></option>
						<?php } ?>
					</select>
					<select name="comment_editor_colorset" class="editor_colorset_selector">
						<?php if($__Context->editor_skin_list[$__Context->editor_config->comment_editor_skin]->colorset)foreach($__Context->editor_skin_list[$__Context->editor_config->comment_editor_skin]->colorset ?: [] as $__Context->colorset){ ?>
							<option value="<?php echo $__Context->colorset->name ?>"<?php if($__Context->colorset->name === $__Context->editor_config->comment_editor_colorset){ ?> selected="selected"<?php } ?>><?php echo $__Context->colorset->title ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_height ?></span>
					<input type="number" name="comment_editor_height" value="<?php echo $__Context->editor_config->comment_editor_height ?>" /> px
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_toolbar ?></span>
					<select name="comment_editor_toolbar" style="min-width:104px">
						<option value="default"<?php if(!$__Context->editor_config->comment_editor_toolbar || $__Context->editor_config->comment_editor_toolbar === 'default'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_default ?></option>
						<option value="simple"<?php if($__Context->editor_config->comment_editor_toolbar === 'simple'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_simple ?></option>
					</select> &nbsp;
					<label class="x_inline"><input type="checkbox" name="comment_editor_toolbar_hide" value="Y"<?php if($__Context->editor_config->comment_editor_toolbar_hide === 'Y'){ ?> checked="checked"<?php } ?>> <?php echo $lang->editor_toolbar_hide ?></label>
				</p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="editor_height" class="x_control-label"><?php echo $lang->mobile ?></label>
			<div class="x_controls">
				<p>
					<select name="mobile_comment_editor_skin" class="editor_skin_selector">
						<?php if($__Context->editor_skin_list)foreach($__Context->editor_skin_list as $__Context->skin_name => $__Context->skin_info){ ?>
						<option value="<?php echo $__Context->skin_name ?>" data-colorsets="<?php echo htmlspecialchars(json_encode($__Context->skin_info->colorset), ENT_QUOTES, 'UTF-8', true) ?>"<?php if($__Context->skin_name === $__Context->editor_config->mobile_comment_editor_skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->skin_info->title ?></option>
						<?php } ?>
					</select>
					<select name="mobile_comment_editor_colorset" class="editor_colorset_selector">
						<?php if($__Context->editor_skin_list[$__Context->editor_config->mobile_comment_editor_skin]->colorset)foreach($__Context->editor_skin_list[$__Context->editor_config->mobile_comment_editor_skin]->colorset ?: [] as $__Context->colorset){ ?>
							<option value="<?php echo $__Context->colorset->name ?>"<?php if($__Context->colorset->name === $__Context->editor_config->mobile_comment_editor_colorset){ ?> selected="selected"<?php } ?>><?php echo $__Context->colorset->title ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_height ?></span>
					<input type="number" name="mobile_comment_editor_height" value="<?php echo $__Context->editor_config->mobile_comment_editor_height ?>" /> px</p>
				</p>
				<p>
					<span class="editor_type"><?php echo $lang->guide_editor_toolbar ?></span>
					<select name="mobile_comment_editor_toolbar" style="min-width:104px">
						<option value="default"<?php if(!$__Context->editor_config->mobile_comment_editor_toolbar || $__Context->editor_config->mobile_comment_editor_toolbar === 'default'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_default ?></option>
						<option value="simple"<?php if($__Context->editor_config->mobile_comment_editor_toolbar === 'simple'){ ?> selected="selected"<?php } ?>><?php echo $lang->editor_toolbar_simple ?></option>
					</select> &nbsp;
					<label class="x_inline"><input type="checkbox" name="mobile_comment_editor_toolbar_hide" value="Y"<?php if($__Context->editor_config->mobile_comment_editor_toolbar_hide === 'Y'){ ?> checked="checked"<?php } ?>> <?php echo $lang->editor_toolbar_hide ?></label>
				</p>
			</div>
		</div>
		
		<h1><?php echo $lang->editor_common_settings ?></h1>
		
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->guide_choose_font_body ?></label>
			<div class="x_controls">
				<label class="x_inline fontSelector">
					<input type="radio" name="content_font" id="font_noFont" value=""<?php if(!$__Context->editor_config->content_font && $__Context->editor_config->font_defined != 'Y'){ ?> checked="checked"<?php } ?> /> none (inherit)
				</label>
				<?php $__loop_tmp=$lang->edit->fontlist;if($__loop_tmp)foreach($__loop_tmp as $__Context->name=>$__Context->detail){ ?><label style="font-family:<?php echo $__Context->detail ?>" class="x_inline fontSelector">
					<?php  $__Context->fontname_simplified = trim(array_first(explode(',', $__Context->detail)), "'\" ") ?>
					<input type="radio" name="content_font" id="font_<?php echo $__Context->name ?>" value="<?php echo $__Context->detail ?>"<?php if($__Context->editor_config->content_font == $__Context->detail && $__Context->editor_config->font_defined != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->fontname_simplified ?>
				</label><?php } ?>
				<label>
					<input type="radio" class="fontSelector" name="font_defined" id="font_defined" value="Y"<?php if($__Context->editor_config->font_defined== 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->by_you ?> : 
					<input type="text" name="content_font_defined"<?php if($__Context->editor_config->font_defined == 'Y'){ ?> value="<?php echo $__Context->editor_config->content_font ?>"<?php } ?> />
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->guide_choose_font_preview ?></label>
			<div class="x_controls">
				<textarea rows="4" cols="42" class="fontPreview" style="
					font-family: <?php echo $__Context->editor_config->content_font ?>;
					font-size: <?php echo $__Context->editor_config->content_font_size ?: '13px' ?>;
					line-height: <?php echo $__Context->editor_config->content_line_height ?: '160%' ?>;
					width:90%" title="Font Preview"><?php echo $lang->font_preview ?></textarea>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->guide_additional_css ?></label>
			<div class="x_controls">
				<textarea id="additional_css" name="additional_css" style="width:90%" rows="4" cols="42"><?php echo escape(implode("\n", $__Context->editor_config->additional_css ?: array())) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_additional_css ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->guide_additional_mobile_css ?></label>
			<div class="x_controls">
				<textarea id="additional_css" name="additional_mobile_css" style="width:90%" rows="4" cols="42"><?php echo escape(implode("\n", $__Context->editor_config->additional_mobile_css ?: array())) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_additional_css ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="font_size"><?php echo $lang->guide_additional_plugins ?></label>
			<div class="x_controls">
				<input type="text" id="additional_plugins" name="additional_plugins" value="<?php echo implode(', ', $__Context->editor_config->additional_plugins) ?>" />
				<p class="x_help-block"><?php echo $lang->about_additional_plugins ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="font_size"><?php echo $lang->guide_remove_plugins ?></label>
			<div class="x_controls">
				<input type="text" id="remove_plugins" name="remove_plugins" value="<?php echo implode(', ', $__Context->editor_config->remove_plugins) ?>" />
				<p class="x_help-block">
					<?php echo $lang->about_remove_plugins ?>
					<a href="#" class="default_remove_plugins" data-default-list="<?php echo implode(', ', Editor::$default_editor_config['remove_plugins']) ?>"><?php echo lang('admin.restore_default_viewport') ?></a>
				</p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="font_size"><?php echo $lang->guide_choose_font_size_body ?></label>
			<div class="x_controls">
				<input type="text" id="font_size" name="content_font_size" value="<?php echo $__Context->editor_config->content_font_size ?: 13 ?>" />
				<p class="x_help-block"><?php echo $lang->about_unit_default_px ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="line_height"><?php echo $lang->guide_choose_line_height ?></label>
			<div class="x_controls">
				<input type="text" id="line_height" name="content_line_height" value="<?php echo $__Context->editor_config->content_line_height ?: 160 ?>" />
				<p class="x_help-block"><?php echo $lang->about_unit_default_percent ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="paragraph_spacing"><?php echo $lang->guide_choose_paragraph_spacing ?></label>
			<div class="x_controls">
				<input type="text" id="paragraph_spacing" name="content_paragraph_spacing" value="<?php echo $__Context->editor_config->content_paragraph_spacing ?: 0 ?>" />
				<p class="x_help-block"><?php echo $lang->about_unit_default_px ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->guide_choose_word_break ?></label>
			<div class="x_controls">
				<label for="word_break_normal">
					<input type="radio" name="content_word_break" id="word_break_normal" value="normal"<?php if($__Context->editor_config->content_word_break == 'normal' || !$__Context->editor_config->content_word_break){ ?> checked="checked"<?php } ?> /> <?php echo $lang->word_break_normal ?>
				</label>
				<label for="word_break_keep_all">
					<input type="radio" name="content_word_break" id="word_break_keep_all" value="keep-all"<?php if($__Context->editor_config->content_word_break == 'keep-all'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->word_break_keep_all ?>
				</label>
				<label for="word_break_break_all">
					<input type="radio" name="content_word_break" id="word_break_break_all" value="break-all"<?php if($__Context->editor_config->content_word_break == 'break-all'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->word_break_break_all ?>
				</label>
				<label for="word_break_none">
					<input type="radio" name="content_word_break" id="word_break_none" value="none"<?php if($__Context->editor_config->content_word_break == 'none'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->word_break_none ?>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->enable_autosave ?></label>
			<div class="x_controls">
				<label class="x_inline"><input type="radio" name="enable_autosave" value="Y"<?php if($__Context->editor_config->enable_autosave != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label class="x_inline"><input type="radio" name="enable_autosave" value="N"<?php if($__Context->editor_config->enable_autosave == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<p class="x_help-block"><?php echo $lang->about_enable_autosave ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->editor_auto_dark_mode ?></label>
			<div class="x_controls">
				<label class="x_inline"><input type="radio" name="auto_dark_mode" value="Y"<?php if($__Context->editor_config->auto_dark_mode != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label class="x_inline"><input type="radio" name="auto_dark_mode" value="N"<?php if($__Context->editor_config->auto_dark_mode == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<p class="x_help-block"><?php echo $lang->about_editor_auto_dark_mode ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->allow_html ?></label>
			<div class="x_controls">
				<label class="x_inline"><input type="radio" name="allow_html" value="Y"<?php if($__Context->editor_config->allow_html != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label class="x_inline"><input type="radio" name="allow_html" value="N"<?php if($__Context->editor_config->allow_html == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->guide_choose_autoinsert_types ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="checkbox" name="autoinsert_types[]" value="image"<?php if($__Context->editor_config->autoinsert_image !== 'none' && (!isset($__Context->editor_config->autoinsert_types) || isset($__Context->editor_config->autoinsert_types['image']))){ ?> checked="checked"<?php } ?> /> <?php echo $lang->autoinsert_types['image'] ?>
				</label>
				<label class="x_inline">
					<input type="checkbox" name="autoinsert_types[]" value="audio"<?php if($__Context->editor_config->autoinsert_image !== 'none' && (!isset($__Context->editor_config->autoinsert_types) || isset($__Context->editor_config->autoinsert_types['audio']))){ ?> checked="checked"<?php } ?> /> <?php echo $lang->autoinsert_types['audio'] ?>
				</label>
				<label class="x_inline">
					<input type="checkbox" name="autoinsert_types[]" value="video"<?php if($__Context->editor_config->autoinsert_image !== 'none' && (!isset($__Context->editor_config->autoinsert_types) || isset($__Context->editor_config->autoinsert_types['video']))){ ?> checked="checked"<?php } ?> /> <?php echo $lang->autoinsert_types['video'] ?>
				</label>
				<br />
				<label for="autoinsert_paragraph">
					<input type="radio" name="autoinsert_position" id="autoinsert_paragraph" value="paragraph"<?php if($__Context->editor_config->autoinsert_position == 'paragraph' || !$__Context->editor_config->autoinsert_position){ ?> checked="checked"<?php } ?> /> <?php echo $lang->autoinsert_paragraph ?>
				</label>
				<label for="autoinsert_inline">
					<input type="radio" name="autoinsert_position" id="autoinsert_inline" value="inline"<?php if($__Context->editor_config->autoinsert_position == 'inline'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->autoinsert_inline ?>
				</label>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<!-- Editor Preview -->
<section class="section">
	<h1><?php echo $lang->editor_component ?></h1>
	<?php Context::addJsFile("modules/editor/ruleset/componentOrderAndUse.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" ><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="componentOrderAndUse" />
		<input type="hidden" name="module" value="editor" />
		<input type="hidden" name="act" value="procEditorAdminCheckUseListOrder" />
		<input type="hidden" name="xe_validator_id" value="modules/editor/tpl/admin_index/1" />
		<table class="x_table x_table-striped x_table-hover sortable dsTg">
			<caption>
				<strong><?php echo $lang->total_count ?>(<?php echo $__Context->component_count ?>)</strong>
				<div class="x_pull-right x_btn-group">
					<a class="x_btn x_active __simple"><?php echo $lang->simple_view ?></a>
					<a class="x_btn __detail"><?php echo $lang->detail_view ?></a>
				</div>
			</caption>
			<thead>
				<tr>
					<th class="nowr"><?php echo $lang->cmd_move ?></th>
					<th><?php echo $lang->component_name ?></th>
					<th class="nowr"><?php echo $lang->version ?></th>
					<th class="nowr rx_detail_marks"><?php echo $lang->author ?></th>
					<th class="nowr rx_detail_marks"><?php echo $lang->path ?></th>
					<th class="nowr"><?php echo $lang->use ?></th>
					<th class="nowr rx_detail_marks"><?php echo $lang->cmd_delete ?></th>
				</tr>
			</thead>
			<tbody class="uDrag">
				<?php if($__Context->component_list)foreach($__Context->component_list as $__Context->component_name => $__Context->xml_info){ ?>
				<tr>
					<td><div class="wrap" style="height:70px"><button type="button" class="dragBtn">Move to</button></div></td>
					<td class="title">
						<p><b><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispEditorAdminSetupComponent', 'component_name', $__Context->xml_info->component_name) ?>"><?php echo $__Context->xml_info->title ?></a></b></p>
						<input type="hidden" name="component_names[]" value="<?php echo $__Context->xml_info->component_name ?>" />
						<p><?php echo nl2br($__Context->xml_info->description) ?></p>
						<?php if($__Context->xml_info->version && $__Context->xml_info->need_update == 'Y'){ ?>
						<p class="update"><?php echo $lang->msg_avail_easy_update ?><a href="<?php echo getUrl('act','dispAutoinstallAdminInstall','package_srl',$__Context->xml_info->package_srl) ?>"><?php echo $lang->msg_do_you_like_update ?></a></p>
						<?php } ?>
					</td>
					<td><?php echo $__Context->xml_info->version ?></td>
					<td class="nowr rx_detail_marks">
						<?php $__loop_tmp=$__Context->xml_info->author;if($__loop_tmp)foreach($__loop_tmp as $__Context->author){ ?><a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->name ?></a><?php } ?>
					</td>
					<td class="rx_detail_marks"><?php echo $__Context->xml_info->path ?></td>
					<td><input type="checkbox" name="enables[]" id="enable" value="<?php echo $__Context->xml_info->component_name ?>" title="Use this component " <?php if($__Context->xml_info->enabled=='Y'){ ?> checked="checked"<?php } ?> /></td>
					<td class="rx_detail_marks">
						<?php if($__Context->xml_info->version && $__Context->xml_info->delete_url){ ?>
						<a href="<?php echo $__Context->xml_info->delete_url ?>"><?php echo $lang->cmd_delete ?></a>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="x_clearfix">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<script>
jQuery(function($){
	
	// Restore default list of editor plugins to remove
	$('.default_remove_plugins').on('click', function(e) {
		var default_list = $(this).data('default-list');
		$('#remove_plugins').val(default_list);
		e.preventDefault();
	});
		
	// Editor Preview
	function preview(){
		$('._preview iframe').css({
			width	: "100%",
			height	: "500px"
		});
	}
	preview();
	$('._preview li>a').click(preview);
	
	// init
	var fontPreview = $('.fontPreview');
	var fontSelector = $('.fontSelector');
	var checkedFont = fontSelector.filter(':checked').css('fontFamily');
	var changedSize = $('#font_size').val();
	// change event
	fontSelector.change(function(){
		var myFont = $(this).css('font-family');
		if ($(this).val() === 'Y') {
			myFont = $("input[name='content_font_defined']").val();
		}
		fontPreview.css('font-family', myFont);
	});
	$('#font_size').keyup(function(){
		fontPreview.css('font-size', $(this).val() + 'px');
	}).change(function(){$(this).keyup()});
	$('#line_height').keyup(function(){
		fontPreview.css('line-height', $(this).val() + '%');
	}).change(function(){$(this).keyup()});
	$('input[name=font_defined]').click(function(){
		$('input[name=content_font]').removeAttr('checked');
	});
	$('input[name=content_font]').click(function(){
		$('input[name=font_defined]').removeAttr('checked');
	});
});
</script>
