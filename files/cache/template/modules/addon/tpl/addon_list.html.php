<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1><?php echo $lang->installed_addons ?></h1>
</div>
<p><?php echo $lang->about_installed_addon ?></p>
<form action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="addon" />
	<input type="hidden" name="act" value="procAddonAdminSaveActivate" />
	<input type="hidden" name="xe_validator_id" value="modules/addon/tpl/addon_list/1" />
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/addon/tpl/addon_list/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<table class="x_table x_table-striped x_table-hover dsTg">
		<caption>
			<strong><?php echo lang('all') ?> (<?php echo $__Context->addon_count ?>)</strong>
			<div class="x_pull-right x_btn-group">
				<button type="button" class="x_btn x_active __simple"><?php echo $lang->simple_view ?></button>
				<button type="button" class="x_btn __detail"><?php echo $lang->detail_view ?></button>
			</div>
		</caption>
		<thead>
			<tr>
				<th class="title"><?php echo $lang->addon_name ?></th>
				<th class="nowr"><?php echo $lang->version ?></th>
				<th class="nowr rx_detail_marks"><?php echo $lang->author ?></th>
				<th class="nowr rx_detail_marks"><?php echo $lang->installed_path ?></th>
				<th class="nowr"><?php echo $lang->cmd_setup ?></th>
				<th class="nowr">PC</th>
				<th class="nowr">Mobile</th>
				<th class="nowr"><?php echo $lang->cmd_delete ?></th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->addon_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->addon){ ?><tr>
				<td class="title">
					<p><strong<?php if($__Context->addon->isBlacklisted){ ?> style="color:#aaa"<?php } ?>><?php echo $__Context->addon->title ?></strong></p>
					<p<?php if($__Context->addon->isBlacklisted){ ?> style="color:#aaa"<?php } ?>><?php echo $__Context->addon->description ?></p>
					<?php if($__Context->addon->need_update == 'Y'){ ?><p class="update">
						<?php echo $lang->msg_avail_easy_update ?> <a href="<?php echo $__Context->addon->update_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->msg_do_you_like_update ?></a>
					</p><?php } ?>
				</td>
				<td>
					<?php if($__Context->addon->version === 'RX_VERSION'){ ?>
						<img src="<?php echo \RX_BASEURL ?>common/img/icon.png" class="core_symbol" alt="Rhymix Core" title="Rhymix Core" />
					<?php }else{ ?>
						<span<?php if($__Context->addon->isBlacklisted){ ?> style="color:#aaa"<?php } ?>><?php echo $__Context->addon->version ?></span>
					<?php } ?>
				</td>
				<td class="nowr rx_detail_marks">
					<?php $__loop_tmp=$__Context->addon->author;if($__loop_tmp)foreach($__loop_tmp as $__Context->author){ ?>
						<?php if($__Context->author->homepage){ ?><a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->name ?></a><?php } ?>
						<?php if(!$__Context->author->homepage){;
echo $__Context->author->name;
} ?>
					<?php } ?>
				</td>
				<td class="rx_detail_marks"><span<?php if($__Context->addon->isBlacklisted){ ?> style="color:#aaa"<?php } ?>><?php echo $__Context->addon->path ?></span></td>
				<td>
					<a href="<?php echo getUrl('act', 'dispAddonAdminSetup', 'selected_addon', $__Context->addon->addon_name) ?>"><?php echo $lang->cmd_setup ?></a>
				</td>
				<td><input type="checkbox" name="pc_on[]" title="PC" value="<?php echo escape($__Context->addon->addon_name, false) ?>"<?php if($__Context->addon->activated && !$__Context->addon->isBlacklisted){ ?> checked="checked"<?php };
if($__Context->addon->isBlacklisted){ ?> disabled="disabled"<?php } ?> /></td>
				<td><input type="checkbox" name="mobile_on[]" title="Mobile" value="<?php echo escape($__Context->addon->addon_name, false) ?>"<?php if($__Context->addon->mactivated && !$__Context->addon->isBlacklisted){ ?> checked="checked"<?php };
if($__Context->addon->isBlacklisted){ ?> disabled="disabled"<?php } ?> /></td>
				<td><?php if($__Context->addon->remove_url && $__Context->addon->version !== 'RX_VERSION'){ ?><a href="<?php echo $__Context->addon->remove_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->cmd_delete ?></a><?php } ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="x_clearfix">
		<div class="x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</div>
	</div>
</form>
