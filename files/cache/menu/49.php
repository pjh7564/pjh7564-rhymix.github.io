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
$_menu_names[51] = array("ko"=>'Welcome',"en"=>'Welcome',"ja"=>'Welcome',"zh-CN"=>'Welcome',"zh-TW"=>'Welcome',"de"=>'Welcome',"es"=>'Welcome',"fr"=>'Welcome',"mn"=>'Welcome',"ru"=>'Welcome',"tr"=>'Welcome',"vi"=>'Welcome',"id"=>'Welcome',); $_menu_names[189] = array("ko"=>'위젯 테스트',"en"=>'위젯 테스트',"ja"=>'위젯 테스트',"zh-CN"=>'위젯 테스트',"zh-TW"=>'위젯 테스트',"de"=>'위젯 테스트',"es"=>'위젯 테스트',"fr"=>'위젯 테스트',"mn"=>'위젯 테스트',"ru"=>'위젯 테스트',"tr"=>'위젯 테스트',"vi"=>'위젯 테스트',"id"=>'위젯 테스트',); $_menu_names[53] = array("ko"=>'Free Board',"en"=>'Free Board',"ja"=>'Free Board',"zh-CN"=>'Free Board',"zh-TW"=>'Free Board',"de"=>'Free Board',"es"=>'Free Board',"fr"=>'Free Board',"mn"=>'Free Board',"ru"=>'Free Board',"tr"=>'Free Board',"vi"=>'Free Board',"id"=>'Free Board',); $_menu_names[55] = array("ko"=>'Q&amp;A',"en"=>'Q&amp;A',"ja"=>'Q&amp;A',"zh-CN"=>'Q&amp;A',"zh-TW"=>'Q&amp;A',"de"=>'Q&amp;A',"es"=>'Q&amp;A',"fr"=>'Q&amp;A',"mn"=>'Q&amp;A',"ru"=>'Q&amp;A',"tr"=>'Q&amp;A',"vi"=>'Q&amp;A',"id"=>'Q&amp;A',); $_menu_names[57] = array("ko"=>'Notice',"en"=>'Notice',"ja"=>'Notice',"zh-CN"=>'Notice',"zh-TW"=>'Notice',"de"=>'Notice',"es"=>'Notice',"fr"=>'Notice',"mn"=>'Notice',"ru"=>'Notice',"tr"=>'Notice',"vi"=>'Notice',"id"=>'Notice',); ; 
$menu->list = array(51 => array(
				"node_srl" => 51,
				"parent_srl" => 0,
				"menu_name_key" => 'Welcome',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[51][$lang_type] : ""),
				"href" => (true ? getSiteUrl('', '','mid','index') : ""),
				"url" => (true ? 'index' : ""),
				"is_shortcut" => 'N',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("page_nmaI61","index") && in_array(Context::get("mid"), array("page_nmaI61","index")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(189 => array(
				"node_srl" => 189,
				"parent_srl" => 51,
				"menu_name_key" => '위젯 테스트',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[189][$lang_type] : ""),
				"href" => (true ? getSiteUrl('', '','mid','page_nmaI61') : ""),
				"url" => (true ? 'page_nmaI61' : ""),
				"is_shortcut" => 'N',
				"icon" => '',
				"desc" => '위젯 테스트',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("page_nmaI61") && in_array(Context::get("mid"), array("page_nmaI61")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("page_nmaI61") && in_array(Context::get("mid"), array("page_nmaI61")) ? $_menu_names[189][$lang_type] : $_menu_names[189][$lang_type]) : "")
),
),
				"link" => (true ? (array("page_nmaI61","index") && in_array(Context::get("mid"), array("page_nmaI61","index")) ? $_menu_names[51][$lang_type] : $_menu_names[51][$lang_type]) : "")
),
53 => array(
				"node_srl" => 53,
				"parent_srl" => 0,
				"menu_name_key" => 'Free Board',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[53][$lang_type] : ""),
				"href" => (true ? getSiteUrl('', '','mid','board') : ""),
				"url" => (true ? 'board' : ""),
				"is_shortcut" => 'N',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("board") && in_array(Context::get("mid"), array("board")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("board") && in_array(Context::get("mid"), array("board")) ? $_menu_names[53][$lang_type] : $_menu_names[53][$lang_type]) : "")
),
55 => array(
				"node_srl" => 55,
				"parent_srl" => 0,
				"menu_name_key" => 'Q&A',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[55][$lang_type] : ""),
				"href" => (true ? getSiteUrl('', '','mid','qna') : ""),
				"url" => (true ? 'qna' : ""),
				"is_shortcut" => 'N',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("qna") && in_array(Context::get("mid"), array("qna")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("qna") && in_array(Context::get("mid"), array("qna")) ? $_menu_names[55][$lang_type] : $_menu_names[55][$lang_type]) : "")
),
57 => array(
				"node_srl" => 57,
				"parent_srl" => 0,
				"menu_name_key" => 'Notice',
				"isShow" => (true ? true : false),
				"text" => (true ? $_menu_names[57][$lang_type] : ""),
				"href" => (true ? getSiteUrl('', '','mid','notice') : ""),
				"url" => (true ? 'notice' : ""),
				"is_shortcut" => 'N',
				"icon" => '',
				"desc" => '',
				"open_window" => 'N',
				"normal_btn" => '',
				"hover_btn" => '',
				"active_btn" => '',
				"selected" => (array("notice") && in_array(Context::get("mid"), array("notice")) ? 1 : 0),
				"expand" => 'N',
				"list" => array(),
				"link" => (true ? (array("notice") && in_array(Context::get("mid"), array("notice")) ? $_menu_names[57][$lang_type] : $_menu_names[57][$lang_type]) : "")
),
); 
if(!$is_admin) { recurciveExposureCheck($menu->list); }
Context::set("included_menu", $menu); ?>
