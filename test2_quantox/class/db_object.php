<?php 
	class Db_object{
		public function find_all(){
			return static::find_by_query("SELECT * FROM " . static::$db_table);
		}

		public function find_by_string($field, $string){
			global $DB;

			return static::find_by_query("SELECT * 
				FROM " . static::$db_table 
				. " WHERE " . $DB->escape_string($field) . " LIKE '%" . $DB->escape_string($string) . "%'");
		}

		public static function find_by_query($query){
			global $DB;

			$object_array = array();

			$result = $DB->query($query);

			while($row = $result->fetch_object()){
				$object_array[] = static::instantination($row);
			}
			
			return $object_array;
		}

		public function create(){
			global $DB;

			$properties = $this->properties();
			
			$sql = "INSERT INTO " . static::$db_table;
			$sql .= " (" . implode(",", array_keys($properties)) . ")";
			$sql .= " VALUES('" . implode("','", array_values($properties)) . "')";

			if($DB->query($sql)){
				$this->id = $DB->last_insert_id();
				return true;
			}
			else return false;
		}

		public static function instantination($row){
			$called_class = get_called_class();
			
			$object = new $called_class;

			foreach($row as $k => $v){
				if($object->has_attribute($k)) $object->$k = $v;
			}

			return $object;
		}

		private function has_attribute($attribute){
			return property_exists($this, $attribute);
		}

		protected function properties(){
			global $DB;

			$properties = array();

			foreach(static::$db_table_fileds as $v){
				if($this->has_attribute($v)) $properties[$v] = $DB->escape_string($this->$v);
			}

			return $properties;
		}
	}
 ?>