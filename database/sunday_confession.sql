-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2022 at 06:22 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunday_confession`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `Comment_id` varchar(110) NOT NULL,
  `Episode_id` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Sex` text NOT NULL,
  `Comment` varchar(9999) NOT NULL,
  `Live` int(10) NOT NULL,
  `_Date` varchar(100) NOT NULL,
  PRIMARY KEY (`Comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_id`, `Episode_id`, `Email`, `Name`, `Sex`, `Comment`, `Live`, `_Date`) VALUES
('62e8ae4cf4207', '62da3358a193e', 'sunday ', 'admin                                        ', 'M', 'hi', 1, '02-Aug-2022');

-- --------------------------------------------------------

--
-- Table structure for table `confess`
--

DROP TABLE IF EXISTS `confess`;
CREATE TABLE IF NOT EXISTS `confess` (
  `Confess_id` varchar(1000) NOT NULL,
  `Question_id` int(11) NOT NULL,
  `_Name` varchar(1000) NOT NULL,
  `Sex` varchar(1000) NOT NULL,
  `Question` varchar(1000) NOT NULL,
  `Confession` varchar(10000) NOT NULL,
  `_Date` varchar(10000) NOT NULL,
  `Week` varchar(1000) NOT NULL,
  `Live` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confess`
--

INSERT INTO `confess` (`Confess_id`, `Question_id`, `_Name`, `Sex`, `Question`, `Confession`, `_Date`, `Week`, `Live`) VALUES
('62da0b45beb48', 2241, 'adfadf', 'F', 'sdfgsfdgsfdgsfdg', 'this is life#\r\n', '22-Jul-2022', '29', 0),
('62b4368e07d9c', 2240, 'adfa', 'F', 'this a question for this week', 'life life', '23-Jun-2022', '25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE IF NOT EXISTS `episodes` (
  `Episode` int(100) NOT NULL,
  `_Date` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(10000) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Episode_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`Episode`, `_Date`, `Title`, `Content`, `Picture`, `Episode_id`) VALUES
(1, '22-Jul-2022', 'dadsf', 'aaaaaaaaaaa\r\n\r\n', 'download.jpg', '62da3358a193e'),
(2, '22-Jul-2022', 'adfa', 'fadfa\r\n\r\n', '06faf222-78a2-4123-9c1c-07dd78479cfb.jpg', '62da3368999be');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `Question_id` int(100) NOT NULL AUTO_INCREMENT,
  `Week` varchar(1000) NOT NULL,
  `Question` varchar(1000) NOT NULL,
  `_Date` varchar(1000) NOT NULL,
  UNIQUE KEY `1` (`Question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2242 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Question_id`, `Week`, `Question`, `_Date`) VALUES
(2240, '25', 'this a question for this week', '23-Jun-2022'),
(2241, '29', 'sdfgsfdgsfdgsfdg', '22-Jul-2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Name` varchar(1000) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Sex` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Password`, `Email`, `Sex`) VALUES
('adfadf', '111111111111', 'sunday@ll.mm', 'M'),
('adfadf', '111111111111', 'sunday@ll.mm', 'M'),
('adfadf', 'aaaaaaaaaaaa', 'sunday@jj.com', 'M'),
('kkkkkkkkkkkkkkkkkkkkkkkkkkk', 'kkkkkkkkkkkk', 'sunday@ddd.kadk', 'M'),
('adfadf', 'ffffffffffff', 'dd@ad.com', 'M'),
('dddddddd', 'dddddddddddd', 'sunday@adfadfa.ckdks', 'M'),
('adfadf', 'llllllllllll', 'sunday@ll.com', 'M'),
('sstrg', '111111111111', 'sunday@afdfa.com', 'M'),
('Osazuwa Tunde Ighodaro', '111111111111', 'jep4ril@gmail.com', 'M'),
('Osazuwa Tunde Osazuwa', '111111111111', 'osazuwaighodaro78@gmail.com', 'F');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
