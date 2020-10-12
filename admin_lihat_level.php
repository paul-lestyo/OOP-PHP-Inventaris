<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$level = new Level();
$data = $level->get_all();



require_once 'templates/header-admin.php';
 ?>


 <div class="wrapper">
 	<h1>Data Level</h1>
 	<h3><a href="admin_add_level.php">Tambah</a></h3><br>
 	<table border="1">
 		<tr>
 			<th>No</th>
 			<th>Nama</th>
 			<th>Action</th>
 		</tr>
 		<?php $i = 1; ?>
		<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><?=$i?></td>
 			<td><?=$row['nama_level']?></td>
 			<td><a href="admin_edit_level.php?id_level=<?=$row['id_level']?>">Edit | 
 				<a href="admin_delete_level.php?id_level=<?=$row['id_level']?>">Delete</a></a></td>
 		</tr>
 		<?php $i++ ?>
 		<?php } ?>
 	</table>
 </div>
 </body>
 </html>