-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2016 at 10:52 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scijournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_up_journal`
--

CREATE TABLE IF NOT EXISTS `member_up_journal` (
  `id_upload` int(11) NOT NULL,
  `uld_title` text NOT NULL,
  `uld_author` text NOT NULL,
  `uld_email` varchar(255) NOT NULL,
  `uld_abstract` text NOT NULL,
  `id_ptype` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `uld_fulltext` text NOT NULL,
  `uld_suggestedReview` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_up_journal`
--

INSERT INTO `member_up_journal` (`id_upload`, `uld_title`, `uld_author`, `uld_email`, `uld_abstract`, `id_ptype`, `id_category`, `uld_fulltext`, `uld_suggestedReview`) VALUES
(2, 'abcdefghijklmnopqrstuvwxyz', 'a', 'te@hotmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 1, '280216033657.pdf', 'a'),
(3, 'asdfasdfasdf', 'asdfasdfasdf', 'te@hotmail.com', 'asdfasdf', 1, 1, '280216103822.pdf', 'asdfasdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_up_journal`
--
ALTER TABLE `member_up_journal`
  ADD PRIMARY KEY (`id_upload`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_up_journal`
--
ALTER TABLE `member_up_journal`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
