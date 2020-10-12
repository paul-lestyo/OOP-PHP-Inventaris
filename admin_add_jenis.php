<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}


$jenis = new Jenis();
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['nama'])) && !empty(trim($_POST['kode_jenis'])) && !empty(trim($_POST['keterangan'])) ) {
			if($jenis->cek_data_jenis($_POST['kode_jenis']) === 0) {
				if($jenis->add_data($_POST['nama'],$_POST['kode_jenis'],$_POST['keterangan'])) {
					header('Location:admin_lihat_jenis.php');
					// die('berhasil');
				} else {
					$error = 'ada masalah saat menambah data';
				}
			} else {
				$error = 'Kode sudah ada, gunakan kode yang lain';
			}

		} else {
		$error = 'data wajib diisi';
		}
	}






require_once 'templates/header-admin.php';
 ?>



 <div class="wrapper">
	<h1>Tambah Petugas</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<label for="nama">Nama Jenis</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama Jenis"><br>
		<label for="kode_jenis">Kode Jenis</label><br>
		<input type="text" name="kode_jenis" placeholder="Masukan Jenis"><br>
		<label for="keterangan">Keterangan</label><br>
		<textarea name="keterangan" placeholder="Keterangan"></textarea><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
</div>