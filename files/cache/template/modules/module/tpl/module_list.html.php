<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/module/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/autoinstall/tpl/uninstall/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<table class="x_table x_table-striped x_table-hover dsTg">
	<caption>
		<strong><?php echo lang('all') ?> (<?php echo count($__Context->module_list) ?>)</strong>
		<div class="x_pull-right x_btn-group">
			<button class="x_btn x_active __simple"><?php echo $lang->simple_view ?></button>
			<button class="x_btn __detail"><?php echo $lang->detail_view ?></button>
		</div>
	</caption>
	<thead>
		<tr>
			<th class="nowr"><?php echo lang('favorite') ?></th>
			<th class="title"><?php echo $lang->module_name ?></th>
			<th class="nowr"><?php echo $lang->version ?></th>
			<th class="nowr rx_detail_marks"><?php echo $lang->author ?></th>
			<th class="nowr rx_detail_marks"><?php echo $lang->path ?></th>
			<th class="nowr rx_detail_marks"><?php echo $lang->cmd_delete ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__loop_tmp=$__Context->module_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><tr<?php if(in_array($__Context->val->module,$__Context->favoriteModuleList)){ ?> data-type1="#"<?php };
if($__Context->val->need_install || $__Context->val->need_update || $__Context->val->need_autoinstall_update){ ?> data-type2="#"<?php } ?>>
			<td<?php if(!$__Context->val->description){ ?> class="nodescription"<?php } ?>>
				<?php if(in_array($__Context->val->module,$__Context->favoriteModuleList)){ ?><button type="button" class="fvOn" onclick="doToggleFavoriteModule(this, '<?php echo $__Context->val->module ?>')"><?php echo lang("favorite") ?> (<?php echo lang("on") ?>)</button><?php } ?>
				<?php if(!in_array($__Context->val->module,$__Context->favoriteModuleList)){ ?><button type="button" class="fvOff" onclick="doToggleFavoriteModule(this, '<?php echo $__Context->val->module ?>')"><?php echo lang("favorite") ?> (<?php echo lang("off") ?>)</button><?php } ?>
			</td>
			<td class="title">
				<p>
					<?php if($__Context->val->admin_index_act){ ?><a href="<?php echo getUrl('','module','admin','act',$__Context->val->admin_index_act) ?>"><?php echo $__Context->val->title ?></a><?php } ?>
					<?php if(!$__Context->val->admin_index_act){ ?><strong><?php echo $__Context->val->title ?></strong><?php } ?>
				</p>
				<?php if($__Context->val->description){ ?><p><?php echo $__Context->val->description ?></p><?php } ?>
				<?php if(Context::isBlacklistedPlugin($__Context->val->module, 'module')){ ?><p class="x_alert x_alert-error">
					<?php echo $lang->msg_blacklisted_module ?>
				</p><?php } ?>
				<?php if($__Context->val->need_install){ ?><p class="x_alert x_alert-info"><?php echo $lang->msg_avail_install ?> <button class="text" type="button" onclick="doInstallModule('<?php echo $__Context->val->module ?>')"><?php echo $lang->msg_do_you_like_install ?></button></p><?php } ?>
				<?php if($__Context->val->need_update){ ?><p class="x_alert x_alert-info"><?php echo $lang->msg_avail_update ?> <button class="text" type="button" onclick="doUpdateModule('<?php echo $__Context->val->module ?>')"><?php echo $lang->msg_do_you_like_update ?></button></p><?php } ?>
			</td>
			<td>
				<?php if($__Context->val->version === 'RX_VERSION'){ ?>
					<img src="<?php echo \RX_BASEURL ?>common/img/icon.png" class="core_symbol" alt="Rhymix Core" title="Rhymix Core" />
				<?php }else{ ?>
					<span<?php if(Context::isBlacklistedPlugin($__Context->val->module, 'module')){ ?> style="color:#aaa"<?php } ?>><?php echo $__Context->val->version ?></span>
				<?php } ?>
			</td>
			<td class="nowr rx_detail_marks">
				<?php if($__Context->val->author)foreach($__Context->val->author as $__Context->author){ ?>
					<?php if($__Context->author->homepage){ ?>
						<a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->name ?></a>
					<?php }else{ ?>
						<?php echo $__Context->author->name ?>
					<?php } ?>
				<?php } ?>
			</td>
			<td class="rx_detail_marks"><?php echo $__Context->val->path ?></td>
			<td class="rx_detail_marks">
				<?php if($__Context->val->delete_url && $__Context->val->version !== 'RX_VERSION'){ ?><a href="<?php echo $__Context->val->delete_url ?>&amp;return_url=<?php echo urlencode(getRequestUriByServerEnviroment()) ?>"><?php echo $lang->cmd_delete ?></a><?php } ?>
			</td>
		</tr><?php } ?>
	</tbody>
</table>
