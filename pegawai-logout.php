<?php 
require_once 'core/init.php';

if(isset($_SESSION['pegawai'])) {
	unset($_SESSION['pegawai'],$_SESSION['id_pegawai']);
}
header("Location:index.php");

 ?>