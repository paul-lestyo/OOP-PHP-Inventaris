<?php  
require_once 'core/init.php';

if(!isset($_SESSION['pegawai'])) {
	header('Location:login_pegawai.php');
}

$pegawai = new Pegawai();
$peminjaman = new Peminjaman();
$detail_pinjam = new Detail_Pinjam();
$data = $pegawai->get_where('id_pegawai',$_SESSION['id_pegawai']);
$detail = $detail_pinjam->get_where('pegawai.id_pegawai',$_SESSION['id_pegawai']);


require_once 'templates/header-pegawai.php';
?>
	<div class="wrapper-admin">
		<?php foreach ($data as $row) { ?>
		<h2>Hai <?=$row['nama_pegawai']?>,</h2>
		<?php } ?>
		<br>
		<h3>Berikut adalah riwayat peminjaman anda : </h3>
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
 		<?php $i = 1; ?>
		<?php foreach ($detail as $row) { ?>
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
	</div>
</body>
</html>