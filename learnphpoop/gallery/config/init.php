<?php 
	defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
	defined("SITE_ROOT") ? null : define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]);
	defined("CONFIG_PATH") ? null : define("CONFIG_PATH", SITE_ROOT . DS . "config" . DS);
	defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT . DS . "admin" . DS . "includes" . DS);
	defined("LIBRARY_PATH") ? null : define("LIBRARY_PATH", SITE_ROOT . DS . "library" . DS);

	include(CONFIG_PATH . "config.php");
	include(CONFIG_PATH . "functions.php");

	// loaded by autoload
	// include("db.php");
	// include("user.php");
	// include("session.php");
	// include("db_object.php");
	// include("photo.php");

	$DB = new DB();
	$session = new Session();
	$message = $session->message();
 ?>