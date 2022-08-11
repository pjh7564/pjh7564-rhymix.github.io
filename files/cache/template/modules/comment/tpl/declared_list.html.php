<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/comment/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/comment/tpl/declared_list/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/comment/ruleset/deleteChecked.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_list" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="deleteChecked" />
	<input type="hidden" name="module" value="comment" />
	<input type="hidden" name="act" value="procCommentAdminDeleteChecked" />
	<input type="hidden" value="<?php echo getUrl('', 'module', $__Context->module, 'act', $__Context->act) ?>" name="success_return_url">
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="is_trash" value="false" />
	<input type="hidden" name="xe_validator_id" value="modules/comment/tpl/declared_list/1" />
	
	<!-- 목록 -->
	<table id="commentListTable" class="x_table x_table-striped x_table-hover">
		<caption>
			<a href="<?php echo getUrl('search_keyword','','search_target','','act','dispCommentAdminList','Y') ?>"><?php echo $lang->all ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('act','dispCommentAdminList','search_target','is_secret','search_keyword','N') ?>"><?php echo $__Context->secret_name_list['N'] ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('act','dispCommentAdminList','search_target','is_secret','search_keyword','Y') ?>"><?php echo $__Context->secret_name_list['Y'] ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('act','dispCommentAdminList','search_target','is_published','search_keyword','N') ?>"><?php echo $lang->published_name_list['N'] ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('act','dispCommentAdminList','search_target','is_published','search_keyword','Y') ?>"><?php echo $lang->published_name_list['Y'] ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('', 'module', 'admin', 'act','dispCommentAdminDeclared') ?>"<?php if($__Context->act == 'dispCommentAdminDeclared'){ ?> class="active"<?php } ?>><?php echo $lang->cmd_declared_list ?>(<?php echo number_format($__Context->total_count) ?>)</a>
			<div class="x_pull-right x_btn-group">
				<button class="x_btn" type="submit" name="trash" onclick="this.form.is_trash.value=true"><?php echo $lang->cmd_trash ?></button>
				<button class="x_btn" type="submit" onclick="this.form.is_trash.value=false"><?php echo $lang->cmd_delete_checked_comment ?></button>
			</div>
		</caption>
		<thead>
			<tr>
				<th scope="col"><?php echo $lang->comment ?></th>
				<th scope="col"><?php echo $lang->writer ?></th>
				<th scope="col"><?php echo $lang->ipaddress ?></th>
				<th scope="col"><a href="<?php echo getUrl('sort_index', 'declared_count') ?>"><?php echo lang('document.declared_count') ?> <?php if($__Context->sort_index == 'declared_count'){ ?>▼<?php } ?></a></th></th>
				<th scope="col"><a href="<?php echo getUrl('sort_index', 'regdate') ?>"><?php echo $lang->original_date ?> <?php if($__Context->sort_index == 'regdate'){ ?>▼<?php } ?></a></th>
				<th scope="col"><a href="<?php echo getUrl('sort_index', 'declared_latest') ?>"><?php echo $lang->latest_declared_date ?> <?php if($__Context->sort_index == 'declared_latest'){ ?>▼<?php } ?></a></th>
				<th scope="col" style="width:15px"><input type="checkbox" /></th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->comment_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->oComment){ ?><tr>
				<td><a href="<?php echo getUrl('','document_srl',$__Context->oComment->get('document_srl')) ?>#comment_<?php echo $__Context->oComment->get('comment_srl') ?>" target="_blank"><?php echo $__Context->oComment->getSummary(100) ?></a></td>
				<td><span class="member_<?php echo $__Context->oComment->getMemberSrl() ?>"><?php echo $__Context->oComment->getNickName() ?></span></td>
				<td><?php echo $__Context->oComment->get('ipaddress') ?></td>
				<td><?php echo $__Context->oComment->get('declared_count') ?> (<a href="<?php echo getUrl('', 'act', 'dispCommentAdminDeclaredLogByCommentSrl', 'target_srl',$__Context->oComment->get('comment_srl')) ?>" onclick="popopen(this.href, 'admin_popup');return false"><?php echo $lang->improper_comment_declare_reason ?></a>)</td>
				<td><?php echo $__Context->oComment->getRegdate('Y-m-d H:i') ?></td>
				<td><?php echo zdate($__Context->oComment->get('latest_declared'), 'Y-m-d H:i') ?></td>
				<td><input type="checkbox" name="cart[]" value="<?php echo $__Context->oComment->get('comment_srl') ?>" /></td>
			</tr><?php } ?>
			<?php if(!$__Context->comment_list){ ?><tr>
				<td><?php echo $lang->no_documents ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="x_clearfix">
		<div class="x_pull-left x_btn-group">
			<button class="x_btn" type="button" onclick="doCancelDeclare();"><?php echo $lang->cmd_cancel_declare ?></button>
		</div>
		<div class="x_pull-right x_btn-group">
			<button class="x_btn" type="submit" name="trash" onclick="this.form.is_trash.value=true"><?php echo $lang->cmd_trash ?></button>
			<button class="x_btn" type="submit" onclick="this.form.is_trash.value=false"><?php echo $lang->cmd_delete_checked_comment ?></button>
		</div>
	</div>
</form>
<form action="./" class="x_pagination x_pagination-centered"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="error_return_url" value="" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
  	<?php if($__Context->search_keyword){ ?><input type="hidden" name="search_keyword" value="<?php echo $__Context->search_keyword ?>" /><?php } ?>
  	<?php if($__Context->search_target){ ?><input type="hidden" name="search_target" value="<?php echo $__Context->search_target ?>" /><?php } ?>
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
<script>
jQuery(function($){
	// Modal anchor activation
	var $docTable = $('#commentListTable');
	$docTable.find(':checkbox').change(function(){
		var $btn = $('#fo_list [type="submit"], #fo_list [type="button"]');
		if($docTable.find('tbody :checked').length == 0){
			$btn.addClass('x_disabled');
		} else {
			$btn.removeClass('x_disabled');
		}
	}).change();
});
</script>
