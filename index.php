<?php 
require_once 'core/init.php';

$petugas = new Petugas();


$data = $petugas->get_all_join_level();


require_once 'templates/header.php';
 ?>


 <h1>Ini Index</h1>