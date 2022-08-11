<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_header.html') ?>
<div class="vote-list">
	<h2>추천인</h2>
	<?php $__loop_tmp=$__Context->vote_member_info;if($__loop_tmp)foreach($__loop_tmp as $__Context->val){ ?>
		<a href="#popup_menu_area" class="votelog member_<?php echo $__Context->val->member_srl ?>" onclick="return false"><?php echo $__Context->val->nick_name ?></a>
	<?php } ?>
	<h2>비추천인</h2>
	<?php $__loop_tmp=$__Context->blame_member_info;if($__loop_tmp)foreach($__loop_tmp as $__Context->val){ ?>
		<a href="#popup_menu_area" class="votelog member_<?php echo $__Context->val->member_srl ?>" onclick="return false"><?php echo $__Context->val->nick_name ?></a>
	<?php } ?>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_footer.html') ?>