<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/advanced_mailer/tpl','common.html') ?>
<!--#Meta:modules/advanced_mailer/tpl/css/view_log.css--><?php Context::loadFile(['modules/advanced_mailer/tpl/css/view_log.css', '', '', '', []]); ?>
<!--#Meta:modules/advanced_mailer/tpl/js/view_log.js--><?php Context::loadFile(['modules/advanced_mailer/tpl/js/view_log.js', '', '', '']); ?>
<table id="advanced_mailer_log" class="x_table x_table-striped x_table-hover">
	<caption>
		<div style="float: left">
			<a href="<?php echo getUrl('status', null) ?>"<?php if(!$__Context->status){ ?> class="active"<?php } ?>><?php echo $lang->all ?></a> <i>|</i>
			<a href="<?php echo getUrl('status', 'success') ?>"<?php if($__Context->status == 'success'){ ?> class="active"<?php } ?>><?php echo $lang->cmd_advanced_mailer_status_success ?></a> <i>|</i>
			<a href="<?php echo getUrl('status', 'error') ?>"<?php if($__Context->status == 'error'){ ?> class="active"<?php } ?>><?php echo $lang->cmd_advanced_mailer_status_error ?></a>
		</div>
		<div style="float: right">
			<strong>Total: <?php echo number_format($__Context->total_count) ?>, Page: <?php echo number_format($__Context->page) ?>/<?php echo number_format($__Context->total_page) ?></strong>
		</div>
		<div class="clear: both"></div>
	</caption>
	<thead>
		<tr>
			<th scope="col" class="nowr"><?php echo $lang->cmd_advanced_mailer_status_sender ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_advanced_mailer_status_recipient ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_advanced_mailer_status_content ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_advanced_mailer_status_sending_method ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_advanced_mailer_status_time ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_advanced_mailer_status ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->advanced_mailer_log;if($__loop_tmp)foreach($__loop_tmp as $__Context->sms_id=>$__Context->val){ ?><tr>
			<td class="nowr">
				<?php echo htmlspecialchars($__Context->val->sms_from) ?>
			</td>
			<td class="nowr">
				<?php echo htmlspecialchars($__Context->val->sms_to) ?>
			</td>
			<td class="nowr" style="white-space:normal"><?php echo nl2br(htmlspecialchars($__Context->val->content)) ?></td>
			<td class="nowr">
				<?php  if($__Context->val->sending_method === 'mail') $__Context->val->sending_method = 'mailfunction' ?>
				<?php echo strval(isset($__Context->sending_methods[$__Context->val->sending_method]['name']) ? $__Context->sending_methods[$__Context->val->sending_method]['name'] : $__Context->val->sending_method) ?>
			</td>
			<td class="nowr"><?php echo (zdate($__Context->val->regdate, "Y-m-d\nH:i:s")) ?></td>
			<td class="nowr">
				<?php if($__Context->val->status === 'success'){ ?>
					<?php echo $lang->cmd_advanced_mailer_status_success ?>
				<?php }else{ ?>
					<a href="javascript:void(0)" class="show-errors"><?php echo $lang->cmd_advanced_mailer_status_error ?></a>
					<div class="mail-log-errors">
						<strong><?php echo $lang->cmd_advanced_mailer_status_error_msg ?>:</strong><br />
						<?php echo nl2br(htmlspecialchars(trim($__Context->val->errors))) ?><br /><br />
						<strong><?php echo $lang->cmd_advanced_mailer_status_calling_script ?>:</strong><br />
						<?php echo htmlspecialchars($__Context->val->calling_script) ?>
					</div>
				<?php } ?>
			</td>
		</tr><?php } ?>
		<?php if(!$__Context->advanced_mailer_log){ ?><tr>
			<td><?php echo $lang->msg_advanced_mailer_log_is_empty ?></td>
		</tr><?php } ?>
	</tbody>
</table>
<div class="x_clearfix">
	<form class="x_pagination x_pull-left" style="margin-top:8px" action="<?php echo Context::getUrl('') ?>" method="post" ><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<?php $__loop_tmp=$__Context->param;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){;
if(!in_array($__Context->key, array('mid', 'vid', 'act'))){ ?><input type="hidden" name="<?php echo $__Context->key ?>" value="<?php echo $__Context->val ?>" /><?php }} ?>
		<ul>
			<li<?php if($__Context->page == 1){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', '') ?>">&laquo; <?php echo $lang->first_page ?></a></li>
			<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
				<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
			<?php } ?>
			<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>><a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>"><?php echo $lang->last_page ?> &raquo;</a></li>
		</ul>
	</form>
	<form class="x_pull-right x_input-append" style="margin-top:8px" action="<?php echo Context::getUrl('') ?>" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="advanced_mailer" />
		<input type="hidden" name="act" value="procAdvanced_mailerAdminClearSentSMS" />
		<input type="hidden" name="status" value="<?php echo $__Context->advanced_mailer_status ?>" />
		<select name="clear_before_days" style="width:120px">
			<option value="0"><?php echo $lang->cmd_advanced_mailer_clear_log_condition_all ?></option>
			<option value="1"><?php echo sprintf($lang->cmd_advanced_mailer_clear_log_condition, 1) ?></option>
			<option value="3"><?php echo sprintf($lang->cmd_advanced_mailer_clear_log_condition, 3) ?></option>
			<option value="7" selected="selected"><?php echo sprintf($lang->cmd_advanced_mailer_clear_log_condition, 7) ?></option>
			<option value="14"><?php echo sprintf($lang->cmd_advanced_mailer_clear_log_condition, 14) ?></option>
			<option value="30"><?php echo sprintf($lang->cmd_advanced_mailer_clear_log_condition, 30) ?></option>
			<option value="60"><?php echo sprintf($lang->cmd_advanced_mailer_clear_log_condition, 60) ?></option>
		</select>
		<button class="x_btn" type="submit"<?php if(!count($__Context->advanced_mailer_log)){ ?> disabled="disabled"<?php } ?>><?php echo $lang->cmd_advanced_mailer_clear_log_button ?></button>
	</form>
</div>
