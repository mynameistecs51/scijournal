-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2016 at 09:14 AM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `cat_name`) VALUES
(1, 'Biology'),
(2, 'Chemistry'),
(3, 'Computer Sciences'),
(4, 'Geology'),
(5, 'Material Sciences'),
(6, 'Mathematics'),
(7, 'Microbiology'),
(8, 'Physics'),
(9, 'Statistics'),
(10, 'Environmental Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `filelocation` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu_name`, `filelocation`) VALUES
(1, 'Home', 'home'),
(2, 'Submission', 'Submission'),
(3, 'Papers In Press', 'home/paperInpress'),
(4, 'Search', 'Search'),
(5, 'Information for Contributors', 'home/information'),
(6, 'Introducing the Journal', 'home/Introducing'),
(7, 'Board of Journal of Science', 'Board of Journal of Science'),
(8, 'Contact addrress', 'home/contact');

-- --------------------------------------------------------

--
-- Table structure for table `paper_type`
--

CREATE TABLE IF NOT EXISTS `paper_type` (
  `id_ptype` int(11) NOT NULL,
  `ptype_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_type`
--

INSERT INTO `paper_type` (`id_ptype`, `ptype_name`) VALUES
(1, 'Contributed Paper'),
(2, 'Opinion'),
(3, 'Short Communication'),
(4, 'Review');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `id_submission` int(11) NOT NULL,
  `sub_title` text NOT NULL,
  `sub_author` text NOT NULL,
  `sub_email` text NOT NULL,
  `sub_abstract` text NOT NULL,
  `id_ptype` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `sub_fileName` text NOT NULL,
  `sub_suggessted` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `paper_type`
--
ALTER TABLE `paper_type`
  ADD PRIMARY KEY (`id_ptype`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id_submission`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `paper_type`
--
ALTER TABLE `paper_type`
  MODIFY `id_ptype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id_submission` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
