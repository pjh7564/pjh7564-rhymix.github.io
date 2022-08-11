<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/member/skins/default/css/member.css--><?php Context::loadFile(['modules/member/skins/default/css/member.css', '', '', '', []]); ?>
<!--#Meta:modules/member/skins/default/js/member.js--><?php Context::loadFile(['modules/member/skins/default/js/member.js', '', '', '']); ?>
<section class="xm">
	<?php if($__Context->is_logged && $__Context->logged_info->menu_list && (!isset($__Context->member_srl) || !$__Context->member_srl || $__Context->member_srl == $__Context->logged_info->member_srl)){ ?><ul class="nav nav-tabs">
		<?php $__loop_tmp=$__Context->logged_info->menu_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->key==$__Context->act){ ?> class="active"<?php } ?>>
			<a href="<?php echo getUrl('', 'act', $__Context->key, 'mid', $__Context->mid) ?>"><?php echo lang($__Context->val) ?></a>
		</li><?php } ?>
	</ul><?php } ?>
