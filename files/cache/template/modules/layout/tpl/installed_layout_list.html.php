<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/layout/tpl','header.html') ?>
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
			<th scope="col" class="nowr"><?php echo $lang->layout_name ?></th>
			<th scope="col" class="nowr"><?php echo $lang->version ?></th>
			<th scope="col" class="nowr"><?php echo $lang->author ?></th>
			<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->path ?></th>
			<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->cmd_delete ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->layout_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->layout){ ?><tr>
			<?php if($__Context->layout->title){ ?>
				<td class="title">
					<p><a href="<?php echo getUrl('act', 'dispLayoutAdminInstanceList', 'type', $__Context->type, 'layout', $__Context->layout->layout) ?>"><?php echo $__Context->layout->title ?></a></p>
					<p><?php echo $__Context->layout->description ?></p>
					<?php if($__Context->layout->need_update == 'Y'){ ?><p class="update">
						<?php echo $lang->msg_avail_easy_update ?> <a href="<?php echo $__Context->layout->update_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->msg_do_you_like_update ?></a>
					</p><?php } ?>
				</td>
				<td><?php echo $__Context->layout->version ?></td>
				<td>
					<?php $__loop_tmp=$__Context->layout->author;if($__loop_tmp)foreach($__loop_tmp as $__Context->author){ ?>
						<?php if($__Context->author->homepage){ ?><a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->name ?></a><?php } ?>
						<?php if(!$__Context->author->homepage){;
echo $__Context->author->name;
} ?>
					<?php } ?>
				</td>
				<td class="rx_detail_marks"><?php echo $__Context->layout->path ?></td>
				<td class="nowr rx_detail_marks"><?php if($__Context->layout->remove_url){ ?><a class="x_btn x_btn-link" href="<?php echo $__Context->layout->remove_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->cmd_delete ?></a><?php } ?></td>
			<?php } ?>
			<?php if(!$__Context->layout->title){ ?>
				<td class="title">
					<p><a href="<?php echo getUrl('act', 'dispLayoutAdminInstanceList', 'type', $__Context->type, 'layout', $__Context->layout->layout) ?>"><?php echo $__Context->layout->layout ?></a></p>
					<?php if($__Context->layout->need_update == 'Y'){ ?><p class="update">
						<?php echo $lang->msg_avail_easy_update ?> <a href="<?php echo $__Context->layout->update_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->msg_do_you_like_update ?></a>
					</p><?php } ?>
				</td>
				<td>-</td>
				<td>-</td>
				<td class="rx_detail_marks"><?php echo $__Context->layout->path ?></td>
				<td class="nowr rx_detail_marks"><?php if($__Context->layout->remove_url){ ?><a class="x_btn x_btn-link" href="<?php echo $__Context->layout->remove_url ?>&amp;return_url={urlencodegetRequestUriByServerEnviroment()}"><?php echo $lang->cmd_delete ?></a><?php } ?></td>
			<?php } ?>
		</tr><?php } ?>
	</tbody>
</table>
