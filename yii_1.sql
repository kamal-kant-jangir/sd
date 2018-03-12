-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2018 at 05:07 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `SDivision` int(11) NOT NULL,
  `SDivisionname` varchar(100) NOT NULL,
  `SSourcetype` int(100) NOT NULL,
  `SSourcecode` varchar(100) NOT NULL,
  `SSourcename` varchar(100) NOT NULL,
  `SLineBusiness` varchar(100) NOT NULL,
  `SProddesc` varchar(100) NOT NULL,
  `DPOLL` varchar(100) NOT NULL,
  `SInsuredname` varchar(100) NOT NULL,
  `GROSS` varchar(100) NOT NULL,
  `SDoi` varchar(100) NOT NULL,
  `SDoe` varchar(100) NOT NULL,
  `TERRERISM` varchar(10) NOT NULL,
  `ODTOTAL` varchar(100) NOT NULL,
  `TP_TOTAL` varchar(100) NOT NULL,
  `PREMIUMFORCOMM` varchar(100) NOT NULL,
  `SBusinesstype` varchar(100) NOT NULL,
  `COMM.%` varchar(100) NOT NULL,
  `COMM.` varchar(100) NOT NULL,
  `SMonth` varchar(100) NOT NULL,
  `SANDALONETPPOLICY` varchar(100) NOT NULL,
  `REMARK` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `SDivision`, `SDivisionname`, `SSourcetype`, `SSourcecode`, `SSourcename`, `SLineBusiness`, `SProddesc`, `DPOLL`, `SInsuredname`, `GROSS`, `SDoi`, `SDoe`, `TERRERISM`, `ODTOTAL`, `TP_TOTAL`, `PREMIUMFORCOMM`, `SBusinesstype`, `COMM.%`, `COMM.`, `SMonth`, `SANDALONETPPOLICY`, `REMARK`) VALUES
(1, 101046, 'LAXMI NAGAR', 3, 'LC0000000288', 'GIRNAR INSURANCE BROKERS PVT. LTD.\r\n', '31', 'PCCV', '101046/31/18/005161\r\n', 'MRS.DEEPA DEVI\r\n', '22085\r\n', '28-Sep-17\r\n', '27-Sep-18\r\n', '0', '9278\r\n', '12882\r\n', '9278', 'Direct without Coinsurance\r\n', '15', '1390.5\r\n', 'SEP\r\n', 'OTHER\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `zip_code` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `zip_code`, `city`) VALUES
(1, '1111', 'jaipur'),
(2, '2222', 'bikaner'),
(3, '3333', 'ajmer'),
(4, '4444', 'jhunjhunu'),
(5, '5555', 'goa'),
(6, '6666', 'jodhpur'),
(7, '7777', 'ganganagar'),
(8, '8888', 'hanumangarh'),
(9, '9999', 'churu'),
(10, '1010', 'ratangarh'),
(11, '1212', 'ramgarh'),
(12, '1313', 'ratannagar'),
(13, '1414', 'kota'),
(14, '1515', 'sikar');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1520503087),
('m130524_201442_init', 1520503093);

-- --------------------------------------------------------

--
-- Table structure for table `stu`
--

CREATE TABLE `stu` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `zip_code` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu`
--

INSERT INTO `stu` (`id`, `name`, `email`, `password`, `zip_code`, `city`) VALUES
(1, 'kamal kant', 'kamal@gmail.com', '123', '', ''),
(3, 'deepak', 'deepak@gmail.com', '789', '', ''),
(4, 'kk2', 'kk2@gmail.com', '456', '', ''),
(5, 'aman', 'aman@gmail.com', '963', '', ''),
(6, 'amit', 'amit@gmail.com', '741', '', ''),
(7, 'new', 'new@gmail.com', 'plm', '', ''),
(44, 'deepak', 'deepak.singh1@girnarsoft.com', 'deep8586258', '', ''),
(45, 'kamal kant', 'kamal.jangid@girnarsoft.com', 'kkj$%^254', '', ''),
(46, 'deepak', 'deepak.singh1@girnarsoft.com', 'KKJ585896358', '', ''),
(47, 'd padihar', 'dpadihar@gmail.com', 'deep8502369', '', ''),
(48, 'kamal kant', 'jangirkamal2@gmail.com', 'kk285654', '', ''),
(53, 'd padihar', 'deepak.singh1@girnarsoft.com', 'deep548454yy@#$', '', ''),
(58, 'deepak', 'dpadihar@gmail.com', 'deep5484@#$', '', ''),
(59, 'jay kumar', 'jaykumarv96@gmail.com', 'jay52578845', '', ''),
(77, 'kamal', 'kamal.jangid@girnarsoft.com', 'KKJ007', '2222', 'jaipur'),
(84, 'kk2', 'kk22@gmail.com', 'kk256944', '1212', 'ramgarh'),
(85, 'kk', 'kk@gmail.com', '748', '5698', 'nagpur'),
(86, 'lucky', 'lucky@gmail.com', '741258', '8965', 'peru'),
(87, 'kk', 'kk@gmail.com', '748', '5698', 'nagpur'),
(88, 'deep singh', 'dpadihar@gmail.com', 'deeeeep54551458', '3333', 'ajmer'),
(89, 'deep', 'dpadihar@gmail.com', '5577@fgthtrh', '2222', 'bikaner');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `zip_code` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kml', 'SC-ooDoeR6Y7ZG1xlPa8KQBxoKUOgczP', '$2y$13$BRqbASlXvGc91j9GdrG4a.y6gIhF5/c5Ilvp58frj1k7tq63mHcde', NULL, 'kml@gmail.com', 10, 1520503259, 1520503259),
(2, 'kamal', 'CwCtT6GHXmrR47sALZyGW2T-Bw0gAblt', '$2y$13$.FT6IN8Z18RzzRtItGh/kuuoSSHRQDSALT41FXEyfFEZKwT37OY8m', NULL, 'kamal@gmail.com', 10, 1520503361, 1520503361);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `stu`
--
ALTER TABLE `stu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `stu`
--
ALTER TABLE `stu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
