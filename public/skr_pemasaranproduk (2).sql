-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 08:32 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skr_pemasaranproduk`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getTerjual` (`kd` VARCHAR(191)) RETURNS BIGINT(21) BEGIN

DECLARE val BIGINT(21);
SET val = (SELECT SUM(tb_keranjang.qty) FROM tb_keranjang WHERE tb_keranjang.kdProduct = kd AND tb_keranjang.checkout = '0');
IF(val is null) THEN
SET val = 0;
END IF;
RETURN val;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_17_072130_tb_master', 1),
(4, '2019_06_17_073025_relasi_tb_master', 1),
(5, '2019_06_17_082914_tb_transaksi', 1),
(6, '2019_06_17_153147_relasi_transaksi', 1),
(7, '2019_06_18_191317_triger_user', 1),
(8, '2019_06_18_201745_add_url_foto', 1),
(9, '2019_06_19_143752_add_tgl_lhirmember', 2),
(10, '2019_06_24_023900_tb_master', 3),
(11, '2019_06_24_024858_relasi_tbmaster', 3),
(12, '2019_07_02_185604_add_stock_product', 4),
(13, '2019_07_03_063107_delete_diskon_keranjang', 5),
(15, '2019_07_03_085603_set_autoincrement', 6),
(16, '2019_07_04_015005_tb_pembayaran', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_belanja`
--

CREATE TABLE `tb_belanja` (
  `noTrans` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `subTotal` bigint(20) NOT NULL DEFAULT '0',
  `ongkir` bigint(20) NOT NULL DEFAULT '0',
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('Pending','Terima','Tolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_belanja`
--

INSERT INTO `tb_belanja` (`noTrans`, `username`, `tanggal`, `subTotal`, `ongkir`, `alamat`, `confirmed`, `status`, `created_at`, `updated_at`) VALUES
(111112, 'admin', '2019-07-08', 525000, 0, '', '0', 'Pending', '2019-07-08 01:19:40', '2019-07-08 01:19:40'),
(111113, 'admin', '2019-07-09', 625000, 20000, 'Wonogiri Kota', '1', 'Tolak', '2019-07-09 11:43:19', '2019-07-09 11:43:19'),
(111114, 'admin', '2019-07-10', 200000, 10000, 'Serengan rt 04 rw 08', '1', 'Terima', '2019-07-09 23:20:21', '2019-07-09 23:20:21');

--
-- Triggers `tb_belanja`
--
DELIMITER $$
CREATE TRIGGER `AIbelanja` AFTER INSERT ON `tb_belanja` FOR EACH ROW BEGIN

UPDATE tb_keranjang SET tb_keranjang.noTrans = NEW.noTrans WHERE tb_keranjang.username = NEW.username AND tb_keranjang.checkout = '0';

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BIbelanja` BEFORE INSERT ON `tb_belanja` FOR EACH ROW BEGIN
DECLARE total BIGINT(21);
SET total = (SELECT SUM(tb_keranjang.qty * tb_keranjang.harga) FROM tb_keranjang WHERE tb_keranjang.username = NEW.username AND tb_keranjang.checkout = '0');

SET NEW.subTotal = total;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kdKategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaKategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kdKategori`, `namaKategori`) VALUES
('CKP', 'Celana Khusus Pria'),
('CKW', 'Celana Khusus Wanita'),
('CPL', 'Pakaian Couple Pria dan Wanita'),
('DRS', 'Dress'),
('KK', 'Baju Koko'),
('MKN', 'Mukenah'),
('PKB', 'Pakaian Khusus Bayi'),
('PKP', 'Pakaian Khusus Pria'),
('PKW', 'Pakaian Khusus Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(10) UNSIGNED NOT NULL,
  `noTrans` int(10) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdProduct` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) NOT NULL DEFAULT '0',
  `harga` bigint(20) NOT NULL DEFAULT '0',
  `checkout` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `noTrans`, `tanggal`, `username`, `kdProduct`, `qty`, `harga`, `checkout`, `created_at`, `updated_at`) VALUES
(3, 111113, '2019-07-08', 'admin', 'KD006', 1, 50000, '1', '2019-07-07 23:19:44', '2019-07-07 23:19:44'),
(4, 111113, '2019-07-08', 'admin', 'KD003', 2, 112500, '1', '2019-07-07 23:20:36', '2019-07-07 23:20:36'),
(5, 111113, '2019-07-08', 'admin', 'KD006', 1, 50000, '1', '2019-07-07 23:36:16', '2019-07-07 23:36:16'),
(6, 111113, '2019-07-08', 'admin', 'KD006', 1, 50000, '1', '2019-07-07 23:37:26', '2019-07-07 23:37:26'),
(7, 111113, '2019-07-08', 'admin', 'KD007', 1, 50000, '1', '2019-07-07 23:39:29', '2019-07-07 23:39:29'),
(8, 111113, '2019-07-08', 'admin', 'KD005', 1, 50000, '1', '2019-07-07 23:39:37', '2019-07-07 23:39:37'),
(9, 111113, '2019-07-08', 'admin', 'KD008', 1, 50000, '1', '2019-07-07 23:39:43', '2019-07-07 23:39:43'),
(10, 111113, '2019-07-09', 'admin', 'KD007', 1, 50000, '1', '2019-07-09 10:33:32', '2019-07-09 10:33:32'),
(11, 111113, '2019-07-09', 'admin', 'KD007', 2, 50000, '1', '2019-07-09 10:33:37', '2019-07-09 10:33:37'),
(12, 111114, '2019-07-10', 'admin', 'KD008', 1, 50000, '0', '2019-07-09 23:16:56', '2019-07-09 23:16:56'),
(13, 111114, '2019-07-10', 'admin', 'KD001', 1, 150000, '0', '2019-07-09 23:17:12', '2019-07-09 23:17:12');

--
-- Triggers `tb_keranjang`
--
DELIMITER $$
CREATE TRIGGER `BIKeranjang` BEFORE INSERT ON `tb_keranjang` FOR EACH ROW BEGIN

DECLARE hargaJual BIGINT(21);
DECLARE diskon BIGINT(21);
DECLARE diskonrp BIGINT(21);

SET hargaJual = (SELECT tb_product.hargaJual FROM tb_product WHERE tb_product.kdProduct = NEW.kdProduct);

SET diskon = (SELECT tb_product.diskon FROM tb_product WHERE tb_product.kdProduct = NEW.kdProduct);

SET diskonrp = (diskon * hargaJual) / 100;
SET NEW.harga = ( hargaJual - diskonrp );

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BIupdate` BEFORE UPDATE ON `tb_keranjang` FOR EACH ROW BEGIN

IF (NEW.checkout = '1') THEN
	UPDATE tb_product SET tb_product.qty = NEW.qty WHERE tb_product.kdProduct = NEW.kdProduct;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglLahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `username`, `email`, `password`, `nohp`, `alamat`, `tglLahir`, `created_at`, `updated_at`) VALUES
