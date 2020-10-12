<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$pegawai = new Pegawai();
$data = $pegawai->get_all();



require_once 'templates/header-admin.php';
 ?>


 <div class="wrapper">
 	<h1>Data Pegawai</h1>
 	<h3><a href="admin_add_pegawai.php">Tambah</a></h3><br>
 	<table border="1">
 		<tr>
 			<th>No</th>
 			<th>Nama Pegawai</th>
 			<th>NIP</th>
 			<th>Alamat</th>
 			<th>Action</th>

 		</tr>
 		<?php $i = 1; ?>
		<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><?=$i?></td>
 			<td><?=$row['nama_pegawai']?></td>
 			<td><?=$row['nip']?></td>
 			<td><?=$row['alamat']?></td>
 			<td><a href="admin_edit_pegawai.php?id_pegawai=<?=$row['id_pegawai']?>">Edit</a> | 
 				<a href="admin_delete_pegawai.php?id_pegawai=<?=$row['id_pegawai']?>">Delete</a></td>
 		</tr>
 		<?php $i++ ?>
 		<?php } ?>
 	</table>
 </div>
 </body>
 </html>