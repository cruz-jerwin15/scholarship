-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 07:28 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eps`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_parents` (IN `p_id` INT, IN `p_f_fname` VARCHAR(255), IN `p_f_mname` VARCHAR(255), IN `p_f_lname` VARCHAR(255), IN `p_m_fname` VARCHAR(255), IN `p_m_mname` VARCHAR(255), IN `p_m_lname` VARCHAR(255), IN `p_total` VARCHAR(255), IN `p_siblings` VARCHAR(255), IN `p_income` VARCHAR(255))  NO SQL
INSERT INTO tbl_parents (user_id,FatherFirstName,FatherMiddleName,FatherLastName,MotherFirstName,MotherMiddleName,MotherLastName,TotalMembers,siblings,Income) VALUES
(user_id,p_f_fname,p_f_mname,p_f_lname,p_m_fname,p_m_mname,p_m_lname,p_total,p_siblings,p_income)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_parentsaddress` (IN `p_id` INT, IN `p_street` VARCHAR(255), IN `p_road` VARCHAR(255), IN `p_brgy` VARCHAR(255), IN `p_town` VARCHAR(255), IN `p_prov` VARCHAR(255))  NO SQL
INSERT INTO tbl_parentsaddress
(user_id,StreetNumber,RoadName,Barangay,Town,Province) VALUES
(p_id,p_street,p_road,p_brgy,p_town,p_prov)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_school` (IN `p_year_comp` VARCHAR(255), IN `p_gwa` VARCHAR(255), IN `p_school_int` VARCHAR(255), IN `p_last_school` VARCHAR(255), IN `p_exam` VARCHAR(255), IN `p_course` VARCHAR(255), IN `p_scholar` VARCHAR(255), IN `p_year_course` VARCHAR(255))  NO SQL
INSERT INTO tbl_school (YearCompleted,GWA,SchoolIntended,LastSchoolAttended,ExamRating,Course,Scholarship,year_course) VALUES 
(p_year_comp, p_gwa, p_school_int, p_last_school, p_exam, p_course, p_scholar,p_year_course)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_schooladdress` (IN `p_id` INT, IN `p_street` VARCHAR(255), IN `p_road` VARCHAR(255), IN `p_brgy` VARCHAR(255), IN `p_town` VARCHAR(255), IN `p_prov` VARCHAR(255))  NO SQL
INSERT INTO tbl_schooladdress
(user_id,StreetNumber,RoadName,Barangay,Town,Province) VALUES
(p_id,p_street,p_road,p_brgy,p_town,p_prov)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_siblings` (IN `p_id` INT, IN `p_fname` VARCHAR(255), IN `p_mname` VARCHAR(255), IN `p_lname` VARCHAR(255), IN `p_educ` VARCHAR(255), IN `p_course` VARCHAR(255), IN `p_yr` VARCHAR(255))  NO SQL
INSERT INTO tbl_siblings (FirstName,MiddleName,LastName,sib_educ_assist,sib_course,sib_year)
VALUES
(p_fname,p_mname,p_lname,p_educ,p_course,p_yr)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_useraddress` (IN `p_id` INT, IN `p_street` VARCHAR(255), IN `p_road` VARCHAR(255), IN `p_brgy` VARCHAR(255), IN `p_town` VARCHAR(255), IN `p_prov` VARCHAR(255))  NO SQL
INSERT INTO tbl_useraddress 
(user_id,StreetNumber,RoadName,Barangay,Town,Province) VALUES
(p_id,p_street,p_road,p_brgy,p_town,p_prov)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_add_userinfo` (IN `p_fname` VARCHAR(255), IN `p_mname` VARCHAR(255), IN `p_lname` VARCHAR(255), IN `p_age` VARCHAR(255), IN `p_sex` VARCHAR(255), IN `p_citizenship` VARCHAR(255), IN `p_dob` VARCHAR(255), IN `p_pob` VARCHAR(255), IN `p_image` VARCHAR(255), IN `p_email` VARCHAR(255), IN `p_fb_account` VARCHAR(255))  NO SQL
BEGIN

DECLARE _user_id INT;

