<?php  
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$petugas = new Petugas();
$data = $petugas->get_where_join_level('id_petugas',$_SESSION['id_petugas']);


require_once 'templates/header-admin.php';
?>
	<div class="wrapper-admin">
		<?php foreach ($data as $row) { ?>
		<h2>Hai <?=$row['nama_petugas']?>, Anda login sebagai <?=$row['nama_level']?></h2>
		<?php } ?>

	</div>
</body>
</html>