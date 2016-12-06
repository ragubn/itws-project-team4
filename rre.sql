-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2016 at 05:11 AM
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
(2, 'Rensselaer Research Explorer', 2, '', 'We created a website that allows researchers at RPI to publish their research for the community to view. It allows for users to submit research, anyone to view published research, and administrators to monitor content and users.', 'Web Systems Group 7', 'websysg7@rpi.edu'),
(3, 'Improving fatty acids production by engineering dynamic pathway regulation and metabolic control', 1, 'http://www.pnas.org/content/111/31/11299.full.pdf', 'Global energy demand and environmental concerns have stimulated\r\nincreasing efforts to produce carbon-neutral fuels directly\r\nfrom renewable resources. Microbially derived aliphatic hydrocarbons,\r\nthe petroleum-replica fuels, have emerged as promising\r\nalternatives to meet this goal. However, engineering metabolic\r\npathways with high productivity and yield requires dynamic redistribution\r\nof cellular resources and optimal control of pathway\r\nexpression. Here we report a genetically encoded metabolic switch\r\nthat enables dynamic regulation of fatty acids (FA) biosynthesis in\r\nEscherichia coli. The engineered strains were able to dynamically\r\ncompensate the critical enzymes involved in the supply and consumption\r\nof malonyl-CoA and efficiently redirect carbon flux toward\r\nFA biosynthesis. Implementation of this metabolic control\r\nresulted in an oscillatory malonyl-CoA pattern and a balanced metabolism\r\nbetween cell growth and product formation, yielding\r\n15.7- and 2.1-fold improvement in FA titer compared with the\r\nwild-type strain and the strain carrying the uncontrolled metabolic\r\npathway. This study provides a new paradigm in metabolic engineering\r\nto control and optimize metabolic pathways facilitating the\r\nhigh-yield production of other malonyl-CoAâ€“derived compounds.', 'Peng Xu', 'xup@rpi.edu'),
(4, 'Harnessing Topological Band Effects in Bismuth Telluride Selenide for Large Enhancements in Thermoelectric Properties through Isovalent Doping', 5, 'http://tinyurl.com/gqaj7xp', 'Dilute isovalent sulfur doping simultaneously increases electrical conductivity and Seebeck coefficient in Bi2Te2Se nanoplates, and bulk pellets made from them. This unusual trend at high electron concentrations is underpinned by multifold increases in electron effective mass attributable to sulfur-induced band topology effects, providing a new way for accessing a high thermoelectric figure-of-merit in topological-insulator-based nanomaterials through doping.', 'System Administrator', 'admin@admin.com');

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
(3, 'admin', 'e4bce0c4cdd9d1908ab8e9ae5aa67a473f85249f92973363f9d1f63cec81b6df', 'de8da687af971d29b99fbf3a5ae8fae76e13e09cffe01d07998613034a0ad23e', 'admin@admin.com', 'System Administrator', 1),
(4, 'websysg7', 'f3d4d102d8a6ea54f6caa9314189a9acdfeb2868a5c9435f72c0f2eccd2b140f', 'ffbfe077294d33f9aead3ff2ecd1378c204e9bdbd5f38093a95b360494b696a2', 'websysg7@rpi.edu', 'Web Systems Group 7', 0),
(5, 'pxu', 'e0e7e49eba85adab6273fd6c14c7cec4c36fbeabe45363d0c7f699cfb87083d8', '48ffc2897ac74775a8e4e00068e67fbeb887cf7f11a41a450703eb374400df84', 'xup@rpi.edu', 'Peng Xu', 0),
(18, 'websys', '38de351c8f5143102ad04b9b2d20ce7ce127cf0d6b11d7b909755e33748b41a1', '387a0513e30650588a5685309b3bce9e65fd84e1d671029edeb96f7745a1f8d3', 'websys@rpi.edu', 'Web Sys', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
