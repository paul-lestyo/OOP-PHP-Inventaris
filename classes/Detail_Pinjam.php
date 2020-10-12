<?php 
require_once 'Database.php';

Class Detail_Pinjam extends Database {
	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		return $this->run("SELECT * FROM detail_pinjam");
	}

	public function get_all_join_inventaris_peminjaman_pegawai() {
		return $this->run("
			SELECT id_detail_pinjam,detail_pinjam.jumlah,inventaris.nama,
				   tanggal_pinjam,tanggal_kembali,status_peminjaman,nama_pegawai FROM detail_pinjam 
			inner join inventaris on detail_pinjam.id_inventaris=inventaris.id_inventaris
			inner join peminjaman on detail_pinjam.id_peminjaman=peminjaman.id_peminjaman
			inner join pegawai on peminjaman.id_pegawai=pegawai.id_pegawai");	
	}

	public function get_where_join_inventaris_ruang($x,$y){
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("
			SELECT id_detail_pinjam,detail_pinjam.id_peminjaman,detail_pinjam.id_inventaris,pegawai.id_pegawai,detail_pinjam.jumlah,
			inventaris.nama,tanggal_pinjam,tanggal_kembali,status_peminjaman,nama_pegawai FROM detail_pinjam 
			inner join inventaris on detail_pinjam.id_inventaris=inventaris.id_inventaris
			inner join peminjaman on detail_pinjam.id_peminjaman=peminjaman.id_peminjaman
			inner join pegawai on peminjaman.id_pegawai=pegawai.id_pegawai WHERE $x='$y'");
	}

	public function add_data($id_inventaris,$jumlah,$id_peminjaman){
		$id 	        = uniqid();
		$id_inventaris 	= $this->escape($id_inventaris);
		$jumlah 		= $this->escape($jumlah);
		$id_peminjaman  = $this->escape($id_peminjaman);
		
		return $this->run("INSERT INTO detail_pinjam VALUES('$id','$id_inventaris','$jumlah','$id_peminjaman')");
	}

	function cek_data_detail_pinjam($kode){
		$detail_pinjam = $this->escape($kode);
		return mysqli_num_rows($this->run("SELECT * FROM detail_pinjam WHERE kode_detail_pinjam='$kode'"));
	}

	public function get_where($x,$y) {
		$x = $this->escape($x);
		$y = $this->escape($y);

		return $this->run("
			SELECT id_detail_pinjam,detail_pinjam.id_peminjaman,detail_pinjam.id_inventaris,pegawai.id_pegawai,detail_pinjam.jumlah,
			inventaris.nama,tanggal_pinjam,tanggal_kembali,status_peminjaman,nama_pegawai FROM detail_pinjam 
			inner join inventaris on detail_pinjam.id_inventaris=inventaris.id_inventaris
			inner join peminjaman on detail_pinjam.id_peminjaman=peminjaman.id_peminjaman
			inner join pegawai on peminjaman.id_pegawai=pegawai.id_pegawai WHERE $x='$y'");
	}

	public function edit_data($id, $nama, $kode_detail_pinjam, $keterangan) {
		$id   	  	= $this->escape($id);
		$nama       = $this->escape($nama);
		$kode_detail_pinjam = $this->escape($kode_detail_pinjam);
		$keterangan = $this->escape($keterangan);

		return $this->run("UPDATE detail_pinjam SET nama_detail_pinjam='$nama',kode_detail_pinjam='$kode_detail_pinjam',keterangan='$keterangan' WHERE id_detail_pinjam='$id'");
	}

	public function delete_data($id) {
		$id   		= $this->escape($id);
		return $this->run("DELETE FROM detail_pinjam WHERE id_detail_pinjam='$id'");	
	}

}
 ?>