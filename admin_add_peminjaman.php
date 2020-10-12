<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}


$detail_pinjam = new Detail_Pinjam();
$inventaris = new Inventaris();
$peminjaman = new Peminjaman();
$pegawai   = new Pegawai();
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['tgl_pinjam'])) && !empty(trim($_POST['status'])) ) {
			if($_POST['jumlah'] <= $inventaris->cek_stok($_POST['id_inventaris'])){
				if($id = $peminjaman->add_data($_POST['tgl_pinjam'],$_POST['status'],$_POST['pegawai'])) {
					$detail_pinjam->add_data($_POST['id_inventaris'],$_POST['jumlah'],$id);
					$inventaris->kurang_stok($_POST['id_inventaris'],$_POST['jumlah']);
					header('Location:admin_lihat_peminjaman.php');
					// die('berhasil');
				} else {
					$error = 'ada masalah saat menambah data';
				}
			} else {
				$error = 'Stok tidak mencukupi';		
			}
		} else {
		$error = 'data wajib diisi';
		}
	}






require_once 'templates/header-admin.php';
 ?>



 <div class="wrapper">
	<h1>Tambah Peminjaman</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<label for="inventaris">Barang yang dipinjam</label><br>
		<select name="id_inventaris">
			<?php foreach ($inventaris->get_all() as $row_inventaris) { ?>
			<option value="<?=$row_inventaris['id_inventaris']?>"><?=$row_inventaris['nama']?></option>
			<?php } ?>
		</select><br>
		<label for="jumlah">Jumlah</label><br>
		<input type="number" name="jumlah" placeholder="Masukan Angka" min="1" value="1"><br>

		<label for="tgl_pinjam">Tanggal Pinjam</label><br>
		<input type="date" name="tgl_pinjam"><br>
		<label for="status">Status Peminjaman</label><br>
		<input type="text" name="status" placeholder="Masukan Status Peminjaman"><br>
		<label for="pegawai">Pegawai</label><br>
		<select name="pegawai">
			<?php foreach ($pegawai->get_all() as $row) { ?>
				<option value="<?=$row['id_pegawai']?>"><?=$row['nama_pegawai']?></option>
			<?php } ?>
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
</div>