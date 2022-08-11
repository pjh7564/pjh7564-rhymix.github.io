<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_header.html') ?>
<?php if($__Context->oDocument->isExists()){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_read.html');
} ?>
<?php if($__Context->module_info->use_category=='Y' && isset($__Context->list_config)){ ?><ul class="cTab">
	<li<?php if(!isset($__Context->category) || !$__Context->category){ ?> class="on"<?php } ?>><a href="<?php echo getUrl('category','','page','') ?>"><?php echo $lang->total ?></a></li>
	<?php $__loop_tmp=$__Context->cate_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><li<?php if(isset($__Context->category) && $__Context->category == $__Context->val->category_srl){ ?> class="on"<?php } ?>><a href="<?php echo getUrl('category',$__Context->val->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->val->title ?><!--<?php if($__Context->val->document_count){ ?><em>[<?php echo $__Context->val->document_count ?>]</em><?php } ?>--></a>
		<?php if(count($__Context->val->children)){ ?><ul>
			<?php $__loop_tmp=$__Context->val->children;if($__loop_tmp)foreach($__loop_tmp as $__Context->idx=>$__Context->item){ ?><li<?php if(isset($__Context->category) && $__Context->category == $__Context->item->category_srl){ ?> class="on_"<?php } ?>><a href="<?php echo getUrl('category',$__Context->item->category_srl,'document_srl','', 'page', '') ?>"><?php echo $__Context->item->title ?><!--<?php if($__Context->val->document_count){ ?><em>[<?php echo $__Context->item->document_count ?>]</em><?php } ?>--></a></li><?php } ?>
		</ul><?php } ?>
	</li><?php } ?>
