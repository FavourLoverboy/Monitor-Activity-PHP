-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 01:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activitylog`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_number` varchar(15) NOT NULL,
  `location` text NOT NULL,
  `amt` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_Id`, `name`, `email`, `p_number`, `location`, `amt`, `date`) VALUES
(1, 'Agip', 'agip@gmail.com', '1478523690sss', 'Agip Road', '500', '2022-04-14'),
(2, 'Pleasure Park', 'pleasure@gmail.com', '7410258963', 'Bg458k', '5000', '2022-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` varchar(15) NOT NULL,
  `time2` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `user_id`, `msg`, `time`, `time2`, `date`) VALUES
(1, '1', 'user has logged in', '12:40:39', '', '2022-04-13'),
(2, '1', 'user has just log out', '12:50:09', '', '2022-04-13'),
(3, '2', 'user change his profile picture', '12:53:51', '', '2022-04-13'),
(4, '2', 'this account details was updated', '01:05:12', '', '2022-04-14'),
(5, '2', 'user change his profile picture', '01:08:14', '', '2022-04-14'),
(6, '1', 'user has logged in', '01:11:47', '1649891507', '2022-04-14'),
(7, '1', 'user has just log out', '01:12:37', '1649891557', '2022-04-14'),
(8, '1', 'user has logged in', '01:15:04', '1649891704', '2022-04-14'),
(9, '1', 'user change his profile picture', '01:15:18', '1649891718', '2022-04-14'),
(10, '1', 'this account details was updated', '01:15:49', '1649891749', '2022-04-14'),
(11, '1', 'this account details was updated', '01:16:40', '1649891800', '2022-04-14'),
(12, '1', 'account password was changed', '01:19:11', '1649891951', '2022-04-14'),
(13, '1', 'user has just log out', '01:20:11', '1649892011', '2022-04-14'),
(14, '1', 'user has logged in', '01:20:47', '1649892047', '2022-04-14'),
(15, '1', 'account password was changed', '01:21:10', '1649892070', '2022-04-14'),
(16, '1', 'user has just log out', '01:21:10', '1649892070', '2022-04-14'),
(17, '1', 'user has logged in', '01:21:17', '1649892077', '2022-04-14'),
(18, '1', 'added a company, betking to the platform', '01:25:07', '1649892307', '2022-04-14'),
(19, '2', 'added a company, \'smhos\' to the platform', '01:26:30', '1649892390', '2022-04-14'),
(20, '2', '\'Shell\' was updated', '01:31:12', '1649892672', '2022-04-14'),
(21, '1', 'Smhospaid her revenue', '01:35:16', '1649892916', '2022-04-14'),
(22, '2', 'Smhos paid her revenue', '01:35:37', '1649892937', '2022-04-14'),
(23, '1', 'Smhos paid her revenue', '01:41:14', '1649893274', '2022-04-14'),
(24, '2', 'Nwokamma Favour account was balanced for the day', '01:41:42', '1649893302', '2022-04-14'),
(25, '2', 'John Pope Kelly account was balanced for the day', '11:08:44', '1649927324', '2022-04-14'),
(26, '2', 'Betking paid her revenue', '11:14:35', '1649927675', '2022-04-14'),
(27, '2', 'Betking paid her revenue', '11:14:38', '1649927678', '2022-04-14'),
(28, '2', 'Smhos paid her revenue', '12:19:16', '1649931556', '2022-04-14'),
(29, '2', 'user has just log out', '12:34:39', '1649932479', '2022-04-14'),
(30, '1', 'user has logged in', '12:41:49', '1649932909', '2022-04-14'),
(31, '2', 'John Pope Kelly account was balanced for the day', '12:48:50', '1649933330', '2022-04-14'),
(32, '1', 'user has just log out', '12:51:51', '1649933511', '2022-04-14'),
(33, '1', 'user has logged in', '12:52:07', '1649933527', '2022-04-14'),
(34, '1', 'user change his profile picture', '12:52:29', '1649933549', '2022-04-14'),
(35, '1', 'user has just log out', '01:27:01', '1649935621', '2022-04-14'),
(36, '1', 'user has logged in', '01:27:33', '1649935653', '2022-04-14'),
(37, '3', 'user has logged in', '02:34:48', '1649939688', '2022-04-14'),
(38, '1', 'user has just log out', '02:57:56', '1649941076', '2022-04-14'),
(39, '1', 'user has logged in', '02:58:02', '1649941082', '2022-04-14'),
(40, '1', 'user has just log out', '03:31:35', '1649943095', '2022-04-14'),
(41, '3', 'user has just log out', '03:32:56', '1649943176', '2022-04-14'),
(42, '3', 'user has logged in', '03:33:29', '1649943209', '2022-04-14'),
(43, '2', 'user has just log out', '03:36:45', '1649943405', '2022-04-14'),
(44, '1', 'user has logged in', '03:37:37', '1649943457', '2022-04-14'),
(45, '1', 'added a company, \'Techrim\' to the platform', '03:38:45', '1649943525', '2022-04-14'),
(46, '1', 'Smhos paid her revenue', '03:39:09', '1649943549', '2022-04-14'),
(47, '1', 'Smhos paid her revenue', '03:40:38', '1649943638', '2022-04-14'),
(48, '3', 'Nwokamma Favour account was balanced for the day', '03:40:55', '1649943655', '2022-04-14'),
(49, '3', 'Smhos paid her revenue', '03:42:02', '1649943722', '2022-04-14'),
(50, '2', 'Pedro Awo account was balanced for the day', '03:43:11', '1649943791', '2022-04-14'),
(51, '1', 'added a company, \'agip\' to the platform', '03:46:25', '1649943985', '2022-04-14'),
(52, '1', 'Agip paid her revenue', '03:47:37', '1649944057', '2022-04-14'),
(53, '3', 'Nwokamma Favour account was balanced for the day', '03:48:22', '1649944102', '2022-04-14'),
(54, '2', 'added a company, \'pleasure park\' to the platform', '03:48:46', '1649944126', '2022-04-14'),
(55, '1', 'user has just log out', '03:56:10', '1649944570', '2022-04-14'),
(56, '1', 'user has logged in', '03:58:05', '1649944685', '2022-04-14'),
(57, '1', 'user change his profile picture', '03:58:24', '1649944704', '2022-04-14'),
(58, '1', 'user change his profile picture', '03:59:10', '1649944750', '2022-04-14'),
(59, '1', 'this account details was updated', '03:59:33', '1649944773', '2022-04-14'),
(60, '1', 'this account details was updated', '03:59:44', '1649944784', '2022-04-14'),
(61, '1', 'user has just log out', '04:00:28', '1649944828', '2022-04-14'),
(62, '1', 'user has logged in', '04:00:49', '1649944849', '2022-04-14'),
(63, '1', 'user has just log out', '04:01:09', '1649944869', '2022-04-14'),
(64, '1', 'user has logged in', '04:01:32', '1649944892', '2022-04-14'),
(65, '1', 'user has just log out', '04:01:45', '1649944905', '2022-04-14'),
(66, '1', 'user has logged in', '04:02:06', '1649944926', '2022-04-14'),
(67, '1', 'user has just log out', '04:02:43', '1649944963', '2022-04-14'),
(68, '1', 'user has logged in', '04:03:00', '1649944980', '2022-04-14'),
(69, '1', 'user has just log out', '04:14:14', '1649945654', '2022-04-14'),
(70, '2', 'user has just log out', '04:16:25', '1649945785', '2022-04-14'),
(71, '2', 'user has just log out', '04:17:17', '1649945837', '2022-04-14'),
(72, '2', 'user has just log out', '04:17:38', '1649945858', '2022-04-14'),
(73, '3', 'user has just log out', '04:18:11', '1649945891', '2022-04-14'),
(74, '2', 'user has just log out', '04:18:53', '1649945933', '2022-04-14'),
(75, '2', 'Pleasure Park paid her revenue', '04:22:50', '1649946170', '2022-04-14'),
(76, '2', '\'Agip\' was updated', '12:35:27', '1654770927', '2022-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pmt_id` int(11) NOT NULL,
  `com_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `amt` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `paid_time` varchar(30) NOT NULL,
  `balanced` varchar(10) NOT NULL,
  `paid_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pmt_id`, `com_id`, `user_id`, `amt`, `date`, `status`, `paid_time`, `balanced`, `paid_date`) VALUES
(1, '1', '2', '500', '2022-04', 'Paid', '04:22:50', 'Not', '2022-04-14'),
(2, '2', '', '5000', '2022-04', 'Not Paid', '', 'Not', ''),
(3, '1', '', '500', '2022-06', 'Not Paid', '', 'Not', ''),
(4, '2', '', '5000', '2022-06', 'Not Paid', '', 'Not', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fn` varchar(30) NOT NULL,
  `ln` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pn` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ms` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `level` varchar(7) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `picture` text NOT NULL,
  `last_login` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fn`, `ln`, `email`, `pn`, `password`, `ms`, `date`, `level`, `sex`, `picture`, `last_login`, `status`) VALUES
(1, 'Favour', 'Nwokamma', 'favourehio2019@gmail.com', '080957048450', 'loverboy', 'Single', '2022-04-12', 'User', 'Single', 'soup.jpg', '2022-04-14', 'Active'),
(2, 'Kelly', 'John Pope', 'kelly@gmail.com', '08172721023', 'kelly123', 'Single', '2022-04-12', 'Admin', 'Single', 'illustrator.png', '2022-06-09', 'Active'),
(3, 'Awo', 'Pedro', 'awo@gmail.com', '07015375530', 'manman', 'Single', '2022-04-12', 'Manager', 'Single', 'profile.png', '2022-04-14', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_Id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pmt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
