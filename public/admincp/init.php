<?php
include "../config.inc.php";

/**
* Define stastic varieble
**/

$HomeTilte = "Ani4VN";

$cmtCount = DB::query("SELECT COUNT(*) as count FROM comment ")[0]['count'];

$postCount = DB::query("SELECT COUNT(*) as count FROM posts ")[0]['count'];

$userCount = DB::query("SELECT COUNT(*) as count FROM users ")[0]['count'];

