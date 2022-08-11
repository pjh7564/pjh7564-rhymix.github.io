<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/module/tpl/js/module_admin.js--><?php Context::loadFile(['modules/module/tpl/js/module_admin.js', '', '', '']); ?>
<script>
    jQuery( function() { jQuery('.grant_default').change( function(event) { doShowGrantZone(); } ); doShowGrantZone() } );
</script>
<?php Context::addJsFile("modules/module/ruleset/insertModulesGrant.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" id="manageSelectedModuleGrant" class="section x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertModulesGrant" />
	<input type="hidden" name="module" value="module" />
	<input type="hidden" name="act" value="procModuleAdminModuleGrantSetup" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	<input type="hidden" name="module_srls" value="<?php echo $__Context->module_srls ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/module/tpl/manage_selected" />
    <h1><?php echo $lang->permission_setting ?></h1>
	<?php $__loop_tmp=$__Context->grant_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->grant_name=>$__Context->grant_item){ ?><div class="x_control-group">
		<label class="x_control-label" for="<?php echo $__Context->grant_name ?>_default"><?php echo $__Context->grant_item->title ?></label>
		<div class="x_controls">
			<select name="<?php echo $__Context->grant_name ?>_default" id="<?php echo $__Context->grant_name ?>_default" class="grant_default">
				<?php if($__Context->grant_item->default == 'guest'){ ?><option value="0"><?php echo $lang->grant_to_all ?></option><?php } ?>
				<?php if($__Context->grant_item->default != 'manager'){ ?><option value="-1"><?php echo $lang->grant_to_login_user ?></option><?php } ?>
				<option value="-3"><?php echo $lang->grant_to_admin ?></option>
				<option value=""><?php echo $lang->grant_to_group ?></option>
			</select>
			<div id="zone_<?php echo $__Context->grant_name ?>" hidden style="margin-top:8px">
				<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->group_srl=>$__Context->group_item){ ?><label for="grant_<?php echo $__Context->grant_name ?>_<?php echo $__Context->group_srl ?>">
					<input type="checkbox" name="<?php echo $__Context->grant_name ?>[]" value="<?php echo $__Context->group_item->group_srl ?>" id="grant_<?php echo $__Context->grant_name ?>_<?php echo $__Context->group_srl ?>" />
					<?php echo $__Context->group_item->title ?>
				</label><?php } ?>
			</div>
		</div>
	</div><?php } ?>
	<div class="btnArea">
		<input type="submit" class="x_btn x_btn-primary" value="<?php echo $lang->cmd_registration ?>" />
	</div>
</form>
