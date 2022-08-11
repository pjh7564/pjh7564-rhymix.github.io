<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/layout/tpl','header.html') ?>
<!--#Meta:modules/layout/tpl/js/adminList.js--><?php Context::loadFile(['modules/layout/tpl/js/adminList.js', '', '', '']); ?>
<script>
	xe.lang.confirm_delete = '<?php echo $lang->confirm_delete ?>';
</script>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/layout/tpl','sub_tab.html') ?>
<table class="x_table x_table-striped x_table-hover dsTg">
	<caption>
		<div class="x_pull-right x_btn-group">
			<button class="x_btn x_active __simple"><?php echo $lang->simple_view ?></button>
			<button class="x_btn __detail"><?php echo $lang->detail_view ?></button>
		</div>
	</caption>
	<thead>
		<tr>
			<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->number ?></th>
			<th scope="col" class="nowr"><?php echo $lang->title ?> (<?php echo $lang->layout_name ?>)</th>
			<th scope="col" class="nowr"><?php echo $lang->regdate ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_setup ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_edit ?></th>
			<th scope="col" class="nowr"><?php echo $lang->cmd_copy ?></th>
			<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->cmd_delete ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__Context->count=1 ?>
		<?php if($__Context->layout_list)foreach($__Context->layout_list as $__Context->layout){ ?>
		<?php $__Context->layout_name = $__Context->layout['title'] ?>
		<?php unset($__Context->layout['title']) ?>
		<?php $__loop_tmp=$__Context->layout;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->item){ ?><tr>
			<?php if($__Context->no === 0){ ?><td rowspan="<?php echo count($__Context->layout) ?>" class="rx_detail_marks"><?php echo $__Context->count++ ?></td><?php } ?>
			<td><?php echo $__Context->item->title ?> (<?php echo $__Context->layout_name ?>)</td>
			<td><?php echo zdate($__Context->item->regdate, "Y-m-d") ?></td>
			<td><a href="<?php echo getUrl('act', 'dispLayoutAdminModify', 'layout_srl', $__Context->item->layout_srl) ?>"><?php echo $lang->cmd_setup ?></a></td>
			<td><a href="<?php echo getUrl('act', 'dispLayoutAdminEdit', 'layout_srl', $__Context->item->layout_srl) ?>"><?php echo $lang->cmd_edit ?></a></td>
			<td><a href="<?php echo getUrl('', 'module', 'layout', 'act', 'dispLayoutAdminCopyLayout', 'layout_srl', $__Context->item->layout_srl) ?>" onclick="popopen(this.href);return false;" title="<?php echo $lang->cmd_copy ?>"><?php echo $lang->cmd_copy ?></a></td>
			<td class="rx_detail_marks">
				<?php if(count($__Context->layout) > 1){;
Context::addJsFile("modules/layout/ruleset/deleteLayout.xml", FALSE, "", 0, "body", TRUE, "") ?><form class="layout_delete_form"  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="deleteLayout" />
					<input type="hidden" name="module" value="layout" />
					<input type="hidden" name="act" value="procLayoutAdminDelete" />
					<input type="hidden" name="layout_srl" value="<?php echo $__Context->item->layout_srl ?>" />
					<input class="x_btn x_btn-link" type="submit" value="<?php echo $lang->cmd_delete ?>" />
					<input type="hidden" name="xe_validator_id" value="modules/layout/tpl/layout_all_instance_list/1" />
				</form><?php } ?>
			</td>
		</tr><?php } ?>
		<?php } ?>
	</tbody>
</table>
