<?php if(!defined("__XE__"))exit;?>
<!--#Meta:modules/message/skins/xedition/css/message.css--><?php Context::loadFile(['modules/message/skins/xedition/css/message.css', '', '', '', []]); ?>
<div id="access">
	<div class="login-header">
		<h1><?php echo $__Context->system_message ?></h1>
		<?php if($__Context->system_message_detail){ ?><div class="message">
			<?php echo $__Context->system_message_detail ?>
		</div><?php } ?>
		<?php if($__Context->system_message_location){ ?><div class="message location">
			<?php echo $__Context->system_message_location ?>
		</div><?php } ?>
	</div>
	<?php if(!$__Context->is_logged){ ?><div>
		<div class="login-body">
			<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/message/skins/default/system_message/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
				<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
			</div><?php } ?>
			<?php Context::addJsFile("./files/ruleset/login.xml", FALSE, "", 0, "body", TRUE, "") ?><form id="message_login_form"  action="<?php echo getUrl('','act','procMemberLogin') ?>" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="@login" />
				<input type="hidden" name="module" value="member" />
				<input type="hidden" name="act" value="procMemberLogin" />
				<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
				<input type="hidden" name="xe_validator_id" value="modules/message/skins/default/system_message/1" />
				<div class="control-group">
					<?php if($__Context->member_config->identifier != 'email_address'){ ?><input type="text" name="user_id" id="uid" title="<?php echo $lang->user_id ?>" placeholder="<?php echo $lang->user_id ?>" required autofocus /><?php } ?>
					<?php if($__Context->member_config->identifier == 'email_address'){ ?><input type="email" name="user_id" id="uid" title="<?php echo $lang->email_address ?>" placeholder="<?php echo $lang->email_address ?>" required autofocus /><?php } ?>
					<input type="password" name="password" id="upw" title="<?php echo $lang->password ?>" placeholder="<?php echo $lang->password ?>" required />
					<?php if(!$__Context->system_message_detail){ ?><label for="keepid">
						<input type="checkbox" name="keep_signed" id="keepid" class="inputCheck" value="Y" onclick="jQuery('#warning')[(jQuery('#keepid:checked').size()&gt;0?'addClass':'removeClass')]('open');" />						
						<?php echo $lang->keep_signed ?>
					</label><?php } ?>
				</div>
				<p><button type="submit" class="button" href="#" onclick="$('#message_login_form').submit()">
					<?php if($__Context->system_message_detail){ ?>
						<?php echo $lang->msg_administrator_login ?>
					<?php }else{ ?>
						<?php echo $lang->cmd_login ?>
					<?php } ?>
				</button></p>
			</form>
		</div>
		<?php if(!$__Context->system_message_detail){ ?><div class="login-footer">
			<a href="<?php echo getUrl('', 'act', 'dispMemberFindAccount') ?>"><?php echo $lang->cmd_find_member_account ?></a>
			<span class="bar">|</span>
			<a href="<?php echo getUrl('', 'act', 'dispMemberSignUpForm') ?>"><?php echo $lang->cmd_signup ?></a>
		</div><?php } ?>
	</div><?php } ?>
	<?php if($__Context->is_logged){ ?><div>
		<div class="login-body">
			<p><a class="button" href="<?php echo getUrl() ?>"><?php echo $lang->cmd_back ?></a></p>
		</div>
		<div class="login-footer">
			<a href="<?php echo getUrl('', 'act', 'dispMemberLogout') ?>"><?php echo $lang->cmd_logout ?></a>
		</div>
	</div><?php } ?>
</div>
