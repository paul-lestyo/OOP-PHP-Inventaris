<?php 
 
class Database{

 	private $db, $result;

	var $host = "localhost";
	var $name = "root";
	var $pass = "";
	var $db_name = "latihan_inventaris";
 
	function __construct(){
		$this->db = mysqli_connect($this->host, $this->name, $this->pass,$this->db_name);
	}

	function run($query) {
		 return $this->result = mysqli_query($this->db, $query);
	}		

	public function escape($name) {
		return $this->db->real_escape_string($name);
	}
 
} 

 
?>