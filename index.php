<?php 
require_once 'core/init.php';
if (Input::exists()) {
	
	$u = Input::get('username');
	$p = Input::get('password');
	
	echo $u;
	echo $p;

	//Redirect::to("enc.php?type=encrypt&u=".$u."&p=".$p.""); //For login
	Redirect::to("login.php?u=".$u."&p=".$p."");
} 

$user = new User();
//print_r($user->dataInfo());

?>

<form action="#" method="post">
	<input type="input" name="username" value="" />
	<input type="password" name="password" value="" />
	<input type="submit" name="submit" value="submit" />
</form>