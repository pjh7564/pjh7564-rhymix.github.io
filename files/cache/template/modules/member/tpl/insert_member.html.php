<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/member/tpl/js/member_admin.js--><?php Context::loadFile(['modules/member/tpl/js/member_admin.js', '', '', '']); ?>
<!--#JSPLUGIN:ui.datepicker--><?php Context::loadJavascriptPlugin('ui.datepicker'); ?>
<script>
	xe.lang.deleteProfileImage = '<?php echo $lang->msg_delete_extend_form ?>';
	xe.lang.deleteImageMark = '<?php echo $lang->msg_delete_extend_form ?>';
	xe.lang.deleteImageName = '<?php echo $lang->msg_delete_extend_form ?>';
</script>
<div class="x_page-header">
	<?php if($__Context->member_srl){ ?><h1><?php echo $lang->msg_update_member ?></h1><?php } ?>
	<?php if(!$__Context->member_srl){ ?><h1><?php echo $lang->msg_new_member ?></h1><?php } ?>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/tpl/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/member/ruleset/insertAdminMember.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="x_form-horizontal"  method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertAdminMember" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsert" />
	<input type="hidden" name="member_srl" value="<?php echo $__Context->member_srl ?>" />
	<input type="hidden" name="signature" value="<?php echo escape($__Context->member_info->signature) ?>" />
	<?php if($__Context->member_srl){ ?><input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" /><?php } ?>
	<?php if(!$__Context->member_srl){ ?><input type="hidden" name="success_return_url" value="<?php echo getUrl('act', 'dispMemberAdminList') ?>" /><?php } ?>
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<?php if($__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label" for="identifierForm"><em style="color:red">*</em> <?php echo $__Context->identifierForm->title ?></label>
		<div class="x_controls">
			<input type="hidden" name="<?php echo $__Context->identifierForm->name ?>" value="<?php echo $__Context->identifierForm->value ?>" />
			<input id="identifierForm" type="email" name="<?php echo $__Context->identifierForm->name ?>" value="<?php echo $__Context->identifierForm->value ?>" disabled="disabled" />
		</div>
	</div><?php } ?>
	<?php if(!$__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label" for="identifierForm"><em style="color:red">*</em> <?php echo $__Context->identifierForm->title ?></label>
		<div class="x_controls">
			<input id="identifierForm" type="text" name="<?php echo $__Context->identifierForm->name ?>" value="" />
		</div>
	</div><?php } ?>
	<?php if($__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label" for="password"><em style="color:red">*</em> <?php echo $lang->password ?></label>
		<div class="x_controls">
			<input id="password" type="password" name="reset_password" value="" autocomplete="off" />
		</div>
	</div><?php } ?>
	<?php if(!$__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label" for="password"><em style="color:red">*</em> <?php echo $lang->password ?></label>
		<div class="x_controls">
			<input id="password" type="text" name="password" value="" autocomplete="off" />
		</div>
	</div><?php } ?>
	<?php $__loop_tmp=$__Context->formTags;if($__loop_tmp)foreach($__loop_tmp as $__Context->formTag){ ?><div class="x_control-group">
		<label class="x_control-label" for="<?php echo $__Context->formTag->name ?>"><?php echo $__Context->formTag->title ?></label>
		<?php if($__Context->formTag->name != 'signature'){ ?><div class="x_controls"><?php echo $__Context->formTag->inputTag ?></div><?php } ?>
		<?php if($__Context->formTag->name =='signature'){ ?><div class="x_controls"><?php echo $__Context->editor ?></div><?php } ?>
	</div><?php } ?>
<style scoped>
.xpress-editor>#smart_content,
.xpress-editor>#smart_content>.tool{clear:none}
</style>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->allow_mailing ?></label>
		<div class="x_controls">
			<label class="x_inline" for="mailingYes"><input type="radio" name="allow_mailing" id="mailingYes" value="Y"<?php if($__Context->member_info->allow_mailing == 'Y'){ ?> checked="checked"<?php } ?>> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="mailingNo"><input type="radio" name="allow_mailing" id="mailingNo" value="N"<?php if($__Context->member_info->allow_mailing != 'Y'){ ?> checked="checked"<?php } ?> > <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->allow_message ?></label>
		<div class="x_controls">
			<?php $__loop_tmp=$lang->allow_message_type;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?>
				 <label class="x_inline" for="allow_<?php echo $__Context->key ?>"><input type="radio" name="allow_message" value="<?php echo $__Context->key ?>"<?php if($__Context->member_info->allow_message == $__Context->key || (!$__Context->member_info->member_srl && $__Context->key == 'Y')){ ?> checked="checked"<?php } ?> id="allow_<?php echo $__Context->key ?>" /> <?php echo $__Context->val ?></label>
			<?php } ?>
		</div>
	</div>
	<?php if($__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->status ?></label>
		<div class="x_controls">
			<label class="x_inline" for="appoval"><input type="radio" name="denied" id="appoval" value="N"<?php if($__Context->member_info->denied == 'N'){ ?> checked="checked"<?php };
if($__Context->member_info->member_srl == $__Context->logged_info->member_srl){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->approval ?></label>
			<label class="x_inline" for="deny"><input type="radio" name="denied" id="deny" value="Y"<?php if($__Context->member_info->denied == 'Y' && !$__Context->member_unauthenticated){ ?> checked="checked"<?php };
if($__Context->member_unauthenticated || $__Context->member_info->member_srl == $__Context->logged_info->member_srl){ ?> disabled="disabled"<?php } ?> /> <?php echo $lang->denied ?></label>
			<?php if($__Context->member_unauthenticated){ ?>
				<label class="x_inline" for="deny2"><input type="radio" name="denied" id="deny2" value="Y"<?php if(($__Context->member_info->denied == 'Y' && $__Context->member_unauthenticated) || $__Context->member_info->member_srl == $__Context->logged_info->member_srl){ ?> checked="checked"<?php } ?> /> <?php echo $lang->member_unauthenticated ?></label>
			<?php } ?>
		</div>
	</div><?php } ?>
	<div class="x_control-group div_refused_reason">
		<label class="x_control-label"><?php echo $lang->refused_reason ?></label>
		<div class="x_controls">
			<textarea name="refused_reason" id="refused_reason" rows="2" cols="42" style="vertical-align:top"><?php echo $__Context->member_info->refused_reason ?></textarea>
			<span class="x_help-inline"><?php echo $lang->about_refused_reason ?></span>
		</div>
	</div>
	<?php if($__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->signup_date ?></label>
		<div class="x_controls">
			<input type="text" readonly value="<?php echo zdate($__Context->member_info->regdate, 'Y-m-d H:i:s') ?>" />
			<?php if($__Context->member_info->ipaddress){ ?>
				<input type="text" readonly value="<?php echo $__Context->member_info->ipaddress ?>" />
			<?php } ?>
		</div>
	</div><?php } ?>
	<?php if($__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->last_login ?></label>
		<div class="x_controls">
			<input type="text" readonly value="<?php echo zdate($__Context->member_info->last_login, 'Y-m-d H:i:s') ?>" />
			<?php if($__Context->member_info->last_login_ipaddress){ ?>
				<input type="text" readonly value="<?php echo $__Context->member_info->last_login_ipaddress ?>" />
			<?php } ?>
		</div>
	</div><?php } ?>
	<?php if($__Context->member_srl){ ?><div class="x_control-group">
		<label class="x_control-label" for="until"><?php echo $lang->limit_date ?></label>
		<div class="x_controls">
			<input type="hidden" name="limit_date" id="date_limit_date" value="<?php echo $__Context->member_info->limit_date ?>" />
			<input type="date" readonly placeholder="YYYY-MM-DD" class="inputDate" id="until" min="<?php echo date('Y-m-d',strtotime('-10 years')) ?>" max="<?php echo date('Y-m-d',strtotime('+100 years')) ?>" onchange="jQuery('#date_limit_date').val(this.value.replace(/-/g,''));" value="<?php echo zdate($__Context->member_info->limit_date,'Y-m-d',false) ?>" />
			<input type="button" value="<?php echo $lang->cmd_delete ?>" class="x_btn dateRemover" />
			<span class="x_help-inline"><?php echo $lang->about_limit_date ?></span>
		</div>
	</div><?php } ?>
	<div class="x_control-group div_limited_reason">
		<label class="x_control-label"><?php echo $lang->refused_reason ?></label>
		<div class="x_controls">
			<textarea name="limited_reason" id="limited_reason" rows="2" cols="42" style="vertical-align:top"><?php echo $__Context->member_info->limited_reason ?></textarea>
			<span class="x_help-inline"><?php echo $lang->about_refused_reason ?></span>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->is_admin ?></label>
		<div class="x_controls">
			<label class="x_inline" for="is_admin"><input type="radio" name="is_admin" id="is_admin" value="Y"<?php if($__Context->member_info->is_admin == 'Y'){ ?> checked="checked"<?php };
if($__Context->member_info->member_srl == $__Context->logged_info->member_srl){ ?> disabled="disabled"<?php } ?>> <?php echo $lang->cmd_yes ?></label>
			<label class="x_inline" for="not_admin"><input type="radio" name="is_admin" id="not_admin" value="N"<?php if($__Context->member_info->is_admin != 'Y'){ ?> checked="checked"<?php };
if($__Context->member_info->member_srl == $__Context->logged_info->member_srl){ ?> disabled="disabled"<?php } ?>> <?php echo $lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="description"><?php echo $lang->description ?></label>
		<div class="x_controls">
			<textarea name="description" id="description" rows="2" cols="42" style="vertical-align:top"><?php echo $__Context->member_info->description ?></textarea>
			<span class="x_help-inline"><?php echo $lang->about_member_description ?></span>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label"><?php echo $lang->member_group ?></label>
		<div class="x_controls">
			<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><label for="group_<?php echo $__Context->key ?>" class="x_inline">
				<input type="checkbox" name="group_srl_list[]" value="<?php echo $__Context->key ?>" id="group_<?php echo $__Context->key ?>"<?php if($__Context->member_info->group_list[$__Context->key]){ ?> checked="checked"<?php } ?> />
				<?php echo $__Context->val->title ?>
			</label><?php } ?>
		</div>
	</div>
	<div class="x_clearfix btnArea">
		<?php if($__Context->member_srl){ ?><span class="x_pull-left"><button class="x_btn" type="button" onclick="history.go(-1)"><?php echo $lang->cmd_cancel ?></button></span><?php } ?>
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
	</div>
