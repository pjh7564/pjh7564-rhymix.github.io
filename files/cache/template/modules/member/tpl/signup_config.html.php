<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<!--#Meta:modules/member/tpl/js/signup_config.js--><?php Context::loadFile(['modules/member/tpl/js/signup_config.js', '', '', '']); ?>
<?php Context::loadLang('modules/file/lang'); ?>
<!--#Meta:modules/editor/tpl/js/editor_module_config.js--><?php Context::loadFile(['modules/editor/tpl/js/editor_module_config.js', '', '', '']); ?>
<script>
	xe.lang.msg_delete_extend_form = '<?php echo $lang->msg_delete_extend_form ?>';
	xe.lang.confirm_delete = '<?php echo $lang->confirm_delete ?>';
	xe.lang.cmd_delete = '<?php echo $lang->cmd_delete ?>';
	xe.lang.msg_null_prohibited_id = '<?php echo $lang->msg_null_prohibited_id ?>';
	xe.lang.msg_null_prohibited_nick_name = '<?php echo $lang->msg_null_prohibited_nick_name ?>';
	xe.lang.msg_null_managed_emailhost = '<?php echo $lang->msg_null_managed_emailhost ?>';
	xe.lang.msg_exists_user_id= '<?php echo $lang->msg_exists_user_id ?>';
