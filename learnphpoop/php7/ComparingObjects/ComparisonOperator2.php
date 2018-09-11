<?php
	class Car{
		public $name;
	}

	class A{
	}
	
	$carObj1 = new Car();
	$carObj1->name = "Toyota";

	$objA = new A();

	var_dump($carObj1 == $objA);


 


?>


