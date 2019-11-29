<?php
session_start();

include "../config.inc.php";

if( !isset($_SESSION['userlogin']) )
{
	header("location: login.php");
}

if( isset($_GET['logout']) )
{
	unset($_SESSION['userlogin']);
	header('location: login.php');
}

$statics = new class{
	public $views;
	public $animes;
	public $episodes;
	public $users;
  };

$admin = new class extends DB{
	public $name;

	public $userPermission;

	public $animeID;

	public $userId;

	public function getCookieLogin()
	{
		return "admin";
	}

	public function getuserID()
	{
		return Self::query("SELECT user_id FROM users WHERE user_login = %s",self::getCookieLogin())[0]['id'];
	}

	public function getuserPermission()
	{

	}

	public function getuserAvatar()
	{

	}

	private function send(){
		echo "OK";
	}

	public function userData() 
	{

	}

	public function logout()
	{

	}

	public function login( Array $data)
	{
		
	}

	public function createUser( Array $data )
	{

	}

	public function banUser( Int $id )
	{

	}

	public function addAnime(Array $data)
	{
		Self::insert('posts',$data);
	}

	public function updateAnime(Array $data)
	{
		Self::update('posts',$data);
	}

	public function delAnime(Int $id)
	{

	}

	public function getStas(  $key )
	{
		switch($key)
		{
			case "views":
				return Self::query( "SELECT @views := (SELECT SUM(episodes.views) FROM episodes ) + (SELECT SUM(postmeta.meta_value) FROM postmeta WHERE postmeta.meta_key = 'views') AS views " )[0]['views'];
				break;

			case "animes":
				return Self::query( "SELECT COUNT(*) FROM `posts`")[0]['COUNT(*)'];
				break;

			case "episodes":
				return Self::query( "SELECT COUNT(*) FROM episodes")[0]['COUNT(*)'];
				break;

			case "users":
				return Self::query( "SELECT COUNT(*) FROM users")[0]['COUNT(*)'];
				break;
		}

	}

};

$userloggedin = DB::query("SELECT * FROM users WHERE user_login = %s ",$_SESSION['userlogin'])[0];

$user = (object)[
	'user_displayname' => $userloggedin['user_displayname'],
	'userLogin' => $_SESSION['userlogin'],
	'userPermission' => 'Administrator',
	'userAccess' => [ 'dashboard','anime' , 'newAnime' , 'fansub', 'users' ,'taxonomy' ],
	'userAvatar' => $userloggedin['user_avatar'],
	'user_id' => $userloggedin['user_id']
];

$statics->views = $admin->getStas('views');
$statics->animes = $admin->getStas('animes');
$statics->episodes = $admin->getStas('episodes');
$statics->users = $admin->getStas('users');

$blog = new class {
	public $title = "Ani4VN";
};

