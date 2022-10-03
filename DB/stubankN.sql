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
  `foto` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES 
(1,'20220001','aaaaa','a','a','a',NULL,'1111111111','0001-01-01','a@a.com','a','400572ee10cf5e71c62843446802828a',3,'2022-09-04',1,0,0),
(2,'1234','aaaaa','a','a','a',NULL,'1111111111','0001-01-01','a@a.com','si','d252da3cdd35b2373a247a08de68c326',3,'2022-09-05',1,0,0),
(3,'321','aaaaa','isaac','si','si',NULL,'1111111111','0001-01-01','a@a.com','a','d252da3cdd35b2373a247a08de68c326',3,'2022-09-05',1,9931,0),
(4,'1111','aaaaa','a','a','a',NULL,'1','0002-02-02','a@a.com','a',NULL,3,'2022-09-12',1,0,0),
(5,'w','aaaaa','w','w','w','diagrama tachado.png','1','0001-01-01','a@a.com','w',NULL,3,'2022-09-18',1,0,0),
(6,'aa','aaaaa','aa','aa','aa','my-image.png','1','0001-01-01','a@a.com','aa',NULL,3,'2022-09-23',2,0,0),
(7,'99','aaaaa','99','99','99','99','99','0001-01-01','a@a.com','99','328bb19fb04d29e6661238ad40504a06',3,'2022-09-23',1,12,0);
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
  `foto` varchar(255) DEFAULT NULL,
  `telefono` text NOT NULL,
  `fecNac` date NOT NULL,
  `email` text NOT NULL,
  `curp` text NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rol` int NOT NULL DEFAULT '2',
  `fecInscrip` date DEFAULT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
INSERT INTO `trabajadores` VALUES 
(1,'2022AAAA','Administrador','0','0',NULL,'3141234567','2022-07-'07','administrador@ucol.mx','ADMI070707MCMXXXXX','2ac3510fc601c5b63a510ad408d41199',1,NULL,1),
(2,'2022AAAB','c','c','c',NULL,'1111111111','2022-08-03','a@a.com','si','d252da3cdd35b2373a247a08de68c326',1,NULL,1),
(3,'2022AAAC','Si','Si','Si',NULL,'1111111111','0001-01-01','a@a.com','aaaaaaaaaaa','766ed26431edaca1aeabf0b96712123c',2,NULL,1),
(4,'2022AAAD','kkk','kkk','kkk',NULL,'1111111111','0001-01-01','a@a.com','si','d252da3cdd35b2373a247a08de68c326',2,NULL,1),
(5,'2022AAAE','Carlos','Nolazco','Lagunas',NULL,'1111111111','0001-01-01','a@a.com','1','400572ee10cf5e71c62843446802828a',2,NULL,1),
(6,'a','a','a','a',NULL,'1111111111','0001-01-01','a@a.com','a',NULL,2,'2022-09-04',1),
(7,'q','q','q','q',NULL,'1111111111','0001-01-01','a@a.com','q','400572ee10cf5e71c62843446802828a',2,'2022-09-04',1),
(8,'1234','ba','a','a',NULL,'1111111111','0001-01-01','a@a.com','a','d252da3cdd35b2373a247a08de68c326',2,'2022-09-05',1),
(9,'5555','a','a','a',NULL,'1','0001-01-01','a@a.com','a','400572ee10cf5e71c62843446802828a',2,'2022-09-05',1),
(10,'1','1','1','1',NULL,'1','2007-10-10','a@a.com','1',NULL,2,'2022-09-11',1),
(11,'2','2','2','2',NULL,'2','0002-02-02','a@a.com','2',NULL,2,'2022-09-11',1),
(12,'aaaaa','a','a','a',NULL,'1','0001-01-01','a@a.com','a','3e5bd8749c6d5227097d504cc205327a',2,'2022-09-12',1),
(13,'u','u','u','u',NULL,'1','0001-01-01','a@a.com','u',NULL,2,'2022-09-17',1),
(14,'w','u','u','u',NULL,'1','0001-01-01','a@a.com','u',NULL,2,'2022-09-17',1),
(15,'s','s','s','s','','1','0001-01-01','a@a.com','s',NULL,2,'2022-09-17',1),
(16,'k','k','k','k','','1','0001-01-01','a@a.com','k',NULL,2,'2022-09-17',1),
(17,'f','f','f','f','','1','0001-01-01','a@a.com','f',NULL,2,'2022-09-17',1),
(18,'m','m','m','m','','1','0001-01-01','a@a.com','m',NULL,2,'2022-09-17',1),
(19,'x','x','x','x','','1','0001-01-01','a@a.com','x',NULL,2,'2022-09-18',1),
(20,'z','z','z','z','','1','0001-01-01','a@a.com','z',NULL,2,'2022-09-18',1),
(21,'g','g','g','g','','1','0001-01-01','a@a.com','g',NULL,2,'2022-09-18',1),
(22,'r','r','r','r','','1','0001-01-01','a@a.com','r','328bb19fb04d29e6661238ad40504a06',2,'2022-09-18',1),
(23,'v','v','v','v','WhatsApp Image 2022-09-18 at 12.15.41 AM.jpeg','1','0001-01-01','a@a.com','v',NULL,2,'2022-09-18',1),
(24,'b','b','b','b','login.jpg','1','0001-01-01','a@a.com','b',NULL,2,'2022-09-18',1),
(25, '070503', 'Ximena', 'Manzo', 'Castrejón', 'SadKuromi.jpg', '3143763333', '2003-05-07', 'xmanzo@ejemplo.com', 'MACX030507MCMXXXXX', 'b439fa89d982921d8dc85daebc658a87', 2, '2022-09-21', 1),
(26, '12345678', 'Dash', 'Enrique', 'Manzo', 'DSC_0630.JPG', '3141234567', '2018-06-29', 'dash@ejemplo.com', 'MACD180629HCMXXXXX', NULL, 2, '2022-09-21', 1);
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
  `cTramitador` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `solicitante` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cOrigen` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `cDestino` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mov`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones`
--

LOCK TABLES `transacciones` WRITE;
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
INSERT INTO `transacciones` VALUES 
(1,'aaaaa','321','Externo','321','Deposito',10000,'2022-09-23 18:12:19'),
(2,'aaaaa','321','Externo','321','Deposito',50,'2022-09-24 01:00:11'),
(3,'aaaaa','321','321','Externo','Retiro',30,'2022-09-24 01:02:22'),
(4,'321','321','321','99','Transferencia',77,'2022-09-24 14:59:48'),
(5,'321','321','321','99','Transferencia',12,'2022-09-24 15:07:45');
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

-- Dump completed on 2022-09-27 21:10:02
