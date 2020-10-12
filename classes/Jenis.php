<?php 
require_once 'Database.php';

Class Jenis extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM jenis");
	}

	public function add_data($nama,$kode,$keterangan){
		$id 	    = uniqid();
		$nama 		= $this->escape($nama);
		$kode 		= $this->escape($kode);
		$keterangan = $this->escape($keterangan);
		
		return $this->run("INSERT INTO jenis VALUES('$id','$nama','$kode','$keterangan')");
	}

	function cek_data_jenis($kode){
		$jenis = $this->escape($kode);
		return mysqli_num_rows($this->run("SELECT * FROM jenis WHERE kode_jenis='$kode'"));
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM jenis WHERE $x='$y'");
	}

	public function edit_data($id, $nama, $kode_jenis, $keterangan) {
		$id   	  	= $this->escape($id);
		$nama       = $this->escape($nama);
		$kode_jenis = $this->escape($kode_jenis);
		$keterangan = $this->escape($keterangan);

		return $this->run("UPDATE jenis SET nama_jenis='$nama',kode_jenis='$kode_jenis',keterangan='$keterangan' WHERE id_jenis='$id'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM jenis WHERE id_jenis='$id'");	
	}

}
 ?>