<?php if(!defined("__XE__"))exit;?><script>
xe.lang.msg_empty_search_target = '<?php echo $lang->msg_empty_search_target ?>';
xe.lang.msg_empty_search_keyword = '<?php echo $lang->msg_empty_search_keyword ?>';
</script>
<!--#Meta:modules/document/tpl/js/document_admin.js--><?php Context::loadFile(['modules/document/tpl/js/document_admin.js', '', '', '']); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/document/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/document/tpl/declared_list/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<form id="fo_list" action="./" method="get"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="document" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<table class="x_table x_table-striped x_table-hover" id="documentListTable">
		<caption>
			<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminList') ?>"><?php echo $lang->all ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('act', 'dispDocumentAdminList', 'search_target', 'is_secret', 'search_keyword', 'N') ?>"><?php echo $__Context->status_name_list['PUBLIC'] ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('act', 'dispDocumentAdminList', 'search_target', 'is_secret', 'search_keyword', 'Y') ?>"><?php echo $__Context->status_name_list['SECRET'] ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('act', 'dispDocumentAdminList', 'search_target', 'is_secret', 'search_keyword', 'temp') ?>"><?php echo $__Context->status_name_list['TEMP'] ?></a> 
			<i>|</i>
			<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminDeclared') ?>"<?php if($__Context->act == 'dispDocumentAdminDeclared'){ ?> class="active"<?php } ?>><?php echo $lang->cmd_declared_list ?>(<?php echo number_format($__Context->total_count) ?>)</a>
			<div class="x_btn-group x_pull-right">
				<a href="#manageForm" class="x_btn modalAnchor" data-value="trash"><?php echo $lang->trash ?></a>
				<a href="#manageForm" class="x_btn modalAnchor" data-value="delete"><?php echo $lang->delete ?></a>
				<a href="#manageForm" class="x_btn modalAnchor" data-value="move"><?php echo $lang->move ?></a>
				<a href="#manageForm" class="x_btn modalAnchor" data-value="copy"><?php echo $lang->copy ?></a>
				<a href="#manageForm" class="x_btn modalAnchor" data-value="cancelDeclare"><?php echo $lang->cmd_cancel_declare ?></a>
			</div>
		</caption>
		<thead>
			<tr>
				<th scope="col" class="title"><?php echo $lang->title ?></th>
				<th scope="col" class="nowr"><?php echo $lang->writer ?></th>
				<th scope="col" class="nowr"><?php echo $lang->readed_count ?></th>
				<th scope="col" class="nowr"><?php echo $lang->cmd_vote ?>(+/-)</th>
				<th scope="col" class="nowr"><a href="<?php echo getUrl('sort_index', 'declared_count') ?>"><?php echo $lang->declared_count ?> <?php if($__Context->sort_index == 'declared_count'){ ?>▼<?php } ?></a></th>
				<th scope="col" class="nowr"><a href="<?php echo getUrl('sort_index', 'regdate') ?>"><?php echo $lang->original_date ?> <?php if($__Context->sort_index == 'regdate'){ ?>▼<?php } ?></a></th>
				<th scope="col" class="nowr"><a href="<?php echo getUrl('sort_index', 'declared_latest') ?>"><?php echo $lang->latest_declared_date ?> <?php if($__Context->sort_index == 'declared_latest'){ ?>▼<?php } ?></a></th>
				<th scope="col"><input type="checkbox" name="cart" title="Check All" /></th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->document_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->oDocument){ ?><tr>
				<td class="title"><a href="<?php echo getUrl('','document_srl',$__Context->oDocument->document_srl) ?>" target="_blank"><?php echo $__Context->oDocument->getTitle() ?></a></td>
				<td class="nowr"><a href="#popup_menu_area" class="member_<?php echo $__Context->oDocument->get('member_srl') ?>"><?php echo $__Context->oDocument->getNickName() ?></a></td>
				<td class="nowr"><?php echo $__Context->oDocument->get('readed_count') ?></td>
				<td class="nowr"><?php echo $__Context->oDocument->get('voted_count') ?> / <?php echo $__Context->oDocument->get('blamed_count') ?></td>
				<td class="nowr"><?php echo $__Context->oDocument->get('declared_count') ?> (<a href="<?php echo getUrl('', 'act', 'dispDocumentAdminDeclaredLogByDocumentSrl', 'target_srl',$__Context->oDocument->document_srl) ?>" onclick="popopen(this.href, 'admin_popup');return false"><?php echo $lang->improper_document_declare_reason ?></a>)</td>
				<td class="nowr"><?php echo $__Context->oDocument->getRegdate("Y-m-d H:i") ?></td>
				<td class="nowr"><?php echo zdate($__Context->oDocument->get('latest_declared'), 'Y-m-d H:i') ?></td>
				<td><input type="checkbox" name="cart" value="<?php echo $__Context->oDocument->document_srl ?>" /></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="x_btn-group x_pull-right">
		<a href="#manageForm" class="x_btn modalAnchor" data-value="trash"><?php echo $lang->trash ?></a>
		<a href="#manageForm" class="x_btn modalAnchor" data-value="delete"><?php echo $lang->delete ?></a>
		<a href="#manageForm" class="x_btn modalAnchor" data-value="move"><?php echo $lang->move ?></a>
		<a href="#manageForm" class="x_btn modalAnchor" data-value="copy"><?php echo $lang->copy ?></a>
		<a href="#manageForm" class="x_btn modalAnchor" data-value="cancelDeclare"><?php echo $lang->cmd_cancel_declare ?></a>
	</div>
</form>
<form action="./" class="x_pagination"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
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
<form action="./" method="post" class="x_modal" id="manageForm"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="document" />
	<input type="hidden" name="act" value="procDocumentManageCheckedDocument" />
	<input type="hidden" name="type" value="" />
	<input type="hidden" name="module_srl" value="" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminDeclared') ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/document/tpl/declared_list/1" />
	<div class="x_modal-header">
		<h1><?php echo $lang->document_manager ?>: <span class="_sub"></span></h1>
	</div>
	<div class="x_modal-body">
		<section class="moveList">
			<table width="100%" id="documentManageListTable" class="x_table x_table-striped x_table-hover">
				<caption><strong><?php echo $lang->selected_document ?> <span id="selectedDocumentCount"></span></strong></caption>
				<thead>
					<tr>
						<th scope="col" class="title"><?php echo $lang->title ?></th>
						<th scope="col" class="nowr"><?php echo $lang->writer ?></th>
						<th scope="col" class="nowr"><?php echo $lang->status ?></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="x_control-group _moveTarget" style="position:relative" hidden>
				<label><?php echo $lang->selected_document_move ?></label>
				<input type="text" name="module_srl"  class="module_search" />
			</div>
			<div class="x_control-group" style="padding-right:14px;border-top:0">
				<label for="message"><?php echo $lang->message_notice ?></label>
				<textarea rows="4" cols="42" name="message_content" id="message" style="width:100%"></textarea>
			</div>
		</section>
		<section class="moveTree">
			<h1><?php echo $lang->msg_select_menu ?></h1>
			<p><?php echo $lang->selected_document_move ?></p>
			<div class="tree _menuSelector">
				<div class="tree" style="height:250px;overflow-y:scroll;border:1px solid #aaa"></div>
			</div>
		</section>
	</div>
	<div class="x_modal-footer">
		<button type="submit" name="type" value="" class="x_btn x_btn-inverse x_pull-right"><?php echo $lang->cmd_confirm ?></button>
		<!-- value="trash|delete|move|copy|cancelDeclare" -->
	</div>
</form>
<script>
jQuery(function($){
	// Modal anchor activation
	var $docTable = $('#documentListTable');
	$docTable.find(':checkbox').change(function(){
		var $modalAnchor = $('a[data-value]');
		if($docTable.find('tbody :checked').length == 0){
			$modalAnchor.removeAttr('href').addClass('x_disabled');
		} else {
			$modalAnchor.attr('href','#manageForm').removeClass('x_disabled');
		}
	}).change();
	// Button action
	$('a[data-value]').click(function(){
		if($docTable.find('tbody :checked').length == 0){
			$('body').css('overflow','auto');
			alert('<?php echo $lang->msg_not_selected_document ?>');
			return false;
		} else {
			var $this = $(this);
			var $manageForm = $('#manageForm');
			var $modalBody = $manageForm.find('.x_modal-body');
			var thisValue = $this.attr('data-value');
			var thisText = $this.text();
			getDocumentList();
			$manageForm.find('.x_modal-header ._sub').text(thisText).end().find('[type="submit"]').val(thisValue).text(thisText);
			if(thisValue == 'trash' || thisValue == 'delete' || thisValue == 'cancelDeclare'){
				$modalBody.removeClass('showTree');
			} else if(thisValue == 'move' || thisValue == 'copy') {
				$.xeShowMenuSelectorIn($('._menuSelector'));
				
				$modalBody.addClass('showTree');
				$tree = $('._menuSelector .tree');
				$tree.bind('select_node.jstree', function(a,b){
					var aSelected = [];
					$tree.find('.jstree-clicked').each(function(idx, el){
						var htParam = $.parseJSON($(this).attr('data-param'));
						aSelected.push({browser_title: htParam.sMenuTitle, mid: htParam.sMenuUrl, module_srl: htParam.sModuleSrl, menu_id: htParam.sMenuId, type: htParam.sType});
						//module_srl
					});
					$('#manageForm input[name=module_srl]').val(aSelected[0].module_srl);
				});
				$('._menuSelector').bind('site_changed', function(){
					$('#manageForm input[name=module_srl]').val('');
				});
			}
		}
	});
});
</script>