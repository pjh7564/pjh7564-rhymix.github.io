<?php if(!defined("__XE__"))exit;?>	<?php if($__Context->m && $__Context->module_info->mobile_footer_text){ ?>
		<?php echo $__Context->module_info->mobile_footer_text ?>
	<?php }else{ ?>
		<?php echo $__Context->module_info->footer_text ?>
	<?php } ?>
</div>
