<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/tpl','header.html') ?>
<!--#Meta:modules/module/tpl/js/multi_order.js--><?php Context::loadFile(['modules/module/tpl/js/multi_order.js', '', '', '']); ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/board/tpl/board_insert/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/board/ruleset/insertBoard.xml", FALSE, "", 0, "body", TRUE, "") ?><form  class="x_form-horizontal" action="./" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertBoard" />
	<input type="hidden" name="module" value="board" />
	<input type="hidden" name="act" value="procBoardAdminInsertBoard" />
	<input type="hidden" name="page" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->page, ENT_QUOTES, 'UTF-8', false) : ($__Context->page)) ?>" />
	<input type="hidden" name="module_srl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->module_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->module_srl)) ?>" />
	<?php if($__Context->mid || $__Context->module_srl){ ?><input type="hidden" name="success_return_url" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getRequestUriByServerEnviroment(), ENT_QUOTES, 'UTF-8', false) : (getRequestUriByServerEnviroment())) ?>" /><?php } ?>
	<?php if($__Context->logged_info->is_admin != 'Y'){ ?><input type="hidden" name="board_name" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->mid, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->mid)) ?>" /><?php } ?>
	<input type="hidden" name="xe_validator_id" value="modules/board/tpl/board_insert/1" />
	<section class="section">
		<h1><?php echo $lang->subtitle_primary ?></h1>
		<?php if($__Context->logged_info->is_admin == 'Y'){ ?><div class="x_control-group">
			<label class="x_control-label" for="board_name"><?php echo $lang->mid ?></label>
			<div class="x_controls">
				<input type="text" name="board_name" id="board_name" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->mid, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->mid)) ?>" />
				<a href="#module_name_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="module_name_help" class="x_help-block" hidden><?php echo $lang->about_mid ?></p>
			</div>
		</div><?php } ?>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $lang->browser_title ?></label>
			<div class="x_controls">
				<input type="text" name="browser_title" id="browser_title" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->browser_title, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->browser_title)) ?>" class="lang_code" />
				<a href="#browser_title_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="browser_title_help" class="x_help-block" hidden><?php echo $lang->about_browser_title ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_meta_keywords"><?php echo $lang->meta_keywords ?></label>
			<div class="x_controls">
				<input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->meta_keywords, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->meta_keywords)) ?>" class="lang_code" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_meta_description"><?php echo $lang->meta_description ?></label>
			<div class="x_controls">
				<input type="text" name="meta_description" id="meta_description" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->meta_description, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->meta_description)) ?>" class="lang_code" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="layout_srl"><?php echo $lang->layout ?></label>
			<div class="x_controls">
				<select name="layout_srl" id="layout_srl">
					<option value="0"><?php echo $lang->notuse ?></option>
					<?php $__loop_tmp=$__Context->layout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->layout_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->layout_srl)) ?>"<?php if($__Context->module_info->layout_srl== $__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->title)) ?> (<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->layout, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->layout)) ?>)</option><?php } ?>
				</select>
				<a href="#layout_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="layout_help" class="x_help-block" hidden><?php echo $lang->about_layout ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="skin"><?php echo $lang->skin ?></label>
			<div class="x_controls">
				<select name="skin" id="skin" style="width:auto">
					<?php $__loop_tmp=$__Context->skin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->module_info->skin== $__Context->key || (!$__Context->module_info->skin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->title)) ?></option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="list_count"><?php echo $lang->list_count ?></label>
			<div class="x_controls">
				<input type="text" name="list_count" id="list_count" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->list_count?$__Context->module_info->list_count:20, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->list_count?$__Context->module_info->list_count:20)) ?>" style="width:30px" />
				<p class="x_help-inline"><?php echo $lang->about_list_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="search_list_count"><?php echo $lang->search_list_count ?></label>
			<div class="x_controls">
				<input type="text" name="search_list_count" id="search_list_count" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->search_list_count?$__Context->module_info->search_list_count:20, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->search_list_count?$__Context->module_info->search_list_count:20)) ?>" style="width:30px" />
				<p class="x_help-inline"><?php echo $lang->about_search_list_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="page_count"><?php echo $lang->page_count ?></label>
			<div class="x_controls">
				<input type="text" name="page_count" id="page_count" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->page_count?$__Context->module_info->page_count:10, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->page_count?$__Context->module_info->page_count:10)) ?>" style="width:30px" />
				<p class="x_help-inline"><?php echo $lang->about_page_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_header_text"><?php echo $lang->header_text ?></label>
			<div class="x_controls">
				<textarea name="header_text" id="header_text" class="lang_code" rows="8" cols="42"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->header_text, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->header_text)) ?></textarea>
				<p id="header_text_help" class="x_help-block"><?php echo $lang->about_header_text ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_footer_text"><?php echo $lang->footer_text ?></label>
			<div class="x_controls">
				<textarea name="footer_text" id="footer_text" class="lang_code" rows="8" cols="42"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->footer_text, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->footer_text)) ?></textarea>
				<p id="footer_text_help" class="x_help-block"><?php echo $lang->about_footer_text ?></p>
			</div>
		</div>
	</section>
	<section class="section">
		<h1><?php echo $lang->mobile_settings ?></h1>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->mobile_view ?></label>
			<div class="x_controls">
				<label class="x_inline" for="use_mobile"><input type="checkbox" name="use_mobile" id="use_mobile" value="Y"<?php if($__Context->module_info->use_mobile == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->about_mobile_view ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mlayout_srl"><?php echo $lang->mobile_layout ?></label>
			<div class="x_controls">
				<select name="mlayout_srl" id="mlayout_srl">
					<option value="0"><?php echo $lang->notuse ?></option>
					<?php $__loop_tmp=$__Context->mlayout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->layout_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->layout_srl)) ?>"<?php if($__Context->module_info->mlayout_srl== $__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->title)) ?> <?php if($__Context->val->layout){ ?>(<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->layout, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->layout)) ?>)<?php } ?></option><?php } ?>
				</select>
				<a href="#mobile_layout_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="mobile_layout_help" class="x_help-block" hidden><?php echo $lang->about_layout ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mskin"><?php echo $lang->mobile_skin ?></label>
			<div class="x_controls">
				<select name="mskin" id="mskin">
					<?php $__loop_tmp=$__Context->mskin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->module_info->mskin== $__Context->key || (!$__Context->module_info->skin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->title)) ?></option><?php } ?>
				</select>
				<a href="#mobile_skin_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="mobile_skin_help" class="x_help-block" hidden><?php echo $lang->about_skin ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mobile_list_count"><?php echo $lang->list_count ?></label>
			<div class="x_controls">
				<input type="text" name="mobile_list_count" id="mobile_list_count" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->mobile_list_count?$__Context->module_info->mobile_list_count:20, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->mobile_list_count?$__Context->module_info->mobile_list_count:20)) ?>" style="width:30px" />
				<p class="x_help-inline"><?php echo $lang->about_list_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mobile_search_list_count"><?php echo $lang->search_list_count ?></label>
			<div class="x_controls">
				<input type="text" name="mobile_search_list_count" id="mobile_search_list_count" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->mobile_search_list_count?$__Context->module_info->mobile_search_list_count:20, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->mobile_search_list_count?$__Context->module_info->mobile_search_list_count:20)) ?>" style="width:30px" />
				<p class="x_help-inline"><?php echo $lang->about_search_list_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="mobile_page_count"><?php echo $lang->page_count ?></label>
			<div class="x_controls">
				<input type="text" name="mobile_page_count" id="mobile_page_count" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->mobile_page_count?$__Context->module_info->mobile_page_count:5, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->mobile_page_count?$__Context->module_info->mobile_page_count:5)) ?>" style="width:30px" />
				<p class="x_help-inline"><?php echo $lang->about_mobile_page_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_mobile_header_text"><?php echo $lang->mobile_header_text ?></label>
			<div class="x_controls">
				<textarea name="mobile_header_text" id="mobile_header_text" class="lang_code" rows="8" cols="42"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->mobile_header_text, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->mobile_header_text)) ?></textarea>
				<p id="mobile_header_text_help" class="x_help-block"><?php echo $lang->about_mobile_header_text ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_mobile_footer_text"><?php echo $lang->mobile_footer_text ?></label>
			<div class="x_controls">
				<textarea name="mobile_footer_text" id="mobile_footer_text" class="lang_code" rows="8" cols="42"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->mobile_footer_text, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->mobile_footer_text)) ?></textarea>
				<p id="mobile_footer_text_help" class="x_help-block"><?php echo $lang->about_mobile_footer_text ?></p>
			</div>
		</div>
	</section>
	<section class="section">
		<h1><?php echo $lang->cmd_list_setting ?></h1>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_list_items ?></label>
			<div class="x_controls">
				<?php $__Context->list = array_keys($__Context->list_config) ?>
				<input type="hidden" name="list" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(implode(',', $__Context->list), ENT_QUOTES, 'UTF-8', false) : (implode(',', $__Context->list))) ?>" />
				<p style="padding:3px 0 0 0"><?php echo $lang->about_list_config ?></p>
				<div style="display:inline-block">
					<select class="multiorder_show" size="8" multiple="multiple" style="width:220px;vertical-align:top;margin-bottom:8px">
						<?php $__loop_tmp=$__Context->extra_vars;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){;
if(!$__Context->list_config[$__Context->key]){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(Context::replaceUserLang($__Context->val->name), ENT_QUOTES, 'UTF-8', false) : (Context::replaceUserLang($__Context->val->name))) ?></option><?php }} ?>
					</select><br />
					<button type="button" class="x_btn multiorder_add" style="vertical-align:top"><?php echo $lang->cmd_insert ?></button>
				</div>
				<div style="display:inline-block">
					<select class="multiorder_selected" size="8" multiple="multiple" style="width:220px;vertical-align:top;margin-bottom:8px">
						<?php $__loop_tmp=$__Context->list_config;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(Context::replaceUserLang($__Context->val->name), ENT_QUOTES, 'UTF-8', false) : (Context::replaceUserLang($__Context->val->name))) ?></option><?php } ?>
					</select><br />
					<span class="x_btn-group">
						<button type="button" class="x_btn multiorder_up" style="vertical-align:top"><?php echo $lang->cmd_move_up ?></button>
						<button type="button" class="x_btn multiorder_down" style="vertical-align:top"><?php echo $lang->cmd_move_down ?></button>
						<button type="button" class="x_btn multiorder_del" style="vertical-align:top"><?php echo $lang->cmd_delete ?></button>
					</span>
				</div>
				<script>
					xe.registerApp(new xe.MultiOrderManager('list'));
				</script>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->order_type ?></label>
			<div class="x_controls">
				<select name="order_target" id="order_target" title="<?php echo $lang->order_target ?>">
					<?php $__loop_tmp=$__Context->order_target;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->module_info->order_target== $__Context->key){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val, ENT_QUOTES, 'UTF-8', false) : ($__Context->val)) ?></option><?php } ?>
					<?php if($__Context->extra_order_target){ ?>
					<?php $__loop_tmp=$__Context->extra_order_target;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->module_info->order_target== $__Context->key){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(Context::replaceUserLang($__Context->val), ENT_QUOTES, 'UTF-8', false) : (Context::replaceUserLang($__Context->val))) ?></option><?php } ?>
					<?php } ?>
				</select>
				<select name="order_type" id="order_type" title="<?php echo $lang->order_type ?>">
					<option value="asc"<?php if($__Context->module_info->order_type != 'desc'){ ?> selected="selected"<?php } ?>><?php echo $lang->order_asc ?></option>
					<option value="desc"<?php if($__Context->module_info->order_type == 'desc'){ ?> selected="selected"<?php } ?>><?php echo $lang->order_desc ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->except_notice ?></label>
			<div class="x_controls">
				<label class="x_inline" for="except_notice_Y"><input type="radio" name="except_notice" id="except_notice_Y" value="Y"<?php if($__Context->module_info->except_notice !== 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label class="x_inline" for="except_notice_N"><input type="radio" name="except_notice" id="except_notice_N" value="N"<?php if($__Context->module_info->except_notice === 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<p class="x_help-block"><?php echo $lang->about_except_notice ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_bottom_list ?></label>
			<div class="x_controls">
				<label class="x_inline" for="use_bottom_list_Y"><input type="radio" name="use_bottom_list" id="use_bottom_list_Y" value="Y"<?php if($__Context->module_info->use_bottom_list !== 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label class="x_inline" for="use_bottom_list_N"><input type="radio" name="use_bottom_list" id="use_bottom_list_N" value="N"<?php if($__Context->module_info->use_bottom_list === 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<p class="x_help-block"><?php echo $lang->about_use_bottom_list ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->customize_bottom_list ?></label>
			<div class="x_controls">
				<label for="skip_bottom_list_for_olddoc" class="x_inline">
					<input type="checkbox" name="skip_bottom_list_for_olddoc" id="skip_bottom_list_for_olddoc" value="Y"<?php if($__Context->module_info->skip_bottom_list_for_olddoc === 'Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->skip_bottom_list_for_olddoc ?>
				</label>
				<input type="number" name="skip_bottom_list_days" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->skip_bottom_list_days ?: 30, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->skip_bottom_list_days ?: 30)) ?>" /> <?php echo $lang->unit_day ?>
				<br />
				<label for="skip_bottom_list_for_robot">
					<input type="checkbox" name="skip_bottom_list_for_robot" id="skip_bottom_list_for_robot" value="Y"<?php if($__Context->module_info->skip_bottom_list_for_robot === 'Y'){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->skip_bottom_list_for_robot ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_customize_bottom_list ?></p>
			</div>
		</div>
	</section>
	<section class="section">
		<h1><?php echo $lang->subtitle_advanced ?></h1>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_anonymous ?></label>
			<div class="x_controls">
				<label class="x_inline" for="use_anonymous"><input type="checkbox" name="use_anonymous" id="use_anonymous" value="Y"<?php if($__Context->module_info->use_anonymous == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->about_use_anonymous_part1 ?></label>
				<p class="x_help-block"><?php echo $lang->about_use_anonymous_part2 ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->anonymous_except_admin ?></label>
			<div class="x_controls">
				<label class="x_inline" for="anonymous_except_admin"><input type="checkbox" name="anonymous_except_admin" id="anonymous_except_admin" value="Y"<?php if($__Context->module_info->anonymous_except_admin == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->about_anonymous_except_admin ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->anonymous_name ?></label>
			<div class="x_controls">
				<input type="text" name="anonymous_name" id="anonymous_name" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->anonymous_name ?: 'anonymous', ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->anonymous_name ?: 'anonymous')) ?>" />
				<p class="x_help-block"><?php echo $lang->about_anonymous_name ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->document_length_limit ?></label>
			<div class="x_controls">
				<input type="number" name="document_length_limit" id="document_length_limit" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->document_length_limit ?: 1024, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->document_length_limit ?: 1024)) ?>" /> KB
				<p class="x_help-block"><?php echo $lang->about_document_length_limit ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->comment_length_limit ?></label>
			<div class="x_controls">
				<input type="number" name="comment_length_limit" id="comment_length_limit" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->comment_length_limit ?: 128, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->comment_length_limit ?: 128)) ?>" /> KB
				<p class="x_help-block"><?php echo $lang->about_comment_length_limit ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->consultation ?></label>
			<div class="x_controls">
				<label class="x_inline" for="consultation"><input type="checkbox" name="consultation" id="consultation" value="Y"<?php if($__Context->module_info->consultation == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->about_consultation ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->update_log ?></label>
			<div class="x_controls">
				<label class="x_inline" for="update_log"><input type="checkbox" name="update_log" id="update_log" value="Y"<?php if($__Context->module_info->update_log == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->about_update_log ?></label>
				<p class="x_help-block"><?php echo $lang->msg_warning_update_log ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->update_order_on_comment ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="update_order_on_comment_y" name="update_order_on_comment" value="Y"<?php if($__Context->module_info->update_order_on_comment != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="update_order_on_comment_n" name="update_order_on_comment" value="N"<?php if($__Context->module_info->update_order_on_comment == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_update_order_on_comment ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->document_force_to_move ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="trash_use_y" name="trash_use" value="Y"<?php if($__Context->module_info->trash_use == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="trash_use_n" name="trash_use" value="N"<?php if($__Context->module_info->trash_use != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_document_force_to_move ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->non_login_vote ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="non_login_vote_y" name="non_login_vote" value="Y"<?php if($__Context->module_info->non_login_vote == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="non_login_vote_n" name="non_login_vote" value="N"<?php if($__Context->module_info->non_login_vote != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_non_login_vote ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cancel_vote ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="cancel_vote_y" name="cancel_vote" value="Y"<?php if($__Context->module_info->cancel_vote == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="cancel_vote_n" name="cancel_vote" value="N"<?php if($__Context->module_info->cancel_vote != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_cancel_vote ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->filter_specialchars ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input type="radio" id="filter_specialchars_y" name="filter_specialchars" value="Y"<?php if($__Context->module_info->filter_specialchars !== 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?>
				</label>
				<label class="x_inline">
					<input type="radio" id="filter_specialchars_n" name="filter_specialchars" value="N"<?php if($__Context->module_info->filter_specialchars === 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?>
				</label>
				<p class="x_help-block"><?php echo $lang->about_filter_specialchars ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->protect_content ?></label>
			<div class="x_controls">
				<label class="x_inline" for="protect_delete_content"><input type="checkbox" name="protect_delete_content" id="protect_delete_content" value="Y"<?php if($__Context->module_info->protect_delete_content == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_delete ?></label>
				<label class="x_inline" for="protect_update_content"><input type="checkbox" name="protect_update_content" id="protect_update_content" value="Y"<?php if($__Context->module_info->protect_update_content == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_modify ?></label>
				<p><?php echo $lang->about_protect_content ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->protect_comment ?></label>
			<div class="x_controls">
				<label class="x_inline" for="protect_delete_comment"><input type="checkbox" name="protect_delete_comment" id="protect_delete_comment" value="Y"<?php if($__Context->module_info->protect_delete_comment == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_delete ?></label>
				<label class="x_inline" for="protect_update_comment"><input type="checkbox" name="protect_update_comment" id="protect_update_comment" value="Y"<?php if($__Context->module_info->protect_update_comment == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_modify ?></label>
				<p><?php echo $lang->about_protect_comment ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->protect_admin_content ?></label>
			<div class="x_controls">
				<label class="x_inline" for="protect_admin_content_delete"><input type="checkbox" name="protect_admin_content_delete" id="protect_admin_content_delete" value="Y"<?php if($__Context->module_info->protect_admin_content_delete !== 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_delete ?></label>
				<label class="x_inline" for="protect_admin_content_update"><input type="checkbox" name="protect_admin_content_update" id="protect_admin_content_update" value="Y"<?php if($__Context->module_info->protect_admin_content_update !== 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_modify ?></label>
				<p><?php echo $lang->about_protect_admin_content ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->protect_regdate ?></label>
			<div class="x_controls">
				<?php echo $lang->document ?> : <input type="number" name="protect_document_regdate" id="protect_document_regdate" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->protect_document_regdate, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->protect_document_regdate)) ?>" />
				<?php echo $lang->comment ?> : <input type="number" name="protect_comment_regdate" id="protect_comment_regdate" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->protect_comment_regdate, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->protect_comment_regdate)) ?>" />
				<p><?php echo $lang->about_protect_regdate ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="comment_delete_message"><?php echo $lang->comment_delete_message ?></label>
			<div class="x_controls">
				<select name="comment_delete_message" id="comment_delete_message">
					<option value="no"<?php if($__Context->module_info->comment_delete_message == 'no'){ ?> selected="selected"<?php } ?>><?php echo $lang->cmd_do_not_message ?></option>
					<option value="yes"<?php if($__Context->module_info->comment_delete_message == 'yes'){ ?> selected="selected"<?php } ?>><?php echo $lang->cmd_all_comment_message ?></option>
					<option value="only_comment"<?php if(starts_with('only_comm', $__Context->module_info->comment_delete_message)){ ?> selected="selected"<?php } ?>><?php echo $lang->cmd_only_p_comment ?></option>
				</select>
				<p class="x_help-block"><?php echo $lang->about_comment_delete_message ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->status ?></label>
			<div class="x_controls">
				<input type="hidden" name="use_status[]" value="PUBLIC" />
				<label class="x_inline"><input type="checkbox" name="" value="" checked="checked" disabled="disabled" /> <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->document_status_list['PUBLIC'], ENT_QUOTES, 'UTF-8', false) : ($__Context->document_status_list['PUBLIC'])) ?></label>
				<?php $__loop_tmp=$__Context->document_status_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->value){ ?>
					<?php if($__Context->key != 'PRIVATE' && $__Context->key != 'TEMP' && $__Context->key != 'PUBLIC'){ ?>
						<label class="x_inline" for="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"><input type="checkbox" name="use_status[]" id="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if(@in_array($__Context->key, $__Context->module_info->use_status) || ($__Context->key == 'PUBLIC' && !$__Context->module_srl)){ ?> checked="checked"<?php } ?> /> <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value, ENT_QUOTES, 'UTF-8', false) : ($__Context->value)) ?></label>
					<?php } ?>
				<?php } ?>
				<p class="x_help-block"><?php echo $lang->about_use_status ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="admin_mail"><?php echo $lang->admin_mail ?></label>
			<div class="x_controls">
				<input type="text" name="admin_mail" id="admin_mail" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->admin_mail, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->admin_mail)) ?>" />
				<a href="#admin_mail_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="admin_mail_help" class="x_help-block" hidden><?php echo $lang->about_admin_mail ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="module_category_srl"><?php echo $lang->module_category ?></label>
			<div class="x_controls">
				<select name="module_category_srl" id="module_category_srl">
					<option value="0"><?php echo $lang->notuse ?></option>
					<?php $__loop_tmp=$__Context->module_category;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>"<?php if($__Context->module_info->module_category_srl == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->val->title)) ?></option><?php } ?>
				</select>
				<a href="#module_category_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="module_category_help" class="x_help-block" hidden><?php echo $lang->about_module_category ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="description"><?php echo $lang->description ?></label>
			<div class="x_controls">
				<textarea name="description" id="description" rows="4" cols="42" placeholder="<?php echo $lang->about_description ?>" style="vertical-align:top"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->module_info->description, ENT_QUOTES, 'UTF-8', false) : ($__Context->module_info->description)) ?></textarea>
				<a href="#description_help" class="x_icon-question-sign" data-toggle><?php echo $lang->help ?></a>
				<p id="description_help" class="x_help-block" hidden><?php echo $lang->about_description ?></p>
			</div>
		</div>
	</section>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button class="x_btn x_btn-primary" type="submit"><?php echo $lang->cmd_registration ?></button>
		</div>
	</div>
</form>
<style>.g11n{vertical-align:top !important}</style>
