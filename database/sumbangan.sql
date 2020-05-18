-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2020 at 05:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integratif`
--

-- --------------------------------------------------------

--
-- Table structure for table `sumbangan`
--

CREATE TABLE `sumbangan` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumbangan`
--

INSERT INTO `sumbangan` (`id`, `userid`, `jenis`, `jumlah`) VALUES
(15, 27, 1, 100),
(16, 27, 3, 10),
(17, 28, 4, 10),
(18, 29, 5, 1),
(19, 30, 5, 1),
(20, 31, 2, 10000),
(21, 31, 6, 21),
(22, 31, 4, 30),
(23, 31, 5, 12),
(24, 32, 2, 20000),
(25, 32, 1, 1),
(26, 32, 3, 20),
(27, 32, 4, 12),
(28, 32, 7, 200),
(29, 35, 2, 200000),
(30, 37, 8, 1),
(31, 38, 1, 12),
(32, 39, 9, 0),
(33, 41, 1, 123),
(34, 42, 10, 123),
(35, 43, 10, 123),
(36, 44, 1, 12),
(37, 45, 1, 12),
(38, 45, 1, 12),
(39, 46, 1, 12),
(40, 47, 1, 12),
(41, 48, 5, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis` (`jenis`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sumbangan`
--
ALTER TABLE `sumbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD CONSTRAINT `sumbangan_ibfk_1` FOREIGN KEY (`jenis`) REFERENCES `jenis_sumbangan` (`id`),
  ADD CONSTRAINT `sumbangan_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
