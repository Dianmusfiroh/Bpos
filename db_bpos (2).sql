-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 06:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(40) NOT NULL DEFAULT '',
  `all_access` tinyint(1) NOT NULL DEFAULT 0,
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `key`, `all_access`, `controller`, `date_created`, `date_modified`) VALUES
(1, 'TQSwuaMUJwX1724F28vE', 1, 'api/login', '2022-01-19 09:58:07', '2022-01-20 02:32:00'),
(2, 'test', 1, 'api/produk', '2022-01-20 03:34:43', '2022-01-20 06:30:36'),
(4, 'test', 1, 'api/transaksi', '2022-01-20 03:34:43', '2022-01-20 06:30:36'),
(5, 'test', 1, 'api/setting', '2022-01-20 03:34:43', '2022-01-20 06:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'TQSwuaMUJwX1724F28vE', 0, 0, 0, NULL, 0),
(2, 1, 'test', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE `t_bank` (
  `id_bank` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `nama_pemilik` varchar(75) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_biodata`
--

CREATE TABLE `t_biodata` (
  `id_biodata` int(11) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `id_jenis_usaha` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `image` text NOT NULL DEFAULT 'placeholder.png',
  `tgl_registrasi` date NOT NULL DEFAULT current_timestamp(),
  `status_toko` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_biodata`
--

INSERT INTO `t_biodata` (`id_biodata`, `nama_toko`, `id_jenis_usaha`, `alamat`, `email`, `no_hp`, `image`, `tgl_registrasi`, `status_toko`) VALUES
(1, 'Jaya Abadi', 3, 'Jln Makassar No. 15', 'arif@gmail.com', '085242680621', 'jaya_abadi_1230.jpg', '2022-01-01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_fee`
--

CREATE TABLE `t_fee` (
  `id_fee` int(11) NOT NULL,
  `fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_fee`
--

INSERT INTO `t_fee` (`id_fee`, `fee`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_usaha`
--

CREATE TABLE `t_jenis_usaha` (
  `id_jenis_usaha` int(11) NOT NULL,
  `jenis_usaha` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jenis_usaha`
--

INSERT INTO `t_jenis_usaha` (`id_jenis_usaha`, `jenis_usaha`) VALUES
(0, 'Pilih Jenis Usaha'),
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Makanan dan Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `t_log`
--

CREATE TABLE `t_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `aksi` text NOT NULL,
  `method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_log`
--

INSERT INTO `t_log` (`id_log`, `id_user`, `id_biodata`, `waktu`, `aksi`, `method`) VALUES
(3, 2, 1, '2022-02-14 05:48:25', 'login', 'Login'),
(4, 3, 1, '2022-02-02 07:43:33', 'login', 'Login'),
(5, 4, 1, '2022-02-02 16:47:04', 'login', 'Login'),
(6, 9, 1, '2022-02-14 05:47:58', 'login', 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `id_fee` int(11) NOT NULL DEFAULT 1,
  `id_biodata` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL DEFAULT 0,
  `stok` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `id_fee`, `id_biodata`, `nama_produk`, `harga`, `diskon`, `stok`, `image`, `created_at`) VALUES
(6, 1, 1, 'Lokita Mangga', 15000, 0, 88, 'Lokita_Mangga_161.jpg', '2022-02-09'),
(7, 1, 1, 'Lokita Yakult', 15000, 0, 93, 'Lokita_Yakult_171.jpg', '2022-02-09'),
(24, 1, 1, 'Motor Listrik', 100000, 5, 92, 'Motor_Listrik_851.jpg', '2022-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `t_status_bayar_fee`
--

CREATE TABLE `t_status_bayar_fee` (
  `id_status_bayar_fee` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `bulan` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` enum('lunas','belum') NOT NULL DEFAULT 'belum',
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_status_bayar_fee`
--

INSERT INTO `t_status_bayar_fee` (`id_status_bayar_fee`, `id_biodata`, `bulan`, `tahun`, `status`, `jumlah_bayar`) VALUES
(5, 1, '02', 2022, 'belum', 3100);

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `nama_pembeli` varchar(75) NOT NULL DEFAULT 'Umum',
  `no_hp_pembeli` varchar(20) NOT NULL DEFAULT '0',
  `nama_produk` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `image` text NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon_transaksi` int(11) NOT NULL,
  `diskon_produk` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `fee` double NOT NULL,
  `met_pem` enum('tunai','transfer','qris','ewallet') NOT NULL DEFAULT 'tunai',
  `tipe_order` enum('dinein','takeaway') NOT NULL DEFAULT 'dinein',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_produk`, `id_user`, `id_biodata`, `no_transaksi`, `nama_pembeli`, `no_hp_pembeli`, `nama_produk`, `harga`, `image`, `qty`, `diskon_transaksi`, `diskon_produk`, `sub_total`, `total_bayar`, `nominal`, `kembalian`, `tgl_transaksi`, `fee`, `met_pem`, `tipe_order`, `created_at`) VALUES
(1106, 24, 9, 1, 'TR19114603', 'Umum', '0', 'Motor Listrik', 100000, 'Motor_Listrik_851.jpg', 1, 0, 5, 95000, 110000, 110000, 0, '2022-02-14 11:46:03', 1, 'tunai', 'dinein', '2022-02-14'),
(1107, 7, 9, 1, 'TR19114603', 'Umum', '0', 'Lokita Yakult', 15000, 'Lokita_Yakult_171.jpg', 1, 0, 0, 15000, 110000, 110000, 0, '2022-02-14 11:46:03', 1, 'tunai', 'dinein', '2022-02-14'),
(1108, 6, 9, 1, 'TR19114626', 'Umum', '0', 'Lokita Mangga', 15000, 'Lokita_Mangga_161.jpg', 1, 0, 0, 15000, 15000, 15000, 0, '2022-02-14 11:46:26', 1, 'tunai', 'dinein', '2022-02-14'),
(1109, 6, 9, 1, 'TR19115133', 'Umum', '0', 'Lokita Mangga', 15000, 'Lokita_Mangga_161.jpg', 5, 0, 0, 15000, 170000, 170000, 0, '2022-02-14 11:51:33', 1, 'tunai', 'dinein', '2022-02-14'),
(1110, 24, 9, 1, 'TR19115133', 'Umum', '0', 'Motor Listrik', 100000, 'Motor_Listrik_851.jpg', 1, 0, 5, 95000, 170000, 170000, 0, '2022-02-14 11:51:33', 1, 'tunai', 'dinein', '2022-02-14'),
(1111, 7, 9, 1, 'TR19124807', 'Umum', '0', 'Lokita Yakult', 15000, 'Lokita_Yakult_171.jpg', 1, 0, 0, 15000, 15000, 15000, 0, '2022-02-14 12:48:07', 1, 'tunai', 'dinein', '2022-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT '0',
  `level` enum('owner','kasir') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `shift` enum('pagi','siang','sore','malam','full') DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `id_biodata`, `username`, `password`, `nama_lengkap`, `no_hp`, `level`, `status`, `shift`, `date_created`) VALUES
(2, 1, 'demo', '$2y$10$6oUnsOthswD4G1lZsXuQ9uaY11EYxT70MCpFM8phps9uo.iOefixu', 'Moh Arif Dauhi', '0', 'owner', '1', NULL, '2022-01-20'),
(9, 1, 'arif', '$2y$10$6oUnsOthswD4G1lZsXuQ9uaY11EYxT70MCpFM8phps9uo.iOefixu', 'Arif Dauhi', '085242680621', 'kasir', '1', 'sore', '2022-02-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bank`
--
ALTER TABLE `t_bank`
  ADD PRIMARY KEY (`id_bank`),
  ADD KEY `FK` (`id_biodata`);

--
-- Indexes for table `t_biodata`
--
ALTER TABLE `t_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `FK` (`id_jenis_usaha`) USING BTREE;

--
-- Indexes for table `t_fee`
--
ALTER TABLE `t_fee`
  ADD PRIMARY KEY (`id_fee`);

--
-- Indexes for table `t_jenis_usaha`
--
ALTER TABLE `t_jenis_usaha`
  ADD PRIMARY KEY (`id_jenis_usaha`);

--
-- Indexes for table `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `FK` (`id_user`),
  ADD KEY `FK2` (`id_biodata`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK` (`id_fee`),
  ADD KEY `FK2` (`id_biodata`);

--
-- Indexes for table `t_status_bayar_fee`
--
ALTER TABLE `t_status_bayar_fee`
  ADD PRIMARY KEY (`id_status_bayar_fee`),
  ADD KEY `FK` (`id_biodata`),
  ADD KEY `IDX_BULAN` (`bulan`),
  ADD KEY `IDX_TAHUN` (`tahun`),
  ADD KEY `IDX_STATUS` (`status`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK` (`id_produk`),
  ADD KEY `FK2` (`id_user`),
  ADD KEY `FK3` (`id_biodata`),
  ADD KEY `tgl_transaksi` (`tgl_transaksi`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK` (`id_biodata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_bank`
--
ALTER TABLE `t_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_biodata`
--
ALTER TABLE `t_biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_fee`
--
ALTER TABLE `t_fee`
  MODIFY `id_fee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_jenis_usaha`
--
ALTER TABLE `t_jenis_usaha`
  MODIFY `id_jenis_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_log`
--
ALTER TABLE `t_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `t_status_bayar_fee`
--
ALTER TABLE `t_status_bayar_fee`
  MODIFY `id_status_bayar_fee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
