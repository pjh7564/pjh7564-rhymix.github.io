<?php if(!defined("__XE__"))exit;?><!--#JSPLUGIN:jquery.fileupload--><?php Context::loadJavascriptPlugin('jquery.fileupload'); ?>
<!--#JSPLUGIN:jquery.finderSelect--><?php Context::loadJavascriptPlugin('jquery.finderSelect'); ?>
<!--#JSPLUGIN:handlebars--><?php Context::loadJavascriptPlugin('handlebars'); ?>
<?php Context::loadLang('modules/editor/skins/ckeditor/lang'); ?>
<?php if($__Context->allow_fileupload){ ?><div id="xefu-container-<?php echo $__Context->editor_sequence ?>" class="xefu-container xe-clearfix" data-editor-sequence="<?php echo $__Context->editor_sequence ?>">
	
	<div class="xefu-dropzone">
		<span class="xefu-btn fileinput-button xefu-act-selectfile">
			<span><i class="xi-icon xi-file-upload"></i> <?php echo $lang->edit->upload_file ?></span>
			<input id="xe-fileupload" type="file" class="fileupload-processing " name="Filedata" data-auto-upload="true" data-editor-sequence="<?php echo $__Context->editor_sequence ?>" multiple />
		</span>
		<?php if(!$__Context->m){ ?><p class="xefu-dropzone-message"><?php echo $lang->ckeditor_about_file_drop_area ?></p><?php } ?>
		<p class="upload_info">
			<span class="allowed_filesize_container"><?php echo $lang->allowed_filesize ?> : <span class="allowed_filesize">0MB</span></span>
			<span class="allowed_filetypes_container">(<?php echo $lang->allowed_filetypes ?> : <span class="allowed_filetypes">*.*</span>)</span>
		</p>
		<p class="xefu-progress-status" style="display: none;"><?php echo $lang->ckeditor_file_uploading ?> (<span class="xefu-progress-percent">0%</span>)</p>
		<div class="xefu-progressbar" style="display: none;"><div></div></div>
	</div>
	
	<div class="xefu-controll xe-clearfix">
		<div style="float: left;">
			<?php echo $lang->ckeditor_file_count ?> (<span class="attached_size"></span> / <span class="allowed_attach_size"></span>)
		</div>
		<div style="float: right">
			<input type="button" class="xefu-btn xefu-act-link-selected" style=" vertical-align: middle; vertical-align: middle;" value="<?php echo $lang->edit->link_file ?>">
			<input type="button" class="xefu-btn xefu-act-delete-selected" style=" vertical-align: middle; vertical-align: middle;" value="<?php echo $lang->edit->delete_selected ?>">
		</div>
	</div>
	<div class="xefu-list">
		<div class="xefu-list-images">
			<ul>
			</ul>
		</div>
		<div class="xefu-list-files">
			<ul>
			</ul>
		</div>
	</div>
</div><?php } ?>
<script>
	function reloadUploader(editor_sequence){
<?php if($__Context->allow_fileupload){ ?>
		$container = jQuery('#xefu-container-' + editor_sequence);
		$container.data('instance').loadFilelist($container);
<?php } ?>
	}
<?php if($__Context->allow_fileupload){ ?>
	jQuery(function($){
		// uploader
		var setting = {
			maxFileSize: <?php echo $__Context->logged_info->is_admin === 'Y' ? 0 : $__Context->file_config->allowed_filesize ?>,
			maxChunkSize: <?php echo $__Context->file_config->allowed_chunk_size ?: 0 ?>,
			autoinsertTypes: <?php echo json_encode($__Context->editor_autoinsert_types) ?>,
			autoinsertPosition: <?php echo json_encode($__Context->editor_autoinsert_position ?: 'paragraph') ?>,
			singleFileUploads: true
		};
		$container = $('#xefu-container-<?php echo $__Context->editor_sequence ?>');
		$container.data('instance',$container.xeUploader(setting));
		window.xe.msg_exceeds_limit_size = '<?php echo $lang->msg_exceeds_limit_size ?>';
		window.xe.msg_checked_file_is_deleted = '<?php echo $lang->msg_checked_file_is_deleted ?>';
		window.xe.msg_file_cart_is_null = '<?php echo $lang->msg_file_cart_is_null ?>';
		window.xe.msg_checked_file_is_deleted = '<?php echo $lang->msg_checked_file_is_deleted ?>';
		window.xe.msg_not_allowed_filetype = '<?php echo $lang->msg_not_allowed_filetype ?>';
		window.xe.msg_file_upload_error = '<?php echo $lang->msg_file_upload_error ?>';
	});
<?php } ?>
</script>
