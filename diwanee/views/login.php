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
	<form action="/login" method="post">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo isset($email) ? $email : ""; ?>">
		<label>Password</label>
		<input type="password" name="password">
		<input type="submit" name="login" value="Login">
	</form>
	<?php 
		require 'includes/errors.php';
	 ?>
</body>
</html>