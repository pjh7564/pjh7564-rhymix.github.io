<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/tpl','header.html') ?>
<!--TODO-->
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == ''){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<table id="boardList" class="x_table x_table-striped x_table-hover">
	<caption>
		<strong>Total: <?php echo number_format($__Context->total_count) ?>, Page: <?php echo number_format($__Context->page) ?>/<?php echo number_format($__Context->total_page) ?></strong>
	</caption>
	<thead>
		<tr>
			<th scope="col"><?php echo $lang->no ?></th>
			<th scope="col"><?php echo $lang->module_category ?></th>
			<th scope="col"><?php echo $lang->mid ?></th>
			<th scope="col"><?php echo $lang->browser_title ?></th>
			<th scope="col"><?php echo $lang->regdate ?></th>
			<th scope="col"><?php echo $lang->cmd_edit ?></th>
			<th scope="col"><input type="checkbox" data-name="cart" title="Check All" /></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->board_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->val){ ?><tr>
			<td><?php echo $__Context->no ?></td>
			<td>
				<?php if(!$__Context->val->module_category_srl){ ?>
					<?php if($__Context->val->site_srl){;
echo $lang->virtual_site;
} ?>
					<?php if(!$__Context->val->site_srl){;
echo $lang->not_exists;
} ?>
				<?php } ?>
				<?php if($__Context->val->module_category_srl){;
echo $__Context->module_category[$__Context->val->module_category_srl]->title;
} ?>
			</td>
			<td><?php echo $__Context->val->mid ?></td>
			<td><a href="<?php echo getSiteUrl($__Context->val->domain,'','mid',$__Context->val->mid) ?>"><?php echo $__Context->val->browser_title ?></a></td>
			<td><?php echo zdate($__Context->val->regdate,"Y-m-d") ?></td>
			<td>
				<a href="<?php echo getUrl('act','dispBoardAdminBoardInfo','module_srl',$__Context->val->module_srl) ?>"><i class="x_icon-cog"></i> <?php echo $lang->cmd_setup ?></a> &nbsp;
				<a href="<?php echo getUrl('','module','module','act','dispModuleAdminCopyModule','module_srl',$__Context->val->module_srl) ?>" onclick="popopen(this.href);return false;"><i class="x_icon-plus"></i> <?php echo $lang->cmd_copy ?></a> &nbsp;
				<a href="<?php echo getUrl('act','dispBoardAdminDeleteBoard','module_srl', $__Context->val->module_srl) ?>"><i class="x_icon-remove"></i> <?php echo $lang->cmd_delete ?></a>
			</td>
			<td><input type="checkbox" name="cart" value="<?php echo $__Context->val->module_srl ?>" class="selectedModule" data-mid="<?php echo $__Context->val->mid ?>" data-browser_title="<?php echo $__Context->val->browser_title ?>" /></td>
		</tr><?php } ?>
		<?php if(!$__Context->board_list){ ?><tr>
			<td><?php echo $lang->no_board_instance ?></td>
		</tr><?php } ?>
	</tbody>
</table>
<div class="x_clearfix">
	<?php if($__Context->page_navigation){ ?><form action="./" class="x_pagination x_pull-left"  style="margin-top:0"><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
		<ul>
			<li<?php if(!$__Context->page || $__Context->page == 1){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', '') ?>">&laquo; <?php echo $lang->first_page ?></a></li>
			<?php if($__Context->page_navigation->first_page != 1 && $__Context->page_navigation->first_page + $__Context->page_navigation->page_count > $__Context->page_navigation->last_page - 1 && $__Context->page_navigation->page_count != $__Context->page_navigation->total_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<li>
				<a href="#goTo" data-toggle title="<?php echo $lang->cmd_go_to_page ?>">&hellip;</a>
				<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
					<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $lang->cmd_go_to_page ?>" />
					<button type="submit" class="x_add-on">Go</button>
				</span><?php } ?>
			</li>
			<?php } ?>
			<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
			<?php $__Context->last_page = $__Context->page_no ?>
			<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>><a  href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
			<?php } ?>
			<?php if($__Context->last_page != $__Context->page_navigation->last_page && $__Context->last_page + 1 != $__Context->page_navigation->last_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<li>
				<a href="#goTo" data-toggle title="<?php echo $lang->cmd_go_to_page ?>">&hellip;</a>
				<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
					<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $lang->cmd_go_to_page ?>" />
					<button type="submit" class="x_add-on">Go</button>
				</span><?php } ?>
			</li>
			<?php } ?>
			<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>" title="<?php echo $__Context->page_navigation->last_page ?>"><?php echo $lang->last_page ?> &raquo;</a></li>
		</ul>
	</form><?php } ?>
	<span class="x_pull-right x_btn-group">
		<!--<a class="x_btn x_btn-inverse" href="<?php echo getUrl('act','dispBoardAdminInsertBoard','module_srl','') ?>"><?php echo $lang->cmd_create_board ?></a>-->
		<a class="x_btn modalAnchor _manage_selected" href="#manageSelectedModule"><?php echo $lang->cmd_manage_selected_board ?></a>
	</span>
</div>
<form action="" class="search x_input-append center" ><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<?php if(countobj($__Context->module_category)){ ?><select name="module_category_srl" title="<?php echo $lang->module_category ?>" style="margin-right:4px">
		<option value=""<?php if(!$__Context->module_category_srl){ ?> selected="selected"<?php } ?>><?php echo $lang->all ?></option>
		<option value="0"<?php if($__Context->module_category_srl==='0'){ ?> selected="selected"<?php } ?>><?php echo $lang->not_exists ?></option>
		<?php $__loop_tmp=$__Context->module_category;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>" <?php if($__Context->module_category_srl==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
	</select><?php } ?>
	<select name="search_target" title="<?php echo $lang->search_target ?>" style="margin-right:4px">
		<option value="mid"<?php if($__Context->search_target=='mid'){ ?> selected="selected"<?php } ?>><?php echo $lang->mid ?></option>
		<option value="browser_title"<?php if($__Context->search_target=='browser_title'){ ?> selected="selected"<?php } ?>><?php echo $lang->browser_title ?></option>
	</select>
	<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" />
	<button class="x_btn x_btn-inverse" type="submit"><?php echo $lang->cmd_search ?></button>
	<a class="x_btn" href="<?php echo getUrl('', 'module', $__Context->module, 'mid', $__Context->mid, 'act', $__Context->act) ?>"><?php echo $lang->cmd_cancel ?></a>
</form>
<?php echo $__Context->selected_manage_content ?>
<script>
jQuery(function($){
	// Modal anchor activation
	var $docTable = $('#boardList');
	$docTable.find(':checkbox').change(function(){
		var $modalAnchor = $('a.modalAnchor._manage_selected');
		if($docTable.find('tbody :checked').length == 0){
			$modalAnchor.removeAttr('href').addClass('x_disabled');
		} else {
			$modalAnchor.attr('href','#manageSelectedModule').removeClass('x_disabled');
		}
	}).change();
	// Button action
	$('a.modalAnchor._manage_selected').click(function(){
		if($docTable.find('tbody :checked').length == 0){
			$('body').css('overflow','auto');
			alert('<?php echo $lang->choose_board_instance ?>');
			return false;
		}
	});
});
</script>
