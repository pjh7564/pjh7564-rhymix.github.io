<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_header.html') ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/member/skins/default/filter','find_member_account.xml');$__xmlFilter->compile(); ?>
<section>
	<h1><?php echo $lang->cmd_find_member_account_with_email ?></h1>
	<p><?php echo $lang->about_find_member_account ?></p>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/skin/default/find_member_account/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("modules/member/ruleset/findAccount.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="<?php echo getUrl('', 'act', 'procMemberFindAccount') ?>" method="post" ><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="ruleset" value="findAccount" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="act" value="procMemberFindAccount" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
		<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/member/skin/default/find_member_account/1" />
		<div>
			<input type="email" name="email_address" required placeholder="<?php echo $lang->email_address ?>" title="<?php echo $lang->email_address ?>" /><br />
			<?php if(isset($__Context->captcha) && $__Context->captcha && $__Context->captcha->isTargetAction('recovery')){ ?>
				<?php echo $__Context->captcha ?><br />
			<?php } ?>
			<input type="submit" class="btn btn-inverse" value="<?php echo $lang->cmd_find_member_account ?>" />
		</div>
	</form>
</section>
<hr>
<section>
	<h1><?php echo $lang->cmd_resend_auth_mail ?></h1>
	<p><?php echo $lang->about_resend_auth_mail ?></p>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/skin/default/find_member_account/3'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("modules/member/ruleset/resendAuthMail.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="<?php echo getUrl('', 'act', 'procMemberResendAuthMail') ?>" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="resendAuthMail" />
		<input type="hidden" name="module" value="member" />
		<input type="hidden" name="act" value="procMemberResendAuthMail" />
		<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/member/skin/default/find_member_account/3" />
		<div>
			<input type="email" id="email_address" name="email_address" value="" required placeholder="<?php echo $lang->email_address ?>" title="<?php echo $lang->email_address ?>" /><br />
			<?php if(isset($__Context->captcha) && $__Context->captcha && $__Context->captcha->isTargetAction('recovery')){ ?>
				<?php echo $__Context->captcha ?><br />
			<?php } ?>
			<input type="submit" value="<?php echo $lang->cmd_resend_auth_mail ?>" class="btn btn-inverse" />
		</div>
	</form>
</section>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_footer.html') ?>
