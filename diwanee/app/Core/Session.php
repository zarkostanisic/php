<?php 
	namespace App\Core;

	// class for managing sessions
	class Session{

		// Set session value
		public static function set($name, $value){
			$_SESSION[$name] = $value;
		}

		// Get session value
		public static function get($name){
			if(isset($_SESSION[$name])) return $_SESSION[$name];
			return false;
		}

		// Check if user is logged
		public static function isLogged(){
			if(isset($_SESSION['id'])) return true;
			
			return false;
		}

		// Destroy session
		public static function destroy(){
			session_destroy();
		}

		// Unset session
		public static function unset($name){
			unset($_SESSION[$name]);
		}
	}
 ?>