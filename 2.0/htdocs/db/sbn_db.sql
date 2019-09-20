-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2019 at 06:26 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sbn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `MemberId` int(11) NOT NULL AUTO_INCREMENT,
  `Mobile` varchar(10) NOT NULL,
  `MobileVerificationCode` varchar(10) NOT NULL,
  `MobileVerificationStatus` tinyint(1) NOT NULL,
  `MobileVerificationDate` datetime NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Location` varchar(300) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Profile_picture_path` varchar(300) DEFAULT NULL,
  `Occupation` varchar(30) DEFAULT NULL,
  `Headline` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`MemberId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberId`, `Mobile`, `MobileVerificationCode`, `MobileVerificationStatus`, `MobileVerificationDate`, `Password`, `FirstName`, `LastName`, `Status`, `CreatedOn`, `UpdatedOn`, `Email`, `Location`, `State`, `City`, `Profile_picture_path`, `Occupation`, `Headline`) VALUES
(1, '8866244488', '6816', 1, '2019-08-22 18:27:26', 'password', 'Muktesh', 'Bhavsar', 1, '2019-08-22 18:26:25', '2019-08-22 18:26:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '8866128862', '2918', 1, '2019-09-01 23:38:08', 'password', 'Vivek', 'Soni', 1, '2019-09-01 23:37:34', '2019-09-01 23:37:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
