<?php 
require_once 'Database.php';

Class Peminjaman extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM peminjaman");
	}

	public function add_data($tgl_pinjam,$status,$id_pegawai){
		$id 	  		= uniqid();
		$tgl_pinjam 	= $this->escape($tgl_pinjam);
		$status     	= $this->escape($status);
		$id_pegawai     = $this->escape($id_pegawai);
		
		if($this->run("INSERT INTO peminjaman VALUES('$id','$tgl_pinjam','','$status','$id_pegawai')")){
			return $id;
		} return false;
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM peminjaman WHERE $x='$y'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM peminjaman WHERE id_peminjaman='$id'");	
	}

	public function get_where_join_level($x,$y){
		return $this->run("SELECT * FROM peminjaman INNER JOIN pegawai ON peminjaman.id_pegawai=pegawai.id_pegawai WHERE $x='$y'");	
	}

	public function edit_data($id, $tgl_kembali, $status) {
		$tgl_kembali   	= $this->escape($tgl_kembali);
		$status     	= $this->escape($status);

		return $this->run("UPDATE peminjaman SET tanggal_kembali='$tgl_kembali',status_peminjaman='$status' WHERE id_peminjaman='$id'");
	}

}

 ?>