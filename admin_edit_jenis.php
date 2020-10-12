<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}
$jenis = new Jenis();

if(!$_GET['id_jenis'] || mysqli_num_rows($jenis->get_where('id_jenis',$_GET['id_jenis'])) === 0 ) {
	header('Location:admin_lihat_level.php');	
}


$data = $jenis->get_where('id_jenis',$_GET['id_jenis']);
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['id_jenis'])) && !empty(trim($_POST['nama'])) && 
			!empty(trim($_POST['kode_jenis'])) && !empty(trim($_POST['keterangan'])) ) {
			if($jenis->edit_data($_POST['id_jenis'],$_POST['nama'],$_POST['kode_jenis'],$_POST['keterangan'])) {
				header('Location:admin_lihat_jenis.php');
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
	<h1>Edit Jenis</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<?php foreach ($data as $row) { ?>
		<input type="hidden" name="id_jenis" value="<?=$row['id_jenis']?>">
		<label for="nama">Nama Jenis</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama jenis" value="<?=$row['nama_jenis']?>"><br>
		<label for="kode_jenis">Kode Jenis</label><br>
		<input type="text" name="kode_jenis" placeholder="Masukan Kode Jenis" value="<?=$row['kode_jenis']?>"><br>
		<label for="keterangan">Keterangan</label><br>
		<textarea name="keterangan" placeholder="Keterangan"><?=$row['keterangan']?></textarea><br>
		<input type="submit" name="submit" value="Submit">
		<?php } ?>
	</form>
</body>
</html>
</div>