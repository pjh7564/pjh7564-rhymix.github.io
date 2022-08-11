<?php if(!defined("__XE__"))exit;?><div class="inner">
	<ul class="simple_content_list">
	<?php $__Context->_idx=0 ?>
		<?php $__loop_tmp=$__Context->widget_info->content_items;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->item){ ?><li<?php if($__Context->_idx >= $__Context->widget_info->list_count){ ?> style="display:none"<?php };
if($__Context->widget_info->show_comment_count=='Y' && $__Context->item->getCommentCount()){ ?> class="content_reext"<?php } ?>>
			<a href="<?php echo $__Context->item->getLink() ?>" class="cont_a"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>>
				<?php if(array_search('thumbnail', $__Context->widget_info->option_view_arr) && $__Context->item->getThumbnail()){ ?><span class="content_image">
					<img src="<?php echo $__Context->item->getThumbnail() ?>" width="<?php echo $__Context->widget_info->thumbnail_width ?>"<?php if($__Context->item->getThumbnail(2)){ ?> srcset="<?php echo $__Context->item->getThumbnail(2) ?> 2x"<?php } ?> height="<?php echo $__Context->widget_info->thumbnail_height ?>" alt="<?php echo str_replace(array('&amp;amp;','&amp;lt;','&amp;gt;','&amp;quot;','&amp;apos;'),array('&amp;','&lt;','&gt;','&quot;','&apos;'),$__Context->item->getTitle($__Context->widget_info->subject_cut_size)) ?>" />
				</span><?php } ?>
				<span class="content_basic <?php if(array_search('thumbnail', $__Context->widget_info->option_view_arr) && $__Context->item->getThumbnail()){ ?>content_with_thumbnail<?php } ?>">
					<span class="content_title">
						<?php if($__Context->widget_info->tab_type  == 'tab_left' && $__Context->tab->tab_type == 'all'){ ?><span class="content_category"><?php echo $__Context->item->getBrowserTitle() ?></span><?php } ?>
						<?php if($__Context->widget_info->show_category=='Y' && $__Context->item->get('category_srl') && trim($__Context->item->getCategory()) && !$__Context->tab->tab_type){ ?><span class="content_category"><?php echo $__Context->item->getCategory() ?></span><?php } ?> <?php echo str_replace(array('&amp;amp;','&amp;lt;','&amp;gt;','&amp;quot;','&amp;apos;'),array('&amp;','&lt;','&gt;','&quot;','&apos;'),$__Context->item->getTitle($__Context->widget_info->subject_cut_size)) ?>
					</span>
					<span class="content_nickname">
						<?php echo $__Context->item->getNickName($__Context->widget_info->nickname_cut_size) ?>
					</span>
				</span>
				<?php if($__Context->widget_info->show_comment_count=='Y' && $__Context->item->getCommentCount()){ ?><span class="content_recnt <?php if(array_search('thumbnail', $__Context->widget_info->option_view_arr) && $__Context->item->getThumbnail()){ ?>content_with_thumbnail<?php } ?>">
					<?php if($__Context->item->getCommentCount()<999){;
echo $__Context->item->getCommentCount();
}else{ ?>999+<?php } ?>
				</span><?php } ?>
			</a><?php $__Context->_idx++ ?>
		</li><?php } ?>
	</ul>
	<?php if($__Context->widget_info->page_count > 1 && $__Context->widget_info->list_count<$__Context->_idx){ ?>
	<div class="simple_content_nav">
		<button type="button" class="soo_cont_more" title="<?php echo $lang->more ?>" onclick="content_widget_plus(jQuery(this).parents('div.simple_content_nav').prev('ul.simple_content_list'),<?php echo $__Context->widget_info->list_count ?>)"><span class="page_info">1/<?php echo intval(($__Context->_idx - 1) / $__Context->widget_info->list_count) + 1 ?></span> <?php echo $lang->more ?></button>
	</div>
	<?php } ?>
</div>
