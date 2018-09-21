<?php 
	namespace App\Controllers;

	use \App\Models\User;
	use \App\Core\Session;

	class AdminController{
		public function __construct(){
			// If user is logged redirect to home page for all method in AdminController
			if(!Session::isLogged()) redirect('/');
		}

		// Admin home page
		public function index(){
			$title = "Home";
			$email = Session::get('email');

			view('admin.home', compact('title', 'email'));
		}

		// Admin list all users
		public function users(){
			$title = "List all users";

			// Find all registered users
			$users = User::findAll();

			view('admin.users', compact('users', 'title'));
		}
	}
 ?>