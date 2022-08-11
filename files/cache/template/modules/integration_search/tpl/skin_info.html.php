<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/integration_search/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/integration_search/tpl/skin_info/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<form action="<?php echo Context::getRequestUri() ?>" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
<input type="hidden" name="module" value="integration_search" />
<input type="hidden" name="act" value="procIntegration_searchAdminInsertSkin" />
<input type="hidden" name="xe_validator_id" value="modules/integration_search/tpl/skin_info/1" />
	<section class="section">
		<h1><?php echo $lang->skin_default_info ?></h1>
		<div class="x_control-group">
			<label class="x_control-label">
				<?php echo $lang->skin ?>
			</label>
			<div class="x_controls">
				<?php echo $__Context->skin_info->title ?>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">
				<?php echo $lang->skin_author ?>
			</label>
			<div class="x_controls">
				<?php $__loop_tmp=$__Context->skin_info->author;if($__loop_tmp)foreach($__loop_tmp as $__Context->author){ ?>
					<?php echo $__Context->author->name ?>
					<?php if($__Context->author->homepage || $__Context->author->email_address){ ?>
						(<?php if($__Context->author->homepage){ ?><a href="<?php echo $__Context->author->homepage ?>" target="_blank"><?php echo $__Context->author->homepage ?></a><?php } ?>
						<?php if($__Context->author->homepage && $__Context->author->email_address){ ?>, <?php } ?>
						<?php if($__Context->author->email_address){ ?><a href="mailto:<?php echo $__Context->author->email_address ?>"><?php echo $__Context->author->email_address ?></a><?php } ?>)
					<?php } ?><br />
				<?php } ?>
			</div>
		</div>
		<?php if($__Context->skin_info->homepage){ ?><div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->homepage ?>
			</label>
			<div class="x_controls">
				<a href="<?php echo $__Context->skin_info->homepage ?>" target="_blank"><?php echo $__Context->skin_info->homepage ?></a>
			</div>
		</div><?php } ?>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->date ?>
			</label>
			<div class="x_controls"><?php echo zdate($__Context->skin_info->date, 'Y-m-d') ?>
			</div>
		</div>
		<?php if($__Context->skin_info->license || $__Context->skin_info->license_link){ ?><div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->skin_license ?>
			</label>
			<div class="x_controls">
				<?php echo nl2br(trim($__Context->skin_info->license)) ?>
				<?php if($__Context->skin_info->license_link){ ?><p><a href="<?php echo $__Context->skin_info->license_link ?>" target="_blank"><?php echo $__Context->skin_info->license_link ?></a></p><?php } ?>
			</div>
		</div><?php } ?>
		<?php if($__Context->skin_info->description){ ?><div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->description ?>
			</label>
			<div class="x_controls"><?php echo nl2br(trim($__Context->skin_info->description)) ?>
			</div>
		</div><?php } ?>
	</section>
	<?php if($__Context->skin_info->extra_vars || $__Context->skin_info->colorset){ ?><section class="section">
		<h1><?php echo $lang->extra_vars ?></h1>
		<?php if($__Context->skin_info->colorset){ ?><div class="x_control-group">
			<label class="x_control-label"><?php echo $lang->colorset ?></label>
			<div class="x_controls">
				<?php $__loop_tmp=$__Context->skin_info->colorset;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?>
					<?php if($__Context->val->screenshot){ ?>
					<?php  $__Context->_img_info = getImageSize($__Context->val->screenshot); $__Context->_height = $__Context->_img_info[1]+40; $__Context->_width = $__Context->_img_info[0]+20; $__Context->_talign = "center";  ?>
					<?php }else{ ?>
					<?php  $__Context->_width = 200; $__Context->_height = 20; $__Context->_talign = "left";  ?>
					<?php } ?>
					<div style="display:inline-block;text-align:<?php echo $__Context->_talign ?>;margin-bottom:1em;width:<?php echo $__Context->_width ?>px;height:<?php echo $__Context->_height ?>px;margin-right:10px;">
						<label for="colorset_<?php echo $__Context->key ?>"><input type="radio" name="colorset" value="<?php echo $__Context->val->name ?>" id="colorset_<?php echo $__Context->key ?>"<?php if($__Context->skin_vars->colorset==$__Context->val->name){ ?> checked="checked"<?php } ?> />
						<?php echo $__Context->val->title ?></label>
						<?php if($__Context->val->screenshot){ ?>
							<br />
							<img src="/dev/modules/integration_search//<?php echo $__Context->val->screenshot ?>" alt="<?php echo $__Context->val->title ?>" style="border:1px solid #888888;padding:2px;margin:2px;"/>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div><?php } ?>
		<?php $__loop_tmp=$__Context->skin_info->extra_vars;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){;
if($__Context->skin_info->extra_vars){ ?>
			<?php if($__Context->val->group && ((!$__Context->group) || $__Context->group != $__Context->val->group)){ ?>
				<?php $__Context->group = $__Context->val->group ?>
				</section><?php } ?>
				<section class="section">
					<h2><?php echo $__Context->group ?></h2>
			<?php } ?>
			<div class="x_control-group">
				<label class="x_control-label"<?php if($__Context->val->type!='text'&&$__Context->val->type!='textarea'){ ?> for="<?php echo $__Context->val->name ?>"<?php };
if($__Context->val->type=='text'||$__Context->val->type=='textarea'){ ?> for="lang_<?php echo $__Context->val->name ?>"<?php } ?>><?php echo $__Context->val->title ?></label>
				<div class="x_controls">
					
					<?php if($__Context->val->type == 'text'){ ?><input type="text" name="<?php echo $__Context->val->name ?>" id="<?php echo $__Context->val->name ?>" value="<?php echo htmlspecialchars($__Context->val->value, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" class="lang_code" /><?php } ?>
					
					<?php if($__Context->val->type == 'textarea'){ ?><textarea rows="8" cols="42" name="<?php echo $__Context->val->name ?>" id="<?php echo $__Context->val->name ?>" class="lang_code"><?php echo htmlspecialchars($__Context->val->value, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?></textarea><?php } ?>
					
					<?php if($__Context->val->type == 'select'){ ?><select name="<?php echo $__Context->val->name ?>" id="<?php echo $__Context->val->name ?>">
						<?php $__loop_tmp=$__Context->val->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><option value="<?php echo $__Context->v->value ?>"<?php if($__Context->v->value == $__Context->val->value){ ?> selected="selected"<?php } ?>><?php echo $__Context->v->title ?></option><?php } ?>
					</select><?php } ?>
					
					<?php if($__Context->val->type == 'checkbox'){;
$__loop_tmp=$__Context->val->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="ch_<?php echo $__Context->key ?>_<?php echo $__Context->k ?>" class="x_inline"><input type="checkbox" name="<?php echo $__Context->val->name ?>[]" value="<?php echo $__Context->v->value ?>" id="ch_<?php echo $__Context->key ?>_<?php echo $__Context->k ?>"<?php if(@in_array($__Context->v->value, $__Context->val->value)){ ?> checked="checked"<?php } ?> class="checkbox" /> <?php echo $__Context->v->title ?></label><?php }} ?>
					
					<?php if($__Context->val->type == 'radio'){;
$__loop_tmp=$__Context->val->options;if($__loop_tmp)foreach($__loop_tmp as $__Context->k=>$__Context->v){ ?><label for="ch_<?php echo $__Context->key ?>_<?php echo $__Context->k ?>" class="x_inline"><input type="radio" name="<?php echo $__Context->val->name ?>" value="<?php echo $__Context->v->value ?>" id="ch_<?php echo $__Context->key ?>_<?php echo $__Context->k ?>"<?php if($__Context->v->value==$__Context->val->value){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->v->title ?></label><?php }} ?>
					
					<?php if($__Context->val->type == 'image'){ ?>
						<?php if($__Context->val->value){ ?><div>
							<img src="<?php echo $__Context->val->value ?>" /><br />
							<label for="del_<?php echo $__Context->val->name ?>"><input type="checkbox" name="del_<?php echo $__Context->val->name ?>" value="Y" id="del_<?php echo $__Context->val->name ?>" class="checkbox" /> <?php echo $lang->cmd_delete ?></label>
						</div><?php } ?>
						<input type="file" name="<?php echo $__Context->val->name ?>" value="" />
					<?php } ?>
					<?php if($__Context->val->description){ ?><span class="x_help-block"><?php echo nl2br(trim($__Context->val->description)) ?></span><?php } ?>
				</div>
			</div>
		<?php }} ?>
	</section>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button class="x_btn x_btn-primary" type="submit"><?php echo $lang->cmd_registration ?></button>
		</div>
	</div>
</form>
