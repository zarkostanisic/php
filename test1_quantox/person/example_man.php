<?php 
	include("./class/person.php");

	//man
	$man = new Man("Zarko", "Stanisic", "male");
	$man->born("1988-09-05", "3", "50");
	//$man->die("2088-01-01");
	$man->breath();
	echo "<hr>";
	$man->eat("sandwiches");
	echo "<hr>";
	$man->drink("water");
	echo "<hr>";
	$man->sleep();
	echo "<hr>";
	$man->wake_up();
	echo "<hr>";
	$man->grow("4", "55", "1");
	echo "<hr>";
	echo $man->talk("I'm zarko");
	echo "<hr>";
	echo $man->think();
	echo "<hr>";
	//var_dump($man);
	echo $man->getBasicInfo();
 ?>