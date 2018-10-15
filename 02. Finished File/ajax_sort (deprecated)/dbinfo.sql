-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 09:05 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblinfo`
--

CREATE TABLE IF NOT EXISTS `tblinfo` (
`id` int(3) NOT NULL,
  `lastname` varchar(75) NOT NULL,
  `firstname` varchar(75) NOT NULL,
  `department` varchar(25) NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblinfo`
--

INSERT INTO `tblinfo` (`id`, `lastname`, `firstname`, `department`, `salary`) VALUES
(1, 'Maaliw', 'Renato III', 'CEN', 33000),
(2, 'Radovan', 'Gondelina', 'CAG', 110000),
(3, 'Villaverde', 'Efren', 'CEN', 46000),
(4, 'Ellaga', 'Joana Paola', 'CBA', 33000),
(5, 'Mangubat', 'Angelito', 'CIT', 46000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblinfo`
--
ALTER TABLE `tblinfo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblinfo`
--
ALTER TABLE `tblinfo`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
