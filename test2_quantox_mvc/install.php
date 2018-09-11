<?php 
	require_once('config/config.php');
	require_once('core/database.php');

	$query = "
		DROP TABLE IF EXISTS `users`;

		CREATE TABLE `users` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) DEFAULT NULL,
		  `email` varchar(255) DEFAULT NULL,
		  `password` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";

	if($DB->query($query)){
		echo "Instalation completed.<br/>";
	}
 ?>