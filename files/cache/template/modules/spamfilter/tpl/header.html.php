<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/spamfilter/tpl/css/spamfilter_admin.css--><?php Context::loadFile(['modules/spamfilter/tpl/css/spamfilter_admin.css', '', '', '', []]); ?>
<!--#Meta:modules/spamfilter/tpl/js/spamfilter_admin.js--><?php Context::loadFile(['modules/spamfilter/tpl/js/spamfilter_admin.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->spamfilter ?></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/spamfilter/tpl/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
    <p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<ul class="x_nav x_nav-tabs">
    <li<?php if($__Context->act === 'dispSpamfilterAdminDeniedIPList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('','module','admin','act','dispSpamfilterAdminDeniedIPList') ?>"><?php echo $lang->cmd_denied_ip ?></a></li>
    <li<?php if($__Context->act === 'dispSpamfilterAdminDeniedWordList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('','module','admin','act','dispSpamfilterAdminDeniedWordList') ?>"><?php echo $lang->cmd_denied_word ?></a></li>
    <li<?php if($__Context->act === 'dispSpamfilterAdminConfigBlock'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('','module','admin','act','dispSpamfilterAdminConfigBlock') ?>"><?php echo $lang->cmd_config_block ?></a></li>
    <li<?php if($__Context->act === 'dispSpamfilterAdminConfigCaptcha'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('','module','admin','act','dispSpamfilterAdminConfigCaptcha') ?>"><?php echo $lang->cmd_captcha_config ?></a></li>
</ul>
