<?php 
	class DB extends PDO {

	    public function __construct($db_host, $db_username, $db_password, $db_name) {

	        try {
	            parent::__construct('mysql:host='.$db_host.';dbname='.$db_name, $db_username, $db_password);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	        }
	    }

	}

	$DB = new DB($db_host, $db_username, $db_password, $db_name);
 ?>