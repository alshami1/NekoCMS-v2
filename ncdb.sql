-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2016 at 02:35 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categ_ID` int(11) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categ_ID`, `category_slug`, `category_name`, `parent_page`) VALUES
(1, 'android-programming', 'Android Programming', 1),
(2, 'java', 'Java', 1),
(3, 'basic-photography', 'Basic Photography', 2),
(4, 'when-im-not-on-work', 'When I''m Not On Work', 6),
(5, 'poems', 'Poems', 7),
(6, 'short-stories', 'Short Stories', 7),
(7, 'linux-ubuntu', 'Linux / Ubuntu', 5),
(8, 'windows', 'Windows', 5),
(9, 'mac-osx', 'Mac OSX', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageID` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `page_name`, `page_slug`) VALUES
(1, 'Programming Languages', 'programming-languages'),
(2, 'Photography', 'photography'),
(3, 'Mobile Repair', 'mobile-repair'),
(5, 'Operating Systems', 'operating-systems'),
(6, 'Hobbies', 'hobbies'),
(7, 'Literary Works', 'literary-works');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `content` longtext NOT NULL,
  `date_posted` date NOT NULL,
  `posted_by` int(11) NOT NULL,
  `parent_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `title`, `slug`, `content`, `date_posted`, `posted_by`, `parent_category`) VALUES
