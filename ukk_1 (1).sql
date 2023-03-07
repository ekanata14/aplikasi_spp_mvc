-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2023 at 10:34 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(12) DEFAULT NULL,
  `kompetensi_keahlian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'XII RPL 2', 'RPL'),
(2, 'XII RPL 1', 'RPL'),
(3, 'XII RPL 3', 'RPL'),
(6, 'XII TKJ 1', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tahun_ajaran`, `nominal`) VALUES
(1, '2020/2021', 160000),
(2, '2021/2022', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('0','1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '0'),
(6, 'petugas_1', 'ptgs1', '1'),
(8, '1113', '123', '2'),
(10, '1112', '123', '2'),
(11, '1223', '123', '2'),
(12, '1234', '123', '2'),
(13, '1234', '12312', '2'),
(16, '1', '1', '2'),
(17, '23', '2', '2'),
(18, 'petugas_5', 'ptgs5', '1'),
(19, '123', '123', '2');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `pengguna_id`) VALUES
(1, 'admin', 1),
(5, 'petugas_1', 6),
(6, 'petugas_5', 18);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `pembayaran_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nis`, `nama_siswa`, `alamat`, `telepon`, `kelas_id`, `pengguna_id`, `pembayaran_id`) VALUES
(13, '2', '23', 'Test 23', 'Semarang', '12312313', 1, 17, 1),
(14, '123456', '123', 'Yantod', 'Denpasar', '123123123', 1, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `bulan_dibayar` varchar(20) DEFAULT NULL,
  `tahun_dibayar` varchar(8) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `pembayaran_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_bayar`, `bulan_dibayar`, `tahun_dibayar`, `siswa_id`, `petugas_id`, `pembayaran_id`) VALUES
(6, '2023-03-07 20:55:34', 'Juli', '2023', 13, 5, 1),
(7, '2023-03-07 20:55:36', 'Agustus', '2023', 13, 5, 1),
(8, '2023-03-07 20:55:37', 'September', '2023', 13, 5, 1),
(9, '2023-03-07 20:55:39', 'Oktober', '2023', 13, 5, 1),
(10, '2023-03-07 21:04:57', 'Juli', '2023', 14, 1, 1),
(11, '2023-03-07 21:05:09', 'Agustus', '2023', 14, 1, 1),
(12, '2023-03-07 21:05:11', 'September', '2023', 14, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `fk_id_petugas` (`pengguna_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `fk_id_petugas` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
