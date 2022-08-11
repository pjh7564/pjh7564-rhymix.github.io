<?php if(!defined("__XE__"))exit;?>	<form onSubmit="return false"><input type="hidden" name="error_return_url" value="<?php echo escape(getRequestUriByServerEnviroment(), false); ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?? ''; ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?? ''; ?>" />	
		<input type="hidden" name="dummy_content" />
		<input type="hidden" name="dummy_key" value="1" />
		<p><?php echo $__Context->editor ?></p>
	</form>
