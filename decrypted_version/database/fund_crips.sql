-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2012 at 11:30 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fund_crips`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_type` int(10) NOT NULL DEFAULT '2',
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `admin_type`, `company`, `email`, `active`, `date_added`, `login_ip`) VALUES
(1, 'admin', 'admin', 1, 'Rockers Technology', 'jigar.rockersinfo@gmail.com', '1', '2012-05-02', '1.22.81.39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `login_id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_id` int(100) NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  `login_date` datetime NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`login_id`, `admin_id`, `login_ip`, `login_date`) VALUES
(1, 1, '127.0.0.1', '2012-09-14 10:14:49'),
(2, 1, '127.0.0.1', '2012-09-17 10:22:02'),
(3, 1, '127.0.0.1', '2012-09-17 18:24:55'),
(4, 1, '127.0.0.1', '2012-09-18 18:06:47'),
(5, 1, '127.0.0.1', '2012-09-19 16:51:28'),
(6, 1, '127.0.0.1', '2012-09-20 12:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_commission_settings`
--

CREATE TABLE IF NOT EXISTS `affiliate_commission_settings` (
  `commission_settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`commission_settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `fee_type` varchar(255) NOT NULL DEFAULT 'amount',
  `affiliate_enable` int(20) NOT NULL DEFAULT '1',
  `affiliate_content` longtext,
  PRIMARY KEY (`common_settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `site_category` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_description` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `why_affiliate` varchar(255) NOT NULL,
  `web_site_marketing` int(50) DEFAULT NULL,
  `search_engine_marketing` int(50) DEFAULT NULL,
  `email_marketing` int(50) DEFAULT NULL,
  `special_promotional_method` varchar(255) NOT NULL,
  `special_promotional_description` varchar(255) NOT NULL,
  `approved` int(50) NOT NULL DEFAULT '0' COMMENT '0=waiting,1=approved,2=rejected',
  `request_date` datetime NOT NULL,
  `request_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`affiliate_request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `affiliate_request`
--

INSERT INTO `affiliate_request` (`affiliate_request_id`, `user_id`, `site_category`, `site_name`, `site_description`, `site_url`, `why_affiliate`, `web_site_marketing`, `search_engine_marketing`, `email_marketing`, `special_promotional_method`, `special_promotional_description`, `approved`, `request_date`, `request_ip`) VALUES
(1, 2, '11', 'rockers', 'dfkd', 'http://www.rockersinfo.com', 'kfdkfdfd', 0, 1, 1, '', '', 1, '2012-09-18 18:08:51', '127.0.0.1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `affiliate_user_earn`
--

INSERT INTO `affiliate_user_earn` (`user_earn_id`, `user_id`, `project_id`, `perk_id`, `referral_user_id`, `transaction_id`, `earn_amount`, `earn_date`, `earn_status`) VALUES
(1, 2, 2, 0, NULL, 2, 0.60, '2012-09-18 18:07:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_withdraw_request`
--

CREATE TABLE IF NOT EXISTS `affiliate_withdraw_request` (
  `affiliate_withdraw_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `withdraw_amount` double(10,2) NOT NULL,
  `withdraw_date` datetime NOT NULL,
  `withdraw_ip` varchar(255) NOT NULL,
  `withdraw_status` int(50) NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved,2=success,3=reject,4=fail',
  PRIMARY KEY (`affiliate_withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `affiliate_withdraw_request`
--


-- --------------------------------------------------------

--
-- Table structure for table `amazon`
--

CREATE TABLE IF NOT EXISTS `amazon` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `site_status` varchar(25) NOT NULL,
  `aws_access_key_id` varchar(255) NOT NULL,
  `aws_secret_access_key` varchar(255) NOT NULL,
  `variable_fees` double(10,2) NOT NULL,
  `fixed_fees` double(10,2) NOT NULL,
  `preapproval` int(2) NOT NULL COMMENT 'instant = 0,preapprove =1',
  `gateway_status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `amazon`
--

INSERT INTO `amazon` (`id`, `site_status`, `aws_access_key_id`, `aws_secret_access_key`, `variable_fees`, `fixed_fees`, `preapproval`, `gateway_status`) VALUES
(1, 'sand box', 'AKIAJHRGJTWJ6TZAYFRA', 'mGEiblOo7xnZYOPlWHnmoo3/p5MRhicQBFm4CZ/X', 5.00, 5.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `state_id`, `city_name`, `active`) VALUES
(1, 2, 11, 'Vadodara', '0'),
(2, 1, 9, 'San Jose', '1'),
(3, 1, 9, 'Milpitus', '1'),
(4, 1, 9, 'San Diago', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `comment_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `project_id`, `user_id`, `username`, `email`, `photo`, `comments`, `status`, `date_added`, `comment_ip`) VALUES
(1, 1, 2, '', '', '', 'dxdsd dsdsdsdsd', '0', '2012-09-20 11:16:01', '127.0.0.1'),
(2, 2, 1, '', '', '', 'sds ds ds ds sd s ds sd', '1', '2012-09-20 11:17:19', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  `fips` varchar(255) NOT NULL,
  `iso2` varchar(255) NOT NULL,
  `iso3` varchar(255) NOT NULL,
  `ison` varchar(255) NOT NULL,
  `internet` varchar(255) NOT NULL,
  `capital` varchar(255) NOT NULL,
  `map_ref` varchar(255) NOT NULL,
  `singular` varchar(255) NOT NULL,
  `plural` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `population` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

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
(208, 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cronjob`
--

CREATE TABLE IF NOT EXISTS `cronjob` (
  `cronjob_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cronjob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_run` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`cronjob_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cronjob`
--


-- --------------------------------------------------------

--
-- Table structure for table `crons`
--

CREATE TABLE IF NOT EXISTS `crons` (
  `crons_id` int(11) NOT NULL AUTO_INCREMENT,
  `cron_function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cron_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`crons_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `crons`
--

INSERT INTO `crons` (`crons_id`, `cron_function`, `cron_title`) VALUES
(1, 'set_auto_ending', 'Preapprove the Ended Project'),
(2, 'affiliate_update_earn_status', 'Affiliate Update Earn Status');

-- --------------------------------------------------------

--
-- Table structure for table `currency_code`
--

CREATE TABLE IF NOT EXISTS `currency_code` (
  `currency_code_id` int(50) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `currency_symbol` varchar(50) NOT NULL,
  PRIMARY KEY (`currency_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
  `mailer` varchar(50) NOT NULL,
  `sendmail_path` varchar(255) NOT NULL,
  `smtp_port` varchar(50) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_email` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`email_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `task` varchar(255) NOT NULL,
  `from_address` varchar(255) NOT NULL,
  `reply_address` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_template_id`, `task`, `from_address`, `reply_address`, `subject`, `message`) VALUES
(1, 'Welcome Email', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Welcome to FundraisingScript', 'Hello {user_name},{break}{break}\n\n{user_name} welcome to FundraisingScript. Your account is activated successfully. \n\n{break}\n\nFundraisingscript Team\nThank You.'),
(2, 'New User Join', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Sign up successfully on Fundraisingscript', 'Hello {user_name},\n{break}\nYou have successfully sign up with Fundraisingscript.{break}\nYour Email Address {email} and Password is {password}.{break}\nNow you can activate your account  from {login_link}.\n\n{break}{break}\n\nFundraisingscript Team{break}\nThank You.'),
(3, 'Forgot Password', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Forgot Password Request, Fundraisingscript', 'Hello {user_name},\n\nYour request has been submitted to Fundraisingscript.{break}\nYour Email Address {email} and Password is {password}.{break}\nNow you can take login from {login_link}.\n\n{break}\n\nFundraisingscript Team{break}\nThank You.'),
(4, 'Admin User Active', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Your Account Activated, Fundraisingscript', 'Hello {user_name},\n\nYour account has been activated by Administrator.{break}\nYour Email Address {email} and Password is {password}.{break}\nNow you can take login from {login_link}.\n\n{break}\n\nFundraisingscript Team\nThank You.'),
(5, 'Admin User Deactivate', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Your Account Deactivated, Fundraisingscript', 'Hello {user_name},\n\nYour account has been deactivated by Administrator.{break}\n\nFundraisingscript Team\nThank You.'),
(6, 'Admin User Delete', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Your Account Delete, Fundraisingscript', 'Hello {user_name},\n\nYour account has been deleted by Administrator.{break}\n\nFundraisingscript Team\nThank You.'),
(7, 'Contact Us', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Inquiry from Fundraisingscript', 'Hello Administrator,{break}\n\n\nyou have new inquiry by {name},{email}.{break}\n\nMessage : {message}.{break}{break}\n\n\nSystem Administrator{break}\nThank You.\n'),
(8, 'New Project Successful Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Project Successfully submitted', 'Hello {user_name},{break}\n\nYou have successfully submitted New Project {project_name}.{break}\nYou can see the project page from the following link : {break}{project_page_link}.\n{break}{break}\n\nFundraisingscript Team{break}\n\nThank You.'),
(9, 'Admin Project Activate Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Project activated by administrator, Fundraisingscript', 'Hello {user_name},\n\nProject {project_name} has been approved by administrator.\nYou can see the project page from the following link : {project_page_link}.\n{break}\nPlease configure your paypal email address otherwise no one can give you a donation on this project.\n{break}\n\nFundraisingscript Team\n\nThank You.'),
(10, 'Admin Project Inctivate Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Project deactivated by administrator, Fundraisingscript', 'Hello {user_name},\n\nProject {project_name} has been declined by administrator.\n{break}\nFundraisingscript Team\n\nThank You.'),
(11, 'Admin Project Delete Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Project deleted by administrator, Fundraisingscript', 'Hello {user_name},{break}{break}\n\nProject {project_name} has been deleted by administrator.\n{break}\nFundraisingscript Team{break}\n\nThank You.'),
(12, 'New Comment Admin Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Comment posted on project, Funraisingscript', 'Hello Administrator,\n\nNew comment posted by {comment_user_name} on Project {project_name}.\n{break}\nComment : {comment} \n{break}\nComment Profile Link : {comment_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(13, 'New Comment Owner Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Comment posted on your project, Funraisingscript', 'Hello {user_name},\n\nNew comment posted by {comment_user_name} on Project {project_name}.\n{break}\nComment : {comment} \n{break}\nComment Profile Link : {comment_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(14, 'New Comment Poster Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Comment posted on project, Funraisingscript', 'Hello {user_name},\n\nNew comment posted by {comment_user_name} on Project {project_name}.\n{break}\nComment : {comment} \n{break}\nComment Profile Link : {comment_user_profile_link}\n{break}\nFundraisingscript Team\n\nThank You.'),
(15, 'New Fund Admin Notification', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Fund Added on project, Fundraisingscript', 'Hello Administrator,{break}\n\nNew Fund({donote_amount}) added on the {project_name} {project_page_link} by {donor_name} {donor_profile_link}.\n\n{break}\nSystem Administrator\nThank You.'),
(16, 'New Fund Owner Notification', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Fund Added on project, Fundraisingscript', 'Hello {user_name},{break}\n\nNew Fund({donote_amount}) added on the {project_name} {project_page_link} by {donor_name} {donor_profile_link}.\n\n{break}\nFundraisingscript Team\nThank You.'),
(17, 'New Fund Donor Notification', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Fund Added on project, Fundraisingscript', 'Hello {donor_name},{break}\n\nNew Fund({donote_amount}) added on the {project_name} {project_page_link}.\n\n{break}\nFundraisingscript Team\nThank You.'),
(18, 'New Project Draft Successful Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Project Saved In Draft Successfully', 'Hello {user_name},\r\n\r\nYou have successfully Saved your project {project_name}, not submitted.{break}\r\nYou can view your project page using the following link : {project_page_link}.\r\n\r\n\r\nThank you\r\nFundraisingScript Team'),
(19, 'New Project Post Admin Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Project Post on FundraisingScript', 'Hello Administrator,{break}\n\nNew Project {project_name} {project_page_link} by User {user_name} {user_profile_link}{break}{break}\n\nFundraisingscript Team{break}\nThank You.'),
(20, 'Project Finish Admin Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Project Finish Alert', 'Hello Administrator,\r\n{break}{break}\r\nProject : {project_name}{project_page_link}.\r\n{break}{break}\r\nSummary : {project_summary}\r\n{break}{break}\r\nCreator : {user_name}{user_profile_link}\r\n{break}{break}\r\nGoal : {project_goal}.{break}{break}\r\nRaise : {project_total_raise}.{break}{break}\r\n\r\nBackers : {break}\r\n{backer_list}{break}{break}\r\n\r\nFundraisingScript Team,\r\nThank You\r\n'),
(21, 'Project Finish Owner Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Project Finish Alert', 'Hello {user_name},\r\n{break}{break}\r\nProject : {project_name}{project_page_link}.\r\n{break}{break}\r\nSummary : {project_summary}\r\n{break}{break}\r\nCreator : {user_name}{user_profile_link}\r\n{break}{break}\r\nGoal : {project_goal}.{break}{break}\r\nRaise : {project_total_raise}.{break}{break}\r\n\r\nBackers : {break}\r\n{backer_list}{break}{break}\r\n\r\nFundraisingScript Team,\r\nThank You\r\n'),
(22, 'Project Finish Donor Alert', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Project Finish Alert', 'Hello {donor_name},\r\n{break}{break}\r\nProject : {project_name}{project_page_link}.\r\n{break}{break}\r\nSummary : {project_summary}\r\n{break}{break}\r\nCreator : {user_name}{user_profile_link}\r\n{break}{break}\r\nGoal : {project_goal}.{break}{break}\r\nRaise : {project_total_raise}.{break}{break}\r\n\r\nBackers : {break}\r\n{own_backer}{break}{break}\r\n\r\nFundraisingScript Team,\r\nThank You\r\n'),
(23, 'Change Password', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Change Password Request, Fundraisingscript', 'Hello {user_name},{break}\n\nYour request has been submitted to Fundraisingscript.{break}\nYour Password is updated successfully. New login details are as below: {break}\nEmail Address: {email} {break}Password: {password}.{break}\n{break}\n{break}\n\nFundraisingscript Team{break}\nThank You.'),
(24, 'Donation Cancel User Notification', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Fund cancelled on Project', 'Hello {user_name},{break}\n\nFund of ({donote_amount}) on the {project_name} {project_page_link} by {donor_name} {donor_profile_link} is cancelled.\n\n\n{break}\nFundraisingscript Team{break}\nThank You.'),
(25, 'Donation Cancel Donor Notification', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Fund cancelled on Project', 'Hello {donor_name},{break}\n\nFund of ({donote_amount}) on the {project_name} {project_page_link} is cancelled.\n\n\n{break}\nFundraisingscript Team{break}\nThank You.'),
(26, 'Donation Cancel Admin Notification', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Fund cancelled on Project', 'Hello Administrator,{break}\n\nFund of ({donote_amount}) on the {project_name} {project_page_link} by {donor_name} {donor_profile_link} is cancelled.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(27, 'Project Cancelled Admin Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project cancelled on Fundraising Script', 'Hello Administrator,{break}\n\nThe {project_name} {project_page_link}  is cancelled as its end date is reached and it is not successful.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(28, 'Project Cancelled User Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project cancelled on Fundraising Script', 'Hello {user_name},{break}\n\nThe {project_name} {project_page_link}  is cancelled as its end date is reached and it is not successful.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(29, 'Project Successful Admin Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project successful on Fundraising Script', 'Hello Administrator,{break}\n\nThe {project_name} {project_page_link}  is successful as its end date is reached and it has achieved the successful goal amount.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(30, 'Project Successful User Notification', 'nishesh.jambudi@gmail.com', 'nishesh.jambudi@gmail.com', 'Project successful on Fundraising Script', 'Hello {user_name},{break}\n\nThe {project_name} {project_page_link}  is successful as its end date is reached and it has achieved the successful goal amount.\n\n{break}\nSystem Administrator{break}\nThank You.'),
(31, 'Wallet Withdraw Request', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'New Wallet Withdraw Request', 'Hello Administrator,{break}\n\nyou have new withdraw request by {name}.{break}\nThe details are as below : {break}\n{details}{break}{break}\n\nSystem Administrator{break}\nThank You.\n\n'),
(32, 'project new updates', 'sanjay.rockersinfo@gmail.com', 'sanjay.rockersinfo@gmail.com', '(project_name) project new updates', 'Hello {user_name}\n{break}\n    New updates from your donate project {break}\n\n    updates:{project_update}{break}\n\n{break}\nSystem Administrator{break}\nThank You.'),
(33, 'Email Invitation', 'anita.rockersinfo@gmail.com', 'anita.rockersinfo@gmail.com', 'Join me on Fundraising Script', 'Hi,{break}\r\n\r\n{login_user_name} has been using Fundraising Script, a place to discover, donate and post or share campaigns, and wants you to join and {invitation_link}start funding{end_invitation_link}.{break}{break} {invitation_link}Accept Invite{end_invitation_link}{break}{break}\r\n\r\n{message}{break}\r\n\r\nFundraisingscript Team{break}\r\n\r\nThank You.'),
(34, 'New Message(admin)', 'mihir.test.rockersinfo@gmail.com', 'mihir.test.rockersinfo@gmail.com', '{project_title}', 'Hello Administrator,\r\n\r\nNew message from\r\n{message_user_name} on Project {project_name}.\r\n{break}\r\nProject Link : {project_link}\r\n{break}\r\nContent : {content} \r\n{break}\r\nProfile Link : {message_user_profile_link}\r\n{break}\r\nFundraisingscript Team\r\n\r\nThank You.'),
(35, 'New Message(user)', 'mihir.test.rockersinfo@gmail.com', 'mihir.test.rockersinfo@gmail.com', 'New Message', 'Hello {user_name},{break}\r\n\r\nNew message from\r\n{message_user_name} on Project {project_name}.\r\n{break}\r\nProject Link : {project_link}\r\n{break}\r\nContent : {content} \r\n{break}\r\nProfile Link : {message_user_profile_link}\r\n{break}\r\nFundraisingscript Team\r\n\r\nThank You.'),
(36, 'Message user profile(Admin)', 'mihir.test.rockersinfo@gmail.com', 'mihir.test.rockersinfo@gmail.com', 'New Message', 'Hello {user_name},{break}\r\n\r\nNew message from\r\n{message_user_name} {break} \r\n\r\n\r\nContent : {content} \r\n{break}\r\nProfile Link : {message_user_profile_link}\r\n{break}\r\nFundraisingscript Team\r\n\r\nThank You.'),
(37, 'Message user profile(User)', 'mihir.test.rockersinfo@gmail.com', 'mihir.test.rockersinfo@gmail.com', 'New Message', 'Hello {user_name},{break}\r\n\r\nNew message from\r\n{message_user_name} {break} \r\n\r\n\r\nContent : {content} \r\n{break}\r\nProfile Link : {message_user_profile_link}\r\n{break}\r\nFundraisingscript Team\r\n\r\nThank You.');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_setting`
--

CREATE TABLE IF NOT EXISTS `facebook_setting` (
  `facebook_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_application_id` varchar(255) NOT NULL,
  `facebook_login_enable` varchar(255) NOT NULL,
  `facebook_access_token` varchar(255) NOT NULL,
  `facebook_api_key` varchar(255) NOT NULL,
  `facebook_user_id` varchar(255) NOT NULL,
  `facebook_secret_key` varchar(255) NOT NULL,
  `facebook_user_autopost` varchar(255) NOT NULL,
  `facebook_wall_post` varchar(255) NOT NULL,
  `facebook_url` text NOT NULL,
  PRIMARY KEY (`facebook_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `facebook_setting`
--

INSERT INTO `facebook_setting` (`facebook_setting_id`, `facebook_application_id`, `facebook_login_enable`, `facebook_access_token`, `facebook_api_key`, `facebook_user_id`, `facebook_secret_key`, `facebook_user_autopost`, `facebook_wall_post`, `facebook_url`) VALUES
(1, '138613629542180', '1', '0', '138613629542180', '0', 'dc59c270c78204da50c1f6e5ec7da087', '0', '0', 'http://www.facebook.com/pages/fundraisingscriptcom/187170521330689');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `faq_order` int(10) NOT NULL,
  `faq_home` int(10) NOT NULL DEFAULT '0',
  `active` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_category_id`, `question`, `answer`, `faq_order`, `faq_home`, `active`, `date_added`) VALUES
(2, 6, 'What is FundraisingScript?', '<p>FundraisingScript is a new way to fund creative projects.</p>\n<p>We believe that:</p>\n<p>&bull; A good idea, communicated well, can spread fast and wide.</p>\n<p>&bull; A large group of people can be a tremendous source of money and encouragement.</p>\n<p>FundraisingScript is powered by a unique all-or-nothing funding method where projects must be fully-funded or no money changes hands.</p>', 1, 1, '1', '2012-01-23 04:42:25'),
(3, 6, 'Who can fund their project on FundraisingScript?', '<p>FundraisingScript is focused on creative projects. We''re a great way for artists, filmmakers, musicians, designers, writers, illustrators, explorers, curators, performers, and others to bring their projects, events, and dreams to life.</p>\n<p>The word &ldquo;project&rdquo; is just as important as &ldquo;creative&rdquo; in defining what works on FundraisingScript. A project is something finite with a clear beginning and end. Someone can be held accountable to the framework of a project &mdash; a project was either completed or it wasn&rsquo;t &mdash; and there are definable expectations that everyone can agree to. This is imperative for every FundraisingScript project.</p>\n<p>We know there are a lot of great projects that fall outside of our scope, but FundraisingScript is not a place for soliciting donations to causes, charity projects, or general business expenses. Learn more about our&nbsp;<a href="https://www.kickstarter.com/help/guidelines" target="_blank">project guidelines</a>.</p>', 2, 1, '1', '2012-01-23 04:43:30'),
(4, 6, 'Why do people support projects?', '<p><strong>REWARDS!</strong>&nbsp;Project creators inspire people to open their wallets by offering smart, fun, and tangible rewards (products, benefits, and experiences).</p>\n<p><strong>STORIES!</strong>&nbsp;FundraisingScript projects are efforts by real people to do something they love, something fun, or at least something of note. These stories unfold through blog posts, pics, and videos as people bring their ideas to life. Take a peek around the site and see what we''re talking about. Stories abound.</p>', 3, 1, '1', '2012-01-23 04:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE IF NOT EXISTS `faq_category` (
  `faq_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `faq_category_name` varchar(255) NOT NULL,
  `faq_category_url_name` varchar(255) NOT NULL,
  `faq_category_order` int(10) NOT NULL,
  `faq_category_home` int(10) NOT NULL DEFAULT '0',
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`faq_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`faq_category_id`, `parent_id`, `faq_category_name`, `faq_category_url_name`, `faq_category_order`, `faq_category_home`, `active`) VALUES
(3, 0, 'FundraisingScript Basics', 'fundraisingscript-basics', 1, 1, '1'),
(4, 0, 'Creating a Project', 'creating-a-project', 2, 1, '1'),
(5, 0, 'Backing a Project', 'backing-a-project', 3, 1, '1'),
(6, 3, 'HOW IT WORKS', 'how-it-works', 1, 0, '1'),
(7, 3, 'ACCOUNT SETTINGS', 'account-settings', 2, 0, '1'),
(8, 3, 'SITE BASICS', 'site-basics', 3, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(50) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(255) NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `gateways_details`
--

CREATE TABLE IF NOT EXISTS `gateways_details` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `payment_gateway_id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `value` varchar(200) NOT NULL,
  `label` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

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
  `guidelines_title` varchar(255) NOT NULL,
  `guidelines_content` longtext NOT NULL,
  `guidelines_meta_title` text NOT NULL,
  `guidelines_meta_keyword` text NOT NULL,
  `guidelines_meta_description` text NOT NULL,
  PRIMARY KEY (`guidelines_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `home_title` varchar(255) NOT NULL,
  `home_description` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`home_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `idea_name` varchar(255) NOT NULL,
  `idea_image` varchar(255) NOT NULL,
  `idea_description` text NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`idea_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`idea_id`, `idea_name`, `idea_image`, `idea_description`, `active`) VALUES
(2, 'Medical Bills', '1309861110_kcmdrkonqi.jpg', 'Raise money online to help friends cover medical bills\nand expenses in the event of an accident or illness.', '1'),
(3, 'Weddings And Honeymoons', '2.jpg', 'Raise money online for your dream wedding, perfect\nhoneymoon, cash registry or bridal shower', '1'),
(4, 'Special Occasions', '1309861094_Gift_Box_(Gold).jpg', 'Raise money online for group gift purchases, birthdays,\nanniversaries, bachelor parties and celebrations!', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `image_setting`
--

INSERT INTO `image_setting` (`image_setting_id`, `p_width`, `p_height`, `u_width`, `u_height`, `g_width`, `g_height`, `p_ratio`, `u_ratio`, `g_ratio`) VALUES
(1, 602, 600, 150, 150, 602, 340, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invite_request`
--

CREATE TABLE IF NOT EXISTS `invite_request` (
  `request_id` int(100) NOT NULL AUTO_INCREMENT,
  `invite_code` text NOT NULL,
  `invite_email` varchar(255) NOT NULL,
  `invite_date` datetime NOT NULL,
  `invite_ip` varchar(255) NOT NULL,
  `invite_by` int(100) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `language_name` varchar(255) NOT NULL,
  `iso2` varchar(255) NOT NULL,
  `iso3` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `message_subject` text NOT NULL,
  `message_content` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `reply_message_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `message_conversation`
--

INSERT INTO `message_conversation` (`message_id`, `sender_id`, `receiver_id`, `is_read`, `message_subject`, `message_content`, `project_id`, `date_added`, `reply_message_id`) VALUES
(1, 2, 1, 1, 'New Mesage', 'hi from project detail page', 1, '2012-09-14', 0),
(2, 1, 2, 1, 'New Mesage', 'reply by kash inbox', 1, '2012-09-14', 1),
(3, 2, 1, 1, 'test', 'ddkfjd jfdk fjd jfdh jfhdfhdhf gdhgfhd  d fd fd', 1, '2012-09-14', 0),
(4, 1, 2, 1, 'test', 'sdsd s ds ds ssd s ds s', 1, '2012-09-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `message_setting`
--

CREATE TABLE IF NOT EXISTS `message_setting` (
  `message_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_admin_on_new_message` int(11) NOT NULL DEFAULT '1' COMMENT '0-no,1-yes',
  `email_user_on_new_message` int(11) NOT NULL DEFAULT '1' COMMENT '0-no,1-yes',
  `default_message_subject` varchar(255) NOT NULL,
  `message_enable` int(11) NOT NULL DEFAULT '1' COMMENT '0-no,1-yes',
  PRIMARY KEY (`message_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  PRIMARY KEY (`meta_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `meta_setting`
--

INSERT INTO `meta_setting` (`meta_setting_id`, `title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Fundraising', 'fundraising, fundraising script, fundraising scripts, fundraising script for sale, fundraising website clone, script like fundraising, site like Crowd funding , Crowd funding  ideas, Crowd funding script, scripts fundraising, fundraiser ideas, unique fund', 'One of the BEST ways to raise money online & Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `newsletter_job`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `newsletter_report`
--


-- --------------------------------------------------------

--
-- Table structure for table `newsletter_setting`
--

CREATE TABLE IF NOT EXISTS `newsletter_setting` (
  `newsletter_setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `newsletter_from_name` varchar(255) NOT NULL,
  `newsletter_from_address` varchar(255) NOT NULL,
  `newsletter_reply_name` varchar(255) NOT NULL,
  `newsletter_reply_address` varchar(255) NOT NULL,
  `new_subscribe_email` varchar(255) NOT NULL,
  `unsubscribe_email` varchar(255) NOT NULL,
  `new_subscribe_to` varchar(255) NOT NULL,
  `selected_newsletter_id` int(20) NOT NULL,
  `number_of_email_send` int(20) NOT NULL,
  `break_between_email` int(20) NOT NULL,
  `mailer` varchar(50) NOT NULL,
  `sendmail_path` varchar(255) NOT NULL,
  `smtp_port` int(20) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_email` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `break_type` varchar(50) NOT NULL DEFAULT 'minutes',
  PRIMARY KEY (`newsletter_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `newsletter_subscribe`
--


-- --------------------------------------------------------

--
-- Table structure for table `newsletter_template`
--

CREATE TABLE IF NOT EXISTS `newsletter_template` (
  `newsletter_id` int(100) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `template_content` longtext NOT NULL,
  `attach_file` varchar(255) NOT NULL,
  `allow_subscribe_link` int(10) NOT NULL DEFAULT '0',
  `allow_unsubscribe_link` int(10) NOT NULL DEFAULT '0',
  `project_id` int(100) NOT NULL,
  `newsletter_create_date` date NOT NULL,
  PRIMARY KEY (`newsletter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `newsletter_template`
--

INSERT INTO `newsletter_template` (`newsletter_id`, `subject`, `template_content`, `attach_file`, `allow_subscribe_link`, `allow_unsubscribe_link`, `project_id`, `newsletter_create_date`) VALUES
(4, 'sdsdsdsdsd', '<table cellpadding="3" cellspacing="3" width="700" style="border:1px solid #000">\r\n<tbody><tr>\r\n<td colspan="2" style="text-align:left;vertical-align:top"><a href="http://localhost/cripsnew/projects/credit-card-test1/2" style="font-size:18px;font-weight:bold;color:#114a75;text-transform:capitalize">credit card test</a></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align:left;vertical-align:top">\r\n         <a href="http://localhost/cripsnew/projects/credit-card-test1/2" target="_blank"><img class="p_img" src="http://localhost/cripsnew/upload/thumb/no_img.jpg" width="190" height="150" title="Credit card test"></a>\r\n</td>\r\n<td style="text-align:left;padding:10px;vertical-align:top">\r\n<table cellpadding="2" cellspacing="2" style="border:1px solid #000">\r\n<tbody><tr>\r\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Goal</td>\r\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Raised</td>\r\n<td style="font-size:16px;font-weight:bold;color:#114a75;text-align:center;vertical-align:top">Days Left</td>\r\n</tr>\r\n<tr>\r\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\r\n$1,200.00\r\n</td>\r\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\r\n$55.00 RAISED\r\n</td>\r\n<td style="font-size:12px;font-weight:bold;text-align:center;vertical-align:top">\r\n38 DAYS LEFT\r\n</td>\r\n</tr>\r\n<tr><td colspan="3" height="18">&nbsp;</td></tr>\r\n<tr>\r\n<td style="text-align:left;vertical-align:top" colspan="3">\r\n<span style="font-size:16px;font-weight:bold;color:#114a75">Summary: </span> sdsd sds ds\r\n</td>\r\n</tr>\r\n</tbody></table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="text-align:left;padding:10px;vertical-align:top" colspan="2">sds sds </td>\r\n</tr>\r\n</tbody></table>  ', '', 0, 0, 2, '2012-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_user`
--

CREATE TABLE IF NOT EXISTS `newsletter_user` (
  `newsletter_user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`newsletter_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `newsletter_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `pages_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `footer_bar` varchar(20) DEFAULT 'no',
  `header_bar` varchar(20) DEFAULT 'no',
  `left_side` varchar(20) DEFAULT 'no',
  `right_side` varchar(20) DEFAULT 'no',
  `external_link` text NOT NULL,
  PRIMARY KEY (`pages_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `parent_id`, `pages_title`, `description`, `slug`, `active`, `meta_keyword`, `meta_description`, `footer_bar`, `header_bar`, `left_side`, `right_side`, `external_link`) VALUES
(3, 0, 'Top Questions', '<div style="padding: 6px;"><span style="font-size: 18px; font-weight: bold; ">1.</span> <b>What is FundMeOnline?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p>FundMeOnline makes it easy for people to raise money  online for the things that matter to them most. From honeymoons to  memorials and everything in between, our users invite family &amp;  friends to donate to important life-events, projects &amp; causes.</p>\n<p><strong>What&rsquo;s allowed?</strong> FundMeOnline allows  you to raise money online for just about any idea, event, project or  cause your family, friends &amp; personal contacts might believe in.</p>\n<p><strong>What&rsquo;s not allowed?</strong> Users are prohibited from violating any local laws or attempting to raise money for anything that violates our terms &amp; conditions.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">2.</span> <b>How do I accept donations online?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p>Accepting credit card donations online is easy with  FundMeOnline. Every donation you receive is instantly deposited into  your PayPal account. Simply sign-up for FundMeOnline and connect your  PayPal account. Don&rsquo;t worry, PayPal accounts are free to get.<strong> The entire process takes less than a minute</strong>.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">3.</span> <b>Is a PayPal account required to donate?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p><strong>Nope! </strong>You can ensure that donors have an  easy time donating by following the simple steps provided during  sign-up. We recommend taking advantage of PayPal&rsquo;s FREE upgrade to the  &lsquo;Verified Premier&rsquo; account level.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">4.</span> <b>When do I get my money?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p>Immediately! With FundMeOnline there&rsquo;s no time-limits or  collection requirements. By connecting your PayPal account to  FundMeOnline you have instant &amp; secure access to every donation you  receive.</p>\n</div>\n<span style="color: rgb(0, 0, 0); "><span style="font-size: 18px; font-weight: bold; ">5.</span></span> <b>Will FundMeOnline charge me any fees?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p>FundMeOnline will automatically deduct a 5% fee from each  donation you receive. If you don&rsquo;t receive any donations, then you  won&rsquo;t pay anything at all. Since our fee is deducted from each donation  in real-time, you&rsquo;ll never need to worry about getting billed or owing  us any money. Remember too, that your donors are never charged any fees  for donating to your fund.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">6.</span> <b>Do I have to be a non-profit to use this?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p><strong>No!</strong> Anyone can raise money online using  FundMeOnline&rsquo;s customizable donation pages. Our users often raise money  for themselves or for friends they want to help out. FundMeOnline was  design to allow everyday people to do wonderful things with the money  they raise online.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">7.</span> <b>Will my donors get charged any fees?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p><strong>No!</strong> Donors do not get charged any extra fees for donating to your fund.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">8.</span> <b>Are there limits to how much money I raise?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p><strong>No way!</strong> FundMeOnline users can raise as  much money as they want. We love it when our users raise a ton of money  on their online donation pages.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">9.</span> <b>Can I raise money on Facebook &amp; Twitter?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p><strong>Of course!</strong> Connecting to Facebook &amp;  Twitter is part of what makes FundMeOnline work so well. The best part  is that visitors to your donation page end up doing most of the sharing  for you &ndash; helping you to attract more donors!</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">10.</span> <b>How will I know when people donate?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p>We send you an email each time somebody donates to your  fund. After receiving the email, you&rsquo;ll see the new donation appear in  your FundMeOnline dashboard and inside of your PayPal account.</p>\n</div>\n<span style="font-size: 18px; font-weight: bold; ">11.</span> <b>Does it cost anything to use PayPal?</b>\n<div style="padding: 5px 5px 5px 20px; text-align: justify; font-size: 14px;">\n<p>There&rsquo;s no charge to sign-up for your PayPal &lsquo;Premier&rsquo;  account. You&rsquo;ll need a PayPal account in order to collect donations  online with your FundMeOnline online donation page. Have a look at  PayPal&rsquo;s fees once you create your &lsquo;Premier&rsquo; account. Signing up for a PayPal &lsquo;Premier&rsquo; account is easy and free!</p>\n</div>\n</div>', 'questions', '0', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', '0', '0', '0', '0', ''),
(4, 0, 'Support', '<ul>\n    <li>\n    <div id="con-right-question">\n    <p>Facebook sharing</p>\n    <p>I have tried to share my fund on facebook but it does not appear on my wall and only appeared on a handful of my friends'' walls...I''ve shared the fund twice, once yesterday and once today but the invites are still not showing up, nor does anything show up on my own wall, even when I post updates?</p>\n    <p>Hello - we''ve heard reports of sharing limits imposed on certain Facebook accounts - at times only allowing 20 or so invites to be sent each day. We''re working on making this area of GoFundMe better for our users. Please stay tuned for an update soon.</p>\n    <p>I would like the picture I have on my gofundme page to show up on facebook when I share the link. Is that possible?</p>\n    <p>How do I get listed in the Search Directory?</p>\n    <p>It''s easy to get listed in the GoFundMe Search Directory.</p>\n    <p><br />\n    1. First, you''ll need to request to be listed during Sign-Up or by Signing-In to GoFundMe and clicking the ''Edit'' tab.<br />\n    2. Next click on the ''Public Search Preferences'' link towards the top of the page.<br />\n    3. Enter the required info and click the ''Save'' button.<br />\n    4. Before appearing in the Search Directory, there are 2 additional requirements that must be met...<br />\n    <br />\n    In an effort to ensure authenticity of funds and to protect donors, listed funds must be ''Facebook Verified'' (achieved by connecting your Facebook account) and have raised at least $100 in online donations.</p>\n    <p>Why is PayPal Forcing Donors to Login?</p>\n    <p>99.9% of PayPal inquiries are due to the collector''s invalid PayPal account type. A fully verified PayPal ''Premier'' account (don''t worry, they''re FREE) is required to give your donors a smooth payment experience.</p>\n    <br />\n    Below is a blog post we wrote on the topic a while back:<br />\n    <br />\n    As most of you already know, your GoFundMe online donation page connects directly to your PayPal account to ensure that you have instant, secure access to every donation you receive. If you haven&rsquo;t done so already, please be sure and take advantage of PayPal&rsquo;s FREE upgrade to the &lsquo;Premier&rsquo; account level. Again, it doesn&rsquo;t cost anything to upgrade your PayPal account to the &lsquo;Premier&rsquo; level and it makes the donation experience a lot easier on your donors.<br />\n    <br />\n    It&rsquo;s common for new GoFundMe users to sign-up for PayPal accounts in a hurry. In doing so, users sometimes miss important instructions from PayPal &ndash; like forgetting to click the verification link in your welcome email or omitting certain contact information. Anytime this happens, PayPal is likely to prevent your account from working the way it should for security reasons.<br />\n    <br />\n    In short, the more PayPal knows about you, the more they trust that you&rsquo;re not some bad guy up to no good : ) Upgrading to a PayPal &lsquo;Premier&rsquo; account only takes a few minutes and helps ensure that your visitors can donate to your fund without having to sign-in to a PayPal account of their own &ndash; hooray!<br />\n    <p>?</p>\n    <p>&nbsp;</p>\n    <p>?</p>\n    </div>\n    </li>\n</ul>', 'Support', '0', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', '0', '0', '0', '0', ''),
(5, 0, 'About Us', '<p>OUR GOAL IS TO HELP  FIND A FINANCIAL SOLUTION FOR THE STUDENT SPECIFIC NEED AND WE BELIEVE THAT  EVERY STUDENT DESERVES A FAIR SHOT AT EDUCATION AND LIFE, THESE WILL PROVIDE  THE STUDENT WITH TOOLS AND KNOWLAGE TO SUCCEED IN LIFE AND HAVE MORE  OPPORTUNITIES FOR THEIR FUTURE.</p>\n<p>WE BELIEVE EDUCATION IS THE FOUNDATION OF A GREAT NATION, BY HELPING A  STUDENT YOU ARE NOT ONLY GIVING THEM A BETTER OPPORTUNITY FOR LIFE , YOU ARE  BUILDING A NEW, MORE HUMAN AND SENSITIVE GENERATION, HELP THEM TO GET THEIR  TUITION,PAY THEIR COLLEGE LOAN, BOOKS AND LIVING EXPENSES.</p>\n<p>WE KNOW FOR A FACT THAT THERE ARE THOUSANDS OF EDUCATIONAL GIVERS AND  HAVE THESE SAME CONCERNS AND DESIRE OF EQUALITY OF OPORTUNITIES ,THATS WHY WE  PUT ALL OUR EFFORTS TO CONNECT THESE GIVERS WITH THE STUDENTS IN NEED, SO THAT  GIVERS CAN GET TO KNOW THE STUDENT NEEDS, DREAMS AND ASPIRATIONS.</p>\n<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><br />\n</span></p>\n<p>&nbsp;</p>', 'about_us', '1', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', 'yes', '0', '0', '0', ''),
(6, 0, 'Help', '<ul>\n    <li>\n    <div id="con-right-question">\n    <p>How to send donations</p>\n    <p>My parents and I put $100 dollars into the gofundme account, but it never asked for a credit card number or any information to transfer money. It says I recieved a $100 dollar donation, but how does it add the money without requesting bank or credit card information?</p>\n    <p>The only donation your fund has at the moment was added as an &quot;Offline Donation&quot;. These donations are added through the GoFundMe Dashboard and do not reflect online transactions. They are used for updating your donation page so that people who give you checks toward you goal can be recognized.</p>\n    <p><br />\n    To collect money with your donation page people need to go to your donation page URL, click Donate Online, and follow the steps through PayPal.</p>\n    <p>How do I get a report of all the donors?</p>\n    <p>Sure thing - you can easily export a report of all donation activity by completing the following steps:</p>\n    <br />\n    1. Sign In to your GoFundMe account.<br />\n    2. Click the ''More'' tab.<br />\n    3. Select the ''Donations'' option from the menu.<br />\n    4. Click the ''Export'' link on the Donations page.<br />\n    <p>?</p>\n    <p>?</p>\n    </div>\n    </li>\n</ul>', 'help', '0', 'Fund Me Online, online fundraising, donation website, donations online, accept donations', 'One of the BEST ways to raise money online. Get your online donation website FREE! Invite family & friends to donate online to any of your online fundraising ideas.', 'yes', 'yes', '0', '0', ''),
(7, 0, 'Guidelines', '', 'guidelines', '0', 'guidelines', 'guidelines', 'yes', '0', '0', '0', '');
INSERT INTO `pages` (`pages_id`, `parent_id`, `pages_title`, `description`, `slug`, `active`, `meta_keyword`, `meta_description`, `footer_bar`, `header_bar`, `left_side`, `right_side`, `external_link`) VALUES
(12, 0, 'Terms and Conditions', '<div><span style="color: rgb(51, 51, 51); font-size: 13px; line-height: 20px; background-color: rgb(255, 255, 255); "> </span></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">PLEASE READ THESE TERMS OF USE (&quot;AGREEMENT&quot; OR &quot;TERMS OF USE&quot;) CAREFULLY BEFORE USING THE SERVICES OFFERED BY Rockers Technologies. (&quot;COMPANY&quot;). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.gofundmeclone.com (THE &quot;SITE&quot;) AND THE SERVICE OWNED AND OPERATED BY COMPANY (COLLECTIVELY WITH THE SITE, THE &quot;SERVICE&quot;). BY USING THE SITE OR SERVICE IN ANY MANNER, INCLUDING BUT NOT LIMITED TO VISITING OR BROWSING THE SITE, YOU AGREE TO BE BOUND BY THIS AGREEMENT. THIS AGREEMENT APPLIES TO ALL USERS OF THE SITE OR SERVICE, INCLUDING USERS WHO ARE ALSO CONTRIBUTORS OF CONTENT, INFORMATION, AND OTHER MATERIALS OR SERVICES ON THE SITE.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Acceptance of Terms</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">The Service is offered subject to acceptance without modification of all of the terms and conditions contained herein (the &quot;Terms of Use&quot;), which term also incorporates the Privacy Policy available at<a href="http://www.kickstarter.com/privacy" style="color: rgb(85, 164, 242); text-decoration: none; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">?</a><a href="http://www.gofundmeclone.com/home/content/privacy-policy/13">http://www.gofundmeclone.com/home/content/privacy-policy/13</a>, and all other operating rules, policies and procedures that may be published from time to time on the Site by Company, each of which is incorporated by reference and each of which may be updated by Company from time to time without notice to you. In addition, some services offered through the Service may be subject to additional terms and conditions promulgated by Company from time to time; your use of such services is subject to those additional terms and conditions, which are incorporated into these Terms of Use by this reference.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">The Service is available only to individuals who are at least 18 years old. You represent and warrant that if you are an individual, you are of legal age to form a binding contract, and that all registration information you submit is accurate and truthful. Company may, in its sole discretion, refuse to offer the Service to any person or entity and change its eligibility criteria at any time. This provision is void where prohibited by law and the right to access the Service is revoked in such jurisdictions.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Modification of Terms of Use</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Company reserves the right, at its sole discretion, to modify or replace any of the Terms of Use, or change, suspend, or discontinue the Service (including without limitation, the availability of any feature, database, or content) at any time by posting a notice on the Site or by sending you an email. Company may also impose limits on certain features and services or restrict your access to parts or all of the Service without notice or liability. It is your responsibility to check the Terms of Use periodically for changes. Your continued use of the Service following the posting of any changes to the Terms of Use constitutes acceptance of those changes.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Rules and Conduct</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">As a condition of use, you promise not to use the Service for any purpose that is prohibited by the Terms of Use. The Service (including, without limitation, any Content or User Submissions (both as defined below)) is provided only for your own personal, non-commercial use (except as allowed by the terms set forth in the Projects: Fund-Raising and Commerce section of the Terms of Use). You are responsible for all of your activity in connection with the Service. For purposes of the Terms of Use, the term &quot;Content&quot; includes, without limitation, any User Submissions, videos, audio clips, written forum comments, information, data, text, photographs, software, scripts, graphics, and interactive features generated, provided, or otherwise made accessible by Company or its partners on or through the Service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">By way of example, and not as a limitation, you shall not (and shall not permit any third party to) either (a) take any action or (b) upload, download, post, submit or otherwise distribute or facilitate distribution of any content on or through the Service, including without limitation any User Submission, that:</div>\n<ul style="margin-top: 0px; margin-right: 1.5em; margin-bottom: 1.5em; margin-left: 1.5em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; list-style-type: square; list-style-position: initial; list-style-image: initial; ">\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">infringes any patent, trademark, trade secret, copyright, right of publicity or other right of any other person or entity or violates any law or contractual duty;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">you know is false, misleading, untruthful or inaccurate;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">is unlawful, threatening, abusive, harassing, defamatory, libelous, deceptive, fraudulent, invasive of another''s privacy, tortious, obscene, offensive, or profane;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">constitutes unsolicited or unauthorized advertising or promotional material or any junk mail, spam or chain letters;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">contains software viruses or any other computer codes, files, or programs that are designed or intended to disrupt, damage, limit or interfere with the proper function of any software, hardware, or telecommunications equipment or to damage or obtain unauthorized access to any system, data, password or other information of Company or any third party; or</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">impersonates any person or entity, including any employee or representative of Company.</li>\n</ul>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Additionally, you shall not: (i) take any action that imposes or may impose (as determined by Company in its sole discretion) an unreasonable or disproportionately large load on Company&rsquo;s (or its third party providers&rsquo;) infrastructure; (ii) interfere or attempt to interfere with the proper working of the Service or any activities conducted on the Service; (iii) bypass any measures Company may use to prevent or restrict access to the Service (or other accounts, computer systems or networks connected to the Service); (iv) run Maillist, Listserv, any form of auto-responder or &quot;spam&quot; on the Service; or (v) use manual or automated software, devices, or other processes to &quot;crawl&quot; or &quot;spider&quot; any page of the Site.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">You shall not (directly or indirectly): (i) decipher, decompile, disassemble, reverse engineer or otherwise attempt to derive any source code or underlying ideas or algorithms of any part of the Service, except to the limited extent applicable laws specifically prohibit such restriction, (ii) modify, translate, or otherwise create derivative works of any part of the Service, or (iii) copy, rent, lease, distribute, or otherwise transfer any of the rights that you receive hereunder. You shall abide by all applicable local, state, national and international laws and regulations.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Company does not guarantee that any Content or User Submissions (as defined below) will be made available on the Site or through the Service. Company has no obligation to monitor the Site, Service, Content, or User Submissions. However, Company reserves the right to (i) remove, edit or modify any Content in its sole discretion, including without limitation any User Submissions, from the Site or Service at any time, without notice to you and for any reason (including, but not limited to, upon receipt of claims or allegations from third parties or authorities relating to such Content or if Company is concerned that you may have violated the Terms of Use), or for no reason at all and (ii) to remove or block any User Submissions from the Service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Registration</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">You may browse the Site and view Content without registering, but as a condition to using certain aspects of the Service, you may be required to register with Company and select a password and screen name (&quot;User ID&quot;). You shall provide Company with accurate, complete, and updated registration information. Failure to do so shall constitute a breach of the Terms of Use, which may result in immediate termination of your Company account. You shall not (i) select or use as a User ID or domain a name of another person with the intent to impersonate that person; (ii) use as a User ID or domain a name subject to any rights of a person other than you without appropriate authorization; or (iii) use as a User ID or domain a name that is otherwise offensive, vulgar or obscene. Company reserves the right to refuse registration of, or cancel a User ID and domain in its sole discretion. You are solely responsible for activity that occurs on your account and shall be responsible for maintaining the confidentiality of your Company password. You shall never use another user&rsquo;s account without such other user&rsquo;s express permission. You will immediately notify Company in writing of any unauthorized use of your account, or other account related security breach of which you are aware.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Projects: Fund-Raising and Commerce</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Fundraisingscript.com (&quot;Fundraisingscript&quot;) is a venue for fund-raising and commerce. Fundraisingscript allows certain users (&quot;Project Creators&quot;) to list projects and raise funds from other users (&quot;Backers&quot;). All funds are collected for Project Creators by Paypal and Amazon Payments. Fundraisingscript?does not, at any time, receive or hold any monies intended for Project Creators.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Fundraisingscript shall not be liable for your interactions with any organizations and/or individuals found on or through the Fundraisingscript?service. This includes, but is not limited to, delivery of goods and services, and any other terms, conditions, warranties or representations associated with listings on Fundraisingscript. Fundraisingscriptdoes not oversee the performance or punctuality of projects. Fundraisingscript?is not responsible for any damage or loss incurred as a result of any such dealings. All dealings are solely between you and such organizations and/or individuals. Fundraisingscript is under no obligation to become involved in disputes between Backers and Project Creators, or between site members and any third party. In the event of a dispute, you release Fundraisingscript, its officers, employees, agents and successors in rights from claims, damages and demands of every kind, known or unknown, suspected or unsuspected, disclosed or undisclosed, arising out of or in any way related to such disputes and our service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Though Fundraisingscript?cannot be held liable for the actions of a Project Creator, Project Creators are nevertheless wholly responsible for fulfilling obligations both implied and stated in any project listing they create. Fundraisingscript?reserves the right to cancel a project listing and refund all associated members'' payments at any time for any reason. Fundraisingscript?reserves the right to remove a project listing from public listings for any reason.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Fundraisingscript?makes no guarantees regarding the performance or fairness of Paypal and Amazon Payments. Additionally, because of occasional failures of some credit cards, Fundraisingscript?cannot guarantee the full receipt of the targeted amount.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Project Creators may initiate refunds at their own discretion. Fundraisingscript is not responsible for issuing refunds for funds that have been collected by Project Creators.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Fundraisingscript?reserves the right to cancel, interrupt or suspend a listing at any time for any reason.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Fees and Payments</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Joining Fundraisingscript?is free. However, we do charge fees for certain services. All fees are collected for Fundraisingscript?by Paypal Or Amazon Payments. When you use a service that has a fee you have an opportunity to review and accept the fees that you will be charged, which we may change from time to time. Changes to that Policy are effective after we provide you with notice by posting the changes on the Sites. We may choose to temporarily change the fees for our services for promotional events (for example, free listing days) or new services, and such changes are effective when we post the temporary promotional event or new service on the Sites.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">You are responsible for paying all fees and applicable taxes associated with your use of the site. In the event a listing is removed from the Service for violating the Terms of Use, all fees paid will be non-refundable, unless in its sole discretion Fundraisingscript?determines that a refund is appropriate.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Third Party Site</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">The Service may permit you to link to other websites or resources on the Internet, and other websites or resources may contain links to the Site. When you access third party websites, you do so at your own risk. These other websites are not under Company''s control, and you acknowledge that Company is not responsible or liable for the content, functions, accuracy, legality, appropriateness or any other aspect of such websites or resources. The inclusion of any such link does not imply endorsement by Company or any association with its operators. You further acknowledge and agree that Company shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such Content, goods or services available on or through any such website or resource.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Content and License</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">You agree that the Service contains Content specifically provided by Company or its partners and that such Content is protected by copyrights, trademarks, service marks, patents, trade secrets or other proprietary rights and laws. You shall abide by and maintain all copyright notices, information, and restrictions contained in any Content accessed through the Service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Company grants each user of the Site and/or Service a worldwide, non-exclusive, non-sublicensable and non-transferable license to use, modify and reproduce the Content, solely for personal, non-commercial use. Use, reproduction, modification, distribution or storage of any Content for other than personal, non-commercial use is expressly prohibited without prior written permission from Company, or from the copyright holder identified in such Content''s copyright notice. You shall not sell, license, rent, or otherwise use or exploit any Content for commercial use or in any way that violates any third party right.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Third Party Intellectual Property &mdash; Copyright Notifications</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Fundraisingscript?respects the intellectual property of others, and we ask our users to do the same. Fundraisingscript?may, in appropriate circumstances and at its discretion, terminate the accounts of users who infringe the intellectual property rights of others. Fundraisingscript will remove infringing materials in accordance with the Digital Millennium Copyright Act if properly notified that content infringes copyright.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">If you believe that your work has been copied in a way that constitutes copyright infringement, please provide Fundraisingscript&quot;s Copyright Agent with a written notification containing at least the following information (please confirm these requirements with your legal counsel, or see Section 512(c)(3) of the U.S. Copyright Act, 17 U.S.C. ?512(c)(3), for more information):</div>\n<ul style="margin-top: 0px; margin-right: 1.5em; margin-bottom: 1.5em; margin-left: 1.5em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; list-style-type: square; list-style-position: initial; list-style-image: initial; ">\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">a description of the copyrighted work that you claim has been infringed;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">a description of where the material that you claim is infringing is located on the Fundraisingscript Site, sufficient for Fundraisingscript to locate the material;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">your address, telephone number, and email address;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; and</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">a statement by you that the above information in your notice is accurate and, under penalty of perjury, that you are the copyright owner or authorized to act on the copyright owner''s behalf.</li>\n</ul>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">If you believe that your work has been removed or disabled by mistake or misidentification, please provide the Fundraisingscript&rsquo;s Copyright Agent with a written counter-notification containing at least the following information (please confirm these requirements with your legal counsel or see Section 512(g)(3) of the U.S. Copyright Act, 17 U.S.C. ?512(g)(3), for more information):</div>\n<ul style="margin-top: 0px; margin-right: 1.5em; margin-bottom: 1.5em; margin-left: 1.5em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; list-style-type: square; list-style-position: initial; list-style-image: initial; ">\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">a physical or electronic signature of the subscriber/user of the Services;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">identification of the material that has been removed or to which access has been disabled and the location at which the material appeared before it was removed or access to it was disabled;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">a statement made under penalty of perjury that the subscriber has a good faith belief that the material was removed or disabled as a result of mistake or misidentification of the material to be removed or disabled; and</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">the subscriber''s name, address, telephone number, and a statement that the subscriber consents to the jurisdiction of the Federal District Court for the judicial district in which the address is located, or if the subscriber''s address is outside of the United States, for any judicial district in which the service provider may be found, and that the subscriber will accept service of process from the person who provided notification under subsection (c)(1)(C) or an agent of such person.</li>\n</ul>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">You acknowledge that if you fail to comply with all of the aforementioned notice requirements, your notification or counter-notification may not be valid and that Fundraisingscript may ignore such incomplete or inaccurate notices without liability of any kind.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Under Section 512(f) of the Copyright Act, 17 U.S.C. ?512(f), any person who knowingly materially misrepresents that material or activity is infringing or was removed or disabled by mistake or misidentification may be subject to liability.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Our designated copyright agent for notice of alleged copyright infringement is:</div>\n<blockquote style="margin-top: 1.5em; margin-right: 1.5em; margin-bottom: 1.5em; margin-left: 1.5em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: italic; font-size: 13px; vertical-align: baseline; quotes: ''''; color: rgb(102, 102, 102); ">Rockers Technologies<br />\nGujarat, India 390010<br />\nEmail: nishu@rockersinfo.com</blockquote>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Intellectual Property Rights &mdash; Project Creators</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">The Service provides you with the ability upload your content to the Site. Company will not have any ownership rights in your content, however, Company needs the following license to perform the Service. You hereby grant to Company the worldwide, non-exclusive, royalty-free, right to (and to allow others acting on its behalf to) (i) use, host, display, and otherwise perform the Service on your behalf (e.g., use, host, stream, transmit, playback, transcode, copy, display, feature, market, sell, distribute and otherwise exploit (&quot;Host&quot;) the content, along with all associated copyrightable works or metadata, including without limitation photographs, graphics, and descriptive text (&quot;Artworks&quot;) in connection with the Service); (ii) (and to allow other users to) stream, transmit, playback, download, display, feature, distribute, collect, and otherwise use the content and Artworks; and (iii) use and publish, and to permit others to use and publish, the name(s), trademarks, likenesses, and personal and biographical materials of you and the members of your group, in connection with the provision of the Service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">You agree to pay all royalties and other amounts owed to any person or entity due to your submission of your content to the Service or the Company&rsquo;s Hosting of the content as contemplated by these Terms of Use.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">To enable Company to Host your content pursuant to the above provisions, you hereby grant to Company the worldwide, non-exclusive, perpetual, royalty-free, sublicensable and transferable right to use, reproduce, copy, and display your trademarks, service marks, slogans, logos or similar proprietary rights (collectively, the &quot;Trademarks&quot;) solely in connection with the Service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Intellectual Property Rights &mdash; Users</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">The Service may provide users with the ability to add, create, upload, submit, distribute, collect, or post (&quot;Submitting&quot; or &quot;Submission&quot;) content, videos, audio clips, written forum comments, data, text, photographs, software, scripts, graphics, or other information to the Site (collectively, the &quot;User Submissions&quot;). By Submitting User Submissions on the Site or otherwise through the Service, you:</div>\n<ul style="margin-top: 0px; margin-right: 1.5em; margin-bottom: 1.5em; margin-left: 1.5em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; list-style-type: square; list-style-position: initial; list-style-image: initial; ">\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">acknowledge that by Submitting any User Submission to the Site, you are publishing that User Submission, and that you may be identified publicly by your User ID in association with any such User Submission;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">by Submitting any User Submissions through the Site or the Service, you hereby do and shall grant Company a worldwide, non-exclusive, perpetual, irrevocable, royalty-free, fully paid, sublicensable and transferable license to use, edit, modify, reproduce, distribute, prepare derivative works of, display, perform, and otherwise fully exploit the User Submissions in connection with the Site, the Service and Company&rsquo;s (and its successors and assigns&rsquo;) business, including without limitation for promoting and redistributing part or all of the Site (and derivative works thereof) or the Service in any media formats and through any media channels (including, without limitation, third party websites). You also hereby do and shall grant each user of the Site and/or the Service a non-exclusive license to access your User Submissions through the Site and the Service, and to use, edit, modify, reproduce, distribute, prepare derivative works of, display and perform such User Submissions solely for personal, non-commercial use. For clarity, the foregoing license grant to Company does not affect your other ownership or license rights in your User Submission(s), including the right to grant additional licenses to the material in your User Submission(s), unless otherwise agreed in writing;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">represent and warrant, and can demonstrate to Company&rsquo;s full satisfaction upon request that you (i) own or otherwise control all rights to all content in your User Submissions, or that the content in such User Submissions is in the public domain, (ii) you have full authority to act on behalf of any and all owners of any right, title or interest in and to any content in your User Submissions to use such content as contemplated by these Terms of Use and to grant the license rights set forth above, (iii) you have the permission to use the name and likeness of each identifiable individual person and to use such individual&rsquo;s identifying or personal information as contemplated by these Terms of Use; and (iv) you are authorized to grant all of the aforementioned rights to the User Submissions to Company and all users of the Service;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">you agree to pay all royalties and other amounts owed to any person or entity due to your Submission of any User Submissions to the Service;</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">that the use or other exploitation of such User Submissions by Company and use or other exploitation by users of the Site and Service as contemplated by this Agreement will not infringe or violate the rights of any third party, including without limitation any privacy rights, publicity rights, copyrights, contract rights, or any other intellectual property or proprietary rights; and</li>\n    <li style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">understand that Company shall have the right to delete, edit, modify, reformat, excerpt, or translate any materials, content or information submitted by you; and that all information publicly posted or privately transmitted through the Site is the sole responsibility of the person from which such content originated and that Company will not be liable for any errors or omissions in any content; and that Company cannot guarantee the identity of any other users with whom you may interact in the course of using the Service.</li>\n</ul>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Company does not endorse and has no control over any User Submission. Company cannot guarantee the authenticity of any data which users may provide about themselves. You acknowledge that all Content accessed by you using the Service is at your own risk and you will be solely responsible for any damage or loss to any party resulting therefrom.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Termination</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Company may terminate your access to all or any part of the Service at any time, with or without cause, with or without notice, effective immediately, which may result in the forfeiture and destruction of all information associated with your membership. If you wish to terminate your account, you may do so by following the instructions on the Site. Any fees paid hereunder are non-refundable. All provisions of the Terms of Use which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Warranty Disclaimer</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Company has no special relationship with or fiduciary duty to you. You acknowledge that Company has no control over, and no duty to take any action regarding: which users gains access to the Site; what Content you access via the Site; what effects the Content may have on you; how you may interpret or use the Content; or what actions you may take as a result of having been exposed to the Content. You release Company from all liability for you having acquired or not acquired Content through the Site. The Site may contain, or direct you to websites containing, information that some people may find offensive or inappropriate. Company makes no representations concerning any Content contained in or accessed through the Site, and Company will not be responsible or liable for the accuracy, copyright compliance, legality or decency of material contained in or accessed through the Site or the Service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">THE SERVICE IS PROVIDED &quot;AS IS&quot; AND &quot;AS AVAILABLE&quot; AND IS WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF TITLE, NON-INFRINGEMENT, MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE, AND ANY WARRANTIES IMPLIED BY ANY COURSE OF PERFORMANCE OR USAGE OF TRADE, ALL OF WHICH ARE EXPRESSLY DISCLAIMED. COMPANY, AND ITS DIRECTORS, EMPLOYEES, AGENTS, SUPPLIERS, PARTNERS AND CONTENT PROVIDERS DO NOT WARRANT THAT: (A) THE SERVICE WILL BE SECURE OR AVAILABLE AT ANY PARTICULAR TIME OR LOCATION; (B) ANY DEFECTS OR ERRORS WILL BE CORRECTED; (C) ANY CONTENT OR SOFTWARE AVAILABLE AT OR THROUGH THE SERVICE IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS; OR (D) THE RESULTS OF USING THE SERVICE WILL MEET YOUR REQUIREMENTS. YOUR USE OF THE SERVICE IS SOLELY AT YOUR OWN RISK.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">SOME STATES DO NOT ALLOW LIMITATIONS ON HOW LONG AN IMPLIED WARRANTY LASTS, SO THE ABOVE LIMITATIONS MAY NOT APPLY TO YOU.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">Electronic Communications Privacy Act Notice (18USC 2701-2711): COMPANY MAKES NO GUARANTY OF CONFIDENTIALITY OR PRIVACY OF ANY COMMUNICATION OR INFORMATION TRANSMITTED ON THE SITE OR ANY WEBSITE LINKED TO THE SITE. Company will not be liable for the privacy of email addresses, registration and identification information, disk space, communications, confidential or trade-secret information, or any other Content stored on Company&rsquo;s equipment, transmitted over networks accessed by the Site, or otherwise connected with your use of the Service.</div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding-top: 0.2em; padding-right: 0px; padding-bottom: 0.2em; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-weight: bold; font-style: inherit; font-size: 1.3em; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 1.25em; "><b><font size="4">Indemnification</font></b></div>\n<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-style: inherit; font-size: 13px; vertical-align: baseline; ">You shall defend, indemnify, and hold harmless Company, its affiliates and each of its, and its affiliates employees, contractors, directors, suppliers and representatives from all liabilities, claims, and expenses, including reasonable attorneys'' fees, that arise from or relate to your use or misuse of, or access to, the Site, Service, Content or otherwise from your User Submissions, violation of the Terms of Use, or infringement by you, or any third party using the your account, of any intellectual property or other right of any person or entity. Company reserves the right to assume the exclusive defense and control of any matter otherwise subject to indemnification by you, in which event you will assist and cooperate with Company i</div>', 'Terms and Conditions', '1', 'Fundraising script Terms and Conditions', 'Fundraising script Terms and Conditions', 'yes', 'yes', '0', '0', '');
INSERT INTO `pages` (`pages_id`, `parent_id`, `pages_title`, `description`, `slug`, `active`, `meta_keyword`, `meta_description`, `footer_bar`, `header_bar`, `left_side`, `right_side`, `external_link`) VALUES
(13, 0, 'Privacy Policy', '<p>We respect your right to privacy....dont we?</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">We will not give your name or personal information to third parties.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">Paypal or Amazon Payments processes all of the transactions on Fundraisingscript. No one sees your credit card information besides Paypal or Amazon, not even us.</p>\n<h3 style="border-width: 0px; margin: 0px 0px 0.5em; padding: 0.2em 0px; color: rgb(34, 34, 34); line-height: 1.25em; font-family: inherit; font-size: 1.3em; font-style: inherit; font-weight: bold; vertical-align: baseline; outline-width: 0px;">Email</h3>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">We want to communicate with you only if you want to hear from us.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">We will send you email relating to your personal transactions. We will keep these emails to a minimum.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">You will also receive certain email notifications (forwarded messages, etc.), for which you may opt-out.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">We may send you service-related announcements on rare occasions when it is necessary to do so.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">Project creators receive the email addresses of their backers if, and only if, the project is successfully funded.</p>\n<h3 style="border-width: 0px; margin: 0px 0px 0.5em; padding: 0.2em 0px; color: rgb(34, 34, 34); line-height: 1.25em; font-family: inherit; font-size: 1.3em; font-style: inherit; font-weight: bold; vertical-align: baseline; outline-width: 0px;">Technology / Security</h3>\n<p>Fundraisingscript?uses?<em style="border-width: 0px; margin: 0px; padding: 0px; font-family: inherit; font-size: 13px; font-style: italic; vertical-align: baseline; outline-width: 0px;">cookies</em>?to help (anonymously) recognize you as a repeat visitor and to track traffic patterns on our site. We use this information to make Fundraisingscript more user-friendly.Fundraisingscript may obtain IP?<em style="border-width: 0px; margin: 0px; padding: 0px; font-family: inherit; font-size: 13px; font-style: italic; vertical-align: baseline; outline-width: 0px;">addresses</em>?from users. We will use this information to monitor and prevent fraud, diagnose problems, and (anonymously) estimate demographic information.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">We use a variety of security measures, including encryption and authentication tools, to maintain the confidentiality of your personal information. Your personal information is stored behind firewalls and is only accessible by a limited number of people who are required to keep the information confidential.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">When you place orders we use a secure server. To the extent you select the secure server method and your browser supports such functionality, all credit card information you supply is transmitted via Secure Socket Layer (SSL) technology.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">Regardless of these efforts by us, no data transmission over the public Internet can be guaranteed to be 100% secure.</p>\n<h3 style="border-width: 0px; margin: 0px 0px 0.5em; padding: 0.2em 0px; color: rgb(34, 34, 34); line-height: 1.25em; font-family: inherit; font-size: 1.3em; font-style: inherit; font-weight: bold; vertical-align: baseline; outline-width: 0px;">Voluntary Disclosure</h3>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">Any personal information or content that you voluntarily disclose in public areas becomes publicly available and can be collected and used by other users. You should exercise caution before disclosing your personal information via these public venues.</p>\n<h3 style="border-width: 0px; margin: 0px 0px 0.5em; padding: 0.2em 0px; color: rgb(34, 34, 34); line-height: 1.25em; font-family: inherit; font-size: 1.3em; font-style: inherit; font-weight: bold; vertical-align: baseline; outline-width: 0px;">Project Creators</h3>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">By entering into our User Agreement, Fundraisingscript Project Creators agree to not abuse other users'' personal information. Abuse is defined as using personal information for any purpose other than those explicitly specified in the Project Creator&rsquo;s Project, or is not related to fulfilling delivery of a product or service explicitly specified in the Project Creator&rsquo;s Project.</p>\n<p>Fundraisingscript Project Creators never receive users'' credit card information.</p>\n<h3 style="border-width: 0px; margin: 0px 0px 0.5em; padding: 0.2em 0px; color: rgb(34, 34, 34); line-height: 1.25em; font-family: inherit; font-size: 1.3em; font-style: inherit; font-weight: bold; vertical-align: baseline; outline-width: 0px;">Wrap-up</h3>\n<p>Fundraisingscript<a id="fck_paste_padding">?</a> reserves the right to update this privacy policy at anytime. Updates to our privacy policy will be sent to the email address that you have provided us or posted prominently on the website.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">We reserve the right to disclose your personally identifiable information as required by law and when we believe that disclosure is necessary to protect our rights, or in the good-faith belief that such action is necessary to comply with state and federal laws (such as U.S. Copyright Law).</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">To modify or delete any or all of the personal information you have provided to us, please log in and update your profile.</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">?</p>\n<p style="border-width: 0px; margin: 0px 0px 1em; padding: 0px; font-family: inherit; font-size: 13px; font-style: inherit; vertical-align: baseline; outline-width: 0px;">?</p>', 'privacy_policy', '1', 'Fundraising script Privacy Policy', 'Fundraising script Privacy Policy', 'yes', '0', '0', '0', ''),
(14, 0, 'Contact Us', '', '', '0', '', '', 'yes', 'yes', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments_gateways`
--

CREATE TABLE IF NOT EXISTS `payments_gateways` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `function_name` varchar(200) NOT NULL,
  `suapport_masspayment` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payments_gateways`
--

INSERT INTO `payments_gateways` (`id`, `name`, `status`, `image`, `function_name`, `suapport_masspayment`) VALUES
(1, 'Paypal', 'Active', 'fancybox-y.png', 'paypal', 'No'),
(3, 'Amazon Payment', 'Active', 'fancy_shadow_nw.png', 'amazon_payment', 'No'),
(4, 'Authorize.net(AIM)', 'Inactive', 'images.jpeg', 'auth_net_aim', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE IF NOT EXISTS `paypal` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `site_status` varchar(25) NOT NULL,
  `application_id` varchar(255) NOT NULL,
  `paypal_email` varchar(250) NOT NULL,
  `paypal_username` varchar(150) NOT NULL,
  `paypal_password` varchar(255) NOT NULL,
  `paypal_signature` varchar(255) NOT NULL,
  `preapproval` int(2) NOT NULL COMMENT 'instant = 0,preapprove =1',
  `fees_taken_from` varchar(50) NOT NULL,
  `transaction_fees` double(10,2) NOT NULL,
  `gateway_status` int(2) NOT NULL,
  `donate_limit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`id`, `site_status`, `application_id`, `paypal_email`, `paypal_username`, `paypal_password`, `paypal_signature`, `preapproval`, `fees_taken_from`, `transaction_fees`, `gateway_status`, `donate_limit`) VALUES
(1, 'sandbox', 'APP-80W284485P519543T', 'jigar_1313046627_biz@gmail.com', 'jigar_1313046627_biz_api1.gmail.com', '1313046663', 'AMuOxt1FpmAKBEJ6exYeVH0TefE8AHDjH6WasXwi3PskdUAUPWS2au44', 0, 'SENDER', 5.00, 0, '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_credit_card`
--

CREATE TABLE IF NOT EXISTS `paypal_credit_card` (
  `paypal_credit_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_version` varchar(50) NOT NULL,
  `credit_card_proxy_port` int(50) NOT NULL,
  `credit_card_proxy_host` varchar(100) NOT NULL,
  `credit_card_use_proxy` int(20) NOT NULL DEFAULT '0' COMMENT '0=no,1=yes',
  `credit_card_subject` varchar(255) NOT NULL,
  `credit_card_preapproval` int(20) NOT NULL DEFAULT '0' COMMENT '0=instant,1=preapprove',
  `credit_card_api_signature` varchar(255) NOT NULL,
  `credit_card_username` varchar(255) NOT NULL,
  `credit_card_password` varchar(255) NOT NULL,
  `credit_card_site_status` int(20) NOT NULL COMMENT '0=sandbox,1=live',
  `credit_card_gateway_status` int(20) NOT NULL COMMENT '0=inactive,1=active',
  PRIMARY KEY (`paypal_credit_card_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paypal_credit_card`
--

INSERT INTO `paypal_credit_card` (`paypal_credit_card_id`, `credit_card_version`, `credit_card_proxy_port`, `credit_card_proxy_host`, `credit_card_use_proxy`, `credit_card_subject`, `credit_card_preapproval`, `credit_card_api_signature`, `credit_card_username`, `credit_card_password`, `credit_card_site_status`, `credit_card_gateway_status`) VALUES
(1, '76.0', 808, '127.0.0.1', 0, '', 0, 'Abg0gYcQyxQvnf2HDJkKtA-p6pqhA1k-KTYE0Gcy1diujFio4io5Vqjf', 'platfo_1255077030_biz_api1.gmail.com', '1255077037', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perk`
--

CREATE TABLE IF NOT EXISTS `perk` (
  `perk_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `perk_title` varchar(255) NOT NULL,
  `perk_description` text NOT NULL,
  `perk_amount` varchar(255) NOT NULL,
  `perk_total` varchar(255) NOT NULL,
  `perk_get` varchar(255) NOT NULL,
  `coupon_id` int(100) DEFAULT NULL,
  `coupon_status` varchar(20) NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`perk_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `perk`
--

INSERT INTO `perk` (`perk_id`, `project_id`, `perk_title`, `perk_description`, `perk_amount`, `perk_total`, `perk_get`, `coupon_id`, `coupon_status`) VALUES
(1, 1, '2sd', 'sdsd', '23', '23', '', NULL, 'inactive'),
(2, 2, 'sdsds', 'sdsds', '1', '1', '', NULL, 'inactive'),
(3, 3, 'sdsds', 'dsdsd', '23', '23', '', NULL, 'inactive'),
(4, 4, 'sdsdsd', 'sdsdsds', '23', '23', '', NULL, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `url_project_title` varchar(255) NOT NULL,
  `project_summary` text NOT NULL,
  `project_address` varchar(255) NOT NULL,
  `project_city` varchar(255) NOT NULL,
  `project_state` varchar(255) NOT NULL,
  `project_country` varchar(255) NOT NULL,
  `project_lat` varchar(255) NOT NULL,
  `project_long` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `display_page` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video_type` varchar(10) NOT NULL,
  `video` text NOT NULL,
  `custom_video` text NOT NULL,
  `video_image` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `amount_get` varchar(255) NOT NULL,
  `end_date` datetime NOT NULL,
  `allow_overflow` varchar(255) NOT NULL,
  `host_ip` varchar(255) NOT NULL,
  `total_rate` varchar(255) NOT NULL,
  `vote` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `active_cnt` int(10) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `total_days` int(50) NOT NULL,
  `is_featured` int(10) NOT NULL DEFAULT '0',
  `project_draft` int(10) NOT NULL DEFAULT '0',
  `end_send` int(10) NOT NULL DEFAULT '0',
  `p_google_code` varchar(255) NOT NULL,
  `payment_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `user_id`, `category_id`, `project_title`, `url_project_title`, `project_summary`, `project_address`, `project_city`, `project_state`, `project_country`, `project_lat`, `project_long`, `color`, `description`, `display_page`, `image`, `video_type`, `video`, `custom_video`, `video_image`, `amount`, `amount_get`, `end_date`, `allow_overflow`, `host_ip`, `total_rate`, `vote`, `status`, `active`, `active_cnt`, `date_added`, `total_days`, `is_featured`, `project_draft`, `end_send`, `p_google_code`, `payment_type`) VALUES
(1, 1, 15, 'test', 'test1', 'd  ew w e', '', 'vsda', 'adadad', 'dadadadada', '', '', '', '<p>&nbsp;edwe we w w&nbsp;</p>', '1', '', '0', 'wewe w', '', '', '1213', '', '2012-10-01 18:36:44', '', '127.0.0.1', '', '', '1', '1', 1, '2012-09-13 18:36:44', 18, 1, 1, 0, '', 0),
(2, 2, 17, 'credit card test', 'credit-card-test1', 'sdsd sds ds', '', 'sdsd', 'sdsds', 'dsdsd', '', '', '', '<p>sds sds </p>', '1', '', '0', 'sds', '', '', '1200', '55', '2012-10-28 14:53:24', '', '127.0.0.1', '', '', '1', '1', 1, '2012-09-17 14:53:24', 41, 1, 1, 0, '', 0),
(3, 3, 12, 'sd s d sd s ', 'sd-s-d-sd-s-1', 'sds s sd dss s s sds ', '', 'sdsd', 'sdsd', 'sdsdsd', '', '', '', 'ss s ds ds ds ds dsd  ', '1', '', '0', 'sdsdsss', '', '', '1232', '', '2012-10-28 11:13:16', '', '127.0.0.1', '', '', '1', '0', 0, '2012-09-20 00:00:00', 38, 0, 1, 0, '', 0),
(4, 1, 9, 'aasas', 'aasas1', 'sdsd sd sds', '', 'dxsd', 'sds', 'dsd', '', '', '', '<img src="http://localhost/pinterest/editor/files/images/477748_3664840577043_1155621853_33495972_1282829224_o.jpg"  #000000" width="400" height="282">  ', '1', '', '0', 'sds', '', '', '1212', '', '2012-09-24 12:31:33', '', '127.0.0.1', '', '', '1', '0', 0, '2012-09-20 00:00:00', 4, 0, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

CREATE TABLE IF NOT EXISTS `project_category` (
  `project_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_category_name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `parent_project_category_id` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`project_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `project_category`
--

INSERT INTO `project_category` (`project_category_id`, `project_category_name`, `active`, `parent_project_category_id`) VALUES
(3, 'Education fund', '1', 0),
(5, 'Gifts', '1', 0),
(6, 'Tsunami Charity', '1', 3),
(7, 'Poor people', '1', 3),
(8, 'Earthquake', '1', 3),
(9, 'Hospital', '1', 3),
(11, 'Accidents & Personal Crisis', '1', 3),
(12, 'Creative Projects: Art, Music, Film', '1', 3),
(13, 'Sports, Teams & Clubs', '1', 3),
(14, 'Weddings & Honeymoons', '1', 5),
(15, 'Medical, Illness & Healing', '1', 5),
(16, 'Animals & Pets', '0', 5),
(17, 'Celebrations & Special Events', '1', 5),
(18, 'Babies, Kids & Family', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `project_flag`
--

CREATE TABLE IF NOT EXISTS `project_flag` (
  `project_flag_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_flag_name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`project_flag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_flag`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project_follower`
--

INSERT INTO `project_follower` (`project_follow_id`, `project_id`, `project_follow_user_id`, `project_follow_date`) VALUES
(3, 2, 1, '2012-09-18 16:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `project_gallery`
--

CREATE TABLE IF NOT EXISTS `project_gallery` (
  `project_gallery_id` int(100) NOT NULL AUTO_INCREMENT,
  `project_id` int(100) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`project_gallery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_gallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_setting`
--

CREATE TABLE IF NOT EXISTS `project_setting` (
  `project_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `enable_paypal` varchar(255) NOT NULL,
  `payment_flow` varchar(255) NOT NULL,
  `pay_fee` varchar(255) NOT NULL,
  `project_listing_fee` varchar(255) NOT NULL,
  `project_listing_fee_type` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `project_short_desc_length` varchar(255) NOT NULL,
  `site_stat_front` varchar(255) NOT NULL,
  `min_project_amount` varchar(255) NOT NULL,
  `max_project_amount` varchar(255) NOT NULL,
  `project_user` varchar(255) NOT NULL,
  `edit_amount` varchar(255) NOT NULL,
  `edit_end_date` date NOT NULL,
  `approve_project` varchar(255) NOT NULL,
  `cancel_project` varchar(255) NOT NULL,
  `default_pledge` varchar(255) NOT NULL,
  `enable_fixed_pledge` varchar(255) NOT NULL,
  `enable_owner_fixed_amount` varchar(255) NOT NULL,
  `enable_multiple_type` varchar(255) NOT NULL,
  `enable_owner_multiple_amount` varchar(255) NOT NULL,
  `enable_suggested_type` varchar(255) NOT NULL,
  `enable_owner_suggested_amount` varchar(255) NOT NULL,
  `enable_min_amount` varchar(255) NOT NULL,
  `enable_owner_min_amount` varchar(255) NOT NULL,
  `allow_guest_backers_list` varchar(255) NOT NULL,
  `allow_guest_backers_amount` varchar(255) NOT NULL,
  `allow_backers_amount` varchar(255) NOT NULL,
  `allow_cancel_pledge_backers` varchar(255) NOT NULL,
  `min_days_pledge_cancel` varchar(255) NOT NULL,
  `allow_cancel_pledge_owner` varchar(255) NOT NULL,
  `allow_owner_fund_own` varchar(255) NOT NULL,
  `allow_owner_fund_other` varchar(255) NOT NULL,
  `enable_project_reward` varchar(255) NOT NULL,
  `reward_detail_optional` varchar(255) NOT NULL,
  `allow_owner_edit_reward` varchar(255) NOT NULL,
  `small_project_max_days` varchar(255) NOT NULL,
  `small_project_max_amount` varchar(255) NOT NULL,
  `funded_percentage` varchar(255) NOT NULL,
  `no_of_category` varchar(255) NOT NULL,
  `enable_overfund` varchar(255) NOT NULL,
  `owner_set_overfund` varchar(255) NOT NULL,
  `enable_project_follower` varchar(255) NOT NULL,
  `enable_project_comment` varchar(255) NOT NULL,
  `enable_update_comment` varchar(255) NOT NULL,
  `enable_project_rating` varchar(255) NOT NULL,
  `logged_user_login` varchar(255) NOT NULL,
  `enable_project_flag` varchar(255) NOT NULL,
  `auto_suspend_project` varchar(255) NOT NULL,
  `auto_fund_capture` varchar(255) NOT NULL,
  `auto_suspend_comment` varchar(255) NOT NULL,
  `auto_suspend_update` varchar(255) NOT NULL,
  `auto_suspend` varchar(255) NOT NULL,
  `auto_suspend_message` varchar(255) NOT NULL,
  PRIMARY KEY (`project_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `project_status_name` varchar(255) NOT NULL,
  PRIMARY KEY (`project_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `rights_id` int(100) NOT NULL AUTO_INCREMENT,
  `rights_name` varchar(255) NOT NULL,
  PRIMARY KEY (`rights_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

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
(58, 'list_credit_card');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

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
(53, 1, 58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `school_url_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` varchar(20) NOT NULL,
  `school_order` int(10) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(8, 'dcsdcsds', 'dcsdcsds', '<p>sdsdfsfsfsfsfsf csfcsf</p>', '0', 20);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE IF NOT EXISTS `site_setting` (
  `site_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL,
  `site_version` varchar(255) NOT NULL,
  `site_language` varchar(255) NOT NULL,
  `currency_symbol` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `date_format` varchar(255) NOT NULL,
  `time_format` varchar(255) NOT NULL,
  `date_time_format` varchar(255) NOT NULL,
  `date_format_tooltip` varchar(255) NOT NULL,
  `time_format_tooltip` varchar(255) NOT NULL,
  `date_time_format_tooltip` varchar(255) NOT NULL,
  `date_time_highlight_tooltip` varchar(255) NOT NULL,
  `site_tracker` varchar(255) NOT NULL,
  `robots` varchar(255) NOT NULL,
  `how_it_works_video` varchar(255) NOT NULL,
  `normal_paypal` int(10) NOT NULL DEFAULT '1',
  `paypal_status` varchar(255) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `paypal_API_UserName` varchar(255) NOT NULL,
  `paypal_API_Password` varchar(255) NOT NULL,
  `paypal_API_Signature` varchar(255) NOT NULL,
  `donation_amount` varchar(50) DEFAULT NULL,
  `maximum_donation_amount` double(10,2) NOT NULL DEFAULT '2000.00',
  `auto_target_achive` int(10) NOT NULL DEFAULT '0',
  `ending_soon` int(20) NOT NULL DEFAULT '7',
  `popular` double(10,2) NOT NULL DEFAULT '60.00',
  `successful` double(10,2) NOT NULL DEFAULT '90.00',
  `small_project` int(20) NOT NULL DEFAULT '1000',
  `site_logo` varchar(255) NOT NULL,
  `site_logo_hover` varchar(255) NOT NULL,
  `fund_ideas` varchar(255) NOT NULL,
  `project_min_days` int(5) NOT NULL,
  `project_max_days` int(5) NOT NULL,
  `time_zone` varchar(255) NOT NULL,
  `mobile_site` int(1) NOT NULL DEFAULT '1',
  `currency_symbol_side` varchar(50) NOT NULL,
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
  PRIMARY KEY (`site_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`site_setting_id`, `site_name`, `site_version`, `site_language`, `currency_symbol`, `currency_code`, `date_format`, `time_format`, `date_time_format`, `date_format_tooltip`, `time_format_tooltip`, `date_time_format_tooltip`, `date_time_highlight_tooltip`, `site_tracker`, `robots`, `how_it_works_video`, `normal_paypal`, `paypal_status`, `paypal_email`, `paypal_url`, `paypal_API_UserName`, `paypal_API_Password`, `paypal_API_Signature`, `donation_amount`, `maximum_donation_amount`, `auto_target_achive`, `ending_soon`, `popular`, `successful`, `small_project`, `site_logo`, `site_logo_hover`, `fund_ideas`, `project_min_days`, `project_max_days`, `time_zone`, `mobile_site`, `currency_symbol_side`, `decimal_points`, `enable_funding_option`, `flexible_fees`, `suc_flexible_fees`, `fixed_fees`, `instant_fees`, `minimum_goal`, `maximum_goal`, `minimum_reward_amount`, `maximum_reward_amount`, `maximum_project_per_year`, `maximum_donate_per_project`, `enable_facebook_stream`, `enable_twitter_stream`) VALUES
(2, 'Fundraising Script', '2.0', '2', '$', 'USD', 'd M,Y', 'HH:MM:SS', '', '', '', '', '', 'UA-23165973-1', '', '', 0, 'sandbox', 'jigar_1313046627_biz@gmail.com', 'https://www.sandbox.paypal.com/cgi-bin/webscri', 'jigar_1313046627_biz_api1.gmail.com', '1313046663', 'AMuOxt1FpmAKBEJ6exYeVH0TefE8AHDjH6WasXwi3PskdUAUPWS2au44', '5', 2000.00, 0, 30, 1.00, 100.00, 1000, '37646logo.png', '66141logo_hover.png', '1', 5, 90, 'America/New_York', 1, 'left', 2, 0, '10.00', '7.00', '5.00', 5.00, '100.00', 2000.00, 15.00, 100.00, 10, 10, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `spam_control`
--

INSERT INTO `spam_control` (`spam_control_id`, `spam_report_total`, `spam_report_expire`, `total_register`, `register_expire`, `total_comment`, `comment_expire`, `total_contact`, `contact_expire`) VALUES
(1, 5, 7, 2, 7, 10, 10, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `spam_inquiry`
--

CREATE TABLE IF NOT EXISTS `spam_inquiry` (
  `inquire_id` int(100) NOT NULL AUTO_INCREMENT,
  `inquire_spam_ip` varchar(255) NOT NULL,
  `inquire_date` date NOT NULL,
  PRIMARY KEY (`inquire_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `spam_inquiry`
--


-- --------------------------------------------------------

--
-- Table structure for table `spam_ip`
--

CREATE TABLE IF NOT EXISTS `spam_ip` (
  `spam_id` int(100) NOT NULL AUTO_INCREMENT,
  `spam_ip` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `permenant_spam` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`spam_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `spam_ip`
--


-- --------------------------------------------------------

--
-- Table structure for table `spam_report_ip`
--

CREATE TABLE IF NOT EXISTS `spam_report_ip` (
  `spam_report_id` int(100) NOT NULL AUTO_INCREMENT,
  `spam_ip` varchar(255) NOT NULL,
  `spam_user_id` int(100) NOT NULL,
  `reported_user_id` int(100) NOT NULL,
  PRIMARY KEY (`spam_report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `spam_report_ip`
--


-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`, `active`) VALUES
(11, 2, 'Gujarat', '1'),
(14, 117, 'Artigas', '1'),
(15, 117, 'Canelones', '1'),
(16, 117, 'Cerro Largo', '1'),
(17, 117, 'Colonia', '1'),
(18, 117, 'Durazno', '1'),
(19, 117, 'Flores', '1'),
(21, 117, 'Florida', '1'),
(22, 117, 'Lavalleja', '1'),
(23, 117, 'Maldonado', '1'),
(24, 117, 'Montevideo', '1'),
(25, 117, 'Paysandu', '1'),
(26, 117, 'Rivera', '1'),
(27, 117, 'Rocha', '1'),
(28, 117, 'Salto', '1'),
(29, 18, 'Canberra', '1'),
(30, 19, 'Vienna', '1'),
(31, 21, 'Nassau', '1'),
(32, 34, 'Brasilia', '1'),
(33, 42, 'Ottawa', '1'),
(34, 44, 'Bangui', '1'),
(36, 47, 'Beijing', '1'),
(37, 47, 'Shaanxi', '1'),
(38, 47, 'Shanghai', '1'),
(39, 51, 'San Jose', '1'),
(40, 54, 'Nicosia', '1'),
(41, 56, 'denmark', '1'),
(46, 7, 'Suva', '1'),
(47, 68, 'Paris', '1'),
(48, 68, 'Gers', '1'),
(49, 68, 'Jura', '1'),
(50, 68, 'Savoie', '1'),
(51, 71, 'Atlanta', '1'),
(52, 72, 'Berlin', '1'),
(53, 73, 'Accra', '1'),
(54, 79, 'Port-au-Prince', '1'),
(55, 83, 'Victoria', '1'),
(56, 83, 'Fragrance Harbour ', '1'),
(57, 2, 'Delhi', '1'),
(58, 90, 'Rome', '1'),
(59, 3, 'Tokyo', '1'),
(60, 3, 'Yokohama', '1'),
(61, 3, 'Osaka', '1'),
(62, 3, 'Nagoya', '1'),
(63, 3, 'Sapporo', '1'),
(64, 3, 'Kobe', '1'),
(65, 3, 'Kyoto', '1'),
(66, 3, 'Fukuoka', '1'),
(67, 3, 'Kawasaki', '1'),
(68, 3, 'Saitama', '1'),
(69, 3, 'Hiroshima', '1'),
(70, 3, 'Sendai', '1'),
(71, 3, 'Kitakyushu ', '1'),
(72, 94, 'Nairobi', '1'),
(73, 102, 'Beirut', '1'),
(74, 105, 'Tripoli ', '1'),
(75, 113, 'Kuala Lumpur', '1'),
(76, 121, 'mexico city', '1'),
(77, 124, 'Monte Carlo', '1'),
(78, 127, 'Rabat', '1'),
(79, 132, 'Amsterdam', '1'),
(80, 134, 'Wellington', '1'),
(81, 139, 'Oslo', '1'),
(82, 137, 'Abuja', '1'),
(83, 144, 'Panama City', '1'),
(84, 147, 'Lima', '1'),
(85, 150, 'Lisbon', '1'),
(86, 149, 'Warsaw', '1'),
(87, 6, 'Moscow', '1'),
(88, 207, 'singapore', '1'),
(89, 1, 'Alabama', '1'),
(90, 1, 'Alaska', '1'),
(91, 1, 'AriZona', '1'),
(92, 1, 'California', '1'),
(93, 1, 'Arlamsa', '1'),
(94, 1, 'colorado', '1'),
(95, 1, 'DC', '1'),
(96, 1, 'Delaware', '1'),
(97, 1, 'Florida', '1'),
(98, 1, 'Georgia', '1'),
(99, 1, 'Hawaii', '1'),
(100, 1, 'Idaho', '1'),
(101, 1, 'Illinois', '1'),
(102, 1, 'Indiana', '1'),
(103, 1, 'Iowa', '1'),
(104, 1, 'Kansas', '1'),
(105, 1, 'Kentucky', '1'),
(106, 1, 'Louisiana', '1'),
(107, 1, 'Maine', '1'),
(108, 1, 'Maryland', '1'),
(109, 1, 'Massachusetts', '1'),
(110, 1, 'Michigan', '1'),
(111, 1, 'Minnesota', '1'),
(112, 1, 'Mississippi', '1'),
(113, 1, 'Missouri', '1'),
(114, 1, 'montana', '1'),
(115, 1, 'Nebraska', '1'),
(116, 1, 'Nevada', '1'),
(117, 1, 'New Hampshire', '1'),
(118, 1, 'New Mexico', '1'),
(119, 1, 'New York', '1'),
(120, 1, 'New Jersey', '1'),
(121, 1, 'North Carolina', '1'),
(122, 1, 'North Dakota', '1'),
(123, 1, 'Ohio', '1'),
(124, 1, 'Oklahoma', '1'),
(125, 1, 'Oregon', '1'),
(126, 1, 'Pennsylvania', '1'),
(127, 1, 'Rhode Island', '1'),
(128, 1, 'South Carolina', '1'),
(129, 1, 'South Dakota', '1'),
(130, 1, 'Tennessee', '1'),
(131, 1, 'Texas', '1'),
(132, 1, 'Utah', '1'),
(133, 1, 'Vermont', '1'),
(134, 1, 'Virginia', '1'),
(135, 1, 'Washington', '1'),
(136, 1, 'West Virginia', '1'),
(137, 1, 'Wisconsin', '1'),
(138, 1, 'Wyoming', '1'),
(139, 173, 'Pretoria', '1'),
(140, 176, 'La Rioja', '1'),
(141, 176, 'Madrid', '1'),
(142, 176, 'Murcia', '1'),
(143, 176, 'Balearic Islands', '1'),
(144, 176, 'Aragon', '1'),
(145, 176, 'Catalonia', '1'),
(146, 176, 'Castilla-La Mancha', '1'),
(147, 176, 'Galicia', '1'),
(148, 181, 'Stockholm', '1'),
(149, 180, 'Bern', '1'),
(150, 194, 'Ankara Province', '1'),
(151, 5, 'London', '1'),
(154, 208, 'vado dara', '0');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_adaptive`
--

CREATE TABLE IF NOT EXISTS `temp_adaptive` (
  `temp_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `project_id` int(100) NOT NULL,
  `perk_id` int(100) NOT NULL DEFAULT '0',
  `total_amount` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pay_fee` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `host_ip` varchar(255) NOT NULL,
  `transaction_date_time` datetime NOT NULL,
  `paypal_paykey` varchar(255) NOT NULL,
  `paypal_adaptive_status` varchar(50) NOT NULL DEFAULT 'FAIL',
  `temp_anonymous` tinyint(1) NOT NULL,
  `facebook` int(1) NOT NULL,
  `twitter` int(1) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_adaptive`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_preapprove`
--

CREATE TABLE IF NOT EXISTS `temp_preapprove` (
  `temp_pre_id` int(100) NOT NULL AUTO_INCREMENT,
  `preapprovalKey` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `project_id` int(50) NOT NULL,
  `perk_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `host_ip` varchar(100) NOT NULL,
  `transaction_date_time` datetime NOT NULL,
  `temp_anonymous` tinyint(1) NOT NULL,
  `facebook` int(1) NOT NULL,
  `twitter` int(1) NOT NULL,
  PRIMARY KEY (`temp_pre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_preapprove`
--


-- --------------------------------------------------------

--
-- Table structure for table `timezone`
--

CREATE TABLE IF NOT EXISTS `timezone` (
  `timezid` int(11) NOT NULL AUTO_INCREMENT,
  `tz` varchar(255) NOT NULL,
  `gmt` text NOT NULL,
  PRIMARY KEY (`timezid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

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
  `amount` varchar(255) NOT NULL,
  `listing_fee` varchar(255) NOT NULL,
  `pay_fee` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `host_ip` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `transaction_date_time` datetime NOT NULL,
  `amazon_transaction_id` text NOT NULL,
  `paypal_paykey` varchar(255) NOT NULL,
  `paypal_adaptive_status` varchar(50) NOT NULL DEFAULT 'FAIL',
  `preapproval_key` varchar(255) NOT NULL,
  `preapproval_pay_key` varchar(255) NOT NULL,
  `preapproval_status` varchar(100) NOT NULL DEFAULT 'FAIL',
  `preapproval_total_amount` varchar(100) NOT NULL,
  `paypal_transaction_id` varchar(255) NOT NULL,
  `wallet_transaction_id` varchar(255) NOT NULL,
  `wallet_payment_status` tinyint(1) NOT NULL,
  `trans_anonymous` tinyint(1) NOT NULL,
  `credit_card_transaction_id` varchar(255) DEFAULT NULL,
  `credit_card_capture_transaction_id` varchar(255) DEFAULT NULL,
  `credit_card_payment_status` int(20) NOT NULL DEFAULT '0' COMMENT '0=not done,1=captured',
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `project_id`, `perk_id`, `amount`, `listing_fee`, `pay_fee`, `name`, `email`, `host_ip`, `comment`, `paypal_email`, `transaction_date_time`, `amazon_transaction_id`, `paypal_paykey`, `paypal_adaptive_status`, `preapproval_key`, `preapproval_pay_key`, `preapproval_status`, `preapproval_total_amount`, `paypal_transaction_id`, `wallet_transaction_id`, `wallet_payment_status`, `trans_anonymous`, `credit_card_transaction_id`, `credit_card_capture_transaction_id`, `credit_card_payment_status`) VALUES
(1, 1, 2, 0, '23.75', '0', '1.25', '', 'jigar.rockersinfo@gmail.com', '127.0.0.1', 'do_comment', 'jigar.rockersinfo@gmail.com', '2012-09-18 18:05:35', '', '', 'FAIL', '', '', 'FAIL', '', '', '', 0, 3, '04M52824V8179753S', NULL, 0),
(2, 1, 2, 0, '28.5', '0', '1.5', '', 'jigar.rockersinfo@gmail.com', '127.0.0.1', 'do_comment', 'jigar.rockersinfo@gmail.com', '2012-09-18 18:07:37', '', '', 'FAIL', '', '', 'FAIL', '', '', '', 0, 1, '1W633114HA677631S', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`transaction_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`translation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `translation_key`
--


-- --------------------------------------------------------

--
-- Table structure for table `translation_text`
--

CREATE TABLE IF NOT EXISTS `translation_text` (
  `text_id` int(11) NOT NULL AUTO_INCREMENT,
  `translation_id` int(11) NOT NULL,
  `key_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`text_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `translation_text`
--


-- --------------------------------------------------------

--
-- Table structure for table `twitter_setting`
--

CREATE TABLE IF NOT EXISTS `twitter_setting` (
  `twitter_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `twitter_enable` varchar(255) NOT NULL,
  `twitter_user_name` varchar(255) NOT NULL,
  `consumer_key` varchar(255) NOT NULL,
  `consumer_secret` varchar(255) NOT NULL,
  `access_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `autopost_site` varchar(255) NOT NULL,
  `autopost_user` varchar(255) NOT NULL,
  `twitter_url` text NOT NULL,
  PRIMARY KEY (`twitter_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `twitter_setting`
--

INSERT INTO `twitter_setting` (`twitter_setting_id`, `twitter_enable`, `twitter_user_name`, `consumer_key`, `consumer_secret`, `access_key`, `access_token`, `autopost_site`, `autopost_user`, `twitter_url`) VALUES
(1, '1', '0', 'TgeQNnvHfOB5f3OY8R5wIg', 'mTdMQMZmCsBu5eVXrldYuLlmWS9wT6f3oxsbZGFs', '0', '0', '0', '0', 'https://twitter.com/#!/bidpebid');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `updates` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_id`, `project_id`, `updates`, `image`, `status`, `date_added`) VALUES
(1, 4, '<h2 src=KSYDOUhttp://localhost/pinterest/editor/files/images/477748_3664840577043_1155621853_33495972_1282829224_o.jpgKSYDOU #000000KSYDOU=KSYDOUKSYDOU width=KSYDOU400KSYDOU height=KSYDOU282KSYDOU>&nbsp;dfd d f dfd d fs sds&nbsp;<img src=KSYDOUhttp://localhost/pinterest/editor/files/images/477748_3664840577043_1155621853_33495972_1282829224_o.jpgKSYDOU  #000000KSYDOU width=KSYDOU400KSYDOU height=KSYDOU282KSYDOU></h2>  ', 'no_img.jpg', '0', '2012-09-20 13:37:21'),
(2, 4, 'sd sds s s s  ', 'no_img.jpg', '0', '2012-09-20 13:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `is_admin` int(10) NOT NULL DEFAULT '0',
  `fb_uid` varchar(100) NOT NULL,
  `tw_id` varchar(255) DEFAULT NULL,
  `tw_screen_name` varchar(255) DEFAULT NULL,
  `tw_oauth_token` text,
  `tw_oauth_token_secret` text,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `paypal_verified` varchar(10) DEFAULT '0',
  `signup_ip` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `amazon_token_id` varchar(255) NOT NULL,
  `refund_token_id` varchar(255) NOT NULL,
  `user_about` text NOT NULL,
  `user_website` varchar(255) NOT NULL,
  `user_occupation` varchar(255) NOT NULL,
  `user_interest` text NOT NULL,
  `user_skill` text NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `linkedln_url` varchar(255) NOT NULL,
  `googleplus_url` varchar(255) NOT NULL,
  `bandcamp_url` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `myspace_url` varchar(255) NOT NULL,
  `confirm_key` varchar(25) NOT NULL,
  `unique_code` varchar(255) DEFAULT NULL,
  `reference_user_id` int(100) DEFAULT NULL,
  `enable_facebook_stream` tinyint(1) NOT NULL,
  `enable_twitter_stream` tinyint(1) NOT NULL,
  `image_no` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `last_name`, `email`, `password`, `image`, `gender`, `is_admin`, `fb_uid`, `tw_id`, `tw_screen_name`, `tw_oauth_token`, `tw_oauth_token_secret`, `address`, `city`, `state`, `country`, `zip_code`, `paypal_email`, `paypal_verified`, `signup_ip`, `active`, `date_added`, `amazon_token_id`, `refund_token_id`, `user_about`, `user_website`, `user_occupation`, `user_interest`, `user_skill`, `facebook_url`, `twitter_url`, `linkedln_url`, `googleplus_url`, `bandcamp_url`, `youtube_url`, `myspace_url`, `confirm_key`, `unique_code`, `reference_user_id`, `enable_facebook_stream`, `enable_twitter_stream`, `image_no`) VALUES
(1, 'kash', 'gandhi', 'jigar.rockersinfo@gmail.com', '12345678', 'no_img.jpg', '', 0, '0', '0', '0', '0', '0', '', '', '', '', '', '', '0', '127.0.0.1', '1', '2012-09-13 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'gaLE4y73dK', 'DpW6MenPW7Fg', 2, 0, 0, ''),
(2, 'vivek', 'sangani', 'vivek.rockersinfo@gmail.com', '12345678', 'no_img.jpg', '', 0, '0', '0', '0', '0', '0', '', '', '', '', '', '', '0', '127.0.0.1', '1', '2012-09-13 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'H8Xz0bsZWy', 'xFmGcj2YtxJS', 0, 0, 0, ''),
(3, 'user', 'demo', 'user@demo.com', '12345678', '', '', 0, '0', '0', '0', '0', '0', '', '', '', '', '', '', '0', '127.0.0.1', '1', '2012-09-20 11:09:21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3U6S982BfZ', 'rfN3WxdPgmTT', 0, 0, 0, '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_card_info`
--

INSERT INTO `user_card_info` (`user_card_id`, `user_id`, `card_first_name`, `card_last_name`, `card_number`, `card_type`, `card_expiration_month`, `card_expiration_year`, `card_address`, `card_city`, `card_state`, `card_zipcode`, `card_transaction_id`, `card_verify_status`, `card_date`, `card_ip`, `card_paypal_email`, `card_paypal_verify`) VALUES
(1, 1, 'John', 'doe', '7d4hriSHlVqJbs2mJ7qRfIMUKUSno1vkGxByxuWCNNI=|DfqmZWVgeglJmTW9NuGft15RU5qvEUn71B5w63dBGlE=', 'MasterCard', 1, 2016, 'sdhushdush', 'djhfjdhj', 'jfdfjhdj', '545545', '4A326236Y3103052H', 1, '2012-09-17 16:28:18', '127.0.0.1', '', 0),
(4, 2, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', NULL, 'vivek.rockerinfo@gmail.com', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_follow`
--

INSERT INTO `user_follow` (`follower_id`, `follow_user_id`, `follow_by_user_id`, `user_follow_date`) VALUES
(2, 2, 1, '2012-09-18 15:22:43'),
(3, 2, 3, '2012-09-20 11:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`login_id`, `user_id`, `login_date_time`, `login_ip`) VALUES
(1, 1, '2012-09-13 16:54:45', '127.0.0.1'),
(2, 2, '2012-09-13 17:50:44', '127.0.0.1'),
(3, 1, '2012-09-14 09:38:51', '127.0.0.1'),
(4, 2, '2012-09-14 09:39:05', '127.0.0.1'),
(5, 1, '2012-09-14 11:55:06', '127.0.0.1'),
(6, 2, '2012-09-14 11:58:02', '127.0.0.1'),
(7, 1, '2012-09-14 17:50:52', '127.0.0.1'),
(8, 1, '2012-09-17 10:35:01', '127.0.0.1'),
(9, 1, '2012-09-17 13:30:39', '127.0.0.1'),
(10, 2, '2012-09-17 14:48:03', '127.0.0.1'),
(11, 2, '2012-09-17 18:40:41', '127.0.0.1'),
(12, 2, '2012-09-18 09:50:28', '127.0.0.1'),
(13, 1, '2012-09-18 09:50:34', '127.0.0.1'),
(14, 1, '2012-09-18 14:11:08', '127.0.0.1'),
(15, 2, '2012-09-18 18:01:03', '127.0.0.1'),
(16, 1, '2012-09-19 09:40:09', '127.0.0.1'),
(17, 2, '2012-09-19 09:40:20', '127.0.0.1'),
(18, 1, '2012-09-19 17:59:28', '127.0.0.1'),
(19, 1, '2012-09-20 11:06:43', '127.0.0.1'),
(20, 2, '2012-09-20 11:07:56', '127.0.0.1'),
(21, 3, '2012-09-20 11:09:48', '127.0.0.1'),
(22, 2, '2012-09-20 15:59:43', '127.0.0.1'),
(23, 3, '2012-09-20 16:02:37', '127.0.0.1');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `user_id`, `user_alert`, `add_fund`, `project_alert`, `comment_alert`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_setting`
--

CREATE TABLE IF NOT EXISTS `user_setting` (
  `user_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_with` varchar(255) NOT NULL,
  `admin_activation` varchar(255) NOT NULL,
  `email_varification` varchar(255) NOT NULL,
  `auto_login` varchar(255) NOT NULL,
  `notification_mail` varchar(255) NOT NULL,
  `welcome_mail` varchar(255) NOT NULL,
  `password_change_logout` varchar(255) NOT NULL,
  `enable_openid` varchar(255) NOT NULL,
  `user_switch_language` varchar(255) NOT NULL,
  PRIMARY KEY (`user_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_setting`
--

INSERT INTO `user_setting` (`user_setting_id`, `login_with`, `admin_activation`, `email_varification`, `auto_login`, `notification_mail`, `welcome_mail`, `password_change_logout`, `enable_openid`, `user_switch_language`) VALUES
(1, 'b', 'b', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `debit` varchar(200) NOT NULL,
  `credit` varchar(200) NOT NULL,
  `user_id` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `admin_status` varchar(100) NOT NULL DEFAULT 'Review',
  `wallet_date` datetime NOT NULL,
  `wallet_transaction_id` varchar(255) NOT NULL,
  `wallet_payee_email` varchar(255) NOT NULL,
  `wallet_ip` varchar(255) NOT NULL,
  `gateway_id` int(10) NOT NULL,
  `project_id` int(100) NOT NULL,
  `donate_status` tinyint(1) NOT NULL,
  `reason` longtext NOT NULL,
  `wallet_anonymous` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wallet`
--


-- --------------------------------------------------------

--
-- Table structure for table `wallet_bank`
--

CREATE TABLE IF NOT EXISTS `wallet_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `withdraw_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `bank_ifsc_code` varchar(255) NOT NULL,
  `bank_address` varchar(255) NOT NULL,
  `bank_city` varchar(255) NOT NULL,
  `bank_state` varchar(255) NOT NULL,
  `bank_country` varchar(255) NOT NULL,
  `bank_zipcode` varchar(255) NOT NULL,
  `bank_unique_id` varchar(255) NOT NULL,
  `bank_account_holder_name` varchar(255) NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `bank_withdraw_type` varchar(100) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wallet_bank`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `withdraw_ip` varchar(255) NOT NULL,
  `withdraw_method` varchar(50) NOT NULL,
  `withdraw_amount` double(10,2) NOT NULL,
  `withdraw_status` varchar(100) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wallet_withdraw`
--


-- --------------------------------------------------------

--
-- Table structure for table `wallet_withdraw_gateway`
--

CREATE TABLE IF NOT EXISTS `wallet_withdraw_gateway` (
  `gateway_withdraw_id` int(100) NOT NULL AUTO_INCREMENT,
  `withdraw_id` int(100) NOT NULL,
  `gateway_name` varchar(255) NOT NULL,
  `gateway_account` varchar(255) NOT NULL,
  `gateway_city` varchar(255) NOT NULL,
  `gateway_state` varchar(255) NOT NULL,
  `gateway_country` varchar(255) NOT NULL,
  `gateway_zip` varchar(255) NOT NULL,
  PRIMARY KEY (`gateway_withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wallet_withdraw_gateway`
--


-- --------------------------------------------------------

--
-- Table structure for table `word_detecter_setting`
--

CREATE TABLE IF NOT EXISTS `word_detecter_setting` (
  `word_detecter_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `enable_word_detecter` varchar(255) NOT NULL,
  `words` text NOT NULL,
  PRIMARY KEY (`word_detecter_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
