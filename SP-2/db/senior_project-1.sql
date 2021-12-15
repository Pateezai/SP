-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 05:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senior_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `DeviceID` int(10) NOT NULL,
  `DeviceName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patterns`
--

CREATE TABLE `patterns` (
  `PatternID` int(10) NOT NULL,
  `Delay` double(10,2) NOT NULL,
  `RGB` varchar(10) NOT NULL,
  `Brightness` double(10,2) NOT NULL,
  `CreatedDate` date NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `ProflieID` int(10) NOT NULL,
  `DeviceID` int(10) NOT NULL,
  `PatternID` int(10) NOT NULL,
  `ProfileDate` date NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(3, 'denpong', '1234'),
(4, 'denpong2', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`DeviceID`);

--
-- Indexes for table `patterns`
--
ALTER TABLE `patterns`
  ADD PRIMARY KEY (`PatternID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`ProflieID`),
  ADD KEY `DeviceID` (`DeviceID`),
  ADD KEY `PatternID` (`PatternID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `DeviceID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patterns`
--
ALTER TABLE `patterns`
  MODIFY `PatternID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `ProflieID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patterns`
--
ALTER TABLE `patterns`
  ADD CONSTRAINT `patterns_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `DeviceID` FOREIGN KEY (`DeviceID`) REFERENCES `devices` (`DeviceID`),
  ADD CONSTRAINT `PatternID` FOREIGN KEY (`PatternID`) REFERENCES `patterns` (`PatternID`),
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
