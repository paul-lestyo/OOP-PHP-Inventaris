-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 03:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` varchar(255) NOT NULL,
  `id_inventaris` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `id_peminjaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_inventaris`, `jumlah`, `id_peminjaman`) VALUES
('5e60f6f4ea1e9', '5e60b5e3898a6', '2', '5e60f6f4d97f0'),
('5e60f98e27641', '5e60b59e38b09', '8', '5e60f98e0b34b');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_jenis` varchar(255) NOT NULL,
  `tanggal_register` varchar(255) NOT NULL,
  `id_ruang` varchar(255) NOT NULL,
  `kode_inventaris` varchar(255) NOT NULL,
  `id_petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`) VALUES
('5e60b59e38b09', 'Mejaa', 'Mulus', 'Good', 8, '5e3b860563485', '2019-01-04', '5e3b86fc8e4b4', 'INV-20190104-MJ-G2-003', '5e3acacebc439'),
('5e60b5e3898a6', 'Inventaris 02', 'Kurang God', 'wadow', 2, '5e3b860563485', '2017-01-02', '5e3b86fc8e4b4', 'INV-20170102-MJ-G2-001', '5e3b8161e715d'),
('5e60bbfda74d8', 'Kursi', 'asdsad', 'asdsd', 4, '5e3b8492bf334', '2018-01-03', '1', 'INV-20180103-KR-G1-002', '5e3acacebc439');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(255) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `kode_jenis` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
('5e3b8492bf334', 'Kursi', 'KR', 'Mudah Berkarat'),
('5e3b860563485', 'Meja', 'MJ', 'Tuturuuuuuu~');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` varchar(255) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
('5e326101be3c6', 'Operator'),
('5e3acaaf13adc', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `alamat`) VALUES
('5e3280e5353cb', 'Novan R', '28', 'Solo'),
('5e3280ef71fef', 'Bayu Tirta', '6', 'Soloo'),
('5e3b6c31c29b0', 'Alfian Yudha P', '1', 'wkwkwkw'),
('5e3b81766efca', 'Risang', '23', 'Solooooo');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(255) NOT NULL,
  `tanggal_pinjam` varchar(255) DEFAULT NULL,
  `tanggal_kembali` varchar(255) NOT NULL,
  `status_peminjaman` varchar(255) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`) VALUES
('5e60f6f4d97f0', '2020-03-11', '2020-03-11', 'Sudah Dikembalikan', '5e3280e5353cb'),
('5e60f98e0b34b', '2020-03-10', '2020-03-19', 'Sudah Dikembalikan', '5e3280e5353cb');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `id_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
('5e3acacebc439', 'paul', '202cb962ac59075b964b07152d234b70', 'Paulus Lestyo A', '5e3acaaf13adc'),
('5e3b67cd20557', 'ihsan', '202cb962ac59075b964b07152d234b70', 'Ihsan Al R', '5e326101be3c6'),
('5e3b811d28acb', 'brily', '202cb962ac59075b964b07152d234b70', 'Brilyando Cahya', '5e326101be3c6'),
('5e3b813cbf8c1', 'ardana', '202cb962ac59075b964b07152d234b70', 'Ardana Pramudya H', '5e326101be3c6'),
('5e3b8161e715d', 'aya', '202cb962ac59075b964b07152d234b70', 'Aya Avdewo', '5e326101be3c6');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(255) NOT NULL,
  `nama_ruang` varchar(255) NOT NULL,
  `kode_ruang` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan`) VALUES
('1', 'Gudang Tersembunyi', 'G1', 'Gudang yang hanya bisa ditemukan olh bbrp orng saja'),
('5e3b86fc8e4b4', 'Gudang 1', 'G2', 'Gudang yang paling pertama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `detail_pinjam_ibfk_1` (`id_peminjaman`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjaman_ibfk_1` (`id_pegawai`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_pinjam_ibfk_2` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
