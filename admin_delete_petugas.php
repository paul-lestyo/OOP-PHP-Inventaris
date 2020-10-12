<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$petugas = new Petugas();

if(!$_GET['id_petugas'] || mysqli_num_rows($petugas->get_where('id_petugas',$_GET['id_petugas'])) === 0 ) {
	header('Location:admin_lihat_level.php');	
}

$petugas->delete_data($_GET['id_petugas']);
header('Location:admin_lihat_petugas.php');	