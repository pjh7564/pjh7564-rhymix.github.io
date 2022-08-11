<?php
if ( !defined('RX_VERSION') )
{
	return;
}
if ( $called_position !== 'after_module_proc' || $this->module !== 'board' )
{
	return;
}
if ( !in_array($this->act, array('dispBoardContent', 'dispBoardWrite', 'dispBoardWriteComment', 'dispBoardReplyComment', 'dispBoardModifyComment', 'dispBoardDeleteComment')) )
{
	return;
}

// 애드온 커스텀 스크립트 전달
if ( $addon_info->script )
{
	Context::addHtmlFooter('<script>'. $addon_info->script .'</script>');
}

// 본문 view 모드
if ( $this->act === 'dispBoardContent' )
{
	$oDocument = Context::get('oDocument');
	// 문서번호 없으면(목록만 있으면) 리턴
	if ( !$oDocument->document_srl )
	{
		return;
	}

	Context::addCssFile(__DIR__ . '/css/default.css');
	Context::addCssFile(__DIR__ . '/css/custom.css');
	Context::addJsFile(__DIR__ . '/js/default.js');

	$editor_config = getModel('editor')->getEditorConfig($this->module_srl);
	// 댓글 허용시에만 임베딩 활성화
	if ( $oDocument->get('comment_status') === 'ALLOW' && in_array($editor_config->comment_editor_skin, array('ckeditor', 'froalaeditor')) )
	{
		Context::addJsFile(__DIR__ . '/js/_' . $editor_config->comment_editor_skin . '.js');
	}
}
// 본문 view 외 모드
else
{
	// 본문 쓰기 모드
	if ( $this->act === 'dispBoardWrite' )
	{
		$editor_config = getModel('editor')->getEditorConfig($this->module_srl);
		if ( in_array($editor_config->editor_skin, array('ckeditor', 'froalaeditor')) )
		{
			Context::addCssFile(__DIR__ . '/css/default.css');
			Context::addCssFile(__DIR__ . '/css/custom.css');
			Context::addJsFile(__DIR__ . '/js/_' . $editor_config->editor_skin . '.js');
		}
	}
	// 댓글 삭제 모드
	else if ( $this->act === 'dispBoardDeleteComment' )
	{
		Context::addCssFile(__DIR__ . '/css/default.css');
		Context::addCssFile(__DIR__ . '/css/custom.css');
		Context::addJsFile(__DIR__ . '/js/default.js');
	}
	// 댓글 쓰기, 댓글 수정, 대댓글 쓰기 모드
	else
	{
		// 대댓글 쓰기 모드일 때만 
		if ( $this->act === 'dispBoardReplyComment' )
		{
			Context::addCssFile(__DIR__ . '/css/default.css');
			Context::addCssFile(__DIR__ . '/css/custom.css');
			Context::addJsFile(__DIR__ . '/js/default.js');
		}

		$editor_config = getModel('editor')->getEditorConfig($this->module_srl);
		if ( in_array($editor_config->comment_editor_skin, array('ckeditor', 'froalaeditor')) )
		{
			// (대댓글 쓰기 모드에선 이미 css를 로드했으므로) 그 외의 경우(댓글 쓰기/수정)에만 로드함
			if ( $this->act !== 'dispBoardReplyComment' )
			{
				Context::addCssFile(__DIR__ . '/css/default.css');
				Context::addCssFile(__DIR__ . '/css/custom.css');
			}
			Context::addJsFile(__DIR__ . '/js/_' . $editor_config->comment_editor_skin . '.js');
		}
	}
}

// 애드온 기본 변수 정리 및 전달
$embed_leave_link = ( $addon_info->leave_link === 'Y' ) ? 1 : 0;
$embed_link_style = ( $addon_info->link_style ) ? $addon_info->link_style : '<p>%text%</p>';

$script = '<script>
	var embed_leave_link = '. $embed_leave_link .';
	var embed_link_style = \''. $embed_link_style .'\';
</script>';
Context::addHtmlHeader($script);