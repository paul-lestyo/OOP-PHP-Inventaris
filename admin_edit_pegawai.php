<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}
$pegawai = new Pegawai();

if(!$_GET['id_pegawai'] || mysqli_num_rows($pegawai->get_where('id_pegawai',$_GET['id_pegawai'])) === 0 ) {
	header('Location:admin_lihat_level.php');	
}


$data = $pegawai->get_where('id_pegawai',$_GET['id_pegawai']);
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['id_pegawai'])) && !empty(trim($_POST['nama'])) && 
			!empty(trim($_POST['nip'])) && !empty(trim($_POST['alamat'])) ) {
			if($pegawai->edit_data($_POST['id_pegawai'],$_POST['nama'],$_POST['nip'],$_POST['alamat'])) {
				header('Location:admin_lihat_pegawai.php');
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
	<h1>Tambah Petugas</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<?php foreach ($data as $row) { ?>
		<input type="hidden" name="id_pegawai" value="<?=$row['id_pegawai']?>">
		<label for="nama">Nama Pegawai</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama Pegawai" value="<?=$row['nama_pegawai']?>"><br>
		<label for="nip">NIP</label><br>
		<input type="text" name="nip" placeholder="Masukan NIP" value="<?=$row['nip']?>"><br>
		<label for="alamat">Alamat</label><br>
		<textarea name="alamat" placeholder="Alamat"><?=$row['alamat']?></textarea><br>
		<input type="submit" name="submit" value="Submit">
		<?php } ?>
	</form>
</body>
</html>
</div>