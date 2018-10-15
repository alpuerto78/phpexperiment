-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 08:42 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `departmentid` int(5) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`departmentid`, `department`) VALUES
(1, 'College of Engineering'),
(2, 'College of Agriculture'),
(3, 'College of Allied Medicine'),
(4, 'College of Business Administration'),
(5, 'College of Arts and Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `employeeid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `departmentid` int(5) NOT NULL,
  `programid` int(5) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`employeeid`, `lastname`, `firstname`, `sex`, `departmentid`, `programid`, `photo`) VALUES
(111, 'Almazol', 'Amalia', 'Female', 2, 7, ''),
(112, 'Engracia', 'Connie', 'Female', 4, 12, ''),
(113, 'Lee', 'Mari Jan', 'Female', 5, 16, ''),
(114, 'Evangelista', 'Delia', 'Female', 1, 1, ''),
(115, 'Maaliw', 'Renato III', 'Male', 1, 2, ''),
(116, 'Pavino', 'Allen', 'Male', 1, 2, ''),
(117, 'Tan', 'John', 'Male', 1, 6, ''),
(118, 'Aquino', 'Dhenalyn', 'Female', 3, 9, ''),
(119, 'Elma', 'Sandra', 'Female', 3, 10, ''),
(120, 'Villon', 'Mariebeth', 'Female', 4, 11, ''),
(121, 'Gutierrez', 'Felino', 'Male', 2, 8, ''),
(122, 'Camarador', 'Mary Jane', 'Female', 5, 15, ''),
(123, 'Ungriano', 'Judemar', 'Male', 5, 17, ''),
(124, 'De Jesus', 'Editha', 'Female', 5, 14, ''),
(125, 'Marqueses', 'Jed', 'Male', 5, 13, ''),
(126, 'Barreto', 'Luisa', 'Female', 3, 9, ''),
(127, 'Custodio', 'Maurine', 'Female', 1, 4, ''),
(128, 'Abuel', 'Maurino', 'Male', 1, 3, ''),
(129, 'De Veluz', 'Rosanna', 'Female', 1, 5, ''),
(130, 'Castro', 'Madonna', 'Female', 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogram`
--

CREATE TABLE `tblprogram` (
  `programid` int(5) NOT NULL,
  `departmentid` int(5) NOT NULL,
  `program_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogram`
--

INSERT INTO `tblprogram` (`programid`, `departmentid`, `program_desc`) VALUES
(1, 1, 'BS Civil Engineering'),
(2, 1, 'BS Computer Engineering'),
(3, 1, 'BS Electrical Engineering'),
(4, 1, 'BS Electronics Engineering'),
(5, 1, 'BS Industrial Engineering'),
(6, 1, 'BS Mechanical Engineering'),
(7, 2, 'BS Agriculture'),
(8, 2, 'BS Forestry'),
(9, 3, 'BS Nursing'),
(10, 3, 'Midwifery'),
(11, 4, 'BS Accountancy'),
(12, 4, 'BS Business Administration'),
(13, 5, 'BS Mathematics'),
(14, 5, 'BS Biology'),
(15, 5, 'BA Communications'),
(16, 5, 'BA Psychology'),
(17, 5, 'BA History');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`employeeid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `tblprogram`
--
ALTER TABLE `tblprogram`
  ADD PRIMARY KEY (`programid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `departmentid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `employeeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `tblprogram`
--
ALTER TABLE `tblprogram`
  MODIFY `programid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD CONSTRAINT `tblemployees_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `tbldepartment` (`departmentid`) ON UPDATE CASCADE;

--
-- Constraints for table `tblprogram`
--
ALTER TABLE `tblprogram`
  ADD CONSTRAINT `tblprogram_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `tbldepartment` (`departmentid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
