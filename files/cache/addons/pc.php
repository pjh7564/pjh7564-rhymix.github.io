<?php if(!defined("__XE__")) exit();
$before_time = microtime(true);
$rm = 'run_selected';
$ml = array (
);
$_m = Context::get('mid');
$addon_file = RX_BASEDIR . 'addons/autolink/autolink.addon.php';
$addon_info = unserialize('O:8:"stdClass":0:{}');
$run = true;
if ($run && file_exists($addon_file)):
  include($addon_file);
  $after_time = microtime(true);
  if (class_exists("Rhymix\\Framework\\Debug") && Rhymix\Framework\Debug::isEnabledForCurrentUser()):
    Rhymix\Framework\Debug::addTrigger(array(
      "name" => "addon." . $called_position,
      "target" => "autolink",
      "target_plugin" => "autolink",
      "elapsed_time" => $after_time - $before_time,
    ));
  endif;
endif;

$before_time = microtime(true);
$rm = 'run_selected';
$ml = array (
);
$_m = Context::get('mid');
$addon_file = RX_BASEDIR . 'addons/photoswipe/photoswipe.addon.php';
$addon_info = unserialize('O:8:"stdClass":0:{}');
$run = true;
if ($run && file_exists($addon_file)):
  include($addon_file);
  $after_time = microtime(true);
  if (class_exists("Rhymix\\Framework\\Debug") && Rhymix\Framework\Debug::isEnabledForCurrentUser()):
    Rhymix\Framework\Debug::addTrigger(array(
      "name" => "addon." . $called_position,
      "target" => "photoswipe",
      "target_plugin" => "photoswipe",
      "elapsed_time" => $after_time - $before_time,
    ));
  endif;
endif;
