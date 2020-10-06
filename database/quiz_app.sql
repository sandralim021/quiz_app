-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 01:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin Lim', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choice_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `answer` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `choice`, `answer`) VALUES
(1, 1, 'largest railway station', 1),
(2, 1, 'highest railway station', 0),
(3, 1, 'longest railway station', 0),
(4, 1, 'None of the above', 0),
(5, 2, 'Behavior of human beings', 0),
(6, 2, 'Insects', 1),
(7, 2, 'The origin and history of technical and scientific terms', 0),
(8, 2, 'The formation of rocks', 0),
(9, 3, 'Asia', 0),
(10, 3, 'Africa', 1),
(11, 3, 'Europe', 0),
(12, 3, 'Australia', 0),
(13, 4, 'Junagarh, Gujarat', 0),
(14, 4, 'Diphu, Assam', 1),
(15, 4, 'Kohima, Nagaland', 0),
(16, 4, 'Gangtok, Sikkim', 0),
(17, 5, 'Physics and Chemistry', 0),
(18, 5, 'Physiology or Medicine', 0),
(19, 5, 'Literature, Peace and Economics', 0),
(20, 5, 'All of the above', 1),
(21, 6, '1850s', 0),
(22, 6, '1880s', 1),
(23, 6, '1930s', 0),
(24, 6, '1950s', 0),
(25, 7, 'Report', 0),
(26, 7, 'Field', 1),
(27, 7, 'Record', 0),
(28, 7, 'File', 0),
(29, 8, 'Order of Significance', 0),
(30, 8, 'Open Software', 0),
(31, 8, 'Operating System', 1),
(32, 8, 'Optical Sensor', 0),
(33, 9, '1850s', 0),
(34, 9, '1860s', 0),
(35, 9, '1870s', 0),
(36, 9, '1900s', 1),
(37, 10, 'Image file', 0),
(38, 10, 'Animation/movie file', 1),
(39, 10, 'Audio file', 0),
(40, 10, 'MS Office document', 0),
(41, 11, 'shape', 0),
(42, 11, 'area', 1),
(43, 11, 'baring', 0),
(44, 11, 'distance', 0),
(45, 12, 'zones of climate', 1),
(46, 12, 'zones of oceans', 0),
(47, 12, 'zones of land', 0),
(48, 12, 'zones of cyclonic depressions', 0),
(49, 13, 'larger, more', 1),
(50, 13, 'larger, less', 0),
(51, 13, 'smaller, more', 0),
(52, 13, 'smaller, less', 0),
(53, 14, 'deterioration of electronic circuits', 0),
(54, 14, 'damage of solar cells of spacecraft', 0),
(55, 14, 'adverse effect on living organisms', 0),
(56, 14, 'All of the above', 1),
(57, 15, 'Canada', 0),
(58, 15, 'West Africa', 0),
(59, 15, 'Australia', 1),
(60, 15, 'North America', 0);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `user_id`, `topic_id`, `correct`, `wrong`, `date`, `time`) VALUES
(1, 1, 1, 4, 1, '2020-10-06', '18:30:16'),
(2, 2, 1, 3, 2, '2020-10-06', '18:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `topic_id`, `question`) VALUES
(1, 1, 'Grand Central Terminal, Park Avenue, New York is the world\'s'),
(2, 1, 'Entomology is the science that studies'),
(3, 1, 'Eritrea, which became the 182nd member of the UN in 1993, is in the continent of'),
(4, 1, 'Garampani sanctuary is located at'),
(5, 1, 'For which of the following disciplines is Nobel Prize awarded?'),
(6, 2, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?'),
(7, 2, 'What is part of a database that holds only one type of information?'),
(8, 2, '\'OS\' computer abbreviation usually means ?'),
(9, 2, 'In which decade with the first transatlantic radio broadcast occur?'),
(10, 2, '\'.MOV\' extension refers usually to what kind of file?'),
(11, 3, 'The Homolographic projection has the correct representation of'),
(12, 3, 'The latitudinal differences in pressure delineate a number of major pressure zones, which correspond with'),
(13, 3, 'The higher the wind speed and the longer the fetch or distance of open water across which the wind blows and waves travel, the ____ waves and the ____ energy they process.'),
(14, 3, 'The hazards of radiation belts include'),
(15, 3, 'The great Victoria Desert is located in');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `score_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `user_id`, `topic_id`, `correct`, `wrong`) VALUES
(1, 1, 1, 4, 1),
(2, 2, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `session_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `topic_id`, `question_id`, `session_status`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 1),
(3, 1, 1, 3, 1),
(4, 1, 1, 4, 1),
(5, 1, 1, 5, 1),
(6, 2, 1, 1, 1),
(7, 2, 1, 2, 1),
(8, 2, 1, 3, 1),
(9, 2, 1, 4, 1),
(10, 2, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `topic_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_status`) VALUES
(1, 'General Knowledge', 'active'),
(2, 'Technology', 'active'),
(3, 'World Geography', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Carl Reyes', 'carl@gmail.com', '72762cc17009d24ba59beca9d090ba28'),
(2, 'Zane Montefalco', 'zane@gmail.com', '193f33f4411be4136da3bae335afb55d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `UNIQUE` (`topic_name`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
