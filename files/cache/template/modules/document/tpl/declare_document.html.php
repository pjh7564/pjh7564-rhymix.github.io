<?php if(!defined("__XE__"))exit;
Context::addMetaTag('viewport', 'width=device-width, user-scalable=no', FALSE); ?>
<!--#Meta:modules/document/tpl/css/declare_document.css--><?php Context::loadFile(['modules/document/tpl/css/declare_document.css', '', '', '', []]); ?>
<?php Context::addJsFile("modules/document/ruleset/insertDeclare.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" id="fo_component" ><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" /><input type="hidden" name="ruleset" value="insertDeclare" />
	<input type="hidden" name="module" value="document" />
	<?php if($__Context->type == 'cancel'){ ?>
	<input type="hidden" name="act" value="procDocumentDeclareCancel" />
	<?php }else{ ?>
	<input type="hidden" name="act" value="procDocumentDeclare" />
	<?php } ?>
	<input type="hidden" name="target_srl" value="<?php echo $__Context->target_srl ?>" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'act', $__Context->act, 'target_srl', $__Context->target_srl) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/document/tpl/1" />
	<div class="x_modal-header">
		<h1><?php echo $lang->improper_document_declare ?> <?php if($__Context->type == 'cancel'){;
echo $lang->cmd_cancel;
} ?></h1>
	</div>
	<div class="x_modal-body x_form-horizontal" style="max-height:none">
		<blockquote>
			<section class="target_article">
				<h1><?php echo $__Context->target_document->getTitleText() ?></h1>
				<p><?php echo $__Context->target_document->getSummary(200) ?></p>
			</section>
		</blockquote>
		<?php if($__Context->type !== 'cancel'){ ?>
		<div class="x_control-group">
			<label class="x_control-label" for="message_option"><?php echo $lang->improper_document_declare_reason ?></label>
			<div class="x_controls">
				<select name="message_option" id="message_option">
					<?php $__loop_tmp=$lang->improper_document_reasons;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->text){ ?><option value="<?php echo $__Context->key ?>"><?php echo $__Context->text ?></option><?php } ?>
				</select>
				<textarea name="declare_message" id="declare_message"></textarea>
				<p><?php echo $lang->about_improper_document_declare ?><p>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="x_modal-footer">
		<span class="x_btn-group x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php if($__Context->type == 'cancel'){;
echo $lang->cmd_cancel_declare;
}else{;
echo $lang->cmd_submit;
} ?></button>
		</span>
	</div>
</form>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/document/tpl/1'){ ?><script>
	alert("<?php echo $__Context->XE_VALIDATOR_MESSAGE ?>");
	window.close();
</script><?php } ?>
<script>
	(function($){
		$(function() {
			setFixedPopupSize();
			$('select[name="message_option"]').change(function(){
				if ($(this).val()==='others') {
					$('#declare_message').show();
				} else {
					$('#declare_message').hide();
				}
				setFixedPopupSize();
			});
		});
	})(jQuery);
</script>
