<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/communication/skins/default','common_header.html') ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/communication/skins/default/filter','delete_friend_group.xml');$__xmlFilter->compile(); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/communication/skins/default/filter','move_friend.xml');$__xmlFilter->compile(); ?>
<h1><?php echo $__Context->member_title = $lang->cmd_view_friend  ?></h1>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/communication/skins/default/frineds/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/communication/ruleset/deleteCheckedFriend.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_friend_list" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="deleteCheckedFriend" />
	<input type="hidden" name="module" value="communication" />
	<input type="hidden" name="act" value="procCommunicationDeleteFriend" />
	<input type="hidden" name="xe_validator_id" value="modules/communication/skins/default/frineds/1" />
	<div class="btnArea">
		<span class="etc">
			<select name="jumpMenu" id="jumpMenu" style="margin:0">
				<option value=""><?php echo $lang->default_friend_group ?></option>
				<?php if($__Context->friend_group_list)foreach($__Context->friend_group_list as $__Context->key => $__Context->val){ ?>
				<option value="<?php echo $__Context->val->friend_group_srl ?>" <?php if($__Context->val->friend_group_srl == $__Context->friend_group_srl){ ?>selected="selected"<?php } ?> ><?php echo $__Context->val->title ?></option>
				<?php } ?>
			</select>
			<button type="button" class="btn" onclick="doJumpFriendGroup()"><?php echo $lang->cmd_move ?></button>
		</span>
		<?php if(count($__Context->friend_group_list)){ ?><select name="friend_group_list" id="friend_group_list" style="margin:0">
			<?php $__loop_tmp=$__Context->friend_group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->friend_group_srl ?>"<?php if($__Context->val->friend_group_srl == $__Context->friend_group_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
		</select><?php } ?>
		<span class="btn-group">
			<?php if(count($__Context->friend_group_list)){ ?><button type="button" class="btn" onclick="doRenameFriendGroup();return false;"><?php echo $lang->cmd_rename_friend_group ?></button><?php } ?>
			<?php if(count($__Context->friend_group_list)){ ?><button type="button" class="btn" onclick="doDeleteFriendGroup();return false;"><?php echo $lang->cmd_delete_friend_group ?></button><?php } ?>
			<a href="<?php echo getUrl('','module','communication','act','dispCommunicationAddFriendGroup') ?>" class="btn" onclick="popopen(this.href);return false;"><?php echo $lang->cmd_add_friend_group ?></a>
		</span>
	</div>
	<table class="table table-striped table-hover">
		<caption>Total: <?php echo $__Context->total_count ?></caption>
		<thead>
			<tr>
				<th><?php echo $lang->friend_group ?></th>
				<th><?php echo $lang->nick_name ?></th>
				<th><?php echo $lang->regdate ?></th>
				<th><input name="check_all" type="checkbox" onclick="XE.checkboxToggleAll('friend_srl_list[]', { wrap:'fo_friend_list' })" /></th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->friend_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->val){ ?><tr>
				<td><?php echo $__Context->val->group_title?$__Context->val->group_title:$lang->default_friend_group ?></td>
				<td><a href="#popup_menu_area" class="member_<?php echo $__Context->val->target_srl ?>"><?php echo $__Context->val->nick_name ?></a></td>
				<td><?php echo zdate($__Context->val->regdate,"Y-m-d") ?></td>
				<td><input type="checkbox" name="friend_srl_list[]" value="<?php echo $__Context->val->friend_srl ?>" /></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="btnArea">
		<?php if(count($__Context->friend_group_list)){ ?><select name="target_friend_group_srl" style="margin:0">
			<?php $__loop_tmp=$__Context->friend_group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->friend_group_srl ?>"><?php echo $__Context->val->title ?></option><?php } ?>
		</select><?php } ?>
		<span class="btn-group __submit_group">
			<?php if(count($__Context->friend_group_list)){ ?><button type="submit" name="act" class="btn" value="procCommunicationMoveFriend"><?php echo $lang->cmd_move ?></button><?php } ?>
			<button type="submit" name="act" class="btn" value="procCommunicationDeleteFriend"><?php echo $lang->cmd_delete ?></button>
		</span>
	</div>
	<div class="pagination pagination-centered">
		<ul>
			<li><a href="<?php echo getUrl('page','','document_srl','') ?>" class="direction">&laquo; <?php echo $lang->first_page ?></a></li>
			<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
			<li<?php if($__Context->page == $__Context->page_no){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','') ?>"><?php echo $__Context->page_no ?></a></li>
			<?php } ?>
			<li><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','') ?>" class="direction"><?php echo $lang->last_page ?> &raquo;</a></li>
		</ul>
	</div>
</form>
<form action="./" method="get" id="for_delete_group"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="friend_group_srl" value="" />
	<input type="hidden" name="xe_validator_id" value="modules/communication/skins/default/frineds/1" />
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/communication/skins/default','common_footer.html') ?>
