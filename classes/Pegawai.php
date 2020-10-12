<?php 
require_once 'Database.php';

Class Pegawai extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM pegawai");
	}

	public function add_data($nama,$nip,$alamat){
		$id 	  = uniqid();
		$nama = $this->escape($nama);
		$nip     = $this->escape($nip);
		$alamat     = $this->escape($alamat);
		
		return $this->run("INSERT INTO pegawai VALUES('$id','$nama','$nip','$alamat')");
	}

	public function cek_data_pegawai($nip) {
		$nip = $this->escape($nip);
		return mysqli_num_rows($this->run("SELECT * FROM pegawai WHERE nip='$nip'"));
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM pegawai WHERE $x='$y'");
	}

	public function edit_data($id, $nama, $nip, $alamat) {
		$id   	  = $this->escape($id);
		$nama     = $this->escape($nama);
		$nip      = $this->escape($nip);
		$alamat   = $this->escape($alamat);

		return $this->run("UPDATE pegawai SET nama_pegawai='$nama',nip='$nip',alamat='$alamat' WHERE id_pegawai='$id'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM pegawai WHERE id_pegawai='$id'");	
	}

}

 ?>