-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2021 at 08:10 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamapoa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `adminId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminId`, `name`, `username`, `password`, `email`, `phone`, `added`, `status`) VALUES
(1, '60ada43c7c543', 'Faith Mugo', 'fmugo', '$2y$10$R83bap8aFIBfydUhcVdou.25sdFDB72qQQzbHmtrHYdtQ8V58w/wa', 'fmugo@chamapoa.co.ke', '07', '2021-05-26 01:30:46', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(100) NOT NULL,
  `assetid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `acquired` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(100) NOT NULL,
  `contributionId` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `roundNo` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `contributionId`, `user`, `code`, `roundNo`, `amount`, `paymentMethod`, `date`, `status`) VALUES
(1, '60ae2ecd2b833', 'Lydia Kinya', 'CD-61N3', 1, '500.00', 'Mpesa', '2021-05-26 11:19:41', 'complete'),
(2, '60ae2f9df2fc5', 'jkasoda dqdq', 'CD-61N3', 1, '500.00', 'Cash', '2021-05-26 11:23:09', 'complete'),
(3, '60afb7bbaefc2', 'Hasera Wario', 'CD-IBRZ', 2, '500.00', 'Mpesa', '2021-05-27 15:16:11', 'complete'),
(4, '60afb82ed4a15', 'Lydia Kinya', 'CD-IBRZ', 2, '500.00', 'Bank', '2021-05-27 15:18:06', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `contributionSettings`
--

CREATE TABLE `contributionSettings` (
  `id` int(100) NOT NULL,
  `settingId` varchar(100) NOT NULL,
  `frequency` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributionSettings`
--

INSERT INTO `contributionSettings` (`id`, `settingId`, `frequency`, `amount`) VALUES
(1, '60ade85410eb1', 'Weekly', '1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `dispersals`
--

CREATE TABLE `dispersals` (
  `id` int(100) NOT NULL,
  `dispersalId` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `roundNo` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transactionId` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispersals`
--

INSERT INTO `dispersals` (`id`, `dispersalId`, `user`, `code`, `roundNo`, `amount`, `transactionId`, `date`, `status`) VALUES
(1, '60ae49f1d0702', 'Lydia Kinya', 'CD-61N3', 1, '1000.00', '5467892JKJIW3', '2021-05-26 13:15:29', 'Complete'),
(2, '60afb87f6e645', 'Hasera Wario', 'CD-IBRZ', 2, '1000.00', 'QWERTYUI', '2021-05-27 15:19:27', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(100) NOT NULL,
  `loanId` varchar(100) NOT NULL,
  `transactionId` varchar(100) NOT NULL,
  `recipient` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `disbursed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approvedBy` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `idNo` varchar(100) NOT NULL,
  `accNo` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `username`, `fullname`, `email`, `phone`, `idNo`, `accNo`, `position`, `password`, `added`, `status`) VALUES
(2, '60ae048aea156', 'lkinya', 'Lydia Kinya Mukami', 'lydia@gmail.com', '0720080878', '12345677', '52968407', 'User', '$2y$10$N2nQziWU/LtmJUhsGYmbo.f6x05/ruvRdUhKL.BW5I7ObfxkElNlW', '2021-05-31 04:01:19', 'active'),
(3, '60afb755c205c', 'hwario', 'Hasera Wario', 'callmehasna@gmail.com', '079009278272', '43567890', '84139670', 'User', '$2y$10$16PWLpRWQwIsI/4XNeaYE.ucGxwvAxUmcvy.gqX0tzHrHO1RVlzVi', '2021-05-27 15:14:29', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contributionSettings`
--
ALTER TABLE `contributionSettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispersals`
--
ALTER TABLE `dispersals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contributionSettings`
--
ALTER TABLE `contributionSettings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dispersals`
--
ALTER TABLE `dispersals`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
