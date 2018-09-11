<?php 
	include("../config/init.php");

	if(empty($_GET["id"])){
		redirect("users.php");
	}

	$user = User::find_by_id($_GET["id"]);
	
	if($user){
		$user->delete_user();
		$session->message("User " . $user->id . " deleted");

		redirect("users.php");
	}else{
		redirect("users.php");
	}
 ?>