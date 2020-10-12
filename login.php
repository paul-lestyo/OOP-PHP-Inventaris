<?php 
require_once 'core/init.php';

if(isset($_SESSION['petugas'])){
	header('Location:admin_dashboard.php');
}

$petugas = new Petugas();
$pegawai = new Pegawai();

if(isset($_POST['submit_petugas'])){
	if(!empty(trim($_POST['username'])) && !empty(trim($_POST['password'])) ) {
		$data = $petugas->get_where_join_level('username',$_POST['username']);
		if(mysqli_num_rows($data) == 1){
			foreach ($data as $row) {
				if($_POST['username'] == $row['username'] && md5($_POST['password']) == $row['password']) {
					$_SESSION['id_petugas'] = $row['id_petugas'];
					$_SESSION['petugas']    = true;
					$_SESSION['level'] = $row['nama_level'];
					header('Location:admin_dashboard.php');
				} else {
					$error = 'Password Salah!';		
				}	
			}
			
		} else {
			$error = 'Username yang anda masukkan tidak valid!';
		}
	} else {
		$error = 'data wajib diisi';
	}
} else if(isset($_POST['submit_pegawai'])) {
	if(!empty(trim($_POST['nip']))) {
		$data = $pegawai->get_where('nip',$_POST['nip']);
		if(mysqli_num_rows($data) == 1){
			foreach ($data as $row) {
				$_SESSION['id_pegawai'] = $row['id_pegawai'];
				$_SESSION['pegawai']    = true;
				header('Location:profile-pegawai.php');
			}
			
		} else {
			$error = 'NIP yang anda masukkan tidak valid!';
		}
	} else {
		$error = 'data wajib diisi';
	}
}



require_once 'templates/header.php';
 ?>

<div style="position: relative;width: 100%;">
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
 <div class="wrapper" style="position: relative;width: 50%;display: inline-block;">
	<h1>Login Petugas</h1>
	<form method="POST">
		<label for="username">Username</label><br>
		<input type="text" name="username" placeholder="Masukan Username"><br>
		<label for="password">Password</label><br>
		<input type="password" name="password" placeholder="Masukan Password"><br><br>
		<input type="submit" name="submit_petugas" value="Submit">
	</form>
</div>
<div class="wrapper" style="float: right;">
	<h1>Login Pegawai</h1>
	<form method="POST">
		<label for="nip">NIP</label><br>
		<input type="text" name="nip" placeholder="Masukan NIP"><br>
		<input type="submit" name="submit_pegawai" value="Submit">
	</form>
</div>
</div>
</body>
</html>

