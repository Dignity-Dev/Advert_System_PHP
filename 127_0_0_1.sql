-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 11:17 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advert`
--
CREATE DATABASE IF NOT EXISTS `advert` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `advert`;

-- --------------------------------------------------------

--
-- Table structure for table `myadvert`
--

CREATE TABLE `myadvert` (
  `advert_id` int(11) NOT NULL,
  `company` text NOT NULL,
  `category` text NOT NULL,
  `item_name` text NOT NULL,
  `item_spec` text NOT NULL,
  `item_description` text NOT NULL,
  `item_image` text NOT NULL,
  `seller_name` text NOT NULL,
  `seller_phone` varchar(70) NOT NULL,
  `seller_whatsapp` varchar(70) NOT NULL,
  `ads_date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myadvert`
--
ALTER TABLE `myadvert`
  ADD PRIMARY KEY (`advert_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myadvert`
--
ALTER TABLE `myadvert`
  MODIFY `advert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
