-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: valorant_data
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'abdi','abdisuufi123@gmail.com','$2y$10$kXyfxSTCe35wmV2IgqLybOkxRfK2NFpn7uXT6wxWQ9G4LnRhqVrpi',100),(10,'abdis','abdisuufi1234@gmail.com','$2y$10$NSHC3XJp1UBB7O2sDEGeNOp1uwCOpVkp4eEimWGDwbyLKeFW74Gt2',0),(11,'abdisuufi','testing@admin.com','$2y$10$GmyRtnHjkPbgSHftf2F5p.j3RzaZWbXxhtjX8AFfpjsjRQiw6Dpxm',0),(12,'abdisuufi123','asdasd@gmail.com','$2y$10$cLbuwBH3msEQJayJpqugLOHirF8yfUPoj6CIgsIxzg9jk04RTmAfO',0),(13,'abdi123','abdisuufi123@gmail.com22','$2y$10$H8N8nEODJC6G41eFEi9mV.m.2xUzP2iqzubsb/SLJwUvTrlR7cz7W',0),(14,'Eesa','eesa@eesa.com','$2y$10$V/2E3WCmS69Af4wy8X74Vu4Abng4A6iKeRjd/rbfccARCXfL5JBx2',0),(15,'testingdb','testingdb@testingdb.com','$2y$10$66BKnJvddI/Md34hOfksaes7a440Nogv0r5fDqX1ek/ppiyFMi0t6',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valorant_weapon_spec`
--

DROP TABLE IF EXISTS `valorant_weapon_spec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valorant_weapon_spec` (
  `weapon` text,
  `Price` int DEFAULT NULL,
  `Fire_Rate` double DEFAULT NULL,
  `Damage_Head` int DEFAULT NULL,
  `Damage_Body` int DEFAULT NULL,
  `Damage_Leg` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valorant_weapon_spec`
--

LOCK TABLES `valorant_weapon_spec` WRITE;
/*!40000 ALTER TABLE `valorant_weapon_spec` DISABLE KEYS */;
INSERT INTO `valorant_weapon_spec` VALUES ('Classic',0,6.75,78,26,22),('Shorty',200,3.3,36,12,10),('Frenzy',400,10,78,26,22),('Ghost',500,6.75,105,33,26),('Sheriff',800,4,160,55,47),('Stinger',1000,18,67,27,23),('Spectre',1600,13.33,78,26,22),('Bucky',900,1.1,44,22,19),('Judge',1500,3.5,34,17,14),('Bulldog',2100,9.15,116,35,30),('Guardian',2700,6.5,195,65,49),('Phantom',2900,11,156,39,33),('Vandal',2900,9.25,156,39,33),('Marshal',1100,1.5,202,101,85),('Operator',4500,0.75,255,150,127),('Ares',1700,10,72,30,25),('Odin',3200,12,67,28,23);
/*!40000 ALTER TABLE `valorant_weapon_spec` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-27 10:18:58
