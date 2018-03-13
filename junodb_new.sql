-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2018 at 01:09 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `junodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `street` text COLLATE utf8_slovak_ci,
  `city` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `psc` varchar(10) COLLATE utf8_slovak_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street`, `city`, `psc`, `state`, `type`) VALUES
(122, '', '', '', '', NULL),
(123, '', '', '', '', NULL),
(124, '', '', '', '', NULL),
(125, '', '', '', '', NULL),
(126, '', '', '', '', NULL),
(127, '', '', '', '', NULL),
(128, '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `street` text COLLATE utf8_slovak_ci,
  `city` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `psc` varchar(10) COLLATE utf8_slovak_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `ico` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `dic` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `icdph` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `company_name`, `street`, `city`, `psc`, `state`, `ico`, `dic`, `icdph`) VALUES
(92, '', '', '', '', '', '', '', ''),
(93, '', '', '', '', '', '', '', ''),
(94, '', '', '', '', '', '', '', ''),
(95, '', '', '', '', '', '', '', ''),
(96, '', '', '', '', '', '', '', ''),
(97, '', '', '', '', '', '', '', ''),
(98, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `e_mail` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `telephone_number` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  `favicon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `e_mail`, `telephone_number`, `address_id`, `billing_address_id`, `multimedia_id`, `favicon_id`) VALUES
(1, 'JUNO', 'vladimir.vrab@artexe.sk', '0902739429', 128, 98, 219, 220);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `project_id` int(11) DEFAULT NULL,
  `test_plan_sprint_id` int(11) DEFAULT NULL,
  `test_plan_sprint_case_id` int(11) DEFAULT NULL,
  `test_step_id` int(11) DEFAULT NULL,
  `test_step_execution_id` int(11) DEFAULT NULL,
  `issue_type_id` int(2) DEFAULT NULL,
  `priority_id` int(2) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `assigned_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `name`, `description`, `project_id`, `test_plan_sprint_id`, `test_plan_sprint_case_id`, `test_step_id`, `test_step_execution_id`, `issue_type_id`, `priority_id`, `create_date`, `creator_id`, `status`, `assigned_id`) VALUES