INSERT INTO tbl_userinfo
(FirstName,MiddleName,LastName,Age,Sex,DateOfBirth,PlaceOfBirth,Citizenship,Image,fb_account,EmailAddress) VALUES 
(p_fname,p_mname,p_lname,p_age,p_sex,p_dob,p_pob,p_citizenship,p_image,p_fb_account,p_email);
            
SET _user_id = LAST_INSERT_ID();

SELECT _user_id AS id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_login` (IN `p_username` VARCHAR(255), IN `p_password` VARCHAR(255))  NO SQL
SELECT
	a.id,
	a.username,
    a.password
FROM tbl_admin a
WHERE a.username = p_username
and a.password = p_password$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_partner_school` ()  NO SQL
SELECT
	a.id,
    a.school_name,
    a.img
FROM tbl_partnerschool a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_usernot` ()  NO SQL
SELECT
	a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    a.educ,
    a.year_level,
    a.batch,
    b.Barangay AS brgy,
    c.LastSchoolAttended AS last_school,
    a.status,
    a.assessment,
    a.year_level,
    c.course,
    c.assessment_grade,
    a.remarks,
    a.approve,
    c.GWA_now
    
    
FROM tbl_userinfo a
INNER JOIN tbl_useraddress b
ON a.id = b.user_id
INNER JOIN tbl_school c
ON a.id = c.user_id

WHERE canview = '0' and approve = '0'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_users` ()  NO SQL
SELECT
	a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    a.educ,
    a.year_level,
    a.batch,
    b.Barangay AS brgy,
    c.LastSchoolAttended AS last_school,
    a.status,
    a.assessment
    
FROM tbl_userinfo a
INNER JOIN tbl_useraddress b
ON a.id = b.user_id
INNER JOIN tbl_school c
ON a.id = c.user_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_usersif` ()  NO SQL
SELECT
	a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    a.educ,
    a.year_level,
    a.batch,
    b.Barangay AS brgy,
    c.LastSchoolAttended AS last_school,
    a.status,
    a.assessment,
    a.year_level,
    c.course,
    c.assessment_grade,
    a.remarks,
    c.GWA_now
    
    
FROM tbl_userinfo a
INNER JOIN tbl_useraddress b
ON a.id = b.user_id
INNER JOIN tbl_school c
ON a.id = c.user_id

WHERE canview = '0'&&approve = '1'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_usersremove` ()  NO SQL
SELECT
	a.id,
    CONCAT(a.LastName, ', ', a.FirstName,' ', a.MiddleName) AS 'user_name',
    a.educ,
    a.year_level,
    a.batch,
    b.Barangay AS brgy,
    c.LastSchoolAttended AS last_school,
    a.status,
    a.assessment,
    a.year_level,
    c.course,
    c.assessment_grade,
    a.remarks,
    c.GWA_now
    
    
FROM tbl_userinfo a
INNER JOIN tbl_useraddress b
ON a.id = b.user_id
INNER JOIN tbl_school c
ON a.id = c.user_id

