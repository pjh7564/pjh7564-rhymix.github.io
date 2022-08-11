<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/communication/skins/default/css/communication.css--><?php Context::loadFile(['modules/communication/skins/default/css/communication.css', '', '', '', []]); ?>
<!--#Meta:modules/communication/skins/default/js/communication.js--><?php Context::loadFile(['modules/communication/skins/default/js/communication.js', '', '', '']); ?>
<section class="xc">
	<?php if($__Context->is_logged && $__Context->logged_info->menu_list && (!$__Context->member_srl || $__Context->member_srl == $__Context->logged_info->member_srl)){ ?><ul class="nav nav-tabs">
		<?php $__loop_tmp=$__Context->logged_info->menu_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->key==$__Context->act){ ?> class="active"<?php } ?>>
			<a href="<?php echo getUrl('act',$__Context->key) ?>"><?php echo lang($__Context->val) ?></a>
		</li><?php } ?>
	</ul><?php } ?>
