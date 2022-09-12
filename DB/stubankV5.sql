-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: stubank
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nCuenta` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nEjecutivo` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellidoP` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellidoM` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecNac` date NOT NULL,
  `email` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `curp` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `rol` int NOT NULL DEFAULT '3',
  `fecInscrip` date NOT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  `saldo` double NOT NULL DEFAULT '0',
  `deuda` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'20220001','aaaaa','a','a','a','1111111111','0001-01-01','a@a.com','a','400572ee10cf5e71c62843446802828a',3,'2022-09-04',1,0,0),(2,'1234','aaaaa','a','a','a','1111111111','0001-01-01','a@a.com','si','d252da3cdd35b2373a247a08de68c326',3,'2022-09-05',1,0,0),(3,'321','aaaaa','isaac','si','si','1111111111','0001-01-01','a@a.com','a','d252da3cdd35b2373a247a08de68c326',3,'2022-09-05',1,0,0),(4,'1111','aaaaa','a','a','a','1','0002-02-02','a@a.com','a',NULL,3,'2022-09-12',2,0,0);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajadores` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nCuenta` text NOT NULL,
  `nombre` text NOT NULL,
  `apelldoP` text NOT NULL,
  `apellidoM` text NOT NULL,
  `telefono` text NOT NULL,
  `fecNac` date NOT NULL,
  `email` text NOT NULL,
  `curp` text NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rol` int NOT NULL DEFAULT '2',
  `fecInscrip` date DEFAULT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
INSERT INTO `trabajadores` VALUES (1,'2022AAAA','Carlos','Nolazco','Lagunas','3141737914','2003-04-15','cnolazco@ucol.mx','NOLC030415HCMLGRA2','2ac3510fc601c5b63a510ad408d41199',1,NULL,1),(2,'2022AAAB','c','c','c','1111111111','2022-08-03','a@a.com','si','d252da3cdd35b2373a247a08de68c326',1,NULL,1),(3,'2022AAAC','Si','Si','Si','1111111111','0001-01-01','a@a.com','aaaaaaaaaaa','766ed26431edaca1aeabf0b96712123c',2,NULL,1),(4,'2022AAAD','kkk','kkk','kkk','1111111111','0001-01-01','a@a.com','si','d252da3cdd35b2373a247a08de68c326',2,NULL,1),(5,'2022AAAE','Carlos','Nolazco','Lagunas','1111111111','0001-01-01','a@a.com','1','400572ee10cf5e71c62843446802828a',2,NULL,1),(6,'a','a','a','a','1111111111','0001-01-01','a@a.com','a',NULL,2,'2022-09-04',1),(7,'q','q','q','q','1111111111','0001-01-01','a@a.com','q','400572ee10cf5e71c62843446802828a',2,'2022-09-04',1),(8,'1234','ba','a','a','1111111111','0001-01-01','a@a.com','a','d252da3cdd35b2373a247a08de68c326',2,'2022-09-05',1),(9,'5555','a','a','a','1','0001-01-01','a@a.com','a','400572ee10cf5e71c62843446802828a',2,'2022-09-05',1),(10,'1','1','1','1','1','2007-10-10','a@a.com','1',NULL,2,'2022-09-11',1),(11,'2','2','2','2','2','0002-02-02','a@a.com','2',NULL,2,'2022-09-11',1),(12,'aaaaa','a','a','a','1','0001-01-01','a@a.com','a','3e5bd8749c6d5227097d504cc205327a',1,'2022-09-12',1);
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacciones`
--

DROP TABLE IF EXISTS `transacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transacciones` (
  `id_mov` int NOT NULL AUTO_INCREMENT,
  `cuentaCliente` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_mov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones`
--

LOCK TABLES `transacciones` WRITE;
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `transacciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-12  9:46:41
