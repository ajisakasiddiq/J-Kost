-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2022 at 01:11 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kost`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kost`
--

CREATE TABLE `data_kost` (
  `id_kost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `maps` varchar(225) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `longtitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kost`
--

INSERT INTO `data_kost` (`id_kost`, `id_user`, `nama_kost`, `alamat`, `deskripsi`, `foto`, `maps`, `status`, `longtitude`, `latitude`) VALUES
(11, 3, '   Kost jember rek', '   jember rek', '   parkiran luas', '', NULL, 'APPROVED', 113.616623, -8.213216),
(14, 3, '     kost ', '     jember', '     bebas gausah bayar ', '639176ae88547.jpeg', NULL, 'NOT APPROVED', 113.563385, -8.217563);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kamar`
--

CREATE TABLE `detail_kamar` (
  `id_detailkamar` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `jenis_fasilitas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `Keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kamar_kost`
--

CREATE TABLE `kamar_kost` (
  `id_kamar` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `jenis_kamar` varchar(255) NOT NULL,
  `no_kamar` int(10) NOT NULL,
  `harga` varchar(225) NOT NULL,
  `status_kamar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar_kost`
--

INSERT INTO `kamar_kost` (`id_kamar`, `id_kost`, `jenis_kamar`, `no_kamar`, `harga`, `status_kamar`, `deskripsi`) VALUES
(1, 11, 'laki laki', 12, '350000', 'tersedia', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `level_detail`
--

CREATE TABLE `level_detail` (
  `id_level` int(11) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_detail`
--

INSERT INTO `level_detail` (`id_level`, `level`) VALUES
(1, 'pemilik kos'),
(2, 'pencari kos'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_rek` int(11) NOT NULL,
  `kode_pemesanan` varchar(225) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durasi_sewa` varchar(225) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `no_rek_pemilik` int(11) NOT NULL,
  `nama_rek_pemilik` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_kamar`, `id_rek`, `kode_pemesanan`, `nama_pemesan`, `tgl_pemesanan`, `durasi_sewa`, `harga`, `tgl_pembayaran`, `total_pembayaran`, `status_pembayaran`, `no_rek_pemilik`, `nama_rek_pemilik`, `nama_bank`, `bukti_pembayaran`) VALUES
(1, 3, 1, 9, 'f', 'f', '2022-12-07 20:39:34', '30 hari', 'f', '2022-12-19', '350000', 'Terbayar', 323232, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Nama_bank` varchar(225) NOT NULL,
  `Nama_rek` varchar(225) NOT NULL,
  `no_rek` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rek`, `id_user`, `Nama_bank`, `Nama_rek`, `no_rek`) VALUES
(9, 3, 'BCA', 'AJISAKA SIDDIQ', '345678987654'),
(11, 3, 'BCA', 'tes', '34567');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user` int(11) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `nik` varchar(225) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `no_hp` varchar(225) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user`, `user_nama`, `username`, `user_email`, `user_pass`, `level`, `nik`, `alamat`, `foto`, `no_hp`, `jenis_kelamin`) VALUES
(3, 'ajisakasiddiq', 'ajisaka03', 'ajisakasiddiq@gmail.com', 'ajisaka12345', 1, '3509109108020001', 'Jl. ambulu NO.73B Balung', '638de1be13f77.jpg', '085156091837', 'Laki-laki'),
(4, 'admin', 'adminiboss', 'admin@gmail.com', 'admin', 3, '65789876543233', 'Jl. ambulu NO.73B', 'profil.jpg', '085156091837', 'Laki-laki'),
(5, 'ahmad hidayar', 'ahmad22', 'ahmad@gmail.com', 'ahmad123', 2, NULL, NULL, 'profil.jpg', NULL, NULL),
(6, 'agus mantap', 'agus12', 'agus@gmail.com', 'agus12345', 3, NULL, NULL, 'profil.jpg', NULL, NULL),
(7, 'yusuf mahardika', 'yusuf', 'yusuf@gmail.com', 'yusuf12345', 3, '', '', 'profil.jpg', '', ''),
(11, 'masa', 'masa45', 'masa@gmail.com', 'masa123', 1, NULL, NULL, 'profil.jpg', NULL, NULL),
(12, 'a', 'a33', 'a@gmail.com', 'a12345', 2, '', '', '638f392178e1a.jpeg', '', ''),
(13, 'ehem', 'ehem33', 'ehem@gmail.com', 'ehem123', 1, NULL, NULL, 'profil.jpg', NULL, NULL),
(14, 'b', 'bb', 'b@gmail.com', 'b123', 2, NULL, NULL, 'profil.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kost`
--
ALTER TABLE `data_kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_kamar`
--
ALTER TABLE `detail_kamar`
  ADD PRIMARY KEY (`id_detailkamar`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `kamar_kost_ibfk_1` (`id_kost`);

--
-- Indexes for table `level_detail`
--
ALTER TABLE `level_detail`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_rek` (`id_rek`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rek`),
  ADD KEY `rekening_ibfk_1` (`id_user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kost`
--
ALTER TABLE `data_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_kamar`
--
ALTER TABLE `detail_kamar`
  MODIFY `id_detailkamar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level_detail`
--
ALTER TABLE `level_detail`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kost`
--
ALTER TABLE `data_kost`
  ADD CONSTRAINT `data_kost_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`);

--
-- Constraints for table `detail_kamar`
--
ALTER TABLE `detail_kamar`
  ADD CONSTRAINT `detail_kamar_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_kost` (`id_kamar`);

--
-- Constraints for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  ADD CONSTRAINT `kamar_kost_ibfk_1` FOREIGN KEY (`id_kost`) REFERENCES `data_kost` (`id_kost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_kost` (`id_kamar`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_rek`) REFERENCES `rekening` (`id_rek`);

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `rekening_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level_detail` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
