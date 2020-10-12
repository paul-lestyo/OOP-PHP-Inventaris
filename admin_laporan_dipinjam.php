<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$detail_pinjam = new Detail_Pinjam();

$data = $detail_pinjam->get_where_join_inventaris_ruang('inventaris.id_ruang',$_GET['id_ruang']);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang Dipinjam</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Barang_Dipinjam.xls");
	?>

	<center>
		<h1>Laporan Barang Dipinjam</h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Pegawai</th>
			<th>Barang yang Dipinjam</th>
			<th>Jumlah Barang</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Status Peminjaman</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach ($data as $row) { ?>
		<tr>
			<td><?=$i?></td>
			<td><?=$row['nama_pegawai']?></td>
 			<td><?=$row['nama']?></td>
 			<td><?=$row['jumlah']?></td>
 			<td><?=$row['tanggal_pinjam']?></td>
 			<td><?=$x = $row['tanggal_kembali'] !='' ? $row['tanggal_kembali'] : '	Belum Dikembalikan' ?></td>
 			<td><?=$row['status_peminjaman']?></td>
		</tr>
		<?php $i++ ?>
		<?php } ?>
	</table>
</body>
</html>