<?php if(!defined("__XE__"))exit;
$this->config->autoescape = 'on'; ?>
<div>
	<section class="member">
		<h2><?php echo $lang->member ?></h2>
		<ul>
			<?php $__loop_tmp=$__Context->latestMemberList;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->value){ ?><li>
				<?php $__Context->document = $__Context->value->variables ?>
				<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispMemberAdminInsert', 'member_srl', $__Context->value->member_srl), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispMemberAdminInsert', 'member_srl', $__Context->value->member_srl))) ?>" target="_blank"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->nick_name, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->nick_name)) ?></a>
			</li><?php } ?>
			<?php if(!is_array($__Context->latestMemberList) || count($__Context->latestMemberList) < 1){ ?><li><?php echo $lang->no_data ?></li><?php } ?>
		</ul>
		<div class="more">
			<dl>
				<dt><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($lang->menu_gnb['user'], ENT_QUOTES, 'UTF-8', false) : ($lang->menu_gnb['user'])) ?>: </dt><dd><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList'))) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(number_format($__Context->status->member->totalCount), ENT_QUOTES, 'UTF-8', false) : (number_format($__Context->status->member->totalCount))) ?> (<?php if($__Context->status->member->todayCount > 0){ ?>+<?php };
echo ($this->config->autoescape === 'on' ? htmlspecialchars(number_format($__Context->status->member->todayCount), ENT_QUOTES, 'UTF-8', false) : (number_format($__Context->status->member->todayCount))) ?>)</a></dd>
			</dl>
			<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispMemberAdminList'))) ?>"><i class="xi-angle-right"></i><span><?php echo $lang->more ?></span></a>
		</div>
	</section>
</div>
<div>
	<section class="document">
		<h2><?php echo $lang->latest_documents ?></h2>
		<ul>
			<?php $__loop_tmp=$__Context->latestDocumentList;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->value){ ?><li>
				<?php $__Context->document = $__Context->value->variables ?>
				<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'document_srl', $__Context->document['document_srl']), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'document_srl', $__Context->document['document_srl']))) ?>" target="_blank"><?php if(trim($__Context->value->getTitle()) !== ''){;
echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->getTitleText(), ENT_QUOTES, 'UTF-8', false) : ($__Context->value->getTitleText()));
}else{ ?><strong><?php echo $lang->no_title_document ?></strong><?php } ?></a> 
				<span class="side"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->getNickName(), ENT_QUOTES, 'UTF-8', false) : ($__Context->value->getNickName())) ?></span>
				<form class="action" method="POST"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
					<input type="hidden" name="module" value="admin" />
					<input type="hidden" name="act" value="procDocumentManageCheckedDocument" />
					<input type="hidden" name="cart[]" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->document['document_srl'], ENT_QUOTES, 'UTF-8', false) : ($__Context->document['document_srl'])) ?>" />
					<input type="hidden" name="success_return_url" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin'))) ?>" />
					<button type="submit" name="type" value="trash" class="x_icon-trash"><?php echo $lang->cmd_trash ?></button>
					<button type="submit" name="type" value="delete" class="x_icon-remove"><?php echo $lang->cmd_delete ?></button>
				</form>
			</li><?php } ?>
			<?php if(!is_array($__Context->latestDocumentList) || count($__Context->latestDocumentList) < 1){ ?><li><?php echo $lang->no_data ?></li><?php } ?>
		</ul>
		<div class="more">
			<dl>
				<dt><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($lang->menu_gnb_sub['document'], ENT_QUOTES, 'UTF-8', false) : ($lang->menu_gnb_sub['document'])) ?>: </dt><dd><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminList'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminList'))) ?>"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(number_format($__Context->status->document->totalCount), ENT_QUOTES, 'UTF-8', false) : (number_format($__Context->status->document->totalCount))) ?> (<?php if($__Context->status->document->todayCount > 0){ ?>+<?php };
echo ($this->config->autoescape === 'on' ? htmlspecialchars(number_format($__Context->status->document->todayCount), ENT_QUOTES, 'UTF-8', false) : (number_format($__Context->status->document->todayCount))) ?>)</a></dd>
			</dl>
			<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminList'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispDocumentAdminList'))) ?>"><i class="xi-angle-right"></i><span><?php echo $lang->more ?></span></a>
		</div>
	</section>
	<section class="reply">
		<h2><?php echo $lang->latest_comments ?></h2>
		<ul>
			<?php $__loop_tmp=$__Context->latestCommentList;if($__loop_tmp)foreach($__loop_tmp as $__Context->key=>$__Context->value){ ?><li>
				<a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'document_srl', $__Context->value->document_srl), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'document_srl', $__Context->value->document_srl))) ?>#comment_<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->comment_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->comment_srl)) ?>" target="_blank"><?php if(trim($__Context->value->content) !== ''){;
echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->getSummary(), ENT_QUOTES, 'UTF-8', false) : ($__Context->value->getSummary()));
}else{ ?><strong><?php echo $lang->no_text_comment ?></strong><?php } ?></a> 
				<span class="side"><?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->getNickName(), ENT_QUOTES, 'UTF-8', false) : ($__Context->value->getNickName())) ?></span> 
				<form class="action"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
					<input type="hidden" name="module" value="admin" />
					<input type="hidden" name="act" value="procCommentAdminDeleteChecked" />
					<input type="hidden" name="cart[]" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars($__Context->value->comment_srl, ENT_QUOTES, 'UTF-8', false) : ($__Context->value->comment_srl)) ?>" />
					<input type="hidden" name="success_return_url" value="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin'))) ?>" />
					<button type="submit" name="is_trash" value="true" class="x_icon-trash"><?php echo $lang->cmd_trash ?></button>
					<button type="submit" name="is_trash" value="false" class="x_icon-remove"><?php echo $lang->cmd_delete ?></button>
				</form>
			</li><?php } ?>
			<?php if(!is_array($__Context->latestCommentList) || count($__Context->latestCommentList) < 1){ ?><li><?php echo $lang->no_data ?></li><?php } ?>
		</ul>
		<p class="more"><a href="<?php echo ($this->config->autoescape === 'on' ? htmlspecialchars(getUrl('', 'module', 'admin', 'act', 'dispCommentAdminList'), ENT_QUOTES, 'UTF-8', false) : (getUrl('', 'module', 'admin', 'act', 'dispCommentAdminList'))) ?>"><i class="xi-angle-right"></i><span><?php echo $lang->more ?></span></a></p>
	</section>
</div>
