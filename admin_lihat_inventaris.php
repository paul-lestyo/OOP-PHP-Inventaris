<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$inventaris = new Inventaris();
$data = $inventaris->get_all_join_jenis_ruang_petugas();

require_once 'templates/header-admin.php';
 ?>


 <div class="wrapper">	
 	<h1>Data Inventaris</h1>
	<?php if(isset($_SESSION['error'])) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $_SESSION['error'] ?> </div> <br>
	<?php unset($_SESSION['error']); ?>
	<?php } ?>
 	<h3><a href="admin_add_inventaris.php">Tambah</a></h3><br>
 	<table border="1">
 		<tr>
 			<th>No</th>
 			<th>Nama Inventaris</th>
 			<th>Kondisi</th>
 			<th>Keterangan</th>
 			<th>Jumlah</th>
 			<th>Jenis</th>
 			<th>Tanggal Register</th>
 			<th>Ruang</th>
 			<th>Kode Inventaris</th>
 			<th>Petugas</th>
 			<th>Action</th>

 		</tr>
 		<?php $i = 1; ?>
		<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><?=$i?></td>
 			<td><?=$row['nama']?></td>
 			<td><?=$row['kondisi']?></td>
 			<td><?=$row['keterangan']?></td>
 			<td><?=$row['jumlah']?></td>
 			<td><?=$row['nama_jenis']?></td>
 			<td><?=$row['tanggal_register']?></td>
 			<td><?=$row['nama_ruang']?></td>
 			<td><?=$row['kode_inventaris']?></td>
 			<td><?=$row['nama_petugas']?></td>
 			<td><a href="admin_edit_inventaris.php?id_inventaris=<?=$row['id_inventaris']?>">Edit</a> | 
 				<a href="admin_delete_inventaris.php?id_inventaris=<?=$row['id_inventaris']?>">Delete</a></td>
 		</tr>
 		<?php $i++ ?>
 		<?php } ?>
 	</table>
 </div>
 </body>
 </html>