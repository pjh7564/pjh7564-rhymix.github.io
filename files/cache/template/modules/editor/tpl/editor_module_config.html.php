<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/editor/tpl/css/editor_module_config.css--><?php Context::loadFile(['modules/editor/tpl/css/editor_module_config.css', '', '', '', []]); ?>
<!--#Meta:modules/editor/tpl/js/editor_module_config.js--><?php Context::loadFile(['modules/editor/tpl/js/editor_module_config.js', '', '', '']); ?>
<form action="./" method="post" class="section"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="act" value="procEditorInsertModuleConfig" />
	<input type="hidden" name="module" value="editor" />
	<input type="hidden" name="target_module_srl" value="<?php echo $__Context->module_info->module_srl?$__Context->module_info->module_srl:$__Context->module_srls ?>" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/editor/addition_setup/1" />
    <h1><?php echo $lang->editor ?></h1>
	<table class="x_table x_table-striped x_table-hover">
		<thead>
			<tr>
				<th scope="col" style="width:160px">&nbsp;</th>
				<th scope="col"><?php echo $lang->document ?></th>
				<th scope="col"><?php echo $lang->comment ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row" style="text-align:right"><?php echo $lang->default_editor_settings ?></th>
				<td colspan="2">
					<label for="default_editor_settings" class="x_inline">
						<input type="checkbox" value="Y" id="default_editor_settings" name="default_editor_settings"<?php if($__Context->editor_config->default_editor_settings!=='N'){ ?> checked="checked"<?php } ?> />
						<?php echo $lang->about_default_editor_settings ?>
					</label>
				</td>
			</tr>
			<tr class="editor_skin">
				<th scope="row" style="text-align:right"><?php echo $lang->pc ?></th>
				<td>
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
				</td>
				<td>
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
				</td>
			</tr>
			<tr class="editor_skin">
				<th scope="row" style="text-align:right"><?php echo $lang->mobile ?></th>
				<td>
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
				</td>
				<td>
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
				</td>
			</tr>
			<tr class="editor_skin">
				<th scope="row" style="text-align:right"><label for="content_font"><?php echo $lang->content_font ?></label></th>
				<td colspan="2">
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
				</td>
			</tr>
			<tr class="editor_skin">
				<th scope="row" style="text-align:right"><label for="content_font_size"><?php echo $lang->content_font_size ?></label></th>
				<td colspan="2">
					<input type="text" id="font_size" name="content_font_size" value="<?php echo $__Context->editor_config->content_font_size ?: 13 ?>" />
					<p class="x_help-inline"><?php echo $lang->about_unit_default_px ?></p>	
				</td>
			</tr>
			<tr class="editor_skin">
				<th scope="row" style="text-align:right"><?php echo $lang->enable_autosave ?></th>
				<td colspan="2">
					<label class="x_inline"><input type="radio" name="enable_autosave" value="Y"<?php if($__Context->editor_config->enable_autosave != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
					<label class="x_inline"><input type="radio" name="enable_autosave" value="N"<?php if($__Context->editor_config->enable_autosave == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
					<p class="x_help-inline"><?php echo $lang->about_enable_autosave ?></p>
				</td>
			</tr>
			<tr class="editor_skin">
				<th scope="row" style="text-align:right"><?php echo $lang->editor_auto_dark_mode ?></th>
				<td colspan="2">
					<label class="x_inline"><input type="radio" name="auto_dark_mode" value="Y"<?php if($__Context->editor_config->auto_dark_mode != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
					<label class="x_inline"><input type="radio" name="auto_dark_mode" value="N"<?php if($__Context->editor_config->auto_dark_mode == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
					<p class="x_help-inline"><?php echo $lang->about_editor_auto_dark_mode ?></p>
				</td>
			</tr>
			<tr class="editor_skin">
				<th scope="row" style="text-align:right"><?php echo $lang->allow_html ?></th>
				<td colspan="2">
					<label class="x_inline"><input type="radio" name="allow_html" value="Y"<?php if($__Context->editor_config->allow_html != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
					<label class="x_inline"><input type="radio" name="allow_html" value="N"<?php if($__Context->editor_config->allow_html == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				</td>
			</tr>
			<tr>
				<th scope="row" style="text-align:right"><?php echo $lang->enable_html_grant ?></th>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="enable_html_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="enable_html_grant[]" value="<?php echo $__Context->k ?>" id="enable_html_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->enable_html_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="enable_comment_html_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="enable_comment_html_grant[]" value="<?php echo $__Context->k ?>" id="enable_comment_html_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->enable_comment_html_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
			</tr>
			<tr>
				<th scope="row" style="text-align:right"><?php echo $lang->upload_file_grant ?></th>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="fileupload_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="upload_file_grant[]" value="<?php echo $__Context->k ?>" id="fileupload_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->upload_file_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="comment_fileupload_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="comment_upload_file_grant[]" value="<?php echo $__Context->k ?>" id="comment_fileupload_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->comment_upload_file_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
			</tr>
			<tr>
				<th scope="row" style="text-align:right"><?php echo $lang->enable_default_component_grant ?></th>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="default_componen_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="enable_default_component_grant[]" value="<?php echo $__Context->k ?>" id="default_componen_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->enable_default_component_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="comment_default_component_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="enable_comment_default_component_grant[]" value="<?php echo $__Context->k ?>" id="comment_default_component_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->enable_comment_default_component_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
			</tr>
			<tr>
				<th scope="row" style="text-align:right"><?php echo $lang->enable_extra_component_grant ?></th>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="componen_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="enable_component_grant[]" value="<?php echo $__Context->k ?>" id="componen_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->enable_component_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
				<td>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="comment_component_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="enable_comment_component_grant[]" value="<?php echo $__Context->k ?>" id="comment_component_<?php echo $__Context->k ?>"<?php if(in_array($__Context->k, $__Context->editor_config->enable_comment_component_grant)){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php } ?>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="x_clearfix">
		<button class="x_btn x_btn-primary x_pull-right" type="submit"><?php echo $lang->cmd_save ?></button>
	</div>
</form>
<script>
jQuery(function($){
	var editor_skiin_module_cfg = $('tr.editor_skin');
	if($('#default_editor_settings').prop( 'checked' ))
	{
		editor_skiin_module_cfg.hide();
	}
	$('#default_editor_settings').change(function(){
		if($(this).prop( 'checked' )){
			editor_skiin_module_cfg.slideUp(200);
		} else {
			editor_skiin_module_cfg.slideDown(200);
		}
	});
});
</script>