<a href="https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php" target="_blank">Documentation</a>
<hr>
<?php 
	//Singleton
	//https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php
	class Singleton{
		private static $instance;
		private $connection;

		private function __construct(){
			$this->connection = new mysqli("127.0.0.1", "root", "zarko88stanisic", "quantox");
		}

		public static function getInstance(){
			if(self::$instance == null) self::$instance = new Singleton();
			
			return self::$instance;
		}

		public function getConnection(){
			return $this->connection;
		}
	}

	$instance = Singleton::getInstance();
	$connection = $instance->getConnection();
	var_dump($connection);

	$instance = Singleton::getInstance();
	$connection = $instance->getConnection();
	var_dump($connection);
 ?>