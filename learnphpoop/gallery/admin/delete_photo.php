<?php 
	include("../config/init.php");

	if(empty($_GET["id"])){
		redirect("photos.php");
	}

	$photo = Photo::find_by_id($_GET["id"]);
	
	if($photo){
		$photo->delete_photo();

		$session->message("Photo " . $photo->id . " deleted");

		redirect("photos.php");
	}else{
		redirect("photos.php");
	}
 ?>