<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/board/skins/default/board.default.css--><?php Context::loadFile(['modules/board/skins/default/board.default.css', '', '', '', []]); ?>
<!--#Meta:modules/board/skins/default/board.default.js--><?php Context::loadFile(['modules/board/skins/default/board.default.js', 'body', '', '']); ?>
<?php if($__Context->order_type == "desc"){ ?>
    <?php  $__Context->order_type = "asc";  ?>
<?php }else{ ?>
    <?php  $__Context->order_type = "desc";  ?>
<?php } ?>
<?php if(!$__Context->module_info->duration_new = (int)$__Context->module_info->duration_new){;
$__Context->module_info->duration_new = 12;
} ?>
<?php  $__Context->cate_list = array(); $__Context->current_key = null;  ?>
<?php if($__Context->category_list)foreach($__Context->category_list as $__Context->key=>$__Context->val){ ?>
	<?php if(!$__Context->val->depth){ ?>
		<?php 
			$__Context->cate_list[$__Context->key] = $__Context->val;
			$__Context->cate_list[$__Context->key]->children = array();
			$__Context->current_key = $__Context->key;
		 ?>
	<?php }elseif($__Context->current_key){ ?>
		<?php  $__Context->cate_list[$__Context->current_key]->children[] = $__Context->val  ?>
	<?php } ?>
<?php } ?>
<div class="board">
	<?php if($__Context->m && $__Context->module_info->mobile_header_text){ ?>
		<?php echo $__Context->module_info->mobile_header_text ?>
	<?php }else{ ?>
		<?php echo $__Context->module_info->header_text ?>
	<?php } ?>
	<?php if($__Context->module_info->title_image || $__Context->grant->manager){ ?><div class="board_header">
		<?php if($__Context->module_info->title_image){ ?><h2><a href="<?php echo getUrl('','mid',$__Context->mid) ?>"><img src="<?php echo $__Context->module_info->title_image ?>" alt="<?php echo $__Context->module_info->title_alt ?>" /></a></h2><?php } ?>
		<?php if($__Context->grant->manager){ ?><a class="setup" href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>" title="<?php echo $lang->cmd_setup ?>"><?php echo $lang->cmd_setup ?></a><?php } ?>
	</div><?php } ?>
	<?php if($__Context->module_info->use_category=='Y'){ ?><ul class="cTab">
		<li<?php if(!$__Context->category){ ?> class="on"<?php } ?>><a href="<?php echo getUrl('category','','page','') ?>"><?php echo $lang->total ?></a></li>
		<?php $__loop_tmp=$__Context->cate_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->category==$__Context->val->category_srl){ ?> class="on"<?php } ?>><a href="<?php echo getUrl('category',$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?><!--<?php if($__Context->val->document_count){ ?><em>[<?php echo $__Context->val->document_count ?>]</em><?php } ?>--></a>
			<?php if(count($__Context->val->children)){ ?><ul>
				<?php $__loop_tmp=$__Context->val->children;if($__loop_tmp)foreach($__loop_tmp as $__Context->idx=>$__Context->item){ ?><li<?php if($__Context->category==$__Context->item->category_srl){ ?> class="on_"<?php } ?>><a href="<?php echo getUrl('category',$__Context->item->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->item->title ?><!--<?php if($__Context->val->document_count){ ?><em>[<?php echo $__Context->item->document_count ?>]</em><?php } ?>--></a></li><?php } ?>
			</ul><?php } ?>
		</li><?php } ?>
	</ul><?php } ?>
