-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 10:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_youtuber`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel_youtube`
--

CREATE TABLE `channel_youtube` (
  `id_channel_youtube` int(20) NOT NULL,
  `nama_channel_youtube` varchar(100) NOT NULL,
  `id_youtuber` int(20) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `subscriber` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `channel_youtube`
--

INSERT INTO `channel_youtube` (`id_channel_youtube`, `nama_channel_youtube`, `id_youtuber`, `kategori`, `subscriber`) VALUES
(2, 'Nihongo Mantappu', 2, 'Edukasi', 10.4),
(3, 'Tanboy Kun', 3, 'Kuliner', 18.8),
(5, 'MiawAug', 1, 'Gaming', 21.8);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(20) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `id_channel_youtube` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `email`, `phone`, `join_date`, `id_channel_youtube`) VALUES
(1, 'Daffa Fakhry Anshori', 'dfakhryanshori6@gmail.com', '081319518665', '2024-05-01', 2),
(2, 'Annisa Heriyani Putri', 'annisaheriyaniputri@gmail.com', '081246792581', '2024-05-02', 3),
(3, 'Rai Aria Yudistira', 'raiariayudistira@gmail.com', '085746791346', '2024-05-03', 5);

-- --------------------------------------------------------

--
-- Table structure for table `youtuber`
--

CREATE TABLE `youtuber` (
  `id_youtuber` int(20) NOT NULL,
  `nama_youtuber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youtuber`
--

INSERT INTO `youtuber` (`id_youtuber`, `nama_youtuber`) VALUES
(1, 'Reggie Prabowo Wongkar'),
(2, 'Jerome Polin'),
(3, 'Bara Ilham Bakti Perkasa'),
(4, 'Rivaldi Fatah'),
(6, 'Nizar Lugatio Pratama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel_youtube`
--
ALTER TABLE `channel_youtube`
  ADD PRIMARY KEY (`id_channel_youtube`),
  ADD KEY `id_pemilik` (`id_youtuber`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_youtube` (`id_channel_youtube`);

--
-- Indexes for table `youtuber`
--
ALTER TABLE `youtuber`
  ADD PRIMARY KEY (`id_youtuber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel_youtube`
--
ALTER TABLE `channel_youtube`
  MODIFY `id_channel_youtube` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `youtuber`
--
ALTER TABLE `youtuber`
  MODIFY `id_youtuber` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channel_youtube`
--
ALTER TABLE `channel_youtube`
  ADD CONSTRAINT `channel_youtube_ibfk_1` FOREIGN KEY (`id_youtuber`) REFERENCES `youtuber` (`id_youtuber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`id_channel_youtube`) REFERENCES `channel_youtube` (`id_channel_youtube`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
