<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}
$ruang = new Ruang();

if(!$_GET['id_ruang'] || mysqli_num_rows($ruang->get_where('id_ruang',$_GET['id_ruang'])) === 0 ) {
	header('Location:admin_lihat_level.php');	
}


$data = $ruang->get_where('id_ruang',$_GET['id_ruang']);
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['id_ruang'])) && !empty(trim($_POST['nama'])) && 
			!empty(trim($_POST['kode_ruang'])) && !empty(trim($_POST['keterangan'])) ) {
			if($ruang->edit_data($_POST['id_ruang'],$_POST['nama'],$_POST['kode_ruang'],$_POST['keterangan'])) {
				header('Location:admin_lihat_ruang.php');
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
	<h1>Edit ruang</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<?php foreach ($data as $row) { ?>
		<input type="hidden" name="id_ruang" value="<?=$row['id_ruang']?>">
		<label for="nama">Nama ruang</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama ruang" value="<?=$row['nama_ruang']?>"><br>
		<label for="kode_ruang">Kode ruang</label><br>
		<input type="text" name="kode_ruang" placeholder="Masukan Kode ruang" value="<?=$row['kode_ruang']?>"><br>
		<label for="keterangan">Keterangan</label><br>
		<textarea name="keterangan" placeholder="Keterangan"><?=$row['keterangan']?></textarea><br>
		<input type="submit" name="submit" value="Submit">
		<?php } ?>
	</form>
</body>
</html>
</div>