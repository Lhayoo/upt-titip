-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 04:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` char(20) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok` int(20) NOT NULL,
  `rak_id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `penulis`, `pengarang`, `penerbit`, `tahun_terbit`, `stok`, `rak_id`, `cover`, `created_at`) VALUES
(21, '62b500860e4f8', 'asd', 'sdfses', 'sdf', 'dfs', 0000, 12, 2, 'Screenshot (229).png', '2022-06-24 00:54:15'),
(24, '62b50b2218e46', 'asdsd', 'sad', 'asd', 'asd', 0000, 1212, 2, 'Screenshot (234).png', '2022-06-24 00:53:54'),
(25, '62b6bb3f0c4a6', 'penulisan buku 1', 'penulisan buku 2', 'penulisan buku 1', 'penulisan buku 1', 2000, 22, 6, 'Harry_potter_deathly_hallows_US.jpg', '2022-06-26 08:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `denda` bigint(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id`, `users_id`, `transaksi_id`, `denda`, `tanggal`) VALUES
(28, 5, 10, 16000, '2022-06-26'),
(29, 5, 12, 8000, '2022-06-26'),
(31, 2, 7, 4000, '2022-06-26'),
(32, 2, 8, 4000, '2022-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` int(11) NOT NULL,
  `rak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `rak`) VALUES
(2, 'rak 1'),
(6, 'rak 5');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_transaksi` char(10) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('pinjam','kembali','telat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `buku_id`, `users_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(6, '121_62b637', 24, 2, '2022-06-25', '2022-06-22', 'kembali'),
(7, '121_62b638', 21, 2, '2022-06-25', '2022-06-24', 'telat'),
(8, '121_62b639', 21, 2, '2022-06-24', '2022-06-24', 'telat'),
(9, '121_62b640', 24, 2, '2022-06-25', '2022-06-23', 'kembali'),
(10, 'use_62b64b', 24, 5, '2022-06-25', '2022-06-18', 'telat'),
(11, 'use_62b66f', 24, 5, '2022-06-27', '2022-06-30', 'pinjam'),
(12, 'use_62b672', 21, 5, '2022-06-25', '2022-06-22', 'telat'),
(13, 'user2_62b6', 21, 5, '2022-06-25', '2022-06-27', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','anggota') NOT NULL,
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `last_login`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '2022-06-26'),
(2, 'user', '1212', 'user', 'anggota', '2022-06-26'),
(5, 'bon122', 'user2', '1', 'anggota', '2022-06-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rak_id` (`rak_id`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`);

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `denda_ibfk_2` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
