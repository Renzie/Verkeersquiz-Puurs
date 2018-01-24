-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: puurs
-- ------------------------------------------------------
-- Server version	5.7.9

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` longtext NOT NULL,
  `questionId` int(11) NOT NULL,
  `correct` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Question_idx` (`questionId`),
  CONSTRAINT `QuestionForAwnser` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (19,'Mag je op straat spelen',5,'\0'),(20,'Mogen er geen zebrapaden gemarkeerd worden',5,'\0'),(21,'Mag een fietser niet sneller dan 30 rijden',5,''),(22,'Dit is geen afbeelding van een verkeersbord',6,'\0'),(23,'Dit duidt de voorrang aan bij het eerstvolgende kruispunt',6,''),(24,'Op deze weg moet je voorrang geven',6,'\0'),(25,'Fietsers',7,'\0'),(26,'Fietsers en bromfietsers A (geel plaatje)',7,'\0'),(27,'Fietsers, bromfietsers A en bromfietsers B',7,''),(28,'new answer',37,'\0');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer_user`
--

DROP TABLE IF EXISTS `answer_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `awnserId` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Student_idx` (`userId`),
  KEY `Answer_idx` (`awnserId`),
  CONSTRAINT `Answer` FOREIGN KEY (`awnserId`) REFERENCES `answer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Student` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_user`
--

