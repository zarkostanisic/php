<?php 
	session_start();
	
	// Composer autoload
	require '../vendor/autoload.php';

	// Functions
	require 'functions.php';

	// Database config file
	require '../config/database.php';

	// Route list is defined in file '../route/route.php'. For routung is used "Fast Route" library.
	$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
	    require '../route/route.php';
	});

	// Fetch method and URI from somewhere
	$httpMethod = $_SERVER['REQUEST_METHOD'];
	$uri = $_SERVER['REQUEST_URI'];

	// Strip query string (?foo=bar) and decode URI
	if (false !== $pos = strpos($uri, '?')) {
	    $uri = substr($uri, 0, $pos);
	}
	$uri = rawurldecode($uri);

	$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

	switch ($routeInfo[0]) {
		// Page not found
	    case FastRoute\Dispatcher::NOT_FOUND:
	        echo "Page not found.";
	        break;
	    // Method not allowed 
	    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
	        $allowedMethods = $routeInfo[1];
	       	echo "Method " . $allowedMethods .  " not allowed";
	        break;
	    // Page exist
	    case FastRoute\Dispatcher::FOUND:
	        $handler = $routeInfo[1];
	        $vars = $routeInfo[2];
	        
	        list($class, $method) = explode("@", $handler, 2);
	        $class = "\\App\\Controllers\\" . $class;

	        // Load controller and method
    		call_user_func_array(array(new $class, $method), $vars);

	        break;
	}
 ?>