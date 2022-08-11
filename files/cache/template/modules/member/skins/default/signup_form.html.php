<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/member/tpl/js/signup_check.js--><?php Context::loadFile(['modules/member/tpl/js/signup_check.js', '', '', '']); ?>
<!--#JSPLUGIN:ui--><?php Context::loadJavascriptPlugin('ui'); ?>
<!--#JSPLUGIN:ui.datepicker--><?php Context::loadJavascriptPlugin('ui.datepicker'); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_header.html') ?>
    <h1 style="border-bottom:1px solid #ccc"><?php echo $lang->cmd_signup ?></h1>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/skins'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
    <?php Context::addJsFile("./files/ruleset/insertMember.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_insert_member" action="./" method="post" enctype="multipart/form-data" class="form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="@insertMember" />
		<input type="hidden" name="act" value="procMemberInsert" />
		<input type="hidden" name="xe_validator_id" value="modules/member/skins" />
		<input type="hidden" name="success_return_url" value="<?php echo getUrl('act','dispMemberInfo') ?>" />
		<?php $__loop_tmp=$__Context->member_config->agreements;if($__loop_tmp)foreach($__loop_tmp as $__Context->i=>$__Context->agreement){;
if($__Context->agreement->type !== 'disabled'){ ?><div class="agreement">
			<div class="title">
				<?php echo $__Context->agreement->title ?>
				<?php if($__Context->agreement->type === 'required'){ ?>(<?php echo $lang->cmd_required ?>)<?php } ?>
				<?php if($__Context->agreement->type === 'optional'){ ?>(<?php echo $lang->cmd_optional ?>)<?php } ?>
			</div>
			<div class="text">
				<?php echo $__Context->agreement->content ?>
			</div>
			<div class="confirm">
				<label for="accept_agreement_<?php echo $__Context->i ?>">
					<input type="checkbox" name="accept_agreement[<?php echo $__Context->i ?>]" value="Y" id="accept_agreement_<?php echo $__Context->i ?>" />
					<?php echo $lang->about_accept_agreement ?>
				</label>
			</div>
		</div><?php }} ?>
		<div class="control-group">
			<label for="<?php echo $__Context->identifierForm->name ?>" class="control-label"><em style="color:red">*</em> <?php echo $__Context->identifierForm->title ?></label>
			<div class="controls">
				<input<?php if($__Context->identifierForm->name!='email_address'){ ?> type="text"<?php };
if($__Context->identifierForm->name=='email_address'){ ?> type="email"<?php } ?> name="<?php echo $__Context->identifierForm->name ?>" id="<?php echo $__Context->identifierForm->name ?>" value="" required />
				<?php if($__Context->identifierForm->name == 'email_address' && $__Context->email_confirmation_required == 'Y'){ ?><p class="help-inline">
					<?php echo $lang->msg_email_confirmation_required ?>
				</p><?php } ?>
			</div>
		</div>
		<div class="control-group">
			<label for="password" class="control-label"><em style="color:red">*</em> <?php echo $lang->password ?></label>
			<div class="controls">
				<input type="password" name="password" id="password" value="" required />
				<p class="help-inline"><?php echo $lang->about_password_strength[$__Context->member_config->password_strength] ?></p>
			</div>
		</div>
		<div class="control-group">
			<label for="password2" class="control-label"><em style="color:red">*</em> <?php echo $lang->password3 ?></label>
			<div class="controls">
				<input type="password" name="password2" id="password2" value="" required />
			</div>
		</div>
		<?php $__loop_tmp=$__Context->formTags;if($__loop_tmp)foreach($__loop_tmp as $__Context->formTag){ ?><div class="control-group">
			<label for="<?php echo $__Context->formTag->name ?>" class="control-label"><?php echo $__Context->formTag->title ?></label>
			<?php if($__Context->formTag->name != 'signature'){ ?><div class="controls">
				<?php echo $__Context->formTag->inputTag ?>
				<?php if($__Context->formTag->name == 'email_address' && $__Context->email_confirmation_required == 'Y'){ ?><p class="help-inline">
					<?php echo $lang->msg_email_confirmation_required ?>
				</p><?php } ?>
			</div><?php } ?>
			<?php if($__Context->formTag->name == 'signature'){ ?><div class="controls">
				<input type="hidden" name="signature" value="" />
				<?php echo $__Context->editor ?>
				<style scoped>
				.xpress-editor>#smart_content,
				.xpress-editor>#smart_content>.tool{clear:none}
				</style>
			</div><?php } ?>
		</div><?php } ?>
		<div class="control-group">
			<div class="control-label"><?php echo $lang->allow_mailing ?></div>
			<div class="controls" style="padding-top:5px">
				<label for="mailingYes"><input type="radio" name="allow_mailing" id="mailingYes" value="Y"<?php if($__Context->member_info->allow_mailing == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="mailingNo"><input type="radio" name="allow_mailing" id="mailingNo" value="N"<?php if($__Context->member_info->allow_mailing != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label"><?php echo $lang->allow_message ?></div>
			<div class="controls" style="padding-top:5px">
				<?php $__loop_tmp=$lang->allow_message_type;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><label for="allow_<?php echo $__Context->key ?>"><input type="radio" name="allow_message" value="<?php echo $__Context->key ?>"<?php if($__Context->member_info->allow_message == $__Context->key || (!$__Context->member_info && $__Context->key == 'Y')){ ?> checked="checked"<?php } ?> id="allow_<?php echo $__Context->key ?>" /> <?php echo $__Context->val ?></label><?php } ?>
			</div>
		</div>
		<?php if(isset($__Context->captcha) && $__Context->captcha && $__Context->captcha->isTargetAction('signup')){ ?><div class="control-group captcha">
			<div class="control-label"><?php echo $lang->captcha ?></div>
			<div class="controls"><?php echo $__Context->captcha ?></div>
		</div><?php } ?>
		<div class="btnArea" style="border-top:1px solid #ccc;padding-top:10px">
			<input type="submit" value="<?php echo $lang->cmd_registration ?>" class="btn btn-inverse pull-right" />
			<a href="<?php echo getUrl('act','','member_srl','') ?>" class="btn pull-left"><?php echo $lang->cmd_cancel ?></a>
		</div>
	</form>
<script>
(function($){
	// label for setup
	$('.control-label[for]').each(function(){
		var $this = $(this);
		if($this.attr('for') == ''){
			$this.attr('for', $this.next().children(':visible:first').attr('id'));
		}
	});
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
				}
			};
			$.extend($.datepicker.regional['<?php echo $__Context->lang_type ?>'],option);
			//if the browser does not support type date input, start datepicker. If it does, brower's UI will show their datepicker.
			$(".inputDate").datepicker(option);
		} else {
			$(".inputDate").prop('readonly', false);
		}
		$(".dateRemover").click(function() {
			$(this).prevAll('input').val('');
			return false;});
	});
})(jQuery);
</script>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_footer.html') ?>
