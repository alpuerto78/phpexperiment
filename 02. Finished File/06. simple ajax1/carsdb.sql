-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 06:21 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmanufacturer`
--

CREATE TABLE `tblmanufacturer` (
  `manufacturerid` int(5) NOT NULL,
  `manufacturer` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmanufacturer`
--

INSERT INTO `tblmanufacturer` (`manufacturerid`, `manufacturer`) VALUES
(1, 'Toyota'),
(2, 'Nissan'),
(3, 'Mazda'),
(4, 'Hyundai'),
(5, 'Kia');

-- --------------------------------------------------------

--
-- Table structure for table `tblmodel`
--

CREATE TABLE `tblmodel` (
  `modelid` int(5) NOT NULL,
  `manufacturerid` int(5) NOT NULL,
  `model` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmodel`
--

INSERT INTO `tblmodel` (`modelid`, `manufacturerid`, `model`) VALUES
(1, 1, 'Vios'),
(2, 1, 'Corolla'),
(3, 1, 'Fortuner'),
(4, 2, 'Sentra'),
(5, 2, 'Navara'),
(6, 2, 'Altima'),
(7, 3, 'Mazda2'),
(8, 3, 'Mazda3'),
(9, 3, 'Mazda6'),
(10, 4, 'Elantra'),
(11, 4, 'Genesis'),
(12, 4, 'Sonata'),
(13, 5, 'Picanto'),
(14, 5, 'Sportage'),
(15, 5, 'Rio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmanufacturer`
--
ALTER TABLE `tblmanufacturer`
  ADD PRIMARY KEY (`manufacturerid`);

--
-- Indexes for table `tblmodel`
--
ALTER TABLE `tblmodel`
  ADD PRIMARY KEY (`modelid`),
  ADD KEY `manufacturerid` (`manufacturerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmanufacturer`
--
ALTER TABLE `tblmanufacturer`
  MODIFY `manufacturerid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblmodel`
--
ALTER TABLE `tblmodel`
  MODIFY `modelid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblmodel`
--
ALTER TABLE `tblmodel`
  ADD CONSTRAINT `tblmodel_ibfk_1` FOREIGN KEY (`manufacturerid`) REFERENCES `tblmanufacturer` (`manufacturerid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
