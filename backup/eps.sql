-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 01:53 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eps`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents`
--

CREATE TABLE `tbl_parents` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Relationship` varchar(20) NOT NULL,
  `TotalNumber` int(11) NOT NULL,
  `Siblings` int(11) NOT NULL,
  `Income` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parentsaddress`
--

CREATE TABLE `tbl_parentsaddress` (
  `id` int(11) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `RoadName` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `PostalCode` int(11) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `Country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `id` int(11) NOT NULL,
  `SchoolName` varchar(100) NOT NULL,
  `YearCompleted` year(4) NOT NULL,
  `GWA` float(10,2) NOT NULL,
  `SchoolIntended` varchar(100) NOT NULL,
  `ExamRating` float(10,2) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Scholarship` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schooladdress`
--

CREATE TABLE `tbl_schooladdress` (
  `id` int(11) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `RoadName` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `PostalCode` int(11) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siblings`
--

CREATE TABLE `tbl_siblings` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `EducationalAssistance` varchar(100) NOT NULL,
  `Course` varchar(6) NOT NULL,
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraddress`
--

CREATE TABLE `tbl_useraddress` (
  `id` int(11) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `RoadName` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `PostalCode` int(11) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userinfo`
--

CREATE TABLE `tbl_userinfo` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ContactNumber` int(11) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Sex` enum('m','f') NOT NULL,
  `PlaceOfBirth` varchar(255) NOT NULL,
  `Citizenship` varchar(50) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parentsaddress`
--
ALTER TABLE `tbl_parentsaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siblings`
--
ALTER TABLE `tbl_siblings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_useraddress`
--
ALTER TABLE `tbl_useraddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_parentsaddress`
--
ALTER TABLE `tbl_parentsaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_siblings`
--
ALTER TABLE `tbl_siblings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_useraddress`
--
ALTER TABLE `tbl_useraddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