</ul><?php } ?>
<?php if(isset($__Context->list_config)){ ?><div class="board_list" id="board_list">
	<table width="100%" border="1" cellspacing="0" summary="List of Articles">
		<thead>
			<!-- LIST HEADER -->
			<tr>
				<?php $__loop_tmp=$__Context->list_config;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?>
				<?php if($__Context->val->type=='no' && $__Context->val->idx==-1){ ?><th scope="col"><span><?php echo $lang->no ?></span></th><?php } ?>
				<?php if($__Context->val->type=='module_title' && $__Context->val->idx==-1){ ?><th scope="col"><span><?php echo $lang->module_title ?></span></th><?php } ?>
				<?php if($__Context->val->type=='title' && $__Context->val->idx==-1){ ?><th scope="col" class="title"><span><?php echo $lang->title ?></span></th><?php } ?>
				<?php if($__Context->val->type=='nick_name' && $__Context->val->idx==-1){ ?><th scope="col"><span><?php echo $lang->writer ?></span></th><?php } ?>
				<?php if($__Context->val->type=='user_id' && $__Context->val->idx==-1){ ?><th scope="col"><span><?php echo $lang->user_id ?></span></th><?php } ?>
				<?php if($__Context->val->type=='user_name' && $__Context->val->idx==-1){ ?><th scope="col"><span><?php echo $lang->user_name ?></span></th><?php } ?>
				<?php if($__Context->val->type=='regdate' && $__Context->val->idx==-1){ ?><th scope="col"><span><a href="<?php echo getUrl('sort_index','regdate','order_type',$__Context->order_type) ?>"><?php echo $lang->date ?></a></span></th><?php } ?>
				<?php if($__Context->val->type=='last_update' && $__Context->val->idx==-1){ ?><th scope="col"><span><a href="<?php echo getUrl('sort_index','update_order','order_type',$__Context->order_type) ?>"><?php echo $lang->last_update ?></a></span></th><?php } ?>
				<?php if($__Context->val->type=='last_post' && $__Context->val->idx==-1){ ?><th scope="col"><span><a href="<?php echo getUrl('sort_index','update_order','order_type',$__Context->order_type) ?>"><?php echo $lang->last_post ?></a></span></th><?php } ?>
				<?php if($__Context->val->type=='readed_count' && $__Context->val->idx==-1){ ?><th scope="col"><span><a href="<?php echo getUrl('sort_index','readed_count','order_type',$__Context->order_type) ?>"><?php echo $lang->readed_count ?></a></span></th><?php } ?>
				<?php if($__Context->val->type=='voted_count' && $__Context->val->idx==-1){ ?><th scope="col"><span><a href="<?php echo getUrl('sort_index','voted_count','order_type',$__Context->order_type) ?>"><?php echo $lang->voted_count ?></a></span></th><?php } ?>
				<?php if($__Context->val->type=='blamed_count' && $__Context->val->idx==-1){ ?><th scope="col"><span><a href="<?php echo getUrl('sort_index','blamed_count','order_type',$__Context->order_type) ?>"><?php echo $lang->blamed_count ?></a></span></th><?php } ?>
				<?php if($__Context->val->idx!=-1){ ?><th scope="col"><span><a href="<?php echo getUrl('sort_index', $__Context->val->eid, 'order_type', $__Context->order_type) ?>"><?php echo $__Context->val->name ?></a></span></th><?php } ?>
				<?php } ?>
				<?php if($__Context->grant->manager){ ?><th scope="col" style="width:44px"><span><input type="checkbox" onclick="XE.checkboxToggleAll({ doClick:true });" class="iCheck" title="Check All" /></span></th><?php } ?>
			</tr>
			<!-- /LIST HEADER -->
		</thead>
		<?php if(!$__Context->document_list && !$__Context->notice_list){ ?><tbody>
			<tr class="no_article">
				<td<?php if(!$__Context->grant->manager){ ?> colspan="<?php echo count($__Context->list_config) ?>"<?php };
if($__Context->grant->manager){ ?> colspan="<?php echo count($__Context->list_config)+1 ?>"<?php } ?>>
					<p style="text-align:center"><?php echo $lang->no_documents ?></p>
				</td>
			</tr>
		</tbody><?php } ?>
		<?php if($__Context->document_list || $__Context->notice_list){ ?><tbody>
			<!-- NOTICE -->
			<?php $__loop_tmp=$__Context->notice_list ?? [];if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->document){ ?><tr class="notice">
				<?php $__loop_tmp=$__Context->list_config;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?>
				<?php if($__Context->val->type=='no' && $__Context->val->idx==-1){ ?><td class="notice">
					<?php if(isset($__Context->document_srl) && $__Context->document_srl == $__Context->document->document_srl){ ?>&raquo;<?php } ?>
					<?php if(!isset($__Context->document_srl) || $__Context->document_srl != $__Context->document->document_srl){;
echo $lang->notice;
} ?>
				</td><?php } ?>
				<?php if($__Context->val->type=='module_title' && $__Context->val->idx==-1){ ?><td class="module_title">
					<a href="<?php echo getUrl('', 'mid', $__Context->document->get('mid')) ?>"><?php echo $__Context->document->get('module_title') ?></a>
				</td><?php } ?>
				<?php if($__Context->val->type=='title' && $__Context->val->idx==-1){ ?><td class="title">
					<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle ?? '', 'cpage','') ?>">
						<?php echo $__Context->document->getTitle() ?>
					</a>
					<?php if($__Context->document->getCommentCount()){ ?><a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#comment" class="replyNum" title="Replies">
						[<?php echo $__Context->document->getCommentCount() ?>]
					</a><?php } ?>
					<?php if($__Context->document->getTrackbackCount()){ ?><a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#trackback" class="trackbackNum" title="Trackbacks">
						[<?php echo $__Context->document->getTrackbackCount() ?>]
					</a><?php } ?>
				</td><?php } ?>
				<?php if($__Context->val->type=='nick_name' && $__Context->val->idx==-1){ ?><td class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getNickName() ?></a></td><?php } ?>
				<?php if($__Context->val->type=='user_id' && $__Context->val->idx==-1){ ?><td class="author"><?php echo $__Context->document->getUserID() ?></td><?php } ?>
				<?php if($__Context->val->type=='user_name' && $__Context->val->idx==-1){ ?><td class="author"><?php echo $__Context->document->getUserName() ?></td><?php } ?>
				<?php if($__Context->val->type=='regdate' && $__Context->val->idx==-1){ ?><td class="time"><?php echo $__Context->document->getRegdate('Y.m.d') ?></td><?php } ?>
				<?php if($__Context->val->type=='last_update' && $__Context->val->idx==-1){ ?><td class="time"><?php echo zdate($__Context->document->get('last_update'),'Y.m.d') ?></td><?php } ?>
				<?php if($__Context->val->type=='last_post' && $__Context->val->idx==-1){ ?><td class="lastReply">
					<?php if((int)($__Context->document->get('comment_count'))>0){ ?>
						<a href="<?php echo $__Context->document->getUrl() ?>#comment" title="Last Reply">
							<?php echo zdate($__Context->document->get('last_update'),'Y.m.d') ?>
						</a>
						<?php if($__Context->document->getLastUpdater()){ ?><span>
							<sub>by</sub>
							<?php echo $__Context->document->getLastUpdater() ?>
						</span><?php } ?>
					<?php } ?>
					<?php if((int)($__Context->document->get('comment_count'))==0){ ?>&nbsp;<?php } ?>
				</td><?php } ?>
				<?php if($__Context->val->type=='readed_count' && $__Context->val->idx==-1){ ?><td class="readNum"><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></td><?php } ?>
				<?php if($__Context->val->type=='voted_count' && $__Context->val->idx==-1){ ?><td class="voteNum"><?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'0' ?></td><?php } ?>
				<?php if($__Context->val->type=='blamed_count' && $__Context->val->idx==-1){ ?><td class="voteNum"><?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'0' ?></td><?php } ?>
				<?php if($__Context->val->idx!=-1){ ?><td><?php echo $__Context->document->getExtraValueHTML($__Context->val->idx) ?>&nbsp;</td><?php } ?>
				<?php } ?>
				<?php if($__Context->grant->manager){ ?><td class="check"><input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" class="iCheck" title="Check This Article" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> /></td><?php } ?>
			</tr><?php } ?>
			<!-- /NOTICE -->
			<!-- LIST -->
			<?php $__loop_tmp=$__Context->document_list ?? [];if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->document){ ?><tr>
				<?php $__loop_tmp=$__Context->list_config;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?>
				<?php if($__Context->val->type=='no' && $__Context->val->idx==-1){ ?><td class="no">
					<?php if(isset($__Context->document_srl) && $__Context->document_srl == $__Context->document->document_srl){ ?>&raquo;<?php } ?>
					<?php if(!isset($__Context->document_srl) || $__Context->document_srl != $__Context->document->document_srl){;
echo $__Context->no;
} ?>
				</td><?php } ?>
				<?php if($__Context->val->type=='module_title' && $__Context->val->idx==-1){ ?><td class="module_title">
					<a href="<?php echo getUrl('', 'mid', $__Context->document->get('mid')) ?>"><?php echo $__Context->document->get('module_title') ?></a>
				</td><?php } ?>
				<?php if($__Context->val->type=='title' && $__Context->val->idx==-1){ ?><td class="title">
					<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle ?? '', 'cpage','') ?>"><?php echo $__Context->document->getTitle() ?></a>
					<?php if($__Context->document->getCommentCount()){ ?><a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#comment" class="replyNum" title="Replies">[<?php echo $__Context->document->getCommentCount() ?>]</a><?php } ?>
					<?php if($__Context->document->getTrackbackCount()){ ?><a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#trackback" class="trackbackNum" title="Trackbacks">[<?php echo $__Context->document->getTrackbackCount() ?>]</a><?php } ?>
					<?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new) ?>
				</td><?php } ?>
				<?php if($__Context->val->type=='nick_name' && $__Context->val->idx==-1){ ?><td class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getNickName() ?></a></td><?php } ?>
				<?php if($__Context->val->type=='user_id' && $__Context->val->idx==-1){ ?><td class="author"><?php echo $__Context->document->getUserID() ?></td><?php } ?>
				<?php if($__Context->val->type=='user_name' && $__Context->val->idx==-1){ ?><td class="author"><?php echo $__Context->document->getUserName() ?></td><?php } ?>
				<?php if($__Context->val->type=='regdate' && $__Context->val->idx==-1){ ?><td class="time"><?php echo $__Context->document->getRegdate('Y.m.d') ?></td><?php } ?>
				<?php if($__Context->val->type=='last_update' && $__Context->val->idx==-1){ ?><td class="time"><?php echo zdate($__Context->document->get('last_update'),'Y.m.d') ?></td><?php } ?>
				<?php if($__Context->val->type=='last_post' && $__Context->val->idx==-1){ ?><td class="lastReply">
					<?php if((int)($__Context->document->get('comment_count'))>0){ ?>
						<a href="<?php echo $__Context->document->getUrl() ?>#comment" title="Last Reply">
							<?php echo zdate($__Context->document->get('last_update'),'Y.m.d') ?>
						</a>
						<?php if($__Context->document->getLastUpdater()){ ?><span>
							<sub>by</sub>
							<?php echo $__Context->document->getLastUpdater() ?>
						</span><?php } ?>
					<?php } ?>
					<?php if((int)($__Context->document->get('comment_count'))==0){ ?>&nbsp;<?php } ?>
				</td><?php } ?>
				<?php if($__Context->val->type=='readed_count' && $__Context->val->idx==-1){ ?><td class="readNum"><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></td><?php } ?>
				<?php if($__Context->val->type=='voted_count' && $__Context->val->idx==-1){ ?><td class="voteNum"><?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'0' ?></td><?php } ?>
				<?php if($__Context->val->type=='blamed_count' && $__Context->val->idx==-1){ ?><td class="voteNum"><?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'0' ?></td><?php } ?>
				<?php if($__Context->val->idx!=-1){ ?><td><?php echo $__Context->document->getExtraValueHTML($__Context->val->idx) ?>&nbsp;</td><?php } ?>
				<?php } ?>
				<?php if($__Context->grant->manager){ ?><td class="check"><input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" class="iCheck" title="Check This Article" onclick="doAddDocumentCart(this)"<?php if($__Context->document->isCarted()){ ?> checked="checked"<?php } ?> /></td><?php } ?>
			</tr><?php } ?>
			<!-- /LIST -->
		</tbody><?php } ?>
	</table>
