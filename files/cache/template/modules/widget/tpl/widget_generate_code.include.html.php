<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/module/tpl/js/multi_order.js--><?php Context::loadFile(['modules/module/tpl/js/multi_order.js', '', '', '']); ?>
<!--#Meta:modules/module/tpl/js/module_list.js--><?php Context::loadFile(['modules/module/tpl/js/module_list.js', '', '', '']); ?>
<!--#Meta:modules/module/tpl/js/mid.js--><?php Context::loadFile(['modules/module/tpl/js/mid.js', '', '', '']); ?>
<!--#JSPLUGIN:spectrum--><?php Context::loadJavascriptPlugin('spectrum'); ?>
<div class="x_control-group">
	<label class="x_control-label" for="skin"><?php echo $lang->skin ?></label>
	<div class="x_controls">
		<select name="skin" id="skin">
			<option value=""><?php echo $lang->select ?></option>
			<?php $__loop_tmp=$__Context->skin_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->skin_name=>$__Context->skin){ ?><option value="<?php echo $__Context->skin_name ?>"><?php echo $__Context->skin->title ?>(<?php echo $__Context->skin_name ?>)</option><?php } ?>
		</select>
		<input type="button" class="x_btn" value="<?php echo $lang->cmd_select ?>" />
	</div>
</div>
<div class="x_control-group">
	<label class="x_control-label" for="colorset"><?php echo $lang->colorset ?></label>
	<div class="x_controls">
		<select name="colorset" id="widget_colorset">
		</select>
	</div>
</div>
<div class="x_control-group">
	<label class="x_control-label" for="widget_cache"><?php echo $lang->widget_cache ?></label>
	<div class="x_controls">
		<input type="number" name="widget_cache" id="widget_cache" value="0" size="5" />
		<select name="widget_cache_unit" id="widget_cache_unit" style="width:60px;min-width:60px">
			<option value="s"><?php echo $lang->unit_sec ?></option>
			<option value="m" selected="selected"><?php echo $lang->unit_min ?></option>
			<option value="h"><?php echo $lang->unit_hour ?></option>
			<option value="d"><?php echo $lang->unit_day ?></option>
		</select>
		<br />
		<p class="x_help-inline"><?php echo $lang->about_widget_cache ?></p>
	</div>
