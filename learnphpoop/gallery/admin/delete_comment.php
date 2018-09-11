<?php 
	include("../config/init.php");

	$redirect = "comments.php";
	if(!empty($_GET["photo_id"])) $redirect .= "?photo_id=" . $_GET["photo_id"];
	print_r($redirect);

	if(empty($_GET["id"])){
		redirect($redirect);
	}

	$comment = Comment::find_by_id($_GET["id"]);
	
	if($comment){
		$comment->delete();
		$session->message("Comment " . $comment->id . " deleted");
		//print_r($session);

		redirect($redirect);
	}else{
		redirect($redirect);
	}
 ?>