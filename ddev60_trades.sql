-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2019 at 03:26 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ddev60_trades`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification_user`
--

CREATE TABLE `notification_user` (
  `id` int(11) NOT NULL,
  `notificationid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_user`
--

INSERT INTO `notification_user` (`id`, `notificationid`, `userid`, `status`, `created`, `updated`) VALUES
(1, 1, 2, 0, '2019-11-28 10:28:13', '2019-11-29 06:35:22'),
(2, 1, 4, 0, '2019-11-28 10:28:13', '2019-11-28 10:28:13'),
(3, 2, 2, 0, '2019-11-28 10:29:50', '2019-11-29 06:35:19'),
(4, 2, 4, 0, '2019-11-28 10:29:50', '2019-11-28 10:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `plan_title` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `plan_id` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_title`, `price`, `plan_id`, `description`, `status`, `created`) VALUES
(1, 'TUDOR', '8', 'plan_GAgp2GOIZThd4S', '<p>Moderate</p><p>12 Trades/mo</p><strike><p>90 Days Free</p></strike><strike><p>Email Support</p></strike>\r\n<p>Trade Guidance</p>', 1, '2019-11-12 06:45:17'),
(2, 'ROGERS', '12', 'plan_GB43SEv7ko5nV8', '<p>Moderate</p><p>12 Trades/mo</p><p>90 Days Free</p><p>Email Support</p><p>Trade Guidance</p>', 1, '2019-11-12 06:45:17'),
(3, 'SOROS', '14', 'plan_GB44lJUQcOQsHA', '<p>Moderate</p><p>12 Trades/mo</p><p>90 Days Free</p><p>Email Support</p><p>Trade Guidance</p>', 1, '2019-11-12 06:53:23'),
(4, 'GEMINI', '20', 'plan_GB443IVABMbKt8', '<p>Moderate</p><p>12 Trades/mo</p><p>90 Days Free</p><p>Email Support</p><p>Trade Guidance</p>', 1, '2019-11-14 11:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `prediction`
--

CREATE TABLE `prediction` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prediction`
--

INSERT INTO `prediction` (`id`, `title`, `status`, `created`, `updated`) VALUES
(1, 'Sell ARRF $120 down to  $112', 1, '2019-11-28 10:28:13', '2019-11-28 10:31:20'),
(2, 'Buy ARRF $120 rise to $123.8', 1, '2019-11-28 10:29:50', '2019-11-28 10:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `stock_history`
--

CREATE TABLE `stock_history` (
  `id` int(11) NOT NULL,
  `ticker_id` int(11) NOT NULL,
  `current_rate` varchar(100) NOT NULL,
  `ticker_publish_rate` varchar(200) NOT NULL,
  `current_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_history`
--

INSERT INTO `stock_history` (`id`, `ticker_id`, `current_rate`, `ticker_publish_rate`, `current_date`) VALUES
(1, 1, '259.4300', '250', '2019-11-08 10:15:04'),
(2, 2, '186.6600', '180', '2019-11-08 10:28:42'),
(3, 1, '260.1400', '230', '2019-11-11 05:40:52'),
(4, 1, '261.1400', '250', '2019-11-12 07:06:41'),
(5, 1, '250.1400', '250', '2019-11-13 07:09:40'),
(6, 1, '265.1400', '245', '2019-11-14 07:09:57'),
(7, 1, '260.1400', '255', '2019-11-15 07:15:10'),
(8, 4, '9.6000', '9', '2019-11-25 12:50:27'),
(9, 4, '8', '8.9', '2019-11-26 00:00:00'),
(10, 4, '5', '7', '2019-11-27 00:00:00'),
(11, 4, '4', '6', '2019-11-28 00:00:00'),
(12, 4, '3', '8', '2019-11-29 00:00:00'),
(13, 4, '2', '5', '2019-11-30 00:00:00'),
(14, 4, '6', '8.7', '2019-12-01 00:00:00'),
(20, 5, '202.0000', '195', '2019-11-29 12:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` varchar(100) NOT NULL,
  `subscription_id` varchar(100) NOT NULL,
  `subs_start_date` datetime NOT NULL,
  `subs_end_date` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `user_id`, `plan_id`, `subscription_id`, `subs_start_date`, `subs_end_date`, `created`) VALUES
(1, 2, '1', 'sub_GFAQdsgOpgOftz', '2019-11-25 11:50:43', '2019-12-25 11:50:43', '2019-11-25 11:50:43'),
(2, 3, '3', 'sub_GFBjpc0hKawBv0', '2019-11-25 01:11:54', '2019-12-25 01:11:54', '2019-11-25 01:11:54'),
(3, 4, '4', 'sub_GFBr7FVuvWC1Zm', '2019-11-25 01:19:41', '2019-12-25 01:19:41', '2019-11-25 01:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `trade_stocks`
--

CREATE TABLE `trade_stocks` (
  `id` int(11) NOT NULL,
  `ticker_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `ticker_current_rate` varchar(200) NOT NULL DEFAULT '1',
  `ticker_publish_rate` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade_stocks`
--

INSERT INTO `trade_stocks` (`id`, `ticker_name`, `company_name`, `industry`, `ticker_current_rate`, `ticker_publish_rate`, `created`, `status`) VALUES
(1, 'AAPL', 'Apple Inc.', 'Equity', '259.4300', '250', '2019-08-11 12:00:00', 1),
(2, 'BABA', 'Alibaba Group Holding Limited', 'Alibaba', '186.6600', '180', '2019-08-11 12:00:00', 1),
(4, 'INFY', 'Infosys Limited', 'Infosys', '9.6000', '9', '2019-02-12 12:00:00', 1),
(5, 'FB', 'Facebook Inc.', 'Facebook', '202.0000', '195', '2019-05-12 12:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `verify` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `fname`, `lname`, `email`, `dob`, `password`, `image`, `verify`, `status`, `updated`, `created`) VALUES
(1, 'admin', 'danish', 'suri', 'danish60degree@gmail.com', '2019-07-11 12:00:00', 'e10adc3949ba59abbe56e057f20f883e', 'img-UP7bNtJxx0.png', '', 1, '2019-11-21 08:11:14', '2019-11-05 16:41:08'),
(2, 'user', 'daniii', 'suriii', 'danish@gmail.com', '1970-01-01 12:00:00', 'e10adc3949ba59abbe56e057f20f883e', 'img-7zAqpWEo0z.png', '', 1, '2019-11-29 06:11:12', '2019-11-25 11:50:43'),
(3, 'user', 'jon', 'smith', 'danish.mandyweb@gmail.com', '2019-07-11 12:00:00', 'e10adc3949ba59abbe56e057f20f883e', 'img-UP7bNtJxx0.png', '', 1, '0000-00-00 00:00:00', '2019-11-25 01:11:54'),
(4, 'user', 'jimmy', 'smith', 'danish93develop@gmail.com', '2019-05-11 12:00:00', 'e10adc3949ba59abbe56e057f20f883e', 'img-UP7bNtJxx0.png', 'h7fMIO7141oNUg4DaAXN', 1, '0000-00-00 00:00:00', '2019-11-25 01:19:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification_user`
--
ALTER TABLE `notification_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prediction`
--
ALTER TABLE `prediction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_history`
--
ALTER TABLE `stock_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_stocks`
--
ALTER TABLE `trade_stocks`
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
-- AUTO_INCREMENT for table `notification_user`
--
ALTER TABLE `notification_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prediction`
--
ALTER TABLE `prediction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_history`
--
ALTER TABLE `stock_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trade_stocks`
--
ALTER TABLE `trade_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
