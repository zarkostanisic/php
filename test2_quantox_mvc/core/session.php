<?php 
	class Session{
		public static function start(){
			session_start();
		}

		public static function set($name, $value){
			$_SESSION[$name] = $value;
		}

		public static function get($name){
			if(isset($_SESSION[$name])) return $_SESSION[$name];
			return false;
		}

		public static function isLogged(){
			if(isset($_SESSION['id'])) return true;
			
			return false;
		}

		public static function destroy(){
			session_destroy();
		}

		public static function unset($name){
			unset($_SESSION[$name]);
		}
	}

	Session::start();
 ?>