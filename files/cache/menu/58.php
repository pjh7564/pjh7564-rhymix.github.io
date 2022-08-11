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
$_menu_names[59] = array("ko"=>'Rhymix Official Site',"en"=>'Rhymix Official Site',"ja"=>'Rhymix Official Site',"zh-CN"=>'Rhymix Official Site',"zh-TW"=>'Rhymix Official Site',"de"=>'Rhymix Official Site',"es"=>'Rhymix Official Site',"fr"=>'Rhymix Official Site',"mn"=>'Rhymix Official Site',"ru"=>'Rhymix Official Site',"tr"=>'Rhymix Official Site',"vi"=>'Rhymix Official Site',"id"=>'Rhymix Official Site',); $_menu_names[60] = array("ko"=>'Rhymix GitHub',"en"=>'Rhymix GitHub',"ja"=>'Rhymix GitHub',"zh-CN"=>'Rhymix GitHub',"zh-TW"=>'Rhymix GitHub',"de"=>'Rhymix GitHub',"es"=>'Rhymix GitHub',"fr"=>'Rhymix GitHub',"mn"=>'Rhymix GitHub',"ru"=>'Rhymix GitHub',"tr"=>'Rhymix GitHub',"vi"=>'Rhymix GitHub',"id"=>'Rhymix GitHub',); ; 
$menu->list = array(59 => array(
				"node_srl" => 59,
				"parent_srl" => 0,
				"menu_name_key" => 'Rhymix Official Site',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[59][$lang_type] : ""),
				"href" => (true ? 'https://rhymix.org/' : ""),
				"url" => (true ? 'https://rhymix.org/' : ""),
				"is_shortcut" => 'Y',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("https://rhymix.org/") && in_array(Context::get("mid"), array("https://rhymix.org/")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("https://rhymix.org/") && in_array(Context::get("mid"), array("https://rhymix.org/")) ? $_menu_names[59][$lang_type] : $_menu_names[59][$lang_type]) : "")
),
60 => array(
				"node_srl" => 60,
				"parent_srl" => 0,
				"menu_name_key" => 'Rhymix GitHub',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[60][$lang_type] : ""),
				"href" => (true ? 'https://github.com/rhymix' : ""),
				"url" => (true ? 'https://github.com/rhymix' : ""),
				"is_shortcut" => 'Y',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("https://github.com/rhymix") && in_array(Context::get("mid"), array("https://github.com/rhymix")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("https://github.com/rhymix") && in_array(Context::get("mid"), array("https://github.com/rhymix")) ? $_menu_names[60][$lang_type] : $_menu_names[60][$lang_type]) : "")
),
); 
if(!$is_admin) { recurciveExposureCheck($menu->list); }
Context::set("included_menu", $menu); ?>
