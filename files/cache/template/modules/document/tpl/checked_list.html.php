<?php if(!defined("__XE__"))exit;
require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/document/tpl/filter','manage_checked_document.xml');$__xmlFilter->compile(); ?>
<!--#Meta:modules/document/tpl/js/document_admin.js--><?php Context::loadFile(['modules/document/tpl/js/document_admin.js', '', '', '']); ?>
<?php Context::addMetaTag('viewport', 'width=device-width', FALSE); ?>
<form action="./" method="get" id="fo_management"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<input type="hidden" name="module" value="document" />
	<input type="hidden" name="type" value="" />
	<div class="x_modal-header">
		<h1><?php echo $lang->cmd_manage_document ?></h1>
	</div>
	<div class="x_modal-body x_form-horizontal" style="max-height:none">
		<?php if(count($__Context->document_list)==0){ ?>
		<p><?php echo $lang->msg_not_selected_document ?></p>
		<?php }else{ ?>
		<div class="x_control-group">
			<div class="x_control-label"><?php echo $lang->checked_count ?>(<?php echo count($__Context->document_list) ?>)</div>
			<div class="x_controls">
				<ul style="margin-top:5px">
					<?php $__loop_tmp=$__Context->document_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->document){ ?><li class="document_list">
						<input type="hidden" name="cart" value="<?php echo $__Context->document->document_srl ?>" /><?php echo $__Context->document->getTitle() ?> <i class="vr">|</i> <?php echo $__Context->document->getNickName() ?>
					</li><?php } ?>
				</ul>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="_target_module"><?php echo $lang->move_target_module ?></label>
			<div class="x_controls">
				<span class="x_input-append">
					<input type="hidden" name="target_module_srl" id="target_module" value="<?php echo $__Context->module_srl ?>" />
					<input type="text" name="_target_module" id="_target_module" value="<?php echo $__Context->mid ?>(<?php echo $__Context->browser_title ?>)" readonly="readonly" />
					<a href="<?php echo getUrl('','module','module','act','dispModuleSelectList','id','target_module','type','single') ?>" onclick="popopen(this.href,'ModuleSelect');return false;" class="x_btn"><?php echo $lang->cmd_select ?></a>
				</span>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="target_category"><?php echo $lang->category ?></label>
			<div class="x_controls">
				<select id="target_category" name="target_category_srl"></select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="message_content"><?php echo $lang->cmd_send_message ?></label>
			<div class="x_controls" style="margin-right:14px">
				<textarea name="message_content" id="message_content" rows="4" cols="42" style="width:100%"></textarea>
				<label for="send_default_message" class="x_inline"><input type="checkbox" name="send_default_message" id="send_default_message" value="Y" checked="checked" /> <?php echo $lang->send_default_message ?></label>
			</div>
		</div>
	</div>
	<div class="x_modal-footer">
		<span class="x_btn-group x_pull-left">
			<button type="button" class="x_btn" onclick="doManageDocument('trash');"><?php echo $lang->cmd_trash ?></button>
			<button type="button" class="x_btn" onclick="doManageDocument('delete');"><?php echo $lang->cmd_delete ?></button>
		</span>
		<span class="x_btn-group x_pull-right">
			<button type="button" class="x_btn x_btn-inverse" onclick="doManageDocument('move');"><?php echo $lang->cmd_move ?></button>
			<button type="button" class="x_btn x_btn-inverse" onclick="doManageDocument('copy');"><?php echo $lang->cmd_copy ?></button>
		</span>
	</div>
	<?php } ?>
</form>
<script>
jQuery(function($){
	var message_content_area = $('#message_content');
	if($('#send_default_message').is(':checked'))
	{
		message_content_area.prop("disabled", true);
	}
	$('#send_default_message').change(function(){
		if($(this).is(':checked')){
			message_content_area.prop("disabled", true);
		} else {
			message_content_area.prop("disabled", false);
		}
	});
	<?php if($__Context->module_srl > 0){ ?>
	doGetCategoryFromModule(<?php echo $__Context->module_srl ?>);
	<?php } ?>
});
</script>