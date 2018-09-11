<?php 
	include("../config/init.php");

    if(!$session->is_signed_in()) redirect("index.php");

    $session->logout();

    redirect("index.php");
 ?>