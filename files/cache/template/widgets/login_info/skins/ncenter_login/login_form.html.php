<?php if(!defined("__XE__"))exit;?><!--#Meta:widgets/login_info/skins/ncenter_login/css/ncenter.css--><?php Context::loadFile(['widgets/login_info/skins/ncenter_login/css/ncenter.css', '', '', '', []]); ?>
<!--#Meta:widgets/login_info/skins/ncenter_login/js/ncenter.js--><?php Context::loadFile(['widgets/login_info/skins/ncenter_login/js/ncenter.js', 'body', '', '']); ?>
<div id="nc_container" class="nc_login" <?php echo $__Context->ncenterlite_zindex ?>>
	<ul class="nc_memu guest">
		<li class="nc_profile fLeft">
			<?php if($__Context->useProfileImage){ ?>
				<?php if(!$__Context->profileImage){ ?><img src="<?php echo Context::getRequestUri() ?>modules/ncenterlite/skins/default/img/p.png" alt="my profile" class="nc_profile_img" /><?php } ?>
			<?php } ?>
			<strong>손님</strong>
		</li>
		<li class="fLeft">
			<a class="notify" href="#">
				로그인해주세요!
			</a>
		</li>
	</ul>
	<div class="list">
		<?php Context::addJsFile("./files/ruleset/login.xml", FALSE, "", 0, "body", TRUE, "") ?><form id="account-signup" action="<?php echo getUrl('','act','procMemberLogin') ?>" method="post"  class="account"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="@login" />
			<fieldset id="acField">
				<input type="hidden" name="act" value="procMemberLogin"/>
				<input type="hidden" name="success_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>"/>
				<input type="hidden" name="xe_validator_id" value="widgets/login_info/skins/default/login_form/1"/>
				<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'widgets/login_info/skins/default/login_form/1'){ ?><div
				     class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
					<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
				</div><?php } ?>
				<h2><i class="xi-user"></i><?php echo $lang->cmd_login ?></h2>
				<button class="submit"><i class="xi-user-check"></i></button>
				<span class="inputUserIcon"><i class="xi-user"></i></span>
				<?php if($__Context->member_config->identifier != 'email_address'){ ?><input name="user_id" id="user_id" type="text" class="user" placeholder="<?php echo $lang->user_id ?>" required/><?php } ?>
				<?php if($__Context->member_config->identifier == 'email_address'){ ?><input name="user_id" id="user_id" type="email" class="user" placeholder="<?php echo $lang->email_address ?>" required/><?php } ?>
				<span class="inputPassIcon"><i class="xi-key"></i></span>
				<input name="password" id="user_pw" type="password" class="pass" required placeholder="<?php echo $lang->password ?>"/>
				<p class="keep">
					<input type="checkbox" name="keep_signed" id="keep_signed" value="Y"/>
					<label for="keep_signed"><?php echo $lang->keep_signed ?></label>
				</p>
				<ul class="help">
					<li><a href="<?php echo getUrl('act','dispMemberSignUpForm') ?>"><?php echo $lang->cmd_signup ?></a></li>
					<li><a href="<?php echo getUrl('act','dispMemberFindAccount') ?>"><?php echo $lang->cmd_find_member_account ?></a></li>
				</ul>
			</fieldset>
		</form>
	</div>
</div>
