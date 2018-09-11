<?php 
	class Session{
		public $signed_in = false;
		public $user_id;

		public function __construct(){
			session_start();
			$this->check_login();
		}

		public function login($user){
			if($user){
				$this->signed_in = true;
				$this->user_id = $_SESSION["user_id"] = $user->id;

				header("Location: admin.php");
			}
		}

		public function check_login(){
			if(isset($_SESSION["user_id"])){
				$this->user_id = $_SESSION["user_id"];
				$this->signed_in = true;
			}else{
				unset($this->user_id);
				$this->signed_in = false;
			}
		}

		public function is_signed_in(){
			return $this->signed_in;
		}

		public function logout(){
			unset($this->user_id);
			$this->signed_in = false;

			session_destroy();

			header("Location: index.php");

		}
	}

	$session = new Session();
	//$session->logout();
 ?>