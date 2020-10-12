<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$inventaris = new Inventaris();

$data = $inventaris->get_where_join_ruang('ruang.id_ruang',$_GET['id_ruang']);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Inventaris</title>
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
	header("Content-Disposition: attachment; filename=Laporan_Inventaris.xls");
	?>

	<center>
		<h1>Laporan Inventaris</h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Kondisi</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach ($data as $row) { ?>
		<tr>
			<td><?=$i?></td>
			<td><?=$row['nama'] ?></td>
			<td><?=$row['jumlah'] ?></td>
			<td><?=$row['kondisi'] ?></td>
		</tr>
		<?php $i++ ?>
		<?php } ?>
	</table>
</body>
</html>