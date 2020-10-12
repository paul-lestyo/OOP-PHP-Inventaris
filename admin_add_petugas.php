<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}


$petugas = new Petugas();
$level   = new Level();
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['username'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['nama'])) ) {
			if($petugas->cek_data_petugas($_POST['username']) === 0) {
				if($petugas->add_data($_POST['username'],$_POST['password'],$_POST['nama'],$_POST['level'])) {
					header('Location:admin_lihat_petugas.php');
					// die('berhasil');
				} else {
					$error = 'ada masalah saat menambah data';
				}
			} else {
				$error = 'username sudah ada, gunakan username yang lain';
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
		<label for="username">Username</label><br>
		<input type="text" name="username" placeholder="Masukan Username"><br>
		<label for="password">Password</label><br>
		<input type="password" name="password" placeholder="Masukan Password"><br>
		<label for="nama">Nama Petugas</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama"><br>
		<label for="level">Level</label><br>
		<select name="level">
			<?php foreach ($level->get_all() as $row) { ?>
				<option value="<?=$row['id_level']?>"><?=$row['nama_level']?></option>
			<?php } ?>
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
</div>