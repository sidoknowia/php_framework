<?php
class Token{
	public static function generate(){
		return Session::put(Config::get('Session/token_name'),md5(uniqid()));
	}

	public static function check($token){
		$tokenName = Config::get('Session/token_name');


		//echo "tk name ---- ";
		//print_r($tokenName);

		//echo '<br>'.$token.'<---token <br>';

		if(Session::exists($tokenName) && $token === Session::get($tokenName)){
			//echo "string";
			Session::delete($tokenName);
			return true;
		}
		//echo "sssssooooo";
		return false;
	}
}