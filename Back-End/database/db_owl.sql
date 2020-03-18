-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 01:02 PM
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
  `id_user` varchar(6) NOT NULL,
  `nama_channel` varchar(20) NOT NULL,
  `foto_channel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id_cart` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  'id_item' varchar(6) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chatuser`
--

DROP TABLE IF EXISTS `chatuser`;
CREATE TABLE `chatuser` (
  `id_pengirim` varchar(6) NOT NULL,
  `id_pesan` varchar(6) NOT NULL,
  `id_penerima` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` varchar(6) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `pass_user` varchar(25) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `nickname_user` varchar(30) NOT NULL,
  `trade_link` varchar(100) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `saldo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventtab`
--

DROP TABLE IF EXISTS `eventtab`;
CREATE TABLE `eventtab` (
  `id_event` varchar(6) NOT NULL,
  `id_channel` varchar(6) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gamingteam`
--

DROP TABLE IF EXISTS `gamingteam`;
CREATE TABLE `gamingteam` (
  `id_team` varchar(6) NOT NULL,
  `nama_team` varchar(20) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `bio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `nama_item` varchar(20) NOT NULL,
  `harga_item` decimal(8,2) NOT NULL,
  `foto_item` varchar(25) NOT NULL,
  `link_item` varchar(25) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `jenis_game` varchar(20) NOT NULL,
  `jumlah_item` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
CREATE TABLE `merchant` (
  `id_merchant` varchar(6) NOT NULL,
  `id_sub` varchar(6),
  `id_user` varchar(6) NOT NULL,
  `nama_merchant` varchar(20) NOT NULL,
  `foto_profil` varchar(20),
  `bio` varchar(25)
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
  `bagian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `id_pesan` varchar(6) NOT NULL,
  `pesan` varchar(100) NOT NULL,
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
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id_rating` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `bintang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

DROP TABLE IF EXISTS `reminder`;
CREATE TABLE `reminder` (
  `id_reminder` varchar(6) NOT NULL,
  `id_team` varchar(6) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roomchat`
--

DROP TABLE IF EXISTS `roomchat`;
CREATE TABLE `roomchat` (
  `id_room` varchar(6) NOT NULL,
  `id_channel` varchar(6) NOT NULL,
  `namaroom` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE `subscription` (
  `id_sub` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `banner` varchar(25) NOT NULL,
  `tipe_sub` varchar(15) NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teammatch`
--

DROP TABLE IF EXISTS `teammatch`;
CREATE TABLE `teammatch` (
  `id_team2` varchar(12) NOT NULL,
  `id_team` varchar(6) NOT NULL,
  `id_match` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE `tournament` (
  `id_turnament` varchar(6) NOT NULL,
  `nama_turnament` varchar(20) NOT NULL,
  `jenis_game` varchar(20) NOT NULL,
  `jumlah_pemain` int(2) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `foto_bg` varchar(30) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);
  ADD KEY 'id_item' (`id_item`),

--
-- Indexes for table `chatuser`
--
ALTER TABLE `chatuser`
  ADD PRIMARY KEY (`id_pengirim`,`id_pesan`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `eventtab`
--
ALTER TABLE `eventtab`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_channel` (`id_channel`);

--
-- Indexes for table `gamingteam`
--
ALTER TABLE `gamingteam`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_merchant` (`id_merchant`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`),
  ADD KEY `id_sub` (`id_sub`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `id_turnament` (`id_turnament`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `id_merchant` (`id_merchant`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_merchant` (`id_merchant`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id_reminder`),
  ADD KEY `id_team` (`id_team`);

--
-- Indexes for table `roomchat`
--
ALTER TABLE `roomchat`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `id_channel` (`id_channel`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_merchant` (`id_merchant`);

--
-- Indexes for table `teammatch`
--
ALTER TABLE `teammatch`
  ADD PRIMARY KEY (`id_team`,`id_match`),
  ADD KEY `id_match` (`id_match`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id_turnament`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `chart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `chatuser`
--
ALTER TABLE `chatuser`
  ADD CONSTRAINT `chatuser_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`);

--
-- Constraints for table `eventtab`
--
ALTER TABLE `eventtab`
  ADD CONSTRAINT `eventtab_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`);

--
-- Constraints for table `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `merchant_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `subscription` (`id_sub`),
  ADD CONSTRAINT `merchant_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`id_turnament`) REFERENCES `tournament` (`id_turnament`);

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `gamingteam` (`id_team`);

--
-- Constraints for table `roomchat`
--
ALTER TABLE `roomchat`
  ADD CONSTRAINT `roomchat_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`);

--
-- Constraints for table `teammatch`
--
ALTER TABLE `teammatch`
  ADD CONSTRAINT `teammatch_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `gamingteam` (`id_team`),
  ADD CONSTRAINT `teammatch_ibfk_2` FOREIGN KEY (`id_match`) REFERENCES `pertandingan` (`id_match`),
  ADD CONSTRAINT `teammatch_ibfk_3` FOREIGN KEY (`id_team`) REFERENCES `gamingteam` (`id_team`),
  ADD CONSTRAINT `teammatch_ibfk_4` FOREIGN KEY (`id_team`) REFERENCES `gamingteam` (`id_team`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
