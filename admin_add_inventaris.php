<?php 
require_once 'core/init.php';

if(!isset($_SESSION['petugas'])) {
	header('Location:login_petugas.php');
}

$inventaris = new Inventaris();
$jenis   	= new Jenis();
$ruang   	= new Ruang();
$petugas    = new Petugas();
 
if(isset($_POST['submit'])){
		if(!empty(trim($_POST['nama'])) && !empty(trim($_POST['kondisi'])) && !empty(trim($_POST['keterangan'])) &&
		   !empty(trim($_POST['jumlah'])) && !empty(trim($_POST['jenis'])) && !empty(trim($_POST['tgl_register'])) &&
		   !empty(trim($_POST['ruang']))  && !empty(trim($_POST['petugas'])) ) {
			if($inventaris->add_data($_POST['nama'],$_POST['kondisi'],$_POST['keterangan'],$_POST['jumlah'],$_POST['jenis'],
								  	 $_POST['tgl_register'],$_POST['ruang'],$_POST['petugas'])) {
				header('Location:admin_lihat_inventaris.php');	
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
	<h1>Tambah Inventaris</h1>
	<?php if(isset($error)) { ?>
			<div id="error" style="background-color: red; color: white; padding: 10px;"> <?= $error ?> </div> <br>
		<?php } ?>
	<form method="POST">
		<label for="nama">Nama Inventaris</label><br>
		<input type="text" name="nama" placeholder="Masukan Nama Inventaris"><br>
		<label for="kondisi">Kondisi</label><br>
		<input type="text" name="kondisi" placeholder="Masukan Kondisi"><br>
		<label for="keterangan">Keterangan</label><br>
		<textarea name="keterangan" placeholder="Keterangan"></textarea><br>
		<label for="jumlah">Jumlah</label><br>
		<input type="number" name="jumlah" placeholder="Masukan Angka" min="1" value="1"><br>
		<label for="jenis">Jenis</label><br>
		<select name="jenis">
			<?php foreach ($jenis->get_all() as $row_jenis) { ?>
				<option value="<?=$row_jenis['id_jenis']?>|<?=$row_jenis['kode_jenis']?>"><?=$row_jenis['nama_jenis']?></option>
			<?php } ?>
		</select><br>
		<label for="tgl_pinjam">Tanggal Register</label><br>
		<input type="date" name="tgl_register"><br>
		<label for="ruang">Ruang</label><br>
		<select name="ruang">
			<?php foreach ($ruang->get_all() as $row_ruang) { ?>
				<option value="<?=$row_ruang['id_ruang']?>|<?=$row_ruang['kode_ruang']?>"><?=$row_ruang['nama_ruang']?></option>
			<?php } ?>
		</select><br>
		<label for="petugas">Petugas</label><br>
		<select name="petugas">
			<?php foreach ($petugas->get_all() as $row_petugas) { ?>
				<option value="<?=$row_petugas['id_petugas']?>"><?=$row_petugas['nama_petugas']?></option>
			<?php } ?>
		</select><br>
		<br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
</div>