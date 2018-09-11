<?php 
	//Faktorijel
	$number = 3;
	$f = 1;
	for($i=1;$i<=$number;$i++){
		$f *= $i;
	}
	// echo $number . " = " . $f;

	//Sortiranje niza
	$array = array(3, 1, 2, 5, 18, 32, 0);

	for($i=0; $i<count($array); $i++){
		for($j=0; $j<count($array); $j++){
			if($array[$j] > $array[$i]){
				$tmp = $array[$j];
				$array[$j] = $array[$i];
				$array[$i] = $tmp;
			}
		}
	}

	// print_r($array);

	//Zvezdice
	// *
	// **
	// ***
	// ****
	// *****
	$stars = 100;

	for($i=1; $i<=$stars;$i++){
		for($j=0; $j<$i; $j++){
			echo "*";
		}
		echo "<br/>";
	}

	// *****
	// ****
	// ***
	// **
	// *
	for($i=$stars; $i>0; $i--){
		for($j=$i; $j>0; $j--){
			echo "*";
		}
		echo "<br/>";
	}

 ?>