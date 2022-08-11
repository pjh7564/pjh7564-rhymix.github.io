<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_header.html') ?>
<h1><?php echo $__Context->member_title = $lang->cmd_view_active_logins  ?></h1>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th><?php echo $lang->no ?></th>
			<th class="title"><?php echo $lang->cmd_login_browser_info ?></th>
			<th><?php echo $lang->cmd_initial_login ?></th>
			<th><?php echo $lang->cmd_recent_visit ?></th>
			<th><?php echo $lang->cmd_delete ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->active_logins;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->autologin_info){ ?><tr>
			<?php  $__Context->autologin_info->user_agent = @json_decode($__Context->autologin_info->user_agent) ?: new stdClass() ?>
			<td><?php echo $__Context->no ?></td>
			<td class="title">
				<?php echo escape($__Context->autologin_info->user_agent->browser) ?> <?php echo escape($__Context->autologin_info->user_agent->version) ?><br />
				<?php echo escape($__Context->autologin_info->user_agent->os) ?> <?php echo $__Context->autologin_info->user_agent->is_tablet ? 'Tablet' : ($__Context->autologin_info->user_agent->is_mobile ? 'Mobile' : 'PC') ?>
			</td>
			<td><?php echo zdate($__Context->autologin_info->regdate, 'Y-m-d H:i') ?><br /><?php echo $__Context->autologin_info->ipaddress ?></td>
			<td><?php echo zdate($__Context->autologin_info->last_visit, 'Y-m-d H:i') ?><br /><?php echo $__Context->autologin_info->last_ipaddress ?></td>
			<td><button class="delete_autologin" data-autologin-id="<?php echo $__Context->autologin_info->id ?>" data-autologin-key="<?php echo $__Context->autologin_info->autologin_key ?>"><?php echo $lang->cmd_delete ?></button></td>
		</tr><?php } ?>
	</tbody>
</table>
<div class="pagination pagination-centered">
	<ul>
		<li><a href="<?php echo getUrl('page','','module_srl','') ?>" class="direction">&laquo; <?php echo $lang->first_page ?></a></li> 
		<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
		<li<?php if($__Context->page == $__Context->page_no){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a></li>
		<?php } ?>
		<li><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="direction"><?php echo $lang->last_page ?> &raquo;</a></li>
	</ul>
</div>
<h1><?php echo $lang->cmd_view_registered_devices  ?></h1>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th><?php echo $lang->no ?></th>
			<th class="title"><?php echo $lang->cmd_login_device_info ?></th>
			<th><?php echo $lang->cmd_initial_registration ?></th>
			<th><?php echo $lang->cmd_recent_connection ?></th>
			<th><?php echo $lang->cmd_delete ?></th>
		</tr>
	</thead>
	<tbody>
		<?php  $__Context->no = count($__Context->registered_devices) ?>
		<?php $__loop_tmp=$__Context->registered_devices;if($__loop_tmp)foreach($__loop_tmp as $__Context->device_info){ ?><tr>
			<td><?php echo $__Context->no-- ?></td>
			<td class="title">
				<?php echo $__Context->device_info->device_type ?> <?php echo $__Context->device_info->device_version ?>
				(<?php echo $__Context->device_info->device_model ?: 'no model' ?>)
			</td>
			<td><?php echo zdate($__Context->device_info->regdate, 'Y-m-d H:i') ?></td>
			<td><?php echo zdate($__Context->device_info->last_active_date, 'Y-m-d H:i') ?></td>
			<td><button class="delete_device" data-device-srl="<?php echo $__Context->device_info->device_srl ?>"><?php echo $lang->cmd_delete ?></button></td>
		</tr><?php } ?>
	</tbody>
</table>
<script>
	jQuery(function($) {
		$("button.delete_autologin").on("click", function(event) {
			event.preventDefault();
			exec_json('member.procMemberDeleteAutologin', { autologin_id: $(this).data("autologin-id"), autologin_key: $(this).data("autologin-key") }, function(data) {
				window.location.reload();
			});
		});
		$("button.delete_device").on("click", function(event) {
			event.preventDefault();
			exec_json('member.procMemberDeleteDevice', { device_srl: $(this).data("device-srl") }, function(data) {
				window.location.reload();
			});
		});
	});
</script>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/skins/default','common_footer.html') ?>
