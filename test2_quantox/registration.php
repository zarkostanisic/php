<?php 
	include("./core/core.php");
	include("./class/user.php");

	if($session->is_signed_in()) header("Location: index.php");

	$errors = array();

	$name = "";
	$email = "";

	if(isset($_POST["registration"])){
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$password = trim($_POST["password"]);
		$password_confirm = trim($_POST["password_confirm"]);

		if(empty($name)) $errors[] = "Field 'Name' is required";
		
		if(empty($email)) $errors[] = "Field 'Email' is required";
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid 'Email' format";
		else if(User::exist($email)) $errors[] = "User already exists";
		
		if(empty($password)) $errors[] = "Field 'Password' is required";
		else if($password != $password_confirm) $errors[] = "Please confirm password";

		if(count($errors) == 0){
			$pasword = md5($password);
			$user = new User();
			$user->name = $name;
			$user->email = $email;
			$user->password = $pasword;

			if($user->create()) {
				$session->login($user);
			}
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Register</title>

 	<?php include("./includes/head.php") ?>
 </head>
 <body>
 	<div id="header">
 	<?php include("./includes/menu.php") ?>
 	<?php include("./includes/search_form.php"); ?>
 	</div>

 	<h1>Registration</h1>
 	<form action="registration.php" method="POST">
 		Name:<input type="text" name="name" value="<?=$name?>"><br/>
 		Email:<input type="text" name="email" value="<?=$email?>"><br/>
 		Password:<input type="password" name="password"><br/>
 		Confirm pasword:<input type="password" name="password_confirm"><br/>
 		<input type="submit" name="registration" value="Registration">
 	</form>
 	<?php include("./includes/errors.php"); ?>
 </body>
 </html>