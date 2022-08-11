<?php if(!defined("__XE__"))exit;
if($__Context->widget_info->page_count || count($__Context->widget_info->tab)){ ?><!--#Meta:widgets/content/skins/sketchbook5_style/js/content_widget.js--><?php Context::loadFile(['widgets/content/skins/sketchbook5_style/js/content_widget.js', '', '', '']);
} ?>
<!--#Meta:widgets/content/skins/sketchbook5_style/css/sk5_content.css--><?php Context::loadFile(['widgets/content/skins/sketchbook5_style/css/sk5_content.css', '', '', '', []]); ?>
<div class="sk5_content">
	<?php if($__Context->widget_info->tab_type	== "tab_left" || $__Context->widget_info->tab_type == "tab_top"){ ?>
		<div class="bd_cnb">
			<ul class="bubble">
			<?php $__Context->i=0 ?>
			<?php if($__Context->widget_info->tab)foreach($__Context->widget_info->tab as $__Context->module_srl => $__Context->tab){ ?>
				<li<?php if($__Context->i==0){ ?> class="active"<?php } ?>><a href="<?php echo $__Context->tab->url ?>" onmouseover="content_widget_tab_show(jQuery(this),jQuery(this).parents('div.bd_cnb').next('dl.wd'),<?php echo $__Context->i ?>)"><?php echo $__Context->tab->title ?></a></li>
			<?php $__Context->i++ ?>
			<?php } ?>
			</ul>
		</div>
		
		<dl class="wd">
		<?php $__Context->i=0 ?>
		<?php if($__Context->widget_info->tab)foreach($__Context->widget_info->tab as $__Context->module_srl => $__Context->tab){ ?>
			<dt><?php echo $__Context->tab->title ?></dt>
			<dd<?php if($__Context->i==0){ ?> class="open"<?php } ?>>
				<?php $__Context->widget_info->content_items = $__Context->tab->content_items ?>
				<?php if($__Context->widget_info->list_type == "gallery"){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/sketchbook5_style','gallery.html') ?>
				<?php }else{ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/sketchbook5_style','normal.html') ?>
				<?php } ?>
			</dd>
		<?php $__Context->i++ ?>
		<?php } ?>
		</dl>
	<?php }else{ ?>
		<?php if($__Context->widget_info->list_type == "gallery"){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/sketchbook5_style','gallery.html') ?>
		<?php }else{ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/sketchbook5_style','normal.html') ?>
		<?php } ?>
	<?php } ?>
</div>
