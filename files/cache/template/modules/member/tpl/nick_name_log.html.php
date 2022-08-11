<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<table class="x_table x_table-striped x_table-hover">
	<thead>
		<tr>
			<th><?php echo $lang->date ?></th>
			<th><?php echo $lang->nick_name_before_changing ?></th>
			<th class="title"><?php echo $lang->nick_name_after_changing ?></th>
		</tr>
	</thead>
	<?php if($__Context->nickname_list){ ?><tbody>
		<?php $__loop_tmp=$__Context->nickname_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->val){ ?><tr>
			<td>
				<?php echo zdate($__Context->val->regdate,"Y-m-d H:i:s") ?>
			</td>
			<td>
				<?php echo $__Context->val->before_nick_name ?>
			</td>
			<td>
				<?php echo $__Context->val->after_nick_name ?>
			</td>
		</tr><?php } ?>
	</tbody><?php } ?>
	<?php if(!$__Context->nickname_list){ ?><tbody>
		<tr>
			<td colspan="3" style="text-align: center"><?php echo $lang->no_data ?></td>
		</tr>
	</tbody><?php } ?>
</table>
<form action="./" method="get" class="search center x_input-append" ><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<select name="search_target" style="margin-right:4px" title="<?php echo $lang->search_target ?>">
		<option value="before"<?php if($__Context->search_target=='before'){ ?> selected="selected"<?php } ?>><?php echo $lang->nick_name_before_changing ?></option>
		<option value="after"<?php if($__Context->search_target=='after'){ ?> selected="selected"<?php } ?>><?php echo $lang->nick_name_after_changing ?></option>
		<option value="user_id"<?php if($__Context->search_target=='user_id'){ ?> selected="selected"<?php } ?>><?php echo $lang->user_id ?></option>
		<option value="member_srl"<?php if($__Context->search_target=='member_srl'){ ?> selected="selected"<?php } ?>><?php echo $lang->member_number ?></option>
	</select>
	<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" style="width:140px">
	<button class="x_btn x_btn-inverse" type="submit"><?php echo $lang->cmd_search ?></button>
</form>
<div class="x_clearfix">
	<div class="x_pagination x_pull-left">
		<ul>
			<li<?php if(!$__Context->page || $__Context->page == 1){ ?> class="x_disabled"<?php } ?>>
				<a href="<?php echo getUrl('page','','module_srl','') ?>" class="direction">&laquo; <?php echo $lang->first_page ?></a>
			</li>
			<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
			<?php $__Context->last_page = $__Context->page_no ?>
			<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>>
				<a href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a>
			</li>
			<?php } ?>
			<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>>
				<a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="direction"><?php echo $lang->last_page ?> &raquo;</a>
			</li>
		</ul>
	</div>
</div>
