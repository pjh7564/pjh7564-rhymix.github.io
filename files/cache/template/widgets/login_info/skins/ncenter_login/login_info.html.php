<?php if(!defined("__XE__"))exit;?><!--#Meta:widgets/login_info/skins/ncenter_login/css/ncenter.css--><?php Context::loadFile(['widgets/login_info/skins/ncenter_login/css/ncenter.css', '', '', '', []]); ?>
<!--#Meta:widgets/login_info/skins/ncenter_login/js/ncenter.js--><?php Context::loadFile(['widgets/login_info/skins/ncenter_login/js/ncenter.js', 'body', '', '']); ?>
<div id="nc_container"<?php if($__Context->ncenterlite_page_navigation->total_count == 0){ ?> class="nc_login"<?php } ?> <?php echo $__Context->ncenterlite_zindex ?>>
	<?php if($__Context->ncenterlite_page_navigation->total_count > 0){ ?><ul class="nc_memu">
		<li class="nc_profile fLeft">
			<?php if($__Context->useProfileImage){ ?>
				<?php if($__Context->profileImage){ ?><img src="<?php echo $__Context->profileImage->src ?>" alt="my profile" class="nc_profile_img" /><?php } ?>
				<?php if(!$__Context->profileImage){ ?><img src="<?php echo Context::getRequestUri() ?>modules/ncenterlite/skins/default/img/p.png" alt="my profile" class="nc_profile_img" /><?php } ?>
			<?php } ?>
			<strong><?php echo $__Context->logged_info->nick_name ?></strong> <?php echo $lang->ncenterlite_sir ?>!
		</li>
		<li class="fLeft">
			<a class="notify" href="#">
				<?php if($__Context->_ncenterlite_num > 1){ ?>
				<?php echo sprintf($lang->ncenterlite_messages, $__Context->ncenterlite_page_navigation->total_count) ?>
				<?php }else{ ?>
				<?php echo sprintf($lang->ncenterlite_message, $__Context->ncenterlite_page_navigation->total_count) ?>
				<?php } ?>
			</a>
			<?php if($__Context->ncenterlite_page_navigation->total_count >= 1){ ?><a href="#" class="readall"><?php echo $lang->ncenterlite_delete_all ?></a><?php } ?>
		</li>
		<li class="fRight"><a class="close" href="#">× Close</a></li>
	</ul><?php } ?>
	<ul class="me_menu">
		<li class="nc_profile fLeft">
			<?php if($__Context->useProfileImage){ ?>
				<?php if($__Context->profileImage){ ?><img src="<?php echo $__Context->profileImage->src ?>" alt="my profile" class="nc_profile_img" /><?php } ?>
				<?php if(!$__Context->profileImage){ ?><img src="<?php echo Context::getRequestUri() ?>modules/ncenterlite/skins/default/img/p.png" alt="my profile" class="nc_profile_img" /><?php } ?>
			<?php } ?>
			<strong><?php echo $__Context->logged_info->nick_name ?></strong>
		</li>
		<li>
			<a href="<?php echo getUrl('act','dispMemberLogout') ?>" ><?php echo $lang->cmd_logout ?></a>
		</li>
		<li>
			<?php echo $lang->last_login ?>: <?php echo zDate($__Context->logged_info->last_login, "Y-m-d") ?>
		</li>
		<?php if($__Context->logged_info->is_admin == 'Y'){ ?><li >
			<a href="<?php echo getUrl('', 'module','admin') ?>" title="<?php echo $lang->admin ?>" class="admin"><?php echo $lang->cmd_management ?></a>
		</li><?php } ?>
	</ul>
	<div class="list">
		<ul>
			<?php $__loop_tmp=$__Context->ncenterlite_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->o){ ?><li>
				<a href="<?php echo $__Context->o->url ?>">
					<?php if($__Context->useProfileImage){ ?>
						<img<?php if($__Context->o->profileImage){ ?> src="<?php echo $__Context->o->profileImage ?>"<?php };
if(!$__Context->o->profileImage){ ?> src="<?php echo Context::getRequestUri() ?>modules/ncenterlite/skins/default/img/p.png"<?php } ?> alt="" class="nc_profile_img" />
					<?php } ?>
					<span class="msg"><?php echo $__Context->o->text ?></span><span class="ago"><?php echo $__Context->o->ago ?></span>
				</a>
			</li><?php } ?>
		</ul>
		<?php if($__Context->ncenterlite_page_navigation->total_count > 5){ ?><a class="more" href="#" data-page="2"><?php echo $lang->ncenterlite_more ?></a><?php } ?>
	</div>
</div>
