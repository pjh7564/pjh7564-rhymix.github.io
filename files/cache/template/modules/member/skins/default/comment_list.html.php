<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_header.html') ?>
<h1><?php echo $__Context->member_title = $lang->cmd_view_own_comment  ?></h1>
<table class="table table-striped table-hover">
	<caption>
		Total: <?php echo number_format($__Context->total_count) ?>, Page <?php echo number_format($__Context->page) ?>/<?php echo number_format($__Context->total_page) ?>
	</caption>
	<thead>
		<tr>
			<th><?php echo $lang->no ?></th>
			<th class="title"><?php echo $lang->content ?></th>
			<th><?php echo $lang->date ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->comment_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->comment){ ?><tr>
			<td><?php echo $__Context->no ?></td>
			<td>
				<a href="<?php echo getUrl('','document_srl',$__Context->comment->document_srl) ?>#comment_<?php echo $__Context->comment->comment_srl ?>" target="_blank"><?php echo $__Context->comment->getSummary() ?: $lang->msg_no_text_comment ?></a>
			</td>
			<td><?php echo $__Context->comment->getRegdate("Y-m-d") ?></td>
		</tr><?php } ?>
	</tbody>
</table>
<div class="pagination">
	<form action="<?php echo Context::getRequestUri() ?>" method="get"  style="float:left">
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<input type="text" name="search_keyword" value="<?php echo escape($__Context->search_keyword ?? '', false) ?>">
		<button type="submit" class="btn"><?php echo $lang->cmd_search ?></button>
	</form>
	<ul style="float:right;margin:0;padding:0">
		<li><a href="<?php echo getUrl('page','','module_srl','') ?>" class="direction">&laquo; <?php echo $lang->first_page ?></a></li> 
		<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
		<li<?php if($__Context->page == $__Context->page_no){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a></li>
		<?php } ?>
		<li><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="direction"><?php echo $lang->last_page ?> &raquo;</a></li>
	</ul>
	<div style="clear:both"></div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_footer.html') ?>
