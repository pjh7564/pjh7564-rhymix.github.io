<?php if(!defined("__XE__"))exit;
echo $lang->msg_find_account_info ?><br />
<hr noshade="noshade" />
<ul>
	<li><?php echo $lang->site ?> : <a href="<?php echo getUrl() ?>" target="_blank"><?php echo getUrl() ?></a></li>
	<?php $__loop_tmp=$__Context->memberInfo;if($__loop_tmp)foreach($__loop_tmp as $__Context->name=>$__Context->value){;
if(!is_object($__Context->value)&&!is_array($__Context->value)){ ?><li><?php echo $__Context->name ?> : <?php echo $__Context->value ?></li><?php }} ?>
	<li><?php echo $lang->password ?> : <span style="color:red"><?php echo $__Context->auth_args->new_password ?></span></li>
</ul>
<hr noshade="noshade" />
<?php echo $lang->msg_find_account_comment ?><br />
<a href="<?php echo $__Context->find_url ?>"><?php echo $__Context->find_url ?></a>
