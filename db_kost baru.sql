-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2022 at 02:07 PM
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
  `longtitude` varchar(225) NOT NULL,
  `latitude` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kost`
--

INSERT INTO `data_kost` (`id_kost`, `id_user`, `nama_kost`, `alamat`, `deskripsi`, `foto`, `maps`, `status`, `longtitude`, `latitude`) VALUES
(11, 3, '    Kost jember rek', 'jalan kaliurang', '    parkiran luas', '', NULL, 'APPROVED', '113.616623', '-8.213216');

-- --------------------------------------------------------

--
-- Table structure for table `kamar_kost`
--

CREATE TABLE `kamar_kost` (
  `id_kamar` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `jenis_kamar` varchar(255) NOT NULL,
  `no_kamar` varchar(100) NOT NULL,
  `harga` varchar(225) NOT NULL,
  `status_kamar` varchar(255) NOT NULL,
  `foto_kamar_pertama` varchar(225) NOT NULL,
  `foto_kamar_kedua` varchar(225) NOT NULL,
  `foto_kamar_ketiga` varchar(225) NOT NULL,
  `foto_kamar_keempat` varchar(225) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar_kost`
--

INSERT INTO `kamar_kost` (`id_kamar`, `id_kost`, `jenis_kamar`, `no_kamar`, `harga`, `status_kamar`, `foto_kamar_pertama`, `foto_kamar_kedua`, `foto_kamar_ketiga`, `foto_kamar_keempat`, `deskripsi`) VALUES
(1, 11, 'laki laki', '  12', '     350000', 'Tersedia', '6396cf75c399d.png', '', '', '', '   Apa nih'),
(3, 11, 'Laki-Laki', '  12A', '  450000', 'Tersedia', '63987f41e18de.png', '', '', '', '  kamar mandi dalam , dilarang membawa pasangan'),
(4, 11, 'Laki-Laki', '10A', '450000', 'Tersedia', '6399cf777e39b.jpg', '6399cf777eb7f.jpg', '6399cf777f56d.jpg', '6399cf777f129.jpg', 'Terdapat perabotan dan kamar mandi dalam');

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
  `nik` varchar(225) NOT NULL,
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
(11, 12, 'BCA', 'ahay', '43432333');

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
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `bukti_kontrak` varchar(225) DEFAULT NULL,
  `status_user` varchar(225) DEFAULT 'NOT VERIFIED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user`, `user_nama`, `username`, `user_email`, `user_pass`, `level`, `nik`, `alamat`, `foto`, `no_hp`, `jenis_kelamin`, `bukti_kontrak`, `status_user`) VALUES
(3, 'ajisakasiddiq', 'ajisaka03', 'ajisakasiddiq@gmail.com', 'ajisaka12345', 1, '3509109108020001', 'Jl. ambulu NO.73B Balung', '638de1be13f77.jpg', '085156091837', 'Laki-laki', 'Bukti Belum Di Upload', 'NOT VERIFIED'),
(4, 'admin', 'adminiboss', 'admin@gmail.com', 'admin', 3, '65789876543233', 'Jl. ambulu NO.73B', 'profil.jpg', '085156091837', 'Laki-laki', NULL, ''),
(5, 'ahmad hidayar', 'ahmad22', 'ahmad@gmail.com', 'ahmad123', 2, NULL, NULL, 'profil.jpg', NULL, NULL, NULL, ''),
(6, 'agus mantap', 'agus12', 'agus@gmail.com', 'agus12345', 3, '5565644343322', '', 'profil.jpg', '', '', NULL, ''),
(12, 'a', 'a33', 'a@gmail.com', 'a12345', 2, '54354343', 'ambulu street', '63988cc352e89.jpeg', '085156091837', 'Laki-laki', NULL, '');

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
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_detail`
--
ALTER TABLE `level_detail`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kost`
--
ALTER TABLE `data_kost`
  ADD CONSTRAINT `data_kost_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  ADD CONSTRAINT `kamar_kost_ibfk_1` FOREIGN KEY (`id_kost`) REFERENCES `data_kost` (`id_kost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_kost` (`id_kamar`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_rek`) REFERENCES `rekening` (`id_rek`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`);

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
