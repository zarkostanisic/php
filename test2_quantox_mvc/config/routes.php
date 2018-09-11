<?php 
	//LIST OF ALL DEFINED ROUTES
	$route->get('/', 'HomeController', 'index');
	$route->get('/user/login', 'UsersController', 'login');
	$route->post('/user/check', 'UsersController', 'check');
	$route->get('/user/logout', 'UsersController', 'logout');
	$route->get('/user/register', 'UsersController', 'register');
	$route->post('/user/create', 'UsersController', 'create');
	$route->get('/user/result', 'UsersController', 'result');
 ?>