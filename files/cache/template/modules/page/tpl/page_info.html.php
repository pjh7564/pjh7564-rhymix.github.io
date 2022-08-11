<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/page/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/page/tpl/page_info/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<section class="section">
<?php Context::addJsFile("modules/page/ruleset/updatePage.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" enctype="multipart/form-data" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="updatePage" />
	<input type="hidden" name="module" value="page" />
	<input type="hidden" name="act" value="procPageAdminUpdate" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/page/tpl/page_info/1" />
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->page_type ?></label>
		<div class="x_controls" style="padding-top:4px"><?php echo $lang->page_type_name[$__Context->module_info->page_type] ?></div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="page_name"><?php echo $lang->mid ?></label>
		<div class="x_controls">
			<input type="text" name="page_name" id="page_name" value="<?php echo $__Context->module_info->mid ?>" />
			<p class="x_help-block" id="aboutMid"><?php echo $lang->about_mid ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="module_category_srl"><?php echo $lang->module_category ?></label>
		<div class="x_controls">
			<select name="module_category_srl" id="module_category_srl">
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->module_category;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->module_category_srl==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<p class="x_help-block" id="aboutCategory"><?php echo $lang->about_module_category ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_browser_title"><?php echo $lang->browser_title ?></label>
		<div class="x_controls">
			<input type="text" name="browser_title" id="browser_title" value="<?php if(strpos($__Context->module_info->browser_title, '$user_lang->') === false){;
echo $__Context->module_info->browser_title;
}else{;
echo htmlspecialchars($__Context->module_info->browser_title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false);
} ?>" class="lang_code" />
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_meta_keywords"><?php echo $lang->meta_keywords ?></label>
		<div class="x_controls">
			<input type="text" name="meta_keywords" id="meta_keywords" value="<?php if(strpos($__Context->module_info->meta_keywords, '$user_lang->') === false){;
echo $__Context->module_info->meta_keywords;
}else{;
echo htmlspecialchars($__Context->module_info->meta_keywords);
} ?>" class="lang_code" />
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="lang_meta_description"><?php echo $lang->meta_description ?></label>
		<div class="x_controls">
			<input type="text" name="meta_description" id="meta_description" value="<?php if(strpos($__Context->module_info->meta_description, '$user_lang->') === false){;
echo $__Context->module_info->meta_description;
}else{;
echo htmlspecialchars($__Context->module_info->meta_description);
} ?>" class="lang_code" />
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="layout_srl"><?php echo $lang->layout ?></label>
		<div class="x_controls">
			<select name="layout_srl" id="layout_srl" style="width:auto">
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->layout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->layout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?>(<?php echo $__Context->val->layout ?>)</option><?php } ?>
			</select>
			<p class="x_help-block" id="aboutLayout"><?php echo $lang->about_layout ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->mobile_view ?></label>
		<div class="x_controls">
			<label for="use_mobile">
				<input type="checkbox" name="use_mobile" id="use_mobile" value="Y"<?php if($__Context->module_info->use_mobile == 'Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->about_mobile_view ?>
			</label>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="mlayout_srl"><?php echo $lang->mobile_layout ?></label>
		<div class="x_controls">
			<select name="mlayout_srl" id="mlayout_srl">
				<option value="0"><?php echo $lang->notuse ?></option>
				<?php $__loop_tmp=$__Context->mlayout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->mlayout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> <?php if($__Context->val->layout){ ?>(<?php echo $__Context->val->layout ?>)<?php } ?></option><?php } ?>
			</select>
			<p class="x_help-block" id="aboutMobileLayout"><?php echo $lang->about_layout ?></p>
		</div>
	</div>
	<?php if($__Context->module_info->page_type != 'ARTICLE'){ ?><div class="x_control-group">
		<label class="x_control-label" for="page_caching_interval"><?php echo $lang->page_caching_interval ?></label>
		<div class="x_controls">
			<input type="text" name="page_caching_interval" id="page_caching_interval" value="<?php echo (int)$__Context->module_info->page_caching_interval ?>"  /> <?php echo $lang->unit_min ?>
			<p class="x_help-block" id="aboutCaching"><?php echo $lang->about_page_caching_interval ?></p>
		</div>
	</div><?php } ?>
	<?php if($__Context->module_info->page_type == 'OUTSIDE'){ ?><div class="x_control-group">
		<label class="x_control-label" for="path"><?php echo $lang->opage_path ?></label>
		<div class="x_controls">
			<input type="text" name="path" id="path" value="<?php echo $__Context->module_info->path ?>" />
			<p class="x_help-block" id="aboutOpagePath"><?php echo $lang->about_opage_path ?><b><?php echo realpath("./") ?></b></p>
		</div>
	</div><?php } ?>
	<?php if($__Context->module_info->page_type == 'OUTSIDE'){ ?><div class="x_control-group">
		<label class="x_control-label" for="mpath"><?php echo $lang->opage_mobile_path ?></label>
		<div class="x_controls">
			<input type="text" name="mpath" id="mpath" value="<?php echo $__Context->module_info->mpath ?>"  />
			<p class="x_help-block" id="aboutOpageMobilePath"><?php echo $lang->about_opage_mobile_path ?><b><?php echo realpath("./") ?></b></p>
		</div>
	</div><?php } ?>
	<?php if($__Context->module_info->page_type == 'OUTSIDE'){ ?><div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->opage_postprocessing ?></label>
		<div class="x_controls">
			<label for="opage_proc_php" class="x_inline">
				<input type="checkbox" name="opage_proc_php" id="opage_proc_php" value="Y"<?php if(($__Context->module_info->opage_proc_php ?? 'Y') === 'Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->opage_proc_php ?>
			</label>
			<label for="opage_proc_tpl" class="x_inline">
				<input type="checkbox" name="opage_proc_tpl" id="opage_proc_tpl" value="Y"<?php if(($__Context->module_info->opage_proc_tpl ?? 'N') === 'Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->opage_proc_tpl ?>
			</label>
			<p class="x_help-block"><?php echo $lang->about_opage_postprocessing ?></p>
		</div>
	</div><?php } ?>
	<?php if($__Context->module_info->page_type == 'ARTICLE'){ ?><div class="x_control-group">
		<label class="x_control-label" for="skin"><?php echo $lang->skin ?></label>
		<div class="x_controls">
			<select name="skin" id="skin">
				<?php $__loop_tmp=$__Context->skin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->skin==$__Context->key ||(!$__Context->module_info->skin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<p class="x_help-block" id="aboutSkin"><?php echo $lang->about_skin ?></p>
		</div>
	</div><?php } ?>
	<?php if($__Context->module_info->page_type == 'ARTICLE'){ ?><div class="x_control-group optionnalData articleType">
		<label class="x_control-label" for="mskin"><?php echo $lang->mobile_skin ?></label>
		<div class="x_controls">
			<select name="mskin">
				<?php $__loop_tmp=$__Context->mskin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->mskin==$__Context->key ||(!$__Context->module_info->mskin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<p class="x_help-block" id="aboutMobileSkin"><?php echo $lang->about_skin ?></p>
		</div>
	</div><?php } ?>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</div>
	</div>
</form>
</section>
