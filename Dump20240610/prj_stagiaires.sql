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
-- Table structure for table `stagiaires`
--

DROP TABLE IF EXISTS `stagiaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stagiaires` (
  `cin` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `genre` varchar(25) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `mdeb` varchar(5) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `ddn` varchar(50) DEFAULT NULL,
  `ddi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idx_cin` (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stagiaires`
--

LOCK TABLES `stagiaires` WRITE;
/*!40000 ALTER TABLE `stagiaires` DISABLE KEYS */;
INSERT INTO `stagiaires` VALUES ('1234567890123','Amina','Omar','Femme','+212 6-777-789',NULL,'Fès','1997-12-30','2024-06-09 18:10:01'),('1029384756123','Lina','Nabil','Femme','+212 6-444-111','16,99','Rabat','1996-08-18','2024-06-10 11:46:27'),('2039485761298','Karim','Othman','Homme','+212 6-777-333',NULL,'Tétouan','1994-06-12','2024-06-10 13:26:40'),('1003456789123','Fatima','Zahra','Femme','+212 6-555-123',NULL,'Agadir','1998-07-20','2024-06-10 13:26:43');
/*!40000 ALTER TABLE `stagiaires` ENABLE KEYS */;
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
