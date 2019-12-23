<?php

/*
  @Config app

  Author : Hina Takanashi (@coder.vi)
  Lincese :
  App Name :
  Based : NekoCode
  Release Date : dd/mm/yyyy

*/

// Public varieble
$microtime = microtime(true);

# Installed directory
Define( 'INSTALLED' , '/ani4vn.com' );

# App root directory
Define('__APPDIR', "{$_SERVER['DOCUMENT_ROOT']}".INSTALLED);

# MIku template engine
Define("MIKU" , [

  "views" => "/views/",
  "controllers" => "/controllers/"

]);

# Name of template are using
Define('ACTIVE_THEME','');

# Config public domain
Define('DOMAIN','ani4vn.moe');

# Config public domain
Define('__APPURI','//'.DOMAIN.INSTALLED);

# Config public domain
Define('TEMPLATE_URI','//'.DOMAIN.INSTALLED.'/public/template/');

Define('TEMPLATE_PATH', __APPDIR.'/public/template/');

require_once __APPDIR."/app/core/app.php";

?>
