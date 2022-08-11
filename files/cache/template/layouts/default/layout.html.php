<?php if(!defined("__XE__"))exit;?><!--#Meta:layouts/default/default.layout.css--><?php Context::loadFile(['layouts/default/default.layout.css', '', '', '', []]); ?>
<?php if($__Context->layout_info->WEB_FONT == 'YES'){ ?><!--#Meta:layouts/default/default.layout.webfont.css--><?php Context::loadFile(['layouts/default/default.layout.webfont.css', '', '', '', []]);
} ?>
<!--#Meta:common/js/respond.min.js--><?php Context::loadFile(['common/js/respond.min.js', '', 'lt IE 9', '']); ?>
<!--#Meta:layouts/default/default.layout.js--><?php Context::loadFile(['layouts/default/default.layout.js', 'body', '', '']); ?>
<div class="container">
	<p class="skip"><a href="#content"><?php echo $lang->skip_to_content ?></a></p>
	<header class="header">
		<h1>
			<a href="<?php echo geturl('') ?>" id="siteTitle">
				<?php if(!Context::getSiteTitle() && !$__Context->layout_info->LOGO_IMG && !$__Context->layout_info->LOGO_TEXT){ ?><img src="/dev/layouts/default/siteTitle.png" alt="Rhymix"><?php } ?>
				<?php if(Context::getSiteTitle() && !$__Context->layout_info->LOGO_IMG && !$__Context->layout_info->LOGO_TEXT){;
echo Context::getSiteTitle();
} ?>
				<?php if($__Context->layout_info->LOGO_IMG){ ?><img src="<?php echo $__Context->layout_info->LOGO_IMG ?>" alt="<?php echo $__Context->layout_info->LOGO_TEXT ?>"><?php } ?>
				<?php if(!$__Context->layout_info->LOGO_IMG && $__Context->layout_info->LOGO_TEXT){;
echo $__Context->layout_info->LOGO_TEXT;
} ?>
			</a>
		</h1>
		<div class="side">
			<!-- ACCOUNT -->
			<img widget="login_info" skin="default" />
			<!-- /ACCOUNT -->
			<!-- SEARCH -->
			<form action="<?php echo getUrl() ?>" method="get" class="search" >
				<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
				<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
				<input type="hidden" name="act" value="IS" />
				<input type="text" name="is_keyword" value="<?php echo $__Context->is_keyword ?>" required placeholder="<?php echo $lang->cmd_search ?>" title="<?php echo $lang->cmd_search ?>" />
				<input type="submit" value="<?php echo $lang->cmd_search ?>" />
			</form>
			<!-- /SEARCH -->
		</div>
		<!-- GNB -->
		<nav class="gnb" id="gnb">
			<ul>
				<?php $__loop_tmp=$__Context->GNB->list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key1=>$__Context->val1){ ?><li<?php if($__Context->val1['selected']){ ?> class="active"<?php } ?>>
					<a href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val1['link'] ?></a>
					<?php if($__Context->val1['list']){ ?><ul>
						<?php $__loop_tmp=$__Context->val1['list'];if($__loop_tmp)foreach($__loop_tmp as $__Context->key2=>$__Context->val2){ ?><li<?php if($__Context->val2['selected']){ ?> class="active"<?php } ?>><a href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val2['link'] ?></a></li><?php } ?>
					</ul><?php } ?>
				</li><?php } ?>
			</ul>
		</nav>
		<!-- /GNB -->
	</header>
	<!-- VISUAL | DEFAULT -->
	<?php if(!$__Context->layout_info->VISUAL_IMAGE_1 && !$__Context->layout_info->VISUAL_IMAGE_2 && !$__Context->layout_info->VISUAL_IMAGE_3 && $__Context->layout_info->VISUAL_USE=='YES'){ ?><div<?php if($__Context->layout_info->LAYOUT_TYPE=='MAIN_PAGE'){ ?> class="visual main"<?php };
if($__Context->layout_info->LAYOUT_TYPE=='SUB_PAGE'){ ?> class="visual sub"<?php } ?>>
		<div class="list">
			<?php if($__Context->layout_info->LAYOUT_TYPE=='MAIN_PAGE'){ ?><a href="<?php echo geturl('','module','admin','act','dispAdminConfigGeneral') ?>" class="item i1">
				<img src="/dev/layouts/default/visual.main.1.jpg" alt="" />
				<p>Click, to change<br> the site title.</p>
			</a><?php } ?>
			<?php if($__Context->layout_info->LAYOUT_TYPE=='MAIN_PAGE'){ ?><a href="<?php echo geturl('','module','admin','act','dispMenuAdminSiteMap') ?>" class="item i2">
				<img src="/dev/layouts/default/visual.main.2.jpg" alt="" />
				<p>Click, to change<br> the site navigation.</p>
			</a><?php } ?>
			<?php if($__Context->layout_info->LAYOUT_TYPE=='MAIN_PAGE'){ ?><a href="<?php echo geturl('','module','admin','act','dispLayoutAdminInstanceList','layout','default') ?>" class="item i3">
				<img src="/dev/layouts/default/visual.main.3.jpg" alt="" />
				<p>Click, to change<br> the site visual image.</p>
			</a><?php } ?>
			<?php if($__Context->layout_info->LAYOUT_TYPE=='SUB_PAGE'){ ?><a href="<?php echo geturl('','module','admin','act','dispLayoutAdminInstanceList','layout','default') ?>" class="item i1">
				<img src="/dev/layouts/default/visual.sub.jpg" alt="" />
				<p>Click, to change the site visual image.</p>
			</a><?php } ?>
		</div>
		<button type="button" class="prev" title="Prev"><i></i></button>
		<button type="button" class="next" title="Next"><i></i></button>
	</div><?php } ?>
	<!-- VISUAL | USER DEFINE -->
	<?php if(($__Context->layout_info->VISUAL_IMAGE_1 || $__Context->layout_info->VISUAL_IMAGE_2 || $__Context->layout_info->VISUAL_IMAGE_3) && $__Context->layout_info->VISUAL_USE=='YES'){ ?><div<?php if($__Context->layout_info->LAYOUT_TYPE=='MAIN_PAGE'){ ?> class="visual main"<?php };
if($__Context->layout_info->LAYOUT_TYPE=='SUB_PAGE'){ ?> class="visual sub"<?php } ?>>
		<div class="list">
			<?php if($__Context->layout_info->VISUAL_IMAGE_1){ ?><a href="<?php echo $__Context->layout_info->VISUAL_LINK_1 ?>" class="item i1">
				<img src="<?php echo $__Context->layout_info->VISUAL_IMAGE_1 ?>" alt="" />
				<p><?php echo $__Context->layout_info->VISUAL_TEXT_1 ?></p>
			</a><?php } ?>
			<?php if($__Context->layout_info->VISUAL_IMAGE_2){ ?><a href="<?php echo $__Context->layout_info->VISUAL_LINK_2 ?>" class="item i2">
				<img src="<?php echo $__Context->layout_info->VISUAL_IMAGE_2 ?>" alt="" />
				<p><?php echo $__Context->layout_info->VISUAL_TEXT_2 ?></p>
			</a><?php } ?>
			<?php if($__Context->layout_info->VISUAL_IMAGE_3){ ?><a href="<?php echo $__Context->layout_info->VISUAL_LINK_3 ?>" class="item i3">
				<img src="<?php echo $__Context->layout_info->VISUAL_IMAGE_3 ?>" alt="" />
				<p><?php echo $__Context->layout_info->VISUAL_TEXT_3 ?></p>
			</a><?php } ?>
		</div>
		<button type="button" class="prev" title="Prev"><i></i></button>
		<button type="button" class="next" title="Next"><i></i></button>
	</div><?php } ?>
	<!-- /VISUAL -->
	<div<?php if($__Context->layout_info->LAYOUT_TYPE=='MAIN_PAGE'){ ?> class="body main"<?php };
