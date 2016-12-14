-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 07:41 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vines`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('user','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$DYvhY9yU6zUe3lYbjxuWA.Xz1VZ4gv2tmKYSUEHjiNFOuwfUhixqe', 'user', '2016-12-10 07:54:19', '2016-12-10 14:41:30', 'ljQj8An2C8qzOKVbBPnH68j9OqD1CKZIheEdHV2oiuovy1boBtgTTVaOT5Yo'),
(2, 'Nilesh Chaskar', 'chaskar.nilesh1@gmail.com', '$2y$10$DYvhY9yU6zUe3lYbjxuWA.Xz1VZ4gv2tmKYSUEHjiNFOuwfUhixqe', 'admin', '2016-12-10 12:59:22', '2016-12-11 03:58:55', 'ZrMlKKyV6VLxb1nYzXFdUCOSXUCnxyncAWU4tk4ghD136Z628wllo5o5QInO');

-- --------------------------------------------------------

--
-- Table structure for table `vine_info`
--

CREATE TABLE `vine_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `grapes` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `region` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `notes` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vine_info`
--

INSERT INTO `vine_info` (`id`, `name`, `grapes`, `country`, `region`, `year`, `notes`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'Nilesh Chaskar', 'Nilesh', 'abcd', 'Nilesh', 2012, 'Ttest               ', '1481477959.jpg', 2, '2016-12-11 12:09:19', '2016-12-11 12:09:19'),
(5, 'Nilesh Chaskar', 'Nilesh', 'abcd', 'Nilesh', 2012, 'Ttest               ', '1481478059.jpg', 2, '2016-12-11 12:10:59', '2016-12-11 12:10:59'),
(6, 'Bottle2', 'Green Grapes', 'India', 'Nilesh', 1998, 'ABCDAMS SNANSNSANBN                         ', '1481478139.jpg', 2, '2016-12-11 12:12:19', '2016-12-11 12:12:19'),
(7, 'Bottle3', 'Red Grapes', 'Nagaland', 'TEst', 1999, 'ABCDEF               ', '1481478327.jpg', 2, '2016-12-11 12:15:27', '2016-12-11 12:15:27'),
(8, 'Bottle3', 'Red Grapes', 'Nagaland', 'TEst', 1999, 'ABCDEF               ', '1481478336.jpg', 2, '2016-12-11 12:15:36', '2016-12-11 12:15:36'),
(9, 'Bottle4', 'Green Grapes', 'Chicago, Spain', 'Atlanta', 1980, 'KKKKKKKKKKKKKKK', '1481480965.jpg', 2, '2016-12-11 12:59:25', '2016-12-11 12:59:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `vine_info`
--
ALTER TABLE `vine_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vine_info`
--
ALTER TABLE `vine_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `vine_info`
--
ALTER TABLE `vine_info`
  ADD CONSTRAINT `vine_info_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
