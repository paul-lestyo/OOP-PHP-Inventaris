<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}
$level = new Level();

if(!$_GET['id_level'] || mysqli_num_rows($level->get_where('id_level',$_GET['id_level'])) === 0 ) {
	header('Location:admin_lihat_level.php');	
}


$data = $level->get_where('id_level',$_GET['id_level']);
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['id_level'])) ) {
			if($level->edit_data($_POST['id_level'],$_POST['level'])) {
				header('Location:admin_lihat_level.php');
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
	<h1>Edit Level</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<?php foreach ($data as $row) { ?>
		<input type="hidden" name="id_level" value="<?=$row['id_level']?>">
		<label for="level">Level</label><br>
		<input type="text" name="level" value="<?=$row['nama_level']?>"><br>
		<input type="submit" name="submit" value="Ubah">
		<?php } ?>
	</form>
</body>
</html>
</div>