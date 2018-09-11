<?php 
	include("./core/core.php");

	if($session->is_signed_in()) header("Location: index.php");

	$session->logout();
 ?>