-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 11:33 PM
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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `companyID` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyDescription` varchar(255) NOT NULL,
  `companyImg` varchar(15) NOT NULL,
  `companyLogo` varchar(15) NOT NULL,
  `guiderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guider`
--

CREATE TABLE `guider` (
  `guiderID` int(11) NOT NULL,
  `guiderFname` varchar(50) NOT NULL,
  `guiderDOB` date NOT NULL,
  `companyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `password` varchar(40) NOT NULL,
  `profile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`touristID`, `Fname`, `Lname`, `userName`, `Email`, `password`, `profile`, `dob`, `lastLogin`) VALUES
(1, 'usama', 'Talib', 'usama', 'mamenmasu@gmail.com', '123', '../img/ha.png', '1212-12-12', '2023-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tourID` int(11) NOT NULL,
  `tourName` varchar(25) NOT NULL,
  `tourDescription` varchar(255) NOT NULL,
  `tourImgID` int(11) NOT NULL,
  `tourMap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toursImg`
--

CREATE TABLE `toursImg` (
  `tourImgID` int(11) NOT NULL,
  `tourImgName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`guiderID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `touristID_fk` (`touristID`),
  ADD KEY `tourID_fk` (`tourID`);

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
  ADD PRIMARY KEY (`tourID`),
  ADD KEY `tourImgID_fk` (`tourImgID`);

--
-- Indexes for table `toursImg`
--
ALTER TABLE `toursImg`
  ADD PRIMARY KEY (`tourImgID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guider`
--
ALTER TABLE `guider`
  MODIFY `guiderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourCompanies`
--
ALTER TABLE `tourCompanies`
  MODIFY `tourCompanyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourist`
--
ALTER TABLE `tourist`
  MODIFY `touristID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tourID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toursImg`
--
ALTER TABLE `toursImg`
  MODIFY `tourImgID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `guiderID_fk` FOREIGN KEY (`guiderID`) REFERENCES `guider` (`guiderID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tourImgID_fk` FOREIGN KEY (`tourImgID`) REFERENCES `toursImg` (`tourImgID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
