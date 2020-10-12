<?php 
require_once "core/init.php";

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}


$level = new Level();

if(isset($_POST['submit'])){
	if(!empty(trim($_POST['level'])) ) {
		if($level->cek_data_level($_POST['level']) === 0) {
			if($level->add_data($_POST['level'])) {
				header('Location:admin_lihat_level.php');
				// die('berhasil');
			} else {
				$error = 'ada masalah saat menambah data';
			}
		} else {
			$error = 'data sudah ada';
		}

	} else {
	$error = 'data wajib diisi';
	}

}

require_once 'templates/header-admin.php';
 ?>

 <div class="wrapper">
	<h1>Tambah Level</h1>
		<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<label for="level">Level</label><br>
		<input type="text" name="level" placeholder="Masukan Level">
		<input type="submit" name="submit" value="Submit">
	</form>
</div>
</body>
</html>