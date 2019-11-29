<?php

# Header Function
function go ( $url )
{
  header("location: $url");
}

function php_parse_time() : float
{
	$mTime = round(( microtime(true) - $GLOBALS['microtime'] ) * 1000  , 2);
	return $mTime ;
}

function vendor( $plugin ){
  $dir = __APPDIR. '/app/modules/'. $plugin . '/vendor/autoload.php';
  if( file_exists($dir ) )
      require_once $dir ;
  else
    die("File not found!! {$dir}");
}
function plugindir( $plugin ) : String
{
  return __APPDIR.'/app/modules/'.$plugin ;
}

function import( $plugin )
{
  include_once plugindir($plugin);
}
function template_security()
{
  if(!defined('__APPDIR'))
  {
    die ('What are you doing here ?');
  }
}

function is_temp ($arg) : bool
{
  if($arg == app::$ptype)
  {
    return true;
  }else{
    return false;
  }
}

function get_temp(){
  return app::$ptype;
}


function app_core( $name ){
  $file = __APPDIR.'/app/core/'.$name .".php";
  include $file ;
}