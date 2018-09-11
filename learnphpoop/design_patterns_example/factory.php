<a href="http://www.phptherightway.com/pages/Design-Patterns.html#factory" target="_blank">Documentation</a>
<hr>
<?php 
	//Factory
	//http://www.phptherightway.com/pages/Design-Patterns.html#factory
	class Automobile{
		private $mark;
		private $model;

		public function __construct($mark, $model){
			$this->mark = $mark;
			$this->model = $model;
		}

		public function getInfo(){
			return "Mark: " . $mark . ", Model:" . $model . "<br/>";
		}
	}

	class AutomobileFactory{
		public static function create($mark, $model){
			return new Automobile($mark, $model);
		}
	}

	$automobile = AutomobileFactory::create("Peugeot", "307");
	print_r($automobile);
 ?>