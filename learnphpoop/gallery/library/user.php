<?php 
	class User extends Db_object{
		protected static $db_table = "users";
		protected static $db_table_fields = array(
			"id", "username", "password", "first_name", "last_name", "image"
		);
		public $id;
		public $username;
		public $password;
		public $first_name;
		public $last_name;
		public $image;
		public $placeholder = "https://placehold.it/80x80";
		public $count;

		public $tmp_path;
		public $photo_directory = DS . "images" . DS;
		public $upload_directory = SITE_ROOT . DS . "images" . DS;

		public static function verify_user($username, $password){
			global $DB;

			$result = self::find_by_query("
				SELECT * 
				FROM " . self::$db_table . "
				WHERE username='" . $DB->escape_string($username) . "'
				AND password='" . $DB->escape_string($password) . "'"
			);

			return !empty($result) ? array_shift($result) : false;
		}

		public function photo_path(){
			return empty($this->image) ? $this->placeholder : $this->photo_directory . $this->image;
		}

		public function delete_user(){
			unlink($this->upload_directory . $this->image);
			$this->delete();
		}

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
				$this->image = basename($file["name"]);
			}
		}

		public function save_user_and_image(){
			if(!empty($this->errors)){
				return false;
			}

			if(empty($this->image) || empty($this->tmp_path)){
				$this->errors[] = "The file was not available";
				return false;
			}

			if(!file_exists($this->upload_directory)){
				mkdir($this->upload_directory);
			}

			$target_path = $this->upload_directory . DS . $this->image;

			if(file_exists($target_path)){
				$this->errors[] = "File " . $this->image . " already exists";
				return false;
			}

			if(move_uploaded_file($this->tmp_path, $target_path)){
				if($this->save()){
					unset($this->tmp_path);
					return true;
				}
			}else{
				$this->errors[] = "Unable to upload file";
				return false;
			}
		}
	}
 ?>