<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}
$petugas = new Petugas();
$level   = new Level();

if(!$_GET['id_petugas'] || mysqli_num_rows($petugas->get_where('id_petugas',$_GET['id_petugas'])) === 0 ) {
	header('Location:admin_lihat_level.php');	
}


$data = $petugas->get_where('id_petugas',$_GET['id_petugas']);
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['id_petugas'])) && !empty(trim($_POST['password'])) ) {
			if($petugas->edit_data($_POST['id_petugas'],$_POST['username'],$_POST['password'],$_POST['nama'],$_POST['level'])) {
				header('Location:admin_lihat_petugas.php');
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
	<h1>Edit Petugas</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<?php foreach ($data as $row) { ?>
		<input type="hidden" name="id_petugas" value="<?=$row['id_petugas']?>">
		<label for="username">Username</label><br>
		<input type="text" name="username" placeholder="Masukan Username" value="<?=$row['username']?>"><br>
		<label for="password">New Password</label><br>
		<input type="password" name="password" placeholder="Masukan Password"><br>
		<label for="nama">Nama Petugas</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama" value="<?=$row['nama_petugas']?>"><br>
		<label for="level">Level</label><br>
		<select name="level">
			<?php foreach ($level->get_all() as $rows) { ?>
				<?php $x = $row['id_level'] == $rows['id_level'] ? 'selected' : '' ?>
				<option <?=$x?> value="<?=$rows['id_level']?>"><?=$rows['nama_level']?></option>
			<?php } ?>
		</select>
		<input type="submit" name="submit" value="Submit">
		<?php } ?>
	</form>
</body>
</html>
</div>