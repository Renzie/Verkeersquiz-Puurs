-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2018 at 08:37 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `puurs`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `questionId` int(11) NOT NULL,
  `correct` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `questionId`, `correct`) VALUES
(19, 'Mag je op straat spelen', 5, b'0'),
(20, 'Mogen er geen zebrapaden gemarkeerd worden', 5, b'0'),
(21, 'Mag een fietser niet sneller dan 30 rijden', 5, b'1'),
(22, 'Dit is geen afbeelding van een verkeersbord', 6, b'0'),
(23, 'Dit duidt de voorrang aan bij het eerstvolgende kruispunt', 6, b'1'),
(24, 'Op deze weg moet je voorrang geven', 6, b'0'),
(25, 'Fietsers', 7, b'0'),
(26, 'Fietsers en bromfietsers A (geel plaatje)', 7, b'0'),
(27, 'Fietsers, bromfietsers A en bromfietsers B', 7, b'1'),
(28, 'new answer', 37, b'0'),
(29, 'new answer', 30, b'0'),
(39, 'new answer', 49, b'0'),
(41, 'new answer', 49, b'1'),
(42, 'new answer', 51, b'1'),
(43, 'new answer', 51, b'0'),
(44, 'new answer', 52, b'0'),
(45, 'niet juist ', 53, b'0'),
(46, 'niet juist', 53, b'0'),
(47, 'juist', 53, b'1'),
(48, 'juist', 54, b'1'),
(49, 'niet juist', 54, b'0'),
(50, 'niet juist', 54, b'0'),
(51, 'niet juist', 55, b'0'),
(52, 'juist', 55, b'1'),
(53, 'niet juist', 55, b'0'),
(54, 'onjuist', 56, b'0'),
(55, 'juist', 56, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE `answer_user` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `awnserId` int(11) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `organisationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `organisationId`) VALUES
(2, 'ICTC', 1),
(3, 'CCCP', 1),
(5, 'SSE', 1),
(6, 'vbs', 3),
(7, 'ddd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE `difficulty` (
  `id` int(11) NOT NULL,
  `difficulty` varchar(45) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `organisation` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `name`, `extraInfo`) VALUES
(1, 'HoWest', ''),
(2, 'Vives', NULL),
(3, 'zerkegem', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `imageLink` longtext,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `difficulty`, `imageLink`, `category`) VALUES
(5, 'In een Zone 30', 1, '', 3),
(6, 'Wat betekent dit bord', 1, 'imageQuestion_6.png', 3),
(7, 'Wie mag gebruik maken van een fietspad aangeduid met dit bord', 1, 'imageQuestion_7.png', 3),
(8, 'Je mag dit verbodsbord voorbij fietsen als', 1, 'imageQuestion_8.png', 3),
(29, 'nieuwe vraag', 1, '', NULL),
(30, 'nieuwe vraag', 1, '', 2),
(31, 'nieuwe vraag', 2, '', 1),
(33, 'aa', 1, '', 2),
(34, 'nieuwe vraag', 1, '', 2),
(35, 'nieuwe vraag', 1, '', 1),
(36, 'nieuwe vraag', 1, '', NULL),
(37, 'Test', 1, '', 1),
(49, 'nieuwe extra vraag2', 1, '', 1),
(50, 'nieuwe extra vraag', 1, '', 1),
(51, 'nieuwe extra vraag', 1, '', 1),
(52, 'nieuwe extra vraag', 1, '', 1),
(53, 'vraag 1 test test', 1, 'imageQuestion_53.png', 1),
(54, 'vraag 2', 1, '', 1),
(55, 'vraag 3', 2, 'imageQuestion_55.png', 1),
(56, 'best vraag', 1, 'imageQuestion_56.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `extraInfo` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `extraInfo`) VALUES
(1, 'Howest Quiz', 'de howest qui'),
(2, 'Test quiz 2', ''),
(3, 'mijn testqiuz', ''),
(4, 'aaa', ''),
(5, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quizId`, `questionId`) VALUES
(2, 0),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(6, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(2, 35),
(2, 36),
(1, 37),
(4, 53),
(4, 54),
(4, 55),
(5, 56);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_template`
--

CREATE TABLE `quiz_template` (
  `id` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_template`
--

INSERT INTO `quiz_template` (`id`, `quizId`, `name`, `template`) VALUES
(17, 1, 'Test', '{\"1\":{\"1\":\"0\",\"2\":\"1\",\"3\":\"0\"},\"2\":{\"1\":\"3\",\"2\":\"0\",\"3\":\"0\"},\"3\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"}}'),
(18, 1, 'bbbb', '{\"1\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"},\"2\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"},\"3\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"}}'),
(19, 3, 'testtemp', '{\"1\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"},\"2\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"},\"3\":{\"1\":\"4\",\"2\":\"0\",\"3\":\"0\"}}'),
(20, 4, '', '{\"1\":{\"1\":\"2\",\"2\":\"1\",\"3\":\"0\"},\"2\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"},\"3\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"}}'),
(21, 4, 'best temp evr', '{\"1\":{\"1\":\"2\",\"2\":\"1\",\"3\":\"0\"},\"2\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"},\"3\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"}}'),
(22, 5, 'temppppp', '{\"1\":{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\"},\"2\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"},\"3\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `template_department`
--

CREATE TABLE `template_department` (
  `id` int(11) NOT NULL,
  `schemaId` int(11) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  `quizId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_department`
--

INSERT INTO `template_department` (`id`, `schemaId`, `departmentId`, `quizId`) VALUES
(1, 18, 2, 1),
(4, 17, 2, 2),
(5, 18, 2, 1),
(6, 18, 2, 1),
(7, 18, 2, 1),
(8, 18, 2, 2),
(14, 17, 3, 1),
(15, 21, 6, 4),
(16, 22, 6, 5),
(17, 22, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `template_question`
--

CREATE TABLE `template_question` (
  `templateId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_question`
--

INSERT INTO `template_question` (`templateId`, `questionId`) VALUES
(1, 49),
(1, 50),
(14, 51),
(14, 52);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `departmentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(90, 'ee', 'rrrr', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Question_idx` (`questionId`);

--
-- Indexes for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Student_idx` (`userId`),
  ADD KEY `Answer_idx` (`awnserId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `School_idx` (`organisationId`);

--
-- Indexes for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Diff_idx` (`difficulty`),
  ADD KEY `Cat_idx` (`category`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`quizId`,`questionId`),
  ADD KEY `_idx` (`questionId`);

--
-- Indexes for table `quiz_template`
--
ALTER TABLE `quiz_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `templatequizid` (`quizId`);

--
-- Indexes for table `template_department`
--
ALTER TABLE `template_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_idx` (`departmentId`),
  ADD KEY `shema_idx` (`schemaId`),
  ADD KEY `quizId` (`quizId`);

--
-- Indexes for table `template_question`
--
ALTER TABLE `template_question`
  ADD PRIMARY KEY (`templateId`,`questionId`),
  ADD KEY `question_idx` (`questionId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Class_idx` (`departmentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `answer_user`
--
ALTER TABLE `answer_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quiz_template`
--
ALTER TABLE `quiz_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `template_department`
--
ALTER TABLE `template_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `QuestionForAwnser` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD CONSTRAINT `Answer` FOREIGN KEY (`awnserId`) REFERENCES `answer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Student` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `quiz_template`
--
ALTER TABLE `quiz_template`
  ADD CONSTRAINT `templatequizid` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `template_department`
--
ALTER TABLE `template_department`
  ADD CONSTRAINT `department` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shema` FOREIGN KEY (`schemaId`) REFERENCES `quiz_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_department_ibfk_1` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `template_question`
--
ALTER TABLE `template_question`
  ADD CONSTRAINT `question` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template` FOREIGN KEY (`templateId`) REFERENCES `template_department` (`id`);
