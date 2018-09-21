<?php 
	namespace App\Models;

	use \App\Core\Db;
	use \PDO;

	class User{

		// Return list of all users
		public static function findAll(){
			$db = Db::getInstance();
			$conn = $db->getConnection();

			$s = $conn->prepare('SELECT * FROM users ORDER BY time_created ASC');
			$s->execute();

			return $s->fetchAll(PDO::FETCH_ASSOC);
		}

		// Check if user with email exists. Register.
		public static function emailExist($email){
			$db = Db::getInstance();
			$conn = $db->getConnection();

			$s = $conn->prepare('SELECT * FROM users WHERE email=:email');
			$s->bindValue(':email', "{$email}");
			$s->execute();

			if($s->rowCount() == 1) return true;

			return false;
		}

		// Create new user
		public static function create($email, $password){
			$db = Db::getInstance();
			$conn = $db->getConnection();

			$s = $conn->prepare('INSERT INTO users SET email=:email, password=:password, time_created = NOW()');
			$s->bindValue(':email', "{$email}");
			$s->bindValue(':password', "{$password}");
			
			$s->execute();

			return $conn->lastInsertId();
		}

		// Check if user with email and password exists. Login.
		public static function exist($email, $password){
			$db = Db::getInstance();
			$conn = $db->getConnection();

			$s = $conn->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
			$s->bindValue(':email', "{$email}");
			$s->bindValue(':password', "{$password}");
			$s->execute();

			if($s->rowCount() == 1) return $s->fetch();

			return false;
		}
	}
 ?>