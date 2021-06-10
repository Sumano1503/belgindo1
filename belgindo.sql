-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 08:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belgindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `id_admin`) VALUES
('admin', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `detail_username` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`id`, `id_admin`, `detail_username`, `start_date`, `end_date`, `status`) VALUES
(1, 1, 'admin', '2021-06-09 10:22:19', '2021-06-09 16:18:35', 'success'),
(2, 1, 'admin', '2021-06-09 10:22:19', '2021-06-09 10:27:19', 'success'),
(3, 1, 'admin', '2021-06-09 10:23:28', '2021-06-09 10:28:28', 'success'),
(4, 1, 'admin', '2021-06-09 10:26:10', '2021-06-09 10:31:10', 'success'),
(5, 1, 'admin', '2021-06-09 10:27:26', '2021-06-09 10:32:26', 'success'),
(6, 1, 'admin', '2021-06-09 10:27:26', '2021-06-09 10:32:26', 'success'),
(7, 1, 'admin', '2021-06-09 10:31:18', '2021-06-09 10:36:18', 'success'),
(8, 1, 'admin', '2021-06-09 10:31:18', '2021-06-09 10:36:18', 'success'),
(9, 1, 'admin', '2021-06-09 10:33:11', '2021-06-09 10:38:11', 'success'),
(10, 1, 'admin', '2021-06-09 10:33:11', '2021-06-09 10:38:11', 'success'),
(11, 1, 'admin', '2021-06-09 15:35:38', '2021-06-09 15:40:38', 'success'),
(12, 1, 'admin', '2021-06-09 15:39:13', '2021-06-09 15:44:13', 'success'),
(13, 1, 'admin', '2021-06-09 15:40:23', '2021-06-09 15:45:23', 'success'),
(14, 1, 'admin', '2021-06-09 15:40:49', '2021-06-09 15:45:49', 'success'),
(15, 1, 'admin', '2021-06-09 15:42:35', '2021-06-09 15:47:35', 'success'),
(16, 1, 'admin', '2021-06-09 15:42:35', '2021-06-09 15:47:35', 'success'),
(17, 1, 'admin', '2021-06-09 15:43:57', '2021-06-09 15:48:57', 'success'),
(18, 1, 'admin', '2021-06-09 15:43:57', '2021-06-09 15:48:57', 'success'),
(19, 1, 'admin', '2021-06-09 16:07:26', '2021-06-09 16:12:26', 'success');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
