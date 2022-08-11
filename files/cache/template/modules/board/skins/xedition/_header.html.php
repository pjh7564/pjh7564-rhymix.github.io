<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/board/skins/xedition/board.default.css--><?php Context::loadFile(['modules/board/skins/xedition/board.default.css', '', '', '', []]); ?>
<!--#Meta:modules/board/skins/xedition/board.default.js--><?php Context::loadFile(['modules/board/skins/xedition/board.default.js', 'body', '', '']); ?>
<!--#Meta:common/css/xeicon/xeicon.min.css--><?php Context::loadFile(['common/css/xeicon/xeicon.min.css', '', '', '', []]); ?>
<?php if(isset($__Context->order_type) && $__Context->order_type == "desc"){ ?>
    <?php  $__Context->order_type = "asc";  ?>
<?php }else{ ?>
    <?php  $__Context->order_type = "desc";  ?>
<?php } ?>
<?php if(!$__Context->module_info->duration_new = (int)$__Context->module_info->duration_new){;
$__Context->module_info->duration_new = 12;
} ?>
<?php  $__Context->cate_list = array(); $__Context->current_key = null;  ?>
<?php  $__Context->category_list = $__Context->category_list ?? [] ?>
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
