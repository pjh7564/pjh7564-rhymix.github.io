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
<root><node node_srl="59" parent_srl="0" menu_name_key='Rhymix Official Site' text="<?php if(true) { $_names = array('ko' => 'Rhymix Official Site', 'en' => 'Rhymix Official Site', 'ja' => 'Rhymix Official Site', 'zh-CN' => 'Rhymix Official Site', 'zh-TW' => 'Rhymix Official Site', 'de' => 'Rhymix Official Site', 'es' => 'Rhymix Official Site', 'fr' => 'Rhymix Official Site', 'mn' => 'Rhymix Official Site', 'ru' => 'Rhymix Official Site', 'tr' => 'Rhymix Official Site', 'vi' => 'Rhymix Official Site', 'id' => 'Rhymix Official Site', ); print $_names[$lang_type]; }?>" url="<?php print(true?'https://rhymix.org/':"")?>" href="<?php print(true?'https://rhymix.org/':"")?>" is_shortcut='Y' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /><node node_srl="60" parent_srl="0" menu_name_key='Rhymix GitHub' text="<?php if(true) { $_names = array('ko' => 'Rhymix GitHub', 'en' => 'Rhymix GitHub', 'ja' => 'Rhymix GitHub', 'zh-CN' => 'Rhymix GitHub', 'zh-TW' => 'Rhymix GitHub', 'de' => 'Rhymix GitHub', 'es' => 'Rhymix GitHub', 'fr' => 'Rhymix GitHub', 'mn' => 'Rhymix GitHub', 'ru' => 'Rhymix GitHub', 'tr' => 'Rhymix GitHub', 'vi' => 'Rhymix GitHub', 'id' => 'Rhymix GitHub', ); print $_names[$lang_type]; }?>" url="<?php print(true?'https://github.com/rhymix':"")?>" href="<?php print(true?'https://github.com/rhymix':"")?>" is_shortcut='Y' icon='' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /></root>