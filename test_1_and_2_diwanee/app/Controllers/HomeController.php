<?php 
	namespace App\Controllers;

	use \App\Core\Session;

	class HomeController{

		public function __construct(){
			if(Session::isLogged()) redirect('/admin');
		}

		// Home page
		public function index(){
			$title = "Home";

			return view('home', compact('title'));
		}
	}
 ?>