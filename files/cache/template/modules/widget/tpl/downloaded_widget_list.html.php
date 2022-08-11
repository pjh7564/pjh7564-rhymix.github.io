<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/widget/tpl','header.html') ?>
<table class="x_table x_table-striped x_table-hover dsTg">
	<caption>
		<strong><?php echo lang('all') ?> (<?php echo $__Context->tCount ?>)</strong>
		<div class="x_pull-right x_btn-group">
			<button class="x_btn x_active __simple"><?php echo $lang->simple_view ?></button>
			<button class="x_btn __detail"><?php echo $lang->detail_view ?></button>
		</div>
	</caption>
	<thead>
		<tr>
			<th scope="col"><?php echo $lang->widget_name ?></th>
			<th><?php echo $lang->version ?></th>
			<th scope="col" class="rx_detail_marks"><?php echo $lang->author ?></th>
			<th scope="col" class="rx_detail_marks"><?php echo $lang->path ?></th>
			<th scope="col"><?php echo $lang->cmd_generate_code ?></th>
			<th scope="col"><?php echo $lang->cmd_delete ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->widget_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->widget){ ?><tr>
			<td class="title">
				<p><strong><?php echo $__Context->widget->title ?></strong></p>
				<p><?php echo $__Context->widget->description ?></p>
				<?php if($__Context->widget->need_update == 'Y'){ ?><p class="update">
					<?php echo $lang->msg_avail_easy_update ?> <a href="<?php echo $__Context->widget->update_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->msg_do_you_like_update ?></a>
				</p><?php } ?>
			</td>
			<td>
				<?php if($__Context->widget->version === 'RX_VERSION'){ ?>
					<img src="<?php echo \RX_BASEURL ?>common/img/icon.png" class="core_symbol" alt="Rhymix Core" title="Rhymix Core" />
				<?php }else{ ?>
					<span<?php if($__Context->widget->isBlacklisted){ ?> style="color:#aaa"<?php } ?>><?php echo $__Context->widget->version ?></span>
				<?php } ?>
			</td>
			<td class="rx_detail_marks">
				<?php $__loop_tmp=$__Context->widget->author;if($__loop_tmp)foreach($__loop_tmp as $__Context->author){ ?>
					<?php if($__Context->author->homepage){ ?><a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->name ?></a><?php } ?>
					<?php if(!$__Context->author->homepage){;
echo $__Context->author->name;
} ?>
				<?php } ?>
			</td>
			<td class="rx_detail_marks"><?php echo $__Context->widget->path ?></td>
			<td><a class="x_btn x_btn-link" href="<?php echo getUrl('act', 'dispWidgetAdminGenerateCode', 'selected_widget', $__Context->widget->widget) ?>"><?php echo $lang->cmd_generate_code ?></a></td>
			<td><?php if($__Context->widget->remove_url){ ?><a class="x_btn x_btn-link" href="<?php echo $__Context->widget->remove_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->cmd_delete ?></a><?php } ?></td>
		</tr><?php } ?>
	</tbody>
</table>
