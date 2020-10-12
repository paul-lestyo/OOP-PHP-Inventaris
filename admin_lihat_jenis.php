<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$jenis = new Jenis();
$data = $jenis->get_all();



require_once 'templates/header-admin.php';
 ?>


 <div class="wrapper">
 	<h1>Data Jenis</h1>
 	<h3><a href="admin_add_jenis.php">Tambah</a></h3><br>
 	<table border="1">
 		<tr>
 			<th>No</th>
 			<th>Nama Jenis</th>
 			<th>Kode Jenis</th>
 			<th>Keterangan</th>
 			<th>Action</th>
 		</tr>
 		<?php $i = 1; ?>
		<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><?=$i?></td>
 			<td><?=$row['nama_jenis']?></td>
 			<td><?=$row['kode_jenis']?></td>
 			<td><?=$row['keterangan']?></td>
 			<td><a href="admin_edit_jenis.php?id_jenis=<?=$row['id_jenis']?>">Edit | 
 				<a href="admin_delete_jenis.php?id_jenis=<?=$row['id_jenis']?>">Delete</a></a></td>
 		</tr>
 		<?php $i++ ?>
 		<?php } ?>
 	</table>
 </div>
 </body>
 </html>