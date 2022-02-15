-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 12:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctms`
--

-- --------------------------------------------------------

--
-- Table structure for table `captain`
--

CREATE TABLE `captain` (
  `created_date` date DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `captainName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNumber` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `team_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `captain`
--

INSERT INTO `captain` (`created_date`, `id`, `captainName`, `email`, `contactNumber`, `password`, `team_id`) VALUES
('2022-01-23', 1, 'Salman Chottani', 'salmanchottani123@gmail.com', 2147483647, 'NidhinQI', 31);

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `fixtures_id` int(255) NOT NULL,
  `TeamA` int(255) NOT NULL,
  `TeamB` int(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `ground_id` int(255) NOT NULL,
  `tournament_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`fixtures_id`, `TeamA`, `TeamB`, `Date`, `Time`, `ground_id`, `tournament_id`) VALUES
(1, 1, 3, '2022-01-18', '8 pm', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ground`
--

CREATE TABLE `ground` (
  `ground_id` int(255) NOT NULL,
  `groundName` varchar(255) NOT NULL,
  `groundLocation` varchar(255) NOT NULL,
  `sponser_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ground`
--

INSERT INTO `ground` (`ground_id`, `groundName`, `groundLocation`, `sponser_id`) VALUES
(0, 'KMC Sports Complex', 'Jamshed Road', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `heading`, `description`) VALUES
(1, 'images/go-texan-logo-healingbloom.png', 'Hello', 'demo content ');

-- --------------------------------------------------------

--
-- Table structure for table `payment_confirmation`
--

CREATE TABLE `payment_confirmation` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_amount` int(255) NOT NULL,
  `tournament_team_id` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_confirmation`
--

INSERT INTO `payment_confirmation` (`id`, `payment_id`, `payment_amount`, `tournament_team_id`, `date`, `payment_status`) VALUES
(1, 'ch_3KOSecBRon3fJDiD1sozu77U', 50000, 5, '2022-02-02', 'succeeded'),
(2, 'ch_3KOlcEBRon3fJDiD1WoNxVkS', 50000, 6, '2022-02-02', 'succeeded'),
(3, 'ch_3KOleQBRon3fJDiD2fv34tzg', 50000, 7, '2022-02-02', 'succeeded'),
(4, 'ch_3KOlhDBRon3fJDiD13DUG9wK', 50000, 8, '2022-02-02', 'succeeded'),
(5, 'ch_3KOmdlBRon3fJDiD0kFB7gb5', 50000, 9, '2022-02-02', 'succeeded'),
(6, 'ch_3KOnQpBRon3fJDiD2pI4NxiA', 50000, 10, '2022-02-02', 'succeeded'),
(7, 'ch_3KOnahBRon3fJDiD27M6UmPu', 50000, 12, '2022-02-02', 'succeeded');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(255) NOT NULL,
  `noOfMatches` varchar(255) NOT NULL,
  `runs` varchar(255) DEFAULT NULL,
  `wickets` varchar(255) DEFAULT NULL,
  `noOfSixes` varchar(255) DEFAULT NULL,
  `noOfFours` varchar(255) DEFAULT NULL,
  `player_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `noOfMatches`, `runs`, `wickets`, `noOfSixes`, `noOfFours`, `player_ID`) VALUES
(2, '15', '1025', '0', '25', '57', 30);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `playerId` int(255) NOT NULL,
  `playerName` varchar(255) NOT NULL,
  `playerStats` varchar(255) NOT NULL,
  `playerContactNo` varchar(255) DEFAULT NULL,
  `team_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerId`, `playerName`, `playerStats`, `playerContactNo`, `team_id`) VALUES
(1, 'Atik', 'batsman', NULL, 1),
(2, 'Arsalan', 'batsman', NULL, 1),
(3, 'Haider', 'batsman', NULL, 1),
(4, 'Liaquat', 'batsman', NULL, 1),
(5, 'Rehman', 'allrounder', NULL, 1),
(6, 'Asad', 'batsman', NULL, 1),
(7, 'Ahad', 'allrounder', NULL, 1),
(8, 'Saad', 'bowler', NULL, 1),
(9, 'Kamran', 'bowler', NULL, 1),
(10, 'Siddique', 'bowler', NULL, 1),
(11, 'Zohaib', 'allrounder', NULL, 1),
(23, 'rehman', 'batsman', NULL, 3),
(24, 'ali', 'batsman', NULL, 3),
(25, 'malik', 'batsman', NULL, 3),
(26, 'niyazi', 'batsman', NULL, 3),
(27, 'atif', 'batsman', NULL, 3),
(28, 'kumail', 'allrounder', NULL, 3),
(29, 'huziafa', 'allrounder', NULL, 3),
(30, 'salman', 'bowler', NULL, 3),
(31, 'asad', 'bowler', NULL, 3),
(32, 'hamza', 'bowler', NULL, 3),
(33, 'ushan', 'bowler', NULL, 3),
(34, 'asad', 'batsman', NULL, 4),
(35, 'ali', 'batsman', NULL, 4),
(36, 'malik', 'batsman', NULL, 4),
(37, 'niyazi', 'batsman', NULL, 4),
(38, 'atif', 'batsman', NULL, 4),
(39, 'kumail', 'allrounder', NULL, 4),
(40, 'huziafa', 'allrounder', NULL, 4),
(41, 'salman', 'bowler', NULL, 4),
(42, 'asad', 'bowler', NULL, 4),
(43, 'hamza', 'bowler', NULL, 4),
(44, 'ushan', 'bowler', NULL, 4),
(45, 'Maris Avery', 'batsman', NULL, 5),
(46, 'Reece Ford', 'batsman', NULL, 5),
(47, 'Carlos Gallegos', 'batsman', NULL, 5),
(48, 'Rooney Rhodes', 'batsman', NULL, 5),
(49, 'Iola Mosley', 'batsman', NULL, 5),
(50, 'Troy Walsh', 'allrounder', NULL, 5),
(51, 'Kaye Jarvis', 'allrounder', NULL, 5),
(52, 'Roth Nash', 'bowler', NULL, 5),
(53, 'Jordan Battle', 'bowler', NULL, 5),
(54, 'Lucius Perry', 'bowler', NULL, 5),
(55, 'Rebekah Rose', 'bowler', NULL, 5),
(56, 'Maris Avery', 'batsman', NULL, 6),
(57, 'Reece Ford', 'batsman', NULL, 6),
(58, 'Carlos Gallegos', 'batsman', NULL, 6),
(59, 'Rooney Rhodes', 'batsman', NULL, 6),
(60, 'Iola Mosley', 'batsman', NULL, 6),
(61, 'Troy Walsh', 'allrounder', NULL, 6),
(62, 'Kaye Jarvis', 'allrounder', NULL, 6),
(63, 'Roth Nash', 'bowler', NULL, 6),
(64, 'Jordan Battle', 'bowler', NULL, 6),
(65, 'Lucius Perry', 'bowler', NULL, 6),
(66, 'Rebekah Rose', 'bowler', NULL, 6),
(67, 'Fay Dickerson', 'batsman', NULL, 7),
(68, 'Hyatt Taylor', 'batsman', NULL, 7),
(69, 'Vernon Wallace', 'batsman', NULL, 7),
(70, 'Allistair Kane', 'batsman', NULL, 7),
(71, 'Hayley Buckley', 'batsman', NULL, 7),
(72, 'Dakota Mckinney', 'allrounder', NULL, 7),
(73, 'Noah Poole', 'bowler', NULL, 7),
(74, 'Lani Rush', 'allrounder', NULL, 7),
(75, 'Haley Rodriquez', 'bowler', NULL, 7),
(76, 'Ocean Jimenez', 'bowler', NULL, 7),
(77, 'Merritt Duncan', 'bowler', NULL, 7),
(78, 'Melinda Kane', 'batsman', NULL, 8),
(79, 'Grant Whitehead', 'batsman', NULL, 8),
(80, 'Winter Morton', 'batsman', NULL, 8),
(81, 'Lane Hampton', 'batsman', NULL, 8),
(82, 'Levi Mclaughlin', 'batsman', NULL, 8),
(83, 'Scott Sanchez', 'allrounder', NULL, 8),
(84, 'Quincy Spence', 'allrounder', NULL, 8),
(85, 'Kameko Steele', 'bowler', NULL, 8),
(86, 'Shelley Perkins', 'bowler', NULL, 8),
(87, 'Anastasia Stewart', 'bowler', NULL, 8),
(88, 'Idona Holmes', 'bowler', NULL, 8),
(89, 'Melinda Kane', 'batsman', NULL, 9),
(90, 'Grant Whitehead', 'batsman', NULL, 9),
(91, 'Winter Morton', 'batsman', NULL, 9),
(92, 'Lane Hampton', 'batsman', NULL, 9),
(93, 'Levi Mclaughlin', 'batsman', NULL, 9),
(94, 'Scott Sanchez', 'allrounder', NULL, 9),
(95, 'Quincy Spence', 'allrounder', NULL, 9),
(96, 'Kameko Steele', 'bowler', NULL, 9),
(97, 'Shelley Perkins', 'bowler', NULL, 9),
(98, 'Anastasia Stewart', 'bowler', NULL, 9),
(99, 'Idona Holmes', 'bowler', NULL, 9),
(100, 'Brielle Church', 'batsman', NULL, 10),
(101, 'Jarrod Snow', 'batsman', NULL, 10),
(102, 'Bethany Butler', 'batsman', NULL, 10),
(103, 'Michelle Hurst', 'batsman', NULL, 10),
(104, 'Xantha Miles', 'batsman', NULL, 10),
(105, 'Macy Collier', 'allrounder', NULL, 10),
(106, 'Stacey Snow', 'allrounder', NULL, 10),
(107, 'Jaime Mercado', 'allrounder', NULL, 10),
(108, 'Jason Maddox', 'bowler', NULL, 10),
(109, 'Rowan Newman', 'bowler', NULL, 10),
(110, 'Wyoming Shepard', 'bowler', NULL, 10),
(111, 'Brielle Church', 'batsman', NULL, 11),
(112, 'Jarrod Snow', 'batsman', NULL, 11),
(113, 'Bethany Butler', 'batsman', NULL, 11),
(114, 'Michelle Hurst', 'batsman', NULL, 11),
(115, 'Xantha Miles', 'batsman', NULL, 11),
(116, 'Macy Collier', 'allrounder', NULL, 11),
(117, 'Stacey Snow', 'allrounder', NULL, 11),
(118, 'Jaime Mercado', 'allrounder', NULL, 11),
(119, 'Jason Maddox', 'bowler', NULL, 11),
(120, 'Rowan Newman', 'bowler', NULL, 11),
(121, 'Wyoming Shepard', 'bowler', NULL, 11),
(122, 'Chancellor Kramer', 'batsman', NULL, 12),
(123, 'Mannix Deleon', 'batsman', NULL, 12),
(124, 'Bell Herring', 'batsman', NULL, 12),
(125, 'Nathan Johns', 'batsman', NULL, 12),
(126, 'Melanie Barton', 'batsman', NULL, 12),
(127, 'Rowan Pennington', 'allrounder', NULL, 12),
(128, 'Myra William', 'bowler', NULL, 12),
(129, 'Fay Simon', 'allrounder', NULL, 12),
(130, 'Ivor Griffin', 'bowler', NULL, 12),
(131, 'Maia Warner', 'bowler', NULL, 12),
(132, 'Lynn Colon', 'bowler', NULL, 12),
(133, 'Moana Hart', 'batsman', NULL, 13),
(134, 'Brennan Good', 'batsman', NULL, 13),
(135, 'Alana Jefferson', 'batsman', NULL, 13),
(136, 'Florence Todd', 'batsman', NULL, 13),
(137, 'Kellie Pena', 'batsman', NULL, 13),
(138, 'Timothy Flowers', 'allrounder', NULL, 13),
(139, 'Maris Fuentes', 'bowler', NULL, 13),
(140, 'Kathleen Rollins', 'bowler', NULL, 13),
(141, 'Dennis Guerrero', 'bowler', NULL, 13),
(142, 'Ivy Solis', 'bowler', NULL, 13),
(143, 'Anastasia Craft', 'bowler', NULL, 13),
(144, '', '', NULL, 14),
(145, '', '', NULL, 14),
(146, '', '', NULL, 14),
(147, '', '', NULL, 14),
(148, '', '', NULL, 14),
(149, '', '', NULL, 14),
(150, '', '', NULL, 14),
(151, '', '', NULL, 14),
(152, '', '', NULL, 14),
(153, '', '', NULL, 14),
(154, '', '', NULL, 14),
(155, '', '', NULL, 15),
(156, '', '', NULL, 15),
(157, '', '', NULL, 15),
(158, '', '', NULL, 15),
(159, '', '', NULL, 15),
(160, '', '', NULL, 15),
(161, '', '', NULL, 15),
(162, '', '', NULL, 15),
(163, '', '', NULL, 15),
(164, '', '', NULL, 15),
(165, '', '', NULL, 15),
(166, '', '', NULL, 16),
(167, '', '', NULL, 16),
(168, '', '', NULL, 16),
(169, '', '', NULL, 16),
(170, '', '', NULL, 16),
(171, '', '', NULL, 16),
(172, '', '', NULL, 16),
(173, '', '', NULL, 16),
(174, '', '', NULL, 16),
(175, '', '', NULL, 16),
(176, '', '', NULL, 16),
(177, 'Yvette Madden', 'batsman', NULL, 17),
(178, 'Celeste Williamson', 'batsman', NULL, 17),
(179, 'Laith Monroe', 'batsman', NULL, 17),
(180, 'Amy George', 'batsman', NULL, 17),
(181, 'Karen Marshall', 'batsman', NULL, 17),
(182, 'Steven Hart', 'allrounder', NULL, 17),
(183, 'Nash Underwood', 'bowler', NULL, 17),
(184, 'Rhea Mcbride', 'allrounder', NULL, 17),
(185, 'Sigourney Watkins', 'bowler', NULL, 17),
(186, 'Joelle Barker', 'bowler', NULL, 17),
(187, 'Sara Stevenson', 'bowler', NULL, 17),
(188, 'Otto Padilla', 'batsman', NULL, 18),
(189, 'Jonas Oliver', 'batsman', NULL, 18),
(190, 'Erin Cruz', 'batsman', NULL, 18),
(191, 'Honorato Nieves', 'batsman', NULL, 18),
(192, 'Kelsie Velez', 'batsman', NULL, 18),
(193, 'Larissa Ryan', 'allrounder', NULL, 18),
(194, 'Fiona Sosa', 'allrounder', NULL, 18),
(195, 'Mikayla Combs', 'bowler', NULL, 18),
(196, 'Nicholas Herring', 'bowler', NULL, 18),
(197, 'Boris Reilly', 'bowler', NULL, 18),
(198, 'Steel Cooley', 'bowler', NULL, 18),
(199, 'Wade Copeland', 'batsman', NULL, 19),
(200, 'Ruth Trevino', 'batsman', NULL, 19),
(201, 'Renee Pace', 'batsman', NULL, 19),
(202, 'Melanie Bauer', 'batsman', NULL, 19),
(203, 'Reagan Stewart', 'batsman', NULL, 19),
(204, 'Hall Spears', 'allrounder', NULL, 19),
(205, 'Macey Rutledge', 'bowler', NULL, 19),
(206, 'Scarlet Marsh', 'allrounder', NULL, 19),
(207, 'Lynn Britt', 'bowler', NULL, 19),
(208, 'Ainsley Valdez', 'bowler', NULL, 19),
(209, 'Piper Vinson', 'bowler', NULL, 19),
(210, 'Yoko Castaneda', 'batsman', NULL, 20),
(211, 'Alisa Simon', 'batsman', NULL, 20),
(212, 'Karyn Prince', 'batsman', NULL, 20),
(213, 'Brent Pena', 'batsman', NULL, 20),
(214, 'Pascale Ramos', 'batsman', NULL, 20),
(215, 'Lee Justice', 'allrounder', NULL, 20),
(216, 'Giacomo Flynn', 'bowler', NULL, 20),
(217, 'Cherokee Hatfield', 'allrounder', NULL, 20),
(218, 'Uta Bradshaw', 'bowler', NULL, 20),
(219, 'Fatima Callahan', 'bowler', NULL, 20),
(220, 'Jacob Dale', 'bowler', NULL, 20),
(221, 'Griffin Pearson', 'batsman', NULL, 21),
(222, 'Gisela Mcgowan', 'batsman', NULL, 21),
(223, 'Erich Farmer', 'batsman', NULL, 21),
(224, 'Berk Gamble', 'batsman', NULL, 21),
(225, 'Octavia Ratliff', 'batsman', NULL, 21),
(226, 'Emmanuel Dorsey', 'allrounder', NULL, 21),
(227, 'Kennan Hudson', 'allrounder', NULL, 21),
(228, 'Steel Herring', 'bowler', NULL, 21),
(229, 'Tanya Greer', 'bowler', NULL, 21),
(230, 'Ainsley Rios', 'bowler', NULL, 21),
(231, 'Jason Shields', 'bowler', NULL, 21),
(232, 'Astra Dejesus', 'batsman', NULL, 22),
(233, 'Indira Dixon', 'batsman', NULL, 22),
(234, 'Noel Sears', 'batsman', NULL, 22),
(235, 'Claire Davenport', 'batsman', NULL, 22),
(236, 'Molly Barker', 'batsman', NULL, 22),
(237, 'Brendan Parks', 'allrounder', NULL, 22),
(238, 'Serena Barlow', 'bowler', NULL, 22),
(239, 'Lee Hudson', 'bowler', NULL, 22),
(240, 'Fredericka Hurst', 'bowler', NULL, 22),
(241, 'Serena Whitaker', 'bowler', NULL, 22),
(242, 'Aladdin Hoffman', 'bowler', NULL, 22),
(243, 'Vincent Carpenter', 'batsman', NULL, 23),
(244, 'Clare Dalton', 'batsman', NULL, 23),
(245, 'Hanae Mcdonald', 'batsman', NULL, 23),
(246, 'Allegra Noel', 'batsman', NULL, 23),
(247, 'Halla Fry', 'batsman', NULL, 23),
(248, 'Cassady Berry', 'allrounder', NULL, 23),
(249, 'Rama Mann', 'bowler', NULL, 23),
(250, 'Bernard Butler', 'allrounder', NULL, 23),
(251, 'Geraldine Hunter', 'bowler', NULL, 23),
(252, 'Keaton Quinn', 'bowler', NULL, 23),
(253, 'Althea Hogan', 'bowler', NULL, 23),
(254, 'Ingrid Garner', 'batsman', NULL, 24),
(255, 'Jael Salinas', 'batsman', NULL, 24),
(256, 'Xerxes Hatfield', 'batsman', NULL, 24),
(257, 'Kevyn Hayden', 'batsman', NULL, 24),
(258, 'Abdul Hodge', 'batsman', NULL, 24),
(259, 'Sydnee Rogers', 'allrounder', NULL, 24),
(260, 'Asher Levy', 'allrounder', NULL, 24),
(261, 'Laith Bradshaw', 'allrounder', NULL, 24),
(262, 'Ryan Burke', 'bowler', NULL, 24),
(263, 'Hamish Hays', 'bowler', NULL, 24),
(264, 'Rogan Cooley', 'bowler', NULL, 24),
(265, 'Ian Sampson', 'batsman', NULL, 25),
(266, 'Hu Combs', 'batsman', NULL, 25),
(267, 'Edan Savage', 'batsman', NULL, 25),
(268, 'Nolan Talley', 'batsman', NULL, 25),
(269, 'Sydnee Luna', 'batsman', NULL, 25),
(270, 'Marcia Carver', 'allrounder', NULL, 25),
(271, 'Fleur Kelley', 'bowler', NULL, 25),
(272, 'Myles Keller', 'bowler', NULL, 25),
(273, 'Barry Porter', 'bowler', NULL, 25),
(274, 'Benjamin Carr', 'bowler', NULL, 25),
(275, 'Hayden Mendez', 'bowler', NULL, 25),
(276, 'Amy Green', 'batsman', NULL, 26),
(277, 'Abra Cline', 'batsman', NULL, 26),
(278, 'Cynthia Dalton', 'batsman', NULL, 26),
(279, 'Fredericka Justice', 'batsman', NULL, 26),
(280, 'Cameran Farmer', 'batsman', NULL, 26),
(281, 'Karen Davidson', 'allrounder', NULL, 26),
(282, 'Seth Avery', 'allrounder', NULL, 26),
(283, 'Katell Klein', 'allrounder', NULL, 26),
(284, 'Irma Rodriguez', 'bowler', NULL, 26),
(285, 'Yen Ramsey', 'bowler', NULL, 26),
(286, 'Merritt Hart', 'bowler', NULL, 26),
(287, 'Clio Clayton', 'batsman', NULL, 27),
(288, 'Noah Sanford', 'batsman', NULL, 27),
(289, 'Margaret Mendez', 'batsman', NULL, 27),
(290, 'Oren Grimes', 'batsman', NULL, 27),
(291, 'Cade Grant', 'batsman', NULL, 27),
(292, 'Martin Fields', 'allrounder', NULL, 27),
(293, 'Risa Little', 'bowler', NULL, 27),
(294, 'Shafira Drake', 'bowler', NULL, 27),
(295, 'Wyatt Haney', 'bowler', NULL, 27),
(296, 'Kyra Vazquez', 'bowler', NULL, 27),
(297, 'Suki Sexton', 'bowler', NULL, 27),
(298, 'Clio Clayton', 'batsman', NULL, 28),
(299, 'Noah Sanford', 'batsman', NULL, 28),
(300, 'Margaret Mendez', 'batsman', NULL, 28),
(301, 'Oren Grimes', 'batsman', NULL, 28),
(302, 'Cade Grant', 'batsman', NULL, 28),
(303, 'Martin Fields', 'allrounder', NULL, 28),
(304, 'Risa Little', 'bowler', NULL, 28),
(305, 'Shafira Drake', 'bowler', NULL, 28),
(306, 'Wyatt Haney', 'bowler', NULL, 28),
(307, 'Kyra Vazquez', 'bowler', NULL, 28),
(308, 'Suki Sexton', 'bowler', NULL, 28),
(309, 'Alden Livingston', 'batsman', NULL, 29),
(310, 'Tana Oconnor', 'batsman', NULL, 29),
(311, 'Gary Burris', 'batsman', NULL, 29),
(312, 'Ignacia Chambers', 'batsman', NULL, 29),
(313, 'Tatiana Keller', 'batsman', NULL, 29),
(314, 'Luke Thomas', 'allrounder', NULL, 29),
(315, 'Galena Green', 'allrounder', NULL, 29),
(316, 'Grant Hobbs', 'allrounder', NULL, 29),
(317, 'Kyle Marshall', 'bowler', NULL, 29),
(318, 'Levi Weiss', 'bowler', NULL, 29),
(319, 'Hayfa Cline', 'bowler', NULL, 29),
(331, 'Emerald Simmons', 'batsman', '031255688778', 31),
(332, 'Emi Little', 'batsman', '03225688973', 31),
(333, 'Baxter Ferguson', 'batsman', '03112258989', 31),
(334, 'Vanna Shaffer', 'batsman', NULL, 31),
(335, 'Joseph Salas', 'batsman', NULL, 31),
(336, 'Camilla Chandler', 'allrounder', NULL, 31),
(337, 'Peter Blevins', 'allrounder', NULL, 31),
(338, 'Reece Frye', 'bowler', NULL, 31),
(339, 'Madaline Melendez', 'bowler', NULL, 31),
(340, 'Yardley Humphrey', 'bowler', NULL, 31),
(341, 'Lacy Morton', 'bowler', NULL, 31);

-- --------------------------------------------------------

--
-- Table structure for table `points_table`
--

CREATE TABLE `points_table` (
  `id` int(255) NOT NULL,
  `loosingPoints` varchar(255) NOT NULL,
  `winningPoints` varchar(255) NOT NULL,
  `team_ID` int(11) NOT NULL,
  `noOfMatches` varchar(255) NOT NULL,
  `run_rate` varchar(255) NOT NULL,
  `tied` varchar(255) NOT NULL,
  `points` varchar(255) NOT NULL,
  `tournament_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sponser`
--

CREATE TABLE `sponser` (
  `sponser_id` int(255) NOT NULL,
  `SponserName` varchar(255) NOT NULL,
  `SponserAmount` varchar(255) NOT NULL,
  `SponserEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponser`
--

INSERT INTO `sponser` (`sponser_id`, `SponserName`, `SponserAmount`, `SponserEmail`) VALUES
(4, 'Abc Traders', '150000', 'abctraders@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TeamId` int(255) NOT NULL,
  `TeamName` varchar(255) NOT NULL,
  `TeamLogo` varchar(255) NOT NULL,
  `CaptainName` varchar(255) NOT NULL,
  `CaptainEmail` varchar(255) DEFAULT NULL,
  `CaptainContactNo` varchar(255) NOT NULL,
  `tournamentID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TeamId`, `TeamName`, `TeamLogo`, `CaptainName`, `CaptainEmail`, `CaptainContactNo`, `tournamentID`) VALUES
(1, 'Jubilee Tiger', 'images/sindh.png', 'Salman Rafiq', NULL, '03122558011', NULL),
(3, 'Landi King', 'images/EEQ1DHWX4AAT_Ao-removebg-preview.png', 'Saad Ali', NULL, '03032795688', NULL),
(4, 'PECHS', 'images/hero_pi_about.jpg', 'Rehman', NULL, '03032795688', NULL),
(5, 'Carlos Orr', 'images/', 'Morgan Rose', NULL, 'Unde corporis nobis ', NULL),
(6, 'Carlos Orr', 'images/', 'Morgan Rose', NULL, 'Unde corporis nobis ', NULL),
(7, 'Zachary Mccormick', 'images/', 'Lars Cox', NULL, 'Praesentium sit vol', NULL),
(8, 'Kato Phelps', 'images/', 'Rose Velez', NULL, 'Ex quasi quia suscip', NULL),
(9, 'Kato Phelps', 'images/', 'Rose Velez', NULL, 'Ex quasi quia suscip', NULL),
(10, 'Holmes Hampton', 'images/', 'Bertha Obrien', NULL, 'Eu cupiditate fuga ', NULL),
(11, 'Holmes Hampton', 'images/', 'Bertha Obrien', NULL, 'Eu cupiditate fuga ', NULL),
(12, 'Anthony Boyle', 'images/', 'Dakota Nielsen', NULL, 'Consectetur libero ', NULL),
(13, 'Daryl Phillips', 'images/', 'Nigel Wooten', NULL, 'Facere sunt atque e', NULL),
(14, '', '../images/', '', NULL, '', NULL),
(15, '', '../images/', '', NULL, '', NULL),
(16, '', '../images/', '', NULL, '', NULL),
(17, 'Devin Banks', '../images/Generate_Certificate_1633360554550.jpg', 'Samson Wooten', NULL, 'Est qui rerum aut d', NULL),
(18, 'Vladimir Cooke', '../images/brand.png', 'Emery Sears', NULL, 'Enim deserunt beatae', NULL),
(19, 'Marshall Bishop', 'images/testing.gif', 'Claudia Whitley', NULL, 'Cum asperiores atque', NULL),
(20, 'Davis Rosario', 'images/brand.png', 'Chantale Simon', 'nuwunat@mailinator.com', 'Voluptate commodi es', NULL),
(21, 'Kenyon Davenport', 'images/kpk.png', 'Hayfa Fowler', 'synatice@mailinator.com', 'Itaque facilis qui t', NULL),
(22, 'Chancellor Henson', 'images/kpk.png', 'Felix Santana', 'japihiq@mailinator.com', 'Vitae veritatis omni', NULL),
(23, 'Xanthus Kelly', 'images/kpk.png', 'Christine Graham', 'zavodiqy@mailinator.com', 'Anim omnis veniam p', NULL),
(24, 'Amos Witt', 'images/kpk.png', 'Sonya Blankenship', 'tudacov@mailinator.com', 'Ut inventore dolores', NULL),
(25, 'Unity Sexton', '../images/', 'Kaden Allison', 'wewy@mailinator.com', 'Quis molestiae est a', NULL),
(26, 'Blaze Jacobson', '../images/kpk.png', 'Herrod Witt', 'didyboxeco@mailinator.com', 'Amet consectetur v', NULL),
(27, 'Asher Gardner', '../images/1234.png', 'Adam Jacobs', 'fa17bsse0032@maju.edu.pk', 'Voluptas eum dolor s', NULL),
(28, 'Asher Gardner', '../images/1234.png', 'Adam Jacobs', 'fa17bsse0032@maju.edu.pk', 'Voluptas eum dolor s', NULL),
(29, 'Kim Benjamin', '../images/kpklogo.png', 'Neil Hayes', 'fa17bsse0032@maju.edu.pk', 'Aliqua Sed odio qui', NULL),
(31, 'SRC Kings', '../images/kpklogo1.png', 'Salman Chottani', 'salmanchottani123@gmail.com', '03122558011', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id` int(255) NOT NULL,
  `tournamentName` varchar(255) NOT NULL,
  `tournamentStartDate` varchar(255) NOT NULL,
  `tournamentEndDate` varchar(255) NOT NULL,
  `noOfMatches` int(255) NOT NULL,
  `noOfTeams` int(255) NOT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `winningPrice` int(255) DEFAULT NULL,
  `overs` int(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tournament_fee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `tournamentName`, `tournamentStartDate`, `tournamentEndDate`, `noOfMatches`, `noOfTeams`, `venue`, `winningPrice`, `overs`, `status`, `tournament_fee`) VALUES
(1, 'Testing Tournament', '2021-12-21', '2021-12-31', 24, 8, 'KMC SPORTS COMPLEX', 25000, 10, 'active', 2000),
(2, 'Dacey Patel', '1978-02-21', '1979-06-14', 91, 10, 'Non quam ab aut volu', 22000, 8, 'active', 2000),
(3, 'Ramadan Tournament', '13/01/2022', '22/01/2022', 8, 6, 'Garden', 18000, 6, 'active', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_teams`
--

CREATE TABLE `tournament_teams` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id` int(255) NOT NULL,
  `tournamnet_id` int(255) NOT NULL,
  `team_id` int(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournament_teams`
--

INSERT INTO `tournament_teams` (`date`, `id`, `tournamnet_id`, `team_id`, `description`, `status`) VALUES
('2022-02-02', 1, 3, 3, NULL, 'payment'),
('2022-02-02', 2, 3, 17, NULL, 'pending'),
('2022-02-02', 4, 1, 4, NULL, 'pending'),
('2022-02-02', 5, 1, 1, NULL, 'success'),
('2022-02-02', 6, 1, 19, NULL, 'success'),
('2022-02-02', 7, 1, 20, NULL, 'pending'),
('2022-02-02', 8, 1, 5, NULL, 'pending'),
('2022-02-02', 9, 3, 17, NULL, 'pending'),
('2022-02-02', 10, 3, 3, NULL, 'pending'),
('2022-02-02', 12, 2, 10, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `created_date` date DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `re_type_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`created_date`, `id`, `fname`, `lname`, `email`, `password`, `re_type_pass`) VALUES
('2021-07-19', 1, 'salman', 'rafiq', 'salmanchottani123@gmail.com', 'salman', 'salman'),
('2021-07-19', 2, 'rehman', 'ali', 'rehman@gmail.com', 'admin', 'admin'),
('2021-07-27', 3, 'asad', 'adnan', 'asad@gmail.com', 'admin', 'admin'),
('2021-08-19', 4, 'ali', 'khan', 'aligmail.com', 'admin', 'admin'),
('2021-09-07', 5, 'hamza', 'akbar', 'hmx@gmail.com', 'admin', 'admin'),
('2021-09-07', 6, 'shoaib', 'aslam', 'shoaib@gmail.com', 'admin', 'admin'),
('2021-09-08', 7, 'salman', 'rafiq', 'salmanchottani@gmail.com', 'salman', 'salman'),
('2021-09-24', 8, '', '', '', '', ''),
('2021-09-24', 9, 'sadsa', 'ds', 'sa@gmial.com', 'dssds', 'sdssd'),
('2021-09-24', 10, 'dsf', 'sdfs', 'sqqw@gmial.com', 'fdsf', 'sdfsd'),
('2021-10-04', 11, 'Boris', 'Uriah', 'mobujulyh@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!'),
('2021-12-19', 12, '', 'Deborah Garcia', 'tifyg@mailinator.com', 'Pa$$w0rd!', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captain`
--
ALTER TABLE `captain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`fixtures_id`),
  ADD KEY `ground_id` (`ground_id`),
  ADD KEY `tournament_id` (`tournament_id`),
  ADD KEY `TeamA` (`TeamA`),
  ADD KEY `TeamB` (`TeamB`);

--
-- Indexes for table `ground`
--
ALTER TABLE `ground`
  ADD PRIMARY KEY (`ground_id`),
  ADD KEY `sponser_id` (`sponser_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournament_team_id` (`tournament_team_id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_ID` (`player_ID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`playerId`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `points_table`
--
ALTER TABLE `points_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_table_ibfk_1` (`team_ID`),
  ADD KEY `tournament_ID` (`tournament_ID`);

--
-- Indexes for table `sponser`
--
ALTER TABLE `sponser`
  ADD PRIMARY KEY (`sponser_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamId`),
  ADD KEY `tournamentID` (`tournamentID`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_teams`
--
ALTER TABLE `tournament_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournamnet_id` (`tournamnet_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captain`
--
ALTER TABLE `captain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `fixtures_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `playerId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `points_table`
--
ALTER TABLE `points_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponser`
--
ALTER TABLE `sponser`
  MODIFY `sponser_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TeamId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tournament_teams`
--
ALTER TABLE `tournament_teams`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `captain`
--
ALTER TABLE `captain`
  ADD CONSTRAINT `captain_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`TeamId`);

--
-- Constraints for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD CONSTRAINT `fixtures_ibfk_1` FOREIGN KEY (`ground_id`) REFERENCES `ground` (`ground_id`),
  ADD CONSTRAINT `fixtures_ibfk_2` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`id`),
  ADD CONSTRAINT `fixtures_ibfk_3` FOREIGN KEY (`TeamA`) REFERENCES `team` (`TeamId`),
  ADD CONSTRAINT `fixtures_ibfk_4` FOREIGN KEY (`TeamB`) REFERENCES `team` (`TeamId`);

--
-- Constraints for table `ground`
--
ALTER TABLE `ground`
  ADD CONSTRAINT `ground_ibfk_1` FOREIGN KEY (`sponser_id`) REFERENCES `sponser` (`sponser_id`);

--
-- Constraints for table `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  ADD CONSTRAINT `payment_confirmation_ibfk_1` FOREIGN KEY (`tournament_team_id`) REFERENCES `tournament_teams` (`id`);

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`player_ID`) REFERENCES `players` (`playerId`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`TeamId`);

--
-- Constraints for table `points_table`
--
ALTER TABLE `points_table`
  ADD CONSTRAINT `points_table_ibfk_1` FOREIGN KEY (`team_ID`) REFERENCES `team` (`TeamId`),
  ADD CONSTRAINT `points_table_ibfk_2` FOREIGN KEY (`tournament_ID`) REFERENCES `tournament` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`tournamentID`) REFERENCES `tournament` (`id`);

--
-- Constraints for table `tournament_teams`
--
ALTER TABLE `tournament_teams`
  ADD CONSTRAINT `tournament_teams_ibfk_1` FOREIGN KEY (`tournamnet_id`) REFERENCES `tournament` (`id`),
  ADD CONSTRAINT `tournament_teams_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`TeamId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
