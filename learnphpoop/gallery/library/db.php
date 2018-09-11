<?php 
	class DB{
		private $conn;

		public function __construct(){
			$this->open_db_connection();
		}

		public function open_db_connection(){

			//$this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			// if(mysqli_connect_errno()){
			// 	die("Database connection failed.".mysql_error());
			// }

			if($this->conn->connect_errno){
				die("Database connection failed.".$this->conn->connect_error);
			}
		}

		public function query($query){
			//$result = mysqli_query($this->conn, $query);

			$result = $this->conn->query($query);

			$this->confirm_query($result);

			return $result;
		}

		private function confirm_query($result){
			if(!$result){
				//die("Query Failed" . mysql_error($this->conn));
				die("Query Failed" . $this->conn->error);
			}
		}

		public function escape_string($string){
			//$escaped_string = mysqli_real_escape_string($this->conn, $string);
			$escaped_string = $this->conn->real_escape_string($string);

			return $escaped_string;
		}

		public function the_insert_id(){
			//return mysql_insert_id($this->conn);

			return $this->conn->insert_id;
		}

		public function the_affected_rows(){
			//return mysql_insert_id($this->conn);

			return $this->conn->affected_rows;
		}
	}

	// $DB = new DB();
 ?>