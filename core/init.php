<?php

session_start();
//define('INC_ROOT', dirname(__DIR__));
$GLOBALS['config']=array(
	'mysql'=> array(
		'host' => '127.0.0.1', 
		'username'=>'root',
		'password'=>'',
		'db' => 'localize'
	),
	'remember'=>array(
		'cookie_name' => 'hash',
		'cookie_expiry'=>604800
		),
	'Session'=>array(
		'session_name'=>'user',
		'token_name' => 'token'
		)
);

spl_autoload_register(function($class){
	//require_once(INC_ROOT.'/classes/'.$class.'.php');
	require_once 'classes/'.$class.'.php';
});	

date_default_timezone_set('Asia/Calcutta');

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('Session/session_name'))) {
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session',array(
		'hash','=',$hash
		));

	if ($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}

require_once 'functions/sanatize.php';


?>