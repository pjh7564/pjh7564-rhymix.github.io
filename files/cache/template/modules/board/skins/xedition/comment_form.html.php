<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_header.html') ?>
<?php if($__Context->oSourceComment->isExists()){ ?><div class="context_data">
	<h3 class="author">
		<?php if($__Context->oSourceComment->homepage){ ?><a href="<?php echo $__Context->oSourceComment->homepage ?>"><?php echo $__Context->oSourceComment->getNickName() ?></a><?php } ?>
		<?php if(!$__Context->oSourceComment->homepage){ ?><strong><?php echo $__Context->oSourceComment->getNickName() ?></strong><?php } ?>
	</h3>
	<?php echo $__Context->oSourceComment->getContent(false) ?>
</div><?php } ?>
<div class="feedback">
	<form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="write_comment"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->oComment->get('document_srl') ?>" />
		<input type="hidden" name="comment_srl" value="<?php echo $__Context->oComment->get('comment_srl') ?>" />
		<input type="hidden" name="parent_srl" value="<?php echo $__Context->oComment->get('parent_srl') ?>" />
        <input type="hidden" name="content" value="<?php echo htmlspecialchars($__Context->oComment->get('content')) ?>" />
        <?php echo $__Context->oComment->getEditor() ?>
		<div class="write_author">
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<label for="userName" class="iLabel"><?php echo $lang->writer ?></label>
				<input type="text" name="nick_name" id="userName" class="iText userName" value="<?php echo $__Context->oComment->getNickName() ?>" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<label for="userPw" class="iLabel"><?php echo $lang->password ?></label>
				<input type="password" name="password" id="userPw" class="iText userPw" />
			</span><?php } ?>
			<?php if(!$__Context->is_logged){ ?><span class="item">
				<label for="homePage" class="iLabel"><?php echo $lang->homepage ?></label>
				<input type="text" name="homepage" id="homePage" class="iText homePage" value="<?php echo htmlspecialchars($__Context->oComment->get('homepage')) ?>" />
			</span><?php } ?>
			<?php if($__Context->is_logged){ ?><input type="checkbox" name="notify_message" value="Y"<?php if($__Context->oComment->get('notify_message')=='Y'){ ?> checked="checked"<?php } ?> id="notify_message" class="iCheck" /><?php } ?>
			<?php if($__Context->is_logged){ ?><label for="notify_message"><?php echo $lang->notify ?></label><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><input type="checkbox" name="is_secret" value="Y" id="is_secret"<?php if($__Context->oComment->get('is_secret')=='Y'){ ?> checked="checked"<?php } ?> class="iCheck" /><?php } ?>
			<?php if($__Context->module_info->secret=='Y'){ ?><label for="is_secret"><?php echo $lang->secret ?></label><?php } ?>
		</div>
		<?php if(isset($__Context->captcha) && $__Context->captcha && $__Context->captcha->isTargetAction('comment')){ ?><div class="write_captcha">
			<?php echo $__Context->captcha ?>
		</div><?php } ?>
		<div style="float:right">
			<button type="submit" class="btn_insert"><i class="xi-message"></i> <?php echo $lang->cmd_comment_registration ?></button>
		</div>
	</form>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/xedition','_footer.html') ?>
