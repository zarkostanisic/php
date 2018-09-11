<?php 
	class test 
	{ 
		public function __invoke() 
		{ 
			echo "I can act as a function now....."; 
		} 
	} 
	$obj = new test; 
	$obj(); 

?>