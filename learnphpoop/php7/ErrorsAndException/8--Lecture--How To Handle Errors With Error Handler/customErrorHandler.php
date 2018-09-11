<?php
	function errorHandler($errno, $errstr) {
		echo "error is $errno and error message is $errstr";
		die();
	}

	set_error_handler("errorHandler");

	$fh = fopen('none-existing-file', 'r'); 
	 
?>
