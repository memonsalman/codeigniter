-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2018 at 08:43 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salman-ci-etst`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cid`, `cname`) VALUES
(1, 'India'),
(2, 'USA'),
(3, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `eemail` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marsta` enum('Married','UnMarried','','') NOT NULL,
  `marridate` varchar(255) DEFAULT NULL,
  `salary` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `about` varchar(3000) NOT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `satauts` enum('Active','InActive','','') NOT NULL DEFAULT 'InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `ename`, `eemail`, `gender`, `marsta`, `marridate`, `salary`, `country`, `state`, `about`, `hobbies`, `satauts`) VALUES
(17, 'memonsa', 'it.mayur@yahoo.com', 'Male', 'Married', '04/18/2018', '25000', '1', '2', 'this is fasfdafasdf', '1,2', 'Active'),
(18, 'memonsalman', 'salman@gamifa.com', 'Male', 'Married', '04/10/2018', '15000', '1', '1', 'this is final test', '1', 'InActive'),
(22, 'seema342342', 'seema@gmai.com', 'Female', 'UnMarried', '', '15552', '2', '3', 'dkj\r\nsj''seee\r\nsdfs''', '1,2', 'Active'),
(23, 'seema342342', 'seema@gmaiS.com', 'Male', '', '', '1000', '1', '1', 'zxc', '2', 'InActive'),
(24, 'sadasf', 'seemsa@gmai.com', 'Male', 'UnMarried', '', '2222', '1', '1', 'xx', '1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `hid` int(11) NOT NULL,
  `hname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`hid`, `hname`) VALUES
(1, 'Playying'),
(2, 'Swiming'),
(3, 'Reading'),
(4, 'Drving');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `scid`, `sname`) VALUES
(1, 1, 'Gujrat'),
(2, 1, 'MP'),
(3, 2, 'Florid'),
(4, 3, 'Lahor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `scid` (`scid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
