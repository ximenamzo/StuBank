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
  `nEjecutivo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellidoP` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellidoM` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
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
INSERT INTO `clientes` VALUES (1,'20220001','aaaaa','a','a','a','20220001','1111111111','0001-01-01','a@a.com','a','400572ee10cf5e71c62843446802828a',3,'2022-09-04',1,20,1445134314.15),(2,'1234','aaaaa','a','a','a',NULL,'1111111111','0001-01-01','a@a.com','si','d252da3cdd35b2373a247a08de68c326',3,'2022-09-05',1,0,100),(3,'321','aaaaa','isaac','si','si',NULL,'1111111111','0001-01-01','a@a.com','a','d252da3cdd35b2373a247a08de68c326',3,'2022-09-05',1,9931,0),(4,'1111','aaaaa','a','a','a',NULL,'1','0002-02-02','a@a.com','a',NULL,3,'2022-09-12',1,1,0),(5,'w','aaaaa','w','w','w','diagrama tachado.png','1','0001-01-01','a@a.com','w',NULL,3,'2022-09-18',1,100,129.5),(6,'aa','aaaaa','aa','aa','aa','my-image.png','1','0001-01-01','a@a.com','aa',NULL,3,'2022-09-23',2,0,0),(7,'99','aaaaa','99','99','99','99','99','0001-01-01','a@a.com','99','328bb19fb04d29e6661238ad40504a06',3,'2022-09-23',1,1505,25);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestamos` (
  `id_prest` int NOT NULL AUTO_INCREMENT,
  `solicitanteEje` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `solicitanteCl` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` double NOT NULL,
  `meses` int NOT NULL,
  `deuda` double NOT NULL,
  `metodo` tinyint NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` int NOT NULL,
  PRIMARY KEY (`id_prest`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamos`
--

LOCK TABLES `prestamos` WRITE;
/*!40000 ALTER TABLE `prestamos` DISABLE KEYS */;
INSERT INTO `prestamos` VALUES (1,'aaaaa','20220001',100,1,100,0,'2022-10-02 19:43:36',2),(2,'aaaaa','1234',100,3,100,0,'2022-10-04 07:09:01',3),(3,'aaaaa','',10,1,10.5,2,'2022-10-09 16:45:59',2),(4,'aaaaa','w',100,10,129.5,2,'2022-10-09 16:47:25',2),(5,'aaaaa','20220001',1000,12,1353.96,1,'2022-10-09 17:19:14',2),(6,'aaaaa','20220001',1000000,12,1353904.92,1,'2022-10-09 17:24:04',2),(7,'aaaaa','20220001',1000000000,15,1445134314.15,1,'2022-10-09 17:28:54',2),(8,'aaaaa','99',500,12,676.92,2,'2022-10-09 20:43:50',2),(9,'aaaaa','99',1,12,1.32,1,'2022-10-09 21:11:11',2),(10,'aaaaa','99',1000,12,1353.96,2,'2022-10-09 22:13:52',2),(11,'aaaaa','99',500,12,676.92,2,'2022-10-09 22:21:21',2),(12,'aaaaa','99',5,100,25,2,'2022-10-10 10:39:41',2);
/*!40000 ALTER TABLE `prestamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajadores` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nCuenta` text COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_general_ci NOT NULL,
  `apellidoP` text COLLATE utf8mb4_general_ci NOT NULL,
  `apellidoM` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecNac` date NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `curp` text COLLATE utf8mb4_general_ci NOT NULL,
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
INSERT INTO `trabajadores` VALUES (1,'2022AAAA','Carlos','Nolazco','Lagunas',NULL,'3141737914','2003-04-15','cnolazco@ucol.mx','NOLC030415HCMLGRA2','2ac3510fc601c5b63a510ad408d41199',1,NULL,1),(2,'2022AAAB','c','c','c',NULL,'1111111111','2022-08-03','a@a.com','si','d252da3cdd35b2373a247a08de68c326',1,NULL,1),(3,'2022AAAC','Si','Si','Si','2022AAAC','1111111111','0001-01-01','a@a.com','aaaaaaaaaaa','766ed26431edaca1aeabf0b96712123c',2,NULL,2),(4,'2022AAAD','kkk','kkk','kkk',NULL,'1111111111','0001-01-01','a@a.com','si','d252da3cdd35b2373a247a08de68c326',2,NULL,2),(5,'2022AAAE','Carlos','Nolazco','Lagunas',NULL,'1111111111','0001-01-01','a@a.com','1','400572ee10cf5e71c62843446802828a',2,NULL,2),(6,'a','a','a','a',NULL,'1111111111','0001-01-01','a@a.com','a',NULL,2,'2022-09-04',2),(7,'q','q','q','q',NULL,'1111111111','0001-01-01','a@a.com','q','400572ee10cf5e71c62843446802828a',2,'2022-09-04',2),(8,'1234','ba','a','a',NULL,'1111111111','0001-01-01','a@a.com','a','d252da3cdd35b2373a247a08de68c326',2,'2022-09-05',2),(9,'5555','a','a','a',NULL,'1','0001-01-01','a@a.com','a','400572ee10cf5e71c62843446802828a',2,'2022-09-05',2),(10,'1','1','1','1',NULL,'1','2007-10-10','a@a.com','1',NULL,2,'2022-09-11',2),(11,'2','2','2','2',NULL,'2','0002-02-02','a@a.com','2',NULL,2,'2022-09-11',2),(12,'aaaaa','a','a','a',NULL,'1','0001-01-01','a@a.com','a','3e5bd8749c6d5227097d504cc205327a',2,'2022-09-12',1),(13,'u','u','u','u',NULL,'1','0001-01-01','a@a.com','u',NULL,2,'2022-09-17',2),(14,'w','u','u','u',NULL,'1','0001-01-01','a@a.com','u',NULL,2,'2022-09-17',2),(15,'s','s','s','s','','1','0001-01-01','a@a.com','s',NULL,2,'2022-09-17',2),(16,'k','k','k','k','','1','0001-01-01','a@a.com','k',NULL,2,'2022-09-17',2),(17,'f','f','f','f','','1','0001-01-01','a@a.com','f',NULL,2,'2022-09-17',2),(18,'m','m','m','m','','1','0001-01-01','a@a.com','m',NULL,2,'2022-09-17',2),(19,'x','x','x','x','','1','0001-01-01','a@a.com','x',NULL,2,'2022-09-18',2),(20,'z','z','z','z','','1','0001-01-01','a@a.com','z',NULL,2,'2022-09-18',2),(21,'g','g','g','g','','1','0001-01-01','a@a.com','g',NULL,2,'2022-09-18',2),(22,'r','r','r','r','','1','0001-01-01','a@a.com','r','328bb19fb04d29e6661238ad40504a06',2,'2022-09-18',2),(23,'v','v','v','v','WhatsApp Image 2022-09-18 at 12.15.41 AM.jpeg','1','0001-01-01','a@a.com','v',NULL,2,'2022-09-18',2),(24,'b','b','b','b','login.jpg','1','0001-01-01','a@a.com','b',NULL,2,'2022-09-18',2),(25,'o','o','o','o','o','1','0001-01-01','a@a.com','o',NULL,2,'2022-09-22',2),(26,'l','l','l','l','my-image.png','1','0001-01-01','a@a.com','l',NULL,2,'2022-09-22',2),(27,'h','h','h','h','WEBSITES page 1.pdf','1','0001-01-01','a@a.com','h',NULL,2,'2022-09-22',2),(28,'y','y','y','y','WEBSITES page 1.pdf','1','0001-01-01','a@a.com','y',NULL,2,'2022-09-22',2),(29,'i','i','i','i','Pokemon_Esmeralda_Espanol.sav','1','0001-01-01','a@a.com','i',NULL,2,'2022-09-22',2),(30,'e','e','e','e','e','1','0001-01-01','a@a.com','e',NULL,2,'2022-09-22',2),(31,'ooooo','oooo','oooo','oooo','ooooo','1','0009-01-01','a@a.com','o',NULL,2,'2022-09-22',2),(32,'si','si','si','si','si','1','0001-01-01','a@a.com','si',NULL,2,'2022-09-23',2),(33,'ma','ma','ma','ma','ma','1','0001-01-01','a@a.com','ma',NULL,2,'2022-09-23',2);
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
  `cTramitador` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `solicitante` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cOrigen` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cDestino` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mov`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones`
--

LOCK TABLES `transacciones` WRITE;
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
INSERT INTO `transacciones` VALUES (1,'aaaaa','321','Externo','321','Deposito',10000,'2022-09-23 18:12:19'),(2,'aaaaa','321','Externo','321','Deposito',50,'2022-09-24 01:00:11'),(3,'aaaaa','321','321','Externo','Retiro',30,'2022-09-24 01:02:22'),(4,'321','321','321','99','Transferencia',77,'2022-09-24 14:59:48'),(5,'321','321','321','99','Transferencia',12,'2022-09-24 15:07:45'),(6,'99','99','99','1111','Transferencia',1,'2022-10-02 14:36:15'),(7,'aaaaa',NULL,'Externo','99','Deposito',10000,'2022-10-02 14:43:46'),(8,'aaaaa',NULL,'Externo','20220001','Deposito',20,'2022-10-02 19:10:00'),(9,'aaaaa','99','Banco','99','Prestamo',500,'2022-10-09 21:07:19'),(10,'aaaaa','99','Banco','Externo','Prestamo',1,'2022-10-09 21:11:18'),(11,'aaaaa','99','Banco','99','Prestamo',1000,'2022-10-09 22:14:15'),(12,'aaaaa','99','Banco','99','Prestamo',500,'2022-10-09 22:21:29'),(13,'aaaaa','99','Banco','99','Prestamo',5,'2022-10-10 10:40:17');
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

-- Dump completed on 2022-10-12 20:58:05
