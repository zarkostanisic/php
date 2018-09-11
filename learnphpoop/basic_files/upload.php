<?php 
	if(isset($_POST["submit"])){
		$file = $_FILES["file"];
		$file_error = $file["error"];

		$phpFileUploadErrors = array(
		    0 => 'There is no error, the file uploaded with success',
		    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
		    3 => 'The uploaded file was only partially uploaded',
		    4 => 'No file was uploaded',
		    6 => 'Missing a temporary folder',
		    7 => 'Failed to write file to disk.',
		    8 => 'A PHP extension stopped the file upload.',
		);

		if($file_error === 0){
			if(move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"])){
				echo "success";
			}
		}else{
			echo $phpFileUploadErrors[$file["error"]];
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Upload</title>
 </head>
 <body>
 	<form method="POST" action="upload.php" enctype="multipart/form-data">
 		<input type="file" name="file">
 		<input type="submit" name="submit">	
 	</form>
 </body>
 </html>