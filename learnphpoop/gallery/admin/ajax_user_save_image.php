<?php 
	include("../config/init.php");

	$user = User::find_by_id($_POST["user_id"]);

	$user->image = $_POST["user_image"];

	//print_r($user);

	$user->save();

	echo $user->photo_path();
 ?>