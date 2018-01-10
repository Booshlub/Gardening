-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 01:08 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gardening`
--

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `MemberID` int(150) NOT NULL,
  `TagName` varchar(150) NOT NULL,
  `X` varchar(100) NOT NULL,
  `Y` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL,
  `PhotoID` int(10) UNSIGNED NOT NULL COMMENT 'PhotoID column'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`MemberID`, `TagName`, `X`, `Y`, `link`, `PhotoID`) VALUES
(0, 'add...', '235', '313', 'www.whatever.com', 1),
(1, 'testy2', '440', '65', 'www.whatever.com', 0),
(2, 'test3', '397', '340', 'www.whatever.com', 2),
(1, 'testiesagain', '335', '126', 'www.whatever.com', 0),
(0, 'testRec', '87', '124', 'www.whatever.com', 1),
(0, 'Testinginsert', '100', '200', '$linkP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Location` varchar(300) NOT NULL,
  `Hash` varchar(100) NOT NULL,
  `User` int(100) NOT NULL,
  `Geo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `Title`, `Description`, `Location`, `Hash`, `User`, `Geo`) VALUES
(1, 'Tester', 'Tester', 'uploads/tagging.jpg', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `FName` varchar(150) NOT NULL,
  `LName` varchar(200) NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Password` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