if($__Context->layout_info->LAYOUT_TYPE=='SUB_PAGE'){ ?> class="body sub"<?php } ?>>
		<!-- LNB -->
		<?php if($__Context->layout_info->LAYOUT_TYPE == 'SUB_PAGE'){ ?><nav class="lnb">
			<?php $__loop_tmp=$__Context->GNB->list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key1=>$__Context->val1){;
if($__Context->val1['selected']){ ?><h1><a href="<?php echo $__Context->val1['href'] ?>"<?php if($__Context->val1['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val1['link'] ?></a></h1><?php }} ?>
			<?php $__loop_tmp=$__Context->GNB->list;if($__loop_tmp)foreach($__loop_tmp as $__Context->key1=>$__Context->val1){;
if($__Context->val1['selected'] && $__Context->val1['list']){ ?><ul>
				<?php $__loop_tmp=$__Context->val1['list'];if($__loop_tmp)foreach($__loop_tmp as $__Context->key2=>$__Context->val2){ ?><li<?php if($__Context->val2['selected']){ ?> class="active"<?php } ?>><a href="<?php echo $__Context->val2['href'] ?>"<?php if($__Context->val2['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val2['link'] ?></a>
					<?php if($__Context->val2['list']){ ?><ul>
						<?php $__loop_tmp=$__Context->val2['list'];if($__loop_tmp)foreach($__loop_tmp as $__Context->key3=>$__Context->val3){ ?><li<?php if($__Context->val3['selected']){ ?> class="active"<?php } ?>><a href="<?php echo $__Context->val3['href'] ?>"<?php if($__Context->val3['open_window']=='Y'){ ?> target="_blank"<?php } ?>><?php echo $__Context->val3['link'] ?></a></li><?php } ?>
					</ul><?php } ?>
				</li><?php } ?>
			</ul><?php }} ?>
		</nav><?php } ?>
		<!-- /LNB -->
		<!-- CONTENT -->
		<div class="content" id="content">
			<?php echo $__Context->content ?>
		</div>
		<!-- /CONTENT -->
	</div>
</div>
<footer class="footer">
	<?php if(!$__Context->layout_info->FOOTER){ ?><p>Powered by <a href="https://rhymix.org">Rhymix</a></p><?php } ?>
	<?php if($__Context->layout_info->FOOTER){ ?><p><?php echo $__Context->layout_info->FOOTER ?></p><?php } ?>
</footer>
