<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<!--#Meta:modules/admin/tpl/js/menu_setup.js--><?php Context::loadFile(['modules/admin/tpl/js/menu_setup.js', '', '', '']); ?>
<div class="x_page-header">
	<h1><?php echo $lang->admin_setup ?></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/admin/tpl/admin_setup/1'){ ?><div class="message <?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE_TYPE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE_TYPE)) ?>">
	<p><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->XE_VALIDATOR_MESSAGE, ENT_QUOTES, 'UTF-8', false) : ($__Context->XE_VALIDATOR_MESSAGE)) ?></p>
</div><?php } ?>
<section class="section">
	<h1><?php echo $lang->admin_menu_setup ?></h1>
	<form id="listForm" action="./" method="post" class="adminMap"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<input type="hidden" name="module" value="admin" />
		<input type="hidden" name="act" value="procMenuAdminDeleteItem" />
		<input type="hidden" name="menu_srl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->menu_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->menu_srl)) ?>" />
		<input type="hidden" name="title" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->menu_title, ENT_QUOTES, 'UTF-8', false) : ($__Context->menu_title)) ?>" />
		<input type="hidden" name="menu_item_srl" value="" />
		<input type="hidden" name="success_return_url" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispAdminSetup'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispAdminSetup'))) ?>" />
		<ul>
			<?php $__loop_tmp=$__Context->gnbUrlList;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->value){ ?><li class="parent">
				<input type="hidden" name="parent_key[]" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value['parent_srl'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value['parent_srl'])) ?>" class="_parent_key" />
				<input type="hidden" name="item_key[]" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value['node_srl'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value['node_srl'])) ?>" class="_item_key" />
				<span><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value['text'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value['text'])) ?></span> <span class="side"><a href="#editMenu" class="modalAnchor _add"><?php echo $lang->add ?></a></span>
				<?php if(is_array($__Context->value['list']) && count($__Context->value['list'])>0){ ?><ul>
					<?php $__loop_tmp=$__Context->value['list'];if($__loop_tmp)foreach($__loop_tmp as $__Context->key2=>$__Context->value2){ ?><li>
					<input type="hidden" name="parent_key[]" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value2['parent_srl'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value2['parent_srl'])) ?>" class="_parent_key" />
					<input type="hidden" name="item_key[]" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value2['node_srl'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value2['node_srl'])) ?>" class="_item_key" />
					<span><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value2['text'], ENT_QUOTES, 'UTF-8', false) : ($__Context->value2['text'])) ?></span><span class="side"><a href="#delete" class="_child_delete"><?php echo $lang->delete ?></a></span>
					</li><?php } ?>
				</ul><?php } ?>
			</li><?php } ?>
		</ul>
		<div class="x_clearfix btnArea">
			<div class="x_pull-left">
				<button value="procAdminMenuReset" name="act" type="submit" class="x_btn"><?php echo $lang->cmd_reset ?></button>
			</div>
			<div class="x_pull-right">
				<button type="submit" value="procMenuAdminArrangeItem" name="act" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
			</div>
		</div>
	</form>
</section>
<section class="x_modal" id="editMenu">
	<form id="editForm" action="./" class="x_form-horizontal" method="POST" style="margin:0"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
	<div class="x_modal-header">
		<h1><?php echo $lang->admin_menu_add ?></h1>
	</div>
	<div class="x_modal-body">
		<input type="hidden" name="module" value="menu" />
		<input type="hidden" name="act" value="procMenuAdminInsertItemForAdminMenu" />
		<input type="hidden" name="menu_srl" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->menu_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->menu_srl)) ?>" />
		<input type="hidden" name="parent_srl" value="" />
		<div class="x_control-group">
			<label class="x_control-label" for="menuNameList"><?php echo $lang->module ?></label>
			<div class="x_controls">
				<select name="menu_name" id="menuNameList">
				</select>
			</div>
		</div>
	</div>
	<div class="x_modal-footer">
		<button type="button" class="x_btn x_pull-left" data-hide="#exModal-1">Close</button>
		<span class="x_btn-group x_pull-right">
			<button type="submit" class="x_btn x_btn-primary"><?php echo $lang->cmd_save ?></button>
		</span>
	</div>
	</form>
</section>
<style>
.adminMap ul{background:#eee;list-style:none;margin:0;position:relative;border-radius:5px}
.adminMap li{position:relative}
.adminMap li:first-child{border:0 !important} 
.adminMap li.parent{padding:0 15px 1px 15px;border-top:1px dotted #fff}
.adminMap li.parent>span{display:block;height:33px;line-height:33px;font-weight:bold}
.adminMap li>ul{background:#fff;border-radius:5px;margin:0 0 10px 0;box-shadow:0 0 4px #999 inset}
.adminMap li li{cursor:move;border-top:1px dotted #ddd}
.adminMap li *{vertical-align:middle}
.adminMap .moveTo{position:relative;z-index:2;width:22px;height:32px;padding:32px 0 0 0;margin:0 3px;_margin-top:-1px;overflow:hidden;background:url(<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl(), ENT_QUOTES, 'UTF-8', false) : (getUrl())) ?>modules/admin/tpl/img/iconMoveTo.gif) no-repeat center 0;border:0;cursor:move}
.adminMap li.active{background-color:#f7f7f7;border-radius:3px;box-shadow:0 0 3px #666;border:0;padding:1px 0 0 0}
.adminMap li:first-child.active{padding:0}
.adminMap li.active .moveTo{background-position:center -32px}
.adminMap .side{position:absolute;top:0;right:15px;padding-top:0 !important;padding-bottom:0 !important;line-height:30px;background:transparent !important}
.adminMap .parent>.side{right:30px}
.adminMap .placeholder{background:#000;border-radius:5px}
</style>
