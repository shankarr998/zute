-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 09:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zutedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `interest_name` varchar(20) NOT NULL DEFAULT '',
  `group_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `account_sessions`
--

CREATE TABLE `account_sessions` (
  `session_id` varchar(255) NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `event_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`event_id`, `username`) VALUES
(3, 'shankar9983434'),
(3, 'shankar9983434'),
(3, 'shankar9983434'),
(1, 'shankar9983434'),
(3, 'shankar9983434'),
(1, 'shankar9983434'),
(1, 'shankar9983434'),
(10, 'shankar998'),
(10, 'shankar998'),
(1, 'shankar998'),
(1, 'shankar998'),
(1, 'shankar998'),
(1, 'shankar998'),
(3, 'shankar998'),
(1, 'shankar9983434'),
(12, 'shankar998'),
(12, 'shankar998'),
(12, 'shankar998'),
(13, 'Renit'),
(13, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(15, 'Renit'),
(15, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(16, 'Sandhya'),
(16, 'Sandhya'),
(14, 'Renit'),
(14, 'Renit'),
(16, 'Renit'),
(16, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(15, 'Renit'),
(15, 'Renit'),
(17, 'Renit'),
(17, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(19, 'Renit'),
(19, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(20, 'Renit'),
(20, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(21, 'Renit'),
(21, 'Renit'),
(13, 'Renit'),
(25, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(26, 'Renit'),
(26, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(27, 'Renit'),
(27, 'Renit'),
(29, 'Renit'),
(29, 'Renit'),
(18, 'Renit'),
(18, 'Renit'),
(30, 'Renit'),
(30, 'Renit'),
(31, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(33, 'Renit'),
(33, 'Renit'),
(34, 'Renit'),
(34, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(35, 'Renit'),
(35, 'Renit'),
(19, 'Renit'),
(19, 'Renit'),
(36, 'Renit'),
(36, 'Renit'),
(17, 'Renit'),
(17, 'Renit'),
(14, 'Renit'),
(37, 'Renit'),
(37, 'Renit'),
(14, 'Renit'),
(14, 'Renit'),
(38, 'Renit'),
(38, 'Renit'),
(39, 'Renit'),
(39, 'Renit');

-- --------------------------------------------------------

--
-- Table structure for table `belongs_to`
--

CREATE TABLE `belongs_to` (
  `group_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `authorized` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `venue` varchar(20) NOT NULL,
  `zip` int(5) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `description`, `start_time`, `end_time`, `venue`, `zip`, `groupname`, `username`) VALUES
(13, 'Ai-ed ', 'An AI introduction for PG students', '2020-02-27 04:37:50', '2020-02-27 04:37:50', 'Christ University', 560079, 'LearnAI', 'Rahul'),
(14, 'QuanMeet', 'An introduction to quantum computing to help gain enthu the required basics in Physics, Mathematics and Computers', '2020-02-27 04:48:29', '2020-02-27 04:48:29', 'Christ University Ke', 560099, 'Quantummised', 'Renit'),
(15, 'physics At most', 'Learn phy', '2020-02-27 04:58:21', '2020-02-27 04:58:21', 'Christ University', 560000, 'Phys', 'Renit'),
(16, 'Curls', 'for curly hair girls', '2020-02-27 05:31:47', '2020-02-27 05:31:47', 'christ', 435345, 'Footballers', 'Sandhya'),
(17, 'GraphTherory', 'For math enthu', '2020-02-27 05:48:23', '2020-02-27 05:48:23', 'Sg Palya', 444555, 'Mathstoday', 'Renit'),
(18, 'ForFest', 'A demo for fest', '2020-02-27 05:52:50', '2020-02-27 05:52:50', 'Christ path', 560000, 'Quantummised', 'Renit'),
(19, 'Catstoday', 'For cats enthu', '2020-02-27 05:56:35', '2020-02-27 05:56:35', 'Gutter', 560007, 'Quantummised', 'Renit'),
(20, 'PaintTODAY', 'FOR PAINT ENTHUS', '2020-02-27 06:00:39', '2020-02-27 06:00:39', 'AREKERE', 560079, 'Quantummised', 'Renit'),
(21, 'CHATBOT', 'CREATbOT', '2020-02-27 06:10:48', '2020-02-27 06:10:48', 'FOR BOTTERS', 560079, 'Quantummised', 'Renit'),
(22, 'hello ', 'come together', '2020-02-27 06:22:15', '2020-02-27 06:22:15', 'bangalore', 52222222, 'Phys', 'Renit'),
(23, 'hey christite', 'celebrating silver jubliee', '2020-02-27 06:29:09', '2020-02-27 06:29:09', 'central campus', 560079, 'Quantummised', 'Renit'),
(24, 'christ', 'save us lord', '2020-02-27 06:29:47', '2020-02-27 06:29:47', 'island', 1234, 'Quantummised', 'Renit'),
(25, 'praise the lord ', 'celebrate something', '2020-02-27 06:30:53', '2020-02-27 06:30:53', 'pai vista', 56623, 'Quantummised', 'Renit'),
(26, 'footabbblers', 'For food enthu', '2020-02-27 06:37:00', '2020-02-27 06:37:00', 'Christ University', 560022, 'Quantummised', 'Renit'),
(27, 'PHP', 'forPHPers', '2020-02-27 06:44:27', '2020-02-27 06:44:27', 'Christ University', 560022, 'Quantummised', 'Renit'),
(28, 'ruby', 'ruby workshop', '2020-02-27 06:47:19', '2020-02-27 06:47:19', '8th block', 5623, 'Quantummised', 'Renit'),
(29, 'ruby', 'ruby workshop', '2020-02-27 06:47:33', '2020-02-27 06:47:33', '8th block', 5623, 'Quantummised', 'Renit'),
(30, 'Cricket tomo', 'Do not miss', '2020-02-27 06:58:56', '2020-02-27 06:58:56', 'Christ University', 560079, 'CricketforToday', 'Renit'),
(31, 'DogsMeet', 'To gather dog lovers', '2020-02-27 07:24:05', '2020-02-27 07:24:05', 'Christ University', 560022, 'DogsForever', 'Renit'),
(32, 'Photography', 'Call Varad', '2020-02-27 07:35:54', '2020-02-27 07:35:54', 'Christ University', 560022, 'Quantummised', 'Renit'),
(33, 'crickterfotToday', 'Letsplay', '2020-02-27 07:42:44', '2020-02-27 07:42:44', 'Christ University', 560022, 'Quantummised', 'Renit'),
(34, 'DS', 'for ds enthu', '2020-02-27 07:54:06', '2020-02-27 07:54:06', 'Christ University', 560022, 'Quantummised', 'Renit'),
(35, 'Meet to eat', 'eat', '2020-02-27 08:10:58', '2020-02-27 08:10:58', 'Christ University', 560079, 'MPHR', 'Renit'),
(36, 'TryandPLayme', 'PLayer forever', '2020-02-27 08:27:09', '2020-02-27 08:27:09', 'Christ University', 560022, 'NeilFootball', 'Renit'),
(37, 'BiriyaniAdda', 'We all meet to eat', '2020-02-27 09:05:36', '2020-02-27 09:05:36', 'Christ University', 560022, 'Quantummised', 'Renit'),
(38, 'DOgsMeet', 'For dog lovers', '2020-02-27 09:15:56', '2020-02-27 09:15:56', 'Christ University', 560022, 'DogsForever', 'Renit'),
(39, 'hhhh', 'ju0hoh;o', '2020-03-18 09:29:29', '2020-03-18 09:29:29', 'hgviygyg', 0, 'Quantummised', 'Renit');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(20) NOT NULL,
  `group_name` varchar(20) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `interest_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(50) NOT NULL,
  `imgpath` varchar(200) NOT NULL,
  `imgname` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`, `username`, `interest_name`, `city`, `state`, `zipcode`, `imgpath`, `imgname`, `datetime`) VALUES
(24, 'LearnAI', 'A forum to learn AI ethusiasts', 'Rahul', 'AI', 'Bangalore', 'Karnataka', 560079, 'groupsimg/', 'www.jpg', '2020-02-27 04:26:54'),
(25, 'Quantummised', 'A quantum computing group for quanpsychs', 'Renit', 'QuantumComputing', 'Bangalore', 'Karnataka', 560099, 'groupsimg/', '3.jpg', '2020-02-27 04:46:07'),
(26, 'Phys', 'Today', 'Renit', 'QuantumComputing', 'bangalore', 'karnataka', 560079, 'groupsimg/', '2.jpg', '2020-02-27 04:57:23'),
(27, 'Footballers', 'Lets football', 'Renit', 'CloudTechnology', 'bangalore', 'karana', 560022, 'groupsimg/', '3.jpg', '2020-02-27 05:11:48'),
(28, 'Mathstoday', 'for mathrs', 'Renit', 'CloudTechnology', 'bangalore', 'karnataka', 435345, 'groupsimg/', '2.jpg', '2020-02-27 05:47:28'),
(29, 'TREKKING', 'FOR TREKKERS', 'Renit', 'AI', 'bangalore', 'karnataka', 560079, 'groupsimg/', 'ai.jpg', '2020-02-27 06:07:19'),
(30, 'CricketforToday', 'for Crickk enthu', 'Renit', 'AI', 'bangalore', 'karnataka', 560022, 'groupsimg/', '2.jpg', '2020-02-27 06:58:14'),
(31, 'DogsForever', 'An open forum for dog lovers ', 'Renit', 'AI', 'Bangalore', 'Karnataka', 560022, 'groupsimg/', 'dogs.jfif', '2020-02-27 07:22:43'),
(32, 'DS', 'coz I love it', 'Renit', 'AI', 'bangalore', 'karnataka', 560022, 'groupsimg/', 'dogs.jfif', '2020-02-27 07:55:20'),
(33, 'MPHR', 'letsdeal w  it', 'Renit', 'AI', 'bangalore', 'karnataka', 560022, 'groupsimg/', 'dogs.jfif', '2020-02-27 08:10:10'),
(34, 'NeilFootball', 'coz why not', 'Renit', 'AI', 'bangalore', 'karnataka', 560022, 'groupsimg/', 'dogs.jfif', '2020-02-27 08:25:58'),
(35, 'udyuc', 'ycdjrjx', 'Renit', 'AI', 'futv88', '68rufk6', 0, 'groupsimg/', 's.png', '2020-03-18 09:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `group_name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `join_datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`group_name`, `username`, `join_datetime`) VALUES
('sssssssssssssssssss', '', 1944),
('jhkl', '', 1933),
('sssssssssssssssssss', '', 1912),
('climate', '', 1892),
('', '', 2020),
('', '', 2020),
('52345555555555', '', 2020),
('52345555555555', '', 2020),
('52345555555555', '', 2020),
('ssssssss', '', 2020),
('web', '', 2020),
('climate', 'shankar998', 2020),
('sssssssssssssssssss', 'shankar998', 2020),
('jhkl', 'shankar998', 2020),
('sssssssssssssssssss', 'Rahul', 2020),
('LearnAI', 'Rahul', 2020),
('Quantummised', 'Renit', 2020),
('Phys', 'Renit', 2020),
('Footballers', 'Renit', 2020),
('Footballers', 'Sandhya', 2020),
('Mathstoday', 'Renit', 2020),
('TREKKING', 'Renit', 2020),
('CricketforToday', 'Renit', 2020),
('DogsForever', 'Renit', 2020),
('DS', 'Renit', 2020),
('MPHR', 'Renit', 2020),
('NeilFootball', 'Renit', 2020),
('udyuc', 'Renit', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `image_location` varchar(50) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`image_location`, `image_name`) VALUES
('/xampp/htdocs/images/', '1.jpg'),
('/xampp/htdocs/images/', '1.jpg'),
('res', '1.jpg'),
('res', '1.jpg'),
('/res', '1.jpg'),
('/res', '1.jpg'),
('/xampp/htdocs/images/', '1.jpg'),
('/localhost/zutee/res', '1.jpg'),
('localhost/zutee/res', '1.jpg'),
('localhost/zutee/res/img', '1.jpg'),
('/xampp/htdocs/images/', '1.jpg'),
('uploads/', ''),
('uploads/', '1.jpg'),
('uploads/', 'vlcsnap-2019-11-21-21h18m28s040.png'),
('/xampp/htdocs/images/', 's.png'),
('/xampp/htdocs/images/', ''),
('uploads/', 's.png'),
('uploads/', 's.png'),
('uploads/', ''),
('uploads/', ''),
('uploads/', 's.png'),
('uploads/', 's.png'),
('uploads/', 'Screenshot (13).png'),
('uploads/', 'Screenshot (12).png');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interest_name` varchar(20) NOT NULL DEFAULT '',
  `interest-id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_name`, `interest-id`) VALUES
('MachineLearning', 1),
('QuantumComputing', 2),
('CloudTechnology', 3),
('AI', 4);

-- --------------------------------------------------------

--
-- Table structure for table `interested_in`
--

CREATE TABLE `interested_in` (
  `username` varchar(200) NOT NULL DEFAULT '',
  `interest_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interested_in`
--

INSERT INTO `interested_in` (`username`, `interest_name`) VALUES
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar9983434', 'AI'),
('shankar9983434', 'CloudTechnology'),
('shankar9983434', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'QuantumComputing'),
('shankar998', 'CloudTechnology'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('shankar998', 'AI'),
('shankar998', 'CloudTechnology'),
('shankar998', 'MachineLearning'),
('shankar998', 'QuantumComputing'),
('Rahul', 'AI'),
('Rahul', 'AI'),
('Rahul', 'AI'),
('Rahul', 'AI'),
('Rahul', 'MachineLearning'),
('Rahul', 'MachineLearning'),
('Renit', 'QuantumComputing'),
('Sandhya', 'MachineLearning'),
('Sandhya', 'MachineLearning'),
('Renit', 'MachineLearning'),
('Renit', 'AI'),
('Renit', 'CloudTechnology'),
('Renit', 'MachineLearning'),
('Renit', 'QuantumComputing');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `lname` varchar(20) NOT NULL DEFAULT '',
  `zip` int(5) NOT NULL,
  `street` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(20) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `latitude` bigint(50) NOT NULL,
  `longitude` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(50) NOT NULL,
  `post_caption` varchar(100) NOT NULL,
  `post_description` text NOT NULL,
  `post_image_url` varchar(100) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `post_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_caption`, `post_description`, `post_image_url`, `imgname`, `group_name`, `username`, `post_datetime`) VALUES
(12, 'Ai-education', 'A forum for AI enthusiasts ', 'post/', 'ai.jpg', 'LearnAI', 'Rahul', '2020-02-27 04:36:49'),
(15, 'Christ', 'Sphynx', 'post/', 'ai.jpg', 'Phys', 'Renit', '2020-02-27 04:57:49'),
(18, 'Sandhya', 'Test3', 'post/', 'ai.jpg', 'Footballers', 'Sandhya', '2020-02-27 05:31:10'),
(21, 'Vignesh', 'MathNow', 'post/', 'ai.jpg', 'Mathstoday', 'Renit', '2020-02-27 05:47:49'),
(29, 'Lets play', 'Tomo at 9', 'post/', '3.jpg', 'CricketforToday', 'Renit', '2020-02-27 06:58:33'),
(30, '#forverlove', 'A true friend.', 'post/', 'dogs2.jfif', 'DogsForever', 'Renit', '2020-02-27 07:23:31'),
(34, 'DS', 'For me', 'post/', 'dogs2.jfif', 'DogsForever', 'Renit', '2020-02-27 07:54:51'),
(35, 'hello divya', 'coz why not', 'post/', '2.jpg', 'DS', 'Renit', '2020-02-27 07:55:40'),
(37, 'lets eat', 'eat meat', 'post/', 'biriyani2.jpg', 'MPHR', 'Renit', '2020-02-27 08:10:35'),
(39, 'Neildid this', 'to show off', 'post/', 'dogs.jfif', 'NeilFootball', 'Renit', '2020-02-27 08:26:16'),
(41, 'Teacher', 'DogLover', 'post/', 'dogs.jfif', 'DogsForever', 'Renit', '2020-02-27 09:15:34'),
(42, 'iyf7tufukkg', 'ugviutv', 'post/', '', 'Phys', 'Renit', '2020-03-18 09:30:44'),
(43, 'aefef', 'cslvjnsfojsdgfdslj', 'post/', 's.png', 'Phys', 'Renit', '2020-03-18 09:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `col` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`col`) VALUES
(10),
(44),
(44);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user-id` int(50) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '',
  `firstname` varchar(20) NOT NULL DEFAULT '',
  `phone-number` int(15) NOT NULL,
  `zipcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user-id`, `username`, `email`, `password`, `firstname`, `phone-number`, `zipcode`) VALUES
(1, 'asdGFSDGDFAG', 'Shankar.s@cs.christuniversity.in', 'asdGFSDGDFAG', 'Asgdsadg', 8888421, 560023),
(4, 'asdGFSDGDFAGd', 'Shankar.s@cs.cdhristuniversity.in', 'asdGFSDGDFAGd', 'Asgdsadg', 88884213, 560023),
(5, 'asetgsdgf', 'Asetgsdgf@rgs.com', 'asetgsdgf', 'Sdafsafd', 2147483647, 1234214),
(19, 'Rahul', 'Rahul.pv@cs.christuniversity.in', 'Rahul123', 'Rahul', 44444, 560079),
(20, 'Renit', 'Renit.anthony@cs.christuniversity.in', 'Renit123', 'Renit', 3333, 560079),
(21, 'Sandhya', 'Shan@gmail.com', 'Sandhya123', 'Sandhya', 222, 560099),
(11, 'sdahgifubh', 'Ikbs@briuhb.cm', 'sdahgifubh', 'Ibsdib', 1234543555, 33),
(14, 'shankar994', 'Sfahdfsh@fd.voo', '12345678', 'Asgdsadg', 0, 560023),
(13, 'shankar998', '998shankar@gmail.com', '12345678', 'Shankar', 888834434, 56655),
(15, 'shankar9983434', 'Shankar.s@cs.christuniversity.in33', '123456789', 'Dfag', 1234567, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`group_id`,`interest_name`),
  ADD KEY `interest_name` (`interest_name`);

--
-- Indexes for table `account_sessions`
--
ALTER TABLE `account_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD PRIMARY KEY (`group_id`,`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `lname` (`venue`,`zip`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interest_name`),
  ADD UNIQUE KEY `interest-id` (`interest-id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`lname`,`zip`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user-id` (`user-id`),
  ADD UNIQUE KEY `phone-number` (`phone-number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest-id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user-id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