</script>
<form action="./" class="x_form-horizontal" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertSignupConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
	<input type="hidden" name="agreement" value="<?php echo $__Context->config->agreement ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<div class="x_control-group">
		<label class="x_control-label" for="limit_day"><?php echo $lang->limit_day ?></label>
		<div class="x_controls">
			<input type="number" min="0" id="limit_day" name="limit_day" value="<?php echo $__Context->config->limit_day ?>" /> <?php echo $lang->unit_day ?>
			<input type="text" name="limit_day_description" value="<?php echo $__Context->config->limit_day_description ?>" placeholder="<?php echo $lang->limit_day_description ?>" style="width:90%" class="lang_code" />
			<p class="x_help-block"><?php echo $lang->about_limit_day ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="manage_email_host"><?php echo $lang->cmd_manage_email_host ?></label>
		<div class="x_controls">
			<input type="radio" id="emailhost_check_allowed" name="emailhost_check" value="allowed"<?php if($__Context->config->emailhost_check =='allowed'){ ?> checked="checked"<?php } ?> /><label for="emailhost_check_allowed" class="x_inline"> <?php echo $lang->cmd_allowed ?></label>
			<input type="radio" id="emailhost_check_prohibited" name="emailhost_check" value="prohibited"<?php if($__Context->config->emailhost_check =='prohibited'){ ?> checked="checked"<?php } ?> /><label for="emailhost_check_prohibited" class="x_inline"> <?php echo $lang->cmd_prohibited ?></label>
			<ul class="textList" id="managedEmailHost" style="margin-left:0">
				<?php $__loop_tmp=$__Context->managedEmailHost;if($__loop_tmp)foreach($__loop_tmp as $__Context->emailInfo){ ?><li id="managed_<?php echo str_replace('.','__',$__Context->emailInfo->email_host) ?>"><?php echo $__Context->emailInfo->email_host ?> <button type="button" class="x_icon-remove" onclick="doUpdateManagedEmailHost('<?php echo $__Context->emailInfo->email_host ?>','delete','<?php echo $lang->confirm_delete ?>');return false;"><?php echo $lang->delete ?></button></li><?php } ?>
			</ul>
			<textarea rows="2" cols="42" id="manage_email_host" title="<?php echo $lang->add_managed_emailhost ?>" style="vertical-align:top"></textarea>
			<button type="button" class="_addManagedEmailHost x_btn"><?php echo $lang->add ?></button>
			<p class="x_help-inline"><?php echo $lang->multi_line_input ?></p>
			<p class="x_help-block"><?php echo $lang->about_emailhost_check ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="prohibited_nick_name"><?php echo $lang->cmd_manage_nick_name ?></label>
		<div class="x_controls">
			<p><?php echo sprintf($lang->count_manage_nick_name, count($__Context->deniedNickNames)) ?></p>
			<ul class="textList" id="deniedNickNameList" style="margin-left:0">
				<?php $__loop_tmp=$__Context->deniedNickNames;if($__loop_tmp)foreach($__loop_tmp as $__Context->nicknameInfo){ ?><li id="denied_<?php echo $__Context->nicknameInfo->nick_name ?>"><?php echo $__Context->nicknameInfo->nick_name ?> <button type="button" class="x_icon-remove" onclick="doUpdateDeniedNickName('<?php echo $__Context->nicknameInfo->nick_name ?>','delete','<?php echo $lang->confirm_delete ?>');return false;"><?php echo $lang->delete ?></button></li><?php } ?>
			</ul>
			<textarea rows="2" cols="42" id="prohibited_nick_name" title="<?php echo $lang->add_prohibited_nickname ?>" style="vertical-align:top"></textarea>
			<button type="button" class="_addDeniedNickName x_btn"><?php echo $lang->add ?></button>
			<p class="x_help-inline"><?php echo $lang->multi_line_input ?></p>
		</div>
	</div>
	<?php if($__Context->useUserID){ ?><div class="x_control-group">
		<label class="x_control-label" for="prohibited_id"><?php echo $lang->cmd_manage_id ?></label>
		<div class="x_controls">
			<p><?php echo sprintf($lang->count_manage_id, count($__Context->deniedIDs)) ?></p>
			<ul class="textList" id="deniedList" style="margin-left:0">
				<?php $__loop_tmp=$__Context->deniedIDs;if($__loop_tmp)foreach($__loop_tmp as $__Context->denied_info){ ?><li id="denied_<?php echo $__Context->denied_info->user_id ?>"><?php echo $__Context->denied_info->user_id ?> <button type="button" class="x_icon-remove" onclick="doUpdateDeniedID('<?php echo $__Context->denied_info->user_id ?>','delete','<?php echo $lang->confirm_delete ?>');return false;"><?php echo $lang->delete ?></button></li><?php } ?>
			</ul>
			<textarea rows="2" cols="42" id="prohibited_id" title="<?php echo $lang->add_prohibited_id ?>" style="vertical-align:top"></textarea>
			<button type="button" class="_addDeniedID x_btn"><?php echo $lang->add ?></button>
			<p class="x_help-inline"><?php echo $lang->multi_line_input ?></p>
		</div>
	</div><?php } ?>
	<div class="x_control-group">
		<label class="x_control-label" for="redirect_url"><?php echo $lang->cmd_special_phone_number ?></label>
		<div class="x_controls">
			<input type="text" name="special_phone_number" value="<?php echo $__Context->config->special_phone_number ?>" placeholder="<?php echo $lang->phone_number ?>" />
			<input type="text" name="special_phone_code" value="<?php echo $__Context->config->special_phone_code ?>" placeholder="<?php echo $lang->verify_by_sms_code ?>" />
			<p class="x_help-block"><?php echo $lang->about_special_phone_number ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<p class="x_control-label"><?php echo $lang->cmd_max_auth_sms_count ?></p>
		<div class="x_controls">
			<input type="number" min="0" name="max_auth_sms_count" value="<?php echo $__Context->config->max_auth_sms_count ?: 5 ?>" /> <?php echo $lang->unit_count ?> /
			<input type="number" min="0" name="max_auth_sms_count_time" value="<?php echo $__Context->config->max_auth_sms_count_time ?: 600 ?>" /> <?php echo $lang->unit_sec ?>
			<p class="x_help-block"><?php echo $lang->about_max_auth_sms_count ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="redirect_url"><?php echo $lang->redirect_url ?></label>
		<div class="x_controls">
			<input class="module_search" type="text" name="redirect_url" value="<?php echo $__Context->config->redirect_url ?>" />
			<?php if($__Context->config->redirect_url){ ?><button type="button" class="__redirect_url_btn x_btn"><?php echo $lang->delete ?></button><?php } ?>
			<p class="x_help-block"><?php echo $lang->about_redirect_url ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<p class="x_control-label"><?php echo $lang->cmd_manage_form ?></p>
		<div class="x_controls">
			<table class="__join_form sortable x_table x_table-striped x_table-hover">
				<thead>
					<tr>
						<th scope="col" class="nowr" style="text-align:center"><?php echo $lang->target ?></th>
						<th scope="col" class="nowr" style="text-align:center"><?php echo $lang->use ?></th>
						<th scope="col" class="nowr" style="text-align:center"><?php echo $lang->public ?>
							[<a href="#helpPublic" data-toggle>?</a>]
							<div class="layer x_alert x_alert-info" id="helpPublic">
								<p><?php echo $lang->about_public_item ?></p>
							</div>
						</th>
						<th scope="col" class="nowr"><?php echo $lang->cmd_required ?>/<?php echo $lang->cmd_optional ?></th>
						<th scope="col" class="desc" style="text-align:center"><?php echo $lang->description ?></th>
						<th scope="col" class="nowr" style="text-align:center"><?php echo $lang->cmd_edit ?></th>
					</tr>
				</thead>
				<tbody class="uDrag">
					<?php  $__Context->disabled_list = array('find_account_question') ?>
					<?php  $__Context->fixed_public_list = array('nick_name') ?>
					<?php  $__Context->fixed_private_list = array('email_address', 'phone_number', 'password') ?>
					<?php if($__Context->config->signupForm)foreach($__Context->config->signupForm as $__Context->item){ ?>
					<?php if(in_array($__Context->item->name, $__Context->disabled_list)){ ?>
					<?php }elseif($__Context->item->isDefaultForm){ ?>
					<tr<?php if($__Context->item->imageType){ ?> class="_imageType"<?php } ?>>
						<input type="hidden" name="list_order[]" value="<?php echo $__Context->item->name ?>" />
						<?php if($__Context->item->isIdentifier || $__Context->item->mustRequired){ ?><input type="hidden" name="usable_list[]" value="<?php echo $__Context->item->name ?>"/><?php } ?>
						<?php if($__Context->item->isIdentifier || $__Context->item->mustRequired){ ?><input type="hidden" name="<?php echo $__Context->item->name ?>" value="required"/><?php } ?>
						<th scope="row">
							<div class="wrap">
								<button type="button" class="dragBtn">Move to</button>
								<?php if(in_array($__Context->item->name, ['birthday', 'signature', 'profile_image', 'image_name', 'image_mark'])){ ?>
									<input class="_title_edit lang_code" type="text" name="<?php echo $__Context->item->name ?>_title_edit" value="<?php echo $__Context->item->title ?>" placeholder="<?php echo lang($__Context->item->name) ?>" />
								<?php }else{ ?>
									<span class="_title" style="display:inline-block;white-space:pre-line;overflow:inherit;width:120px;text-overflow:ellipsis" title="<?php echo $__Context->item->title ?>"><?php echo $__Context->item->title ?></span>
								<?php } ?>
							</div>
						</th>
						<td style="text-align:center">
							<input type="checkbox" name="usable_list[]" value="<?php echo $__Context->item->name ?>" title="<?php echo $lang->use ?>"<?php if($__Context->item->isIdentifier || $__Context->item->mustRequired || $__Context->item->isUse){ ?> checked="checked"<?php };
if($__Context->item->isIdentifier || $__Context->item->mustRequired){ ?> disabled="disabled"<?php } ?> />
						</td>
						<td style="text-align:center">
							<?php if(!in_array($__Context->item->name, $__Context->fixed_private_list)){ ?>
								<input type="checkbox" name="is_<?php echo $__Context->item->name ?>_public" value="Y"<?php if($__Context->item->isPublic == 'Y'){ ?> checked="checked"<?php };
if(in_array($__Context->item->name, $__Context->fixed_public_list) || !$__Context->item->isUse){ ?> disabled="disabled"<?php } ?> />
							<?php } ?>
						</td>
						<td class="nowr">
							<label for="<?php echo $__Context->item->name ?>_re" class="x_inline"><input type="radio" id="<?php echo $__Context->item->name ?>_re" name="<?php echo $__Context->item->name ?>" class="item_required" value="required"<?php if($__Context->item->mustRequired || $__Context->item->required){ ?> checked="checked"<?php };
if(!$__Context->item->isUse){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_required ?></label>
							<?php if(!$__Context->item->mustRequired){ ?>
								<label for="<?php echo $__Context->item->name ?>_op" class="x_inline"><input type="radio" id="<?php echo $__Context->item->name ?>_op" name="<?php echo $__Context->item->name ?>" class="item_optional" value="option"<?php if(!$__Context->item->mustRequired && ($__Context->item->isUse && !$__Context->item->required)){ ?> checked="checked"<?php };
if(!$__Context->item->isUse){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_optional ?></label>
							<?php } ?>
							<?php if($__Context->item->imageType){ ?><div class="_subItem"<?php if(!$__Context->item->isUse){ ?> style="display:none"<?php } ?>>
								<p class="x_help-block">
									<label class="x_inline" for="<?php echo $__Context->item->name ?>_max_width"><?php echo $lang->cmd_image_max_width ?></label> <input type="number" min="1" name="<?php echo $__Context->item->name ?>_max_width" id="<?php echo $__Context->item->name ?>_max_width" value="<?php echo $__Context->item->max_width ?>" /> px
								</p>
								<p class="x_help-block">
									<label class="x_inline" for="<?php echo $__Context->item->name ?>_max_height"><?php echo $lang->cmd_image_max_height ?></label> <input type="number" min="1" name="<?php echo $__Context->item->name ?>_max_height" id="<?php echo $__Context->item->name ?>_max_height" value="<?php echo $__Context->item->max_height ?>" /> px
								</p>
								<p class="x_help-block">
									<label class="x_inline" for="<?php echo $__Context->item->name ?>_max_filesize"><?php echo $lang->allowed_filesize ?></label> <input type="number" min="1" name="<?php echo $__Context->item->name ?>_max_filesize" id="<?php echo $__Context->item->name ?>_max_filesize" value="<?php echo $__Context->item->max_filesize ?>" /> KB
								</p>
								<?php if($__Context->item->name === 'profile_image'){ ?>
									<p class="x_help-block">
										<label class="x_inline"><?php echo $lang->cmd_image_force_ratio ?></label> 
										<label class="x_inline"><input type="radio" name="profile_image_force_ratio" value="Y"<?php if($__Context->config->profile_image_force_ratio !== 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
										<label class="x_inline"><input type="radio" name="profile_image_force_ratio" value="N"<?php if($__Context->config->profile_image_force_ratio === 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
									</p>
								<?php } ?>
							</div><?php } ?>
							<?php if($__Context->item->name == 'phone_number'){ ?><div class="_subItem"<?php if(!$__Context->item->isUse){ ?> style="display:none"<?php } ?>>
								<label for="phone_number_default_country" class="x_inline"><?php echo $lang->phone_number_default_country ?></label>
								<select id="phone_number_default_country" name="phone_number_default_country">
									<?php if($__Context->country_list)foreach($__Context->country_list as $__Context->country_info){ ?>
										<?php if($__Context->country_info->calling_code){ ?>
											<option value="<?php echo $__Context->country_info->iso_3166_1_alpha3 ?>"<?php if($__Context->country_info->iso_3166_1_alpha3 === $__Context->config->phone_number_default_country || $__Context->country_info->calling_code === $__Context->config->phone_number_default_country){ ?> selected="selected"<?php } ?>>
												<?php echo $__Context->lang_type === 'ko' ? $__Context->country_info->name_korean : $__Context->country_info->name_english ?> (+<?php echo $__Context->country_info->calling_code ?>)
											</option>
										<?php } ?>
									<?php } ?>
								</select>
								<p class="x_help-block">
									<label class="x_inline"><?php echo $lang->phone_number_hide_country ?></label>
									<label class="x_inline"><input type="radio" name="phone_number_hide_country" value="Y"<?php if($__Context->config->phone_number_hide_country === 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
									<label class="x_inline"><input type="radio" name="phone_number_hide_country" value="N"<?php if($__Context->config->phone_number_hide_country !== 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
								</p>
								<p class="x_help-block">
									<label class="x_inline"><?php echo $lang->phone_number_allow_duplicate ?></label>
									<label class="x_inline"><input type="radio" name="phone_number_allow_duplicate" value="Y"<?php if($__Context->config->phone_number_allow_duplicate === 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
									<label class="x_inline"><input type="radio" name="phone_number_allow_duplicate" value="N"<?php if($__Context->config->phone_number_allow_duplicate !== 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
								</p>
								<p class="x_help-block">
									<label class="x_inline"><?php echo $lang->phone_number_verify_by_sms ?></label>
									<label class="x_inline"><input type="radio" name="phone_number_verify_by_sms" value="Y"<?php if($__Context->config->phone_number_verify_by_sms === 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
									<label class="x_inline"><input type="radio" name="phone_number_verify_by_sms" value="N"<?php if($__Context->config->phone_number_verify_by_sms !== 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
								</p>
							</div><?php } ?>
							<?php if($__Context->item->name == 'signature'){ ?><div class="_subItem"<?php if(!$__Context->item->isUse){ ?> style="display:none;padding-top:5px"<?php } ?>>
								<select id="signature_editor" name="signature_editor_skin" onchange="getEditorSkinColorList(this.value)">
									<?php if($__Context->editor_skin_list)foreach($__Context->editor_skin_list as $__Context->editor_skin){ ?>
									<option value="<?php echo $__Context->editor_skin ?>"<?php if($__Context->editor_skin == $__Context->config->signature_editor_skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->editor_skin ?></option>
									<?php } ?>
								</select>
								<select name="sel_editor_colorset" id="sel_editor_colorset" style="display:none"></select>
								<p class="x_help-block">
									<label class="x_inline"><?php echo lang('allow_html') ?></label>
									<label class="x_inline"><input type="radio" name="signature_html" id="signature_html_yes" value="Y"<?php if($__Context->config->signature_html != 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
									<label class="x_inline"><input type="radio" name="signature_html" id="signature_html_no" value="N"<?php if($__Context->config->signature_html == 'N'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
									<label class="x_inline" id="signature_html_retroact" title="<?php echo $lang->signature_html_retroact ?>" style="">
										<input type="checkbox" name="signature_html_retroact" value="Y"<?php if($__Context->config->signature_html_retroact == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->retroactive_application ?>
									</label>
								</p>
								<p class="x_help-block">
									<label class="x_inline"><?php echo lang('file.file_upload') ?></label>
									<label class="x_inline"><input type="radio" name="member_allow_fileupload" value="Y"<?php if($__Context->config->member_allow_fileupload == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
									<label class="x_inline"><input type="radio" name="member_allow_fileupload" value="N"<?php if($__Context->config->member_allow_fileupload != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
								</p>
								<script>
									getEditorSkinColorList('<?php echo $__Context->config->signature_editor_skin ?>','<?php echo $__Context->config->sel_editor_colorset ?>');
									
									if(!$('#signature_html_no').is(':checked'))
									{
										$('#signature_html_retroact').hide();
									}
									$('#signature_html_yes').change(function(){
										if($(this).is(':checked')){
											$('#signature_html_retroact').hide();
										}
									});
									$('#signature_html_no').change(function(){
										if($(this).is(':checked')){
											$('#signature_html_retroact').show();
										}
									});
								</script>
							</div><?php } ?>
						</td>
						<td class="desc">&nbsp;</td>
						<td style="text-align:center">&nbsp;</td>
					</tr>
					<?php }else{ ?>
					<tr>
						<th scope="row">
							<input type="hidden" name="list_order[]" value="<?php echo $__Context->item->name ?>" />
							<input type="hidden" name="<?php echo $__Context->item->name ?>_member_join_form_srl" value="<?php echo $__Context->item->member_join_form_srl ?>" />
							<div class="wrap">
								<button type="button" class="dragBtn">Move to</button>
								<span class="_title" style="display:inline-block;white-space:pre-line;overflow:inherit;width:120px;text-overflow:ellipsis" title="<?php echo $__Context->item->title ?>"><?php echo $__Context->item->title ?></span>
							</div>
						</th>
						<td style="text-align:center"><input type="checkbox" name="usable_list[]" value="<?php echo $__Context->item->name ?>" title="<?php echo $lang->use ?>"<?php if($__Context->item->isUse){ ?> checked="checked"<?php } ?> /></td>
						<td style="text-align:center"><input type="checkbox" name="is_<?php echo $__Context->item->name ?>_public" value="Y"<?php if($__Context->item->isPublic == 'Y'){ ?> checked="checked"<?php };
if(!$__Context->item->isUse){ ?> disabled="disabled"<?php } ?> /></td>
						<td class="nowr">
							<label for="<?php echo $__Context->item->name ?>_re" class="x_inline"><input type="radio" id="<?php echo $__Context->item->name ?>_re" name="<?php echo $__Context->item->name ?>" value="required"<?php if($__Context->item->required){ ?> checked="checked"<?php };
if(!$__Context->item->isUse){ ?> disabled="disabled"<?php } ?>/> <?php echo $lang->cmd_required ?></label>
							<label for="<?php echo $__Context->item->name ?>_op" class="x_inline"><input type="radio" id="<?php echo $__Context->item->name ?>_op" name="<?php echo $__Context->item->name ?>" value="option"<?php if($__Context->item->isUse && !$__Context->item->required){ ?> checked="checked"<?php };
if(!$__Context->item->isUse){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->cmd_optional ?></label>
						</td>
						<td class="desc" title="<?php echo $__Context->item->description ?>"><?php echo $__Context->item->description ?></td>
						<td id="<?php echo $__Context->item->member_join_form_srl ?>" class="nowr" style="text-align:center"><a href="#userDefine" class="modalAnchor _extendFormEdit"><?php echo $lang->cmd_edit ?></a> <i>|</i> <a href="#" class="_extendFormDelete"><?php echo $lang->cmd_delete ?></a></td>
					</tr>
					<?php } ?>
					<?php } ?>
				</tbody>
			</table>
			<a href="#userDefine" class="modalAnchor _extendFormEdit x_btn"><i class="x_icon-plus-sign"></i> <?php echo $lang->add_extend_form ?></a>
<style scoped>
.x_table .desc{white-space:nowrap;overflow:hidden;max-width:200px;text-overflow:ellipsis}
@media all and (max-width:1250px){
.x_table .desc{display:none}
}
</style>
		</div>
	</div>
	</section>
	<div class="x_clearfix btnArea">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
<?php Context::addJsFile("modules/member/ruleset/insertJoinForm.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="x_modal" id="userDefine"  method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertJoinForm" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertJoinForm" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<div id="extendForm" class="x_form-horizontal">
	</div>
</form>
<style scoped>
@media all and (min-width:981px){
#userDefine{max-width:60%;margin-left:-30%}
}
</style>
