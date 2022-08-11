<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1><?php echo $lang->cmd_member_config ?></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/tpl/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act == 'dispMemberAdminConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminConfig') ?>"><?php echo $lang->member_default_config ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminFeaturesConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminFeaturesConfig') ?>"><?php echo $lang->member_features_config ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminAgreementsConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminAgreementsConfig') ?>"><?php echo $lang->member_agreements_config ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminSignUpConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminSignUpConfig') ?>"><?php echo $lang->cmd_signup ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminLoginConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminLoginConfig') ?>"><?php echo $lang->cmd_login ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminDesignConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminDesignConfig') ?>"><?php echo $lang->cmd_set_design_info ?></a></li>
	<li<?php if($__Context->act == 'dispMemberAdminNickNameLog'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminNickNameLog') ?>"><?php echo $lang->cmd_modify_nickname_log ?></a></li>
</ul>
