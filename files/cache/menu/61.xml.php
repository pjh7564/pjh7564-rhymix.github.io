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
<root><node node_srl="63" parent_srl="0" menu_name_key='Terms of Service' text="<?php if(true) { $_names = array('ko' => 'Terms of Service', 'en' => 'Terms of Service', 'ja' => 'Terms of Service', 'zh-CN' => 'Terms of Service', 'zh-TW' => 'Terms of Service', 'de' => 'Terms of Service', 'es' => 'Terms of Service', 'fr' => 'Terms of Service', 'mn' => 'Terms of Service', 'ru' => 'Terms of Service', 'tr' => 'Terms of Service', 'vi' => 'Terms of Service', 'id' => 'Terms of Service', ); print $_names[$lang_type]; }?>" url="<?php print(true?'terms':"")?>" href="<?php print(true?getSiteUrl('', '','mid','terms'):"")?>" is_shortcut='N' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /><node node_srl="65" parent_srl="0" menu_name_key='Privacy Policy' text="<?php if(true) { $_names = array('ko' => 'Privacy Policy', 'en' => 'Privacy Policy', 'ja' => 'Privacy Policy', 'zh-CN' => 'Privacy Policy', 'zh-TW' => 'Privacy Policy', 'de' => 'Privacy Policy', 'es' => 'Privacy Policy', 'fr' => 'Privacy Policy', 'mn' => 'Privacy Policy', 'ru' => 'Privacy Policy', 'tr' => 'Privacy Policy', 'vi' => 'Privacy Policy', 'id' => 'Privacy Policy', ); print $_names[$lang_type]; }?>" url="<?php print(true?'privacy':"")?>" href="<?php print(true?getSiteUrl('', '','mid','privacy'):"")?>" is_shortcut='N' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /></root>