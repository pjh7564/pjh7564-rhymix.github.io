<?php 
if(!defined("__XE__")) exit();
$menu = new stdClass();
$_menu_names = $_menu_names ?? [];
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
}; 
$_menu_names[63] = array("ko"=>'Terms of Service',"en"=>'Terms of Service',"ja"=>'Terms of Service',"zh-CN"=>'Terms of Service',"zh-TW"=>'Terms of Service',"de"=>'Terms of Service',"es"=>'Terms of Service',"fr"=>'Terms of Service',"mn"=>'Terms of Service',"ru"=>'Terms of Service',"tr"=>'Terms of Service',"vi"=>'Terms of Service',"id"=>'Terms of Service',); $_menu_names[65] = array("ko"=>'Privacy Policy',"en"=>'Privacy Policy',"ja"=>'Privacy Policy',"zh-CN"=>'Privacy Policy',"zh-TW"=>'Privacy Policy',"de"=>'Privacy Policy',"es"=>'Privacy Policy',"fr"=>'Privacy Policy',"mn"=>'Privacy Policy',"ru"=>'Privacy Policy',"tr"=>'Privacy Policy',"vi"=>'Privacy Policy',"id"=>'Privacy Policy',); ; 
$menu->list = array(63 => array(
				"node_srl" => 63,
				"parent_srl" => 0,
				"menu_name_key" => 'Terms of Service',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[63][$lang_type] : ""),
				"href" => (true ? getSiteUrl('', '','mid','terms') : ""),
				"url" => (true ? 'terms' : ""),
				"is_shortcut" => 'N',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("terms") && in_array(Context::get("mid"), array("terms")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("terms") && in_array(Context::get("mid"), array("terms")) ? $_menu_names[63][$lang_type] : $_menu_names[63][$lang_type]) : "")
),
65 => array(
				"node_srl" => 65,
				"parent_srl" => 0,
				"menu_name_key" => 'Privacy Policy',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[65][$lang_type] : ""),
				"href" => (true ? getSiteUrl('', '','mid','privacy') : ""),
				"url" => (true ? 'privacy' : ""),
				"is_shortcut" => 'N',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("privacy") && in_array(Context::get("mid"), array("privacy")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("privacy") && in_array(Context::get("mid"), array("privacy")) ? $_menu_names[65][$lang_type] : $_menu_names[65][$lang_type]) : "")
),
); 
if(!$is_admin) { recurciveExposureCheck($menu->list); }
Context::set("included_menu", $menu); ?>
