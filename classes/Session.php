<?php

require_once 'core/init.php';

class Session{
	
	public static function exists($name){
		//echo '<br> session ---> '.$_SESSION[$name];
		return (isset($_SESSION[$name])) ? true : false;
	}

	public static function put($name,$value){
		return $_SESSION[$name] = $value;
	}

	public static function get($name){
		//print_r($_SESSION[$name]).'--- session name ===';
		return $_SESSION[$name];
	}

	public static function delete($name){
		if(Self::exists($name)){
			unset($_SESSION[$name]);
		}
	}

	public static function flash($name, $string=""){
		if(Self::exists($name)){
			$session = Self::get($name);
			Self::delete($name);
			return $session;
		}else{
			Self::put($name,$string);
		}
	}
}