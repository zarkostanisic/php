<?php 
	require "./class/dog.php";

	$dog = new Dog("rex", "black", "terrier", "200g", "15cm");
	$dog->breath();
	echo "<hr>";
	$dog->drink("milk");
	echo "<hr>";
	$dog->sleep();
	echo "<hr>";
	$dog->wake_up();
	//$dog->die("2088-01-01");
	echo "<hr>";
	$dog->grow("1kg", "30cm", "1");
	echo "<hr>";
	$dog->eat("meat");
	echo "<hr>";
	echo $dog->bark();
	echo "<hr>";
	echo $dog->think();
	echo "<hr>";

	echo $dog->getBasicInfo();
 ?>