WHERE canview = '1'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'superadmin', '202cb962ac59075b964b07152d234b70'),
(6, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents`
--

CREATE TABLE `tbl_parents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `FatherFirstName` varchar(100) NOT NULL,
  `FatherMiddleName` varchar(100) NOT NULL,
  `FatherLastName` varchar(100) NOT NULL,
  `MotherFirstName` varchar(100) NOT NULL,
  `MotherMiddleName` varchar(100) NOT NULL,
  `MotherLastName` varchar(100) NOT NULL,
  `FatherAge` int(11) NOT NULL,
  `MotherAge` int(11) NOT NULL,
  `FatherOccupation` varchar(255) NOT NULL,
  `MotherOccupation` varchar(255) NOT NULL,
  `TotalMembers` int(11) NOT NULL,
  `siblings` int(11) NOT NULL,
  `Income` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parents`
--

INSERT INTO `tbl_parents` (`id`, `user_id`, `FatherFirstName`, `FatherMiddleName`, `FatherLastName`, `MotherFirstName`, `MotherMiddleName`, `MotherLastName`, `FatherAge`, `MotherAge`, `FatherOccupation`, `MotherOccupation`, `TotalMembers`, `siblings`, `Income`) VALUES
(1, 2, 'veronico', 'mili', 'mendoza', 'beranda', 'inigo', 'mendoza', 0, 0, '', '', 5, 3, 250000.00),
(2, 3, 'Edwin', 'Arca', 'lapos', 'Florence', 'Pinangang', 'lapos', 44, 40, 'Businessman', 'Housewife', 4, 1, 250000.00),
(3, 4, 'Cipriano', 'Arca', 'menon', 'Rubina', 'Manaig', 'menon', 0, 0, '', '', 3, 0, 300000.00),
(4, 5, 'Vernon', 'Isles', 'Aranza', 'Glenda', 'Eleazar', 'Aranza', 0, 0, '', '', 4, 1, 100000.00),
(5, 6, '', '', '', '', '', '', 0, 0, '', '', 5, 5, 3123.00),
(6, 7, 'Vernon', 'Isles', 'Aranza', 'Glenda', 'Eleazar', 'Aranza', 0, 0, '', '', 4, 1, 300000.00),
(7, 8, '', '', '', '', '', '', 45, 44, 'rqwrq', 'rweqrwq', 2, 2, 28080808.00),
(8, 9, '$FatherFirstName', '$FatherMiddleName', '$FatherLastName', '$MotherFirstName', '$MotherMiddleName', '$MotherLastName', 0, 0, '$FatherOccupation', '$MotherOccupation', 0, 0, 0.00),
(9, 10, '', '', '', '', '', '', 0, 0, '', '', 23, 23, 2323232.00),
(10, 11, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 8298920.00),
(11, 12, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 8298920.00),
(12, 13, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 8298920.00),
(13, 14, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 29378.00),
(14, 15, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 29378.00),
(15, 16, '', '', '', '', '', '', 0, 0, '', '', 89, 89, 898988.00),
(16, 17, '', '', '', '', '', '', 0, 0, '', '', 89, 89, 898988.00),
(17, 18, '', '', '', '', '', '', 0, 0, '', '', 89, 89, 898988.00),
(19, 19, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 231212.00),
(20, 20, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 100000000.00),
(21, 21, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 100000000.00),
(22, 22, '', '', '', '', '', '', 0, 0, '', '', 2, 2, 100000000.00),
(23, 23, '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0.00),
(24, 24, '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0.00),
(25, 25, '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0.00),
(26, 26, '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parentsaddress`
--

CREATE TABLE `tbl_parentsaddress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `RoadName` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parentsaddress`
--

INSERT INTO `tbl_parentsaddress` (`id`, `user_id`, `StreetNumber`, `RoadName`, `Barangay`, `Town`, `Province`) VALUES
(1, 2, 5677, 'makinli', 'sta maria', 'sto tomas', 'Batangas'),
(2, 3, 745, 'stelo', 'San Vicente', 'Sto Tomas', 'Batangas'),
(3, 4, 746, 'Makiling', 'San Pablo', 'Sto Tomas', 'Batangas'),
(4, 5, 332, 'Palakpakin', 'Concepcion', 'San Pablo', 'Laguna'),
(5, 6, 0, '', 'dasdas', 'dsad', 'sadasds'),
(6, 7, 0, '', 'Concepcion', 'San Pablo', 'Laguna'),
(7, 8, 0, '', 'rqewrq', 'rqwerqr', 'rqewrwqr'),
(8, 9, 0, '$ParentRoadName', '$ParentBarangay', '$ParentTown', '$ParentProvince'),
(9, 10, 0, '', 'jkljklj', 'jkljlkj', 'jkljj'),
(10, 11, 0, '', 'iopipoi', 'ipoipi', 'ipoipoi'),
(11, 12, 0, '', 'iopipoi', 'ipoipi', 'ipoipoi'),
(12, 13, 0, '', 'iopipoi', 'ipoipi', 'ipoipoi'),
(13, 14, 0, '', 'fhdskh', 'hfsk', 'hfk'),
(14, 15, 0, '', 'fhdskh', 'hfsk', 'hfk'),
(15, 16, 0, '', 'jkljl', 'jkljlkjl', 'jkljlkj'),
(16, 17, 0, '', 'jkljl', 'jkljlkjl', 'jkljlkj'),
(17, 18, 0, '', 'jkljl', 'jkljlkjl', 'jkljlkj'),
(19, 19, 0, '', 'ghj', 'gjhghjghj', 'ghjg'),
(20, 20, 0, '', 'n,mn,m', 'nm,nnm', 'n,mn,'),
(21, 21, 0, '', 'n,mn,m', 'nm,nnm', 'n,mn,'),
(22, 22, 0, '', 'n,mn,m', 'nm,nnm', 'n,mn,'),
(23, 23, 0, '', '', '', ''),
(24, 24, 0, '', '', '', ''),
(25, 25, 0, '', '', '', ''),
(26, 26, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partnerschool`
--

CREATE TABLE `tbl_partnerschool` (
  `id` int(11) NOT NULL,
  `school_name` varchar(512) NOT NULL,
  `img` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partnerschool`
--

INSERT INTO `tbl_partnerschool` (`id`, `school_name`, `img`) VALUES
(1, 'TI', ''),
(2, 'FAITH', ''),
(3, 'Marcelino', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `YearCompleted` year(4) NOT NULL,
  `GWA` float(10,2) NOT NULL,
  `GWA_now` float(10,2) NOT NULL,
  `SchoolIntended` varchar(100) NOT NULL,
  `LastSchoolAttended` varchar(200) NOT NULL,
  `ExamRating` float(10,2) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Scholarship` varchar(100) NOT NULL,
  `SchoolYear` int(11) NOT NULL,
  `year_course` int(11) NOT NULL,
  `assessment_grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school`
--

INSERT INTO `tbl_school` (`id`, `user_id`, `YearCompleted`, `GWA`, `GWA_now`, `SchoolIntended`, `LastSchoolAttended`, `ExamRating`, `Course`, `Scholarship`, `SchoolYear`, `year_course`, `assessment_grade`) VALUES
(1, 2, 2004, 95.00, 0.00, 'FAITH', 'Batangas National High School', 85.00, 'GAS', 'Josie Rizal', 2018, 0, ''),
(2, 3, 2016, 87.00, 0.00, 'FAITH', 'Luyos National High School', 67.00, 'BSIT', 'none', 0, 0, ''),
(3, 4, 2004, 87.00, 0.00, 'First Asia Institute of Technology and Humanities', 'MSC', 85.00, 'BSIT', 'Josie Rizal', 0, 0, ''),
(4, 5, 2004, 90.00, 0.00, 'FAITH', 'MSC', 88.00, 'BSIT', '', 0, 0, ''),
(5, 6, 0000, 95.00, 0.00, 'adasd', 'asdasd', 90.00, 'dasdasd', '', 0, 0, ''),
(6, 7, 0000, 90.00, 0.00, 'FAITH', 'Liceo', 90.00, 'BSCS', '', 0, 0, ''),
(7, 8, 0000, 90.00, 0.00, 'qrqewqr', 'qwerq', 90.00, 'qerqwr', '', 0, 0, ''),
(8, 9, 0000, 0.00, 0.00, '$SchoolIntended', '$LastSchoolAttended', 0.00, '$Course', '$Scholarship', 0, 0, ''),
(9, 10, 0000, 90.00, 0.00, 'jkljl', 'jlkjljl', 90.00, 'jkljkl', '', 0, 0, ''),
(10, 11, 0000, 90.00, 0.00, 'iopiippoi', 'iopipoip', 90.00, 'iopipoi', '', 0, 0, ''),
(11, 12, 0000, 90.00, 0.00, 'iopiippoi', 'iopipoip', 90.00, 'iopipoi', '', 0, 0, ''),
(12, 13, 0000, 90.00, 0.00, 'iopiippoi', 'iopipoip', 90.00, 'iopipoi', '', 0, 0, ''),
(13, 14, 0000, 90.00, 0.00, '', 'fhsdkjh', 90.00, 'fhjksh', '', 0, 0, ''),
(14, 15, 0000, 90.00, 0.00, '', 'fhsdkjh', 90.00, 'fhjksh', '', 0, 0, ''),
(15, 16, 0000, 89.00, 0.00, '', 'jlkjlkj', 90.00, 'jlkjlj', '', 0, 0, ''),
(16, 17, 0000, 89.00, 0.00, '', 'jlkjlkj', 90.00, 'jlkjlj', '', 0, 0, ''),
(17, 18, 0000, 89.00, 0.00, '', 'jlkjlkj', 90.00, 'jlkjlj', '', 0, 0, ''),
(19, 19, 0000, 89.00, 0.00, 'bmbmnbm', 'vbnvnv', 90.00, 'bmnbbm', '', 0, 0, ''),
(20, 20, 0000, 90.00, 0.00, 'nm,n,mn', 'nm,n,mn', 90.00, 'n,mnm,n', '', 0, 0, ''),
(21, 21, 0000, 90.00, 0.00, 'nm,n,mn', 'nm,n,mn', 90.00, 'n,mnm,n', '', 0, 0, ''),
(22, 22, 0000, 90.00, 0.00, 'nm,n,mn', 'nm,n,mn', 90.00, 'n,mnm,n', '', 0, 0, ''),
(23, 23, 0000, 0.00, 0.00, '', '', 0.00, '', '', 0, 0, ''),
(24, 24, 0000, 0.00, 0.00, '', '', 0.00, '', '', 0, 0, ''),
(25, 25, 0000, 0.00, 0.00, '', '', 0.00, '', '', 0, 0, ''),
(26, 26, 0000, 0.00, 0.00, '', '', 0.00, '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schooladdress`
--

CREATE TABLE `tbl_schooladdress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `RoadName` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schooladdress`
--

INSERT INTO `tbl_schooladdress` (`id`, `user_id`, `StreetNumber`, `RoadName`, `Barangay`, `Town`, `Province`) VALUES
(1, 2, 5999, '', 'sta ana', 'sto tomas', 'Batangas'),
(2, 3, 899, 'Makiling', 'San Vicente', 'Sto tomas', 'Batangas'),
(3, 4, 645, 'Makiling', 'San Gabriel', 'Calamba', 'Batangas'),
(4, 5, 21, '', 'San Gabriel', 'San Pablo', 'Laguna'),
(5, 6, 0, '', 'asdadas', 'adasda', 'asdad'),
(6, 7, 0, '', '4-B', 'San Pablo', 'Laguna'),
(7, 8, 0, '', 'qerqer', 'rqwerqw', 'rqwerq'),
(8, 9, 0, '', 'qerqewr', 'qerqer', 'rqewrq'),
(9, 10, 0, '', 'jkljl', 'jkljlkj', 'jlkjlj'),
(10, 11, 0, '', 'iopipi', 'iopiopip', 'iopipip'),
(11, 12, 0, '', 'iopipi', 'iopiopip', 'iopipip'),
(12, 13, 0, '', 'iopipi', 'iopiopip', 'iopipip'),
(13, 14, 0, '', 'fhskh', 'fhskjdhf', 'kfhsdkdh'),
(14, 15, 0, '', 'fhskh', 'fhskjdhf', 'kfhsdkdh'),
(15, 16, 0, '', 'jlkjl', 'jkljlkkj', 'jkljlk'),
(16, 17, 0, '', 'jlkjl', 'jkljlkkj', 'jkljlk'),
(17, 18, 0, '', 'jlkjl', 'jkljlkkj', 'jkljlk'),
(19, 19, 0, '', 'vnbvn', 'vbnbnv', 'vbnnvn'),
(20, 20, 0, '', 'n,mn,', 'n,nm,n', 'n,mnm,n'),
(21, 21, 0, '', 'n,mn,', 'n,nm,n', 'n,mnm,n'),
(22, 22, 0, '', 'n,mn,', 'n,nm,n', 'n,mnm,n'),
(23, 23, 0, '', '', '', ''),
(24, 24, 0, '', '', '', ''),
(25, 25, 0, '', '', '', ''),
(26, 26, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siblings`
--

CREATE TABLE `tbl_siblings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `sib_educ_assist` varchar(100) NOT NULL,
  `sib_course` varchar(255) NOT NULL,
  `sib_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siblings`
--

INSERT INTO `tbl_siblings` (`id`, `user_id`, `FirstName`, `MiddleName`, `LastName`, `sib_educ_assist`, `sib_course`, `sib_year`) VALUES
(1, 2, 'carla', 'inigo', 'mendoza', 'none', 'BSIT', '3rd year'),
(2, 2, 'Brando', 'inigo', 'mendoza', 'jrhs', 'BSCS', '1st year'),
(3, 3, 'marc', 'jan', 'lapos', 'SA', 'BSCS', '1st year'),
(4, 4, 'margo', 'marc', 'menon', 'jrhs', 'BSCS', '1st year'),
(5, 5, 'Xyrus', 'Eleazar', 'Aranza', 'ESC', 'GAS', 'Grade 12'),
(6, 6, '', '', '', '', '', ''),
(7, 7, '', '', '', '', '', ''),
(8, 8, '', '', '', '', '', ''),
(9, 9, '', '', '', '', '', ''),
(10, 10, '', '', '', '', '', ''),
(11, 11, '', '', '', '', '', ''),
(12, 12, '', '', '', '', '', ''),
(13, 13, '', '', '', '', '', ''),
(14, 14, '', '', '', '', '', ''),
(15, 15, '', '', '', '', '', ''),
(16, 16, '', '', '', '', '', ''),
(17, 17, '', '', '', '', '', ''),
(18, 18, '', '', '', '', '', ''),
(20, 19, '', '', '', '', '', ''),
(21, 20, '', '', '', '', '', ''),
(22, 21, '', '', '', '', '', ''),
(23, 22, '', '', '', '', '', ''),
(24, 23, '', '', '', '', '', ''),
(25, 24, '', '', '', '', '', ''),
(26, 25, '', '', '', '', '', ''),
(27, 26, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraddress`
--

CREATE TABLE `tbl_useraddress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `RoadName` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraddress`
--

INSERT INTO `tbl_useraddress` (`id`, `user_id`, `StreetNumber`, `RoadName`, `Barangay`, `Town`, `Province`) VALUES
(1, 2, 5677, 'makinli', 'sta maria', 'Sto tomas', 'Batangas'),
(2, 3, 745, 'Stelo', 'San Vicente', 'Sto tomas', 'Batangas'),
(3, 4, 746, 'dayo', 'San pablo', 'Sto tomas', 'Batangas'),
(4, 5, 332, 'Palakpakin', 'Concepcion', 'San Pablo', 'Laguna'),
(5, 6, 0, '', 'asdasd', 'ada', 'dasdasd'),
(6, 7, 0, '', 'Concepcion', 'San Pablo', 'Laguna'),
(7, 8, 0, '', 'qewrqw', 'weqrqw', 'rqwerqw'),
(8, 9, 0, '$RoadName', '$Barangay', '$Town', '$Province'),
(9, 10, 0, '', 'jkljlj', 'jlkjlkj', 'jlklj'),
(10, 11, 0, '', 'iopipipo', 'iopipoipo', 'ipoipoi'),
(11, 12, 0, '', 'iopipipo', 'iopipoipo', 'ipoipoi'),
(12, 13, 0, '', 'iopipipo', 'iopipoipo', 'ipoipoi'),
(13, 14, 0, '', 'fhkhskdjf', 'hfskdjfhk', 'hfksdjhk'),
(14, 15, 0, '', 'fhkhskdjf', 'hfskdjfhk', 'hfksdjhk'),
(15, 16, 0, '', 'jkljljlj', 'jkljljl', 'jkljlkjk'),
(16, 17, 0, '', 'jkljljlj', 'jkljljl', 'jkljlkjk'),
(17, 18, 0, '', 'jkljljlj', 'jkljljl', 'jkljlkjk'),
(19, 19, 0, '', 'bmnbm', 'vbnvnvbn', 'vbnvbn'),
(20, 20, 0, '', 'nm,n,n,m', 'n,mn,mn', 'nm,n,m'),
(21, 21, 0, '', 'nm,n,n,m', 'n,mn,mn', 'nm,n,m'),
(22, 22, 0, '', 'nm,n,n,m', 'n,mn,mn', 'nm,n,m'),
(23, 23, 0, '', '', '', ''),
(24, 24, 0, '', '', '', ''),
(25, 25, 0, '', '', '', ''),
(26, 26, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userinfo`
--

CREATE TABLE `tbl_userinfo` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Sex` enum('m','f') NOT NULL,
  `PlaceOfBirth` varchar(255) NOT NULL,
  `Citizenship` varchar(50) NOT NULL,
  `fb_account` varchar(512) NOT NULL,
  `contactnumber` varchar(11) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `canview` int(11) NOT NULL,
  `educ` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `assessment` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userinfo`
--

INSERT INTO `tbl_userinfo` (`id`, `FirstName`, `MiddleName`, `LastName`, `DateOfBirth`, `Age`, `Sex`, `PlaceOfBirth`, `Citizenship`, `fb_account`, `contactnumber`, `EmailAddress`, `Image`, `Category`, `canview`, `educ`, `year_level`, `batch`, `status`, `assessment`, `remarks`, `approve`) VALUES
(2, 'marc', 'inigo', 'mendoza', '1995-04-02', 23, 'm', 'Philippines', 'Filipino', 'marcinigo@yahoo.com', '0', 'marcinigo@gmail.com', 'Lord-marland-official-formal-use.jpg', 'EA Senior High', 0, '', 'Grade 11', '1', '', 'for renewal', 'no failing grades', 1),
(3, 'Markus ', 'Jan', 'Lapos', '1997-06-03', 20, 'm', 'Philippines', 'Filipino', 'markusjanlapos@yahoo.com', '09091118583', 'markusjanlapos@gmail.com', 'download.jpg', 'EA College', 0, '', '', '', '', '', '', 1),
(4, 'bryan', 'marc', 'menon', '1993-05-04', 25, 'm', 'Philippines', 'Filipino', 'bryanmarcmenon@yahoo.com', '09091118583', 'bryanmarcmenon@gmail.com', 'images.jpg', 'EPS College', 0, '', '', '', '', '', '', 1),
(5, 'Xyryl Gyver', 'Eleazar', 'Aranza', '1999-01-23', 19, 'm', 'San Pablo City', 'Filipino', 'kyrillosdonum@facebook.com', '', 'sigh.real.xa@gmail.com', 'S2015102422.PNG', 'EA College', 0, '', '', '', '', '', '', 1),
(6, 'dasd', 'sadasd', 'adad', '1999-12-02', 0, 'm', 'dasd', 'asdadasd', '', '', '', '', '', 1, '', '', '', '', '', '', 0),
(7, 'Xyrus', 'Eleazar', 'Aranza', '2000-10-14', 17, 'm', 'San Pablo City', 'Filipino', 'kyrillosdonum@facebook.com', '09091118583', 'sigh.real.xa@gmail.com', 'HEALTH.png', 'EA College', 0, '', '', '', '', '', '', 1),
(8, 'qre', 'rqewrqer', 'rqewrqr', '1998-01-23', 20, 'm', 'qwreqwr', 'rqwerq', '', '', '', '', 'EA Senior High', 1, '', '', '', '', '', '', 0),
(9, '$fname', '$mname', '$lname', '0000-00-00', 0, '', '$PlaceOfBirth', '$Citizenship', '$fb', '$contactnum', '$EmailAddress', '', 'EA Senior High', 0, '', '', '', '', '', '', 1),
(10, 'kjjlkj', 'ljlkjkjlk', 'jkljlkj', '0000-00-00', 0, '', 'jlkjl', 'jlkjkljl', '', '', '', '', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(11, 'ioipioiop', 'iopipipoipo', 'ipoipipoip', '0000-00-00', 0, 'm', 'iopipoi', 'ipipipip', '', '', '', '', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(12, 'ioipioiopipoio', 'iopipipoipoiopip', 'iipipoioipiipo', '0000-00-00', 0, 'm', 'iopipoi', 'ipipipip', '', '', '', 'BS.png', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(13, 'ioipioiopipoiohjkgsf', 'gjfsdkl', 'gsjhfdkgkw', '0000-00-00', 0, 'm', 'iopipoi', 'ipipipip', '', '', '', 'BS.png', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(14, 'fsdfh', 'hfkjsdh', 'hfjkshdfks', '0000-00-00', 0, 'm', 'hfjskghk1', 'fhkjdhfkhs', '', '', '', 'tiled bg baby.png', 'EPS College', 0, '', '', '', '', '', '', 0),
(15, 'fsdfhuoitrew', 'hfkjsdhuwitor', 'hfjkshdfkswhtrek', '0000-00-00', 0, 'm', 'hfjskghk1', 'fhkjdhfkhs', '', '', '', 'Bubble-King-display.jpg', 'EPS College', 0, '', '', '', '', '', '', 0),
(16, 'jlkjlkjlk', 'jlkjlkjlkjlk', 'jkljkllk', '0000-00-00', 0, 'm', 'jkljkjkljk', 'jlkjlkjlkj', '', '', '', 'baby toys.jpg', 'EPS College', 0, '', '', '', '', '', '', 0),
(17, 'jlkjlkjlkhajkdfs', 'jlkjlkjlkjlkhfdsjak', 'hfjkadhfkj', '0000-00-00', 0, 'm', 'jkljkjkljk', 'jlkjlkjlkj', '', '', '', '35173703_1091717617633997_7541902480888561664_n.jpg', 'EPS College', 0, '', '', '', '', '', '', 0),
(18, 'jlkjlkjlkhajkdfshjkgfdshk', 'jlkjlkjlkjlkhfdsjakbfdasbm', 'hfjkadhfkjabdfsm', '0000-00-00', 0, 'm', 'jkljkjkljk', 'jlkjlkjlkj', '', '', '', 'bg.png', 'EPS College', 0, '', '', '', '', '', '', 0),
(19, 'hgfjdsk', 'ghsfdjkj', 'gfhdskjhg', '0000-00-00', 0, 'm', 'vhjcxkbhkhj', 'VBMNXB', '', '', '', 'Icon.png', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(20, 'nm,n,mn', ',mn,mnmn', 'nm,nm,n,mn', '0000-00-00', 0, '', 'nm,nm,nn', ',nm,mn', '', '', '', 'Icon.png', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(21, 'nm,n,mnnkjhk', 'hjkjhjkhjk', 'hjkhkjhkjhkj', '0000-00-00', 0, '', 'nm,nm,nn', ',nm,mn', '', '', '', 'germ.png', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(22, 'nm,n,mnnkjhkbfdsb', 'hjkjhjkhjksdf', 'hjkhkjhkjhkjsfdg', '0000-00-00', 0, '', 'nm,nm,nn', ',nm,mn', '', '', '', 'germ.png', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(23, 'uqtyerwio', 'erqywutiop', 'rquiyop', '0000-00-00', 0, '', '', '', '', '', '', '', 'EPS College', 0, '', '', '', '', '', '', 0),
(24, 'tryuio', 'ytuiop', 'uyio', '0000-00-00', 0, '', '', '', '', '', '', '', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(25, 'jgfksdhk', '`hjkgfshjk', 'hkjgfshkj', '0000-00-00', 0, '', '', '', '', '', '', '', 'EA Senior High', 0, '', '', '', '', '', '', 0),
(26, 'jalkfdj', 'jlkfajdlja', 'jfdslka', '0000-00-00', 0, '', '', '', '', '', '', 'bottle.png', 'EPS College', 0, '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_parentsaddress`
--
ALTER TABLE `tbl_parentsaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_partnerschool`
--
ALTER TABLE `tbl_partnerschool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_schooladdress`
--
ALTER TABLE `tbl_schooladdress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_siblings`
--
ALTER TABLE `tbl_siblings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_useraddress`
--
ALTER TABLE `tbl_useraddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_parentsaddress`
--
ALTER TABLE `tbl_parentsaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_partnerschool`
--
ALTER TABLE `tbl_partnerschool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_schooladdress`
--
ALTER TABLE `tbl_schooladdress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_siblings`
--
ALTER TABLE `tbl_siblings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_useraddress`
--
ALTER TABLE `tbl_useraddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD CONSTRAINT `fk_parents_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_parentsaddress`
--
ALTER TABLE `tbl_parentsaddress`
  ADD CONSTRAINT `fk_parentsaddress_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD CONSTRAINT `fk_school_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_schooladdress`
--
ALTER TABLE `tbl_schooladdress`
  ADD CONSTRAINT `fk_schooladdress_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_siblings`
--
ALTER TABLE `tbl_siblings`
  ADD CONSTRAINT `fk_siblings_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_useraddress`
--
ALTER TABLE `tbl_useraddress`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_userinfo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
