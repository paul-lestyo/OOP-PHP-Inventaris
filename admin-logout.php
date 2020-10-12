<?php 
require_once 'core/init.php';

if(isset($_SESSION['petugas'])) {
	unset($_SESSION['petugas'],$_SESSION['id_petugas'],$_SESSION['id_level']);
}
header("Location:index.php");

 ?>