</div><?php } ?>
<div class="list_footer">
	<div class="btnArea">
		<a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>" class="btn"><i class="xi-pen"></i> <?php echo $lang->cmd_write ?></a>
		<a href="<?php echo getUrl('act','dispBoardTagList') ?>" class="btn" title="<?php echo $lang->tag ?>"><i class="xi-tag"></i> <?php echo $lang->tag ?></a>
		<?php if($__Context->grant->manager){ ?><a class="btn" href="<?php echo getUrl('act','dispBoardAdminBoardInfo') ?>" title="<?php echo $lang->cmd_setup ?>"><i class="xi-cog"></i> <?php echo $lang->cmd_setup ?></a><?php } ?>			
		<?php if($__Context->grant->manager){ ?><a href="<?php echo getUrl('','mid',$__Context->mid,'act','dispDocumentManageDocument') ?>" class="btn" onclick="popopen(this.href,'manageDocument'); return false;"><?php echo $lang->cmd_manage_document ?></a><?php } ?>
	</div>
	<?php if($__Context->grant->view){ ?><form action="<?php echo getUrl() ?>" method="get" onsubmit="return procFilter(this, search)" id="board_search" class="board_search" ><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="category" value="<?php echo $__Context->category ?? '' ?>" />
		<select name="search_target">
			<?php $__loop_tmp=$__Context->search_option;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if(isset($__Context->search_target) && $__Context->search_target == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
		</select>
		<div class="search_input">
			<i class="xi-magnifier"></i>
			<input type="text" name="search_keyword" value="<?php echo escape($__Context->search_keyword ?? '', false) ?>" title="<?php echo $lang->cmd_search ?>" class="iText" />
		</div>
		<button type="submit" class="btn" onclick="xGetElementById('board_search').submit();return false;"><?php echo $lang->cmd_search ?></button>
        <?php if(isset($__Context->last_division) && $__Context->last_division){ ?><a href="<?php echo getUrl('page',1,'document_srl','','division',$__Context->last_division,'last_division','') ?>" class="btn"><?php echo $lang->cmd_search_next ?></a><?php } ?>
	</form><?php } ?>
	<?php if($__Context->document_list || $__Context->notice_list){ ?><div class="pagination">
		<a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division ?? '','last_division',$__Context->last_division ?? '') ?>" class="direction prev"><i class="xi-angle-left"></i>&nbsp;<?php echo $lang->first_page ?></a> 
		<?php while($__Context->page_no=$__Context->page_navigation->getNextPage()){ ?>
			<?php if($__Context->page==$__Context->page_no){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?> 
			<?php if($__Context->page!=$__Context->page_no){ ?><a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division ?? '','last_division',$__Context->last_division ?? '') ?>"><?php echo $__Context->page_no ?></a><?php } ?>
		<?php } ?>
		<a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division ?? '','last_division',$__Context->last_division ?? '') ?>" class="direction next"><?php echo $lang->last_page ?>&nbsp;<i class="xi-angle-right"></i></a>
	</div><?php } ?>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_footer.html') ?>
