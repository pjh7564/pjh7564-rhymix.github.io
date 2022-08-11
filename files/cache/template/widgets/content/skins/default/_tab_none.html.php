<?php if(!defined("__XE__"))exit;
if($__Context->widget_info->list_type == "gallery"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/default','gallery.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_title"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/default','image_title.html') ?>
<?php }elseif($__Context->widget_info->list_type == "image_title_content"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/default','image_title_content.html') ?>
<?php }elseif($__Context->widget_info->list_type == "title_content"){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/default','title_content.html') ?>
<?php }else{ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/default','normal.html') ?>
<?php } ?>
