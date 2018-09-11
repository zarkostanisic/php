<?php 
	include("./core/core.php");

	if(!$session->is_signed_in()) header("Location: index.php");

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Register</title>

 	<?php include("./includes/head.php"); ?>
 </head>
 <body>
 	<div id="header">
 	<?php include("./includes/menu.php") ?>
 	</div>
 	<h1>Admin</h1>
 </body>
 </html>