<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$inventaris = new Inventaris();

if(!$_GET['id_inventaris'] || mysqli_num_rows($inventaris->get_where('id_inventaris',$_GET['id_inventaris'])) === 0 ) {
	header('Location:admin_lihat_inventaris.php');	
}

if (!$inventaris->delete_data($_GET['id_inventaris'])) {
	$_SESSION['error'] = 'Anda tidak bisa delete data karena masih dipinjam';
}
header('Location:admin_lihat_inventaris.php');	