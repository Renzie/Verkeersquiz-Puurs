-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: verkeersquiz.eu.mysql:3306
-- Generation Time: Jan 25, 2018 at 09:39 PM
-- Server version: 10.1.30-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `verkeersquiz_eu`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` longtext NOT NULL,
  `questionId` int(11) NOT NULL,
  `correct` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Question_idx` (`questionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `questionId`, `correct`) VALUES
(28, 'Juist', 37, b'1'),
(29, 'Juist', 30, b'1'),
(39, 'Juist', 49, b'1'),
(41, 'Juist', 49, b'1'),
(42, 'Juist', 51, b'1'),
(43, 'Juist', 51, b'1'),
(44, 'Juist', 52, b'1'),
(54, 'Juist', 56, b'1'),
(55, 'Juist', 56, b'1'),
(60, 'Juist', 72, b'1'),
(61, 'Juist', 72, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE IF NOT EXISTS `answer_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `awnserId` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Student_idx` (`userId`),
  KEY `Answer_idx` (`awnserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `answer_user`
--

INSERT INTO `answer_user` (`id`, `userId`, `awnserId`, `time`) VALUES
(1, 81, 29, '00:00:29'),
(5, 81, 28, '00:00:29'),
(6, 87, 55, '00:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Verkeersborden'),
(2, 'Situaties'),
(3, 'Allerlei');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `organisationId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `School_idx` (`organisationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `organisationId`) VALUES
(2, 'ICTC', 1),
(3, 'CCCP', 1),
(5, 'SSE', 1),
(6, 'vbs', 3),
(7, 'ddd', 3),
(8, 'deklas', 4);

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE IF NOT EXISTS `difficulty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `difficulty`
--

INSERT INTO `difficulty` (`id`, `difficulty`, `time`) VALUES
(1, 'Makkelijk', 30),
(2, 'Gemiddeld', 20),
(3, 'Moeilijk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'Maxime', 'password'),
(2, 'Renzie', '$2y$10$HxR/xDXO3.BlUuKGTuwwOuTsPsR0fHchcx.LrTUkI105l4qsXWtAy'),
(3, 'Arthur', '$2y$10$zHh3FtXoWLFkB2M4qWvbJ.MC13TJmVt6g4Bq.eCTXkVajfeJV3w9y');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `timestamp`, `message`) VALUES
(1, '2017-10-26 12:50:33', 'Test'),
(2, '2017-10-26 12:50:33', 'Test2'),
(3, '2017-10-26 12:50:33', 'Tets3'),
(4, '2017-10-26 12:50:33', 'Test4');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `name`, `extraInfo`) VALUES
(1, 'HoWest', ''),
(2, 'Vives', NULL),
(3, 'zerkegem', ''),
(4, 'blba', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `extraInfo`) VALUES
(1, 'HoWest', ''),
(2, 'Vives', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `imageLink` longtext,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Diff_idx` (`difficulty`),
  KEY `Cat_idx` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `difficulty`, `imageLink`, `category`) VALUES
(30, 'nieuwe vraag', 1, '', 2),
(37, 'Test', 1, '', 1),
(49, 'nieuwe extra vraag2', 1, '', 1),
(50, 'nieuwe extra vraag', 1, '', 1),
(51, 'nieuwe extra vraag', 1, '', 1),
(52, 'nieuwe extra vraag', 1, '', 1),
(56, 'best vraag', 1, 'imageQuestion_56.png', 1),
(72, 'nieuwe extra vraag2', 1, '', 1),
(74, 'nieuwe vraag', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `extraInfo` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `extraInfo`) VALUES
(9, 'Howest Quiz', 'Dit is een test quiz');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`quizId`,`questionId`),
  KEY `_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quizId`, `questionId`) VALUES
