<?php 
	interface DogInterface{

		public function breath();
		public function eat($food);
		public function drink($drink);
		public function grow($weight, $height, $age);
		public function wake_up();
		public function sleep();
		public function bark();
		public function think();
		public function die($date);
	}

	class Dog implements DogInterface{
		private $alive = true;
		private $awake = true;
		private $age;

		private $date_of_birth;
		private $date_of_death;

		private $weight;
		private $height;
		private $name;
		private $color;
		private $kind;

		// Born
		public function __construct($name, $color, $kind, $weight, $height){
			$this->name = $name;
			$this->color = $color;
			$this->kind = $kind;

			$this->alive = true;
			$this->date_of_birth = date("Y-m-d");
			$this->weight = $weight;
			$this->height = $height;
			$this->age = 0;
		}

		public function breath(){
			if($this->alive == true) echo "take a breath<br/>";
		}

		public function eat($food){
			if($this->alive == true && $this->awake == true) echo "eat " . $food;
		}

		public function drink($drink){
			if($this->alive == true && $this->awake == true) echo "drink " . $drink;
		}

		public function grow($weight, $height, $age){
			if($this->alive == true) {
				echo "grow";
				$this->weight = $weight;
				$this->height = $height;
				$this->age += 1;
			}
		}

		public function wake_up(){
			if($this->alive == true && $this->awake == false){
				echo "wake up";
				$this->awake = true;
			}	
		}

		public function sleep(){
			if($this->alive == true && $this->awake == true){
				echo "sleep";
				$this->awake = false;
			}	
		}

		public function bark(){
			if($this->alive == true){
				echo "bark";
			}	
		}

		public function think(){
			if($this->alive == true){
				echo "think";
			}	
		}

		public function die($date){
			$this->alive = false;
			$this->awake = false;
			$this->date_of_death = $date;
		}

		public function getBasicInfo(){
			$basic_info = "name: " . $this->name . "<br>";
			$basic_info .= "color: " . $this->color . "<br/>";
			$basic_info .= "kind: " . $this->kind . "<br/>";
			$basic_info .= "date of birth: " . $this->date_of_birth . "<br/>";
			$basic_info .= "age: " . $this->age . "<br/>";
			$basic_info .= "weight: " . $this->weight . "<br/>";
			$basic_info .= "height: " . $this->height . "<br/>";

			return $basic_info;
		}
	}
 ?>