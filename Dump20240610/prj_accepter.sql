CREATE DATABASE  IF NOT EXISTS `prj` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `prj`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: prj
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accepter`
--

DROP TABLE IF EXISTS `accepter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accepter` (
  `cin` varchar(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ddn` date NOT NULL,
  `date_acceptation` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accepter`
--

LOCK TABLES `accepter` WRITE;
/*!40000 ALTER TABLE `accepter` DISABLE KEYS */;
INSERT INTO `accepter` VALUES ('1002345678912','Mohammed','Ahmed','Homme','+212 6-666-456','Tanger','2000-05-15','2024-06-08 17:46:17'),('1098765432101','Sara','Khalid','Femme','+212 6-999-890','Casablanca','2001-03-25','2024-06-08 17:49:48'),('1002345678912','Mohammed','Ahmed','Homme','+212 6-666-456','Tanger','2000-05-15','2024-06-08 18:25:16'),('1002345678912','Mohammed','Ahmed','Homme','+212 6-666-456','Tanger','2000-05-15','2024-06-09 18:10:51'),('1987654321098','Ahmed','Hassan','Homme','+212 6-333-222','Marrakech','1995-11-05','2024-06-10 12:17:48'),('4059678412098','Hassan','Ali','Homme','+212 6-888-999','Chefchaouen','1992-10-15','2024-06-10 13:24:00'),('5069784321156','Rim','Sami','Femme','+212 6-333-333','Casablanca','2005-10-30','2024-06-10 13:24:03'),('bbw','Nabaoui','Aymen','homme','0621766434512','Ain sebaa','2020-01-28','2024-06-10 13:25:56'),('test4433','Test','Aymen','homme','7612536521','Casablanca Ain sebaa','2015-11-09','2024-06-10 13:28:35');
/*!40000 ALTER TABLE `accepter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-10 14:32:24
