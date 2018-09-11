<?php 
	include("db_object.php");

	class User extends Db_object{
		protected static $db_table = "users";
		protected static $db_table_fileds = array(
			"name", "email", "password"
		);

		public $id;
		public $name;
		public $email;
		public $password;

		public static function verify($email, $password){
			global $DB;
			
			$sql = "SELECT * ";
			$sql .= " FROM " . static::$db_table;
			$sql .= " WHERE email = '" . $DB->escape_string($email) . "'";
			$sql .= " AND password = '" . $DB->escape_string($password) . "'";

			$result = static::find_by_query($sql);

			return !empty($result) ? array_shift($result) : false;
		}

		public static function exist($email){
			global $DB;

			$sql = "SELECT COUNT(*) AS cnt";
			$sql .= " FROM " . static::$db_table;
			$sql .= " WHERE email = '" . $DB->escape_string($email) . "'";

			$result = $DB->query($sql)->fetch_object();

			if($result->cnt > 0) return true;
			else return false;
		}
	}
 ?>