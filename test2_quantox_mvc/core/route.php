<?php 
	//allowed methods for use are GET and POST
	class Route{
		private $routes = [];

		//add GET route to route list
		public function get($path, $controller, $action = 'index'){
			$options = $this->setOption($controller, $action);

			$this->set($path, 'GET', $options);
		}

		//add POST route to route list
		public function post($path, $controller, $action = 'index'){
			$options = $this->setOption($controller, $action);

			$this->set($path, 'POST', $options);
		}

		//set route to route list
		private function set($path, $method, $options){
			$this->routes[$method][$path] = $options;
		}

		//create array with controllers and action
		private function setOption($controller, $action){
			return [
				'controller' => $controller, 
				'action' => $action
			];
		}

		//check if route exists
		public function check($url){

			if(isset($this->routes[$_SERVER['REQUEST_METHOD']][$url]) && in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST'])){
				return [$this->routes[$_SERVER['REQUEST_METHOD']][$url]];
			}else{
				return false;
			}
		}
	}

	$route = new Route;

	require_once('../config/routes.php');

	//handle if route not exist, and route not start with "/"
	if(!isset($_GET['route'])) $_GET['route'] = $base_path;
	else if(substr($_GET['route'], 0, 1) != '/') $_GET['route'] = '/' . $_GET['route'];
 ?>