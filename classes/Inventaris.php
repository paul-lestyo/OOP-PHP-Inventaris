<?php 
require_once 'Database.php';

Class Inventaris extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM inventaris");
	}

	public function get_all_join_jenis_ruang_petugas(){
		return $this->run("SELECT id_inventaris,nama,kondisi,inventaris.keterangan,jumlah,nama_jenis,
								  tanggal_register,nama_ruang,kode_inventaris,nama_petugas
			FROM inventaris INNER JOIN jenis ON inventaris.id_jenis=jenis.id_jenis
							INNER JOIN ruang ON inventaris.id_ruang=ruang.id_ruang
							INNER JOIN petugas ON inventaris.id_petugas=petugas.id_petugas
							ORDER BY tanggal_register desc");
	}

	public function add_data($nama,$kondisi,$keterangan,$jumlah,$jenis,$tgl_register,$ruang,$petugas){
		$id 		   = uniqid();
		$nama 	       = $this->escape($nama);
		$kondisi 	   = $this->escape($kondisi);
		$keterangan    = $this->escape($keterangan);
		$tgl_register  = $this->escape($tgl_register);
		$petugas 	   = $this->escape($petugas);
		$ruang 		   = explode('|', $this->escape($ruang));
		$jenis 	       = explode('|', $this->escape($jenis));
		$number 	   = sprintf('%03d',$this->get_count($jenis[0]));
		
		$kode = 'INV-'.str_replace('-', '', $tgl_register).'-'.$jenis[1].'-'.$ruang[1].'-'.$number;
		// die();
		return $this->run("INSERT INTO inventaris VALUES
			('$id','$nama','$kondisi','$keterangan','$jumlah','$jenis[0]','$tgl_register','$ruang[0]','$kode','$petugas')");
	}

	public function edit_data($id,$nama,$kondisi,$keterangan,$jumlah,$jenis,$tgl_register,$ruang,$petugas){
		$this->delete_data($id);
		$nama 	       = $this->escape($nama);
		$kondisi 	   = $this->escape($kondisi);
		$keterangan    = $this->escape($keterangan);
		$tgl_register  = $this->escape($tgl_register);
		$petugas 	   = $this->escape($petugas);
		$ruang 		   = explode('|', $this->escape($ruang));
		$jenis 	       = explode('|', $this->escape($jenis));
		$number 	   = sprintf('%03d',$this->get_count($jenis[0]));
		
		$kode = 'INV-'.str_replace('-', '', $tgl_register).'-'.$jenis[1].'-'.$ruang[1].'-'.$number;
		// die();
		return $this->run("INSERT INTO inventaris VALUES
			('$id','$nama','$kondisi','$keterangan','$jumlah','$jenis[0]','$tgl_register','$ruang[0]','$kode','$petugas')");
	}
	
	public function get_count($id_jenis) {
		$data  = $this->run("SELECT kode_inventaris FROM inventaris WHERE id_jenis='$id_jenis'");
		$count = 1;
		foreach ($data as $row) {
				$count++;
			}	
		return $count;
	}

	public function get_where_join_ruang($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("
			SELECT * from inventaris inner join ruang on inventaris.id_ruang=ruang.id_ruang WHERE $x='$y'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM inventaris WHERE id_inventaris='$id'");	
	}

	public function cek_stok($id){
		$id  = $this->escape($id);
		$sql = $this->run("SELECT jumlah from inventaris WHERE id_inventaris='$id'");		
		foreach ($sql as $row) {
			return $row['jumlah'];
		}
	}

	public function balek_stok($id,$jumlah){
		$id = $this->escape($id);
		$jumlah = $this->escape($jumlah);

		return $this->run("UPDATE inventaris SET jumlah=jumlah+$jumlah WHERE id_inventaris='$id'");
	}

	public function kurang_stok($id,$jumlah) {
		$id = $this->escape($id);
		$jumlah = $this->escape($jumlah);

		return $this->run("UPDATE inventaris SET jumlah=jumlah-$jumlah WHERE id_inventaris='$id'");
	}

	function cek_data_inventaris($kode){
		$ruang = $this->escape($kode);
		return mysqli_num_rows($this->run("SELECT * FROM inventaris WHERE kode_inventaris='$kode'"));
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("SELECT * FROM inventaris WHERE $x='$y'");
	}

	public function get_where_join_level($x,$y){
		return $this->run("SELECT * FROM inventaris INNER JOIN pegawai ON inventaris.id_pegawai=pegawai.id_pegawai WHERE $x='$y'");	
	}

}

 ?>