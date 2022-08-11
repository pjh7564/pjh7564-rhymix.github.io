<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/point/tpl/js/point_admin.js--><?php Context::loadFile(['modules/point/tpl/js/point_admin.js', '', '', '']); ?>
<section class="section">
	<h1><?php echo $lang->point ?></h1>
	<form action="./" method="post" id="fo_point" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="point" />
		<input type="hidden" name="act" value="procPointAdminInsertPointModuleConfig" />
		<input type="hidden" name="target_module_srl" value="<?php echo $__Context->module_config['module_srl']?$__Context->module_config['module_srl']:$__Context->module_srls ?>" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		
		<div class="x_control-group">
			<label for="insert_document" class="x_control-label"><?php echo $lang->point_insert_document ?></label>
			<div class="x_controls">
				<input type="number" name="insert_document" id="insert_document" value="<?php echo $__Context->module_config['insert_document'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="insert_comment" class="x_control-label"><?php echo $lang->point_insert_comment ?></label>
			<div class="x_controls">
				<input type="number" name="insert_comment" id="insert_comment" value="<?php echo $__Context->module_config['insert_comment'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="upload_file" class="x_control-label"><?php echo $lang->point_upload_file ?></label>
			<div class="x_controls">
				<input type="number" name="upload_file" id="upload_file" value="<?php echo $__Context->module_config['upload_file'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="download_file" class="x_control-label"><?php echo $lang->point_download_file ?></label>
			<div class="x_controls">
				<input type="number" name="download_file" id="download_file" value="<?php echo $__Context->module_config['download_file'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="read_document" class="x_control-label"><?php echo $lang->point_read_document ?></label>
			<div class="x_controls">
				<input type="number" name="read_document" id="read_document" value="<?php echo $__Context->module_config['read_document'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="voter" class="x_control-label"><?php echo $lang->point_voter ?></label>
			<div class="x_controls">
				<input type="number" name="voter" id="voter" value="<?php echo $__Context->module_config['voter'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="blamer" class="x_control-label"><?php echo $lang->point_blamer ?></label>
			<div class="x_controls">
				<input type="number" name="blamer" id="blamer" value="<?php echo $__Context->module_config['blamer'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="voter_comment" class="x_control-label"><?php echo $lang->point_voter_comment ?></label>
			<div class="x_controls">
				<input type="number" name="voter_comment" id="voter_comment" value="<?php echo $__Context->module_config['voter_comment'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="blamer_comment" class="x_control-label"><?php echo $lang->point_blamer_comment ?></label>
			<div class="x_controls">
				<input type="number" name="blamer_comment" id="blamer_comment" value="<?php echo $__Context->module_config['blamer_comment'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="download_file_author" class="x_control-label"><?php echo $lang->point_download_file_author ?></label>
			<div class="x_controls">
				<input type="number" name="download_file_author" id="download_file_author" value="<?php echo $__Context->module_config['download_file_author'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="read_document_author" class="x_control-label"><?php echo $lang->point_read_document_author ?></label>
			<div class="x_controls">
				<input type="number" name="read_document_author" id="read_document_author" value="<?php echo $__Context->module_config['read_document_author'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="voted" class="x_control-label"><?php echo $lang->point_voted ?></label>
			<div class="x_controls">
				<input type="number" name="voted" id="voted" value="<?php echo $__Context->module_config['voted'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="blamed" class="x_control-label"><?php echo $lang->point_blamed ?></label>
			<div class="x_controls">
				<input type="number" name="blamed" id="blamed" value="<?php echo $__Context->module_config['blamed'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="voted_comment" class="x_control-label"><?php echo $lang->point_voted_comment ?></label>
			<div class="x_controls">
				<input type="number" name="voted_comment" id="voted_comment" value="<?php echo $__Context->module_config['voted_comment'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_control-group">
			<label for="blamed_comment" class="x_control-label"><?php echo $lang->point_blamed_comment ?></label>
			<div class="x_controls">
				<input type="number" name="blamed_comment" id="blamed_comment" value="<?php echo $__Context->module_config['blamed_comment'] ?? null ?>" /> <?php echo $__Context->module_config['point_name'] ?>
			</div>
		</div>
		<div class="x_clearfix btnArea">
			<button class="x_btn x_btn-warning x_pull-left" type="button" onclick="doPointReset('<?php echo $__Context->module_config['module_srl']?$__Context->module_config['module_srl']:$__Context->module_srls ?>')"><?php echo $lang->cmd_reset ?></button>
			<span class="x_pull-right">
				<input class="x_btn x_btn-primary" type="submit" value="<?php echo $lang->cmd_save ?>">
			</span>
		</div>
	</form>
</section>
