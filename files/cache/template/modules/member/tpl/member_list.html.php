<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/member/tpl/css/member.css--><?php Context::loadFile(['modules/member/tpl/css/member.css', '', '', '', []]); ?>
<!--#Meta:modules/member/tpl/js/member_admin_list.js--><?php Context::loadFile(['modules/member/tpl/js/member_admin_list.js', 'body', '', '']); ?>
<script>
	xe.lang.msg_select_user = '<?php echo $lang->msg_select_user ?>';
	xe.lang.msg_delete_user = '<?php echo $lang->msg_delete_user ?>';
</script>
<div class="x_page-header">
	<h1><?php echo $lang->user_list ?></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/tpl/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<form action="" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<table id="memberList" class="x_table x_table-striped x_table-hover dsTg">
		<caption>
			<a href="<?php echo getUrl('filter_type', '', 'page', '') ?>"<?php if(!$__Context->filter_type){ ?> class="active"<?php } ?>><?php echo $lang->cmd_show_all_member;
if(!$__Context->filter_type){ ?>(<?php echo $__Context->total_count ?>)<?php } ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('filter_type', 'super_admin', 'page', '') ?>"<?php if($__Context->filter_type=='super_admin'){ ?> class="active"<?php } ?>><?php echo $lang->cmd_show_super_admin_member;
if($__Context->filter_type=='super_admin'){ ?>(<?php echo $__Context->total_count ?>)<?php } ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('filter_type', 'enable', 'page', '') ?>"<?php if($__Context->filter_type=='enable'){ ?> class="active"<?php } ?>><?php echo $lang->approval;
if($__Context->filter_type=='enable'){ ?>(<?php echo $__Context->total_count ?>)<?php } ?></a>
			<i>|</i>
			<a href="<?php echo getUrl('filter_type', 'disable', 'page', '') ?>"<?php if($__Context->filter_type=='disable'){ ?> class="active"<?php } ?>><?php echo $lang->denied;
if($__Context->filter_type=='disable'){ ?>(<?php echo $__Context->total_count ?>)<?php } ?></a>
			<div class="x_pull-right x_btn-group">
				<a class="x_btn x_btn-inverse" href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminInsert') ?>"><?php echo $lang->msg_new_member ?></a>
				<a href="#listManager" data-value="modify" class="modalAnchor _member x_btn"><?php echo $lang->modify ?></a>
				<a href="#listManager" data-value="delete" class="modalAnchor _member x_btn"><?php echo $lang->delete ?></a>
			</div>
			<div class="x_pull-right x_btn-group margin_after">
				<button type="button" class="x_btn x_active __simple"><?php echo $lang->simple_view ?></button>
				<button type="button" class="x_btn __detail"><?php echo $lang->detail_view ?></button>
			</div>
		</caption>
		<thead>
			<tr>
				<?php if($__Context->profileImageConfig == 'Y' && $__Context->config->member_profile_view == 'Y'){ ?><th scope="col" class="nowr rx_detail_marks"><?php echo $lang->profile_image ?></th><?php } ?>
				<?php if($__Context->usedIdentifiers)foreach($__Context->usedIdentifiers as $__Context->name => $__Context->title){ ?>
					<th scope="col" class="nowr">
						<a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList', 'sort_index', $__Context->name, 'sort_order', ($__Context->sort_order == 'asc') ? 'desc' : 'asc', 'selected_group_srl', $__Context->selected_group_srl) ?>"><?php echo $__Context->title;
if($__Context->sort_index == $__Context->name){ ?> <?php if($__Context->sort_order=='asc'){ ?><em>▲</em><?php };
if($__Context->sort_order != 'asc'){ ?><em>▼</em><?php };
} ?></a>
					</th>
				<?php } ?>
				<th scope="col" class="nowr"><?php echo $lang->status ?></th>
				<th scope="col" class="nowr rx_detail_marks"><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList', 'sort_index', 'regdate', 'sort_order', ($__Context->sort_order == 'asc') ? 'desc' : 'asc', 'selected_group_srl', $__Context->selected_group_srl) ?>"><?php echo $lang->signup_date;
