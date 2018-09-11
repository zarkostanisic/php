<?php
	class User{

		public static function result($query){
			global $DB;

			$s = $DB->prepare('SELECT * FROM users WHERE email LIKE :query');
			$s->bindValue(':query', "%{$query}%");
			$s->execute();

			return $s->fetchAll(PDO::FETCH_ASSOC);
		}

		public static function create($name, $email, $password){
			global $DB;

			$s = $DB->prepare('INSERT INTO users SET name=:name, email=:email, password=:password');
			$s->bindValue(':name', "{$name}");
			$s->bindValue(':email', "{$email}");
			$s->bindValue(':password', "{$password}");
			
			return $s->execute();
		}

		public static function get($email, $password){
			global $DB;

			$s = $DB->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
			$s->bindValue(':email', "{$email}");
			$s->bindValue(':password', "{$password}");
			$s->execute();

			if($s->rowCount() == 1) return $s->fetch();

			return false;
		}

		public static function check($email){
			global $DB;

			$s = $DB->prepare('SELECT * FROM users WHERE email=:email');
			$s->bindValue(':email', "{$email}");
			$s->execute();

			if($s->rowCount() == 1) return true;

			return false;
		}
	}
 ?>