<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/member/tpl/js/member_admin_group.js--><?php Context::loadFile(['modules/member/tpl/js/member_admin_group.js', '', '', '']); ?>
<script>
	xe.lang.groupDeleteMessage = '<?php echo $lang->msg_group_delete ?>';
	xe.lang.multilingual = '<?php echo $lang->cmd_set_multilingual ?>';
	xe.lang.modify = '<?php echo $lang->cmd_modify ?>';
	xe.lang.deleteMSG = '<?php echo $lang->cmd_delete ?>';
</script>
<style>
	._imageMarkButton img { max-height:16px }
	.filebox_item{max-height:16px}
</style>
<div class="x_page-header">
	<h1><?php echo $lang->member_group ?></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/tpl/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/member/ruleset/insertGroupConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" id="fo_member_group" ><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertGroupConfig" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminGroupConfig" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<table class="sortable x_table x_table-striped x_table-hover">
		<caption>
			<strong><?php echo count($__Context->group_list);
echo $lang->msg_groups_exist ?></strong>
			<span class="x_pull-right" style="position:relative;top:7px">
				<?php echo $lang->use_group_image_mark ?>: 
				<label for="yes" class="x_inline"><input type="radio" name="group_image_mark" id="yes" value="Y"<?php if($__Context->config->group_image_mark == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="no" class="x_inline"><input type="radio" name="group_image_mark" id="no" value="N"<?php if($__Context->config->group_image_mark != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</span>
		</caption>
		<thead>
			<tr>
				<th scope="col"><em style="color:red">*</em> <?php echo $lang->group_title ?></th>
				<th scope="col"><?php echo $lang->description ?></th>
				<th scope="col"><?php echo $lang->default_group ?></th>
				<th scope="col" class="_imageMarkButton"><?php echo $lang->group_image_mark ?></th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td class="_imageMarkButton">&nbsp;</td>
				<td><a href="#" class="_addGroup"><?php echo $lang->cmd_add ?></a></td>
			</tr>
		</tfoot>
		<tbody class="uDrag _groupList">
			<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->group_srl=>$__Context->group_info){ ?><tr>
				<td>
					<div class="wrap">
						<button type="button" class="dragBtn">Move to</button>
						<input type="hidden" name="group_srls[]" value="<?php echo $__Context->group_info->group_srl ?>" />
						<input type="text" name="group_titles[]" value="<?php echo htmlspecialchars($__Context->group_info->title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" class="lang_code" title="<?php echo $lang->group_title ?>" />
					</div>
				</td>
				<td><input type="text" name="descriptions[]" value="<?php echo $__Context->group_info->description ?>" title="<?php echo $lang->description ?>" /> <span class="x_help-inline">#<?php echo $__Context->group_srl ?></span></td>
				<td><input type="radio" name="defaultGroup" value="<?php echo $__Context->group_info->group_srl ?>" title="Default"<?php if($__Context->group_info->is_default=='Y'){ ?> checked="checked"<?php } ?> /></td>
				<td class="_imageMarkButton">
					<input type="hidden" name="image_marks[]" value="<?php echo $__Context->group_info->image_mark ?>" class="_imgMarkHidden" />
					<?php if($__Context->config->group_image_mark == 'Y' && $__Context->group_info->image_mark){ ?><img src="<?php echo $__Context->group_info->image_mark ?>" alt="<?php echo htmlspecialchars($__Context->group_info->title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><?php } ?>
					<a href="#imageMark" class="modalAnchor _imageMark filebox"><?php echo $lang->cmd_modify ?></a>
				</td>
				<td><div class="_deleteTD"<?php if($__Context->group_info->is_default == 'Y'){ ?> style="display:none"<?php } ?>><a href="#<?php echo $__Context->group_srl ?>" class="_deleteGroup"><?php echo $lang->cmd_delete ?></a></div></td>
			</tr><?php } ?>
			<tr style="display:none" class="_template">
				<td>
					<div class="wrap">
						<button type="button" class="dragBtn">Move to</button>
						<input type="hidden" name="group_srls[]" value="new" disabled="disabled"/>
						<input type="text" name="group_titles[]" value=""  disabled="disabled" class="lang_code" />
					</div>
				</td>
				<td><input type="text" name="descriptions[]" value="" disabled="disabled" /></td>
				<td><input type="radio" name="defaultGroup" value="" title="Default" disabled="disabled" /></td>
				<td class="_imageMarkButton"><input type="hidden" name="image_marks[]" value="" class="_imgMarkHidden" disabled="disabled" />
					<a href="#imageMark" class="modalAnchor _imageMark filebox"><?php echo $lang->cmd_modify ?></a></td>
				<td><div class="_deleteTD"><a href="#new" class="_deleteGroup"><?php echo $lang->cmd_delete ?></a></div></td>
			</tr>
		</tbody>
	</table>
	<div class="x_clearfix">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
<section class="x_modal" id="imageMark">
	<div class="x_modal-header">
		<h1><?php echo $lang->group_image_mark ?> <?php echo $lang->cmd_setup ?></h1>
	</div>
	<div class="x_modal-body">
		<div class="_useImageMark x_control-group" style="display:none">
 			<p><?php echo $lang->use_group_image_mark ?></p>
 			<label for="useImageMark" class="x_inline"><input id="useImageMark" type="radio" name="useImageMark" value="Y" />
 			<?php echo $lang->use ?></label>
 			<label for="noImageMark" class="x_inline"><input id="noImageMark" type="radio" name="useImageMark" value="N" />
 			<?php echo $lang->notuse ?></label>
 		</div>
		<?php if($__Context->fileBoxList){ ?>
			<p><?php echo $lang->usable_group_image_mark_list ?></p>
			<div class="filebox_list">
			</div>
		<?php } ?>
	</div>
	<div class="x_modal-footer">
		<button type="button" class="x_btn x_pull-left" data-hide="#exModal-1">Close</button>
		<p class="x_pull-right"><?php echo $lang->add_group_image_mark ?>: <a href="<?php echo getUrl('', 'module','admin', 'act', 'dispModuleAdminFileBox') ?>" target="_blank"><?php echo $lang->link_file_box ?></a></p>
	</div>
</section>
