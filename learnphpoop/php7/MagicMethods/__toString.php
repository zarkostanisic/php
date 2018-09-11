<?php 
	class Test 
	{ 
		public $name; 
		public function __construct($name) 
		{ 
			$this->name= $name; 
		} 
		
	} 
	 
	$obj = new Test('Tim'); 
	echo $obj; 
?> 
