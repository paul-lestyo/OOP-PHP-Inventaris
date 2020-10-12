<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$ruang = new Ruang();

if(!$_GET['id_ruang'] || mysqli_num_rows($ruang->get_where('id_ruang',$_GET['id_ruang'])) === 0 ) {
	header('Location:admin_lihat_ruang.php');	
}

$ruang->delete_data($_GET['id_ruang']);
header('Location:admin_lihat_ruang.php');	