<?php 
	class Db_object{
		public $errors = array();
		protected $upload_errors_array = array(
		    0 => 'There is no error, the file uploaded with success',
		    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
		    3 => 'The uploaded file was only partially uploaded',
		    4 => 'No file was uploaded',
		    6 => 'Missing a temporary folder',
		    7 => 'Failed to write file to disk.',
		    8 => 'A PHP extension stopped the file upload.',
		);
		protected $allowed_photo_types = array(
			"image/jpg", "image/jpeg", "image/png"
		);

		public static function find_all(){
			return static::find_by_query("
				SELECT * 
				FROM " . static::$db_table
			);
		}

		public static function find_all_with_paginate($item_per_page, $offset){
			global $DB;

			return static::find_by_query("
				SELECT * 
				FROM " . static::$db_table . 
				" LIMIT " . $DB->escape_string($item_per_page) . 
				" OFFSET " . $DB->escape_string($offset)
			);
		}

		public static function find_by_id($id){

			$result = static::find_by_query("
				SELECT * 
				FROM " . static::$db_table . "
				WHERE id=" . $id
			);

			return !empty($result) ? array_shift($result) : false;
		}

		public static function count(){
			$result = static::find_by_query("
				SELECT COUNT(*) as count 
				FROM " . static::$db_table
			);

			return !empty($result) ? array_shift($result) : false;
		}

		public function create(){
			global $DB;

			$properties = $this->properties();
			//print_r($properties);

			$sql = "INSERT INTO " . static::$db_table;
			$sql .= "(";
			$sql .= implode(",", array_keys($properties));
			$sql .= ")";
			$sql .= "VALUES('";
			$sql .= implode("','", array_values($properties));
			$sql .= "')";
			//die($sql);
			if($DB->query($sql)){
				$this->id = $DB->the_insert_id();
				return true;
			}else{
				return false;
			}


		}

		public function update(){
			global $DB;
			$properties = $this->properties();
			$properties_pairs = array();

			foreach($properties as $k => $v){
				$properties_pairs[] = $k . "='" . $v . "'";
			}

			$sql = "UPDATE " . static::$db_table . " SET ";
			$sql .= implode(",", $properties_pairs);
			$sql .= " WHERE id = '" . $DB->escape_string($this->id) . "'";

			//die($sql);
			$DB->query($sql);
			
			return ($DB->the_affected_rows()) > 0 ? true : false;

		}

		public function delete(){
			global $DB;

			$sql = "DELETE FROM " . static::$db_table . " WHERE id = '" . $DB->escape_string($this->id) . "'";

			$DB->query($sql);

			return ($DB->the_affected_rows() > 0) ? true : false;

		}

		public function save(){
			return isset($this->id) ? $this->update() : $this->create();
		}

		public static function find_by_query($query){
			global $DB;

			$object_array = array();

			$result = $DB->query($query);

			while($row = $result->fetch_array()){
				$object_array[] = static::instantation($row);
			}

			return $object_array;
		}

		private function has_the_attribute($attribute){
			return property_exists($this, $attribute);
		}

		protected function properties(){
			global $DB;
			//return get_object_vars($this);
			$properties = array();

			foreach(static::$db_table_fields as $v){
				if($this->has_the_attribute($v)) $properties[$v] = $DB->escape_string($this->$v);
			}

			return $properties;
		}

		public static function instantation($record){

			$called_class = get_called_class();

			$object = new $called_class;

			foreach($record as $k => $v){
				if($object->has_the_attribute($k)) $object->$k = $v;
			}
			// $user->id = $row["id"];
			// $user->username = $row["username"];
			// $user->password = $row["password"];
			// $user->first_name = $row["first_name"];
			// $user->last_name = $row["last_name"];

			return $object;
		}
	}
 ?>