</div>
<?php $__Context->suggestion_id = 0 ?>
<?php $__loop_tmp=$__Context->widget_info->extra_var;if($__loop_tmp)foreach($__loop_tmp as $__Context->id=>$__Context->var){ ?>
	<?php $__Context->suggestion_id++ ?>
	<?php if(!$__Context->not_first && !$__Context->var->group){ ?><section class="extra_vars section"><?php } ?>
	<?php if($__Context->group != $__Context->var->group){ ?>
		<?php if($__Context->not_first){ ?></section><?php } ?>
		<section class="extra_vars section">
		<h1><?php echo $__Context->var->group ?></h1>
		<?php $__Context->group = $__Context->var->group ?>
	<?php } ?>
	<?php $__Context->not_first = true ?>
	<div class="x_control-group <?php if($__Context->var->type == 'mid' || $__Context->var->type == 'module_srl_list'){ ?>moduleSearch moduleSearch1 modulefinder<?php } ?>">
		<label class="x_control-label"<?php if($__Context->var->type != 'radio' && $__Context->var->type != 'checkbox'){ ?> for="<?php echo $__Context->id ?>"<?php } ?>><?php echo $__Context->var->name ?></label>
		<div class="x_controls">
			<?php if($__Context->var->type == 'text'){ ?>
				<input type="text" name="<?php echo $__Context->id ?>" />
			<?php } ?>
			<?php if($__Context->var->type == 'color'){ ?>
				<input type="text" name="<?php echo $__Context->id ?>" value="" id="<?php echo $__Context->id ?>" class="rx-spectrum" style="width:178px" />
			<?php } ?>
			<?php if($__Context->var->type == 'textarea'){ ?>
				<?php if($__Context->var->type == 'textarea'){ ?><textarea name="<?php echo $__Context->id ?>" id="<?php echo $__Context->id ?>" rows="8" cols="42"></textarea><?php } ?>
			<?php } ?>
			<?php if($__Context->var->type == 'select'){ ?>
				<select name="<?php echo $__Context->id ?>" id="<?php echo $__Context->id ?>">
					<?php $__loop_tmp=$__Context->var->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"><?php echo $__Context->val ?></option><?php } ?>
				</select>
			<?php } ?>
			<?php if($__Context->var->type == 'select-multi-order'){ ?>
				<?php if($__Context->var->init_options && is_array($__Context->var->init_options)){ ?>
				<?php $__Context->inits = array_keys($__Context->var->init_options) ?>
				<input type="hidden" name="<?php echo $__Context->id ?>" value="<?php echo implode(',', $__Context->inits) ?>" />
				<?php }else{ ?>
				<input type="hidden" name="<?php echo $__Context->id ?>" value="" />
				<?php } ?>
				<div style="display:inline-block;padding-top:3px">
					<label><?php echo $lang->display_no ?></label>
					<select class="multiorder_show" size="8" multiple="multiple" style="vertical-align:top;margin-bottom:5px">
						<?php $__loop_tmp=$__Context->var->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){;
if(!$__Context->var->init_options[$__Context->key]){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->var->default_options[$__Context->key]){ ?> default="true"<?php } ?>><?php echo $__Context->val ?></option><?php }} ?>
					</select>
					<br>
					<button type="button" class="x_btn multiorder_add" style="vertical-align:top"><?php echo $lang->cmd_insert ?></button>
				</div>
				<div style="display:inline-block;padding-top:3px">
					<label><?php echo $lang->display_yes ?></label>
					<select class="multiorder_selected" size="8" multiple="multiple" style="vertical-align:top;margin-bottom:5px">
						<?php $__loop_tmp=$__Context->var->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){;
if($__Context->var->init_options[$__Context->key]){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->var->default_options[$__Context->key]){ ?> default="true"<?php } ?>><?php echo $__Context->val ?></option><?php }} ?>
					</select>
					<br>
					<button type="button" class="x_btn multiorder_up" style="margin:0 -5px 0 0;border-radius:2px 0 0 2px"><?php echo $lang->cmd_move_up ?></button>
					<button type="button" class="x_btn multiorder_down" style="margin:0 -5px 0 0;border-radius:0"><?php echo $lang->cmd_move_down ?></button>
					<button type="button" class="x_btn multiorder_del" style="border-radius:0 2px 2px 0"><?php echo $lang->cmd_delete ?></button>
				</div>
				<script>
					xe.registerApp(new xe.MultiOrderManager('<?php echo $__Context->id ?>'));
				</script>
			<?php } ?>
			<?php if($__Context->var->type == 'mid_list'){ ?>
				<?php $__loop_tmp=$__Context->mid_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->module_category_srl=>$__Context->modules){ ?><fieldset>
					<?php if(count($__Context->mid_list) > 1){ ?>
						<?php if($__Context->modules->title){ ?><legend><?php echo $__Context->modules->title ?></legend><?php } ?>
						<?php if(!$__Context->modules->title){ ?><legend><?php echo $lang->none_category ?></legend><?php } ?>
					<?php } ?>
					<?php $__loop_tmp=$__Context->modules->list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><div>
						<label class="x_inline"><input type="checkbox" value="<?php echo $__Context->key ?>" name="<?php echo $__Context->id ?>" /> <?php echo $__Context->key ?> (<?php echo $__Context->val->browser_title ?>)</label>
					</div><?php } ?>
				</fieldset><?php } ?>
			<?php } ?>
			<?php if($__Context->var->type == 'member_group'){ ?>
				<?php $__loop_tmp=$__Context->group_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?>
					<label class="x_inline"><input type="checkbox" value="<?php echo $__Context->key ?>" name="<?php echo $__Context->id ?>" id="chk_member_gruop_<?php echo $__Context->id ?>_<?php echo $__Context->key ?>" /> <?php echo $__Context->val->title ?></label>
				<?php } ?>
			<?php } ?>
			<?php if($__Context->var->type == 'module_srl_list'){ ?>
				<input type="hidden" name="<?php echo $__Context->id ?>" value="" />
				<select class="modulelist_selected" size="8" multiple="multiple" style="vertical-align:top;margin-bottom:5px"></select>
				<p class="x_help-inline"><?php echo $__Context->var->description ?></p>
				<br>
				<a href="#" id="__module_srl_list_<?php echo $__Context->id ?>" class="x_btn moduleTrigger" data-multiple="true" style="margin:0 -5px 0 0;border-radius:2px 0 0 2px"><?php echo $lang->cmd_add ?></a>
				<button type="button" class="x_btn modulelist_up" style="margin:0 -5px 0 0;border-radius:0"><?php echo $lang->cmd_move_up ?></button>
				<button type="button" class="x_btn modulelist_down" style="margin:0 -5px 0 0;border-radius:0"><?php echo $lang->cmd_move_down ?></button>
				<button type="button" class="x_btn modulelist_del" style="border-radius:0 2px 2px 0"><?php echo $lang->cmd_delete ?></button>
				<script>
					xe.registerApp(new xe.ModuleListManager('<?php echo $__Context->id ?>'));
				</script>
			<?php } ?>
			<?php if($__Context->var->type == 'mid'){ ?>
				<input type="hidden" name="<?php echo $__Context->id ?>" value="" />
				<input type="text" readonly="readonly" />
				<a href="#" class="x_btn moduleTrigger"><?php echo $lang->cmd_select ?></a>
				<button type="button" class="x_btn delete"><?php echo $lang->cmd_delete ?></button>
				<script>
					xe.registerApp(new xe.MidManager('<?php echo $__Context->id ?>'));
				</script>
			<?php } ?>
			<?php if($__Context->var->type == 'filebox'){ ?>
				<?php $__Context->use_filebox = true ?>
				<input type="hidden" name="<?php echo $__Context->id ?>" />
				<a class="x_btn modalAnchor filebox" href="#modalFilebox"><?php echo $lang->cmd_select ?></a>
			<?php } ?>
			<?php if($__Context->var->type == 'menu'){ ?>
				<select name="<?php echo $__Context->id ?>">
					<option value="">-</option>
					<?php $__loop_tmp=$__Context->menu_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->menu_srl ?>"><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
			<?php } ?>
			<?php if($__Context->var->type == 'radio'){ ?>
				<?php $__loop_tmp=$__Context->var->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><label>
					<input type="radio" name="<?php echo $__Context->id ?>" id="<?php echo $__Context->id ?>_<?php echo $__Context->key ?>" value="<?php echo $__Context->key ?>" > <?php echo $__Context->val ?>
				</label><?php } ?>
			<?php } ?>
			<?php if($__Context->var->type == 'checkbox'){ ?>
				<?php $__loop_tmp=$__Context->var->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><label>
					<input type="checkbox" name="<?php echo $__Context->id ?>" id="<?php echo $__Context->id ?>_<?php echo $__Context->key ?>" value="<?php echo $__Context->key ?>" > <?php echo $__Context->val ?>
				</label><?php } ?>
			<?php } ?>
			<?php if($__Context->var->description){ ?><p><?php echo $__Context->var->description ?></p><?php } ?>
		</div>
	</div>
<?php } ?>
</section>
<script>
	xe.current_lang = "<?php echo $__Context->lang_type ?>";
</script>
