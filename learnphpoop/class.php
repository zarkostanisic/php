<?php 
	class Cars{
		public $wheels = 4;
		private $doors = 4;
		protected $sits = 2;
		static $lights = "Xenon";
		protected static $engine = "diesel";
		static $count = 0;

		function __construct(){
			echo "---<br/>";
			echo "Car " . self::$count . " construct";
			echo "<br/>";
			echo "It has " . $this->doors . " doors";
			echo "<br/>";
			echo "---<br/>";

			self::$count++;
		}

		// function __destruct(){
		// 	echo "---<br/>";
		// 	echo "Car " . self::$count . " destruct";
		// 	echo "<br/>";
		// 	echo "It has " . $this->doors . " doors";
		// 	echo "<br/>";
		// 	echo "---<br/>";

		// 	self::$count--;
		// }

		function car_detail(){
			return "This car has " . $this->wheels . " wheels and " . $this->doors . " doors and " . $this->sits . " sits";
		}

		static function lights(){
			return "This car has " . self::$lights . " lights"; 
		}

		function getDoors(){
			return $this->doors;
		}

		function setDoors($value){
			$this->doors = $value;
		}
	}

	class Trucks extends Cars{
		static function getEngine(){
			return parent::$engine;
		}
	}

	$bmw = new Cars();
	$mercedes = new Cars();
	$tacoma = new Trucks();

	//not static
	echo "--- not static ---";
	echo "<br/>";
	echo "BMW ";
	$bmw->wheels = 10;
	//$bmw->doors = 3; can not access(private)
	//echo $bmw->doors;// can not access(private)
	echo "<br/>";
	$bmw->setDoors(7);
	echo $bmw->getDoors();
	echo "<br/>";
	echo $bmw->car_detail();
	echo "<br/>";
	//$mercedes->doors = 5; can not access(private)
	echo "Mercedes " . $mercedes->car_detail();
	echo "<br/>";
	$tacoma->wheels = 6;
	//$tacoma->sits = 7; can not access(protected)
	echo "Tacoma " . $tacoma->car_detail();
	echo "<br/>";

	//static
	echo "--- static ---";
	echo "<br/>";
	//Cars::$lights = "normal";
	echo Cars::lights();
	echo "<br/>";
	echo Trucks::getEngine();
	echo "<br/>";
	echo Trucks::$count;
	echo "<br/>";


	// all classes
	// $my_classes = get_declared_classes();

	// foreach($my_classes as $class){
	// 	echo $class . "<br/>";
	// }

	// all methods for class
	// $the_methods = get_class_methods('Cars');

	// foreach($the_methods as $method){
	// 	echo $method . "<br/>";
	// }
 ?>
