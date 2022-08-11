<?php if(!defined("__XE__"))exit;
if($__Context->widget_info->page_count || (is_countable($__Context->widget_info->tab) && count($__Context->widget_info->tab))){ ?><!--#Meta:widgets/content/skins/simple_rectangle/js/content_widget.js--><?php Context::loadFile(['widgets/content/skins/simple_rectangle/js/content_widget.js', '', '', '']);
} ?>
<?php $__Context->layout_info = Context::get('layout_info') ?>
<?php if($__Context->layout_info->extra_var->primary_color->type === 'select' || $__Context->layout_info->extra_var->customized_primary_color->type === 'colorpicker'){ ?>
	<?php 
		if(!$__Context->layout_info->primary_color)
			$__Context->layout_info->primary_color = 'red';
		if(!$__Context->layout_info->primary_color && $__Context->layout_info->customized_primary_color)
			$__Context->layout_info->primary_color = 'customized';
		if(!$__Context->layout_info->customized_primary_color)
			$__Context->layout_info->customized_primary_color = '#f44336';
	 ?>
<?php } ?>
<?php if($__Context->layout_info->extra_var->primary_color->type !== 'select' && $__Context->layout_info->extra_var->customized_primary_color->type !== 'colorpicker'){ ?>
	<?php $__Context->layout_info->primary_color = 'red'; ?>
<?php } ?>
<?php 
	$__Context->material_colors = array(
		'red'	=>	'#f44336',
		'crimson'	=>	'#aa0000',
		'pink'	=>	'#e91e63',
		'purple'	=>	'#9c27b0',
		'deep-purple'	=>	'#673ab7',
		'indigo'	=>	'#3f51b5',
		'deep-blue'	=>	'#00397f',
		'blue'	=>	'#2196f3',
		'light-blue'	=>	'#03a9f4',
		'cyan'	=>	'#00bcd4',
		'teal'	=>	'#009688',
		'green'	=>	'#4caf50',
		'light-green'	=>	'#8bc34a',
		'lime'	=>	'#cddc39',
		'yellow'	=>	'#ffeb3b',
		'amber'	=>	'#ffc107',
		'orange'	=>	'#ff9800',
		'deep-orange'	=>	'#ff5722',
		'brown'	=>	'#795548',
		'grey'	=>	'#9e9e9e',
		'blue-grey'	=>	'#607d8b',
		'black'	=>	'#000000',
		'white'	=>	'#ffffff',
		'customized'	=>	$__Context->layout_info->customized_primary_color,
	);
 ?>
<?php $__Context->colorset = $__Context->material_colors[$__Context->member_config->colorset]; ?>
<?php $__Context->skin_color = $__Context->material_colors[$__Context->layout_info->primary_color]; ?>
<?php if($__Context->colorset){ ?>
	<?php if(preg_match("/#([a-f0-9]{3}){1,2}/i", trim($__Context->colorset)) && in_array(strlen(trim($__Context->colorset)), array(4, 7))){ ?>
		<?php $__Context->skin_color = trim($__Context->colorset) ?>
		<?php if(strlen(trim($__Context->colorset)) === 4){ ?>
			<?php $__Context->skin_color = trim($__Context->colorset)[1].trim($__Context->colorset)[1].trim($__Context->colorset)[2].trim($__Context->colorset)[2].trim($__Context->colorset)[3].trim($__Context->colorset)[3] ?>
		<?php } ?>
	<?php }else{ ?>
		<?php $__Context->skin_color = '#f44336' ?>
	<?php } ?>
<?php } ?>
<?php if(!$__Context->skin_color){ ?>
	<?php if(preg_match("/#([a-f0-9]{3}){1,2}/i", $__Context->layout_info->primary_color) && in_array(strlen(trim($__Context->colorset)), array(4, 7))){ ?>
		<?php $__Context->skin_color = $__Context->layout_info->primary_color ?>
		<?php if(strlen($__Context->layout_info->primary_color) === 4){ ?>
			<?php $__Context->skin_color = $__Context->layout_info->primary_color[1].$__Context->layout_info->primary_color[1].$__Context->layout_info->primary_color[2].$__Context->layout_info->primary_color[2].$__Context->layout_info->primary_color[3].$__Context->layout_info->primary_color[3] ?>
		<?php } ?>
	<?php }else{ ?>
		<?php $__Context->skin_color = '#f44336' ?>
	<?php } ?>
<?php } ?>
<?php Context::set('less_color', array('red' => hexdec(substr($__Context->skin_color, 1, 2)), 'green' => hexdec(substr($__Context->skin_color, 3, 2)), 'blue' => hexdec(substr($__Context->skin_color, 5, 2)), 'thumbnail_height' => intval($__Context->widget_info->thumbnail_height), 'thumbnail_width' => intval($__Context->widget_info->thumbnail_width))) ?>
<!--#Meta:widgets/content/skins/simple_rectangle/css/css.less?$__Context->less_color--><?php Context::loadFile(['widgets/content/skins/simple_rectangle/css/css.less', '', '', '', $__Context->less_color]); ?>
<div class="widgetContainer">
	<div class="simple_content">
		<section class="simple_content">
			<?php if(is_countable($__Context->widget_info->tab)){ ?>
				<?php if($__Context->widget_info->tab_type  == "tab_left" && count($__Context->widget_info->tab) > 1){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','_tab_left.html') ?>
				<?php }elseif($__Context->widget_info->tab_type == "tab_top" && count($__Context->widget_info->tab) > 1){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','_tab_top.html') ?>
				<?php }elseif($__Context->widget_info->tab_type  == "tab_left" || $__Context->widget_info->tab_type == "tab_top"){ ?>
					<?php $__Context->widget_info->content_items = $__Context->widget_info->tab[0]->content_items ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','_tab_none.html') ?>
				<?php } ?>
			<?php }else{ ?>
				<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/content/skins/simple_rectangle','_tab_none.html') ?>
			<?php } ?>
		</section>
	</div>
</div>