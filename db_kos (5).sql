-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2022 at 02:38 AM
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
-- Database: `db_kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_bagian` varchar(225) NOT NULL,
  `nama_bagian` varchar(225) NOT NULL,
  `status_bagian` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_kecamatan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `NIK` varchar(225) DEFAULT NULL,
  `no_hp` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `status_customer` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `id_user`, `id_kecamatan`, `jenis_kelamin`, `nama_customer`, `NIK`, `no_hp`, `email`, `password`, `username`, `alamat`, `status_customer`, `level`, `foto`) VALUES
(1, '', '', '', 'ajiska', '3509101908020003', 851560918, 'ajisakasiddiq@gmail.com', 'ajisaka03', 'ajisaka', '', '', 2, ''),
(2, '7', NULL, 'laki laki', NULL, NULL, NULL, 'noval@gmail.com', 'noval12345', 'noval14', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_kamarkos` int(11) NOT NULL,
  `nama_foto` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `status_foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamar_kos`
--

CREATE TABLE `kamar_kos` (
  `id_kamarkos` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jenis_kamar` varchar(225) NOT NULL,
  `jenis_sewa` varchar(225) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `status_kamar` varchar(225) NOT NULL,
  `deskripsi_kamar` text NOT NULL,
  `metode_pembayaran` varchar(225) NOT NULL,
  `status_approval` varchar(225) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_pembayaran` int(100) NOT NULL,
  `norek_pembayaran` int(100) NOT NULL,
  `namarek_pembayaran` varchar(225) NOT NULL,
  `nama_bank` varchar(225) NOT NULL,
  `bukti_pembayaran` varchar(250) NOT NULL,
  `status pembayaran` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kost`
--

CREATE TABLE `kategori_kost` (
  `id_kategori_kost` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `slug_kategori_kost` varchar(100) NOT NULL,
  `nama_kategori_kost` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `urutan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(225) NOT NULL,
  `latitude` varchar(225) NOT NULL,
  `longitude` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `json_data` int(11) NOT NULL,
  `koordinat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(100) NOT NULL,
  `nama_kelurahan` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `json_data` varchar(100) NOT NULL,
  `koordinat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_customer` int(100) NOT NULL,
  `id_kategori_kost` int(100) NOT NULL,
  `id_kecamatan` int(100) NOT NULL,
  `id_kelurahan` int(100) NOT NULL,
  `slug_kost` varchar(100) NOT NULL,
  `nama_kost` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `google_maps` varchar(100) NOT NULL,
  `status_approval` int(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_detail`
--

CREATE TABLE `level_detail` (
  `id_level` int(11) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_detail`
--

INSERT INTO `level_detail` (`id_level`, `level`) VALUES
(1, 'Pemilik kos'),
(2, 'Pencari Kos'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_paket` varchar(225) NOT NULL,
  `masa_aktif` date NOT NULL,
  `keterangan` text NOT NULL,
  `harga_paket` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_kamarkos` int(11) NOT NULL,
  `id_rekeningcustomer` int(100) NOT NULL,
  `kode_pemesanan` varchar(225) NOT NULL,
  `nama_pemesan` varchar(225) NOT NULL,
  `tgl_pemesan` date NOT NULL,
  `harga_kamar` int(100) NOT NULL,
  `jumlah_kamar` int(100) NOT NULL,
  `total_pemesanan` int(100) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `jumlah_pembayaran` int(100) NOT NULL,
  `norek_pembayaran` int(100) NOT NULL,
  `namarek_pembayaran` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(225) NOT NULL,
  `status_pemesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_bank` varchar(225) NOT NULL,
  `nama_rek` varchar(225) NOT NULL,
  `no_rek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekening_customers`
--

CREATE TABLE `rekening_customers` (
  `id_rekeningcustomers` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_bank` varchar(225) NOT NULL,
  `nama_pemilik` varchar(225) NOT NULL,
  `no_rek` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user` int(11) NOT NULL,
  `user_nama` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `user_pass` varchar(225) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user`, `user_nama`, `user_email`, `username`, `user_pass`, `level`) VALUES
(8, 'dimas anjay mabar', 'dimas@gmail.com', 'dimas22', 'dimas12345', 3),
(9, 'nnn', 'nnn@gmail.com', 'nnn123', 'nnn123', 1),
(10, 'ajisaka siddiq', 'ajisakasiddiq@gmail.com', 'ajisaka03', 'ajisaka0310', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_kamarkos` (`id_kamarkos`);

--
-- Indexes for table `kamar_kos`
--
ALTER TABLE `kamar_kos`
  ADD PRIMARY KEY (`id_kamarkos`),
  ADD KEY `id_kos` (`id_kost`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori_kost`
--
ALTER TABLE `kategori_kost`
  ADD PRIMARY KEY (`id_kategori_kost`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_kategori_kost` (`id_kategori_kost`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `level_detail`
--
ALTER TABLE `level_detail`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_kamar` (`id_kamarkos`),
  ADD KEY `id_rekeningcustomer` (`id_rekeningcustomer`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rekening_customers`
--
ALTER TABLE `rekening_customers`
  ADD PRIMARY KEY (`id_rekeningcustomers`),
  ADD KEY `id_customer` (`id_customer`);

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
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar_kos`
--
ALTER TABLE `kamar_kos`
  MODIFY `id_kamarkos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_kost`
--
ALTER TABLE `kategori_kost`
  MODIFY `id_kategori_kost` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_detail`
--
ALTER TABLE `level_detail`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening_customers`
--
ALTER TABLE `rekening_customers`
  MODIFY `id_rekeningcustomers` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bagian`
--
ALTER TABLE `bagian`
  ADD CONSTRAINT `bagian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level_detail` (`id_level`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_kamarkos`) REFERENCES `kamar_kos` (`id_kamarkos`);

--
-- Constraints for table `kamar_kos`
--
ALTER TABLE `kamar_kos`
  ADD CONSTRAINT `kamar_kos_ibfk_1` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`),
  ADD CONSTRAINT `kamar_kos_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`);

--
-- Constraints for table `kategori_kost`
--
ALTER TABLE `kategori_kost`
  ADD CONSTRAINT `kategori_kost_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `kost_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `kost_ibfk_3` FOREIGN KEY (`id_kategori_kost`) REFERENCES `kategori_kost` (`id_kategori_kost`),
  ADD CONSTRAINT `kost_ibfk_4` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `kost_ibfk_5` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`),
  ADD CONSTRAINT `kost_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`);

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_kamarkos`) REFERENCES `kamar_kos` (`id_kamarkos`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_rekeningcustomer`) REFERENCES `rekening_customers` (`id_rekeningcustomers`);

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `rekening_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_detail` (`id_user`);

--
-- Constraints for table `rekening_customers`
--
ALTER TABLE `rekening_customers`
  ADD CONSTRAINT `rekening_customers_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level_detail` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
