<?php 
require_once 'Database.php';

Class Petugas extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM petugas");
	}

	public function get_all_join_level(){
		return $this->run("SELECT * FROM petugas INNER JOIN level ON petugas.id_level=level.id_level");
	}

	public function add_data($username,$pass,$nama,$id_level){
		$id 	  = uniqid();
		$username = $this->escape($username);
		$pass     = $this->escape($pass);
		$nama     = $this->escape($nama);
		$id_level = $this->escape($id_level);
		$pass 	  = md5($pass);
		
		return $this->run("INSERT INTO petugas VALUES('$id','$username','$pass','$nama','$id_level')");
	}

	public function cek_data_petugas($username) {
		$username = $this->escape($username);
		return mysqli_num_rows($this->run("SELECT * FROM petugas WHERE username='$username'"));
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM petugas WHERE $x='$y'");
	}

	public function get_where_join_level($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM petugas INNER JOIN level ON petugas.id_level=level.id_level WHERE $x='$y'");
	}

	public function edit_data($id, $username, $pass, $nama, $id_level) {
		$id   	  = $this->escape($id);
		$username = $this->escape($username);
		$pass     = $this->escape($pass);
		$nama     = $this->escape($nama);
		$id_level = $this->escape($id_level);
		$pass 	  = md5($pass);

		return $this->run("UPDATE petugas SET username='$username',password='$pass',nama_petugas='$nama',id_level='$id_level' 
						   WHERE id_petugas='$id'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM petugas WHERE id_petugas='$id'");	
	}

}

 ?>