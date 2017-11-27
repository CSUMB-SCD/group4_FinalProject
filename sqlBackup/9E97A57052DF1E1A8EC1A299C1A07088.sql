-- MySQL dump 10.13  Distrib 5.6.36, for Linux (x86_64)
--
-- Host: localhost    Database: heroku_b2e68739923e353
-- ------------------------------------------------------
-- Server version	5.6.36-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adminID` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(42) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'adminOne','123qwe','pemmons@csumb.edu','philemmons');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_people`
--

DROP TABLE IF EXISTS `movie_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_people` (
  `personID` int(11) NOT NULL,
  `firstName` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `roleID` int(10) DEFAULT NULL,
  PRIMARY KEY (`personID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_people`
--

LOCK TABLES `movie_people` WRITE;
/*!40000 ALTER TABLE `movie_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_search`
--

DROP TABLE IF EXISTS `movie_search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_search` (
  `movieID` int(10) NOT NULL,
  `userID` int(10) DEFAULT NULL,
  `upVote` int(10) DEFAULT NULL,
  `dateSearch` datetime DEFAULT NULL,
  `searchRank` int(10) DEFAULT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_search`
--

LOCK TABLES `movie_search` WRITE;
/*!40000 ALTER TABLE `movie_search` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_prediction`
--

DROP TABLE IF EXISTS `my_prediction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_prediction` (
  `myPreID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(10) DEFAULT NULL,
  `rank` int(10) DEFAULT NULL,
  `actorID` int(10) DEFAULT NULL,
  `actressID` int(10) DEFAULT NULL,
  `directorID` int(10) DEFAULT NULL,
  `movieID` int(10) DEFAULT NULL,
  `dateSearch` datetime DEFAULT NULL,
  PRIMARY KEY (`myPreID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_prediction`
--

LOCK TABLES `my_prediction` WRITE;
/*!40000 ALTER TABLE `my_prediction` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_prediction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `normalize_db`
--

DROP TABLE IF EXISTS `normalize_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `normalize_db` (
  `predictionID` int(11) NOT NULL,
  `pred_result` double(10,0) DEFAULT NULL,
  PRIMARY KEY (`predictionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `normalize_db`
--

LOCK TABLES `normalize_db` WRITE;
/*!40000 ALTER TABLE `normalize_db` DISABLE KEYS */;
/*!40000 ALTER TABLE `normalize_db` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `open_table`
--

DROP TABLE IF EXISTS `open_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `open_table` (
  `userID` int(11) NOT NULL,
  `userCount` int(10) DEFAULT NULL,
  `wordLength` double(10,0) DEFAULT NULL,
  `wordList` varchar(40) DEFAULT NULL,
  `replaceWord` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `open_table`
--

LOCK TABLES `open_table` WRITE;
/*!40000 ALTER TABLE `open_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `open_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

-- Dump completed on 2017-11-06  7:51:46
