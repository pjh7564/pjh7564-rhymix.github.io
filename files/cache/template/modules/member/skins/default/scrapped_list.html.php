<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_header.html') ?>
<h1><?php echo $__Context->member_title = $lang->cmd_view_scrapped_document ?></h1>
<div>
	<div class="btnArea" style="clear:none;float:left">
		<select id="scrap_folder_list" style="margin:0">
			<?php if($__Context->scrap_folders)foreach($__Context->scrap_folders as $__Context->folder){ ?>
				<option value="<?php echo $__Context->folder->folder_srl ?>"<?php if($__Context->folder_srl == $__Context->folder->folder_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->folder->name == '/DEFAULT/' ? $lang->default_folder : $__Context->folder->name ?></option>
			<?php } ?>
		</select>
		<?php if($__Context->folder_info->name !== '/DEFAULT/'){ ?><div class="btn-group">
			<input type="text" class="folder_name" style="margin:0;display:none" />
			<button id="scrap_folder_rename" class="btn" data-folder-srl="<?php echo $__Context->folder_srl ?>"><?php echo $lang->scrap_folder_rename ?></button>
			<button id="scrap_folder_delete" class="btn" data-folder-srl="<?php echo $__Context->folder_srl ?>"><?php echo $lang->scrap_folder_delete ?></button>
		</div><?php } ?>
	</div>
	<div class="btnArea" style="clear:none;float:right">
		<input type="text" class="folder_name" style="margin:0;display:none" />
		<button id="scrap_folder_create" class="btn"><?php echo $lang->scrap_folder_create ?></button>
	</div>
	<div class="clear:both"></div>
</div>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th><?php echo $lang->no ?></th>
			<th class="title"><?php echo $lang->title ?></th>
			<th><?php echo $lang->writer ?></th>
			<th><?php echo $lang->date ?></th>
			<th><?php echo $lang->cmd_delete ?></th>
			<th><?php echo $lang->cmd_move ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->document_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->val){ ?><tr>
			<td><?php echo $__Context->no ?></td>
			<td class="title"><a href="<?php echo getUrl('','document_srl',$__Context->val->document_srl) ?>" target="_blank"><?php echo htmlspecialchars($__Context->val->title, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?></a></td>
			<td><a href="#popup_menu_area" class="member_<?php echo $__Context->val->target_member_srl ?>"><?php echo $__Context->val->nick_name ?></a></td>
			<td><?php echo zdate($__Context->val->regdate, "Y-m-d") ?></td>
			<td><button type="button" class="text" onclick="doDeleteScrap(<?php echo $__Context->val->document_srl ?>);"><?php echo $lang->cmd_delete ?></button></td>
			<td>
				<select class="scrap_folder_move" data-document-srl="<?php echo $__Context->val->document_srl ?>">
					<option value=""><?php echo $lang->cmd_move ?></option>
					<?php if($__Context->scrap_folders)foreach($__Context->scrap_folders as $__Context->folder){ ?>
						<option value="<?php echo $__Context->folder->folder_srl ?>"><?php echo $__Context->folder->name == '/DEFAULT/' ? $lang->default_folder : $__Context->folder->name ?></option>
					<?php } ?>
				</select>
			</td>
		</tr><?php } ?>
	</tbody>
</table>
<div class="pagination">
	<form action="<?php echo Context::getRequestUri() ?>" method="get"  style="float:left">
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<select name="search_target" title="<?php echo $lang->search_target ?>">
			<option value="title"<?php if($__Context->search_target == 'title'){ ?> selected="selected"<?php } ?>><?php echo $lang->title ?></option>
			<option value="title_content"<?php if($__Context->search_target == 'title_content'){ ?> selected="selected"<?php } ?>><?php echo $lang->title_content ?></option>
			<option value="content"<?php if($__Context->search_target == 'content'){ ?> selected="selected"<?php } ?>><?php echo $lang->content ?></option>
		</select>
		<input type="text" name="search_keyword" value="<?php echo escape($__Context->search_keyword, false) ?>">
		<button type="submit" class="btn"><?php echo $lang->cmd_search ?></button>
	</form>
	<ul style="float:right;margin:0;padding:0">
		<li><a href="<?php echo getUrl('page','','module_srl','') ?>">&laquo; <?php echo $lang->first_page ?></a></li>
		<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
		<li<?php if($__Context->page == $__Context->page_no){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a></li>
		<?php } ?>
		<li><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>"><?php echo $lang->last_page ?> &raquo;</a></li>
	</ul>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_footer.html') ?>
