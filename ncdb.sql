-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2016 at 09:01 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ncdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE IF NOT EXISTS `article_comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  `comment` text NOT NULL,
  `is_approved` varchar(1) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `category_slug` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_page` int(11) NOT NULL,
  PRIMARY KEY (`categ_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `msgID` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(45) NOT NULL,
  `body` text NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `is_read` varchar(2) NOT NULL,
  `date_recieved` varchar(30) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  PRIMARY KEY (`msgID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `date_subscribed` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `content` longtext NOT NULL,
  `date_posted` date NOT NULL,
  `posted_by` int(11) NOT NULL,
  `parent_category` int(11) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE IF NOT EXISTS `site_info` (
  `configID` int(11) NOT NULL AUTO_INCREMENT,
  `configDesc` varchar(45) NOT NULL,
  `configValue` text NOT NULL,
  PRIMARY KEY (`configID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`configID`, `configDesc`, `configValue`) VALUES
(1, 'site_title', 'Neko CMS v2'),
(2, 'site_meta_desc', 'Find tutorial here about Anything you want Programming Language, Android, Photography and many more. This is a Simple Blogging built using Codeigniter. A very simple content management system using codeigniter framework,bootstrap , jquery and mysql'),
(3, 'site_owner', 'Novi & Whoami'),
(4, 'site_meta_keywords', 'NekoCMS,NekoCms,CMS,Blog,Programming,Android,NekoCMS,simple cms,free cms neko,codeigniter neko,codeigniter simple cms,neko kel novi,codeigniter cms,novhex codeigniter'),
(5, 'site_footer', 'Neko CMS v2 2016 sample lang to');

-- --------------------------------------------------------

--
-- Table structure for table `theme_settings`
--

CREATE TABLE IF NOT EXISTS `theme_settings` (
  `ts_ID` int(11) NOT NULL AUTO_INCREMENT,
  `theme_path` varchar(255) NOT NULL,
  `is_activated` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`ts_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `theme_settings`
--

INSERT INTO `theme_settings` (`ts_ID`, `theme_path`, `is_activated`) VALUES
(1, 'custom-themes/clean_blog/', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usrs_ID` int(11) NOT NULL AUTO_INCREMENT,
  `usrs_UID` varchar(10) NOT NULL,
  `usrs_username` varchar(20) NOT NULL,
  `usrs_full_name` varchar(100) NOT NULL,
  `usrs_pw` varchar(255) NOT NULL,
  `usrs_email` varchar(255) NOT NULL,
  `profile_photo` text NOT NULL,
  `usrs_date_added` date NOT NULL,
  `usrs_last_logged` datetime NOT NULL,
  `usrs_role` enum('admin','writer') NOT NULL,
  PRIMARY KEY (`usrs_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrs_ID`, `usrs_UID`, `usrs_username`, `usrs_full_name`, `usrs_pw`, `usrs_email`, `profile_photo`, `usrs_date_added`, `usrs_last_logged`, `usrs_role`) VALUES
(1, '', 'root_eleven', 'Kel', '$2y$15$gAwmRb2k7yF2MmgTaxXFSe/rLOle1yc2O5Mw2RH6.MIvyfsVZlMcC', 'novhz0514@gmail.com', '', '2016-04-30', '2016-06-01 09:18:26', 'admin'),
(2, '', 'noviadmin', 'Novi', '$2y$15$gZO/bm164mf6ElP/lWLIv.3j.9dxW.WJpV4Da9mwQb4PMOscxy0OK', 'novi@mail.com', 'http://localhost/nekov2/images/ceab5b19ebf8c105996245a208d566ed22015_10151274652743197_218860783_n.jpg', '2016-05-01', '2016-06-18 08:40:02', 'admin'),
(3, '', 'mr_writer', 'Mister Write', '$2y$15$B7pKSUhlriv/Xc//V4mjq.Hf/oQXrlsPxAbleMbfpg.xOogTIi77a', 'mr_writer@mail.com', '', '2016-05-01', '2016-06-01 07:40:37', 'writer'),
(4, '', 'michael_novi', 'Michael Novi', '$2y$15$ym2nObZZNQSIrxU5849.3.iKHSHG3L9hpcfPavmbgcWfhVOYYlq7K', 'novhex94@gmail.com', '', '2016-06-01', '2016-06-01 09:30:31', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
