<?php 
	class Photo extends Db_object{
		protected static $db_table = "photos";
		protected static $db_table_fields = array(
			"id", "title", "description", "filename", "type", "size"
		);
		public $id;
		public $title;
		public $description;
		public $filename;
		public $type;
		public $size;

		public $tmp_path;
		public $photo_directory = DS . "images" . DS;
		public $upload_directory = SITE_ROOT . DS . "images" . DS;
		public $errors = array();
		private $upload_errors_array = array(
		    0 => 'There is no error, the file uploaded with success',
		    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
		    3 => 'The uploaded file was only partially uploaded',
		    4 => 'No file was uploaded',
		    6 => 'Missing a temporary folder',
		    7 => 'Failed to write file to disk.',
		    8 => 'A PHP extension stopped the file upload.',
		);
		private $allowed_photo_types = array(
			"image/jpg", "image/jpeg", "image/png"
		);

		public function set_file($file){
			if(empty($file) || !$file || !is_array($file)){
				$this->errors[] = "There was not file uploaded here";

				return false;
			}else if($file["error"] != 0){
				$this->errors[] = $this->upload_errors_array[$file["error"]];

				return false;
			}else if(!in_array($file["type"], $this->allowed_photo_types)){
				$this->errors[] = "Only images allowed";
				return false;
			}else{

				$this->tmp_path = $file["tmp_name"];
				$this->filename = basename($file["name"]);
				$this->type = $file["type"];
				$this->size = $file["size"];
			}
		}

		public function save(){
			if($this->id){
				return $this->update();
			}else{
				if(!empty($this->errors)){
					return false;
				}

				if(empty($this->filename) || empty($this->tmp_path)){
					$this->errors[] = "The file was not available";
					return false;
				}

				if(!file_exists($this->upload_directory)){
					mkdir($this->upload_directory);
				}

				$target_path = $this->upload_directory . DS . $this->filename;

				if(file_exists($target_path)){
					$this->errors[] = "File " . $this->filename . " already exists";
					return false;
				}

				if(move_uploaded_file($this->tmp_path, $target_path)){

					if($this->create()){
						unset($this->tmp_path);
						return true;
					}
				}else{
					$this->errors[] = "Unable to upload file";
					return false;
				}
			}
		}

		public function photo_path(){
			return $this->photo_directory . DS . $this->filename;
		}

		public function delete_photo(){
			
			if($this->delete()){
				$target_path = $this->upload_directory . $this->filename;
				
				return unlink($target_path) ? true : false;
			}else{
				return false;
			}
		}
	}
 ?>