<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$detail_pinjam = new Detail_Pinjam();
$inventaris = new Inventaris();
$peminjaman = new Peminjaman();
$pegawai   = new Pegawai();

if(!$_GET['id_detail_pinjam'] || mysqli_num_rows($detail_pinjam->get_where('id_detail_pinjam',$_GET['id_detail_pinjam'])) === 0 ) {
	header('Location:admin_lihat_peminjaman.php');	
}

$data = $detail_pinjam->get_where('id_detail_pinjam',$_GET['id_detail_pinjam']);
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['tgl_kembali'])) && !empty(trim($_POST['id_peminjaman'])) ) {
			if($peminjaman->edit_data($_POST['id_peminjaman'],$_POST['tgl_kembali'],'Sudah Dikembalikan')) {

				if($_POST['tgl_kembali_before'] === ""){
					$inventaris->balek_stok($_POST['id_inventaris'],$_POST['jumlah']);
				}
				header('Location:admin_lihat_peminjaman.php');
				// die('berhasil');
			} else {
				$error = 'ada masalah saat menambah data';
			}
		} else {
		$error = 'data wajib diisi';
		}
	}






require_once 'templates/header-admin.php';
 ?>



 <div class="wrapper">
	<h1>Tambah Pengembalian</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<?php foreach ($data as $row) { ?>
		<input type="hidden" name="id_peminjaman" value="<?=$row['id_peminjaman']?>">
		<input type="hidden" name="id_inventaris" value="<?=$row['id_inventaris']?>">
		<input type="hidden" name="status" value="<?=$row['status_peminjaman']?>">
		<input type="hidden" name="jumlah" value="<?=$row['jumlah']?>">
		<input type="hidden" name="tgl_kembali_before" value="<?=$row['tanggal_kembali']?>">
		<label for="inventaris">Barang yang dipinjam</label><br>
		<select name="id_inventaris" disabled>
			<?php foreach ($inventaris->get_all() as $row_inventaris) { ?>
			<?php $x = $row_inventaris['id_inventaris'] == $row['id_inventaris'] ? 'selected' : '' ?>
			<option value="<?=$row_inventaris['id_inventaris']?>" <?=$x?>><?=$row_inventaris['nama']?></option>
			<?php } ?>
		</select><br>
		<label for="jumlah">Jumlah</label><br>
		<input type="number" name="jumlah" disabled placeholder="Masukan Angka" min="1" value="<?=$row['jumlah']?>"><br>

		<input type="hidden" name="id_peminjaman" value="<?=$row['id_peminjaman']?>">
		<label for="tgl_pinjam">Tanggal Pinjam</label><br>
		<input type="date" name="tgl_pinjam" value="<?=$row['tanggal_pinjam']?>" disabled><br>
		<label for="tgl_pinjam">Tanggal Kembali</label><br>
		<input type="date" name="tgl_kembali" value="<?=$row['tanggal_kembali']?>"><br>
		<label for="status">Status Peminjaman</label><br>
		<input type="text" name="status" placeholder="Masukan Status Peminjaman" value="<?=$row['status_peminjaman']?>" disabled><br>
		<label for="pegawai">Pegawai</label><br>
		<select name="pegawai" disabled>
			<?php foreach ($pegawai->get_all() as $rows) { ?>
				<?php $x = $row['id_pegawai'] == $rows['id_pegawai'] ? 'selected' : '' ?>
				<option <?=$x?> value="<?=$rows['id_pegawai']?>"><?=$rows['nama_pegawai']?></option>
			<?php } ?>
		</select>
		<input type="submit" name="submit" value="Submit">
		<?php } ?>
	</form>
</body>
</html>
</div>