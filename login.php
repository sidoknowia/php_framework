<?php //This will return true if user can login else will return false
// this page will accept data only in encrypted format

require_once 'core/init.php';
$user = new User();

if(!$u = Input::get('u')){
	return false;
}

if(!$p = Input::get('p')){
	return false;
}

$login = $user->login($u,$p);

if($login){
	echo "You can login";
	return true;
} else {
	echo "nope cant login";
	return false;
}