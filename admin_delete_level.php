<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$level = new Level();

if(!$_GET['id_level'] || mysqli_num_rows($level->get_where('id_level',$_GET['id_level'])) === 0 ) {
	header('Location:admin_lihat_level.php');	
}

$level->delete_data($_GET['id_level']);
header('Location:admin_lihat_level.php');	