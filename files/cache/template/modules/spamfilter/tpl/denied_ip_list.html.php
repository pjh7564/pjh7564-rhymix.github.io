<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/spamfilter/tpl','header.html') ?>
<section>
	<form action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="act" value="procSpamfilterAdminDeleteDeniedIP" />
		<input type="hidden" name="module" value="spamfilter" />
		<input type="hidden" name="xe_validator_id" value="modules/spamfilter/tpl/1" />
		<table class="x_table x_table-striped x_table-hover">
			<caption>
				<strong><?php echo $lang->cmd_denied_ip ?></strong>
				<button type="submit" class="x_btn x_pull-right"><?php echo $lang->cmd_delete ?></button>
			</caption>
			<thead>
				<tr>
					<th scope="col">IP</th>
					<th scope="col"><?php echo $lang->description ?></th>
					<th scope="col"><a href="<?php echo getUrl('sort_index', 'latest_hit') ?>"><?php echo $lang->latest_hit ?> <?php if($__Context->sort_index === 'latest_hit'){ ?>▼<?php } ?></a></th>
					<th scope="col"><a href="<?php echo getUrl('sort_index', 'hit') ?>"><?php echo $lang->hit ?> <?php if($__Context->sort_index === 'hit'){ ?>▼<?php } ?></a></th>
					<th scope="col"><a href="<?php echo getUrl('sort_index', 'regdate') ?>"><?php echo $lang->regdate ?> <?php if($__Context->sort_index === 'regdate' || !$__Context->sort_index){ ?>▼<?php } ?></a></th>
					<th scope="col"><input type="checkbox" name="ipaddress" title="Check All" /></th>
				</tr>
			</thead>
			<tbody>
				<?php $__loop_tmp=$__Context->ip_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->ip_info){ ?><tr>
					<td><?php echo $__Context->ip_info->ipaddress ?></td>
					<td><?php echo $__Context->ip_info->description ?></td>
					<td><?php if($__Context->ip_info->latest_hit){;
echo zdate($__Context->ip_info->latest_hit,'Y-m-d H:i');
}else{ ?>-<?php } ?></td>
					<td><?php echo $__Context->ip_info->hit ?></td>
					<td><?php echo zdate($__Context->ip_info->regdate,'Y-m-d') ?></td>
					<td><input type="checkbox" name="ipaddress[]" value="<?php echo $__Context->ip_info->ipaddress ?>" /></td>
				</tr><?php } ?>
				<?php if(!$__Context->ip_list){ ?><tr>
					<td colspan="6" style="text-align:center"><?php echo $lang->no_data ?></td>
				</tr><?php } ?>
			</tbody>
		</table>
	</form>
	<form action="./" style="margin-right:14px" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="act" value="procSpamfilterAdminInsertDeniedIP" />
		<input type="hidden" name="module" value="spamfilter" />
		<input type="hidden" name="xe_validator_id" value="modules/spamfilter/tpl/1" />
		<input type="hidden" name="active" value="ip" />
		<textarea name="ipaddress_list" title="<?php echo $lang->add_denied_ip ?>" rows="4" cols="42" style="width:100%"></textarea>
		<p class="x_help-block"><?php echo $lang->about_denied_ip ?></p>
		<span class="x_pull-right" style="margin-right:-14px">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->add_denied_ip ?></button>
		</span>
	</form>
</section>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/spamfilter/tpl','footer.html') ?>
