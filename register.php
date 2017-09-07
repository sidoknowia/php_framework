<?php 
	require_once 'core/init.php';

	if (Input::exists()) {
		//echo "Input <br>";
		//Redirect::to('index.php');
		if(Token::check(Input::get('token'))){

			$user = new User();
			$salt = Hash::salt(32);
			if(Input::get('password') == Input::get('password_again')){
				try{
				$user->create('user',array(
					'username'  => Input::get('username'),
					'password'  => Hash::make(Input::get('password'),$salt),
					'salt'      => $salt,
					'name'      => Input::get('name'),
					'date_registered'    => date('Y-m-d H:i:s'),
				));

				//Session::flash('home','You are registered and can now login!');
				Redirect::to('index.php');
				}catch(Exception $e){
					die($e->getMessage());
				}
			}
			
		}	
	}
?>

<html>
<head><title>Register</title></head>
<body>
	<form action="#" method="post">
		<div class="form-field">
			<label for ="username">Username</label>
			<input type="text" id="username" name="username" value="" >
		</div>

		<div class="form-field">
			<label for= "name">Name</label>
			<input type="text" id="name" name="name" value="" >
		</div>

		<div class="form-field">
			<label for ="password">Password</label>
			<input type="password" id="password" name="password" value="" >
		</div>

		<div class="form-field">
			<label for ="password_again">Password Again</label>
			<input type="password" id="password_again" name="password_again" value="" >
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> 

		<div class="form-field">
			<input type="submit" id="submit" value="Register">
		</div>
	</form>
</body>
</html>