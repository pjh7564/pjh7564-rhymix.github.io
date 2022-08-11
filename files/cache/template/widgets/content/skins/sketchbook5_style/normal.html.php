<?php if(!defined("__XE__"))exit;?><table class="sk5_normal">
	<thead>
		<?php $__Context->_idx=0 ?>
		<tr<?php if($__Context->_idx >= $__Context->widget_info->list_count){ ?> style="display:none"<?php } ?>>
		<?php if($__Context->widget_info->option_view_arr)foreach($__Context->widget_info->option_view_arr as $__Context->k => $__Context->v){ ?>
			<?php if($__Context->v=='title'){ ?>
				<?php if($__Context->widget_info->show_category=='Y'){ ?>
					<th class="hidden-phone"><?php echo $lang->category ?></th>
				<?php } ?>
				<th><?php echo $lang->title ?></th>
			<?php }else if($__Context->v=='regdate'){ ?>
				<th class="hidden-phone hidden-tablet"><?php echo $lang->regdate ?></th>
			<?php }else if($__Context->v=='nickname'){ ?>
				<th class="hidden-phone nick_name"><?php echo $lang->nick_name ?></th>
			<?php } ?>
		<?php } ?>
		</tr>
	</thead>
	<tbody>
<?php $__Context->_idx=0 ?>
<?php if($__Context->widget_info->content_items)foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
	<tr<?php if($__Context->_idx >= $__Context->widget_info->list_count){ ?> style="display:none"<?php } ?>>
<?php if($__Context->widget_info->option_view_arr)foreach($__Context->widget_info->option_view_arr as $__Context->k => $__Context->v){ ?>
<?php if($__Context->v=='title'){ ?>
	<?php if($__Context->widget_info->show_category=='Y' ){ ?>
		<td class="category hidden-phone">
			<?php if($__Context->widget_info->show_browser_title=='Y' && $__Context->item->getBrowserTitle()){ ?>
				<a href="<?php if($__Context->item->contents_link){;
echo $__Context->item->contents_link;
}else{;
echo getSiteUrl($__Context->item->domain, '', 'mid', $__Context->item->get('mid'));
} ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getBrowserTitle() ?></a><?php if($__Context->item->get('category_srl')){ ?> <i>&rsaquo;</i> <?php } ?>
				<a href="<?php echo getSiteUrl($__Context->item->domain,'','mid',$__Context->item->get('mid'),'category',$__Context->item->get('category_srl')) ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php if($__Context->item->get('category_srl')){ ?><strong class="category"><?php echo $__Context->item->getCategory() ?></strong><?php } ?></a>
			<?php } ?>
		</td>
	<?php } ?>
	<td class="title">
		<a href="<?php echo $__Context->item->getLink() ?>"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></a>
		<?php if($__Context->widget_info->show_comment_count=='Y' && $__Context->item->getCommentCount()){ ?>
			<em class="replyNum" title="Replies"><a href="<?php echo $__Context->item->getLink() ?>#comment"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>>[<?php echo $__Context->item->getCommentCount() ?>]</a></em>
		<?php } ?>
		<?php if($__Context->widget_info->show_trackback_count=='Y' && $__Context->item->getTrackbackCount()){ ?>
			<em class="trackbackNum" title="Trackbacks"><a href="<?php echo $__Context->item->getLink() ?>#trackback"<?php if($__Context->widget_info->new_window){ ?> target="_blank"<?php } ?>><?php echo $__Context->item->getTrackbackCount() ?></a></em>
		<?php } ?>
		<?php if($__Context->widget_info->show_icon=='Y'){ ?>
			<span class="icon"> <?php echo $__Context->item->printExtraImages() ?></span>
		<?php } ?>
	</td>
<?php }else if($__Context->v=='nickname'){ ?>
	<td class="hidden-phone"><a <?php if($__Context->item->getMemberSrl()){ ?>href="#" onclick="return false;" class="author member_<?php echo $__Context->item->getMemberSrl() ?>"<?php }elseif($__Context->item->getAuthorSite()){ ?>href="<?php echo $__Context->item->getAuthorSite() ?>" onclick="window.open(this.href); return false;" class="author member"<?php }else{ ?>href="#" onclick="return false;" class="author member hidden-phone"<?php } ?> ><?php echo $__Context->item->getNickName() ?></a></td>
<?php }else if($__Context->v=='regdate'){ ?>
	<td class="time hidden-phone hidden-tablet"><?php echo $__Context->item->getRegdate("Y-m-d") ?><!--<?php echo $__Context->item->getRegdate("H:i") ?>--></td>
<?php } ?>
<?php } ?>
	</tr>
<?php $__Context->_idx++ ?>
<?php } ?>
	</tbody>
</table>
<?php if($__Context->widget_info->page_count > 1 && $__Context->widget_info->list_count<$__Context->_idx){ ?>
<div class="sk5_pg">
	<button type="button" class="direction" title="<?php echo $lang->cmd_prev ?>" onclick="content_widget_prev(jQuery(this).parents('div.sk5_pg').prev('table.sk5_normal'),<?php echo $__Context->widget_info->list_count ?>);return false;">&lsaquo; Prev</button>
	<button type="button" class="direction" title="<?php echo $lang->cmd_next ?>" onclick="content_widget_next(jQuery(this).parents('div.sk5_pg').prev('table.sk5_normal'),<?php echo $__Context->widget_info->list_count ?>);return false;">Next &rsaquo;</button>
</div>
<?php } ?>
