<?php 
    include("../../config/init.php");

    $file = $_FILES["file"];
    $photo = new Photo();
    $photo->set_file($file);
    $photo->save();
 ?>