if($__Context->sort_index == 'regdate'){ ?> <?php if($__Context->sort_order=='asc'){ ?><em>▲</em><?php };
if($__Context->sort_order != 'asc'){ ?><em>▼</em><?php };
} ?></a></th>
				<th scope="col" class="nowr rx_detail_marks"><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList', 'sort_index', 'last_login', 'sort_order',  ($__Context->sort_order == 'asc') ? 'desc' : 'asc', 'selected_group_srl', $__Context->selected_group_srl) ?>"><?php echo $lang->last_login;
if($__Context->sort_index == 'last_login'){ ?> <?php if($__Context->sort_order=='asc'){ ?><em>▲</em><?php };
if($__Context->sort_order != 'asc'){ ?><em>▼</em><?php };
} ?></a></th>
				<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->member_group ?></th>
				<th scope="col" class="nowr"><?php echo $lang->inquiry ?>/<?php echo $lang->cmd_modify ?></th>
				<th scope="col">
					<input type="checkbox" title="Check All" data-name="user" />
				</th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->member_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->member_info){ ?><tr>
				<?php $__Context->member_info = get_object_vars($__Context->member_info) ?>
				<?php if($__Context->profileImageConfig == 'Y' && $__Context->config->member_profile_view == 'Y'){ ?><td class="nowr rx_detail_marks">
					<?php if($__Context->member_info['profile_image']){ ?>
					<img src="<?php echo $__Context->member_info['profile_image']->src ?>" class="profile_img" />
					<?php }else{ ?>
					<i class="no_profile">?</i>
					<?php } ?>
				</td><?php } ?>
				<?php  $__Context->member_info['group_list'] = implode(', ', $__Context->member_info['group_list']) ?>
				<?php $__loop_tmp=$__Context->usedIdentifiers;if($__loop_tmp)foreach($__loop_tmp as $__Context->name=>$__Context->title){ ?><td class="nowr">
					<?php if($__Context->name === 'email_address'){ ?>
						<a href="#popup_menu_area" class="member_<?php echo $__Context->member_info['member_srl'] ?>"><?php echo getEncodeEmailAddress($__Context->member_info['email_address']) ?></a>
					<?php }elseif($__Context->name === 'phone_number' && $__Context->member_info['phone_number']){ ?>
						<?php if($__Context->config->phone_number_hide_country !== 'Y'){ ?>
							<?php echo \Rhymix\Framework\i18n::formatPhoneNumber($__Context->member_info['phone_number'], $__Context->member_info['phone_country']) ?>
						<?php }elseif($__Context->config->phone_number_default_country === 'KOR' && ($__Context->member_info['phone_country'] === 'KOR' || $__Context->member_info['phone_country'] == '82')){ ?>
							<?php echo \Rhymix\Framework\Korea::formatPhoneNumber($__Context->member_info['phone_number']) ?>
						<?php }else{ ?>
							<?php echo $__Context->member_info['phone_number'] ?>
						<?php } ?>
					<?php }else{ ?>
						<?php echo $__Context->member_info[$__Context->name] ?>
					<?php } ?>
				</td><?php } ?>
				<td class="nowr">
					<?php if($__Context->member_info['denied']=='Y'){ ?>
						<?php if(isset($__Context->new_member_check_list[$__Context->member_info['member_srl']]) && $__Context->new_member_check_list[$__Context->member_info['member_srl']]){ ?>
							<span style="color:red;"><?php echo $lang->member_unauthenticated ?></span>
						<?php }else{ ?>
							<span style="color:red;"><?php echo $lang->denied ?></span>
						<?php } ?>
					<?php }elseif($__Context->member_info['limit_date'] && substr($__Context->member_info['limit_date'], 0, 8) >= date('Ymd')){ ?>
						<span style="color:red;"><?php echo $lang->member_limited ?></span>
					<?php }else{ ?>
						<?php echo $lang->approval ?>
					<?php } ?>
				</td>
				<td class="nowr rx_detail_marks" title="<?php echo zdate($__Context->member_info['regdate'], 'Y-m-d H:i:s');
if($__Context->member_info['ipaddress']){ ?> (<?php echo $__Context->member_info['ipaddress'] ?>)<?php } ?>">
					<?php echo zdate($__Context->member_info['regdate'], 'Y-m-d') ?>
				</td>
				<td class="nowr rx_detail_marks" title="<?php echo zdate($__Context->member_info['last_login'], 'Y-m-d H:i:s');
if($__Context->member_info['last_login_ipaddress']){ ?> (<?php echo $__Context->member_info['last_login_ipaddress'] ?>)<?php } ?>">
					<?php echo zdate($__Context->member_info['last_login'], 'Y-m-d') ?>
				</td>
				<td class="rx_detail_marks"><?php echo $__Context->member_info['group_list'] ?>&nbsp;</td>
				<td class="nowr"><a href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminInsert', 'member_srl', $__Context->member_info['member_srl']) ?>"><?php echo $lang->inquiry ?>/<?php echo $lang->cmd_modify ?></a></td>
				<?php $__Context->used_values = '' ?>
				<?php if($__Context->usedIdentifiers)foreach($__Context->usedIdentifiers as $__Context->name=>$__Context->title){ ?>
					<?php $__Context->used_values .= "\t".$__Context->member_info[$__Context->name] ?>
				<?php } ?>
				<td><input type="checkbox" name="user" value="<?php echo $__Context->member_info['member_srl']."\t".$__Context->member_info['email_address'].$__Context->used_values."\t".$__Context->member_info['group_list'] ?>"<?php if($__Context->member_info['is_admin'] == 'Y'){ ?> disabled="disabled"<?php } ?>/></td>
			</tr><?php } ?>
			<?php if($__Context->total_count==0){ ?><tr>
				<td><?php echo $lang->msg_no_result ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
</form>
<div class="x_clearfix">
	<?php if($__Context->page_navigation){ ?><form action="./" class="x_pagination x_pull-left"  style="margin:0"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
		<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<?php if($__Context->order_target){ ?><input type="hidden" name="order_target" value="<?php echo $__Context->order_target ?>" /><?php } ?>
		<?php if($__Context->order_type){ ?><input type="hidden" name="order_type" value="<?php echo $__Context->order_type ?>" /><?php } ?>
		<?php if($__Context->category_srl){ ?><input type="hidden" name="category_srl" value="<?php echo $__Context->category_srl ?>" /><?php } ?>
		<?php if($__Context->childrenList){ ?><input type="hidden" name="childrenList" value="<?php echo $__Context->childrenList ?>" /><?php } ?>
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
	<div class="x_pull-right x_btn-group">
		<a class="x_btn x_btn-inverse" href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminInsert') ?>"><?php echo $lang->msg_new_member ?></a>
		<a href="#listManager" data-value="modify" class="modalAnchor _member x_btn"><?php echo $lang->modify ?></a>
		<a href="#listManager" data-value="delete" class="modalAnchor _member x_btn"><?php echo $lang->delete ?></a>
	</div>
</div>
<form action="./" method="get" class="search center x_input-append" ><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<select name="selected_group_srl" style="margin-right:4px">
		<option value="0"><?php echo $lang->all_group ?></option>
		<?php if($__Context->group_list)foreach($__Context->group_list as $__Context->key => $__Context->val){ ?>
		<option value="<?php echo $__Context->val->group_srl ?>" <?php if($__Context->selected_group_srl==$__Context->val->group_srl){ ?>selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
		<?php } ?>
	</select>
	<select name="search_target" style="margin-right:4px" title="<?php echo $lang->search_target ?>">
		<?php  $lang->search_target_list = array_merge($__Context->usedIdentifiers, lang('member.search_target_list')->getArrayCopy()) ?>
		<?php $__loop_tmp=$lang->search_target_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
	</select>
	<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" style="width:140px">
	<button class="x_btn x_btn-inverse" type="submit"><?php echo $lang->cmd_search ?></button>
	<a class="x_btn" href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList', 'page', $__Context->page) ?>"><?php echo $lang->cmd_cancel ?></a>
</form>
<section class="x_modal" id="listManager">
	<?php Context::addJsFile("modules/member/ruleset/updateSeletecdMemberInfo.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./"  method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="updateSeletecdMemberInfo" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminSelectedMemberManage" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
		<div class="x_modal-header">
			<h1><?php echo $lang->cmd_selected_user_manage ?>: <span class="_sub"></span></h1>
		</div>
		<div class="x_modal-body">
			<table class="x_table x_table-striped x_table-hover">
				<thead>
					<tr>
						<th scope="col"><?php echo $lang->email_address ?></th>
						<?php $__loop_tmp=$__Context->usedIdentifiers;if($__loop_tmp)foreach($__loop_tmp as $__Context->name=>$__Context->title){ ?><th scope="col"><?php echo $__Context->title ?></th><?php } ?>
						<th scope="col" class="text"><?php echo $lang->member_group ?></th>
						<th scope="col">&nbsp;</th>
					</tr>
				</thead>
				<tbody id="popupBody">
				</tbody>
			</table>
			<div class="x_control-group _moveTarget" hidden>
				<h3><?php echo $lang->member_group ?></h3>
				<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><label for="g<?php echo $__Context->val->group_srl ?>" class="x_inline"><input type="checkbox" name="groups[]" id="g<?php echo $__Context->val->group_srl ?>" value="<?php echo $__Context->val->group_srl ?>"/> <?php echo $__Context->val->title ?></label><?php } ?>
			</div>
			<div class="x_control-group _moveTarget" hidden>
				<h3><?php echo $lang->denied ?></h3>
				<label class="x_inline" for="appoval"><input type="radio" name="denied" id="appoval" value="N" /> <?php echo $lang->approval ?></label>
				<label class="x_inline" for="deny"><input type="radio" name="denied" id="deny" value="Y" /> <?php echo $lang->denied ?></label>
			</div>
			<div class="x_control-group _moveTarget" hidden>
				<h3><?php echo $lang->about_send_message ?></h3>
				<textarea rows="5" cols="42" id="message" style="width:98%" name="message" title="<?php echo $lang->about_send_message ?>"></textarea>
			</div>
		</div>
		<div class="x_modal-footer">
			<button type="button" class="x_btn x_pull-left" data-hide="#listManager"><?php echo $lang->cmd_close ?></button>
			<span class="x_btn-group x_pull-right">
				<button type="submit" name="type" value="modify|delete" class="x_btn x_btn-inverse"><?php echo $lang->confirm ?></button>
			</span>
		</div>
	</form>
</section>
<script>
jQuery(function($){
	// Modal anchor activation
	var $memberList = $('#memberList');
	$memberList.find(':checkbox').change(function(){
		var $modalAnchor = $('a[data-value]');
		if($memberList.find('tbody :checked').length == 0){
			$modalAnchor.removeAttr('href').addClass('x_disabled');
		} else {
			$modalAnchor.attr('href','#listManager').removeClass('x_disabled');
		}
	}).change();
	// Modal anchor button action
	$('a[data-value]').click(function(){
		if($memberList.find(':checked').length != 0){
			var $this = $(this);
			var $moveTarget = $('._moveTarget');
			var thisValue = $this.attr('data-value');
			var thisText = $this.text();
			$('#listManager').find('.x_modal-header ._sub').text(thisText).end().find('[type="submit"]').val(thisValue).text(thisText);
			if(thisValue == 'delete'){
				$moveTarget.hide().next().css('borderTopWidth','0');
			} else {
				$moveTarget.show().next().css('borderTopWidth','1px');
			}
		}
	});
});
</script>
