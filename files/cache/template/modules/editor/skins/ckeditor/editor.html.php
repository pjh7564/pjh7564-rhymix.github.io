<?php if(!defined("__XE__"))exit;?><!-- css -->
<?php  $__Context->css_var = new stdClass;  ?>
<?php  $__Context->css_var->colorset = $__Context->colorset;  ?>
<?php  $__Context->css_var->content_font = $__Context->content_font ? $__Context->content_font : 'none';  ?>
<?php  $__Context->css_var->content_font_size =  $__Context->content_font_size ? $__Context->content_font_size : 'none'; ?>
<?php  $__Context->css_var->content_line_height = $__Context->content_line_height ? $__Context->content_line_height: 'none'; ?>
<?php  $__Context->css_var->content_word_break = $__Context->content_word_break ? $__Context->content_word_break : 'none'; ?>
<?php  $__Context->css_var->content_paragraph_spacing = $__Context->content_paragraph_spacing ? $__Context->content_paragraph_spacing : 'none'; ?>
<?php  Context::set('css_var',$__Context->css_var); ?>
<!--#Meta:modules/editor/skins/ckeditor/css/default.less?$__Context->css_var--><?php Context::loadFile(['modules/editor/skins/ckeditor/css/default.less', '', '', '', $__Context->css_var]); ?>
<!--#Meta:common/css/xeicon/xeicon.min.css--><?php Context::loadFile(['common/css/xeicon/xeicon.min.css', '', '', '', []]); ?>
<!-- JS -->
<!--#JSPLUGIN:ckeditor--><?php Context::loadJavascriptPlugin('ckeditor'); ?>
<!--#Meta:modules/editor/tpl/js/editor_common.js--><?php Context::loadFile(['modules/editor/tpl/js/editor_common.js', '', '', '']); ?>
<!--#Meta:modules/editor/tpl/js/editor.app.js--><?php Context::loadFile(['modules/editor/tpl/js/editor.app.js', '', '', '']); ?>
<!--#Meta:modules/editor/skins/ckeditor/js/xe_interface.js--><?php Context::loadFile(['modules/editor/skins/ckeditor/js/xe_interface.js', '', '', '']); ?>
<script>
var auto_saved_msg = "<?php echo $lang->msg_auto_saved ?>";
</script>
<?php  $__Context->css_file_list = array() ?>
<?php if($__Context->editor_additional_css)foreach($__Context->editor_additional_css as $__Context->additional_css_url){ ?>
	<?php  $__Context->css_file_list[] = $__Context->additional_css_url ?>
<?php } ?>
<?php  $__Context->css_content = ""  ?>
<?php if($__Context->enable_autosave){ ?>
<input type="hidden" name="_saved_doc_title" value="<?php echo (isset($__Context->saved_doc) && $__Context->saved_doc) ? escape($__Context->saved_doc->title) : '' ?>" />
<input type="hidden" name="_saved_doc_content" value="<?php echo (isset($__Context->saved_doc) && $__Context->saved_doc) ? escape($__Context->saved_doc->content) : '' ?>" />
<input type="hidden" name="_saved_doc_document_srl" value="<?php echo (isset($__Context->saved_doc) && $__Context->saved_doc) ? $__Context->saved_doc->document_srl : '' ?>" />
<input type="hidden" name="_saved_doc_message" value="<?php echo $lang->msg_load_saved_doc ?>" />
<?php } ?>
<?php  $__Context->ckeditor_main_filemtime = filemtime(RX_BASEDIR . 'common/js/plugins/ckeditor/ckeditor/ckeditor.js') ?>
<?php  $__Context->ckeditor_config_filemtime = file_exists(RX_BASEDIR . 'common/js/plugins/ckeditor/ckeditor/config.js') ? filemtime(RX_BASEDIR . 'common/js/plugins/ckeditor/ckeditor/config.js') : 0 ?>
<?php  $__Context->editor_height_fixed = $__Context->editor_height + ($__Context->editor_toolbar_hide ? 58 : ($__Context->editor_toolbar === 'simple' ? 74 : 140)) ?>
<div id="ckeditor_instance_<?php echo $__Context->editor_sequence ?>" data-editor-sequence="<?php echo $__Context->editor_sequence ?>" data-editor-primary-key-name="<?php echo $__Context->editor_primary_key_name ?>" data-editor-content-key-name="<?php echo $__Context->editor_content_key_name ?>" style="min-height:<?php echo $__Context->editor_height_fixed ?>px;"></div>
<?php if($__Context->enable_autosave){ ?><p class="editor_autosaved_message autosave_message" id="editor_autosaved_message_<?php echo $__Context->editor_sequence ?>">&nbsp;</p><?php } ?>
<?php if($__Context->allow_fileupload){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/editor/skins/ckeditor','file_upload.html') ?>
<?php } ?>
<script>
	jQuery(function($){
		"use strict";
		<?php if(!$__Context->ckeditor_config_filemtime){ ?>CKEDITOR.config.customConfig = '';<?php } ?>
		
		// Import CSS content from PHP.
		var css_content = <?php echo json_encode($__Context->css_content) ?>;
		
		// Get default font name and list of other supported fonts.
		var default_font_name = <?php echo json_encode($__Context->content_font ? trim(array_first(explode(',', $__Context->content_font)), '\'" ') : null) ?>;
		var default_font_fullname = <?php echo json_encode($__Context->content_font ?: null) ?>;
		if (default_font_fullname === null && window.getComputedStyle) {
			var test_content = $('<div class="rhymix_content xe_content"></div>').hide().appendTo($(document.body));
			var test_styles = window.getComputedStyle(test_content[0], null);
			if (test_styles && test_styles.getPropertyValue) {
				default_font_fullname = test_styles.getPropertyValue("font-family");
				if (default_font_fullname) {
					default_font_name = $.trim(default_font_fullname.split(',')[0].replace(/['"]/g, ''));
					css_content = ".rhymix_content.editable { font-family:" + default_font_fullname + "; } " + css_content;
				}
			}
		}
		var font_list = [];
		<?php if($lang->edit->fontlist)foreach($lang->edit->fontlist as $__Context->fontname){ ?>
			font_list.push(<?php echo json_encode(strval($__Context->fontname)) ?>);
		<?php } ?>
		if (default_font_fullname !== null && !$.inArray(default_font_fullname, font_list)) {
			font_list.push(default_font_fullname);
		}
		font_list = $.map(font_list, function(val) {
			return $.trim(val.split(",")[0]) + "/" + val;
		}).join(";");
		
		// Get default font size and list of other supported sizes.
		var default_font_size = <?php echo json_encode(strval($__Context->content_font_size ?: '13')) ?>;
		default_font_size = parseInt(default_font_size.replace(/\D/, ''), 10);
		var font_sizes = [8, 9, 10, 11, 12, 13, 14, 15, 16, 18, 20, 24, 28, 32, 36, 40, 48];
		if (!$.inArray(default_font_size, font_sizes)) {
			font_sizes.push(default_font_size);
			font_sizes.sort();
		}
		font_sizes = $.map(font_sizes, function(val) {
			return val + "/" + val + "px";
		}).join(";");
		
		// Apply auto dark mode.
		var editor_skin = '<?php echo $__Context->colorset ?>';
		var editor_color = null;
		<?php if($__Context->editor_auto_dark_mode){ ?>
			$('body').addClass('cke_auto_dark_mode');
			if (getColorScheme() === 'dark') {
				if (editor_skin !== 'moono-lisa' ) {
					editor_skin = 'moono-dark';
				}
			}
		<?php } ?>
		
		// Initialize CKEditor settings.
		var settings = {
			ckeconfig: {
				height: '<?php echo $__Context->editor_height ?>',
				skin: editor_skin,
				contentsCss: <?php echo json_encode($__Context->css_file_list) ?>,
				xe_editor_sequence: <?php echo $__Context->editor_sequence ?>,
	            font_defaultLabel: default_font_name,
	            font_names: font_list,
	            fontSize_defaultLabel: default_font_size,
	            fontSize_sizes: font_sizes,
				toolbarCanCollapse: true,
				allowedContent: true,
				startupFocus: <?php echo json_encode($__Context->editor_focus) ?>,
				language: "<?php echo str_replace('jp','ja',$__Context->lang_type) ?>",
			},
			loadXeComponent: true,
			enableToolbar: true,
			content_field: jQuery('[name=<?php echo $__Context->editor_content_key_name ?>]')
		};
		
		// Add style-sheet for the WYSIWYG
		$(document.getElementsByTagName('link')).each(function() {
			if ($(this).attr('rel') == 'stylesheet') {
				settings.ckeconfig.contentsCss.push($(this).attr('href'));
			}
		});
		// Prevent removal of icon fonts and Google code.
		CKEDITOR.dtd.$removeEmpty.i = 0;
		CKEDITOR.dtd.$removeEmpty.ins = 0;
		
		// Set the timestamp for plugins.
		CKEDITOR.timestamp = '<?php echo strtoupper(dechex(max($__Context->ckeditor_main_filemtime, $__Context->ckeditor_config_filemtime))) ?>';
		// Add editor components.
		<?php if($__Context->enable_component){ ?>
			<?php  $__Context->xe_component = array();  ?>
			<?php if($__Context->component_list)foreach($__Context->component_list as $__Context->component_name => $__Context->component){ ?>
				<?php  $__Context->xe_component[] = $__Context->component_name . ":'" . htmlentities($__Context->component->title, ENT_QUOTES, 'UTF-8') . "'";  ?>
			<?php } ?>
			<?php  $__Context->xe_component = implode(',', $__Context->xe_component);  ?>
			settings.ckeconfig.xe_component_arrays = {<?php echo $__Context->xe_component ?>};
		<?php }else{ ?>
			settings.ckeconfig.xe_component_arrays = {};
		<?php } ?>
		<?php if(!$__Context->enable_default_component){ ?>
			settings.enableToolbar = false;
			settings.ckeconfig.toolbarCanCollapse = false;
		<?php } ?>
		<?php if(!$__Context->enable_component){ ?>
			settings.loadXeComponent = false;
		<?php } ?>
		// Set default toolbar status.
		settings.ckeconfig.toolbarStartupExpanded = <?php echo $__Context->editor_toolbar_hide ? 'false' : 'true' ?>;
		// Add or remove plugins based on Rhymix configuration.
		<?php if($__Context->editor_additional_plugins){ ?>
			settings.ckeconfig.extraPlugins = <?php echo json_encode(implode(',', $__Context->editor_additional_plugins)) ?>;
		<?php } ?>
		<?php if($__Context->editor_remove_plugins){ ?>
			settings.ckeconfig.removePlugins = <?php echo json_encode(implode(',', $__Context->editor_remove_plugins)) ?>;
		<?php } ?>
		
		// https://github.com/rhymix/rhymix/issues/932
		if (CKEDITOR.env.iOS) {
			settings.ckeconfig.extraPlugins = (settings.ckeconfig.extraPlugins ? (settings.ckeconfig.extraPlugins + ',') : '') + 'divarea,ios_enterkey';
			settings.ckeconfig.removePlugins = (settings.ckeconfig.removePlugins ? (settings.ckeconfig.removePlugins + ',') : '') + 'enterkey';
			settings.loadXeComponent = false;
			var additional_styles = '.cke_wysiwyg_div { padding: 8px !important; }';
			additional_styles += 'html { min-width: unset; min-height: unset; width: unset; height: unset; margin: unset; padding: unset; }';
			$('head').append('<st' + 'yle>' + additional_styles + String(css_content).replace(/\.rhymix_content\.editable/g, '.cke_wysiwyg_div') + '</st' + 'yle>');
		}
		// Define the simple toolbar.
		<?php if($__Context->editor_toolbar === 'simple'){ ?>
			settings.ckeconfig.toolbar = [
				{ name: 'styles', items: [ 'Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'TextColor', 'BGColor' ] },
				{ name: 'paragraph', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight' ] },
				{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste' ] },
				{ name: 'insert', items: [ 'Link', 'Image', 'Table' ] },
				{ name: 'tools', items: [ 'Maximize', '-', 'Source' ] }
			];
		<?php } ?>
		<?php if(!$__Context->html_mode){ ?>
			settings.ckeconfig.removeButtons = 'Save,Preview,Print,Cut,Copy,Paste,Source';
		<?php } ?>
		CKEDITOR.addCss(css_content);
		// Initialize CKEditor.
		var ckeApp = $('#ckeditor_instance_<?php echo $__Context->editor_sequence ?>').XeCkEditor(settings);
		
		// Add use_editor and use_html fields to parent form.
		var parentform = $('#ckeditor_instance_<?php echo $__Context->editor_sequence ?>').parents('form');
		var use_editor = parentform.find("input[name='use_editor']");
		var use_html = parentform.find("input[name='use_html']");
		if (use_editor.size()) {
			use_editor.val("Y");
		} else {
			parentform.append('<input type="hidden" name="use_editor" value="Y" />');
		}
		if (use_html.size()) {
			use_html.val("Y");
		} else {
			parentform.append('<input type="hidden" name="use_html" value="Y" />');
		}
	});
</script>
