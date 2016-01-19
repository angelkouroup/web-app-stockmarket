-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2016 at 11:50 PM
-- Server version: 5.1.73-community
-- PHP Version: 5.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_pur_id` int(11) NOT NULL,
  `m_sales_id` int(11) NOT NULL,
  `m_stock_id` int(11) NOT NULL,
  `m_pieces` int(11) NOT NULL,
  `m_price` decimal(10,2) NOT NULL,
  `m_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`match_id`,`m_pur_id`,`m_sales_id`),
  KEY `m1` (`m_pur_id`),
  KEY `m2` (`m_sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`match_id`, `m_pur_id`, `m_sales_id`, `m_stock_id`, `m_pieces`, `m_price`, `m_date`) VALUES
(7, 1, 23, 1, 100, '7.00', '2016-01-15 00:09:02'),
(9, 2, 26, 1, 100, '6.00', '2016-01-15 00:22:53'),
(18, 12, 27, 2, 200, '4.00', '2016-01-17 22:05:24'),
(19, 17, 28, 3, 999, '9.00', '2016-01-18 02:04:50'),
(20, 16, 31, 1, 20, '20.00', '2016-01-18 20:06:42'),
(21, 21, 31, 1, 10, '5.00', '2016-01-18 20:06:42'),
(22, 22, 31, 1, 10, '5.00', '2016-01-18 20:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `pur_orders`
--

CREATE TABLE IF NOT EXISTS `pur_orders` (
  `pur_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_user_id` int(11) NOT NULL,
  `p_stock_id` int(11) NOT NULL,
  `p_price` decimal(10,2) NOT NULL,
  `p_pieces` int(11) NOT NULL,
  `p_state` varchar(1) NOT NULL,
  `p_input_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `p_expire_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`pur_id`,`p_user_id`,`p_stock_id`),
  KEY `p1` (`p_user_id`),
  KEY `p2` (`p_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `pur_orders`
--

INSERT INTO `pur_orders` (`pur_id`, `p_user_id`, `p_stock_id`, `p_price`, `p_pieces`, `p_state`, `p_input_date`, `p_expire_date`) VALUES
(1, 1, 1, '7.00', 100, '3', '2016-01-10 00:00:00', '0000-00-00'),
(2, 2, 1, '6.00', 100, '3', '2016-01-11 00:00:00', '0000-00-00'),
(8, 3, 2, '4.00', 200, '0', '2016-01-16 12:37:56', '0000-00-00'),
(12, 3, 2, '4.00', 200, '3', '2016-01-17 22:05:24', '0000-00-00'),
(13, 2, 4, '6.00', 120, '0', '2016-01-17 22:22:31', '0000-00-00'),
(14, 2, 5, '12.00', 150, '0', '2016-01-17 22:46:11', '0000-00-00'),
(15, 2, 5, '9.00', 999, '0', '2016-01-17 23:47:26', '0000-00-00'),
(16, 9, 1, '20.00', 20, '3', '2016-01-18 01:22:32', '0000-00-00'),
(17, 2, 3, '9.00', 999, '3', '2016-01-18 02:02:39', '0000-00-00'),
(18, 11, 2, '7.00', 100, '0', '2016-01-18 18:11:59', '0000-00-00'),
(19, 2, 1, '7.00', 100, '0', '2016-01-18 18:43:10', '0000-00-00'),
(20, 13, 2, '5.00', 10, '0', '2016-01-18 19:30:25', '0000-00-00'),
(21, 13, 1, '5.00', 10, '3', '2016-01-18 20:04:48', '0000-00-00'),
(22, 13, 1, '5.00', 10, '3', '2016-01-18 20:08:35', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE IF NOT EXISTS `sales_orders` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_user_id` int(11) NOT NULL,
  `s_stock_id` int(11) NOT NULL,
  `s_price` decimal(10,2) NOT NULL,
  `s_pieces` int(11) NOT NULL,
  `s_state` varchar(1) NOT NULL,
  `s_input_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_expire_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`sales_id`,`s_user_id`,`s_stock_id`),
  KEY `s1` (`s_user_id`),
  KEY `s2` (`s_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`sales_id`, `s_user_id`, `s_stock_id`, `s_price`, `s_pieces`, `s_state`, `s_input_date`, `s_expire_date`) VALUES
(23, 2, 1, '6.00', 100, '3', '2016-01-15 00:09:01', '0000-00-00'),
(26, 4, 3, '4.00', 100, '2', '2016-01-15 00:22:53', '0000-00-00'),
(27, 2, 2, '4.00', 200, '3', '2016-01-15 00:36:54', '0000-00-00'),
(28, 2, 3, '9.00', 999, '3', '2016-01-18 02:04:49', '0000-00-00'),
(29, 2, 4, '6.00', 120, '0', '2016-01-18 02:11:24', '0000-00-00'),
(30, 2, 5, '5.00', 555, '0', '2016-01-18 18:05:58', '0000-00-00'),
(31, 2, 1, '5.00', 30, '1', '2016-01-18 20:06:42', '0000-00-00'),
(32, 2, 3, '4.00', 100, '0', '2016-01-18 23:01:49', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_name` varchar(4) NOT NULL,
  `stock_pieces` int(11) NOT NULL,
  `stock_start_price` decimal(10,2) NOT NULL,
  `stock_current_price` decimal(10,2) NOT NULL,
  `stock_previous_price` decimal(10,2) NOT NULL,
  `stock_last_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `stock_name`, `stock_pieces`, `stock_start_price`, `stock_current_price`, `stock_previous_price`, `stock_last_update`) VALUES
(1, 'AAA', 100, '6.00', '5.00', '5.00', '2016-01-18 20:08:36'),
(2, 'BBB', 200, '6.00', '4.00', '9.00', '2016-01-17 22:05:24'),
(3, 'CCC', 300, '7.00', '9.00', '8.00', '2016-01-18 02:04:51'),
(4, 'DDD', 400, '8.00', '10.00', '7.00', '2016-01-16 15:35:00'),
(5, 'EEE', 500, '9.00', '0.00', '0.00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `u_name` char(100) NOT NULL,
  `u_surname` char(100) NOT NULL,
  `u_register_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `u_last_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `u_type` tinyint(1) NOT NULL DEFAULT '0',
  `u_wallet` decimal(20,2) DEFAULT NULL,
  `u_wallet2` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pswd`, `email`, `u_name`, `u_surname`, `u_register_date`, `u_last_date`, `u_type`, `u_wallet`, `u_wallet2`) VALUES
(1, 'angel', '12345', 'angel.kouroup@gmail.com', 'Angelos', 'Kouroupetroglou', '2016-01-10 00:00:00', '0000-00-00 00:00:00', 0, '1000.00', NULL),
(2, 'user1', '12345', 'user1@mail.gr', 'user1name', 'user1surname', '2016-01-10 00:00:00', '0000-00-00 00:00:00', 0, '1200.00', NULL),
(3, 'user2', '12345', 'user2@mail.gr', 'user2name', 'user2surname', '2016-01-11 00:00:00', '0000-00-00 00:00:00', 0, '1000.00', NULL),
(4, 'angel83', 'Aa12345', 'angel.kouroup2@gmail.com', 'ααα', 'βββ', '2016-01-17 00:11:22', '2016-01-17 00:11:22', 1, '0.00', NULL),
(5, 'Kleomenis', 'Nikos90', 'klfasf@in.gr', 'Kleomenis', 'Kleom', '2016-01-17 16:13:00', '2016-01-17 16:13:00', 2, '0.00', NULL),
(6, 'asfssf', 'Nikos10', 'faa@in.gr', 'Kleomenis2', 'asffsa', '2016-01-17 22:32:47', '2016-01-17 22:32:47', 0, '0.00', NULL),
(7, 'Kleomenis2', '', 'safs@sf.gr', 'Kleomenis3', 'asfsfa', '2016-01-17 22:33:43', '2016-01-17 22:33:43', 0, '0.00', NULL),
(8, 'marie', '12345Aa', 'maripapa@gmail.com', 'Μαρία', 'Παπαδοπούλου', '2016-01-17 23:25:02', '2016-01-17 23:25:02', 0, '0.00', NULL),
(9, 'sot', '7057Soti1988!', 'sotiro4@yahoo.com', 'sotiria', 'kap', '2016-01-18 01:21:16', '2016-01-18 01:21:16', 0, '0.00', '-400.00'),
(10, 'Kleomenis5', 'Nikos900', '', '', '', '2016-01-18 12:42:52', '2016-01-18 12:42:52', 0, '0.00', NULL),
(11, 'lakost', 'Lakost123', 'lakost@gmail.com', 'lazaros', 'kostopoulos', '2016-01-18 18:10:44', '2016-01-18 18:10:44', 0, '0.00', NULL),
(12, 'fa', 'Nikos87', 'afds@in.gr', 'asdf', 'fds', '2016-01-18 18:14:29', '2016-01-18 18:14:29', 0, '0.00', NULL),
(13, 'aaa111', 'Aa12345', 'info@caretta-net.gr', 'qqqqq', 'qqqq', '2016-01-18 19:13:01', '2016-01-18 19:13:01', 0, '0.00', '0.00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `m1` FOREIGN KEY (`m_pur_id`) REFERENCES `pur_orders` (`pur_id`),
  ADD CONSTRAINT `m2` FOREIGN KEY (`m_sales_id`) REFERENCES `sales_orders` (`sales_id`);

--
-- Constraints for table `pur_orders`
--
ALTER TABLE `pur_orders`
  ADD CONSTRAINT `p1` FOREIGN KEY (`p_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `p2` FOREIGN KEY (`p_stock_id`) REFERENCES `stocks` (`stock_id`);

--
-- Constraints for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD CONSTRAINT `s1` FOREIGN KEY (`s_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `s2` FOREIGN KEY (`s_stock_id`) REFERENCES `stocks` (`stock_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
