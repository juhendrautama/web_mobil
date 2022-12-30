-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2022 at 04:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_user`
--

CREATE TABLE `a_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','operator') DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `a_user`
--

INSERT INTO `a_user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`, `foto`) VALUES
(3, 'Administrator', 'super', '202cb962ac59075b964b07152d234b70', 'admin', 'user_1671438013.jpg'),
(4, 'STAFF', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_mobil`
--

CREATE TABLE `gambar_mobil` (
  `id_gambar` int(11) NOT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `cover` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `gambar_mobil`
--

INSERT INTO `gambar_mobil` (`id_gambar`, `id_mobil`, `id_warna`, `gambar`, `cover`) VALUES
(44, 17, NULL, 'mobil_1659064812.png', '1'),
(45, 17, NULL, 'mobil_16590648121.png', '0'),
(46, 17, NULL, 'mobil_16590648122.png', '0'),
(47, 16, NULL, 'mobil_1659065083.png', '1'),
(48, 16, NULL, 'mobil_1659065083.jpeg', '0'),
(49, 16, NULL, 'mobil_16590650831.png', '0'),
(52, 20, NULL, 'mobil_1671426984.jpg', '1'),
(53, 21, NULL, 'mobil_1671436995.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi_kami`
--

CREATE TABLE `hubungi_kami` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `pesan` text,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id_hubungi`, `nama`, `email`, `judul`, `pesan`, `create_at`, `update_at`) VALUES
(260, 'sindi', 'sindisri35@gmail.com', 'Mobil Ayla', 'saya ingin membeli mobil terbaru yang ada di showroom ini', '2022-08-11 20:12:26', '2022-12-08 11:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama_konsumen` varchar(255) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `no_telp`, `alamat`) VALUES
(1, 'Nova', '082345588342', 'Jambi'),
(2, 'rusmania', '082345588342', 'jambi');

-- --------------------------------------------------------

--
-- Table structure for table `minat`
--

