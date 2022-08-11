<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
	</div>
	<!-- /BODY -->
	<?php if($this->user->isAdmin()){ ?><footer class="footer">
		<p class="power">
			Powered by <strong>Rhymix <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(\RX_VERSION, ENT_QUOTES, 'UTF-8', false) : (\RX_VERSION)) ?></strong>
			<?php if(isset($__Context->released_version)){ ?>
				<span class="vr">|</span> Latest version: <a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->download_link, ENT_QUOTES, 'UTF-8', false) : ($__Context->download_link)) ?>" target="_blank"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->released_version, ENT_QUOTES, 'UTF-8', false) : ($__Context->released_version)) ?></a>
			<?php } ?>
		</p>
		<p class="cache">
			<button type="button" class="x_btn-link" onclick="doResetAdminMenu();"><?php echo lang('admin.cmd_admin_menu_reset') ?></button> <span class="vr">|</span>  
			<button type="button" class="x_btn-link" onclick="doRecompileCacheFile();"><?php echo lang('common.cmd_remake_cache') ?></button> <span class="vr">|</span> 
			<button type="button" class="x_btn-link" onclick="doClearSession();"><?php echo lang('admin.cmd_clear_session') ?></button> <span class="vr">|</span> 
			<a href="./index.php?module=admin&act=dispAdminViewServerEnv" style="vertical-align:middle"><?php echo lang('admin.cmd_view_server_env') ?></a> <span class="vr">|</span> 
			<a href="https://github.com/rhymix/rhymix/issues" target="_blank" style="vertical-align:middle"><?php echo lang('admin.bug_report') ?></a>
		</p>
		<!--#Meta:modules/session/tpl/js/session.js--><?php Context::loadFile(['modules/session/tpl/js/session.js', '', '', '']); ?>
	</footer><?php } ?>
</div>
<!--#Meta:modules/admin/tpl/js/config.js--><?php Context::loadFile(['modules/admin/tpl/js/config.js', '', '', '']); ?>
