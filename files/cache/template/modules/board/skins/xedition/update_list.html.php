<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_header.html') ?>
<div class="board_list" id="board_list">
	<table width="100%" border="1" cellspacing="0" summary="List of Articles">
		<thead>
			<tr>
				<th scope="col" class="title"><span><?php echo $lang->title ?></span></th>
				<th scope="col"><span><?php echo $lang->writer ?></span></th>
				<th scope="col"><span><?php echo $lang->last_updater ?></span></th>
				<th scope="col"><span><?php echo $lang->last_post ?></span></th>
			</tr>
		</thead>
		<?php if($__Context->updatelog->data){ ?><tbody>
			<?php $__loop_tmp=$__Context->updatelog->data;if($__loop_tmp)foreach($__loop_tmp as $__Context->val){ ?><tr>
				<td class="title">
					<a href="<?php echo getUrl('', 'mid', $__Context->mid, 'act', 'dispBoardUpdateLogView', 'update_id', $__Context->val->update_id) ?>"><?php echo $__Context->val->title ?></a>
				</td>
				<td class="author">
					<?php echo $__Context->val->nick_name ?>
				</td>
				<td class="author">
					<?php echo $__Context->val->update_nick_name ?>
				</td>
				<td class="time">
					<?php echo zdate($__Context->val->regdate, 'Y.m.d H:i:s') ?>
				</td>
			</tr><?php } ?>
		</tbody><?php } ?>
		<?php if(!$__Context->updatelog->data){ ?><tbody>
			<tr>
				<td colspan="4" style="text-align: center"><?php echo $lang->msg_dont_have_update_log ?></td>
			</tr>
		</tbody><?php } ?>
	</table>
</div>
<div class="pagination pagination-centered">
	<a href="<?php echo getUrl('page','','module_srl','') ?>" class="direction">&laquo; <?php echo $lang->first_page ?></a>
	<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
	<?php if($__Context->page==$__Context->page_no){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?>
	<?php if($__Context->page!=$__Context->page_no){ ?><a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a><?php } ?>
	<?php } ?>
	<a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="direction"><?php echo $lang->last_page ?> &raquo;</a>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_footer.html') ?>