(9, 74);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_template`
--

CREATE TABLE IF NOT EXISTS `quiz_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `templatequizid` (`quizId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `template_department`
--

CREATE TABLE IF NOT EXISTS `template_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schemaId` int(11) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_idx` (`departmentId`),
  KEY `shema_idx` (`schemaId`),
  KEY `quizId` (`quizId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `template_question`
--

CREATE TABLE IF NOT EXISTS `template_question` (
  `templateId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`templateId`,`questionId`),
  KEY `question_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Class_idx` (`departmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `familyName`, `departmentId`) VALUES
(1, 'Arthur', 'Saprunov', 1),
(2, 'Renzie', 'Oma?a', 1),
(3, 'Maxime', 'Mylle', 1),
(4, 'Renzie', 'Omaña', 1),
(5, 'Renzie', 'Omaña', 1),
(6, 'Renzie', 'Omaña', 1),
(7, 'Renzie', 'Omaña', 1),
(8, 'Renzie', 'Omaña', 1),
(9, 'Renzie', 'Omaña', 1),
(10, 'Renzie', 'Omaña', 1),
(11, 'Renzie', 'Omaña', 1),
(12, 'Renzie', 'Omaña', 1),
(13, 'Renzie', 'Omaña', 1),
(14, 'Renzie', 'Omaña', 1),
(15, 'Renzie', 'Omaña', 1),
(16, 'Renzie', 'Omaña', 1),
(17, 'Renzie', 'Omaña', 1),
(18, 'Renzie', 'Omaña', 1),
(19, 'Renzie', 'Omaña', 1),
(20, 'Renzie', 'Omaña', 1),
(21, 'Renzie', 'Omaña', 1),
(22, 'Renzie', 'Omaña', 1),
(23, 'Renzie', 'Omaña', 1),
(24, 'Renzie', 'Omaña', 1),
(25, 'Renzie', 'Omaña', 1),
(26, 'Renzie', 'Omaña', 1),
(27, 'Renzie', 'Omaña', 1),
(28, 'Renzie', 'Omaña', 1),
(29, 'Renzie', 'Omaña', 1),
(30, 'Renzie', 'Omaña', 1),
(31, 'Renzie', 'Omaña', 1),
(32, 'Renzie', 'Omaña', 1),
(33, 'Renzie', 'Omaña', 1),
(34, 'Renzie', 'Omaña', 1),
(35, 'Renzie', 'Omaña', 1),
(36, 'Renzie', 'Omaña', 1),
(37, 'Renzie', 'Omaña', 1),
(38, 'Renzie', 'Omaña', 1),
(39, 'Renzie', 'Omaña', 1),
(40, 'Renzie', 'Omaña', 1),
(41, 'Renzie', 'Omaña', 1),
(42, 'Renzie', 'Omaña', 1),
(43, 'Renzie', 'Omaña', 1),
(44, 'Renzie', 'Omaña', 1),
(45, 'Renzie', 'Omaña', 1),
(46, 'Renzie', 'Omaña', 1),
(47, 'Renzie', 'Omaña', 1),
(48, 'Renzie', 'Omaña', 1),
(49, 'Renzie', 'Omaña', 1),
(50, 'Renzie', 'Omaña', 1),
(51, 'Renzie', 'Omaña', 1),
(52, 'Renzie', 'Omaña', 1),
(53, 'Renzie', 'Omaña', 1),
(54, 'Renzie', 'Omaña', 1),
(55, 'Renzie', 'Omaña', 1),
(56, 'Renzie', 'Omaña', 1),
(57, 'Renzie', 'Omaña', 1),
(58, 'Renzie', 'Omaña', 1),
(59, 'Renzie', 'Omaña', 1),
(60, 'Renzie', 'Omaña', 1),
(61, 'Renzie', 'Omaña', 1),
(62, 'Renzie', 'Omaña', 1),
(63, 'Renzie', 'Omaña', 1),
(64, 'Renzie', 'Omaña', 1),
(65, 'Renzie', 'Omaña', 1),
(66, 'Renzie', 'Omaña', 1),
(67, 'Renzie', 'Omaña', 1),
(68, 'Renzie', 'Omaña', 1),
(69, 'Renzie', 'Omaña', 1),
(70, 'Renzie', 'Omaña', 1),
(71, 'Renzie', 'Omaña', 1),
(72, 'Renzie', 'Omaña', 1),
(73, 'Renzie', 'Omaña', 1),
(74, 'Renzie', 'Omaña', 1),
(75, 'Renzie', 'Omaña', 1),
(76, 'Renzie', 'Omaña', 1),
(77, 'Renzie', 'Omaña', 1),
(78, 'Renzie', 'Omaña', 1),
(79, 'Renzie', 'Omaña', 1),
(80, 'Renzie', 'Omaña', 1),
(81, 'Maxime', 'Mylle', 5),
(82, 'Maxime', 'Mylle', 5),
(83, 'Maxime', 'Mylle', 6),
(84, 'Maxime', 'Mylle', 6),
(85, 'joske', 'vermeulen', 6),
(86, 'fff', 'dddd', 2),
(87, 'ee', 'ee', 2),
(88, 'ee', 'rrrr', 6),
(89, 'ee', 'rrrr', 2),
(90, 'ee', 'rrrr', 6),
(91, 'Arthur', 'Saprunov', 5),
(92, 'Arthur', 'Saprunov', 5),
(93, 'mm', 'gg', 8),
(94, 'zzz', 'rrr', 8),
(95, 'trzgtére', 'rrrrrr', 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD CONSTRAINT `Student` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `answer_user_ibfk_1` FOREIGN KEY (`awnserId`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `oragnisation` FOREIGN KEY (`organisationId`) REFERENCES `organisation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `Diff` FOREIGN KEY (`difficulty`) REFERENCES `difficulty` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Question_Cat` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_template`
--
ALTER TABLE `quiz_template`
  ADD CONSTRAINT `quiz_template_ibfk_1` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_department`
--
ALTER TABLE `template_department`
  ADD CONSTRAINT `department` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shema` FOREIGN KEY (`schemaId`) REFERENCES `quiz_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_department_ibfk_2` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_question`
--
ALTER TABLE `template_question`
  ADD CONSTRAINT `question` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_question_ibfk_1` FOREIGN KEY (`templateId`) REFERENCES `template_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
