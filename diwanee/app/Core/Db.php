<?php
    namespace App\Core;
    use \PDO;

    // Class for database connection. Use Singleton pattern.
    class Db {
        private $connection;
        private static $instance;

        private $dbhost = DB_HOST;
        private $dbuser = DB_USER;
        private $dbpass = DB_PASS;
        private $dbname = DB_NAME;
 
        public static function getInstance(){
            if(!self::$instance) {
              self::$instance = new self();
           }
          return self::$instance;
        }

        private function __construct() {
            try{
            $this->connection = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
            }catch(PDOException $e){
                die("Failed to connect to DB: ". $e->getMessage());
            }
        }

        public function getConnection(){
            return $this->connection;
        }
    }

?>