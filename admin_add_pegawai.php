<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}


$pegawai = new Pegawai();
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['nama'])) && !empty(trim($_POST['nip'])) && !empty(trim($_POST['alamat'])) ) {
			if($pegawai->cek_data_pegawai($_POST['nip']) === 0) {
				if($pegawai->add_data($_POST['nama'],$_POST['nip'],$_POST['alamat'])) {
					header('Location:admin_lihat_pegawai.php');
					// die('berhasil');
				} else {
					$error = 'ada masalah saat menambah data';
				}
			} else {
				$error = 'NIP sudah ada, gunakan NIP yang lain';
			}

		} else {
		$error = 'data wajib diisi';
		}
	}






require_once 'templates/header-admin.php';
 ?>



 <div class="wrapper">
	<h1>Tambah Pegawai</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<label for="nama">Nama Pegawai</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama Pegawai"><br>
		<label for="nip">NIP</label><br>
		<input type="text" name="nip" placeholder="Masukan NIP"><br>
		<label for="alamat">Alamat</label><br>
		<textarea name="alamat" placeholder="Alamat"></textarea><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
</div>