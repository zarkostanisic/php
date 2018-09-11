<!DOCTYPE html>
<html>
<head>
	<?php require_once('../views/includes/head.php'); ?>
</head>
<body>
	<?php require_once('../views/includes/menu.php'); ?>

	<hr>

	<form method="POST" action="<?=route('/user/create')?>">
		<input type="text" name="name" placeholder="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
		<input type="email" name="email" placeholder="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
		<input type="password" name="password" placeholder="password">
		<input type="password" name="password_confirm" placeholder="password confirm">
		<input type="submit" value="Register">
	</form>
	<?php 
		if(Session::get('errors')){
			$errors = Session::get('errors');
			foreach($errors as $error){
				echo $error . '<br/>';
			}

			Session::unset('errors');
		}
	 ?>
</body>
</html>