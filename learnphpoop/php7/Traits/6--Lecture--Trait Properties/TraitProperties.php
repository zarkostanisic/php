<?php
	trait Chargeable {
		public  $x = 'Trait Property';
	}

	class Toy {}

	class ElectricCarToy extends Toy{
		use Chargeable;
		
	}
	$o = new ElectricCarToy();
	$o->x;


?>

