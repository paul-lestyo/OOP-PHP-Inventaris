<?php 
require_once 'Database.php';

Class Ruang extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM ruang");
	}

	public function add_data($nama,$kode,$keterangan){
		$id 	    = uniqid();
		$nama 		= $this->escape($nama);
		$kode 		= $this->escape($kode);
		$keterangan = $this->escape($keterangan);
		
		return $this->run("INSERT INTO ruang VALUES('$id','$nama','$kode','$keterangan')");
	}

	function cek_data_ruang($kode){
		$ruang = $this->escape($kode);
		return mysqli_num_rows($this->run("SELECT * FROM ruang WHERE kode_ruang='$kode'"));
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM ruang WHERE $x='$y'");
	}

	public function edit_data($id, $nama, $kode_ruang, $keterangan) {
		$id   	  	= $this->escape($id);
		$nama       = $this->escape($nama);
		$kode_ruang = $this->escape($kode_ruang);
		$keterangan = $this->escape($keterangan);

		return $this->run("UPDATE ruang SET nama_ruang='$nama',kode_ruang='$kode_ruang',keterangan='$keterangan' WHERE id_ruang='$id'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM ruang WHERE id_ruang='$id'");	
	}

}
 ?>