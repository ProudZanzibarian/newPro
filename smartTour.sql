-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2023 at 09:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartTour`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `bannerID` int(11) NOT NULL,
  `bannerName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `companyID` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyDescription` text NOT NULL,
  `companyImg` varchar(15) NOT NULL,
  `companyLogo` varchar(100) NOT NULL,
  `guiderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`companyID`, `companyName`, `companyDescription`, `companyImg`, `companyLogo`, `guiderID`) VALUES
(2, 'name', '12345', 'ha.png', 'logo_name.png', NULL),
(3, 'name2', '12345', 'ha.png', 'logo_name.png', NULL),
(4, 'UsamaCompany', 'Name', 'ha.png', 'logo_UsamaCompany.png', NULL),
(6, 'Sada Makutu', 'Noma sana huyu mtoto', 'ha.png', 'logo_Sada Makutu.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guider`
--

CREATE TABLE `guider` (
  `guiderID` int(11) NOT NULL,
  `guiderFname` varchar(50) NOT NULL,
  `gEmail` varchar(100) NOT NULL,
  `gPhoneNumber` varchar(13) NOT NULL,
  `gPlace` varchar(100) NOT NULL,
  `guiderDOB` date NOT NULL,
  `companyID` int(11) NOT NULL,
  `guiderLogo` varchar(20) NOT NULL,
  `experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guider`
--

INSERT INTO `guider` (`guiderID`, `guiderFname`, `gEmail`, `gPhoneNumber`, `gPlace`, `guiderDOB`, `companyID`, `guiderLogo`, `experience`) VALUES
(1, 'logo_Usama.png', 'mmasam@msamd', '12245', 'new old', '2020-02-20', 4, 'logo_Usama.png', 'Masmammsamsma'),
(2, 'logo_Usama.png', 'mmasam@msamd', '12245', 'new old', '2020-02-20', 4, 'logo_Usama.png', 'Masmammsamsma');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `touristID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempImg`
--

CREATE TABLE `tempImg` (
  `tempID` int(11) NOT NULL,
  `tempName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourCompanies`
--

CREATE TABLE `tourCompanies` (
  `tourCompanyID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `touristID` int(11) NOT NULL,
  `Fname` varchar(25) NOT NULL,
  `Lname` varchar(25) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`touristID`, `Fname`, `Lname`, `userName`, `Email`, `password`, `profile`, `dob`, `lastLogin`) VALUES
(1, 'usama', 'Talib', 'usama', 'mamenmasu@gmail.com', '123', '../img/ha.png', '1212-12-12', '2023-05-16'),
(8, 'Hamadi', 'Jua', 'admin', 'mamenmasau@gmail.cm', '$2y$10$/xrAawv/iJ5OvupvQmwdBOBPrAS1la//lmpvwQQnjiVzd.CXaz11S', '../img/ha.png', '2020-02-20', '2023-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tourID` int(11) NOT NULL,
  `tourName` varchar(25) NOT NULL,
  `shortDesc` varchar(100) NOT NULL,
  `tourDescription` text NOT NULL,
  `tourMap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tourID`, `tourName`, `shortDesc`, `tourDescription`, `tourMap`) VALUES
(1, 'Usama Tour', 'Usama Tour is best tour in zanzibar ', 'this is tour that is suggested by the government ', 'No Map Yet'),
(2, 'Buta TOur And Safari', 'Nsadnskadkadjaklskjdka', 'sadksaljdjaskjdlajkdklajkdsjakkas', 'No Map Yet'),
(3, 'Buta TOur And Safari', 'Nsadnskadkadjaklskjdka', 'sadksaljdjaskjdlajkdklajkdsjakkas', 'No Map Yet'),
(4, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(5, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(6, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(7, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(8, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(9, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(10, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(11, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(12, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(13, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(14, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(15, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(16, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(17, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(18, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(19, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(20, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(21, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(22, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(23, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(24, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(25, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(26, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(27, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(28, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(29, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(30, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(31, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(32, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(33, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(34, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(35, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(36, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(37, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(38, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(39, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(40, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(41, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(42, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(43, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(44, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(45, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(46, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(47, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(48, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(49, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(50, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(51, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(52, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(53, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(54, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(55, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(56, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(57, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(58, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(59, 'Buta TOur And Safari', '2131432dsfddsfs', ',cxmzmc,zxm,c.mxz.mc.,zmx,cmz.mx,zm', 'No Map Yet'),
(60, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(61, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(62, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(63, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(64, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(65, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(66, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(67, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet'),
(68, 'Buta TOur And Safari', '12k2k13k1mlsam', 'zcxclzjlkjclzjvkzcxjlvcjxkzlvckxz', 'No Map Yet');

-- --------------------------------------------------------

--
-- Table structure for table `toursImg`
--

CREATE TABLE `toursImg` (
  `tourImgID` int(11) NOT NULL,
  `tourImgName` varchar(100) NOT NULL,
  `tourID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toursImg`
--

INSERT INTO `toursImg` (`tourImgID`, `tourImgName`, `tourID`) VALUES
(1, 'img_admin07:13:58 .jpg', 67),
(2, 'img_admin08:02:07 .png', 67),
(3, 'img_admin08:02:14 .png', 67),
(4, 'img_admin08:02:23 .png', 67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bannerID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`companyID`),
  ADD KEY `guiderID_fk` (`guiderID`);

--
-- Indexes for table `guider`
--
ALTER TABLE `guider`
  ADD PRIMARY KEY (`guiderID`),
  ADD KEY `gCompanyID_fk` (`companyID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `touristID_fk` (`touristID`),
  ADD KEY `tourID_fk` (`tourID`);

--
-- Indexes for table `tempImg`
--
ALTER TABLE `tempImg`
  ADD PRIMARY KEY (`tempID`);

--
-- Indexes for table `tourCompanies`
--
ALTER TABLE `tourCompanies`
  ADD PRIMARY KEY (`tourCompanyID`),
  ADD KEY `companyID_fk` (`companyID`),
  ADD KEY `tourID_fk_table` (`tourID`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`touristID`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tourID`);

--
-- Indexes for table `toursImg`
--
ALTER TABLE `toursImg`
  ADD PRIMARY KEY (`tourImgID`),
  ADD KEY `tourID_fk_1` (`tourID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bannerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guider`
--
ALTER TABLE `guider`
  MODIFY `guiderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempImg`
--
ALTER TABLE `tempImg`
  MODIFY `tempID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tourCompanies`
--
ALTER TABLE `tourCompanies`
  MODIFY `tourCompanyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourist`
--
ALTER TABLE `tourist`
  MODIFY `touristID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tourID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `toursImg`
--
ALTER TABLE `toursImg`
  MODIFY `tourImgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guider`
--
ALTER TABLE `guider`
  ADD CONSTRAINT `gCompanyID_fk` FOREIGN KEY (`companyID`) REFERENCES `companies` (`companyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `tourID_fk` FOREIGN KEY (`tourID`) REFERENCES `tours` (`tourID`),
  ADD CONSTRAINT `touristID_fk` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`touristID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tourCompanies`
--
ALTER TABLE `tourCompanies`
  ADD CONSTRAINT `companyID_fk` FOREIGN KEY (`companyID`) REFERENCES `companies` (`companyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tourID_fk_table` FOREIGN KEY (`tourID`) REFERENCES `tours` (`tourID`);

--
-- Constraints for table `toursImg`
--
ALTER TABLE `toursImg`
  ADD CONSTRAINT `tourID_fk_1` FOREIGN KEY (`tourID`) REFERENCES `tours` (`tourID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
