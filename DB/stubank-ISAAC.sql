-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2022 at 04:41 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stubank`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL,
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
  `deuda` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nCuenta`, `nEjecutivo`, `nombre`, `apellidoP`, `apellidoM`, `foto`, `telefono`, `fecNac`, `email`, `curp`, `password`, `rol`, `fecInscrip`, `estatus`, `saldo`, `deuda`) VALUES
(1, '20220001', 'aaaaa', 'a', 'a', 'a', NULL, '1111111111', '0001-01-01', 'a@a.com', 'a', '400572ee10cf5e71c62843446802828a', 3, '2022-09-04', 1, 0, 0),
(2, '1234', 'aaaaa', 'a', 'a', 'a', NULL, '1111111111', '0001-01-01', 'a@a.com', 'si', 'd252da3cdd35b2373a247a08de68c326', 3, '2022-09-05', 1, 0, 0),
(3, '321', 'aaaaa', 'isaac', 'si', 'si', NULL, '1111111111', '0001-01-01', 'a@a.com', 'a', 'd252da3cdd35b2373a247a08de68c326', 3, '2022-09-05', 1, 0, 0),
(4, '1111', 'aaaaa', 'a', 'a', 'a', NULL, '1', '0002-02-02', 'a@a.com', 'a', NULL, 3, '2022-09-12', 1, 0, 0),
(5, 'w', 'aaaaa', 'w', 'w', 'w', 'diagrama tachado.png', '1', '0001-01-01', 'a@a.com', 'w', NULL, 3, '2022-09-18', 1, 0, 0),
(6, '54321', 'aaaaa', 'Prueba', 'Pérez', 'Gómez', 'DSC_0627.JPG', '3140000000', '2001-01-01', 'ejemplo@email.com', 'PEGP010101MCMNSMA3', 'b439fa89d982921d8dc85daebc658a87', 3, '2022-09-20', 1, 0, 0),
(7, '31416', '070503', 'Nombre', 'Apepa', 'Apema', '4-49875_isolated-watercolor-bee-on-white-background-watercolor-painting.png', '3141234567', '2003-02-01', 'email@email.com', 'XXXX121212MCMXXXXX', NULL, 3, '2022-09-22', 1, 0, 0),
(8, '20181706', '20181705', 'Valentin', 'Murillo', 'Lopez', 'ac18b333b129b9e9a111ba22d888df42.jpg', '3141614579', '2002-12-23', 'ilopez23@ucol.mx', 'LOMI23', '25deef3bae299707e8f860c8320cb012', 3, '2022-09-22', 1, 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamos` int NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `cantidad` int NOT NULL,
  `meses` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`id_prestamos`, `nombreCliente`, `cantidad`, `meses`) VALUES
(2, 'Valentin', 900, 12);

-- --------------------------------------------------------

--
-- Table structure for table `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_user` int NOT NULL,
  `nCuenta` text COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_general_ci NOT NULL,
  `apelldoP` text COLLATE utf8mb4_general_ci NOT NULL,
  `apellidoM` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecNac` date NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `curp` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rol` int NOT NULL DEFAULT '2',
  `fecInscrip` date DEFAULT NULL,
  `estatus` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trabajadores`
--

INSERT INTO `trabajadores` (`id_user`, `nCuenta`, `nombre`, `apelldoP`, `apellidoM`, `foto`, `telefono`, `fecNac`, `email`, `curp`, `password`, `rol`, `fecInscrip`, `estatus`) VALUES
(1, '2022AAAA', 'Carlos', 'Nolazco', 'Lagunas', NULL, '3141737914', '2003-04-15', 'cnolazco@ucol.mx', 'NOLC030415HCMLGRA2', '2ac3510fc601c5b63a510ad408d41199', 1, NULL, 1),
(2, '2022AAAB', 'c', 'c', 'c', NULL, '1111111111', '2022-08-03', 'a@a.com', 'si', 'd252da3cdd35b2373a247a08de68c326', 1, NULL, 1),
(3, '2022AAAC', 'Si', 'Si', 'Si', NULL, '1111111111', '0001-01-01', 'a@a.com', 'aaaaaaaaaaa', '766ed26431edaca1aeabf0b96712123c', 2, NULL, 1),
(4, '2022AAAD', 'kkk', 'kkk', 'kkk', NULL, '1111111111', '0001-01-01', 'a@a.com', 'si', 'd252da3cdd35b2373a247a08de68c326', 2, NULL, 1),
(5, '2022AAAE', 'Carlos', 'Nolazco', 'Lagunas', NULL, '1111111111', '0001-01-01', 'a@a.com', '1', '400572ee10cf5e71c62843446802828a', 2, NULL, 1),
(6, 'a', 'a', 'a', 'a', NULL, '1111111111', '0001-01-01', 'a@a.com', 'a', NULL, 2, '2022-09-04', 1),
(7, 'q', 'q', 'q', 'q', NULL, '1111111111', '0001-01-01', 'a@a.com', 'q', '400572ee10cf5e71c62843446802828a', 2, '2022-09-04', 1),
(8, '1234', 'ba', 'a', 'a', NULL, '1111111111', '0001-01-01', 'a@a.com', 'a', 'd252da3cdd35b2373a247a08de68c326', 2, '2022-09-05', 1),
(9, '5555', 'a', 'a', 'a', NULL, '1', '0001-01-01', 'a@a.com', 'a', '400572ee10cf5e71c62843446802828a', 2, '2022-09-05', 1),
(10, '1', '1', '1', '1', NULL, '1', '2007-10-10', 'a@a.com', '1', NULL, 2, '2022-09-11', 1),
(11, '2', '2', '2', '2', NULL, '2', '0002-02-02', 'a@a.com', '2', NULL, 2, '2022-09-11', 1),
(23, 'v', 'v', 'v', 'v', 'WhatsApp Image 2022-09-18 at 12.15.41 AM.jpeg', '1', '0001-01-01', 'a@a.com', 'v', NULL, 2, '2022-09-18', 1),
(24, 'b', 'b', 'b', 'b', 'login.jpg', '1', '0001-01-01', 'a@a.com', 'b', NULL, 2, '2022-09-18', 1),
(25, '070503', 'Ximena', 'Manzo', 'Castrejón', 'SadKuromi.jpg', '3143763333', '2003-05-07', 'xmanzo@ejemplo.com', 'MACX030507MCMXXXXX', 'b439fa89d982921d8dc85daebc658a87', 2, '2022-09-21', 1),
(26, '12345678', 'Dash', 'Enrique', 'Manzo', 'DSC_0630.JPG', '3141234567', '2018-06-29', 'dash@ejemplo.com', 'MACD180629HCMXXXXX', NULL, 2, '2022-09-21', 1),
(27, '20181705', 'isaac', 'lopez', 'murillo', NULL, '3141614579', '2002-12-23', 'ilopez21@ucol.mx', 'LOMI', '25deef3bae299707e8f860c8320cb012', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transacciones`
--

CREATE TABLE `transacciones` (
  `id_mov` int NOT NULL,
  `cTramitador` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cOrigen` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cDestino` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamos`);

--
-- Indexes for table `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id_mov`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id_mov` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