</form>
<script>
(function($){
	$(function(){
		// check if the browser support type date.
		if ( $(".inputDate").prop('type') != 'date' ) {
			var option = {
				changeMonth: true,
				changeYear: true,
				gotoCurrent: false,
				yearRange:'-200:+10',
				dateFormat:'yy-mm-dd',
				defaultDate: new Date("<?php echo date('Y-m-d',time()) ?>"),
				minDate: new Date("<?php echo date('Y-m-d',strtotime('-200 years')) ?>"),
				onSelect:function(){
					$(this).prev('input[type="hidden"]').val(this.value.replace(/-/g,""))
					$('.div_limited_reason').slideDown(200);
				}
			};
			$.extend($.datepicker.regional['<?php echo $__Context->lang_type ?>'],option);
			//if the browser does not support type date input, start datepicker. If it does, brower's UI will show their datepicker.
			$(".inputDate").datepicker(option);
		} else {
			$(".inputDate").prop('readonly', false);
			$(".inputDate").on('change', function() {
				$('.div_limited_reason').slideDown(200);
			});
		}
		$(".dateRemover").click(function() {
			$(this).prevAll('input').val('');
			$('.div_limited_reason').slideUp(200);
			return false;
		});
    });
	var refused_reason_division = $('.div_refused_reason');
	if(!$('#deny').is(':checked'))
	{
		refused_reason_division.hide();
	}
	$('#deny').change(function(){
		if($(this).is(':checked')){
			refused_reason_division.slideDown(200);
		}
	});
	$('#appoval').change(function(){
		if($(this).is(':checked')){
			refused_reason_division.slideUp(200);
		}
	});
	
	if(!$('#until').val())
	{
		$('.div_limited_reason').hide();
	}
})(jQuery);
</script>