CREATE TABLE `minat` (
  `id_minat` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `alamat` text,
  `id_mobil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `minat`
--

INSERT INTO `minat` (`id_minat`, `nama`, `no_telp`, `alamat`, `id_mobil`) VALUES
(5, 'Rusma', '0895619805285', 'Sebrang', 16);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `harga` int(11) DEFAULT NULL,
  `stok_awal` int(100) NOT NULL,
  `stok_keluar` int(100) NOT NULL,
  `tampil_depan` enum('1','0') DEFAULT '0',
  `id_series` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_warna` text,
  `kecepatan` varchar(50) DEFAULT NULL,
  `transisi` varchar(50) DEFAULT NULL,
  `bahan_bakar` varchar(50) DEFAULT NULL,
  `kapasitas_bahan_bakar` varchar(50) DEFAULT NULL,
  `fitur_lain` text,
  `brosur` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '0',
  `crete_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `judul`, `deskripsi`, `harga`, `stok_awal`, `stok_keluar`, `tampil_depan`, `id_series`, `id_type`, `id_warna`, `kecepatan`, `transisi`, `bahan_bakar`, `kapasitas_bahan_bakar`, `fitur_lain`, `brosur`, `status`, `crete_at`, `update_at`, `no_urut`) VALUES
(16, 'AYLA', '<p>Daihatsu Ayla 2018 adalah 5 Seater Hatchback yang tersedia dalam daftar harga Rp 102,15 - Rp 159,9 Juta di Indonesia. Ini tersedia dalam 7 warna, 12 varian, 2 pilihan mesin, dan 2 opsi transmisi: Manual dan Otomatis di Indonesia. Mobil ini memiliki ground clearance 180 mm dengan dimensi sebagai berikut: 3660 mm L x 1600 mm W x 1520 mm H. Lebih dari 116 pengguna telah memberikan penilaian untuk Ayla berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Daihatsu Ayla hadir dengan interior yang elegant dan memiliki fitur-fitur canggih di dalamnya. Nikmati dan rasakan fiturnya.</p>', 140000000, 10, 0, '1', 2, 36, '1,2,3,4,5,6,7', '65/6.000', 'AUTOMATIC', 'BENSIN', '33 Liter', '14\'\' ALLOY WHEEL DESIGN,FRONT & REAR AEROKIT,FRONT BUMPER DESIGN,ALARM INTEGRATED KEY', 'brosur_1607051714.pdf', '1', NULL, '2022-07-29 10:31:52', 1),
(17, 'SIGRA', '<p>Daihatsu Sigra tersedia dalam pilihan mesin Bensin di Indonesia MPV baru dari Daihatsu hadir dalam 20 varian. Bicara soal spesifikasi mesin Daihatsu Sigra, ini ditenagai dua pilihan mesin Bensin berkapasitas 1197 cc. Sigra tersedia dengan transmisi Manual and Otomatis tergantung variannya. Sigra adalah MPV 7 seater dengan panjang 4070 mm, lebar 1655 mm, wheelbase 2525 mm. serta ground clearance 180 mm.</p>', 135000000, 5, 0, '1', 2, 3, '2,3,4,5,6,7,8', '67/6000', 'AUTOMATIC', 'BENSIN', '36 Liter', '1 TOUCH TUMBLE,MULTI INFORMATION DISPLAY,SMART PHONE POCKET,NEW 2Din TOUCHSCREEN AUDIO', 'brosur_1607052950.pdf', '1', NULL, '2022-12-19 14:52:00', 2),
(20, 'hendra', '<p>adsad adassd</p>', 2000000, 5, 0, '1', 2, 6, '4,5,6', '67/6000', 'AUTOMATIC', 'BENSIN', '36 Liter', 'a,c,s,v', 'brosur_1671426983.xlsx', '1', '2022-12-19 12:16:24', '2022-12-19 14:52:15', NULL),
(21, 'ani', '<p>aaaaaaa</p>', 1000000000, 4, 4, '1', 3, 5, '4', '67/6000', 'AUTOMATIC', 'BENSIN', '36 Liter', 'aaa,dddd', 'brosur_1671436995.xlsx', '1', '2022-12-19 15:03:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_transaksi` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `tipe_pembayaran` varchar(20) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_transaksi`, `tanggal`, `id_konsumen`, `tipe_pembayaran`, `id_mobil`, `created_at`, `user_at`) VALUES
(1, 'TRX290720221108', '2022-07-29', 1, 'Cash', 17, '2022-07-29 11:08:28', 4),
(2, 'TRX081220221106', '2022-12-08', 2, 'Cash', 16, '2022-12-08 11:06:15', 4),
(3, 'TRX290720221109', '2022-07-29', 1, 'Cash', 17, '2022-07-29 12:08:28', 4);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id_series` int(11) NOT NULL,
  `series` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id_series`, `series`) VALUES
(1, 'TOYOTA'),
(2, 'DAIHATSU'),
(3, 'HONDA');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '0',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `image`, `status`, `create_at`, `update_at`) VALUES
(4, 'slide_1659064306.png', '0', NULL, NULL),
(5, 'slide_1659064270.jpeg', '0', NULL, NULL),
(6, 'slide_1659064253.png', '0', NULL, NULL),
(7, 'slide_1671440263.jpg', '1', NULL, NULL),
(8, 'slide_1671589345.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(2, '1.2 R AT'),
(3, '1.2 R AT DLX'),
(4, 'R AT 1.5 DLX'),
(5, 'R MT 1.5 DLX'),
(6, 'R AT CUSTOM'),
(7, 'R MT CUSTOM'),
(8, 'STD AT'),
(9, 'STD MT'),
(10, '1.5 X A/T'),
(11, '1.5 X M/T'),
(12, 'MB 1.5 D PS'),
(13, 'MB 1.3 D FF'),
(14, 'MB 1.3 D'),
(15, 'PU AC PS BOX 1.5 PT'),
(16, 'PU AC PS 1.5'),
(17, 'PU 1.5 3W'),
(18, 'PU BOX 1.5 PT'),
(19, 'PU 1.5 STD'),
(20, 'PU 1.3 3W'),
(21, 'PU BOX 1.3 PT'),
(22, 'PU 1.3 STD'),
(23, '1.2 R DELUXE AT'),
(24, '1.0 X AT'),
(25, '1.0 X DELUXE AT'),
(26, '1.2 X MT'),
(28, '1.2 R DELUXE MT'),
(29, '1.0 X MT'),
(30, '1.0 X DELUXE MT'),
(31, '1.0 D+ MT'),
(32, '1.0 D MT'),
(33, '1.2 R MT DLX'),
(34, '1.2 R MT'),
(35, '1.2 X AT DLX'),
(36, '1.2 X AT'),
(37, '1.0 M MT'),
(39, '1.2 X MT DLX'),
(41, 'R AT 1.3 DLX'),
(43, 'R AT 1.3 STD'),
(44, 'R MT 1.3 DLX'),
(45, 'R MT 1.3 STD'),
(46, 'X AT 1.3 DLX'),
(47, 'X AT 1.3 STD'),
(48, 'X MT 1.3 DLX'),
(49, 'X MT 1.3 STD'),
(50, 'R AT DLX'),
(51, 'R AT'),
(52, 'R MT DLX'),
(53, 'R MT'),
(54, 'X AT DLX'),
(55, 'X MT DLX'),
(56, 'X MT'),
(57, '1.5 D M/T');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `kode_warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `warna`, `kode_warna`) VALUES
(1, 'YELLOW METALLIC', '#f2f605'),
(2, 'GLITTERING SILVER', '#d8d8d3'),
(3, 'ICY WHITE SOLID', '#fbf8f8'),
(4, 'RED SOLID', '#e91f06'),
(5, 'ORANGE METALLIC', '#6d4708'),
(6, 'DARK GREY METALLIC', '#8f8f8d'),
(7, 'ULTRA BLACK SOLID', '#1c1b1b'),
(8, 'BRONZE METALLIC', '#6d4708'),
(9, 'GLITTERING SILVER METALLIC', '#d8d8d3'),
(10, 'MIDNIGHT BLACK METALLIC', '#000208'),
(11, 'ICY WHITE', '#fbf8f8'),
(12, 'CLASSIC SILVER METALLIC', '#c0c0c0'),
(13, 'NEW DARK RED METALLIC', '#b5001a'),
(14, 'NEW BRONZE METALLIC', '#4f2306'),
(15, 'NEW DARK BLUE', '#072387'),
(16, 'NEW PEARL WHITE', '#f5f5f5'),
(17, 'CLASSIC SILVER', '#d8d8d3'),
(18, 'PURPLE METALLIC', '#0a0258'),
(19, 'SCARLET RED METALLIC', '#8d0604'),
(20, 'LAVA RED', '#e91f06'),
(21, 'ELECTRIC BLUE METALLIC', '#0259e8'),
(22, 'SONIC BLUE METALLIC', '#17569b'),
(23, 'ULTRA BLACK', '#1c1b1b'),
(24, 'BLACK METALLIC', '#000000'),
(25, 'GRANITE GREY METALLIC', '#8f8f8d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_user`
--
ALTER TABLE `a_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indexes for table `gambar_mobil`
--
ALTER TABLE `gambar_mobil`
  ADD PRIMARY KEY (`id_gambar`) USING BTREE;

--
-- Indexes for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD PRIMARY KEY (`id_hubungi`) USING BTREE;

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`) USING BTREE;

--
-- Indexes for table `minat`
--
ALTER TABLE `minat`
  ADD PRIMARY KEY (`id_minat`) USING BTREE;

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`) USING BTREE;

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`) USING BTREE;

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_series`) USING BTREE;

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`) USING BTREE;

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_user`
--
ALTER TABLE `a_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gambar_mobil`
--
ALTER TABLE `gambar_mobil`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `minat`
--
ALTER TABLE `minat`
  MODIFY `id_minat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id_series` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
