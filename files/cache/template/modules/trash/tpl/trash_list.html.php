<?php if(!defined("__XE__"))exit;?><script>
var confirm_restore_msg = '<?php echo $lang->confirm_restore ?>';
var no_text_comment = '<?php echo $lang->no_text_comment ?>';
</script>
<!--#Meta:modules/trash/tpl/js/trash_admin.js--><?php Context::loadFile(['modules/trash/tpl/js/trash_admin.js', '', '', '']); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/trash/tpl','header.html') ?>
<?php Context::addJsFile("modules/trash/ruleset/emptyTrash.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="emptyTrash" />
	<input type="hidden" name="module" value="trash" />
	<input type="hidden" name="act" value="procTrashAdminEmptyTrash" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="is_all" value="true" />
	<div class="x_control-group">
		<h2><?php echo $lang->cmd_trash_type ?></h2>
		<div class="x_controls">
			<label class="x_inline">
				<input type="radio" name="is_type" value="document" /> <?php echo $lang->document ?>
			</label>
			<label class="x_inline">
				<input type="radio" name="is_type" value="comment" /> <?php echo $lang->comment ?>
			</label>
		</div>
	</div>
	<p>
		<button type="submit" class="x_btn x_btn-warning x_btn-primary" name="is_all" value="true"><?php echo $lang->empty_trash_all ?></button>
		&nbsp;<span class="x_label x_label-important"><?php echo $lang->trash_warning ?></span><?php echo $lang->remove_all_trash_item ?>
	</p>
	<table id="trashListTable" class="x_table x_table-striped x_table-hover">
		<caption>
			<strong></strong>
			<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispTrashAdminList', 'originModule', '') ?>"<?php if($__Context->originModule == ''){ ?> class="active"<?php } ?>><?php echo $lang->all ?>(<?php echo number_format($__Context->total_count) ?>)</a>
			<i>|</i>
			<a href="<?php echo getUrl('originModule', 'document') ?>"<?php if($__Context->originModule == 'document'){ ?> class="active"<?php } ?>><?php echo $lang->document ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('originModule', 'comment') ?>"<?php if($__Context->originModule == 'comment'){ ?> class="active"<?php } ?>><?php echo $lang->comment ?></a>
			<div class="x_pull-right x_btn-group">
				<a href="#fo_list" class="x_btn modalAnchor" data-name="is_all" data-value="false"><?php echo $lang->delete ?></a>
				<a href="#fo_list" class="x_btn modalAnchor" data-name="act" data-value="procTrashAdminRestore"><?php echo $lang->restore ?></a>
			</div>
		</caption>
		<thead>
			<tr>
				<th scope="col" class="nowr"><?php echo $lang->origin_module_type ?></th>
				<th scope="col" class="title"><?php echo $lang->document ?></th>
				<th scope="col" class="nowr"><?php echo $lang->author ?></th>
				<th scope="col" class="nowr"><?php echo $lang->ipaddress ?></th>
				<th scope="col" class="nowr"><?php echo $lang->trash_nick_name ?></th>
				<th scope="col" class="nowr"><?php echo $lang->trash_date ?></th>
				<th scope="col" class="title"><?php echo $lang->trash_description ?></th>
				<th scope="col"><input type="checkbox" title="Check All" data-name="cart" /></th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->trash_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->oTrashVO){ ?><tr>
				<td class="nowr"><?php if($__Context->oTrashVO->getOriginModule() == 'document'){;
echo $lang->document;
}else{;
echo $lang->comment;
} ?></td>
				<td class="title">
					<?php if(trim($__Context->oTrashVO->getTitle())){ ?>
					<?php if(isset($__Context->module_list[$__Context->oTrashVO->unserializedObject['module_srl']])){ ?>
					<a href="<?php echo getUrl('', 'mid', $__Context->module_list[$__Context->oTrashVO->unserializedObject['module_srl']]->mid) ?>" target="_blank"><?php echo $__Context->module_list[$__Context->oTrashVO->unserializedObject['module_srl']]->browser_title ?></a> - 
					<?php } ?>
					<a href="<?php echo getUrl('act','dispTrashAdminView','trash_srl',$__Context->oTrashVO->getTrashSrl()) ?>"><?php echo $__Context->oTrashVO->getTitle() ?></a>
					<?php }else{ ?>
					<a href="<?php echo getUrl('act','dispTrashAdminView','trash_srl',$__Context->oTrashVO->getTrashSrl()) ?>">
						<?php if($__Context->oTrashVO->getOriginModule() == 'comment'){ ?>
						<?php echo $lang->no_text_comment ?>
						<?php }else{ ?>
						<?php echo $lang->no_text_document ?>
						<?php } ?>
					</a>
					<?php } ?>
				</td>
				<td class="nowr"><a href="#popup_menu_area" class="member_<?php echo $__Context->oTrashVO->unserializedObject['member_srl'] ?>"><?php echo $__Context->oTrashVO->unserializedObject['nick_name'] ?></a></td>
				<td class="nowr"><?php echo $__Context->oTrashVO->unserializedObject['ipaddress'] ?></td>
				<td class="nowr"><a href="#popup_menu_area" class="member_<?php echo $__Context->oTrashVO->getRemoverSrl() ?>"><?php echo $__Context->oTrashVO->getNickName() ?></a></td>
				<td class="nowr"><?php echo zdate($__Context->oTrashVO->getRegdate(), "Y-m-d H:i:s") ?></td>
				<td class="title"><?php echo $__Context->oTrashVO->getDescription() ?></td>
				<td><input type="checkbox" name="cart" value="<?php echo $__Context->oTrashVO->getTrashSrl() ?>" /></td>
			</tr><?php } ?>
			<?php if(!$__Context->trash_list){ ?><tr>
				<td><?php echo $lang->no_documents ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="x_pull-right x_btn-group">
		<a href="#fo_list" class="x_btn modalAnchor" data-name="is_all" data-value="false"><?php echo $lang->delete ?></a>
		<a href="#fo_list" class="x_btn modalAnchor" data-name="act" data-value="procTrashAdminRestore"><?php echo $lang->restore ?></a>
	</div>
</form>
<form action="" class="x_pagination"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="error_return_url" value="" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
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
</form>
<form action="./" method="get" class="search center x_input-append x_clearfix"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="error_return_url" value="" />
	<select name="search_target" title="<?php echo $lang->search_target ?>" style="margin-right:4px">
		<?php if($lang->search_target_trash_list)foreach($lang->search_target_trash_list as $__Context->key => $__Context->val){ ?>
		<option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
		<?php } ?>
	</select>
	<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" title="<?php echo $lang->cmd_search ?>" />
	<button type="submit" class="x_btn x_btn-inverse"><?php echo $lang->cmd_search ?></button>
	<a href="<?php echo getUrl('','module',$__Context->module,'act',$__Context->act) ?>" class="x_btn"><?php echo $lang->cmd_cancel ?></a>
</form>
<?php Context::addJsFile("modules/trash/ruleset/emptyTrash.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_list" action="./" method="post" class="x_modal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="emptyTrash" />
	<input type="hidden" name="module" value="trash" />
	<input type="hidden" name="act" value="procTrashAdminEmptyTrash" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="is_all" value="false" />
	<input type="hidden" name="origin_module" value="<?php echo $__Context->origin_module ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/trash/tpl/trash_list/1" />
	<div class="x_modal-header">
		<h1><?php echo $lang->document_manager ?>: <span class="_sub"></span></h1>
	</div>
	<div class="x_modal-body">
		<table id="trashManageListTable" class="x_table x_table-striped x_table-hover">
			<caption>
				<strong><?php echo $lang->selected_document ?> <span id="selectedTrashCount"></span></strong>
			</caption>
			<thead>
				<tr>
					<th scope="col" class="title"><?php echo $lang->document ?></th>
					<th scope="col" class="nowr"><?php echo $lang->trash_nick_name ?></th>
					<th scope="col" class="nowr"><?php echo $lang->ipaddress ?></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="x_modal-footer">
		<button type="submit" class="x_btn x_btn-inverse x_pull-right" name="is_all|act" value="false|procTrashAdminRestore"><?php echo $lang->confirm ?></button>
	</div>
</form>
<script>
jQuery(function($){
	// Modal anchor activation
	var $docTable = $('#trashListTable');
	$docTable.find(':checkbox').change(function(){
		var $modalAnchor = $('a[data-value]');
		if($docTable.find('tbody :checked').length == 0){
			$modalAnchor.removeAttr('href').addClass('x_disabled');
		} else {
			$modalAnchor.attr('href','#fo_list').removeClass('x_disabled');
		}
	}).change();
	// Modal anchor button action
	$('a[data-value]').bind('before-open.mw', function(){
		if($docTable.find('tbody :checked').length == 0){
			$('body').css('overflow','auto');
			alert('<?php echo $lang->msg_not_selected_document ?>');
			return false;
		} else {
			var $this = $(this);
			var thisName = $this.attr('data-name');
			var thisValue = $this.attr('data-value');
			var thisText = $this.text();
			getTrashList();
			$('#fo_list').find('.x_modal-header ._sub').text(thisText).end().find('[type="submit"]').val(thisValue).attr('name',thisName).text(thisText);
		}
	});
});
</script>
