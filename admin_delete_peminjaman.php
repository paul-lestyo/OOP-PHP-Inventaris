<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$detail_pinjam = new Detail_Pinjam();
$peminjaman    = new Peminjaman();
$inventaris    = new Inventaris();

if(!$_GET['id_detail_pinjam'] || mysqli_num_rows($detail_pinjam->get_where('id_detail_pinjam',$_GET['id_detail_pinjam'])) === 0 ) {
	header('Location:admin_lihat_peminjaman.php');	
}

$data = $detail_pinjam->get_where('id_detail_pinjam',$_GET['id_detail_pinjam']);
foreach ($data as $row) {
	$detail_pinjam->delete_data($row['id_detail_pinjam']);
	$peminjaman->delete_data($row['id_peminjaman']);
	if($row['tanggal_kembali'] === ""){
		$inventaris->balek_stok($row['id_inventaris'],$row['jumlah']);
	}
	
}


header('Location:admin_lihat_peminjaman.php');	