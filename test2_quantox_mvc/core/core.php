<?php 
	//main configuration file, $base_url, $base_path, db access parameters
	include('../config/config.php');
	//session functionality, call it static, example Session::isLogged()
	require_once('session.php');
	//helpers
	require_once('functions.php');
	//database functionality and defined $DB
	require_once('database.php');
	//route functionality and defined $route
	require_once('route.php');

	//models autoload
	spl_autoload_register("autoloadModel");

	//Check if route exists
	$checkRoute = $route->check($_GET['route']);
	
	if($checkRoute && is_array($checkRoute)){
		//include controller and action
		$controller = $checkRoute[0]['controller'];
		$action = $checkRoute[0]['action'];

		$path = '../controllers/' . $controller . '.php';

		if(file_exists($path)) require_once($path);
		else die('File ' . $path . ' does not exist');

		if(!class_exists($controller)){
			die('Controller ' . $controller . ' does not exist');
		}else{
			$class = new $controller;

			//
			if(!method_exists($class, $action)){
				die('Action ' . $action . ' does not exist.');
			}

			$class->$action();
		}
	}else{
		die("Route does not exist.");
	}
 ?>