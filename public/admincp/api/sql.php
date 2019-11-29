<?php

/**
* Include Config & Autoload
**/
include_once "{$_SERVER['DOCUMENT_ROOT']}/build.php";

/**
* Medoo Database API
**/

// $GLOBALS['Medoo']->select( 'rory_posts',[
// 	'post_title' => ''
// ]);

/**
* PhpScript API
**/

// $GLOBALS['_init_db']->insert( 'rory_posts', [
// 	'post_author' => 1,
// 	'post_date' => date('Y-m-d h:i:s'),
// 	'post_content' => 'Venom là một kẻ thù nguy hiểm và nặng ký của Người nhện trong loạt series của Marvel. Nhân vật Eddie Brock (do Tom Hardy thủ vai) trong phim đã không may mắn khi nhiễm phải loại cộng sinh trùng ngoài hành tinh và từ đó đã không còn làm chủ bản thân về thể chất lẫn tinh thần. Điều này đã dần biến anh thành quái vật đen tối và nguy hiểm nhất chống lại người Nhện- Venom',
// 	'post_title' => 'Quái Vật Venom',
// 	'post_type' => 'anime',
// 	'post_modified' =>  date('Y-m-d h:i:s')
// ]);


$GLOBALS['_init_db']->insert( 'rory_postmeta', [
	'post_id' => 4,
	'meta_key' => 'thumbnail',
	'meta_value' => 'https://img1.ak.crunchyroll.com/i/spire2/6c109728160434e952a2e4ddfec1844c1531041569_full.jpg'
]);



// $data = $GLOBALS['Medoo']->select( 'rory_posts','*',[
// 	'LIMIT' => 12
// ]);

// foreach ($data as $key => $value) {
// 	echo "<p>{$value['post_title']}</p>";
// }