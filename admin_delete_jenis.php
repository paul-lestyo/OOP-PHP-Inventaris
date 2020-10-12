<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$jenis = new Jenis();

if(!$_GET['id_jenis'] || mysqli_num_rows($jenis->get_where('id_jenis',$_GET['id_jenis'])) === 0 ) {
	header('Location:admin_lihat_jenis.php');	
}

$jenis->delete_data($_GET['id_jenis']);
header('Location:admin_lihat_jenis.php');	