(1, 'What is Android?', 'what-is-android', 'PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-02', 2, 1),
(2, 'Android Kitkat 4.4.4 patch', 'android-kitkat-444-patch', '<p>PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-05-02', 2, 1),
(3, 'Android Tricks', 'android-tricks', 'PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-02', 2, 1),
(4, 'Android Malware', 'android-malware', 'PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-02', 2, 1),
(5, 'Android Launchers', 'android-launchers', 'PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-02', 2, 1),
(6, 'What is Root', 'what-is-root', 'PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-02', 2, 1),
(7, 'What is CWM', 'what-is-cwm', 'PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-02', 2, 1),
(8, 'What is Java', 'what-is-java', 'PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-02', 2, 2),
(9, 'Hello World', 'hello-world', 'Hello world is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-08', 3, 2),
(10, 'Android SDK for Linux', 'android-sdk-for-linux', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-09', 3, 1),
(11, 'Intel Android SDK', 'intel-android-sdk', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-05-09', 3, 1),
(12, 'Java FX Ensemble', 'java-fx-ensemble', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-05-09', 3, 2),
(13, 'Android Marshmallow', 'android-marshmallow', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-05-13', 2, 1),
(14, 'Hello Photography', 'hello-photography', '<p><img src="../assets/js/plugins/emoticons/img/smiley-cool.gif" alt="cool"></p>PHP is lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-13', 2, 3),
(15, 'Lorem Ipsum', 'lorem-ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2016-05-13', 2, 4),
(16, 'Friendly tips in how to lose weight', 'friendly-tips-in-how-to-lose-weight', '<p xss=removed></p>\n<p xss=removed align="JUSTIFY"><span xss=removed><strong>Curios about how to lose weight?</strong></span></p>\n<p xss=removed align="JUSTIFY">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\n<p xss=removed align="JUSTIFY">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\n<p xss=removed align="JUSTIFY">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>\n<p xss=removed align="JUSTIFY">consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>\n<p xss=removed align="JUSTIFY">cillum dolore eu fugiat nulla pariatur. <strong>Excepteur sint occaecat cupidatat non</strong></p>\n<p xss=removed align="JUSTIFY"><strong>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>\n<p xss=removed align="JUSTIFY"> </p>\n<p xss=removed align="JUSTIFY"></p>\n<p xss=removed align="JUSTIFY">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\n<p xss=removed align="JUSTIFY">tempor incididunt ut labore et dolore magna aliqua. <em>Ut enim ad minim veniam,</em></p>\n<p xss=removed align="JUSTIFY"><em>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em></p>\n<p xss=removed align="JUSTIFY"><em>consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</em>e</p>\n<p xss=removed align="JUSTIFY">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <span xss=removed>cupidatat non</span></p>\n<p xss=removed align="JUSTIFY">proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n<p xss=removed> </p>\n<p xss=removed> </p>', '2016-05-16', 2, 4),
(17, 'Ubuntu search orb', 'ubuntu-search-orb', '<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c5">This search function is provided to you by Canonical Group Limited (Canonical). This legal notice applies to searching in the dash and incorporates the terms of Canonical''s</span><span class="c0"> </span><span class="c4"><a class="c1" href="http://www.canonical.com/legal">legal notice</a></span><span class="c0"> </span><span class="c5">(and privacy policy). </span></p>\r\n<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c6 c5">Collection and use of data</span></p>\r\n<p class="c2"><span class="c5">When you enter a search term into the dash Ubuntu will search your Ubuntu computer and will record the search terms locally. </span></p>\r\n<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c5">Unless you have opted out (see the “Online Search” section below), we will also send your keystrokes as a search term to productsearch.ubuntu.com and selected third parties so that we may complement your search results with online search results from such third parties including: Facebook, Twitter, BBC and Amazon. Canonical and these selected third parties will collect your search terms and use them to provide you with search results while using Ubuntu. </span></p>\r\n<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c5">By searching in the dash you consent to:</span></p>\r\n<p class="c2 c3"> </p>\r\n<ol class="c8" start="1">\r\n<li class="c7 c2"><span class="c5">the collection and use of your search terms and IP address in this way; and</span></li>\r\n<li class="c2 c7"><span class="c5">the storage of your search terms and IP address by Canonical and such selected third parties (if applicable).</span></li>\r\n</ol>\r\n<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c5">Canonical will only use your search terms and IP address in accordance with this legal notice and </span><span class="c4"><a class="c1" href="http://www.ubuntu.com/aboutus/privacypolicy">our privacy</a></span><span class="c4"><a class="c1" href="http://www.ubuntu.com/aboutus/privacypolicy"> policy</a></span><span class="c5">.</span><span class="c5"> Please see </span><span class="c4"><a class="c1" href="http://www.ubuntu.com/aboutus/privacypolicy">our privacy</a></span><span class="c4"><a class="c1" href="http://www.ubuntu.com/aboutus/privacypolicy"> policy</a></span><span class="c5"> </span><span class="c5">for further information about how Canonical protects your personal information. For information on how our selected third parties may use your information, please see their privacy policies.</span></p>\r\n<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c6 c5">Online Search</span></p>\r\n<p class="c2"><span class="c5">You may restrict your dash so that we don’t send searches to third parties and you don''t receive online search results. To do this go to the Privacy panel and toggle the ‘Include online search results’ option to off. The Privacy panel can be found in your System Settings or via a dash search. For a current list of our selected third parties, please see </span><span class="c4"><a class="c1" href="http://www.ubuntu.com/privacypolicy/thirdparties">www.ubuntu.com/privacypolicy/thirdparties</a></span><span class="c5">.</span></p>\r\n<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c5 c6">Changes</span></p>\r\n<p class="c2"><span class="c5">Although most changes are likely to be minor, Canonical may change this legal notice from time to time, and at Canonical''s sole discretion. Please check this page from time to time for any changes to this legal notice as we will not be able to notify you directly.</span></p>\r\n<p class="c2 c3"> </p>\r\n<p class="c2"><span class="c6 c5">How to contact us</span></p>\r\n<p class="c2"><span class="c5">Please submit any questions or comments about searching in the dash or this legal notice by contacting us at the following address: Canonical Group Ltd, 5th Floor, Blue Fin Building, 110 Southwark Street, London, England, SE1 0SU.</span></p>', '2016-05-16', 3, 4),
(18, 'Na na na', 'na-na-na', '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../contact-us-bg.jpg" alt="BG" width="503" height="378" /></p>\r\n<p>&nbsp;</p>\r\n<p>Na na na Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na .&nbsp;</p>\r\n<p>Na na na Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na .</p>\r\n<p>&nbsp;</p>\r\n<p>Na na na Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na .</p>\r\n<p>&nbsp;</p>\r\n<p>Na na na Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na&nbsp;Na na na .</p>', '2016-05-19', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usrs_ID` int(11) NOT NULL,
  `usrs_UID` varchar(10) NOT NULL,
  `usrs_username` varchar(20) NOT NULL,
  `usrs_full_name` varchar(100) NOT NULL,
  `usrs_pw` varchar(255) NOT NULL,
  `usrs_email` varchar(255) NOT NULL,
  `usrs_date_added` date NOT NULL,
  `usrs_last_logged` datetime NOT NULL,
  `usrs_role` enum('admin','writer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrs_ID`, `usrs_UID`, `usrs_username`, `usrs_full_name`, `usrs_pw`, `usrs_email`, `usrs_date_added`, `usrs_last_logged`, `usrs_role`) VALUES
(1, '', 'root11', 'Kel', '$2y$15$088VZfw/0ldXBYSO3Z3RQOK0vh/QDIkqJ3yjsP0i7KeS02XvzlAIG', 'novhz0514@gmail.com', '2016-04-30', '2016-05-14 04:07:18', 'admin'),
(2, '', 'noviadmin', 'Novi', '$2y$15$gZO/bm164mf6ElP/lWLIv.3j.9dxW.WJpV4Da9mwQb4PMOscxy0OK', 'novi@mail.com', '2016-05-01', '2016-05-26 12:39:54', 'admin'),
(3, '', 'mr_writer', 'mr write', '$2y$15$B7pKSUhlriv/Xc//V4mjq.Hf/oQXrlsPxAbleMbfpg.xOogTIi77a', 'mr_writer@mail.com', '2016-05-01', '2016-05-24 04:48:57', 'writer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categ_ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usrs_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usrs_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
