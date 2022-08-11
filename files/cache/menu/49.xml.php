<?php 
require_once('D:/xampp/htdocs/dev/common/autoload.php');
Context::init(); 
header("Content-Type: text/xml; charset=UTF-8");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$lang_type = Context::getLangType();
$is_logged = Context::get('is_logged');
$logged_info = Context::get('logged_info');
$site_srl = 0;
$site_admin = false;
if($site_srl) {
  $oModuleModel = getModel('module');
  $site_module_info = $oModuleModel->getSiteInfo($site_srl);
  if($site_module_info) Context::set('site_module_info',$site_module_info);
  else $site_module_info = Context::get('site_module_info');
  $grant = $oModuleModel->getGrant($site_module_info, $logged_info);
  if($grant->manager ==1) $site_admin = true;
}
if($is_logged) {
  if($logged_info->is_admin=="Y") $is_admin = true;
  else $is_admin = false;
  $group_srls = array_keys($logged_info->group_list);
} else {
  $is_admin = false;
  $group_srls = array();
}
$oContext->close(); ?>
<root><node node_srl="51" parent_srl="0" menu_name_key='Welcome' text="<?php if(true) { $_names = array('ko' => 'Welcome', 'en' => 'Welcome', 'ja' => 'Welcome', 'zh-CN' => 'Welcome', 'zh-TW' => 'Welcome', 'de' => 'Welcome', 'es' => 'Welcome', 'fr' => 'Welcome', 'mn' => 'Welcome', 'ru' => 'Welcome', 'tr' => 'Welcome', 'vi' => 'Welcome', 'id' => 'Welcome', ); print $_names[$lang_type]; }?>" url="<?php print(true?'index':"")?>" href="<?php print(true?getSiteUrl('', '','mid','index'):"")?>" is_shortcut='N' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>"><node node_srl="189" parent_srl="51" menu_name_key='위젯 테스트' text="<?php if(true) { $_names = array('ko' => '위젯 테스트', 'en' => '위젯 테스트', 'ja' => '위젯 테스트', 'zh-CN' => '위젯 테스트', 'zh-TW' => '위젯 테스트', 'de' => '위젯 테스트', 'es' => '위젯 테스트', 'fr' => '위젯 테스트', 'mn' => '위젯 테스트', 'ru' => '위젯 테스트', 'tr' => '위젯 테스트', 'vi' => '위젯 테스트', 'id' => '위젯 테스트', ); print $_names[$lang_type]; }?>" url="<?php print(true?'page_nmaI61':"")?>" href="<?php print(true?getSiteUrl('', '','mid','page_nmaI61'):"")?>" is_shortcut='N' icon='' desc='위젯 테스트' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /></node><node node_srl="53" parent_srl="0" menu_name_key='Free Board' text="<?php if(true) { $_names = array('ko' => 'Free Board', 'en' => 'Free Board', 'ja' => 'Free Board', 'zh-CN' => 'Free Board', 'zh-TW' => 'Free Board', 'de' => 'Free Board', 'es' => 'Free Board', 'fr' => 'Free Board', 'mn' => 'Free Board', 'ru' => 'Free Board', 'tr' => 'Free Board', 'vi' => 'Free Board', 'id' => 'Free Board', ); print $_names[$lang_type]; }?>" url="<?php print(true?'board':"")?>" href="<?php print(true?getSiteUrl('', '','mid','board'):"")?>" is_shortcut='N' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /><node node_srl="55" parent_srl="0" menu_name_key='Q&A' text="<?php if(true) { $_names = array('ko' => 'Q&A', 'en' => 'Q&A', 'ja' => 'Q&A', 'zh-CN' => 'Q&A', 'zh-TW' => 'Q&A', 'de' => 'Q&A', 'es' => 'Q&A', 'fr' => 'Q&A', 'mn' => 'Q&A', 'ru' => 'Q&A', 'tr' => 'Q&A', 'vi' => 'Q&A', 'id' => 'Q&A', ); print $_names[$lang_type]; }?>" url="<?php print(true?'qna':"")?>" href="<?php print(true?getSiteUrl('', '','mid','qna'):"")?>" is_shortcut='N' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /><node node_srl="57" parent_srl="0" menu_name_key='Notice' text="<?php if(true) { $_names = array('ko' => 'Notice', 'en' => 'Notice', 'ja' => 'Notice', 'zh-CN' => 'Notice', 'zh-TW' => 'Notice', 'de' => 'Notice', 'es' => 'Notice', 'fr' => 'Notice', 'mn' => 'Notice', 'ru' => 'Notice', 'tr' => 'Notice', 'vi' => 'Notice', 'id' => 'Notice', ); print $_names[$lang_type]; }?>" url="<?php print(true?'notice':"")?>" href="<?php print(true?getSiteUrl('', '','mid','notice'):"")?>" is_shortcut='N' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /></root>