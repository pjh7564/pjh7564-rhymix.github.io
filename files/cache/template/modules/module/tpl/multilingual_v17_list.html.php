<?php if(!defined("__XE__"))exit;
/* move current language to the top */
	$__Context->a = array($__Context->lang_type=>$__Context->lang_supported[$__Context->lang_type]);
	unset($__Context->lang_supported[$__Context->lang_type]);
	$__Context->lang_supported = array_merge($__Context->a, $__Context->lang_supported);
 ?>
<?php if(!$__Context->name){ ?><p><?php echo sprintf($lang->about_multilingual_search_result, $__Context->total_count, $__Context->lang_code, $__Context->lang_supported[$__Context->lang_code]) ?></p><?php } ?>
<fieldset class="list">
	<?php $__loop_tmp=$__Context->lang_code_list;if($__loop_tmp)foreach($__loop_tmp as $__Context->no=>$__Context->val){ ?><form action="" class="item"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<a class="set" href="#lang-<?php echo $__Context->no ?>" data-toggle data-lang_code="<?php echo $__Context->val->name ?>"><span><?php echo $__Context->val->value ?></span></a>
		<fieldset id="lang-<?php echo $__Context->no ?>" style="display:none">
			<?php $__loop_tmp=$__Context->lang_supported;if($__loop_tmp)foreach($__loop_tmp as $__Context->code=>$__Context->lname){ ?><textarea disabled class="<?php echo $__Context->code ?>" data-lang="<?php echo $__Context->code ?>" rows="1" cols="12" title="<?php echo $__Context->lname ?>" style="margin-right:5px"></textarea><?php } ?>
			<div class="x_clearfix">
				<span class="x_pull-left x_btn-group">
					<button type="button" class="x_btn modify"><?php echo $lang->cmd_modify ?></button>
					<button type="reset" class="x_btn cancel"><?php echo $lang->cmd_cancel ?></button>
					<button type="button" class="x_btn delete"><?php echo $lang->cmd_delete ?></button>
				</span>
				<span class="x_pull-right">
					<button type="button" class="x_btn useit x_btn-primary"><?php echo $lang->use ?></button>
					<button type="submit" class="x_btn save x_btn-primary"><?php echo $lang->use_after_save ?></button>
				</span>
			</div>
		</fieldset>
	</form><?php } ?>
</fieldset>
<div class="x_clearfix">
	<?php if($__Context->page_navigation){ ?><form action="./" class="x_pagination x_pull-left" data-search_keyword="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" data-page="<?php echo $__Context->page ?>" data-current_lang="<?php echo $__Context->lang_code ?>" ><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<ul>
			<li<?php if(!$__Context->page || $__Context->page == 1){ ?> class="x_disabled"<?php } ?>><a href="#" data-page="1" data-search_keyword="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>">&laquo; <?php echo $lang->first_page ?></a></li>
			<?php if($__Context->page_navigation->first_page != 1 && $__Context->page_navigation->first_page + $__Context->page_navigation->page_count > $__Context->page_navigation->last_page - 1 && $__Context->page_navigation->page_count != $__Context->page_navigation->total_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<li>
				<a href="#goTo" data-toggle title="<?php echo $lang->cmd_go_to_page ?>">&hellip;</a>
				<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
					<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $lang->cmd_go_to_page ?>" />
					<button type="submit" class="x_add-on">Go</button>
				</span><?php } ?>
			</li>
			<?php } ?>
			<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
			<?php $__Context->last_page = $__Context->page_no ?>
			<li<?php if($__Context->page_no == $__Context->page){ ?> class="x_active"<?php } ?>><a  href="#" data-page="<?php echo $__Context->page_no ?>" data-search_keyword="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>"><?php echo $__Context->page_no ?></a></li>
			<?php } ?>
			<?php if($__Context->last_page != $__Context->page_navigation->last_page && $__Context->last_page + 1 != $__Context->page_navigation->last_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<li>
				<a href="#goTo" data-toggle title="<?php echo $lang->cmd_go_to_page ?>">&hellip;</a>
				<?php if($__Context->isGoTo){ ?><span id="goTo" class="x_input-append">
					<input type="number" min="1" max="<?php echo $__Context->page_navigation->last_page ?>" required name="page" title="<?php echo $lang->cmd_go_to_page ?>" />
					<button type="submit" class="x_add-on">Go</button>
				</span><?php } ?>
			</li>
			<?php } ?>
		<li<?php if($__Context->page == $__Context->page_navigation->last_page){ ?> class="x_disabled"<?php } ?>><a href="#" data-page="<?php echo $__Context->page_navigation->last_page ?>" data-search_keyword="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" title="<?php echo $__Context->page_navigation->last_page ?>"><?php echo $lang->last_page ?> &raquo;</a></li>
		</ul>
	</form><?php } ?>
	<form action="" class="search center x_input-append x_pull-right"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />
		<select name="lang_code" style="margin-right:4px">
			<?php $__loop_tmp=$__Context->lang_supported;if($__loop_tmp)foreach($__loop_tmp as $__Context->code=>$__Context->lname){ ?><option value="<?php echo $__Context->code ?>"<?php if($__Context->code == $__Context->lang_code){ ?> selected="selected"<?php } ?>><?php echo $__Context->lname ?></option><?php } ?>
		</select>
		<input type="search" name="search_keyword" title="Search" value="<?php if($__Context->name){;
echo htmlspecialchars($__Context->lang_code_list[1]->value, ENT_COMPAT | ENT_HTML401, 'UTF-8', false);
}else{;
echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false);
} ?>">
		<button class="x_btn x_btn-inverse" type="submit"><?php echo $lang->cmd_search ?></button>
		<?php if($__Context->search_keyword || $__Context->name){ ?><button id="search_cancel" class="x_btn" type="button"><?php echo $lang->cmd_cancel ?></button><?php } ?>
	</form>
</div>
