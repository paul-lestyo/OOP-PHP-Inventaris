<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$detail_pinjam = new Detail_Pinjam();
$data = $detail_pinjam->get_all_join_inventaris_peminjaman_pegawai();





require_once 'templates/header-admin.php';
 ?>


 <div class="wrapper">
 	<h1>Data Peminjaman</h1>
 	<h3><a href="admin_add_peminjaman.php">Tambah</a></h3><br>
 	<table border="1">
 		<tr>
 			<th>No</th>
 			<th>Nama Pegawai</th>
 			<th>Barang yang Dipinjam</th>
 			<th>Jumlah Barang</th>
 			<th>Tanggal Pinjam</th>
 			<th>Tanggal Kembali</th>
 			<th>Status Peminjaman</th>
 			<th>Action</th>

 		</tr>
 		<?php $i = 1; ?>
		<?php foreach ($data as $row) { ?>
 		<tr>
 			<td><?=$i?></td>
 			<td><?=$row['nama_pegawai']?></td>
 			<td><?=$row['nama']?></td>
 			<td><?=$row['jumlah']?></td>
 			<td><?=$row['tanggal_pinjam']?></td>
 			<td><?=$x = $row['tanggal_kembali'] !='' ? $row['tanggal_kembali'] : '	Belum Dikembalikan' ?></td>
 			<td><?=$row['status_peminjaman']?></td>
 			<td><a href="">Edit</a> | <a href="admin_delete_peminjaman.php?id_detail_pinjam=<?=$row['id_detail_pinjam']?>">Delete</a> |
 				<a href="admin_edit_pengembalian.php?id_detail_pinjam=<?=$row['id_detail_pinjam']?>">
 				<?= $x = $row['tanggal_kembali'] !='' ? 'Edit Tanggal Pengembalian' : 'Add Tanggal Pengembalian'?></a></td>
 		</tr>
 		<?php $i++ ?>
 		<?php } ?>
 	</table>
 </div>
 </body>
 </html>