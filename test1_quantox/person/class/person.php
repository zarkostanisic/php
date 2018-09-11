<?php 
	interface PersonInterface{

		public function born($weight, $height);
		public function breath();
		public function eat($food);
		public function drink($drink);
		public function grow($weight, $height, $age);
		public function wake_up();
		public function sleep();
		public function talk($sentence);
		public function think();
		public function die($date);
	}

	class Person implements PersonInterface{
		private $alive = true;
		private $awake = true;
		private $age = 0;
		protected $sex;

		private $date_of_birth;
		private $date_of_death;

		public $weight;
		public $height;
		public $first_name;
		public $last_name;

		public function __construct($first_name, $last_name, $sex){
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->sex = $sex;
		}

		public function born($weight, $height){
			$this->alive = true;
			$this->date_of_birth = date("Y-m-d");
			$this->weight = $weight;
			$this->height = $height;
			$this->age = 0;
		}

		public function breath(){
			if($this->alive == true) echo "Take a breath";
		}

		public function eat($food){
			if($this->alive == true && $this->awake == true) echo "Eat " . $food;
		}

		public function drink($drink){
			if($this->alive == true && $this->awake == true) echo "Drink " . $drink;
		}

		public function grow($weight, $height, $age){
			if($this->alive == true) {
				echo "I grow";
				$this->weight = $weight;
				$this->height = $height;
				$this->age = $age;
			}
		}

		public function wake_up(){
			if($this->alive == true && $this->awake == false){
				echo "I'm waking up";
				$this->awake = true;
			}	
		}

		public function sleep(){
			if($this->alive == true && $this->awake == true){
				echo "I'm sleeping";
				$this->awake = false;
			}	
		}

		public function talk($sentence){
			if($this->alive == true){
				echo $sentence;
			}	
		}

		public function think(){
			if($this->alive == true){
				echo "I'm thinking";
			}	
		}

		public function die($date){
			$this->alive = false;
			$this->awake = false;
			$this->date_of_death = $date;
		}

		public function getFullName(){
			return $this->first_name . " " . $this->last_name;
		}

		public function getBasicInfo(){
			$basic_info = $this->getFullName() . "<br>";
			$basic_info .= "Sex: " . $this->sex . "<br/>";
			$basic_info .= "Date of birth: " . $this->date_of_birth . "<br/>";
			$basic_info .= "Age: " . $this->age . "<br/>";
			$basic_info .= "Weight: " . $this->weight . "<br/>";
			$basic_info .= "Height: " . $this->height . "<br/>";

			return $basic_info;
		}
	}

	class Man extends Person{/* ... */}
	class Woman extends Person{
		private $number_of_children = 0;

		public function setNumberOfChildren($value){
			$this->number_of_children = $value;
		}

		public function getNumberOfChildren(){
			return $this->number_of_children;
		}
		/* ... */
	}
 ?>