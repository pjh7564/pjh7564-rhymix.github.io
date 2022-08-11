<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/admin/tpl','_admin_common.html') ?>
<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(Context::addMetaTag("viewport", "width=device-width, user-scalable=yes"), ENT_QUOTES, 'UTF-8', false) : (Context::addMetaTag("viewport", "width=device-width, user-scalable=yes"))) ?>
<script>
	var admin_menu_srl = "<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->admin_menu_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->admin_menu_srl)) ?>";
	xe.cmd_find = "<?php echo $lang->cmd_find ?>";
	xe.cmd_cancel = "<?php echo $lang->cmd_cancel ?>";
	xe.cmd_confirm = "<?php echo $lang->cmd_confirm ?>";
	xe.msg_select_menu = "<?php echo $lang->msg_select_menu ?>";
	xe.lang.confirm_run = "<?php echo $lang->confirm_run ?>";
	xe.lang.confirm_reset_admin_menu = "<?php echo $lang->confirm_reset_admin_menu ?>";
</script>
<?php  $__Context->module_manager = $__Context->current_module_info->module !== 'admin' ?>
<div class="x">
<p class="skipNav"><a href="#content"><?php echo $lang->skip_to_content ?></a></p>
	<header class="header">
		<?php if($__Context->module_manager){ ?>
		<h1>
			<a class="default_header" href="javascript:void()"><i class="xi xi-cog"></i></a>
		</h1>
		<?php if($this->user->isAdmin()){ ?><p class="site">
			<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['module' => 'admin', 'act' => $__Context->act ?? null, 'module_srl' => $__Context->module_info->module_srl]), ENT_QUOTES, 'UTF-8', false) : (getUrl(['module' => 'admin', 'act' => $__Context->act ?? null, 'module_srl' => $__Context->module_info->module_srl]))) ?>"><?php echo lang('admin.view_in_manager_layout') ?></a>
		</p><?php } ?>
		<?php }else{ ?>
		<h1>
			<a class="default_header" href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['module' => 'admin']), ENT_QUOTES, 'UTF-8', false) : (getUrl(['module' => 'admin']))) ?>"><i class="xi xi-cog"></i></a>
			<a class="mobile_menu_open" href="#gnbNav"><i class="xi xi-bars"></i></a>
		</h1>
		<p class="site"><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->xe_default_url, ENT_QUOTES, 'UTF-8', false) : ($__Context->xe_default_url)) ?>"><?php echo (preg_match('/^\$(?:user_)?lang->[a-zA-Z0-9\_]+$/', $__Context->site_module_info->settings->title ?: $__Context->xe_default_url) ? ($__Context->site_module_info->settings->title ?: $__Context->xe_default_url) : htmlspecialchars($__Context->site_module_info->settings->title ?: $__Context->xe_default_url, ENT_QUOTES, 'UTF-8', false)) ?></a></p>
		<?php } ?>
		<div class="account">
			<ul>
				<?php if($__Context->module_manager){ ?>
				<li><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['mid' => $__Context->mid, 'act' => 'dispMemberInfo']), ENT_QUOTES, 'UTF-8', false) : (getUrl(['mid' => $__Context->mid, 'act' => 'dispMemberInfo']))) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->logged_info->nick_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->logged_info->nick_name)) ?></a></li>
				<li><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['mid' => $__Context->mid, 'act' => 'dispMemberLogout']), ENT_QUOTES, 'UTF-8', false) : (getUrl(['mid' => $__Context->mid, 'act' => 'dispMemberLogout']))) ?>"><?php echo $lang->cmd_logout ?></a></li>
				<?php }else{ ?>
				<li><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['module' => 'admin', 'act' => 'dispMemberAdminInfo', 'member_srl' => $__Context->logged_info->member_srl]), ENT_QUOTES, 'UTF-8', false) : (getUrl(['module' => 'admin', 'act' => 'dispMemberAdminInfo', 'member_srl' => $__Context->logged_info->member_srl]))) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->logged_info->nick_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->logged_info->nick_name)) ?></a></li>
				<li><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['module' => 'admin', 'act' => 'procAdminLogout']), ENT_QUOTES, 'UTF-8', false) : (getUrl(['module' => 'admin', 'act' => 'procAdminLogout']))) ?>"><?php echo $lang->cmd_logout ?></a></li>
				<?php } ?>
				<li><a href="#lang" class="lang" data-toggle><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->lang_supported[$__Context->lang_type], ENT_QUOTES, 'UTF-8', false) : ($__Context->lang_supported[$__Context->lang_type])) ?></a>
					<ul id="lang" class="x_dropdown-menu">
						<?php $__loop_tmp=$__Context->lang_supported;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->key==$__Context->lang_type){ ?> class="x_active"<?php } ?>><a href="#lang" data-langcode="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>" onclick="doChangeLangType('<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->key, ENT_QUOTES, 'UTF-8', false) : ($__Context->key)) ?>'); return false;"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->val, ENT_QUOTES, 'UTF-8', false) : ($__Context->val)) ?></a></li><?php } ?>
					</ul>
				</li>
			</ul>
		</div>
	</header>
	<!-- BODY -->
	<div class="body <?php if(isset($_COOKIE['__xe_admin_gnb_status']) && $_COOKIE['__xe_admin_gnb_status'] == 'close'){ ?>wide<?php } ?>"<?php if($__Context->module_manager){ ?> style="padding-left:0"<?php } ?>>
		<!-- GNB -->
		<?php if(!$__Context->module_manager){ ?><nav class="gnb <?php if(isset($_COOKIE['__xe_admin_gnb_status']) && $_COOKIE['__xe_admin_gnb_status'] == 'open'){ ?>open<?php } ?>" id="gnb">
			<a href="#gnbNav"><i class="x_icon-align-justify x_icon-white"></i><b></b> Menu Open/Close</a>
			<ul id="gnbNav" class="ex">
			<script>
				var __xe_admin_gnb_txs = new Array();
			</script>
			<?php if($__Context->gnbUrlList)foreach($__Context->gnbUrlList as $__Context->key=>$__Context->value){ ?>
				<?php if(strstr($__Context->value['menu_name_key'], 'configuration')){ ?>
				<li<?php if(isset($_COOKIE['__xe_admin_gnb_tx_favorite']) && $_COOKIE['__xe_admin_gnb_tx_favorite'] == 'open'){ ?> class="open"<?php } ?>>
					<script>
						__xe_admin_gnb_txs.push('__xe_admin_gnb_tx_favorite');
					</script>
					<a href="#favorite" data-href="favorite" title="<?php echo $lang->favorite ?>"><span class="tx"><?php echo $lang->favorite ?></span></a>
					<ul id="favorite"<?php if(isset($_COOKIE['__xe_admin_gnb_tx_favorite']) && $_COOKIE['__xe_admin_gnb_tx_favorite'] == 'open'){ ?> style="display:block"<?php } ?>>
						<?php $__loop_tmp=$__Context->favorite_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->favorite){ ?><li>
							<?php if($__Context->favorite->title){ ?><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['module' => 'admin', 'act' => $__Context->favorite->admin_index_act]), ENT_QUOTES, 'UTF-8', false) : (getUrl(['module' => 'admin', 'act' => $__Context->favorite->admin_index_act]))) ?>" title="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->favorite->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->favorite->title)) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->favorite->title, ENT_QUOTES, 'UTF-8', false) : ($__Context->favorite->title)) ?></a><?php } ?>
							<?php if(!$__Context->favorite->title){ ?><a><?php echo $lang->msg_not_founded ?></a><?php } ?>
							<form class="remove" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
								<input type="hidden" name="module" value="admin" />
								<input type="hidden" name="act" value="procAdminToggleFavorite" />
								<input type="hidden" name="module_name" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->favorite->module, ENT_QUOTES, 'UTF-8', false) : ($__Context->favorite->module)) ?>" />
								<input type="hidden" name="success_return_url" value="{getCurrentUrl()}" />
								<button type="submit" class="x_close" title="<?php echo $lang->cmd_delete ?>">&times;</button>
							</form>
						</li><?php } ?>
						<?php if(!is_array($__Context->favorite_list) || count($__Context->favorite_list) < 1){ ?><li><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(['module' => 'admin', 'act' => 'dispModuleAdminContent']), ENT_QUOTES, 'UTF-8', false) : (getUrl(['module' => 'admin', 'act' => 'dispModuleAdminContent']))) ?>"><?php echo $lang->no_data ?></a></li><?php } ?>
					</ul>
				</li>
				<?php } ?>
				<li class="<?php if(($__Context->parentSrl==$__Context->key || $__Context->value['href']=='index.php?module=admin') && !isset($__Context->mid) && !isset($__Context->act)){ ?>active open<?php }elseif(isset($_COOKIE['__xe_admin_gnb_tx_' . md5($__Context->value['href'])]) && $_COOKIE['__xe_admin_gnb_tx_' . md5($__Context->value['href'])] == 'open'){ ?>open<?php } ?>">
					<script>
						__xe_admin_gnb_txs.push('<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars('__xe_admin_gnb_tx_' . md5($__Context->value['href']), ENT_QUOTES, 'UTF-8', false) : ('__xe_admin_gnb_tx_' . md5($__Context->value['href']))) ?>');
					</script>
					<?php  $__Context->href = starts_with(\RX_BASEURL, $__Context->value['href']) ? $__Context->value['href'] : str_replace('//', '/', \RX_BASEURL . $__Context->value['href']) ?>
					<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->href, ENT_QUOTES, 'UTF-8', false) : ($__Context->href)) ?>" data-href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(md5($__Context->value['href']), ENT_QUOTES, 'UTF-8', false) : (md5($__Context->value['href']))) ?>" title="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value['text'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value['text'])) ?>"><span class="tx"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value['text'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value['text'])) ?></span></a>
					<?php if(count($__Context->value['list'])){ ?><ul<?php if(isset($_COOKIE['__xe_admin_gnb_tx_' . md5($__Context->value['href'])]) && $_COOKIE['__xe_admin_gnb_tx_' . md5($__Context->value['href'])] == 'open'){ ?> style="display:block"<?php } ?>>
						<?php if($__Context->value['list'])foreach($__Context->value['list'] as $__Context->key2 => $__Context->value2){ ?>
							<?php  $__Context->href = starts_with(\RX_BASEURL, $__Context->value2['href']) ? $__Context->value2['href'] : str_replace('//', '/', \RX_BASEURL . $__Context->value2['href']) ?>
							<?php if($__Context->value2['text']!=''){ ?><li<?php if($__Context->value2['text'] == $__Context->subMenuTitle){ ?> class="active_"<?php } ?> ><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->href, ENT_QUOTES, 'UTF-8', false) : ($__Context->href)) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value2['text'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value2['text'])) ?></a></li><?php } ?>
						<?php } ?>
					</ul><?php } ?>
				</li>
			<?php } ?>
			</ul>
		</nav><?php } ?>
		<!-- /GNB -->
