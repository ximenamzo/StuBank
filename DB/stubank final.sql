-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 05:09:38
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stubank`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nCuenta` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nEjecutivo` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecNac` date NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT 3,
  `fecInscrip` date NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nCuenta`, `nEjecutivo`, `nombre`, `apellidoP`, `apellidoM`, `foto`, `telefono`, `fecNac`, `email`, `curp`, `password`, `rol`, `fecInscrip`, `estatus`) VALUES
(11, '20220001', '2022MACX', 'Miguel Agustín', 'Alejandre', 'Arreola', '20220001', '3141234511', '1999-01-01', 'malejandre@email.com', '12345678912345670A', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-14', 1),
(12, '20220042', '2022MACX', 'Dash', 'Manzo', 'Castrejón', '20220004', '3141234522', '2018-06-29', 'dmanzo@email.com', '12345678912345670B', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-14', 1),
(13, '20220043', '2022MACX', 'Kimy', 'Manzo', 'Castrejón', '20220043', '3141234533', '2020-09-05', 'kmanzo@email.com', '12345678912345670C', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-14', 1),
(14, '20220044', '2022MACX', 'Laura Sofia', 'Gutiérrez', '', '2022AAAL', '3141234544', '2000-01-01', 'laura@email.com', '12345678912345670D', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-14', 2),
(15, '20220045', '2022MACX', 'Maria Jose', 'Pérez', 'Del Rey', '20220045', '3141234555', '2000-05-03', 'mjose@email.com', '12345678912345670E', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-23', 1),
(16, '20220002', '2022AAAB', 'Humberto Alejandro', 'Blanco', 'Velasco', '20220002', '3141234566', '1997-07-07', 'hblanco@email.com', '12345678912345670F', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-24', 1),
(17, '20220003', '2022AAAB', 'César', 'Sánchez', 'Bolaños', '20220002', '3141234577', '1998-08-08', 'ssanchez@email.com', '12345678912345670G', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-24', 1),
(18, '20220077', '2022MACX', 'Mireya María', 'Castrejón', 'Vargas', '20220077', '3141234588', '1977-08-31', 'mireya@email.com', '12345678912345670H', 'c38620e3221d07f8bce62fed98344170', 3, '2022-11-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuenta` int(11) NOT NULL,
  `nCliente` varchar(9) NOT NULL,
  `cuenta` varchar(10) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `saldo` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `nCliente`, `cuenta`, `tipo`, `titulo`, `saldo`) VALUES
(21, '20220001', '20220001A', 'A', 'Débito', 13703),
(22, '20220042', '20220042A', 'A', 'Débito', 9021),
(23, '20220042', '20220042C', 'C', 'Ahorro', 3664),
(24, '20220042', '20220042B', 'B', 'Crédito', 15788.04),
(26, '20220042', '20220042E', 'E', 'Débito (secundaria)', 4429),
(27, '20220042', '20220042D', 'D', 'Dólares', 475),
(28, '20220043', '20220043A', 'A', 'Débito', 5501),
(29, '20220043', '20220043B', 'B', 'Crédito', 0),
(30, '20220001', '20220001B', 'B', 'Crédito', 5),
(32, '20220045', '20220045A', 'A', 'Débito', 19000),
(36, '20220045', '20220045B', 'B', 'Crédito', 0),
(37, '20220002', '20220002A', 'A', 'Débito', 0),
(38, '20220077', '20220077A', 'A', 'Débito', 18402),
(39, '20220077', '20220077B', 'B', 'Crédito', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_prest` int(11) NOT NULL,
  `cuenta` varchar(10) NOT NULL,
  `cantidad` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_prest`, `cuenta`, `cantidad`, `fecha`) VALUES
