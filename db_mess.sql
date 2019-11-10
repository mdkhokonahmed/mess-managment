-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2018 at 08:50 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `house_rant`
--

CREATE TABLE `house_rant` (
  `houseid` int(11) NOT NULL,
  `houserantetk` float NOT NULL,
  `bsallary` float NOT NULL,
  `netbill` float NOT NULL,
  `disbill` float NOT NULL,
  `totalmember` int(11) NOT NULL,
  `curdates` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house_rant`
--

INSERT INTO `house_rant` (`houseid`, `houserantetk`, `bsallary`, `netbill`, `disbill`, `totalmember`, `curdates`) VALUES
(8, 15000, 3500, 800, 0, 8, '02/15/2018'),
(9, 13664, 3500, 800, 0, 7, '02/01/2018'),
(13, 17000, 4000, 2000, 0, 8, '03/01/2018');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberid` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cellNumber` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberid`, `firstName`, `lastName`, `email`, `cellNumber`, `address`) VALUES
(13, 'khokon', 'ahmed', 'khokonahmed.8282@gmail.com', '01710769482', 'Mirpur 14'),
(6, 'Sajib', 'Kumer', 'sajib60wab@gmail.com', '01685108453', 'Foridpur'),
(9, 'sujon', 'ahmed', 'sujon@gmail.com', '01710769482', 'Mirpur 14 Number'),
(11, 'Rakib', 'khans', 'rakib@gmail.com', '01710769482', 'Dhaka'),
(12, 'Kamrul', 'Hassan', 'kamrul@gmail.com', '01723480977', 'Savar Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `member_bazar`
--

CREATE TABLE `member_bazar` (
  `membzrid` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_bazar`
--

INSERT INTO `member_bazar` (`membzrid`, `fullname`) VALUES
(6, 'Sajib Khan'),
(5, 'Khokon Ahmed'),
(7, 'sujon Ahmed'),
(8, 'Rakib Khan'),
(9, 'Kamrul Hassan');

-- --------------------------------------------------------

--
-- Table structure for table `member_rant`
--

CREATE TABLE `member_rant` (
  `memrantid` int(11) NOT NULL,
  `curmbrdate` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `memberhouserant` float NOT NULL,
  `memberbazartk` float NOT NULL,
  `membermile` float NOT NULL,
  `milerate` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_rant`
--

INSERT INTO `member_rant` (`memrantid`, `curmbrdate`, `fullname`, `memberhouserant`, `memberbazartk`, `membermile`, `milerate`) VALUES
(7, '02/01/2017', 'Sajib Khan', 2400, 465, 30, 38),
(10, '03/01/2018', 'Khokon Ahmed', 2875, 1300, 5.5, 65.65),
(8, '03/01/2018', 'sujon Ahmed', 2875, 1000, 3, 57),
(9, '03/01/2018', 'Kamrul Hassan', 2865, 2500, 10, 66.65);

-- --------------------------------------------------------

--
-- Table structure for table `mile`
--

CREATE TABLE `mile` (
  `mile` int(11) NOT NULL,
  `milefullnmae` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mile`
--

INSERT INTO `mile` (`mile`, `milefullnmae`) VALUES
(4, 'Sajib khan'),
(8, 'Khokon Ahmed'),
(6, 'sujon Ahmed'),
(7, 'Kamrul Hassan');

-- --------------------------------------------------------

--
-- Table structure for table `single_bazar`
--

CREATE TABLE `single_bazar` (
  `singid` int(11) NOT NULL,
  `membzrid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `curdate` varchar(20) NOT NULL,
  `totaltk` float NOT NULL,
  `totalmill` bigint(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `single_bazar`
--

INSERT INTO `single_bazar` (`singid`, `membzrid`, `fullname`, `curdate`, `totaltk`, `totalmill`) VALUES
(6, 6, 'Sajib Khan', '01/06/2017', 700, 12),
(9, 6, 'Sajib Khan', '02/15/2018', 600, 15),
(8, 5, 'Khokon Ahmed', '01/10/2018', 800, 15),
(10, 7, 'sujon Ahmed', '02/16/2018', 1000, 15),
(11, 8, 'Rakib Khan', '02/17/2018', 1000, 10),
(12, 8, 'Rakib Khan', '02/20/2018', 1500, 20),
(13, 9, 'Kamrul Hassan', '02/17/2018', 1000, 15),
(14, 9, 'Kamrul Hassan', '02/24/2018', 1500, 20),
(15, 5, 'Khokon Ahmed', '02/24/2018', 500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `single_mile`
--

CREATE TABLE `single_mile` (
  `single_mileid` int(11) NOT NULL,
  `mile` int(11) NOT NULL,
  `milefullnmae` varchar(100) NOT NULL,
  `miledate` varchar(10) NOT NULL,
  `parmile` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `single_mile`
--

INSERT INTO `single_mile` (`single_mileid`, `mile`, `milefullnmae`, `miledate`, `parmile`) VALUES
(7, 4, 'Sajib khan', '1/7/2018', 2),
(13, 8, 'Khokon Ahmed', '02/16/2018', 3),
(9, 6, 'sujon Ahmed', '02/16/2018', 3),
(10, 4, 'Sajib khan', '02/16/2018', 5),
(11, 7, 'Kamrul Hassan', '02/16/2018', 3),
(12, 7, 'Kamrul Hassan', '02/17/2018', 2),
(14, 8, 'Khokon Ahmed', '02/17/2018', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `email`, `password`) VALUES
(1, 'khokon', 'mess01@gmail.com', '3889218a7a510f09e9cf7779ded697e2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `house_rant`
--
ALTER TABLE `house_rant`
  ADD PRIMARY KEY (`houseid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `member_bazar`
--
ALTER TABLE `member_bazar`
  ADD PRIMARY KEY (`membzrid`);

--
-- Indexes for table `member_rant`
--
ALTER TABLE `member_rant`
  ADD PRIMARY KEY (`memrantid`);

--
-- Indexes for table `mile`
--
ALTER TABLE `mile`
  ADD PRIMARY KEY (`mile`);

--
-- Indexes for table `single_bazar`
--
ALTER TABLE `single_bazar`
  ADD PRIMARY KEY (`singid`);

--
-- Indexes for table `single_mile`
--
ALTER TABLE `single_mile`
  ADD PRIMARY KEY (`single_mileid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `house_rant`
--
ALTER TABLE `house_rant`
  MODIFY `houseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `member_bazar`
--
ALTER TABLE `member_bazar`
  MODIFY `membzrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `member_rant`
--
ALTER TABLE `member_rant`
  MODIFY `memrantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mile`
--
ALTER TABLE `mile`
  MODIFY `mile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `single_bazar`
--
ALTER TABLE `single_bazar`
  MODIFY `singid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `single_mile`
--
ALTER TABLE `single_mile`
  MODIFY `single_mileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
