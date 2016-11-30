-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2016 at 04:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rre`
--
CREATE DATABASE IF NOT EXISTS `rre` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rre`;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `rplink` varchar(250) NOT NULL,
  `overview` text NOT NULL,
  `submitter` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `title`, `category`, `rplink`, `overview`, `submitter`, `email`) VALUES
(1, 'RRE', 2, '', 'We made this website. YO!!!!', 'Yo', 'yo@rpi.edu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `salt` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `salt`, `email`, `fullname`, `isAdmin`) VALUES
(1, 'g7', '233e342efb656023828e223021d0a3e82f4d0f065fbab3865fd37ee6c8f4cfa9', '291d1bac130ea5b4858443cc34d5a177a7e108b7cb7e7021e173f31eb9f8cac0', 'g7@rpi.edu', 'Group 7', 0),
(2, 'yo', '6d23d44e883b95ad2a73f9838c88c9350ec6ff722ac4a5a3bc088b6bba4c301b', 'ae156e8fe950f954e7b7fa3290e4e4b6312ace6f8a099913c6400e6a8a070631', 'yo@rpi.edu', 'Yo', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submitter` (`submitter`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `fullname` (`fullname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `research`
--
ALTER TABLE `research`
  ADD CONSTRAINT `research_ibfk_1` FOREIGN KEY (`submitter`) REFERENCES `users` (`fullname`),
  ADD CONSTRAINT `research_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
