<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$ruang = new Ruang();

$data = $ruang->get_all();

require_once 'templates/header-admin.php';
 ?>

 <div class="wrapper">
 	<h1>Laporan</h1>
 	<table border="1">
 		<tr>
 			<th>Laporan Data Inventaris</th>
 			<th>Laporan Data Dipinjam</th>
 		</tr>
 			<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><a href="admin_laporan_inventaris.php?id_ruang=<?=$row['id_ruang']?>" target='_blank'><?=$row['nama_ruang']?></a></td>
 			<td><a href="admin_laporan_dipinjam.php?id_ruang=<?=$row['id_ruang']?>" target='_blank'><?=$row['nama_ruang']?></a></td>
 		</tr>
 			<?php } ?>
 	</table>
 </div>
 </body>
 </html>