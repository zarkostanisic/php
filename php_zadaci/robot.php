<?php 
	$robot1 = 1/*rand(0, 100)*/;
	$mrlja1 = $robot1;

	$robot2 = 3/*rand(0, 100)*/;
	$mrlja2 = $robot2;

	if($mrlja1 > $mrlja2) $distance = $mrlja1 - $mrlja2;
	else $distance = $mrlja2 - $mrlja1;

	$instructions = array();

	for($i=0;$i<=$distance;$i++){
		$instructions[] = "R";
		if($i == $distance) {
			for($i=0;$i<=$distance;$i++){
				$instructions[] = "S";
				$instructions[] = "L";
			}
		}
	}

	$instruction = implode(",", $instructions);
	echo $instruction;

	//$instructions = array("R", "S", "L", "S", "L");

	$skip1 = "no";
	$skip2 = "no";

	foreach($instructions as $instruction){

		if($instruction == "L"){
			if($skip1 != "yes") $robot1--;
			if($skip2 != "yes") $robot2--;

			$skip1 = "no";
			$skip2 = "no";
		}

		if($instruction == "S"){
			if($robot1 == $mrlja1 || $robot1 == $mrlja2) $skip1 = "yes";
			if($robot2 == $mrlja1 || $robot2 == $mrlja2) $skip2 = "yes";
		}

		if($instruction == "R"){
			if($skip1 != "yes") $robot1++;
			if($skip2 != "yes") $robot2++;

			$skip1 = "no";
			$skip2 = "no";
		}

		if($robot1 == $robot2) echo "Crash<br/>";
	}

	echo $robot1 . "<br/>";
	echo $mrlja1;
	echo "<hr>";
	echo $robot2 . "<br/>";
	echo $mrlja2;
 ?>