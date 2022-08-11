<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','config_header.html') ?>
<?php if(!empty($__Context->XE_VALIDATOR_MESSAGE) && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/config_domains/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
		
	<table id="domain_list" class="x_table x_table-striped x_table-hover dsTg">
		<caption>
			<div class="x_pull-right x_btn-group">
				<button class="x_btn x_active __simple"><?php echo $lang->simple_view ?></button>
				<button class="x_btn __detail"><?php echo $lang->detail_view ?></button>
			</div>
		</caption>
		<thead>
			<tr>
				<th scope="col" class="nowr"><?php echo $lang->site_title ?></th>
				<th scope="col" class="nowr"><?php echo $lang->domain ?></th>
				<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->use_ssl ?></th>
				<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->cmd_index_module_srl ?></th>
				<th scope="col" class="nowr rx_detail_marks"><?php echo $lang->cmd_index_document_srl ?></th>
				<th scope="col" class="nowr"><?php echo $lang->cmd_modify ?> / <?php echo $lang->cmd_delete ?> / <?php echo $lang->cmd_copy ?></th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->domain_list->data;if($__loop_tmp)foreach($__loop_tmp as $__Context->domain){ ?><tr>
				<td class="nowr">
					<?php echo (preg_match('/^\$(?:user_)?lang->[a-zA-Z0-9\_]+$/', $__Context->domain->settings->title) ? ($__Context->domain->settings->title) : htmlspecialchars($__Context->domain->settings->title, ENT_QUOTES, 'UTF-8', false)) ?>
					<?php if($__Context->domain->is_default_domain === 'Y'){ ?><i class="x_icon-home" title="<?php echo $lang->cmd_is_default_domain ?>"><?php echo $lang->cmd_is_default_domain ?></i><?php } ?>
				</td>
				<td class="nowr"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain->domain, ENT_QUOTES, 'UTF-8', false) : ($__Context->domain->domain)) ?></td>
				<td class="nowr rx_detail_marks"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(preg_replace('/\\(.+$/', '', $lang->ssl_options[$__Context->domain->security ?: 'none']), ENT_QUOTES, 'UTF-8', false) : (preg_replace('/\\(.+$/', '', $lang->ssl_options[$__Context->domain->security ?: 'none']))) ?></td>
				<td class="nowr rx_detail_marks">
					<?php if($__Context->domain->index_module_srl && $__Context->module_list[$__Context->domain->index_module_srl]){ ?><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getSiteUrl($__Context->domain->domain, '', 'mid', $__Context->module_list[$__Context->domain->index_module_srl]->mid), ENT_QUOTES, 'UTF-8', false) : (getSiteUrl($__Context->domain->domain, '', 'mid', $__Context->module_list[$__Context->domain->index_module_srl]->mid))) ?>" target="_blank">
						<?php echo ($__Context->domain->index_module_srl && $__Context->module_list[$__Context->domain->index_module_srl]) ? $__Context->module_list[$__Context->domain->index_module_srl]->browser_title : '' ?>
					</a><?php } ?>
				</td>
				<td class="nowr rx_detail_marks">
					<?php if($__Context->domain->index_document_srl){ ?><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getSiteUrl($__Context->domain->domain, '', 'mid', $__Context->module_list[$__Context->domain->index_module_srl]->mid, 'document_srl', $__Context->domain->index_document_srl), ENT_QUOTES, 'UTF-8', false) : (getSiteUrl($__Context->domain->domain, '', 'mid', $__Context->module_list[$__Context->domain->index_module_srl]->mid, 'document_srl', $__Context->domain->index_document_srl))) ?>" target="_blank">
						<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain->index_document_srl ?: '', ENT_QUOTES, 'UTF-8', false) : ($__Context->domain->index_document_srl ?: '')) ?>
					</a><?php } ?>
				</td>
				<td class="nowr">
					<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispAdminInsertDomain', 'domain_srl', $__Context->domain->domain_srl), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispAdminInsertDomain', 'domain_srl', $__Context->domain->domain_srl))) ?>"><?php echo $lang->cmd_modify ?></a>
					/
					<?php if($__Context->domain->is_default_domain !== 'Y'){ ?>
						<a href="#" data-domain="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain->domain, ENT_QUOTES, 'UTF-8', false) : ($__Context->domain->domain)) ?>" data-domain-srl="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->domain->domain_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->domain->domain_srl)) ?>" class="delete_domain"><?php echo $lang->cmd_delete ?></a>
					<?php } ?>
					<?php if($__Context->domain->is_default_domain === 'Y'){ ?>
						<span style="color:#aaa"><?php echo $lang->cmd_delete ?></span>
					<?php } ?>
					/
					<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispAdminCopyDomain', 'domain_srl', $__Context->domain->domain_srl), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispAdminCopyDomain', 'domain_srl', $__Context->domain->domain_srl))) ?>"><?php echo $lang->cmd_copy ?></a>
				</td>
			</tr><?php } ?>
			<?php if($__Context->page_navigation->total_count == 0){ ?><tr>
				<td><?php echo $lang->msg_no_result ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="x_clearfix">
		<div class="x_pull-left x_pagination" style="margin:0">
			<ul>
				<li<?php if($__Context->page == 1){ ?> class="x_disabled"<?php } ?>><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('page', ''), ENT_QUOTES, 'UTF-8', false) : (getUrl('page', ''))) ?>">&laquo; <?php echo $lang->first_page ?></a></li>
				<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
					<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('page', $__Context->page_no), ENT_QUOTES, 'UTF-8', false) : (getUrl('page', $__Context->page_no))) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->page_no, ENT_QUOTES, 'UTF-8', false) : ($__Context->page_no)) ?></a></li>
				<?php } ?>
				<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('page', $__Context->page_navigation->last_page), ENT_QUOTES, 'UTF-8', false) : (getUrl('page', $__Context->page_navigation->last_page))) ?>"><?php echo $lang->last_page ?> &raquo;</a></li>
			</ul>
		</div>
		<div class="x_pull-right x_btn-group">
			<a class="x_btn x_btn-inverse" href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispAdminInsertDomain'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispAdminInsertDomain'))) ?>"><?php echo $lang->cmd_new_domain ?></a>
		</div>
	</div>
