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
  `programid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `employeeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
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
