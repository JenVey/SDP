-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 03:33 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_owl`
--
CREATE DATABASE IF NOT EXISTS `db_owl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_owl`;

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
CREATE TABLE `channel` (
  `id_channel` varchar(6) NOT NULL,
  `nama_channel` varchar(100) NOT NULL,
  `foto_channel` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel_event`
--

DROP TABLE IF EXISTS `channel_event`;
CREATE TABLE `channel_event` (
  `id_event` varchar(6) NOT NULL,
  `id_channel` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel_roomchat`
--

DROP TABLE IF EXISTS `channel_roomchat`;
CREATE TABLE `channel_roomchat` (
  `id_room` varchar(6) NOT NULL,
  `id_channel` varchar(6) NOT NULL,
  `namaroom` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel_user`
--

DROP TABLE IF EXISTS `channel_user`;
CREATE TABLE `channel_user` (
  `id_channel` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id_user1` varchar(6) NOT NULL,
  `id_user2` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id_game` varchar(6) NOT NULL,
  `nama_game` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `id_game` varchar(6) NOT NULL,
  `nama_item` text NOT NULL,
  `harga_item` decimal(8,2) NOT NULL,
  `foto_item` blob NOT NULL,
  `link_item` text NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `jumlah_item` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_komentar`
--

DROP TABLE IF EXISTS `item_komentar`;
CREATE TABLE `item_komentar` (
  `id_komentar` varchar(6) NOT NULL,
  `id_item` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_reply`
--

DROP TABLE IF EXISTS `item_reply`;
CREATE TABLE `item_reply` (
  `id_reply` varchar(6) NOT NULL,
  `id_komentar` varchar(6) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
CREATE TABLE `merchant` (
  `id_merchant` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `nama_merchant` varchar(100) NOT NULL,
  `foto_profil` blob NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_rating`
--

DROP TABLE IF EXISTS `merchant_rating`;
CREATE TABLE `merchant_rating` (
  `id_rating` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `komentar` text NOT NULL,
  `bintang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_item`
--

DROP TABLE IF EXISTS `pembelian_item`;
CREATE TABLE `pembelian_item` (
  `id_user` varchar(6) NOT NULL,
  `id_item` varchar(6) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

DROP TABLE IF EXISTS `pertandingan`;
CREATE TABLE `pertandingan` (
  `id_match` varchar(6) NOT NULL,
  `id_turnament` varchar(6) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `bagian` varchar(25) NOT NULL,
  `status` int(1) NOT NULL,
  `skor_1` int(1) NOT NULL,
  `skor_2` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan_team`
--

DROP TABLE IF EXISTS `pertandingan_team`;
CREATE TABLE `pertandingan_team` (
  `id_team` varchar(6) NOT NULL,
  `id_match` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan_user`
--

DROP TABLE IF EXISTS `pertandingan_user`;
CREATE TABLE `pertandingan_user` (
  `id_user` varchar(6) NOT NULL,
  `id_match` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `id_pesan` varchar(6) NOT NULL,
  `id_pengirim` varchar(6) NOT NULL,
  `id_penerima` varchar(6) NOT NULL,
  `tipe_penerima` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE `promo` (
  `id_promo` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `kodepromo` varchar(10) NOT NULL,
  `tanggal_aktif` date NOT NULL,
  `tanggal_kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo_katalog`
--

DROP TABLE IF EXISTS `promo_katalog`;
CREATE TABLE `promo_katalog` (
  `id_promo` varchar(6) NOT NULL,
  `id_item` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE `subscribers` (
  `id_sub` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_detail`
--

DROP TABLE IF EXISTS `subscription_detail`;
CREATE TABLE `subscription_detail` (
  `id_sub` varchar(6) NOT NULL,
  `keterangan` text NOT NULL,
  `tipe_sub` varchar(15) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id_team` varchar(6) NOT NULL,
  `nama_team` varchar(50) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
CREATE TABLE `team_members` (
  `id_user` varchar(6) NOT NULL,
  `id_team` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_reminder`
--

DROP TABLE IF EXISTS `team_reminder`;
CREATE TABLE `team_reminder` (
  `id_reminder` varchar(6) NOT NULL,
  `id_team` varchar(6) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE `tournament` (
  `id_turnament` varchar(6) NOT NULL,
  `id_channel` varchar(6) NOT NULL,
  `id_game` varchar(6) NOT NULL,
  `nama_turnament` varchar(100) NOT NULL,
  `jumlah_pemain` int(3) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `jumlah_slot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament_standing`
--

DROP TABLE IF EXISTS `tournament_standing`;
CREATE TABLE `tournament_standing` (
  `juara_1` varchar(50) NOT NULL,
  `juara_2` varchar(50) NOT NULL,
  `juara_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` varchar(6) NOT NULL,
  `nama_user` varchar(24) NOT NULL,
  `pass_user` varchar(12) NOT NULL,
  `email_user` varchar(64) NOT NULL,
  `username_user` varchar(12) NOT NULL,
  `trade_link` text NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `foto` blob NOT NULL,
  `phone` int(13) NOT NULL,
  `saldo` decimal(10,0) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `pass_user`, `email_user`, `username_user`, `trade_link`, `jenis_kelamin`, `foto`, `phone`, `saldo`, `status`) VALUES
('UM0001', 'Marvel', 'aaa', 'marvelbp30@gmail.com', 'marv', 'aa', 'L', '', 908123897, '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indexes for table `channel_event`
--
ALTER TABLE `channel_event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_channel` (`id_channel`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `channel_roomchat`
--
ALTER TABLE `channel_roomchat`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `id_channel` (`id_channel`);

--
-- Indexes for table `channel_user`
--
ALTER TABLE `channel_user`
  ADD KEY `fk_id_user1` (`id_user`),
  ADD KEY `fk_id_channel` (`id_channel`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD KEY `fk_id_friend1` (`id_user1`),
  ADD KEY `fk_id_friend2` (`id_user2`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_merchant` (`id_merchant`),
  ADD KEY `fk_id_game` (`id_game`);

--
-- Indexes for table `item_komentar`
--
ALTER TABLE `item_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `FK_item` (`id_item`),
  ADD KEY `Fk_user` (`id_user`);

--
-- Indexes for table `item_reply`
--
ALTER TABLE `item_reply`
  ADD PRIMARY KEY (`id_reply`),
  ADD KEY `FK_komentar` (`id_komentar`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `merchant_rating`
--
ALTER TABLE `merchant_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_merchant` (`id_merchant`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembelian_item`
--
ALTER TABLE `pembelian_item`
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_item` (`id_item`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `id_turnament` (`id_turnament`);

--
-- Indexes for table `pertandingan_team`
--
ALTER TABLE `pertandingan_team`
  ADD KEY `fk_id_team` (`id_team`),
  ADD KEY `fk_id_matchh` (`id_match`);

--
-- Indexes for table `pertandingan_user`
--
ALTER TABLE `pertandingan_user`
  ADD KEY `fk_id_userr` (`id_user`),
  ADD KEY `fk_id_match` (`id_match`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD UNIQUE KEY `fk_id_pengirim` (`id_pengirim`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `id_merchant` (`id_merchant`);

--
-- Indexes for table `promo_katalog`
--
ALTER TABLE `promo_katalog`
  ADD KEY `fk_id_promo` (`id_promo`) USING BTREE,
  ADD KEY `fk_id_itemm` (`id_item`) USING BTREE;

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD KEY `fk_id_sub` (`id_sub`),
  ADD KEY `fk_id_merchant` (`id_merchant`);

--
-- Indexes for table `subscription_detail`
--
ALTER TABLE `subscription_detail`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD KEY `fk_id_teamm` (`id_team`),
  ADD KEY `fk_id_userrr` (`id_user`) USING BTREE;

--
-- Indexes for table `team_reminder`
--
ALTER TABLE `team_reminder`
  ADD PRIMARY KEY (`id_reminder`),
  ADD KEY `id_team` (`id_team`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id_turnament`),
  ADD KEY `fk_id_channell` (`id_channel`),
  ADD KEY `fk_id_game1` (`id_game`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channel_event`
--
ALTER TABLE `channel_event`
  ADD CONSTRAINT `channel_event_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`),
  ADD CONSTRAINT `channel_event_userFK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `channel_roomchat`
--
ALTER TABLE `channel_roomchat`
  ADD CONSTRAINT `channel_roomchat_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`);

--
-- Constraints for table `channel_user`
--
ALTER TABLE `channel_user`
  ADD CONSTRAINT `fk_id_channel` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`),
  ADD CONSTRAINT `fk_id_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `fk_id_friend1` FOREIGN KEY (`id_user1`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_id_friend2` FOREIGN KEY (`id_user2`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_id_game` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`);

--
-- Constraints for table `item_komentar`
--
ALTER TABLE `item_komentar`
  ADD CONSTRAINT `FK_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `Fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `item_reply`
--
ALTER TABLE `item_reply`
  ADD CONSTRAINT `FK_komentar` FOREIGN KEY (`id_komentar`) REFERENCES `item_komentar` (`id_komentar`);

--
-- Constraints for table `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `merchant_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `merchant_rating`
--
ALTER TABLE `merchant_rating`
  ADD CONSTRAINT `merchant_rating_ibfk_1` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`),
  ADD CONSTRAINT `merchant_rating_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembelian_item`
--
ALTER TABLE `pembelian_item`
  ADD CONSTRAINT `fk_id_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`id_turnament`) REFERENCES `tournament` (`id_turnament`);

--
-- Constraints for table `pertandingan_team`
--
ALTER TABLE `pertandingan_team`
  ADD CONSTRAINT `fk_id_matchh` FOREIGN KEY (`id_match`) REFERENCES `pertandingan` (`id_match`),
  ADD CONSTRAINT `fk_id_team` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`);

--
-- Constraints for table `pertandingan_user`
--
ALTER TABLE `pertandingan_user`
  ADD CONSTRAINT `fk_id_match` FOREIGN KEY (`id_match`) REFERENCES `pertandingan` (`id_match`),
  ADD CONSTRAINT `fk_id_userr` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `fk_id_pengirim` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`);

--
-- Constraints for table `promo_katalog`
--
ALTER TABLE `promo_katalog`
  ADD CONSTRAINT `fk_id_itemm` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_id_promo` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`);

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `fk_id_merchant` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`),
  ADD CONSTRAINT `fk_id_sub` FOREIGN KEY (`id_sub`) REFERENCES `subscription_detail` (`id_sub`);

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `fk_id_teamm` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`),
  ADD CONSTRAINT `fk_id_userrr` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `team_reminder`
--
ALTER TABLE `team_reminder`
  ADD CONSTRAINT `team_reminder_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`);

--
-- Constraints for table `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `fk_id_channell` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`),
  ADD CONSTRAINT `fk_id_game1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
