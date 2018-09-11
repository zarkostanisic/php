<?php 
	class Session{
		private $signed_in = false;
		public $user_id;
		public $message;
		public $count;

		public function __construct(){
			session_start();
			$this->check_login();
			$this->check_message();
			$this->visitor_count();
		}

		public function is_signed_in(){
			return $this->signed_in;
		}

		public function login($user){
			if($user){
				$this->user_id = $_SESSION["user_id"] = $user->id;
				$_SESSION["username"] = $user->username;
				$this->signed_in = true;

				redirect("index.php");
			}
		}

		public function logout(){
			unset($this->user_id); 
			unset($_SESSION["user_id"]);
			$this->signed_in = false;
		}

		private function check_login(){
			if(isset($_SESSION["user_id"])){ $this->user_id = $_SESSION["user_id"];
				$this->signed_in = true;
		 	}else{
		 		unset($this->user_id);
		 		$this->signed_in = false;
		 	}
		}

		public function message($message=""){
			if(!empty($message)){
				$_SESSION["message"] = $message;
			}else{
				return $this->message;
			}
		}

		public function check_message(){
			if(isset($_SESSION["message"])){
				$this->message = $_SESSION["message"];
				unset($_SESSION["message"]);
			}else{
				$this->message = "";
			}
		}

		public function visitor_count(){
			if(isset($_SESSION["count"])){
				return $this->count = $_SESSION["count"]++;
			}else{
				return $_SESSION["count"] = 1;
			}
		}
	}

	// $session = new Session();
 ?>