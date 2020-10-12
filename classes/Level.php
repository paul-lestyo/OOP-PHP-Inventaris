<?php 
require_once 'Database.php';

Class Level extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM level");
	}

	public function add_data($level){
		$id 	  = uniqid();
		$$level = $this->escape($level);
		
		return $this->run("INSERT INTO level VALUES('$id','$level')");
	}

	function cek_data_level($level){
		$level = $this->escape($level);
		return mysqli_num_rows($this->run("SELECT * FROM level WHERE nama_level='$level'"));
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM level WHERE $x='$y'");
	}

	public function edit_data($id, $level) {
		$id   		= $this->escape($id);
		$level     	= $this->escape($level);
		
		return $this->run("UPDATE level SET nama_level='$level' WHERE id_level='$id'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM level WHERE id_level='$id'");	
	}

}
 ?>