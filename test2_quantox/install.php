<?php 
	include("./core/core.php");

	$query_drop = "
		DROP TABLE IF EXISTS `users`;";

	if($DB->query($query_drop)){
		$query_create = "

		CREATE TABLE `users` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `name` varchar(255) DEFAULT NULL,
			  `email` varchar(255) DEFAULT NULL,
			  `password` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";

		if($DB->query($query_create)){
			echo "Instalation completed.<br/>";
		}else{
			echo "Table 'users' create problem.";
		}
	}else{
		echo "Table 'users' drop problem.";
	}
 ?>