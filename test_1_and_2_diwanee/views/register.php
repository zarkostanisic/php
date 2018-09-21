<!DOCTYPE html>
<html>
<head>
	<?php 
		require 'includes/head.php';
	 ?>
</head>
<body>
	<?php 
		require 'includes/menu.php';
	 ?>
	<form action="/register" method="post">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo isset($email) ? $email : ""; ?>">
		<label>Password</label>
		<input type="password" name="password">
		<label>Confirm password</label>
		<input type="password" name="confirm_password">
		<input type="submit" name="register" value="Register">
	</form>
	<?php 
		require 'includes/errors.php';
	 ?>
</body>
</html>