<?php 
	//Load view
	function view($path, $params = NULL){

		if($params != NULL) extract($params);
		
		$path = str_replace('.', '/', $path);

		require_once('../views/' . $path . '.php');
		
	}

	// Redirect to url
	function redirect($route){
		header('Location:' . $route);
		exit();
	}
 ?>