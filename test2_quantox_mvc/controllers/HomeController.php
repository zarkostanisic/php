<?php 

	class HomeController{
		public function index(){
			$title = "Home";
			
			view('index', compact('title'));
		}
	}
?>