<?php 
	// Main route file. Contain list of all routes

	// Home page
	$r->addRoute('GET', '/', 'HomeController@index');

	// Login
	$r->addRoute('GET', '/login', 'UserController@loginForm');
	$r->addRoute('POST', '/login', 'UserController@login');

	// Register
	$r->addRoute('GET', '/register', 'UserController@registerForm');
	$r->addRoute('POST', '/register', 'UserController@register');

	// Logout
	$r->addRoute('GET', '/logout', 'UserController@logout');

	// Admin
	$r->addRoute('GET', '/admin', 'AdminController@index');
	$r->addRoute('GET', '/admin/users', 'AdminController@users');

 ?>