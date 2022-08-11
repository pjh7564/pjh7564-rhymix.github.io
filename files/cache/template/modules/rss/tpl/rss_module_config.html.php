<?php if(!defined("__XE__"))exit;?><section class="section">
	<h1><?php echo $lang->open_rss ?></h1>
	<p><?php echo $lang->about_open_rss ?></p>
	
	<?php Context::addJsFile("modules/rss/ruleset/insertRssModuleConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertRssModuleConfig" />
		<input type="hidden" name="module" value="rss" />
		<input type="hidden" name="act" value="procRssAdminInsertModuleConfig" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		<input type="hidden" name="target_module_srl" value="<?php echo $__Context->module_config->module_srl ?: $__Context->module_srls ?>" />
		
		<div class="x_control-group">
			<label for="open_rss" class="x_control-label"><?php echo $lang->open_rss ?></label>
			<div class="x_controls">
				<select name="open_rss" id="open_rss">
					<?php $__loop_tmp=$lang->open_rss_types;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_config->open_rss == $__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label for="open_total_feed" class="x_control-label"><?php echo $lang->open_feed_to_total ?></label>
			<div class="x_controls">
				<select name="open_total_feed" id="open_total_feed">
					<option value="N"<?php if($__Context->module_config->open_total_feed == 'N'){ ?> selected="selected"<?php } ?>><?php echo $lang->use ?></option>
					<option value="T_N"<?php if($__Context->module_config->open_total_feed == 'T_N'){ ?> selected="selected"<?php } ?>><?php echo $lang->notuse ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label for="feed_description" class="x_control-label"><?php echo $lang->description ?></label>
			<div class="x_controls">
				<textarea name="feed_description" id="feed_description" rows="4" cols="42" style="float:left;margin-right:8px"><?php echo escape($__Context->module_config->feed_description) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_feed_description ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label for="feed_copyright" class="x_control-label"><?php echo $lang->feed_copyright ?></label>
			<div class="x_controls">
				<textarea name="feed_copyright" id="feed_copyright" rows="4" cols="42" style="float:left;margin-right:8px"><?php echo escape($__Context->module_config->feed_copyright) ?></textarea>
				<p class="x_help-block"><?php echo $lang->about_feed_copyright ?></p>
			</div>
		</div>
		<div class="btnArea">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</div>
	</form>
</section>
