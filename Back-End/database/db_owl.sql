-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 10:05 AM
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
-- Table structure for table `berisi`
--

DROP TABLE IF EXISTS `berisi`;
CREATE TABLE `berisi` (
  `id_room` varchar(6) NOT NULL,
  `id_pesan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berlaku_untuk`
--

DROP TABLE IF EXISTS `berlaku_untuk`;
CREATE TABLE `berlaku_untuk` (
  `id_promo` varchar(6) NOT NULL,
  `id_item` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berlangganan`
--

DROP TABLE IF EXISTS `berlangganan`;
CREATE TABLE `berlangganan` (
  `id_sub` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berpartisipasi`
--

DROP TABLE IF EXISTS `berpartisipasi`;
CREATE TABLE `berpartisipasi` (
  `id_user` varchar(6) NOT NULL,
  `id_match` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
CREATE TABLE `channel` (
  `id_channel` varchar(6) NOT NULL,
  `nama_channel` varchar(100) NOT NULL,
  `foto_channel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_user` varchar(6) NOT NULL,
  `nama_user` text NOT NULL,
  `pass_user` text NOT NULL,
  `email_user` text NOT NULL,
  `nickname_user` text NOT NULL,
  `trade_link` text NOT NULL,
  `foto` text NOT NULL,
  `saldo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diikuti`
--

DROP TABLE IF EXISTS `diikuti`;
CREATE TABLE `diikuti` (
  `id_channel` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventtab`
--

DROP TABLE IF EXISTS `eventtab`;
CREATE TABLE `eventtab` (
  `id_event` varchar(6) NOT NULL,
  `id_channel` varchar(6) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `foto` text NOT NULL
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
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `nama_item` text NOT NULL,
  `harga_item` decimal(8,2) NOT NULL,
  `foto_item` text NOT NULL,
  `link_item` text NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `jenis_game` text NOT NULL,
  `jumlah_item` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mengikuti`
--

DROP TABLE IF EXISTS `mengikuti`;
CREATE TABLE `mengikuti` (
  `id_team` varchar(6) NOT NULL,
  `id_match` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menjadi_bagian`
--

DROP TABLE IF EXISTS `menjadi_bagian`;
CREATE TABLE `menjadi_bagian` (
  `id_user` varchar(6) NOT NULL,
  `id_team` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menyimpan`
--

DROP TABLE IF EXISTS `menyimpan`;
CREATE TABLE `menyimpan` (
  `id_pengirim` varchar(6) NOT NULL,
  `id_pesan` varchar(6) NOT NULL,
  `id_penerima` varchar(6) NOT NULL
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
  `foto_profil` text NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

DROP TABLE IF EXISTS `orderan`;
CREATE TABLE `orderan` (
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
  `bagian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `id_pesan` varchar(6) NOT NULL,
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
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id_rating` varchar(6) NOT NULL,
  `id_merchant` varchar(6) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `komentar` text NOT NULL,
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
  `keterangan` text NOT NULL
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
  `keterangan` text NOT NULL,
  `tipe_sub` varchar(15) NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE `tournament` (
  `id_turnament` varchar(6) NOT NULL,
  `id_channel` varchar(6) NOT NULL,
  `nama_turnament` varchar(100) NOT NULL,
  `jenis_game` varchar(50) NOT NULL,
  `jumlah_pemain` int(2) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `foto_bg` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berisi`
--
ALTER TABLE `berisi`
  ADD KEY `fk_id_room` (`id_room`),
  ADD KEY `fk_id_pesann` (`id_pesan`);

--
-- Indexes for table `berlaku_untuk`
--
ALTER TABLE `berlaku_untuk`
  ADD KEY `fk_id_promo` (`id_promo`) USING BTREE,
  ADD KEY `fk_id_itemm` (`id_item`) USING BTREE;

--
-- Indexes for table `berlangganan`
--
ALTER TABLE `berlangganan`
  ADD KEY `fk_id_sub` (`id_sub`),
  ADD KEY `fk_id_merchant` (`id_merchant`);

--
-- Indexes for table `berpartisipasi`
--
ALTER TABLE `berpartisipasi`
  ADD KEY `fk_id_userr` (`id_user`),
  ADD KEY `fk_id_match` (`id_match`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `diikuti`
--
ALTER TABLE `diikuti`
  ADD KEY `fk_id_user1` (`id_user`),
  ADD KEY `fk_id_channel` (`id_channel`);

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
-- Indexes for table `mengikuti`
--
ALTER TABLE `mengikuti`
  ADD KEY `fk_id_team` (`id_team`),
  ADD KEY `fk_id_matchh` (`id_match`);

--
-- Indexes for table `menjadi_bagian`
--
ALTER TABLE `menjadi_bagian`
  ADD KEY `fk_id_teamm` (`id_team`),
  ADD KEY `fk_id_userrr` (`id_user`) USING BTREE;

--
-- Indexes for table `menyimpan`
--
ALTER TABLE `menyimpan`
  ADD PRIMARY KEY (`id_penerima`),
  ADD KEY `fk_id_pesan` (`id_pesan`),
  ADD KEY `fk_id_userrrr` (`id_pengirim`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_item` (`id_item`);

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
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id_turnament`),
  ADD KEY `fk_id_channell` (`id_channel`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berisi`
--
ALTER TABLE `berisi`
  ADD CONSTRAINT `fk_id_pesann` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`),
  ADD CONSTRAINT `fk_id_room` FOREIGN KEY (`id_room`) REFERENCES `roomchat` (`id_room`);

--
-- Constraints for table `berlaku_untuk`
--
ALTER TABLE `berlaku_untuk`
  ADD CONSTRAINT `fk_id_itemm` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_id_promo` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`);

--
-- Constraints for table `berlangganan`
--
ALTER TABLE `berlangganan`
  ADD CONSTRAINT `fk_id_merchant` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`),
  ADD CONSTRAINT `fk_id_sub` FOREIGN KEY (`id_sub`) REFERENCES `subscription` (`id_sub`);

--
-- Constraints for table `berpartisipasi`
--
ALTER TABLE `berpartisipasi`
  ADD CONSTRAINT `fk_id_match` FOREIGN KEY (`id_match`) REFERENCES `pertandingan` (`id_match`),
  ADD CONSTRAINT `fk_id_userr` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `diikuti`
--
ALTER TABLE `diikuti`
  ADD CONSTRAINT `fk_id_channel` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`),
  ADD CONSTRAINT `fk_id_user1` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `eventtab`
--
ALTER TABLE `eventtab`
  ADD CONSTRAINT `eventtab_ibfk_1` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`id_merchant`) REFERENCES `merchant` (`id_merchant`);

--
-- Constraints for table `mengikuti`
--
ALTER TABLE `mengikuti`
  ADD CONSTRAINT `fk_id_matchh` FOREIGN KEY (`id_match`) REFERENCES `pertandingan` (`id_match`),
  ADD CONSTRAINT `fk_id_team` FOREIGN KEY (`id_team`) REFERENCES `gamingteam` (`id_team`);

--
-- Constraints for table `menjadi_bagian`
--
ALTER TABLE `menjadi_bagian`
  ADD CONSTRAINT `fk_id_teamm` FOREIGN KEY (`id_team`) REFERENCES `gamingteam` (`id_team`),
  ADD CONSTRAINT `fk_id_userrr` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `menyimpan`
--
ALTER TABLE `menyimpan`
  ADD CONSTRAINT `fk_id_pesan` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`),
  ADD CONSTRAINT `fk_id_userrrr` FOREIGN KEY (`id_pengirim`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `merchant`
--
ALTER TABLE `merchant`
  ADD CONSTRAINT `merchant_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Constraints for table `orderan`
--
ALTER TABLE `orderan`
  ADD CONSTRAINT `fk_id_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

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
-- Constraints for table `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `fk_id_channell` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
