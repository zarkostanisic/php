<?php 
	include("./class/person.php");

	//woman
	$woman = new Woman("Ivana", "Ivanic", "female");
	$woman->born("1999-07-08", "3.5", "55");
	echo "<hr>";
	$woman->grow("40", "150", "19");
	$woman->setNumberOfChildren(2);
	echo "<hr>";
	echo $woman->getBasicInfo();
	echo "Number of children: " . $woman->getNumberOfChildren();
	//var_dump($woman);
	echo "<hr>";
 ?>