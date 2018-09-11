<?php
	trait Chargeable {
		public function charge() { }
	}
	trait AnotherTrait {
		public function a() { }
	}
	class Toy {}

	class ElectricCarToy extends Toy{
		use Chargeable, AnotherTrait;
	}
	$o = new ElectricCarToy();
	$o->charge();
	$o->a();





?>

