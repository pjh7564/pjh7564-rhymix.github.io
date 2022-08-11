<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/point/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/point/tpl/module_cofig/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<p><?php echo $lang->about_module_point ?></p>
<form action="./" method="post" id="fo_point"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="point" />
	<input type="hidden" name="act" value="procPointAdminInsertModuleConfig" />
	<input type="hidden" name="xe_validator_id" value="modules/point/tpl/module_cofig/1" />
	<table class="x_table x_table-striped x_table-hover">
		<thead>
			<tr>
				<th scope="col"><?php echo $lang->module ?></th>
				<th scope="col"><?php echo $lang->point_insert_document ?></th>
				<th scope="col"><?php echo $lang->point_insert_comment ?></th>
				<th scope="col"><?php echo $lang->point_upload_file ?></th>
				<th scope="col"><?php echo $lang->point_download_file ?></th>
				<th scope="col"><?php echo $lang->point_read_document ?></th>
				<th scope="col"><?php echo $lang->point_voter ?></th>
				<th scope="col"><?php echo $lang->point_blamer ?></th>
				<th scope="col"><?php echo $lang->point_voter_comment ?></th>
				<th scope="col"><?php echo $lang->point_blamer_comment ?></th>
				<th scope="col"><?php echo $lang->point_download_file_author ?></th>
				<th scope="col"><?php echo $lang->point_read_document_author ?></th>
				<th scope="col"><?php echo $lang->point_voted ?></th>
				<th scope="col"><?php echo $lang->point_blamed ?></th>
				<th scope="col"><?php echo $lang->point_voted_comment ?></th>
				<th scope="col"><?php echo $lang->point_blamed_comment ?></th>
			</tr>
		</thead>
		<tbody>
			<?php $__loop_tmp=$__Context->mid_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><tr>
				<th scope="row" style="min-width:100px"><?php echo $__Context->val->browser_title ?><br /><span style="font-size:11px;font-weight:normal">(<?php echo $__Context->val->mid ?>)</span></th>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="insert_document[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['insert_document'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="insert_comment[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['insert_comment'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="upload_file[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['upload_file'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="download_file[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['download_file'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="read_document[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['read_document'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="voter[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['voter'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="blamer[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['blamer'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="voter_comment[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['voter_comment'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="blamer_comment[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['blamer_comment'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>				
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="download_file_author[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['download_file_author'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="read_document_author[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['read_document_author'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="voted[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['voted'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="blamed[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['blamed'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="voted_comment[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['voted_comment'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>
				<td class="nowr"><input type="number" style="width:40px;text-align:right" name="blamed_comment[<?php echo $__Context->val->module_srl ?>]" value="<?php echo $__Context->module_config[$__Context->val->module_srl]['blamed_comment'] ?>" title="<?php echo $__Context->config->point_name ?>" /></td>				
			</tr><?php } ?>
		</tbody>
	</table>
    <div class="x_clearfix">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_registration ?>" /></span>
	</div>
</form>
