<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/point/tpl','header.html') ?>
<!--#Meta:modules/point/tpl/js/point_admin.js--><?php Context::loadFile(['modules/point/tpl/js/point_admin.js', '', '', '']); ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/point/tpl/member_list/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<p><?php echo $lang->about_point_module ?> <?php echo $lang->point_update_desc ?></p>
<!-- SEARCH -->
<table class="x_table x_table-striped x_table-hover">
	<caption>
		<strong>Total: <?php echo number_format($__Context->total_count) ?>, Page: <?php echo number_format($__Context->page) ?>/<?php echo number_format($__Context->total_page) ?></strong>
		<form action="./" method="get"   class="x_pull-right"style="margin:0;height:26px"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
			<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
			<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
			<fieldset>
				<select name="is_admin" style="width:auto;margin:0">
					<option value=""<?php if($__Context->is_admin!='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->total ?></option>
					<option value="Y"<?php if($__Context->is_admin=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->is_admin ?></option>
				</select>
				<select name="selected_group_srl" style="width:auto;margin:0" title="<?php echo $lang->member_group ?>">
					<option value="0"><?php echo $lang->member_group ?></option>
					<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->group_srl ?>"<?php if($__Context->selected_group_srl==$__Context->val->group_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
				<select name="search_target" style="width:auto;margin:0" title="<?php echo $lang->search_target ?>">
					<option value="<?php echo $__Context->identifier ?>"<?php if($__Context->search_target == $__Context->identifier){ ?> selected="selected"<?php } ?>><?php echo lang($__Context->identifier) ?></option>
					<?php $__loop_tmp=lang('point.search_target_list');if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
				</select>
				<span class="x_input-append">
					<input type="search" required name="search_keyword" required value="<?php echo escape($__Context->search_keyword, false) ?>" title="<?php echo $lang->cmd_search ?>" style="width:100px" />
					<button type="submit" class="x_btn x_btn-inverse"><?php echo $lang->cmd_search ?></button>
					<a href="<?php echo getUrl('','module',$__Context->module,'act',$__Context->act) ?>" class="x_btn"><?php echo $lang->cmd_cancel ?></a>
				</span>
			</fieldset>
		</form>
	</caption>
	<thead>
		<tr>
			<th scope="col"><?php echo $lang->no ?></th>
			<th scope="col"><?php echo lang($__Context->identifier) ?></th>
			<th scope="col"><?php echo $lang->nick_name ?></th>
			<th scope="col"><?php echo $lang->point ?></th>
			<th scope="col"><?php echo $lang->level ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->member_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->val){ ?><tr>
			<td><?php echo $__Context->no ?></td>
			<?php if($__Context->identifier == 'user_id'){ ?><td><?php echo $__Context->val->user_id ?></td><?php } ?>
			<?php if($__Context->identifier != 'user_id'){ ?><td><?php echo $__Context->val->email_address ?></td><?php } ?>
			<td><a href="#popup_menu_area" class="member_<?php echo $__Context->val->member_srl ?>"><?php echo $__Context->val->nick_name ?></a></td>
			<td>
				<form action="./" method="get" style="margin:0"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
					<input type="hidden" name="module" value="point" />
					<input type="hidden" name="member_srl" value="<?php echo $__Context->val->member_srl ?>" />
					<input type="hidden" name="xe_validator_id" value="modules/point/tpl/member_list/1" />
					<input type="text" name="orgpoint" value="<?php echo $__Context->val->point ?>" disabled="disabled" style="width:40px;text-align:right" />
					-&gt;
					<span class="x_input-append">
						<input type="text" id="point_<?php echo $__Context->val->member_srl ?>" value="<?php echo $__Context->val->point ?>" name="point" required style="width:60px;text-align:right" />
						<input type="button" value="<?php echo $lang->cmd_update ?>" onclick="updatePoint(<?php echo $__Context->val->member_srl ?>)" class="x_btn" />
					</span>
				</form>
			</td>
			<td><?php echo $__Context->val->level ?></td>
		</tr><?php } ?>
	</tbody>
</table>
<div class="x_clearfix">
	<!-- PAGINATION -->
	<?php if($__Context->page_navigation){ ?><form action="./" class="x_pagination x_pull-left"  style="margin:0"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
		<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<?php if($__Context->is_admin){ ?><input type="hidden" name="is_admin" value="<?php echo $__Context->is_admin ?>" /><?php } ?>
		<?php if($__Context->is_denied){ ?><input type="hidden" name="is_denied" value="<?php echo $__Context->is_denied ?>" /><?php } ?>
		<?php if($__Context->selected_group_srl){ ?><input type="hidden" name="selected_group_srl" value="<?php echo $__Context->selected_group_srl ?>" /><?php } ?>
		<?php if($__Context->search_target){ ?><input type="hidden" name="search_target" value="<?php echo $__Context->search_target ?>" /><?php } ?>
		<?php if($__Context->search_keyword){ ?><input type="hidden" name="search_keyword" value="<?php echo $__Context->search_keyword ?>" /><?php } ?>
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
	<!-- SEARCH -->
	<form action="./" method="get"  class="x_clearfix x_pull-right" style="margin:0"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
		<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<fieldset>
			<select name="is_admin" style="width:auto;margin:0">
				<option value=""<?php if($__Context->is_admin!='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->total ?></option>
				<option value="Y"<?php if($__Context->is_admin=='Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->is_admin ?></option>
			</select>
			<select name="selected_group_srl" style="width:auto;margin:0" title="<?php echo $lang->member_group ?>">
				<option value="0"><?php echo $lang->member_group ?></option>
				<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->group_srl ?>"<?php if($__Context->selected_group_srl==$__Context->val->group_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
			<select name="search_target" style="width:auto;margin:0" title="<?php echo $lang->search_target ?>">
				<option value="<?php echo $__Context->identifier ?>"<?php if($__Context->search_target == $__Context->identifier){ ?> selected="selected"<?php } ?>><?php echo lang($__Context->identifier) ?></option>
				<?php $__loop_tmp=lang('point.search_target_list');if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
			</select>
			<span class="x_input-append">
				<input type="search" name="search_keyword" required value="<?php echo escape($__Context->search_keyword, false) ?>" title="<?php echo $lang->cmd_search ?>" style="width:100px" />
				<button type="submit" class="x_btn x_btn-inverse"><?php echo $lang->cmd_search ?></button>
				<a href="<?php echo getUrl('','module',$__Context->module,'act',$__Context->act) ?>" class="x_btn"><?php echo $lang->cmd_cancel ?></a>
			</span>
		</fieldset>
	</form>
</div>
<?php Context::addJsFile("modules/point/ruleset/updatePoint.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="updateForm" action="./" method="POST" style="margin:0"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="updatePoint" />
	<input type="hidden" name="module" value="point" />
	<input type="hidden" name="act" value="procPointAdminUpdatePoint" />
	<input type="hidden" id="update_member_srl" name="member_srl" value="" />
	<input type="hidden" id="update_point" name="point" />
	<input type="hidden" name="success_return_url" value="<?php echo Context::getRequestUrl() ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/point/tpl/member_list/1" />
</form>
