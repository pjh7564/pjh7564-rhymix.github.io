<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_header.html') ?>
<form action="./" method="post" onsubmit="return procFilter(this, window.insert)" class="board_write"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="content" value="<?php echo $__Context->oDocument->getContentText() ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
	<div class="write_header">
		<?php if($__Context->module_info->use_category=='Y'){ ?><select name="category_srl">
			<option value=""><?php echo $lang->category ?></option>
			<?php $__loop_tmp=$__Context->category_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->val){ ?><option<?php if(!$__Context->val->grant){ ?> disabled="disabled"<?php } ?> value="<?php echo $__Context->val->category_srl ?>"<?php if($__Context->val->grant&&$__Context->val->selected||$__Context->val->category_srl==$__Context->oDocument->get('category_srl')){ ?> selected="selected"<?php } ?>>
				<?php echo str_repeat("&nbsp;&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> (<?php echo $__Context->val->document_count ?>)
			</option><?php } ?>
		</select><?php } ?>
		<?php if($__Context->oDocument->getTitleText()){ ?><input type="text" name="title" class="iText" title="<?php echo $lang->title ?>" value="<?php echo escape($__Context->oDocument->getTitleText(), false) ?>" /><?php } ?>
		<?php if(!$__Context->oDocument->getTitleText()){ ?><input type="text" name="title" class="iText" title="<?php echo $lang->title ?>" /><?php } ?>
		<?php if($__Context->grant->manager){ ?>
			<select name="is_notice">
				<option value="N"<?php if($__Context->oDocument->get('is_notice') === 'N'){ ?> selected="selected"<?php } ?>><?php echo $lang->not_notice ?></option>
				<option value="Y"<?php if($__Context->oDocument->get('is_notice') === 'Y'){ ?> selected="selected"<?php } ?>><?php echo $lang->notice ?></option>
				<option value="A"<?php if($__Context->oDocument->get('is_notice') === 'A'){ ?> selected="selected"<?php } ?>><?php echo $lang->notice_all ?></option>
			</select>
		<?php } ?>
	</div>
    <?php if(count($__Context->extra_keys)){ ?><div class="exForm">
		<?php if(count($__Context->extra_keys)){ ?><table border="1" cellspacing="0" summary="Extra Form">
			<caption><em>*</em> : <?php echo $lang->is_required ?></caption>
			<?php $__loop_tmp=$__Context->extra_keys;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><tr>
				<th scope="row"><?php if($__Context->val->is_required=='Y'){ ?><em>*</em><?php } ?> <?php echo $__Context->val->name ?></th>
				<td><?php echo $__Context->val->getFormHTML() ?></td>
			</tr><?php } ?>
		</table><?php } ?>
	</div><?php } ?>
    <div class="write_editor">
		<?php echo $__Context->oDocument->getEditor() ?>
	</div>
	<div class="write_footer">
		<div class="write_option">
			<?php if($__Context->grant->manager){ ?>
				<input type="checkbox" name="title_bold" id="title_bold" class="iCheck" value="Y"<?php if($__Context->oDocument->get('title_bold')=='Y'){ ?> checked="checked"<?php } ?> />
				<label for="title_bold"><?php echo $lang->title_bold ?></label>
			<?php } ?>
			<input type="checkbox" name="comment_status" class="iCheck" value="ALLOW"<?php if($__Context->oDocument->allowComment()){ ?> checked="checked"<?php } ?> id="comment_status" />
			<label for="comment_status"><?php echo $lang->allow_comment ?></label>
			<input type="checkbox" name="allow_trackback" class="iCheck" value="Y"<?php if($__Context->oDocument->allowTrackback()){ ?> checked="checked"<?php } ?> id="allow_trackback" />
			<label for="allow_trackback"><?php echo $lang->allow_trackback ?></label>
			<?php if($__Context->is_logged){ ?>
				<input type="checkbox" name="notify_message" class="iCheck" value="Y"<?php if($__Context->oDocument->useNotify()){ ?> checked="checked"<?php } ?> id="notify_message" />
				<label for="notify_message"><?php echo $lang->notify ?></label>
			<?php } ?>
			<?php if(is_array($__Context->status_list)){ ?>
				<?php if($__Context->status_list)foreach($__Context->status_list AS $__Context->key=>$__Context->value){ ?>
				<input type="radio" name="status" value="<?php echo $__Context->key ?>" id="<?php echo $__Context->key ?>" <?php if($__Context->oDocument->get('status') == $__Context->key || ($__Context->key == 'PUBLIC' && !$__Context->document_srl)){ ?>checked="checked"<?php } ?> /> 
				<label for="<?php echo $__Context->key ?>"><?php echo $__Context->value ?></label>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="write_author">
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<label for="userName" class="iLabel"><?php echo $lang->writer ?></label>
				<input type="text" name="nick_name" id="userName" class="iText userName" style="width:80px" value="<?php echo htmlspecialchars($__Context->oDocument->get('nick_name')) ?>" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<label for="userPw" class="iLabel"><?php echo $lang->password ?></label>
				<input type="password" name="password" id="userPw" class="iText userPw" style="width:80px" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<label for="homePage" class="iLabel"><?php echo $lang->homepage ?></label>
				<input type="text" name="homepage" id="homePage" class="iText homePage"  style="width:140px"value="<?php echo htmlspecialchars($__Context->oDocument->get('homepage')) ?>" />
			</span><?php } ?>
			<span class="item">
				<label for="tags" class="iLabel"><?php echo $lang->tag ?>: <?php echo $lang->about_tag ?></label>
				<input type="text" name="tags" id="tags" value="<?php echo htmlspecialchars($__Context->oDocument->get('tags')) ?>" class="iText" style="width:300px" title="Tag" />
			</span>
			<?php if($__Context->oDocument->get('document_srl') && isset($__Context->module_info->update_log) && $__Context->module_info->update_log == 'Y'){ ?><span class="item">
				<label for="reason_update" class="iLabel"><?php echo $lang->reason_update ?></label>
				<input type="text" name="reason_update" id="reason_update" value="" class="iText" style="width:300px" title="reason update" />
			</span><?php } ?>
		</div>
		<?php if(isset($__Context->captcha) && $__Context->captcha && $__Context->captcha->isTargetAction('document')){ ?><div class="write_captcha">
			<?php echo $__Context->captcha ?>
		</div><?php } ?>
		<div style="float:right">
			<?php if(!$__Context->oDocument->isExists() || $__Context->oDocument->get('status') == 'TEMP'){ ?>
			<?php if($__Context->is_logged){ ?><button class="btn" type="button" onclick="doDocumentSave(this);"><?php echo $lang->cmd_temp_save ?></button><?php } ?>
			<?php if($__Context->is_logged){ ?><button class="btn" type="button" onclick="doDocumentLoad(this);"><?php echo $lang->cmd_load ?></button><?php } ?>
			<?php } ?>
			<button type="submit" class="btn_insert"><i class="xi-pen"></i> <?php echo $lang->cmd_registration ?></button>
		</div>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_footer.html') ?>