(7, 18, '20220042B', 500, '2022-11-13 20:30:30'),
(8, 18, '20220042B', 6000, '2022-11-13 20:41:07'),
(9, 18, '20220042B', 10893.04, '2022-11-14 00:17:48'),
(10, 19, '20220042B', 1000, '2022-11-14 00:25:25'),
(11, 19, '20220042B', 182.1199999999999, '2022-11-14 20:31:32'),
(12, 20, '20220042B', 12, '2022-11-22 20:41:54'),
(13, 20, '20220042B', 25.8, '2022-11-22 20:43:06'),
(14, 20, '20220042B', 50, '2022-11-22 21:18:03'),
(15, 20, '20220042B', 50, '2022-11-24 11:59:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prest` int(11) NOT NULL,
  `solicitanteEje` varchar(9) NOT NULL,
  `solicitanteCl` varchar(9) NOT NULL,
  `cantidad` double NOT NULL,
  `meses` int(11) NOT NULL,
  `deuda` double NOT NULL,
  `metodo` tinyint(4) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prest`, `solicitanteEje`, `solicitanteCl`, `cantidad`, `meses`, `deuda`, `metodo`, `fecha`, `estatus`) VALUES
(18, '2022MACX', '20220042B', 10000, 24, 0, 2, '2022-11-13 19:50:37', 4),
(19, '2022MACX', '20220042B', 1000, 6, 0, 1, '2022-11-14 00:23:25', 4),
(20, '2022MACX', '20220042B', 500, 2, 399.99999999999994, 2, '2022-11-18 02:06:21', 2),
(21, '2022MACX', '20220077B', 5000, 6, 5911, 2, '2022-11-24 22:39:44', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_user` int(11) NOT NULL,
  `nCuenta` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `foto` varchar(9) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecNac` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT 2,
  `fecInscrip` date DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_user`, `nCuenta`, `nombre`, `apellidoP`, `apellidoM`, `foto`, `telefono`, `fecNac`, `email`, `curp`, `password`, `rol`, `fecInscrip`, `estatus`) VALUES
