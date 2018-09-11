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
		public $count;

		public $tmp_path;
		public $photo_directory = DS . "images" . DS;
		public $upload_directory = SITE_ROOT . DS . "images" . DS;

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
			return $this->photo_directory . $this->filename;
		}

		public function delete_photo(){
			unlink($this->upload_directory . $this->filename);
			$this->delete();
		}
	}
 ?>