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
 	<h1>Data Ruang</h1>
 	<h3><a href="admin_add_ruang.php">Tambah</a></h3><br>
 	<table border="1">
 		<tr>
 			<th>No</th>
 			<th>Nama Ruang</th>
 			<th>Kode Ruang</th>
 			<th>Keterangan</th>
 			<th>Action</th>
 		</tr>
 		<?php $i = 1; ?>
		<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><?=$i?></td>
 			<td><?=$row['nama_ruang']?></td>
 			<td><?=$row['kode_ruang']?></td>
 			<td><?=$row['keterangan']?></td>
 			<td><a href="admin_edit_ruang.php?id_ruang=<?=$row['id_ruang']?>">Edit | 
 				<a href="admin_delete_ruang.php?id_ruang=<?=$row['id_ruang']?>">Delete</a></a></td>
 		</tr>
 		<?php $i++ ?>
 		<?php } ?>
 	</table>
 </div>
 </body>
 </html>