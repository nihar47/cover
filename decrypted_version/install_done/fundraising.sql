-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2013 at 02:16 AM
-- Server version: 5.5.30-30.2
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rockers_hireiphone_kickstartar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_type` int(10) NOT NULL DEFAULT '2',
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `date_added` date NOT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `admin_type`, `company`, `email`, `active`, `date_added`, `login_ip`) VALUES
(1, 'admin', 'admin', 1, 'Rockers Technology', 'vivek.rockersinfo@gmail.com', '1', '2012-05-02', '1.22.81.39'),
(2, 'kaka', 'kakakaka', 2, NULL, 'kjk@h.in', '0', '2013-03-08', '182.72.136.170');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `login_id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_id` int(100) NOT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `login_date` datetime NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=382 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`login_id`, `admin_id`, `login_ip`, `login_date`) VALUES
(1, 1, '127.0.0.1', '2012-09-14 10:14:49'),
(2, 1, '127.0.0.1', '2012-09-17 10:22:02'),
(3, 1, '127.0.0.1', '2012-09-17 18:24:55'),
(4, 1, '127.0.0.1', '2012-09-18 18:06:47'),
(5, 1, '127.0.0.1', '2012-09-19 16:51:28'),
(6, 1, '127.0.0.1', '2012-09-20 12:17:31'),
(7, 1, '1.22.81.23', '2012-09-21 11:49:39'),
(8, 1, '1.22.81.23', '2012-09-21 15:20:07'),
(9, 1, '106.66.213.141', '2012-09-22 07:31:34'),
(10, 1, '180.188.225.2', '2012-09-26 10:46:29'),
(11, 1, '1.22.80.140', '2012-09-26 11:51:11'),
(12, 1, '180.188.225.2', '2012-09-26 12:45:17'),
(13, 1, '180.188.225.2', '2012-09-26 12:47:32'),
(14, 1, '180.188.225.2', '2012-09-26 12:49:08'),
(15, 1, '180.188.225.2', '2012-09-26 12:50:11'),
(16, 1, '180.188.225.2', '2012-09-26 16:41:27'),
(17, 1, '101.0.59.25', '2012-09-27 11:37:52'),
(18, 1, '1.22.81.31', '2012-09-27 14:54:18'),
(19, 1, '1.22.81.31', '2012-09-27 17:31:52'),
(20, 1, '101.0.59.34', '2012-09-27 17:56:12'),
(21, 1, '210.89.56.250', '2012-09-28 10:15:01'),
(22, 1, '210.89.56.250', '2012-09-28 10:33:50'),
(23, 1, '1.22.81.40', '2012-09-28 11:06:16'),
(24, 1, '1.22.81.40', '2012-09-28 14:03:11'),
(25, 1, '210.89.56.250', '2012-09-28 14:48:45'),
(26, 1, '1.22.81.40', '2012-09-28 15:11:14'),
(27, 1, '1.22.81.40', '2012-09-28 15:18:48'),
(28, 1, '1.22.81.40', '2012-09-28 18:06:16'),
(29, 1, '101.0.59.115', '2012-09-29 11:06:02'),
(30, 1, '203.192.228.139', '2012-09-29 11:40:22'),
(31, 1, '1.22.81.2', '2012-09-29 12:13:50'),
(32, 1, '101.0.59.115', '2012-09-29 14:01:24'),
(33, 1, '127.0.0.1', '2012-10-01 11:10:01'),
(34, 1, '127.0.0.1', '2012-10-01 16:21:21'),
(35, 1, '1.22.80.27', '2012-10-01 17:09:40'),
(36, 1, '101.0.59.219', '2012-10-02 09:08:54'),
(37, 1, '1.22.81.55', '2012-10-05 18:18:16'),
(38, 1, '1.22.81.159', '2012-10-06 16:26:46'),
(39, 1, '180.188.225.36', '2012-10-09 11:15:58'),
(40, 1, '101.0.59.132', '2012-10-10 09:33:01'),
(41, 1, '101.0.59.132', '2012-10-10 11:33:57'),
(42, 1, '101.0.59.132', '2012-10-10 13:51:44'),
(43, 1, '1.22.81.16', '2012-10-10 16:39:16'),
(44, 1, '117.198.198.21', '2012-10-14 01:31:15'),
(45, 1, '210.89.56.250', '2012-10-15 14:38:03'),
(46, 1, '101.0.59.67', '2012-10-16 14:34:29'),
(47, 1, '101.0.59.67', '2012-10-16 17:53:59'),
(48, 1, '101.0.59.5', '2012-10-17 16:40:42'),
(49, 1, '1.22.81.24', '2012-10-18 10:37:38'),
(50, 1, '210.89.56.250', '2012-10-18 10:54:36'),
(51, 1, '210.89.56.250', '2012-10-18 14:26:57'),
(52, 1, '210.89.56.250', '2012-10-18 15:01:29'),
(53, 1, '210.89.56.250', '2012-10-18 15:03:01'),
(54, 1, '210.89.56.250', '2012-10-18 16:02:16'),
(55, 1, '1.22.81.19', '2012-10-19 09:33:37'),
(56, 1, '101.0.59.75', '2012-10-19 09:41:15'),
(57, 1, '101.0.59.75', '2012-10-19 10:51:48'),
(58, 1, '1.22.81.19', '2012-10-19 14:14:39'),
(59, 1, '1.22.81.19', '2012-10-19 16:58:09'),
(60, 1, '1.22.80.131', '2012-10-20 11:28:24'),
(61, 1, '1.22.80.131', '2012-10-20 15:36:10'),
(62, 1, '101.0.59.211', '2012-10-22 09:08:49'),
(63, 1, '1.22.81.166', '2012-10-22 11:03:47'),
(64, 1, '101.0.59.211', '2012-10-22 14:07:47'),
(65, 1, '101.0.59.88', '2012-10-26 15:22:42'),
(66, 1, '101.0.59.36', '2012-10-29 18:33:13'),
(67, 1, '1.22.80.239', '2012-10-30 10:49:56'),
(68, 1, '1.22.80.239', '2012-10-30 11:37:27'),
(69, 1, '1.22.80.250', '2012-10-31 12:50:36'),
(70, 1, '1.22.80.250', '2012-10-31 13:59:00'),
(71, 1, '1.22.80.250', '2012-10-31 17:21:44'),
(72, 1, '1.22.80.220', '2012-11-01 12:11:13'),
(73, 1, '1.22.80.220', '2012-11-01 13:10:22'),
(74, 1, '1.22.80.220', '2012-11-01 15:05:05'),
(75, 1, '1.22.80.220', '2012-11-01 16:34:52'),
(76, 1, '1.22.80.220', '2012-11-01 17:21:39'),
(77, 1, '1.22.81.22', '2012-11-02 10:21:46'),
(78, 1, '1.22.81.22', '2012-11-02 13:41:16'),
(79, 1, '1.22.81.22', '2012-11-02 13:41:16'),
(80, 1, '1.22.81.22', '2012-11-02 17:03:19'),
(81, 1, '210.89.56.250', '2012-11-03 10:17:26'),
(82, 1, '1.22.80.187', '2012-11-03 15:50:07'),
(83, 1, '1.22.80.224', '2012-11-05 12:05:47'),
(84, 1, '180.188.225.119', '2012-11-06 10:03:13'),
(85, 1, '1.22.80.241', '2012-11-06 13:53:57'),
(86, 1, '1.22.80.241', '2012-11-06 15:38:25'),
(87, 1, '1.22.80.241', '2012-11-06 17:11:04'),
(88, 1, '101.0.59.124', '2012-11-06 17:19:36'),
(89, 1, '1.22.80.123', '2012-11-07 14:23:01'),
(90, 1, '1.22.80.49', '2012-11-08 09:35:53'),
(91, 1, '1.22.80.49', '2012-11-08 12:14:12'),
(92, 1, '1.22.80.49', '2012-11-08 13:19:17'),
(93, 1, '1.22.80.49', '2012-11-08 15:25:26'),
(94, 1, '1.22.80.49', '2012-11-08 16:40:14'),
(95, 1, '1.22.81.5', '2012-11-09 17:25:41'),
(96, 1, '210.89.56.250', '2012-11-20 11:48:13'),
(97, 1, '180.188.225.20', '2012-12-04 10:14:56'),
(98, 1, '180.188.225.71', '2012-12-05 11:05:15'),
(99, 1, '1.22.80.224', '2012-12-10 09:21:26'),
(100, 1, '59.180.173.89', '2012-12-14 17:04:47'),
(101, 1, '101.0.59.208', '2012-12-17 10:00:46'),
(102, 1, '87.16.76.121', '2012-12-18 05:49:39'),
(103, 1, '1.22.81.63', '2012-12-18 11:55:37'),
(104, 1, '1.22.81.63', '2012-12-18 12:17:35'),
(105, 1, '1.22.81.63', '2012-12-18 12:23:29'),
(106, 1, '1.22.81.63', '2012-12-18 14:07:51'),
(107, 1, '1.22.81.63', '2012-12-18 14:27:20'),
(108, 1, '1.22.81.63', '2012-12-18 15:30:55'),
(109, 1, '1.22.81.63', '2012-12-18 16:10:53'),
(110, 1, '101.0.59.32', '2012-12-19 09:21:42'),
(111, 1, '101.0.59.32', '2012-12-19 09:31:15'),
(112, 1, '101.0.59.32', '2012-12-19 11:35:27'),
(113, 1, '101.0.59.32', '2012-12-19 11:54:03'),
(114, 1, '1.22.81.238', '2012-12-19 15:59:56'),
(115, 1, '1.22.80.105', '2012-12-20 15:40:31'),
(116, 1, '1.22.80.105', '2012-12-20 16:07:05'),
(117, 1, '1.22.80.105', '2012-12-20 17:26:06'),
(118, 1, '78.24.24.235', '2012-12-21 15:57:02'),
(119, 1, '1.22.81.224', '2012-12-24 11:16:57'),
(120, 1, '210.89.56.250', '2012-12-24 12:37:37'),
(121, 1, '1.22.81.224', '2012-12-24 14:18:42'),
(122, 1, '1.22.81.249', '2012-12-26 17:16:58'),
(123, 1, '1.22.81.237', '2012-12-28 10:30:14'),
(124, 1, '210.89.56.250', '2012-12-28 16:13:38'),
(125, 1, '210.89.56.250', '2012-12-28 17:45:03'),
(126, 1, '101.0.59.126', '2012-12-29 10:00:29'),
(127, 1, '99.69.93.189', '2012-12-30 02:44:26'),
(128, 1, '93.74.29.252', '2012-12-31 08:16:54'),
(129, 1, '93.74.29.252', '2013-01-01 22:47:34'),
(130, 1, '79.180.175.109', '2013-01-03 04:43:04'),
(131, 1, '210.89.56.250', '2013-01-03 10:19:33'),
(132, 1, '210.89.56.250', '2013-01-03 10:42:53'),
(133, 1, '210.89.56.250', '2013-01-03 10:44:14'),
(134, 1, '1.22.83.138', '2013-01-03 16:43:14'),
(135, 1, '180.188.225.12', '2013-01-03 17:08:09'),
(136, 1, '1.22.83.138', '2013-01-03 17:21:34'),
(137, 1, '180.188.225.12', '2013-01-03 17:31:18'),
(138, 1, '180.188.225.12', '2013-01-03 17:59:02'),
(139, 1, '1.22.83.145', '2013-01-04 09:37:56'),
(140, 1, '210.89.56.250', '2013-01-04 09:41:02'),
(141, 1, '1.22.83.145', '2013-01-04 10:03:25'),
(142, 1, '24.5.38.52', '2013-01-04 12:03:37'),
(143, 1, '86.97.248.72', '2013-01-05 19:54:06'),
(144, 1, '1.22.80.195', '2013-01-07 15:16:08'),
(145, 1, '1.22.80.249', '2013-01-08 13:43:17'),
(146, 1, '1.22.83.169', '2013-01-09 15:29:05'),
(147, 1, '1.22.83.169', '2013-01-09 16:10:32'),
(148, 1, '101.0.59.113', '2013-01-10 10:38:30'),
(149, 1, '210.89.56.250', '2013-01-10 13:54:33'),
(150, 1, '101.0.59.150', '2013-01-11 09:57:01'),
(151, 1, '184.96.156.200', '2013-01-11 10:11:46'),
(152, 1, '96.250.233.60', '2013-01-11 16:49:08'),
(153, 1, '50.74.71.125', '2013-01-12 05:14:17'),
(154, 1, '92.151.179.218', '2013-01-14 18:05:44'),
(155, 1, '210.89.56.250', '2013-01-16 09:32:58'),
(156, 1, '1.22.83.177', '2013-01-17 10:50:00'),
(157, 1, '173.66.111.6', '2013-01-17 16:05:51'),
(158, 1, '202.131.125.170', '2013-01-19 12:00:05'),
(159, 1, '101.0.59.183', '2013-01-21 14:35:28'),
(160, 1, '101.0.59.183', '2013-01-21 15:06:26'),
(161, 1, '210.89.56.250', '2013-01-22 12:06:39'),
(162, 1, '121.182.36.71', '2013-01-22 23:28:08'),
(163, 1, '1.22.81.247', '2013-01-23 09:48:40'),
(164, 1, '122.252.239.151', '2013-01-23 12:46:19'),
(165, 1, '173.17.44.80', '2013-01-23 16:41:48'),
(166, 1, '210.89.56.250', '2013-01-25 09:17:20'),
(167, 1, '1.22.83.232', '2013-01-25 17:07:59'),
(168, 1, '121.182.36.247', '2013-01-27 17:22:36'),
(169, 1, '79.143.36.9', '2013-01-30 22:05:45'),
(170, 1, '1.22.81.237', '2013-01-31 09:26:30'),
(171, 1, '41.232.156.122', '2013-01-31 23:02:45'),
(172, 1, '79.16.57.89', '2013-02-01 08:04:46'),
(173, 1, '79.16.60.213', '2013-02-01 16:23:49'),
(174, 1, '79.16.60.213', '2013-02-01 22:52:31'),
(175, 1, '94.37.53.159', '2013-02-01 23:26:52'),
(176, 1, '187.126.77.51', '2013-02-02 03:54:59'),
(177, 1, '41.47.222.129', '2013-02-05 19:22:05'),
(178, 1, '211.228.114.165', '2013-02-06 11:45:42'),
(179, 1, '187.58.168.9', '2013-02-07 00:38:57'),
(180, 1, '210.89.56.250', '2013-02-07 10:34:32'),
(181, 1, '210.89.56.250', '2013-02-07 12:46:55'),
(182, 1, '210.89.56.250', '2013-02-07 13:02:12'),
(183, 1, '67.204.186.19', '2013-02-07 22:22:52'),
(184, 1, '201.10.168.44', '2013-02-08 04:56:58'),
(185, 1, '180.188.225.35', '2013-02-08 09:43:33'),
(186, 1, '68.43.229.206', '2013-02-08 12:36:22'),
(187, 1, '70.45.186.84', '2013-02-08 18:19:15'),
(188, 1, '101.0.59.39', '2013-02-09 11:31:22'),
(189, 1, '210.89.56.250', '2013-02-11 09:39:10'),
(190, 1, '1.22.80.197', '2013-02-12 10:03:06'),
(191, 1, '122.161.254.43', '2013-02-12 11:41:34'),
(192, 1, '210.89.56.250', '2013-02-13 09:32:42'),
(193, 1, '1.22.80.223', '2013-02-13 13:47:21'),
(194, 1, '1.22.80.223', '2013-02-13 14:25:18'),
(195, 1, '210.89.56.250', '2013-02-14 09:22:14'),
(196, 1, '1.223.109.115', '2013-02-14 11:58:40'),
(197, 1, '210.89.56.250', '2013-02-15 09:30:03'),
(198, 1, '70.112.204.27', '2013-02-15 15:11:55'),
(199, 1, '213.147.127.26', '2013-02-15 16:21:51'),
(200, 1, '86.28.203.240', '2013-02-15 17:29:35'),
(201, 1, '79.144.228.147', '2013-02-15 20:01:18'),
(202, 1, '160.39.57.190', '2013-02-15 20:41:00'),
(203, 1, '161.38.221.160', '2013-02-16 01:29:47'),
(204, 1, '101.0.59.205', '2013-02-16 09:31:30'),
(205, 1, '72.128.31.243', '2013-02-17 07:16:43'),
(206, 1, '101.0.59.162', '2013-02-18 09:36:08'),
(207, 1, '1.223.109.115', '2013-02-19 08:59:58'),
(208, 1, '101.0.59.221', '2013-02-19 09:19:52'),
(209, 1, '1.223.109.115', '2013-02-19 09:34:06'),
(210, 1, '1.223.109.115', '2013-02-19 11:04:07'),
(211, 1, '213.147.127.26', '2013-02-19 18:08:33'),
(212, 1, '79.182.215.229', '2013-02-19 18:41:52'),
(213, 1, '1.223.109.115', '2013-02-20 09:15:37'),
(214, 1, '210.89.56.250', '2013-02-20 09:19:02'),
(215, 1, '69.76.206.104', '2013-02-20 09:35:15'),
(216, 1, '1.22.81.226', '2013-02-20 10:50:19'),
(217, 1, '1.22.81.226', '2013-02-20 12:58:01'),
(218, 1, '213.147.127.26', '2013-02-20 13:20:04'),
(219, 1, '213.147.127.26', '2013-02-20 13:28:06'),
(220, 1, '213.147.127.26', '2013-02-20 14:30:27'),
(221, 1, '213.147.127.26', '2013-02-20 17:10:06'),
(222, 1, '202.174.53.196', '2013-02-20 18:33:38'),
(223, 1, '50.196.68.34', '2013-02-20 23:44:25'),
(224, 1, '46.238.166.132', '2013-02-21 05:28:49'),
(225, 1, '208.57.56.249', '2013-02-21 08:21:28'),
(226, 1, '210.89.56.250', '2013-02-21 09:24:45'),
(227, 1, '1.223.109.115', '2013-02-21 12:10:27'),
(228, 1, '213.147.127.26', '2013-02-21 12:59:46'),
(229, 1, '1.223.109.115', '2013-02-21 13:10:56'),
(230, 1, '75.50.155.252', '2013-02-21 13:54:31'),
(231, 1, '213.147.127.26', '2013-02-21 14:35:24'),
(232, 1, '213.147.127.26', '2013-02-21 14:40:45'),
(233, 1, '213.147.127.26', '2013-02-21 15:09:20'),
(234, 1, '213.147.127.26', '2013-02-21 15:12:25'),
(235, 1, '213.147.127.26', '2013-02-21 15:13:22'),
(236, 1, '213.147.127.26', '2013-02-21 15:15:44'),
(237, 1, '182.72.62.190', '2013-02-21 16:17:32'),
(238, 1, '213.147.127.26', '2013-02-21 16:23:28'),
(239, 1, '213.147.127.26', '2013-02-21 16:24:29'),
(240, 1, '213.147.127.26', '2013-02-21 16:56:52'),
(241, 1, '213.147.127.26', '2013-02-21 19:58:30'),
(242, 1, '148.201.1.206', '2013-02-22 08:32:06'),
(243, 1, '180.188.225.25', '2013-02-22 09:22:14'),
(244, 1, '180.188.225.25', '2013-02-22 10:05:26'),
(245, 1, '213.147.127.26', '2013-02-22 13:08:38'),
(246, 1, '85.241.61.164', '2013-02-23 01:39:59'),
(247, 1, '202.172.102.51', '2013-02-23 06:18:23'),
(248, 1, '210.89.56.250', '2013-02-23 08:55:58'),
(249, 1, '101.171.85.62', '2013-02-23 09:53:14'),
(250, 1, '117.206.82.144', '2013-02-23 16:50:29'),
(251, 1, '96.42.150.103', '2013-02-23 20:12:26'),
(252, 1, '174.129.237.157', '2013-02-24 09:42:38'),
(253, 1, '142.129.21.24', '2013-02-24 11:43:34'),
(254, 1, '142.129.21.24', '2013-02-24 13:28:13'),
(255, 1, '72.92.55.126', '2013-02-25 01:27:31'),
(256, 1, '46.113.166.222', '2013-02-25 02:23:32'),
(257, 1, '142.129.21.24', '2013-02-25 06:06:14'),
(258, 1, '210.89.56.250', '2013-02-25 09:24:01'),
(259, 1, '213.147.127.26', '2013-02-25 12:55:14'),
(260, 1, '122.177.251.129', '2013-02-25 15:33:12'),
(261, 1, '213.147.127.26', '2013-02-25 18:23:41'),
(262, 1, '213.147.127.26', '2013-02-25 18:35:19'),
(263, 1, '173.161.3.209', '2013-02-26 00:17:28'),
(264, 1, '24.25.210.89', '2013-02-26 02:02:59'),
(265, 1, '210.89.56.250', '2013-02-26 09:24:55'),
(266, 1, '119.236.33.98', '2013-02-26 10:23:33'),
(267, 1, '210.89.56.250', '2013-02-26 12:19:26'),
(268, 1, '121.55.143.38', '2013-02-26 12:44:17'),
(269, 1, '213.147.127.26', '2013-02-26 13:08:49'),
(270, 1, '1.22.81.132', '2013-02-26 13:12:38'),
(271, 1, '213.147.127.26', '2013-02-26 14:20:57'),
(272, 1, '213.147.127.26', '2013-02-26 18:01:49'),
(273, 1, '222.103.129.14', '2013-02-26 18:39:32'),
(274, 1, '96.33.131.243', '2013-02-26 20:20:19'),
(275, 1, '85.196.246.115', '2013-02-26 23:00:44'),
(276, 1, '85.196.246.115', '2013-02-26 23:00:45'),
(277, 1, '68.56.123.109', '2013-02-26 23:52:31'),
(278, 1, '101.0.59.219', '2013-02-27 10:29:02'),
(279, 1, '213.147.127.26', '2013-02-27 13:35:17'),
(280, 1, '213.147.127.26', '2013-02-27 17:29:43'),
(281, 1, '93.65.208.16', '2013-02-27 21:04:35'),
(282, 1, '78.134.121.126', '2013-02-27 22:08:13'),
(283, 1, '75.58.145.148', '2013-02-28 03:46:25'),
(284, 1, '84.121.178.131', '2013-02-28 05:36:13'),
(285, 1, '64.134.101.197', '2013-02-28 06:29:16'),
(286, 1, '101.0.59.230', '2013-02-28 09:16:20'),
(287, 1, '75.50.149.186', '2013-02-28 10:14:02'),
(288, 1, '75.50.149.186', '2013-02-28 10:37:34'),
(289, 1, '213.147.127.26', '2013-02-28 13:32:47'),
(290, 1, '213.147.127.26', '2013-02-28 15:43:13'),
(291, 1, '37.229.215.46', '2013-03-01 02:23:13'),
(292, 1, '101.0.59.96', '2013-03-01 09:40:33'),
(293, 1, '182.185.68.7', '2013-03-02 01:30:56'),
(294, 1, '124.168.123.46', '2013-03-02 06:15:08'),
(295, 1, '101.0.59.66', '2013-03-02 07:52:48'),
(296, 1, '121.222.212.55', '2013-03-02 08:35:52'),
(297, 1, '72.177.242.62', '2013-03-02 12:41:38'),
(298, 1, '207.244.167.225', '2013-03-03 00:52:57'),
(299, 1, '207.244.167.225', '2013-03-04 02:48:33'),
(300, 1, '210.89.56.250', '2013-03-04 10:36:15'),
(301, 1, '207.244.167.225', '2013-03-04 20:21:38'),
(302, 1, '194.167.15.238', '2013-03-04 20:29:29'),
(303, 1, '210.89.56.250', '2013-03-05 09:11:08'),
(304, 1, '87.142.109.52', '2013-03-05 23:10:01'),
(305, 1, '101.0.59.158', '2013-03-06 09:40:04'),
(306, 1, '37.99.63.252', '2013-03-07 00:00:05'),
(307, 1, '88.172.107.107', '2013-03-07 03:14:47'),
(308, 1, '176.61.100.20', '2013-03-07 04:40:27'),
(309, 1, '64.134.157.74', '2013-03-07 05:09:28'),
(310, 1, '1.22.83.147', '2013-03-07 09:15:12'),
(311, 1, '1.22.83.147', '2013-03-07 16:28:37'),
(312, 1, '24.18.160.191', '2013-03-07 23:42:01'),
(313, 1, '1.22.83.152', '2013-03-08 09:10:47'),
(314, 1, '173.72.239.81', '2013-03-08 09:28:18'),
(315, 1, '219.91.232.222', '2013-03-08 15:31:30'),
(316, 1, '219.91.232.222', '2013-03-08 16:58:48'),
(317, 1, '210.89.56.250', '2013-03-09 09:08:31'),
(318, 1, '212.201.44.244', '2013-03-10 02:18:36'),
(319, 1, '118.186.196.76', '2013-03-10 10:43:41'),
(320, 1, '123.236.86.136', '2013-03-10 21:24:27'),
(321, 1, '1.22.81.247', '2013-03-11 10:57:29'),
(322, 1, '182.72.136.170', '2013-03-11 15:29:07'),
(323, 1, '219.77.125.158', '2013-03-11 19:02:42'),
(324, 1, '109.17.171.12', '2013-03-12 00:27:48'),
(325, 1, '67.169.54.218', '2013-03-12 04:22:39'),
(326, 1, '208.107.67.102', '2013-03-12 08:45:41'),
(327, 1, '101.0.59.138', '2013-03-12 09:21:03'),
(328, 1, '41.248.244.27', '2013-03-12 16:59:57'),
(329, 1, '101.0.59.179', '2013-03-13 09:20:41'),
(330, 1, '219.91.232.222', '2013-03-13 16:55:58'),
(331, 1, '123.236.87.123', '2013-03-13 22:48:37'),
(332, 1, '81.164.20.154', '2013-03-14 02:14:54'),
(333, 1, '81.164.20.154', '2013-03-14 04:01:30'),
(334, 1, '97.100.29.45', '2013-03-14 09:05:22'),
(335, 1, '219.91.232.222', '2013-03-14 15:25:19'),
(336, 1, '109.60.78.174', '2013-03-14 15:27:53'),
(337, 1, '219.91.232.222', '2013-03-14 16:00:18'),
(338, 1, '182.72.136.170', '2013-03-14 17:08:45'),
(339, 1, '164.215.31.28', '2013-03-14 20:43:14'),
(340, 1, '123.236.87.123', '2013-03-14 20:56:23'),
(341, 1, '123.236.87.123', '2013-03-14 21:48:51'),
(342, 1, '123.236.87.123', '2013-03-14 22:54:28'),
(343, 1, '192.193.172.171', '2013-03-15 01:02:29'),
(344, 1, '210.89.56.250', '2013-03-15 09:34:16'),
(345, 1, '123.236.87.123', '2013-03-15 21:47:25'),
(346, 1, '123.236.87.123', '2013-03-15 23:07:56'),
(347, 1, '210.89.56.250', '2013-03-16 08:44:30'),
(348, 1, '50.136.58.114', '2013-03-16 10:06:07'),
(349, 1, '82.176.137.49', '2013-03-16 16:56:56'),
(350, 1, '1.36.49.69', '2013-03-16 17:30:43'),
(351, 1, '80.43.184.78', '2013-03-16 20:39:39'),
(352, 1, '123.236.87.123', '2013-03-17 12:38:06'),
(353, 1, '123.236.87.123', '2013-03-17 19:09:06'),
(354, 1, '210.89.56.250', '2013-03-18 09:48:29'),
(355, 1, '2.28.138.242', '2013-03-18 21:51:37'),
(356, 1, '123.236.87.123', '2013-03-18 22:24:38'),
(357, 1, '95.23.239.246', '2013-03-19 05:38:52'),
(358, 1, '210.89.56.250', '2013-03-19 09:09:14'),
(359, 1, '92.64.88.54', '2013-03-19 18:43:51'),
(360, 1, '178.73.133.153', '2013-03-19 19:11:26'),
(361, 1, '123.236.87.123', '2013-03-19 21:28:16'),
(362, 1, '77.163.67.64', '2013-03-20 01:30:58'),
(363, 1, '1.22.81.192', '2013-03-20 09:02:06'),
(364, 1, '87.16.117.119', '2013-03-21 00:14:01'),
(365, 1, '212.66.74.132', '2013-03-21 05:56:16'),
(366, 1, '108.181.157.174', '2013-03-21 09:19:35'),
(367, 1, '1.22.82.248', '2013-03-21 09:23:48'),
(368, 1, '176.207.122.71', '2013-03-21 11:48:37'),
(369, 1, '1.22.83.240', '2013-03-22 09:35:09'),
(370, 1, '1.22.83.240', '2013-03-22 11:22:13'),
(371, 1, '41.222.211.64', '2013-03-22 14:01:27'),
(372, 1, '101.0.59.60', '2013-03-22 17:22:37'),
(373, 1, '101.0.59.60', '2013-03-22 18:19:56'),
(374, 1, '101.0.59.149', '2013-04-03 10:21:28'),
(375, 1, '1.22.81.254', '2013-04-06 17:22:23'),
(376, 1, '101.0.59.131', '2013-04-10 10:34:09'),
(377, 1, '210.89.56.198', '2013-06-06 15:50:20'),
(378, 1, '210.89.56.198', '2013-06-10 11:01:03'),
(379, 1, '210.89.56.198', '2013-06-10 12:39:03'),
(380, 1, '1.22.82.181', '2013-06-11 18:46:18'),
(381, 1, '1.22.80.253', '2013-06-13 17:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_commission_settings`
--

CREATE TABLE IF NOT EXISTS `affiliate_commission_settings` (
  `commission_settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `commission` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`commission_settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `affiliate_commission_settings`
--

INSERT INTO `affiliate_commission_settings` (`commission_settings_id`, `name`, `commission`, `type`, `active`) VALUES
(1, 'Sign Up', '2', '$', '1'),
(2, 'Pledge', '2.00', '%', '1'),
(3, 'Project Listing', '5', '%', '1');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_common_settings`
--

CREATE TABLE IF NOT EXISTS `affiliate_common_settings` (
  `common_settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_expire_time` int(50) NOT NULL DEFAULT '0',
  `commission_holding_period` int(50) NOT NULL DEFAULT '0',
  `pay_commission_pledge` int(50) NOT NULL DEFAULT '0',
  `pay_commission_project_listing` int(50) NOT NULL DEFAULT '0',
  `minimum_withdrawal_threshold` double(10,2) NOT NULL DEFAULT '0.00',
  `transaction_fee` double(10,2) NOT NULL DEFAULT '0.00',
  `fee_type` varchar(255) DEFAULT NULL,
  `affiliate_enable` int(20) NOT NULL DEFAULT '1',
  `affiliate_content` longtext,
  PRIMARY KEY (`common_settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `affiliate_common_settings`
--

INSERT INTO `affiliate_common_settings` (`common_settings_id`, `cookie_expire_time`, `commission_holding_period`, `pay_commission_pledge`, `pay_commission_project_listing`, `minimum_withdrawal_threshold`, `transaction_fee`, `fee_type`, `affiliate_enable`, `affiliate_content`) VALUES
(1, 24, 2, 1, 0, 2.00, 1.00, 'amount', 1, '<p><img src=KSYDOU/userfiles/image/aboutus.jpgKSYDOU width=KSYDOU209KSYDOU height=KSYDOU209KSYDOU hspace=KSYDOU5KSYDOU align=KSYDOUleftKSYDOU alt=KSYDOUKSYDOU />In posuere molestie augue eget tincidunt libero pellentesque nec. Aliquam erat volutpat. Aliquam a ligula nulla at suscipit odio. Nullam in nibh nibh eu bibendum ligula. Morbi eu nibh dui. Vivamus scelerisque fermentum lacus et tristique. Sed vulputate euismod metus porta feugiat. Nulla varius venenatis mauris nec ornare nisl bibendum id. Aenean id orci nisl in scelerisque nibh. Sed quam sapien tempus quis vestibulum eu sagittis varius sapien. Aliquam erat volutpat. Nulla facilisi. In egestas faucibus nunc et venenatis purus aliquet quis. Nulla eget arcu turpis. Nunc pellentesque eros quis neque sodales hendrerit. Donec eget nibh sit amet ipsum elementum vehicula. Pellentesque molestie diam vitae erat suscipit consequat. Pellentesque vel arcu sit amet metus mattis congue vitae eu quam.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_request`
--

CREATE TABLE IF NOT EXISTS `affiliate_request` (
  `affiliate_request_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `site_category` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_description` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `why_affiliate` varchar(255) DEFAULT NULL,
  `web_site_marketing` int(50) DEFAULT NULL,
  `search_engine_marketing` int(50) DEFAULT NULL,
  `email_marketing` int(50) DEFAULT NULL,
  `special_promotional_method` varchar(255) DEFAULT NULL,
  `special_promotional_description` varchar(255) DEFAULT NULL,
  `approved` int(50) NOT NULL DEFAULT '0' COMMENT '0=waiting,1=approved,2=rejected',
  `request_date` datetime NOT NULL,
  `request_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`affiliate_request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `affiliate_request`
--

INSERT INTO `affiliate_request` (`affiliate_request_id`, `user_id`, `site_category`, `site_name`, `site_description`, `site_url`, `why_affiliate`, `web_site_marketing`, `search_engine_marketing`, `email_marketing`, `special_promotional_method`, `special_promotional_description`, `approved`, `request_date`, `request_ip`) VALUES
(1, 5, '11', 'rockers', 'dfkd', 'http://www.rockersinfo.com', 'kfdkfdfd', 0, 1, 1, '', '', 1, '2012-09-18 18:08:51', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_user_earn`
--

CREATE TABLE IF NOT EXISTS `affiliate_user_earn` (
  `user_earn_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) DEFAULT NULL,
  `project_id` int(100) DEFAULT NULL,
  `perk_id` int(100) DEFAULT NULL,
  `referral_user_id` int(100) DEFAULT NULL,
  `transaction_id` int(100) DEFAULT NULL,
  `earn_amount` double(10,2) NOT NULL,
  `earn_date` datetime NOT NULL,
  `earn_status` int(20) NOT NULL DEFAULT '0' COMMENT '0=pending,1=completed,2=cancelled',
  PRIMARY KEY (`user_earn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_withdraw_request`
--

CREATE TABLE IF NOT EXISTS `affiliate_withdraw_request` (
  `affiliate_withdraw_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `withdraw_amount` double(10,2) NOT NULL,
  `withdraw_date` datetime NOT NULL,
  `withdraw_ip` varchar(255) DEFAULT NULL,
  `withdraw_status` int(50) NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved,2=success,3=reject,4=fail',
  PRIMARY KEY (`affiliate_withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `amazon`
--

CREATE TABLE IF NOT EXISTS `amazon` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `site_status` varchar(25) DEFAULT NULL,
  `aws_access_key_id` varchar(255) DEFAULT NULL,
  `aws_secret_access_key` varchar(255) DEFAULT NULL,
  `variable_fees` double(10,2) NOT NULL,
  `fixed_fees` double(10,2) NOT NULL,
  `preapproval` int(2) NOT NULL COMMENT 'instant = 0,preapprove =1',
  `gateway_status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `amazon`
--

INSERT INTO `amazon` (`id`, `site_status`, `aws_access_key_id`, `aws_secret_access_key`, `variable_fees`, `fixed_fees`, `preapproval`, `gateway_status`) VALUES
(1, 'sand box', 'AKIAJHRGJTWJ6TZAYFRA', 'mGEiblOo7xnZYOPlWHnmoo3/p5MRhicQBFm4CZ/X', 5.00, 5.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `automation_paypal`
--

CREATE TABLE IF NOT EXISTS `automation_paypal` (
  `automation_paypal_id` int(50) NOT NULL AUTO_INCREMENT,
  `site_status` varchar(255) NOT NULL,
  `application_id` varchar(255) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `paypal_username` varchar(255) NOT NULL,
  `paypal_password` varchar(255) NOT NULL,
  `paypal_signature` varchar(255) NOT NULL,
  `preapproval` int(20) NOT NULL DEFAULT '0' COMMENT 'instant = 0,preapprove =1',
  `fees_taken_from` varchar(255) NOT NULL,
  `project_id` int(50) DEFAULT NULL,
  `perk_id` int(50) DEFAULT '0',
  `donate_amount` double(10,2) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`automation_paypal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `automation_paypal`
--

INSERT INTO `automation_paypal` (`automation_paypal_id`, `site_status`, `application_id`, `paypal_email`, `paypal_username`, `paypal_password`, `paypal_signature`, `preapproval`, `fees_taken_from`, `project_id`, `perk_id`, `donate_amount`, `user_id`) VALUES
(1, 'sandbox', 'APP-80W284485P519543T', 'fadmin_1321252063_biz@gmail.com', 'fadmin_1321252063_biz_api1.gmail.com', '1321252087', 'AAQNP4IUOwIbkYjIuH2o4oHIZiVzAXXPY8ZxlXELGuNXh541QLWnI56m', 0, 'SENDER', 30, 26, 50.00, 5);

-- --------------------------------------------------------

--
-- Table structure for table `block_user`
--

CREATE TABLE IF NOT EXISTS `block_user` (
  `block_id` int(100) NOT NULL AUTO_INCREMENT,
  `block_user_id` int(100) NOT NULL,
  `block_by_user_id` int(100) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `block_user`
--

INSERT INTO `block_user` (`block_id`, `block_user_id`, `block_by_user_id`, `date_added`) VALUES
(4, 10, 5, '2012-10-19 16:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(555) NOT NULL,
  `blog_discription` text NOT NULL,
  `blog_category` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `no_one_comment` tinyint(4) NOT NULL,
  `allow_anonymous` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `feature_num` int(11) NOT NULL,
  `spec_category_1` int(11) NOT NULL,
  `spec_category_2` int(11) NOT NULL,
  `spec_category_3` int(11) NOT NULL,
  `spec_category_4` int(11) NOT NULL,
  `spec_category_5` int(11) NOT NULL,
  `slider_feature_num` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_discription`, `blog_category`, `publish`, `no_one_comment`, `allow_anonymous`, `user_id`, `status`, `is_featured`, `feature_num`, `spec_category_1`, `spec_category_2`, `spec_category_3`, `spec_category_4`, `spec_category_5`, `slider_feature_num`, `date_added`) VALUES
(1, 'Blog Post For Test', '<h2>&nbsp;</h2><div><div><p>Published: 09/02/2012 08:53 AM EDT on SPACE.com</p><p>A\n Dutch company that aims to land humans on Mars in 2023 as the vanguard \nof a permanent Red Planet colony has received its first funding from \nsponsors, officials announced this week.</p><p><a href="http://www.space.com/16300-mars-one-reality-show-colony.html" target="_blank">Mars One</a>&nbsp;plans\n to fund most of its ambitious activities via a global reality-TV media \nevent, which will follow the mission from the selection of astronauts \nthrough their first years on the Red Planet. But the sponsorship money \nis important, helping the company — which had been self-funded for the \nlast 18 months — get to that point, officials said Wednesday (Aug. 29).</p><p>"Receipt of initial sponsorship marks the next step to humans setting foot on&nbsp;<a href="http://www.space.com/47-mars-the-red-planet-fourth-planet-from-the-sun.html" target="_blank">Mars</a>,"\n Mars One founder and president Bas Lansdorp said in a statement. "A \nlittle more than a year ago we embarked down this path, calling upon \nindustry experts to share in our bold dream. Today, we have moved from a\n technical plan into the first stage of funding, giving our dream a \nfoundation in reality."</p><p>Initial sponsors include Byte Internet (a \nDutch Internet/Webhosting provider); Dutch lawfirm VBC Notarissen; Dutch\n consulting company MeetIn; New-Energy.tv (an independent Dutch web \nstation that focuses on energy and climate); and Dejan SEO (an \nAustralia-based search engine optimization firm). [<a href="http://www.space.com/16303-reality-tv-show-on-mars-to-follow-settlers-video.html" target="_blank">Video: ''Big Brother'' on Mars?</a>]</p><p>"Mars\n One is not just a daring project, but the core of what drives human \nspirit towards exploration of the unknown. We are privileged to be a \nsupporter of this incredible project," said Dan Petrovic, general \ndirector of Dejan SEO.</p>\n<p>Mars One aims to launch a series of\n robotic missions between 2016 and 2020 that will build a habitable \noutpost on the Red Planet. The first four astronauts will set foot on \nMars in 2023, and more will arrive every two years after that. There are\n no plans to return these pioneers to Earth.</p><p>Company officials say\n they''ve talked to a variety of private spaceflight firms around the \nworld and have secured at least one supplier for every major piece of \nthe&nbsp;<a href="http://www.space.com/15361-spacex-dragon-mars-settlement.html" target="_blank">Mars colony</a>&nbsp;mission.\n The corporate sponsorship money will be used mostly to fund the \nconceptual design studies provided by the aerospace suppliers, each of \nwhich require 500 to 2,500 man-hours to complete, officials said.</p><p>Mars\n One estimates that it will cost about $6 billion to put the first four \nhumans on the Red Planet. The company hopes the "Big Brother"-style \nreality show will pay most of these costs. The televised action is \nslated to begin in 2013, when Mars One begins the process of selecting \nits 40-person astronaut corps.</p><p><em>Follow SPACE.com for the latest in space science and exploration news on Twitter&nbsp;</em><a href="http://twitter.com/spacedotcom" target="_blank"><em>@Spacedotcom</em></a><em>&nbsp;and on&nbsp;</em><a href="http://www.facebook.com/pages/Spacecom/17610706465" target="_blank"><em>Facebook</em></a><em>.</em></p></div></div>  ', 4, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-12 11:41:36'),
(2, 'Blog for Kickstarterclone', '<p><a href="http://metapreneurship.net/wp-content/uploads/2012/03/944239_20080213_embed001.jpg"><img title="944239_20080213_embed001" src="http://metapreneurship.net/wp-content/uploads/2012/03/944239_20080213_embed001-300x168.jpg" height="168" width="300"></a>After\n a few years of working in the television industry, particularly on the \nplanet they call Hollywood, I was immersed in the "high concept pitch" \nlanguage of the entertainment industry. The practice is meant to impart \nyour idea to studio executives with nano-attention spans by equating the\n idea with another more familiar, popular and successful movie or TV \nshow:</p><dl><dd>"<a href="http://www.imdb.com/title/tt0105690/" target="_blank">It''s Die-Hard on a Submarine</a>"</dd><dd>"<a href="http://www.imdb.com/title/tt0429318/" target="_blank">It''s Big Brother with Obese People</a>"</dd><dd>"<a href="http://www.imdb.com/title/tt0078748/" target="_blank">It''s Jaws in Space</a>"</dd></dl><p>&nbsp; One of my favorite movies, Robert Altman''s <a href="http://www.imdb.com/title/tt0105151/" target="_blank">The Player</a>,\n nails this culture perfectly (though many think the movie is a parody -\n the depictions are really spot-on). In one scene, a pair of writers \nstart their pitch with "it''s Out of Africa meets Pretty Woman." Silicon \nValley has also adopted the practice:</p><dl><dd>"<a href="http://www.facebook.com" target="_blank">It''s MySpace for College Students</a>"</dd><dd>"<a href="http://www.linkedin.com" target="_blank">It''s Facebook for Professionals</a>"</dd><dd>"<a href="http://www.midomi.com/" target="_blank">It''s Google for Humming Songs</a>"</dd></dl><p>&nbsp;\n In fact, the practice has nearly replaced the standard elevator pitch \nfor startups. While I will cover the more serious and practical aspects \nof this technique in a future post, I wanted to showcase a site that \ntakes this concept to an absurd extreme: <a href="http://www.itsthisforthat.com/"><img title="Wait what does your startup do" src="http://metapreneurship.net/wp-content/uploads/2012/03/Wait-what-does-your-startup-do-300x115.png" height="115" width="300"></a> Go to the site "<a href="http://propelarizona.com/user/itsthisforthat.com" target="_blank">Wait what does your startup do</a>" (with the equally appropriate URL): <a href="http://www.itsthisforthat.com" target="_blank">itsthisforthat.com</a> - and start clicking as it produces a random "high concept pitch" for the typical high tech startup. &nbsp; &nbsp; &nbsp;&nbsp;</p>  ', 1, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-12 11:42:30'),
(3, 'Blog Post', '<p>Until now, whenever you bought a custom domain with us, or mapped a domain that you alreay owned, you’d get your blog fully accessible on both URLs (eg. http://mysite.blog.com and http://mysite.com). Still, most of you expected your new domain to completely override Blog.com’s URL so to be more visible in search engines and such.</p><p>From now on, when your domain is&nbsp;<strong>fully and correctly configured,&nbsp;</strong>we will automatically redirect your http://mysite.blog.com to http://mysite.com, making sure that the search engines are aware of this and they only index your custom domain! If there’s something wrong, then both will be available, so that you can fix the issue without your blog being down.</p>  ', 2, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-12 11:56:41'),
(4, 'Blog for Kickstarterclone', '<p>Until now, whenever you bought a custom domain with us, or mapped a domain that you alreay owned, you’d get your blog fully accessible on both URLs (eg. http://mysite.blog.com and http://mysite.com). Still, most of you expected your new domain to completely override Blog.com’s URL so to be more visible in search engines and such.</p><p>From now on, when your domain is&nbsp;<strong>fully and correctly configured,&nbsp;</strong>we will automatically redirect your http://mysite.blog.com to http://mysite.com, making sure that the search engines are aware of this and they only index your custom domain! If there’s something wrong, then both will be available, so that you can fix the issue without your blog being down.</p>  ', 2, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-12 11:57:28'),
(5, 'Blog for Kickstarterclone 2', '<p>Until now, whenever you bought a custom domain with us, or mapped a domain that you alreay owned, you’d get your blog fully accessible on both URLs (eg. http://mysite.blog.com and http://mysite.com). Still, most of you expected your new domain to completely override Blog.com’s URL so to be more visible in search engines and such.</p><p>From now on, when your domain is&nbsp;<strong>fully and correctly configured,&nbsp;</strong>we will automatically redirect your http://mysite.blog.com to http://mysite.com, making sure that the search engines are aware of this and they only index your custom domain! If there’s something wrong, then both will be available, so that you can fix the issue without your blog being down.</p>  ', 3, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-12 11:58:10'),
(6, 'Blog for Kickstarterclone 3', '<p>Until now, whenever you bought a custom domain with us, or mapped a domain that you alreay owned, you’d get your blog fully accessible on both URLs (eg. http://mysite.blog.com and http://mysite.com). Still, most of you expected your new domain to completely override Blog.com’s URL so to be more visible in search engines and such.</p><p>From now on, when your domain is&nbsp;<strong>fully and correctly configured,&nbsp;</strong>we will automatically redirect your http://mysite.blog.com to http://mysite.com, making sure that the search engines are aware of this and they only index your custom domain! If there’s something wrong, then both will be available, so that you can fix the issue without your blog being down.</p>  ', 2, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-12 11:58:52'),
(7, 'Blog for Kickstarterclone 4', '<p>Until now, whenever you bought a custom domain with us, or mapped a domain that you alreay owned, you’d get your blog fully accessible on both URLs (eg. http://mysite.blog.com and http://mysite.com). Still, most of you expected your new domain to completely override Blog.com’s URL so to be more visible in search engines and such.</p><p>From now on, when your domain is&nbsp;<strong>fully and correctly configured,&nbsp;</strong>we will automatically redirect your http://mysite.blog.com to http://mysite.com, making sure that the search engines are aware of this and they only index your custom domain! If there’s something wrong, then both will be available, so that you can fix the issue without your blog being down.</p>  ', 3, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-12 11:59:19'),
(8, 'Blog title', 'and more importantly, where you want to go. I would be the first person in my family to go to college and graduate, but really I just want to be the first to truly follow his dreams. I was fortunate enough to publish a short story of mine in our school’s newspaper. I’ll never forget when my mentor, Mrs. Smith, read the story and said, “You, Josh, are a writer.” I walked home smiling the whole way, saying over and over to myself, “I’m a writer. &nbsp;I’m a writer.” These are words I never thought I’d be able to say, and if I am given the opportunity to study in your program, I know I can continue to prove to you, to Mrs. Smith, to my grandmother, and to myself that I really am a writer.  ', 4, 0, 1, 0, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-18 17:56:45'),
(11, 'Next Chapter Book Club', 'The Next Chapter Book Club (NCBC) offers weekly opportunities for people with developmental disabilities (DD) to read and learn together, talk about books, and make friends in a relaxed, community setting. &nbsp;A program of<a href="http://nisonger.osu.edu/ncbc">The Ohio State University Nisonger Center</a>, NCBC was established in June 2002 to provide adolescents and adults with DD – regardless of reading ability – the chance to be members of a book club.&nbsp; NCBC has become the preeminent program of its kind.&nbsp; Today there are NCBC programs in over 100 cities across North America and Europe.  ', 4, 1, 0, 1, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-19 16:54:44'),
(20, 'NEW BLOG', '<p>Test</p>', 2, 1, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:32:00'),
(17, 'NEW BLOG', '<p>dfgg</p>', 5, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:08:09'),
(18, 'test', '<p>trtr</p>', 4, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:09:39'),
(19, 'NEW BLOG12121', '<p>r435</p>', 5, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:10:08'),
(21, 'Admin', '<p>&nbsp;Blog</p>', 5, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 14:00:49'),
(22, 'NEW BLOG', '<p>Test</p>', 5, 1, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:38:00'),
(23, 'Test1rererer', '<p>tytyt</p>', 4, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:38:23'),
(24, 'Tech', '<p>Test</p>', 5, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:39:14'),
(25, 'NEW BLOG', '<p>test</p>', 4, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:45:05'),
(26, 'NEW BLOG', '<p>hh</p>', 5, 0, 0, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:56:11'),
(27, 'NEW BLOG', '<p>h</p>', 3, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 11:56:50'),
(12, '32 Brilliant Design Examples of Book Logo', '<p>A perfectly planned logo design is able to efficiently make use of a simplistic symbol to give a strong impact to the people. The design of a logo performs a big aspect in the growth of the company. Since logos are designed to symbolize the company’s trademarks or corporate identities, it is disadvantageous to often change the logo designs. In continuation with our logo design inspiration post, we give you this time some high quality book logo examples. A book is a collection of documented and published sheets created from ink, sheets of paper and some other components. Books are usually employed in various form for studying,coaching as well as education organization. Books at the same time relate to the products of literary works. These days, the book we browse through computer or laptop is referred to as electronic book or ebook. E-Books can be read either with the aid of a computer or by way of a lightweight book display gadget called an e-book reader.</p><p>Here are the 32 Brilliant Designs of Book Logo for your inspiration. This type of book logo can be used for journals, reading and education organizations. Browse this list to make it easier for you to create some outstanding logo designs. Enjoy!Here are the 32 Brilliant Designs of Book Logo for your inspiration. This type of book logo can be used for journals, reading and education organizations. Browse this list to make it easier for you to create some outstanding logo designs. Enjoy!Here are the 32 Brilliant Designs of Book Logo for your inspiration. This type of book logo can be used for journals, reading and education organizations. Browse this list to make it easier for you to create some outstanding logo designs. Enjoy!Here are the 32 Brilliant Designs of Book Logo for your inspiration. This type of book logo can be used for journals, reading and education organizations. Browse this list to make it easier for you to create some outstanding logo designs. Enjoy!Here are the 32 Brilliant Designs of Book Logo for your inspiration. This type of book logo can be used for journals, reading and education organizations. Browse this list to make it easier for you to create some outstanding logo designs. Enjoy!          </p>  ', 3, 1, 0, 1, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2012-10-19 16:56:44'),
(14, 'NEW BLOG', '<p>blog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for testblog contest 20th dec for test</p>', 3, 1, 0, 0, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 10:59:36'),
(15, 'Test1', '<p>Test</p>', 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013-01-10 10:47:49'),
(29, 'sans-serif', '<p><span  #888888;"><strong>In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a transaction:In the pre-production environment, you may use the following test cards or IDs to simulate a</strong></span><strong> tra</strong><strong>nsaction:</strong></p>', 4, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2013-06-13 17:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `blog_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_category_name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`blog_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`blog_category_id`, `blog_category_name`, `active`) VALUES
(1, 'News', 1),
(2, 'Profile', 1),
(3, 'Data', 1),
(4, 'Tips', 1),
(5, 'Technology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE IF NOT EXISTS `blog_comment` (
  `blog_comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `blog_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `blog_comment` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`blog_comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`blog_comment_id`, `blog_id`, `user_id`, `blog_comment`, `date_added`) VALUES
(1, 7, 5, 'Until now, whenever you bought a custom domain with us, or mapped a domain that you alreay owned, you’d get your blog fully accessible on both URLs (eg. http://mysite.blog.com and http://mysite.com). Still, most of you expected your new domain to completely override Blog.com’s URL so to be more visible in search engines and such.', '2012-10-12 18:14:42'),
(2, 1, 5, 'Block Post For comment', '2012-10-12 18:29:51'),
(3, 13, 6, 'fsdfds', '2012-11-05 16:23:49'),
(4, 12, 6, 'dfds fs dfs df dsfds fds fds fds fds fds fds ', '2012-11-05 16:56:44'),
(5, 13, 6, 'hdghdfh hf d', '2012-11-07 11:20:13'),
(6, 0, 14, '0', '2012-11-10 16:24:31'),
(7, 13, 14, 'dsf', '2012-11-10 16:24:55'),
(8, 14, 9, 'comment for testcomment for testcomment for testcomment for testcomment for test', '2012-12-20 18:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `blog_setting`
--

CREATE TABLE IF NOT EXISTS `blog_setting` (
  `blog_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_post_limit` int(11) NOT NULL,
  `blog_status` int(11) NOT NULL,
  `admin_approve` tinyint(4) NOT NULL,
  PRIMARY KEY (`blog_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_setting`
--

INSERT INTO `blog_setting` (`blog_setting_id`, `blog_post_limit`, `blog_status`, `admin_approve`) VALUES
(1, 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `state_id`, `city_name`, `active`) VALUES
(1, 2, 1, 'Baroda', '1'),
(2, 2, 2, 'Amritsar', '1'),
(3, 2, 2, 'chandigarh', '1'),
(4, 2, 3, 'Patna', '1'),
(5, 2, 3, 'Rajgir', '1'),
(6, 2, 4, 'Cochin', '1'),
(7, 2, 4, 'Munnar', '1'),
(8, 2, 6, 'Cuttack', '1'),
(9, 2, 6, 'Bhubaneswar', '1'),
(10, 2, 5, 'Bangalore ', '1'),
(11, 2, 5, 'Mysore', '1'),
(12, 2, 10, 'Pune', '1'),
(13, 2, 10, 'Mumbai', '1'),
(14, 2, 1, 'Gandhinagar ', '1'),
(15, 2, 1, 'Ahmedabad', '1'),
(16, 2, 9, 'Panaji ', '1'),
(17, 2, 9, 'Ponda ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `comments` text,
  `status` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `comment_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `project_id`, `user_id`, `username`, `email`, `photo`, `comments`, `status`, `date_added`, `comment_ip`) VALUES
(1, 1, 2, '', '', '', 'dxdsd dsdsdsdsd', '0', '2012-09-20 11:16:01', '127.0.0.1'),
(4, 10, 5, NULL, NULL, NULL, 'dfg dsfgh dfgh tgh h ghhjhj ', '1', '2012-09-28 14:57:53', '210.89.56.250'),
(5, 10, 5, NULL, NULL, NULL, 'gf gh h ghg jh  ghgjg jg h gjh gjhg jhg jg jgjg ', '1', '2012-09-28 14:59:46', '210.89.56.250'),
(6, 10, 5, NULL, NULL, NULL, 'GHGHHHHHHGHGHGHGHGHGHGHGHGHGHGHGHGHGHGHGH\n\nFGGFGFGFGFGFGFGF', '1', '2012-09-28 16:51:58', '210.89.56.250'),
(7, 10, 5, NULL, NULL, NULL, 'GFHGDSFJFDGHSFAFGHSDGFHSDGFGHDSGH HGF HDSGF HSDGF HDSGFHGSDFGSDJFSHDGDSFJSD', '1', '2012-09-28 16:52:38', '210.89.56.250'),
(8, 10, 5, NULL, NULL, NULL, 'GFFHDGDHGDFHGHHDF', '1', '2012-09-28 16:53:18', '210.89.56.250'),
(9, 10, 5, NULL, NULL, NULL, 'FDGFDGDFGFDGFDGDFGFDGFDGFDG', '1', '2012-09-28 16:53:33', '210.89.56.250'),
(10, 10, 5, NULL, NULL, NULL, 'HFGHGFHGFHGHGHGHGF', '1', '2012-09-28 16:53:42', '210.89.56.250'),
(11, 10, 5, NULL, NULL, NULL, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '1', '2012-09-28 16:54:13', '210.89.56.250'),
(12, 15, 17, NULL, NULL, NULL, 'HGSDFH SGDFHSGDG F GFGHSD HSDGF HSGHSD FD', '0', '2012-09-28 16:56:20', '210.89.56.250'),
(13, 15, 17, NULL, NULL, NULL, 'FSDFDSFDSFDSFDSFDSFSDFSDFS', '0', '2012-09-28 16:56:42', '210.89.56.250'),
(14, 10, 5, NULL, NULL, NULL, 'fdgfgfgfgfgfg', '1', '2012-09-28 17:03:10', '210.89.56.250'),
(15, 18, 18, NULL, NULL, NULL, 'gfhgfhdghfdgfhgdhfgdhgfhdgggghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '0', '2012-09-29 10:13:39', '101.0.59.115'),
(16, 15, 5, NULL, NULL, NULL, 'dfdfffffffffffffffffffffffffffffffffffffffhghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '0', '2012-09-29 10:20:19', '101.0.59.115'),
(18, 18, 18, NULL, NULL, NULL, 'llllllllllllllllllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '1', '2012-09-29 10:26:38', '101.0.59.115'),
(20, 10, 18, NULL, NULL, NULL, 'hjhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '0', '2012-09-29 10:48:09', '101.0.59.115'),
(21, 18, 5, NULL, NULL, NULL, 'lkjlhk jlhkjlh klj khljk lkjl kjhjh\nhjh jhjhjh jhj jhjhj hhkjkjl\njhjhj hjjjjjjjjj jjjjj jjjjjjj jjjjjjjjjjjkjkkkkkkkkkk kkkk kkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk    jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '0', '2012-09-29 10:56:34', '101.0.59.115'),
(22, 18, 5, NULL, NULL, NULL, 'gfhjghjgjhjjhjhjhjhjhjhjhjhuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', '0', '2012-09-29 10:56:52', '101.0.59.115'),
(23, 18, 5, NULL, NULL, NULL, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '1', '2012-09-29 10:57:05', '101.0.59.115'),
(24, 18, 5, NULL, NULL, NULL, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk\nhhhhh\nh\nh\nh\nh\nh\n\nh\nh\nh\nh\n\nhh', '1', '2012-09-29 10:57:24', '101.0.59.115'),
(25, 18, 5, NULL, NULL, NULL, 'llllllllllllllllllllllllllllllllllllllllllllllllhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh  hhhhhhhhhhhhhhhhhhhhhhhh     hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhrtrtrt\n', '1', '2012-09-29 10:57:45', '101.0.59.115'),
(26, 18, 18, NULL, NULL, NULL, 'gdhfghfgdhfghdgfhdghfgdhgfhdgfhdgfhdgfhdgfhdgfhdghgdyetyegehdghfgshfsdfgfhgfhagfsdfdsfdsfdfdsfdsfdsfdsfdsf', '1', '2012-09-29 10:59:00', '101.0.59.115'),
(27, 18, 18, NULL, NULL, NULL, 'llklklklklklklklkjhjhjjhgjfghfgasdfghjkhghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '1', '2012-09-29 10:59:35', '101.0.59.115'),
(28, 18, 18, NULL, NULL, NULL, 'kjkkkjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '1', '2012-09-29 10:59:58', '101.0.59.115'),
(30, 10, 18, NULL, NULL, NULL, 'DGFDGFDGFGFGFFFFFFFFFFFFF', '0', '2012-09-29 12:40:18', '101.0.59.115'),
(34, 11, 6, NULL, NULL, NULL, 'nice test comment', '1', '2012-10-11 10:17:05', '1.22.81.37'),
(35, 11, 6, NULL, NULL, NULL, 'etetrd trd ftfgd f', '1', '2012-10-13 13:29:17', '1.22.80.106'),
(36, 11, 6, NULL, NULL, NULL, 'Update Post', '1', '2012-10-13 18:35:37', '180.188.225.18'),
(37, 2, 9, NULL, NULL, NULL, 'Hello list out the comments...', '0', '2012-10-20 11:44:14', '1.22.80.131'),
(38, 2, 9, NULL, NULL, NULL, 'Hello list out the comments...', '0', '2012-10-20 11:44:29', '1.22.80.131'),
(39, 2, 9, NULL, NULL, NULL, 'Hello list out the comments...', '0', '2012-10-20 11:44:32', '1.22.80.131'),
(40, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:44:55', '1.22.80.131'),
(41, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:01', '1.22.80.131'),
(42, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:02', '1.22.80.131'),
(43, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:04', '1.22.80.131'),
(44, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:06', '1.22.80.131'),
(45, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:08', '1.22.80.131'),
(46, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:14', '1.22.80.131'),
(47, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:18', '1.22.80.131'),
(48, 2, 9, NULL, NULL, NULL, 'another comment for testing', '0', '2012-10-20 11:45:20', '1.22.80.131'),
(49, 2, 9, NULL, NULL, NULL, 'testing comment ', '0', '2012-10-20 11:46:45', '1.22.80.131'),
(52, 28, 9, NULL, NULL, NULL, 'Hello have you teh getting the amount of donation???\n', '0', '2012-10-30 13:01:34', '1.22.80.239'),
(53, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:07:52', '1.22.80.239'),
(54, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:07:57', '1.22.80.239'),
(55, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:07:58', '1.22.80.239'),
(56, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:07:59', '1.22.80.239'),
(57, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:07:59', '1.22.80.239'),
(58, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:08:00', '1.22.80.239'),
(59, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:08:00', '1.22.80.239'),
(60, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:08:01', '1.22.80.239'),
(61, 28, 9, NULL, NULL, NULL, 'Hello message for testing from madhuri on project green car innovation\n', '0', '2012-10-30 13:08:02', '1.22.80.239'),
(62, 28, 9, NULL, NULL, NULL, 'green car innovation comment from madhuri..', '0', '2012-10-30 13:16:57', '1.22.80.239'),
(63, 28, 9, NULL, NULL, NULL, 'Add comment for testing 431....', '0', '2012-10-30 16:31:44', '49.249.1.108'),
(64, 28, 9, NULL, NULL, NULL, 'Add comment for testing 431....', '0', '2012-10-30 16:32:07', '49.249.1.108'),
(65, 28, 9, NULL, NULL, NULL, 'Add comment for testing 435....', '0', '2012-10-30 16:35:19', '49.249.1.108'),
(66, 28, 9, NULL, NULL, NULL, 'Add comment for testing 435....', '0', '2012-10-30 16:35:24', '49.249.1.108'),
(67, 28, 9, NULL, NULL, NULL, 'Add comment for testing 435....', '0', '2012-10-30 16:35:35', '49.249.1.108'),
(68, 28, 9, NULL, NULL, NULL, 'Add comment for testing 435....', '0', '2012-10-30 16:35:36', '49.249.1.108'),
(69, 28, 9, NULL, NULL, NULL, 'comment for testing on green car 608', '0', '2012-10-30 18:08:54', '49.249.18.145'),
(70, 36, 6, NULL, NULL, NULL, 'gsdgzshzdshzshzdshzdshdshf', '0', '2012-10-31 15:56:30', '1.22.80.250'),
(71, 41, 6, NULL, NULL, NULL, 'This project will be funded till November 15 , 3:51pm. How Kickstarterclone works.', '1', '2012-11-05 15:14:45', '1.22.80.224'),
(72, 41, 6, NULL, NULL, NULL, 'Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello ', '1', '2012-11-05 15:45:38', '1.22.80.224'),
(73, 80, 14, NULL, NULL, NULL, 'Comment for testing purposeComment for testing purposeComment for testing purposeComment for testing purposeComment for testing purpose', '1', '2012-12-28 13:06:30', '1.22.81.237'),
(74, 80, 14, NULL, NULL, NULL, 'second comment for testsecond comment for testsecond comment for testsecond comment for testsecond comment for test', '1', '2012-12-28 13:07:01', '1.22.81.237'),
(75, 80, 9, NULL, NULL, NULL, 'hello tsinggg', '0', '2013-01-31 12:52:22', '1.22.81.237');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  `fips` varchar(255) DEFAULT NULL,
  `iso2` varchar(255) DEFAULT NULL,
  `iso3` varchar(255) DEFAULT NULL,
  `ison` varchar(255) DEFAULT NULL,
  `internet` varchar(255) DEFAULT NULL,
  `capital` varchar(255) DEFAULT NULL,
  `map_ref` varchar(255) DEFAULT NULL,
  `singular` varchar(255) DEFAULT NULL,
  `plural` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `population` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text,
  `active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=210 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `fips`, `iso2`, `iso3`, `ison`, `internet`, `capital`, `map_ref`, `singular`, `plural`, `currency`, `currency_code`, `population`, `title`, `comment`, `active`) VALUES
(1, 'USA', '', '', '', '', '', '', '', '', '', '', '$', '', '', '', '1'),
(2, 'India', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(3, 'Japan', '', '', '', '', '', '', '', '', '', '', '#', '', '', '', '1'),
(4, 'Qatar', '', '', '', '', '', 'doha', '', '', '', 'Riyal', '', '20000000', '', '', '1'),
(5, 'Unitedkingdom', '', '', '', '', '', 'London', '', '', '', '', '', '30000000', '', '', '1'),
(6, 'Russia', '', '', '', '', '', '', '', '', '', '', '', '50000000', '', '', '1'),
(7, 'Fiji', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(8, 'Afghanistan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(9, 'Albania', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(10, 'Algeria', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(11, 'Andorra', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(12, 'Angola', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(13, 'Antigua and Barbuda', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(14, 'Argentina', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(15, 'Armenia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(18, 'Australia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(19, 'Austria', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(20, 'Azerbaijan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(21, 'Bahamas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(22, 'Bahrain', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(23, 'Bangladesh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(24, 'Barbados', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(26, 'Belarus', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(27, 'Belgium', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(28, 'Belize', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(29, 'Benin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(30, 'Bhutan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(31, 'Bolivia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(32, 'Bosnia and Herzegovina', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(33, 'Botswana', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(34, 'Brazil', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(35, 'Brunei ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(36, 'Bulgaria', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(37, 'Burkina Faso', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(38, 'Burma', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(39, 'Burundi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(40, 'Cambodia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(41, 'Cameroon', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(42, 'Canada', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(43, 'Cape Verde', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(44, 'Central African Republic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(45, 'Chad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(46, 'Chile', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(47, 'China', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(48, 'Colombia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(49, 'Comoros', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(50, 'Congo ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(51, 'Costa Rica', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(52, 'Croatia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(53, 'Cuba', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(54, 'Cyprus', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(55, 'Czech Republic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(56, 'Denmark', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(57, 'Djibouti', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(58, 'Dominica', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(59, 'Dominican Republic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(60, 'Ecuador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(61, 'Egypt', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(62, 'El Salvador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(63, 'Equatorial Guinea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(64, 'Eritrea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(65, 'Estonia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(66, 'Ethiopia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(67, 'Finland', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(68, 'France', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(69, 'Gabon', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(70, 'Gambia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(71, 'Georgia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(72, 'Germany', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(73, 'Ghana', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(74, 'Grenada', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(75, 'Guatemala', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(76, 'Guinea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(77, 'Guinea-Bissau', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(78, 'Guyana', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(79, 'Haiti', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(80, 'Holy See', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(81, 'Holy See', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(82, 'Honduras', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(83, 'Hong Kong', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(84, 'Hungary', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(85, 'Iceland', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(86, 'Indonesia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(87, 'Iran', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(88, 'Iraq', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(89, 'Ireland', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(90, 'Italy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(91, 'Jamaica', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(92, 'Jordan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(93, 'Kazakhstan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(94, 'Kenya', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(95, 'Kiribati', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(96, 'Korea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(97, 'Kosovo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(98, 'Kuwait', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(99, 'Kyrgyzstan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(100, 'Laos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(101, 'Latvia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(102, 'Lebanon', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(103, 'Lesotho', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(104, 'Liberia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(105, 'Libya', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(106, 'Liechtenstein', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(107, 'Lithuania', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(108, 'Luxembourg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(109, 'Macau', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(110, 'Macedonia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(111, 'Madagascar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(112, 'Malawi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(113, 'Malaysia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(114, 'Maldives', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(115, 'Mali', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(116, 'Malta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(117, 'Uruguay', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(118, 'Marshall Islands', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(119, 'Mauritania', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(120, 'Mauritius', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(121, 'Mexico', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(122, 'Micronesia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(123, 'Moldova', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(124, 'Monaco', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(125, 'Mongolia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(126, 'Montenegro', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(127, 'Morocco', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(128, 'Mozambique', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(129, 'Namibia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(130, 'Nauru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(131, 'Nepal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(132, 'Netherlands', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(133, 'Netherlands Antilles', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(134, 'New Zealand', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(135, 'Nicaragua', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(136, 'Niger', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(137, 'Nigeria', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(138, 'North Korea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(139, 'Norway', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(140, 'Oman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(141, 'Pakistan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(142, 'Palau', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(143, 'Palestinian Territories', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(144, 'Panama', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(145, 'Papua New Guinea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(146, 'Paraguay', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(147, 'Peru', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(148, 'Philippines', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(149, 'Poland', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(150, 'Portugal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(152, 'Romania', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(154, 'Rwanda', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(155, 'Saint Kitts and Nevis', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(156, 'Saint Lucia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(157, 'Saint Vincent and the Grenadines', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(158, 'Samoa ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(159, 'San Marino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(160, 'Sao Tome and Principe', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(161, 'Saudi Arabia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(162, 'Senegal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(163, 'Serbia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(164, 'Seychelles', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(167, 'Sierra Leone', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(169, 'Slovakia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(170, 'Slovenia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(171, 'Solomon Islands', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(172, 'Somalia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(173, 'South Africa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(174, 'South Korea', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(175, 'South Sudan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(176, 'Spain ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(177, 'Sri Lanka', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(178, 'Sudan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(179, 'Suriname', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(180, 'Swaziland ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(181, 'Sweden', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(182, 'Switzerland', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(183, 'Syria', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(184, 'Taiwan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(185, 'Tajikistan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(186, 'Tanzania', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(187, 'Thailand ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(188, 'Timor-Leste', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(189, 'Togo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(190, 'Tonga', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(191, 'Trinidad and Tobago', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(193, 'Tunisia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(194, 'Turkey', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(195, 'Turkmenistan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(196, 'Tuvalu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(197, 'Uganda', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(198, 'Ukraine', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(199, 'United Arab Emirates', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(200, 'Uzbekistan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(201, 'Vanuatu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(202, 'Venezuela', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(203, 'Vietnam', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(204, 'Yemen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(205, 'Zambia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(206, 'Zimbabwe', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(207, 'singapore', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(208, 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0'),
(209, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `cronjob`
--

CREATE TABLE IF NOT EXISTS `cronjob` (
  `cronjob_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cronjob` varchar(255) DEFAULT NULL,
  `date_run` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`cronjob_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cronjob`
--

INSERT INTO `cronjob` (`cronjob_id`, `user_id`, `cronjob`, `date_run`, `status`) VALUES
(1, 1, 'set_auto_ending', '2013-02-19 09:02:34', 1),
(2, 1, 'affiliate_update_earn_status', '2013-02-19 09:02:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `crons`
--

CREATE TABLE IF NOT EXISTS `crons` (
  `crons_id` int(11) NOT NULL AUTO_INCREMENT,
  `cron_function` varchar(255) DEFAULT NULL,
  `cron_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`crons_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `crons`
--

INSERT INTO `crons` (`crons_id`, `cron_function`, `cron_title`) VALUES
(1, 'set_auto_ending', 'Preapprove the Ended Project'),
(2, 'affiliate_update_earn_status', 'Affiliate Update Earn Status');

-- --------------------------------------------------------

--
-- Table structure for table `curated`
--

CREATE TABLE IF NOT EXISTS `curated` (
  `curated_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) DEFAULT '0',
  `curated_title` varchar(255) NOT NULL,
  `url_curated_title` varchar(255) NOT NULL,
  `curated_image` varchar(255) NOT NULL,
  `curated_description` longtext NOT NULL,
  `curated_active` int(20) NOT NULL DEFAULT '0' COMMENT '0=inactive,1=active',
  `curated_ip` varchar(255) NOT NULL,
  `curated_date` datetime NOT NULL,
  PRIMARY KEY (`curated_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `curated`
--

INSERT INTO `curated` (`curated_id`, `user_id`, `curated_title`, `url_curated_title`, `curated_image`, `curated_description`, `curated_active`, `curated_ip`, `curated_date`) VALUES
(3, 1, 'iWeb Solution', 'iweb-solution', '87131curated.png', 'Get latest news and updates on <strong>Latest Technology Updates</strong>, Top Sites, Clone Sites, Top Gadget News, <span style="background-color:#339933;color:#ffff66;text-decoration:underline">Guest Blog</span>, HTML5, jQuery, PHP, Codeigniter, AJAX, Paypal API, Google Apps, Google Map, Social Media Marketing, Tips on Technology | iWeb Solution&nbsp;<div><br></div><div> <span style="color:#cc3300"><strong>Latest Technology Updates</strong></span>, Top Sites, Clone Sites, Top Gadget News, Guest Blog, HTML5, jQuery, PHP, Codeigniter, AJAX, Paypal API, Google Apps, Google Map, Social Media Marketing, Tips on Technology | iWeb Solution  &nbsp;</div>  ', 1, '127.0.0.1', '2012-09-21 17:40:38'),
(4, 0, 'You tube', 'you-tube', '32321curated.jpg', 'You tube  ', 1, '127.0.0.1', '2012-09-22 17:50:40'),
(5, 0, 'eBay', 'ebay', '34333curated.png', 'eBay  ', 1, '127.0.0.1', '2012-09-22 17:50:51'),
(6, 0, 'alisa', 'alisa', '79201curated.jpg', 'vivek.rockersinfo@gmail.comvivek.rockersinfo@gmail.comvivek.rockersinfo@gmail.comvivek.rockersinfo@gmail.comvivek.rockersinfo@gmail.comvivek.rockersinfo@gmail.comvivek.rockersinfo@gmail.comvivek.rockersinfo@gmail.com  ', 1, '86.97.248.72', '2013-01-05 19:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `curated_project`
--

CREATE TABLE IF NOT EXISTS `curated_project` (
  `curated_project_id` int(100) NOT NULL AUTO_INCREMENT,
  `curated_id` int(100) NOT NULL,
  `project_id` int(100) NOT NULL,
  `curated_project_date` datetime NOT NULL,
  `curated_project_approve` int(20) NOT NULL DEFAULT '0' COMMENT '0=not approve,1=approve',
  PRIMARY KEY (`curated_project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `curated_project`
--

INSERT INTO `curated_project` (`curated_project_id`, `curated_id`, `project_id`, `curated_project_date`, `curated_project_approve`) VALUES
(4, 3, 2, '2012-09-22 17:52:53', 0),
(5, 3, 3, '2012-09-22 17:55:30', 0),
(6, 3, 4, '2012-09-22 17:55:37', 0),
(7, 3, 1, '2012-09-22 17:55:41', 0),
(8, 4, 6, '2012-09-24 11:05:17', 0),
(31, 6, 76, '2013-04-06 17:57:01', 1),
(30, 6, 77, '2013-04-06 17:57:01', 1),
(29, 6, 78, '2013-04-06 17:57:01', 1),
(28, 6, 79, '2013-04-06 17:57:01', 1),
(27, 6, 80, '2013-04-06 17:57:01', 1),
(26, 6, 81, '2013-04-06 17:57:01', 1),
(25, 6, 87, '2013-04-06 17:57:01', 1),
(24, 6, 95, '2013-04-06 17:57:01', 1),
(23, 6, 101, '2013-04-06 17:57:01', 1),
(32, 6, 72, '2013-04-06 17:57:01', 1),
(33, 6, 56, '2013-04-06 17:57:01', 1),
(34, 6, 41, '2013-04-06 17:57:01', 1),
(35, 5, 101, '2013-04-06 17:57:55', 1),
(36, 5, 95, '2013-04-06 17:57:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency_code`
--

CREATE TABLE IF NOT EXISTS `currency_code` (
  `currency_code_id` int(50) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) DEFAULT NULL,
  `currency_code` varchar(50) DEFAULT NULL,
  `currency_symbol` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`currency_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `currency_code`
--

INSERT INTO `currency_code` (`currency_code_id`, `currency_name`, `currency_code`, `currency_symbol`) VALUES
(1, 'Australian Dollar', 'AUD', '$'),
(2, 'Canadian Dollar', 'CAD', '$'),
(3, 'Czech Koruna', 'CZK', 'kc'),
(4, 'Danish Krone', 'DKK', 'kr'),
(5, 'Euro', 'EUR', '&euro;'),
(6, 'Hong Kong Dollar', 'HKD', '$'),
(7, 'Hungarian Forint', 'HUF', 'Ft'),
(8, 'Israeli New Sheqel', 'ILS', ' &#8362;'),
(9, 'Japanese Yen', 'JPY', '&yen;'),
(10, 'Mexican Peso', 'MXN', '$'),
(11, 'Norwegian Krone', 'NOK', 'kr'),
(12, 'New Zealand Dollar', 'NZD', '$'),
(13, 'Polish Zloty', 'PLN', 'zt'),
(14, 'Pound Sterling', 'GBP', '&pound;'),
(15, 'Singapore Dollar', 'SGD', '$'),
(16, 'Swedish Krona', 'SEK', 'kr'),
(17, 'Swiss Franc', 'CHF', 'CHF'),
(18, 'U.S. Dollar', 'USD', '$');

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

CREATE TABLE IF NOT EXISTS `email_setting` (
  `email_setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `mailer` varchar(50) DEFAULT NULL,
  `sendmail_path` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(50) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_email` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`email_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`email_setting_id`, `mailer`, `sendmail_path`, `smtp_port`, `smtp_host`, `smtp_email`, `smtp_password`) VALUES
(1, 'sendmail', '/usr/sbin/sendmail', '25', 'smtp@groupfund.me', 'mail.groupfund.me', 'smtp2123');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) DEFAULT NULL,
  `from_address` varchar(255) DEFAULT NULL,
  `reply_address` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_template_id`, `task`, `from_address`, `reply_address`, `subject`, `message`) VALUES
(1, 'Welcome Email', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Welcome to FundraisingScript', 'Hello {user_name},{break}{break}\n\n{user_name} welcome to FundraisingScript. Your account is activated successfully. \n\n{break}\n\nFundraisingscript Team\nThank You.'),
(2, 'New User Join', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Sign up successfully on Fundraisingscript', 'Hello {user_name},\n{break}\nYou have successfully sign up with Fundraisingscript.{break}\nYour Email Address {email} and Password is {password}.{break}\nNow you can activate your account  from {login_link}.\n\n{break}{break}\n\nFundraisingscript Team{break}\nThank You.'),
(3, 'Forgot Password', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Forgot Password Request, Fundraisingscript', 'Hello {user_name},\n\nYour request has been submitted to Fundraisingscript.{break}\nYour Email Address {email} and Password is {password}.{break}\nNow you can take login from {login_link}.\n\n{break}\n\nFundraisingscript Team{break}\nThank You.'),
(4, 'Admin User Active', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Your Account Activated, Fundraisingscript', 'Hello {user_name},\n\nYour account has been activated by Administrator.{break}\nYour Email Address {email} and Password is {password}.{break}\nNow you can take login from {login_link}.\n\n{break}\n\nFundraisingscript Team\nThank You.'),
(5, 'Admin User Deactivate', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Your Account Deactivated, Fundraisingscript', 'Hello {user_name},\n\nYour account has been deactivated by Administrator.{break}\n\nFundraisingscript Team\nThank You.'),
(6, 'Admin User Delete', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Your Account Delete, Fundraisingscript', 'Hello {user_name},\n\nYour account has been deleted by Administrator.{break}\n\nFundraisingscript Team\nThank You.'),
(7, 'Contact Us', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Inquiry from Fundraisingscript', 'Hello Administrator,{break}\n\n\nyou have new inquiry by {name},{email}.{break}\n\nMessage : {message}.{break}{break}\n\n\nSystem Administrator{break}\nThank You.\n'),
(8, 'New Project Successful Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Project Successfully submitted', 'Hello {user_name},{break}\n\nYou have successfully submitted New Project {project_name}.{break}\nYou can see the project page from the following link : {break}{project_page_link}.\n{break}{break}\n\nFundraisingscript Team{break}\n\nThank You.'),
(9, 'Admin Project Activate Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Project activated by administrator, Fundraisingscript', 'Hello {user_name},\n\nProject {project_name} has been approved by administrator.\nYou can see the project page from the following link : {project_page_link}.\n{break}\nPlease configure your paypal email address otherwise no one can give you a donation on this project.\n{break}\n\nFundraisingscript Team\n\nThank You.'),
(10, 'Admin Project Inctivate Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Project deactivated by administrator, Fundraisingscript', 'Hello {user_name},\n\nProject {project_name} has been declined by administrator.\n{break}\nFundraisingscript Team\n\nThank You.'),
(11, 'Admin Project Delete Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Project deleted by administrator, Fundraisingscript', 'Hello {user_name},{break}{break}\n\nProject {project_name} has been deleted by administrator.\n{break}\nFundraisingscript Team{break}\n\nThank You.'),
(12, 'New Comment Admin Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Comment posted on project, Funraisingscript', 'Hello Administrator,\n\nNew comment posted by {comment_user_name} on Project {project_name}.\n{break}\nComment : {comment} \n{break}\nComment Profile Link : {comment_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(13, 'New Comment Owner Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Comment posted on your project, Funraisingscript', 'Hello {user_name},\n\nNew comment posted by {comment_user_name} on Project {project_name}.\n{break}\nComment : {comment} \n{break}\nComment Profile Link : {comment_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(14, 'New Comment Poster Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Comment posted on project, Funraisingscript', 'Hello {user_name},\n\nNew comment posted by {comment_user_name} on Project {project_name}.\n{break}\nComment : {comment} \n{break}\nComment Profile Link : {comment_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(15, 'New Fund Admin Notification', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Fund Added on project, Fundraisingscript', 'Hello Administrator,{break}\n\nNew Fund({donote_amount}) added on the {project_name} {project_page_link} by {donor_name} {donor_profile_link}.\n\n{break}\nSystem Administrator\nThank You.'),
(16, 'New Fund Owner Notification', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Fund Added on project, Fundraisingscript', 'Hello {user_name},{break}\n\nNew Fund({donote_amount}) added on the {project_name} {project_page_link} by {donor_name} {donor_profile_link}.\n\n{break}\nFundraisingscript Team\nThank You.'),
(17, 'New Fund Donor Notification', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Fund Added on project, Fundraisingscript', 'Hello {donor_name},{break}\n\nNew Fund({donote_amount}) added on the {project_name} {project_page_link}.\n\n{break}\nFundraisingscript Team\nThank You.'),
(18, 'New Project Draft Successful Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Project Saved In Draft Successfully', 'Hello {user_name},\n\nYou have successfully Saved your project {project_name}, not submitted.{break}\nYou can view your project page using the following link : {project_page_link}.\n\n\nThank you\nFundraisingScript Team'),
(19, 'New Project Post Admin Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Project Post on FundraisingScript', 'Hello Administrator,{break}\n\nNew Project {project_name} {project_page_link} by User {user_name} {user_profile_link}{break}{break}\n\nFundraisingscript Team{break}\nThank You.'),
(20, 'Project Finish Admin Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Project Finish Alert', 'Hello Administrator,\n{break}{break}\nProject : {project_name}{project_page_link}.\n{break}{break}\nSummary : {project_summary}\n{break}{break}\nCreator : {user_name}{user_profile_link}\n{break}{break}\nGoal : {project_goal}.{break}{break}\nRaise : {project_total_raise}.{break}{break}\n\nBackers : {break}\n{backer_list}{break}{break}\n\nFundraisingScript Team,\nThank You\n'),
(21, 'Project Finish Owner Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Project Finish Alert', 'Hello {user_name},\n{break}{break}\nProject : {project_name}{project_page_link}.\n{break}{break}\nSummary : {project_summary}\n{break}{break}\nCreator : {user_name}{user_profile_link}\n{break}{break}\nGoal : {project_goal}.{break}{break}\nRaise : {project_total_raise}.{break}{break}\n\nBackers : {break}\n{backer_list}{break}{break}\n\nFundraisingScript Team,\nThank You\n'),
(22, 'Project Finish Donor Alert', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Project Finish Alert', 'Hello {donor_name},\n{break}{break}\nProject : {project_name}{project_page_link}.\n{break}{break}\nSummary : {project_summary}\n{break}{break}\nCreator : {user_name}{user_profile_link}\n{break}{break}\nGoal : {project_goal}.{break}{break}\nRaise : {project_total_raise}.{break}{break}\n\nBackers : {break}\n{own_backer}{break}{break}\n\nFundraisingScript Team,\nThank You\n'),
(23, 'Change Password', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Change Password Request, Fundraisingscript', 'Hello {user_name},{break}\n\nYour request has been submitted to Fundraisingscript.{break}\nYour Password is updated successfully. New login details are as below: {break}\nEmail Address: {email} {break}Password: {password}.{break}\n{break}\n{break}\n\nFundraisingscript Team{break}\nThank You.'),
(24, 'Donation Cancel User Notification', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Fund cancelled on Project', 'Hello {user_name},{break}\n\nFund of ({donote_amount}) on the {project_name} {project_page_link} by {donor_name} {donor_profile_link} is cancelled.\n\n\n{break}\nFundraisingscript Team{break}\nThank You.'),
(25, 'Donation Cancel Donor Notification', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Fund cancelled on Project', 'Hello {donor_name},{break}\n\nFund of ({donote_amount}) on the {project_name} {project_page_link} is cancelled.\n\n\n{break}\nFundraisingscript Team{break}\nThank You.'),
(26, 'Donation Cancel Admin Notification', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Fund cancelled on Project', 'Hello Administrator,{break}\n\nFund of ({donote_amount}) on the {project_name} {project_page_link} by {donor_name} {donor_profile_link} is cancelled.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(27, 'Project Cancelled Admin Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project cancelled on Fundraising Script', 'Hello Administrator,{break}\n\nThe {project_name} {project_page_link}  is cancelled as its end date is reached and it is not successful.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(28, 'Project Cancelled User Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project cancelled on Fundraising Script', 'Hello {user_name},{break}\n\nThe {project_name} {project_page_link}  is cancelled as its end date is reached and it is not successful.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(29, 'Project Successful Admin Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project successful on Fundraising Script', 'Hello Administrator,{break}\n\nThe {project_name} {project_page_link}  is successful as its end date is reached and it has achieved the successful goal amount.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(30, 'Project Successful User Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project successful on Fundraising Script', 'Hello {user_name},{break}\n\nThe {project_name} {project_page_link}  is successful as its end date is reached and it has achieved the successful goal amount.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(31, 'Wallet Withdraw Request', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Wallet Withdraw Request', 'Hello Administrator,{break}\n\nyou have new withdraw request by {name}.{break}\nThe details are as below : {break}\n{details}{break}{break}\n\nSystem Administrator{break}\nThank You.\n\n'),
(32, 'project new updates', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', '(project_name) project new updates', 'Hello {user_name}\n{break}\n    New updates from your donate project {break}\n\n    updates:{project_update}{break}\n\n{break}\nSystem Administrator{break}\nThank You.'),
(33, 'Email Invitation', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'Join me on Fundraising Script', 'Hi,{break}\n\n{login_user_name} has been using Fundraising Script, a place to discover, donate and post or share campaigns, and wants you to join and {invitation_link}start funding{end_invitation_link}.{break}{break} {invitation_link}Accept Invite{end_invitation_link}{break}{break}\n\n{message}{break}\n\nFundraisingscript Team{break}\n\nThank You.'),
(34, 'New Message(admin)', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', '{project_title}', 'Hello Administrator,\n\nNew message from\n{message_user_name} on Project {project_name}.\n{break}\nProject Link : {project_link}\n{break}\nContent : {content} \n{break}\nProfile Link : {message_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(35, 'New Message(user)', 'mihir.test.rockersinfo@gmail.com', 'mihir.test.rockersinfo@gmail.com', 'New Message', 'Hello {user_name},{break}\r\n\r\nNew message from\r\n{message_user_name} on Project {project_name}.\r\n{break}\r\nProject Link : {project_link}\r\n{break}\r\nContent : {content} \r\n{break}\r\nProfile Link : {message_user_profile_link}\r\n{break}\r\nFundraisingscript Team\r\n\r\nThank You.'),
(36, 'Message user profile(Admin)', 'mihir.test.rockersinfo@gmail.com', 'mihir.test.rockersinfo@gmail.com', 'New Message', 'Hello {user_name},{break}\r\n\r\nNew message from\r\n{message_user_name} {break} \r\n\r\n\r\nContent : {content} \r\n{break}\r\nProfile Link : {message_user_profile_link}\r\n{break}\r\nFundraisingscript Team\r\n\r\nThank You.'),
(37, 'Message user profile(User)', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Message', 'Hello {user_name},{break}\n\nNew message from\n{message_user_name} {break} \n\n\nContent : {content} \n{break}\nProfile Link : {message_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(38, 'User Follow', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'User Follow', 'Hello {user_name},\n{break}\n{follow_user_name} follows you\n{break}\n{follow_user_profile_link}\n{break}\n\nKickstarter Clone Team\n{break}\nThank You.'),
(39, 'New Fund Follower Notification', 'vivek.rockersinfo@gmail.com', 'vivek.rockersinfo@gmail.com', 'New Fund Added on project, Fundraisingscript', 'Hello {follower_name},{break}\r\n\r\nNew Fund({donote_amount}) added on the {project_name} {project_page_link} by {donor_name} {donor_profile_link}.\r\n\r\n{break}\r\nKickstarter Clone Team\r\n{break}\r\nThank You.');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_setting`
--

CREATE TABLE IF NOT EXISTS `facebook_setting` (
  `facebook_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_application_id` varchar(255) DEFAULT NULL,
  `facebook_login_enable` varchar(255) DEFAULT NULL,
  `facebook_access_token` varchar(500) DEFAULT NULL,
  `facebook_api_key` varchar(255) DEFAULT NULL,
  `facebook_user_id` varchar(255) DEFAULT NULL,
  `facebook_secret_key` varchar(255) DEFAULT NULL,
  `facebook_user_autopost` varchar(255) DEFAULT NULL,
  `facebook_wall_post` varchar(255) DEFAULT NULL,
  `facebook_url` text,
  `fb_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`facebook_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `facebook_setting`
--

INSERT INTO `facebook_setting` (`facebook_setting_id`, `facebook_application_id`, `facebook_login_enable`, `facebook_access_token`, `facebook_api_key`, `facebook_user_id`, `facebook_secret_key`, `facebook_user_autopost`, `facebook_wall_post`, `facebook_url`, `fb_img`) VALUES
(1, '451758668205017', '1', 'AAABZBEYAmXyQBAFAjXpriG05ecz98lgvGaVjjpX9QOKG6ZB4luoxIkayUgxAeeB7E1i9ZBGIH760IVF4SOCVXiRBZC2HIZCnW62tJZAA39wQZDZD', '451758668205017', '100003193111411', '267cd775da2e9451afde9e517686afb0', '0', '1', 'http://www.facebook.com/pages/fundraisingscriptcom/187170521330689', '100003193111411.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text,
  `faq_order` int(10) NOT NULL,
  `faq_home` int(10) NOT NULL DEFAULT '0',
  `active` varchar(20) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_category_id`, `question`, `answer`, `faq_order`, `faq_home`, `active`, `date_added`) VALUES
(2, 6, 'What is FundraisingScript?', '<p>FundraisingScript is a new way to fund creative projects.</p>\n<p>We believe that:</p>\n<p>&bull; A good idea, communicated well, can spread fast and wide.</p>\n<p>&bull; A large group of people can be a tremendous source of money and encouragement.</p>\n<p>FundraisingScript is powered by a unique all-or-nothing funding method where projects must be fully-funded or no money changes hands.</p>', 1, 1, '1', '2012-01-23 04:42:25'),
(3, 6, 'Who can fund their project on FundraisingScript?', '<p>FundraisingScript is focused on creative projects. We''re a great way for artists, filmmakers, musicians, designers, writers, illustrators, explorers, curators, performers, and others to bring their projects, events, and dreams to life.</p>\n<p>The word &ldquo;project&rdquo; is just as important as &ldquo;creative&rdquo; in defining what works on FundraisingScript. A project is something finite with a clear beginning and end. Someone can be held accountable to the framework of a project &mdash; a project was either completed or it wasn&rsquo;t &mdash; and there are definable expectations that everyone can agree to. This is imperative for every FundraisingScript project.</p>\n<p>We know there are a lot of great projects that fall outside of our scope, but FundraisingScript is not a place for soliciting donations to causes, charity projects, or general business expenses. Learn more about our&nbsp;<a href="https://www.kickstarter.com/help/guidelines" target="_blank">project guidelines</a>.</p>', 2, 1, '1', '2012-01-23 04:43:30'),
(4, 7, 'Why do people support this project?????', '<p><strong>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaREWARDS!</strong>&nbsp;Project creators inspire people to open their wallets by offering smart, fun, and tangible rewards (products, benefits, and experiences).</p>\n<p><strong>STORIES!</strong>&nbsp;FundraisingScript projects are efforts by real people to do something they love, something fun, or at least something of note. These stories unfold through blog posts, pics, and videos as people bring their ideas to life. Take a peek around the site and see what we''re talking about. Stories abound.</p>  ', 6, 1, '1', '2012-09-27 15:14:24'),
(6, 6, 'How is???????', 'fffffffffffffffffffffff<div>kkkkkkkkkkkkkkkkkkkk</div><div>llllllllllllllllllllllllllllllllllllllllllllllllllll</div><div>ooooooooooooooooooooo</div><div>jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</div>  ', 1234, 1, '1', '2012-09-27 14:54:33'),
(7, 7, 'what ????????', 'ddddddddddddddddd<div>fffffffffff</div><div>ggggggggggg</div><div>hhhhhhhhhhhhh</div><div>jjjjjjjjjjjjjjj</div><div>kkkkkkkkkkkkk</div>  ', 2222222, 1, '1', '2012-09-27 14:50:36'),
(8, 8, 'how does???', 'jjjj00000000000<div>000000000000000</div><div>00000000000000000000000000000</div><div>00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000</div><div>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk<br><div>g</div><div>gggggggggggg</div><div>gggggggggggg</div><div>fffffffffff</div><div>fffffffffffff</div><div>fffffffffffffffffffff</div><div>f</div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div>h</div>  </div>  ', 1, 0, '1', '2012-12-18 18:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE IF NOT EXISTS `faq_category` (
  `faq_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `faq_category_name` varchar(255) DEFAULT NULL,
  `faq_category_url_name` varchar(255) DEFAULT NULL,
  `faq_category_order` int(10) NOT NULL,
  `faq_category_home` int(10) NOT NULL DEFAULT '0',
  `active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`faq_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`faq_category_id`, `parent_id`, `faq_category_name`, `faq_category_url_name`, `faq_category_order`, `faq_category_home`, `active`) VALUES
(3, 0, 'FundraisingScript Basics', 'fundraisingscript-basics', 1, 1, '1'),
(4, 0, 'Creating a Project', 'creating-a-project', 2, 1, '1'),
(5, 0, 'Backing a Project', 'backing-a-project', 3, 1, '1'),
(6, 3, 'HOW IT WORKS', 'how-it-works', 1, 0, '1'),
(7, 3, 'ACCOUNT SETTINGS', 'account-settings', 2, 0, '1'),
(8, 3, 'SITE BASICS', 'site-basics', 3, 0, '1'),
(9, 0, 'tst', 'tst', 0, 1, '1'),
(10, 0, 'tst', 'tst1', 0, 0, '1'),
(11, 10, 'testing purpose2222222', 'testing-purpose2222222', 56, 0, '0'),
(12, 10, 'test123456', 'test123456', 3, 0, '1'),
(13, 0, 'testing purpose111', 'testing-purpose111', 5, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(50) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(255) DEFAULT NULL,
  `gallery_image` varchar(255) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gateways_details`
--

CREATE TABLE IF NOT EXISTS `gateways_details` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `payment_gateway_id` int(50) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `gateways_details`
--

INSERT INTO `gateways_details` (`id`, `payment_gateway_id`, `name`, `value`, `label`, `description`) VALUES
(4, 1, 'site_status', 'sandbox', 'Site Status', 'For Test Account : sandbox\n\nFor Live Account : live'),
(6, 1, 'paypal_email', 'jigar_1313046627_biz@gmail.com', 'Paypal Email', 'Type your Paypal buisness Email Account.'),
(13, 3, 'site_status', 'sandbox', 'Site Status', 'For Test Account : sandbox , For Live Account : live'),
(14, 3, 'variable_fees', '5', 'Variable Fees', 'Type your  Amazon Variable Fees.'),
(15, 3, 'fixed_fees', '5', 'Fixed Fees', 'Type Your Amazon Fixed Fees.'),
(22, 3, 'amazon_email', 'rakesh007_patel@yahoo.co.in', 'Amazon Email', 'Type Your Amazon Email Id'),
(27, 4, 'x_login', '75sqQ96qHEP8', 'x_login', 'The merchant unique API Login ID'),
(28, 4, 'x_tran_key', '7r83Sb4HUd58Tz5p', 'x_tran_key', 'The merchant unique Transaction Key'),
(29, 4, 'x_type', 'AUTH_CAPTURE', 'x_type', 'The type of credit card transaction\n'),
(30, 4, 'x_method', 'CC', 'x_method', 'The payment method'),
(31, 4, 'x_description', 'Sample Transaction', 'x_description', 'The transaction description'),
(34, 3, 'aws_access_key_id', 'AKIAJHRGJTWJ6TZAYFRA', 'Amazon Access Key Id', 'Type Your Amazon aws_access_key_id.'),
(35, 3, 'aws_secret_access_key', 'mGEiblOo7xnZYOPlWHnmoo3/p5MRhicQBFm4CZ/X', 'Amazon Secret Access Key', 'Type your aws_secret_access_key.'),
(37, 1, 'paypal_username', 'jigar_1313046627_biz_api1.gmail.com', 'paypal_username', 'Type Your paypal Username'),
(38, 1, 'paypal_password', '1313046663', 'paypal_password', 'Type Your Paypal Password.'),
(39, 1, 'paypal_signature', 'AMuOxt1FpmAKBEJ6exYeVH0TefE8AHDjH6WasXwi3PskdUAUPWS2au44', 'paypal_signature', 'Type Your Paypal Signature'),
(40, 4, 'site_status', 'sandbox', 'Site Status', 'Enter Site Status');

-- --------------------------------------------------------

--
-- Table structure for table `google_setting`
--

CREATE TABLE IF NOT EXISTS `google_setting` (
  `google_setting_id` int(50) NOT NULL AUTO_INCREMENT,
  `consumer_key` varchar(255) DEFAULT NULL,
  `consumer_secret` varchar(255) DEFAULT NULL,
  `google_enable` int(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`google_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `google_setting`
--

INSERT INTO `google_setting` (`google_setting_id`, `consumer_key`, `consumer_secret`, `google_enable`) VALUES
(1, 'clonesites.com', 'tiXaVgMm2KgFhvrbsX4QtEwI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE IF NOT EXISTS `guidelines` (
  `guidelines_id` int(10) NOT NULL AUTO_INCREMENT,
  `guidelines_title` varchar(255) DEFAULT NULL,
  `guidelines_content` longtext,
  `guidelines_meta_title` text,
  `guidelines_meta_keyword` text,
  `guidelines_meta_description` text,
  PRIMARY KEY (`guidelines_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`guidelines_id`, `guidelines_title`, `guidelines_content`, `guidelines_meta_title`, `guidelines_meta_keyword`, `guidelines_meta_description`) VALUES
(1, 'Guidelines', '<p><strong>Project Guidelines</strong></p>\r\n<ol start=KSYDOU1KSYDOU>\r\n<li>FundraisingScript is a funding platform focused on a broad spectrum of creative projects. The guidelines below articulate our mission and focus. Please note that any project that violates these guidelines will be declined or removed. Please contact us if you have any questions.</li>\r\n<li><strong>Projects. Projects. Projects.</strong>&nbsp;FundraisingScript is for the funding of projects – albums, films, specific works – that have clearly defined goals and expectations.</li>\r\n<li><strong>Projects with a creative purpose.</strong>&nbsp;FundraisingScript can be used to fund projects from the creative fields of Art, Comics, Dance, Design, Fashion, Film, Food, Games, Music, Photography, Publishing, Technology, and Theater. We currently only support projects from these categories.</li>\r\n<li><strong>No charity or cause funding.</strong>&nbsp;Examples of prohibited use include raising money for the Red Cross, funding an awareness campaign, funding a scholarship, or donating a portion of funds raised on FundraisingScript to a charity or cause.</li>\r\n<li><strong>No KSYDOUfund my lifeKSYDOU projects.</strong>&nbsp;Examples include projects to pay tuition or bills, go on vacation, or buy a new camera.</li>\r\n<li><strong>Rewards, not financial incentives.</strong>&nbsp;The FundraisingScript economy is based on the offering of rewards – copies of the work, limited editions, fun experiences. Offering financial incentives, such as ownership, financial returns (for example, a share of profits), or repayment (loans) is prohibited.</li>\r\n</ol>\r\n<div  noshade=KSYDOUnoshadeKSYDOU width=KSYDOU533KSYDOU \r\n<p><strong>Community Guidelines</strong></p>\r\n<ol start=KSYDOU1KSYDOU>\r\n<li>We rely on respectful interactions to ensure that FundraisingScript is a friendly place. Please follow the rules below.</li>\r\n<li><strong>Spread the word but donKSYSINGt spam.</strong>&nbsp;Spam includes sending unsolicited @ messages to people on Twitter. This makes everyone on FundraisingScript look bad. DonKSYSINGt do it.</li>\r\n<li><strong>DonKSYSINGt promote a project on other projectsKSYSING pages.</strong>&nbsp;Your comments will be deleted and your account may be suspended.</li>\r\n<li><strong>Be courteous and respectful.</strong>&nbsp;DonKSYSINGt harass or abuse other members.</li>\r\n<li><strong>DonKSYSINGt post obscene, hateful, or objectionable content.</strong>&nbsp;If you do we will remove it and suspend you.</li>\r\n<li><strong>DonKSYSINGt post copyrighted content without permission.</strong>&nbsp;Only post content that you have the rights to.</li>\r\n<li><strong>If you donKSYSINGt like a project, donKSYSINGt back it.</strong>&nbsp;No need to be a jerk.</li>\r\n<li>Actions that violate these rules or our&nbsp;<a href=KSYDOUhttp://spicyfund.com/fund_demo/home/content/terms-and-conditions/12KSYDOU>Terms of Use</a>&nbsp;may lead to an account being suspended or deleted. WeKSYSINGd prefer not to do that, so be cool, okay? Okay.</li>\r\n</ol>\r\n  ', 'Guidelines-FundraisingScript', 'Guidelines-FundraisingScript', 'Guidelines-FundraisingScript');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE IF NOT EXISTS `home_page` (
  `home_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_title` varchar(255) DEFAULT NULL,
  `home_description` text,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`home_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`home_id`, `home_title`, `home_description`, `active`) VALUES
(1, 'Why Us?', '<p style="font-size: 11px;"><a style="color: rgb(0, 0, 0); font-weight: bold; text-decoration: none;" href="http://www.rockersinfo.com">Rockers Technologies</a> has already created the solution for fundraising. Anyone intends to raise funds for any cause can buy this solution from us to see rocketing change in incoming funds. One can directly start own website with this solution. More than 2 years of experience in this segment and pool of experienced and skillful developers help us to bring changes in the fundraising script in case client needs some updates. We understand that each client has different objectives so we offer customized solution. You tell us your objectives, and we will come up with modified script that suits your requirements.aaaa????????????</p>\n<p style="font-size: 18px; font-weight: bold;">We will make a fundraising website for you</p>\n<p style="font-size: 11px;">We are here to give wings to your fundraising ideas. We?ll make fundraising website for you. We already have ready to use clone of Crowd Funding website like kickstart ,gofundme , firstgiving and indiegogo and we will promise you to provide dedicated support and industry standard quality.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE IF NOT EXISTS `idea` (
  `idea_id` int(50) NOT NULL AUTO_INCREMENT,
  `idea_name` varchar(255) DEFAULT NULL,
  `idea_image` varchar(255) DEFAULT NULL,
  `idea_description` text,
  `active` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idea_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`idea_id`, `idea_name`, `idea_image`, `idea_description`, `active`) VALUES
(2, 'Medical Bills', '1309861110_kcmdrkonqi.jpg', 'Raise money online to help friends cover medical bills\nand expenses in the event of an accident or illness.', '1'),
(3, 'Weddings And Honeymoons', '2.jpg', 'Raise money online for your dream wedding, perfect\nhoneymoon, cash registry or bridal shower', '1'),
(4, 'Special Occasions', '1309861094_Gift_Box_(Gold).jpg', 'Raise money online for group gift purchases, birthdays,\nanniversaries, bachelor parties and celebrations!', '1');

-- --------------------------------------------------------

--
-- Table structure for table `igc_template_manager`
--

CREATE TABLE IF NOT EXISTS `igc_template_manager` (
  `template_id` int(100) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) DEFAULT NULL,
  `template_logo` varchar(255) DEFAULT NULL,
  `template_logo_hover` varchar(255) DEFAULT NULL,
  `active_template` int(50) NOT NULL DEFAULT '0',
  `is_admin_template` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`template_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `igc_template_manager`
--

INSERT INTO `igc_template_manager` (`template_id`, `template_name`, `template_logo`, `template_logo_hover`, `active_template`, `is_admin_template`) VALUES
(1, 'default', '', 'logo.png', 1, 1),
(2, 'default', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_setting`
--

CREATE TABLE IF NOT EXISTS `image_setting` (
  `image_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_width` int(11) NOT NULL,
  `p_height` int(11) NOT NULL,
  `u_width` int(11) NOT NULL,
  `u_height` int(11) NOT NULL,
  `g_width` int(11) NOT NULL,
  `g_height` int(11) NOT NULL,
  `p_ratio` int(11) NOT NULL,
  `u_ratio` int(11) NOT NULL,
  `g_ratio` int(11) NOT NULL,
  PRIMARY KEY (`image_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `image_setting`
--

INSERT INTO `image_setting` (`image_setting_id`, `p_width`, `p_height`, `u_width`, `u_height`, `g_width`, `g_height`, `p_ratio`, `u_ratio`, `g_ratio`) VALUES
(1, 602, 600, 150, 150, 602, 600, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invite_request`
--

CREATE TABLE IF NOT EXISTS `invite_request` (
  `request_id` int(100) NOT NULL AUTO_INCREMENT,
  `invite_code` text,
  `invite_email` varchar(255) DEFAULT NULL,
  `invite_date` datetime NOT NULL,
  `invite_ip` varchar(255) DEFAULT NULL,
  `invite_by` int(100) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invite_request`
--

INSERT INTO `invite_request` (`request_id`, `invite_code`, `invite_email`, `invite_date`, `invite_ip`, `invite_by`) VALUES
(1, 'MX3JDNxvtbKR', 'jigar@gmail.com', '2012-09-04 15:02:23', '127.0.0.1', 112);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) DEFAULT NULL,
  `iso2` varchar(255) DEFAULT NULL,
  `iso3` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`, `iso2`, `iso3`, `active`) VALUES
(2, 'hindi', '1', '1', '1'),
(3, 'English', '', '', '1'),
(4, 'spanish', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message_conversation`
--

CREATE TABLE IF NOT EXISTS `message_conversation` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0' COMMENT '0-unread,1-read',
  `message_subject` text,
  `message_content` text,
  `project_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `reply_message_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `message_conversation`
--

INSERT INTO `message_conversation` (`message_id`, `sender_id`, `receiver_id`, `is_read`, `message_subject`, `message_content`, `project_id`, `date_added`, `reply_message_id`) VALUES
(43, 14, 5, 1, 'hi', 'hi i want to know about it', 12, '2012-11-20 11:50:04', 0),
(42, 5, 6, 1, 'For Test Purpose', 'hello... I am fine hows you?', 12, '2012-11-20 11:25:11', 29),
(36, 14, 14, 1, 'hello', 'testing purpose testing purpose', 41, '2012-11-05 13:04:36', 0),
(37, 6, 14, 1, 'hello', 'dsfds f dsfs dfsd fsd fds fds fds fds', 41, '2012-11-05 13:30:17', 0),
(29, 6, 5, 1, 'For Test Purpose', 'Hello Dharmesh you got message', 12, '2012-10-31 18:34:30', 0),
(10, 9, 9, 1, 'tryet', 'retretretretretretretret', 0, '2012-10-20 00:00:00', 0),
(30, 5, 6, 1, 'For Test Purpose', 'hello brother i got msg', 12, '2012-10-31 18:35:09', 29),
(31, 6, 5, 1, 'todays', 't todays testing todays testing odays testing', 12, '2012-11-01 14:28:37', 0),
(32, 6, 9, 1, 'message for animal planet', 'this message for animal planet', 36, '2012-11-01 14:50:12', 0),
(33, 6, 9, 1, 'message for animal planet ', 'this message for animal planet ', 36, '2012-11-01 14:51:17', 0),
(34, 14, 14, 1, 'hello', 'for testing for testing for testing for testing for testing for testing for testing for testing for testing for testing ', 41, '2012-11-05 10:32:00', 0),
(35, 14, 9, 1, 'hello', 'NOTE : Only PDF,PNG, JPG, GIF file extension are allowed.NOTE : Only PDF,PNG, JPG, GIF file extension are allowed.NOTE : Only PDF,PNG, JPG, GIF file extension are allowed.', 36, '2012-11-05 10:36:48', 0),
(38, 14, 6, 1, 'hello', '          dsfdsf ds fdsf', 41, '2012-11-05 14:32:56', 37),
(39, 6, 14, 1, 'hello', 'hi............. hi...........', 41, '2012-11-08 09:41:59', 37),
(40, 6, 5, 1, 'For Test Purpose', 'hi................................', 12, '2012-11-09 10:04:10', 29),
(41, 14, 6, 1, 'hello', 'hello vivek hello vivek hello vivek hello vivek hello vivek hello vivek hello vivek hello vivek ', 41, '2012-11-09 18:04:55', 37),
(44, 5, 14, 1, 'hi', 'ok i will explain you soon...', 12, '2012-11-20 11:50:59', 43),
(45, 6, 5, 1, 'hi', 'hi vdvd dgdfgd ddd', 12, '2012-11-20 14:14:38', 0),
(46, 14, 5, 0, 'hi', 'hello this comment for testing purpose', 12, '2012-11-20 16:54:57', 43),
(47, 5, 6, 1, 'hi', 'sdsdsds cbfgbfgff gfgf', 12, '2012-11-28 16:47:30', 45),
(48, 5, 9, 1, 'test111 subject', 'message for test 20 dec 4.05', 36, '2012-12-20 16:05:18', 0),
(49, 5, 9, 1, 'test subject 20dec', 'testing message on 20th dec 5.17', 80, '2012-12-20 17:17:15', 0),
(50, 6, 5, 0, 'hi', '541mnjon vg cgv hgghg gujuygu uygu', 12, '2012-12-22 11:07:29', 45),
(51, 6, 14, 1, 'test by mihir', 'mihirmihirmihirmihirmihirmihirmihirmihirmihirmihirmihirmihirmihirmihirmihirmihir', 41, '2012-12-22 16:46:28', 0),
(52, 16, 14, 1, 'kjhbvj', 'ougiugb ghvuv juhbvihbv igiughbkb', 56, '2013-02-01 08:09:58', 0),
(53, 6, 9, 0, 'hi', 'amemskfkjeklkfdsf', 78, '2013-02-16 08:29:54', 0),
(54, 16, 22, 0, 'hello', 'this is a test......', 81, '2013-03-16 23:14:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_setting`
--

CREATE TABLE IF NOT EXISTS `message_setting` (
  `message_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_admin_on_new_message` int(11) NOT NULL DEFAULT '1' COMMENT '0-no,1-yes',
  `email_user_on_new_message` int(11) NOT NULL DEFAULT '1' COMMENT '0-no,1-yes',
  `default_message_subject` varchar(255) DEFAULT NULL,
  `message_enable` int(11) NOT NULL DEFAULT '1' COMMENT '0-no,1-yes',
  PRIMARY KEY (`message_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message_setting`
--

INSERT INTO `message_setting` (`message_setting_id`, `email_admin_on_new_message`, `email_user_on_new_message`, `default_message_subject`, `message_enable`) VALUES
(1, 1, 1, 'New Mesage', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meta_setting`
--

CREATE TABLE IF NOT EXISTS `meta_setting` (
  `meta_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`meta_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `meta_setting`
--

INSERT INTO `meta_setting` (`meta_setting_id`, `title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Kickstarter', 'fundraising, fundraising script, fundraising scripts, fundraising script for sale, fundraising website clone, script like fundraising, site like Crowd funding , Crowd funding  ideas, Crowd funding script, scripts fundraising, fundraiser ideas, unique fund', 'One of the BEST ways to raise money online & Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_job`
--

CREATE TABLE IF NOT EXISTS `newsletter_job` (
  `job_id` int(100) NOT NULL AUTO_INCREMENT,
  `newsletter_id` int(100) NOT NULL,
  `send_total` int(100) NOT NULL,
  `job_date` date NOT NULL,
  `job_start_date` date NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newsletter_job`
--

INSERT INTO `newsletter_job` (`job_id`, `newsletter_id`, `send_total`, `job_date`, `job_start_date`) VALUES
(1, 5, 0, '2012-12-18', '1970-01-01'),
(2, 4, 0, '2013-03-13', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_report`
--

CREATE TABLE IF NOT EXISTS `newsletter_report` (
  `report_id` int(100) NOT NULL AUTO_INCREMENT,
  `newsletter_user_id` int(100) NOT NULL,
  `job_id` int(100) NOT NULL,
  `is_fail` int(20) NOT NULL DEFAULT '0',
  `is_open` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_setting`
--

CREATE TABLE IF NOT EXISTS `newsletter_setting` (
  `newsletter_setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `newsletter_from_name` varchar(255) DEFAULT NULL,
  `newsletter_from_address` varchar(255) DEFAULT NULL,
  `newsletter_reply_name` varchar(255) DEFAULT NULL,
  `newsletter_reply_address` varchar(255) DEFAULT NULL,
  `new_subscribe_email` varchar(255) DEFAULT NULL,
  `unsubscribe_email` varchar(255) DEFAULT NULL,
  `new_subscribe_to` varchar(255) DEFAULT NULL,
  `selected_newsletter_id` int(20) NOT NULL,
  `number_of_email_send` int(20) NOT NULL,
  `break_between_email` int(20) NOT NULL,
  `mailer` varchar(50) DEFAULT NULL,
  `sendmail_path` varchar(255) DEFAULT NULL,
  `smtp_port` int(20) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_email` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `break_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`newsletter_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newsletter_setting`
--

INSERT INTO `newsletter_setting` (`newsletter_setting_id`, `newsletter_from_name`, `newsletter_from_address`, `newsletter_reply_name`, `newsletter_reply_address`, `new_subscribe_email`, `unsubscribe_email`, `new_subscribe_to`, `selected_newsletter_id`, `number_of_email_send`, `break_between_email`, `mailer`, `sendmail_path`, `smtp_port`, `smtp_host`, `smtp_email`, `smtp_password`, `break_type`) VALUES
(1, 'Fundraising Script', 'jigar.rockersinfo@gmail.com', 'Fundraising Script', 'jigar.rockersinfo@gmail.com', 'jigar.rockersinfo@gmail.com', 'jigar.rockersinfo@gmail.com', 'all', 1, 30, 15, 'mail', '/usr/sbin/sendmail', 0, '', '', '', 'minutes');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribe`
--

CREATE TABLE IF NOT EXISTS `newsletter_subscribe` (
  `subscribe_id` int(100) NOT NULL AUTO_INCREMENT,
  `newsletter_user_id` int(100) NOT NULL,
  `newsletter_id` int(100) NOT NULL,
  `subscribe_date` date NOT NULL,
  PRIMARY KEY (`subscribe_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `newsletter_subscribe`
--

INSERT INTO `newsletter_subscribe` (`subscribe_id`, `newsletter_user_id`, `newsletter_id`, `subscribe_date`) VALUES
(35, 25, 5, '2013-01-09'),
(2, 2, 4, '2012-10-01'),
(3, 1, 4, '2012-10-01'),
(4, 1, 4, '2012-10-01'),
(5, 2, 4, '2012-10-01'),
(6, 3, 4, '2012-10-01'),
(34, 25, 4, '2013-01-09'),
(33, 24, 5, '2013-01-09'),
(32, 24, 4, '2013-01-09'),
(10, 7, 4, '2012-10-18'),
(11, 8, 4, '2012-10-19'),
(12, 9, 4, '2012-10-30'),
(13, 10, 4, '2012-11-01'),
(14, 11, 4, '2012-11-02'),
(15, 12, 4, '2012-11-03'),
(16, 13, 4, '2012-11-03'),
(17, 14, 4, '2012-11-03'),
(18, 15, 4, '2012-11-03'),
(19, 16, 4, '2012-11-05'),
(20, 17, 4, '2012-11-08'),
(21, 18, 4, '2012-12-08'),
(22, 19, 4, '2012-12-24'),
(23, 19, 5, '2012-12-24'),
(24, 20, 4, '2013-01-07'),
(25, 20, 5, '2013-01-07'),
(26, 21, 4, '2013-01-07'),
(27, 21, 5, '2013-01-07'),
(28, 22, 4, '2013-01-07'),
(29, 22, 5, '2013-01-07'),
(30, 23, 4, '2013-01-08'),
(31, 23, 5, '2013-01-08'),
(36, 26, 4, '2013-01-11'),
(37, 26, 5, '2013-01-11'),
(38, 27, 4, '2013-01-12'),
(39, 27, 5, '2013-01-12'),
(40, 28, 4, '2013-01-12'),
(41, 28, 5, '2013-01-12'),
(42, 29, 4, '2013-01-12'),
(43, 29, 5, '2013-01-12'),
(44, 30, 4, '2013-01-12'),
(45, 30, 5, '2013-01-12'),
(46, 31, 4, '2013-01-13'),
(47, 31, 5, '2013-01-13'),
(48, 32, 4, '2013-01-14'),
(49, 32, 5, '2013-01-14'),
(50, 33, 4, '2013-01-17'),
(51, 33, 5, '2013-01-17'),
(52, 34, 4, '2013-01-19'),
(53, 34, 5, '2013-01-19'),
(54, 35, 4, '2013-01-23'),
(55, 35, 5, '2013-01-23'),
(56, 36, 4, '2013-01-27'),
(57, 36, 5, '2013-01-27'),
(58, 37, 4, '2013-01-28'),
(59, 37, 5, '2013-01-28'),
(60, 38, 4, '2013-01-29'),
(61, 38, 5, '2013-01-29'),
(62, 39, 4, '2013-02-19'),
(63, 39, 5, '2013-02-19'),
(64, 40, 4, '2013-02-23'),
(65, 40, 5, '2013-02-23'),
(66, 41, 4, '2013-03-09'),
(67, 41, 5, '2013-03-09'),
(68, 42, 4, '2013-03-12'),
(69, 42, 5, '2013-03-12'),
(70, 43, 4, '2013-03-13'),
(71, 43, 5, '2013-03-13'),
(72, 44, 4, '2013-03-18'),
(73, 44, 5, '2013-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_template`
--

CREATE TABLE IF NOT EXISTS `newsletter_template` (
  `newsletter_id` int(100) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `template_content` longtext,
  `attach_file` varchar(255) DEFAULT NULL,
  `allow_subscribe_link` int(10) NOT NULL DEFAULT '0',
  `allow_unsubscribe_link` int(10) NOT NULL DEFAULT '0',
  `project_id` int(100) NOT NULL,
  `newsletter_create_date` date NOT NULL,
  PRIMARY KEY (`newsletter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `newsletter_template`
--

INSERT INTO `newsletter_template` (`newsletter_id`, `subject`, `template_content`, `attach_file`, `allow_subscribe_link`, `allow_unsubscribe_link`, `project_id`, `newsletter_create_date`) VALUES
(4, 'sdsdsdsdsd', '<table cellpadding="3" cellspacing="3" width="700" style="border:1px solid #000">\r\n<tbody><tr>\r\n<td colspan="2" style="text-align:left;vertical-align:top"><a href="http://localhost/cripsnew/projects/credit-card-test1/2" style="font-size:18px;font-weight:bold;color:#114a75;text-transform:capitalize">credit card test</a></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align:left;vertical-align:top">\r\n         <a href="http://localhost/cripsnew/projects/credit-card-test1/2" target="_blank"><img class="p_img" src="http://localhost/cripsnew/upload/thumb/no_img.jpg" width="190" height="150" title="Credit card test"></a>\r\n</td>\r\n<td style="text-align:left;padding:10px;vertical-align:top">\r\n<table cellpadding="2" cellspacing="2" style="border:1px solid #000">\r\n<tbody><tr>\r\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Goal</td>\r\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Raised</td>\r\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Days Left</td>\r\n</tr>\r\n<tr>\r\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\r\n$1,200.00\r\n</td>\r\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\r\n$55.00 RAISED\r\n</td>\r\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\r\n38 DAYS LEFT\r\n</td>\r\n</tr>\r\n<tr><td colspan="3" height="18">&nbsp;</td></tr>\r\n<tr>\r\n<td style="text-align:left;vertical-align:top" colspan="3">\r\n<span style="font-size:16px;font-weight:bold;color:#114a75">Summary: </span> sdsd sds ds\r\n</td>\r\n</tr>\r\n</tbody></table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="text-align:left;padding:10px;vertical-align:top" colspan="2">sds sds </td>\r\n</tr>\r\n</tbody></table>  ', '', 0, 0, 2, '2012-09-20'),
(5, 'TEST', '<table cellpadding="3" cellspacing="3" width="700" style="border:1px solid #000">\n<tbody><tr>\n<td colspan="2" style="text-align:left;vertical-align:top"><a href="http://cloneyard.com/kickstarter/projects/for-check-issue-4/76" style="font-size:18px;font-weight:bold;color:#114a75;text-transform:capitalize">For check issue </a></td>\n</tr>\n<tr>\n<td style="text-align:left;vertical-align:top">\n         <a href="http://cloneyard.com/kickstarter/projects/for-check-issue-4/76" target="_blank"><img class="p_img" src="http://cloneyard.com/kickstarter/upload/thumb/user5.jpg" width="190" height="150" title="For check issue "></a>\n</td>\n<td style="text-align:left;padding:10px;vertical-align:top">\n<table cellpadding="2" cellspacing="2" style="border:1px solid #000">\n<tbody><tr>\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Goal</td>\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Raised</td>\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Days Left</td>\n</tr>\n<tr>\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\n$500.00\n</td>\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\n0 RAISED\n</td>\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\n14 DAYS LEFT\n</td>\n</tr>\n<tr><td colspan="3" height="18">&nbsp;</td></tr>\n<tr>\n<td style="text-align:left;vertical-align:top" colspan="3">\n<span style="font-size:16px;font-weight:bold;color:#114a75">Summary: </span> sdfsdf sfs fds fds\n</td>\n</tr>\n</tbody></table>\n</td>\n</tr>\n<tr>\n<td style="text-align:left;padding:10px;vertical-align:top" colspan="2"></td>\n</tr>\n</tbody></table>  ', '62226newsletter.jpg', 1, 1, 76, '2012-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_user`
--

CREATE TABLE IF NOT EXISTS `newsletter_user` (
  `newsletter_user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_date` datetime NOT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`newsletter_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `newsletter_user`
--

INSERT INTO `newsletter_user` (`newsletter_user_id`, `user_name`, `email`, `user_date`, `user_ip`) VALUES
(26, NULL, 'travis@gmail.com', '2013-01-11 10:20:49', '184.96.156.200'),
(25, NULL, 'vivek.rockersinfo@gmail.com', '2013-01-09 16:05:25', '1.22.83.169'),
(24, NULL, 'dharmesh.rockersinfo@gmail.com', '2013-01-09 16:04:42', '1.22.83.169'),
(7, NULL, 'madhuri.rockersinfo@gmail.com', '2012-10-18 15:52:30', '210.89.56.250'),
(8, NULL, 'jigar.rockersinfo@gmail.com', '2012-10-19 15:46:36', '1.22.81.19'),
(9, NULL, 'fgdfgdf@gmail.com', '2012-10-30 09:54:12', '1.22.80.239'),
(10, NULL, 'mihir.rockersinfo@gmail.com', '2012-11-01 16:33:43', '1.22.80.220'),
(11, NULL, 'mihir.test.rockersinfo@gmail.com', '2012-11-02 13:48:27', '1.22.81.22'),
(12, NULL, 'fgdsgd', '2012-11-03 09:52:09', '210.89.56.250'),
(13, NULL, 'jhhjkjk', '2012-11-03 09:52:32', '210.89.56.250'),
(14, NULL, 'fgdgdg', '2012-11-03 09:53:34', '210.89.56.250'),
(15, NULL, 'dgsgs', '2012-11-03 10:26:59', '1.22.80.187'),
(16, NULL, 'mihir.test2.rockersinfo@gmail.com', '2012-11-05 17:58:49', '1.22.80.224'),
(17, NULL, 'madhurinikam@gmail.com', '2012-11-08 09:35:08', '1.22.80.49'),
(18, NULL, 'pavel.hmao@gmail.com', '2012-12-08 23:26:55', '94.50.197.77'),
(19, NULL, 'rockers1rock@gmail.com', '2012-12-24 15:21:51', '1.22.81.224'),
(20, NULL, 'vidhishah.j@gmail.com', '2013-01-07 15:29:07', '1.22.80.195'),
(21, NULL, 'vidhi.j.j.j.j.j@gmail.com', '2013-01-07 15:36:04', '1.22.80.195'),
(22, NULL, 'jalpashah@yahoo.com', '2013-01-07 15:46:44', '1.22.80.195'),
(23, NULL, 'pavanpatidar8@gmail.com', '2013-01-08 14:50:14', '1.22.80.249'),
(27, NULL, 'kaumil@gmial.com', '2013-01-12 13:56:53', '1.22.81.203'),
(28, NULL, 'test@gmail.com', '2013-01-12 13:58:41', '1.22.81.203'),
(29, NULL, 'kaumu_up@yahoo.co.in', '2013-01-12 14:08:21', '1.22.81.203'),
(30, NULL, 'test@yahoo.co.in', '2013-01-12 14:19:09', '1.22.81.203'),
(31, NULL, 'xoxialight@gmail.com', '2013-01-13 05:31:43', '174.76.19.71'),
(32, NULL, 'lamine@ireals.net', '2013-01-14 17:50:13', '92.151.179.218'),
(33, NULL, 'mudit.kalra@gmail.com', '2013-01-17 00:50:43', '115.249.61.233'),
(34, NULL, 'dsads@dfds.dfd', '2013-01-19 10:09:33', '1.22.83.220'),
(35, NULL, 'rolseq@gmail.com', '2013-01-23 09:11:42', '122.252.239.151'),
(36, NULL, 'downsys@naver.com', '2013-01-27 16:04:35', '121.182.36.247'),
(37, NULL, 'kaumil.test.rockersinfo@gmail.com', '2013-01-28 14:21:54', '1.22.83.188'),
(38, NULL, 'ritu.rockersinfo@gmail.com', '2013-01-29 17:16:55', '210.89.56.250'),
(39, NULL, 'obev@live.nl', '2013-02-19 18:25:37', '77.169.39.211'),
(40, NULL, 'mihaiionescu@jayamedia.ro', '2013-02-23 07:03:51', '5.14.201.187'),
(41, NULL, 'dafdxb@gmail.com', '2013-03-09 04:06:02', '92.97.234.170'),
(42, NULL, 'infojubbol@gmail.com', '2013-03-12 22:51:10', '87.2.98.185'),
(43, NULL, 'clovisso@qq.com', '2013-03-13 13:06:51', '220.241.121.142'),
(44, NULL, 'erik@leadprovider.nl', '2013-03-18 21:44:32', '92.64.88.54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `pages_title` varchar(255) DEFAULT NULL,
  `description` text,
  `slug` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `footer_bar` varchar(20) DEFAULT NULL,
  `header_bar` varchar(20) DEFAULT NULL,
  `left_side` varchar(20) DEFAULT NULL,
  `right_side` varchar(20) DEFAULT NULL,
  `external_link` text,
  PRIMARY KEY (`pages_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `parent_id`, `pages_title`, `description`, `slug`, `active`, `meta_keyword`, `meta_description`, `footer_bar`, `header_bar`, `left_side`, `right_side`, `external_link`) VALUES
(3, 0, 'Top Questions', '<div style="padding:6px"><span style="font-size:18px;font-weight:bold">1.</span> <strong>What is FundMeOnline?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p>FundMeOnline makes it easy for people to raise money  online for the things that matter to them most. From honeymoons to  memorials and everything in between, our users invite family &amp;  friends to donate to important life-events, projects &amp; causes.</p>\n<p><strong>What’s allowed?</strong> FundMeOnline allows  you to raise money online for just about any idea, event, project or  cause your family, friends &amp; personal contacts might believe in.</p>\n<p><strong>What’s not allowed?</strong> Users are prohibited from violating any local laws or attempting to raise money for anything that violates our terms &amp; conditions.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">2.</span> <strong>How do I accept donations online?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p>Accepting credit card donations online is easy with  FundMeOnline. Every donation you receive is instantly deposited into  your PayPal account. Simply sign-up for FundMeOnline and connect your  PayPal account. Don’t worry, PayPal accounts are free to get.<strong> The entire process takes less than a minute</strong>.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">3.</span> <strong>Is a PayPal account required to donate?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p><strong>Nope! </strong>You can ensure that donors have an  easy time donating by following the simple steps provided during  sign-up. We recommend taking advantage of PayPal’s FREE upgrade to the  ‘Verified Premier’ account level.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">4.</span> <strong>When do I get my money?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p>Immediately! With FundMeOnline there’s no time-limits or  collection requirements. By connecting your PayPal account to  FundMeOnline you have instant &amp; secure access to every donation you  receive.</p>\n</div>\n<span style="font-size:18px;font-weight:bold;color:#000000">5.</span> <strong>Will FundMeOnline charge me any fees?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p>FundMeOnline will automatically deduct a 5% fee from each  donation you receive. If you don’t receive any donations, then you  won’t pay anything at all. Since our fee is deducted from each donation  in real-time, you’ll never need to worry about getting billed or owing  us any money. Remember too, that your donors are never charged any fees  for donating to your fund.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">6.</span> <strong>Do I have to be a non-profit to use this?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p><strong>No!</strong> Anyone can raise money online using  FundMeOnline’s customizable donation pages. Our users often raise money  for themselves or for friends they want to help out. FundMeOnline was  design to allow everyday people to do wonderful things with the money  they raise online.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">7.</span> <strong>Will my donors get charged any fees?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p><strong>No!</strong> Donors do not get charged any extra fees for donating to your fund.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">8.</span> <strong>Are there limits to how much money I raise?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p><strong>No way!</strong> FundMeOnline users can raise as  much money as they want. We love it when our users raise a ton of money  on their online donation pages.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">9.</span> <strong>Can I raise money on Facebook &amp; Twitter?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p><strong>Of course!</strong> Connecting to Facebook &amp;  Twitter is part of what makes FundMeOnline work so well. The best part  is that visitors to your donation page end up doing most of the sharing  for you – helping you to attract more donors!</p>\n</div>\n<span style="font-size:18px;font-weight:bold">10.</span> <strong>How will I know when people donate?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p>We send you an email each time somebody donates to your  fund. After receiving the email, you’ll see the new donation appear in  your FundMeOnline dashboard and inside of your PayPal account.</p>\n</div>\n<span style="font-size:18px;font-weight:bold">11.</span> <strong>Does it cost anything to use PayPal?</strong>\n<div style="padding:5px 5px 5px 20px;text-align:justify;font-size:14px">\n<p>There’s no charge to sign-up for your PayPal ‘Premier’  account. You’ll need a PayPal account in order to collect donations  online with your FundMeOnline online donation page. Have a look at  PayPal’s fees once you create your ‘Premier’ account. Signing up for a PayPal ‘Premier’ account is easy and free!</p>\n</div>\n</div>  ', 'questions', '1', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', 'yes', '0', '0', '0', ''),
(4, 0, 'Support', '<ul>\n    <li>\n    <div id="con-right-question">\n    <p>Facebook sharing</p>\n    <p>I have tried to share my fund on facebook but it does not appear on my wall and only appeared on a handful of my friends'' walls...I''ve shared the fund twice, once yesterday and once today but the invites are still not showing up, nor does anything show up on my own wall, even when I post updates?</p>\n    <p>Hello - we''ve heard reports of sharing limits imposed on certain Facebook accounts - at times only allowing 20 or so invites to be sent each day. We''re working on making this area of GoFundMe better for our users. Please stay tuned for an update soon.</p>\n    <p>I would like the picture I have on my gofundme page to show up on facebook when I share the link. Is that possible?</p>\n    <p>How do I get listed in the Search Directory?</p>\n    <p>It''s easy to get listed in the GoFundMe Search Directory.</p>\n    <p><br>\n    1. First, you''ll need to request to be listed during Sign-Up or by Signing-In to GoFundMe and clicking the ''Edit'' tab.<br>\n    2. Next click on the ''Public Search Preferences'' link towards the top of the page.<br>\n    3. Enter the required info and click the ''Save'' button.<br>\n    4. Before appearing in the Search Directory, there are 2 additional requirements that must be met...<br>\n    <br>\n    In an effort to ensure authenticity of funds and to protect donors, listed funds must be ''Facebook Verified'' (achieved by connecting your Facebook account) and have raised at least $100 in online donations.</p>\n    <p>Why is PayPal Forcing Donors to Login?</p>\n    <p>99.9% of PayPal inquiries are due to the collector''s invalid PayPal account type. A fully verified PayPal ''Premier'' account (don''t worry, they''re FREE) is required to give your donors a smooth payment experience.</p>\n    <br>\n    Below is a blog post we wrote on the topic a while back:<br>\n    <br>\n    As most of you already know, your GoFundMe online donation page connects directly to your PayPal account to ensure that you have instant, secure access to every donation you receive. If you haven’t done so already, please be sure and take advantage of PayPal’s FREE upgrade to the ‘Premier’ account level. Again, it doesn’t cost anything to upgrade your PayPal account to the ‘Premier’ level and it makes the donation experience a lot easier on your donors.<br>\n    <br>\n    It’s common for new GoFundMe users to sign-up for PayPal accounts in a hurry. In doing so, users sometimes miss important instructions from PayPal – like forgetting to click the verification link in your welcome email or omitting certain contact information. Anytime this happens, PayPal is likely to prevent your account from working the way it should for security reasons.<br>\n    <br>\n    In short, the more PayPal knows about you, the more they trust that you’re not some bad guy up to no good : ) Upgrading to a PayPal ‘Premier’ account only takes a few minutes and helps ensure that your visitors can donate to your fund without having to sign-in to a PayPal account of their own – hooray!<br>\n    <p>?</p>\n<p>?</p>\n    </div>\n    </li>\n</ul>  ', 'Supporrrrt', '1', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', 'yes', '0', '0', '0', ''),
(5, 0, 'About Us', '<p>OUR GOAL IS TO HELP  FIND A FINANCIAL SOLUTION FOR THE STUDENT SPECIFIC NEED AND WE BELIEVE THAT  EVERY STUDENT DESERVES A FAIR SHOT AT EDUCATION AND LIFE, THESE WILL PROVIDE  THE STUDENT WITH TOOLS AND KNOWLAGE TO SUCCEED IN LIFE AND HAVE MORE  OPPORTUNITIES FOR THEIR FUTURE.</p>\n<p>WE BELIEVE EDUCATION IS THE FOUNDATION OF A GREAT NATION, BY HELPING A  STUDENT YOU ARE NOT ONLY GIVING THEM A BETTER OPPORTUNITY FOR LIFE , YOU ARE  BUILDING A NEW, MORE HUMAN AND SENSITIVE GENERATION, HELP THEM TO GET THEIR  TUITION,PAY THEIR COLLEGE LOAN, BOOKS AND LIVING EXPENSES.</p>\n<p>WE KNOW FOR A FACT THAT THERE ARE THOUSANDS OF EDUCATIONAL GIVERS AND  HAVE THESE SAME CONCERNS AND DESIRE OF EQUALITY OF OPORTUNITIES ,THATS WHY WE  PUT ALL OUR EFFORTS TO CONNECT THESE GIVERS WITH THE STUDENTS IN NEED, SO THAT  GIVERS CAN GET TO KNOW THE STUDENT NEEDS, DREAMS AND ASPIRATIONS.</p>\n<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><br />\n</span></p>\n<p>&nbsp;</p>', 'about_us', '1', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', 'yes', '0', '0', '0', ''),
(6, 0, 'Help', '<ul>\n    <li>\n    <div id="con-right-question">\n    <p>How to send donations</p>\n    <p>My parents and I put $100 dollars into the gofundme account, but it never asked for a credit card number or any information to transfer money. It says I recieved a $100 dollar donation, but how does it add the money without requesting bank or credit card information?</p>\n    <p>The only donation your fund has at the moment was added as an &quot;Offline Donation&quot;. These donations are added through the GoFundMe Dashboard and do not reflect online transactions. They are used for updating your donation page so that people who give you checks toward you goal can be recognized.</p>\n    <p><br />\n    To collect money with your donation page people need to go to your donation page URL, click Donate Online, and follow the steps through PayPal.</p>\n    <p>How do I get a report of all the donors?</p>\n    <p>Sure thing - you can easily export a report of all donation activity by completing the following steps:</p>\n    <br />\n    1. Sign In to your GoFundMe account.<br />\n    2. Click the ''More'' tab.<br />\n    3. Select the ''Donations'' option from the menu.<br />\n    4. Click the ''Export'' link on the Donations page.<br />\n    <p>?</p>\n    <p>?</p>\n    </div>\n    </li>\n</ul>', 'help', '0', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', 'yes', 'yes', '0', '0', ''),
(7, 0, 'Guidelines', '', 'guidelines', '0', 'guidelines', 'guidelines', 'yes', '0', '0', '0', '');
INSERT INTO `pages` (`pages_id`, `parent_id`, `pages_title`, `description`, `slug`, `active`, `meta_keyword`, `meta_description`, `footer_bar`, `header_bar`, `left_side`, `right_side`, `external_link`) VALUES
(12, 0, 'Terms and Conditions', '<div><span style="color:#333333;font-size:13px;line-height:20px;background-color:#ffffff"> </span></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">PLEASE READ THESE TERMS OF USE ("AGREEMENT" OR "TERMS OF USE") CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. ("COMPANY"). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE "SITE") AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE, THE "SERVICE"). BY USING THE SITE OR SERVICE IN ANY MANNER, INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE, YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE, INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT, INFORMATION, AND OTHER MATERIALS OR SERVICES ON THE SITE.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Acceptance of Terms</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">The Service is offered subject to acceptance without modification of all of the terms and conditions contained herein (the "Terms of Use"), which term also incorporates the Privacy Policy available at<a href="http://www.kickstarter.com/privacy" style="color:#55a4f2;text-decoration:none;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">?</a><a href="http://www.gofundmeclone.com/home/content/privacy-policy/13">http://www.gofundmeclone.com/home/content/privacy-policy/13</a>, and all other operating rules, policies and procedures that may be published from time to time on the Site by Company, each of which is incorporated by reference and each of which may be updated by Company from time to time without notice to you. In addition, some services offered through the Service may be subject to additional terms and conditions promulgated by Company from time to time; your use of such services is subject to those additional terms and conditions, which are incorporated into these Terms of Use by this reference.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">The Service is available only to individuals who are at least 18 years old. You represent and warrant that if you are an individual, you are of legal age to form a binding contract, and that all registration information you submit is accurate and truthful. Company may, in its sole discretion, refuse to offer the Service to any person or entity and change its eligibility criteria at any time. This provision is void where prohibited by law and the right to access the Service is revoked in such jurisdictions.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Modification of Terms of Use</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Company reserves the right, at its sole discretion, to modify or replace any of the Terms of Use, or change, suspend, or discontinue the Service (including without limitation, the availability of any feature, database, or content) at any time by posting a notice on the Site or by sending you an email. Company may also impose limits on certain features and services or restrict your access to parts or all of the Service without notice or liability. It is your responsibility to check the Terms of Use periodically for changes. Your continued use of the Service following the posting of any changes to the Terms of Use constitutes acceptance of those changes.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Rules and Conduct</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">As a condition of use, you promise not to use the Service for any purpose that is prohibited by the Terms of Use. The Service (including, without limitation, any Content or User Submissions (both as defined below)) is provided only for your own personal, non-commercial use (except as allowed by the terms set forth in the Projects: Fund-Raising and Commerce section of the Terms of Use). You are responsible for all of your activity in connection with the Service. For purposes of the Terms of Use, the term "Content" includes, without limitation, any User Submissions, videos, audio clips, written forum comments, information, data, text, photographs, software, scripts, graphics, and interactive features generated, provided, or otherwise made accessible by Company or its partners on or through the Service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">By way of example, and not as a limitation, you shall not (and shall not permit any third party to) either (a) take any action or (b) upload, download, post, submit or otherwise distribute or facilitate distribution of any content on or through the Service, including without limitation any User Submission, that:</div>\n<ul style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 1.5em 1.5em 1.5em;padding:0px 0px 0px 0px;list-style:square">\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">infringes any patent, trademark, trade secret, copyright, right of publicity or other right of any other person or entity or violates any law or contractual duty;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">you know is false, misleading, untruthful or inaccurate;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">is unlawful, threatening, abusive, harassing, defamatory, libelous, deceptive, fraudulent, invasive of another''s privacy, tortious, obscene, offensive, or profane;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">constitutes unsolicited or unauthorized advertising or promotional material or any junk mail, spam or chain letters;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">contains software viruses or any other computer codes, files, or programs that are designed or intended to disrupt, damage, limit or interfere with the proper function of any software, hardware, or telecommunications equipment or to damage or obtain unauthorized access to any system, data, password or other information of Company or any third party; or</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">impersonates any person or entity, including any employee or representative of Company.</li>\n</ul>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Additionally, you shall not: (i) take any action that imposes or may impose (as determined by Company in its sole discretion) an unreasonable or disproportionately large load on Company’s (or its third party providers’) infrastructure; (ii) interfere or attempt to interfere with the proper working of the Service or any activities conducted on the Service; (iii) bypass any measures Company may use to prevent or restrict access to the Service (or other accounts, computer systems or networks connected to the Service); (iv) run Maillist, Listserv, any form of auto-responder or "spam" on the Service; or (v) use manual or automated software, devices, or other processes to "crawl" or "spider" any page of the Site.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">You shall not (directly or indirectly): (i) decipher, decompile, disassemble, reverse engineer or otherwise attempt to derive any source code or underlying ideas or algorithms of any part of the Service, except to the limited extent applicable laws specifically prohibit such restriction, (ii) modify, translate, or otherwise create derivative works of any part of the Service, or (iii) copy, rent, lease, distribute, or otherwise transfer any of the rights that you receive hereunder. You shall abide by all applicable local, state, national and international laws and regulations.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Company does not guarantee that any Content or User Submissions (as defined below) will be made available on the Site or through the Service. Company has no obligation to monitor the Site, Service, Content, or User Submissions. However, Company reserves the right to (i) remove, edit or modify any Content in its sole discretion, including without limitation any User Submissions, from the Site or Service at any time, without notice to you and for any reason (including, but not limited to, upon receipt of claims or allegations from third parties or authorities relating to such Content or if Company is concerned that you may have violated the Terms of Use), or for no reason at all and (ii) to remove or block any User Submissions from the Service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Registration</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">You may browse the Site and view Content without registering, but as a condition to using certain aspects of the Service, you may be required to register with Company and select a password and screen name ("User ID"). You shall provide Company with accurate, complete, and updated registration information. Failure to do so shall constitute a breach of the Terms of Use, which may result in immediate termination of your Company account. You shall not (i) select or use as a User ID or domain a name of another person with the intent to impersonate that person; (ii) use as a User ID or domain a name subject to any rights of a person other than you without appropriate authorization; or (iii) use as a User ID or domain a name that is otherwise offensive, vulgar or obscene. Company reserves the right to refuse registration of, or cancel a User ID and domain in its sole discretion. You are solely responsible for activity that occurs on your account and shall be responsible for maintaining the confidentiality of your Company password. You shall never use another user’s account without such other user’s express permission. You will immediately notify Company in writing of any unauthorized use of your account, or other account related security breach of which you are aware.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Projects: Fund-Raising and Commerce</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Fundraisingscript.com ("Fundraisingscript") is a venue for fund-raising and commerce. Fundraisingscript allows certain users ("Project Creators") to list projects and raise funds from other users ("Backers"). All funds are collected for Project Creators by Paypal and Amazon Payments. Fundraisingscript?does not, at any time, receive or hold any monies intended for Project Creators.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Fundraisingscript shall not be liable for your interactions with any organizations and/or individuals found on or through the Fundraisingscript?service. This includes, but is not limited to, delivery of goods and services, and any other terms, conditions, warranties or representations associated with listings on Fundraisingscript. Fundraisingscriptdoes not oversee the performance or punctuality of projects. Fundraisingscript?is not responsible for any damage or loss incurred as a result of any such dealings. All dealings are solely between you and such organizations and/or individuals. Fundraisingscript is under no obligation to become involved in disputes between Backers and Project Creators, or between site members and any third party. In the event of a dispute, you release Fundraisingscript, its officers, employees, agents and successors in rights from claims, damages and demands of every kind, known or unknown, suspected or unsuspected, disclosed or undisclosed, arising out of or in any way related to such disputes and our service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Though Fundraisingscript?cannot be held liable for the actions of a Project Creator, Project Creators are nevertheless wholly responsible for fulfilling obligations both implied and stated in any project listing they create. Fundraisingscript?reserves the right to cancel a project listing and refund all associated members'' payments at any time for any reason. Fundraisingscript?reserves the right to remove a project listing from public listings for any reason.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Fundraisingscript?makes no guarantees regarding the performance or fairness of Paypal and Amazon Payments. Additionally, because of occasional failures of some credit cards, Fundraisingscript?cannot guarantee the full receipt of the targeted amount.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Project Creators may initiate refunds at their own discretion. Fundraisingscript is not responsible for issuing refunds for funds that have been collected by Project Creators.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Fundraisingscript?reserves the right to cancel, interrupt or suspend a listing at any time for any reason.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Fees and Payments</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Joining Fundraisingscript?is free. However, we do charge fees for certain services. All fees are collected for Fundraisingscript?by Paypal Or Amazon Payments. When you use a service that has a fee you have an opportunity to review and accept the fees that you will be charged, which we may change from time to time. Changes to that Policy are effective after we provide you with notice by posting the changes on the Sites. We may choose to temporarily change the fees for our services for promotional events (for example, free listing days) or new services, and such changes are effective when we post the temporary promotional event or new service on the Sites.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">You are responsible for paying all fees and applicable taxes associated with your use of the site. In the event a listing is removed from the Service for violating the Terms of Use, all fees paid will be non-refundable, unless in its sole discretion Fundraisingscript?determines that a refund is appropriate.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Third Party Site</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">The Service may permit you to link to other websites or resources on the Internet, and other websites or resources may contain links to the Site. When you access third party websites, you do so at your own risk. These other websites are not under Company''s control, and you acknowledge that Company is not responsible or liable for the content, functions, accuracy, legality, appropriateness or any other aspect of such websites or resources. The inclusion of any such link does not imply endorsement by Company or any association with its operators. You further acknowledge and agree that Company shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such Content, goods or services available on or through any such website or resource.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Content and License</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">You agree that the Service contains Content specifically provided by Company or its partners and that such Content is protected by copyrights, trademarks, service marks, patents, trade secrets or other proprietary rights and laws. You shall abide by and maintain all copyright notices, information, and restrictions contained in any Content accessed through the Service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Company grants each user of the Site and/or Service a worldwide, non-exclusive, non-sublicensable and non-transferable license to use, modify and reproduce the Content, solely for personal, non-commercial use. Use, reproduction, modification, distribution or storage of any Content for other than personal, non-commercial use is expressly prohibited without prior written permission from Company, or from the copyright holder identified in such Content''s copyright notice. You shall not sell, license, rent, or otherwise use or exploit any Content for commercial use or in any way that violates any third party right.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Third Party Intellectual Property — Copyright Notifications</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Fundraisingscript?respects the intellectual property of others, and we ask our users to do the same. Fundraisingscript?may, in appropriate circumstances and at its discretion, terminate the accounts of users who infringe the intellectual property rights of others. Fundraisingscript will remove infringing materials in accordance with the Digital Millennium Copyright Act if properly notified that content infringes copyright.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">If you believe that your work has been copied in a way that constitutes copyright infringement, please provide Fundraisingscript"s Copyright Agent with a written notification containing at least the following information (please confirm these requirements with your legal counsel, or see Section 512(c)(3) of the U.S. Copyright Act, 17 U.S.C. ?512(c)(3), for more information):</div>\n<ul style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 1.5em 1.5em 1.5em;padding:0px 0px 0px 0px;list-style:square">\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">a description of the copyrighted work that you claim has been infringed;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">a description of where the material that you claim is infringing is located on the Fundraisingscript Site, sufficient for Fundraisingscript to locate the material;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">your address, telephone number, and email address;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; and</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">a statement by you that the above information in your notice is accurate and, under penalty of perjury, that you are the copyright owner or authorized to act on the copyright owner''s behalf.</li>\n</ul>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">If you believe that your work has been removed or disabled by mistake or misidentification, please provide the Fundraisingscript’s Copyright Agent with a written counter-notification containing at least the following information (please confirm these requirements with your legal counsel or see Section 512(g)(3) of the U.S. Copyright Act, 17 U.S.C. ?512(g)(3), for more information):</div>\n<ul style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 1.5em 1.5em 1.5em;padding:0px 0px 0px 0px;list-style:square">\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">a physical or electronic signature of the subscriber/user of the Services;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">identification of the material that has been removed or to which access has been disabled and the location at which the material appeared before it was removed or access to it was disabled;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">a statement made under penalty of perjury that the subscriber has a good faith belief that the material was removed or disabled as a result of mistake or misidentification of the material to be removed or disabled; and</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">the subscriber''s name, address, telephone number, and a statement that the subscriber consents to the jurisdiction of the Federal District Court for the judicial district in which the address is located, or if the subscriber''s address is outside of the United States, for any judicial district in which the service provider may be found, and that the subscriber will accept service of process from the person who provided notification under subsection (c)(1)(C) or an agent of such person.</li>\n</ul>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">You acknowledge that if you fail to comply with all of the aforementioned notice requirements, your notification or counter-notification may not be valid and that Fundraisingscript may ignore such incomplete or inaccurate notices without liability of any kind.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Under Section 512(f) of the Copyright Act, 17 U.S.C. ?512(f), any person who knowingly materially misrepresents that material or activity is infringing or was removed or disabled by mistake or misidentification may be subject to liability.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Our designated copyright agent for notice of alleged copyright infringement is:</div>\n<blockquote style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:italic;font-size:13px;vertical-align:baseline;quotes:'''';color:#666666;margin:1.5em 1.5em 1.5em 1.5em;padding:0px 0px 0px 0px">Rockers Technologies<br>\nGujarat, India 390010<br>\nEmail: nishu@rockersinfo.com</blockquote>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Intellectual Property Rights — Project Creators</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">The Service provides you with the ability upload your content to the Site. Company will not have any ownership rights in your content, however, Company needs the following license to perform the Service. You hereby grant to Company the worldwide, non-exclusive, royalty-free, right to (and to allow others acting on its behalf to) (i) use, host, display, and otherwise perform the Service on your behalf (e.g., use, host, stream, transmit, playback, transcode, copy, display, feature, market, sell, distribute and otherwise exploit ("Host") the content, along with all associated copyrightable works or metadata, including without limitation photographs, graphics, and descriptive text ("Artworks") in connection with the Service); (ii) (and to allow other users to) stream, transmit, playback, download, display, feature, distribute, collect, and otherwise use the content and Artworks; and (iii) use and publish, and to permit others to use and publish, the name(s), trademarks, likenesses, and personal and biographical materials of you and the members of your group, in connection with the provision of the Service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">You agree to pay all royalties and other amounts owed to any person or entity due to your submission of your content to the Service or the Company’s Hosting of the content as contemplated by these Terms of Use.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">To enable Company to Host your content pursuant to the above provisions, you hereby grant to Company the worldwide, non-exclusive, perpetual, royalty-free, sublicensable and transferable right to use, reproduce, copy, and display your trademarks, service marks, slogans, logos or similar proprietary rights (collectively, the "Trademarks") solely in connection with the Service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Intellectual Property Rights — Users</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">The Service may provide users with the ability to add, create, upload, submit, distribute, collect, or post ("Submitting" or "Submission") content, videos, audio clips, written forum comments, data, text, photographs, software, scripts, graphics, or other information to the Site (collectively, the "User Submissions"). By Submitting User Submissions on the Site or otherwise through the Service, you:</div>\n<ul style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 1.5em 1.5em 1.5em;padding:0px 0px 0px 0px;list-style:square">\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">acknowledge that by Submitting any User Submission to the Site, you are publishing that User Submission, and that you may be identified publicly by your User ID in association with any such User Submission;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">by Submitting any User Submissions through the Site or the Service, you hereby do and shall grant Company a worldwide, non-exclusive, perpetual, irrevocable, royalty-free, fully paid, sublicensable and transferable license to use, edit, modify, reproduce, distribute, prepare derivative works of, display, perform, and otherwise fully exploit the User Submissions in connection with the Site, the Service and Company’s (and its successors and assigns’) business, including without limitation for promoting and redistributing part or all of the Site (and derivative works thereof) or the Service in any media formats and through any media channels (including, without limitation, third party websites). You also hereby do and shall grant each user of the Site and/or the Service a non-exclusive license to access your User Submissions through the Site and the Service, and to use, edit, modify, reproduce, distribute, prepare derivative works of, display and perform such User Submissions solely for personal, non-commercial use. For clarity, the foregoing license grant to Company does not affect your other ownership or license rights in your User Submission(s), including the right to grant additional licenses to the material in your User Submission(s), unless otherwise agreed in writing;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">represent and warrant, and can demonstrate to Company’s full satisfaction upon request that you (i) own or otherwise control all rights to all content in your User Submissions, or that the content in such User Submissions is in the public domain, (ii) you have full authority to act on behalf of any and all owners of any right, title or interest in and to any content in your User Submissions to use such content as contemplated by these Terms of Use and to grant the license rights set forth above, (iii) you have the permission to use the name and likeness of each identifiable individual person and to use such individual’s identifying or personal information as contemplated by these Terms of Use; and (iv) you are authorized to grant all of the aforementioned rights to the User Submissions to Company and all users of the Service;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">you agree to pay all royalties and other amounts owed to any person or entity due to your Submission of any User Submissions to the Service;</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">that the use or other exploitation of such User Submissions by Company and use or other exploitation by users of the Site and Service as contemplated by this Agreement will not infringe or violate the rights of any third party, including without limitation any privacy rights, publicity rights, copyrights, contract rights, or any other intellectual property or proprietary rights; and</li>\n    <li style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 0px 0px;padding:0px 0px 0px 0px">understand that Company shall have the right to delete, edit, modify, reformat, excerpt, or translate any materials, content or information submitted by you; and that all information publicly posted or privately transmitted through the Site is the sole responsibility of the person from which such content originated and that Company will not be liable for any errors or omissions in any content; and that Company cannot guarantee the identity of any other users with whom you may interact in the course of using the Service.</li>\n</ul>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Company does not endorse and has no control over any User Submission. Company cannot guarantee the authenticity of any data which users may provide about themselves. You acknowledge that all Content accessed by you using the Service is at your own risk and you will be solely responsible for any damage or loss to any party resulting therefrom.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Termination</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Company may terminate your access to all or any part of the Service at any time, with or without cause, with or without notice, effective immediately, which may result in the forfeiture and destruction of all information associated with your membership. If you wish to terminate your account, you may do so by following the instructions on the Site. Any fees paid hereunder are non-refundable. All provisions of the Terms of Use which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Warranty Disclaimer</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Company has no special relationship with or fiduciary duty to you. You acknowledge that Company has no control over, and no duty to take any action regarding: which users gains access to the Site; what Content you access via the Site; what effects the Content may have on you; how you may interpret or use the Content; or what actions you may take as a result of having been exposed to the Content. You release Company from all liability for you having acquired or not acquired Content through the Site. The Site may contain, or direct you to websites containing, information that some people may find offensive or inappropriate. Company makes no representations concerning any Content contained in or accessed through the Site, and Company will not be responsible or liable for the accuracy, copyright compliance, legality or decency of material contained in or accessed through the Site or the Service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">THE SERVICE IS PROVIDED "AS IS" AND "AS AVAILABLE" AND IS WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF TITLE, NON-INFRINGEMENT, MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE, AND ANY WARRANTIES IMPLIED BY ANY COURSE OF PERFORMANCE OR USAGE OF TRADE, ALL OF WHICH ARE EXPRESSLY DISCLAIMED. COMPANY, AND ITS DIRECTORS, EMPLOYEES, AGENTS, SUPPLIERS, PARTNERS AND CONTENT PROVIDERS DO NOT WARRANT THAT: (A) THE SERVICE WILL BE SECURE OR AVAILABLE AT ANY PARTICULAR TIME OR LOCATION; (B) ANY DEFECTS OR ERRORS WILL BE CORRECTED; (C) ANY CONTENT OR SOFTWARE AVAILABLE AT OR THROUGH THE SERVICE IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS; OR (D) THE RESULTS OF USING THE SERVICE WILL MEET YOUR REQUIREMENTS. YOUR USE OF THE SERVICE IS SOLELY AT YOUR OWN RISK.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">SOME STATES DO NOT ALLOW LIMITATIONS ON HOW LONG AN IMPLIED WARRANTY LASTS, SO THE ABOVE LIMITATIONS MAY NOT APPLY TO YOU.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">Electronic Communications Privacy Act Notice (18USC 2701-2711): COMPANY MAKES NO GUARANTY OF CONFIDENTIALITY OR PRIVACY OF ANY COMMUNICATION OR INFORMATION TRANSMITTED ON THE SITE OR ANY WEBSITE LINKED TO THE SITE. Company will not be liable for the privacy of email addresses, registration and identification information, disk space, communications, confidential or trade-secret information, or any other Content stored on Company’s equipment, transmitted over networks accessed by the Site, or otherwise connected with your use of the Service.</div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-weight:bold;font-style:inherit;font-size:1.3em;vertical-align:baseline;color:#222222;line-height:1.25em;margin:0px 0px 0.5em 0px;padding:0.2em 0px 0.2em 0px"><strong><span style="font-size:large">Indemnification</span></strong></div>\n<div style="border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;outline-width:0px;outline-style:initial;font-style:inherit;font-size:13px;vertical-align:baseline;margin:0px 0px 1em 0px;padding:0px 0px 0px 0px">You shall defend, indemnify, and hold harmless Company, its affiliates and each of its, and its affiliates employees, contractors, directors, suppliers and representatives from all liabilities, claims, and expenses, including reasonable attorneys'' fees, that arise from or relate to your use or misuse of, or access to, the Site, Service, Content or otherwise from your User Submissions, violation of the Terms of Use, or infringement by you, or any third party using the your account, of any intellectual property or other right of any person or entity. Company reserves the right to assume the exclusive defense and control of any matter otherwise subject to indemnification by you, in which event you will assist and cooperate with Company i</div>  ', 'Terms and Conditions', '1', 'Fundraising script Terms and Conditions', 'Fundraising script Terms and Conditions', 'yes', 'yes', '0', '0', '');
INSERT INTO `pages` (`pages_id`, `parent_id`, `pages_title`, `description`, `slug`, `active`, `meta_keyword`, `meta_description`, `footer_bar`, `header_bar`, `left_side`, `right_side`, `external_link`) VALUES
(13, 0, 'Privacy Policy', '<p style="font-size:small;font-family:''arial black'', gadget, sans-serif">THIS SITE SUCKS I CAN EDIT THE DEMO</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">We will not give your name or personal information to third parties.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Paypal or Amazon Payments processes all of the transactions on Fundraisingscript. No one sees your credit card information besides Paypal or Amazon, not even us.</p>\n<h3 style="margin:0px 0px 0.5em;padding:0.2em 0px;color:#222222;line-height:1.25em;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;font-weight:bold;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Email</h3>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">We want to communicate with you only if you want to hear from us.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">We will send you email relating to your personal transactions. We will keep these emails to a minimum.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">You will also receive certain email notifications (forwarded messages, etc.), for which you may opt-out.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">We may send you service-related announcements on rare occasions when it is necessary to do so.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Project creators receive the email addresses of their backers if, and only if, the project is successfully funded.</p>\n<h3 style="margin:0px 0px 0.5em;padding:0.2em 0px;color:#222222;line-height:1.25em;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;font-weight:bold;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Technology / Security</h3>\n<p style="font-size:small;font-family:''arial black'', gadget, sans-serif">Fundraisingscript?uses?<em style="margin:0px;padding:0px;font-style:italic;vertical-align:baseline;outline-width:0px;border:0px solid #000000">cookies</em>?to help (anonymously) recognize you as a repeat visitor and to track traffic patterns on our site. We use this information to make Fundraisingscript more user-friendly.Fundraisingscript may obtain IP?<em style="margin:0px;padding:0px;font-style:italic;vertical-align:baseline;outline-width:0px;border:0px solid #000000">addresses</em>?from users. We will use this information to monitor and prevent fraud, diagnose problems, and (anonymously) estimate demographic information.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">We use a variety of security measures, including encryption and authentication tools, to maintain the confidentiality of your personal information. Your personal information is stored behind firewalls and is only accessible by a limited number of people who are required to keep the information confidential.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">When you place orders we use a secure server. To the extent you select the secure server method and your browser supports such functionality, all credit card information you supply is transmitted via Secure Socket Layer (SSL) technology.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Regardless of these efforts by us, no data transmission over the public Internet can be guaranteed to be 100% secure.</p>\n<h3 style="margin:0px 0px 0.5em;padding:0.2em 0px;color:#222222;line-height:1.25em;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;font-weight:bold;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Voluntary Disclosure</h3>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Any personal information or content that you voluntarily disclose in public areas becomes publicly available and can be collected and used by other users. You should exercise caution before disclosing your personal information via these public venues.</p>\n<h3 style="margin:0px 0px 0.5em;padding:0.2em 0px;color:#222222;line-height:1.25em;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;font-weight:bold;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Project Creators</h3>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">By entering into our User Agreement, Fundraisingscript Project Creators agree to not abuse other users'' personal information. Abuse is defined as using personal information for any purpose other than those explicitly specified in the Project Creator’s Project, or is not related to fulfilling delivery of a product or service explicitly specified in the Project Creator’s Project.</p>\n<p style="font-size:small;font-family:''arial black'', gadget, sans-serif">Fundraisingscript Project Creators never receive users'' credit card information.</p>\n<h3 style="margin:0px 0px 0.5em;padding:0.2em 0px;color:#222222;line-height:1.25em;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;font-weight:bold;vertical-align:baseline;outline-width:0px;border:0px solid #000000">Wrap-up</h3>\n<p style="font-size:small;font-family:''arial black'', gadget, sans-serif">Fundraisingscript<a id="fck_paste_padding">?</a> reserves the right to update this privacy policy at anytime. Updates to our privacy policy will be sent to the email address that you have provided us or posted prominently on the website.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">We reserve the right to disclose your personally identifiable information as required by law and when we believe that disclosure is necessary to protect our rights, or in the good-faith belief that such action is necessary to comply with state and federal laws (such as U.S. Copyright Law).</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">To modify or delete any or all of the personal information you have provided to us, please log in and update your profile.</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">?</p>\n<p style="margin:0px 0px 1em;padding:0px;font-family:''arial black'', gadget, sans-serif;font-size:small;font-style:inherit;vertical-align:baseline;outline-width:0px;border:0px solid #000000">?</p>  ', 'privacy_policyy', '1', 'Fundraising script Privacy Policy', 'Fundraising script Privacy Policy', 'yes', '0', '0', '0', ''),
(14, 0, 'Contact Us', '', '', '0', '', '', 'yes', 'yes', '0', '0', ''),
(15, 0, 'TEST', 'TEST !!!!!!!!!!!!!!!!!<div><br></div>  ', '', '1', '', '', 'yes', 'yes', '0', '0', ''),
(16, 0, 'ghgh', 'fgfgfgfg  ', 'mahe', '0', 'fgfgj [pot', 'rtiubmbi', 'yes', 'yes', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments_gateways`
--

CREATE TABLE IF NOT EXISTS `payments_gateways` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `image` text,
  `function_name` varchar(200) DEFAULT NULL,
  `suapport_masspayment` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payments_gateways`
--

INSERT INTO `payments_gateways` (`id`, `name`, `status`, `image`, `function_name`, `suapport_masspayment`) VALUES
(1, 'Paypal', 'Active', 'fancybox-y.png', 'paypal', 'Yes'),
(3, 'Amazon Payment', 'Inactive', 'fancy_shadow_nw.png', 'amazon_payment', 'No'),
(4, 'Authorize.net(AIM)', 'Active', 'images.jpeg', 'auth_net_aim', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE IF NOT EXISTS `paypal` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `site_status` varchar(25) DEFAULT NULL,
  `application_id` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(250) DEFAULT NULL,
  `paypal_username` varchar(150) DEFAULT NULL,
  `paypal_password` varchar(255) DEFAULT NULL,
  `paypal_signature` varchar(255) DEFAULT NULL,
  `preapproval` int(2) NOT NULL COMMENT 'instant = 0,preapprove =1',
  `fees_taken_from` varchar(50) DEFAULT NULL,
  `transaction_fees` double(10,2) NOT NULL,
  `gateway_status` int(2) NOT NULL,
  `donate_limit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`id`, `site_status`, `application_id`, `paypal_email`, `paypal_username`, `paypal_password`, `paypal_signature`, `preapproval`, `fees_taken_from`, `transaction_fees`, `gateway_status`, `donate_limit`) VALUES
(1, 'sandbox', 'APP-80W284485P519543T', 'fadmin_1321252063_biz@gmail.com', 'fadmin_1321252063_biz_api1.gmail.com', '1321252087', 'AAQNP4IUOwIbkYjIuH2o4oHIZiVzAXXPY8ZxlXELGuNXh541QLWnI56m', 1, 'SENDER', 5.00, 1, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_credit_card`
--

CREATE TABLE IF NOT EXISTS `paypal_credit_card` (
  `paypal_credit_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_version` varchar(50) DEFAULT NULL,
  `credit_card_proxy_port` int(50) NOT NULL,
  `credit_card_proxy_host` varchar(100) DEFAULT NULL,
  `credit_card_use_proxy` int(20) NOT NULL DEFAULT '0' COMMENT '0=no,1=yes',
  `credit_card_subject` varchar(255) DEFAULT NULL,
  `credit_card_preapproval` int(20) NOT NULL DEFAULT '0' COMMENT '0=instant,1=preapprove',
  `credit_card_api_signature` varchar(255) DEFAULT NULL,
  `credit_card_username` varchar(255) DEFAULT NULL,
  `credit_card_password` varchar(255) DEFAULT NULL,
  `credit_card_site_status` int(20) NOT NULL COMMENT '0=sandbox,1=live',
  `credit_card_gateway_status` int(20) NOT NULL COMMENT '0=inactive,1=active',
  PRIMARY KEY (`paypal_credit_card_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paypal_credit_card`
--

INSERT INTO `paypal_credit_card` (`paypal_credit_card_id`, `credit_card_version`, `credit_card_proxy_port`, `credit_card_proxy_host`, `credit_card_use_proxy`, `credit_card_subject`, `credit_card_preapproval`, `credit_card_api_signature`, `credit_card_username`, `credit_card_password`, `credit_card_site_status`, `credit_card_gateway_status`) VALUES
(1, '76.0', 808, '127.0.0.1', 0, '', 0, 'Abg0gYcQyxQvnf2HDJkKtA-p6pqhA1k-KTYE0Gcy1diujFio4io5Vqjf', 'platfo_1255077030_biz_api1.gmail.com', '1255077037', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `perk`
--

CREATE TABLE IF NOT EXISTS `perk` (
  `perk_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `perk_title` varchar(255) DEFAULT NULL,
  `perk_description` text,
  `perk_amount` varchar(255) DEFAULT NULL,
  `perk_total` varchar(255) DEFAULT NULL,
  `perk_get` varchar(255) DEFAULT NULL,
  `coupon_id` int(100) DEFAULT NULL,
  `coupon_status` varchar(20) DEFAULT NULL,
  `perk_limit` int(11) NOT NULL,
  `perk_delivery_date` date NOT NULL,
  PRIMARY KEY (`perk_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `perk`
--

INSERT INTO `perk` (`perk_id`, `project_id`, `perk_title`, `perk_description`, `perk_amount`, `perk_total`, `perk_get`, `coupon_id`, `coupon_status`, `perk_limit`, `perk_delivery_date`) VALUES
(1, 1, NULL, 'Project Demo post for Test', '50', '', NULL, NULL, NULL, 0, '2012-10-11'),
(2, 2, NULL, 'Dummy Project', '50', '', NULL, NULL, NULL, 0, '2012-10-10'),
(3, 4, NULL, 'Project Demo post for Test', '50', '', NULL, NULL, NULL, 0, '2012-10-10'),
(4, 3, NULL, 'test ', '50', '', NULL, NULL, NULL, 0, '2012-10-22'),
(6, 9, NULL, 'Test', '50', '', NULL, NULL, NULL, 0, '2012-10-11'),
(7, 10, NULL, 'Test', '50', '', NULL, NULL, NULL, 0, '2012-10-18'),
(8, 11, NULL, 'Perk For Hospital Project', '90', '50', '3', NULL, NULL, 0, '2012-10-25'),
(9, 11, NULL, 'Perk For Help Medical', '100', '80', NULL, NULL, NULL, 0, '2012-10-19'),
(10, 11, NULL, 'Perk For help medical fund', '100', '50', NULL, NULL, NULL, 0, '2012-10-31'),
(11, 12, NULL, 'Perk For Help', '20', '2', '2', NULL, NULL, 0, '2012-10-24'),
(12, 13, NULL, 'fdsaf', '50', '', NULL, NULL, NULL, 0, '2012-10-31'),
(13, 14, NULL, 'dfghd', '50', '20', NULL, NULL, NULL, 0, '2012-10-11'),
(14, 15, 'Perk1', 'Perk post for test', '115', '10', NULL, NULL, NULL, 0, '0000-00-00'),
(16, 20, 'Perk1', 'Test', '50', '10', NULL, NULL, NULL, 0, '2012-10-19'),
(17, 20, 'Perk2', 'test323', '50', '10', NULL, NULL, NULL, 0, '2012-10-30'),
(18, 18, NULL, 'description of per1', '30', '10', NULL, NULL, NULL, 0, '1970-01-01'),
(19, 18, NULL, 'description of per2', '40', '12', NULL, NULL, NULL, 0, '1970-01-01'),
(69, 56, NULL, 'Perk descriptionPerk descriptionPerk descriptionPerk descriptionPerk descriptionPerk descriptionPerk description for testing', '15', '12', NULL, NULL, NULL, 0, '2013-01-16'),
(42, 6, NULL, 'Copies of what you''re making, unique experiences, and limited editions work great.', '25', '5', NULL, NULL, NULL, 0, '2012-11-14'),
(33, 29, NULL, 'ssdds', '23', '', NULL, NULL, NULL, 0, '2012-10-01'),
(37, 31, NULL, 'hdhdf', '50', '25', NULL, NULL, NULL, 0, '1970-01-01'),
(38, 32, NULL, 'The Early Middle Ages (AD 400 to 1450) saw a decline in awareness of the classical culture in Europe. During this time, the only repositories of knowledge and records of the early history in Europe were those of the Roman Catholic Church. Hermits, monks, and priests used this historic period to write the first modern biographies. Their subjects were usually r', '30', '12', NULL, NULL, NULL, 0, '2012-10-31'),
(39, 31, NULL, 'gugg', '50', '44', NULL, NULL, NULL, 0, '1970-01-01'),
(41, 8, NULL, 'dsgzsgzsdgdg', '50', '5', NULL, NULL, NULL, 0, '2012-11-14'),
(32, 28, NULL, 'green car', '20', '20', NULL, NULL, NULL, 0, '2012-10-24'),
(43, 34, NULL, 'PROJECT FOR ART PROJECT FOR ART PROJECT FOR ART ', '50', '5', NULL, NULL, NULL, 0, '2012-11-15'),
(44, 35, NULL, 'descriptio', '15', '12', NULL, NULL, NULL, 0, '2012-10-31'),
(45, 36, NULL, 'Description of perk', '15', '10', NULL, NULL, NULL, 0, '2012-11-14'),
(47, 38, NULL, 'ggfgfjfhd dgfdsf dsfhg', '25', '5', NULL, NULL, NULL, 0, '2012-11-30'),
(49, 41, NULL, 'for testing purpose creating this perk', '15', '4', NULL, NULL, NULL, 0, '1970-01-01'),
(50, 45, NULL, 'Copies of what you''re making, unique experiences, and limited editions work great.', '20', '5', NULL, NULL, NULL, 0, '2012-11-14'),
(51, 44, NULL, 'daesgdsgds gdsg ds', '20', '5', NULL, NULL, NULL, 0, '2012-11-22'),
(52, 55, NULL, '32fsfsa', '23', '3', NULL, NULL, NULL, 0, '2012-12-20'),
(53, 72, NULL, 'for testing purpose', '20', '', NULL, NULL, NULL, 0, '1970-01-01'),
(58, 76, 'perk3', 'perk3perk3perk3perk3perk3perk3perk3perk3perk3', '17', '12', NULL, NULL, NULL, 0, '0000-00-00'),
(56, 76, 'perk1', 'perk1descriptionperk1descriptionperk1descriptionperk1description', '15', '12', NULL, NULL, NULL, 0, '0000-00-00'),
(57, 76, 'perk2', 'perk2perk2perk2perk2perk2perk2perk2perk2perk2perk2perk2perk2perk2perk2perk2', '16', '12', NULL, NULL, NULL, 0, '0000-00-00'),
(59, 76, 'perk4', 'perk4perk4perk4perk4perk4perk4perk4perk4', '18', '12', NULL, NULL, NULL, 0, '0000-00-00'),
(60, 72, 'perk1', 'DFDSFDAS', '15', '10', NULL, NULL, NULL, 0, '0000-00-00'),
(61, 80, NULL, 'perk description for test perk description for test perk description for test perk description for test ', '20', '12', NULL, NULL, NULL, 0, '2012-12-31'),
(62, 79, NULL, 'dg hgsd ds', '100', '5', NULL, NULL, NULL, 0, '2012-12-31'),
(63, 77, NULL, 'description of perk first for testingdescription of perk first for testingdescription of perk first for testingdescription of perk first for testing', '15', '2', NULL, NULL, NULL, 0, '2012-12-31'),
(64, 78, NULL, 'Description of perk 111for testing purposeDescription of perk 111for testing purposeDescription of perk 111for testing purposeDescription of perk 111for testing purposeDescription of perk 111for testing purpose', '17', '32', NULL, NULL, NULL, 0, '1970-01-01'),
(65, 81, '0', '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890', '100', '12', '1', NULL, NULL, 0, '2012-12-31'),
(67, 86, NULL, 'afad', '15', '', NULL, NULL, NULL, 0, '2012-12-27'),
(68, 87, '0', 'free graphics', '20', '5', NULL, NULL, NULL, 0, '2012-12-31'),
(70, 94, NULL, 'Abc', '15', '', NULL, NULL, NULL, 0, '2013-01-09'),
(71, 74, NULL, 'for test perk process for test perk process for test perk process for test perk process for test perk process for test perk process for test perk process for test perk process for test perk process for test perk process ', '20', '', NULL, NULL, NULL, 0, '1970-01-01'),
(72, 74, NULL, 'for test perk process for test perk ', '20', '', NULL, NULL, NULL, 0, '1970-01-01'),
(73, 101, NULL, 'Perk1', '50', '2', NULL, NULL, NULL, 0, '2013-01-16'),
(74, 101, NULL, 'perk2', '50', '20', NULL, NULL, NULL, 0, '2013-01-22'),
(75, 104, NULL, 'sdf sdf sd f', '25', '', NULL, NULL, NULL, 0, '2013-01-24'),
(76, 105, NULL, 'fdafdas', '15', '23', NULL, NULL, NULL, 0, '2013-04-12'),
(77, 106, NULL, 'dddddddddddd', '25', '10', NULL, NULL, NULL, 0, '2013-01-26'),
(78, 108, NULL, 'fdasfdsa', '15', '', NULL, NULL, NULL, 0, '2013-01-18'),
(79, 109, NULL, 'mmmmmmmmmmmm', '4500', '800', NULL, NULL, NULL, 0, '2013-01-17'),
(80, 111, NULL, 'ghfghf', '20.00', '1222', NULL, NULL, NULL, 0, '2013-01-19'),
(81, 112, NULL, 'sdfsdfdsf', '100', '15', NULL, NULL, NULL, 0, '2013-01-26'),
(82, 119, NULL, 't-shirt', '100', '50', NULL, NULL, NULL, 0, '2013-01-31'),
(83, 123, NULL, 'quindici', '15', '', NULL, NULL, NULL, 0, '2013-01-02'),
(84, 123, NULL, 'trenta', '30', '10', NULL, NULL, NULL, 0, '2013-01-03'),
(85, 100, NULL, 'Test', '50', '10', NULL, NULL, NULL, 0, '2013-01-29'),
(86, 100, NULL, 'dfdf', '67', '20', NULL, NULL, NULL, 0, '2013-01-27'),
(87, 100, NULL, 'Test', '77', '80', NULL, NULL, NULL, 0, '2013-01-30'),
(88, 124, NULL, 'dfdsfgd', '18', '12', NULL, NULL, NULL, 0, '2013-01-31'),
(89, 127, NULL, 'sdfs', '16', '', NULL, NULL, NULL, 0, '2013-01-31'),
(91, 129, NULL, 't-shirt', '30', '40', NULL, NULL, NULL, 0, '2013-01-31'),
(92, 130, NULL, 'ssssssssssssssssssssss', '50', '10', NULL, NULL, NULL, 0, '2013-01-30'),
(93, 131, NULL, 'yuyuyu', '20', '', NULL, NULL, NULL, 0, '2013-01-31'),
(94, 133, NULL, 'asdasd', '15', '', NULL, NULL, NULL, 0, '2013-02-13'),
(95, 135, NULL, 'great stuff', '20', '20', NULL, NULL, NULL, 0, '2013-02-22'),
(96, 135, NULL, '3234', '34', '', NULL, NULL, NULL, 0, '2013-02-15'),
(97, 137, NULL, 'one thing', '50', '2', NULL, NULL, NULL, 0, '2013-02-13'),
(100, 70, NULL, 'Tesr', '34', '', NULL, NULL, NULL, 0, '2013-02-28'),
(101, 70, NULL, 'Test', '55', '', NULL, NULL, NULL, 0, '2013-02-16'),
(102, 137, '0', 'fsdfsdf', '55', '555', NULL, NULL, NULL, 0, '0000-00-00'),
(103, 142, NULL, 'sdwd', '85', '', NULL, NULL, NULL, 0, '2013-02-21'),
(104, 143, NULL, 'wsdw3', '100', '', NULL, NULL, NULL, 0, '2013-02-21'),
(105, 114, NULL, 'kkkk', '15', '', NULL, NULL, NULL, 0, '2013-03-14'),
(107, 88, NULL, 'desc', '75', '', NULL, NULL, NULL, 0, '2013-02-27'),
(108, 88, NULL, 'desc', '55', '', NULL, NULL, NULL, 0, '2013-02-28'),
(109, 136, NULL, 'gdfg gkfgjkfg kg hkfgijfhj', '100', '2', NULL, NULL, NULL, 0, '2013-03-26'),
(110, 132, NULL, 'thanks', '15', '20', NULL, NULL, NULL, 0, '2013-05-17'),
(111, 144, NULL, 'test for donate', '30', '', NULL, NULL, NULL, 0, '2013-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `url_project_title` varchar(255) DEFAULT NULL,
  `project_summary` text,
  `project_address` varchar(255) DEFAULT NULL,
  `project_city` varchar(255) DEFAULT NULL,
  `project_state` varchar(255) DEFAULT NULL,
  `project_country` varchar(255) DEFAULT NULL,
  `project_lat` varchar(255) DEFAULT NULL,
  `project_long` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` text,
  `display_page` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_type` varchar(10) DEFAULT NULL,
  `video` text,
  `custom_video` text,
  `video_image` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `amount_get` varchar(255) DEFAULT NULL,
  `end_date` datetime NOT NULL,
  `allow_overflow` varchar(255) DEFAULT NULL,
  `host_ip` varchar(255) DEFAULT NULL,
  `total_rate` varchar(255) DEFAULT NULL,
  `vote` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `active_cnt` int(10) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `total_days` int(50) NOT NULL,
  `is_featured` int(10) NOT NULL DEFAULT '0',
  `project_draft` int(10) NOT NULL DEFAULT '0',
  `end_send` int(10) NOT NULL DEFAULT '0',
  `p_google_code` varchar(255) DEFAULT NULL,
  `payment_type` tinyint(1) NOT NULL,
  `staff_pickup` int(2) NOT NULL DEFAULT '0' COMMENT '0-no,1-yes pick up by admin',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `user_id`, `category_id`, `project_title`, `url_project_title`, `project_summary`, `project_address`, `project_city`, `project_state`, `project_country`, `project_lat`, `project_long`, `color`, `description`, `display_page`, `image`, `video_type`, `video`, `custom_video`, `video_image`, `amount`, `amount_get`, `end_date`, `allow_overflow`, `host_ip`, `total_rate`, `vote`, `status`, `active`, `active_cnt`, `date_added`, `total_days`, `is_featured`, `project_draft`, `end_send`, `p_google_code`, `payment_type`, `staff_pickup`) VALUES
(1, 6, 11, 'Project Demo post for Test', 'project-demo-post-for-test1', 'Project Demo post for Test', NULL, '1', '1', '2', NULL, NULL, NULL, 'Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive&nbsp;  ', NULL, 'project_74688.jpeg', '0', 'http://youtu.be/ITzNVncutQE', '', '', '150', '200', '2012-10-16 16:29:06', NULL, '1.22.81.159', NULL, NULL, '1', '1', 1, '2012-10-06 16:29:06', 10, 0, 1, 0, '0', 0, 0),
(2, 6, 7, 'Dummy Project', 'dummy-project1', 'Dummy project quick peek descriptionDummy project quick peek descriptionDummy project quick pee', 'Goa, India', '', 'Goa', ' India', NULL, NULL, NULL, 'on''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for  ', '0', 'project_70442.jpeg', '0', 'http://youtu.be/ITzNVncutQE', '', '', '110', '5.59', '2012-10-26 16:29:04', NULL, '1.22.81.159', NULL, NULL, '1', '1', 1, '2012-10-06 16:29:04', 20, 0, 1, 0, '0', 0, 0),
(3, 6, 8, 'Dummy Project', 'dummy-project2', 'test test test test', NULL, '1', '1', '2', NULL, NULL, NULL, 'other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free f  ', NULL, 'project_89757.png', '0', 'http://youtu.be/bEh30EYvcbU', '', '', '500', NULL, '2012-10-16 16:43:27', NULL, '1.22.81.159', NULL, NULL, '1', '1', 1, '2012-10-06 16:43:27', 10, 0, 1, 0, '0', 0, 0),
(4, 6, 8, 'Project Demo post for Test', 'project-demo-post-for-test2', 'Project Demo post for Test', NULL, '1', '1', '2', NULL, NULL, NULL, 'Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the  ', NULL, 'project_76437.jpeg', '0', 'http://youtu.be/ITzNVncutQE', '', '', '150', NULL, '2012-10-26 16:29:02', NULL, '1.22.81.159', NULL, NULL, '1', '1', 1, '2012-10-06 16:29:02', 20, 0, 1, 0, '0', 0, 0),
(6, 6, 11, 'city test', 'city-test1', 'dgsjdsshgdbsshg hdgbds dhsg skg  gsd', 'Ahmedabad, Gujarat, India', 'Ahmedabad', ' Gujarat', ' India', NULL, NULL, NULL, 'Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use. Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use. Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use. Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use. Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.        ', NULL, 'project_86517.jpeg', '0', 'http://youtu.be/cyygnG6x-Wk', '', NULL, '110', NULL, '2012-11-29 09:35:46', NULL, '1.22.80.239', NULL, NULL, '1', '1', 0, '2012-10-30 09:35:46', 30, 0, 1, 0, '0', 0, 0),
(8, 6, 12, 'test latest', 'test-latest2', 'sdgds dgdsfgfg fgs gfgs dg ', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', NULL, '2012-11-29 09:13:11', NULL, '1.22.80.239', NULL, NULL, '1', '1', 0, '2012-10-30 09:13:11', 30, 0, 1, 0, '0', 0, 0),
(9, 6, 17, 'Dummy Project', 'dummy-project3', 'Test', NULL, '1', '1', '2', NULL, NULL, NULL, 'Test  ', NULL, 'project_9071.png', '0', 'http://youtu.be/bEh30EYvcbU', '', NULL, '150', '19', '2012-11-25 17:41:26', NULL, '1.22.81.159', NULL, NULL, '1', '1', 1, '2012-10-06 17:41:26', 50, 0, 1, 0, '0', 0, 0),
(10, 6, 6, 'Project Demo post for Test', 'project-demo-post-for-test4', 'Test', NULL, '1', '1', '2', NULL, NULL, NULL, 'Test  ', NULL, 'project_18567.jpeg', '0', 'http://youtu.be/ITzNVncutQE', '', NULL, '150', '19', '2012-10-16 17:54:19', NULL, '1.22.81.159', NULL, NULL, '1', '1', 1, '2012-10-06 17:54:19', 10, 0, 1, 0, '0', 0, 0),
(11, 6, 3, 'Green Tea Health Benefits', 'green-tea-health-benefits1', 'Is any other food or drink reported to have as many health benefits as green tea? The Chinese h', 'Ooty, Tamil Nadu, India', 'Ooty', ' Tamil Nadu', ' India', NULL, NULL, NULL, 'Today, scientific research in both Asia and the west is providing hard evidence for the health benefits long associated with drinking green tea. For example, in 1994 the Journal of the National Cancer Institute published the results of an epidemiological study indicating that drinking green tea reduced the risk of esophageal cancer in Chinese men and women by nearly sixty percent. University of Purdue researchers recently concluded that a compound in green tea inhibits the growth of cancer cells. There is also research indicating that drinking green tea lowers total cholesterol levels, as well as improving the ratio of good (HDL) cholesterol to bad (LDL) choleste  ', '0', 'project_64703.jpeg', '0', 'http://youtu.be/G41dzGYSyrQ', '', NULL, '1000', '769.5', '2012-12-29 09:33:33', NULL, '101.0.59.132', NULL, NULL, '1', '0', 1, '2012-10-10 09:33:33', 80, 0, 1, 0, '1243124312', 0, 0),
(12, 5, 7, 'Project post for help orphan chid', 'project-post-for-help-orphan-chid1', 'Lorem Ipsum is simplyLorem Ipsum is sim', NULL, '1', '1', '2', NULL, NULL, NULL, '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.  ', NULL, 'project_65283.jpeg', '0', 'http://youtu.be/cyygnG6x-Wk', '', NULL, '1500', '1522.12', '2012-11-29 11:45:38', NULL, '101.0.59.132', NULL, NULL, '1', '1', 1, '2012-10-10 11:45:38', 50, 0, 1, 0, '0', 0, 0),
(13, 6, 7, 'TEST EDITOR', 'test-editor1', 'dasfaf', 'Anand, Gujarat, India', 'Anand', ' Gujarat', ' India', NULL, NULL, NULL, '<p><br /><em><strong><span  large; color: #ffcc99;">Important reminder</span></strong></em></p>\n<p><span  small; color: #000000;"><em><strong><br /></strong></em></span></p>\n<p><span  small; color: #000000;"><em><strong>on''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.</strong></em></span></p>', NULL, 'project_43779.jpeg', '0', 'http://youtu.be/1JhK35ER4Y8', '', NULL, '200', NULL, '2012-11-14 10:51:35', NULL, '1.22.80.239', NULL, NULL, '1', '1', 1, '2012-10-30 10:51:35', 15, 0, 1, 0, '0', 0, 0),
(14, 6, 8, 'test latest', 'test-latest1', 'dfkj dgfnds', NULL, '1', '1', '2', NULL, NULL, NULL, 'dvds gsgsdgzds  ', NULL, 'project_2220.jpeg', '0', 'http://youtu.be/-i8k-ES4qGA', '', NULL, '120', NULL, '2012-12-19 10:51:32', NULL, '1.22.81.28', NULL, NULL, '1', '1', 1, '2012-10-30 10:51:32', 50, 0, 1, 0, '0', 0, 0),
(15, 8, 12, 'Staff Picks', 'staff-picks1', 'Staff Pick', NULL, '1', '1', '2', NULL, NULL, NULL, 'Project Post for staff picks  ', '1', NULL, '0', 'http://youtu.be/-i8k-ES4qGA', '', NULL, '110', NULL, '2012-11-06 15:16:04', NULL, '210.89.56.250', NULL, NULL, '1', '1', 1, '2012-10-18 15:16:04', 19, 0, 1, 0, '', 0, 1),
(18, 9, 11, 'Video game for iPhone and iPad', 'video-game-for-iphone-and-ipad1', 'Quick peek for testing purposeQuick peek for testing purposeQuick peek for testing purpose', 'Goa, India', '', 'Goa', ' India', NULL, NULL, NULL, '<p>Project descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject descriptionProject description</p>', NULL, 'project_49975.jpeg', '0', 'http://youtu.be/XBhqiRJuAzQ', '', NULL, '1000', NULL, '2013-01-20 10:39:30', NULL, '1.22.81.237', NULL, NULL, '1', '0', 0, '2012-12-28 10:39:30', 23, 0, 1, 0, '0', 0, 0),
(20, 8, 14, 'Post By admin', 'post-by-admin1', 'fdfd', NULL, '1', '1', '2', NULL, NULL, NULL, 'dfdf  ', '0', 'project_85664.jpeg', '0', '', '', NULL, '110', NULL, '2012-10-20 11:08:28', NULL, '101.0.59.75', NULL, NULL, '1', '0', 0, '2012-10-19 11:08:28', 2, 0, 1, 0, '', 0, 1),
(28, 6, 13, ' Green Car Innovation', '-green-car-innovation1', 'assistance to Australian companies for projects that enhance the research and development and commercialisation of Australian technologies that significant', 'Goa, India', '', 'Goa', ' India', NULL, NULL, NULL, '<ul><li>be a Motor Vehicle Producer (MVP) registered under the Australian Government''s Automotive Competitiveness and Investment Scheme (ACIS) or the Automotive Transformation Scheme (ATS); and</li><li>apply for a grant of $5 million or more. The cumulative total of grants for an applicant must not exceed $300 million.</li></ul><p>To be eligible to apply under Stream B applicants must:</p><ul><li>either be a non-tax exempt company incorporated under the Corporations Act 2001, or an individual who warrants to form such a company, if offered assistance and prior to signing a grant agreement</li><li>not be a Motor Vehicle Producer, or an entity related to a Motor Vehicle Producer registered under ACIS or ATS, and</li><li>apply for a grant of $100,000 or more. The cumulative total of grants for an applicant must not exceed $100 million.</li></ul>  ', '0', 'project_7420.jpeg', '0', 'https://www.youtube.com/watch?v=_6VWYqIgx_c', '', NULL, '100', '4.96', '2012-11-22 17:13:27', NULL, '1.22.81.166', NULL, NULL, '1', '1', 1, '2012-10-22 17:13:27', 31, 0, 1, 0, '0', 0, 0),
(29, 10, 17, 'dfdfdfdf', 'dfdfdfdf1', 'dfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '                                                                                                 sdsds sds ds sds s s sd s                                                                                        ', NULL, NULL, '0', 'http://clonesites.com/kickstarterclone/start/create_step3/29', '', NULL, '343', NULL, '2012-11-15 10:05:36', NULL, '101.0.59.145', NULL, NULL, '1', '0', 0, '2012-10-23 10:05:36', 23, 0, 0, 0, '0', 0, 0),
(31, 6, 16, 'TEST ANIMALS', 'test-animals1', 'How to:  \nMake an awesome project\n\nRefer to our  \nproject help center.', 'Daman, Daman and Diu, India', 'Daman', ' Daman and Diu', ' India', NULL, NULL, NULL, '<p>&nbsp;</p>\n<p><span style="font-size: large;"><strong><span style="color: #ff0000;">ANIMAL</span></strong></span></p>\n<p>eusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create.contenteusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create.contenteusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create.contenteusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create.content</p>', NULL, 'project_96263.jpeg', '0', 'http://youtu.be/6bMWmk7w3H4', '', NULL, '500', NULL, '2012-11-29 11:37:51', NULL, '1.22.80.239', NULL, NULL, '1', '1', 1, '2012-10-30 11:37:51', 30, 1, 1, 0, '0', 0, 0),
(32, 9, 17, 'Birthday celebration', 'birthday-celebration2', 'Biographical works are usually non-fiction, but fiction can also be used to portray a person''s life. One in-depth form of biographical coverage is called legacy writing', NULL, '1', '1', '2', NULL, NULL, NULL, 'Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.  ', NULL, 'project_62025.jpeg', '0', 'http://www.youtube.com/user/oreoindia?v=ikMqIlKTAEU', '', NULL, '150', NULL, '2012-11-21 17:43:23', NULL, '101.0.59.88', NULL, NULL, '1', '0', 0, '2012-10-26 17:43:23', 26, 0, 1, 0, '0', 0, 0),
(34, 6, 12, 'PROJECT FOR ART ', 'project-for-art-2', 'PROJECT FOR ART PROJECT FOR ART PROJECT FOR ART ', 'Rajkot, Gujarat, India', 'Rajkot', ' Gujarat', ' India', NULL, NULL, NULL, '<p>on''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.on''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.on''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.on''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.</p>', NULL, 'project_54988.jpeg', '0', 'http://youtu.be/yfS6lgXXoFo', '', NULL, '500', '47.5', '2012-11-24 11:45:42', NULL, '1.22.80.239', NULL, NULL, '1', '1', 1, '2012-10-30 11:45:42', 25, 0, 1, 0, '0', 0, 0),
(35, 9, 12, 'Animated Backgrounds', 'animated-backgrounds1', 'Process of giving the illusion of movement to drawings, models, or inanimate objects.', 'Bangalore, Karnataka, India', 'Bangalore', ' Karnataka', ' India', NULL, NULL, NULL, '<p>Animation is a series of still drawings that, when viewed in rapid succession, gives the impression of a moving picture. The word animation derives from the Latin words&nbsp;<em>anima</em>&nbsp;meaning life, and&nbsp;<em>animare</em>&nbsp;meaning to breathe life into. Throughout history, people have employed various techniques to give the impression of moving pictures. Cave drawings depicted animals with their legs overlapping so that they appeared to be running. The properties of animation can be seen in Asian puppet shows, Greek bas-relief, Egyptian funeral paintings, medieval stained glass, and modern comic strips.<br><br></p>  ', '0', 'project_69646.jpeg', '0', 'http://www.youtube.com/watch?v=u4skMuNDJzA&feature=g-vrec', '', NULL, '100', '427.5', '2013-01-16 14:41:43', NULL, '49.249.18.145', NULL, NULL, '1', '1', 1, '2012-12-18 14:41:43', 29, 1, 1, 0, '232232323', 0, 0),
(36, 9, 16, 'Animal  Planet ', 'animal-planet-2', 'Wild animals aren''t confined to the jungle alone. Many can be found wandering in your backyard. ', 'Dehradun, Uttarakhand, India', 'Dehradun', ' Uttarakhand', ' India', NULL, NULL, NULL, '<p>Animal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for testAnimal planet project description for test                        </p>  ', '0', 'project_87759.jpeg', '0', 'http://www.youtube.com/watch?v=iWB046Y0lYI', '', NULL, '200', '33.25', '2013-02-16 17:29:29', NULL, '1.22.80.105', NULL, NULL, '1', '0', 1, '2012-12-20 17:29:29', 58, 0, 1, 0, '0', 0, 0),
(38, 6, 12, 'test art', 'test-art1', 'hfcnddfh gdgsgsd dg sgsdg', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', NULL, NULL, NULL, '<p><span style="text-decoration: underline; color: #ffcc99;"><em><strong><span style="font-size: large;">test</span></strong></em></span></p>\n<p>o</p>\n<p>n''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free f</p>', NULL, NULL, '0', 'http://youtu.be/cGqndA5F3i8', '', NULL, '500', NULL, '2012-11-30 15:10:55', NULL, '1.22.80.220', NULL, NULL, '1', '1', 1, '2012-11-01 15:10:55', 29, 0, 1, 0, '0', 0, 0),
(40, 6, 12, 'test BALB', 'test-balb1', '    The Project Title field is required.\n    The Category field is required.\n    The Project Summary field is required.\n    The Amoun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_31683.jpeg', NULL, NULL, NULL, NULL, '343', NULL, '2012-12-02 17:24:00', NULL, '1.22.81.22', NULL, NULL, '1', '0', 0, '2012-11-02 17:24:00', 30, 0, 0, 0, '0', 0, 0),
(41, 14, 6, 'For testing purpose', 'for-testing-purpose6', 'For testing purpose this project was created For testing purpose this project was created For testing purpose this project was created ', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', NULL, NULL, NULL, '<p class="step1des" style="margin: 10px 5px 0px 0px; padding: 0px; color: #515151; font-size: 13px; float: left; word-wrap: break-word; font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 18px;">Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create.content</p>\n<h3 class="step3h3" style="margin: 20px 0px 0px; padding: 0px; color: #3ab7b9; font-size: 16px; float: left; font-family: Arial, Helvetica, sans-serif;">Important reminder</h3>\n<p class="step1des" style="margin: 10px 5px 0px 0px; padding: 0px; color: #515151; font-size: 13px; float: left; word-wrap: break-word; font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 18px;">Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.</p>', NULL, NULL, '0', 'http://www.youtube.com/watch?v=ukSvjqwJixw', '', NULL, '200', '95', '2012-11-15 15:51:18', NULL, '1.22.80.187', NULL, NULL, '1', '1', 1, '2012-11-03 15:51:18', 12, 0, 1, 0, '0', 0, 0),
(44, 6, 6, 'Untitled', 'untitled2', 'Test', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', NULL, NULL, NULL, '<p>Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.Don''t use music, images, video, or other content that you don''t have the rights to. Reusing copyrighted material is almost always against the law and can lead to expensive lawsuits down the road. The easiest way to avoid copyright troubles is to create all the content yourself or use content that is free for public use.</p>', NULL, 'project_31090.jpeg', '0', 'http://youtu.be/G41dzGYSyrQ', '', NULL, '111', NULL, '2012-11-22 11:03:02', NULL, '210.89.56.250', NULL, NULL, '1', '0', 0, '2012-11-03 11:03:02', 19, 0, 0, 0, '0', 0, 0),
(45, 14, 3, 'For testing purpose', 'for-testing-purpose10', 'for testing purpose this project was created. for testing purpose this project was created. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200', NULL, '2013-03-10 12:57:50', NULL, '1.22.81.226', NULL, NULL, '1', '0', 0, '2013-02-20 12:57:50', 18, 0, 0, 0, '0', 0, 0),
(55, 14, 7, 'nkjkjkjkljljlkjkljkjljljjkjljlk', 'nkjkjkjkljljlkjkljkjljljjkjljlk2', 'hgfh gfhfdgd fgh gfdh g fh gf hgfhf ghgf hgf hfdgdf ghgfdhgf hgfh gfhfg hgfhgfhfd  gdf gh  gfdhgf hgfhgf fghgfhgfhf dgd ghgfd hgfh gf h', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>dsfsdsd</p>', NULL, 'project_74904.jpeg', '0', 'fdfsdfsdfsdfsd', '', NULL, '100', NULL, '2012-12-27 10:05:43', NULL, '101.0.59.208', NULL, NULL, '1', '0', 0, '2012-12-17 10:05:43', 10, 0, 1, 0, '0', 0, 0),
(56, 14, 16, 'Animals In The Rainforest', 'animals-in-the-rainforest1', 'There are many species of plants and animals in the A common estimate is that \napproximately half of the world''s animal sp', 'South, Iceland', '', 'South', ' Iceland', NULL, NULL, NULL, '<p>Giant trees that are much higher than the average canopy height. It houses many birds and in&nbsp;The upper parts of the trees. This leafy environment is full of life in a tropical rainforest and includes: insects, birdsGiant trees that are much higher than the average canopy height. It houses many birds and in&nbsp;The upper parts of the trees. This leafy environment is full of life in a tropical rainforest and includes: insects, birdsGiant trees that are much higher than the average canopy height. It houses many birds and in&nbsp;The upper parts of the trees. This leafy environment is full of life in a tropical rainforest and includes: insects, birdsGiant trees that are much higher than the average canopy height. It houses many birds and in&nbsp;The upper parts of the trees. This leafy environment is full of life in a tropical rainforest and includes: insects, birdsGiant trees that are much higher than the average canopy height. It houses many birds and in&nbsp;The upper parts of the trees. This leafy environment is full of life in a tropical rainforest and includes: insects, birds</p>  ', '0', 'SAVE1.jpg', '0', 'https://www.youtube.com/watch?v=JS3SsxZ4JJE', '', NULL, '500', '14.25', '2013-02-26 10:20:20', NULL, '101.0.59.126', NULL, NULL, '1', '1', 1, '2012-12-29 10:20:20', 59, 1, 1, 0, '0', 0, 0),
(57, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:35:10', 0, 0, 0, 0, '', 0, 0),
(58, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:35:18', 0, 0, 0, 0, '', 0, 0),
(59, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:35:31', 0, 0, 0, 0, '', 0, 0),
(60, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:36:07', 0, 0, 0, 0, '', 0, 0),
(61, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:36:41', 0, 0, 0, 0, '', 0, 0),
(62, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:37:35', 0, 0, 0, 0, '', 0, 0),
(63, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:38:08', 0, 0, 0, 0, '', 0, 0),
(64, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:38:56', 0, 0, 0, 0, '', 0, 0),
(65, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:39:02', 0, 0, 0, 0, '', 0, 0),
(66, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:39:07', 0, 0, 0, 0, '', 0, 0),
(67, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:39:53', 0, 0, 0, 0, '', 0, 0),
(69, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.241', NULL, NULL, '1', '0', 0, '2012-11-06 14:54:22', 0, 0, 0, 0, '', 0, 0),
(70, 6, 6, 'TResat', 'tresat1', 'Tesat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_46414.jpeg', NULL, NULL, NULL, NULL, '1500', NULL, '2013-02-20 18:14:14', NULL, '1.22.81.247', NULL, NULL, '1', '0', 0, '2013-02-08 18:14:14', 12, 0, 0, 0, '0', 0, 0),
(71, 14, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '180.188.225.21', NULL, NULL, '1', '0', 0, '2012-12-14 20:40:16', 0, 0, 0, 0, '', 0, 0),
(72, 14, 8, 'Earthquake Information', 'earthquake-information1', 'Earthquakes, also called temblors, can be so tremendously destructive, it’s hard to imagine the', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', NULL, NULL, NULL, 'Earthquakes, also called temblors, can be so tremendously destructive, it’s hard to imagine they occur by the thousands every day around the world, usually in the form of small tremors.  ', '0', 'project_4776.jpeg', '0', 'http://www.youtube.com/watch?v=f-nLyA5mn_U', '', NULL, '500', NULL, '2013-03-11 09:06:17', NULL, '101.0.59.207', NULL, NULL, '1', '1', 1, '2013-02-19 09:06:17', 20, 1, 1, 0, '0', 0, 0),
(73, 14, 6, 'rakesh', 'rakesh1', 'test', '', '', '', '', NULL, NULL, NULL, '<p>test</p>', NULL, NULL, '0', '', '', '', '1000', NULL, '2012-12-29 15:03:10', NULL, '101.0.59.207', NULL, NULL, '1', '0', 0, '2012-12-17 15:03:10', 12, 0, 0, 0, '0', 0, 0),
(74, 14, 8, 'for test perk process ', 'for-test-perk-process-1', 'for test perk process for test perk process for test perk process for test perk process for test perk process for test perk process for', '', '', '', '', NULL, NULL, NULL, '<p>for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;for test perk process&nbsp;</p>', NULL, NULL, '0', 'http://www.youtube.com/watch?v=sYjmXBL4YgY', '', NULL, '1000', NULL, '2013-03-05 17:38:21', NULL, '1.22.83.138', NULL, NULL, '1', '0', 0, '2013-01-03 17:38:21', 61, 0, 1, 0, '0', 0, 0),
(75, 10, 9, 'for testing purpose', 'for-testing-purpose8', 'sdfs dfs dfsd ds f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', NULL, '2013-03-05 09:06:17', NULL, '101.0.59.207', NULL, NULL, '1', '1', 1, '2013-02-19 09:06:17', 14, 1, 0, 0, '0', 0, 0),
(76, 14, 8, 'Earthquake Information', 'earthquake-information2', 'Earthquakes, also called temblors, can be so tremendously destructive, it’s hard to imagine they occur by the thousands every day around the world, usually in the form of small tremors.', 'Eran, Afghanistan', '', 'Eran', ' Afghanistan', NULL, NULL, NULL, 'Earthquakes, also called temblors, can be so tremendously destructive, it’s hard to imagine they occur by the thousands every day around the world, usually in the form of small tremors.Earthquakes, also called temblors, can be so tremendously destructive, it’s hard to imagine they occur by the thousands every day around the world, usually in the form of small tremors.Earthquakes, also called temblors, can be so tremendously destructive, it’s hard to imagine they occur by the thousands every day around the world, usually in the form of small tremors.Earthquakes, also called temblors, can be so tremendously destructive, it’s hard to imagine they occur by the thousands every day around the world, usually in the form of small tremors.  ', '0', 'project_4433.jpeg', '0', '', '', NULL, '500', '14.25', '2013-01-11 10:51:02', NULL, '101.0.59.192', NULL, NULL, '1', '1', 1, '2012-12-28 10:51:02', 14, 1, 1, 0, '1626713567', 0, 0),
(77, 9, 6, 'The most complete chronological record', 'the-most-complete-chronological-record1', 'What actually happened to the two dogs became a source of controversy, all surrounding Kenn Sakurai, the only person who claimed to ', 'Bangalore, Karnataka, India', 'Bangalore', ' Karnataka', ' India', NULL, NULL, NULL, '<p><span>Losing a pet in a disaster is a trauma that doesn&rsquo;t easily heal, if at all.&nbsp;Hurricane Katrina is a reminder of the anguish suffered by residents who were forced to flee without their four-legged family members. And many refused, sometimes to their ultimate peril. That is the bond between people and animals. Japan is a nation of pets, with about 35 percent of Japanese caring for dogs and cats in their hom</span></p>', NULL, 'project_33517.jpeg', '0', 'https://www.youtube.com/watch?v=0XvIL2dK0U0', '', NULL, '250', NULL, '2013-02-22 12:40:02', NULL, '210.89.56.250', NULL, NULL, '1', '1', 1, '2012-12-24 12:40:02', 60, 1, 1, 0, '0', 0, 0),
(78, 9, 7, 'Combination Clothes  Washer/Dryer', 'combination-clothes-washerdryer3', 'Combination washer-dryers have been on the market for decades. They are used extensively in Europe and Asia and are practical for place', 'Dehradun, Uttarakhand, India', 'Dehradun', ' Uttarakhand', ' India', NULL, NULL, NULL, '<p>Make sure the air exhaust vent pipe is not restricted <br />and the outdoor vent flap will open when the dryer <br />is operating. Once a year, or more often if you <br />notice that it is taking longer than normal for your <br />clothes to dry, clean lint out of the vent pipe or <br />have a dryer lint removal service do it for you.<br />KKK Keep dryers in good working order. Gas dryers <br />should be inspected by a professional to make sure <br />that the gas line and connection are intact and free</p>', NULL, 'project_60247.jpeg', '0', 'https://www.youtube.com/watch?v=nLOIp0ap-7c', '', NULL, '255', NULL, '2013-03-03 12:40:59', NULL, '210.89.56.250', NULL, NULL, '1', '1', 1, '2012-12-24 12:40:59', 69, 0, 1, 0, '0', 0, 0),
(79, 9, 5, 'Test Bulb Invention', 'test-bulb-invention1', 'financial resources and determination to replace gas lighting with electrical lighting, Edison ', 'Kolkata, West Bengal, India', 'Kolkata', ' West Bengal', ' India', NULL, NULL, NULL, 'financial resources and determination to replace gas lighting with electrical lighting, Edison set out to make his light bulb invention more efficient. He hired a number of inventors to work on this goal including  ', '0', 'project_48357.jpeg', '0', '', '', NULL, '500', NULL, '2013-02-08 17:39:24', NULL, '1.22.80.105', NULL, NULL, '1', '1', 1, '2012-12-20 17:39:24', 50, 0, 1, 0, '0dsfsdfdsfds', 0, 0),
(80, 9, 17, 'Celebration Party of New Year  ', 'celebration-party-of-new-year-1', 'Description of Celebration party in Quick peek  field for testing purpose.', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', NULL, NULL, NULL, '<p>project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;project description for testing&nbsp;</p>  ', '0', 'project_50484.jpeg', '0', 'http://www.youtube.com/watch?v=eyy57F1SbEA', '', NULL, '250', '85.5', '2013-02-13 16:10:49', NULL, '1.22.80.105', NULL, NULL, '1', '1', 1, '2012-12-20 16:10:49', 55, 1, 1, 0, '0', 0, 0),
(81, 22, 15, 'Shipping Container Architecture', 'shipping-container-architecture1', 'Shipping containers are in many ways an ideal building material. They are designed to carry heavy loads and to be stacked in high colum', 'Roma, Italia', '', 'Roma', ' Italia', NULL, NULL, NULL, '<div>Not too long ago, the notion of living in an 8- by 20-foot box was enough to stop a potential homebuyer in his tracks … and send him running for the exits. The rise of innovative green architecture has created in increasingly in-vogue practice: rejiggering, stacking and linking rugged and versatile freight shipping containers and transforming them into fully inhabitable homes.</div>\n<div>&nbsp;</div>\n<div>An excellent method of reusing — there are more than 300 million shipping containers sitting empty at ports around the world — shipping containers are used to build full- and part-time single-family homes and much more. In their most basic form, recycled shipping contain</div>  ', '0', '0', '0', 'https://www.youtube.com/watch?v=MqEQEDKkzX4', '', NULL, '250.00', '143.45', '2013-03-16 10:50:59', NULL, '210.89.56.250', NULL, NULL, '1', '1', 1, '2012-12-28 10:50:59', 78, 1, 1, 0, '0', 0, 0),
(83, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '176.205.199.209', NULL, NULL, '1', '0', 0, '2012-12-26 15:36:35', 0, 0, 0, 0, '', 0, 0),
(84, 6, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_19548.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.81.249', NULL, NULL, '1', '0', 0, '2012-12-26 17:13:34', 0, 0, 0, 0, '', 0, 0),
(85, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '176.205.199.209', NULL, NULL, '1', '0', 0, '2012-12-26 20:22:55', 0, 0, 0, 0, '', 0, 0),
(86, 16, 6, 'Test', 'test3', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '354', NULL, '2013-01-06 22:40:35', NULL, '96.254.46.230', NULL, NULL, '1', '0', 0, '2012-12-27 22:40:35', 10, 0, 1, 0, '0', 0, 0),
(87, 16, 7, 'Project Management Institute', 'project-management-institute1', 'Renewing your credential helps you earn greater recognition, opportunities and rewards in your', 'Dehradun, Uttarakhand, India', 'Dehradun', ' Uttarakhand', ' India', NULL, NULL, NULL, '<p>Whether you''re a student, just stepping into the arena of project management, or a beginner changing careers, or even if you are already serving as a subjectWhether you''re a student, just stepping into the arena of project management, or a beginner changing careers, or even if you are already serving as a subjectWhether you''re a student, just stepping into the arena of project management, or a beginner changing careers, or even if you are already serving as a subjectWhether you''re a student, just stepping into the arena of project management, or a beginner changing careers, or even if you are already serving as a subjectWhether you''re a student, just stepping into the arena of project management, or a beginner changing careers, or even if you are already serving as a subject            </p>  ', '0', 'project_50029.jpeg', '0', 'http://yahoo.com', '', NULL, '1000', NULL, '2013-01-07 10:50:56', NULL, '96.254.46.230', NULL, NULL, '1', '1', 1, '2012-12-28 10:50:56', 10, 1, 1, 0, '1212121', 0, 0),
(88, 16, 6, 'Untitled 56', 'untitled-561', '5050505', '', '', '', '', NULL, NULL, NULL, '<p>cdsc dscds csscd</p>\n<p>cd&nbsp;</p>\n<p>cd cdc dc d</p>\n<p>c dc dc d&nbsp;</p>', NULL, NULL, '0', 'cdcd ', '', NULL, '101', NULL, '2013-04-18 22:13:52', NULL, '78.134.121.126', NULL, NULL, '1', '0', 0, '2013-02-27 22:13:52', 50, 0, 1, 0, '0', 0, 0),
(89, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '67.171.67.142', NULL, NULL, '1', '0', 0, '2013-01-03 08:59:13', 0, 0, 0, 0, '', 0, 0),
(90, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '67.171.67.142', NULL, NULL, '1', '0', 0, '2013-01-03 10:03:14', 0, 0, 0, 0, '', 0, 0),
(91, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '67.171.67.142', NULL, NULL, '1', '0', 0, '2013-01-03 10:32:27', 0, 0, 0, 0, '', 0, 0),
(92, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '67.171.67.142', NULL, NULL, '1', '0', 0, '2013-01-03 11:14:51', 0, 0, 0, 0, '', 0, 0),
(94, 16, 3, 'Untitled', 'untitled3', 'fkjhdd, dfhkf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>jdhkdf jhjhdf dhjf</p>', NULL, NULL, '0', '&lt;iframe width="420" height="315" src="http://www.youtube.com/embed/K-L3dBp4crE" frameborder="0" allowfullscreen&gt;&lt;/iframe>', '', NULL, '1000', NULL, '2013-01-26 11:19:27', NULL, '1.22.83.138', NULL, NULL, '1', '0', 0, '2013-01-03 11:19:27', 23, 0, 0, 0, '0', 0, 0),
(95, 16, 17, 'dfsdf', 'dfsdf1', 'rdyhdfhgdfhdh', 'Vado, NM, USA', 'Vado', ' NM', ' USA', NULL, NULL, NULL, '<p>dfhdhdfhdfxdhddfhdf</p>', '0', 'project_30665.jpeg', '0', '', '', NULL, '500', NULL, '2013-03-15 12:22:50', NULL, '1.22.83.145', NULL, NULL, '1', '1', 1, '2013-02-14 12:22:50', 29, 1, 1, 0, '456456', 0, 0),
(96, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '24.5.38.52', NULL, NULL, '1', '0', 0, '2013-01-04 11:32:48', 0, 0, 0, 0, '', 0, 0),
(97, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '24.5.38.52', NULL, NULL, '1', '0', 0, '2013-01-04 12:08:49', 0, 0, 0, 0, '', 0, 0),
(98, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '108.226.92.67', NULL, NULL, '1', '0', 0, '2013-01-07 12:00:20', 0, 0, 0, 0, '', 0, 0),
(99, 0, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '150.70.75.35', NULL, NULL, '1', '0', 0, '2013-01-07 12:04:28', 0, 0, 0, 0, '', 0, 0),
(100, 6, 6, 'Rwe', 'rwe1', 'Tste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', NULL, '2013-03-16 10:22:38', NULL, '210.89.56.250', NULL, NULL, '1', '0', 0, '2013-01-25 10:22:38', 50, 0, 0, 0, '0', 0, 0),
(101, 8, 3, 'Technology Institiue', 'technology-institiue1', 'Technology Institiue', 'Tucumán Province, Argentina', '', 'Tucumán Province', ' Argentina', NULL, NULL, NULL, '<p>Technology Institiue</p>', '0', 'project_31060.jpeg', '0', '', '', NULL, '1500', NULL, '2013-02-08 13:45:15', NULL, '1.22.80.249', NULL, NULL, '1', '1', 1, '2013-01-08 13:45:15', 31, 1, 1, 0, '', 0, 1),
(102, 6, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.249', NULL, NULL, '1', '0', 0, '2013-01-08 14:32:46', 0, 0, 0, 0, '', 0, 0),
(103, 6, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_86199.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.80.249', NULL, NULL, '1', '0', 0, '2013-01-08 14:58:01', 0, 0, 0, 0, '', 0, 0),
(104, 6, 12, 'testing', 'testing1', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>test</p>', NULL, 'project_89888.jpeg', '0', 'http://www.youtube.com/watch?v=DgGFNxFBzV0', '', NULL, '1000', NULL, '2013-01-31 15:30:05', NULL, '1.22.83.169', NULL, NULL, '1', '0', 0, '2013-01-09 15:30:05', 22, 0, 1, 0, '0', 0, 0),
(105, 16, 15, 'Testy McTesterson', 'testy-mctesterson1', 'This is the quick peek stuff....', '', '', '', '', NULL, NULL, NULL, '<p>Lorizzle ipsizzle get down get down sit amizzle, its fo rizzle adipiscing elit. Nullam sapizzle velit, aliquet volutpizzle, fizzle quizzle, stuff vizzle, arcu. Pellentesque sizzle yo mamma. Nizzle break it down. Fusce at dolizzle dapibus turpis tempizzle doggy. Maurizzle fo shizzle nibh fo shizzle my nizzle turpizzle. My shizz izzle tortor. Check out this dizzle we gonna chung. I''m in the shizzle hac i''m in the shizzle platea dictumst. Shizzlin dizzle dapibizzle. Curabitur tellizzle that''s the shizzle, pretizzle ma nizzle, mattizzle izzle, sizzle shut the shizzle up, nunc. Pimpin'' suscipizzle. Integer semper ass sizzle purus.</p>\n<p>Praesent non mi non maurizzle shiznit bibendizzle. Aliquam check out this daahng dawg lectizzle. Get down get down id crackalackin izzle bling bling sodalizzle . Aliquam lobortis, mauris shit dapibizzle owned, nulla ligula bibendizzle metizzle, et funky fresh augue dawg gangsta away. Vivamus gravida lacizzle id bow wow wow. Vivamizzle i saw beyonces tizzles and my pizzle went crizzle magna, fermentizzle da bomb amet, faucibus in, rizzle izzle, go to hizzle. Sed vehicula laorizzle check it out. Vestibulizzle erizzle dizzle, hendrerit izzle, phat izzle, crazy a, gangsta. Morbi ass placerat nulla. Fizzle malesuada that''s the shizzle check out this erizzle. Fusce metus own yo'', egestizzle eu, boofron quis, elementum ass, neque. Shut the shizzle up iaculizzle fo shizzle a fizzle dang sodales. Stuff sagittis, nulla cool sollicitudizzle mollis, lacus quizzle bling bling erat, daahng dawg check it out augue purus vitae i''m in the shizzle. Etizzle vehicula ma nizzle. Gangster sizzle mi. Dizzle fizzle turpizzle. Vestibulizzle a away. Sizzle dizzle erat, crackalackin fizzle, fo shizzle ac, shizznit izzle, pede. Nunc dizzle. Uhuh ... yih! nisi erizzle, tristique dope get down get down, ultricizzle dizzle, brizzle you son of a bizzle, augue.</p>\n<p><img src="http://november-project.com/wp-content/uploads/2012/10/Indiana-Jones.jpeg" alt="" width="2029" height="1461" /></p>\n<p>Vivamizzle nizzle shiznit egizzle nisi bow wow wow things. Vivamizzle i''m in the shizzle amizzle lacizzle. Nam eu get down get down eget lacus yippiyo the bizzle. That''s the shizzle suscipizzle check out this ipsizzle. Doggy in dizzle. Vestibulizzle brizzle enizzle, auctor sed, congue eu, hizzle pizzle, libero. Nullam fizzle pede non erizzle posuere pharetra. Shizzle my nizzle crocodizzle we gonna chung tortor, congue bow wow wow, my shizz uhuh ... yih!, mollizzle sit amizzle, shizzle my nizzle crocodizzle. Fo shizzle crackalackin dui. Check out this shit purizzle, da bomb for sure, sollicitudizzle go to hizzle, consequizzle imperdiet, turpizzle. Quisque a break it down eu mi rutrizzle black. Curabitizzle accumsan sagittis ipsum. Ma nizzle habitant morbi ghetto senectizzle izzle netus pimpin'' brizzle phat da bomb egestizzle. In est. Yo mamma fo shizzle mah nizzle fo rizzle, mah home g-dizzle. Ut erizzle felis, sempizzle its fo rizzle, for sure ac, porta pulvinar, nisl. Mah nizzle pimpin'' gravida velit.</p>\n<p>Pizzle ullamcorpizzle. Fo shizzle sagittizzle gizzle a maurizzle. Cool shizzlin dizzle break it down primis izzle shit orci gangster izzle sure yo mamma cubilia Curae; Fo shizzle vestibulizzle. Boofron boom shackalack morbi tristique senectizzle et netus et malesuada fames fo shizzle turpizzle check out this. Donizzle fo shizzle hendrerizzle shiznit. Aliquizzle bling bling volutpat. Vivamus tortizzle izzle, scelerisque ac, shit a, fringilla bizzle, arcu. Crazy i''m in the shizzle. Sizzle owned, yippiyo izzle pharetra aliquet, sizzle erizzle away neque, gangsta ullamcorper urna dolizzle quis nibh. Break yo neck, yall tellus neque, daahng dawg ut, ornare sheezy, vulputate nizzle, leo. Pot purizzle sizzle, bibendum bizzle amizzle, break it down we gonna chung, dignissim ghetto, phat. Aenean away ipsizzle phat est cool tincidunt. Donec quam. Crazy ligula fizzle, tempizzle crunk, scelerisque venenatizzle, sodalizzle doggy, mofo. Etiam gravida.</p>', NULL, 'project_21432.jpeg', '0', 'http://vimeo.com/53270000', '', 'http://b.vimeocdn.com/ts/367/820/367820744_640.jpg', '1800', NULL, '2013-03-30 23:42:04', NULL, '184.96.156.200', NULL, NULL, '1', '0', 0, '2013-01-09 23:42:04', 80, 0, 1, 0, '0', 0, 0),
(106, 16, 7, 'tester70', 'tester701', 'jhhhhhhhhhhhhhhhhhhhhhhhhh', '', '', '', '', NULL, NULL, NULL, '<p>hkjjjjjjjjjjjjj</p>', NULL, 'project_757.jpeg', '0', 'http://www.youtube.com/watch?v=AtyKofFih8Y', '', NULL, '1000', NULL, '2013-03-01 11:15:38', NULL, '84.112.165.230', NULL, NULL, '1', '0', 0, '2013-01-10 11:15:38', 50, 0, 1, 0, '0', 0, 0),
(107, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '184.96.156.200', NULL, NULL, '1', '0', 0, '2013-01-11 01:33:03', 0, 0, 1, 0, '', 0, 0),
(108, 16, 7, 'trtester', 'trtester1', 'fdafdsafdsafdsafdsafas', '', '', '', '', NULL, NULL, NULL, '<p>fdafdsafsdfa</p>', NULL, 'project_16162.png', '0', 'http://vimeo.com/53270000', '', 'http://b.vimeocdn.com/ts/367/820/367820744_640.jpg', '1999', NULL, '2013-03-02 10:39:05', NULL, '184.96.156.200', NULL, NULL, '1', '0', 0, '2013-01-11 10:39:05', 50, 0, 1, 0, '0', 0, 0),
(109, 7, 16, 'kkkkkkk', 'kkkkkkk1', '0444444444444444', 'Gregg County Airport (GGG), 269 Terminal Circle, TX 75603, USA', ' 269 Terminal Circle', ' TX 75603', ' USA', NULL, NULL, NULL, '<p>0444444444444444</p>', '0', 'project_2462.jpeg', '0', '', '', NULL, '8000', NULL, '2013-02-26 16:56:29', NULL, '96.250.233.60', NULL, NULL, '1', '0', 0, '2013-01-11 16:56:29', 47, 0, 1, 0, '', 0, 0),
(111, 6, 6, 'fdgfg', 'fdgfg1', 'ghfhf', '', '', '', '', NULL, NULL, NULL, '<p>dfgdg</p>', NULL, 'project_94953.jpeg', '0', 'http://www.youtube.com/watch?v=UN5Ss-EV_qc', '', NULL, '120', NULL, '2013-04-03 16:06:07', NULL, '1.22.81.203', NULL, NULL, '1', '0', 0, '2013-01-12 16:06:07', 81, 0, 1, 0, '0', 0, 0),
(112, 16, 9, 'sdfsdf', 'sdfsdf1', 'sdfsdfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', NULL, '2013-04-15 19:26:16', NULL, '91.123.234.31', NULL, NULL, '1', '0', 0, '2013-01-15 19:26:16', 90, 0, 0, 0, '0', 0, 0);
INSERT INTO `project` (`project_id`, `user_id`, `category_id`, `project_title`, `url_project_title`, `project_summary`, `project_address`, `project_city`, `project_state`, `project_country`, `project_lat`, `project_long`, `color`, `description`, `display_page`, `image`, `video_type`, `video`, `custom_video`, `video_image`, `amount`, `amount_get`, `end_date`, `allow_overflow`, `host_ip`, `total_rate`, `vote`, `status`, `active`, `active_cnt`, `date_added`, `total_days`, `is_featured`, `project_draft`, `end_send`, `p_google_code`, `payment_type`, `staff_pickup`) VALUES
(113, 6, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.22.81.214', NULL, NULL, '1', '0', 0, '2013-01-16 18:02:06', 0, 0, 0, 0, '', 0, 0),
(114, 16, 6, 'Untitled', 'untitled1', 'bb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_2762.jpeg', NULL, NULL, NULL, NULL, '1000', NULL, '2013-03-27 08:08:26', NULL, '101.171.85.75', NULL, NULL, '1', '0', 0, '2013-02-25 08:08:26', 30, 0, 1, 0, '0', 0, 0),
(115, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '82.132.221.233', NULL, NULL, '1', '0', 0, '2013-01-19 03:43:46', 0, 0, 0, 0, '', 0, 0),
(116, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '2.224.43.204', NULL, NULL, '1', '0', 0, '2013-01-20 03:17:43', 0, 0, 0, 0, '', 0, 0),
(117, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '82.14.17.50', NULL, NULL, '1', '0', 0, '2013-01-21 16:07:14', 0, 0, 0, 0, '', 0, 0),
(118, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '82.14.17.50', NULL, NULL, '1', '0', 0, '2013-01-22 15:32:36', 0, 0, 0, 0, '', 0, 0),
(119, 16, 12, 'Untitled', 'untitled4', 'testing', '', '', '', '', NULL, NULL, NULL, '<p>Hi, how are u doing?</p>', NULL, NULL, '0', 'www.youtube.com/adhfjh', '', NULL, '1000', NULL, '2013-04-22 21:51:06', NULL, '119.236.33.215', NULL, NULL, '1', '0', 0, '2013-01-22 21:51:06', 90, 0, 1, 0, '0', 0, 0),
(120, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '122.252.239.151', NULL, NULL, '1', '0', 0, '2013-01-23 09:15:05', 0, 0, 0, 0, '', 0, 0),
(121, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '122.252.239.151', NULL, NULL, '1', '0', 0, '2013-01-23 12:02:35', 0, 0, 0, 0, '', 0, 0),
(122, 16, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '122.252.239.151', NULL, NULL, '1', '0', 0, '2013-01-23 12:20:04', 0, 0, 0, 0, '', 0, 0),
(123, 16, 14, 'progetto palizzo', 'progetto-palizzo2', 'descrizione progetto nozze palizzo', 'Via Istria, 31100 Treviso TV, Italia', 'Via Istria', ' 31100 Treviso TV', ' Italia', NULL, NULL, NULL, '<p>descrizione progettoooooo</p>', NULL, 'project_95245.jpeg', '0', 'http://vimeo.com/52861634', '', 'http://b.vimeocdn.com/ts/364/865/364865123_640.jpg', '101', NULL, '2013-02-07 15:54:05', NULL, '95.225.8.28', NULL, NULL, '1', '0', 0, '2013-01-23 15:54:05', 15, 0, 1, 0, '0', 0, 0),
(124, 6, 6, 'fgdfg', 'fgdfg7', '123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345', '', '', '', '', NULL, NULL, NULL, '<p>fgdfgdfgdfg</p>', NULL, NULL, '0', 'http://www.youtube.com/watch?v=yq0zZGfwjsg', '', NULL, '100', NULL, '2013-02-15 13:30:22', NULL, '210.89.56.250', NULL, NULL, '1', '0', 0, '2013-01-25 13:30:22', 21, 0, 0, 0, '0', 0, 0),
(125, 6, 16, 'Untitled', 'untitled5', 'dfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_32429.jpeg', NULL, NULL, NULL, NULL, '124', NULL, '2013-03-11 14:57:16', NULL, '210.89.56.250', NULL, NULL, '1', '0', 0, '2013-01-25 14:57:16', 45, 0, 0, 0, '0', 0, 0),
(126, 6, 3, 'Untitled', 'untitled7', 'dfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1200', NULL, '2013-02-08 15:46:24', NULL, '210.89.56.250', NULL, NULL, '1', '0', 0, '2013-01-25 15:46:24', 14, 0, 0, 0, '0', 0, 0),
(127, 6, 3, 'fgdfg', 'fgdfg9', 'ghf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>fghfghfh</p>', NULL, NULL, '0', 'http://www.youtube.com/watch?v=A6XUVjK9W4o', '', NULL, '122', NULL, '2013-02-09 17:10:24', NULL, '210.89.56.250', NULL, NULL, '1', '0', 0, '2013-01-25 17:10:24', 15, 0, 0, 0, '0', 0, 0),
(129, 16, 8, 'Untitled', 'untitled9', 'hi this is a test', '', '', '', '', NULL, NULL, NULL, '<p>ths is a test video</p>', NULL, NULL, '0', 'www.youtube.com', '', NULL, '400', NULL, '2013-03-19 22:33:42', NULL, '120.88.228.229', NULL, NULL, '1', '0', 0, '2013-01-28 22:33:42', 50, 0, 1, 0, '0', 0, 0),
(130, 16, 7, 'Untitledaaaaaaaaaaaaa aaaaa aaaaaahhhhhhhhhh hhhhhhhhhhhu gg', 'untitledaaaaaaaaaaaaa-aaaaa-aaaaaahhhhhhhhhh-hhhhhhhhhhhu-gg1', 'aaaaaaaa', '', '', '', '', NULL, NULL, NULL, '<p>aaaaaaaaaaaaaaaa</p>', NULL, NULL, '0', 'http://www.youtube.com/watch?v=iLP4kT5YoU4', '', NULL, '1000', NULL, '2013-03-31 18:35:51', NULL, '79.85.122.246', NULL, NULL, '1', '0', 0, '2013-01-30 18:35:51', 60, 0, 1, 0, '0', 0, 0),
(131, 16, 7, 'Untitled', 'untitled1', 'gggggggggggggggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', NULL, '2013-03-21 18:51:14', NULL, '79.85.122.246', NULL, NULL, '1', '0', 0, '2013-01-30 18:51:14', 50, 0, 0, 0, '0', 0, 0),
(132, 16, 8, 'test45', 'test451', 'huuuuuuuuuuuuuuu', '59 pevensey road hastings', '', '', '59 pevensey road hastings', NULL, NULL, NULL, '<p>hhio</p>', NULL, NULL, '0', 'http://youtu.be/r0-c_3EKKzM', '', NULL, '1000', NULL, '2013-05-07 21:43:21', NULL, '2.28.138.242', NULL, NULL, '1', '0', 0, '2013-03-18 21:43:21', 50, 0, 1, 0, '0', 0, 0),
(133, 16, 7, '_aaa', '-aaa1', 'asfajnosfa\nadkfnalkfa\nfalfnlasf\n', 'Rossel Island, Papua New Guinea', '', 'Rossel Island', ' Papua New Guinea', NULL, NULL, NULL, '<p>sfafaf</p>', NULL, NULL, '0', 'http://www.youtube.com/watch?v=wcn25miacSI', '', NULL, '1000', NULL, '2013-03-24 04:15:53', NULL, '187.126.77.51', NULL, NULL, '1', '0', 0, '2013-02-02 04:15:53', 50, 0, 1, 0, '0', 0, 0),
(134, 14, 6, 'vxcvvxvfgfgfgfgfdgfggdggggdfgdgdfgdfggdgdgd', 'vxcvvxvfgfgfgfgfdgfggdggggdfgdgdfgdfggdgdgd1', 'cvbcvbgdfggfdgfgfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000', NULL, '2013-02-22 15:52:09', NULL, '1.22.82.197', NULL, NULL, '1', '0', 0, '2013-02-02 15:52:09', 20, 0, 0, 0, '0', 0, 0),
(135, 16, 6, 'tesetsetet', 'tesetsetet1', 'testetsetsetsetestset', 'Sheung Wan, Hong Kong', '', 'Sheung Wan', ' Hong Kong', NULL, NULL, NULL, '<p>TE/hisETSE is awesome</p>', NULL, 'project_63253.jpeg', '0', 'http://www.youtube.com/watch?v=CCJTSwtPAe0', '', NULL, '200', NULL, '2013-02-25 18:56:32', NULL, '203.80.103.161', NULL, NULL, '1', '0', 0, '2013-02-05 18:56:32', 20, 0, 1, 0, '0', 0, 0),
(136, 16, 8, 'duck', 'duck1', 'ijhg hjfhgjf gjhfjg fguhgjngjhgh gungingunh', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'project_25439.png', NULL, NULL, NULL, NULL, '1500', NULL, '2013-06-09 17:07:53', NULL, '182.72.136.170', NULL, NULL, '1', '0', 0, '2013-03-11 17:07:53', 90, 0, 1, 0, '0', 0, 0),
(137, 16, 16, 'BB', 'bb1', 'Blah', '', '', '', '', NULL, NULL, NULL, '<p>vvdfvvdvdfvda</p>', NULL, NULL, '0', 'gjjlgj', '', NULL, '1000', NULL, '2013-02-18 12:46:35', NULL, '68.43.229.206', NULL, NULL, '1', '1', 1, '2013-02-08 12:46:35', 10, 1, 1, 0, '0', 0, 0),
(138, 16, 14, 'fgfgf', 'fgfgf1', 'fgfgffnb hjkhfgfgf', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'project_71590.jpeg', NULL, NULL, NULL, NULL, '1500', NULL, '2013-06-08 21:23:00', NULL, '123.236.86.136', NULL, NULL, '1', '0', 0, '2013-03-10 21:23:00', 90, 0, 1, 0, '0', 0, 0),
(139, 6, 9, 'Untitled', 'untitled1', 'ㅓㅗ호ㅓ하ㅓㅗ허ㅗ하ㅓ허하화ㅓ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'project_97922.jpeg', NULL, NULL, NULL, NULL, '400', NULL, '2013-05-05 09:41:28', NULL, '1.223.109.115', NULL, NULL, '1', '0', 0, '2013-02-14 09:41:28', 80, 0, 0, 0, '0', 0, 0),
(140, 6, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.223.109.115', NULL, NULL, '1', '0', 0, '2013-02-18 06:48:41', 0, 0, 0, 0, '', 0, 0),
(141, 6, 0, 'Untitled', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, '1.223.109.115', NULL, NULL, '1', '0', 0, '2013-02-18 06:49:28', 0, 0, 0, 0, '', 0, 0),
(142, 6, 7, 'Untitled', 'untitled1', 'ddeded', '', '', '', '', NULL, NULL, NULL, '                                  dwqddwq dwqwdq                                                         ', NULL, NULL, '0', 'dwwqdqwdwdq', '', NULL, '150', NULL, '2013-03-30 06:56:14', NULL, '1.223.109.115', NULL, NULL, '1', '0', 0, '2013-02-18 06:56:14', 40, 0, 1, 0, '0', 0, 0),
(143, 6, 7, 'Untitledfe', 'untitledfe3', ''';'';''hjhgjjhkjhg ghgj', 'india', '', '', 'india', NULL, NULL, NULL, 'dede    dede  ', '0', 'big3.jpg', '0', 'http://dwjdw.fkewnjwnd', '', NULL, '100', NULL, '2013-05-09 14:01:22', NULL, '1.223.109.115', NULL, NULL, '1', '0', 0, '2013-02-18 14:01:22', 80, 0, 1, 0, '0UA-23165973-1', 0, 0),
(144, 40, 3, 'test for donate ', 'test-for-donate-1', 'test for donate', 'The Avignon Cathedral Notre-Dame des Doms', '', '', 'The Avignon Cathedral Notre-Dame des Doms', NULL, NULL, NULL, '<p>tesint for wallet</p>', NULL, NULL, '0', 'http://www.youtube.com/watch?v=cQO_G577Mf8', '', NULL, '100', '9.5', '2013-06-26 16:03:51', NULL, '210.89.56.198', NULL, NULL, '1', '1', 1, '2013-06-06 16:03:51', 20, 0, 1, 0, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

CREATE TABLE IF NOT EXISTS `project_category` (
  `project_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_category_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `parent_project_category_id` int(100) NOT NULL DEFAULT '0',
  `category_color_code` varchar(255) NOT NULL,
  PRIMARY KEY (`project_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `project_category`
--

INSERT INTO `project_category` (`project_category_id`, `project_category_name`, `active`, `parent_project_category_id`, `category_color_code`) VALUES
(3, 'Education fund', '1', 0, 'A04DFF'),
(5, 'Gifts', '1', 0, 'B5FFFF'),
(6, 'Tsunami Charity', '0', 3, 'BE3BFF'),
(7, 'Design', '1', 3, 'A1D9FF'),
(8, 'Earthquake', '0', 3, '7588FF'),
(9, 'Hospital', '1', 3, 'FF96D5'),
(11, 'Games', '1', 3, 'F2FF38'),
(12, 'Art', '1', 3, '30FFEA'),
(13, 'Sports', '1', 3, '432EFF'),
(14, 'Weddings', '1', 5, 'FFA47D'),
(15, 'Film & video', '1', 5, 'FF8E1C'),
(16, 'Animals & Pets', '1', 5, '2EFFAB'),
(17, 'Celebrations', '1', 5, '8921FF');

-- --------------------------------------------------------

--
-- Table structure for table `project_flag`
--

CREATE TABLE IF NOT EXISTS `project_flag` (
  `project_flag_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_flag_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`project_flag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_follower`
--

CREATE TABLE IF NOT EXISTS `project_follower` (
  `project_follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `project_follow_user_id` int(11) NOT NULL,
  `project_follow_date` datetime NOT NULL,
  PRIMARY KEY (`project_follow_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `project_follower`
--

INSERT INTO `project_follower` (`project_follow_id`, `project_id`, `project_follow_user_id`, `project_follow_date`) VALUES
(1, 12, 9, '2012-10-19 16:34:05'),
(2, 1, 9, '2012-10-19 17:24:50'),
(3, 21, 6, '2012-10-22 16:35:30'),
(4, 22, 6, '2012-10-22 16:37:54'),
(5, 28, 9, '2012-10-30 12:43:28'),
(6, 31, 9, '2012-10-30 16:13:59'),
(7, 34, 9, '2012-10-30 17:32:43'),
(8, 41, 6, '2012-11-05 13:44:41'),
(11, 11, 9, '2012-12-20 10:09:28'),
(12, 36, 5, '2012-12-20 16:04:33'),
(13, 80, 5, '2012-12-20 17:16:42'),
(14, 101, 16, '2013-01-22 23:45:29'),
(15, 28, 45, '2013-03-12 23:03:34'),
(16, 81, 16, '2013-03-18 21:51:08'),
(17, 0, 0, '2013-03-21 08:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `project_gallery`
--

CREATE TABLE IF NOT EXISTS `project_gallery` (
  `project_gallery_id` int(100) NOT NULL AUTO_INCREMENT,
  `project_id` int(100) NOT NULL,
  `project_image` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`project_gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `project_gallery`
--

INSERT INTO `project_gallery` (`project_gallery_id`, `project_id`, `project_image`, `date_added`) VALUES
(2, 20, 'project_85664.jpeg', '0000-00-00 00:00:00'),
(3, 72, 'project_89581.jpeg', '0000-00-00 00:00:00'),
(4, 72, 'project_26388.jpeg', '0000-00-00 00:00:00'),
(6, 95, 'project_30665.jpeg', '0000-00-00 00:00:00'),
(7, 101, 'project_31060.jpeg', '0000-00-00 00:00:00'),
(8, 109, 'project_2462.jpeg', '0000-00-00 00:00:00'),
(9, 95, 'project_38073.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_setting`
--

CREATE TABLE IF NOT EXISTS `project_setting` (
  `project_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `enable_paypal` varchar(255) DEFAULT NULL,
  `payment_flow` varchar(255) DEFAULT NULL,
  `pay_fee` varchar(255) DEFAULT NULL,
  `project_listing_fee` varchar(255) DEFAULT NULL,
  `project_listing_fee_type` varchar(255) DEFAULT NULL,
  `commission` varchar(255) DEFAULT NULL,
  `project_short_desc_length` varchar(255) DEFAULT NULL,
  `site_stat_front` varchar(255) DEFAULT NULL,
  `min_project_amount` varchar(255) DEFAULT NULL,
  `max_project_amount` varchar(255) DEFAULT NULL,
  `project_user` varchar(255) DEFAULT NULL,
  `edit_amount` varchar(255) DEFAULT NULL,
  `edit_end_date` date NOT NULL,
  `approve_project` varchar(255) DEFAULT NULL,
  `cancel_project` varchar(255) DEFAULT NULL,
  `default_pledge` varchar(255) DEFAULT NULL,
  `enable_fixed_pledge` varchar(255) DEFAULT NULL,
  `enable_owner_fixed_amount` varchar(255) DEFAULT NULL,
  `enable_multiple_type` varchar(255) DEFAULT NULL,
  `enable_owner_multiple_amount` varchar(255) DEFAULT NULL,
  `enable_suggested_type` varchar(255) DEFAULT NULL,
  `enable_owner_suggested_amount` varchar(255) DEFAULT NULL,
  `enable_min_amount` varchar(255) DEFAULT NULL,
  `enable_owner_min_amount` varchar(255) DEFAULT NULL,
  `allow_guest_backers_list` varchar(255) DEFAULT NULL,
  `allow_guest_backers_amount` varchar(255) DEFAULT NULL,
  `allow_backers_amount` varchar(255) DEFAULT NULL,
  `allow_cancel_pledge_backers` varchar(255) DEFAULT NULL,
  `min_days_pledge_cancel` varchar(255) DEFAULT NULL,
  `allow_cancel_pledge_owner` varchar(255) DEFAULT NULL,
  `allow_owner_fund_own` varchar(255) DEFAULT NULL,
  `allow_owner_fund_other` varchar(255) DEFAULT NULL,
  `enable_project_reward` varchar(255) DEFAULT NULL,
  `reward_detail_optional` varchar(255) DEFAULT NULL,
  `allow_owner_edit_reward` varchar(255) DEFAULT NULL,
  `small_project_max_days` varchar(255) DEFAULT NULL,
  `small_project_max_amount` varchar(255) DEFAULT NULL,
  `funded_percentage` varchar(255) DEFAULT NULL,
  `no_of_category` varchar(255) DEFAULT NULL,
  `enable_overfund` varchar(255) DEFAULT NULL,
  `owner_set_overfund` varchar(255) DEFAULT NULL,
  `enable_project_follower` varchar(255) DEFAULT NULL,
  `enable_project_comment` varchar(255) DEFAULT NULL,
  `enable_update_comment` varchar(255) DEFAULT NULL,
  `enable_project_rating` varchar(255) DEFAULT NULL,
  `logged_user_login` varchar(255) DEFAULT NULL,
  `enable_project_flag` varchar(255) DEFAULT NULL,
  `auto_suspend_project` varchar(255) DEFAULT NULL,
  `auto_fund_capture` varchar(255) DEFAULT NULL,
  `auto_suspend_comment` varchar(255) DEFAULT NULL,
  `auto_suspend_update` varchar(255) DEFAULT NULL,
  `auto_suspend` varchar(255) DEFAULT NULL,
  `auto_suspend_message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`project_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_setting`
--

INSERT INTO `project_setting` (`project_setting_id`, `enable_paypal`, `payment_flow`, `pay_fee`, `project_listing_fee`, `project_listing_fee_type`, `commission`, `project_short_desc_length`, `site_stat_front`, `min_project_amount`, `max_project_amount`, `project_user`, `edit_amount`, `edit_end_date`, `approve_project`, `cancel_project`, `default_pledge`, `enable_fixed_pledge`, `enable_owner_fixed_amount`, `enable_multiple_type`, `enable_owner_multiple_amount`, `enable_suggested_type`, `enable_owner_suggested_amount`, `enable_min_amount`, `enable_owner_min_amount`, `allow_guest_backers_list`, `allow_guest_backers_amount`, `allow_backers_amount`, `allow_cancel_pledge_backers`, `min_days_pledge_cancel`, `allow_cancel_pledge_owner`, `allow_owner_fund_own`, `allow_owner_fund_other`, `enable_project_reward`, `reward_detail_optional`, `allow_owner_edit_reward`, `small_project_max_days`, `small_project_max_amount`, `funded_percentage`, `no_of_category`, `enable_overfund`, `owner_set_overfund`, `enable_project_follower`, `enable_project_comment`, `enable_update_comment`, `enable_project_rating`, `logged_user_login`, `enable_project_flag`, `auto_suspend_project`, `auto_fund_capture`, `auto_suspend_comment`, `auto_suspend_update`, `auto_suspend`, `auto_suspend_message`) VALUES
(1, '0', '0', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE IF NOT EXISTS `project_status` (
  `project_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_status_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`project_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`project_status_id`, `project_status_name`) VALUES
(1, 'Started'),
(2, 'Finished'),
(3, 'Paused'),
(4, '50% finished'),
(5, 'Stopped');

-- --------------------------------------------------------

--
-- Table structure for table `project_view_user`
--

CREATE TABLE IF NOT EXISTS `project_view_user` (
  `project_view_id` int(100) NOT NULL AUTO_INCREMENT,
  `project_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `view_date` datetime NOT NULL,
  PRIMARY KEY (`project_view_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `rights_id` int(100) NOT NULL AUTO_INCREMENT,
  `rights_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rights_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`rights_id`, `rights_name`) VALUES
(1, 'list_admin'),
(2, 'admin_login'),
(3, 'list_user'),
(4, 'user_login'),
(5, 'list_project_category'),
(6, 'list_project'),
(7, 'list_idea'),
(8, 'list_gallery'),
(9, 'list_amazon'),
(10, 'list_paypal'),
(11, 'list_normal_paypal'),
(12, 'list_transaction'),
(13, 'home_page'),
(14, 'list_pages'),
(15, 'list_country'),
(16, 'list_state'),
(17, 'list_city'),
(18, 'add_site_setting'),
(19, 'add_meta_setting'),
(20, 'add_facebook_setting'),
(21, 'add_twitter_setting'),
(22, 'add_email_setting'),
(23, 'add_email_template'),
(24, 'assign_rights'),
(25, 'add_spam_setting'),
(26, 'spam_report'),
(27, 'spamer'),
(28, 'list_newsletter'),
(29, 'list_newsletter_user'),
(30, 'newsletter_setting'),
(31, 'newsletter_job'),
(34, 'list_faq_category'),
(35, 'list_faq'),
(36, 'list_school'),
(37, 'guidelines'),
(38, 'add_wallet_setting'),
(39, 'list_payment_gateway'),
(40, 'list_gateway_detail'),
(41, 'list_wallet_review'),
(42, 'list_wallet_withdraw'),
(48, 'project_report'),
(47, 'add_image_setting'),
(49, 'transaction_report'),
(50, 'add_filter_setting'),
(51, 'list_cronjob'),
(52, 'set_fund'),
(53, 'add_yahoo_setting'),
(54, 'add_google_setting'),
(55, 'affiliates'),
(56, 'add_message_setting'),
(57, 'list_message'),
(58, 'list_credit_card'),
(59, 'list_curated'),
(60, 'list_blog'),
(63, 'blog_setting'),
(62, 'list_blog_category');

-- --------------------------------------------------------

--
-- Table structure for table `rights_assign`
--

CREATE TABLE IF NOT EXISTS `rights_assign` (
  `assign_id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_id` int(100) NOT NULL,
  `rights_id` int(100) NOT NULL,
  `rights_set` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`assign_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `rights_assign`
--

INSERT INTO `rights_assign` (`assign_id`, `admin_id`, `rights_id`, `rights_set`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 1, 18, 1),
(19, 1, 19, 1),
(20, 1, 20, 1),
(21, 1, 21, 1),
(22, 1, 22, 1),
(23, 1, 23, 1),
(24, 1, 24, 1),
(25, 1, 25, 1),
(26, 1, 26, 1),
(27, 1, 27, 1),
(28, 1, 28, 1),
(29, 1, 29, 1),
(30, 1, 30, 1),
(31, 1, 31, 1),
(33, 1, 34, 1),
(34, 1, 35, 1),
(35, 1, 36, 1),
(36, 1, 37, 1),
(37, 1, 38, 1),
(38, 1, 39, 1),
(39, 1, 40, 1),
(40, 1, 41, 1),
(41, 1, 42, 1),
(42, 1, 47, 1),
(43, 1, 48, 1),
(44, 1, 49, 1),
(45, 1, 50, 1),
(46, 1, 51, 1),
(47, 1, 52, 1),
(48, 1, 53, 1),
(49, 1, 54, 1),
(50, 1, 55, 1),
(51, 1, 56, 1),
(52, 1, 57, 1),
(53, 1, 58, 1),
(54, 1, 59, 1),
(55, 1, 60, 1),
(56, 1, 62, 1),
(57, 1, 63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `school_url_title` varchar(255) DEFAULT NULL,
  `description` text,
  `active` varchar(20) DEFAULT NULL,
  `school_order` int(10) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `title`, `school_url_title`, `description`, `active`, `school_order`) VALUES
(1, 'Defining Your Project', 'defining-your-project', '<p>Whether it&rsquo;s a book, a film, or a piece of hardware, the one trait that every FundraisingScript campaign shares is that it is a&nbsp;<em>project.</em>&nbsp;Defining what your FundraisingScript project&nbsp;<em>is</em>&nbsp;is the first step for every creator.</p>\n<p>What are you raising funds to do? Having a focused and well-defined project with a clear beginning and end is vital. For example: recording a new album is a finite project &mdash; the project finishes when the band releases the album &mdash; but launching a music career is not. There is no end, just an ongoing effort. FundraisingScript is open only to finite projects.</p>\n<p>With a precisely defined goal, expectations are transparent for both the creator and potential backers. Backers can judge how realistic the project&rsquo;s goals are, as well as the project creator&rsquo;s ability to complete them. And for creators, the practice of defining a project&rsquo;s goal establishes the scope of the endeavor, often an important step in the creative process.</p>\n<p>FundraisingScript thrives on these open exchanges and clear explanations of goals. Make sure your project does this!</p>\n<p><strong>SENDING US YOUR IDEA</strong></p>\n<p>Before launching a project, we ask people to share their idea with us to make sure it fits our&nbsp;<a href=KSYDOUhttp://spicyfund.com/fund_demo/help/guidelinesKSYDOU>guidelines</a>&nbsp;and makes good use of the platform. If youKSYSINGre unsure if your project is a good fit for FundraisingScript (or if FundraisingScript is a good fit for your project), weKSYSINGd encourage you to peruse&nbsp;&nbsp;<a href=KSYDOUhttp://spicyfund.com/fund_demo/project/successfulKSYDOU>successful</a>&nbsp;projects in your projectKSYSINGs category. When youKSYSINGre ready, send us your proposal. WeKSYSINGd love to hear about your project!</p>', '1', 1),
(2, 'Creating Rewards', 'creating-rewards', '<p>Rewards are what backers receive in exchange for pledging to a project. The importance of creative, tangible, and fairly priced rewards cannot be overstated. Projects whose rewards are overpriced or uninspired struggle to find support.</p>\n<p><strong>DECIDING WHAT TO OFFER</strong></p>\n<p>Every project&rsquo;s primary rewards should be things made by the project itself. If the project is to record a new album, then rewards should include a copy of the CD when it&rsquo;s finished. Rewards ensure that backers will benefit from a project just as much as its creator (i.e., they get cool stuff that they helped make possible!).</p>\n<p>There are four common reward types that we see on FundraisingScript:</p>\n<ul>\n<li><em>Copies of the thing:</em>&nbsp;the album, the DVD, a print from the show. These items should be priced what they would cost in a retail environment.</li>\n<li><em>Creative collaborations:</em>&nbsp;a backer appears as a hero in the comic, everyone gets painted into the mural, two backers do the handclaps for track 3.</li>\n<li><em>Creative experiences:</em>&nbsp;a visit to the set, a phone call from the author, dinner with the cast, a concert in your backyard.</li>\n<li><em>Creative mementos:</em>&nbsp;Polaroids sent from location, thanks in the credits, meaningful tokens that tell a story.</li>\n</ul>\n<p><strong>DECIDING HOW TO PRICE</strong></p>\n<p>FundraisingScript isn&rsquo;t charity: we champion exchanges that are a mix of commerce and patronage, and the numbers bear this out. To date the most popular pledge amount is $25 and the average pledge is around $70. Small amounts are where it&rsquo;s at: projects<em>without</em>&nbsp;a reward less than $20 succeed 35% of the time, while projects&nbsp;<em>with</em>&nbsp;a reward less than $20 succeed 54% of the time.</p>\n<p>So what works? Offering something of value. Actual value considers more than just sticker price. If it&rsquo;s a limited edition or a one-of-a-kind experience, there&rsquo;s a lot of flexibility based on your audience. But if it&rsquo;s a manufactured good, then it&rsquo;s a good idea to stay reasonably close to its real-world cost.</p>\n<p>There is no magic bullet, and we encourage every project to be as creative and true to itself as possible. Put yourself in your backers&rsquo; shoes: would&nbsp;<em>you</em>&nbsp;drop the cash on your rewards? The answer to that question will tell you a lot about your project&rsquo;s potential.</p>', '1', 2),
(3, 'Setting Your Goal', 'setting-your-goal', '<p>FundraisingScript operates on an all-or-nothing funding model where projects must be fully funded or no money changes hands. Projects must set a funding goal and a length of time to reach it. There&rsquo;s no magic formula to determining the right goal or duration. Every project is different, but there are a few things to keep in mind.</p>\n<p><strong>RESEARCHING YOUR BUDGET</strong></p>\n<p>How much money do you need? Are you raising the full budget or a portion of it? Have you factored in the cost of producing rewards and delivering them to backers? Avoid later headaches by doing your research, and be as transparent as you can. Backers will appreciate it.</p>\n<p><strong>CONSIDERING YOUR NETWORKS</strong></p>\n<p>FundraisingScript is not a magical source of money. Funding comes from a variety of sources &mdash; your audience, your friends and family, your broader social networks, and, if your project does well, strangers from around the web. It&rsquo;s up to you to build that momentum for your project.</p>\n<p><strong>CHOOSING YOUR GOAL</strong></p>\n<p>Once you&rsquo;ve researched your budget and considered your reach, you&rsquo;re ready to set your funding goal. Because funding is all-or-nothing, you can always raise more than your goal but never less. Figure out how much money you need to complete the project as promised (while considering how much funding you think you can generate), and select an amount close to that.</p>\n<p><strong>SETTING YOUR PROJECT DEADLINE</strong></p>\n<p>Projects can last anywhere from one to 60 days, however a longer project duration is not necessarily better. Statistically, projects lasting 30 days or less have our highest success rates. A FundraisingScript project takes a lot of work to run, and shorter projects set a tone of confidence and help motivate your backers to join the party. Longer durations incite less urgency, encourage procrastination, and tend to fizzle out.</p>', '1', 3),
(4, 'Building Your Project', 'building-your-project', '<p>As you build your project, take your time! The average successfully funded creator spends nearly two weeks tweaking their project before launching. A thoughtful and methodical approach can pay off.</p>\n<p><strong>TITLING YOUR PROJECT</strong></p>\n<p>Your FundraisingScript project title should be simple, specific, and memorable, and it should include the title of the creative project youKSYSINGre raising funds for. Imagine your title as a distinct identity that will set it apart (KSYDOUMake my new album&rdquo; isn&rsquo;t as helpful or searchable as &ldquo;The K-Stars record their debut EP,&nbsp;<em>All Or Nothing</em>&nbsp;KSYDOU). Avoid words like KSYDOUhelp,KSYDOU KSYDOUsupport,KSYDOU or KSYDOUfund.KSYDOU They imply that youKSYSINGre asking someone to do you a favor rather than offering an experience they&rsquo;re going to love.</p>\n<p><strong>PICKING YOUR PROJECT IMAGE</strong></p>\n<p>Your project image is how you will be represented on FundraisingScript and the rest of the web. Pick something that accurately reflects your project and that looks nice, too!</p>\n<p>&nbsp;</p>\n<p><strong>WRITING YOUR SHORT DESCRIPTION</strong></p>\n<p>Your short description appears in your project&rsquo;s widget, and it&rsquo;s the best place to quickly communicate to your audience what your project is about. Stay focused and be clear on what your project hopes to accomplish. If you had to describe your project in one tweet, how would you do it?</p>\n<p><strong>WRITING YOUR BIO</strong></p>\n<p>Your bio is a great opportunity to share more about you. Why are you the one to take on this project? What prior work can you share via links? This is key to earning your backers&rsquo; trust.</p>', '1', 4),
(5, 'Promoting Your Project', 'promoting-your-project', '<p>An exceptional project can lead to outpourings of support from all corners of the web, but for most projects, support comes from within their own networks and their networks&rsquo; networks. If you want people to back your project you have to tell them about it. More than once! And in a variety of ways! Here&rsquo;s how:</p>\n<p><strong>SMART OUTREACH</strong></p>\n<p>A nice, personal message is the most effective way to let someone know about your project. Send an email to your close friends and family so they can be first to pledge, then use your personal blog, your Facebook page, and your Twitter account to tune in everyone who&rsquo;s paying attention. Don&rsquo;t overwhelm with e-blasts and group messages, but be sure to remind your networks about your projects a few times throughout the course of its duration. Take the time to contact people individually. It makes a big difference.</p>\n<p><strong>MEETING UP</strong></p>\n<p>Don&rsquo;t be afraid to take your FundraisingScript project out into the real world. Nothing connects people to an idea like seeing the twinkle in your eye when you talk about it. Host pledge parties, print posters or flyers to distribute around your community, and organize meetups to educate people about your endeavor. Be creative!</p>\n<p><strong>STOPPING THE PRESSES</strong></p>\n<p>Contact your local newspaper, TV, and radio stations and tell them about your project. Seek out like-minded blogs and online media outlets to request coverage. Writers are always looking for stories to write about, and the media has a big soft spot for DIY success stories.</p>\n<p><strong>KEEPING IT REAL</strong></p>\n<p>Whatever channel you use to tell your project&rsquo;s story, don&rsquo;t spam. This includes posting your link on other FundraisingScript project pages, @messaging people to beg for money on Twitter, link-bombing on Facebook, and generally nagging people you don&rsquo;t already know. Over-posting can alienate your friends and fans, and it makes every other FundraisingScript project look bad too. Don&rsquo;t do it!</p>', '1', 5),
(6, 'Project Updates', 'project-updates', '<p>Project updates serve as your project&rsquo;s blog. They&rsquo;re a great way to share your progress, post media, and thank your backers. Posting a project update automatically sends an email to all your backers with that update. You can choose to make each update public for everyone to see, or reserve it for just your backers to view.</p>\n<p><strong>BUILDING MOMENTUM</strong></p>\n<p>While your project is live and the clock ticking, keep your backers informed and inspired to help you spread the word. Instead of posting a link to your project and asking for pledges every day, treat your project like a story that is unfolding and update everyone on its progress. &ldquo;Pics from last night&rsquo;s show!&rdquo; or &ldquo;We found a printer for our book!&rdquo; with a link to your project is engaging and fun for everybody to follow along with.</p>\n<p><strong>SHARING THE PROCESS</strong></p>\n<p>Once your project is successfully funded, don&rsquo;t forget about all the people that helped make it possible. Let backers and spectators watch your project come to life by sharing the decisions you make with them, explaining how it feels as your goal becomes a reality, and even asking them for feedback. Keeping backers informed and engaged is an essential part of FundraisingScript.</p>\n<p><strong>CELEBRATING SUCCESS</strong></p>\n<p>Sharing reviews, press, and photos from your project out in the world &mdash; whether it&rsquo;s opening night of your play or your book on someone&rsquo;s bookshelf &mdash; is great for everyone involved. The story of your project doesn&rsquo;t end after it gets shipped out. You still have a captivated audience that&rsquo;s cheering for you. Communicating with them can be one of the most rewarding parts of the process.</p>', '1', 6),
(8, 'testinng purpose111', 'testinng-purpose111', 'define???????/??//  ', '1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE IF NOT EXISTS `site_setting` (
  `site_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL,
  `site_version` varchar(255) DEFAULT NULL,
  `site_language` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `date_format` varchar(255) DEFAULT NULL,
  `time_format` varchar(255) DEFAULT NULL,
  `date_time_format` varchar(255) DEFAULT NULL,
  `date_format_tooltip` varchar(255) DEFAULT NULL,
  `time_format_tooltip` varchar(255) DEFAULT NULL,
  `date_time_format_tooltip` varchar(255) DEFAULT NULL,
  `date_time_highlight_tooltip` varchar(255) DEFAULT NULL,
  `site_tracker` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT NULL,
  `how_it_works_video` varchar(255) DEFAULT NULL,
  `normal_paypal` int(10) NOT NULL DEFAULT '1',
  `paypal_status` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `paypal_url` varchar(255) DEFAULT NULL,
  `paypal_API_UserName` varchar(255) DEFAULT NULL,
  `paypal_API_Password` varchar(255) DEFAULT NULL,
  `paypal_API_Signature` varchar(255) DEFAULT NULL,
  `donation_amount` varchar(50) DEFAULT NULL,
  `maximum_donation_amount` double(10,2) NOT NULL DEFAULT '2000.00',
  `auto_target_achive` int(10) NOT NULL DEFAULT '0',
  `ending_soon` int(20) NOT NULL DEFAULT '7',
  `popular` double(10,2) NOT NULL DEFAULT '60.00',
  `successful` double(10,2) NOT NULL DEFAULT '90.00',
  `small_project` int(20) NOT NULL DEFAULT '1000',
  `site_logo` varchar(255) DEFAULT NULL,
  `site_logo_hover` varchar(255) DEFAULT NULL,
  `fund_ideas` varchar(255) DEFAULT NULL,
  `project_min_days` int(5) NOT NULL,
  `project_max_days` int(5) NOT NULL,
  `time_zone` varchar(255) DEFAULT NULL,
  `mobile_site` int(1) NOT NULL DEFAULT '1',
  `currency_symbol_side` varchar(50) DEFAULT NULL,
  `decimal_points` int(5) NOT NULL,
  `enable_funding_option` tinyint(1) NOT NULL,
  `flexible_fees` decimal(10,2) NOT NULL,
  `suc_flexible_fees` decimal(10,2) NOT NULL,
  `fixed_fees` decimal(10,2) NOT NULL,
  `instant_fees` double(10,2) NOT NULL DEFAULT '0.00',
  `minimum_goal` decimal(10,2) NOT NULL,
  `maximum_goal` double(10,2) NOT NULL DEFAULT '2000.00',
  `minimum_reward_amount` double(10,2) NOT NULL DEFAULT '10.00',
  `maximum_reward_amount` double(10,2) NOT NULL DEFAULT '200.00',
  `maximum_project_per_year` int(25) NOT NULL,
  `maximum_donate_per_project` int(25) NOT NULL,
  `enable_facebook_stream` tinyint(1) NOT NULL,
  `enable_twitter_stream` tinyint(1) NOT NULL,
  `captcha_public_key` varchar(300) NOT NULL,
  `captcha_private_key` varchar(300) NOT NULL,
  `address_limit` int(1) NOT NULL DEFAULT '3',
  `blog_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`site_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`site_setting_id`, `site_name`, `site_version`, `site_language`, `currency_symbol`, `currency_code`, `date_format`, `time_format`, `date_time_format`, `date_format_tooltip`, `time_format_tooltip`, `date_time_format_tooltip`, `date_time_highlight_tooltip`, `site_tracker`, `robots`, `how_it_works_video`, `normal_paypal`, `paypal_status`, `paypal_email`, `paypal_url`, `paypal_API_UserName`, `paypal_API_Password`, `paypal_API_Signature`, `donation_amount`, `maximum_donation_amount`, `auto_target_achive`, `ending_soon`, `popular`, `successful`, `small_project`, `site_logo`, `site_logo_hover`, `fund_ideas`, `project_min_days`, `project_max_days`, `time_zone`, `mobile_site`, `currency_symbol_side`, `decimal_points`, `enable_funding_option`, `flexible_fees`, `suc_flexible_fees`, `fixed_fees`, `instant_fees`, `minimum_goal`, `maximum_goal`, `minimum_reward_amount`, `maximum_reward_amount`, `maximum_project_per_year`, `maximum_donate_per_project`, `enable_facebook_stream`, `enable_twitter_stream`, `captcha_public_key`, `captcha_private_key`, `address_limit`, `blog_logo`) VALUES
(2, 'Kickstarterclone', '2.0', '9', '$', 'AUD', 'd M,Y', 'HH:MM:SS', '', '', '', '', '', 'UA-23165973-1', '', '', 0, 'sandbox', 'jigar_1313046627_biz@gmail.com', 'https://www.sandbox.paypal.com/cgi-bin/webscri', 'jigar_1313046627_biz_api1.gmail.com', '1313046663', 'AMuOxt1FpmAKBEJ6exYeVH0TefE8AHDjH6WasXwi3PskdUAUPWS2au44', '5', 2000.00, 0, 30, 60.00, 100.00, 10, '56829logo.png', '95463logo_hover.png', '1', 10, 90, 'America/New_York', 1, 'left', 2, 0, 10.00, 10.00, 5.00, 5.00, 100.00, 2000.00, 15.00, 100.00, 100, 10, 0, 0, '6LeiAdcSAAAAAJSei9mOKAcXV0dXEDFQhp-2xb8L', '6LeiAdcSAAAAAJKCCtd6_iiXpeGYG_10TMqcVrpQ', 3, '39286blog_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `spam_control`
--

CREATE TABLE IF NOT EXISTS `spam_control` (
  `spam_control_id` int(10) NOT NULL AUTO_INCREMENT,
  `spam_report_total` int(30) NOT NULL,
  `spam_report_expire` int(30) NOT NULL,
  `total_register` int(30) NOT NULL,
  `register_expire` int(30) NOT NULL,
  `total_comment` int(30) NOT NULL,
  `comment_expire` int(30) NOT NULL,
  `total_contact` int(30) NOT NULL,
  `contact_expire` int(30) NOT NULL,
  PRIMARY KEY (`spam_control_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `spam_control`
--

INSERT INTO `spam_control` (`spam_control_id`, `spam_report_total`, `spam_report_expire`, `total_register`, `register_expire`, `total_comment`, `comment_expire`, `total_contact`, `contact_expire`) VALUES
(1, 5, 7, 5, 7, 10, 10, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `spam_inquiry`
--

CREATE TABLE IF NOT EXISTS `spam_inquiry` (
  `inquire_id` int(100) NOT NULL AUTO_INCREMENT,
  `inquire_spam_ip` varchar(255) DEFAULT NULL,
  `inquire_date` date NOT NULL,
  PRIMARY KEY (`inquire_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `spam_ip`
--

CREATE TABLE IF NOT EXISTS `spam_ip` (
  `spam_id` int(100) NOT NULL AUTO_INCREMENT,
  `spam_ip` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `permenant_spam` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`spam_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `spam_report_ip`
--

CREATE TABLE IF NOT EXISTS `spam_report_ip` (
  `spam_report_id` int(100) NOT NULL AUTO_INCREMENT,
  `spam_ip` varchar(255) DEFAULT NULL,
  `spam_user_id` int(100) NOT NULL,
  `reported_user_id` int(100) NOT NULL,
  PRIMARY KEY (`spam_report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`, `active`) VALUES
(1, 2, 'Gujarat', '1'),
(2, 2, 'Panjab', '1'),
(3, 2, 'Bihar', '1'),
(4, 2, 'Kerla', '1'),
(5, 2, 'Karnataka', '1'),
(6, 2, 'Orissa', '1'),
(7, 2, 'Sikkim', '1'),
(8, 2, 'Tamilnadu', '1'),
(9, 2, 'Goa', '1'),
(10, 2, 'Maharashtra', '1');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `detail` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_adaptive`
--

CREATE TABLE IF NOT EXISTS `temp_adaptive` (
  `temp_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `project_id` int(100) NOT NULL,
  `perk_id` int(100) NOT NULL DEFAULT '0',
  `total_amount` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `pay_fee` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `host_ip` varchar(255) DEFAULT NULL,
  `transaction_date_time` datetime NOT NULL,
  `paypal_paykey` varchar(255) DEFAULT NULL,
  `paypal_adaptive_status` varchar(50) DEFAULT NULL,
  `temp_anonymous` tinyint(1) NOT NULL,
  `facebook` int(1) NOT NULL,
  `twitter` int(1) NOT NULL,
  `payment_done` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `temp_adaptive`
--

INSERT INTO `temp_adaptive` (`temp_id`, `user_id`, `project_id`, `perk_id`, `total_amount`, `amount`, `pay_fee`, `email`, `host_ip`, `transaction_date_time`, `paypal_paykey`, `paypal_adaptive_status`, `temp_anonymous`, `facebook`, `twitter`, `payment_done`) VALUES
(1, 5, 11, 0, '90', '85.5', '4.50', '', '101.0.59.132', '2012-10-10 13:55:15', 'AP-72S74509D7058403D', 'FAIL', 1, 1, 0, 0),
(2, 5, 11, 0, '90', '85.5', '4.50', '', '101.0.59.132', '2012-10-10 13:56:39', 'AP-4VK37279190848042', 'FAIL', 1, 1, 0, 0),
(3, 5, 11, 0, '90', '85.5', '4.50', '', '101.0.59.132', '2012-10-10 14:04:41', 'AP-84S945893E824893N', 'FAIL', 1, 1, 0, 0),
(4, 6, 12, 0, '20', '19', '1.00', '', '101.0.59.132', '2012-10-10 14:12:30', 'AP-4PG773747K0409008', 'FAIL', 1, 0, 0, 0),
(5, 5, 11, 0, '50', '47.5', '2.50', '', '101.0.59.132', '2012-10-10 14:19:41', 'AP-1D529668E4890274H', 'FAIL', 1, 1, 0, 0),
(6, 5, 11, 0, '20', '19', '1.00', '', '101.0.59.132', '2012-10-10 14:31:42', 'AP-1S216178W5002554X', 'FAIL', 1, 1, 0, 0),
(7, 5, 11, 0, '20', '19', '1.00', '', '101.0.59.132', '2012-10-10 14:35:59', 'AP-9BB837288J509392F', 'FAIL', 1, 1, 0, 0),
(8, 5, 11, 0, '20', '19', '1.00', '', '101.0.59.132', '2012-10-10 14:40:12', 'AP-5L387345KB594483J', 'FAIL', 1, 1, 0, 0),
(9, 5, 11, 0, '20', '19', '1.00', '', '101.0.59.132', '2012-10-10 14:50:56', 'AP-0FF6105086733730W', 'FAIL', 1, 1, 0, 0),
(10, 5, 11, 0, '20', '19', '1.00', '', '1.22.81.16', '2012-10-10 15:10:23', 'AP-7F560984BM194623N', 'FAIL', 1, 1, 0, 0),
(11, 5, 11, 8, '90', '85.5', '4.50', '', '1.22.81.16', '2012-10-10 15:17:59', 'AP-3TU49698SM097464T', 'FAIL', 1, 1, 0, 0),
(12, 7, 11, 0, '20', '19', '1.00', '', '1.22.81.37', '2012-10-11 18:06:25', 'AP-78H46424XK055963D', 'FAIL', 1, 1, 0, 0),
(13, 5, 11, 0, '20', '19', '1.00', '', '101.0.59.67', '2012-10-16 16:50:01', 'AP-55V38345KM5046543', 'FAIL', 1, 1, 0, 0),
(14, 5, 10, 0, '20', '19', '1.00', '', '101.0.59.67', '2012-10-16 16:52:28', 'AP-25D16886JT272430D', 'FAIL', 1, 1, 0, 0),
(15, 5, 9, 0, '20', '19', '1.00', '', '101.0.59.67', '2012-10-16 16:58:55', 'AP-5WU806041K5341829', 'FAIL', 1, 1, 0, 0),
(16, 10, 16, 0, '30', '28.5', '1.50', '', '1.22.81.19', '2012-10-19 17:33:49', 'AP-8K494397V9725191D', 'FAIL', 1, 1, 0, 0),
(17, 10, 16, 0, '20', '19', '1.00', '', '1.22.81.19', '2012-10-19 17:41:37', 'AP-49514746DK444870R', 'FAIL', 1, 1, 0, 0),
(18, 9, 7, 0, '5.88', '5.59', '0.29', '', '180.188.225.53', '2012-10-19 17:52:19', 'AP-9F0543233V912863X', 'FAIL', 1, 1, 1, 0),
(19, 10, 16, 0, '20', '19', '1.00', '', '1.22.81.19', '2012-10-19 17:55:55', 'AP-7MH70401N2027132W', 'FAIL', 1, 1, 0, 0),
(20, 9, 7, 0, '5.88', '5.59', '0.29', '', '180.188.225.53', '2012-10-19 17:56:16', 'AP-44N69658WD1578944', 'FAIL', 1, 1, 1, 0),
(21, 10, 16, 0, '20', '19', '1.00', '', '1.22.81.19', '2012-10-19 17:58:22', 'AP-0KS27831VJ0739746', 'FAIL', 1, 1, 0, 0),
(22, 9, 2, 0, '5.88', '5.59', '0.29', '', '180.188.225.53', '2012-10-19 18:01:24', 'AP-6UH764712S741135W', 'FAIL', 1, 1, 1, 0),
(23, 9, 12, 0, '20.69', '19.66', '1.03', '', '1.22.80.131', '2012-10-20 14:52:06', 'AP-0U378369BJ653000D', 'FAIL', 1, 1, 1, 0),
(24, 9, 12, 0, '5.56', '5.28', '0.28', '', '1.22.80.131', '2012-10-20 14:53:22', 'AP-48G76625NC0979911', 'FAIL', 1, 1, 1, 0),
(25, 6, 12, 0, '5.23', '4.97', '0.26', '', '1.22.80.131', '2012-10-20 15:03:11', 'AP-6U521004PE675282R', 'FAIL', 1, 1, 0, 0),
(26, 6, 21, 0, '20', '19', '1.00', '', '1.22.81.166', '2012-10-22 16:33:16', 'AP-7TJ49188HB9235014', 'FAIL', 1, 1, 0, 0),
(27, 6, 21, 0, '20', '19', '1.00', '', '1.22.81.166', '2012-10-22 16:36:16', 'AP-4LN99949VV9877902', 'FAIL', 1, 1, 0, 0),
(28, 6, 22, 0, '20', '19', '1.00', '', '1.22.81.166', '2012-10-22 16:45:56', 'AP-1V534678LY4759817', 'FAIL', 1, 1, 0, 0),
(29, 6, 22, 0, '20', '19', '1.00', '', '1.22.81.166', '2012-10-22 16:47:23', 'AP-2XH25558532836337', 'FAIL', 1, 1, 0, 0),
(30, 9, 28, 0, '12.56', '11.93', '0.63', '', '1.22.80.239', '2012-10-30 12:44:40', 'AP-2B68531593762501T', 'FAIL', 1, 1, 1, 0),
(31, 9, 28, 0, '12.56', '11.93', '0.63', '', '1.22.80.239', '2012-10-30 12:45:09', 'AP-012345514X9437536', 'FAIL', 1, 1, 1, 0),
(32, 9, 28, 0, '5', '4.75', '0.25', '', '1.22.80.239', '2012-10-30 12:46:23', 'AP-67H199436Y861721P', 'FAIL', 1, 1, 1, 0),
(33, 9, 28, 0, '5', '4.75', '0.25', '', '1.22.80.239', '2012-10-30 12:47:43', 'AP-81X11448KU3426524', 'FAIL', 1, 1, 1, 0),
(34, 9, 28, 0, '5.22', '4.96', '0.26', '', '1.22.80.239', '2012-10-30 12:48:36', 'AP-3KX65193PL162205S', 'FAIL', 1, 1, 1, 0),
(35, 9, 28, 0, '5.22', '4.96', '0.26', '', '1.22.80.239', '2012-10-30 12:50:49', 'AP-8YW78063FM4861508', 'FAIL', 1, 1, 1, 0),
(36, 6, 36, 0, '20', '19', '1.00', '', '1.22.80.250', '2012-10-31 12:58:08', 'AP-0S49061355480952L', 'FAIL', 1, 1, 0, 0),
(37, 5, 34, 0, '50', '47.5', '2.50', '', '1.22.80.250', '2012-10-31 13:29:21', 'AP-1L9241184V596093S', 'FAIL', 1, 1, 0, 1),
(38, 6, 36, 0, '15', '14.25', '0.75', '', '1.22.80.220', '2012-11-01 13:13:18', 'AP-0WW01183UR892192A', 'FAIL', 1, 1, 0, 1),
(39, 6, 41, 0, '15', '14.25', '0.75', '', '1.22.80.224', '2012-11-05 13:51:08', 'AP-9R783766TT724381D', 'FAIL', 1, 0, 0, 0),
(40, 6, 41, 0, '100', '95', '5.00', '', '1.22.80.224', '2012-11-05 14:10:28', 'AP-2BD355459L9655631', 'FAIL', 1, 1, 0, 1),
(41, 16, 36, 0, '10.00', '9.5', '0.50', '', '169.241.28.82', '2012-12-11 07:06:56', 'AP-0SR66233PT207350S', 'FAIL', 2, 1, 1, 0),
(42, 6, 35, 0, '450', '427.5', '22.50', '', '1.22.80.105', '2012-12-20 17:47:35', 'AP-2B142677GM4282349', 'FAIL', 1, 1, 0, 1),
(43, 16, 35, 0, '200', '190', '10.00', '', '176.205.199.209', '2012-12-26 20:28:22', 'AP-0ND72389CC9342259', 'FAIL', 1, 1, 1, 0),
(44, 14, 80, 0, '20', '19', '1.00', '', '1.22.81.237', '2012-12-28 13:03:49', 'AP-0V704730P92167503', 'FAIL', 1, 0, 1, 1),
(45, 14, 80, 0, '20', '19', '1.00', '', '1.22.81.237', '2012-12-28 14:49:48', 'AP-41S7715845708060G', 'FAIL', 1, 0, 1, 1),
(46, 9, 81, 0, '20', '19', '1.00', '', '1.22.81.237', '2012-12-28 15:41:26', 'AP-75Y20992XK547725F', 'FAIL', 3, 0, 1, 1),
(47, 9, 81, 0, '15', '14.25', '0.75', '', '1.22.81.237', '2012-12-28 15:44:07', 'AP-4SD56341XH9300524', 'FAIL', 2, 0, 1, 1),
(48, 9, 81, 0, '16', '15.2', '0.80', '', '210.89.56.250', '2012-12-28 15:47:43', 'AP-93Y103043C3172139', 'FAIL', 1, 0, 1, 1),
(49, 14, 80, 0, '50', '47.5', '2.50', '', '1.22.81.237', '2012-12-28 16:20:09', 'AP-8K823509768274742', 'FAIL', 3, 0, 1, 0),
(50, 14, 80, 0, '50', '47.5', '2.50', '', '1.22.81.237', '2012-12-28 16:24:57', 'AP-5NY58960Y9992224E', 'FAIL', 3, 0, 1, 1),
(51, 9, 56, 0, '15', '14.25', '0.75', '', '101.0.59.126', '2012-12-29 10:22:08', 'AP-9FK521930K5040806', 'FAIL', 1, 0, 1, 0),
(52, 9, 56, 0, '15', '14.25', '0.75', '', '101.0.59.126', '2012-12-29 10:23:34', 'AP-61C50980MY612990M', 'FAIL', 1, 0, 1, 1),
(53, 14, 81, 65, '100', '95', '5.00', '', '1.22.83.138', '2013-01-03 17:25:13', 'AP-89D02851UK998014F', 'FAIL', 1, 0, 1, 1),
(54, 9, 76, 0, '15', '14.25', '0.75', '', '180.188.225.12', '2013-01-03 17:48:54', 'AP-5MC782158U396225T', 'FAIL', 1, 0, 1, 0),
(55, 9, 76, 0, '15', '14.25', '0.75', '', '180.188.225.12', '2013-01-03 17:50:56', 'AP-4LR13370HU038933F', 'FAIL', 1, 0, 1, 0),
(56, 9, 76, 0, '15', '14.25', '0.75', '', '180.188.225.12', '2013-01-03 17:50:57', 'AP-8UJ231534P834191U', 'FAIL', 1, 0, 1, 1),
(57, 36, 35, 0, '15', '14.25', '0.75', '', '92.151.179.218', '2013-01-14 17:51:33', 'AP-1AW38795RD2576201', 'FAIL', 1, 0, 0, 0),
(58, 16, 56, 69, '15', '14.25', '0.75', '', '184.96.156.200', '2013-01-22 03:06:24', 'AP-3L0886900T542083J', 'FAIL', 1, 0, 0, 0),
(59, 16, 80, 0, '20', '19', '1.00', '', '86.99.66.36', '2013-01-23 12:51:47', 'AP-5AD89854UV684301C', 'FAIL', 3, 0, 0, 0),
(60, 16, 56, 0, '15', '14.25', '0.75', '', '121.182.36.247', '2013-01-27 16:48:54', 'AP-236690946X873625S', 'FAIL', 1, 0, 0, 0),
(61, 16, 81, 65, '100', '95', '5.00', '', '121.182.36.247', '2013-01-27 17:21:59', 'AP-02N9454880911483W', 'FAIL', 1, 1, 1, 0),
(62, 6, 81, 0, '1000', '950', '50.00', '', '98.252.151.179', '2013-01-29 05:52:57', 'AP-8R4430079H760851P', 'FAIL', 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_preapprove`
--

CREATE TABLE IF NOT EXISTS `temp_preapprove` (
  `temp_pre_id` int(100) NOT NULL AUTO_INCREMENT,
  `preapprovalKey` varchar(255) DEFAULT NULL,
  `user_id` int(100) NOT NULL,
  `project_id` int(50) NOT NULL,
  `perk_id` int(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text,
  `host_ip` varchar(100) DEFAULT NULL,
  `transaction_date_time` datetime NOT NULL,
  `temp_anonymous` tinyint(1) NOT NULL,
  `facebook` int(1) NOT NULL,
  `twitter` int(1) NOT NULL,
  `payment_done` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`temp_pre_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `temp_preapprove`
--

INSERT INTO `temp_preapprove` (`temp_pre_id`, `preapprovalKey`, `user_id`, `project_id`, `perk_id`, `name`, `comment`, `host_ip`, `transaction_date_time`, `temp_anonymous`, `facebook`, `twitter`, `payment_done`) VALUES
(1, 'PA-22214602HR9758915', 5, 1, 0, 'dharmesh', 'do_comment', '180.188.225.8', '2012-10-09 18:10:04', 1, 1, 0, 0),
(2, 'PA-4W170920XL7749543', 5, 11, 0, 'dharmesh', 'do_comment', '101.0.59.132', '2012-10-10 10:37:03', 1, 1, 0, 0),
(3, 'PA-1CC15990MN508762G', 5, 11, 0, 'dharmesh', 'do_comment', '101.0.59.132', '2012-10-10 10:44:10', 1, 1, 0, 0),
(4, 'PA-28H375636X521441M', 5, 11, 0, 'dharmesh', 'do_comment', '101.0.59.132', '2012-10-10 10:50:36', 1, 1, 0, 0),
(5, 'PA-7KN26091VL350844N', 5, 11, 8, 'dharmesh', 'do_comment', '101.0.59.132', '2012-10-10 11:16:59', 1, 1, 0, 0),
(6, 'PA-0PD27845U1168083U', 5, 11, 8, 'dharmesh', 'do_comment', '101.0.59.132', '2012-10-10 11:20:11', 1, 1, 0, 0),
(7, 'PA-1WA09443Y1319814V', 6, 12, 11, 'vivek', 'do_comment', '101.0.59.132', '2012-10-10 11:48:38', 1, 0, 0, 0),
(8, 'PA-002586923P236620C', 6, 12, 11, 'vivek', 'do_comment', '101.0.59.132', '2012-10-10 11:50:55', 1, 0, 0, 0),
(9, 'PA-6RR10638VJ7634303', 6, 12, 0, 'vivek', 'do_comment', '101.0.59.132', '2012-10-10 12:21:26', 1, 0, 0, 0),
(10, 'PA-8YU809140E199880P', 6, 12, 0, 'vivek', 'do_comment', '101.0.59.132', '2012-10-10 12:23:21', 1, 0, 0, 0),
(11, 'PA-4MF38204E18865946', 16, 77, 0, 'patel', 'do_comment', '213.147.127.26', '2013-02-14 15:55:52', 1, 0, 0, 0),
(12, 'PA-7JL94550UB8914029', 16, 56, 0, 'patel', 'do_comment', '95.236.102.229', '2013-02-14 20:05:30', 1, 0, 0, 0),
(13, 'PA-9NN17481GA345615Y', 6, 56, 0, 'vivek', 'do_comment', '222.103.129.14', '2013-02-17 19:07:17', 1, 0, 0, 0),
(14, 'PA-46489463578875103', 16, 72, 0, 'patel', 'do_comment', '184.99.245.121', '2013-03-06 00:31:34', 1, 0, 0, 0),
(15, 'PA-1P058695NP248040K', 45, 81, 0, 'alessandro', 'do_comment', '87.2.98.185', '2013-03-12 22:53:36', 3, 0, 0, 0),
(16, 'PA-4VX72955626947611', 16, 144, 0, 'Bob', 'do_comment', '210.89.56.198', '2013-06-06 16:07:48', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timezone`
--

CREATE TABLE IF NOT EXISTS `timezone` (
  `timezid` int(11) NOT NULL AUTO_INCREMENT,
  `tz` varchar(255) DEFAULT NULL,
  `gmt` text,
  PRIMARY KEY (`timezid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `timezone`
--

INSERT INTO `timezone` (`timezid`, `tz`, `gmt`) VALUES
(1, 'Pacific/Kwajalein', '(GMT -12:00) Eniwetok, Kwajalein'),
(2, 'Pacific/Samoa', '(GMT -11:00) Midway Island, Samoa'),
(3, 'Pacific/Honolulu', '(GMT -10:00) Hawaii'),
(4, 'America/Anchorage', '(GMT -9:00) Alaska'),
(5, 'America/Los_Angeles', '(GMT -8:00) Pacific Time (US & Canada) Los Angeles, Seattle'),
(6, 'America/Denver', '(GMT -7:00) Mountain Time (US & Canada) Denver'),
(7, 'America/Chicago', '(GMT -6:00) Central Time (US & Canada), Chicago, Mexico City'),
(8, 'America/New_York', '(GMT -5:00) Eastern Time (US & Canada), New York, Bogota, Lima'),
(9, 'Atlantic/Bermuda', '(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz'),
(10, 'Canada/Newfoundland', '(GMT -3:30) Newfoundland'),
(11, 'Brazil/East', '(GMT -3:00) Brazil, Buenos Aires, Georgetown'),
(12, 'Atlantic/Azores', '(GMT -2:00) Mid-Atlantic'),
(13, 'Atlantic/Cape_Verde', '(GMT -1:00 hour) Azores, Cape Verde Islands'),
(14, 'Europe/London', '(GMT) Western Europe Time, London, Lisbon, Casablanca'),
(15, 'Europe/Brussels', '(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris'),
(16, 'Europe/Helsinki', '(GMT +2:00) Kaliningrad, South Africa'),
(17, 'Asia/Baghdad', '(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg'),
(18, 'Asia/Tehran', '(GMT +3:30) Tehran'),
(19, 'Asia/Baku', '(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi'),
(20, 'Asia/Kabul', '(GMT +4:30) Kabul'),
(21, 'Asia/Karachi', '(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent'),
(22, 'Asia/Calcutta', '(GMT +5:30) Bombay, Calcutta, Madras, New Delhi'),
(23, 'Asia/Dhaka', '(GMT +6:00) Almaty, Dhaka, Colombo'),
(24, 'Asia/Bangkok', '(GMT +7:00) Bangkok, Hanoi, Jakarta'),
(25, 'Asia/Hong_Kong', '(GMT +8:00) Beijing, Perth, Singapore, Hong Kong'),
(26, 'Asia/Tokyo', '(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk'),
(27, 'Australia/Adelaide', '(GMT +9:30) Adelaide, Darwin'),
(28, 'Pacific/Guam', '(GMT +10:00) Eastern Australia, Guam, Vladivostok'),
(29, 'Asia/Magadan', '(GMT +11:00) Magadan, Solomon Islands, New Caledonia'),
(30, 'Pacific/Fiji', '(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `project_id` int(11) NOT NULL,
  `perk_id` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `listing_fee` varchar(255) DEFAULT NULL,
  `pay_fee` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `host_ip` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `transaction_date_time` datetime NOT NULL,
  `amazon_transaction_id` text,
  `paypal_paykey` varchar(255) DEFAULT NULL,
  `paypal_adaptive_status` varchar(50) DEFAULT NULL,
  `preapproval_key` varchar(255) DEFAULT NULL,
  `preapproval_pay_key` varchar(255) DEFAULT NULL,
  `preapproval_status` varchar(100) DEFAULT NULL,
  `preapproval_total_amount` varchar(100) DEFAULT NULL,
  `paypal_transaction_id` varchar(255) DEFAULT NULL,
  `wallet_transaction_id` varchar(255) DEFAULT NULL,
  `wallet_payment_status` tinyint(1) NOT NULL,
  `trans_anonymous` tinyint(1) NOT NULL,
  `credit_card_transaction_id` varchar(255) DEFAULT NULL,
  `credit_card_capture_transaction_id` varchar(255) DEFAULT NULL,
  `credit_card_payment_status` int(20) NOT NULL DEFAULT '0' COMMENT '0=not done,1=captured',
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `project_id`, `perk_id`, `amount`, `listing_fee`, `pay_fee`, `name`, `email`, `host_ip`, `comment`, `paypal_email`, `transaction_date_time`, `amazon_transaction_id`, `paypal_paykey`, `paypal_adaptive_status`, `preapproval_key`, `preapproval_pay_key`, `preapproval_status`, `preapproval_total_amount`, `paypal_transaction_id`, `wallet_transaction_id`, `wallet_payment_status`, `trans_anonymous`, `credit_card_transaction_id`, `credit_card_capture_transaction_id`, `credit_card_payment_status`) VALUES
(7, 5, 11, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.16', NULL, NULL, '2012-10-10 15:10:23', NULL, 'AP-7F560984BM194623N', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(8, 5, 11, 8, '85.5', '0', '4.50', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.16', NULL, NULL, '2012-10-10 15:17:59', NULL, 'AP-3TU49698SM097464T', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(9, 7, 11, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.37', NULL, NULL, '2012-10-11 18:06:25', NULL, 'AP-78H46424XK055963D', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(10, 5, 11, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '101.0.59.67', NULL, NULL, '2012-10-16 16:50:01', NULL, 'AP-55V38345KM5046543', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(11, 5, 10, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '101.0.59.67', NULL, NULL, '2012-10-16 16:52:28', NULL, 'AP-25D16886JT272430D', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(12, 5, 9, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '101.0.59.67', NULL, NULL, '2012-10-16 16:58:55', NULL, 'AP-5WU806041K5341829', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(17, 9, 2, 0, '5.59', '0', '0.29', NULL, 'backer_1321252350_per@gmail.com', '180.188.225.53', NULL, NULL, '2012-10-19 18:01:24', NULL, 'AP-6UH764712S741135W', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(18, 6, 12, 0, '4.97', '0', '0.26', NULL, 'backer_1321252350_per@gmail.com', '1.22.80.131', NULL, NULL, '2012-10-20 15:03:11', NULL, 'AP-6U521004PE675282R', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(19, 6, 22, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.166', NULL, NULL, '2012-10-22 16:47:23', NULL, 'AP-2XH25558532836337', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(20, 9, 28, 0, '4.96', '0', '0.26', NULL, 'backer_1321252350_per@gmail.com', '1.22.80.239', NULL, NULL, '2012-10-30 12:50:49', NULL, 'AP-8YW78063FM4861508', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(21, 6, 36, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '1.22.80.250', NULL, NULL, '2012-10-31 12:58:08', NULL, 'AP-0S49061355480952L', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(22, 5, 34, 0, '47.5', '0', '2.50', NULL, 'backer_1321252350_per@gmail.com', '1.22.80.250', NULL, NULL, '2012-10-31 13:29:21', NULL, 'AP-1L9241184V596093S', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(23, 6, 36, 0, '14.25', '0', '0.75', NULL, 'backer_1321252350_per@gmail.com', '1.22.80.220', NULL, NULL, '2012-11-01 13:13:18', NULL, 'AP-0WW01183UR892192A', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(24, 6, 41, 0, '95', '0', '5.00', NULL, 'donor_1321252241_per@gmail.com', '1.22.80.224', NULL, NULL, '2012-11-05 14:10:28', NULL, 'AP-2BD355459L9655631', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(25, 6, 35, 0, '427.5', '0', '22.50', NULL, 'backer_1321252350_per@gmail.com', '1.22.80.105', NULL, NULL, '2012-12-20 17:47:35', NULL, 'AP-2B142677GM4282349', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(26, 14, 80, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.237', NULL, NULL, '2012-12-28 13:03:49', NULL, 'AP-0V704730P92167503', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(27, 14, 80, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.237', NULL, NULL, '2012-12-28 14:49:48', NULL, 'AP-41S7715845708060G', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(28, 9, 81, 0, '19', '0', '1.00', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.237', NULL, NULL, '2012-12-28 15:41:26', NULL, 'AP-75Y20992XK547725F', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, NULL, 0),
(29, 9, 81, 0, '14.25', '0', '0.75', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.237', NULL, NULL, '2012-12-28 15:44:07', NULL, 'AP-4SD56341XH9300524', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, NULL, NULL, 0),
(30, 9, 81, 0, '15.2', '0', '0.80', NULL, 'backer_1321252350_per@gmail.com', '210.89.56.250', NULL, NULL, '2012-12-28 15:47:43', NULL, 'AP-93Y103043C3172139', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(31, 14, 80, 0, '47.5', '0', '2.50', NULL, 'backer_1321252350_per@gmail.com', '1.22.81.237', NULL, NULL, '2012-12-28 16:24:57', NULL, 'AP-5NY58960Y9992224E', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, NULL, 0),
(32, 9, 56, 0, '14.25', '0', '0.75', NULL, 'backer_1321252350_per@gmail.com', '101.0.59.126', NULL, NULL, '2012-12-29 10:23:34', NULL, 'AP-61C50980MY612990M', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(33, 14, 81, 65, '95', '0', '5.00', NULL, 'seller_1321252289_biz@gmail.com', '1.22.83.138', NULL, NULL, '2013-01-03 17:25:13', NULL, 'AP-89D02851UK998014F', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(34, 9, 76, 0, '14.25', '0', '0.75', NULL, 'backer_1321252350_per@gmail.com', '180.188.225.12', NULL, NULL, '2013-01-03 17:50:57', NULL, 'AP-8UJ231534P834191U', 'SUCCESS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0),
(35, 16, 144, 0, '9.50', '0', '0.50', 'Bob', 'rockersinfo@gmail.com', '210.89.56.198', 'do_comment', NULL, '2013-06-06 16:09:06', NULL, NULL, NULL, 'PA-4VX72955626947611', NULL, 'FAIL', '10.00', NULL, NULL, 0, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transaction_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`transaction_type_id`, `transaction_type_name`) VALUES
(1, 'cash'),
(2, 'check'),
(3, 'credit card');

-- --------------------------------------------------------

--
-- Table structure for table `translation`
--

CREATE TABLE IF NOT EXISTS `translation` (
  `translation_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`translation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `translation`
--

INSERT INTO `translation` (`translation_id`, `language`) VALUES
(2, 'English'),
(9, 'French');

-- --------------------------------------------------------

--
-- Table structure for table `translation_key`
--

CREATE TABLE IF NOT EXISTS `translation_key` (
  `key_id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `translation_text`
--

CREATE TABLE IF NOT EXISTS `translation_text` (
  `text_id` int(11) NOT NULL AUTO_INCREMENT,
  `translation_id` int(11) NOT NULL,
  `key_id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`text_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_setting`
--

CREATE TABLE IF NOT EXISTS `twitter_setting` (
  `twitter_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `twitter_enable` varchar(255) DEFAULT NULL,
  `twitter_user_name` varchar(255) DEFAULT NULL,
  `consumer_key` varchar(255) DEFAULT NULL,
  `consumer_secret` varchar(255) DEFAULT NULL,
  `tw_oauth_token` varchar(500) DEFAULT NULL,
  `tw_oauth_token_secret` varchar(500) DEFAULT NULL,
  `autopost_site` varchar(255) DEFAULT NULL,
  `autopost_user` varchar(255) DEFAULT NULL,
  `twitter_url` text,
  `twiter_img` varchar(255) DEFAULT NULL,
  `tw_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`twitter_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `twitter_setting`
--

INSERT INTO `twitter_setting` (`twitter_setting_id`, `twitter_enable`, `twitter_user_name`, `consumer_key`, `consumer_secret`, `tw_oauth_token`, `tw_oauth_token_secret`, `autopost_site`, `autopost_user`, `twitter_url`, `twiter_img`, `tw_id`) VALUES
(1, '1', '0', 'TgeQNnvHfOB5f3OY8R5wIg', 'mTdMQMZmCsBu5eVXrldYuLlmWS9wT6f3oxsbZGFs', '429749361-zv4tplasjuLNxvtvRrd8M22njCrsxYSbI27vWieg', '2buZHzKlCYufzCMbdGuTeVRwMzrKwzV7RGBJdsC4B4', '1', '0', 'https://twitter.com/#!/bidpebid', 'anita_rockers.jpg', '429749361');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `updates` text,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `update_title` varchar(255) NOT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_id`, `project_id`, `updates`, `image`, `status`, `date_added`, `update_title`) VALUES
(1, 11, 'updates on project 11&nbsp;updates on project 11&nbsp;updates on project 11 vupdates on project 11  ', 'no_img.jpg', '0', '2012-10-13 16:47:50', 'updates on project 11'),
(2, 11, 'Test Update  ', 'no_img.jpg', '0', '2012-10-13 18:36:47', 'Test Update'),
(3, 15, 'Updates post for test  ', 'no_img.jpg', '0', '2012-10-18 15:21:54', ''),
(4, 2, 'In todays world applications are quickly moving towards a simple all-encompassing distribution model. Web applications are gaining popularity because of their scalability and ease of deployment and desktop applications are becoming less common. This holds both positive and negative consequences - mainly with functionality and user experience.  ', 'no_img.jpg', '0', '2012-10-20 11:40:06', 'Introduction'),
(8, 41, '&nbsp;', 'no_img.jpg', '0', '2012-11-05 15:22:17', ''),
(9, 41, 'This update for testing purpose created...  ', 'no_img.jpg', '0', '2012-11-05 15:24:56', 'Hello'),
(10, 41, 'PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.              ', 'no_img.jpg', '0', '2012-11-06 10:53:03', 'testing purpose '),
(11, 41, 'PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies.  ', 'no_img.jpg', '0', '2012-11-06 11:00:30', 'followers and following'),
(12, 41, '<span style=KSYDOUfont-size:x-smallKSYDOU>IN ANY MANNER INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT INFORMATION AND OTHER MATERIALS OR SERVICES ON THE SITE.PLEASE READ THESE TERMS OF USE (KSYDOUAGREEMENTKSYDOU OR KSYDOUTERMS OF USEKSYDOU) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (KSYDOUCOMPANYKSYDOU). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE KSYDOUSITEKSYDOU) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE THE KSYDOUSERVICEKSYDOU). BY USING THE SITE OR SERVICE IN ANY MANNER INCLU  </span>  ', 'no_img.jpg', '0', '2012-11-06 13:16:26', 'test Update'),
(13, 76, 'KHDGKLDHSGKLHDLKGHLDSGAS  ', 'no_img.jpg', '0', '2012-12-18 18:03:54', ''),
(15, 36, '<p><span>rfgdfg dfhgdf hdf dgf hdfgh dgfh drfghdg hdfhdfh dfhd fh df</span></p>\n<p><span><span  x-large;">sfasf afa fasfasf afa sf</span><br /></span></p>', 'no_img.jpg', '0', '2012-12-19 11:20:55', ''),
(16, 80, '<p>Updates on celebration party of new year for testingUpdates on celebration party of new year for testingUpdates on celebration party of new year for testingUpdates on celebration party of new year for testingUpdates on celebration party of new year for testingUpdates on celebration party of new year for testingUpdates on celebration party of new year for testing</p>', 'no_img.jpg', '0', '2012-12-28 12:38:19', ''),
(17, 80, '<p>second update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purposesecond update latest update for testing purpose</p>', 'no_img.jpg', '0', '2012-12-28 12:38:47', ''),
(18, 80, '<p>project update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for testproject update for test</p>', 'no_img.jpg', '0', '2012-12-28 13:09:52', 'project update  Title for test '),
(19, 76, '<p>vcnxcnxcv dhgdf hdfh df hhfdh hf</p>', 'no_img.jpg', '0', '2012-12-28 13:23:09', 'Test Update'),
(20, 87, '<p><span>Welcome to our client area where you can manage your account with us. This page provides a brief overview of your account including any open support requests and unpaid invoices. Please ensure you keep your contact details up to date.</span></p>', 'no_img.jpg', '0', '2012-12-30 04:49:14', 'Alisa'),
(21, 95, '<p>test</p>', 'no_img.jpg', '0', '2013-02-14 22:56:32', 'test'),
(22, 35, '<p>Update title with description</p>', 'no_img.jpg', '0', '2013-03-22 10:44:55', 'Update title');

-- --------------------------------------------------------

--
-- Table structure for table `update_comment`
--

CREATE TABLE IF NOT EXISTS `update_comment` (
  `update_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `update_id` int(11) NOT NULL,
  `update_comment_user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `update_comment_text` text NOT NULL,
  `update_comment_date` datetime NOT NULL,
  PRIMARY KEY (`update_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `update_comment`
--

INSERT INTO `update_comment` (`update_comment_id`, `update_id`, `update_comment_user_id`, `project_id`, `update_comment_text`, `update_comment_date`) VALUES
(1, 1, 6, 11, 'gdsfg dsfgds dsg', '2012-10-13 04:48:19'),
(2, 1, 6, 11, 'tgfh gfhfg', '2012-10-13 04:49:40'),
(3, 1, 6, 11, 'Comment on update', '2012-10-13 06:37:07'),
(4, 4, 9, 2, 'Comment on introduction for testing', '2012-10-20 11:42:41'),
(5, 4, 9, 2, 'Comment on introduction for testing', '2012-10-20 11:42:48'),
(6, 1, 6, 11, 'gfjdfjfgjfhgfj', '2012-10-26 05:20:56'),
(7, 1, 6, 11, 'fjhdfgjdgfjdfjdf', '2012-10-26 05:20:59'),
(8, 1, 6, 11, 'dfjfgjjfg', '2012-10-26 05:21:03'),
(9, 9, 14, 41, 'hello', '2012-11-05 03:26:53'),
(10, 9, 14, 41, 'hello', '2012-11-05 03:45:14'),
(11, 8, 14, 41, 'fh dfhdf fhdfhd', '2012-11-06 18:16:42'),
(12, 8, 14, 41, 'kjl', '2012-11-29 11:01:53'),
(13, 8, 14, 41, 'kjl', '2012-11-29 11:02:02'),
(14, 16, 14, 80, 'comment for test on updates on celebration party', '2012-12-28 13:10:36'),
(15, 16, 14, 80, 'cnc', '2012-12-28 13:20:12'),
(16, 16, 9, 80, 'hhdhfjhfjhsfs', '2012-12-28 15:38:37'),
(17, 16, 14, 80, 'hgdfhdfhdfh\n', '2012-12-28 15:47:44'),
(18, 16, 14, 80, 'dhdhfggfjgfjgfj gfjgfj gfjfg fgj', '2012-12-28 15:50:33'),
(19, 16, 14, 80, 'hdhdfdfgjgfjghkhghgkhgk', '2012-12-28 15:50:54'),
(20, 16, 14, 80, 'hdhdfdfgjgfjghkhghgkhgk', '2012-12-28 15:51:39'),
(21, 16, 14, 80, 'hghgh', '2012-12-28 15:52:22'),
(22, 16, 14, 80, 'hgk hgkghkgkghkhgk', '2012-12-28 15:56:17'),
(23, 16, 14, 80, 'hgkgfk', '2012-12-28 16:00:21'),
(24, 19, 14, 76, 'DGFJHDGSFJHDSGJHFDGSJHFGDSF', '2012-12-28 16:01:54'),
(25, 15, 6, 36, 'dfffffffffffffffffffffffffffffff', '2013-01-30 10:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `is_admin` int(10) NOT NULL DEFAULT '0',
  `fb_uid` varchar(100) DEFAULT NULL,
  `tw_id` varchar(255) DEFAULT NULL,
  `tw_screen_name` varchar(255) DEFAULT NULL,
  `tw_oauth_token` text,
  `tw_oauth_token_secret` text,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `paypal_verified` varchar(10) DEFAULT NULL,
  `signup_ip` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `amazon_token_id` varchar(255) DEFAULT NULL,
  `refund_token_id` varchar(255) DEFAULT NULL,
  `user_about` text,
  `user_website` varchar(255) DEFAULT NULL,
  `user_occupation` varchar(255) DEFAULT NULL,
  `user_interest` text,
  `user_skill` text,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedln_url` varchar(255) DEFAULT NULL,
  `googleplus_url` varchar(255) DEFAULT NULL,
  `bandcamp_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `myspace_url` varchar(255) DEFAULT NULL,
  `confirm_key` varchar(25) DEFAULT NULL,
  `unique_code` varchar(255) DEFAULT NULL,
  `reference_user_id` int(100) DEFAULT NULL,
  `enable_facebook_stream` tinyint(1) NOT NULL,
  `enable_twitter_stream` tinyint(1) NOT NULL,
  `image_no` varchar(50) DEFAULT NULL,
  `fb_access_token` varchar(200) DEFAULT NULL,
  `facebook_wall_post` int(1) NOT NULL,
  `autopost_site` int(1) NOT NULL,
  `user_opt` int(2) NOT NULL DEFAULT '1' COMMENT '0-No,1-yes OPT Feature',
  `user_photo_id` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `user_mobile` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `last_name`, `email`, `password`, `image`, `gender`, `is_admin`, `fb_uid`, `tw_id`, `tw_screen_name`, `tw_oauth_token`, `tw_oauth_token_secret`, `address`, `city`, `state`, `country`, `zip_code`, `paypal_email`, `paypal_verified`, `signup_ip`, `active`, `date_added`, `amazon_token_id`, `refund_token_id`, `user_about`, `user_website`, `user_occupation`, `user_interest`, `user_skill`, `facebook_url`, `twitter_url`, `linkedln_url`, `googleplus_url`, `bandcamp_url`, `youtube_url`, `myspace_url`, `confirm_key`, `unique_code`, `reference_user_id`, `enable_facebook_stream`, `enable_twitter_stream`, `image_no`, `fb_access_token`, `facebook_wall_post`, `autopost_site`, `user_opt`, `user_photo_id`, `birth_date`, `profile_name`, `user_mobile`) VALUES
(5, 'dharmesh', 'patel', 'dharmesh.rockersinfo@gmail.com', '12345678', '21289category.jpg', '0', 0, '100004037024764', '', '0', '', '', '0', '1', '1', '2', '0', 'owner_1321252190_per@gmail.com', '1', '101.0.59.219', '1', '2012-10-02 09:19:10', NULL, NULL, '', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ynbkJtWlKz', 'xMgLvKSQqFGa', 0, 0, 0, NULL, 'AAAFJYhJeWUABAAZCZC2dDtYk0ZA9c8kgiWmCN0b0z8WWcwoJ0uc1BYSYvZAy0Iujut8YbZBbaCkWVbQrDmBMiUPhRWyAMQZANc79UZAYTKX7AZDZD', 0, 0, 1, 0, '0000-00-00', 'dharmesh-p', 987654123),
(6, 'vivek', 'rockers', 'vivek.rockersinfo@gmail.com', '12345678', 'big3.jpg', '0', 0, '100003438843990', '', '0', '', '', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', '0', 'owner_1321252190_per@gmail.com', '1', '101.0.59.219', '1', '2012-10-02 09:23:30', NULL, NULL, 'We suggest a short bio. If it''s 300 characters or less it''ll look great on your profile.We suggest a short bio. If it''s 300 characters or less it''ll look great on your profile.We suggest a short bio. If it''s 300 characters or less it''ll look great on your profile.\n\nsoftware testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing software testing ', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4EoAGz7qrc', 'BzNDXHDc7kR5', 0, 0, 0, NULL, '', 0, 0, 1, 0, '1970-01-01', 'vivek', 2),
(7, 'viral', 'jadav', 'viral.rockersinfo@gmail.com', '12345678', 'img_random2.png', '0', 0, '0', '', '0', '', '', '0', '1', '1', '2', '0', NULL, NULL, '101.0.59.61', '1', '2012-10-11 11:59:37', NULL, NULL, '', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mfpZDyLX5z', 'kWQP46Z6sWRH', 0, 0, 0, NULL, 'AAAFJYhJeWUABAGqpphQIGZBg1zUbGlMH7PWGoyelm6M2PNO0q239lYwE45krD0FJnsPfDxZBjngIQ6RTDzksCAsCMDKwlkMw6PJZBI2pgZDZD', 0, 0, 1, 0, '0000-00-00', 'viral', 0),
(8, 'admin', NULL, 'mihit.test.rockersinfo@gmail.com', 'admin', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '210.89.56.250', '1', '2012-10-18 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 0, 1, 0, '0000-00-00', '', 0),
(9, 'Madhuri', 'Nikam', 'madhuri.rockersinfo@gmail.com', '12345678', 'Winter1.jpg', '0', 0, '', '0', '0', '0', '0', 'Bangalore, Karnataka, India', 'Bangalore', ' Karnataka', ' India', '0', 'owner_1321252190_per@gmail.com', '1', '210.89.56.250', '1', '2012-10-18 15:52:30', NULL, NULL, 'Biographical works are usually non-fiction, but fiction can also be used to portray a person''s life. One in-depth form of biographical coverage is called legacy writing', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Hqh7mhHmdcAj', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '1999-07-12', 'https://www.kickstarter.com/profile/', 2147483647),
(10, 'jigar', 'gandhi', 'jigar.rockersinfo@gmail.com', '12345678', 'no_img.jpg', '0', 0, '100002296977349', '', '0', '', '', '0', '1', '1', '2', '0', 'owner_1321252190_per@gmail.com', '1', '1.22.81.19', '1', '2012-10-19 15:46:36', NULL, NULL, '', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aGXOXIpdu7', 'UZLnTPAc2tqy', 0, 0, 0, NULL, 'AAAFJYhJeWUABAOPRdc0hASgrXraMhjlx4Yah9oJaGyrjGWOXAZAqGtgZBelMXexzedoo9a434OQiem6bmPL3tHT273AEcArgur74GQJgZDZD', 0, 0, 1, 0, '0000-00-00', 'vivek-s', 0),
(14, 'Mihir', 'Patel', 'mihir.rockersinfo@gmail.com', '12345678', 'SAVE1.jpg', '0', 0, '100002296977349', '0', '0', '0', '0', 'Vadodara, Gujarat, India', 'Vadodara', ' Gujarat', ' India', '0', 'owner_1321252190_per@gmail.com', '1', '1.22.81.22', '1', '2012-11-02 10:52:47', NULL, NULL, 'We suggest a short bio. If it''s 300 characters or less it''ll look great on your profile.', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'fDJQAygeKcUo', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '2012-12-20', 'patel', 1234567890),
(16, 'Bob', 'Dolar', 'mihir.test.rockersinfo@gmail.com', '12345678', '', '0', 0, '0', '0', '0', '0', '0', 'chennai', '', '', 'chennai', '0', 'mihir.rockersinfo@gmail.com', '1', '1.22.81.22', '1', '2012-11-02 13:48:27', NULL, NULL, 'I love this website > BangFriends.com', NULL, '0', '0', '0', '', '', '', '', '', '', '', 'SC6x3ErXsQ', 'dztgYjQ7Vzrb', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '2013-11-30', 'mama', 0),
(18, 'dsfsd', 'dsfds', 'sdfds@dfd.dfds', '', '0', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Surat, Gujarat, India', 'Surat', ' Gujarat', ' India', NULL, '', NULL, '1.22.80.241', '1', '2012-11-06 15:42:41', NULL, NULL, 'dfdsf ds fds fdsf', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 0, 1, 0, '0000-00-00', '', 0),
(20, 'PAVLIK', 'PAVL', 'pavel.hmao@gmail.com', '123456789', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, '', '0', '94.50.197.77', '1', '2012-12-08 23:26:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'zNwh5EcGBzYX', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(22, 'Upeksha', 'Testing', 'rockers1rock@gmail.com', '12345678', '0', '0', 0, '0', '0', '0', '0', '0', 'Bangalore, Karnataka, India', 'Bangalore', ' Karnataka', ' India', '0', '', '0', '1.22.81.224', '1', '2012-12-24 15:21:51', NULL, NULL, 'That frustrating moment when you''re driving on the freeway and your fuel light comes on.', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'RqVr8NUVZ9rX', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '1989-11-14', 'upeksha', 1234567845),
(23, 'V', 'V', 'vidhishah.j@gmail.com', 'vidhitest', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.80.195', '1', '2013-01-07 15:29:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'dtEiRTqAADQ7', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(24, 'jalpasdasaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdddddddddddddd', 'shahasadddddddddddddddddddddaaddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'vidhi.j.j.j.j.j@gmail.com', 'vidhitest', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.80.195', '0', '2013-01-07 15:36:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RJgix12qJZ', 'efAReGAVw6at', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(25, 'ss', 'ss', 'jalpashah@yahoo.com', 'jalpatest', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.80.195', '0', '2013-01-07 15:46:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NH6mss3QQb', 'PKKm2pynJqpf', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(26, 'Pavan', 'Patidar', 'pavanpatidar8@gmail.com', '2486pavan', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.80.249', '1', '2013-01-08 14:50:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '3uwciygFXCFZ', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(27, 'fdas', 'fdsafdsa', 'travis@gmail.com', '77777777', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '184.96.156.200', '0', '2013-01-11 10:20:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bh0E6NDXaZ', '48RdTnKUx58u', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(28, 'Roshen', 'Weliwatta', 'hepl.sandy@outlook.com', 'Sandaruwan1', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '166.137.89.147', '0', '2013-01-11 20:09:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 's4EHpHNJLg', 'FESkuk6C4w8R', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(29, 'Roshen', 'Weliwatta', 'help.sandy@outlook.com', 'Sandaruwan1', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '166.137.89.147', '0', '2013-01-11 20:11:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ZbEX9M6RCn', 'KT4vurj9qED6', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(30, 'kaumil', 'upadhyay', 'kaumil@gmial.com', 'teacher789', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.81.203', '0', '2013-01-12 13:56:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qb0DjUtPsr', 'YupNFEY8JkCA', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(31, 'kaumil', 'updahyay', 'test@gmail.com', '123456789', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.81.203', '0', '2013-01-12 13:58:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zj2fy3y9J1', 'Fim8PzdDjXJU', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(32, 'kaumil', 'upadhyay', 'kaumu_up@yahoo.co.in', '123456789', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.81.203', '0', '2013-01-12 14:08:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C9mmn94NwR', 'VcurmxRYspRa', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(33, 'kaumil', 'upadhyay', 'test@yahoo.co.in', 'bluewater', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.81.203', '0', '2013-01-12 14:19:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WShFHiCZSL', 'JVoYFV7s29q5', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(34, 'kaumil', 'upas', 'test@hotnail.com', 'teacher789', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.22.81.203', '0', '2013-01-12 14:39:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uhTG4XhPij', '8QQdberMHYmh', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(35, 'al', 'anthony', 'xoxialight@gmail.com', 'deleteme', '0', NULL, 0, '100002057952526', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, '', '0', '174.76.19.71', '1', '2013-01-13 05:31:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sMbmyaPw1X', '5rhpbEkt3wpJ', 0, 0, 0, NULL, 'AAAGa30LxS9kBABPCY0TaCF6760BDsfgZAmYMK1FzipSBwm6Ll185Wf0vZAI4DO6eGi4ECAKQTqADLxiDtFmTa9jLbIHRLiWAHDPyKfFwZDZD', 0, 0, 1, 0, '0000-00-00', '', 0),
(36, 'dani', 'langman', 'lamine@ireals.net', 'pass1989', '0', NULL, 0, '100001842071084', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '92.151.179.218', '1', '2013-01-14 17:50:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MQ4L6o1bMB', 'cCwKykDS2Nzy', 0, 0, 0, NULL, 'AAAGa30LxS9kBAH4ch3Yahh1ZCce0oUv4xVUDNp58vm56jqScoXGzFJdy2MENE7CesEVATTCg0zWUZAAJcOYWBfZAVC2lZAcKq1agMsu79gZDZD', 0, 0, 1, 0, '0000-00-00', '', 0),
(37, 'Mudit', 'Kalra', 'mudit.kalra@gmail.com', 'mk9871848418', '0', NULL, 0, '518261580', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, '', '0', '115.249.61.233', '1', '2013-01-17 00:50:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kAldDRzSky', 'dHNvS7JmjhQv', 0, 0, 0, NULL, 'AAAGa30LxS9kBAEsNLry1mDZABCBepiP4Lt02mKPKp065qa0UVWc6Xp2xNx6RDXumirr4PS5TcOJ60yly28ZA3VptRd9SEsnaZBg9i9UrgZDZD', 0, 0, 1, 0, '0000-00-00', '', 0),
(38, 'roland', 'sequeira', 'rolseq@gmail.com', 'dnalor123', '0', NULL, 0, '714729588', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, '', '0', '122.252.239.151', '1', '2013-01-23 09:11:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6TofOekSx2', 'poLyYaqvbmBj', 0, 0, 0, NULL, 'AAAGa30LxS9kBAGGJloTujBg0fybPSZCuevgjeZCCKtqADZCZBjZBX7JsZAWqkUqjo3CSVuLoasoZARPFi8U34SPYWSpQPsyar3aupQogKP79gZDZD', 0, 0, 1, 0, '0000-00-00', '', 0),
(39, 'choi', 'jae', 'downsys@naver.com', '6680fire', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, '', '0', '121.182.36.247', '1', '2013-01-27 16:04:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '3koXcbtw7i6b', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(40, 'kaumil', 'upadhyay', 'kaumil.test.rockersinfo@gmail.com', '12345678', '0', NULL, 0, '100005111284856', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, 'mihir.rockersinfo@gmail.com', '1', '1.22.83.188', '1', '2013-01-28 14:21:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FRZeXmzmi4', 'AH5PvSgjsEvD', 0, 0, 0, NULL, '451758668205017|267cd775da2e9451afde9e517686afb0', 0, 0, 1, 0, '2013-06-29', '', 2147483647),
(41, 'ritu', 'sampui', 'ritu.rockersinfo@gmail.com', '12345678', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '210.89.56.250', '0', '2013-01-29 17:16:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'OwYjSr3uYi', '2VenNEJbUEmB', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(42, 'Bob', 'Hoenderman', 'obev@live.nl', 'KSbh1971', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '77.169.39.211', '1', '2013-02-19 18:25:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'FKY7RfnMjvFR', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(43, 'mihai', 'ionescu', 'mihaiionescu@jayamedia.ro', '12345678', '0', NULL, 0, '100003274321941', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, '', '0', '5.14.201.187', '1', '2013-02-23 07:03:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f9WBSurX8T', 'iwQ27Jt2KGfk', 0, 0, 0, NULL, 'AAAGa30LxS9kBALKQP8VDIddGgeSubpC6qDnKdjCn1MGr6auTnISyr6xbhoWg3YrbJZCkAEDPHRZC8KGrNPz2ztxn2zukzxk93eB17gKQZDZD', 0, 0, 1, 0, '0000-00-00', '', 0),
(44, 'dafalla', 'awadalla', 'dafdxb@gmail.com', 'abuguta12', '0', NULL, 0, '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '92.97.234.170', '1', '2013-03-09 04:06:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'SNN9QbjbmKaN', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(45, 'alessandro', 'mazzola', 'infojubbol@gmail.com', 'montebianc92', '0', NULL, 0, '1238298464', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, '', '0', '87.2.98.185', '1', '2013-03-12 22:51:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'icC1DApKnW', 'rQ5aWEAmsEEo', 0, 0, 0, NULL, 'AAAGa30LxS9kBAB5EO6ExPhT6sOD1XMZBBXwRfjEVnYuGBo49kgHVT6ESeRKTdpM7EMwOSgvonMUQJqEvflKJAGVFFygClG7tmeH3o5QZDZD', 0, 0, 1, 0, '0000-00-00', '', 0),
(46, 'so', 'cf', 'clovisso@qq.com', 'abcd1234', '0', NULL, 0, '0', '0', '0', '0', '0', '', '', '', '', NULL, '', NULL, '220.241.121.142', '0', '2013-03-13 13:06:51', NULL, NULL, '', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', 'ocQ0YUgIhS', 'a8s6auU3yPLb', 0, 0, 0, NULL, '0', 0, 0, 1, 0, '0000-00-00', '', 0),
(47, 'erik', 'vandewerken', 'erik@leadprovider.nl', 'ew123456', '0', NULL, 0, '100001892843364', '', '0', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '92.64.88.54', '1', '2013-03-18 21:44:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9bHqu639NL', '8tgfRPxJV8gK', 0, 0, 0, NULL, 'AAAGa30LxS9kBADZCVQKLYyK4mPbMZBCFxIi68Mq0OWrCtQcRwSdorvqwpZAX49qjd5xkvCVpECRsdYcXT9j7sKk5DaVZCNmTE3Ojt0XakwZDZD', 0, 0, 1, 0, '0000-00-00', '', 0),
(48, 'user', 'demo', 'user@demo.com', 'userdemo', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 0, 1, 0, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_card_info`
--

CREATE TABLE IF NOT EXISTS `user_card_info` (
  `user_card_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `card_first_name` varchar(255) DEFAULT NULL,
  `card_last_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_type` varchar(100) DEFAULT NULL,
  `card_expiration_month` int(30) NOT NULL,
  `card_expiration_year` int(50) NOT NULL,
  `card_address` text,
  `card_city` varchar(255) DEFAULT NULL,
  `card_state` varchar(255) DEFAULT NULL,
  `card_zipcode` varchar(255) DEFAULT NULL,
  `card_transaction_id` varchar(255) DEFAULT NULL,
  `card_verify_status` int(30) NOT NULL DEFAULT '0',
  `card_date` datetime NOT NULL,
  `card_ip` varchar(255) DEFAULT NULL,
  `card_paypal_email` varchar(255) DEFAULT NULL,
  `card_paypal_verify` int(20) NOT NULL DEFAULT '0' COMMENT '0=not,1=yes',
  PRIMARY KEY (`user_card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_follow`
--

CREATE TABLE IF NOT EXISTS `user_follow` (
  `follower_id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_user_id` int(11) NOT NULL,
  `follow_by_user_id` int(11) NOT NULL,
  `user_follow_date` datetime NOT NULL,
  PRIMARY KEY (`follower_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `user_follow`
--

INSERT INTO `user_follow` (`follower_id`, `follow_user_id`, `follow_by_user_id`, `user_follow_date`) VALUES
(19, 7, 5, '2012-10-19 14:01:33'),
(30, 7, 6, '2012-10-19 18:23:12'),
(21, 5, 10, '2012-10-19 16:05:45'),
(24, 6, 10, '2012-10-19 16:54:41'),
(29, 10, 6, '2012-10-19 18:22:49'),
(31, 10, 9, '2012-10-20 10:39:01'),
(32, 6, 9, '2012-10-20 10:39:05'),
(33, 10, 14, '2012-11-05 17:12:48'),
(34, 9, 6, '2012-11-07 16:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=641 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`login_id`, `user_id`, `login_date_time`, `login_ip`) VALUES
(3, 5, '2012-10-02 09:19:10', '101.0.59.219'),
(4, 6, '2012-10-02 09:23:30', '101.0.59.219'),
(5, 6, '2012-10-02 09:23:52', '101.0.59.219'),
(6, 5, '2012-10-02 11:52:08', '1.22.80.214'),
(7, 6, '2012-10-02 12:06:48', '101.0.59.219'),
(8, 6, '2012-10-02 18:24:37', '101.0.59.219'),
(9, 6, '2012-10-03 09:21:32', '1.22.80.226'),
(10, 5, '2012-10-03 19:10:32', '210.89.56.250'),
(11, 5, '2012-10-04 09:14:20', '1.22.81.6'),
(12, 5, '2012-10-04 10:16:23', '180.188.225.60'),
(13, 5, '2012-10-04 10:19:45', '180.188.225.60'),
(14, 6, '2012-10-04 15:53:26', '1.22.81.6'),
(15, 5, '2012-10-04 18:06:53', '1.22.81.6'),
(16, 6, '2012-10-05 14:33:17', '210.89.56.250'),
(17, 6, '2012-10-05 18:16:49', '1.22.81.55'),
(18, 6, '2012-10-06 16:12:08', '1.22.81.159'),
(19, 6, '2012-10-06 16:18:01', '1.22.81.159'),
(20, 6, '2012-10-08 09:55:38', '1.22.80.99'),
(21, 6, '2012-10-08 09:55:39', '1.22.80.99'),
(22, 6, '2012-10-08 10:00:45', '1.22.80.99'),
(23, 6, '2012-10-08 10:01:59', '1.22.80.99'),
(24, 6, '2012-10-08 10:04:09', '1.22.80.99'),
(25, 6, '2012-10-08 19:08:02', '210.89.56.250'),
(26, 6, '2012-10-09 18:06:41', '180.188.225.8'),
(27, 5, '2012-10-09 18:07:08', '180.188.225.8'),
(28, 6, '2012-10-10 09:17:14', '101.0.59.132'),
(29, 5, '2012-10-10 09:38:52', '101.0.59.132'),
(30, 5, '2012-10-10 10:13:27', '101.0.59.132'),
(31, 6, '2012-10-10 10:19:23', '101.0.59.132'),
(32, 6, '2012-10-10 10:26:23', '101.0.59.132'),
(33, 5, '2012-10-10 10:28:51', '101.0.59.132'),
(34, 6, '2012-10-10 11:47:00', '101.0.59.132'),
(35, 6, '2012-10-10 13:40:29', '101.0.59.132'),
(36, 5, '2012-10-10 13:54:03', '101.0.59.132'),
(37, 6, '2012-10-10 14:17:59', '101.0.59.132'),
(38, 5, '2012-10-10 14:18:33', '101.0.59.132'),
(39, 5, '2012-10-10 14:39:15', '101.0.59.132'),
(40, 6, '2012-10-11 10:09:36', '101.0.59.61'),
(41, 6, '2012-10-11 10:16:16', '1.22.81.37'),
(42, 6, '2012-10-11 11:04:32', '101.0.59.61'),
(43, 6, '2012-10-11 11:10:22', '101.0.59.61'),
(44, 6, '2012-10-11 11:10:51', '101.0.59.61'),
(45, 6, '2012-10-11 11:13:01', '101.0.59.61'),
(46, 6, '2012-10-11 11:15:04', '101.0.59.61'),
(47, 5, '2012-10-11 11:17:01', '101.0.59.61'),
(48, 6, '2012-10-11 11:17:44', '101.0.59.61'),
(49, 6, '2012-10-11 11:20:52', '101.0.59.61'),
(50, 6, '2012-10-11 11:23:05', '101.0.59.61'),
(51, 7, '2012-10-11 11:59:37', '101.0.59.61'),
(52, 6, '2012-10-11 12:43:45', '101.0.59.61'),
(53, 6, '2012-10-11 14:31:46', '101.0.59.61'),
(54, 6, '2012-10-11 14:33:59', '101.0.59.61'),
(55, 6, '2012-10-11 17:08:54', '1.22.81.37'),
(56, 7, '2012-10-11 18:02:28', '1.22.81.37'),
(57, 6, '2012-10-11 18:08:38', '1.22.81.37'),
(58, 6, '2012-10-11 18:16:15', '1.22.81.37'),
(59, 6, '2012-10-11 18:19:15', '1.22.81.37'),
(60, 6, '2012-10-11 18:21:36', '1.22.81.37'),
(61, 6, '2012-10-12 11:39:26', '101.0.59.86'),
(62, 6, '2012-10-12 11:40:29', '101.0.59.86'),
(63, 5, '2012-10-12 18:14:30', '180.188.225.92'),
(64, 6, '2012-10-13 13:23:36', '1.22.80.106'),
(65, 6, '2012-10-13 13:25:19', '1.22.80.106'),
(66, 6, '2012-10-13 16:46:45', '1.22.80.106'),
(67, 6, '2012-10-13 18:34:46', '180.188.225.18'),
(69, 6, '2012-10-15 09:35:14', '1.22.80.44'),
(70, 6, '2012-10-15 14:32:33', '210.89.56.250'),
(71, 6, '2012-10-15 18:19:25', '1.22.80.44'),
(72, 6, '2012-10-16 14:24:07', '101.0.59.67'),
(73, 6, '2012-10-16 14:33:31', '101.0.59.67'),
(74, 5, '2012-10-16 14:43:41', '101.0.59.67'),
(75, 5, '2012-10-16 14:45:41', '101.0.59.67'),
(76, 6, '2012-10-16 15:00:57', '1.22.80.194'),
(77, 6, '2012-10-16 15:01:20', '1.22.80.194'),
(78, 5, '2012-10-16 15:02:07', '1.22.80.194'),
(79, 5, '2012-10-16 15:07:27', '101.0.59.67'),
(80, 6, '2012-10-16 15:17:34', '1.22.80.194'),
(81, 5, '2012-10-16 15:20:15', '1.22.80.194'),
(82, 6, '2012-10-16 15:44:36', '1.22.80.194'),
(83, 6, '2012-10-16 16:33:40', '101.0.59.67'),
(84, 5, '2012-10-16 16:46:22', '101.0.59.67'),
(85, 6, '2012-10-16 17:16:30', '101.0.59.67'),
(86, 6, '2012-10-17 12:57:04', '1.22.81.28'),
(87, 6, '2012-10-17 16:32:30', '1.22.81.28'),
(88, 6, '2012-10-17 17:09:14', '101.0.59.5'),
(89, 5, '2012-10-17 17:27:50', '101.0.59.5'),
(90, 6, '2012-10-17 17:52:25', '101.0.59.5'),
(91, 6, '2012-10-17 18:03:27', '101.0.59.5'),
(92, 6, '2012-10-17 18:31:29', '101.0.59.5'),
(93, 6, '2012-10-18 10:32:09', '210.89.56.250'),
(94, 9, '2012-10-18 16:03:26', '210.89.56.250'),
(95, 9, '2012-10-18 16:05:43', '210.89.56.250'),
(96, 9, '2012-10-18 16:18:44', '1.22.81.24'),
(97, 9, '2012-10-18 16:21:09', '1.22.81.24'),
(98, 6, '2012-10-18 18:45:43', '210.89.56.250'),
(99, 9, '2012-10-19 09:51:46', '1.22.81.19'),
(100, 9, '2012-10-19 09:58:27', '1.22.81.19'),
(101, 9, '2012-10-19 10:38:02', '1.22.81.19'),
(102, 5, '2012-10-19 11:45:42', '1.22.81.19'),
(103, 5, '2012-10-19 13:04:17', '1.22.81.19'),
(104, 6, '2012-10-19 13:31:19', '1.22.81.19'),
(105, 5, '2012-10-19 13:45:21', '1.22.81.19'),
(106, 6, '2012-10-19 13:51:39', '1.22.81.19'),
(107, 6, '2012-10-19 15:17:07', '180.188.225.53'),
(108, 10, '2012-10-19 15:46:36', '1.22.81.19'),
(109, 6, '2012-10-19 15:56:07', '1.22.81.19'),
(110, 6, '2012-10-19 16:02:58', '1.22.81.19'),
(111, 5, '2012-10-19 16:12:40', '1.22.81.19'),
(112, 5, '2012-10-19 16:43:30', '1.22.81.19'),
(113, 6, '2012-10-19 16:45:52', '1.22.81.19'),
(114, 6, '2012-10-19 16:47:36', '1.22.81.19'),
(115, 6, '2012-10-19 17:01:54', '180.188.225.53'),
(116, 6, '2012-10-19 17:03:34', '1.22.81.19'),
(117, 6, '2012-10-19 17:05:50', '1.22.81.19'),
(118, 9, '2012-10-20 09:45:16', '1.22.80.131'),
(119, 6, '2012-10-20 11:22:46', '1.22.80.131'),
(120, 6, '2012-10-20 14:59:08', '1.22.80.131'),
(121, 9, '2012-10-20 15:21:39', '1.22.80.131'),
(122, 9, '2012-10-22 11:22:37', '1.22.81.166'),
(123, 6, '2012-10-22 15:58:09', '101.0.59.216'),
(124, 10, '2012-10-23 10:03:45', '101.0.59.145'),
(125, 6, '2012-10-23 10:16:32', '101.0.59.145'),
(126, 6, '2012-10-23 10:17:41', '101.0.59.145'),
(127, 6, '2012-10-23 11:38:08', '1.22.80.148'),
(128, 6, '2012-10-23 11:38:16', '1.22.80.148'),
(129, 6, '2012-10-23 13:18:45', '101.0.59.145'),
(130, 6, '2012-10-23 17:29:58', '210.89.56.250'),
(131, 6, '2012-10-23 17:29:58', '210.89.56.250'),
(132, 6, '2012-10-23 17:43:36', '1.22.81.98'),
(133, 6, '2012-10-24 10:47:24', '101.0.59.119'),
(134, 9, '2012-10-26 12:42:09', '210.89.56.250'),
(135, 9, '2012-10-26 14:22:41', '101.0.59.88'),
(136, 6, '2012-10-26 14:31:37', '1.22.81.7'),
(137, 7, '2012-10-26 14:38:12', '1.22.81.7'),
(138, 6, '2012-10-26 14:57:00', '1.22.81.7'),
(139, 9, '2012-10-26 16:08:16', '101.0.59.88'),
(140, 6, '2012-10-26 17:19:11', '1.22.81.7'),
(141, 6, '2012-10-26 17:36:50', '1.22.81.7'),
(142, 6, '2012-10-27 13:22:56', '1.22.80.199'),
(143, 9, '2012-10-29 09:20:14', '1.22.80.241'),
(144, 9, '2012-10-29 09:20:21', '1.22.80.241'),
(145, 6, '2012-10-29 09:20:45', '1.22.80.241'),
(146, 6, '2012-10-29 09:27:01', '1.22.80.241'),
(147, 6, '2012-10-29 13:02:57', '1.22.80.241'),
(148, 6, '2012-10-29 18:35:49', '1.22.80.241'),
(149, 6, '2012-10-30 09:11:08', '1.22.80.239'),
(150, 6, '2012-10-30 10:42:08', '1.22.80.239'),
(151, 9, '2012-10-30 11:25:05', '1.22.80.239'),
(152, 6, '2012-10-30 12:03:10', '1.22.80.239'),
(153, 6, '2012-10-30 12:09:52', '1.22.80.239'),
(154, 6, '2012-10-30 12:17:01', '101.0.59.156'),
(155, 6, '2012-10-30 13:11:10', '1.22.80.239'),
(156, 6, '2012-10-30 13:11:13', '1.22.80.239'),
(157, 6, '2012-10-30 13:43:18', '1.22.80.239'),
(158, 9, '2012-10-30 15:12:02', '210.89.56.250'),
(159, 6, '2012-10-30 15:34:47', '49.249.1.108'),
(160, 9, '2012-10-30 16:44:29', '1.22.80.44'),
(161, 9, '2012-10-30 17:02:12', '1.22.80.44'),
(162, 5, '2012-10-30 18:02:32', '1.22.80.44'),
(163, 6, '2012-10-30 18:07:51', '49.249.18.145'),
(164, 6, '2012-10-31 11:14:23', '1.22.80.250'),
(165, 5, '2012-10-31 11:15:29', '1.22.80.250'),
(166, 6, '2012-10-31 11:41:08', '101.0.59.44'),
(167, 6, '2012-10-31 11:54:15', '101.0.59.44'),
(168, 9, '2012-10-31 12:37:33', '1.22.80.250'),
(169, 6, '2012-10-31 12:56:46', '1.22.80.250'),
(170, 6, '2012-10-31 14:00:10', '1.22.80.250'),
(171, 6, '2012-10-31 15:54:07', '1.22.80.250'),
(172, 5, '2012-10-31 18:26:03', '1.22.80.250'),
(173, 6, '2012-10-31 18:29:42', '210.89.56.250'),
(174, 6, '2012-11-01 10:07:20', '1.22.80.220'),
(175, 5, '2012-11-01 11:06:33', '1.22.80.220'),
(178, 6, '2012-11-01 17:37:35', '1.22.80.220'),
(179, 6, '2012-11-01 17:41:24', '1.22.80.220'),
(182, 6, '2012-11-02 10:40:52', '1.22.81.22'),
(183, 14, '2012-11-02 11:11:11', '1.22.81.22'),
(184, 14, '2012-11-02 11:59:20', '1.22.81.22'),
(185, 14, '2012-11-02 13:18:46', '1.22.81.22'),
(186, 14, '2012-11-02 14:07:17', '1.22.81.22'),
(187, 14, '2012-11-02 15:29:05', '210.89.56.250'),
(188, 14, '2012-11-02 15:39:31', '1.22.81.22'),
(189, 6, '2012-11-02 17:14:00', '1.22.81.22'),
(190, 14, '2012-11-03 09:32:21', '210.89.56.250'),
(191, 14, '2012-11-03 09:47:58', '1.22.80.187'),
(192, 6, '2012-11-03 11:01:09', '210.89.56.250'),
(193, 14, '2012-11-03 12:58:09', '1.22.80.187'),
(194, 6, '2012-11-03 13:55:46', '1.22.80.187'),
(195, 6, '2012-11-03 15:35:06', '1.22.80.187'),
(196, 14, '2012-11-03 17:10:43', '1.22.80.187'),
(197, 6, '2012-11-05 09:22:31', '1.22.80.224'),
(198, 14, '2012-11-05 10:15:39', '1.22.80.224'),
(199, 14, '2012-11-05 12:12:47', '1.22.80.224'),
(200, 6, '2012-11-05 13:25:32', '1.22.80.224'),
(201, 6, '2012-11-05 13:35:18', '1.22.80.224'),
(202, 14, '2012-11-05 14:04:14', '1.22.80.224'),
(203, 14, '2012-11-05 14:23:00', '1.22.80.224'),
(204, 16, '2012-11-05 14:33:48', '1.22.80.224'),
(205, 14, '2012-11-05 14:46:46', '1.22.80.224'),
(206, 6, '2012-11-05 14:55:13', '1.22.80.224'),
(207, 14, '2012-11-05 15:16:54', '1.22.80.224'),
(208, 14, '2012-11-05 17:08:16', '1.22.80.224'),
(209, 17, '2012-11-05 17:58:49', '1.22.80.224'),
(210, 6, '2012-11-05 18:12:42', '180.188.225.63'),
(211, 6, '2012-11-05 18:13:52', '180.188.225.63'),
(212, 14, '2012-11-06 10:30:11', '180.188.225.119'),
(213, 14, '2012-11-06 10:30:57', '180.188.225.119'),
(214, 10, '2012-11-06 11:02:46', '180.188.225.119'),
(215, 14, '2012-11-06 12:24:23', '1.22.80.241'),
(216, 14, '2012-11-06 13:13:58', '1.22.80.241'),
(217, 14, '2012-11-06 13:18:01', '180.188.225.119'),
(218, 14, '2012-11-06 13:59:08', '1.22.80.241'),
(219, 14, '2012-11-06 15:39:54', '1.22.80.241'),
(220, 6, '2012-11-07 10:11:55', '1.22.80.123'),
(221, 5, '2012-11-07 10:24:09', '1.22.80.123'),
(222, 6, '2012-11-07 10:34:24', '1.22.80.123'),
(223, 14, '2012-11-07 13:58:16', '101.0.59.237'),
(224, 6, '2012-11-07 14:17:15', '1.22.80.123'),
(225, 14, '2012-11-07 14:20:13', '1.22.80.123'),
(226, 7, '2012-11-07 14:25:50', '1.22.80.123'),
(227, 6, '2012-11-07 15:33:08', '1.22.80.123'),
(228, 6, '2012-11-07 17:01:56', '1.22.80.123'),
(229, 14, '2012-11-08 09:28:30', '180.188.225.74'),
(230, 14, '2012-11-08 09:31:57', '1.22.80.49'),
(232, 6, '2012-11-08 09:41:16', '180.188.225.74'),
(233, 6, '2012-11-08 11:52:51', '1.22.80.49'),
(234, 14, '2012-11-08 14:31:21', '1.22.80.49'),
(235, 5, '2012-11-08 15:04:08', '1.22.80.49'),
(236, 5, '2012-11-08 15:04:59', '1.22.80.49'),
(237, 6, '2012-11-08 18:09:10', '1.22.80.49'),
(238, 6, '2012-11-08 18:10:59', '69.115.138.93'),
(239, 5, '2012-11-09 09:40:10', '101.0.59.158'),
(240, 5, '2012-11-09 14:20:32', '101.0.59.158'),
(241, 14, '2012-11-09 17:44:40', '1.22.81.5'),
(242, 14, '2012-11-10 13:54:22', '1.22.80.111'),
(243, 6, '2012-11-10 17:52:02', '210.89.56.250'),
(244, 5, '2012-11-19 09:27:58', '210.89.56.250'),
(245, 5, '2012-11-20 11:24:05', '210.89.56.250'),
(246, 6, '2012-11-20 11:24:25', '210.89.56.250'),
(247, 14, '2012-11-20 11:48:43', '210.89.56.250'),
(248, 5, '2012-11-20 13:58:28', '210.89.56.250'),
(249, 6, '2012-11-20 13:58:32', '210.89.56.250'),
(250, 6, '2012-11-20 14:12:01', '1.22.81.39'),
(251, 14, '2012-11-20 14:55:02', '1.22.81.39'),
(252, 14, '2012-11-20 16:15:21', '210.89.56.250'),
(253, 6, '2012-11-26 15:59:51', '210.89.56.250'),
(254, 6, '2012-11-27 09:21:03', '101.0.59.23'),
(255, 6, '2012-11-27 09:27:42', '101.0.59.23'),
(256, 5, '2012-11-28 15:56:37', '210.89.56.250'),
(257, 14, '2012-11-29 10:38:00', '101.0.59.204'),
(258, 14, '2012-11-29 10:45:01', '101.0.59.204'),
(259, 16, '2012-12-04 09:37:47', '180.188.225.66'),
(260, 6, '2012-12-04 09:44:26', '1.22.81.84'),
(261, 14, '2012-12-04 10:17:20', '180.188.225.20'),
(262, 10, '2012-12-04 10:20:34', '1.22.81.84'),
(263, 16, '2012-12-04 10:21:10', '1.22.81.84'),
(264, 14, '2012-12-04 10:51:36', '180.188.225.20'),
(265, 6, '2012-12-05 11:05:36', '180.188.225.71'),
(266, 16, '2012-12-06 00:09:59', '201.227.129.70'),
(267, 14, '2012-12-08 15:28:26', '1.22.80.121'),
(268, 20, '2012-12-08 23:28:30', '94.50.197.77'),
(269, 16, '2012-12-10 16:59:22', '178.23.15.69'),
(270, 16, '2012-12-11 07:05:41', '169.241.28.82'),
(271, 16, '2012-12-11 11:21:50', '174.76.19.71'),
(272, 16, '2012-12-13 03:44:31', '71.22.217.158'),
(273, 16, '2012-12-13 04:37:35', '72.92.55.126'),
(274, 16, '2012-12-13 15:38:25', '82.117.233.71'),
(275, 16, '2012-12-14 04:40:19', '169.241.28.81'),
(276, 14, '2012-12-14 20:38:20', '180.188.225.21'),
(277, 16, '2012-12-15 23:32:15', '68.52.43.131'),
(278, 16, '2012-12-16 18:22:11', '72.92.55.126'),
(279, 14, '2012-12-17 10:01:08', '101.0.59.208'),
(280, 10, '2012-12-17 10:04:34', '101.0.59.208'),
(281, 14, '2012-12-17 14:35:34', '101.0.59.207'),
(282, 14, '2012-12-17 14:57:04', '101.0.59.207'),
(283, 10, '2012-12-17 15:06:18', '101.0.59.207'),
(284, 6, '2012-12-18 06:00:12', '87.16.76.121'),
(285, 14, '2012-12-18 09:40:55', '101.0.59.192'),
(286, 10, '2012-12-18 09:41:40', '101.0.59.192'),
(287, 14, '2012-12-18 14:09:11', '1.22.81.63'),
(288, 14, '2012-12-18 14:09:14', '1.22.81.63'),
(289, 9, '2012-12-18 14:29:41', '1.22.81.63'),
(290, 16, '2012-12-18 15:27:08', '182.73.76.94'),
(291, 16, '2012-12-19 03:37:14', '80.186.61.24'),
(292, 9, '2012-12-19 16:17:21', '1.22.81.238'),
(293, 9, '2012-12-19 17:48:58', '1.22.81.238'),
(294, 9, '2012-12-19 17:56:52', '1.22.81.238'),
(295, 9, '2012-12-19 18:27:41', '1.22.81.238'),
(296, 16, '2012-12-20 00:11:22', '87.16.76.121'),
(297, 9, '2012-12-20 09:49:25', '1.22.80.105'),
(298, 9, '2012-12-20 10:38:51', '1.22.80.105'),
(299, 9, '2012-12-20 15:38:28', '1.22.80.105'),
(300, 5, '2012-12-20 15:52:49', '1.22.80.105'),
(301, 9, '2012-12-20 15:59:59', '1.22.80.105'),
(302, 5, '2012-12-20 16:01:39', '1.22.80.105'),
(303, 5, '2012-12-20 17:06:11', '1.22.80.105'),
(304, 14, '2012-12-20 17:12:18', '1.22.80.105'),
(305, 9, '2012-12-20 17:27:11', '1.22.80.105'),
(306, 6, '2012-12-20 17:30:31', '1.22.80.105'),
(307, 6, '2012-12-20 17:44:11', '1.22.80.105'),
(308, 16, '2012-12-22 01:44:01', '50.74.71.125'),
(309, 16, '2012-12-22 01:53:07', '50.74.71.125'),
(310, 6, '2012-12-22 11:06:11', '101.0.59.236'),
(311, 6, '2012-12-22 11:12:31', '1.22.80.164'),
(312, 14, '2012-12-22 13:43:51', '101.0.59.236'),
(313, 9, '2012-12-22 13:44:38', '101.0.59.236'),
(314, 14, '2012-12-22 14:12:18', '101.0.59.236'),
(315, 6, '2012-12-22 14:16:12', '1.22.80.164'),
(316, 14, '2012-12-22 16:29:03', '101.0.59.236'),
(317, 16, '2012-12-23 16:40:09', '86.97.251.58'),
(318, 16, '2012-12-23 23:35:46', '87.16.76.121'),
(319, 9, '2012-12-24 09:53:12', '1.22.81.224'),
(320, 9, '2012-12-24 12:23:51', '210.89.56.250'),
(321, 9, '2012-12-24 14:25:49', '1.22.81.224'),
(322, 5, '2012-12-24 15:18:32', '1.22.81.224'),
(323, 22, '2012-12-24 15:24:02', '1.22.81.224'),
(324, 16, '2012-12-24 18:29:22', '175.142.43.93'),
(325, 16, '2012-12-24 19:57:18', '159.50.249.150'),
(326, 9, '2012-12-25 10:05:22', '1.22.83.244'),
(327, 16, '2012-12-25 19:10:04', '175.142.43.93'),
(328, 9, '2012-12-26 10:25:03', '1.22.81.249'),
(329, 16, '2012-12-26 15:36:07', '176.205.199.209'),
(330, 6, '2012-12-26 17:13:11', '1.22.81.249'),
(331, 16, '2012-12-26 20:21:12', '176.205.199.209'),
(332, 16, '2012-12-26 20:22:39', '176.205.199.209'),
(333, 16, '2012-12-27 04:34:55', '67.1.80.5'),
(334, 16, '2012-12-27 10:23:50', '96.41.70.165'),
(335, 16, '2012-12-27 22:36:40', '96.254.46.230'),
(336, 16, '2012-12-28 00:12:36', '87.152.25.35'),
(337, 6, '2012-12-28 03:20:45', '201.13.17.241'),
(338, 9, '2012-12-28 10:28:25', '1.22.81.237'),
(339, 9, '2012-12-28 11:31:13', '210.89.56.250'),
(340, 14, '2012-12-28 12:35:16', '210.89.56.250'),
(341, 14, '2012-12-28 13:16:37', '1.22.81.237'),
(342, 9, '2012-12-28 14:45:53', '1.22.81.237'),
(343, 14, '2012-12-28 14:48:16', '1.22.81.237'),
(344, 9, '2012-12-28 15:33:31', '1.22.81.237'),
(345, 14, '2012-12-28 15:51:57', '210.89.56.250'),
(346, 14, '2012-12-28 16:07:43', '1.22.81.237'),
(347, 14, '2012-12-28 16:11:51', '210.89.56.250'),
(348, 9, '2012-12-28 17:14:53', '210.89.56.250'),
(349, 16, '2012-12-29 04:44:03', '86.97.248.72'),
(350, 14, '2012-12-29 10:03:05', '101.0.59.126'),
(351, 9, '2012-12-29 10:21:05', '101.0.59.126'),
(352, 16, '2012-12-30 04:47:14', '86.97.248.72'),
(353, 16, '2012-12-31 08:11:56', '93.74.29.252'),
(354, 6, '2012-12-31 14:31:11', '1.22.81.219'),
(355, 9, '2012-12-31 14:37:38', '180.188.225.6'),
(356, 9, '2012-12-31 14:46:40', '180.188.225.6'),
(357, 9, '2012-12-31 14:52:05', '180.188.225.6'),
(358, 16, '2013-01-02 17:07:39', '85.237.224.44'),
(359, 6, '2013-01-03 01:09:49', '85.96.45.231'),
(360, 16, '2013-01-03 04:44:24', '79.180.175.109'),
(361, 16, '2013-01-03 08:54:21', '67.171.67.142'),
(362, 16, '2013-01-03 09:41:27', '67.171.67.142'),
(363, 16, '2013-01-03 10:39:10', '24.113.155.21'),
(364, 16, '2013-01-03 11:13:19', '1.22.83.138'),
(365, 16, '2013-01-03 11:16:18', '67.171.67.142'),
(366, 6, '2013-01-03 16:28:56', '1.22.83.138'),
(367, 14, '2013-01-03 17:24:53', '1.22.83.138'),
(368, 9, '2013-01-03 17:47:24', '180.188.225.12'),
(369, 6, '2013-01-04 10:30:55', '1.22.83.145'),
(370, 14, '2013-01-04 10:46:54', '1.22.83.145'),
(371, 16, '2013-01-04 11:32:15', '24.5.38.52'),
(372, 16, '2013-01-05 06:01:25', '37.160.58.178'),
(373, 6, '2013-01-05 19:49:20', '86.97.248.72'),
(374, 6, '2013-01-06 00:40:05', '86.97.248.72'),
(375, 6, '2013-01-06 00:40:14', '86.97.248.72'),
(376, 6, '2013-01-06 00:41:02', '86.97.248.72'),
(377, 6, '2013-01-06 00:51:37', '86.97.248.72'),
(378, 6, '2013-01-06 03:40:20', '86.97.248.72'),
(379, 16, '2013-01-07 03:25:04', '97.113.81.111'),
(380, 16, '2013-01-07 11:59:33', '108.226.92.67'),
(381, 6, '2013-01-07 15:14:26', '1.22.80.195'),
(382, 6, '2013-01-07 15:20:59', '1.22.80.195'),
(383, 23, '2013-01-07 15:34:22', '1.22.80.195'),
(384, 23, '2013-01-07 16:28:24', '1.22.80.195'),
(385, 23, '2013-01-07 16:47:26', '1.22.80.195'),
(386, 23, '2013-01-07 16:52:10', '1.22.80.195'),
(387, 16, '2013-01-08 12:56:33', '2.30.205.161'),
(388, 6, '2013-01-08 12:58:57', '1.22.80.249'),
(389, 6, '2013-01-08 13:01:24', '1.22.80.249'),
(390, 6, '2013-01-08 14:09:36', '1.22.80.249'),
(391, 6, '2013-01-08 14:26:41', '1.22.80.249'),
(392, 6, '2013-01-08 14:32:23', '1.22.80.249'),
(393, 6, '2013-01-08 14:43:50', '1.22.80.249'),
(394, 6, '2013-01-08 14:55:55', '1.22.80.249'),
(395, 14, '2013-01-09 15:28:18', '1.22.83.169'),
(396, 6, '2013-01-09 15:29:20', '1.22.83.169'),
(397, 6, '2013-01-09 17:48:29', '1.22.83.169'),
(398, 16, '2013-01-09 18:36:04', '92.232.145.139'),
(399, 16, '2013-01-09 23:39:40', '184.96.156.200'),
(400, 6, '2013-01-10 11:00:27', '101.0.59.113'),
(401, 16, '2013-01-10 11:12:33', '84.112.165.230'),
(402, 6, '2013-01-10 13:58:42', '210.89.56.250'),
(403, 16, '2013-01-11 00:45:58', '184.96.156.200'),
(404, 16, '2013-01-11 10:36:25', '184.96.156.200'),
(405, 14, '2013-01-11 10:42:37', '210.89.56.250'),
(406, 16, '2013-01-11 12:46:46', '68.56.252.126'),
(407, 16, '2013-01-11 16:17:13', '96.250.233.60'),
(408, 6, '2013-01-12 13:32:51', '1.22.81.203'),
(409, 6, '2013-01-12 15:44:22', '1.22.81.203'),
(410, 6, '2013-01-12 16:03:49', '1.22.81.203'),
(411, 6, '2013-01-12 16:39:00', '101.0.59.33'),
(412, 35, '2013-01-13 05:31:43', '174.76.19.71'),
(413, 16, '2013-01-13 16:47:21', '41.205.180.138'),
(414, 16, '2013-01-13 19:12:20', '79.85.148.92'),
(415, 36, '2013-01-14 17:50:13', '92.151.179.218'),
(416, 16, '2013-01-14 21:55:54', '46.120.14.213'),
(417, 16, '2013-01-15 19:24:41', '91.123.234.31'),
(418, 16, '2013-01-15 19:24:43', '91.123.234.31'),
(419, 16, '2013-01-16 11:29:39', '68.32.210.13'),
(420, 6, '2013-01-16 18:01:38', '1.22.81.214'),
(421, 37, '2013-01-17 00:50:43', '115.249.61.233'),
(422, 16, '2013-01-17 02:12:00', '31.4.134.214'),
(423, 37, '2013-01-17 23:13:11', '115.249.61.233'),
(424, 16, '2013-01-18 00:37:00', '177.99.137.215'),
(425, 16, '2013-01-18 07:23:45', '186.214.31.42'),
(426, 16, '2013-01-18 17:09:26', '82.14.253.68'),
(427, 16, '2013-01-19 03:15:05', '71.203.34.65'),
(428, 16, '2013-01-19 03:43:00', '82.132.221.233'),
(429, 16, '2013-01-20 01:09:00', '82.14.17.50'),
(430, 16, '2013-01-20 01:27:49', '117.103.175.10'),
(431, 16, '2013-01-20 03:17:02', '2.224.43.204'),
(432, 16, '2013-01-21 10:31:21', '122.166.228.75'),
(433, 6, '2013-01-21 13:27:57', '1.22.81.212'),
(434, 6, '2013-01-21 13:28:24', '1.22.81.212'),
(435, 14, '2013-01-21 13:30:14', '1.22.81.212'),
(436, 6, '2013-01-21 13:47:09', '1.22.81.212'),
(437, 6, '2013-01-21 14:10:26', '1.22.81.212'),
(438, 6, '2013-01-21 14:13:58', '1.22.81.212'),
(439, 6, '2013-01-21 14:14:25', '1.22.81.212'),
(440, 6, '2013-01-21 14:14:51', '1.22.81.212'),
(441, 16, '2013-01-21 16:02:52', '82.14.17.50'),
(442, 16, '2013-01-21 22:24:08', '91.216.181.44'),
(443, 16, '2013-01-22 03:04:36', '184.96.156.200'),
(444, 16, '2013-01-22 15:25:02', '82.14.17.50'),
(445, 16, '2013-01-22 21:43:04', '119.236.33.215'),
(446, 16, '2013-01-22 23:45:03', '121.182.36.71'),
(447, 38, '2013-01-23 09:11:42', '122.252.239.151'),
(448, 16, '2013-01-23 09:14:32', '122.252.239.151'),
(449, 16, '2013-01-23 11:55:41', '122.252.239.151'),
(450, 16, '2013-01-23 12:02:10', '122.252.239.151'),
(451, 16, '2013-01-23 12:51:01', '86.99.66.36'),
(452, 16, '2013-01-23 15:30:54', '95.225.8.28'),
(453, 16, '2013-01-23 15:37:08', '95.225.8.28'),
(454, 6, '2013-01-24 15:22:29', '1.22.80.207'),
(455, 6, '2013-01-25 09:12:03', '210.89.56.250'),
(456, 6, '2013-01-25 10:22:08', '210.89.56.250'),
(457, 6, '2013-01-25 10:51:52', '210.89.56.250'),
(458, 6, '2013-01-26 09:48:25', '210.89.56.250'),
(459, 16, '2013-01-26 10:25:43', '119.237.32.1'),
(460, 39, '2013-01-27 16:05:47', '121.182.36.247'),
(461, 16, '2013-01-27 16:07:43', '121.182.36.247'),
(462, 6, '2013-01-28 12:24:07', '1.22.83.188'),
(463, 40, '2013-01-28 14:21:54', '1.22.83.188'),
(464, 40, '2013-01-28 14:23:09', '1.22.83.188'),
(465, 6, '2013-01-28 18:03:45', '210.89.56.250'),
(466, 16, '2013-01-28 22:28:39', '120.88.228.229'),
(467, 6, '2013-01-29 05:50:56', '98.252.151.179'),
(468, 6, '2013-01-30 09:53:01', '1.22.82.205'),
(469, 6, '2013-01-30 14:47:18', '1.22.82.205'),
(470, 9, '2013-01-30 15:58:08', '1.22.82.205'),
(471, 9, '2013-01-30 16:07:53', '1.22.82.205'),
(472, 7, '2013-01-30 16:18:01', '1.22.82.205'),
(473, 7, '2013-01-30 16:19:13', '1.22.82.205'),
(474, 16, '2013-01-30 18:31:46', '79.85.122.246'),
(475, 6, '2013-01-31 09:30:41', '1.22.81.237'),
(476, 9, '2013-01-31 09:59:09', '1.22.81.237'),
(477, 10, '2013-01-31 12:46:34', '1.22.81.237'),
(478, 9, '2013-01-31 12:47:52', '1.22.81.237'),
(479, 6, '2013-01-31 20:43:31', '121.182.36.247'),
(480, 6, '2013-01-31 20:44:23', '121.182.36.247'),
(481, 16, '2013-02-01 08:05:35', '79.16.57.89'),
(482, 10, '2013-02-01 10:25:31', '210.89.56.250'),
(483, 10, '2013-02-01 11:28:46', '210.89.56.250'),
(484, 10, '2013-02-01 11:31:12', '210.89.56.250'),
(485, 16, '2013-02-02 03:53:47', '187.126.77.51'),
(486, 10, '2013-02-02 09:57:28', '1.22.82.197'),
(487, 16, '2013-02-02 10:39:14', '210.89.56.250'),
(488, 16, '2013-02-02 15:06:12', '210.89.56.250'),
(489, 14, '2013-02-02 15:13:48', '1.22.82.197'),
(490, 6, '2013-02-05 10:13:17', '1.22.83.148'),
(491, 6, '2013-02-05 16:50:51', '210.89.56.250'),
(492, 16, '2013-02-05 18:52:56', '203.80.103.161'),
(493, 16, '2013-02-05 19:23:10', '41.47.222.129'),
(494, 16, '2013-02-05 21:39:58', '72.92.55.126'),
(495, 39, '2013-02-06 09:39:47', '211.228.114.165'),
(496, 6, '2013-02-06 11:57:43', '1.22.81.251'),
(497, 6, '2013-02-06 11:59:26', '1.22.81.251'),
(498, 16, '2013-02-06 13:16:59', '203.80.103.161'),
(499, 16, '2013-02-07 10:33:55', '210.89.56.250'),
(500, 6, '2013-02-07 23:49:16', '67.204.186.19'),
(501, 16, '2013-02-08 04:59:13', '201.10.168.44'),
(502, 16, '2013-02-08 09:43:15', '180.188.225.35'),
(503, 16, '2013-02-08 12:40:54', '68.43.229.206'),
(504, 6, '2013-02-08 18:10:26', '1.22.81.247'),
(505, 6, '2013-02-08 18:13:21', '1.22.81.247'),
(506, 6, '2013-02-08 18:13:21', '1.22.81.247'),
(507, 16, '2013-02-09 11:31:09', '101.0.59.39'),
(508, 16, '2013-02-09 19:26:50', '2.25.31.45'),
(509, 16, '2013-02-09 19:39:54', '2.25.31.45'),
(510, 16, '2013-02-09 20:25:47', '2.25.31.45'),
(511, 16, '2013-02-10 10:55:42', '203.80.103.161'),
(512, 16, '2013-02-11 09:38:46', '210.89.56.250'),
(513, 6, '2013-02-11 16:25:06', '210.89.56.250'),
(514, 16, '2013-02-11 20:32:47', '79.85.194.26'),
(515, 16, '2013-02-12 10:02:33', '1.22.80.197'),
(516, 16, '2013-02-13 09:32:16', '210.89.56.250'),
(517, 40, '2013-02-13 10:43:24', '1.22.80.223'),
(518, 40, '2013-02-13 11:01:20', '1.22.80.223'),
(519, 40, '2013-02-13 13:31:56', '1.22.80.223'),
(520, 16, '2013-02-13 13:37:10', '1.22.80.223'),
(521, 16, '2013-02-14 04:07:32', '81.164.229.4'),
(522, 16, '2013-02-14 09:22:05', '210.89.56.250'),
(523, 6, '2013-02-14 09:39:50', '1.223.109.115'),
(524, 16, '2013-02-14 12:42:30', '99.33.84.246'),
(525, 16, '2013-02-14 14:46:33', '1.22.82.154'),
(526, 16, '2013-02-14 15:54:20', '213.147.127.26'),
(527, 16, '2013-02-14 20:04:21', '95.236.102.229'),
(528, 16, '2013-02-14 22:55:55', '203.80.103.161'),
(529, 16, '2013-02-15 08:15:25', '72.92.55.126'),
(530, 16, '2013-02-15 09:30:10', '210.89.56.250'),
(531, 16, '2013-02-15 17:28:44', '86.28.203.240'),
(532, 16, '2013-02-15 19:58:50', '79.144.228.147'),
(533, 16, '2013-02-16 06:47:51', '203.80.103.161'),
(534, 6, '2013-02-16 08:28:25', '121.55.143.38'),
(535, 16, '2013-02-16 09:32:16', '101.0.59.205'),
(536, 16, '2013-02-16 12:00:55', '1.22.81.237'),
(537, 6, '2013-02-17 19:06:48', '222.103.129.14'),
(538, 6, '2013-02-18 06:36:02', '1.223.109.115'),
(539, 16, '2013-02-18 09:36:31', '101.0.59.162'),
(540, 6, '2013-02-18 13:25:24', '1.223.109.115'),
(541, 6, '2013-02-18 13:26:24', '1.223.109.115'),
(542, 6, '2013-02-18 13:29:29', '1.223.109.115'),
(543, 5, '2013-02-18 14:31:19', '101.0.59.162'),
(544, 16, '2013-02-19 09:21:30', '101.0.59.221'),
(545, 6, '2013-02-19 15:25:47', '180.188.225.9'),
(546, 42, '2013-02-19 18:27:13', '77.169.39.211'),
(547, 16, '2013-02-20 09:26:22', '210.89.56.250'),
(548, 14, '2013-02-20 12:49:09', '1.22.81.226'),
(549, 6, '2013-02-20 15:50:40', '222.103.129.14'),
(550, 6, '2013-02-20 15:50:41', '222.103.129.14'),
(551, 6, '2013-02-20 16:03:37', '222.103.129.14'),
(552, 16, '2013-02-21 05:34:00', '46.238.166.132'),
(553, 16, '2013-02-21 07:20:41', '98.212.76.237'),
(554, 16, '2013-02-21 09:25:14', '210.89.56.250'),
(555, 16, '2013-02-21 11:49:27', '83.248.217.12'),
(556, 16, '2013-02-21 16:11:07', '182.72.62.190'),
(557, 16, '2013-02-21 23:27:21', '98.198.92.219'),
(558, 16, '2013-02-22 06:11:34', '2.31.16.163'),
(559, 40, '2013-02-22 09:25:10', '180.188.225.25'),
(560, 16, '2013-02-22 10:01:51', '180.188.225.25'),
(561, 16, '2013-02-23 00:30:35', '64.134.223.147'),
(562, 16, '2013-02-23 00:43:33', '83.82.21.125'),
(563, 43, '2013-02-23 07:03:51', '5.14.201.187'),
(564, 16, '2013-02-23 08:56:31', '210.89.56.250'),
(565, 16, '2013-02-24 11:47:13', '142.129.21.24'),
(566, 16, '2013-02-25 08:05:21', '101.171.85.75'),
(567, 16, '2013-02-25 09:24:58', '210.89.56.250'),
(568, 16, '2013-02-26 09:25:24', '210.89.56.250'),
(569, 16, '2013-02-26 10:11:09', '119.236.33.98'),
(570, 16, '2013-02-26 10:54:51', '119.236.33.98'),
(571, 6, '2013-02-26 14:13:12', '121.55.143.38'),
(572, 6, '2013-02-26 19:24:09', '222.103.129.14'),
(573, 16, '2013-02-27 10:29:17', '101.0.59.219'),
(574, 16, '2013-02-27 22:12:04', '78.134.121.126'),
(575, 16, '2013-02-28 03:43:12', '75.58.145.148'),
(576, 16, '2013-02-28 07:42:29', '89.148.39.136'),
(577, 16, '2013-02-28 09:17:31', '101.0.59.230'),
(578, 16, '2013-03-01 09:41:00', '101.0.59.96'),
(579, 16, '2013-03-02 01:30:06', '182.185.68.7'),
(580, 16, '2013-03-02 02:47:11', '79.85.149.161'),
(581, 16, '2013-03-02 07:54:03', '101.0.59.66'),
(582, 16, '2013-03-02 08:34:37', '121.222.212.55'),
(583, 16, '2013-03-02 23:53:53', '207.244.167.225'),
(584, 16, '2013-03-03 00:26:56', '46.150.192.228'),
(585, 16, '2013-03-04 02:46:15', '207.244.167.225'),
(586, 16, '2013-03-04 10:37:24', '210.89.56.250'),
(587, 14, '2013-03-04 20:51:44', '210.89.56.250'),
(588, 16, '2013-03-05 04:47:48', '67.85.189.8'),
(589, 16, '2013-03-05 09:11:59', '210.89.56.250'),
(590, 16, '2013-03-06 00:30:50', '184.99.245.121'),
(591, 16, '2013-03-06 09:41:07', '101.0.59.158'),
(592, 16, '2013-03-07 01:55:57', '109.51.48.112'),
(593, 16, '2013-03-07 09:17:59', '1.22.83.147'),
(594, 16, '2013-03-08 09:12:07', '1.22.83.152'),
(595, 44, '2013-03-09 04:14:56', '92.97.234.170'),
(596, 16, '2013-03-09 09:09:51', '210.89.56.250'),
(597, 16, '2013-03-09 17:35:58', '174.140.171.21'),
(598, 16, '2013-03-10 02:17:53', '212.201.44.244'),
(599, 16, '2013-03-10 21:19:17', '123.236.86.136'),
(600, 16, '2013-03-11 10:58:04', '1.22.81.247'),
(601, 16, '2013-03-11 16:58:39', '182.72.136.170'),
(602, 16, '2013-03-11 18:59:11', '219.77.125.158'),
(603, 16, '2013-03-12 00:27:11', '109.17.171.12'),
(604, 16, '2013-03-12 09:21:57', '101.0.59.138'),
(605, 45, '2013-03-12 22:51:10', '87.2.98.185'),
(606, 16, '2013-03-13 09:21:02', '101.0.59.179'),
(607, 45, '2013-03-13 14:36:01', '87.2.98.185'),
(608, 16, '2013-03-13 14:38:14', '87.2.98.185'),
(609, 16, '2013-03-13 16:59:07', '219.91.232.222'),
(610, 16, '2013-03-13 18:52:06', '78.134.22.220'),
(611, 16, '2013-03-14 05:43:42', '88.121.252.248'),
(612, 16, '2013-03-14 06:56:53', '97.100.29.45'),
(613, 16, '2013-03-14 20:39:35', '164.215.31.28'),
(614, 16, '2013-03-15 09:34:35', '210.89.56.250'),
(615, 16, '2013-03-16 08:44:46', '210.89.56.250'),
(616, 16, '2013-03-16 17:29:33', '1.36.49.69'),
(617, 16, '2013-03-16 20:53:26', '80.43.184.78'),
(618, 16, '2013-03-16 23:10:36', '81.149.72.112'),
(619, 16, '2013-03-18 09:57:20', '210.89.56.250'),
(620, 16, '2013-03-18 21:39:22', '2.28.138.242'),
(621, 47, '2013-03-18 21:44:32', '92.64.88.54'),
(622, 16, '2013-03-19 05:38:09', '95.23.239.246'),
(623, 16, '2013-03-19 09:09:29', '210.89.56.250'),
(624, 47, '2013-03-19 23:38:59', '77.163.67.64'),
(625, 16, '2013-03-20 09:02:01', '1.22.81.192'),
(626, 16, '2013-03-21 00:37:03', '87.16.117.119'),
(627, 16, '2013-03-21 05:54:52', '212.66.74.132'),
(628, 16, '2013-03-21 09:24:09', '1.22.82.248'),
(629, 16, '2013-03-22 09:35:20', '1.22.83.240'),
(630, 16, '2013-03-22 10:42:26', '101.0.59.60'),
(631, 9, '2013-03-22 10:44:16', '101.0.59.60'),
(632, 16, '2013-03-22 11:17:15', '1.22.83.240'),
(633, 16, '2013-03-22 11:19:59', '1.22.83.240'),
(634, 5, '2013-03-22 16:31:41', '101.0.59.60'),
(635, 48, '2013-03-22 18:22:29', '101.0.59.60'),
(636, 48, '2013-03-30 10:03:38', '180.188.225.45'),
(637, 22, '2013-04-02 11:56:46', '210.89.56.250'),
(638, 16, '2013-06-06 15:50:55', '210.89.56.198'),
(639, 40, '2013-06-06 15:56:54', '210.89.56.198'),
(640, 5, '2013-06-17 15:02:08', '210.89.56.198');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE IF NOT EXISTS `user_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_alert` tinyint(1) NOT NULL,
  `add_fund` tinyint(1) NOT NULL,
  `project_alert` tinyint(1) NOT NULL,
  `comment_alert` tinyint(1) NOT NULL,
  `follow_back` tinyint(1) NOT NULL,
  `followers` tinyint(1) NOT NULL,
  `news_letter` tinyint(1) NOT NULL,
  `update` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `user_id`, `user_alert`, `add_fund`, `project_alert`, `comment_alert`, `follow_back`, `followers`, `news_letter`, `update`) VALUES
(1, 6, 0, 1, 0, 1, 1, 1, 1, 1),
(2, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 9, 0, 1, 0, 1, 1, 1, 1, 1),
(4, 10, 1, 1, 1, 1, 1, 1, 1, 1),
(8, 14, 0, 1, 0, 1, 1, 1, 1, 1),
(10, 16, 1, 1, 1, 1, 1, 1, 1, 1),
(12, 18, 1, 1, 1, 1, 1, 1, 1, 1),
(14, 20, 1, 1, 1, 1, 1, 1, 1, 1),
(16, 22, 0, 0, 0, 1, 1, 1, 1, 1),
(17, 23, 1, 1, 1, 1, 1, 1, 1, 1),
(18, 24, 1, 1, 1, 1, 1, 1, 1, 1),
(19, 25, 1, 1, 1, 1, 1, 1, 1, 1),
(20, 26, 1, 1, 1, 1, 1, 1, 1, 1),
(21, 27, 1, 1, 1, 1, 1, 1, 1, 1),
(22, 28, 1, 1, 1, 1, 1, 1, 1, 1),
(23, 29, 1, 1, 1, 1, 1, 1, 1, 1),
(24, 30, 1, 1, 1, 1, 1, 1, 1, 1),
(25, 31, 1, 1, 1, 1, 1, 1, 1, 1),
(26, 32, 1, 1, 1, 1, 1, 1, 1, 1),
(27, 33, 1, 1, 1, 1, 1, 1, 1, 1),
(28, 34, 1, 1, 1, 1, 1, 1, 1, 1),
(29, 35, 1, 1, 1, 1, 1, 1, 1, 1),
(30, 36, 1, 1, 1, 1, 1, 1, 1, 1),
(31, 37, 1, 1, 1, 1, 1, 1, 1, 1),
(32, 38, 1, 1, 1, 1, 1, 1, 1, 1),
(33, 39, 1, 1, 1, 1, 1, 1, 1, 1),
(34, 40, 1, 1, 1, 1, 1, 1, 1, 1),
(35, 41, 1, 1, 1, 1, 1, 1, 1, 1),
(36, 42, 1, 1, 1, 1, 1, 1, 1, 1),
(37, 43, 1, 1, 1, 1, 1, 1, 1, 1),
(38, 44, 1, 1, 1, 1, 1, 1, 1, 1),
(39, 45, 1, 1, 1, 1, 1, 1, 1, 1),
(40, 46, 1, 1, 1, 1, 1, 1, 1, 1),
(41, 47, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_setting`
--

CREATE TABLE IF NOT EXISTS `user_setting` (
  `user_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_with` varchar(255) DEFAULT NULL,
  `admin_activation` varchar(255) DEFAULT NULL,
  `email_varification` varchar(255) DEFAULT NULL,
  `auto_login` varchar(255) DEFAULT NULL,
  `notification_mail` varchar(255) DEFAULT NULL,
  `welcome_mail` varchar(255) DEFAULT NULL,
  `password_change_logout` varchar(255) DEFAULT NULL,
  `enable_openid` varchar(255) DEFAULT NULL,
  `user_switch_language` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_setting`
--

INSERT INTO `user_setting` (`user_setting_id`, `login_with`, `admin_activation`, `email_varification`, `auto_login`, `notification_mail`, `welcome_mail`, `password_change_logout`, `enable_openid`, `user_switch_language`) VALUES
(1, 'b', 'b', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_website`
--

CREATE TABLE IF NOT EXISTS `user_website` (
  `website_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `website_name` varchar(225) NOT NULL,
  PRIMARY KEY (`website_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_website`
--

INSERT INTO `user_website` (`website_id`, `user_id`, `website_name`) VALUES
(4, 6, 'www.kickstarterclone.com'),
(9, 6, 'gdsgdgds'),
(15, 18, 'http://clonesites.com/kickstarter/'),
(16, 18, 'http://clonesites.com/kickstarter/'),
(17, 21, ''),
(28, 16, 'http://www.bangfriends.com');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `debit` varchar(200) DEFAULT NULL,
  `credit` varchar(200) DEFAULT NULL,
  `user_id` int(50) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `detail` text,
  `admin_status` varchar(100) DEFAULT NULL,
  `wallet_date` datetime NOT NULL,
  `wallet_transaction_id` varchar(255) DEFAULT NULL,
  `wallet_payee_email` varchar(255) DEFAULT NULL,
  `wallet_ip` varchar(255) DEFAULT NULL,
  `gateway_id` int(10) NOT NULL,
  `project_id` int(100) NOT NULL,
  `donate_status` tinyint(1) NOT NULL,
  `reason` longtext,
  `wallet_anonymous` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `debit`, `credit`, `user_id`, `status`, `detail`, `admin_status`, `wallet_date`, `wallet_transaction_id`, `wallet_payee_email`, `wallet_ip`, `gateway_id`, `project_id`, `donate_status`, `reason`, `wallet_anonymous`) VALUES
(1, '50', NULL, 5, NULL, NULL, 'Confirm', '0000-00-00 00:00:00', 'Admin', 'Internal', '219.91.232.222', 0, 0, 1, 'klk', 0),
(2, NULL, '10', 5, NULL, NULL, 'Confirm', '0000-00-00 00:00:00', 'Admin', 'Internal', '219.91.232.222', 0, 0, 1, 'bnb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_bank`
--

CREATE TABLE IF NOT EXISTS `wallet_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `withdraw_id` int(11) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `bank_city` varchar(255) DEFAULT NULL,
  `bank_state` varchar(255) DEFAULT NULL,
  `bank_country` varchar(255) DEFAULT NULL,
  `bank_zipcode` varchar(255) DEFAULT NULL,
  `bank_unique_id` varchar(255) DEFAULT NULL,
  `bank_account_holder_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_withdraw_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_setting`
--

CREATE TABLE IF NOT EXISTS `wallet_setting` (
  `wallet_id` int(10) NOT NULL AUTO_INCREMENT,
  `wallet_add_fees` double(10,2) NOT NULL,
  `wallet_enable` int(10) NOT NULL,
  `wallet_donation_fees` double(10,2) NOT NULL,
  `wallet_minimum_amount` double(10,2) NOT NULL,
  `wallet_payment_type` tinyint(1) NOT NULL COMMENT 'instant = 0 ,preapprove =1',
  PRIMARY KEY (`wallet_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wallet_setting`
--

INSERT INTO `wallet_setting` (`wallet_id`, `wallet_add_fees`, `wallet_enable`, `wallet_donation_fees`, `wallet_minimum_amount`, `wallet_payment_type`) VALUES
(1, 3.00, 0, 4.00, 20.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_withdraw`
--

CREATE TABLE IF NOT EXISTS `wallet_withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `withdraw_date` datetime NOT NULL,
  `withdraw_ip` varchar(255) DEFAULT NULL,
  `withdraw_method` varchar(50) DEFAULT NULL,
  `withdraw_amount` double(10,2) NOT NULL,
  `withdraw_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_withdraw_gateway`
--

CREATE TABLE IF NOT EXISTS `wallet_withdraw_gateway` (
  `gateway_withdraw_id` int(100) NOT NULL AUTO_INCREMENT,
  `withdraw_id` int(100) NOT NULL,
  `gateway_name` varchar(255) DEFAULT NULL,
  `gateway_account` varchar(255) DEFAULT NULL,
  `gateway_city` varchar(255) DEFAULT NULL,
  `gateway_state` varchar(255) DEFAULT NULL,
  `gateway_country` varchar(255) DEFAULT NULL,
  `gateway_zip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gateway_withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `word_detecter_setting`
--

CREATE TABLE IF NOT EXISTS `word_detecter_setting` (
  `word_detecter_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `enable_word_detecter` varchar(255) DEFAULT NULL,
  `words` text,
  PRIMARY KEY (`word_detecter_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `word_detecter_setting`
--

INSERT INTO `word_detecter_setting` (`word_detecter_setting_id`, `enable_word_detecter`, `words`) VALUES
(1, 'yes', 'bomb');

-- --------------------------------------------------------

--
-- Table structure for table `yahoo_setting`
--

CREATE TABLE IF NOT EXISTS `yahoo_setting` (
  `yahoo_setting_id` int(50) NOT NULL AUTO_INCREMENT,
  `consumer_key` varchar(255) DEFAULT NULL,
  `consumer_secret` varchar(255) DEFAULT NULL,
  `yahoo_enable` int(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`yahoo_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `yahoo_setting`
--

INSERT INTO `yahoo_setting` (`yahoo_setting_id`, `consumer_key`, `consumer_secret`, `yahoo_enable`) VALUES
(1, 'dj0yJmk9bGRQWWxUVmJOUFlBJmQ9WVdrOWIzQTBWRVpKTjJrbWNHbzlOalkxTVRjMU9EWXkmcz1jb25zdW1lcnNlY3JldCZ4PWYy', '9f281bfe9e38eef7c266d16931380c1745e0e859', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
