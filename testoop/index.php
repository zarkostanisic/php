<?php 
	// class Dress{
	// 	private $color = "red";
	// 	public $fabric = "h&m";
	// 	public $design = "slim";
	// 	public $size;

	// 	const SMALL = "S";
	// 	const MEDIUM = "M";
	// 	const LARGE = "L";


	// 	private function displayInfo(){
	// 		echo "display info<br/>";
	// 		echo $this->color . "<br/>";
	// 		echo $this->fabric . "<br/>";
	// 		echo $this->design . "<br/>";
	// 		echo $this->size . "<br/>";
	// 	}

	// 	public function helloWorld(){
	// 		$this->displayInfo();
	// 	}

	// 	public function setColor($value){
	// 		$this->color = $value;
	// 	}

	// 	public function getColor(){
	// 		return $this->color;
	// 	}
	// }

	// $dress = new Dress();
	// $dress->setColor("black");
	// $dress->size = Dress::LARGE;
	// //$dress->displayInfo();
	// $dress->helloWorld();
	// var_dump($dress->getColor());

	// class Calculator{
	// 	public function add($n1, $n2){
	// 		echo ($n1 + $n2) . "<br/>";
	// 	}

	// 	public function substract($n1, $n2){
	// 		echo ($n1 - $n2) . "<br/>";
	// 	}

	// 	public function multiply($n1, $n2){
	// 		echo ($n1 * $n2) . "<br/>";
	// 	}

	// 	public function divide($n1, $n2){
	// 		echo ($n1 / $n2) . "<br/>";
	// 	}
	// }

	// $calculator = new Calculator();
	// $calculator->add(1, 2);
	// $calculator->substract(1, 2);
	// $calculator->multiply(1, 2);
	// $calculator->divide(1, 2);

	// class Car{
	// 	private $speed;
	// 	public $color = "silver";

	// 	public function accelerate($value){
	// 		$this->speed += $value;
	// 	}

	// 	public function brake(){
	// 		$this->speed = 0;
	// 	}
	// }

	// $car = new Car();
	// $car->accelerate(10);
	// $car->brake(5);
	// print_r($car);

	// class Account{
	// 	private $balance;

	// 	public function deposit($amount){
	// 		$this->balance += $amount;
	// 	}

	// 	public function getBalance(){
	// 		return $this->balance;
	// 	}

	// 	public function withdraw($amount){
	// 		$this->balance -= $amount;
	// 	}
	// }

	// $account = new Account();
	// $account->deposit(100);
	// $account->withdraw(5);
	// print_r($account->getBalance());

	// abstract class Vehicle{
	// 	public $noOfWheels;
	// 	public $color;
	// 	public $fuel;
	// 	public $speed;

	// 	public function start(){
	// 		echo "start";	
	// 	}

	// 	public function brake(){
	// 		echo "brake";	
	// 	}

	// 	public function accelerate(){
	// 		echo "accelerte";	
	// 	}

	// 	abstract public function doMaintrance();
	// }

	// abstract class TransportationVehicle extends Vehicle{
	// 	public $noOfDoors;
	// 	public $loadCapacity;
	// }

	// abstract class PassengerVehicle extends Vehicle{
	// 	public $passengerSeats;
	// }

	// class Car extends PassengerVehicle{
	// 	public $noOfDoors;

	// 	public function doMaintrance(){
	// 		echo "car maintrance";
	// 	}
	// }

	// class Bike extends PassengerVehicle{
	// 	public $saddleHeight;

	// 	public function brake(){
	// 		echo "bike brake";	
	// 	}

	// 	public function accelerate(){
	// 		parent::accelerate();
	// 		echo "bike accelerte";	
	// 	}

	// 	public function doMaintrance(){
	// 		echo "car maintrance";
	// 	}
	// }

	// class Truck extends TransportationVehicle{
	// 	public $sizeOfContainers;

	// 	public function loadContainer(){
	// 		echo "load container";
	// 	}

	// 	public function doMaintrance(){
	// 		echo "truck maintrance";
	// 	}
	// }

	// class Van extends TransportationVehicle{
	// 	public $noOfBoxes;

	// 	public function loadVan(){
	// 		echo "load van";
	// 	}

	// 	public function doMaintrance(){
	// 		echo "van maintrance";
	// 	}
	// }

	// // $vehicle = new Vehicle();

	// $car = new Car();
	// $car->start();
	// $car->accelerate();
	// $car->brake();
	// var_dump($car);

	// $bike = new Bike();
	// $bike->start();
	// $bike->accelerate();
	// $bike->brake();
	// var_dump($bike);

	// $truck = new Truck();
	// $truck->loadContainer();
	// var_dump($truck);

	// $van = new Van();
	// $van->loadVan();
	// var_dump($van);

	// interface Chargable{
	// 	public function charge();
	// }

	// interface Chargable2 extends Chargable{
	// 	public function charge2();
	// }

	// class Toy implements Chargable2{
	// 	public function charge(){
	// 		echo "charge";
	// 	}

	// 	public function charge2(){
	// 		echo "charge2";
	// 	}
	// }

	// $toy = new Toy();
	// $toy->charge();
	// $toy->charge2();

	// class A{
	// 	public function __construct(){
	// 		echo "construct";
	// 	}

	// 	public function __destruct(){
	// 		echo "destruct";
	// 	}
	// }

	// $a = new A();

	// class Student{
	// 	private $firstName;
	// 	private $lastName;
	// 	private $age;

	// 	public function __construct($firstName, $lastName, $age){
	// 		echo "Student construct";
	// 		$this->firstName = $firstName;
	// 		$this->lastName = $lastName;
	// 		$this->age = $age;
	// 	}

	// 	public function showDetails(){
	// 		echo $this->firstName . " " . $this->lastName . " " . $this->age;
	// 	}
	// }

	// class Student2 extends Student{
	// 	public function __construct(){
	// 		parent::__construct("Ivana", "Mitrovic", "24");
	// 		echo "Student2 construct";
	// 	}
	// }

	// $student = new Student("Zarko", "Stanisic", "29");
	// $student->showDetails();

	// $student2 = new Student2();
	// $student2->showDetails();

	// class Student{
	// 	public $name;
	// 	private $id;
	// 	private static $studentCount = 0;

	// 	public function __construct($name){
	// 		$this->name = $name;
	// 		self::$studentCount++;
	// 	}

	// 	public static function showStudentCount(){
	// 		echo self::$studentCount;
	// 	}
	// }

	// $student = new Student("Zarko Stanisic");
	// $student2 = new Student("Ivana Markovic");
	// $student3 = new Student("Patar Petrovic");

	// echo $student->name;
	// echo $student2->name;
	// echo $student3->name;

	// echo Student::showStudentCount();

	// class A{
	// 	public $name;

	// 	public function __construct($name){
	// 		$this->name = $name;
	// 	}

	// 	public function __toString(){
	// 		return $this->name;
	// 	}

	// 	public static function __set_state(array $array){
	// 		$tmp = new A($array["name"]);
	// 		return $tmp;
	// 	}
	// }

	// $a = new A("Zarko Stanisic");
	// $str = var_export($a, true);
	// eval($str . ";");

	// class A{
	// 	public function __invoke(){
	// 		echo "a invoke";
	// 	}
	// }

	// $a = new A();
	// $a();

	// class Student{
	// 	private $id;
	// 	public $name;

	// 	public function __construct($id, $name){
	// 		$this->id = $id;
	// 		$this->name = $name;
	// 	}

	// 	public function __debugInfo(){
	// 		return array("name" => $this->name);
	// 	}
	// }

	// $student = new Student("1", "Zarko Stanisic");
	// var_dump($student);
	// function loader($class){
	// 	$filename = $class . ".php";
	// 	$file = "classes/" . $filename;

	// 	if(!file_exists($file)){
	// 		return false;
	// 	}

	// 	include($file);
	// }

	// spl_autoload_register("loader");

	// $student = new Student();
	// print_r($student);

	// include("psr4autoloader.php");

	// // include("classes/MyNamespace/student.php");
	// // include("classes/MyNamespace/SubNamespace/student.php");
	// // include("classes/MyNamespace/SubNamespace/SubSubNamespace/student.php");

	// use MyProject\MyNamespace\Student as Student;
	// use MyProject\MyNamespace\SubNamespace\Student as StudentSub;
	// use MyProject\MyNamespace\SubNamespace\SubSubNamespace\Student as StudentSubSub;

	// $student = new Student();
	// $student = new StudentSub();
	// $student = new StudentSubSub();

	// class Student{
	// 	public $id;
	// 	public $name;

	// 	public function __construct($id, $name){
	// 		$this->id = $id;
	// 		$this->name = $name;
	// 	}

	// 	public function printStudentInfo(){
	// 		echo $this->id . " " . $this->name;
	// 	}

	// 	public function __sleep(){
	// 		return array_keys(get_object_vars($this));
	// 	}

	// 	public function __wakeup(){
	// 		echo "wake up";
	// 	}
	// }

	// $student = new Student("1", "Zarko Stanisic");
	// $student->printStudentInfo();
	// print_r($student);

	// $serialize = serialize($student);
	// print_r($serialize);
	// file_put_contents("serialize.txt", $serialize);

	// $unserialize = unserialize(file_get_contents("serialize.txt"));
	// print_r($unserialize);

	// $n = 10;
	// var_dump($n);

	// interface MobileInterface{

	// }

	// class Mobile implements MobileInterface{
	// 	public $isCharged;
	// }

	// class Charger{
	// 	public function charge(MobileInterface/*Mobile*/ $mobile, int $time){
	// 		echo "charging mobile " . $time;
	// 		$mobile->isCharged = true;
	// 	}
	// }

	// $time = 10;
	// $mobile = new Mobile();
	// $charger = new Charger();
	// $charger->charge($mobile, $time);
	// print_r($mobile);

	// function myCallbackFunction($options){
	// 	echo "myCallbackFunction";
	// 	print_r($options);
	// }

	// class A{
	// 	public static function print(){
	// 		echo "print() from A";
	// 	}

	// 	public static function test(self $abc){
	// 		$abc::print();
	// 	}
	// }

	// class B extends A{
	// 	public static function print(){
	// 		echo "print() from B";
	// 	}

	// 	public static function testArray(array $array){
	// 		print_r($array);
	// 	}

	// 	public static function testCallable(callable $name, $options){
	// 		call_user_func($name, $options);
	// 	}
	// }

	// $objA = new A();
	// A::test($objA);


	// $objB = new B();
	// B::test($objB);

	// B::testArray(array("a"));
	// B::testCallable("myCallbackFunction", array("a", "b", "c"));

	// declare(strict_types=1);

	// class A{
	// 	public function test(int $n) : int{
	// 		return $n;
	// 	}
	// }

	// $a = new A();
	// echo $a->test(1);

	// class A{
	// 	public $name;
	// }

	// class B{
	// 	public $name;
	// }

	// $a = new A();
	// $a->name = "Zarko";

	// $b = clone($a);
	// $b->name = "Zarkoa";
	// $b = $a;
	// $b->name = "Zarkoa";

	// var_dump(($a === $b));

	// class A{
	// 	private $_extraInfo = array();

	// 	public function __set($name, $value){
	// 		$this->_extraInfo[$name] = $value;
	// 	}

	// 	public function __get($name){
	// 		if(array_key_exists($name, $this->_extraInfo)) return $this->_extraInfo[$name];

	// 		return null;
	// 	}

	// 	public function __isset($name){
	// 		if(array_key_exists($name, $this->_extraInfo)) echo $name . " is set";
	// 		else echo $name . " is not set";
	// 	}

	// 	public function __unset($name){
	// 		unset($this->_extraInfo[$name]);
	// 		echo $name . " unset";
	// 	}

	// 	public function __call($name, $arguments){
	// 		echo $name . " __call";
	// 	}

	// 	public static function __callStatic($name, $arguments){
	// 		echo $name . " __callStatic";
	// 	}
	// }

	// $a = new A();
	// $a->name = "Zarko Stanisic";
	// echo $a->name;
	// print_r($a);
	// unset($a->name);
	// isset($a->name);
	// $a->test();
	// A::testStatic();

	// trait Maintrance{
	// 	public $isCharged;
	// 	public static $TIME = 10;
	// 	public function maintrance(){
	// 		echo "maintrance";
	// 	}

	// 	public function charge(){
	// 		echo "charge from Maintrance trait";
	// 	}

	// 	public static function testStatic(){
	// 		echo "testStatic from Maintrance trait";
	// 	}
	// }

	// trait Test{
	// 	public abstract function test();
	// }

	// trait Chargeable{
	// 	use Test;
	// 	public function charge(){
	// 		echo "charge from Chargeable trait";
	// 	}
	// }

	// class A{
	// 	public function charge(){
	// 		echo "charge from A";
	// 	}
	// }

	// class B extends A{
	// 	use Chargeable, Maintrance{
	// 		Chargeable::charge insteadof Maintrance;
	// 		Maintrance::charge as public maintranceCharge;
	// 	}

	// 	public function test(){
	// 		echo "test from B";
	// 	}

	// 	// public function charge(){
	// 	// 	echo "charge from B";
	// 	// }
	// }

	// $b = new B();
	// $b->charge();
	// $b->maintrance();
	// $b->maintranceCharge();
	// $b->test();
	// B::testStatic();
	// echo $b->isCharged;
	// echo B::$TIME;

	// class A{
	// 	public function test(){
	// 		echo "test from A";
	// 	}

	// 	public function print(){
	// 		$this->test();
	// 	}

	// 	public static function testStatic(){
	// 		echo "testStatic from A";
	// 	}

	// 	public static function printStatic(){
	// 		static::testStatic();
	// 	}
	// }

	// class B extends A{
	// 	public function test(){
	// 		echo "test from B";
	// 	}

	// 	public static function testStatic(){
	// 		echo "testStatic from B";
	// 	}
	// }

	// $a = new A();
	// $a->test();

	// $b = new B();
	// $b->print();

	// A::printStatic();
	// B::printStatic();

	// class A{
	// 	public $name = "zarko";
	// 	public $age = "23";
	// 	public $sex = "m";

	// 	public function displayProperties(){
	// 		foreach($this as $k => $v){
	// 			echo "obj[" . $k . "] = " . $v . "<br/>";
	// 		}
	// 	}
	// }

	// $a = new A();
	// $a->displayProperties();

	class BookStore implements /*Iterator,*/IteratorAggregate{
		public $name;
		public $location;
		public $books;

		public function __construct($name, $location, $books){
			$this->name = $name;
			$this->location = $location;
			$this->books = $books;
		}

		public function displayProperties(){
			// foreach($this as $k => $v){
			// 	if(is_array($v)){
			// 		echo "obj[" . $k . "]: <br/>";
			// 		foreach($v as $key => $book){
			// 			echo "---" . $book->name . "<br/>";
			// 		}
			// 		echo "<br/>";
			// 	}else{
			// 		echo "obj[" . $k . "] = " . $v . "<br/>";
			// 	}
			// }
			foreach($this as $k => $v){
				echo "obj[" . $k . "] = " . $v . "<br/>";
			}
		}

		public function rewind()
	    {
	        reset($this->books);
	    }
	    public function current()
	    {
	    	$book = current($this->books);
	    	$book->name = "changed " . $book->name;
	        return current($this->books);
	    }
	    public function key()
	    {
	        return key($this->books);
	    }
	    public function next()
	    {
	        return next($this->books);
	    }
	    public function valid()
	    {
	        return false !== current($this->books);
	    }

		public function getIterator(){
			return new ArrayIterator($this->books);
		}
	}

	class Book{
		public $name;
		public $author;

		public function __construct($name, $author){
			$this->name = $name;
			$this->author = $author;
		}
	}

	$books = array();

	$books[] = new Book("Book 1", "Author 1");
	$books[] = new Book("Book 2", "Author 2");
	$books[] = new Book("Book 3", "Author 3");

	$bookStore = new BookStore("Book Store 1", "Location 1", $books);
	// $bookStore->displayProperties();

	foreach($bookStore as $book){
		print_r($book);
	}
 ?>