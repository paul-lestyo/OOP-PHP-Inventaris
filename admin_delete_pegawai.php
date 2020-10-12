<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$pegawai = new Pegawai();

if(!$_GET['id_pegawai'] || mysqli_num_rows($pegawai->get_where('id_pegawai',$_GET['id_pegawai'])) === 0 ) {
	header('Location:admin_lihat_pegawai.php');	
}

$pegawai->delete_data($_GET['id_pegawai']);
header('Location:admin_lihat_pegawai.php');	