<?php
include_once "{$_SERVER['DOCUMENT_ROOT']}/var/config.php";

session_start();
$app_id = "2155416488026644";
$app_secret = "2e113fa87158bf28442f2594ee7225e7";
$redirect_uri = urlencode("https://ani4vn.com/api/v1/facebook");    

// Get code value
$code = $_GET['code'];
// Get access token info
$response = curl("https://graph.facebook.com/v3.1/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code"); 

// Lấy mã token
$access_token = json_decode($response)->access_token;

// Lấy Thông tin người dùng
$response = curl("https://graph.facebook.com/me?fields=id,name,email,picture,first_name,link&access_token=$access_token"); 



$users = json_decode($response);    

//print_r($user->id);

if (  $users->email  ) 
	$username = $users->email;
else
$username = $users->id ;

$avatar_uri = "https://graph.facebook.com/{$users->id}/picture?width=150&height=150";

if( DB::query("SELECT * FROM users WHERE user_login = %s", $username)[0]['user_login'] != $username  )
{
	DB::insert( 'users', [
        'user_login' => $username,
        'user_pass' => password_hash( generateRandomString() , PASSWORD_DEFAULT ),
        'user_email' => $user->email,
        'user_displayname' => $users->name ,
        'user_avatar' => 'http://ani4vn.com/logo.jpeg',
        'user_activation_key' => fRand(25)
	  ]);
	DB::insert("usermeta",[
		'user_id' => DB::insertId(),
		'meta_key' => 'level',
		'meta_value' => 1
	]);
	
	
	setcookie("username", $username, time() + ( (3600 * 24  ) * 2 ),'/');
	header( "location: ../" );
	

}else{
	setcookie("username", $username, time() + ( (3600 * 24  ) * 2 ),'/');
	header( "location: ../" );
}


function curl($url)
{
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
	$page = curl_exec($ch);
	curl_close($ch);
	return $page;
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}