(1, 'mala issue', 'daco mi nejde', 15, 2, 17, 66, 8, 1, 2, '2018-02-08 10:15:05', 15, 1, NULL),
(2, 'wdwf', 'sdvsdfv', 15, 2, 16, 65, NULL, 2, 3, '2018-02-08 11:10:11', 15, 1, NULL),
(3, 'lajsldkjasLDJ LJ alskjd', 'jklasJ LKDJ aslkdj ;lkja sLK;DJ L;Kajs dl;kj alk;SJD \nasdasD\nasd\nasD\nasd\nasd\n', 15, 4, 25, 74, 11, 1, 3, '2018-02-08 11:45:49', 15, 1, NULL),
(4, 'toto zadávam', 'bla bla', 15, 2, 17, 66, NULL, 1, 1, '2018-02-08 12:46:44', 2, 1, NULL),
(5, 'Špatný sprint', 'neaktualizoval se seznam test casu do předem vytvořeného sprintub', 18, 24, 67, 126, NULL, 2, 1, '2018-02-13 14:31:44', 25, 1, NULL),
(6, 'Kkkk', 'Kjjjjjjk', 19, 26, 72, 124, 96, 1, 1, '2018-02-13 17:30:35', 15, 1, NULL),
(10, 'Daco sa pokazilo', 'Mam dotaz ohladne testovatelnosti prostredia', 23, 45, 168, 173, 103, 3, 1, '2018-02-14 17:43:43', 15, 2, NULL),
(11, 'sdsdf', 'zcvcxvxcv', 23, 45, 161, NULL, NULL, 1, 1, '2018-02-14 18:01:05', 15, 1, NULL),
(12, 'xcvxzcv', 'zxcvzxcv', 23, 45, 168, 171, NULL, 1, 2, '2018-02-14 18:06:36', 15, 1, NULL),
(13, 'DVD', 'Nespuštění filmu', 19, 56, 229, 218, NULL, 2, 1, '2018-02-15 08:10:58', 24, 1, NULL),
(17, 'Nieco sa pokazilo', 'halo', 23, 45, 176, 169, 122, 1, 1, '2018-02-15 12:52:04', 2, 1, NULL),
(23, 'as', 'sa a a aassadasdsad', 27, 64, NULL, NULL, NULL, 3, 1, '2018-02-23 11:51:48', 21, 1, NULL),
(24, 'Error DB', 'jebe mmatovi', 3, 67, 309, 146, 151, 1, 3, '2018-02-26 13:40:38', 2, 5, NULL),
(25, 'Nevidím svoje Tasky', 'Prosim pridať rpava', 3, 68, NULL, NULL, NULL, 3, 1, '2018-02-26 13:46:41', 2, 1, NULL),
(26, 'das', 'asd', 27, 64, NULL, NULL, NULL, 1, 1, '2018-02-27 08:33:03', 25, 1, NULL),
(27, 'asdqw', 'test sdfwsef sdfefw dfewf', 30, 73, 315, 541, 173, 2, 2, '2018-02-27 08:57:00', 24, 1, NULL),
(28, 'Tlacitko', 'Neobjevi se', 30, 73, 313, 531, NULL, 1, 2, '2018-02-27 09:08:10', 24, 1, NULL),
(29, 'as', 'sda', 30, 72, NULL, NULL, NULL, 1, 2, '2018-03-01 10:06:55', 23, 1, NULL),
(32, 'prva issue', 'Kde som riesitel', 20, 41, 389, 1100, NULL, 1, 1, '2018-03-01 21:58:34', 23, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `issue_comment`
--

CREATE TABLE `issue_comment` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `author_id` int(11) DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `issue_comment`
--

INSERT INTO `issue_comment` (`id`, `description`, `author_id`, `issue_id`, `create_date`) VALUES
(1, 'Prvý testovný komentár', 2, 28, '2018-02-28 08:59:25'),
(2, 'kometárik druhý', 2, 28, '2018-02-28 09:03:40'),
(3, 'kjaslkdjfkljasdf', 15, 28, '2018-02-28 11:48:15'),
(4, 'Mame nieco nove .. ', 15, 28, '2018-02-28 11:48:23'),
(5, 'Jukipolikus', 15, 28, '2018-02-28 11:48:45'),
(6, 'Sme doma SK', 15, 28, '2018-02-28 11:48:51'),
(7, 'a uz je pridany', 15, 27, '2018-02-28 11:49:27'),
(8, 'kljdkfljsadkf', 15, 17, '2018-02-28 12:39:21'),
(9, 'kljaksldjfk', 15, 17, '2018-02-28 12:39:38'),
(10, 'ahoj', 2, 28, '2018-02-28 12:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `issue_multimedia`
--

CREATE TABLE `issue_multimedia` (
  `id` int(11) NOT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `issue_multimedia`
--

INSERT INTO `issue_multimedia` (`id`, `multimedia_id`, `issue_id`) VALUES
(1, 221, 1),
(3, 231, 10),
(4, 232, 10),
(5, 233, 10),
(6, 237, 28),
(7, 238, 28);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `action_id` int(3) DEFAULT NULL,
  `tab_id` int(3) DEFAULT NULL,
  `privilege_id` int(11) DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_slovak_ci DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `description`, `action_id`, `tab_id`, `privilege_id`, `ip`, `creator_id`, `create_date`) VALUES
(1, 'Vytvoril projekt s ID 17', 1, 4, NULL, '185.4.203.121', 25, '2018-02-13 11:08:11'),
(2, 'Vytvoril projekt s ID 18', 1, 4, NULL, '185.4.203.121', 25, '2018-02-13 11:20:10'),
(3, 'Vytvoril projekt s ID 19', 1, 4, NULL, '185.4.203.121', 24, '2018-02-13 11:22:21'),
(4, 'Vytvoril projekt s ID 20', 1, 4, NULL, '92.52.59.8', 23, '2018-02-13 16:16:16'),
(5, 'Vytvoril projekt s ID 21', 1, 4, NULL, '::1', 14, '2018-02-14 12:57:14'),
(6, 'Vytvoril test plan s ID 16', 1, 7, NULL, '::1', 14, '2018-02-14 13:01:53'),
(7, 'Vytvoril test plan s ID 17', 1, 7, NULL, '::1', 14, '2018-02-14 13:31:53'),
(8, 'Vytvoril test plan s ID 18', 1, 7, NULL, '::1', 14, '2018-02-14 13:31:56'),
(9, 'Vytvoril test plan s ID 19', 1, 7, NULL, '::1', 14, '2018-02-14 13:32:18'),
(10, 'Vytvoril test plan s ID 20', 1, 7, NULL, '::1', 14, '2018-02-14 13:32:30'),
(11, 'Vytvoril projekt s ID 17', 2, 7, NULL, '::1', 14, '2018-02-14 13:40:11'),
(12, 'Vytvoril projekt s ID 17', 2, 7, NULL, '::1', 14, '2018-02-14 13:40:17'),
(13, 'Zmenen test plan s ID 17', 2, 7, NULL, '::1', 14, '2018-02-14 13:41:38'),
(14, 'Zmenen test plan s ID 17', 2, 7, NULL, '::1', 14, '2018-02-14 13:41:42'),
(15, 'Vytvoril test plan s ID 21', 1, 7, NULL, '::1', 14, '2018-02-14 13:49:26'),
(16, 'Vytvoril test plan s ID 22', 1, 7, NULL, '::1', 14, '2018-02-14 14:01:47'),
(17, 'Vytvoril test plan s ID 23', 1, 7, NULL, '::1', 14, '2018-02-14 14:03:04'),
(18, 'Zmenen test plan s ID 23', 2, 7, NULL, '::1', 14, '2018-02-14 14:03:12'),
(19, 'Zmenen test plan s ID 23', 2, 7, NULL, '::1', 14, '2018-02-14 14:03:20'),
(20, 'Zmenen test plan s ID 23', 2, 7, NULL, '::1', 14, '2018-02-14 14:03:21'),
(21, 'Vytvoril test plan s ID 24', 1, 7, NULL, '::1', 14, '2018-02-14 14:11:00'),
(22, 'Zmenen test plan s ID 24', 2, 7, NULL, '::1', 14, '2018-02-14 14:11:19'),
(23, 'Zmenen test plan s ID 24', 2, 7, NULL, '::1', 14, '2018-02-14 14:11:24'),
(24, 'Zmenen test plan s ID 24', 2, 7, NULL, '::1', 14, '2018-02-14 14:12:31'),
(25, 'Zmenen test plan s ID 24', 2, 7, NULL, '::1', 14, '2018-02-14 14:14:15'),
(26, 'Smazan test plan s ID 23', 3, 7, NULL, '::1', 14, '2018-02-14 14:16:58'),
(27, 'Vytvoril test plan s ID 25', 1, 7, NULL, '::1', 14, '2018-02-14 14:17:29'),
(28, 'Zmenen test plan s ID 13', 2, 7, NULL, '188.121.181.1', 2, '2018-02-14 15:58:52'),
(29, 'Zmenen test plan s ID 13', 2, 7, NULL, '188.121.181.1', 2, '2018-02-14 15:58:56'),
(30, 'Zmenen test plan s ID 13', 2, 7, NULL, '188.121.181.1', 2, '2018-02-14 15:59:15'),
(31, 'Vytvoril projekt s ID 22', 1, 4, NULL, '188.121.181.1', 2, '2018-02-14 16:10:04'),
(32, 'Vytvoril projekt s ID 23', 1, 4, NULL, '84.246.166.35', 15, '2018-02-14 16:14:47'),
(33, 'Upravil projekt s ID 23', 2, 10, NULL, '84.246.166.35', 15, '2018-02-14 16:18:03'),
(34, 'Vytvoril test plan s ID 26', 1, 7, NULL, '84.246.166.35', 15, '2018-02-14 16:34:48'),
(35, 'Vytvoril test plan s ID 27', 1, 7, NULL, '84.246.166.35', 15, '2018-02-14 16:34:59'),
(36, 'Vytvoril test plan s ID 28', 1, 7, NULL, '84.246.166.35', 15, '2018-02-14 16:35:41'),
(37, 'Vytvoril test plan s ID 29', 1, 7, NULL, '84.246.166.35', 15, '2018-02-14 16:35:49'),
(38, 'Vytvoril test plan s ID 30', 1, 7, NULL, '84.246.166.35', 15, '2018-02-14 16:36:00'),
(39, 'Zmenen test plan s ID 26', 2, 7, NULL, '84.246.166.35', 15, '2018-02-14 17:30:17'),
(40, 'Vytvoril test plan s ID 31', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 07:30:20'),
(41, 'Vytvoril test plan s ID 32', 1, 7, NULL, '185.4.203.121', 24, '2018-02-15 07:32:08'),
(42, 'Zmenen test plan s ID 7', 2, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:01:39'),
(43, 'Zmenen test plan s ID 31', 2, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:01:50'),
(44, 'Zmenen test plan s ID 32', 2, 7, NULL, '185.4.203.121', 24, '2018-02-15 08:02:52'),
(45, 'Vytvoril test plan s ID 33', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:03:51'),
(46, 'Vytvoril projekt s ID 24', 1, 4, NULL, '185.4.203.121', 25, '2018-02-15 08:05:16'),
(47, 'Smazan test plan s ID 33', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:09:49'),
(48, 'Vytvoril test plan s ID 34', 1, 7, NULL, '185.4.203.125', 15, '2018-02-15 08:15:18'),
(49, 'Vytvoril test plan s ID 35', 1, 7, NULL, '185.4.203.125', 15, '2018-02-15 08:15:36'),
(50, 'Vytvoril test plan s ID 36', 1, 7, NULL, '185.4.203.125', 15, '2018-02-15 08:16:30'),
(51, 'Vytvoril test plan s ID 37', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:18:23'),
(52, 'Vytvoril test plan s ID 38', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:18:29'),
(53, 'Vytvoril test plan s ID 39', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:18:35'),
(54, 'Vytvoril test plan s ID 40', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:18:40'),
(55, 'Vytvoril test plan s ID 41', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:18:46'),
(56, 'Vytvoril test plan s ID 42', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:19:17'),
(57, 'Vytvoril test plan s ID 43', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:19:29'),
(58, 'Vytvoril test plan s ID 44', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:20:22'),
(59, 'Vytvoril test plan s ID 45', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:20:24'),
(60, 'Vytvoril test plan s ID 46', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:20:32'),
(61, 'Vytvoril test plan s ID 47', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:20:33'),
(62, 'Vytvoril test plan s ID 48', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:20:42'),
(63, 'Vytvoril test plan s ID 49', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:20:43'),
(64, 'Vytvoril test plan s ID 50', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:20:52'),
(65, 'Vytvoril test plan s ID 51', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:20:54'),
(66, 'Vytvoril test plan s ID 52', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:21:01'),
(67, 'Vytvoril test plan s ID 53', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:21:03'),
(68, 'Vytvoril test plan s ID 54', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:21:12'),
(69, 'Vytvoril test plan s ID 55', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:21:14'),
(70, 'Vytvoril test plan s ID 56', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:21:18'),
(71, 'Vytvoril test plan s ID 57', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:21:40'),
(72, 'Vytvoril test plan s ID 58', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:21:41'),
(73, 'Vytvoril test plan s ID 59', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:21:49'),
(74, 'Vytvoril test plan s ID 60', 1, 7, NULL, '185.4.203.121', 15, '2018-02-15 08:21:52'),
(75, 'Vytvoril test plan s ID 61', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:06'),
(76, 'Smazan test plan s ID 45', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:29'),
(77, 'Smazan test plan s ID 61', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:33'),
(78, 'Smazan test plan s ID 59', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:35'),
(79, 'Smazan test plan s ID 55', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:38'),
(80, 'Smazan test plan s ID 47', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:45'),
(81, 'Smazan test plan s ID 48', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:50'),
(82, 'Smazan test plan s ID 51', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:22:53'),
(83, 'Vytvoril test plan s ID 62', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:23:02'),
(84, 'Vytvoril test plan s ID 63', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:23:11'),
(85, 'Smazan test plan s ID 57', 3, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:23:23'),
(86, 'Smazan test plan s ID 56', 3, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:23:26'),
(87, 'Smazan test plan s ID 54', 3, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:23:29'),
(88, 'Smazan test plan s ID 53', 3, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:23:32'),
(89, 'Smazan test plan s ID 50', 3, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:23:35'),
(90, 'Smazan test plan s ID 52', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:30:16'),
(91, 'Smazan test plan s ID 62', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:30:20'),
(92, 'Smazan test plan s ID 63', 3, 7, NULL, '185.4.203.121', 25, '2018-02-15 08:30:23'),
(93, 'Vytvoril test plan s ID 64', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:34:04'),
(94, 'Vytvoril test plan s ID 65', 1, 7, NULL, '185.4.203.125', 24, '2018-02-15 08:34:10'),
(95, 'Vytvoril projekt s ID 25', 1, 4, NULL, '185.4.203.121', 25, '2018-02-15 09:05:37'),
(96, 'Vytvoril test plan s ID 66', 1, 7, NULL, '185.4.203.121', 24, '2018-02-15 09:48:08'),
(97, 'Zmenen test plan s ID 66', 2, 7, NULL, '185.4.203.121', 24, '2018-02-15 09:49:53'),
(98, 'Smazan test plan s ID 66', 3, 7, NULL, '185.4.203.121', 24, '2018-02-15 09:52:55'),
(99, 'Vytvoril projekt s ID 26', 1, 4, NULL, '185.4.203.121', 25, '2018-02-15 09:54:14'),
(100, 'Vytvoril test plan s ID 67', 1, 7, NULL, '185.4.203.121', 24, '2018-02-15 09:55:30'),
(101, 'Vytvoril projekt s ID 27', 1, 4, NULL, '185.4.203.121', 25, '2018-02-15 10:11:51'),
(102, 'Vytvoril test plan s ID 68', 1, 7, NULL, '185.4.203.121', 25, '2018-02-15 10:24:21'),
(103, 'Zmenen test plan s ID 68', 2, 7, NULL, '185.4.203.121', 25, '2018-02-15 10:25:40'),
(104, 'Zmenen test plan s ID 68', 2, 7, NULL, '185.4.203.121', 25, '2018-02-15 11:02:21'),
(105, 'Zmenen test plan s ID 68', 2, 7, NULL, '185.4.203.121', 25, '2018-02-15 11:02:33'),
(106, 'Smazan test plan s ID 60', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:27'),
(107, 'Smazan test plan s ID 58', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:30'),
(108, 'Smazan test plan s ID 43', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:34'),
(109, 'Smazan test plan s ID 42', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:37'),
(110, 'Smazan test plan s ID 41', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:42'),
(111, 'Smazan test plan s ID 40', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:45'),
(112, 'Smazan test plan s ID 39', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:49'),
(113, 'Smazan test plan s ID 38', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:11:52'),
(114, 'Smazan test plan s ID 37', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:12:51'),
(115, 'Smazan test plan s ID 36', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:12:55'),
(116, 'Smazan test plan s ID 35', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:12:59'),
(117, 'Smazan test plan s ID 34', 3, 7, NULL, '185.4.203.125', 15, '2018-02-15 12:13:03'),
(118, 'Vytvoril test plan s ID 69', 1, 7, NULL, '185.4.203.121', 27, '2018-02-20 07:27:08'),
(119, 'Zmenen test plan s ID 69', 2, 7, NULL, '185.4.203.121', 27, '2018-02-20 07:27:31'),
(120, 'Smazan test plan s ID 68', 3, 7, NULL, '185.4.203.121', 27, '2018-02-20 07:28:06'),
(121, 'Zmenen test plan s ID 69', 2, 7, NULL, '185.4.203.121', 27, '2018-02-20 07:28:19'),
(122, 'Vytvoril test plan s ID 70', 1, 7, NULL, '185.4.203.121', 27, '2018-02-20 07:47:42'),
(123, 'Zmenen test plan s ID 70', 2, 7, NULL, '185.4.203.121', 27, '2018-02-20 07:47:48'),
(124, 'Smazan test plan s ID 70', 3, 7, NULL, '185.4.203.121', 27, '2018-02-20 07:47:52'),
(125, 'Upravil projekt s ID 27', 2, 10, NULL, '185.4.203.121', 27, '2018-02-20 07:55:07'),
(126, 'Upravil projekt s ID 27', 2, 10, NULL, '185.4.203.121', 27, '2018-02-20 07:55:11'),
(127, 'Vytvoril test plan s ID 71', 1, 7, NULL, '185.4.203.121', 24, '2018-02-20 08:18:50'),
(128, 'Zmenen test plan s ID 71', 2, 7, NULL, '185.4.203.121', 24, '2018-02-20 08:20:36'),
(129, 'Zmenen test plan s ID 71', 2, 7, NULL, '185.4.203.121', 24, '2018-02-20 08:23:42'),
(130, 'Zmenen test plan s ID 71', 2, 7, NULL, '185.4.203.121', 25, '2018-02-20 09:58:45'),
(131, 'Zmenen test plan s ID 30', 2, 7, NULL, '185.4.203.121', 15, '2018-02-20 10:59:25'),
(132, 'Vytvoril test plan s ID 72', 1, 7, NULL, '185.4.203.121', 25, '2018-02-20 13:03:05'),
(133, 'Zmenen test plan s ID 72', 2, 7, NULL, '185.4.203.121', 25, '2018-02-20 13:25:02'),
(134, 'Vytvoril test plan s ID 73', 1, 7, NULL, '193.84.36.129', 25, '2018-02-21 07:24:56'),
(135, 'Vytvoril test plan s ID 74', 1, 7, NULL, '193.84.36.129', 25, '2018-02-21 07:25:05'),
(136, 'Vytvoril projekt s ID 28', 1, 4, NULL, '193.84.36.129', 25, '2018-02-21 07:27:19'),
(137, 'Vytvoril test plan s ID 75', 1, 7, NULL, '188.121.181.1', 2, '2018-02-26 13:10:10'),
(138, 'Smazan test plan s ID 14', 3, 7, NULL, '188.121.181.1', 2, '2018-02-26 13:10:16'),
(139, 'Vytvoril projekt s ID 29', 1, 4, NULL, '194.50.202.220', 15, '2018-02-27 08:18:27'),
(140, 'Vytvoril test plan s ID 76', 1, 7, NULL, '194.50.202.220', 15, '2018-02-27 08:19:15'),
(141, 'Vytvoril projekt s ID 30', 1, 4, NULL, '185.4.203.121', 24, '2018-02-27 08:34:20'),
(142, 'Zmenen test plan s ID 74', 2, 7, NULL, '109.72.12.148', 25, '2018-02-27 08:34:52'),
(143, 'Upravil projekt s ID 30', 2, 10, NULL, '185.4.203.121', 24, '2018-02-27 08:35:06'),
(144, 'Vytvoril test plan s ID 77', 1, 7, NULL, '185.4.203.121', 24, '2018-02-27 08:37:15'),
(145, 'Vytvořil testSprint s ID 71', 1, 7, NULL, '185.4.203.121', 24, '2018-02-27 08:49:42'),
(146, 'Vytvoril test plan s ID 78', 1, 7, NULL, '185.4.203.121', 24, '2018-02-27 08:51:10'),
(147, 'Vytvořil testSprint s ID 72', 1, 7, NULL, '185.4.203.121', 24, '2018-02-27 08:51:52'),
(148, 'Vytvořil testSprint s ID 73', 1, 7, NULL, '185.4.203.121', 24, '2018-02-27 08:52:22'),
(149, 'Vytvořil nového uživatele s ID 32', 1, 10, NULL, '185.4.203.121', 24, '2018-02-27 13:23:34'),
(150, 'Naklonován TC s ID 278', 1, 6, NULL, '185.4.203.125', 15, '2018-02-28 12:03:12'),
(151, 'Upravil uživatele s ID 19', 2, 10, NULL, '185.4.203.121', 14, '2018-02-28 13:55:46'),
(152, 'Upravil uživatele s ID 19', 2, 10, NULL, '185.4.203.121', 14, '2018-02-28 13:57:11'),
(153, 'Upravil Test Set s ID 24', 2, 6, NULL, '185.4.203.121', 19, '2018-02-28 14:04:03'),
(154, 'Vytvoril test plan s ID 79', 1, 7, NULL, '185.4.203.121', 19, '2018-02-28 14:04:44'),
(155, 'Zmenen test plan s ID 79', 2, 7, NULL, '185.4.203.121', 19, '2018-02-28 14:04:56'),
(156, 'Vytvořil testSprint s ID 74', 1, 7, NULL, '185.4.203.121', 19, '2018-02-28 14:05:28'),
(157, 'Upravil Test Set s ID 126', 2, 6, NULL, '185.4.203.121', 25, '2018-03-01 07:57:04'),
(158, 'Upravil Test Set s ID 132', 2, 6, NULL, '185.4.203.125', 24, '2018-03-01 08:13:12'),
(159, 'Upravil Test Set s ID 132', 2, 6, NULL, '185.4.203.125', 24, '2018-03-01 08:13:30'),
(160, 'Vytvoril test plan s ID 80', 1, 7, NULL, '185.4.203.125', 24, '2018-03-01 08:25:53'),
(161, 'Zmenen test plan s ID 80', 2, 7, NULL, '185.4.203.121', 25, '2018-03-01 08:30:20'),
(162, 'Zmenen test plan s ID 73', 2, 7, NULL, '185.4.203.121', 25, '2018-03-01 08:30:34'),
(163, 'Zmenen test plan s ID 69', 2, 7, NULL, '185.4.203.121', 25, '2018-03-01 08:30:50'),
(164, 'Zmenen test plan s ID 80', 2, 7, NULL, '185.4.203.121', 25, '2018-03-01 08:31:21'),
(165, 'Změnil Test Case s ID 289', 2, 6, NULL, '185.4.203.121', 25, '2018-03-01 08:33:04'),
(166, 'Změnil Test Case s ID 289', 2, 6, NULL, '185.4.203.121', 25, '2018-03-01 08:33:18'),
(167, 'Upravil uživatele s ID 23', 2, 10, NULL, '185.4.203.121', 25, '2018-03-01 10:02:39'),
(168, 'Upravil Test Set s ID 132', 2, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:12:19'),
(169, 'Vytvořil Test Set s ID 141', 1, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:12:32'),
(170, 'Smazan Test Set s ID 141', 3, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:12:40'),
(171, 'Vytvořil Test Case s ID 302', 1, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:12:53'),
(172, 'Naklonován TC s ID 302', 1, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:12:58'),
(173, 'Vytvořil Test Case s ID 303', 1, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:13:04'),
(174, 'Změnil Test Case s ID 303', 2, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:13:14'),
(175, 'Smazan Test Case s ID 303', 3, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:13:22'),
(176, 'Smazan Test Case s ID 302', 3, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:13:25'),
(177, 'Změnil Test Case s ID 287', 2, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:13:49'),
(178, 'Změnil Test Case s ID 287', 2, 6, NULL, '185.4.203.121', 21, '2018-03-01 10:13:56'),
(179, 'Zmenen test plan s ID 80', 2, 7, NULL, '185.4.203.125', 28, '2018-03-01 10:23:04'),
(180, 'Vytvoril test plan s ID 81', 1, 7, NULL, '185.4.203.125', 28, '2018-03-01 10:23:18'),
(181, 'Smazan test plan s ID 81', 3, 7, NULL, '185.4.203.125', 28, '2018-03-01 10:23:27'),
(182, 'Vytvoril test plan s ID 82', 1, 7, NULL, '185.4.203.121', 27, '2018-03-01 10:24:14'),
(183, 'Vytvořil Test Set s ID 142', 1, 6, NULL, '185.4.203.125', 28, '2018-03-01 10:24:20'),
(184, 'Vytvořil testSprint s ID 75', 1, 7, NULL, '185.4.203.121', 27, '2018-03-01 10:24:27'),
(185, 'Vytvořil Test Case s ID 304', 1, 6, NULL, '185.4.203.125', 28, '2018-03-01 10:24:37'),
(186, 'Smazan Test Set s ID 142', 3, 6, NULL, '185.4.203.125', 28, '2018-03-01 10:24:42'),
(187, 'Smazan test plan s ID 82', 3, 7, NULL, '185.4.203.121', 27, '2018-03-01 10:24:52'),
(188, 'Vytvořil Test Set s ID 143', 1, 6, NULL, '185.4.203.121', 27, '2018-03-01 10:25:17'),
(189, 'Vytvořil Test Case s ID 305', 1, 6, NULL, '185.4.203.121', 27, '2018-03-01 10:25:45'),
(190, 'Změnil Test Case s ID 305', 2, 6, NULL, '185.4.203.121', 27, '2018-03-01 10:25:50'),
(191, 'Smazan Test Case s ID 305', 3, 6, NULL, '185.4.203.121', 27, '2018-03-01 10:26:01'),
(192, 'Vytvořil Test Case s ID 306', 1, 6, NULL, '185.4.203.125', 28, '2018-03-01 10:26:36'),
(193, 'Smazan Test Case s ID 306', 3, 6, NULL, '185.4.203.125', 28, '2018-03-01 10:26:44'),
(194, 'Vytvořil Test Case s ID 307', 1, 6, NULL, '185.4.203.121', 25, '2018-03-01 10:37:53'),
(195, 'Smazan Test Case s ID 307', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 10:39:02'),
(196, 'Vytvořil Test Case s ID 308', 1, 6, NULL, '185.4.203.121', 25, '2018-03-01 10:39:25'),
(197, 'Smazan Test Case s ID 308', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 10:39:30'),
(198, 'Vytvořil Test Case s ID 309', 1, 6, NULL, '185.4.203.125', 28, '2018-03-01 10:40:05'),
(199, 'Smazan Test Case s ID 309', 3, 6, NULL, '185.4.203.125', 28, '2018-03-01 10:40:18'),
(200, 'Zmenen test plan s ID 80', 2, 7, NULL, '185.4.203.121', 25, '2018-03-01 10:45:33'),
(201, 'Vytvoril projekt s ID 31', 1, 4, NULL, '185.4.203.125', 24, '2018-03-01 10:49:19'),
(202, 'Vytvoril test plan s ID 83', 1, 7, NULL, '185.4.203.125', 24, '2018-03-01 10:49:58'),
(203, 'Vytvořil testSprint s ID 76', 1, 7, NULL, '185.4.203.125', 24, '2018-03-01 10:50:10'),
(204, 'Vytvořil Test Set s ID 144', 1, 6, NULL, '185.4.203.125', 24, '2018-03-01 10:50:33'),
(205, 'Vytvořil Test Case s ID 310', 1, 6, NULL, '185.4.203.125', 24, '2018-03-01 10:50:50'),
(206, 'Vytvořil Bulk Test Case s ID 144', 1, 6, NULL, '185.4.203.125', 24, '2018-03-01 10:51:08'),
(207, 'Smazan test plan s ID 83', 3, 7, NULL, '185.4.203.125', 24, '2018-03-01 10:51:55'),
(208, 'Vytvoril test plan s ID 84', 1, 7, NULL, '185.4.203.125', 24, '2018-03-01 10:52:18'),
(209, 'Zmenen test plan s ID 84', 2, 7, NULL, '185.4.203.125', 24, '2018-03-01 10:52:26'),
(210, 'Změnil Test Case s ID 312', 2, 6, NULL, '185.4.203.125', 24, '2018-03-01 10:52:54'),
(211, 'Smazan Test Case s ID 312', 3, 6, NULL, '185.4.203.125', 24, '2018-03-01 10:53:08'),
(212, 'Upravil projekt s ID 31', 2, 10, NULL, '185.4.203.125', 24, '2018-03-01 10:54:09'),
(213, 'Vytvořil testSprint s ID 77', 1, 7, NULL, '185.4.203.121', 24, '2018-03-01 10:55:14'),
(214, 'Zmenen test plan s ID 84', 2, 7, NULL, '185.4.203.121', 24, '2018-03-01 10:55:57'),
(215, 'Vytvořil nového uživatele s ID 33', 1, 10, NULL, '185.4.203.121', 24, '2018-03-01 10:57:57'),
(216, 'Upravil uživatele s ID 33', 2, 10, NULL, '185.4.203.121', 24, '2018-03-01 10:58:11'),
(217, 'Smazan uživatel s ID 33', 3, 10, NULL, '185.4.203.121', 24, '2018-03-01 10:58:20'),
(218, 'Naklonován TC s ID 314', 1, 6, NULL, '185.4.203.121', 24, '2018-03-01 11:08:23'),
(219, 'Vytvořil Test Case s ID 315', 1, 6, NULL, '185.4.203.121', 24, '2018-03-01 11:08:28'),
(220, 'Smazán projekt s ID 31', 3, 4, NULL, '185.4.203.121', 24, '2018-03-01 11:09:02'),
(221, 'Vytvoril projekt s ID 32', 1, 4, NULL, '185.4.203.121', 25, '2018-03-01 12:43:15'),
(222, 'Změnil Test Case s ID 316', 2, 6, NULL, '185.4.203.121', 25, '2018-03-01 12:46:46'),
(223, 'Vytvoril test plan s ID 85', 1, 7, NULL, '185.4.203.121', 24, '2018-03-01 13:08:59'),
(224, 'Vytvoril projekt s ID 33', 1, 4, NULL, '185.4.203.121', 25, '2018-03-01 13:10:05'),
(225, 'Upravil projekt s ID 33', 2, 10, NULL, '185.4.203.121', 25, '2018-03-01 13:10:27'),
(226, 'Upravil projekt s ID 33', 2, 10, NULL, '185.4.203.121', 25, '2018-03-01 13:11:12'),
(227, 'Upravil projekt s ID 33', 2, 10, NULL, '185.4.203.121', 25, '2018-03-01 13:11:21'),
(228, 'Upravil projekt s ID 33', 2, 10, NULL, '185.4.203.121', 25, '2018-03-01 13:11:26'),
(229, 'Vytvořil Test Set s ID 154', 1, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:04'),
(230, 'Vytvořil Test Set s ID 155', 1, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:24'),
(231, 'Vytvořil Test Set s ID 156', 1, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:34'),
(232, 'Vytvořil Test Set s ID 157', 1, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:43'),
(233, 'Smazan Test Set s ID 157', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:48'),
(234, 'Smazan Test Set s ID 156', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:51'),
(235, 'Smazan Test Set s ID 155', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:54'),
(236, 'Smazan Test Set s ID 154', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:05:57'),
(237, 'Vytvoril projekt s ID 34', 1, 4, NULL, '185.4.203.121', 25, '2018-03-01 14:48:07'),
(238, 'Vytvoril projekt s ID 35', 1, 4, NULL, '185.4.203.121', 25, '2018-03-01 14:48:13'),
(239, 'Smazán projekt s ID 35', 3, 4, NULL, '185.4.203.121', 25, '2018-03-01 14:49:29'),
(240, 'Smazán projekt s ID 34', 3, 4, NULL, '185.4.203.121', 25, '2018-03-01 14:49:39'),
(241, 'Smazán projekt s ID 33', 3, 4, NULL, '185.4.203.121', 25, '2018-03-01 14:49:49'),
(242, 'Smazan Test Set s ID 151', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:55:26'),
(243, 'Smazan Test Set s ID 149', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:55:29'),
(244, 'Smazan Test Set s ID 150', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:55:31'),
(245, 'Smazan Test Set s ID 148', 3, 6, NULL, '185.4.203.121', 25, '2018-03-01 14:55:34'),
(246, 'Upravil projekt s ID 32', 2, 10, NULL, '185.4.203.121', 25, '2018-03-01 15:04:57'),
(247, 'Smazan test plan s ID 85', 3, 7, NULL, '185.4.203.121', 25, '2018-03-01 15:05:16'),
(248, 'Vytvoril test plan s ID 86', 1, 7, NULL, '185.4.203.121', 25, '2018-03-01 15:05:47'),
(249, 'Vytvořil testSprint s ID 78', 1, 7, NULL, '185.4.203.121', 25, '2018-03-01 15:06:00'),
(250, 'Zmenen test plan s ID 13', 2, 7, NULL, '::1', 23, '2018-03-01 21:55:16'),
(251, 'Změnil Test Case s ID 156', 2, 6, NULL, '::1', 23, '2018-03-01 21:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `login_picture`
--

CREATE TABLE `login_picture` (
  `id` int(11) NOT NULL,
  `multimedia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_picture`
--

INSERT INTO `login_picture` (`id`, `multimedia_id`) VALUES
(10, 184),
(11, 185),
(12, 186),
(13, 187),
(14, 188),
(15, 189),
(16, 190),
(17, 191),
(18, 192),
(19, 193),
(20, 194),
(21, 195),
(22, 196),
(23, 197),
(24, 198),
(25, 199),
(26, 200),
(28, 202),
(30, 235);

-- --------------------------------------------------------

--
-- Table structure for table `mailer`
--

CREATE TABLE `mailer` (
  `id` int(11) NOT NULL,
  `recipient` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `subject` varchar(250) COLLATE utf8_slovak_ci DEFAULT NULL,
  `body` text COLLATE utf8_slovak_ci,
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailer_attachment`
--

CREATE TABLE `mailer_attachment` (
  `id` int(11) NOT NULL,
  `mailer_id` int(11) DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailer_default`
--

CREATE TABLE `mailer_default` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `subject` varchar(250) COLLATE utf8_slovak_ci DEFAULT NULL,
  `body` text COLLATE utf8_slovak_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `mailer_default`
--

INSERT INTO `mailer_default` (`id`, `name`, `subject`, `body`) VALUES
(1, 'Narodeniny', 'Predmet narodenín', '<p>Telo naroden&iacute;nee</p>'),
(3, 'Adam', '', '<p>Adam</p>'),
(5, 'Auto', 'ahoj', '<p>aaa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `glyphicon` varchar(50) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `menuitem_id` int(11) DEFAULT NULL,
  `sort` tinyint(2) NOT NULL DEFAULT '1',
  `privilege_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`id`, `name`, `glyphicon`, `link`, `menuitem_id`, `sort`, `privilege_id`) VALUES
(1, 'Homepage', 'glyphicon glyphicon-home', ':Admin:Homepage:Homepage:default', NULL, 1, 1006),
(2, 'Projekty', 'glyphicon glyphicon-tasks', ':Admin:Project:Project:', NULL, 2, 1007),
(3, 'Užívatelia', 'glyphicon glyphicon-user', ':Admin:User:User:', NULL, 3, 1008),
(4, 'Log', 'glyphicon glyphicon-blackboard', ':Admin:Log:Log:', NULL, 4, 1009),
(5, 'Nastavenia', 'glyphicon glyphicon-cog', ':Admin:Settings:Settings:', NULL, 5, 1010),
(6, 'Systém', 'glyphicon glyphicon-hdd', ':Admin:Help:Help:', NULL, 6, 1011),
(7, 'Všeobecné', 'glyphicon glyphicon-leaf', ':Admin:Settings:SimpleSettings:default', 5, 1, 0),
(8, 'Špecifické', 'glyphicon glyphicon-grain', ':Admin:Settings:SpecificSettings:default', 5, 2, 0),
(9, 'Nápoveda', 'glyphicon glyphicon-education', ':Admin:Help:Help:default', 6, 1, 0),
(10, 'Informácie', 'glyphicon glyphicon-info-sign', ':Admin:Help:Help:information', 6, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `multimedia`
--

CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_slovak_ci,
  `path` text COLLATE utf8_slovak_ci,
  `type` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `multimedia_folder_id` int(11) DEFAULT NULL,
  `datein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `multimedia`
--

INSERT INTO `multimedia` (`id`, `name`, `path`, `type`, `multimedia_folder_id`, `datein`, `size`) VALUES
(1, NULL, NULL, NULL, NULL, '2018-01-02 10:19:00', NULL),
(184, 'photo-1428279148693-1cf2163ed67d.jpg', 'multimedia/multimedias/photo-1428279148693-1cf2163ed67d.jpg', 'image/jpeg', NULL, '2016-08-18 06:08:14', '287007'),
(185, 'photo-1441312311734-f44cc0bda31d.jpg', 'multimedia/multimedias/photo-1441312311734-f44cc0bda31d.jpg', 'image/jpeg', NULL, '2016-08-18 06:08:26', '792644'),
(186, 'photo-1446776899648-aa78eefe8ed0.jpg', 'multimedia/multimedias/photo-1446776899648-aa78eefe8ed0.jpg', 'image/jpeg', NULL, '2016-08-18 06:08:48', '736034'),
(187, 'photo-1447752875215-b2761acb3c5d.jpg', 'multimedia/multimedias/photo-1447752875215-b2761acb3c5d.jpg', 'image/jpeg', NULL, '2016-08-18 06:08:59', '712070'),
(188, 'photo-1449157291145-7efd050a4d0e.jpg', 'multimedia/multimedias/photo-1449157291145-7efd050a4d0e.jpg', 'image/jpeg', NULL, '2016-08-18 06:09:13', '312436'),
(189, 'photo-1453668069544-b8dbea7a0477.jpg', 'multimedia/multimedias/photo-1453668069544-b8dbea7a0477.jpg', 'image/jpeg', NULL, '2016-08-18 06:09:22', '443417'),
(190, 'photo-1457685373807-8c4d8be4c560.jpg', 'multimedia/multimedias/photo-1457685373807-8c4d8be4c560.jpg', 'image/jpeg', NULL, '2016-08-18 06:09:32', '252968'),
(191, 'photo-1458668383970-8ddd3927deed.jpg', 'multimedia/multimedias/photo-1458668383970-8ddd3927deed.jpg', 'image/jpeg', NULL, '2016-08-18 06:09:55', '279961'),
(192, 'photo-1460923396110-d57007bc184f.jpg', 'multimedia/multimedias/photo-1460923396110-d57007bc184f.jpg', 'image/jpeg', NULL, '2016-08-18 06:10:05', '439093'),
(193, 'photo-1462887522061-50ac95eaad10.jpg', 'multimedia/multimedias/photo-1462887522061-50ac95eaad10.jpg', 'image/jpeg', NULL, '2016-08-18 06:10:15', '389639'),
(194, 'photo-1463995439889-6cc080aaf7dd.jpg', 'multimedia/multimedias/photo-1463995439889-6cc080aaf7dd.jpg', 'image/jpeg', NULL, '2016-08-18 06:10:25', '683153'),
(195, 'photo-1464013778555-8e723c2f01f8.jpg', 'multimedia/multimedias/photo-1464013778555-8e723c2f01f8.jpg', 'image/jpeg', NULL, '2016-08-18 06:10:34', '481118'),
(196, 'photo-1464565134312-083f9c103854.jpg', 'multimedia/multimedias/photo-1464565134312-083f9c103854.jpg', 'image/jpeg', NULL, '2016-08-18 06:10:45', '764304'),
(197, 'photo-1465083817055-242d46f326c8.jpg', 'multimedia/multimedias/photo-1465083817055-242d46f326c8.jpg', 'image/jpeg', NULL, '2016-08-18 06:11:11', '403507'),
(198, 'photo-1465491736982-abaddedcedc7.jpg', 'multimedia/multimedias/photo-1465491736982-abaddedcedc7.jpg', 'image/jpeg', NULL, '2016-08-18 06:11:22', '256556'),
(199, 'photo-1466838931486-92f3b5ff31a6.jpg', 'multimedia/multimedias/photo-1466838931486-92f3b5ff31a6.jpg', 'image/jpeg', NULL, '2016-08-18 06:11:32', '980998'),
(200, 'photo-1466927593098-4d4aa7a2b2d8.jpg', 'multimedia/multimedias/photo-1466927593098-4d4aa7a2b2d8.jpg', 'image/jpeg', NULL, '2016-08-18 06:11:44', '294054'),
(201, 'photo-1467154030602-c218f6ed540a.jpg', 'multimedia/multimedias/photo-1467154030602-c218f6ed540a.jpg', 'image/jpeg', NULL, '2016-08-18 06:11:56', '276045'),
(202, 'photo-1467226632440-65f0b4957563.jpg', 'multimedia/multimedias/photo-1467226632440-65f0b4957563.jpg', 'image/jpeg', NULL, '2016-08-18 06:12:06', '441962'),
(203, '1photo-1467226632440-65f0b4957563.jpg', 'multimedia/multimedias/1photo-1467226632440-65f0b4957563.jpg', 'image/jpeg', NULL, '2016-08-18 06:12:18', '441962'),
(204, 'unsplash-527bf56961712-1.jpg', 'multimedia/multimedias/unsplash-527bf56961712-1.jpg', 'image/jpeg', NULL, '2016-08-18 06:13:14', '393214'),
(205, 'Y1hediOeRoya666XCjYg-forest.jpg', 'multimedia/multimedias/Y1hediOeRoya666XCjYg-forest.jpg', 'image/jpeg', NULL, '2016-08-18 06:13:23', '780327'),
(210, 'whitelogo.png', 'multimedia/client/whitelogo.png', 'image/png', NULL, '2018-01-02 12:18:05', '2565'),
(211, 'favicon.png', 'multimedia/client/favicon.png', 'image/png', NULL, '2018-01-02 12:18:05', '2005'),
(212, 'juno-logo.png', 'multimedia/client/juno-logo.png', 'image/png', NULL, '2018-01-11 16:26:16', '6306'),
(213, '1favicon.png', 'multimedia/client/1favicon.png', 'image/png', NULL, '2018-01-11 16:26:16', '8536'),
(214, '1juno-logo.png', 'multimedia/client/1juno-logo.png', 'image/png', NULL, '2018-01-17 18:17:17', '6306'),
(215, '21favicon.png', 'multimedia/client/21favicon.png', 'image/png', NULL, '2018-01-17 18:17:17', '8536'),
(216, 'desc.gif', 'multimedia/projects/5/testcases/desc.gif', 'image/gif', NULL, '2018-01-18 09:00:56', '54'),
(217, '321favicon.png', 'multimedia/projects/5/testcases/321favicon.png', 'image/png', NULL, '2018-01-18 09:00:56', '8536'),
(218, '21juno-logo.png', 'multimedia/projects/5/testcases/21juno-logo.png', 'image/png', NULL, '2018-01-18 09:00:56', '6306'),
(219, '321juno-logo.png', 'multimedia/client/321juno-logo.png', 'image/png', NULL, '2018-01-18 09:39:53', '6306'),
(220, '4321favicon.png', 'multimedia/client/4321favicon.png', 'image/png', NULL, '2018-01-18 09:39:53', '8536'),
(221, 'Voucher-AXA.pdf', 'multimedia/projects/15/issues/Voucher-AXA.pdf', 'application/pdf', NULL, '2018-02-08 10:15:05', '224181'),
(222, 'test-import-sablona-v01.xlsx', 'multimedia/projects/18/testcases/test-import-sablona-v01.xlsx', NULL, NULL, '2018-02-13 13:53:24', '10798'),
(223, 'code.png', 'multimedia/projects/3/issues/code.png', NULL, NULL, '2018-02-14 16:00:51', '646611'),
(224, 'Screen-Shot-2018-02-14-at-17.20.43.png', 'multimedia/projects/23/testcases/Screen-Shot-2018-02-14-at-17.20.43.png', NULL, NULL, '2018-02-14 17:16:52', '130102'),
(225, 'Screen-Shot-2018-02-14-at-17.25.25.png', 'multimedia/projects/23/testcases/Screen-Shot-2018-02-14-at-17.25.25.png', NULL, NULL, '2018-02-14 17:16:52', '108497'),
(226, 'Screen-Shot-2018-02-14-at-17.41.32.png', 'multimedia/projects/23/testcases/Screen-Shot-2018-02-14-at-17.41.32.png', NULL, NULL, '2018-02-14 17:16:52', '164787'),
(227, 'Screen-Shot-2018-02-14-at-17.47.01.png', 'multimedia/projects/23/testcases/Screen-Shot-2018-02-14-at-17.47.01.png', NULL, NULL, '2018-02-14 17:16:52', '236042'),
(228, 'Screen-Shot-2018-02-14-at-17.58.24.png', 'multimedia/projects/23/testcases/Screen-Shot-2018-02-14-at-17.58.24.png', NULL, NULL, '2018-02-14 17:16:52', '346121'),
(229, 'Screen-Shot-2018-02-14-at-18.04.15.png', 'multimedia/projects/23/testcases/Screen-Shot-2018-02-14-at-18.04.15.png', NULL, NULL, '2018-02-14 17:16:52', '336405'),
(230, 'Screen-Shot-2018-02-14-at-18.11.30.png', 'multimedia/projects/23/testcases/Screen-Shot-2018-02-14-at-18.11.30.png', NULL, NULL, '2018-02-14 17:16:52', '102083'),
(231, 'Screen-Shot-2018-02-14-at-18.18.37.png', 'multimedia/projects/23/issues/Screen-Shot-2018-02-14-at-18.18.37.png', NULL, NULL, '2018-02-14 17:43:43', '265640'),
(232, 'Screen-Shot-2018-02-14-at-18.47.03.png', 'multimedia/projects/23/issues/Screen-Shot-2018-02-14-at-18.47.03.png', NULL, NULL, '2018-02-14 17:54:37', '186316'),
(233, 'Screen-Shot-2018-02-14-at-18.47.03.png', 'multimedia/projects/23/issues/Screen-Shot-2018-02-14-at-18.47.03.png', NULL, NULL, '2018-02-14 17:54:37', '186316'),
(234, 'Snimek-obrazovky-2018-02-20-v-10.24.27.png', 'multimedia/loginPictures/Snimek-obrazovky-2018-02-20-v-10.24.27.png', NULL, NULL, '2018-02-20 10:43:34', '284093'),
(235, 'JunoDashboardInspire.jpg', 'multimedia/loginPictures/JunoDashboardInspire.jpg', NULL, NULL, '2018-02-20 11:03:41', '50293'),
(236, 'Manual-Hikvision-CZ.pdf', 'multimedia/projects/23/testcases/Manual-Hikvision-CZ.pdf', NULL, NULL, '2018-02-22 12:35:23', '1558482'),
(237, 'Snimek-obrazovky-2018-02-20-v-12.29.40.png', 'multimedia/projects/30/issues/Snimek-obrazovky-2018-02-20-v-12.29.40.png', NULL, NULL, '2018-02-27 09:08:10', '325463'),
(238, 'Snimek-obrazovky-2018-02-15-v-14.31.21.png', 'multimedia/projects/30/issues/Snimek-obrazovky-2018-02-15-v-14.31.21.png', NULL, NULL, '2018-02-27 09:14:49', '157802'),
(239, 'Snimek-obrazovky-2018-03-01-v-9.37.56.png', 'multimedia/loginPictures/Snimek-obrazovky-2018-03-01-v-9.37.56.png', NULL, NULL, '2018-03-01 12:07:28', '230707');

-- --------------------------------------------------------

--
-- Table structure for table `multimedia_folder`
--

CREATE TABLE `multimedia_folder` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `datein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `name_safe` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text COLLATE utf8_slovak_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `name_safe`, `creator_id`, `create_date`, `description`) VALUES
(3, 'JUNO', '3-juno', 14, '2018-01-18 08:32:24', NULL),
(4, 'Webstranka DENEVY', '4-webstranka-denevy', 14, '2018-01-18 08:32:46', NULL),
(6, 'FisoProjekt', '6-fisoprojekt', 14, '2018-01-18 12:30:13', NULL),
(7, 'Testovací Projekt 1', '7-testovaci-projekt-1', 14, '2018-01-22 11:44:06', NULL),
(9, 'Only CRM', '9-only-crm', 14, '2018-01-22 18:21:59', NULL),
(12, 'TestValidaciProjekt', '12-testvalidaciprojekt', 14, '2018-01-25 11:11:27', NULL),
(13, 'Green Earh - Elephant', '13-green-earh-elephant', 19, '2018-01-25 14:56:14', NULL),
(15, 'OnlyOffice', '15-onlyoffice', 15, '2018-02-05 19:31:07', NULL),
(16, 'OSKAR', '16-oskar', 14, '2018-02-05 21:09:24', NULL),
(18, 'Test Zkouska', '18-test-zkouska', 25, '2018-02-13 12:22:44', NULL),
(19, 'testc', '19-testc', 24, '2018-02-13 11:22:21', NULL),
(20, 'NUPPU', '20-nuppu', 23, '2018-02-13 16:16:16', NULL),
(21, 'Testovací Havazík', '21-testovaci-havazik', 14, '2018-02-14 12:57:13', NULL),
(23, 'Payment Directive', '23-payment-directive', 15, '2018-02-14 16:18:03', 'Zakladny projekt pre PSD2'),
(27, 'Test permis', '27-test-permis', 25, '2018-02-20 07:55:11', 'testovani permissions  '),
(30, 'Regresne Testy', '30-regresne-testy', 24, '2018-02-27 08:35:06', ''),
(32, 'Testovací Scénáře Import', '32-testovaci-scenare-import', 25, '2018-03-01 15:04:57', 'Zkoušení importu nových testovacích scénářů...');

-- --------------------------------------------------------

--
-- Table structure for table `project_role`
--

CREATE TABLE `project_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `project_role`
--

INSERT INTO `project_role` (`id`, `user_id`, `role_id`, `project_id`) VALUES
(21, 14, 1, 4),
(22, 2, 3, 4),
(23, 14, 3, 4),
(24, 14, 2, 4),
(25, 2, 1, 9),
(27, 14, 2, 9),
(31, 15, 1, 9),
(32, 15, 2, 9),
(34, 15, 4, 9),
(41, 16, 5, 9),
(43, 2, 3, 13),
(44, 16, 3, 9),
(45, 19, 3, 9),
(47, 20, 1, 13),
(48, 19, 2, 13),
(49, 19, 1, 9),
(50, 19, 2, 9),
(51, 15, 3, 9),
(53, 15, 5, 9),
(54, 19, 7, 9),
(55, 19, 3, 13),
(56, 19, 5, 13),
(57, 19, 1, 13),
(58, 19, 4, 13),
(59, 19, 7, 13),
(60, 14, 3, 12),
(61, 14, 2, 12),
(62, 14, 1, 12),
(63, 14, 5, 12),
(64, 2, 3, 3),
(65, 14, 1, 16),
(70, 16, 3, 15),
(74, 15, 3, 15),
(75, 23, 3, 16),
(76, 14, 3, 16),
(78, 22, 3, 15),
(79, 2, 3, 15),
(80, 21, 1, 15),
(81, 20, 2, 15),
(82, 23, 4, 15),
(83, 23, 5, 15),
(91, 25, 1, 18),
(92, 24, 2, 18),
(93, 25, 3, 18),
(94, 25, 2, 18),
(95, 20, 4, 18),
(96, 20, 5, 18),
(97, 23, 5, 18),
(98, 21, 7, 18),
(99, 23, 1, 20),
(100, 23, 3, 20),
(101, 15, 1, 23),
(102, 15, 2, 23),
(103, 25, 3, 23),
(104, 24, 3, 23),
(105, 16, 3, 23),
(106, 22, 4, 23),
(107, 21, 5, 23),
(108, 20, 7, 23),
(109, 22, 3, 23),
(110, 2, 3, 23),
(111, 14, 3, 23),
(112, 20, 3, 23),
(113, 21, 3, 23),
(114, 15, 3, 23),
(115, 19, 3, 23),
(116, 23, 3, 23),
(117, 1, 3, 23),
(147, 22, 4, 27),
(148, 21, 5, 27),
(160, 20, 3, 27),
(164, 24, 15, 27),
(165, 25, 2, 27),
(166, 27, 1, 27),
(167, 24, 7, 27),
(168, 25, 3, 27),
(169, 25, 1, 27),
(173, 22, 4, 30),
(176, 21, 5, 30),
(177, 20, 7, 30),
(178, 19, 15, 30),
(179, 27, 1, 30),
(180, 28, 2, 30),
(181, 23, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `name_safe` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `is_for_project` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `name_safe`, `is_for_project`) VALUES
(1, 'Test Manager', 'test-manager', 1),
(2, 'Project Manager', 'project-manager', 1),
(3, 'Test Executor', 'test-executor', 1),
(4, 'Guest', 'guest', 1),
(5, 'Test Analyst', 'test-analyst', 1),
(7, 'Developer', 'developer', 1),
(8, 'Web administrátor', 'web-administrator', 0),
(9, 'Menu práva', 'menu-prava', 0),
(15, 'Reporter', 'reporter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_privilege`
--

CREATE TABLE `role_privilege` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `role_privilege`
--

INSERT INTO `role_privilege` (`id`, `role_id`, `privilege_id`) VALUES
(950, 15, 1),
(951, 15, 2),
(952, 15, 3),
(953, 15, 5),
(971, 8, 1001),
(972, 8, 1002),
(973, 8, 1003),
(974, 8, 1004),
(975, 8, 1005),
(976, 8, 1007),
(977, 8, 1008),
(978, 8, 1009),
(979, 8, 1010),
(980, 8, 1011),
(981, 8, 1012),
(982, 8, 1013),
(1060, 7, 1),
(1061, 7, 2),
(1062, 7, 3),
(1063, 7, 5),
(1064, 7, 6),
(1065, 7, 30),
(1066, 7, 39),
(1067, 5, 1),
(1068, 5, 2),
(1069, 5, 3),
(1070, 5, 5),
(1071, 5, 7),
(1072, 5, 8),
(1073, 5, 9),
(1074, 5, 38),
(1075, 5, 10),
(1076, 5, 11),
(1077, 5, 12),
(1078, 5, 13),
(1079, 5, 37),
(1080, 5, 34),
(1081, 5, 35),
(1082, 5, 39),
(1083, 4, 1),
(1084, 4, 2),
(1085, 3, 1),
(1086, 3, 2),
(1087, 3, 3),
(1088, 3, 4),
(1089, 3, 5),
(1090, 3, 25),
(1091, 3, 26),
(1092, 3, 27),
(1093, 3, 28),
(1094, 3, 34),
(1095, 3, 35),
(1096, 3, 39),
(1097, 2, 1),
(1098, 2, 2),
(1099, 2, 3),
(1100, 2, 5),
(1101, 2, 6),
(1102, 2, 7),
(1103, 2, 8),
(1104, 2, 9),
(1105, 2, 38),
(1106, 2, 10),
(1107, 2, 11),
(1108, 2, 12),
(1109, 2, 13),
(1110, 2, 37),
(1111, 2, 15),
(1112, 2, 16),
(1113, 2, 17),
(1114, 2, 18),
(1115, 2, 19),
(1116, 2, 20),
(1117, 2, 21),
(1118, 2, 22),
(1119, 2, 23),
(1120, 2, 24),
(1121, 2, 29),
(1122, 2, 30),
(1123, 2, 31),
(1124, 2, 40),
(1125, 2, 32),
(1126, 2, 33),
(1127, 2, 34),
(1128, 2, 35),
(1129, 2, 39),
(1130, 2, 36),
(1162, 9, 1006),
(1163, 9, 1007),
(1164, 9, 1008),
(1165, 9, 1009),
(1166, 9, 1010),
(1167, 9, 1011),
(1198, 1, 1),
(1199, 1, 2),
(1200, 1, 3),
(1201, 1, 5),
(1202, 1, 6),
(1203, 1, 7),
(1204, 1, 8),
(1205, 1, 9),
(1206, 1, 38),
(1207, 1, 10),
(1208, 1, 11),
(1209, 1, 12),
(1210, 1, 13),
(1211, 1, 37),
(1212, 1, 15),
(1213, 1, 16),
(1214, 1, 17),
(1215, 1, 18),
(1216, 1, 19),
(1217, 1, 20),
(1218, 1, 21),
(1219, 1, 22),
(1220, 1, 23),
(1221, 1, 24),
(1222, 1, 29),
(1223, 1, 30),
(1224, 1, 32),
(1225, 1, 34),
(1226, 1, 35),
(1227, 1, 39),
(1228, 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `option` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option`, `description`, `date_update`) VALUES
(1, 'help', '<p>Priestor pre popis Va&scaron;ej vlastnej dokument&aacute;cie.</p>\n<p>Loren impsum ...&nbsp;</p>\n<p>asdfasdfsdfasdf</p>\n<p>asdfasdf</p>\n<p>acdad&nbsp;</p>', '2016-05-03 11:55:47'),
(12, 'mailer_host', 'admin.emaily.online', '2016-08-08 13:59:18'),
(13, 'mailer_port', '587', '2016-08-08 13:59:26'),
(14, 'mailer_username', 'support@denevy.de', '2016-08-08 13:59:41'),
(15, 'mailer_password', 'njrdGgH6BhPx7A4q', '2016-08-08 13:59:52'),
(16, 'mailer_secure', 'ssl', '2016-08-08 14:00:02'),
(17, 'mailer_timeout', '20', '2016-08-08 14:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `tag_test_case`
--

CREATE TABLE `tag_test_case` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `test_case_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `tag_test_case`
--

INSERT INTO `tag_test_case` (`id`, `name`, `test_case_id`, `start_date`, `end_date`) VALUES
(1, 'sme', 286, NULL, NULL),
(2, 'ukol', 286, NULL, NULL),
(3, 'feature', 286, NULL, NULL),
(4, 'Tag1', 287, NULL, NULL),
(5, 'plan', 288, NULL, NULL),
(16, 'analyses', 289, NULL, NULL),
(106, 'Tag1', 398, NULL, NULL),
(107, 'Tag1', 399, NULL, NULL),
(108, 'Tag1', 400, NULL, NULL),
(109, 'Tag1', 401, NULL, NULL),
(110, 'Tag1', 402, NULL, NULL),
(111, 'Tag1', 403, NULL, NULL),
(112, 'Tag1', 404, NULL, NULL),
(113, 'Tag1', 405, NULL, NULL),
(114, 'Tag1', 406, NULL, NULL),
(115, 'Tag1', 407, NULL, NULL),
(116, 'Tag1', 408, NULL, NULL),
(117, 'Tag1', 409, NULL, NULL),
(118, 'Tag1', 410, NULL, NULL),
(119, 'Tag1', 411, NULL, NULL),
(120, 'Tag1', 412, NULL, NULL),
(121, 'Tag1', 413, NULL, NULL),
(122, 'Tag1', 414, NULL, NULL),
(123, 'Tag1', 415, NULL, NULL),
(124, 'Tag1', 416, NULL, NULL),
(125, 'Tag1', 417, NULL, NULL),
(126, 'Tag1', 418, NULL, NULL),
(127, 'Tag1', 419, NULL, NULL),
(128, 'Tag1', 420, NULL, NULL),
(129, 'Tag1', 421, NULL, NULL),
(130, 'Tag1', 422, NULL, NULL),
(131, 'Tag1', 423, NULL, NULL),
(132, 'Tag1', 424, NULL, NULL),
(133, 'Tag1', 425, NULL, NULL),
(134, 'Tag1', 426, NULL, NULL),
(135, 'Tag1', 427, NULL, NULL),
(136, 'Tag1', 428, NULL, NULL),
(137, 'Tag1', 429, NULL, NULL),
(138, 'Tag1', 430, NULL, NULL),
(139, 'Tag1', 431, NULL, NULL),
(140, 'Tag1', 432, NULL, NULL),
(141, 'Tag1', 433, NULL, NULL),
(142, 'Tag1', 434, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_test_set`
--

CREATE TABLE `tag_test_set` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `test_set_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `tag_test_set`
--

INSERT INTO `tag_test_set` (`id`, `name`, `test_set_id`) VALUES
(2, 'Tag1', 130),
(3, 'test plan', 131),
(14, 'test plan', 132),
(16, 'ASD', 143),
(35, 'TvorbaProjektu', 167),
(36, 'TvorbaProjektu', 168),
(37, 'TvorbaProjektu', 169),
(38, 'TvorbaTestSetu', 170),
(39, 'TvorbaTestSetu', 171),
(40, 'TvorbaTestSetu', 172),
(41, 'TvorbaTestSetu', 173);

-- --------------------------------------------------------

--
-- Table structure for table `test_case`
--

CREATE TABLE `test_case` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `result` text COLLATE utf8_slovak_ci,
  `priority` int(11) DEFAULT '1',
  `approved` int(11) DEFAULT '0',
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `test_set_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_case`
--

INSERT INTO `test_case` (`id`, `name`, `description`, `result`, `priority`, `approved`, `creator_id`, `create_date`, `test_set_id`) VALUES
(38, 'Kontrola Homepage', 'Homepage musi byt kompletna', '', 1, 0, 14, '2018-01-18 16:33:52', 10),
(39, 'Kontrola kontaktneho formulara', 'Kontakny formular musi obsahovat meno, email a textove pole', '', 1, 0, 14, '2018-01-18 16:35:42', 10),
(40, 'Kontrola Userov', '', '', 3, 0, 14, '2018-01-18 17:21:49', 10),
(41, 'Kontrola Obrazku na Homepage', 'KOntrola umiestnenia a velkosti obrazka', '', 3, 0, 14, '2018-01-18 17:23:24', 9),
(42, 'Kontrola textov', 'Skrontrolujeme vsetky texty na stranke', '', 2, 0, 14, '2018-01-18 21:09:29', 9),
(43, 'Kontrola galerie', 'Galeria musi obsahovat firemne produktyu', '', 1, 0, 14, '2018-01-18 21:15:14', 10),
(44, 'Napojenie na Kibany', 'Skontrolujeme ci obsah logov sa posiela do Kibany', '', 3, 0, 14, '2018-01-18 21:22:43', 11),
(45, 'Napojenie na CRM', 'Skontrolujeme ci sa nam dotahuju zakaznicke udaje z CRM', '', 3, 0, 14, '2018-01-18 21:23:55', 11),
(46, 'testcase1', 'tento test case má za ukol něco otestovat', 'otestováním tohoto získám něco', 3, 0, 14, '2018-01-22 10:02:20', 12),
(48, 'Novy profil v maske prav', 'zakladny popis pre zalozenie masky prav - novy profil', 'zalozenie masky prav pre novy profil bolo uspesne.', 2, 0, 14, '2018-01-22 18:37:33', 17),
(49, 'Zmena povodneho profilu v maske prav', 'zakladny popis pre zalozenie masky prav - novy profil', 'zalozenie masky prav pre novy profil bolo uspesne.', 3, 0, 14, '2018-01-22 18:40:52', 17),
(51, 'Loren Impsum', 'Loren Impsum', 'Loren Impsum', 2, 0, 14, '2018-01-22 18:47:07', 17),
(52, 'Loren Impsum Loren Impsum', 'Loren Impsum Loren Impsum', ' Loren ImpsumLoren ImpsumLoren ImpsumLoren Impsum Loren Impsum', 2, 0, 14, '2018-01-22 18:47:48', 17),
(53, 'Loren ImpsumLoren ImpsumLoren ImpsumLoren Impsum', 'Loren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum', ' Loren ImpsumLoren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum ', 3, 0, 14, '2018-01-22 18:48:26', 14),
(54, 'Loren ImpsummpsumLoren ImpsumLoren ImpsumLoren Impsum', 'Loren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum', ' Loren ImpsumLoren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum ', 3, 0, 14, '2018-01-22 18:48:40', 14),
(55, 'Dolerimugos lupikujj', 'Loren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum', ' Loren ImpsumLoren ImpsumLoren ImpsumLoren Impsum Loren ImpsumLoren ImpsumLoren Impsum ', 3, 0, 14, '2018-01-22 18:49:42', 14),
(56, 'Test 1', NULL, NULL, 1, 0, 2, '2018-01-23 22:01:05', 18),
(57, 'Test 2', NULL, NULL, 1, 0, 2, '2018-01-23 22:01:05', 18),
(58, 'weewew', 'sdfsdfds', 'sdfsdfsdf', 3, 0, 14, '2018-01-23 11:23:32', 16),
(59, 'asdasdsad asd asd asd asd asd asd asd asd asd asdasdasfasdfsdfasdf asdf asdfasdfsadf asdf asdf asdf asdf asdf asdf asdf asdf asdf  fsadf asdf asdf asd', 'asdf asdf ', 'asdf asdf', 1, 0, 14, '2018-01-23 11:33:59', 16),
(60, 'novy certos', NULL, NULL, 1, 0, 15, '2018-01-23 22:01:05', 14),
(61, 'stary certos', NULL, NULL, 1, 0, 15, '2018-01-23 22:01:05', 14),
(62, 'zmena certosu', NULL, NULL, 1, 0, 15, '2018-01-23 22:01:05', 14),
(63, 'dddd', NULL, NULL, 1, 0, 15, '2018-01-23 22:01:05', 14),
(64, 'sdsfsdf', NULL, NULL, 1, 0, 15, '2018-01-23 22:01:05', 14),
(65, 'sdxcvxcv', NULL, NULL, 1, 0, 15, '2018-01-23 22:01:05', 14),
(66, 'Kontrola obsahu noviniek', NULL, NULL, 1, 0, 14, '2018-01-23 22:01:05', 9),
(67, 'hjkhas dkjlfh lhasdf', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:36', 16),
(68, 'asdfasdflkj lkjasd flkj ;lkajs dlf', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:40', 16),
(69, ';laksjd fl;kj ;lkj asl;dkjf l;kj', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:39', 16),
(70, 'sadfasdfsdfas asd asdf', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:38', 16),
(71, 'asdf asdf asdf asdf', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:45', 16),
(72, 'asdf asdf asdf asdf asdf ', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:46', 16),
(73, 'asdf asdf asdf ', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:52', 16),
(74, 'dfgsdfgsdfg dsfg dfg', NULL, NULL, 1, 0, 15, '2018-01-25 12:17:50', 16),
(78, 'Kontrola formatovania <p>', '', '', 1, 0, 14, '2018-01-25 08:05:18', 9),
(85, 'test case 1', 'ocekavam', 'vysledek', 1, 0, 14, '2018-01-25 11:28:00', 23),
(86, 'bulk1', NULL, NULL, 1, 0, 14, '2018-01-25 11:30:58', 23),
(87, 'bulkd 3', NULL, NULL, 1, 0, 14, '2018-01-25 11:30:58', 23),
(88, 'asdasdfsdfsadf zxcv zxcv zxcv xzcv zxv zx vzx cv zxcv zx cvzxcvzxcvzxc vzx vzx cvzx cv zxvc zx vc zxcvzxcvasdfasgsdfg sdfg sdfg sdf gsd fg sdfg sd fg ', '', '', 1, 0, 15, '2018-01-25 11:56:15', 16),
(89, 'zmena certosu', '', '', 1, 0, 15, '2018-01-25 11:57:14', 16),
(90, 'zmena certosu', '', '', 1, 0, 15, '2018-01-25 11:57:21', 17),
(91, '', '', '', 1, 0, 2, '2018-01-25 12:55:28', 14),
(92, 'kořist krvácí', '', '', 3, 0, 19, '2018-01-25 15:14:47', 24),
(93, 'neporanena korist', '', '', 2, 0, 19, '2018-01-25 15:17:02', 24),
(94, '1', NULL, NULL, 1, 0, 14, '2018-02-04 21:34:07', 23),
(95, '2', NULL, NULL, 1, 0, 14, '2018-02-04 21:34:07', 23),
(96, '3', NULL, NULL, 1, 0, 14, '2018-02-04 21:34:07', 23),
(97, '1', NULL, NULL, 1, 0, 14, '2018-02-04 21:34:39', 25),
(98, '2', NULL, NULL, 1, 0, 14, '2018-02-04 21:34:39', 25),
(99, '3', NULL, NULL, 1, 0, 14, '2018-02-04 21:34:39', 25),
(100, '4', NULL, NULL, 1, 0, 14, '2018-02-04 21:34:39', 25),
(101, '5', '', '', 1, 0, 14, '2018-02-04 21:48:47', 25),
(102, 'sdfasdfsdf', NULL, NULL, 1, 0, 15, '2018-02-06 10:22:42', 26),
(103, 'asdfasdfasdf asdf asdf ', NULL, NULL, 1, 0, 15, '2018-02-06 10:22:42', 26),
(104, 'asdf asdf asdf asdf ', NULL, NULL, 1, 0, 15, '2018-02-06 10:22:42', 26),
(105, 'asdf asdf asdf ', NULL, NULL, 1, 0, 15, '2018-02-06 10:22:42', 26),
(106, 'asdf asdf sdf', NULL, NULL, 1, 0, 15, '2018-02-06 10:22:42', 26),
(107, 'asdfasdf', 'asdsdfsdf asdf asdf ', 'asdf asdf asdf  asdf sdf sadf ', 2, 0, 15, '2018-02-06 10:23:18', 26),
(108, 'asdfasdfsdfgsdf', 'sdfgsdfgdsfg', 'sdfgsdfg', 1, 0, 15, '2018-02-06 10:23:35', 26),
(109, 'Funguje Docker', NULL, NULL, 1, 0, 14, '2018-02-06 22:16:41', 27),
(110, 'Nainstalujem aplikaciu', NULL, NULL, 1, 0, 14, '2018-02-06 22:16:41', 27),
(111, 'Otestujem core', NULL, NULL, 1, 0, 14, '2018-02-06 22:16:41', 27),
(112, 'Hotovo', NULL, NULL, 1, 0, 14, '2018-02-06 22:16:41', 27),
(113, 'Zintegrujem s VPN', '', '', 1, 0, 14, '2018-02-06 22:20:00', 28),
(114, 'Zintegrujem s IAM', 'Popis IAM integracie', 'Bude zintegrovane', 1, 0, 14, '2018-02-06 22:19:35', 28),
(115, 'Jeden case', NULL, NULL, 1, 0, 14, '2018-02-06 22:30:20', 29),
(116, 'Druhy case', NULL, NULL, 1, 0, 14, '2018-02-06 22:30:20', 29),
(117, 'Treti case', NULL, NULL, 1, 0, 14, '2018-02-06 22:30:20', 29),
(118, 'Prvy test case', NULL, NULL, 1, 0, 15, '2018-02-08 11:37:03', 31),
(119, 'Druhy test case', NULL, NULL, 1, 0, 15, '2018-02-08 11:37:03', 31),
(120, 'Treti TC', NULL, NULL, 1, 0, 15, '2018-02-08 11:37:03', 31),
(121, 'sdfsadfsdf', NULL, NULL, 1, 0, 15, '2018-02-08 11:37:03', 31),
(122, 'sdfsdfsdfxcvzxc', 'zxcvcxzv', 'xzcvxczv', 1, 0, 15, '2018-02-08 11:39:28', 31),
(123, 'zxcvxzcv akjsdfkasdhfkj', 'j lkjas dklfj klj alskdjf lkj lkasjd lfkj lja sdlfj lkj alskdjf testtell', 'fportal funguje', 3, 0, 15, '2018-02-08 11:39:02', 31),
(124, 'Loign ako user', 'asdfsadf', 'asdfasdf', 2, 0, 15, '2018-02-13 07:59:05', 32),
(125, 'Negatiny scenar - Ante nema heslo', 'lkjLK;jakl', 'Neda sa Anet prihlasit', 2, 0, 15, '2018-02-13 07:59:56', 32),
(126, 'testy s certifikatom', NULL, NULL, 1, 0, 15, '2018-02-13 08:01:38', 32),
(127, 'Testy s cipovou kartou', NULL, NULL, 1, 0, 15, '2018-02-13 08:01:38', 32),
(128, 'test v otlackom prstu', NULL, NULL, 1, 0, 15, '2018-02-13 08:01:38', 32),
(129, 'Login cez NFC ring', '', '', 1, 0, 15, '2018-02-13 08:02:35', 32),
(130, 'Password change', 'Změna hesla z defaultniho a vlastni', 'Zmena hesla', 2, 1, 24, '2018-02-13 12:07:15', 37),
(131, 'Login', 'Přihlašování nového uživatele na portál a email', 'Úspěšné přihlášení do systému ', 2, 1, 25, '2018-02-13 12:03:02', 36),
(132, 'Změna hesla', 'Změna heslo pro firemní email a portál. ', 'Vytvoření osobního hesla pro větší zabezpečení.', 3, 1, 25, '2018-02-13 14:41:02', 36),
(133, 'Ztrata hesla', 'Ztrata a vytvoření nového hesla', 'Nové heslo', 3, 1, 24, '2018-02-13 12:44:06', 37),
(142, 'Změna osobních udaju', 'Zaměneni telofonní čisla', 'Uvedení platného telofonního čísla', 2, 1, 24, '2018-02-13 14:24:43', 39),
(143, 'Test Analyses', 'Vytvoření test analyses', 'hotová práce(část práce)', 1, 0, 25, '2018-02-13 14:16:46', 38),
(144, 'Přidělení role', 'Přidělení role za ucelem vytvoreni projektu', 'Vytvoreni vlastniho projektu', 3, 1, 24, '2018-02-13 14:12:56', 39),
(145, 'Test Execution', 'Vytvoření Test execution', 'výsledky jednotlivých kroků test exucution', 1, 0, 25, '2018-02-13 14:14:44', 38),
(147, 'Test Issues', 'Pro nefungující kroky - vytvoření issues', 'vytvoření issues', 2, 0, 25, '2018-02-13 14:35:22', 38),
(148, 'Issue', 'Objevení chyby a jeji popis', 'Vyřešení daného problému', 2, 1, 24, '2018-02-13 14:39:55', 39),
(150, 'TestCase1', NULL, NULL, 1, 0, 2, '2018-02-13 15:09:22', 42),
(151, 'TestCase2', NULL, NULL, 1, 0, 2, '2018-02-13 15:09:22', 43),
(152, 'TestCase3', NULL, NULL, 1, 0, 2, '2018-02-13 15:09:22', 44),
(153, 'Polozime zaklady garazi', '', '', 1, 1, 23, '2018-02-13 16:31:46', 45),
(154, 'Postaviame garaze', '', '', 1, 1, 23, '2018-02-13 16:31:35', 45),
(155, 'Zakladna doska prveho podlazia', '', '', 1, 1, 23, '2018-02-13 16:31:23', 45),
(156, 'Postavime prizemie', '', '', 1, 1, 23, '2018-02-13 16:31:06', 45),
(157, 'Init', 'Fgtff', 'Hhjjb', 1, 0, 15, '2018-02-13 17:23:29', 37),
(158, 'Jgkhgjvkh', 'Jhfjhfzjfjhf', 'Hlihligjg', 1, 1, 15, '2018-02-13 17:25:51', 37),
(159, 'Ghghghg', 'Jhfjhvjh', 'Vjhfjhfhvhj', 1, 0, 15, '2018-02-13 17:28:05', 39),
(160, 'Hjhjhjghghghg bnbnbbnhjhjhuzuzuzuiu nbbnbnbhghghghgztztztztuzzzi bnbnbnbjhjhjhui', 'Ksksks', 'Akakkakaa', 1, 0, 15, '2018-02-13 17:37:45', 32),
(161, 'Hvhjvjhgzjfjhghjggjg', NULL, NULL, 1, NULL, 15, '2018-02-13 17:44:34', 26),
(162, 'Ngnghghghghghhghghghbbbnbnbjgj', NULL, NULL, 1, NULL, 15, '2018-02-13 17:44:34', 26),
(163, 'Jzfjzfhjfhjfjhvhjvjhgujghghjgjugjhghjghgjuujgjhghjgjhg', NULL, NULL, 1, NULL, 15, '2018-02-13 17:44:34', 26),
(164, 'Gfhgfghdgdhgdhg', NULL, NULL, 1, NULL, 15, '2018-02-13 17:44:34', 26),
(165, 'Hgfhgfhfhgfhgfhgffjh', NULL, NULL, 1, NULL, 15, '2018-02-13 17:44:34', 26),
(166, 'Ghghggh', NULL, NULL, 1, NULL, 15, '2018-02-13 17:46:51', 52),
(167, 'Gghghghghhg', NULL, NULL, 1, NULL, 15, '2018-02-13 17:46:51', 52),
(168, 'Fgfgfggf', NULL, NULL, 1, NULL, 15, '2018-02-13 17:46:51', 52),
(169, 'Gghgghghghghvhfgdgdgf', NULL, NULL, 1, NULL, 15, '2018-02-13 17:48:03', 52),
(170, 'Gfgfdgdfcgcxfggjjh', NULL, NULL, 1, NULL, 15, '2018-02-13 17:48:03', 52),
(171, 'Lilikjkjkjkjk', NULL, NULL, 1, NULL, 15, '2018-02-13 17:48:03', 52),
(172, 'Koioioiiuui(', NULL, NULL, 1, NULL, 15, '2018-02-13 17:48:03', 52),
(173, 'Hgtztzrtrttdtdt', NULL, NULL, 1, NULL, 15, '2018-02-13 17:48:03', 52),
(174, 'Erewewewe', NULL, NULL, 1, NULL, 15, '2018-02-13 17:48:03', 52),
(175, 'adasdfasdfasdf', NULL, NULL, 1, NULL, 15, '2018-02-14 17:01:23', 64),
(176, 'asdfasdfsadfsadfsdf', NULL, NULL, 1, NULL, 15, '2018-02-14 17:01:23', 64),
(177, 'zxcvzxcvxzcvxcv', NULL, NULL, 1, NULL, 15, '2018-02-14 17:01:23', 64),
(178, 'zxcvzxcvxcvasdfasdfasdf', NULL, NULL, 1, NULL, 15, '2018-02-14 17:01:23', 64),
(179, 'asdfzvzxcvxcv', 'zxcvxczv', 'zxczxcvzxcv', 2, 0, 15, '2018-02-14 17:01:47', 65),
(180, 'asdxcvxzczxczxcvxczvzxcvzxcv', NULL, NULL, 1, NULL, 15, '2018-02-14 17:02:39', 53),
(181, 'zxcvzxcvzxcvxzcv', NULL, NULL, 1, NULL, 15, '2018-02-14 17:02:39', 53),
(182, 'zxcvzxcvxzcvxcvasdfasdfasdf', NULL, NULL, 1, NULL, 15, '2018-02-14 17:02:39', 53),
(183, 'asdfasdfzxcxzbxvwqeqwewq', NULL, NULL, 1, NULL, 15, '2018-02-14 17:02:39', 53),
(184, 'asdfasdfasdfxzcvzxcb', NULL, NULL, 1, NULL, 15, '2018-02-14 17:02:39', 53),
(185, '01_zxcvzxcvxzcvafsadfsdf', '', '', 1, 0, 15, '2018-02-14 17:08:00', 53),
(186, 'asdfasdfsadfxcvqweewqerwer', NULL, NULL, 1, NULL, 15, '2018-02-14 17:02:39', 53),
(187, 'asdfxbxcvbcxvbcbv', NULL, NULL, 1, NULL, 15, '2018-02-14 17:03:50', 60),
(188, 'xcvbxcvbxcvbcxvbxcvbxcvbcvb', NULL, NULL, 1, NULL, 15, '2018-02-14 17:03:50', 60),
(189, 'jkskjdfklsjdklfjsdl kjf kljsd fklj lksjd flkj lksdj fkljs dlkjf klsjd lkfj skldj fklsjd klfj sdklfj klsdj flksdj fkldsjf dlskfj dsklfj sdklfjds flkdsj', NULL, NULL, 1, NULL, 15, '2018-02-14 17:03:50', 60),
(190, 'ksdkfjkl sjdklf jklsj dlkfj a;ljs d;lkfj asl;kdjf l;kajs dlfk;j aslk;djf lkasjd', 'asdfasdfsadf lkja sdlkfj lkjas dkljf klja sdkljf klj asdlkjf lkja sdlkjf klajs dfklj klasjd flkj klasjd fklj aklsjd flkj askldjf klja sdlkfj klajsd flkj askldjf klj askldfj lkajs dflkj aslkdfj klasj dfklj asdklfj kalsdj flkj asdklfj klasjd fklja sdlfkj aslkdfj lkasdj flkajs dfklj asdlfkj aslkd fjlkasj dflkjas dflkja sdflk jaslkdfj alksdj flkasj dfuosaidu oiu ioasud fiou ioausd fiou iouas dfiou ioasud fiou iaosudf', 'kjasd lfj klja slkdjf klj klja sdklfjl;kajsdlk;fj lkja sdlkfj lkajsd klfj lkasjd flkj askldjf klja slkdjf klja sdkljf klja skldjf lkajs dklfj klasjd flkj aslkdjf lkja slkdjf lkajs dlkfj lkasj dflkj askldf', 2, 0, 15, '2018-02-14 17:07:08', 58),
(191, 'Init check', 'asdfsadfsdf', 'asdfsadfsadf', 3, 0, 15, '2018-02-14 17:14:56', 59),
(192, 'asdfsadfvcxczv', 'xczvxzcv', 'zxcvxzcv', 1, 0, 15, '2018-02-14 17:15:38', 58),
(193, 'Test Viac priloh', 'test viac priloh Test Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac priloh', 'Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac prilohTest Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh Test Viac priloh', 1, 0, 15, '2018-02-14 17:16:52', 53),
(194, 'zxcvzxcvzxcv', NULL, NULL, 1, NULL, 15, '2018-02-14 17:28:25', 57),
(195, 'zxcvzxcv bzxasfasdfsadfsdaf', NULL, NULL, 1, NULL, 15, '2018-02-14 17:28:25', 57),
(196, 'asdfasdfasdfwqerwqerwerasdfsadfdsf', NULL, NULL, 1, NULL, 15, '2018-02-14 17:28:25', 57),
(197, 'asdfsadfdfsqwttretrtertertqerqwerwerwqer', NULL, NULL, 1, NULL, 15, '2018-02-14 17:28:25', 57),
(198, 'qwerqwerwerwqerqwertrewrtewrtqwerqwer', NULL, NULL, 1, NULL, 15, '2018-02-14 17:28:25', 57),
(199, 'Tereza Vesela', 'Tereza Vesela', 'Tereza Vesela', 1, 0, 15, '2018-02-14 18:07:11', 53),
(200, 'Tereza Vesela', 'Tereza Vesela', 'Tereza Vesela', 1, 0, 15, '2018-02-14 18:07:48', 53),
(201, 'Tereza Vesela', 'Tereza Vesela', 'Tereza Vesela', 1, 0, 15, '2018-02-14 18:08:08', 53),
(202, 'Tereza Vesela', 'Tereza Vesela', 'Tereza Vesela', 1, 0, 15, '2018-02-14 18:08:24', 53),
(203, 'Strhání tapet', 'Strháme tapety z celé místnosti a provedeme nutné práce', 'předpřipravená místnost', 1, 1, 25, '2018-02-15 07:42:30', 67),
(204, 'Flash', 'Stažení a připojení flash do televize', 'Přehrání filmů', 1, 0, 24, '2018-02-15 07:43:00', 68),
(205, 'Nakoupení materiálu a práce na zdech', 'Musíme změřit velikosti zdí a stropu, abychom odhadli množství materiálu, který bude potřeba. Následné potřebné práce na zdech.', 'připravený materiál a zdi na štukování a bílení', 1, 1, 25, '2018-02-15 07:52:45', 67),
(206, 'Hrubé práce', 'Připravíme fólie a kartony, abychom mohli začít z prací. A následně provedeme všechny kroky prací a dokončíme místnost bílením. ', 'hotová místnost', 1, 1, 25, '2018-02-15 07:59:51', 67),
(207, 'DVD', 'Vypálení filmů', 'Přehrání filmů', 1, 0, 24, '2018-02-15 08:02:07', 68),
(208, 'TestCase1', NULL, NULL, 1, 0, 25, '2018-02-15 08:12:39', 69),
(209, 'TestCase2', NULL, NULL, 1, 0, 25, '2018-02-15 08:12:39', 70),
(210, 'TestCase3', NULL, NULL, 1, 0, 25, '2018-02-15 08:12:39', 71),
(211, 'TestCase1', 'ad', 'wqe', 1, 0, 24, '2018-02-15 08:31:23', 72),
(212, 'TestCase2', NULL, NULL, 1, 0, 24, '2018-02-15 08:13:22', 73),
(213, 'TestCase3', NULL, NULL, 1, 0, 24, '2018-02-15 08:13:22', 74),
(214, 'TestCase1', NULL, NULL, 1, 0, 15, '2018-02-15 08:24:06', 75),
(215, 'TestCase2', NULL, NULL, 1, 0, 15, '2018-02-15 08:24:06', 76),
(216, 'TestCase3', NULL, NULL, 1, 1, 15, '2018-02-27 13:27:36', 77),
(217, 'TestCase1', NULL, NULL, 1, 1, 15, '2018-02-27 13:27:31', 78),
(218, 'TestCase2', '', '', 1, 1, 15, '2018-02-15 12:35:04', 79),
(220, 'TestCase1', NULL, NULL, 1, 0, 24, '2018-02-15 08:33:46', 81),
(221, 'TestCase2', NULL, NULL, 1, 0, 24, '2018-02-15 08:33:46', 82),
(222, 'TestCase3', NULL, NULL, 1, 0, 24, '2018-02-15 08:33:46', 83),
(247, 'Test Case Clone', '', '', 1, 1, 15, '2018-02-19 15:29:07', 79),
(248, 'Test Case Clone 2 ...', '', '', 1, 1, 15, '2018-02-19 15:29:24', 79),
(266, 'TestPlan/Sprint', NULL, NULL, 1, 0, 25, '2018-02-20 10:55:58', 119),
(267, 'Test Set', NULL, NULL, 1, 0, 25, '2018-02-20 10:55:58', 120),
(268, 'TestCase', NULL, NULL, 1, 0, 25, '2018-02-20 10:55:58', 121),
(269, 'TestStep', NULL, NULL, 1, 0, 25, '2018-02-20 10:55:58', 122),
(270, 'Test Roles in project', NULL, NULL, 1, 0, 25, '2018-02-20 10:55:58', 123),
(271, 'Test Issues', NULL, NULL, 1, 0, 25, '2018-02-20 10:55:58', 124),
(272, 'Test Project Settings', NULL, NULL, 1, 0, 25, '2018-02-20 10:55:58', 125),
(273, 'asdasd', 'asdas', 'asdasd', 1, 0, 25, '2018-02-20 13:45:34', 119),
(277, 'lklkl', '', '', 1, 1, 15, '2018-02-27 13:27:20', 79),
(278, 'Initi58745', '', '', 1, 1, 15, '2018-02-27 13:27:20', 79),
(279, 'asdfasdfasdfzxcv212454', '', '', 1, 1, 15, '2018-02-27 13:27:31', 78),
(280, 'asdgafgxcbx', '', '', 1, 1, 15, '2018-02-22 10:27:36', 77),
(281, 'a;lksdjfkalsdf', NULL, NULL, 1, NULL, 15, '2018-02-27 07:51:28', 58),
(282, 'asdfasdfdsaf', NULL, NULL, 1, NULL, 15, '2018-02-27 07:51:28', 58),
(283, 'asfgxgasdfg', NULL, NULL, 1, NULL, 15, '2018-02-27 07:51:28', 58),
(284, 'asdfsadf', NULL, NULL, 1, NULL, 15, '2018-02-27 07:51:28', 58),
(285, 'dfdfghfgdhgdf', NULL, NULL, 1, NULL, 15, '2018-02-27 07:51:28', 58),
(286, 'gdfsgdfg', 'asdfsdf', 'dfssbvb', 1, 0, 15, '2018-02-27 07:55:09', 53),
(287, 'TestSprint', '', '', 1, 1, 24, '2018-03-01 10:13:49', 130),
(288, 'testování planu', NULL, NULL, 1, 1, 24, '2018-02-27 09:17:48', 131),
(289, 'testováni analyses', 'qwdewqedeq', 'asd', 1, 1, 24, '2018-03-01 08:33:04', 132),
(300, 'fewerf', NULL, NULL, 1, NULL, 24, '2018-02-27 10:33:08', 130),
(301, 'efefe', NULL, NULL, 1, NULL, 24, '2018-02-27 10:33:08', 130),
(398, 'S diakritikou', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 167),
(399, 'Bez diakritiky', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 167),
(400, 'Čísla', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 167),
(401, 'Speciální znaky', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 167),
(402, 'Prázdný název', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 167),
(403, 'Mezery', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 167),
(404, 'Duplicita', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 167),
(405, 'S dikaritikou', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 168),
(406, 'Bez diakritiky', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 168),
(407, 'Čísla', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 168),
(408, 'Speciální znaky', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 168),
(409, 'Prázdný popis', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 168),
(410, 'Mezery', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 168),
(411, 'Duplicita', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 168),
(412, 'Zavření', NULL, NULL, 1, 0, 25, '2018-03-01 14:57:43', 169),
(413, 'S diakritikou', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 170),
(414, 'Bez diakritiky', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 170),
(415, 'Čísla', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 170),
(416, 'Speciální znaky', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 170),
(417, 'Prázdný název', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 170),
(418, 'Mezery', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 170),
(419, 'Duplicita', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 170),
(420, 'S diakritikou', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 171),
(421, 'Bez diakritiky', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 171),
(422, 'Čísla', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 171),
(423, 'Speciální znaky', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 171),
(424, 'Prázdný název', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 171),
(425, 'Mezery', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 171),
(426, 'Duplicita', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 171),
(427, 'S diakritikou', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 172),
(428, 'Bez diakritiky', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 172),
(429, 'Čísla', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 172),
(430, 'Speciální znaky', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 172),
(431, 'Prázdný název', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 172),
(432, 'Mezery', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 172),
(433, 'Duplicita', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 172),
(434, 'Zavření', NULL, NULL, 1, 0, 25, '2018-03-01 14:58:43', 173);

-- --------------------------------------------------------

--
-- Table structure for table `test_case_multimedia`
--

CREATE TABLE `test_case_multimedia` (
  `id` int(11) NOT NULL,
  `test_case_id` int(11) NOT NULL,
  `multimedia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_case_multimedia`
--

INSERT INTO `test_case_multimedia` (`id`, `test_case_id`, `multimedia_id`) VALUES
(69, 193, 224),
(70, 193, 225),
(71, 193, 226),
(72, 193, 227),
(73, 193, 228),
(74, 193, 229),
(75, 193, 230),
(76, 279, 236);

-- --------------------------------------------------------

--
-- Table structure for table `test_case_run`
--

CREATE TABLE `test_case_run` (
  `id` int(11) NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endtime` timestamp NULL DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `test_plan_sprint_case_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_case_run`
--

INSERT INTO `test_case_run` (`id`, `starttime`, `endtime`, `creator_id`, `test_plan_sprint_case_id`) VALUES
(1, '2018-02-06 10:27:09', '2018-02-06 10:27:10', 15, 17),
(2, '2018-02-06 10:27:21', NULL, 15, 17),
(3, '2018-02-06 10:27:37', NULL, 15, 16),
(4, '2018-02-06 22:20:14', NULL, 23, 19),
(5, '2018-02-08 11:44:46', NULL, 15, 25),
(6, '2018-02-08 11:46:50', '2018-02-08 11:47:31', 15, 24),
(7, '2018-02-08 11:47:37', NULL, 15, 24),
(8, '2018-02-08 12:13:55', NULL, 2, 17),
(9, '2018-02-13 08:10:11', '2018-02-13 08:10:49', 15, 38),
(10, '2018-02-13 08:10:53', '2018-02-13 08:10:57', 15, 38),
(11, '2018-02-13 08:11:13', '2018-02-13 08:11:23', 15, 38),
(12, '2018-02-13 08:11:26', '2018-02-13 08:11:44', 15, 38),
(13, '2018-02-13 08:12:06', NULL, 15, 38),
(14, '2018-02-13 08:12:18', NULL, 15, 34),
(15, '2018-02-13 08:12:39', NULL, 15, 33),
(16, '2018-02-13 12:58:06', '2018-02-13 12:58:57', 25, 49),
(17, '2018-02-13 12:58:50', '2018-02-13 12:59:31', 24, 51),
(18, '2018-02-13 12:59:21', '2018-02-13 12:59:43', 25, 49),
(19, '2018-02-13 13:00:11', NULL, 24, 52),
(21, '2018-02-13 14:15:07', '2018-02-13 14:15:24', 24, 62),
(22, '2018-02-13 14:15:30', '2018-02-13 14:17:09', 24, 61),
(23, '2018-02-13 14:16:36', '2018-02-13 14:17:04', 24, 60),
(24, '2018-02-13 14:17:12', '2018-02-13 14:17:15', 24, 61),
(25, '2018-02-13 14:17:17', '2018-02-13 14:27:37', 24, 61),
(26, '2018-02-13 14:20:16', '2018-02-13 14:20:36', 25, 66),
(27, '2018-02-13 14:25:23', '2018-02-13 14:26:08', 24, 72),
(28, '2018-02-13 14:25:47', '2018-02-13 14:26:03', 24, 71),
(29, '2018-02-13 14:27:50', '2018-02-13 14:28:06', 25, 67),
(30, '2018-02-13 14:37:03', '2018-02-13 14:37:24', 25, 73),
(31, '2018-02-13 14:39:04', '2018-02-13 14:39:29', 25, 74),
(32, '2018-02-13 14:42:16', '2018-02-13 14:43:07', 24, 84),
(33, '2018-02-13 14:42:34', '2018-02-13 14:43:04', 24, 83),
(34, '2018-02-13 17:30:06', '2018-02-13 17:30:45', 15, 72),
(36, '2018-02-14 17:37:50', '2018-02-19 16:50:25', 15, 176),
(37, '2018-02-14 17:42:44', '2018-02-14 17:43:51', 15, 168),
(38, '2018-02-15 08:02:37', '2018-02-15 08:24:56', 25, 225),
(39, '2018-02-15 08:03:39', '2018-02-15 08:04:31', 24, 229),
(40, '2018-02-15 08:08:51', '2018-02-15 08:08:54', 24, 228),
(42, '2018-02-15 12:27:44', NULL, 2, 176),
(43, '2018-02-19 16:50:41', '2018-02-19 16:50:53', 15, 176),
(55, '2018-02-22 07:40:25', '2018-02-22 07:41:17', 14, 200),
(56, '2018-02-26 13:39:21', '2018-02-26 13:41:27', 2, 309),
(57, '2018-02-27 07:57:40', '2018-02-27 07:57:47', 15, 200),
(58, '2018-02-27 08:00:27', NULL, 15, 168),
(59, '2018-02-27 08:42:40', '2018-02-27 08:43:02', 25, 67),
(60, '2018-02-27 08:43:17', '2018-02-27 08:43:52', 25, 75),
(61, '2018-02-27 08:49:21', '2018-02-27 08:53:42', 25, 75),
(62, '2018-02-27 08:55:32', '2018-02-27 08:55:45', 25, 73),
(63, '2018-02-27 08:55:57', '2018-02-27 08:57:16', 24, 315),
(64, '2018-02-27 09:01:53', '2018-02-27 09:03:56', 24, 315),
(65, '2018-02-27 09:03:14', '2018-02-27 09:03:15', 24, 314),
(66, '2018-02-27 09:03:17', '2018-02-27 09:03:36', 24, 314),
(67, '2018-02-27 09:03:41', '2018-02-27 09:03:45', 24, 314),
(68, '2018-02-27 09:04:59', '2018-02-27 09:05:07', 25, 315),
(69, '2018-02-27 09:05:15', '2018-02-27 09:05:24', 24, 313),
(70, '2018-02-27 09:05:50', '2018-02-27 09:06:30', 24, 313),
(71, '2018-02-27 10:23:47', '2018-02-27 10:24:00', 24, 313),
(72, '2018-02-28 14:09:22', '2018-02-28 14:10:35', 19, 317),
(73, '2018-03-01 08:27:23', '2018-03-01 08:27:32', 25, 282),
(74, '2018-03-01 08:28:10', '2018-03-01 08:28:18', 25, 282),
(75, '2018-03-01 08:28:36', '2018-03-01 08:28:44', 25, 282),
(76, '2018-03-01 08:29:13', '2018-03-01 08:29:19', 25, 282),
(77, '2018-03-01 11:46:15', '2018-03-01 11:46:21', 25, 315),
(78, '2018-03-01 11:46:52', '2018-03-01 11:47:21', 25, 313),
(79, '2018-03-01 11:47:01', '2018-03-01 13:16:52', 24, 313),
(80, '2018-03-01 13:16:23', '2018-03-01 13:16:29', 24, 315),
(81, '2018-03-01 13:16:41', '2018-03-01 13:16:49', 24, 314),
(82, '2018-03-01 13:16:54', '2018-03-01 13:17:03', 24, 313),
(83, '2018-03-01 21:56:20', NULL, 23, 389);

-- --------------------------------------------------------

--
-- Table structure for table `test_plan`
--

CREATE TABLE `test_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_slovak_ci NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_plan`
--

INSERT INTO `test_plan` (`id`, `name`, `creator_id`, `create_date`, `project_id`) VALUES
(1, 'Prvy Plan', 14, '2018-02-05 11:11:35', 4),
(2, 'Prvy TP', 15, '2018-02-06 10:24:51', 15),
(3, 'Systemove testy (initial tests)', 14, '2018-02-06 22:15:41', 16),
(4, 'Integracne Testy', 14, '2018-02-06 22:17:03', 16),
(5, 'Vyvoj TP', 15, '2018-02-08 11:40:19', 15),
(6, 'Gruntici', 15, '2018-02-13 08:06:10', 15),
(7, 'Test', 25, '2018-02-13 11:22:35', 18),
(8, 'Test', 24, '2018-02-13 11:28:12', 19),
(10, 'Projekt Juno', 25, '2018-02-13 14:06:13', 18),
(11, 'Juno', 24, '2018-02-13 14:22:49', 19),
(12, 'Zkouska', 24, '2018-02-13 14:41:28', 19),
(13, 'Hruba Stavba', 23, '2018-02-13 16:17:17', 20),
(25, 'test', 14, '2018-02-14 14:17:29', 21),
(26, 'Kampan 18.01', 15, '2018-02-14 16:34:48', 23),
(27, 'Kampan 18.02', 15, '2018-02-14 16:34:59', 23),
(28, 'Kampan 18.03', 15, '2018-02-14 16:35:41', 23),
(29, 'Kampan 18.04', 15, '2018-02-14 16:35:49', 23),
(30, 'Kampan 18.05', 15, '2018-02-14 16:36:00', 23),
(31, 'Test test', 25, '2018-02-15 07:30:20', 18),
(32, 'Test15.2', 24, '2018-02-15 07:32:08', 19),
(44, 'sss', 24, '2018-02-15 08:20:22', 19),
(46, 'sss', 24, '2018-02-15 08:20:32', 19),
(49, 'sss', 24, '2018-02-15 08:20:43', 19),
(64, 'ssssssssss', 24, '2018-02-15 08:34:04', 19),
(65, 'ssssss', 24, '2018-02-15 08:34:10', 19),
(69, 'ZkManagera', 27, '2018-03-01 08:30:50', 27),
(71, 'ProAds', 24, '2018-02-20 08:23:42', 27),
(72, 'a', 25, '2018-02-20 13:03:05', 27),
(73, 'a', 25, '2018-02-21 07:24:56', 27),
(74, 'a', 25, '2018-02-21 07:25:05', 27),
(75, 'Test Plan 1', 2, '2018-02-26 13:10:10', 3),
(76, 'df', 15, '2018-02-27 08:19:15', 23),
(77, 'Regplan', 24, '2018-02-27 08:37:15', 30),
(78, 'RegTest 2', 24, '2018-02-27 08:51:10', 30),
(79, 'tp', 19, '2018-02-28 14:04:44', 13),
(80, 'RegPlan3', 24, '2018-03-01 08:31:21', 30),
(86, 'Importovaní', 25, '2018-03-01 15:05:47', 32);

-- --------------------------------------------------------

--
-- Table structure for table `test_plan_case`
--

CREATE TABLE `test_plan_case` (
  `id` int(11) NOT NULL,
  `test_plan_id` int(11) NOT NULL,
  `test_case_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_plan_case`
--

INSERT INTO `test_plan_case` (`id`, `test_plan_id`, `test_case_id`) VALUES
(1, 1, 41),
(2, 1, 42),
(3, 1, 66),
(4, 1, 78),
(5, 1, 38),
(6, 1, 39),
(7, 1, 40),
(8, 1, 43),
(9, 1, 44),
(10, 1, 45),
(11, 2, 102),
(12, 2, 103),
(13, 2, 104),
(14, 2, 105),
(15, 2, 106),
(16, 2, 107),
(17, 2, 108),
(18, 3, 109),
(19, 3, 110),
(20, 3, 111),
(21, 3, 112),
(22, 4, 113),
(23, 4, 114),
(24, 5, 118),
(25, 5, 119),
(26, 5, 120),
(27, 5, 121),
(28, 5, 122),
(29, 5, 123),
(30, 6, 124),
(31, 6, 125),
(32, 6, 126),
(33, 6, 127),
(34, 6, 128),
(35, 6, 129),
(36, 7, 131),
(37, 8, 130),
(38, 7, 132),
(39, 8, 133),
(42, 8, 142),
(43, 10, 143),
(44, 10, 145),
(45, 11, 142),
(46, 11, 144),
(47, 10, 147),
(48, 12, 130),
(49, 12, 133),
(50, 12, 142),
(51, 12, 144),
(52, 12, 148),
(53, 6, 102),
(54, 6, 103),
(55, 6, 104),
(56, 6, 105),
(57, 6, 106),
(58, 6, 107),
(59, 6, 108),
(60, 6, 161),
(61, 6, 162),
(62, 6, 163),
(63, 6, 164),
(64, 6, 165),
(65, 6, 118),
(66, 6, 119),
(67, 6, 120),
(68, 6, 121),
(69, 6, 122),
(70, 6, 123),
(71, 6, 160),
(72, 6, 166),
(73, 6, 167),
(74, 6, 168),
(75, 6, 169),
(76, 6, 170),
(77, 6, 171),
(78, 6, 172),
(79, 6, 173),
(80, 6, 174),
(94, 26, 180),
(95, 26, 181),
(96, 26, 182),
(97, 26, 183),
(98, 26, 184),
(99, 26, 185),
(100, 26, 186),
(101, 26, 193),
(102, 26, 194),
(103, 26, 195),
(104, 26, 196),
(105, 26, 197),
(106, 26, 198),
(107, 26, 190),
(108, 26, 192),
(109, 26, 191),
(110, 26, 187),
(111, 26, 188),
(112, 26, 189),
(113, 26, 175),
(114, 26, 176),
(115, 26, 177),
(116, 26, 178),
(117, 26, 179),
(118, 31, 203),
(119, 31, 205),
(120, 31, 206),
(121, 32, 204),
(122, 32, 207),
(139, 30, 180),
(140, 30, 181),
(141, 30, 182),
(142, 30, 183),
(143, 30, 184),
(144, 30, 185),
(145, 30, 186),
(146, 30, 193),
(147, 30, 199),
(148, 30, 200),
(149, 30, 201),
(150, 30, 202),
(151, 30, 194),
(152, 30, 195),
(153, 30, 196),
(154, 30, 197),
(155, 30, 198),
(156, 30, 190),
(157, 30, 192),
(158, 30, 191),
(159, 30, 187),
(160, 30, 188),
(161, 30, 189),
(162, 30, 175),
(163, 30, 176),
(164, 30, 177),
(165, 30, 178),
(166, 30, 179),
(167, 30, 214),
(168, 30, 215),
(169, 30, 216),
(170, 30, 217),
(171, 30, 218),
(172, 30, 247),
(173, 30, 248),
(174, 72, 268),
(175, 75, 56),
(176, 75, 57),
(177, 75, 150),
(179, 78, 287),
(180, 78, 288),
(181, 78, 289),
(182, 79, 92),
(183, 79, 93),
(184, 80, 287),
(185, 80, 300),
(186, 80, 301),
(187, 73, 266),
(188, 73, 273),
(189, 69, 266),
(190, 69, 273),
(191, 69, 267),
(192, 69, 268),
(193, 69, 269),
(194, 69, 270),
(195, 69, 271),
(196, 69, 272),
(197, 80, 288),
(204, 80, 289),
(209, 86, 398),
(210, 86, 399),
(211, 86, 400),
(212, 86, 401),
(213, 86, 402),
(214, 86, 403),
(215, 86, 404),
(216, 86, 405),
(217, 86, 406),
(218, 86, 407),
(219, 86, 408),
(220, 86, 409),
(221, 86, 410),
(222, 86, 411),
(223, 86, 412),
(224, 86, 413),
(225, 86, 414),
(226, 86, 415),
(227, 86, 416),
(228, 86, 417),
(229, 86, 418),
(230, 86, 419),
(231, 86, 420),
(232, 86, 421),
(233, 86, 422),
(234, 86, 423),
(235, 86, 424),
(236, 86, 425),
(237, 86, 426),
(238, 86, 427),
(239, 86, 428),
(240, 86, 429),
(241, 86, 430),
(242, 86, 431),
(243, 86, 432),
(244, 86, 433),
(245, 86, 434),
(246, 13, 153),
(247, 13, 154),
(248, 13, 155),
(249, 13, 156);

-- --------------------------------------------------------

--
-- Table structure for table `test_plan_sprint`
--

CREATE TABLE `test_plan_sprint` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_slovak_ci NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `test_plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_plan_sprint`
--

INSERT INTO `test_plan_sprint` (`id`, `name`, `creator_id`, `create_date`, `start_date`, `end_date`, `test_plan_id`) VALUES
(1, 'Prvy sprint', 14, '2018-02-05 11:11:49', '2018-02-04 23:00:00', '2018-02-27 23:00:00', 1),
(2, 'zdbzcvbxcv', 15, '2018-02-06 10:25:16', '2018-02-05 23:00:00', '2018-02-14 23:00:00', 2),
(3, 'Integracny Sprint', 14, '2018-02-06 22:18:18', '2018-02-05 23:00:00', '2018-02-27 23:00:00', 4),
(4, 'Pokus 1', 15, '2018-02-08 11:40:53', '2018-02-07 23:00:00', '2018-02-27 23:00:00', 5),
(5, 'Prvy sprint', 15, '2018-02-13 08:06:52', '2018-02-13 23:00:00', '2018-02-27 23:00:00', 2),
(6, 'sdv', 15, '2018-02-13 08:09:16', '2018-02-14 23:00:00', '2018-03-11 23:00:00', 6),
(17, 'SprintB', 25, '2018-02-13 12:56:43', '2018-02-12 23:00:00', '2018-02-27 23:00:00', 7),
(18, 'SprintB', 24, '2018-02-13 12:58:06', '2018-02-12 23:00:00', '2018-02-19 23:00:00', 8),
(22, 'SprintE', 24, '2018-02-13 14:11:55', '2018-02-12 23:00:00', '2018-02-19 23:00:00', 8),
(24, 'SprintA', 25, '2018-02-13 14:18:12', '2018-02-08 23:00:00', '2018-04-24 22:00:00', 10),
(26, 'JunoS', 24, '2018-02-13 14:24:03', '2018-02-11 23:00:00', '2018-02-21 23:00:00', 11),
(27, 'SprintB', 25, '2018-02-27 08:48:40', '2018-02-26 23:00:00', '2018-03-23 23:00:00', 10),
(30, 'TEST1', 24, '2018-02-13 14:41:45', '2018-02-11 23:00:00', '2018-02-22 23:00:00', 12),
(35, 'Fddfdddfddd', 15, '2018-02-13 17:35:43', '2018-02-13 23:00:00', '2018-02-27 23:00:00', 2),
(36, 'Eee', 15, '2018-02-13 17:51:34', '2018-02-11 23:00:00', '2018-03-16 23:00:00', 6),
(41, 'Februarovy sprint', 23, '2018-02-14 08:41:58', '2018-01-31 23:00:00', '2018-02-27 23:00:00', 13),
(42, 'Test Sprint Februar', 23, '2018-02-14 11:47:38', '2018-01-31 23:00:00', '2018-02-27 23:00:00', 13),
(44, 'testovací', 14, '2018-02-14 14:17:44', '2018-02-14 23:00:00', '2018-03-14 23:00:00', 25),
(45, 'HOT', 15, '2018-02-14 17:30:34', '2018-02-17 23:00:00', '2018-04-09 22:00:00', 26),
(46, 'Druhy', 15, '2018-02-14 18:16:09', '2018-03-22 23:00:00', '2018-04-17 22:00:00', 27),
(47, 'Treti', 15, '2018-02-14 18:16:23', '2018-03-15 23:00:00', '2018-05-29 22:00:00', 28),
(48, '4ty', 15, '2018-02-14 18:16:43', '2018-09-06 22:00:00', '2018-09-07 22:00:00', 29),
(49, '5ty', 15, '2018-02-14 18:16:57', '2018-03-15 23:00:00', '2018-04-16 22:00:00', 30),
(50, 'dfdfdf', 15, '2018-02-14 18:17:15', '2018-03-02 23:00:00', '2018-04-07 22:00:00', 27),
(51, 'ewewew', 15, '2018-02-14 18:17:29', '2018-02-15 23:00:00', '2018-03-11 23:00:00', 27),
(52, 'sfgsdfg', 15, '2018-02-14 18:17:39', '2018-03-07 23:00:00', '2018-04-09 22:00:00', 28),
(53, 'SIT', 15, '2018-02-14 18:17:55', '2018-03-13 23:00:00', '2018-03-16 23:00:00', 26),
(54, 'UAT', 15, '2018-02-14 18:36:36', '2018-02-13 23:00:00', '2018-02-16 23:00:00', 26),
(55, 'SprintM', 25, '2018-02-15 08:00:30', '2018-02-15 23:00:00', '2018-03-30 22:00:00', 31),
(56, 'TestSprint', 24, '2018-02-15 08:02:38', '2018-02-14 23:00:00', '2018-02-21 23:00:00', 32),
(61, 'TestManagerZk2', 25, '2018-02-20 07:32:34', '2018-02-02 23:00:00', '2018-02-24 23:00:00', 69),
(62, 'qesad', 27, '2018-02-20 07:48:23', '2018-01-31 23:00:00', '2018-02-09 23:00:00', 69),
(64, 'PrAdSp', 24, '2018-02-20 08:23:58', '2018-02-19 23:00:00', '2018-03-05 23:00:00', 71),
(65, 'aaa', 25, '2018-02-20 13:09:20', '2018-02-15 23:00:00', '2018-04-27 22:00:00', 72),
(66, 'Smoke test', 15, '2018-02-22 10:44:34', '2018-02-08 23:00:00', '2018-03-02 23:00:00', 26),
(67, 'Otestujem TEst Plan 1 vo februari', 2, '2018-02-26 13:11:30', '2018-01-31 23:00:00', '2018-02-28 23:00:00', 75),
(68, 'Testujem test plan v maji', 2, '2018-02-26 13:12:01', '2018-03-09 23:00:00', '2018-05-21 22:00:00', 75),
(69, 'a', 25, '2018-02-27 08:34:29', '2018-02-28 23:00:00', '2018-02-28 23:00:00', 69),
(70, 'AAA', 25, '2018-02-27 08:36:01', '2018-03-01 23:00:00', '2018-03-01 23:00:00', 71),
(72, 'RegSprint2', 24, '2018-02-27 08:51:52', '2018-02-26 23:00:00', '2018-03-21 23:00:00', 77),
(73, 'Sprint', 24, '2018-02-27 08:52:22', '2018-02-26 23:00:00', '2018-03-21 23:00:00', 78),
(74, 'ts', 19, '2018-02-28 14:05:28', '2018-02-23 23:00:00', '2018-04-27 22:00:00', 79),
(78, 'A', 25, '2018-03-01 15:06:00', '2018-03-01 00:00:00', '2018-03-31 00:00:00', 86);

-- --------------------------------------------------------

--
-- Table structure for table `test_plan_sprint_case`
--

CREATE TABLE `test_plan_sprint_case` (
  `id` int(11) NOT NULL,
  `test_plan_sprint_id` int(11) NOT NULL,
  `test_plan_case_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT '1',
  `forced_status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_plan_sprint_case`
--

INSERT INTO `test_plan_sprint_case` (`id`, `test_plan_sprint_id`, `test_plan_case_id`, `status_id`, `forced_status_id`) VALUES
(1, 1, 1, 1, NULL),
(2, 1, 2, 1, NULL),
(3, 1, 3, 1, NULL),
(4, 1, 4, 1, NULL),
(5, 1, 5, 1, NULL),
(6, 1, 6, 1, NULL),
(7, 1, 7, 1, NULL),
(8, 1, 8, 1, NULL),
(9, 1, 9, 1, NULL),
(10, 1, 10, 1, NULL),
(11, 2, 11, 1, NULL),
(12, 2, 12, 1, NULL),
(13, 2, 13, 1, 5),
(14, 2, 14, 1, 2),
(15, 2, 15, 1, 3),
(16, 2, 16, 3, NULL),
(17, 2, 17, 4, NULL),
(18, 3, 22, 1, NULL),
(19, 3, 23, 2, NULL),
(20, 4, 24, 1, NULL),
(21, 4, 25, 1, NULL),
(22, 4, 26, 1, NULL),
(23, 4, 27, 1, NULL),
(24, 4, 28, 1, NULL),
(25, 4, 29, 3, NULL),
(26, 5, 11, 1, NULL),
(27, 5, 12, 1, NULL),
(28, 5, 13, 1, NULL),
(29, 5, 14, 1, NULL),
(30, 5, 15, 1, NULL),
(31, 5, 16, 1, NULL),
(32, 5, 17, 1, NULL),
(33, 6, 30, 1, NULL),
(34, 6, 31, 1, NULL),
(35, 6, 32, 1, 2),
(36, 6, 33, 1, NULL),
(37, 6, 34, 1, NULL),
(38, 6, 35, 2, NULL),
(49, 17, 36, 2, NULL),
(50, 17, 38, 1, 3),
(51, 18, 37, 3, NULL),
(52, 18, 39, 2, 2),
(60, 22, 37, 2, NULL),
(61, 22, 39, 3, NULL),
(62, 22, 42, 2, NULL),
(66, 24, 43, 2, NULL),
(67, 24, 44, 2, NULL),
(71, 26, 45, 2, NULL),
(72, 26, 46, 3, NULL),
(73, 27, 43, 3, NULL),
(74, 27, 44, 2, NULL),
(75, 27, 47, 2, NULL),
(80, 30, 48, 1, 2),
(81, 30, 49, 1, 2),
(82, 30, 50, 1, 2),
(83, 30, 51, 2, NULL),
(84, 30, 52, 2, NULL),
(89, 35, 11, 1, NULL),
(90, 35, 12, 1, NULL),
(91, 35, 13, 1, NULL),
(92, 35, 14, 1, NULL),
(93, 35, 15, 1, NULL),
(94, 35, 16, 1, NULL),
(95, 35, 17, 1, NULL),
(96, 36, 30, 1, NULL),
(97, 36, 31, 1, NULL),
(98, 36, 32, 1, NULL),
(99, 36, 33, 1, NULL),
(100, 36, 34, 1, NULL),
(101, 36, 35, 1, NULL),
(102, 36, 53, 1, NULL),
(103, 36, 54, 1, NULL),
(104, 36, 55, 1, NULL),
(105, 36, 56, 1, NULL),
(106, 36, 57, 1, NULL),
(107, 36, 58, 1, NULL),
(108, 36, 59, 1, NULL),
(109, 36, 60, 1, NULL),
(110, 36, 61, 1, NULL),
(111, 36, 62, 1, NULL),
(112, 36, 63, 1, NULL),
(113, 36, 64, 1, NULL),
(114, 36, 65, 1, NULL),
(115, 36, 66, 1, NULL),
(116, 36, 67, 1, NULL),
(117, 36, 68, 1, NULL),
(118, 36, 69, 1, NULL),
(119, 36, 70, 1, NULL),
(120, 36, 71, 1, NULL),
(121, 36, 72, 1, NULL),
(122, 36, 73, 1, NULL),
(123, 36, 74, 1, NULL),
(124, 36, 75, 1, NULL),
(125, 36, 76, 1, NULL),
(126, 36, 77, 1, NULL),
(127, 36, 78, 1, NULL),
(128, 36, 79, 1, NULL),
(129, 36, 80, 1, NULL),
(153, 45, 94, 1, NULL),
(154, 45, 95, 1, NULL),
(155, 45, 96, 1, NULL),
(156, 45, 97, 1, NULL),
(157, 45, 98, 1, NULL),
(158, 45, 99, 1, NULL),
(159, 45, 100, 1, NULL),
(160, 45, 101, 1, NULL),
(161, 45, 102, 1, NULL),
(162, 45, 103, 1, NULL),
(163, 45, 104, 1, NULL),
(164, 45, 105, 1, NULL),
(165, 45, 106, 1, NULL),
(166, 45, 107, 1, NULL),
(167, 45, 108, 1, NULL),
(168, 45, 109, 3, NULL),
(169, 45, 110, 1, NULL),
(170, 45, 111, 1, NULL),
(171, 45, 112, 1, NULL),
(172, 45, 113, 1, 5),
(173, 45, 114, 1, 3),
(174, 45, 115, 1, 3),
(175, 45, 116, 1, 2),
(176, 45, 117, 2, NULL),
(177, 53, 94, 1, NULL),
(178, 53, 95, 1, NULL),
(179, 53, 96, 1, NULL),
(180, 53, 97, 1, NULL),
(181, 53, 98, 1, NULL),
(182, 53, 99, 1, NULL),
(183, 53, 100, 1, NULL),
(184, 53, 101, 1, NULL),
(185, 53, 102, 1, NULL),
(186, 53, 103, 1, NULL),
(187, 53, 104, 1, NULL),
(188, 53, 105, 1, NULL),
(189, 53, 106, 1, NULL),
(190, 53, 107, 1, NULL),
(191, 53, 108, 1, NULL),
(192, 53, 109, 1, NULL),
(193, 53, 110, 1, NULL),
(194, 53, 111, 1, NULL),
(195, 53, 112, 1, NULL),
(196, 53, 113, 1, NULL),
(197, 53, 114, 1, NULL),
(198, 53, 115, 1, NULL),
(199, 53, 116, 1, NULL),
(200, 53, 117, 2, NULL),
(201, 54, 94, 1, NULL),
(202, 54, 95, 1, NULL),
(203, 54, 96, 1, NULL),
(204, 54, 97, 1, NULL),
(205, 54, 98, 1, NULL),
(206, 54, 99, 1, NULL),
(207, 54, 100, 1, NULL),
(208, 54, 101, 1, NULL),
(209, 54, 102, 1, NULL),
(210, 54, 103, 1, NULL),
(211, 54, 104, 1, NULL),
(212, 54, 105, 1, NULL),
(213, 54, 106, 1, NULL),
(214, 54, 107, 1, NULL),
(215, 54, 108, 1, NULL),
(216, 54, 109, 1, NULL),
(217, 54, 110, 1, NULL),
(218, 54, 111, 1, NULL),
(219, 54, 112, 1, NULL),
(220, 54, 113, 1, NULL),
(221, 54, 114, 1, NULL),
(222, 54, 115, 1, NULL),
(223, 54, 116, 1, NULL),
(224, 54, 117, 1, NULL),
(225, 55, 118, 2, NULL),
(226, 55, 119, 1, NULL),
(227, 55, 120, 1, NULL),
(228, 56, 121, 1, 2),
(229, 56, 122, 3, NULL),
(247, 49, 139, 1, NULL),
(248, 49, 140, 1, NULL),
(249, 49, 141, 1, NULL),
(250, 49, 142, 1, NULL),
(251, 49, 143, 1, NULL),
(252, 49, 144, 1, NULL),
(253, 49, 145, 1, NULL),
(254, 49, 146, 1, NULL),
(255, 49, 147, 1, NULL),
(256, 49, 148, 1, NULL),
(257, 49, 149, 1, NULL),
(258, 49, 150, 1, NULL),
(259, 49, 151, 1, NULL),
(260, 49, 152, 1, NULL),
(261, 49, 153, 1, NULL),
(262, 49, 154, 1, NULL),
(263, 49, 155, 1, NULL),
(264, 49, 156, 1, NULL),
(265, 49, 157, 1, NULL),
(266, 49, 158, 1, NULL),
(267, 49, 159, 1, NULL),
(268, 49, 160, 1, NULL),
(269, 49, 161, 1, NULL),
(270, 49, 162, 1, NULL),
(271, 49, 163, 1, NULL),
(272, 49, 164, 1, NULL),
(273, 49, 165, 1, NULL),
(274, 49, 166, 1, NULL),
(275, 49, 167, 1, NULL),
(276, 49, 168, 1, NULL),
(277, 49, 169, 1, NULL),
(278, 49, 170, 1, NULL),
(279, 49, 171, 1, NULL),
(280, 49, 172, 1, NULL),
(281, 49, 173, 1, NULL),
(282, 65, 174, 3, NULL),
(283, 66, 94, 1, NULL),
(284, 66, 95, 1, NULL),
(285, 66, 96, 1, NULL),
(286, 66, 97, 1, NULL),
(287, 66, 98, 1, NULL),
(288, 66, 99, 1, NULL),
(289, 66, 100, 1, NULL),
(290, 66, 101, 1, NULL),
(291, 66, 102, 1, NULL),
(292, 66, 103, 1, NULL),
(293, 66, 104, 1, NULL),
(294, 66, 105, 1, NULL),
(295, 66, 106, 1, NULL),
(296, 66, 107, 1, NULL),
(297, 66, 108, 1, NULL),
(298, 66, 109, 1, NULL),
(299, 66, 110, 1, NULL),
(300, 66, 111, 1, NULL),
(301, 66, 112, 1, NULL),
(302, 66, 113, 1, NULL),
(303, 66, 114, 1, NULL),
(304, 66, 115, 1, NULL),
(305, 66, 116, 1, NULL),
(306, 66, 117, 1, NULL),
(307, 67, 175, 1, NULL),
(308, 67, 176, 1, NULL),
(309, 67, 177, 2, NULL),
(310, 68, 175, 1, NULL),
(311, 68, 176, 1, NULL),
(312, 68, 177, 1, NULL),
(313, 73, 179, 2, 3),
(314, 73, 180, 2, 3),
(315, 73, 181, 2, 3),
(316, 74, 182, 1, NULL),
(317, 74, 183, 1, NULL),
(318, 61, 189, 1, NULL),
(319, 61, 190, 1, NULL),
(320, 61, 191, 1, NULL),
(321, 61, 192, 1, NULL),
(322, 61, 193, 1, NULL),
(323, 61, 194, 1, NULL),
(324, 61, 195, 1, NULL),
(325, 61, 196, 1, NULL),
(326, 62, 189, 1, NULL),
(327, 62, 190, 1, NULL),
(328, 62, 191, 1, NULL),
(329, 62, 192, 1, NULL),
(330, 62, 193, 1, NULL),
(331, 62, 194, 1, NULL),
(332, 62, 195, 1, NULL),
(333, 62, 196, 1, NULL),
(334, 69, 189, 1, NULL),
(335, 69, 190, 1, NULL),
(336, 69, 191, 1, NULL),
(337, 69, 192, 1, NULL),
(338, 69, 193, 1, NULL),
(339, 69, 194, 1, NULL),
(340, 69, 195, 1, NULL),
(341, 69, 196, 1, NULL),
(349, 78, 209, 1, NULL),
(350, 78, 210, 1, NULL),
(351, 78, 211, 1, NULL),
(352, 78, 212, 1, NULL),
(353, 78, 213, 1, NULL),
(354, 78, 214, 1, NULL),
(355, 78, 215, 1, NULL),
(356, 78, 216, 1, NULL),
(357, 78, 217, 1, NULL),
(358, 78, 218, 1, NULL),
(359, 78, 219, 1, NULL),
(360, 78, 220, 1, NULL),
(361, 78, 221, 1, NULL),
(362, 78, 222, 1, NULL),
(363, 78, 223, 1, NULL),
(364, 78, 224, 1, NULL),
(365, 78, 225, 1, NULL),
(366, 78, 226, 1, NULL),
(367, 78, 227, 1, NULL),
(368, 78, 228, 1, NULL),
(369, 78, 229, 1, NULL),
(370, 78, 230, 1, NULL),
(371, 78, 231, 1, NULL),
(372, 78, 232, 1, NULL),
(373, 78, 233, 1, NULL),
(374, 78, 234, 1, NULL),
(375, 78, 235, 1, NULL),
(376, 78, 236, 1, NULL),
(377, 78, 237, 1, NULL),
(378, 78, 238, 1, NULL),
(379, 78, 239, 1, NULL),
(380, 78, 240, 1, NULL),
(381, 78, 241, 1, NULL),
(382, 78, 242, 1, NULL),
(383, 78, 243, 1, NULL),
(384, 78, 244, 1, NULL),
(385, 78, 245, 1, NULL),
(386, 41, 246, 1, NULL),
(387, 41, 247, 1, NULL),
(388, 41, 248, 1, NULL),
(389, 41, 249, 3, NULL),
(390, 42, 246, 1, NULL),
(391, 42, 247, 1, NULL),
(392, 42, 248, 1, NULL),
(393, 42, 249, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_plan_sprint_case_user`
--

CREATE TABLE `test_plan_sprint_case_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `test_plan_sprint_case_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_plan_sprint_case_user`
--

INSERT INTO `test_plan_sprint_case_user` (`id`, `user_id`, `test_plan_sprint_case_id`) VALUES
(1, 14, 1),
(2, 14, 2),
(3, 14, 3),
(4, 14, 4),
(5, 14, 5),
(6, 14, 6),
(7, 14, 7),
(8, 14, 8),
(9, 14, 9),
(10, 14, 10),
(11, 19, 12),
(12, 19, 14),
(13, 19, 16),
(14, 20, 11),
(15, 20, 12),
(16, 20, 13),
(17, 20, 14),
(18, 16, 15),
(19, 16, 17),
(20, 15, 11),
(21, 15, 12),
(22, 15, 13),
(23, 15, 14),
(24, 15, 15),
(25, 15, 16),
(26, 15, 17),
(27, 19, 20),
(28, 19, 22),
(29, 19, 24),
(30, 16, 20),
(31, 16, 21),
(32, 16, 23),
(33, 15, 25),
(34, 16, 27),
(35, 16, 30),
(36, 22, 28),
(37, 22, 29),
(38, 2, 26),
(39, 2, 27),
(40, 2, 28),
(41, 2, 29),
(42, 2, 30),
(43, 2, 31),
(44, 2, 32),
(45, 15, 33),
(46, 15, 34),
(47, 15, 35),
(48, 15, 36),
(49, 15, 37),
(50, 15, 38),
(51, 25, 49),
(52, 25, 50),
(53, 24, 51),
(54, 24, 52),
(59, 25, 66),
(60, 25, 67),
(61, 24, 71),
(62, 24, 72),
(63, 25, 73),
(64, 25, 74),
(65, 25, 75),
(66, 24, 80),
(67, 24, 81),
(68, 24, 82),
(69, 24, 83),
(70, 24, 84),
(71, 15, 96),
(72, 15, 97),
(73, 15, 98),
(74, 15, 99),
(75, 15, 100),
(76, 15, 101),
(77, 15, 120),
(78, 15, 102),
(79, 15, 103),
(80, 15, 104),
(81, 15, 105),
(82, 15, 106),
(83, 15, 107),
(84, 15, 108),
(85, 15, 109),
(86, 15, 110),
(87, 15, 111),
(88, 15, 112),
(89, 15, 113),
(90, 15, 114),
(91, 15, 115),
(92, 15, 116),
(93, 15, 117),
(94, 15, 118),
(95, 15, 119),
(96, 15, 121),
(97, 15, 122),
(98, 15, 123),
(99, 15, 124),
(100, 15, 125),
(101, 15, 126),
(102, 15, 127),
(103, 15, 128),
(104, 15, 129),
(105, 16, 96),
(106, 16, 97),
(107, 16, 98),
(108, 16, 99),
(109, 16, 100),
(110, 16, 101),
(111, 16, 120),
(112, 16, 121),
(113, 16, 122),
(114, 16, 123),
(115, 16, 124),
(116, 16, 125),
(117, 16, 126),
(118, 16, 127),
(119, 16, 128),
(120, 16, 129),
(121, 22, 96),
(122, 22, 97),
(123, 22, 98),
(124, 22, 99),
(125, 22, 100),
(126, 22, 101),
(127, 22, 120),
(128, 2, 96),
(129, 2, 97),
(130, 2, 98),
(131, 2, 99),
(132, 2, 100),
(133, 2, 101),
(134, 2, 120),
(135, 21, 153),
(136, 21, 154),
(137, 21, 155),
(138, 21, 156),
(139, 21, 157),
(140, 21, 158),
(141, 21, 159),
(142, 21, 160),
(143, 24, 161),
(144, 24, 162),
(145, 24, 163),
(146, 24, 164),
(147, 24, 165),
(148, 16, 166),
(149, 16, 167),
(150, 22, 168),
(151, 22, 169),
(152, 22, 170),
(153, 22, 171),
(154, 15, 153),
(155, 15, 154),
(156, 15, 155),
(157, 15, 156),
(158, 15, 157),
(159, 15, 158),
(160, 15, 159),
(161, 15, 160),
(162, 15, 161),
(163, 15, 162),
(164, 15, 163),
(165, 15, 164),
(166, 15, 165),
(167, 15, 166),
(168, 15, 167),
(169, 15, 168),
(170, 15, 169),
(171, 15, 170),
(172, 15, 171),
(173, 15, 172),
(174, 15, 173),
(175, 15, 174),
(176, 15, 175),
(177, 15, 176),
(178, 25, 225),
(179, 25, 226),
(180, 25, 227),
(192, 25, 247),
(193, 25, 248),
(194, 25, 249),
(195, 25, 250),
(196, 25, 251),
(197, 25, 252),
(198, 25, 253),
(199, 25, 254),
(200, 25, 255),
(201, 25, 256),
(202, 25, 257),
(203, 25, 258),
(204, 24, 259),
(205, 24, 260),
(206, 24, 261),
(207, 24, 262),
(208, 24, 263),
(209, 16, 264),
(210, 16, 265),
(211, 16, 266),
(212, 16, 267),
(213, 16, 268),
(214, 16, 269),
(215, 20, 282),
(216, 25, 283),
(217, 25, 284),
(218, 25, 285),
(219, 25, 286),
(220, 25, 287),
(221, 25, 288),
(222, 25, 289),
(223, 25, 290),
(224, 25, 302),
(225, 25, 303),
(226, 25, 304),
(227, 25, 305),
(228, 2, 307),
(229, 2, 308),
(230, 25, 313),
(231, 24, 313),
(232, 24, 314),
(233, 24, 315),
(234, 23, 313),
(235, 23, 314),
(236, 23, 315);

-- --------------------------------------------------------

--
-- Table structure for table `test_set`
--

CREATE TABLE `test_set` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `creator_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_set`
--

INSERT INTO `test_set` (`id`, `name`, `description`, `creator_id`, `create_date`, `project_id`) VALUES
(9, 'Initial Tests', '<p>&nbsp;initial tests</p>', 14, '2018-01-18 10:33:42', 4),
(10, 'Final Tests', '<p>Regression Test Set</p>', 14, '2018-01-18 15:27:34', 4),
(11, 'Intergration Tests', '<p>Integracne testy pre spojenie s roznymi externym modulmi</p>', 14, '2018-01-18 21:21:32', 4),
(12, 'MujPrvniTestSet', '<p>test set pro testovani</p>', 14, '2018-01-22 10:01:01', 6),
(14, 'zxcvzxcv', '<p>&nbsp;Zakladny test set pre vygenerovanie test certifikatu pre oblast SSO</p>', 15, '2018-01-22 18:29:26', 9),
(16, 'Zalozenie uzivatela', '<p>Zalozenie uzivatela v MS AD</p>', 14, '2018-01-22 18:31:39', 9),
(17, 'Zalozenie profilu uzivatela v maske prav', '<p>Zriadenie masky prav v portaly</p>', 14, '2018-01-22 18:32:09', 9),
(18, 'Test setik', NULL, 2, '2018-01-23 09:40:11', 3),
(23, 'TestSet1', '', 14, '2018-01-25 11:24:49', 12),
(24, 'test set - vyhledat kořist', '<p>tento test set bude testera navadate jak vyhledat kořist</p>', 19, '2018-01-25 15:12:38', 13),
(25, 'Super set2', '', 14, '2018-02-04 21:34:24', 12),
(26, 'Init', '<p>sdfsdf</p>', 15, '2018-02-06 10:22:16', 15),
(27, 'Systemove testy', NULL, 14, '2018-02-06 22:16:41', 16),
(28, 'Integracny Set', NULL, 14, '2018-02-06 22:17:42', 16),
(29, 'Namakany set', NULL, 14, '2018-02-06 22:30:20', 16),
(30, 'Test Set pre vyvoj', '<p>Ukazka developmentu</p>', 15, '2018-02-08 11:36:21', 15),
(31, 'Bulkino', NULL, 15, '2018-02-08 11:37:03', 15),
(32, 'Test loginu', '<p>lskdjflkasdjfkljlk jklas dfjkl j</p>', 15, '2018-02-13 07:58:04', 15),
(34, 'wqerwer', '<p>qwerqwer</p>', 15, '2018-02-13 08:16:10', 15),
(35, 'qwerwqer', '<p>qwerwqer</p>', 15, '2018-02-13 08:16:16', 15),
(36, 'Test set', '<p>Testov&aacute;n&iacute; přihla&scaron;ov&aacute;n&iacute; do firemn&iacute;ho mailu a port&aacute;lu. N&aacute;sledn&eacute; změna hesla.</p>', 25, '2018-02-13 11:25:19', 18),
(37, 'TestSet', '<p>Změna hesla</p>', 24, '2018-02-13 11:34:30', 19),
(38, 'Vytvoření projektu v Juno', '<p>Vytv&aacute;řen&iacute; test analyses, execution, issues</p>', 25, '2018-02-13 13:52:12', 18),
(39, 'Juno', '', 24, '2018-02-13 14:12:42', 19),
(42, 'TestSet1', NULL, 2, '2018-02-13 15:09:22', 3),
(43, 'TestSet2', NULL, 2, '2018-02-13 15:09:22', 3),
(44, 'TestSet3', NULL, 2, '2018-02-13 15:09:22', 3),
(45, 'Zaklady hrubej stavby', '<p>Poppis sablony pre test set</p>', 23, '2018-02-13 16:24:15', 20),
(46, 'Aaaaa', '<p>ssssskkskakkakkakkskksksksiisiisosiis</p>\n<p>skskskjsjjs</p>\n<p>JGuigujjgkjgmjgukgiu</p>\n<p>kjhkuhkjgkjbkjbku</p>\n<p>kjhkjhkjgjkgkgj</p>\n<p>kjhkjhkjhkjhkjhjkkjh</p>\n<p>mnbmngmngmngmngmng</p>\n<p>oizoizoizoizoizu</p>\n<p>jhfjhfjhfjhfjhfjh</p>\n<p>uztiztiztiztiz</p>\n<p>gjhgmhghmgmhgmngmnbbnm</p>\n<p>hkjzkjhjkhkjhkjkj</p>', 15, '2018-02-13 17:38:41', 15),
(47, 'Bvgvbfzfzchgczufhc', '<p>Hgfhgfuzfhgjh</p>\n<p>jugkhghgjk</p>\n<p>kjhkjhkjhkjhlk</p>\n<p>jkjhljhkjhkkh</p>\n<p>nm&acute;b&acute;nbnmbnmbnbjgkjgkjg</p>\n<p>hkjhkjhkjhkjgkj</p>', 15, '2018-02-13 17:40:16', 15),
(48, 'Jhjhjnbjbkbjkbnmbmnbnmbmjgjhgh', '<p>&nbsp;</p>\n<p>ZHzhguzgghhjhjjh</p>\n<p>hghghghghghgghghghggh</p>\n<p>kjkjkjkjkjkjk</p>\n<p>mbmbmbmbmmnm</p>\n<p>bvbvbvbvbvbvb</p>', 15, '2018-02-13 17:40:57', 15),
(49, 'Hghgjghghhhgh', '<p>Jhjhjhjhjjhhj</p>', 15, '2018-02-13 17:42:06', 15),
(50, 'Jhjbjhjhjzjhjgjgjghjjh', '<p>Jhjhkjhkjzuzu*jhbkjbkjh</p>', 15, '2018-02-13 17:42:28', 15),
(51, 'Ghgh hvhfhhvhfhvhvhfhfhchvjhf', '<p>Jgkhgjhghjgjughgztz5vhthhghtjhvjgh</p>\n<p>hfhfhfhfhfhvjhvhvjhv</p>\n<p>jhgjhghjgjhgjghjgjhghjgh</p>\n<p>jhgjhghjjjg</p>', 15, '2018-02-13 17:43:22', 15),
(52, 'Ffff', NULL, 15, '2018-02-13 17:46:51', 15),
(53, 'Modul Dashboard', '<p>Test case pre modul dashboard</p>', 15, '2018-02-14 16:53:01', 23),
(54, 'Modul Test Analyses', '<p>test case pre modul Test Analyses</p>', 15, '2018-02-14 16:53:21', 23),
(55, 'Modul Test Execution', '<p>Modul lams;ldf;lkasd;lf k;la ksd;lfk ;\'laksd f;lk a;l\'skd f;lk asd;lkf ;laks dlf;k a;l\'skd f;lka sd;lkf ;laksd f;lk asd;lkf ;lkasd f;lk ;alskd f;lk ;saldk f;lk s;dlkf ;lks d;lkf l;skd fl;k sdl;fk l;sdkf l;ksd f;lks dfl;k sdl;fk sdl;fk sld;fk sldkf l;ks dfl;k sdl;kf l;skd fl;k sdl;fk sdl;kf sl;dkf ;lskd fl;skd fl;skd fl;skd fl;ksd fl;ks df;lks dfl;k sdl;fk s;ldkf ;lsdkf ;lskd f;ls kdf;lsk df;lks df;lks dfl;k sdfl;k sdl;fk sd;lfk sd;lfk ;sldkf ;lskd f;lskd f;lskd f;lskd f;lskd f;lskd fl;ks df;lk sd;lfk sd;lkf s;ldkf l;skd f;lks dfl;ks df;lks dfl;ks dfl;ks dfl;ksd f;lksd fl;ksd fl;ksd f;lks dfl;sk df;lks df;lks df;lks d;lfk sd;lfk sl;dfk s;ldfk s;ldkf l;sdkf ;lsdkf ;lsdkf ;lskd fl;sk fdl;skdf ;lskd f;lskd fl;skd f;ls kdf;lskdf</p>', 15, '2018-02-14 16:54:08', 23),
(56, 'Modulieren AISP', '', 15, '2018-02-14 16:54:46', 23),
(57, 'PISP', '', 15, '2018-02-14 16:54:52', 23),
(58, 'CISP', '', 15, '2018-02-14 16:54:57', 23),
(59, 'RUNDA', '', 15, '2018-02-14 16:55:03', 23),
(60, '21309812098510988240982134098234908()*&*(&*(*&(ˆ&*%&ˆ$&ˆ%$%ˆ$#$%@#$%!#$!$%ˆ#$ˆ&%', '<p>fasdfasdfsdaf&nbsp; asd fasdf asdf asdf asd fas dfas df</p>', 15, '2018-02-14 16:55:23', 23),
(61, 'kajsdklfj lkajsd fklj lkasjd lfk;j alsk;dj flj aslk;djf lkja sdlkfj lkasjd flkja', '<p>asdfasdf asdf asdf asdf asdf asdf&nbsp;</p>', 15, '2018-02-14 16:56:18', 23),
(62, 'kj lkj lskdjf klj lkj lkj lkj lkjalskdjfoqjlfkasdlkfjkajsdklfjaklsdjfklajsdlk;fj', '<p>asdfasdfasdf</p>', 15, '2018-02-14 16:56:37', 23),
(63, '80809280981209583140958091348509218349028340982139048230948209384092-384029384-0', '', 15, '2018-02-14 16:56:52', 23),
(64, '**(ˆ*&ˆ*&ˆ*(ˆ(*ˆ*ˆ(*&(*&)(&)*()*()*()*)_*_)(*()_*)_(*)(_*)(_*)_(*)(_*)(_*)(_*()*', '', 15, '2018-02-14 16:57:12', 23),
(65, '01_NovyPokusOTest_Pri_Pouziti_Max_Znakov_Bez_Prerusenia_A_ZaZapoctu_Ako_By_To_Mo', '<p>test</p>', 15, '2018-02-14 16:58:03', 23),
(66, 'Modul Sticthing', '<p>sdffds asdf&nbsp; asdf&nbsp; asdfasdfasdf asdf asdf sadf asdf asdf sadf zxcv zxcvzxc vzxcv xzcv xzcv xcvasdf sdf dsf</p>', 15, '2018-02-14 17:14:11', 23),
(67, 'Test místnosti', '<h1>Předěv&aacute;n&iacute; m&iacute;stnost&iacute;&nbsp;</h1>\n<p>- m&aacute;me vytapetouvou m&iacute;stnost a chceme j&iacute; předělat</p>', 25, '2018-02-15 07:32:48', 18),
(68, 'TestSet15.2', '<p>Možnosti přehravan&iacute; filmu</p>', 24, '2018-02-15 07:34:27', 19),
(69, 'TestSet1', NULL, 25, '2018-02-15 08:12:39', 18),
(70, 'TestSet2', NULL, 25, '2018-02-15 08:12:39', 18),
(71, 'TestSet3', NULL, 25, '2018-02-15 08:12:39', 18),
(72, 'TestSet1', NULL, 24, '2018-02-15 08:13:22', 19),
(73, 'TestSet2', NULL, 24, '2018-02-15 08:13:22', 19),
(74, 'TestSet3', NULL, 24, '2018-02-15 08:13:22', 19),
(75, 'TestSet1', NULL, 15, '2018-02-15 08:24:06', 23),
(76, 'TestSet2', NULL, 15, '2018-02-15 08:24:06', 23),
(77, 'TestSet3', NULL, 15, '2018-02-15 08:24:06', 23),
(78, 'TestSet1', NULL, 15, '2018-02-15 08:24:31', 23),
(79, 'TestSet2', NULL, 15, '2018-02-15 08:24:31', 23),
(81, 'TestSet1', NULL, 24, '2018-02-15 08:33:46', 19),
(82, 'TestSet2', NULL, 24, '2018-02-15 08:33:46', 19),
(83, 'TestSet3', NULL, 24, '2018-02-15 08:33:46', 19),
(119, 'Test manager/Plan', NULL, 25, '2018-02-20 10:55:58', 27),
(120, 'Test manager/Set', NULL, 25, '2018-02-20 10:55:58', 27),
(121, 'Test manager/Case', NULL, 25, '2018-02-20 10:55:58', 27),
(122, 'Test manager/Step', NULL, 25, '2018-02-20 10:55:58', 27),
(123, 'Test manager/RolesInProject', NULL, 25, '2018-02-20 10:55:58', 27),
(124, 'Test manager/Issues', NULL, 25, '2018-02-20 10:55:58', 27),
(125, 'Test manager/Project Settings', NULL, 25, '2018-02-20 10:55:58', 27),
(126, 'ada', '<p>adadsasd</p>', 25, '2018-02-20 13:40:30', 27),
(128, 'aa', '<p>a</p>', 25, '2018-02-21 07:25:18', 27),
(130, 'TestException', NULL, 24, '2018-02-27 08:38:42', 30),
(131, 'Test Plan', NULL, 24, '2018-02-27 08:40:39', 30),
(132, 'Test analyses', '<p>Test settt</p>\n<p>&nbsp;</p>', 24, '2018-02-27 08:40:39', 30),
(143, 'asd', '<p>ASDASD</p>', 27, '2018-03-01 10:25:17', 30),
(167, 'Vytvoření projektu-Název', NULL, 25, '2018-03-01 14:57:43', 32),
(168, 'Vytvoření projektu-Popis', NULL, 25, '2018-03-01 14:57:43', 32),
(169, 'VytvořeníProjektu-Tlačítko zavřít', NULL, 25, '2018-03-01 14:57:43', 32),
(170, 'Vytvoření Test Setu-Název', NULL, 25, '2018-03-01 14:58:43', 32),
(171, 'Vytvoření Test Setu-Tagy', NULL, 25, '2018-03-01 14:58:43', 32),
(172, 'Vytvoření Test Setu-Popis', NULL, 25, '2018-03-01 14:58:43', 32),
(173, 'Vytvoření Test Setu-Tlačítko zavřít', NULL, 25, '2018-03-01 14:58:43', 32);

-- --------------------------------------------------------

--
-- Table structure for table `test_step`
--

CREATE TABLE `test_step` (
  `id` int(11) NOT NULL,
  `precondition` text COLLATE utf8_slovak_ci,
  `expected_result` text COLLATE utf8_slovak_ci,
  `creator_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `test_case_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_step`
--

INSERT INTO `test_step` (`id`, `precondition`, `expected_result`, `creator_id`, `create_date`, `test_case_id`) VALUES
(38, 'sdfdsf', 'sdfsdf', 14, '2018-01-23 11:21:45', 52),
(39, 'sdv', 'xcvxcv', 14, '2018-01-23 11:21:55', 52),
(40, 'sdfsdfsd', 'sdfsdf', 14, '2018-01-23 11:23:32', 58),
(41, 'sdfsdf', 'afsdfasdf', 14, '2018-01-23 11:23:32', 58),
(42, 'asasfgdf', 'gsdfgsdfgdfg', 14, '2018-01-23 11:23:32', 58),
(43, 'asdf ', 'asdf', 14, '2018-01-23 11:33:42', 59),
(44, 'sdvsd', 'sdfsdf', 15, '2018-01-24 08:59:02', 52),
(45, 'sdfsdf', 'sdfdfs', 15, '2018-01-24 08:59:02', 52),
(48, 'Pargraf v texte', 'Paragrafove pismo ma vrlkost 11 px', 14, '2018-01-25 08:05:18', 78),
(49, 'Existuju odseky', 'Odsek prveho riadku v paragrafe o 11px', 14, '2018-01-25 08:05:18', 78),
(51, 'najdi', 'bambus', 14, '2018-01-25 11:28:00', 85),
(52, '', '', 15, '2018-01-25 11:56:15', 88),
(53, '', '', 15, '2018-01-25 11:57:14', 89),
(54, '', '', 15, '2018-01-25 11:57:21', 90),
(55, '', '', 2, '2018-01-25 12:55:28', 91),
(56, 'najdi krvavou stopu', 'stopa nalezena', 19, '2018-01-25 15:14:47', 92),
(57, 'jdi po krvave stope až najdeš zvíře', 'zvíře nalezeno', 19, '2018-01-25 15:14:47', 92),
(58, 'vyndej ze zvířete vnitrnosti aby jsi zabranil zrychleni hnijicimu procesu', 'zvíře vyvrženo', 19, '2018-01-25 15:14:47', 92),
(59, 'najdi stopu zvirete', 'stopa nalezena', 19, '2018-01-25 15:17:02', 93),
(60, 'jdi po stope zvirete', 'zvire nalezeno', 19, '2018-01-25 15:17:02', 93),
(61, 'strel zvire primo na komoru', 'zvire zastreleno', 19, '2018-01-25 15:17:02', 93),
(62, 'urizni hlavu aby jsi ziskal trofej', 'trofje ziskana', 19, '2018-01-25 15:17:02', 93),
(63, '1', '1', 14, '2018-02-04 21:48:16', 101),
(64, '2', '2', 14, '2018-02-04 21:48:16', 101),
(65, 'asdgasdfsad', 'asdfasdfasdf', 15, '2018-02-06 10:23:18', 107),
(66, 'sdfgsdfg', 'sdfgsdfg', 15, '2018-02-06 10:23:35', 108),
(67, 'sdfgsdf', 'sdfgsd', 15, '2018-02-06 10:23:35', 108),
(68, 'Napojim na IAM', 'Napojene', 14, '2018-02-06 22:19:35', 114),
(69, 'Prihlasim sa domenovym userom', 'Som prihlaseny', 14, '2018-02-06 22:19:35', 114),
(70, 'CIsco je kupene', 'Mame Cisco', 14, '2018-02-06 22:20:00', 113),
(71, 'Nastavim AD', 'AD je nastavene', 14, '2018-02-06 22:20:00', 113),
(72, 'mam podrtal k idspoziic', 'kljsdlk;fjkalsdf', 15, '2018-02-08 11:39:02', 123),
(73, 'asdfasdf', 'asdfasdf', 15, '2018-02-08 11:39:02', 123),
(74, 'asdfsadf', 'asdfsadf', 15, '2018-02-08 11:39:02', 123),
(75, 'zxcvxczv', 'zxcvzxcv zxcvxzcv', 15, '2018-02-08 11:39:28', 122),
(76, 'zxcvxcv', 'asdfasdf', 15, '2018-02-08 11:39:28', 122),
(77, 'vcbcxvb', 'cxvbcxvb', 15, '2018-02-08 11:39:28', 122),
(78, 'mam certifikat', 'Certifikat je funkncny a mozem s nim testovat', 15, '2018-02-13 07:59:05', 124),
(79, 'Portal pre login je up', 'Je mozne sa prihlasit a vlozit certifkat', 15, '2018-02-13 07:59:05', 124),
(80, 'mam 78 znakove heslo', 'prilis dlhe heslo ', 15, '2018-02-13 07:59:56', 125),
(81, '', '', 15, '2018-02-13 07:59:56', 125),
(82, 'Mam prsten ktory vazi 0.5kg', 'Je FNC a da sa prilozit k ctectek', 15, '2018-02-13 08:02:35', 129),
(83, 'Jdi do nastavení', 'Otevření stránky Nastavení', 24, '2018-02-13 11:52:45', 130),
(84, 'Otevři založku Změna hesla', 'Otevření stranky Změna hesla', 24, '2018-02-13 11:52:45', 130),
(85, 'Do prvního řadku napis defaultní heslo', 'Systém ověří jestli je heslo správné', 24, '2018-02-13 11:52:45', 130),
(86, 'Do druhého řádku napis vlastní heslo', 'Systém oveří jestli toto heslo již nebzlo použito a jestli splnuje dané požadavky jako délka hesla a specialní znaky', 24, '2018-02-13 11:52:45', 130),
(87, 'Do třetího řádku  opet napsat sve heslo', 'System overuje jestli se 2. a 3 řadek shodují', 24, '2018-02-13 11:52:45', 130),
(88, 'Kliknout na tlačítko uložit heslo', 'Systém nastaví zadané heslo místo defaultního hesla ', 24, '2018-02-13 11:52:45', 130),
(89, 'získání uživatelského jména', 'znalost uživatelského jména ', 25, '2018-02-13 11:56:18', 131),
(90, 'vygenerování hesla', 'znalost hesla, možnost se přihlásit ', 25, '2018-02-13 13:49:12', 131),
(91, 'jdi na stránky :  mail.denevy.eu a přihlaš se pod svým uživ. jménem a heslem', 'přihlášení do mailu', 25, '2018-02-13 11:56:18', 131),
(92, 'jdi na stránky portal.denevy.eu a přihlaš se a přihlaš se pod svým uživ. jménem a heslem', 'přihlášení na portál', 25, '2018-02-13 11:56:18', 131),
(93, 'jdi na stránky portal denevy  v prohlížeči a přihlaš se pod uživ. jménem a vygenerovaným heslem', 'přihlášení na portál denevy', 25, '2018-02-13 12:20:05', 132),
(94, 'otevři záložku community', 'ukázka nabídky dalších záložek', 25, '2018-02-13 12:20:05', 132),
(95, 'otevření záložky wiki', 'otevře se stánka wiki se základníma informacemi ', 25, '2018-02-13 12:20:05', 132),
(96, 'v textu s informacemi najdi Nová hesla a klikni na odkaz u změna hesla cez VPN :  https://192.168.43.32/RDWeb/pages/en-US/password.aspx', 'přesměrování na web. stránku kde dochází ke změně hesla ', 25, '2018-02-13 12:20:05', 132),
(97, 'Vyplň údaje doména\\jméno, heslo,nové heslo a potvrzení nového hesla. Heslo musí mít 8 znaků, velké a malé písmeno číslice a spec. znak. ', 'změna heslo pro firemní email a portál ', 25, '2018-02-13 12:20:05', 132),
(98, 'Pokud nevíte heslo kliknete na link \"Zapomenuté heslo\"', 'Otevření nové stránky', 24, '2018-02-13 12:38:12', 133),
(99, 'Na nové stránce vyplníte do řádku svuj email', 'Odeslání emailu s linkem na změnu hesla na váš email', 24, '2018-02-13 12:38:12', 133),
(100, 'Otevření vašeho emailu a kliknuti na link ktery byl odeslán tím to systémem', 'Otevření stranky kde se mění heslo ', 24, '2018-02-13 12:38:12', 133),
(101, 'Do 1. řádku napište heslo ', 'System zkontroluje dostupnost a a jestli jsou splnene pozadavky ', 24, '2018-02-13 12:38:12', 133),
(102, 'Do 2. řádku napište to samé heslo ', 'Heslo je ulozeno a muzete se prihlasit', 24, '2018-02-13 12:38:12', 133),
(111, 'Přihlašení do systemu pomoci uživatelského jména a hesla', 'Jsme v systému ', 24, '2018-02-13 13:45:40', 142),
(112, 'Otevření záložky Uživatel a vybrání položky Můj profil', 'Otevře se stránka Můj Profil', 24, '2018-02-13 13:45:40', 142),
(113, 'Na stránce můj profil zadáme telefonní čislo do spravneho řadku a dáme ulozit', 'Na stránkach a profilu je videt platné telofonní číslo', 24, '2018-02-13 13:45:40', 142),
(114, 'přihlašte se do juna', 'úspěšné přihlášení', 25, '2018-02-13 14:00:23', 143),
(115, 'otevřete záložku projekty a vytvořte nový projekt ', 'vytvoření projektu', 25, '2018-02-13 14:00:23', 143),
(116, 'vytvořte test plan, kde zadáte název a vyberete co budete testovat + sprint s daným časovým obdobím ', 'vytvoření test plánu + sprintu', 25, '2018-02-13 14:05:53', 143),
(117, 'přepněte záložku na test set a vytvořte nový + zadejte název a popis ', 'vytvoření test setu', 25, '2018-02-13 14:00:23', 143),
(118, 'vytvořte test case pro daný test set + zadejte podrobně test stepy', 'vytvoření test casu', 25, '2018-02-13 14:00:23', 143),
(120, 'Přihlášení do systému juno', 'Otevření hlavní stránky', 24, '2018-02-13 14:04:26', 144),
(121, 'Kliknutí na záložku Uživatele', 'Otevření nové stránky kde je výpis všech uživatelů ', 24, '2018-02-13 14:04:26', 144),
(122, 'Poté najdete své jméno  a kliknete na oranžové tlacítko uložit', 'Otevření stránky s vašimi udaji ', 24, '2018-02-13 14:04:26', 144),
(123, 'A na stránce v pravo vedle kolonky s přijmením je kolonka super-admim tak na ni kliknete', 'Zaškrtnutí kolonky', 24, '2018-02-13 14:04:26', 144),
(124, 'Poté kliknete v pravo na oranžové Upravit Uživatele', 'Uložení udaju a možnost vytvářet projekty', 24, '2018-02-13 14:04:26', 144),
(125, 'přepněte záložku na test execution', 'otevření záložky ', 25, '2018-02-13 14:14:45', 145),
(126, 'vyberte vámi vytvořený test plan + sprint  a klikněte na tlačítko ist', 'vytvoření tabulky testování ', 25, '2018-02-13 14:14:45', 145),
(127, 'klikněte na modré tlačítko otvorit v tabulce ', 'otevření konkrétního testu ', 25, '2018-02-13 14:14:45', 145),
(128, 'zde zapněte timer a přiřaďte status ke každému stepu, po přiřazení musíte ještě potvrdit tlačítkem vedle statusu', 'zjištění výsledku', 25, '2018-02-13 14:38:47', 145),
(129, 'vypněte timer a uložte výsledky', 'konec testu v procentech ', 25, '2018-02-13 14:39:54', 145),
(130, 'projdětě test execution celý test case', 'správné fungování nebo nalezení chyb', 25, '2018-02-13 14:33:47', 147),
(131, 'pokud naleznete chybu otevřete tabulku test casu v test exexution', 'otevření tabulky', 25, '2018-02-13 14:33:47', 147),
(132, 'najeďte na krok který má status failed a klikněte na nápis issues(obrázek brouka) pod statusem failed', 'otevření tabulky na vytvoření issues', 25, '2018-02-13 14:33:47', 147),
(133, 'zde vyberete prioritu a typ problému + přidáte název a popis problému  a můžete přiložit přílohu \r\nklikněte na tlačítko zalozit ', 'vytvoříze issues', 25, '2018-02-13 14:33:47', 147),
(134, 'přepněte na záložku issues a zkontrolujte zda se vytvořil issues, zde ho můžete přečíst, či smazat', 'přehled issues', 25, '2018-02-13 14:33:47', 147),
(135, 'Nastane-li chyba v některém z kroků je u něj napsano fail a pod ním musíme kliknout na slovo \"Issue\"', 'Otevření nové stranky', 24, '2018-02-13 14:38:27', 148),
(136, 'Zde nastavíme prioritu', 'Nastavení priority', 24, '2018-02-13 14:38:27', 148),
(137, 'Typ chyby ', 'Nastavení typu chyby', 24, '2018-02-13 14:38:27', 148),
(138, 'Nejak to celé pojmenujeme a popíšeme následující chybu a klikneme na Založit', 'Zalozeni Issue', 24, '2018-02-13 14:38:27', 148),
(144, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 150),
(145, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 150),
(146, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 150),
(147, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 150),
(148, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 150),
(149, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 151),
(150, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 151),
(151, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 151),
(152, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 151),
(153, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 151),
(154, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 152),
(155, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 152),
(156, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 152),
(157, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 152),
(158, 'udělej něco', 'něco se stalo', 2, '2018-02-13 15:09:22', 152),
(159, 'Hhjhjh', 'Hijhfjhfhfjv', 15, '2018-02-13 17:23:29', 157),
(160, 'Gugugububjgjffj', 'Hfjhfjhvhfjhhvhfkh', 15, '2018-02-13 17:23:29', 157),
(161, 'Vhfkhfmhvkjgjtutku', 'Mhrkhrzjfhkfjkgkj', 15, '2018-02-13 17:23:29', 157),
(162, '', '', 15, '2018-02-13 17:25:51', 158),
(163, 'Jknknjbj', 'Ouhouguogou', 15, '2018-02-13 17:28:05', 159),
(164, 'Jhfjhfhfjh', 'Jhfjhfzffiu', 15, '2018-02-13 17:28:05', 159),
(165, 'Jzfhfhjfzifhf', 'Gkugiuguig', 15, '2018-02-13 17:28:05', 159),
(166, 'Hghgjghgh', 'Nbnbnbjhjzuhufzfgvhv', 15, '2018-02-13 17:37:45', 160),
(167, 'Jghgjjbjb', 'Gfgfgggvhvh', 15, '2018-02-13 17:37:45', 160),
(168, 'Bvgvbvhvhf', 'Nbjbjhhj', 15, '2018-02-13 17:37:45', 160),
(169, 'zxcvzxcvzad', 'aasasdfasdf', 15, '2018-02-14 17:01:47', 179),
(170, 'asdfasdfasdfasdfasdflkj lkajs dfklj lkajs dlkfj klasj dfklj klajs dfklj klasjd fklj alksdjf kljasdl;kfj;lkasjdf kl;ja slkdfj lkajs dlkfj lkasjd flkja sdlkf', 'iyiuyeiuyqwe riuy iuoqywe iury iuqywe iury aiusdyf iuoy aiusodyf iuy asiudyf iuya sdiufy iuasyd fiuy asiudfy iuasyd fiuy asdiuf', 15, '2018-02-14 17:07:08', 190),
(171, 'asdfsadf', 'asdfasdfsadf', 15, '2018-02-14 17:14:56', 191),
(172, 'asdasdfsdfzxcvxcv', 'zxcvxzcvxzcvxczvasdfsdf', 15, '2018-02-14 17:14:56', 191),
(173, 'cvzxcvxcvsadfsdf', ' asdfasdfasdfasdfsdaf', 15, '2018-02-14 17:14:56', 191),
(174, 'zxcvzxcv', 'zxcvzxcvxzcv', 15, '2018-02-14 17:15:38', 192),
(175, 'asdfasdfzcxv', 'zcvzxcvzxasdfasfd', 15, '2018-02-14 17:15:38', 192),
(176, 'xzcvxcvasdfasdf ', 'asdfasdfsdfvczxcv', 15, '2018-02-14 17:15:38', 192),
(177, 'zxcvzxcvasdffa ', 'zxcvzxvasdfq', 15, '2018-02-14 17:15:38', 192),
(178, 'Test Viac prilohTest Viac prilohTest Viac prilohTest Viac priloh', 'Test Viac prilohTest Viac prilohTest Viac priloh', 15, '2018-02-14 17:16:52', 193),
(179, 'Test Viac prilohTest Viac prilohTest Viac prilohTest Viac priloh', 'Test Viac prilohTest Viac prilohTest Viac prilohTest Viac prilohTest Viac priloh', 15, '2018-02-14 17:16:52', 193),
(180, 'Tereza Vesela', 'Tereza Vesela', 15, '2018-02-14 18:07:11', 199),
(181, 'Tereza VeselaTereza Vesela', 'Tereza Vesela', 15, '2018-02-14 18:07:48', 200),
(182, 'Tereza Vesela', 'Tereza Vesela', 15, '2018-02-14 18:08:08', 201),
(183, 'Tereza Vesela', 'Tereza Vesela', 15, '2018-02-14 18:08:24', 202),
(184, 'připrav si potřebné vybavení(vrtačka/špachtle, voda, štetka)', 'připravení všech věcí', 25, '2018-02-15 07:42:30', 203),
(185, 'vrtačkou nebo špachtlí odstraň lišty u podlahy', 'vytrhané lišty', 25, '2018-02-15 07:42:30', 203),
(186, 'odstraň zásuvky a vypínače', 'připravené zdi na strhnutí tapet', 25, '2018-02-15 07:42:30', 203),
(187, 'namoč tapety a pomalu je začni strhávat odspoda nahoru', 'strhané tapety', 25, '2018-02-15 07:42:30', 203),
(188, 'prohlídni místnost jestli jsou všude strhnuté tapety, popřípadě namoč papír co zbyl na zdech a strhni ho stejným způsobem jako tapetu', 'kompletně strhané tapety a holé zdi', 25, '2018-02-15 07:42:30', 203),
(189, 'Vyhledání požadováného filmu na internetu', 'Nalezeno', 24, '2018-02-15 07:42:41', 204),
(190, 'Stažení filmů do počítače', 'Staženo', 24, '2018-02-15 07:42:41', 204),
(191, 'Připojení flash disku do PC', 'Připojeno', 24, '2018-02-15 07:42:41', 204),
(192, 'Kopírování filmů na flash disk', 'Zkopírováno', 24, '2018-02-15 07:42:41', 204),
(193, 'Vyjmutí flash disku z PC', 'Vyjmuto', 24, '2018-02-15 07:42:41', 204),
(194, 'Připojení flash disku do TV', 'Připojeno', 24, '2018-02-15 07:42:41', 204),
(195, 'Pomocí ovladače zapnutí systému pro přehrávání filmu', 'Spuštění systému', 24, '2018-02-15 07:42:41', 204),
(196, 'Vyhledání požadovaného filmu na flash (pokud je více dat na flash)', 'Nalezeno', 24, '2018-02-15 07:42:41', 204),
(197, 'Spuštění filmů', 'Přehrávání', 24, '2018-02-15 07:42:41', 204),
(198, 'vezmi si metr a změř všechny rozměry místností', 'rozměry potřebné na nakoupení materiálu', 25, '2018-02-15 07:52:45', 205),
(199, 'nakup potřebný materiál (štuky, barvu, tmel, perlinku...)\r\na nářadí(špachtle, válečky,stěrky...)', 'materiál a nářadí připravené k práci', 25, '2018-02-15 07:52:45', 205),
(200, 'nakup zakrývací folie', 'fólie', 25, '2018-02-15 07:52:45', 205),
(201, 'všechen nábytek buď odnes z místnosti nebo ho dej do prostředka', 'připravení místnosti k zahájení prací', 25, '2018-02-15 07:52:45', 205),
(202, 'připrav karton na zakrytí podlah', 'ochrana podlahy před poškozením', 25, '2018-02-15 07:52:45', 205),
(203, 'vezmi fólie a zafóliuj podlahu a připrav kartony', 'připravená podlaha', 25, '2018-02-15 07:59:51', 206),
(204, 'seškrábej a vyhlaď zdi', 'připravené zdi', 25, '2018-02-15 07:59:51', 206),
(205, 'zatmeluj díry a naštukuj místnost ', 'naštukováná místnost', 25, '2018-02-15 07:59:51', 206),
(206, 'nech místnost uschnout a připrav si barvu a začni bílit', 'nabílená a hotová místnost ', 25, '2018-02-15 07:59:51', 206),
(207, 'ukliď všechen bordel', 'hotová práce', 25, '2018-02-15 07:59:51', 206),
(208, 'Vyhledání požadováného filmů', 'Nalezeno', 24, '2018-02-15 08:02:07', 207),
(209, 'Stažení požadovaného filmu', 'Staženo', 24, '2018-02-15 08:02:07', 207),
(210, 'Vyhledání aplikace pro vypálení dat na CD/DVD', 'Nalezení aplikace', 24, '2018-02-15 08:02:07', 207),
(211, 'Stažení aplikace', 'Staženo', 24, '2018-02-15 08:02:07', 207),
(212, 'Spuštění instalačního souboru pro nainstalování aplikace', 'Nainstalování aplikace', 24, '2018-02-15 08:02:07', 207),
(213, 'Spuštění aplikace ', 'Spuštěno', 24, '2018-02-15 08:02:07', 207),
(214, 'Vložení DVD do mechaniky', 'Vloženo', 24, '2018-02-15 08:02:07', 207),
(215, 'Vypalení filmu na DVD na pomocí stažené aplikace', 'Vypáleno', 24, '2018-02-15 08:02:07', 207),
(216, 'Vyjmutí DVD z mechaniky', 'Vyjmuto', 24, '2018-02-15 08:02:07', 207),
(217, 'Spuštění DVD přehrávače', 'Spuštěno', 24, '2018-02-15 08:02:07', 207),
(218, 'Vložení DVD do DVD přehrávače', 'Spuštění filmu', 24, '2018-02-15 08:02:07', 207),
(219, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 208),
(220, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 208),
(221, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 208),
(222, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 208),
(223, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 208),
(224, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 209),
(225, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 209),
(226, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 209),
(227, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 209),
(228, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 209),
(229, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 210),
(230, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 210),
(231, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 210),
(232, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 210),
(233, 'udělej něco', 'něco se stalo', 25, '2018-02-15 08:12:39', 210),
(234, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 211),
(235, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 211),
(236, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 211),
(237, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 211),
(238, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 211),
(239, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 212),
(240, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 212),
(241, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 212),
(242, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 212),
(243, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 212),
(244, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 213),
(245, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 213),
(246, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 213),
(247, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 213),
(248, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:13:22', 213),
(249, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 214),
(250, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 214),
(251, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 214),
(252, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 214),
(253, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 214),
(254, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 215),
(255, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 215),
(256, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 215),
(257, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 215),
(258, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 215),
(259, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 216),
(260, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 216),
(261, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 216),
(262, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 216),
(263, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:06', 216),
(264, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 217),
(265, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 217),
(266, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 217),
(267, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 217),
(268, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 217),
(269, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 218),
(270, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 218),
(271, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 218),
(272, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 218),
(273, 'udělej něco', 'něco se stalo', 15, '2018-02-15 08:24:31', 218),
(279, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 220),
(280, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 220),
(281, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 220),
(282, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 220),
(283, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 220),
(284, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 221),
(285, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 221),
(286, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 221),
(287, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 221),
(288, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 221),
(289, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 222),
(290, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 222),
(291, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 222),
(292, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 222),
(293, 'udělej něco', 'něco se stalo', 24, '2018-02-15 08:33:46', 222),
(401, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:07', 247),
(402, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:07', 247),
(403, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:07', 247),
(404, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:07', 247),
(405, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:07', 247),
(406, '', '', 15, '2018-02-19 15:29:07', 247),
(407, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:24', 248),
(408, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:24', 248),
(409, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:24', 248),
(410, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:24', 248),
(411, 'udělej něco', 'něco se stalo', 15, '2018-02-19 15:29:24', 248),
(412, '', '', 15, '2018-02-19 15:29:24', 248),
(413, '', '', 15, '2018-02-19 15:29:24', 248),
(479, 'přihlaš se do uživatele s rolí test managera v daném projektu ', 'role test managera', 25, '2018-02-20 10:55:58', 266),
(480, 'klikni na záložku test plan', 'otevře se záložka test plán ', 25, '2018-02-20 10:55:58', 266),
(481, 'klikni na tlačítko vytvořit test plan, zadej název a pridej', 'vytvořil se test plan', 25, '2018-02-20 10:55:58', 266),
(482, 'klikni na tlačítko upravit test plan a změn název ', 'změní se název', 25, '2018-02-20 10:55:58', 266),
(483, 'klikni na tlačítko smazat test plán ', 'smaže se test plán ', 25, '2018-02-20 10:55:58', 266),
(484, 'klikni na tlačítko vytvořit test sprint a zadej informace', 'vytvoří se test sprint', 25, '2018-02-20 10:55:58', 266),
(485, 'klikni na tlačítko otevřít test sprint, změn informace a ulož ', 'změní se test sprint', 25, '2018-02-20 10:55:58', 266),
(486, 'klikni na tlačítko smazat test sprint', 'smaže se test sprint', 25, '2018-02-20 10:55:58', 266),
(487, 'přihlaš se do uživatele s rolí test managera v daném projektu', 'role test managera', 25, '2018-02-20 10:55:58', 267),
(488, 'klikni na záložku test analyses', 'otevře se záložka test analyses', 25, '2018-02-20 10:55:58', 267),
(489, 'klikni na tlačítko vytvořit Test Set, zadej název a popis', 'vytvoří se nový test set ', 25, '2018-02-20 10:55:58', 267),
(490, 'kliknu na tlačitko upravit test set a změn nějaký text a ulož', 'změní se test set ', 25, '2018-02-20 10:55:58', 267),
(491, 'klikni na tlačítko smazat test set ', 'smaže se test set ', 25, '2018-02-20 10:55:58', 267),
(492, 'přihlaš se do uživatele s rolí test managera v daném projektu', 'role test managera', 25, '2018-02-20 10:55:58', 268),
(493, 'klikni na záložku test analyses', 'otevře se záložka test analyses', 25, '2018-02-20 10:55:58', 268),
(494, 'klikni na tlačítko pridat test case, vyplň kolonky a přidej ho', 'vytvoří se test case', 25, '2018-02-20 10:55:58', 268),
(495, 'klikni na tlačítko upravit test case a změn nějaký text nebo název', 'změní se test case', 25, '2018-02-20 10:55:58', 268),
(496, 'klikni na smazat test case', 'smaže se test case', 25, '2018-02-20 10:55:58', 268),
(497, 'přihlaš se do uživatele s rolí test managera v daném projektu', 'role test managera', 25, '2018-02-20 10:55:58', 269),
(498, 'klikni na záložku test analyses', 'otevře se záložka test analyses', 25, '2018-02-20 10:55:58', 269),
(499, ' klikni na tlačítko upravit test case a přidej test step', 'přidá se test step v test casu', 25, '2018-02-20 10:55:58', 269),
(500, ' klikni na tlačítko upravit test case a přepiš test step', 'změní se  test step v test casu', 25, '2018-02-20 10:55:58', 269),
(501, ' klikni na tlačítko upravit test case a smaž test step', 'smaže se test step v test casu', 25, '2018-02-20 10:55:58', 269),
(502, 'přihlaš se do uživatele s rolí test managera v daném projektu', 'role test managera', 25, '2018-02-20 10:55:58', 270),
(503, 'klikni na záložku settings, klikni na záložku projektové role', 'otevře se záložka projektové role v settings', 25, '2018-02-20 10:55:58', 270),
(504, 'klikni na členy a přidej nějakého člena k roli(např. manažer)', 'nevidím tlačítko ,nemám oprávnění', 25, '2018-02-20 10:55:58', 270),
(505, 'klikni na červený křížek a odstraň nějakého člena u role(např. manažer)', 'nevidím tlačítko ,nemám oprávnění', 25, '2018-02-20 10:55:58', 270),
(506, 'přihlaš se do uživatele s rolí test managera v daném projektu', 'role test managera', 25, '2018-02-20 10:55:58', 271),
(507, 'klikni na záložku issues', 'otevře se záložka issues', 25, '2018-02-20 10:55:58', 271),
(508, 'klikni na založit issue, vyplň potřebné informace a založ issue', 'vytvoří se issue', 25, '2018-02-20 10:55:58', 271),
(509, 'klikni na upravit issue, a změn nějaký text ', 'změní se issue', 25, '2018-02-20 10:55:58', 271),
(510, 'klikni na upravit issue a dole u statusu zvol closed', 'zavře se issue', 25, '2018-02-20 10:55:58', 271),
(511, 'klikni na smazat issue', 'smaže se issue', 25, '2018-02-20 10:55:58', 271),
(512, 'přihlaš se do uživatele s rolí test managera v daném projektu', 'role test managera', 25, '2018-02-20 10:55:58', 272),
(513, 'klikni na záložku settings', 'vidím nastavení', 25, '2018-02-20 10:55:58', 272),
(514, 'zkus přepsat nějký text a uložit', 'nevidím tlačítko ,nemám oprávnění', 25, '2018-02-20 10:55:58', 272),
(515, 'klikni na projektové role a zkus je změnit', 'nevidím tlačítko ,nemám oprávnění', 25, '2018-02-20 10:55:58', 272),
(516, 'klikni na Ostatní nastavení a na smazat projekt', 'nevidím tlačítko ,nemám oprávnění', 25, '2018-02-20 10:55:58', 272),
(517, 'asd', 'asd', 25, '2018-02-20 13:45:34', 273),
(521, '', '', 15, '2018-02-21 15:05:58', 277),
(522, '', '', 15, '2018-02-22 10:26:10', 278),
(523, '', '', 15, '2018-02-22 10:26:34', 279),
(524, '', '', 15, '2018-02-22 10:26:55', 280),
(525, 'fdghdfghdfg', 'fdghfdghfgdh', 15, '2018-02-27 07:55:09', 286),
(526, 'sdfgsdfg', 'sdfgdfsg', 15, '2018-02-27 07:55:09', 286),
(527, 'dfghfdgh', 'dfghfdhg', 15, '2018-02-27 07:55:09', 286),
(528, 'dfghfgh', 'rytyutryu', 15, '2018-02-27 07:55:09', 286),
(529, 'Po přihlášení do Juno klikni na záložku Test execution', 'Otevře se záložka Test execution', 24, '2018-02-27 08:38:42', 287),
(530, 'Klikni na řádek vlevo a zde vyber TestPlan to samé s řádkem vpravo kde je TestSprint', 'V řádku se objeví vybraný TestPlan,V řádku se objeví vybraný TestSprint', 24, '2018-02-27 08:38:42', 287),
(531, 'Poté klikni na zelené tlačitko Ísť', 'Otevře se tabulka s již vytvořenými test case', 24, '2018-02-27 08:38:42', 287),
(532, 'Zde klikni na tlačitko otvoriť ', 'Otevře se stránka', 24, '2018-02-27 08:38:42', 287),
(533, 'Tady si zapnete timer a každěho stepu je třeba vyplnit Status,v případě problému poslat issue', 'Provedení test execution', 24, '2018-02-27 08:38:42', 287),
(534, 'otevři si stránku Juno a přihlaš se ', ' uspešné příhlašení', 24, '2018-02-27 08:40:39', 288),
(535, 'otevři si projekt a klikni na záložku test plan', 'otevře se ti záložka test plánu', 24, '2018-02-27 08:40:39', 288),
(536, 'klikni na tlačítko  vytvořit test plan, vyplň název a klikni na tlačítko přidat', 'vytvořil se test plan', 24, '2018-02-27 08:40:39', 288),
(537, 'klikni na tlačítko vytvořit test sprint vyplň název, test plán a všechny kolonky', 'vytvořil se test sprint', 24, '2018-02-27 08:40:39', 288),
(538, 'přihlaš se Juno', 'přihlášen', 24, '2018-02-27 08:40:39', 289),
(539, 'otevři si projekt a klikni na záložku test analyses', 'otevřela se záložka s test analyses', 24, '2018-02-27 08:40:39', 289),
(540, 'klikni na tlačítko vytvořit test set, vyplň název a popis', 'vytvořil se test set', 24, '2018-02-27 08:40:39', 289),
(541, 'klikni na tlačítko vytvořit test case, vyplň test set, jméno, prioritu, popis, výsledek, a test stepy', 'vytvoření test casu', 24, '2018-02-27 08:40:39', 289),
(542, 'otevři si záložku test plán, klikni na tlačítko upravit test plan a zaškrtneme co chceme testovat a uložíme a upravíme test sprint kde přidáme role ', 'připravení na test execution', 24, '2018-02-27 08:40:39', 289),
(933, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty. ', 25, '2018-03-01 14:57:43', 398),
(934, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 398),
(935, 'Zadej název pomocí znaků s diakritikou a klikni na tlačítko přidat.', 'Vytvoří se nový projekt.', 25, '2018-03-01 14:57:43', 398),
(936, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 399),
(937, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 399),
(938, 'Zadej název pomocí znaků bez diakritiky a klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 399),
(939, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 400),
(940, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 400),
(941, 'Zadej název pomocí čísel a klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 400),
(942, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 401),
(943, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 401),
(944, 'Zadej název pomocí speciálních znaků a klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 401),
(945, ' X', 'X', 25, '2018-03-01 14:57:43', 401),
(946, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 402),
(947, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 402),
(948, 'Nech kolonku název prázdnou a klikni na tlačítko přidat.', 'Nevytvoří se projekt. Vyskočí tabulka Zadej název.', 25, '2018-03-01 14:57:43', 402),
(949, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 403),
(950, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 403),
(951, 'Vyplň kolonku název mezerama(spacebar/mezerník) a klikni na tlačítko přidat.', 'Nevytvoří se projekt. Vyskočí tabulka Zadej název.', 25, '2018-03-01 14:57:43', 403),
(952, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 404),
(953, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 404),
(954, 'Zadej název a zadej popis a klikni na tlačítko přidat.', 'Vytvoří se nový projekt.', 25, '2018-03-01 14:57:43', 404),
(955, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 404),
(956, 'Vytvoř nový projekt se stejným názvem a klikni na tlačítko přidat.', 'Nevytvoří se nový projekt. Vyskočí hláška Projekt s tímto názvem již existuje.', 25, '2018-03-01 14:57:43', 404),
(957, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 405),
(958, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 405),
(959, 'Vyplň kolonku název a zadej popis pomocí znaků s diakritikou.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 405),
(960, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 406),
(961, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 406),
(962, 'Vyplň kolonku název a zadej popis pomocí znaků bez diakritikya klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 406),
(963, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 407),
(964, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 407),
(965, 'Vyplň kolonku název a zadej popis pomocí čísel a klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 407),
(966, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 408),
(967, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 408),
(968, 'Vyplň kolonku název a zadej popis pomocí speciálních znaků a klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 408),
(969, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 409),
(970, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 409),
(971, 'Vyplň kolonku název a kolonku popis nech prázdnou a klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 409),
(972, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 410),
(973, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 410),
(974, 'Vyplň kolonku název a zadej popis mezerama(spacebar/mezerník) a klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 410),
(975, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 411),
(976, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 411),
(977, 'Zadej název a zadej popis a klikni na tlačítko přidat.', 'Vytvoří se nový projekt.', 25, '2018-03-01 14:57:43', 411),
(978, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 411),
(979, 'Vytvoř nový projekt se stejným popisem a klikni na tlačítko přidat.', 'Vytvoří se nový projekt.', 25, '2018-03-01 14:57:43', 411),
(980, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:57:43', 412),
(981, 'Klikni na tlačítko Vytvořit projekt. ', 'Otevře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 412),
(982, 'Vyplň kolonku název a zadej popis a klikni na tlačítko Zavřít.', 'Zavře se okno Vytvořit projekt.', 25, '2018-03-01 14:57:43', 412),
(983, 'Klikni znovu na tlačítko Vytvořit projekt.', 'Vyskočí okno Vytvořit projekt s vyplěnými informacemi.', 25, '2018-03-01 14:57:43', 412),
(984, 'Klikni na tlačítko přidat.', 'Vytvoří se projekt. ', 25, '2018-03-01 14:57:43', 412),
(985, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty. ', 25, '2018-03-01 14:58:43', 413),
(986, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 413),
(987, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 413),
(988, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 413),
(989, 'Zadej název pomocí znaků s diakritikou a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 413),
(990, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 414),
(991, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 414),
(992, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 414),
(993, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 414),
(994, 'Zadej název pomocí znaků bez diakritiky a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 414),
(995, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 415),
(996, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 415),
(997, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 415),
(998, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 415),
(999, 'Zadej název pomocí čísel a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 415),
(1000, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 416),
(1001, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 416),
(1002, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 416),
(1003, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 416),
(1004, 'Zadej název pomocí speciálních znaků a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 416),
(1005, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 417),
(1006, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 417),
(1007, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 417),
(1008, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 417),
(1009, 'Nech kolonku název prázdnou a klikni na tlačítko přidat.', 'Nevytvoří se nový Test Set. Vyskočí hláška Zadejte název. ', 25, '2018-03-01 14:58:43', 417),
(1010, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 418),
(1011, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 418),
(1012, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 418),
(1013, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 418),
(1014, 'Zadej název mezerama(spacebar/mezerník) a klikni na tlačítko přidat.', 'Nevytvoří se nový Test Set. Vyskočí hláška Zadejte název. ', 25, '2018-03-01 14:58:43', 418),
(1015, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 419),
(1016, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 419),
(1017, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 419),
(1018, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 419),
(1019, 'Zadej název a klikni na tlačítko přidat.', 'Vytvoření Test Setu.', 25, '2018-03-01 14:58:43', 419),
(1020, 'Vytvoř nový Test Set se stejným názvem.', 'Nevytvoří se nový Test Set. Vyskočí hláška Test Set stímto názvem již existuje.', 25, '2018-03-01 14:58:43', 419),
(1021, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty. ', 25, '2018-03-01 14:58:43', 420),
(1022, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 420),
(1023, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses', 25, '2018-03-01 14:58:43', 420),
(1024, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 420),
(1025, 'Vyplň název a zadej tag pomocí znaků s diakritikou a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 420),
(1026, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 421),
(1027, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 421),
(1028, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 421),
(1029, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 421),
(1030, 'Vyplň název a zadej tag pomocí znaků bez diakritiky a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 421),
(1031, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 422),
(1032, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 422),
(1033, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 422),
(1034, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 422),
(1035, 'Vyplň název a zadej tag pomocí čísel a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 422),
(1036, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 423),
(1037, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 423),
(1038, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 423),
(1039, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 423),
(1040, 'Vyplň název a zadej tag pomocí speciálních znaků a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 423),
(1041, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 424),
(1042, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 424),
(1043, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 424),
(1044, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 424),
(1045, 'Vyplň název a kolonku tag nech prázdnou a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set bez Tagu.', 25, '2018-03-01 14:58:43', 424),
(1046, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 425),
(1047, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 425),
(1048, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 425),
(1049, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 425),
(1050, 'Vyplň název a zadej tag mezerama(spacebar/mezerník) a klikni na tlačítko přidat.', 'Nelze vytvořit tag mezerou(spacebar/mezerník). Vytvoří se nový Test Set bez tagu.', 25, '2018-03-01 14:58:43', 425),
(1051, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 426),
(1052, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 426),
(1053, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 426),
(1054, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 426),
(1055, 'Vyplň název a zadej tag..', 'Vytvoření tagu danému Test Setu.', 25, '2018-03-01 14:58:43', 426),
(1056, 'Zadej tag se stejným názvem.', 'Nelze vytvořit(přidelit) dva stejné tagy jednomu Test Setu. ', 25, '2018-03-01 14:58:43', 426),
(1057, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty. ', 25, '2018-03-01 14:58:43', 427),
(1058, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 427),
(1059, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses', 25, '2018-03-01 14:58:43', 427),
(1060, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 427),
(1061, 'Vyplň název, přidej tagy a zadej popis pomocí znaků s diakritikou a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 427),
(1062, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 428),
(1063, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 428),
(1064, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 428),
(1065, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 428),
(1066, 'Vyplň název, přidej tagy a zadej popis pomocí znaků bez diakritiky a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 428),
(1067, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 429),
(1068, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 429),
(1069, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 429),
(1070, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 429),
(1071, 'Vyplň název, přidej tagy a zadej popis a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 429),
(1072, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 430),
(1073, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 430),
(1074, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 430),
(1075, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 430),
(1076, 'Vyplň název, přidej tagy a zadej popis pomocí speciálních znaků a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 430),
(1077, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 431),
(1078, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 431),
(1079, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 431),
(1080, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 431),
(1081, 'Vyplň název, přidej tagy a nech kolonku popis prázdnou a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 431),
(1082, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 432),
(1083, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 432),
(1084, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 432),
(1085, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 432),
(1086, 'Vyplň název, přidej tagy a zadej popis mezerama(spacebar/mezerník) a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 432),
(1087, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 433),
(1088, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 433),
(1089, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 433),
(1090, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 433),
(1091, 'Vyplň název přidej tagy a zadej popis a klikni na tlačítko přidat.', 'Vytvoření Test Setu.', 25, '2018-03-01 14:58:43', 433),
(1092, 'Vytvoř nový Test Set vyplň název, přidej tagy, zadej stejný popis a klikni na tlačítko přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 433),
(1093, 'Klikni na záložku Projekty z nabídky.', 'Otevře se záložka projekty.', 25, '2018-03-01 14:58:43', 434),
(1094, 'Klikni na tlačítko Otevřít projekt. ', 'Otevře se Menu projektu.', 25, '2018-03-01 14:58:43', 434),
(1095, 'Klikni na záložku Test analyses.', 'Otevře se záložka Test analyses.', 25, '2018-03-01 14:58:43', 434),
(1096, 'Klikni na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 434),
(1097, 'Vyplň název přidej tagy a zadej popis a klikni na tlačítko zavřít.', 'Zavře se okno Vytvořit nový Test Set.', 25, '2018-03-01 14:58:43', 434),
(1098, 'Klikni znovu na tlačítko Vytvořit Test Set.', 'Otevře se okno Vytvořit nový Test Set s vyplněnými informacemi.', 25, '2018-03-01 14:58:43', 434),
(1099, 'Klikni na tlačítko Přidat.', 'Vytvoří se nový Test Set.', 25, '2018-03-01 14:58:43', 434),
(1100, 'Prvy step', 'Prvy result', 23, '2018-03-01 21:56:02', 156),
(1101, 'Druhy Step', 'Druhy result', 23, '2018-03-01 21:56:02', 156);

-- --------------------------------------------------------

--
-- Table structure for table `test_step_execution`
--

CREATE TABLE `test_step_execution` (
  `id` int(11) NOT NULL,
  `test_plan_sprint_case_id` int(11) NOT NULL,
  `test_step_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `test_step_execution`
--

INSERT INTO `test_step_execution` (`id`, `test_plan_sprint_case_id`, `test_step_id`, `status_id`, `creator_id`, `create_date`) VALUES
(1, 17, 66, 2, 15, '2018-02-06 10:27:24'),
(2, 17, 67, 2, 15, '2018-02-06 10:27:27'),
(3, 16, 65, 3, 15, '2018-02-06 10:27:40'),
(4, 19, 68, 2, 23, '2018-02-06 22:20:27'),
(5, 19, 69, 4, 23, '2018-02-06 22:20:36'),
(6, 19, 69, 3, 23, '2018-02-06 22:20:42'),
(7, 19, 69, 2, 23, '2018-02-06 22:20:50'),
(8, 17, 66, 3, 15, '2018-02-08 10:14:02'),
(9, 25, 72, 2, 15, '2018-02-08 11:45:01'),
(10, 25, 73, 2, 15, '2018-02-08 11:45:02'),
(11, 25, 74, 3, 15, '2018-02-08 11:45:03'),
(12, 17, 66, 2, 2, '2018-02-08 12:14:01'),
(13, 17, 66, 3, 2, '2018-02-08 12:15:20'),
(14, 17, 66, 4, 2, '2018-02-08 12:15:22'),
(15, 17, 66, 5, 2, '2018-02-08 12:15:24'),
(16, 17, 66, 2, 2, '2018-02-08 12:15:28'),
(17, 17, 66, 1, 2, '2018-02-08 12:15:29'),
(18, 17, 66, 2, 2, '2018-02-08 12:15:31'),
(19, 17, 66, 3, 2, '2018-02-08 12:15:36'),
(20, 17, 66, 4, 2, '2018-02-08 12:16:32'),
(21, 38, 82, 2, 15, '2018-02-13 08:10:14'),
(22, 51, 83, 2, 24, '2018-02-13 12:58:56'),
(23, 51, 84, 2, 24, '2018-02-13 12:59:06'),
(24, 51, 85, 2, 24, '2018-02-13 12:59:11'),
(25, 51, 86, 2, 24, '2018-02-13 12:59:17'),
(26, 51, 87, 2, 24, '2018-02-13 12:59:21'),
(27, 49, 89, 2, 25, '2018-02-13 12:59:26'),
(28, 51, 88, 3, 24, '2018-02-13 12:59:27'),
(29, 49, 90, 2, 25, '2018-02-13 12:59:29'),
(30, 49, 91, 2, 25, '2018-02-13 12:59:32'),
(31, 49, 92, 2, 25, '2018-02-13 12:59:35'),
(32, 52, 98, 2, 24, '2018-02-13 13:00:42'),
(33, 52, 99, 2, 24, '2018-02-13 13:00:43'),
(34, 52, 100, 2, 24, '2018-02-13 13:00:44'),
(35, 52, 101, 2, 24, '2018-02-13 13:00:45'),
(36, 52, 102, 2, 24, '2018-02-13 13:00:46'),
(40, 62, 111, 2, 24, '2018-02-13 14:15:19'),
(41, 62, 112, 2, 24, '2018-02-13 14:15:20'),
(42, 62, 113, 2, 24, '2018-02-13 14:15:21'),
(43, 61, 98, 2, 24, '2018-02-13 14:15:57'),
(44, 61, 99, 2, 24, '2018-02-13 14:15:58'),
(45, 61, 100, 2, 24, '2018-02-13 14:15:59'),
(46, 61, 101, 2, 24, '2018-02-13 14:16:00'),
(47, 61, 102, 3, 24, '2018-02-13 14:16:00'),
(48, 60, 83, 2, 24, '2018-02-13 14:16:55'),
(49, 60, 84, 2, 24, '2018-02-13 14:16:56'),
(50, 60, 85, 2, 24, '2018-02-13 14:16:57'),
(51, 60, 86, 2, 24, '2018-02-13 14:16:58'),
(52, 60, 87, 2, 24, '2018-02-13 14:16:59'),
(53, 60, 88, 2, 24, '2018-02-13 14:17:00'),
(55, 66, 118, 2, 25, '2018-02-13 14:20:29'),
(56, 66, 117, 2, 25, '2018-02-13 14:20:30'),
(57, 66, 116, 2, 25, '2018-02-13 14:20:30'),
(58, 66, 115, 2, 25, '2018-02-13 14:20:31'),
(59, 66, 114, 2, 25, '2018-02-13 14:20:31'),
(60, 72, 120, 2, 24, '2018-02-13 14:25:32'),
(61, 72, 121, 2, 24, '2018-02-13 14:25:33'),
(62, 72, 122, 2, 24, '2018-02-13 14:25:34'),
(63, 72, 123, 2, 24, '2018-02-13 14:25:34'),
(64, 72, 124, 2, 24, '2018-02-13 14:25:39'),
(65, 71, 111, 2, 24, '2018-02-13 14:25:57'),
(66, 71, 112, 2, 24, '2018-02-13 14:25:58'),
(67, 71, 113, 2, 24, '2018-02-13 14:25:59'),
(68, 67, 129, 2, 25, '2018-02-13 14:28:00'),
(69, 67, 128, 2, 25, '2018-02-13 14:28:01'),
(70, 67, 127, 2, 25, '2018-02-13 14:28:01'),
(71, 67, 126, 3, 25, '2018-02-13 14:28:02'),
(72, 67, 125, 2, 25, '2018-02-13 14:28:03'),
(73, 73, 118, 2, 25, '2018-02-13 14:37:20'),
(74, 73, 117, 2, 25, '2018-02-13 14:37:20'),
(75, 73, 116, 2, 25, '2018-02-13 14:37:21'),
(76, 73, 115, 2, 25, '2018-02-13 14:37:21'),
(77, 73, 114, 2, 25, '2018-02-13 14:37:22'),
(78, 74, 125, 2, 25, '2018-02-13 14:39:25'),
(79, 74, 129, 2, 25, '2018-02-13 14:39:26'),
(80, 74, 128, 2, 25, '2018-02-13 14:39:27'),
(81, 74, 127, 2, 25, '2018-02-13 14:39:27'),
(82, 74, 126, 2, 25, '2018-02-13 14:39:28'),
(83, 84, 135, 2, 24, '2018-02-13 14:42:24'),
(84, 84, 136, 2, 24, '2018-02-13 14:42:25'),
(85, 84, 137, 2, 24, '2018-02-13 14:42:25'),
(86, 84, 138, 2, 24, '2018-02-13 14:42:26'),
(87, 83, 120, 2, 24, '2018-02-13 14:42:45'),
(88, 83, 121, 2, 24, '2018-02-13 14:42:46'),
(89, 83, 122, 2, 24, '2018-02-13 14:42:46'),
(90, 83, 123, 2, 24, '2018-02-13 14:42:47'),
(91, 83, 124, 2, 24, '2018-02-13 14:42:48'),
(92, 72, 120, 3, 15, '2018-02-13 17:30:09'),
(93, 72, 121, 3, 15, '2018-02-13 17:30:13'),
(94, 72, 122, 3, 15, '2018-02-13 17:30:16'),
(95, 72, 123, 3, 15, '2018-02-13 17:30:19'),
(96, 72, 124, 3, 15, '2018-02-13 17:30:22'),
(99, 176, 169, 2, 15, '2018-02-14 17:37:53'),
(100, 176, 169, 3, 15, '2018-02-14 17:37:56'),
(101, 168, 171, 2, 15, '2018-02-14 17:42:48'),
(102, 168, 172, 3, 15, '2018-02-14 17:42:51'),
(103, 168, 173, 5, 15, '2018-02-14 17:42:54'),
(104, 225, 188, 2, 25, '2018-02-15 08:02:48'),
(105, 225, 187, 2, 25, '2018-02-15 08:02:49'),
(106, 225, 186, 2, 25, '2018-02-15 08:02:50'),
(107, 225, 185, 2, 25, '2018-02-15 08:02:50'),
(108, 225, 184, 2, 25, '2018-02-15 08:02:51'),
(109, 229, 217, 2, 24, '2018-02-15 08:04:04'),
(110, 229, 216, 2, 24, '2018-02-15 08:04:05'),
(111, 229, 215, 2, 24, '2018-02-15 08:04:06'),
(112, 229, 214, 2, 24, '2018-02-15 08:04:07'),
(113, 229, 213, 2, 24, '2018-02-15 08:04:07'),
(114, 229, 212, 2, 24, '2018-02-15 08:04:09'),
(115, 229, 211, 2, 24, '2018-02-15 08:04:10'),
(116, 229, 210, 2, 24, '2018-02-15 08:04:10'),
(117, 229, 209, 2, 24, '2018-02-15 08:04:12'),
(118, 229, 208, 2, 24, '2018-02-15 08:04:14'),
(119, 229, 218, 3, 24, '2018-02-15 08:04:16'),
(122, 176, 169, 4, 2, '2018-02-15 12:51:57'),
(123, 176, 169, 2, 15, '2018-02-19 16:50:45'),
(149, 309, 144, 2, 2, '2018-02-26 13:39:29'),
(150, 309, 145, 2, 2, '2018-02-26 13:39:32'),
(151, 309, 146, 3, 2, '2018-02-26 13:39:46'),
(152, 309, 146, 2, 2, '2018-02-26 13:40:53'),
(153, 309, 147, 2, 2, '2018-02-26 13:41:03'),
(154, 309, 148, 2, 2, '2018-02-26 13:41:06'),
(155, 200, 169, 2, 15, '2018-02-27 07:57:44'),
(156, 168, 172, 4, 15, '2018-02-27 08:00:31'),
(157, 168, 172, 2, 15, '2018-02-27 08:00:35'),
(158, 168, 173, 3, 15, '2018-02-27 08:00:53'),
(159, 67, 125, 2, 25, '2018-02-27 08:42:44'),
(160, 67, 126, 2, 25, '2018-02-27 08:42:46'),
(161, 67, 127, 2, 25, '2018-02-27 08:42:51'),
(162, 67, 128, 2, 25, '2018-02-27 08:42:55'),
(163, 67, 129, 2, 25, '2018-02-27 08:42:58'),
(164, 75, 130, 2, 25, '2018-02-27 08:43:20'),
(165, 75, 131, 2, 25, '2018-02-27 08:43:31'),
(166, 75, 132, 2, 25, '2018-02-27 08:43:39'),
(167, 75, 133, 2, 25, '2018-02-27 08:43:45'),
(168, 75, 134, 2, 25, '2018-02-27 08:43:47'),
(169, 73, 114, 3, 25, '2018-02-27 08:55:39'),
(170, 315, 538, 2, 24, '2018-02-27 08:56:05'),
(171, 315, 539, 2, 24, '2018-02-27 08:56:21'),
(172, 315, 540, 2, 24, '2018-02-27 08:56:39'),
(173, 315, 541, 3, 24, '2018-02-27 08:56:42'),
(174, 315, 542, 3, 24, '2018-02-27 08:56:46'),
(175, 315, 541, 2, 24, '2018-02-27 09:01:58'),
(176, 314, 534, 2, 24, '2018-02-27 09:03:24'),
(177, 314, 535, 2, 24, '2018-02-27 09:03:25'),
(178, 314, 536, 2, 24, '2018-02-27 09:03:26'),
(179, 314, 537, 2, 24, '2018-02-27 09:03:26'),
(180, 313, 529, 2, 24, '2018-02-27 09:06:02'),
(181, 313, 530, 2, 24, '2018-02-27 09:06:03'),
(182, 313, 531, 3, 24, '2018-02-27 09:06:06'),
(183, 313, 532, 3, 24, '2018-02-27 09:06:07'),
(184, 313, 533, 3, 24, '2018-02-27 09:06:08'),
(185, 313, 529, 4, 24, '2018-02-27 10:23:51'),
(186, 313, 529, 5, 24, '2018-02-27 10:23:54'),
(187, 313, 529, 2, 24, '2018-02-27 10:23:57'),
(188, 282, 492, 2, 25, '2018-03-01 08:28:12'),
(189, 282, 493, 2, 25, '2018-03-01 08:28:14'),
(190, 282, 494, 2, 25, '2018-03-01 08:28:16'),
(191, 282, 496, 2, 25, '2018-03-01 08:28:40'),
(192, 282, 495, 2, 25, '2018-03-01 08:28:40'),
(193, 282, 496, 3, 25, '2018-03-01 08:29:17'),
(194, 315, 542, 2, 25, '2018-03-01 10:46:18'),
(195, 313, 531, 2, 25, '2018-03-01 10:46:55'),
(196, 313, 532, 2, 25, '2018-03-01 10:47:07'),
(197, 313, 533, 2, 25, '2018-03-01 10:47:18'),
(198, 313, 532, 2, 24, '2018-03-01 10:47:19'),
(199, 313, 533, 2, 24, '2018-03-01 10:47:26'),
(200, 389, 1100, 2, 23, '2018-03-01 21:56:32'),
(201, 389, 1101, 3, 23, '2018-03-01 21:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `phone_number` varchar(30) COLLATE utf8_slovak_ci DEFAULT NULL,
  `e_mail` varchar(60) COLLATE utf8_slovak_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `nickname` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `super_admin` int(1) DEFAULT '0',
  `archive` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `phone_number`, `e_mail`, `password`, `nickname`, `multimedia_id`, `date`, `super_admin`, `archive`) VALUES
(1, 'System', '', '', 'system@artexe.sk', '51abb9636078defbf888d8457a7c76f85c8f114c', NULL, NULL, '2016-07-25 16:09:17', 0, 0),
(2, 'Vladino', 'Vráb', '0902739429', 'vladimir.vrab@artexe.sk', '$2y$10$PcYMqcDBSPlC77s.csNEbOVDVgwi.fBJ5/Ubf6Zjhw/xIfYejpM5W', NULL, NULL, '2015-10-29 09:06:41', 1, 0),
(14, 'Test', 'tes', '', 'test@juno.sk', '$2y$10$IrieSij4HXNXZ.keeHKkB.mNw4Pc3h.kbUC.3iDIYgk4u7DpJpcDu', NULL, NULL, '2018-01-03 13:12:48', 1, 0),
(15, 'Andrej', 'Hyben', '773473360', 'ahyben@denevy.eu', '$2y$10$Yl88cbrCWtThu4p0BJCoB.bPelAqzt0eWcQAqd/9PlPvVg4vebpj2', NULL, NULL, '2018-01-23 11:36:55', 1, 0),
(16, 'Jergus', 'Baca', '', 'dementi2svatyjan.sk', '$2y$10$RFYrAzI7W315y18YjVAPzuboGSkWCSs5S7mIVhL35VgLEoANGfDeC', NULL, NULL, '2018-01-23 11:39:57', 0, 0),
(19, 'Mišo', 'Fišer', 'haluzrandomcislo', 'mfiser@denevy.eu', '$2y$10$z.3YANAqKxdiJ5Xc2tyf3uFVY3BeVm/0m4SOj6E/stsQUH8y6rK0G', NULL, NULL, '2018-01-25 14:54:15', 0, 0),
(20, 'Martin', 'Mickal', '+42077788999', 'mmickal@denevy.eu', '$2y$10$tVV2W2LGFuYDGnakNY87QOGQfh5FQ.qN8Dfgm.JZQE0.DrOcqxvw2', NULL, NULL, '2018-01-29 10:46:36', 0, 0),
(21, 'Karol', 'Kleibl', '', 'kleibl@gmail.com', '$2y$10$AGo9/VB3arrqn2viVC622.zweeDYnio9q5gXbREvhXYVW5NR9oBXW', NULL, NULL, '2018-01-30 12:16:40', 0, 0),
(22, 'Peter', 'Jaros', '', 'peter.jaros@o2.cz', '$2y$10$mGYoOI91PUWU58WmWzwUKOm8w59eN8JRYw63JB8M2C8cslmHlO/Gm', NULL, NULL, '2018-02-06 10:28:52', 0, 0),
(23, 'Michal', 'Vittek', '', 'mvittek@denevy.eu', '$2y$10$W4pcmVkcLTaSN5DiZM9fLe6VEYnw9Qv5xPDUk.BC4DpnUNJ2V8hXO', NULL, NULL, '2018-02-06 22:13:36', 1, 0),
(24, 'Zdenek', 'Grunt', '', 'zgrunt@denevy.eu', '$2y$10$3Z6SxMGNntYf0tQW2jI1gOWMTlJJhSAgwrqr1R9aBECROc8DWU1HO', NULL, NULL, '2018-02-13 09:50:37', 1, 0),
(25, 'Adam', 'Grunt', '', 'agrunt@denevy.eu', '$2y$10$HQLQRfxsk65Uy4KwYr5OOuXdP/cFNOyFRIeyL7AhVUmUD5a6Ct2Pa', NULL, NULL, '2018-02-13 09:51:09', 1, NULL),
(27, 'Jiri', 'Redr', '', 'jredr@denevy.eu', '$2y$10$TVWSKxbGmEojakZAcmwqxuFJacFIkRtT0bt.5MT1PpA4M98Fc/MTC', NULL, NULL, '2018-02-15 10:07:24', 0, NULL),
(28, 'Peter', 'Dulak', '', 'peter@dulak.sk', '$2y$10$zGAFb4Ujh7zsNgxd/xbUWeoVv6vomwejaF75sVM50Eq8oQ4eXgrVa', NULL, NULL, '2018-02-15 10:09:51', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_web_role`
--

CREATE TABLE `user_web_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `user_web_role`
--

INSERT INTO `user_web_role` (`id`, `user_id`, `role_id`) VALUES
(27, 15, 8),
(28, 15, 9),
(35, 28, 8),
(36, 28, 9),
(63, 27, 8),
(64, 27, 9),
(73, 22, 8),
(74, 22, 9),
(81, 21, 8),
(82, 21, 9),
(113, 25, 8),
(114, 25, 9),
(117, 24, 8),
(118, 24, 9),
(119, 20, 9),
(122, 2, 8),
(123, 2, 9),
(128, 19, 9),
(129, 23, 8),
(130, 23, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mul` (`multimedia_id`),
  ADD KEY `e_mail_id` (`e_mail`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `telephone_number_id` (`telephone_number`),
  ADD KEY `billing_address_id` (`billing_address_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `test_plan_sprint_id` (`test_plan_sprint_id`),
  ADD KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`),
  ADD KEY `test_step_id` (`test_step_id`),
  ADD KEY `test_step_execution_id` (`test_step_execution_id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `assigned_id` (`assigned_id`);

--
-- Indexes for table `issue_comment`
--
ALTER TABLE `issue_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `issue_id` (`issue_id`);

--
-- Indexes for table `issue_multimedia`
--
ALTER TABLE `issue_multimedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_id` (`issue_id`),
  ADD KEY `multimedia_id` (`multimedia_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `login_picture`
--
ALTER TABLE `login_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailer`
--
ALTER TABLE `mailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailer_attachment`
--
ALTER TABLE `mailer_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7C7BB363F989867` (`mailer_id`),
  ADD KEY `IDX_7C7BB3620531EB8` (`multimedia_id`);

--
-- Indexes for table `mailer_default`
--
ALTER TABLE `mailer_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menuitem_id` (`menuitem_id`);

--
-- Indexes for table `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mul_fol` (`multimedia_folder_id`);

--
-- Indexes for table `multimedia_folder`
--
ALTER TABLE `multimedia_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `project_role`
--
ALTER TABLE `project_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_privilege`
--
ALTER TABLE `role_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_test_case`
--
ALTER TABLE `tag_test_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_case_id` (`test_case_id`);

--
-- Indexes for table `tag_test_set`
--
ALTER TABLE `tag_test_set`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_set_id` (`test_set_id`);

--
-- Indexes for table `test_case`
--
ALTER TABLE `test_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_set_id` (`test_set_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `test_case_multimedia`
--
ALTER TABLE `test_case_multimedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_case_id` (`test_case_id`),
  ADD KEY `multimedia_id` (`multimedia_id`);

--
-- Indexes for table `test_case_run`
--
ALTER TABLE `test_case_run`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`);

--
-- Indexes for table `test_plan`
--
ALTER TABLE `test_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `test_plan_case`
--
ALTER TABLE `test_plan_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_plan_id` (`test_plan_id`),
  ADD KEY `test_case_id` (`test_case_id`);

--
-- Indexes for table `test_plan_sprint`
--
ALTER TABLE `test_plan_sprint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_plan_id` (`test_plan_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `test_plan_sprint_case`
--
ALTER TABLE `test_plan_sprint_case`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_plan_case_id` (`test_plan_case_id`),
  ADD KEY `test_plan_sprint_id` (`test_plan_sprint_id`);

--
-- Indexes for table `test_plan_sprint_case_user`
--
ALTER TABLE `test_plan_sprint_case_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`);

--
-- Indexes for table `test_set`
--
ALTER TABLE `test_set`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `test_step`
--
ALTER TABLE `test_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_case_id` (`test_case_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `test_step_execution`
--
ALTER TABLE `test_step_execution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `test_step_id` (`test_step_id`),
  ADD KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_web_role`
--
ALTER TABLE `user_web_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `issue_comment`
--
ALTER TABLE `issue_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `issue_multimedia`
--
ALTER TABLE `issue_multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `login_picture`
--
ALTER TABLE `login_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mailer`
--
ALTER TABLE `mailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailer_attachment`
--
ALTER TABLE `mailer_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailer_default`
--
ALTER TABLE `mailer_default`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `multimedia_folder`
--
ALTER TABLE `multimedia_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_role`
--
ALTER TABLE `project_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role_privilege`
--
ALTER TABLE `role_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1229;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tag_test_case`
--
ALTER TABLE `tag_test_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tag_test_set`
--
ALTER TABLE `tag_test_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `test_case`
--
ALTER TABLE `test_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `test_case_multimedia`
--
ALTER TABLE `test_case_multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `test_case_run`
--
ALTER TABLE `test_case_run`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `test_plan`
--
ALTER TABLE `test_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `test_plan_case`
--
ALTER TABLE `test_plan_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `test_plan_sprint`
--
ALTER TABLE `test_plan_sprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `test_plan_sprint_case`
--
ALTER TABLE `test_plan_sprint_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `test_plan_sprint_case_user`
--
ALTER TABLE `test_plan_sprint_case_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `test_set`
--
ALTER TABLE `test_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `test_step`
--
ALTER TABLE `test_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1102;

--
-- AUTO_INCREMENT for table `test_step_execution`
--
ALTER TABLE `test_step_execution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_web_role`
--
ALTER TABLE `user_web_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_10` FOREIGN KEY (`billing_address_id`) REFERENCES `billing_address` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `client_ibfk_8` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_ibfk_17` FOREIGN KEY (`assigned_id`) REFERENCES `user` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`test_plan_sprint_id`) REFERENCES `test_plan_sprint` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_ibfk_4` FOREIGN KEY (`test_step_id`) REFERENCES `test_step` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_ibfk_5` FOREIGN KEY (`test_step_execution_id`) REFERENCES `test_step_execution` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_ibfk_6` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issue_comment`
--
ALTER TABLE `issue_comment`
  ADD CONSTRAINT `issue_comment_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `issue_comment_ibfk_3` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issue_multimedia`
--
ALTER TABLE `issue_multimedia`
  ADD CONSTRAINT `issue_multimedia_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_multimedia_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mailer_attachment`
--
ALTER TABLE `mailer_attachment`
  ADD CONSTRAINT `mailer_attachment_ibfk_1` FOREIGN KEY (`mailer_id`) REFERENCES `mailer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mailer_attachment_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD CONSTRAINT `menuitem_ibfk_1` FOREIGN KEY (`menuitem_id`) REFERENCES `menuitem` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`multimedia_folder_id`) REFERENCES `multimedia_folder` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_role`
--
ALTER TABLE `project_role`
  ADD CONSTRAINT `project_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_role_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_role_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_privilege`
--
ALTER TABLE `role_privilege`
  ADD CONSTRAINT `role_privilege_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_test_case`
--
ALTER TABLE `tag_test_case`
  ADD CONSTRAINT `tag_test_case_ibfk_1` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_test_set`
--
ALTER TABLE `tag_test_set`
  ADD CONSTRAINT `tag_test_set_ibfk_1` FOREIGN KEY (`test_set_id`) REFERENCES `test_set` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_case`
--
ALTER TABLE `test_case`
  ADD CONSTRAINT `test_case_ibfk_1` FOREIGN KEY (`test_set_id`) REFERENCES `test_set` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_case_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_case_multimedia`
--
ALTER TABLE `test_case_multimedia`
  ADD CONSTRAINT `test_case_multimedia_ibfk_1` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_case_multimedia_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_case_run`
--
ALTER TABLE `test_case_run`
  ADD CONSTRAINT `test_case_run_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_case_run_ibfk_2` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_plan`
--
ALTER TABLE `test_plan`
  ADD CONSTRAINT `test_plan_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_plan_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_plan_case`
--
ALTER TABLE `test_plan_case`
  ADD CONSTRAINT `test_plan_case_ibfk_1` FOREIGN KEY (`test_plan_id`) REFERENCES `test_plan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_plan_case_ibfk_2` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_plan_sprint`
--
ALTER TABLE `test_plan_sprint`
  ADD CONSTRAINT `test_plan_sprint_ibfk_1` FOREIGN KEY (`test_plan_id`) REFERENCES `test_plan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_plan_sprint_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_plan_sprint_case`
--
ALTER TABLE `test_plan_sprint_case`
  ADD CONSTRAINT `test_plan_sprint_case_ibfk_1` FOREIGN KEY (`test_plan_case_id`) REFERENCES `test_plan_case` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_plan_sprint_case_ibfk_2` FOREIGN KEY (`test_plan_sprint_id`) REFERENCES `test_plan_sprint` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_plan_sprint_case_user`
--
ALTER TABLE `test_plan_sprint_case_user`
  ADD CONSTRAINT `test_plan_sprint_case_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_plan_sprint_case_user_ibfk_2` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_set`
--
ALTER TABLE `test_set`
  ADD CONSTRAINT `test_set_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_set_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_step`
--
ALTER TABLE `test_step`
  ADD CONSTRAINT `test_step_ibfk_1` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_step_ibfk_3` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `test_step_execution`
--
ALTER TABLE `test_step_execution`
  ADD CONSTRAINT `test_step_execution_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_step_execution_ibfk_2` FOREIGN KEY (`test_step_id`) REFERENCES `test_step` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_step_execution_ibfk_4` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_web_role`
--
ALTER TABLE `user_web_role`
  ADD CONSTRAINT `user_web_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_web_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
