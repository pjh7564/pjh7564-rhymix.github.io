<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/board/m.skins/default/css/mboard.css--><?php Context::loadFile(['modules/board/m.skins/default/css/mboard.css', '', '', '', []]); ?>
<div class="bd">
<?php if(isset($__Context->module_info->mobile_header_text) && $__Context->module_info->mobile_header_text){ ?>
	<div class="bd_header_text"><?php echo $__Context->module_info->mobile_header_text ?></div>
<?php } ?>
<?php if($__Context->oDocument->isExists()){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/default','read.html') ?>
<?php }else{ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/default','_list.html') ?>
<?php } ?>
<?php if(isset($__Context->module_info->mobile_footer_text) && $__Context->module_info->mobile_footer_text){ ?>
	<div class="bd_footer_text"><?php echo $__Context->module_info->mobile_footer_text ?></div>
<?php } ?>
</div>
