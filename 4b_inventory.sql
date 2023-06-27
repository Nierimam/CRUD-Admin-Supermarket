-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 08:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4b_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `date_added`) VALUES
(5, 'Food', '2019-03-05 20:26:33'),
(6, 'Drink', '2019-03-05 20:27:59'),
(7, 'Snack', '2019-03-05 20:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `date_expired` date NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `id_category`, `price`, `stock`, `date_expired`, `date_added`, `date_updated`) VALUES
(2, 'bon cabe', 5, 25000, 100, '2022-03-19', '2019-03-19 21:33:39', NULL),
(3, 'Chitoz', 7, 5000, 100, '2020-03-19', '2019-03-19 21:38:04', '2019-03-21 20:50:55'),
(4, 'ikan', 5, 27000, 100, '2019-05-26', '2019-05-26 14:00:22', NULL),
(5, 'Teh sisri', 6, 1000, 100, '2019-05-27', '2019-05-27 07:07:09', NULL),
(6, 'Extra Jozz', 6, 8000, 100, '2025-12-26', '2023-06-26 18:58:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `date_added`) VALUES
(3, 'mukhlash', 'sandi', 'imam', '2019-03-12 19:25:44'),
(4, 'operator', 'operator123', 'operator', '2019-03-12 20:44:48'),
(6, 'rido', '', 'rido', '2019-03-12 21:03:47'),
(7, 'huda', '$2y$12$YlUXEdrXxAAoRJSLX5P8PutLU/A2.GINwWnV.6FobR.YImKjlYhBy', 'huda', '2019-03-12 21:06:07'),
(8, 'imam mukhlash', '$2y$12$EWR93t3JKWVXs9IlCSRYAeCj28jvBYWctDjQMKtfLDTMGwSTjw9sa', 'imam', '2019-04-02 16:48:39'),
(10, 'nierimam13', '$2y$12$H1SQtapnKUvssRL13DHjX.Jho2p0dkphBydX3bWg63Ha4qh3N2vRS', 'imam', '2019-04-02 16:51:26'),
(11, 'imam', '$2y$12$GD5DQ0qdAuk56QXyU2DuM.IFlwddeHJFD50pX7/MTiyxivYSJ.KhS', 'imam mukhlash', '2019-04-08 12:07:23'),
(13, 'imam123', '$2y$12$NEW7HcfJD7musGwI1Pc58eghhPFT/dlvGdh8We/e8JvYyXoBiaDxC', 'nierimam', '2019-08-20 19:59:47'),
(14, 'nier', '$2y$12$lA/Y4X/t1gFgBwke70afiOEARbRvkVMWEg6eXtCPvJnxzTZIsBDq.', 'nierimam', '2023-06-26 18:56:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
