<?php 
require_once 'core/init.php';

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
  <div class="wrapper-admin">
  <div class="header">
    <h1><?=$_SESSION['level']?></h1>
    <a href="admin_dashboard.php">Dashboard</a>
    <?php if($_SESSION['level'] == 'Admin'){ ?>
    <a href="admin_lihat_level.php">Level</a>
    <a href="admin_lihat_petugas.php">Petugas</a>
    <a href="admin_lihat_pegawai.php">Pegawai</a>
    <a href="admin_lihat_jenis.php">Jenis</a>
    <a href="admin_lihat_ruang.php">Ruang</a>
    <a href="admin_lihat_inventaris.php">Inventaris</a>
    <a href="admin_laporan.php">Laporan</a>
    <?php } ?>
    <a href="admin_lihat_peminjaman.php">Peminjaman</a>
    <a href="admin-logout.php" style="float: right;">Logout</a>
  </div>
