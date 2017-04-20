-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 09:57 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uwialumni`
--
CREATE DATABASE IF NOT EXISTS `uwialumni` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uwialumni`;

-- --------------------------------------------------------
---
--- Create Database User
---
-GRANT USAGE ON *.* TO 'uwialumni'@'localhost' IDENTIFIED BY PASSWORD '*5ED3C55C40CCBCA982F2F18C231588FA8CA5517C';
-GRANT ALL PRIVILEGES ON `uwialumni`.* TO 'uwialumni'@'localhost';
--
-- Table structure for table `graduates`
--

CREATE TABLE `graduates` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `year_of_graduation` year(4) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `contact_email` varchar(40) NOT NULL,
  `class_of_degree` varchar(15) NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `company` varchar(50) NOT NULL,
  `country_employed` varchar(30) NOT NULL,
  `company_email` varchar(40) NOT NULL,
  `interest` text NOT NULL,
  `social_media` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `graduates`
--
ALTER TABLE `graduates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `graduates`
--
ALTER TABLE `graduates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;