(1, '2022AAAA', 'Administrador', 'Stubank', 'UCOL', NULL, '3141111111', '2003-04-15', 'admin@ucol.mx', 'NOLC030415HCMLGRA2', '2ac3510fc601c5b63a510ad408d41199', 1, NULL, 1),
(35, '2022MACX', 'Ximena', 'Manzo', 'Castrejón', '2022MACX', '3143763339', '2003-05-07', 'ximena@email.com', '12345678912345678X', 'b439fa89d982921d8dc85daebc658a87', 2, '2022-11-13', 1),
(36, '2022AAAB', 'Alfredo Manuel', 'Encina', 'Bautista', '2022AAAB', '3141234561', '1998-01-01', 'aencina@email.com', '12345678912345678B', 'c38620e3221d07f8bce62fed98344170', 2, '2022-11-13', 1),
(37, '2022AAAC', 'Alejandro', 'Mejía', 'Bautista', '2022AAAC', '3141234562', '1990-01-01', 'amejia@email.com', '12345678912345678C', NULL, 2, '2022-11-13', 2),
(38, '2022AAAD', 'Juan Miguel', 'Vázquez', 'Verde', '2022AAAD', '3141234563', '1984-01-01', 'jvazquez@email.com', '12345678912345678D', NULL, 2, '2022-11-13', 1),
(39, '2022AAAE', 'Gregorio', 'Ferrusquía', 'Benítez', '2022AAAE', '3141234564', '1977-01-01', 'gregorio@email.com', '12345678912345678E', NULL, 2, '2022-11-13', 1),
(40, '2022AAAF', 'José Antonio', 'Manrique', 'Bermúdez', '2022AAAF', '3141234565', '2000-01-01', 'jose@email.com', '12345678912345678F', NULL, 2, '2022-11-13', 1),
(41, '2022AAAG', 'Salvador Antonio', 'Rosales', 'Aguilar', '2022AAAG', '3141234566', '1993-01-01', 'srosales@email.com', '12345678912345678G', NULL, 2, '2022-11-14', 1),
(42, '2022AAAH', 'Gabriel', 'Barrios', 'Domínguez', '2022AAAH', '3141234567', '1991-01-01', 'gbarrios@email.com', '12345678912345678H', NULL, 2, '2022-11-14', 1),
(43, '2022AAAI', 'Gigliola Taide', 'Manrique', 'Bernal', '2022AAAI', '3141234568', '2000-01-01', 'gmanrique@email.com', '12345678912345678I', 'NULL', 2, NULL, 1),
(44, '2022AAAJ', 'Miguel Ángel', 'Betancourt', 'Vázquez', NULL, '3141234569', '1968-01-01', 'mbetancourt@email.com', '12345678912345678J', 'NULL', 2, NULL, 2),
(45, '2022AAAK', 'Noel', 'Torres', 'Betanzos', NULL, '3141234560', '1980-01-01', 'ntorres@email.com', '12345678912345678K', 'NULL', 2, NULL, 2),
(46, '2022AAAM', 'Juan', 'Pérez', 'López', '2022AAAM', '1234567890', '2000-02-01', 'juan@email.com', '12345678912345678M', NULL, 2, '2022-11-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id_mov` int(11) NOT NULL,
  `cTramitador` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `solicitante` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cOrigen` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cDestino` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `referencia` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motivo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id_mov`, `cTramitador`, `solicitante`, `cOrigen`, `cDestino`, `tipo`, `cantidad`, `referencia`, `motivo`, `fecha`) VALUES
(47, '2022MACX', '20220001', 'Externo', '20220001A', 'Deposito', 15000, NULL, NULL, '2022-11-13 19:09:20'),
(48, '2022MACX', '20220042', 'Banco', '20220042B', 'Prestamo', 10000, NULL, NULL, '2022-11-13 20:05:42'),
(49, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 500, NULL, NULL, '2022-11-13 20:30:30'),
(50, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 6000, NULL, NULL, '2022-11-13 20:41:07'),
(51, '2022MACX', '20220042', 'Externo', '20220042B', 'Deposito', 19000, NULL, NULL, '2022-11-13 20:51:44'),
(52, '2022MACX', '20220042', 'Externo', '20220042A', 'Deposito', 15000, NULL, NULL, '2022-11-13 20:55:14'),
(53, '2022MACX', '20220042', 'Externo', '20220042C', 'Deposito', 2000, NULL, NULL, '2022-11-13 20:55:36'),
(54, '20220042', '20220042', '20220042A', '20220001A', 'Transferencia', 500, NULL, NULL, '2022-11-13 21:36:41'),
(56, '20220042', '20220042', '20220042A', '20220042C', 'Transferencia', 1000, NULL, NULL, '2022-11-13 21:47:18'),
(57, '20220042', '20220042', '20220042A', '20220001B', 'Transferencia', 2000, NULL, NULL, '2022-11-13 21:48:50'),
(58, '2022MACX', '20220042', '20220042C', 'Externo', 'Retiro', 50, NULL, NULL, '2022-11-13 21:51:33'),
(59, '2022MACX', '20220042', 'Externo', '20220042D', 'Deposito', 500, NULL, NULL, '2022-11-13 22:11:33'),
(60, '2022MACX', '20220042', 'Externo', '20220042E', 'Deposito', 5000, NULL, NULL, '2022-11-13 22:13:58'),
(61, '2022MACX', '20220001', '20220001A', 'Externo', 'Retiro', 500, NULL, NULL, '2022-11-13 22:14:40'),
(62, '2022MACX', '20220042', 'Externo', '20220042B', 'Deposito', 5000, NULL, NULL, '2022-11-14 00:06:42'),
(63, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 10893.04, NULL, NULL, '2022-11-14 00:17:48'),
(64, '2022MACX', '20220042', 'Banco', 'Externo', 'Prestamo', 1000, NULL, NULL, '2022-11-14 00:23:46'),
(65, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 1000, NULL, NULL, '2022-11-14 00:25:25'),
(66, '20220042', '20220042', '20220042D', '20220042C', 'Transferencia', 400, NULL, NULL, '2022-11-14 00:26:44'),
(67, '2022MACX', '20220043', 'Externo', '20220043A', 'Deposito', 5000, NULL, NULL, '2022-11-14 01:16:32'),
(68, '2022MACX', '20220001', '20220001A', 'Externo', 'Retiro', 500, NULL, NULL, '2022-11-14 08:53:09'),
(69, '20220001', '20220001', '20220001A', '20220043A', 'Transferencia', 500, NULL, NULL, '2022-11-14 11:17:17'),
(70, '20220042', '20220042', '20220042A', 'CFE', 'Pago de Servicio', 123, NULL, NULL, '2022-11-14 20:19:26'),
(71, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 182.1199999999999, NULL, NULL, '2022-11-14 20:31:32'),
(72, '20220042', '20220042', '20220042A', 'CAPDAM', 'Pago de Servicio', 12, NULL, NULL, '2022-11-15 07:55:38'),
(73, '20220042', '20220042', '20220042E', 'TELMEX', 'Pago de Servicio', 100, '1234567', NULL, '2022-11-18 01:45:42'),
(74, '20220042', '20220042', '20220042A', 'IZZI', 'Pago de Servicio', 535, '7654321', NULL, '2022-11-18 01:49:10'),
(75, '20220042', '20220042', '20220042A', 'INFONAVIT', 'Pago de Servicio', 323, '1212121', NULL, '2022-11-18 02:00:05'),
(76, '2022MACX', '20220042', 'Banco', '20220042B', 'Prestamo', 500, NULL, NULL, '2022-11-18 02:06:38'),
(77, '20220042', '20220042', '20220042E', 'SKY', 'Pago de Servicio', 121, '1234567', NULL, '2022-11-18 02:20:18'),
(78, '20220042', '20220042', '20220042A', 'TELCEL', 'Pago de Servicio', 50, NULL, NULL, '2022-11-18 02:48:38'),
(79, '20220042', '20220042', '20220042E', 'AT&T', 'Recarga telefónica', 100, NULL, '+523141234567', '2022-11-18 02:54:41'),
(80, '20220042', '20220042', '20220042A', '20220042C', 'Transferencia', 1, NULL, '123', '2022-11-19 20:10:29'),
(81, '20220042', '20220042', '20220042A', '20220043A', 'Transferencia', 1, NULL, 'Tacos de perro', '2022-11-19 20:12:17'),
(82, '20220042', '20220042', '20220042A', '20220042C', 'Transferencia', 1, '6116576', 'Tacos de caca', '2022-11-19 20:21:34'),
(83, '20220042', '20220042', '20220042A', '20220042C', 'Transferencia', 12, '9967123', 'Ahorrando', '2022-11-22 19:11:16'),
(84, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 12, NULL, NULL, '2022-11-22 20:41:54'),
(85, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 25.8, NULL, NULL, '2022-11-22 20:43:06'),
(86, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 50, NULL, NULL, '2022-11-22 21:18:03'),
(87, '20220042', '20220042', '20220042D', '20220042C', 'Transferencia', 40, '4350118', 'Ahorrando Otra Vez', '2022-11-22 21:20:13'),
(88, '20220042', '20220042', '20220042E', 'TELCEL', 'Recarga telefónica', 50, NULL, '3141234567', '2022-11-22 21:22:13'),
(89, '2022MACX', '20220045', 'Externo', '20220045A', 'Deposito', 19000, NULL, NULL, '2022-11-22 21:32:25'),
(90, '20220042', '20220042', '20220042A', '20220042B', 'Transferencia', 1, '9639622', '', '2022-11-23 22:21:20'),
(91, '2022MACX', '20220001', 'Externo', '20220001A', 'Deposito', 250, NULL, NULL, '2022-11-24 11:31:31'),
(92, '20220001', '20220001', '20220001A', '20220001B', 'Transferencia', 5, '7309638', '', '2022-11-24 11:40:11'),
(93, '20220001', '20220001', '20220001A', 'CFE', 'Pago de Servicio', 542, '1234567', NULL, '2022-11-24 11:41:21'),
(94, '20220042', '20220042', '20220042A', 'TELCEL', 'Recarga telefónica', 20, NULL, '3141668635', '2022-11-24 11:52:51'),
(95, '20220042', '20220042', '20220042A', 'TELCEL', 'Recarga telefónica', 20, NULL, '3141607097', '2022-11-24 11:58:59'),
(96, '20220042', NULL, '20220042B', 'Banco', 'Pago a préstamo', 50, NULL, NULL, '2022-11-24 11:59:39'),
(97, '2022MACX', '20220077', 'Externo', '20220077A', 'Deposito', 19000, NULL, NULL, '2022-11-24 22:33:06'),
(98, '20220077', '20220077', '20220077A', 'TELCEL', 'Pago de Servicio', 598, '1234567', NULL, '2022-11-24 22:38:28'),
(99, '2022MACX', '20220077', 'Banco', '20220077B', 'Prestamo', 5000, NULL, NULL, '2022-11-24 22:40:02'),
(100, '20220042', '20220042', '20220042A', 'CFE', 'Pago de Servicio', 300, '1234567', NULL, '2022-11-25 10:24:33'),
(101, '20220042', '20220042', '20220042E', '20220042C', 'Transferencia', 200, '5984592', 'Ahorro mes noviembre', '2022-11-25 10:26:49'),
(102, '20220042', '20220042', '20220042A', 'TELCEL', 'Recarga telefónica', 80, NULL, '+523141234567', '2022-11-25 10:29:18'),
(103, '20220042', '20220042', '20220042D', '20220042C', 'Transferencia', 60, '8920883', 'Ahorro más', '2022-11-25 16:53:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `nCuenta` (`nCuenta`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `curp` (`curp`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD UNIQUE KEY `cuenta` (`cuenta`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prest`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nCuenta` (`nCuenta`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `curp` (`curp`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id_mov`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
