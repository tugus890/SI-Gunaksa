-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 03:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbl_kelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` int(11) NOT NULL,
  `waktu_mulai` date NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` char(16) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`id_client`, `id_user`, `nik`, `nama_lengkap`, `no_telepon`, `alamat`) VALUES
(5, 3, NULL, 'Ida Bagus Pratama Surya', '', ''),
(6, 4, NULL, 'raditya', '', ''),
(7, 4, NULL, 'Anggara Radit', '', ''),
(8, 4, NULL, 'Anggara Radit', '', ''),
(9, 4, NULL, 'tugusss', '', ''),
(10, 4, NULL, 'Ida Bagus Pratama Surya', '', ''),
(11, 4, NULL, 'bagus maheswara', '', ''),
(12, 4, NULL, 'indra prasta maheswara', '', ''),
(13, 4, NULL, 'Dirgantara', '', ''),
(14, 3, NULL, 'indra prasta maheswara', '', ''),
(15, 4, NULL, 'indra prasta maheswara', '', ''),
(16, 4, NULL, 'bagus maheswara', '', ''),
(17, 4, NULL, 'UKM CATUR', '', ''),
(18, 4, NULL, 'Ida Bagus Pratama Surya', '', ''),
(19, 4, NULL, 'Ida Bagus Pratama Surya', '', ''),
(20, 4, NULL, 'Ida Bagus Pratama Surya', '', ''),
(21, 4, NULL, 'Ida Bagus Pratama Surya', '', ''),
(22, 4, NULL, 'Anggara Radit', '', ''),
(23, 4, NULL, 'Ida Bagus Pratama Surya', '', ''),
(24, 4, NULL, 'bagus maheswara', '', ''),
(25, 5, 'ddd', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(27, 5, '44444', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(29, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(31, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(32, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(33, 4, NULL, 'Ida Bagus Pratama Surya', '', ''),
(34, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(35, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(36, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(37, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221'),
(38, 5, '5105042108030002', 'Ida Bagus Pratama Surya', '0895800228335', 'Jalan Taman Giri Perum Griya Nugraha C9221\r\nJalan Taman Giri Perum Gria Nugraha C9221');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailchat`
--

CREATE TABLE `tb_detailchat` (
  `id_detailchat` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pesan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_faq`
--

CREATE TABLE `tb_faq` (
  `id_faq` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_faq`
--

INSERT INTO `tb_faq` (`id_faq`, `pertanyaan`, `jawaban`) VALUES
(1, 'siapa nama kamu??', 'widya padma'),
(2, 'siapa nama kamu??', 'nama saya tugus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyewaan`
--

CREATE TABLE `tb_penyewaan` (
  `id_sewa` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyewaan`
--

INSERT INTO `tb_penyewaan` (`id_sewa`, `id_produk`) VALUES
(4, 3),
(5, 4),
(6, 4),
(7, 6),
(9, 5),
(10, 4),
(11, 5),
(12, 5),
(13, 5),
(14, 4),
(15, 4),
(16, 3),
(17, 3),
(19, 4),
(20, 3),
(21, 6),
(22, 6),
(23, 10),
(27, 4),
(31, 3),
(32, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `foto_produk1` varchar(50) NOT NULL,
  `foto_produk2` varchar(50) NOT NULL,
  `foto_produk3` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_dp` decimal(10,2) NOT NULL,
  `harga_lunas` decimal(10,2) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `foto_produk1`, `foto_produk2`, `foto_produk3`, `nama_produk`, `harga_dp`, `harga_lunas`, `deskripsi_produk`) VALUES
(3, 'dm72ep4.png', '', '', 'Widya Padma', '50.00', '100.00', 'gedung paling luas'),
(4, 'JAS 2.png', 'WhatsApp Image 2023-06-15 at 19.29.53.jpg', '', 'Lapangan Basket', '50.00', '50.00', 'capek dan lelah'),
(5, 'Putih_HItam_Minimalis_Promosi_Makanan_Roti_Bakar_C', '', '', 'Lapangan Basket', '50.00', '50.00', 'dA'),
(6, 'WhatsApp_Image_2023-06-28_at_14_10_261.jpeg', 'logo_pnbcc.png', '', 'kolam renang', '50.00', '50.00', '8999'),
(7, 'rsz_644b63c1d55f1-removebg-preview.png', 'bg-header.jpg', 'image-removebg-preview_(13).png', 'Lapangan Sepak Bola', '25.00', '50.00', 'luas dan menarik'),
(8, '', '', '', 'Widya Padma', '25.00', '50.00', 'll'),
(9, '', '', '', 'kolam renang', '25.00', '100.00', 'kk'),
(10, '', '', '', 'Widya Padma', '25.00', '50.00', ',,'),
(11, '', '', '', 'Lapangan Basket', '25.00', '50.00', ','),
(12, '', '', '', 'kolam renang', '25.00', '50.00', '.'),
(13, '', '', '', 'Lapangan Basket', '25.00', '50.00', '.'),
(14, '', '', '', 'Lapangan Basket', '25.00', '50.00', 'l.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `id_review` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `harga_dp` decimal(10,2) NOT NULL,
  `harga_lunas` decimal(10,2) DEFAULT NULL,
  `catatan` varchar(255) NOT NULL,
  `is_verif` tinyint(1) DEFAULT NULL,
  `dok_sk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sewa`
--

INSERT INTO `tb_sewa` (`id_sewa`, `id_client`, `id_user`, `jenis_kegiatan`, `tgl_sewa`, `tgl_selesai`, `harga_dp`, `harga_lunas`, `catatan`, `is_verif`, `dok_sk`) VALUES
(4, 5, 3, 'TURU', '2023-06-29', '2023-07-01', '25000.00', '50000.00', 'luar biasa', 1, '794-1735-1-SM.pdf'),
(5, 6, 4, 'mencaci kaki', '2023-06-09', '2023-06-17', '0.00', '0.00', '', 0, ''),
(6, 7, 4, 'TURU', '2023-06-17', '2023-06-10', '0.00', '0.00', '', 1, 'IDN55808_IDN5.pdf'),
(7, 8, 4, 'mencaci kaki', '2023-06-08', '2023-06-16', '0.00', '0.00', '', 0, NULL),
(8, 9, 4, 'mencaci kaki', '2023-06-24', '2023-06-09', '0.00', '0.00', '', NULL, NULL),
(9, 10, 4, 'mencari muka', '2023-06-17', '2023-06-17', '0.00', '0.00', '', 0, NULL),
(10, 11, 4, 'semedi', '2023-06-16', '2023-06-15', '0.00', '0.00', '', 1, 'IDN55808_IDN7.pdf'),
(11, 12, 4, 'mencari kitab suci', '2023-06-30', '2023-06-30', '0.00', '0.00', '', 1, 'IDN55808_IDN6.pdf'),
(12, 13, 4, 'basket cup', '2023-06-15', '2023-06-08', '0.00', '0.00', '', 1, 'IDN55808_IDN8.pdf'),
(13, 14, 3, 'mencari kitab suci', '2023-06-15', '2023-06-09', '0.00', '0.00', '', NULL, '2feeb95ae82b983bf651c8323251c58b1.pdf'),
(14, 15, 4, 'TURU', '2023-06-16', '2023-06-08', '0.00', '0.00', '', 1, NULL),
(15, 16, 4, 'mencari muka', '2023-06-07', '2023-06-14', '0.00', '0.00', '', 1, 'IDN55808_IDN9.pdf'),
(16, 17, 4, 'TURU', '2023-07-08', '2023-07-06', '50000.00', '50000.00', '', 1, '1312-Article_Text-1694-2498-10-20170330_(1).pdf'),
(17, 18, 4, 'TURU', '2023-07-07', '2023-07-21', '0.00', NULL, '', 1, '2feeb95ae82b983bf651c8323251c58b.pdf'),
(18, 19, 4, 'mencaci kaki', '2023-06-30', '2023-07-13', '0.00', NULL, '', NULL, NULL),
(19, 20, 4, 'mencaci kaki', '2023-06-30', '2023-07-22', '0.00', NULL, '', NULL, 'Ida_Bagus_Pratama_Surya_SCM.pdf'),
(20, 21, 4, 'TURU', '2023-07-01', '2023-07-18', '0.00', NULL, '', NULL, NULL),
(21, 22, 4, 'mencaci kaki', '2023-07-01', '2023-07-06', '0.00', NULL, '', NULL, 'internal'),
(22, 23, 4, 'mencari muka', '2023-06-30', '2023-06-30', '0.00', NULL, '', 1, 'internal'),
(23, 24, 4, 'mencaci kaki', '2023-07-08', '2023-07-13', '0.00', NULL, '', 1, 'internal'),
(24, 29, 5, 'TURU', '2023-06-29', '2023-07-13', '0.00', NULL, 'jjj', NULL, NULL),
(25, 31, 5, 'mencaci kaki', '2023-07-20', '2023-07-21', '0.00', NULL, 'fff', NULL, NULL),
(26, 32, 5, 'dd', '2023-07-06', '2023-07-11', '0.00', NULL, 'c', NULL, NULL),
(27, 33, 4, 'jj', '2023-06-30', '2023-06-29', '0.00', NULL, '', 1, 'internal'),
(28, 34, 5, 'mencaci kaki', '2023-07-22', '2023-07-11', '0.00', NULL, 'cc', NULL, NULL),
(29, 35, 5, 'mencaci kaki', '2023-07-22', '2023-07-11', '0.00', NULL, 'cc', NULL, NULL),
(30, 36, 5, 'mencaci kaki', '2023-07-22', '2023-07-11', '0.00', NULL, 'cc', NULL, NULL),
(31, 37, 5, 'mencaci kaki', '2023-07-22', '2023-07-11', '0.00', NULL, 'cc', NULL, NULL),
(32, 38, 5, 'f', '2023-07-13', '2023-07-11', '0.00', NULL, 'f', 1, 'editorjptm,+64-70+013+2020_(2).pdf'),
(33, 5, 5, 's', '2023-05-03', '2023-06-29', '50.00', NULL, 'd', NULL, NULL),
(34, 14, 5, 'd', '2023-05-03', '2023-06-29', '50.00', NULL, 'd', NULL, NULL),
(35, 11, 3, 's', '2023-05-04', '2023-06-29', '50.00', '50000.00', 'ddd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `pilihan_pembayaran` varchar(10) NOT NULL,
  `nominal` decimal(10,3) NOT NULL,
  `bukti_pembayaran` varchar(50) DEFAULT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `is_valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_sewa`, `id_client`, `pilihan_pembayaran`, `nominal`, `bukti_pembayaran`, `tgl_transaksi`, `is_valid`) VALUES
(10, 4, 5, 'DP', '50.000', '1.png', '2023-06-30 09:01:49', 1),
(11, 16, 17, 'DP', '50.000', '3.png', '2023-07-04 04:50:40', 1),
(12, 15, 16, '0', '0.000', '0', '0000-00-00 00:00:00', 1),
(13, 12, 13, '0', '0.000', '0', '0000-00-00 00:00:00', 1),
(14, 11, 12, '0', '0.000', '0', '0000-00-00 00:00:00', 1),
(15, 10, 11, '0', '0.000', '0', '2023-07-17 16:05:28', 1),
(17, 19, 20, '', '0.000', NULL, '0000-00-00 00:00:00', 1),
(18, 20, 21, '0', '0.000', '0', '2023-07-18 09:44:04', 1),
(19, 21, 22, '0', '0.000', '0', '2023-07-18 09:48:01', 1),
(20, 22, 23, '0', '0.000', '0', '2023-07-18 09:49:13', 1),
(21, 23, 24, '0', '0.000', NULL, '2023-07-18 11:39:13', 1),
(22, 27, 33, '0', '0.000', NULL, '2023-07-20 10:54:33', 1),
(23, 28, 34, 'DP', '50.000', 'WhatsApp_Image_2023-07-20_at_22_10_28.jpg', '2023-07-21 03:05:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `role`) VALUES
(3, 'IDA BAGUS PRATAMA SURYA', 'tugus890@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '1'),
(4, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1'),
(5, 'ANGGARA', 'admin@gmail.com', '91ec1f9324753048c0096d036a694f86', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `fk_chat_user1_idx` (`id_user1`),
  ADD KEY `fk_chat_user2_idx` (`id_user2`);

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `fk_client_user_idx` (`id_user`);

--
-- Indexes for table `tb_detailchat`
--
ALTER TABLE `tb_detailchat`
  ADD PRIMARY KEY (`id_detailchat`),
  ADD KEY `fk_dc_chat_idx` (`id_chat`),
  ADD KEY `fk_dc_user_idx` (`id_user`);

--
-- Indexes for table `tb_faq`
--
ALTER TABLE `tb_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_jadwal_sewa_idx` (`id_sewa`);

--
-- Indexes for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD KEY `fk_penyewaan_sewa_idx` (`id_sewa`),
  ADD KEY `fk_penyewaan_produk_idx` (`id_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `fk_review_sewa_idx` (`id_sewa`);

--
-- Indexes for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `fk_sewa_client_idx` (`id_client`),
  ADD KEY `fk_sewa_useradm_idx` (`id_user`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_sewa_idx` (`id_sewa`),
  ADD KEY `fk_transaksi_client_idx` (`id_client`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_detailchat`
--
ALTER TABLE `tb_detailchat`
  MODIFY `id_detailchat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_faq`
--
ALTER TABLE `tb_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `fk_chat_user1` FOREIGN KEY (`id_user1`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chat_user2` FOREIGN KEY (`id_user2`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD CONSTRAINT `fk_client_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_detailchat`
--
ALTER TABLE `tb_detailchat`
  ADD CONSTRAINT `fk_dc_chat` FOREIGN KEY (`id_chat`) REFERENCES `tb_chat` (`id_chat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dc_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `fk_jadwal_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `tb_sewa` (`id_sewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD CONSTRAINT `fk_penyewaan_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penyewaan_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `tb_sewa` (`id_sewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `fk_review_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `tb_sewa` (`id_sewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD CONSTRAINT `fk_sewa_client` FOREIGN KEY (`id_client`) REFERENCES `tb_client` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sewa_useradm` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_transaksi_client` FOREIGN KEY (`id_client`) REFERENCES `tb_client` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `tb_sewa` (`id_sewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
