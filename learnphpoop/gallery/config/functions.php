<?php 
	function classAutoLoader($class){
		$class = strtolower($class);
		$path = LIBRARY_PATH . $class . ".php";

		if(is_file($path) && !class_exists($class)) include($path);
		else die("This file name {$class}.php not found");
	}

	function redirect($location){
		header("Location: " . $location);
		exit;
	}

	function convertToReadableSize($size){
	  $base = log($size) / log(1024);
	  $suffix = array("", "KB", "MB", "GB", "TB");
	  $f_base = floor($base);
	  return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
	}

	spl_autoload_register("classAutoLoader");
 ?>