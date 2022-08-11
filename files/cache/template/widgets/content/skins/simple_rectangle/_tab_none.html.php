<?php if(!defined("__XE__"))exit;
if(count($__Context->widget_info->modules_info) === 1){ ?><h1 class="misolTop">
<?php $__Context->soo_module_info = current($__Context->widget_info->modules_info); ?>
	<a href="<?php echo getUrl('','mid',$__Context->soo_module_info->mid) ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?> class="misol_top_a"><?php echo $__Context->soo_module_info->browser_title ?></a>
</h1><?php } ?>
<?php if($__Context->widget_info->list_type == "gallery"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','gallery.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_title"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','image_title.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_title_content"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','image_title_content.html') ?>
<?php }elseif($__Context->widget_info->list_type == "title_content"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','title_content.html') ?>
<?php }else{ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','normal.html') ?>
<?php } ?>