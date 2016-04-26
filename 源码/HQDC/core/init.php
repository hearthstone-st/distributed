<?php
session_start();

$GLOBALS['config'] =  array(
	'mysql'  => array(
		'host' => '127.0.0.1',
		'port'=>'80',
		'username'  => 'root',
		'password' => '',
		'db' => 'distributed_course'
	),
	'remember' => array(
		'cookie_name' => 'hash' ,
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	),
	'images'=>array(
		'portraits' => 'images/portraits/',
		'post' => 'upfile/postImages/'
	)

);

require_once 'application/phpExcel/PHPExcel.php';
require_once 'application/phpExcel/PHPExcel/Writer/Excel2007.php';
spl_autoload_register(function($class){
	require_once 'class/' . $class . '.php';
});
require_once 'function/sanitize.php';


if(Cookie::exists(Config::get('remember/cookie_name'))&& !Session::exists(Config::get('session/session_name'))){
	$hash =Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session',array('hash' , '=', $hash));

	if($hashCheck -> count()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}