<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$petugas = new Petugas();
$data = $petugas->get_all_join_level();



require_once 'templates/header-admin.php';
 ?>


 <div class="wrapper">
 	<h1>Data Petugas</h1>
 	<h3><a href="admin_add_petugas.php">Tambah</a></h3><br>
 	<table border="1">
 		<tr>
 			<th>No</th>
 			<th>Nama Petugas</th>
 			<th>Username</th>
 			<th>Level</th>
 			<th>Action</th>

 		</tr>
 		<?php $i = 1; ?>
		<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><?=$i?></td>
 			<td><?=$row['nama_petugas']?></td>
 			<td><?=$row['username']?></td>
 			<td><?=$row['nama_level']?></td>
 			<td><a href="admin_edit_petugas.php?id_petugas=<?=$row['id_petugas']?>">Edit</a> | 
 				<a href="admin_delete_petugas.php?id_petugas=<?=$row['id_petugas']?>">Delete</a></td>
 		</tr>
 		<?php $i++ ?>
 		<?php } ?>
 	</table>
 </div>
 </body>
 </html>