<?php 
	function autoloadModel($className) {
	    $filename = "../models/" . $className . ".php";
	    if (is_readable($filename)) {
	        require_once($filename);
	    }
	}

	function view($path, $params = NULL){

		if($params != NULL) extract($params);

		require_once('../views/' . $path . '.php');
		
	}

	function route($route){
		global $base_url;

		return $base_url . $route;
	}

	function redirect($route){
		header('Location:' . $route);
		exit();
	}

 ?>