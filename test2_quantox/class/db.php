<?php 

	class DB{
		private $connection;

		public function __construct(){
			$this->open_connection();
		}

		public function open_connection(){
			$this->connection = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if($this->connection->connect_errno){
				die("Database connection failed.".$this->connection->connect_error);
			}
		}

		public function escape_string($string){
			return $this->connection->real_escape_string($string);
		}

		public function query($query){
			$result = $this->connection->query($query);

			return $result;
		}

		public function last_insert_id(){

			return $this->connection->insert_id;
		}
	}

	$DB = new DB();
 ?>