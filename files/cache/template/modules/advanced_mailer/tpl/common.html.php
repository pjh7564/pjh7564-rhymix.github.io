<?php if(!defined("__XE__"))exit;?>
<div class="x_page-header">
	<h1><?php echo $lang->cmd_advanced_mailer ?></h1>
</div>
<ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminConfig') ?>"><?php echo $lang->cmd_advanced_mailer_general_config ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminExceptions'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminExceptions') ?>"><?php echo $lang->cmd_advanced_mailer_exception_domains ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminSpfDkim'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminSpfDkim') ?>"><?php echo $lang->cmd_advanced_mailer_spf_dkim_setting ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminMailTest'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminMailTest') ?>"><?php echo $lang->cmd_advanced_mailer_mail_test ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminMailLog'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminMailLog') ?>"><?php echo $lang->cmd_advanced_mailer_log_mail ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminSMSTest'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminSMSTest') ?>"><?php echo $lang->cmd_advanced_mailer_sms_test ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminSMSLog'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminSMSLog') ?>"><?php echo $lang->cmd_advanced_mailer_log_sms ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminPushTest'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminPushTest') ?>"><?php echo $lang->cmd_advanced_mailer_push_test ?></a></li>
	<li<?php if($__Context->act == 'dispAdvanced_mailerAdminPushLog'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAdvanced_mailerAdminPushLog') ?>"><?php echo $lang->cmd_advanced_mailer_log_push ?></a></li>
</ul>
