<?php
// page1.php:

  include("Student.php");
  
  $stuObj = new Student;
  $stuObj->name= "Tim";
  $stuObj->id = 10;
 
  $s = serialize($stuObj);

  echo $s;
  
  // store $s somewhere where page2.php can find it.
  file_put_contents('store.txt', $s);


?>