LOCK TABLES `answer_user` WRITE;
/*!40000 ALTER TABLE `answer_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `answer_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Verkeersborden'),(2,'Situaties'),(3,'Allerlei');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `organisationId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `School_idx` (`organisationId`),
  CONSTRAINT `oragnisation` FOREIGN KEY (`organisationId`) REFERENCES `organisation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (2,'ICTC',1),(3,'CCCP',1),(5,'SSE',1);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `difficulty`
--

DROP TABLE IF EXISTS `difficulty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `difficulty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `difficulty`
--

LOCK TABLES `difficulty` WRITE;
/*!40000 ALTER TABLE `difficulty` DISABLE KEYS */;
INSERT INTO `difficulty` VALUES (1,'Makkelijk',30),(2,'Gemiddeld',20),(3,'Moeilijk',0);
/*!40000 ALTER TABLE `difficulty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Maxime','password'),(2,'Renzie','$2y$10$HxR/xDXO3.BlUuKGTuwwOuTsPsR0fHchcx.LrTUkI105l4qsXWtAy'),(3,'Arthur','$2y$10$zHh3FtXoWLFkB2M4qWvbJ.MC13TJmVt6g4Bq.eCTXkVajfeJV3w9y');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'2017-10-26 12:50:33','Test'),(2,'2017-10-26 12:50:33','Test2'),(3,'2017-10-26 12:50:33','Tets3'),(4,'2017-10-26 12:50:33','Test4');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisation`
--

LOCK TABLES `organisation` WRITE;
/*!40000 ALTER TABLE `organisation` DISABLE KEYS */;
INSERT INTO `organisation` VALUES (1,'HoWest',''),(2,'Vives',NULL);
/*!40000 ALTER TABLE `organisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `imageLink` longtext,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Diff_idx` (`difficulty`),
  KEY `Cat_idx` (`category`),
  CONSTRAINT `Diff` FOREIGN KEY (`difficulty`) REFERENCES `difficulty` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Question_Cat` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (5,'In een Zone 30',1,'',3),(6,'Wat betekent dit bord',1,'imageQuestion_6.png',3),(7,'Wie mag gebruik maken van een fietspad aangeduid met dit bord',1,'imageQuestion_7.png',3),(8,'Je mag dit verbodsbord voorbij fietsen als',1,'imageQuestion_8.png',3),(29,'nieuwe vraag',1,'',NULL),(30,'nieuwe vraag',1,'',2),(31,'nieuwe vraag',2,'',1),(33,'aa',1,'',2),(34,'nieuwe vraag',1,'',2),(35,'nieuwe vraag',1,'',1),(36,'nieuwe vraag',1,'',NULL),(37,'Test',1,'',1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `extraInfo` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,'Howest Quiz','de howest qui'),(2,'Test quiz 2','');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_questions` (
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`quizId`,`questionId`),
  KEY `_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_questions`
--

LOCK TABLES `quiz_questions` WRITE;
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` VALUES (2,0),(3,5),(3,6),(3,7),(3,8),(3,9),(3,10),(6,29),(1,30),(1,31),(1,32),(1,33),(1,34),(2,35),(2,36),(1,37);
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_template`
--

DROP TABLE IF EXISTS `quiz_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `templatequizid` (`quizId`),
  CONSTRAINT `templatequizid` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_template`
--

LOCK TABLES `quiz_template` WRITE;
/*!40000 ALTER TABLE `quiz_template` DISABLE KEYS */;
INSERT INTO `quiz_template` VALUES (17,1,'Test','{\"1\":{\"1\":\"0\",\"2\":\"1\",\"3\":\"0\"},\"2\":{\"1\":\"3\",\"2\":\"0\",\"3\":\"0\"},\"3\":{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\"}}');
/*!40000 ALTER TABLE `quiz_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_department`
--

DROP TABLE IF EXISTS `template_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_department` (
  `id` int(11) NOT NULL,
  `shemaId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_idx` (`departmentId`),
  KEY `shema_idx` (`shemaId`),
  CONSTRAINT `department` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shema` FOREIGN KEY (`shemaId`) REFERENCES `quiz_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_department`
--

LOCK TABLES `template_department` WRITE;
/*!40000 ALTER TABLE `template_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `template_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_question`
--

DROP TABLE IF EXISTS `template_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_question` (
  `templateId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`templateId`,`questionId`),
  KEY `question_idx` (`questionId`),
  CONSTRAINT `question` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `template` FOREIGN KEY (`templateId`) REFERENCES `template_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_question`
--

LOCK TABLES `template_question` WRITE;
/*!40000 ALTER TABLE `template_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `template_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Class_idx` (`departmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Arthur','Saprunov',1),(2,'Renzie','Oma?a',1),(3,'Maxime','Mylle',1),(4,'Renzie','Omaña',1),(5,'Renzie','Omaña',1),(6,'Renzie','Omaña',1),(7,'Renzie','Omaña',1),(8,'Renzie','Omaña',1),(9,'Renzie','Omaña',1),(10,'Renzie','Omaña',1),(11,'Renzie','Omaña',1),(12,'Renzie','Omaña',1),(13,'Renzie','Omaña',1),(14,'Renzie','Omaña',1),(15,'Renzie','Omaña',1),(16,'Renzie','Omaña',1),(17,'Renzie','Omaña',1),(18,'Renzie','Omaña',1),(19,'Renzie','Omaña',1),(20,'Renzie','Omaña',1),(21,'Renzie','Omaña',1),(22,'Renzie','Omaña',1),(23,'Renzie','Omaña',1),(24,'Renzie','Omaña',1),(25,'Renzie','Omaña',1),(26,'Renzie','Omaña',1),(27,'Renzie','Omaña',1),(28,'Renzie','Omaña',1),(29,'Renzie','Omaña',1),(30,'Renzie','Omaña',1),(31,'Renzie','Omaña',1),(32,'Renzie','Omaña',1),(33,'Renzie','Omaña',1),(34,'Renzie','Omaña',1),(35,'Renzie','Omaña',1),(36,'Renzie','Omaña',1),(37,'Renzie','Omaña',1),(38,'Renzie','Omaña',1),(39,'Renzie','Omaña',1),(40,'Renzie','Omaña',1),(41,'Renzie','Omaña',1),(42,'Renzie','Omaña',1),(43,'Renzie','Omaña',1),(44,'Renzie','Omaña',1),(45,'Renzie','Omaña',1),(46,'Renzie','Omaña',1),(47,'Renzie','Omaña',1),(48,'Renzie','Omaña',1),(49,'Renzie','Omaña',1),(50,'Renzie','Omaña',1),(51,'Renzie','Omaña',1),(52,'Renzie','Omaña',1),(53,'Renzie','Omaña',1),(54,'Renzie','Omaña',1),(55,'Renzie','Omaña',1),(56,'Renzie','Omaña',1),(57,'Renzie','Omaña',1),(58,'Renzie','Omaña',1),(59,'Renzie','Omaña',1),(60,'Renzie','Omaña',1),(61,'Renzie','Omaña',1),(62,'Renzie','Omaña',1),(63,'Renzie','Omaña',1),(64,'Renzie','Omaña',1),(65,'Renzie','Omaña',1),(66,'Renzie','Omaña',1),(67,'Renzie','Omaña',1),(68,'Renzie','Omaña',1),(69,'Renzie','Omaña',1),(70,'Renzie','Omaña',1),(71,'Renzie','Omaña',1),(72,'Renzie','Omaña',1),(73,'Renzie','Omaña',1),(74,'Renzie','Omaña',1),(75,'Renzie','Omaña',1),(76,'Renzie','Omaña',1),(77,'Renzie','Omaña',1),(78,'Renzie','Omaña',1),(79,'Renzie','Omaña',1),(80,'Renzie','Omaña',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-24 13:55:03
