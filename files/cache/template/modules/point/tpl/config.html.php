<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/point/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/point/tpl/config/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/point/ruleset/insertConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" id="point_module_config_form" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertConfig" />
	<input type="hidden" name="module" value="point" />
	<input type="hidden" name="act" value="procPointAdminInsertConfig" />
	<input type="hidden" name="xe_validator_id" value="modules/point/tpl/config/1" />
	<section class="section default">
		<h1><?php echo $lang->is_default ?></h1>
		<div class="x_control-group module_io">
			<label for="able_module" class="x_control-label"><?php echo $lang->point_io ?></label>
			<div class="x_controls" style="padding-top:3px">
				<input type="checkbox" name="able_module" id="able_module" value="Y"<?php if(!$__Context->config->able_module||$__Context->config->able_module=='Y'){ ?> checked="checked"<?php } ?> />
				<span class="x_help-inline"><?php echo $lang->about_point_io ?></span>
			</div>
		</div>
		<div class="x_control-group">
			<label for="point_name" class="x_control-label"><?php echo $lang->point_name ?></label>
			<div class="x_controls">
				<input type="text" value="<?php echo $__Context->config->point_name ?>" name="point_name" id="point_name" style="width:50px" />
				<p class="x_help-block"><?php echo $lang->about_point_name ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="max_level" class="x_control-label"><?php echo $lang->max_level ?></label>
			<div class="x_controls">
				<input type="number" min="0" value="<?php echo $__Context->config->max_level ?>" name="max_level" id="max_level" />
				<p class="x_help-block"><?php echo $lang->about_max_level ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="level_icon" class="x_control-label"><?php echo $lang->level_icon ?></label>
			<div class="x_controls">
				<select name="level_icon" id="level_icon">
					<?php if($__Context->level_icon_list)foreach($__Context->level_icon_list as $__Context->key => $__Context->val){ ?>
					<option value="<?php echo $__Context->val ?>"<?php if($__Context->config->level_icon == $__Context->val){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
					<?php } ?>
				</select>
				<span class="x_help-block"><?php echo $lang->about_level_icon ?></span>
			</div>
		</div>
		<div class="x_control-group">
			<label for="disable_download" class="x_control-label"><?php echo $lang->disable_download ?></label>
			<div class="x_controls" style="padding-top:3px">
				<input type="checkbox" name="disable_download" id="disable_download" value="Y"<?php if($__Context->config->disable_download=='Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->about_disable_download ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="disable_read_document" class="x_control-label"><?php echo $lang->disable_read_document ?></label>
			<div class="x_controls" style="padding-top:3px">
				<input type="checkbox" name="disable_read_document" id="disable_read_document" value="Y"<?php if($__Context->config->disable_read_document=='Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->about_disable_read_document ?> &nbsp;
				<input type="checkbox" name="disable_read_document_except_robots" id="disable_read_document_except_robots" value="Y"<?php if($__Context->config->disable_read_document_except_robots == 'Y'){ ?> checked="checked"<?php } ?> />
				<?php echo $lang->disable_read_document_except_robots ?>
			</div>
		</div>
		<div class="x_clearfix">
			<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
		</div>
	</section>
	<section class="section">
		<h1><?php echo $lang->give_point ?></h1>
		<?php  $__Context->config_array = get_object_vars($__Context->config) ?>
		<?php  $__Context->config_array['insert_comment_limit'] = $__Context->config_array['insert_comment_limit'] ?: $__Context->config_array['no_point_date'] ?>
		<?php  $__Context->action_types = array(
			'insert_document' => ['time_limit' => 0, 'except_notice' => 0, 'revert_on_delete' => 1],
			'insert_comment' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 1],
			'upload_file' => ['time_limit' => 0, 'except_notice' => 0, 'revert_on_delete' => 1],
			'download_file' => ['time_limit' => 0, 'except_notice' => 0, 'revert_on_delete' => 0],
			'read_document' => ['time_limit' => 1, 'except_notice' => 1, 'revert_on_delete' => 0],
			'voter' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
			'blamer' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
			'voter_comment' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
			'blamer_comment' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
			'download_file_author' => ['time_limit' => 0, 'except_notice' => 0, 'revert_on_delete' => 0],
			'read_document_author' => ['time_limit' => 1, 'except_notice' => 1, 'revert_on_delete' => 0],
			'voted' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
			'blamed' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
			'voted_comment' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
			'blamed_comment' => ['time_limit' => 1, 'except_notice' => 0, 'revert_on_delete' => 0],
		) ?>
		
		<table class="x_table x_table-striped x_table-hover">
			<tbody>
				<tr>
					<th class="nowr"><?php echo $lang->cmd_signup ?></td>
					<td class="nowr">
						<?php echo strtr($lang->point_given_prefix, ['$'.'point' => $__Context->config->point_name]) ?>
						<input type="number" value="<?php echo $__Context->config->signup_point ?: '0' ?>" name="signup_point" id="signup_point" />
						&nbsp;<?php echo strtr($lang->point_given_suffix, ['$'.'point' => $__Context->config->point_name]) ?>
					</td>
					<td class="nowr"></td>
				</tr>
				<tr>
					<th class="nowr"><?php echo $lang->cmd_login ?></td>
					<td class="nowr">
						<?php echo strtr($lang->point_given_prefix, ['$'.'point' => $__Context->config->point_name]) ?>
						<input type="number" value="<?php echo $__Context->config->login_point ?: '0' ?>" name="login_point" id="login_point" />
						&nbsp;<?php echo strtr($lang->point_given_suffix, ['$'.'point' => $__Context->config->point_name]) ?>
					</td>
					<td class="nowr"></td>
				</tr>
				<?php if($__Context->action_types)foreach($__Context->action_types as $__Context->action_type => $__Context->action_config){ ?>
					<tr>
						<th class="nowr"><?php echo lang('point_' . $__Context->action_type) ?></td>
						<td class="nowr">
							<?php echo strtr($lang->point_given_prefix, ['$'.'point' => $__Context->config->point_name]) ?>
							<input type="number" value="<?php echo $__Context->config_array[$__Context->action_type] ?: '0' ?>" name="<?php echo $__Context->action_type ?>" id="<?php echo $__Context->action_type ?>" />
							&nbsp;<?php echo strtr($lang->point_given_suffix, ['$'.'point' => $__Context->config->point_name]) ?>
							<?php if($__Context->action_config['except_notice']){ ?>
								<label class="x_inline" for="<?php echo $__Context->action_type ?>_except_notice" style="margin-left:10px">
									<input type="checkbox" value="Y" name="<?php echo $__Context->action_type ?>_except_notice" id="<?php echo $__Context->action_type ?>_except_notice"<?php if($__Context->config_array[$__Context->action_type . '_except_notice']){ ?> checked="checked"<?php } ?> />
									<?php echo $lang->cmd_point_except_notice ?>
								</label>
							<?php } ?>
							<?php if($__Context->action_config['revert_on_delete']){ ?>
								<label class="x_inline" for="<?php echo $__Context->action_type ?>_revert_on_delete" style="margin-left:10px">
									<input type="checkbox" value="Y" name="<?php echo $__Context->action_type ?>_revert_on_delete" id="<?php echo $__Context->action_type ?>_revert_on_delete"<?php if($__Context->config_array[$__Context->action_type . '_revert_on_delete'] !== false){ ?> checked="checked"<?php } ?> />
									<?php echo $lang->cmd_point_revert_on_delete ?>
								</label>
							<?php } ?>
						</td>
						<td class="nowr">
							<?php if($__Context->action_config['time_limit']){ ?>
								<?php echo $lang->point_time_limit_prefix ?>&nbsp;
								<input type="number" value="<?php echo $__Context->config_array[$__Context->action_type . '_limit'] ?: '' ?>" name="<?php echo $__Context->action_type ?>_limit" id="<?php echo $__Context->action_type ?>_limit" />
								&nbsp;<?php echo $lang->point_time_limit_suffix ?>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
			
		<div class="x_clearfix">
			<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
		</div>
	</section>
	<section class="section">
		<h1><?php echo $lang->point_link_group ?></h1>
		<p><?php echo $lang->about_point_link_group ?></p>
		<div class="x_control-group">
			<label for="group_reset" class="x_control-label"><?php echo $lang->point_group_reset_type ?></label>
			<div class="x_controls">
				<select name="group_reset" id="group_reset">
					<option value="Y"<?php if($__Context->config->group_reset != 'N'){ ?> selected="selected"<?php } ?> /><?php echo $lang->point_group_reset_and_add ?></option>
					<option value="N"<?php if($__Context->config->group_reset == 'N'){ ?> selected="selected"<?php } ?> /><?php echo $lang->point_group_add_only ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label for="group_ratchet" class="x_control-label"><?php echo $lang->point_group_ratchet ?></label>
			<div class="x_controls">
				<select name="group_ratchet" id="group_ratchet">
					<option value="Y"<?php if($__Context->config->group_ratchet == 'Y'){ ?> selected="selected"<?php } ?> /><?php echo $lang->point_group_ratchet_yes ?></option>
					<option value="N"<?php if($__Context->config->group_ratchet != 'Y'){ ?> selected="selected"<?php } ?> /><?php echo $lang->point_group_ratchet_no ?></option>
				</select>
			</div>
		</div>
		<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){;
if($__Context->val->is_admin != 'Y'){ ?><div class="x_control-group">
			<label class="x_control-label" for="point_group_<?php echo $__Context->key ?>"><?php echo $__Context->val->title ?></label>
			<div class="x_controls">
				<?php if($__Context->val->is_default != 'Y'){ ?>
				<input type="number" min="0" max="1000" value="<?php echo $__Context->config->point_group[$__Context->key] ?>" name="point_group_<?php echo $__Context->key ?>" id="point_group_<?php echo $__Context->key ?>" style="width:50px" />
				&nbsp;<?php echo $lang->level ?>
				<?php } ?>
				<?php if($__Context->val->is_default == 'Y'){ ?><span style="display:inline-block;padding-top:3px"><?php echo $lang->default_group ?></span><?php } ?>
			</div>
		</div><?php }} ?>
		<div class="x_clearfix btnArea">
			<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
		</div>
	</section>
	<section class="section">
		<?php $__Context->point_group = @array_flip($__Context->config->point_group ?? []) ?>
		<h1><?php echo $lang->level_point ?></h1>
		<div class="x_clearfix">
			<p class="x_pull-left"><?php echo $lang->expression ?></p>
			<span class="x_pull-right x_input-append">
				<input type="text" value="<?php echo $__Context->config->expression ?>" placeholder="Math.pow(i,2) * 90" size="30" class="level_expression" />
				<button type="button" class="x_btn calc_point"><?php echo $lang->level_point_calc ?></button> 
				<button type="button" class="x_btn calc_point _reset"><?php echo $lang->cmd_exp_reset ?></button>
			</span>
		</div>
		<table class="x_table x_table-striped x_table-hover">
			<tr>
				<th scope="col"><?php echo $lang->level ?></th>
				<th scope="col"><?php echo $lang->level_icon ?></th>
				<th scope="col"><?php echo $lang->point ?></th>
				<th scope="col"><?php echo $lang->member_group ?></th>
			</tr>
			<tr>
				<td>1</td>
				<td><img src="<?php echo getUrl() ?>modules/point/icons/<?php echo $__Context->config->level_icon ?>/1.<?php echo $__Context->config->level_icon_type ?? 'gif' ?>" alt="1" /></td>
				<td><label for="level_step_1" style="margin:0"><input type="number" id="level_step_1" class="level_step" value="<?php echo $__Context->config->level_step[1] ?>" style="width:120px;text-align:right" /> <?php echo $__Context->config->point_name ?></label></td>
<?php $__Context->point_group_item = $__Context->point_group[1] ?>
<?php $__Context->title=array() ?>
<?php if($__Context->point_group_item){ ?>
<?php if($__Context->config->group_reset != 'N'){ ?>
<?php $__Context->title[0] = $__Context->group_list[$__Context->point_group_item.'']->title ?>
<?php }else{ ?>
<?php $__Context->title[] = $__Context->group_list[$__Context->point_group_item.'']->title ?>
<?php } ?>
<?php } ?>
				<td><?php echo implode(', ', $__Context->title) ?></td>
			</tr>
			<?php for($__Context->i=2;$__Context->i<=$__Context->config->max_level;$__Context->i++){ ?>
<?php $__Context->point_group_item = $__Context->point_group[$__Context->i] ?>
<?php if($__Context->point_group_item){ ?>
<?php if($__Context->config->group_reset != 'N'){ ?>
<?php $__Context->title[0] = $__Context->group_list[$__Context->point_group_item.'']->title ?>
<?php }else{ ?>
<?php $__Context->title[] = $__Context->group_list[$__Context->point_group_item.'']->title ?>
<?php } ?>
<?php } ?>
			<tr class="row<?php echo (($__Context->i-1)%2+1) ?>">
				<td><?php echo $__Context->i ?></td>
				<td><img src="<?php echo getUrl() ?>modules/point/icons/<?php echo $__Context->config->level_icon ?>/<?php echo $__Context->i ?>.<?php echo $__Context->config->level_icon_type ?? 'gif' ?>" alt="<?php echo $__Context->i ?>" /></td>
				<td><label for="level_step_<?php echo $__Context->i ?>" style="margin:0"><input type="number" id="level_step_<?php echo $__Context->i ?>" class="level_step" value="<?php echo $__Context->config->level_step[$__Context->i] ?>" style="width:120px;text-align:right" /> <?php echo $__Context->config->point_name ?></label></td>
				<td><?php echo implode(', ', $__Context->title) ?></td>
			</tr>
			<?php } ?>
		</table>
		<div class="x_clearfix">
			<input id="level_step" name="level_step" type="hidden" value="<?php echo implode(',', $__Context->config->level_step) ?>" />
			<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>" /></span>
		</div>
	</section>
	<section class="section">
		<h1><?php echo $lang->cmd_point_recal ?></h1>
		<p><input class="x_btn x_btn-warning" type="button" value="<?php echo $lang->cmd_point_recal ?>" onclick="doPointRecal()" /></p>
		<p><?php echo $lang->about_cmd_point_recal ?></p>
		<p id="pointReCal"></p>
	</section>
</form>