</section>
<section class="section">
	<h2><?php echo $lang->cmd_multidomain_configuration ?></h2>
	<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procAdminUpdateDomains" />
		<input type="hidden" name="xe_validator_id" value="modules/admin/tpl/config_domains/1" />
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->cmd_unregistered_domain_action ?></label>
			<div class="x_controls">
				<label for="unregistered_domain_redirect_301">
					<input type="radio" name="unregistered_domain_action" id="unregistered_domain_redirect_301" value="redirect_301"<?php if(config('url.unregistered_domain_action') === 'redirect_301' || !config('url.unregistered_domain_action')){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_unregistered_domain_redirect_301 ?>
				</label>
				<label for="unregistered_domain_redirect_302">
					<input type="radio" name="unregistered_domain_action" id="unregistered_domain_redirect_302" value="redirect_302"<?php if(config('url.unregistered_domain_action') === 'redirect_302'){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_unregistered_domain_redirect_302 ?>
				</label>
				<label for="unregistered_domain_display">
					<input type="radio" name="unregistered_domain_action" id="unregistered_domain_display" value="display"<?php if(config('url.unregistered_domain_action') === 'display'){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_unregistered_domain_display ?>
				</label>
				<label for="unregistered_domain_block">
					<input type="radio" name="unregistered_domain_action" id="unregistered_domain_block" value="block"<?php if(config('url.unregistered_domain_action') === 'block'){ ?> checked="checked"<?php } ?> />
					<?php echo $lang->cmd_unregistered_domain_block ?>
				</label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->use_sso ?></label>
			<div class="x_controls">
				<label for="use_sso_y" class="x_inline"><input type="radio" name="use_sso" id="use_sso_y" value="Y"<?php if(config('use_sso')){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_yes ?></label>
				<label for="use_sso_n" class="x_inline"><input type="radio" name="use_sso" id="use_sso_n" value="N"<?php if(!config('use_sso')){ ?> checked="checked"<?php } ?> /> <?php echo $lang->cmd_no ?></label>
				<br />
				<p class="x_help-block"><?php echo $lang->about_use_sso ?></p>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<div class="x_pull-right">
				<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<script>
	jQuery(function($) {
		$("a.delete_domain").on("click", function(event) {
			event.preventDefault();
			var domain = $(this).data("domain");
			var domain_srl = $(this).data("domain-srl");
			if (confirm(<?php echo json_encode($lang->cmd_delete_domain) ?> + "\n" + domain)) {
				exec_json('admin.procAdminDeleteDomain', { domain_srl: domain_srl }, function() {
					window.location.reload();
				});
			}
		});
	});
</script>