(19, 'bagus', 'bagus@gmail.com', '$2y$10$lNyRYWVEmP8tplmIhvBB3eks0gDoaiWjCyJYY7lLAcKLRKwkK6hC.', '089673266623', 'jagalan rt 04 rw 8', '2019-06-21', '2019-06-21 05:10:08', '2019-06-21 05:10:08'),
(20, 'ana', 'ana@gmail.com', '$2y$10$jK0QErNOAOjUS/Xk0wC2LO.3QsSPS9O29C.6k3JPDsVOXUoNqf56C', '09890912', 'sak sak e', '2019-06-22', '2019-06-21 23:16:02', '2019-06-21 23:16:02');

--
-- Triggers `tb_member`
--
DELIMITER $$
CREATE TRIGGER `ADmember` AFTER DELETE ON `tb_member` FOR EACH ROW BEGIN
                   DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.username;
                END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BImember` BEFORE INSERT ON `tb_member` FOR EACH ROW BEGIN
                   INSERT INTO `tb_user` (`email`, `username`, `password` , `hakAkses` , `nohp` , `created_at`, `updated_at`) VALUES (NEW.email, NEW.username, NEW.password, 'customer' , NEW.nohp, NEW.created_at, NEW.updated_at);
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `biaya` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id`, `kota`, `biaya`) VALUES
(1, 'Sragen', 15000),
(2, 'Wonogiri', 20000),
(3, 'Sukoharjo', 10000),
(4, 'Solo', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `noTrans` int(10) UNSIGNED NOT NULL,
  `bank` enum('BCA','BNI','BRI','MANDIRI') COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlBukti` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Tunggu','Terima','Tolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `tanggal`, `noTrans`, `bank`, `urlBukti`, `status`, `created_at`, `updated_at`) VALUES
(1, '2019-07-09', 111113, 'BCA', '111113.jpg', 'Tolak', '2019-07-09 12:26:23', '2019-07-09 12:38:40'),
(2, '2019-07-10', 111114, 'BCA', '111114.jpg', 'Terima', '2019-07-09 23:21:09', '2019-07-09 23:21:34');

--
-- Triggers `tb_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `AIBayar` BEFORE INSERT ON `tb_pembayaran` FOR EACH ROW BEGIN

UPDATE tb_belanja SET tb_belanja.confirmed = '1' WHERE tb_belanja.noTrans = NEW.noTrans;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Aupembayaran` AFTER UPDATE ON `tb_pembayaran` FOR EACH ROW BEGIN

UPDATE tb_belanja SET tb_belanja.status = NEW.status WHERE tb_belanja.noTrans = NEW.noTrans;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `kdProduct` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdKategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdSatuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaJual` bigint(20) NOT NULL DEFAULT '0',
  `diskon` bigint(20) NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo` enum('Y','T') COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlFoto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`kdProduct`, `namaProduct`, `kdKategori`, `kdSatuan`, `hargaJual`, `diskon`, `qty`, `deskripsi`, `promo`, `urlFoto`, `created_at`, `updated_at`) VALUES
('KD001', 'Ayyas', 'CPL', 'PCS', 150000, 0, 5, 'Baju Couple Untuk Pasangan Pria dan Wanita', 'Y', 'ayyas.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD002', 'Bianca', 'CPL', 'PCS', 200000, 0, 2, 'Baju Couple Untuk Pasangan Pria dan Wanita', 'T', 'bianca.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD003', 'Couple Fajrina', 'CPL', 'PCS', 125000, 10, 2, 'Baju Couple Untuk Pasangan Pria dan Wanita', 'Y', 'Couple Fajrina.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD004', 'Couple Maharani', 'CPL', 'PCS', 50000, 0, 11, 'Baju Couple Untuk Pasangan Pria dan Wanita', 'Y', 'Couple Maharani.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD005', 'Funo', 'KK', 'PCS', 50000, 0, 1, 'Baju Koko Untuk Anak Laki - Laki', 'Y', 'Funo.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD006', 'Adnan', 'KK', 'PCS', 50000, 0, 1, 'Baju Koko Untuk Anak Laki - Laki', 'T', 'Adnan.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD007', 'Ahmad', 'KK', 'PCS', 50000, 0, 2, 'Baju Koko Untuk Pria Dewasa', 'Y', 'Ahmad.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD008', 'Pasha', 'KK', 'PCS', 50000, 0, 1, 'Baju Koko Untuk Anak Laki - Laki', 'Y', 'Pasha.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD009', 'Baim Koko', 'KK', 'PCS', 50000, 0, 5, 'Baju Koko Untuk Anak Laki - Laki', 'Y', 'Baim Koko.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02'),
('KD010', 'Azka jubah', 'KK', 'PCS', 50000, 0, 1, 'Baju Koko Untuk Anak Laki - Laki', 'T', 'Azka jubah.jpg', '2019-07-05 22:09:02', '2019-07-05 22:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `kdSatuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaSatuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`kdSatuan`, `namaSatuan`) VALUES
('DUS', 'DUS'),
('PCS', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakAkses` enum('customer','admin','pimpinan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `noHp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `hakAkses`, `noHp`, `created_at`, `updated_at`) VALUES
(27, 'admin', 'admin@gmail.com', '$2y$10$9IfnPYQJLO3ptKswJVSWAuWTsULwWQJL1HaIt/8jTXmGZctJHKRPu', 'admin', '089673267', '2019-06-21 01:40:16', '2019-06-21 01:40:16'),
(28, 'bagus', 'bagus@gmail.com', '$2y$10$lNyRYWVEmP8tplmIhvBB3eks0gDoaiWjCyJYY7lLAcKLRKwkK6hC.', 'customer', '089673266623', '2019-06-21 05:10:08', '2019-06-21 05:10:08'),
(29, 'ana', 'ana@gmail.com', '$2y$10$jK0QErNOAOjUS/Xk0wC2LO.3QsSPS9O29C.6k3JPDsVOXUoNqf56C', 'customer', '09890912', '2019-06-21 23:16:02', '2019-06-21 23:16:02'),
(30, 'sinta4', 'ana1@gmail.com', '$2y$10$LWnUaDM6AsR43u9JTNpIWupQhVH7C36PxvM3sD1b0huBHIO8PF4XC', 'admin', '08213012344', '2019-06-21 23:27:22', '2019-06-21 23:28:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  ADD PRIMARY KEY (`noTrans`),
  ADD KEY `tb_belanja_username_index` (`username`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kdKategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_keranjang_username_index` (`username`),
  ADD KEY `tb_keranjang_kdproduct_index` (`kdProduct`),
  ADD KEY `tb_keranjang_ibfk_1` (`noTrans`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_member_username_unique` (`username`),
  ADD UNIQUE KEY `tb_member_email_unique` (`email`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noTrans` (`noTrans`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`kdProduct`),
  ADD KEY `tb_product_kdkategori_index` (`kdKategori`),
  ADD KEY `tb_product_kdsatuan_index` (`kdSatuan`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`kdSatuan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_user_username_unique` (`username`),
  ADD UNIQUE KEY `tb_user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  MODIFY `noTrans` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111115;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  ADD CONSTRAINT `usernamebelanja_ifk` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `kdproductkeranjang_ifk` FOREIGN KEY (`kdProduct`) REFERENCES `tb_product` (`kdProduct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`noTrans`) REFERENCES `tb_belanja` (`noTrans`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usernamekeranjang_ifk` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD CONSTRAINT `usernamemember_ifk` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`noTrans`) REFERENCES `tb_belanja` (`noTrans`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `kdkategoriproduk_ifk` FOREIGN KEY (`kdKategori`) REFERENCES `tb_kategori` (`kdKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kdsatuanproduk_ifk` FOREIGN KEY (`kdSatuan`) REFERENCES `tb_satuan` (`kdSatuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
