-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 03:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `altmannc_procesos`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `IdEquipo` int(11) NOT NULL,
  `dietrich2` varchar(50) DEFAULT '-1',
  `fLukas` varchar(45) DEFAULT '-1',
  `contOlor` varchar(45) DEFAULT '-1',
  `dietrich1` tinyint(1) NOT NULL DEFAULT -1,
  `escamador` tinyint(1) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`IdEquipo`, `dietrich2`, `fLukas`, `contOlor`, `dietrich1`, `escamador`) VALUES
(1, '1', '1', '1', 0, 0),
(2, '1', '1', '1', 0, 0),
(3, '1', '1', '1', 0, 0),
(4, '1', '1', '1', 0, 0),
(5, '1', '1', '1', 0, 0),
(6, '1', '1', '1', 0, 0),
(7, '1', '1', '1', 0, 0),
(8, '1', '1', '1', 0, 0),
(9, '1', '1', '1', 0, 0),
(10, '1', '1', '1', 0, 0),
(11, '1', '1', '1', 0, 0),
(12, '1', '', '1', 0, 0),
(13, '1', '', '1', 0, 0),
(14, '1', '', '', 0, 0),
(15, '1', '', '1', 0, 0),
(16, '1', '', '1', 0, 0),
(17, '1', '', '1', 0, 0),
(18, '1', '', '1', 0, 0),
(19, '1', '', '1', 0, 0),
(20, '1', '', '1', 0, 0),
(21, '1', '', '1', 0, 0),
(22, '1', '', '1', 0, 0),
(23, '1', '', '1', 0, 0),
(24, '1', '', '1', 0, 0),
(25, '1', '', '1', 0, 0),
(26, '1', '', '1', 0, 0),
(27, '1', '', '1', 0, 0),
(28, '1', '', '1', 0, 0),
(29, '1', '', '1', 0, 0),
(30, '1', '', '1', 0, 0),
(31, '1', '1', '1', 0, 0),
(32, '1', '', '1', 0, 0),
(33, '1', '', '1', 0, 0),
(34, '', '', '', 0, 0),
(35, '1', '1', '', 0, 0),
(36, '1', '1', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `etapas`
--

CREATE TABLE `etapas` (
  `IdProceso` varchar(50) NOT NULL,
  `NombreEtapa` varchar(50) NOT NULL,
  `HoraInicio` time DEFAULT NULL,
  `HoraFin` time DEFAULT NULL,
  `Temperatura` varchar(50) DEFAULT NULL,
  `Presion` varchar(50) DEFAULT NULL,
  `HoraToma` varchar(50) DEFAULT NULL,
  `Comentario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etapas`
--

INSERT INTO `etapas` (`IdProceso`, `NombreEtapa`, `HoraInicio`, `HoraFin`, `Temperatura`, `Presion`, `HoraToma`, `Comentario`) VALUES
('2', 'triturado', '18:16:00', '21:19:00', NULL, NULL, NULL, NULL),
('2', 'fusion', '20:19:00', '19:19:00', '54', '65', NULL, NULL),
('2', 'sulfurico', '20:20:00', '20:20:00', NULL, NULL, NULL, NULL),
('2', 'sulfurico1', '20:20:00', '20:20:00', '54', '65', NULL, NULL),
('2', 'sostener1', '19:20:00', NULL, '45', '65', NULL, NULL),
('2', 'sostener2', NULL, NULL, '45', '65', NULL, NULL),
('2', 'sostener3', NULL, '19:20:00', '45', '65', NULL, NULL),
('2', 'enfriado1', NULL, NULL, '54', '54', NULL, NULL),
('2', 'enfriado2', NULL, NULL, '55', '55', NULL, NULL),
('2', 'carga7001', '18:22:00', NULL, '55', '55', NULL, '555'),
('2', 'carga7002', NULL, NULL, '55', '55', NULL, '55'),
('2', 'carga7003', NULL, NULL, '44', '44', NULL, '44'),
('2', 'carga7004', NULL, NULL, '44', '44', NULL, '44'),
('2', 'carga7005', NULL, '19:22:00', '44', '44', NULL, '55'),
('2', 'reaccion1', '18:22:00', NULL, '55', '5', NULL, '55'),
('2', 'reaccion2', NULL, NULL, '55', '55', NULL, '55'),
('2', 'reaccion3', NULL, NULL, '55', '55', NULL, '55'),
('2', 'reaccion4', NULL, NULL, '55', '55', NULL, '55'),
('2', 'reaccion5', NULL, NULL, '55', '55', NULL, '55'),
('2', 'reaccion6', NULL, NULL, '55', '55', NULL, '55'),
('2', 'reaccion7', NULL, '20:23:00', '55', '55', NULL, '55'),
('2', 'adicionarstw', '19:39:00', '20:39:00', '55', '55', NULL, NULL),
('2', 'ReaccionNeutra1', '20:41:00', NULL, '55', '55', NULL, '565'),
('2', 'ReaccionNeutra2', NULL, NULL, '6556', '56', NULL, '656'),
('2', 'ReaccionNeutra3', NULL, NULL, '454', '5454', NULL, 'ss'),
('2', 'ReaccionNeutra4', NULL, '22:41:00', '5', '2', NULL, 'ss'),
('2', 'homogenizacion', '20:41:00', NULL, '55', '55', NULL, '55'),
('2', 'homogenizacion2', NULL, NULL, '6', '56', NULL, 'sss'),
('2', 'homogenizacion3', NULL, '22:41:00', '55', '55', NULL, 'sss'),
('2', 'DescargaIbc', '22:52:00', '21:47:00', NULL, NULL, NULL, NULL),
('2', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'triturado', '03:27:00', '05:28:00', NULL, NULL, NULL, NULL),
('3', 'fusion', '03:29:00', '04:29:00', '5', '5', NULL, NULL),
('3', 'sulfurico', '03:34:00', '04:34:00', NULL, NULL, NULL, NULL),
('3', 'sulfurico1', '03:34:00', '04:34:00', '5', '5', NULL, NULL),
('3', 'sostener1', '01:35:00', NULL, '5', '5', NULL, NULL),
('3', 'sostener2', NULL, NULL, '5', '5', NULL, NULL),
('3', 'sostener3', NULL, '04:35:00', '5', '5', NULL, NULL),
('3', 'enfriado1', NULL, NULL, '5', '5', NULL, NULL),
('3', 'enfriado2', NULL, NULL, '5', '5', NULL, NULL),
('3', 'adicionarstw', '02:40:00', '02:40:00', '5', '5', NULL, NULL),
('3', 'carga7001', '01:42:00', NULL, '5', '5', NULL, '5'),
('3', 'carga7002', NULL, NULL, '5', '5', NULL, '5'),
('3', 'carga7003', NULL, NULL, '5', '5', NULL, '5'),
('3', 'carga7004', NULL, NULL, '5', '5', NULL, '5'),
('3', 'carga7005', NULL, '01:42:00', '5', '5', NULL, '5'),
('3', 'reaccion1', '01:42:00', NULL, '5', '5', NULL, '5'),
('3', 'reaccion2', NULL, NULL, '5', '5', NULL, '5'),
('3', 'reaccion3', NULL, NULL, '5', '5', NULL, '5'),
('3', 'reaccion4', NULL, NULL, '5', '5', NULL, '5'),
('3', 'reaccion5', NULL, NULL, '5', '5', NULL, '5'),
('3', 'reaccion6', NULL, NULL, '5', '5', NULL, '5'),
('3', 'reaccion7', NULL, '01:42:00', '5', '5', NULL, '5'),
('3', 'ReaccionNeutra1', '03:43:00', NULL, '5', '5', NULL, '5'),
('3', 'ReaccionNeutra2', NULL, NULL, '5', '5', NULL, '5'),
('3', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, '5'),
('3', 'ReaccionNeutra4', NULL, '01:43:00', '5', '5', NULL, '5'),
('3', 'homogenizacion', '04:43:00', NULL, '5', '5', NULL, '5'),
('3', 'homogenizacion2', NULL, NULL, '5', '5', NULL, '5'),
('3', 'homogenizacion3', NULL, '02:43:00', '5', '5', NULL, '5'),
('3', 'Enfriet85-', '01:46:00', '02:46:00', '85', NULL, NULL, NULL),
('3', 'DescargaIbc', '02:53:00', '04:53:00', NULL, NULL, NULL, NULL),
('3', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('4', 'triturado', '17:57:00', '18:57:00', NULL, NULL, NULL, NULL),
('4', 'fusion', '19:57:00', '18:57:00', '55', '5', NULL, NULL),
('4', 'sulfurico', '17:58:00', '19:58:00', NULL, NULL, NULL, NULL),
('4', 'sulfurico1', '17:58:00', '19:58:00', '5', '5', NULL, NULL),
('4', 'sostener1', '16:58:00', NULL, '5', '5', NULL, NULL),
('4', 'sostener2', NULL, NULL, '5', '5', NULL, NULL),
('4', 'sostener3', NULL, '16:59:00', '5', '5', NULL, NULL),
('4', 'enfriado1', NULL, NULL, '5', '5', NULL, NULL),
('4', 'enfriado2', NULL, NULL, '5', '5', NULL, NULL),
('4', 'carga7001', '19:00:00', NULL, '5', '5', NULL, '5'),
('4', 'carga7002', NULL, NULL, '5', '5', NULL, '5'),
('4', 'carga7003', NULL, NULL, '5', '5', NULL, '5'),
('4', 'carga7004', NULL, NULL, '5', '5', NULL, '5'),
('4', 'carga7005', NULL, '18:00:00', '5', '5', NULL, '5'),
('4', 'reaccion1', '19:00:00', NULL, '5', '5', NULL, '5'),
('4', 'reaccion2', NULL, NULL, '5', '5', NULL, '5'),
('4', 'reaccion3', NULL, NULL, '5', '5', NULL, '5'),
('4', 'reaccion4', NULL, NULL, '5', '5', NULL, '5'),
('4', 'reaccion5', NULL, NULL, '5', '5', NULL, '5'),
('4', 'reaccion6', NULL, NULL, '5', '5', NULL, '5'),
('4', 'reaccion7', NULL, '17:00:00', '5', '5', NULL, '5'),
('4', 'adicionarstw', '17:01:00', '17:07:00', '5', '5', NULL, NULL),
('4', 'ReaccionNeutra1', '18:02:00', NULL, '5', '5', NULL, '5'),
('4', 'ReaccionNeutra2', NULL, NULL, '5', '5', NULL, '5'),
('4', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, '5'),
('4', 'ReaccionNeutra4', NULL, '19:02:00', '5', '5', NULL, '5'),
('4', 'homogenizacion', '17:02:00', NULL, '5', '5', NULL, '5'),
('4', 'homogenizacion2', NULL, NULL, '5', '5', NULL, '5'),
('4', 'homogenizacion3', NULL, '17:02:00', '5', '5', NULL, '5'),
('4', 'Enfriet85-', '17:03:00', '19:03:00', '85', NULL, NULL, NULL),
('5', 'triturado', '10:53:00', '00:53:00', NULL, NULL, NULL, NULL),
('5', 'fusion', '01:53:00', '00:53:00', '4', '6', NULL, NULL),
('5', 'sulfurico', '00:54:00', '02:54:00', NULL, NULL, NULL, NULL),
('5', 'sulfurico1', '00:54:00', '02:54:00', '5', '5', NULL, NULL),
('5', 'sostener1', '00:54:00', NULL, '5', '7', NULL, NULL),
('5', 'sostener2', NULL, NULL, '5', '7', NULL, NULL),
('5', 'sostener3', NULL, '00:54:00', '5', '7', NULL, NULL),
('5', 'enfriado1', NULL, NULL, '55', '5', NULL, NULL),
('5', 'enfriado2', NULL, NULL, '55', '5', NULL, NULL),
('5', 'carga7001', '00:55:00', NULL, '3', '5', NULL, '5'),
('5', 'carga7002', NULL, NULL, '5', '5', NULL, '5'),
('5', 'carga7003', NULL, NULL, '5', '5', NULL, '5'),
('5', 'carga7004', NULL, NULL, '5', '5', NULL, '5'),
('5', 'carga7005', NULL, '09:59:00', '5', '5', NULL, '5'),
('5', 'reaccion1', '00:56:00', NULL, '5', '5', NULL, '5'),
('5', 'reaccion2', NULL, NULL, '5', '5', NULL, '5'),
('5', 'reaccion3', NULL, NULL, '5', '5', NULL, '5'),
('5', 'reaccion4', NULL, NULL, '5', '5', NULL, '5'),
('5', 'reaccion5', NULL, NULL, '5', '5', NULL, '5'),
('5', 'reaccion6', NULL, NULL, '5', '5', NULL, '5'),
('5', 'reaccion7', NULL, '11:56:00', '5', '5', NULL, '5'),
('5', 'adicionarstw', '00:56:00', '00:56:00', '5', '5', NULL, NULL),
('5', 'ReaccionNeutra1', '09:00:00', NULL, '5', '5', NULL, '5'),
('5', 'ReaccionNeutra2', NULL, NULL, '5', '5', NULL, '5'),
('5', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, '5'),
('5', 'ReaccionNeutra4', NULL, '00:57:00', '5', '5', NULL, '5'),
('5', 'homogenizacion', '09:00:00', NULL, '5', '5', NULL, '5'),
('5', 'homogenizacion2', NULL, NULL, '5', '5', NULL, '5'),
('5', 'homogenizacion3', NULL, '00:57:00', '5', '5', NULL, '5'),
('5', 'Enfriet85-', '03:05:00', '00:25:00', '85', NULL, NULL, NULL),
('5', 'DescargaIbc', '00:28:00', '02:28:00', NULL, NULL, NULL, NULL),
('5', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('6', 'triturado', '19:11:00', '18:11:00', NULL, NULL, NULL, NULL),
('6', 'fusion', '20:11:00', '20:12:00', '5', '5', NULL, NULL),
('6', 'sulfurico', '19:12:00', '19:12:00', NULL, NULL, NULL, NULL),
('6', 'sulfurico1', '19:12:00', '19:12:00', '55', '5', NULL, NULL),
('6', 'sostener1', '18:12:00', NULL, '5', '5', NULL, NULL),
('6', 'sostener2', NULL, NULL, '5', '5', NULL, NULL),
('6', 'sostener3', NULL, '21:12:00', '5', '5', NULL, NULL),
('6', 'enfriado1', NULL, NULL, '5', '5', NULL, NULL),
('6', 'enfriado2', NULL, NULL, '5', '5', NULL, NULL),
('6', 'carga7001', '18:14:00', NULL, '5', '5', NULL, 'll'),
('6', 'carga7002', NULL, NULL, '5', '5', NULL, '7'),
('6', 'carga7003', NULL, NULL, '5', '5', NULL, '5'),
('6', 'carga7004', NULL, NULL, '5', '5', NULL, '5'),
('6', 'carga7005', NULL, '20:14:00', '5', '5', NULL, '5'),
('6', 'reaccion1', '18:14:00', NULL, '3', '4', NULL, '4'),
('6', 'reaccion2', NULL, NULL, '4', '4', NULL, '4'),
('6', 'reaccion3', NULL, NULL, '4', '4', NULL, '4'),
('6', 'reaccion4', NULL, NULL, '4', '4', NULL, '4'),
('6', 'reaccion5', NULL, NULL, '4', '4', NULL, '4'),
('6', 'reaccion6', NULL, NULL, '6', '4', NULL, '4'),
('6', 'reaccion7', NULL, '19:15:00', '5', '5', NULL, '5'),
('6', 'adicionarstw', '20:15:00', '16:19:00', '5', '5', NULL, NULL),
('6', 'ReaccionNeutra1', '18:16:00', NULL, '5', '5', NULL, 'J'),
('6', 'ReaccionNeutra2', NULL, NULL, '5', '5', NULL, 'K'),
('6', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, 'L'),
('6', 'ReaccionNeutra4', NULL, '19:16:00', '5', '5', NULL, '5'),
('6', 'homogenizacion', '18:16:00', NULL, '3', '3', NULL, '33'),
('6', 'homogenizacion2', NULL, NULL, '3', '3', NULL, '3'),
('6', 'homogenizacion3', NULL, '18:16:00', '3', '3', NULL, '3'),
('6', 'Enfriet85-', '21:17:00', '20:17:00', '5', NULL, NULL, NULL),
('7', 'triturado', '18:58:00', '18:58:00', NULL, NULL, NULL, NULL),
('7', 'fusion', '21:58:00', '19:58:00', '5', '5', NULL, NULL),
('7', 'sulfurico', '18:58:00', '22:58:00', NULL, NULL, NULL, NULL),
('7', 'sulfurico1', '18:58:00', '22:58:00', '4', '4', NULL, NULL),
('7', 'sostener1', '17:59:00', NULL, '4', '4', NULL, NULL),
('7', 'sostener2', NULL, NULL, '4', '4', NULL, NULL),
('7', 'sostener3', NULL, '22:59:00', '4', '4', NULL, NULL),
('7', 'enfriado1', NULL, NULL, '4', '4', NULL, NULL),
('7', 'enfriado2', NULL, NULL, '4', '4', NULL, NULL),
('7', 'carga7001', '19:59:00', NULL, '4', '4', NULL, '4'),
('7', 'carga7002', NULL, NULL, '4', '4', NULL, '4'),
('7', 'carga7003', NULL, NULL, '4', '4', NULL, '4'),
('7', 'carga7004', NULL, NULL, '4', '4', NULL, '4'),
('7', 'carga7005', NULL, '18:59:00', '4', '4', NULL, '4'),
('7', 'reaccion1', '19:00:00', NULL, '4', '4', NULL, '4'),
('7', 'reaccion2', NULL, NULL, '4', '4', NULL, '44'),
('7', 'reaccion3', NULL, NULL, '4', '4', NULL, '4'),
('7', 'reaccion4', NULL, NULL, '8', '4', NULL, '4'),
('7', 'reaccion5', NULL, NULL, '4', '4', NULL, '4'),
('7', 'reaccion6', NULL, NULL, '4', '4', NULL, '4'),
('7', 'reaccion7', NULL, '19:00:00', '4', '4', NULL, '4'),
('7', 'adicionarstw', '19:10:00', '22:10:00', '4', '4', NULL, NULL),
('8', 'triturado', '20:18:00', '20:18:00', NULL, NULL, NULL, NULL),
('8', 'fusion', '17:22:00', '20:19:00', '4', '4', NULL, NULL),
('8', 'sulfurico', '20:19:00', '23:19:00', NULL, NULL, NULL, NULL),
('8', 'sulfurico1', '20:19:00', '23:19:00', '4', '4', NULL, NULL),
('8', 'sostener1', '20:19:00', NULL, '4', '4', NULL, NULL),
('8', 'sostener2', NULL, NULL, '4', '4', NULL, NULL),
('8', 'sostener3', NULL, '20:19:00', '4', '4', NULL, NULL),
('8', 'enfriado1', NULL, NULL, '4', '4', NULL, NULL),
('8', 'enfriado2', NULL, NULL, '4', '4', NULL, NULL),
('8', 'carga7001', '20:20:00', NULL, '4', '4', NULL, '4'),
('8', 'carga7002', NULL, NULL, '4', '4', NULL, '4'),
('8', 'carga7003', NULL, NULL, '4', '4', NULL, '4'),
('8', 'carga7004', NULL, NULL, '4', '4', NULL, '4'),
('8', 'carga7005', NULL, '19:20:00', '4', '4', NULL, '4'),
('8', 'reaccion1', '19:20:00', NULL, '4', '4', NULL, '4'),
('8', 'reaccion2', NULL, NULL, '4', '4', NULL, '4'),
('8', 'reaccion3', NULL, NULL, '4', '4', NULL, '4'),
('8', 'reaccion4', NULL, NULL, '4', '4', NULL, '4'),
('8', 'reaccion5', NULL, NULL, '4', '4', NULL, '4'),
('8', 'reaccion6', NULL, NULL, '4', '4', NULL, '4'),
('8', 'reaccion7', NULL, '19:21:00', '4', '4', NULL, '4'),
('9', 'triturado', '02:10:00', '04:10:00', NULL, NULL, NULL, NULL),
('9', 'fusion', '01:10:00', '03:10:00', '5', '5', NULL, NULL),
('9', 'sulfurico', '02:11:00', '02:11:00', NULL, NULL, NULL, NULL),
('9', 'sulfurico1', '02:11:00', '02:11:00', '3', '3', NULL, NULL),
('9', 'sostener1', '04:11:00', NULL, '5', '3', NULL, NULL),
('9', 'sostener2', NULL, NULL, '5', '3', NULL, NULL),
('9', 'sostener3', NULL, '02:11:00', '5', '3', NULL, NULL),
('9', 'enfriado1', NULL, NULL, '4', '4', NULL, NULL),
('9', 'enfriado2', NULL, NULL, '4', '4', NULL, NULL),
('9', 'carga7001', '02:12:00', NULL, '4', '4', NULL, '4'),
('9', 'carga7002', NULL, NULL, '4', '4', NULL, '4'),
('9', 'carga7003', NULL, NULL, '4', '4', NULL, '4'),
('9', 'carga7004', NULL, NULL, '4', '4', NULL, '4'),
('9', 'carga7005', NULL, '01:12:00', '4', '4', NULL, '4'),
('9', 'reaccion1', '02:12:00', NULL, '4', '4', NULL, '4'),
('9', 'reaccion2', NULL, NULL, '4', '4', NULL, '4'),
('9', 'reaccion3', NULL, NULL, '4', '4', NULL, '4'),
('9', 'reaccion4', NULL, NULL, '4', '4', NULL, '4'),
('9', 'reaccion5', NULL, NULL, '4', '4', NULL, '4'),
('9', 'reaccion6', NULL, NULL, '4', '4', NULL, '4'),
('9', 'reaccion7', NULL, '01:13:00', '4', '4', NULL, '44'),
('9', 'adicionarstw', '02:13:00', '03:14:00', '4', '4', NULL, NULL),
('10', 'triturado', '15:45:00', '17:45:00', NULL, NULL, NULL, NULL),
('10', 'fusion', '18:46:00', '19:53:00', '95', '60', NULL, NULL),
('10', 'sulfurico', '17:05:00', '19:05:00', NULL, NULL, NULL, NULL),
('10', 'sulfurico1', '17:05:00', '19:05:00', '150', '60', NULL, NULL),
('10', 'sostener1', '18:09:00', NULL, '150', '60', NULL, NULL),
('10', 'sostener2', NULL, NULL, '150', '60', NULL, NULL),
('10', 'sostener3', NULL, '22:16:00', '150', '60', NULL, NULL),
('10', 'enfriado1', NULL, NULL, '150', '60', NULL, NULL),
('10', 'enfriado2', NULL, NULL, '85', '60', NULL, NULL),
('10', 'carga7001', '18:33:00', NULL, '5', '60', NULL, '50'),
('10', 'carga7002', NULL, NULL, '150', '60', NULL, ''),
('10', 'carga7003', NULL, NULL, '50', '150', NULL, ''),
('10', 'carga7004', NULL, NULL, '150', '50', NULL, 'JFKJDKJDFKJFKDJKFDJKFJKDJKJFKJKFDJKDFJKDFJKFDJKDFJ'),
('10', 'carga7005', NULL, '18:35:00', '150', '60', NULL, 'KJKSJKJSCKJCKJCKJ'),
('10', 'reaccion1', '19:36:00', NULL, '5', '5', NULL, '5'),
('10', 'reaccion2', NULL, NULL, '5', '5', NULL, '5'),
('10', 'reaccion3', NULL, NULL, '5', '5', NULL, '5'),
('10', 'reaccion4', NULL, NULL, '5', '5', NULL, '5'),
('10', 'reaccion5', NULL, NULL, '5', '5', NULL, '5'),
('10', 'reaccion6', NULL, NULL, '5', '5', NULL, '5'),
('10', 'reaccion7', NULL, '18:36:00', '5', '5', NULL, '5'),
('10', 'adicionarstw', '18:42:00', '18:43:00', '85', '60', NULL, NULL),
('10', 'ReaccionNeutra1', '18:44:00', NULL, '5', '5', NULL, '5'),
('10', 'ReaccionNeutra2', NULL, NULL, '5', '5', NULL, '5'),
('10', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, '5'),
('10', 'ReaccionNeutra4', NULL, '19:44:00', '5', '5', NULL, '5'),
('10', 'homogenizacion', '20:45:00', NULL, '5', '5', NULL, '5'),
('10', 'homogenizacion2', NULL, NULL, '5', '5', NULL, '5'),
('10', 'homogenizacion3', NULL, '19:45:00', '5', '5', NULL, '5'),
('10', 'Enfriet85-', '18:47:00', '19:47:00', '85', NULL, NULL, NULL),
('10', 'DescargaIbc', '18:53:00', '21:53:00', NULL, NULL, NULL, NULL),
('10', 'PasoFinal', '19:04:00', '20:04:00', NULL, NULL, NULL, NULL),
('11', 'triturado', '02:38:00', '04:38:00', NULL, NULL, NULL, NULL),
('11', 'fusion', '02:38:00', '02:38:00', '5', '5', NULL, NULL),
('11', 'sulfurico', '00:54:00', '02:54:00', NULL, NULL, NULL, NULL),
('11', 'sulfurico1', '00:54:00', '02:54:00', '55', '55', NULL, NULL),
('11', 'sostener1', '02:54:00', NULL, '1', '1', NULL, NULL),
('11', 'sostener2', NULL, NULL, '1', '1', NULL, NULL),
('11', 'sostener3', NULL, '01:01:00', '1', '1', NULL, NULL),
('11', 'enfriado1', NULL, NULL, '55', '5', NULL, NULL),
('11', 'enfriado2', NULL, NULL, '5', '5', NULL, NULL),
('11', 'reaccion1', '11:56:00', NULL, '5', '5', NULL, '5'),
('11', 'reaccion2', NULL, NULL, '5', '5', NULL, '5'),
('11', 'reaccion3', NULL, NULL, '5', '5', NULL, '5'),
('11', 'reaccion4', NULL, NULL, '5', '5', NULL, '5'),
('11', 'reaccion5', NULL, NULL, '5', '5', NULL, '5'),
('11', 'reaccion6', NULL, NULL, '5', '5', NULL, '5'),
('11', 'reaccion7', NULL, '01:56:00', '5', '5', NULL, '5'),
('11', 'adicionarstw', '01:57:00', '10:00:00', '5', '5', NULL, NULL),
('11', 'carga7001', '00:00:00', NULL, '', '', NULL, ''),
('11', 'carga7002', NULL, NULL, '', '', NULL, ''),
('11', 'carga7003', NULL, NULL, '', '', NULL, ''),
('11', 'carga7004', NULL, NULL, '444', '444', NULL, '44'),
('11', 'carga7005', NULL, NULL, '', '', NULL, ''),
('12', 'triturado', '15:40:00', '16:00:00', NULL, NULL, NULL, NULL),
('12', 'fusion', '16:36:00', '18:05:00', '96', '1', NULL, NULL),
('12', 'sulfurico', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL),
('12', 'sulfurico1', '00:00:00', '00:00:00', '148', '1', NULL, NULL),
('12', 'sostener1', '00:00:00', NULL, '158', '0', NULL, NULL),
('12', 'sostener2', NULL, NULL, '158', '0', NULL, NULL),
('12', 'sostener3', NULL, '00:00:00', '158', '0', NULL, NULL),
('12', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('12', 'enfriado2', NULL, NULL, '90', '0', NULL, NULL),
('12', 'carga7001', '00:50:00', NULL, '96', '0', NULL, 'Continua adición , refluja.'),
('12', 'carga7002', NULL, NULL, '104', '0', NULL, 'Continua adición, refluja.'),
('12', 'carga7003', NULL, NULL, '99', '0', NULL, 'Continua adición.'),
('12', 'carga7004', NULL, NULL, '97', '0', NULL, 'Continua adición '),
('12', 'carga7005', NULL, '05:15:00', '98', '0', NULL, 'Fin adición'),
('12', 'reaccion1', '05:15:00', NULL, '99', '0', NULL, 'Proceso sostenido, refluja'),
('12', 'reaccion2', NULL, NULL, '101', '1', NULL, 'Proceso sostenido, refluja'),
('12', 'reaccion3', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja'),
('12', 'reaccion4', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja '),
('12', 'reaccion5', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja'),
('12', 'reaccion6', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('12', 'reaccion7', NULL, '12:15:00', '99', '0', NULL, 'Fin sostener'),
('12', 'adicionarstw', '12:15:00', '12:40:00', '99', '0', NULL, NULL),
('12', 'ReaccionNeutra1', '12:50:00', NULL, '95', '0', NULL, 'Continua adición, refluja.'),
('12', 'ReaccionNeutra2', NULL, NULL, '94', '0', NULL, 'Continua adición, refluja.'),
('12', 'ReaccionNeutra3', NULL, NULL, '95', '0', NULL, 'Continua adición, refluja.'),
('12', 'ReaccionNeutra4', NULL, '15:40:00', '', '', NULL, ''),
('12', 'homogenizacion', '15:40:00', NULL, '92', '1', NULL, 'Proceso sostenido-Soplo de vapor '),
('12', 'homogenizacion2', NULL, NULL, '92', '0', NULL, 'Proceso sostenido'),
('12', 'homogenizacion3', NULL, '18:40:00', '91', '0', NULL, 'Proceso sostenido'),
('12', 'Enfriet85-', '18:40:00', '19:30:00', '91', NULL, NULL, NULL),
('12', 'DescargaIbc', '08:00:00', '10:30:00', NULL, NULL, NULL, NULL),
('12', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('11', 'ReaccionNeutra1', '18:41:00', NULL, '55', '5', NULL, '5'),
('11', 'ReaccionNeutra2', NULL, NULL, '55', '5', NULL, '5'),
('11', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, '5'),
('11', 'ReaccionNeutra4', NULL, '18:42:00', '5', '5', NULL, '5'),
('11', 'homogenizacion', '19:42:00', NULL, '5', '5', NULL, '5'),
('11', 'homogenizacion2', NULL, NULL, '5', '96', NULL, '5689'),
('11', 'homogenizacion3', NULL, '16:42:00', '898', '98989', NULL, '5689'),
('11', 'Enfriet85-', '15:42:00', '18:42:00', '5', NULL, NULL, NULL),
('13', 'triturado', '01:00:00', '01:30:00', NULL, NULL, NULL, NULL),
('13', 'fusion', '01:55:00', '03:20:00', '95', '1', NULL, NULL),
('11', 'DescargaIbc', '17:44:00', '14:44:00', NULL, NULL, NULL, NULL),
('11', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('13', 'sulfurico', '03:20:00', '03:40:00', NULL, NULL, NULL, NULL),
('13', 'sulfurico1', '03:20:00', '03:40:00', '140', '1', NULL, NULL),
('13', 'sostener1', '04:00:00', NULL, '152', '0', NULL, NULL),
('13', 'sostener2', NULL, NULL, '152', '0', NULL, NULL),
('13', 'sostener3', NULL, '07:00:00', '152', '0', NULL, NULL),
('13', 'enfriado1', NULL, NULL, '111', '0', NULL, NULL),
('13', 'enfriado2', NULL, NULL, '101', '0', NULL, NULL),
('13', 'carga7001', '10:55:00', NULL, '69', '0', NULL, 'Continua adición .'),
('13', 'carga7002', NULL, NULL, '69', '0', NULL, 'Continua adición.'),
('13', 'carga7003', NULL, NULL, '82', '0', NULL, 'Continua adicion'),
('13', 'carga7004', NULL, NULL, '86', '1', NULL, 'Soplo de vapor'),
('13', 'carga7005', NULL, '15:30:00', '86', '1', NULL, 'Fin adición-Soplo de vapor'),
('13', 'reaccion1', '15:30:00', NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('13', 'reaccion2', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja'),
('13', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('13', 'reaccion4', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja.'),
('13', 'reaccion5', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja.'),
('13', 'reaccion6', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja.'),
('13', 'reaccion7', NULL, '22:30:00', '100', '0', NULL, 'Fin sostener'),
('13', 'adicionarstw', '22:30:00', '23:15:00', '100', '0', NULL, NULL),
('13', 'ReaccionNeutra1', '23:35:00', NULL, '97', '0', NULL, 'Continua adición, refluja.'),
('13', 'ReaccionNeutra2', NULL, NULL, '97', '0', NULL, 'Continua adición, refluja.'),
('13', 'ReaccionNeutra3', NULL, NULL, '96', '0', NULL, 'Continua adición, refluja.'),
('13', 'ReaccionNeutra4', NULL, '04:10:00', '96', '0', NULL, 'Continua adición, refluja'),
('13', 'homogenizacion', '04:10:00', NULL, '95', '0', NULL, 'Proceso sostenido'),
('13', 'homogenizacion2', NULL, NULL, '95', '0', NULL, 'Proceso sostenido'),
('13', 'homogenizacion3', NULL, '08:00:00', '95', '0', NULL, 'Proceso sostenido'),
('13', 'Enfriet85-', '08:00:00', '09:15:00', '95', NULL, NULL, NULL),
('13', 'DescargaIbc', '00:00:00', '13:30:00', NULL, NULL, NULL, NULL),
('13', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('14', 'triturado', '17:42:00', '14:46:00', NULL, NULL, NULL, NULL),
('14', 'fusion', '19:42:00', '17:42:00', '5', '5', NULL, NULL),
('14', 'sulfurico', '18:42:00', '17:42:00', NULL, NULL, NULL, NULL),
('14', 'sulfurico1', '18:42:00', '17:42:00', '5', '5', NULL, NULL),
('14', 'sostener1', '17:43:00', NULL, '5', '5', NULL, NULL),
('14', 'sostener2', NULL, NULL, '5', '5', NULL, NULL),
('14', 'sostener3', NULL, '17:45:00', '5', '5', NULL, NULL),
('14', 'enfriado1', NULL, NULL, '5', '5', NULL, NULL),
('14', 'enfriado2', NULL, NULL, '5', '5', NULL, NULL),
('14', 'carga7001', '16:43:00', NULL, '5', '5', NULL, '55'),
('14', 'carga7002', NULL, NULL, '55', '5', NULL, '5'),
('14', 'carga7003', NULL, NULL, '5', '55', NULL, '5'),
('14', 'carga7004', NULL, NULL, '5', '55', NULL, '5'),
('14', 'carga7005', NULL, '19:44:00', '5', '5', NULL, '5'),
('14', 'reaccion1', '17:44:00', NULL, '5', '5', NULL, '55'),
('14', 'reaccion2', NULL, NULL, '5', '5', NULL, '5'),
('14', 'reaccion3', NULL, NULL, '5', '5', NULL, '5'),
('14', 'reaccion4', NULL, NULL, '5', '5', NULL, '5'),
('14', 'reaccion5', NULL, NULL, '5', '5', NULL, '5'),
('14', 'reaccion6', NULL, NULL, '5', '55', NULL, '5'),
('14', 'reaccion7', NULL, '14:46:00', '5', '55', NULL, '5'),
('14', 'adicionarstw', '16:45:00', '14:48:00', '5', '5', NULL, NULL),
('14', 'ReaccionNeutra1', '17:48:00', NULL, '5', '5', NULL, '5'),
('14', 'ReaccionNeutra2', NULL, NULL, '5', '5', NULL, '5'),
('14', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, '5'),
('14', 'ReaccionNeutra4', NULL, '16:45:00', '5', '5', NULL, '5'),
('14', 'homogenizacion', '19:46:00', NULL, '5', '5', NULL, '5'),
('14', 'homogenizacion2', NULL, NULL, '5', '5', NULL, '5'),
('14', 'homogenizacion3', NULL, '16:46:00', '5', '5', NULL, '5'),
('14', 'Enfriet85-', '17:46:00', '14:46:00', '5', NULL, NULL, NULL),
('14', 'DescargaIbc', '17:48:00', '19:48:00', NULL, NULL, NULL, NULL),
('14', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('15', 'triturado', '01:00:00', '01:30:00', NULL, NULL, NULL, NULL),
('15', 'fusion', '01:55:00', '03:20:00', '95', '1', NULL, NULL),
('15', 'sulfurico', '03:20:00', '03:40:00', NULL, NULL, NULL, NULL),
('15', 'sulfurico1', '03:20:00', '03:40:00', '140', '1', NULL, NULL),
('15', 'sostener1', '04:00:00', NULL, '152', '0', NULL, NULL),
('15', 'sostener2', NULL, NULL, '152', '0', NULL, NULL),
('15', 'sostener3', NULL, '07:00:00', '152', '0', NULL, NULL),
('15', 'enfriado1', NULL, NULL, '111', '0', NULL, NULL),
('15', 'enfriado2', NULL, NULL, '101', '0', NULL, NULL),
('15', 'carga7001', '10:55:00', NULL, '69', '0', NULL, 'Continua adición .'),
('15', 'carga7002', NULL, NULL, '69', '0', NULL, 'Continua adición.'),
('15', 'carga7003', NULL, NULL, '82', '0', NULL, 'Continua adicion'),
('15', 'carga7004', NULL, NULL, '86', '1', NULL, 'Soplo de vapor'),
('15', 'carga7005', NULL, '15:30:00', '86', '1', NULL, 'Fin adición-Soplo de vapor'),
('15', 'reaccion1', '15:30:00', NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('15', 'reaccion2', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja'),
('15', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('15', 'reaccion4', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja '),
('15', 'reaccion5', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja'),
('15', 'reaccion6', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('15', 'reaccion7', NULL, '22:30:00', '100', '0', NULL, 'Fin sostener'),
('15', 'adicionarstw', '22:30:00', '23:15:00', '96', '0', NULL, NULL),
('15', 'ReaccionNeutra1', '23:35:00', NULL, '97', '0', NULL, 'Continua adición, refluja.'),
('15', 'ReaccionNeutra2', NULL, NULL, '97', '0', NULL, 'Continua adición, refluja.'),
('15', 'ReaccionNeutra3', NULL, NULL, '96', '0', NULL, 'Continua adición, refluja.'),
('15', 'ReaccionNeutra4', NULL, '04:10:00', '96', '0', NULL, 'Continua adición, refluja'),
('15', 'homogenizacion', '04:10:00', NULL, '95', '0', NULL, 'Proceso sostenido'),
('15', 'homogenizacion2', NULL, NULL, '95', '0', NULL, 'Proceso sostenido'),
('15', 'homogenizacion3', NULL, '08:00:00', '95', '0', NULL, 'Proceso sostenido'),
('15', 'Enfriet85-', '08:00:00', '09:15:00', '95', NULL, NULL, NULL),
('15', 'DescargaIbc', '00:00:00', '13:30:00', NULL, NULL, NULL, NULL),
('15', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('16', 'sulfurico', '18:17:00', '15:19:00', NULL, NULL, NULL, NULL),
('16', 'sulfurico1', '18:17:00', '15:19:00', '5', '5', NULL, NULL),
('16', 'sostener1', '20:17:00', NULL, '5', '5', NULL, NULL),
('16', 'sostener2', NULL, NULL, '5', '5', NULL, NULL),
('16', 'sostener3', NULL, '19:20:00', '5', '5', NULL, NULL),
('16', 'enfriado1', NULL, NULL, '5', '5', NULL, NULL),
('16', 'enfriado2', NULL, NULL, '5', '5', NULL, NULL),
('16', 'carga7001', '20:18:00', NULL, '5', '5', NULL, 'klk'),
('16', 'carga7002', NULL, NULL, '54', '54', NULL, '6565'),
('16', 'carga7003', NULL, NULL, '8565', '656', NULL, '565'),
('16', 'carga7004', NULL, NULL, '6565', '65', NULL, '656'),
('16', 'carga7005', NULL, '20:23:00', '5565', '656', NULL, '55'),
('16', 'reaccion1', '19:18:00', NULL, '5', '5', NULL, '5'),
('16', 'reaccion2', NULL, NULL, '5', '5', NULL, '5'),
('16', 'reaccion3', NULL, NULL, '5', '5', NULL, '5'),
('16', 'reaccion4', NULL, NULL, '5', '5', NULL, '5'),
('16', 'reaccion5', NULL, NULL, '5', '5', NULL, '5'),
('16', 'reaccion6', NULL, NULL, '5', '5', NULL, '5'),
('16', 'reaccion7', NULL, '15:21:00', '5', '5', NULL, '5'),
('16', 'adicionarstw', '17:19:00', '17:19:00', '5', '5', NULL, NULL),
('16', 'ReaccionNeutra1', '17:19:00', NULL, '5', '5', NULL, '5'),
('16', 'ReaccionNeutra2', NULL, NULL, '5', '5', NULL, '5'),
('16', 'ReaccionNeutra3', NULL, NULL, '5', '5', NULL, '5'),
('16', 'ReaccionNeutra4', NULL, '19:19:00', '5', '5', NULL, '5'),
('16', 'homogenizacion', '15:23:00', NULL, '5', '5', NULL, '5'),
('16', 'homogenizacion2', NULL, NULL, '5', '5', NULL, '5'),
('16', 'homogenizacion3', NULL, '18:20:00', '5', '5', NULL, '5'),
('16', 'Enfriet85-', '17:05:00', '17:06:00', '55', NULL, NULL, NULL),
('16', 'DescargaIbc', '19:21:00', '21:26:00', NULL, NULL, NULL, NULL),
('16', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('17', 'triturado', '23:15:00', '00:20:00', NULL, NULL, NULL, NULL),
('17', 'fusion', '01:40:00', '01:59:00', '97', '1', NULL, NULL),
('17', 'sulfurico', '01:50:00', '02:15:00', NULL, NULL, NULL, NULL),
('17', 'sulfurico1', '01:50:00', '02:15:00', '147', '1', NULL, NULL),
('17', 'sostener1', '02:20:00', NULL, '153', '0', NULL, NULL),
('17', 'sostener2', NULL, NULL, '153', '0', NULL, NULL),
('17', 'sostener3', NULL, '05:20:00', '153', '0', NULL, NULL),
('17', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('17', 'enfriado2', NULL, NULL, '101', '0', NULL, NULL),
('17', 'carga7001', '09:45:00', NULL, '97', '0', NULL, 'Continua adición .'),
('17', 'carga7002', NULL, NULL, '100', '0', NULL, 'Continua adición.'),
('17', 'carga7003', NULL, NULL, '101', '0', NULL, 'Continua adicion'),
('17', 'carga7004', NULL, NULL, '104', '0', NULL, 'Continua adición '),
('17', 'carga7005', NULL, '15:20:00', '99', '0', NULL, 'Fin adición-Soplo de vapor'),
('17', 'reaccion1', '15:20:00', NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('17', 'reaccion2', NULL, NULL, '100', '0', NULL, ''),
('17', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('17', 'reaccion4', NULL, NULL, '99', '0', NULL, 'Proceso sostenido, refluja '),
('17', 'reaccion5', NULL, NULL, '99', '0', NULL, 'Proceso sostenido, refluja'),
('17', 'reaccion6', NULL, NULL, '97', '0', NULL, 'Proceso sostenido, refluja'),
('17', 'reaccion7', NULL, '22:40:00', '97', '0', NULL, 'Fin sostener'),
('17', 'adicionarstw', '22:40:00', '23:00:00', '97', '0', NULL, NULL),
('17', 'ReaccionNeutra1', '00:10:00', NULL, '97', '0', NULL, 'Continua adición'),
('17', 'ReaccionNeutra2', NULL, NULL, '97', '0', NULL, 'Continua adición'),
('17', 'ReaccionNeutra3', NULL, NULL, '97', '0', NULL, 'Continua adición'),
('17', 'ReaccionNeutra4', NULL, '04:55:00', '96', '0', NULL, 'Fin de adición'),
('17', 'homogenizacion', '04:55:00', NULL, '96', '0', NULL, 'Proceso sostenido'),
('17', 'homogenizacion2', NULL, NULL, '97', '0', NULL, 'Proceso sostenido'),
('17', 'homogenizacion3', NULL, '08:00:00', '94', '0', NULL, 'Proceso sostenido'),
('17', 'Enfriet85-', '09:40:00', '10:40:00', '94', NULL, NULL, NULL),
('17', 'DescargaIbc', '13:00:00', '16:20:00', NULL, NULL, NULL, NULL),
('17', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('18', 'triturado', '18:18:00', '21:18:00', NULL, NULL, NULL, NULL),
('18', 'fusion', '20:19:00', '19:19:00', '5', '5', NULL, NULL),
('18', 'sulfurico', '19:19:00', '18:19:00', NULL, NULL, NULL, NULL),
('18', 'sulfurico1', '19:19:00', '18:19:00', '5', '5', NULL, NULL),
('18', 'sostener1', '22:20:00', NULL, '5', '5', NULL, NULL),
('18', 'sostener2', NULL, NULL, '5', '5', NULL, NULL),
('18', 'sostener3', NULL, '20:20:00', '5', '5', NULL, NULL),
('18', 'enfriado1', NULL, NULL, '5', '5', NULL, NULL),
('18', 'enfriado2', NULL, NULL, '5', '5', NULL, NULL),
('18', 'carga7001', '18:21:00', NULL, '5', '5', NULL, 'NKJK'),
('18', 'carga7002', NULL, NULL, '5', '5', NULL, 'LKLK'),
('18', 'carga7003', NULL, NULL, '65', '5654', NULL, 'KL'),
('18', 'carga7004', NULL, NULL, '564', '54', NULL, 'IJJJ'),
('18', 'carga7005', NULL, '19:21:00', '565', '65', NULL, 'KLK'),
('18', 'reaccion1', '18:22:00', NULL, '655656', '45645', NULL, 'kjklj'),
('18', 'reaccion2', NULL, NULL, '45', '4', NULL, 'kj'),
('18', 'reaccion3', NULL, NULL, '55', '55', NULL, 'kjkl'),
('18', 'reaccion4', NULL, NULL, '65', '65', NULL, 'jjlk'),
('18', 'reaccion5', NULL, NULL, '655', '565', NULL, 'kjj'),
('18', 'reaccion6', NULL, NULL, '56', '565', NULL, 'lkñl'),
('18', 'reaccion7', NULL, '21:22:00', '655', '565', NULL, 'kñlñl'),
('18', 'adicionarstw', '14:01:00', '14:40:00', '60', '0', NULL, NULL),
('18', 'ReaccionNeutra1', '15:00:00', NULL, '49', '0', NULL, 'Continua adición, refluja.'),
('18', 'ReaccionNeutra2', NULL, NULL, '50', '0', NULL, 'Continua adición, refluja.'),
('18', 'ReaccionNeutra3', NULL, NULL, '60', '0', NULL, 'Continua adición, refluja.'),
('18', 'ReaccionNeutra4', NULL, '17:00:00', '50', '0', NULL, 'Continua adición, refluja'),
('18', 'homogenizacion', '17:00:00', NULL, '40', '0', NULL, 'Proceso sostenido'),
('18', 'homogenizacion2', NULL, NULL, '50', '0', NULL, 'Proceso sostenido'),
('18', 'homogenizacion3', NULL, '19:00:00', '70', '0', NULL, 'Proceso sostenido'),
('18', 'Enfriet85-', '19:00:00', '20:00:00', '', NULL, NULL, NULL),
('18', 'DescargaIbc', '17:00:00', '18:00:00', NULL, NULL, NULL, NULL),
('18', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('19', 'triturado', '02:00:00', '02:30:00', NULL, NULL, NULL, NULL),
('19', 'fusion', '02:40:00', '15:00:00', '100', '20', NULL, NULL),
('19', 'sulfurico', '15:00:00', '15:20:00', NULL, NULL, NULL, NULL),
('19', 'sulfurico1', '15:00:00', '15:20:00', '100', '30', NULL, NULL),
('19', 'sostener1', '16:00:00', NULL, '150', '30', NULL, NULL),
('19', 'sostener2', NULL, NULL, '150', '30', NULL, NULL),
('19', 'sostener3', NULL, '17:00:00', '150', '30', NULL, NULL),
('19', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('19', 'enfriado2', NULL, NULL, '90', '0', NULL, NULL),
('19', 'carga7001', '17:00:00', NULL, '100', '0', NULL, 'Continua adición .'),
('19', 'carga7002', NULL, NULL, '100', '0', NULL, 'Continua adición.'),
('19', 'carga7003', NULL, NULL, '100', '0', NULL, 'Continua adicion'),
('19', 'carga7004', NULL, NULL, '100', '0', NULL, 'Continua adición '),
('19', 'carga7005', NULL, '20:00:00', '100', '0', NULL, 'Fin adición'),
('19', 'reaccion1', '01:00:00', NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('19', 'reaccion2', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('19', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('19', 'reaccion4', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja '),
('19', 'reaccion5', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('19', 'reaccion6', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('19', 'reaccion7', NULL, '07:00:00', '100', '0', NULL, 'Fin sostener'),
('19', 'adicionarstw', '15:00:00', '16:00:00', '100', '0', NULL, NULL),
('19', 'ReaccionNeutra1', '17:00:00', NULL, '100', '0', NULL, 'Continua adición, refluja.'),
('19', 'ReaccionNeutra2', NULL, NULL, '100', '0', NULL, 'Continua adición, refluja.'),
('19', 'ReaccionNeutra3', NULL, NULL, '100', '0', NULL, 'Continua adición, refluja.'),
('19', 'ReaccionNeutra4', NULL, '20:00:00', '100', '0', NULL, 'Continua adición, refluja'),
('19', 'homogenizacion', '20:00:00', NULL, '100', '0', NULL, 'Proceso sostenido'),
('19', 'homogenizacion2', NULL, NULL, '100', '0', NULL, '100'),
('19', 'homogenizacion3', NULL, '22:00:00', '100', '0', NULL, '100'),
('19', 'Enfriet85-', '10:00:00', '10:30:00', '90', NULL, NULL, NULL),
('19', 'DescargaIbc', '22:00:00', '22:40:00', NULL, NULL, NULL, NULL),
('19', 'PasoFinal', '10:00:00', '12:00:00', NULL, NULL, NULL, NULL),
('20', 'triturado', '22:00:00', '22:00:00', NULL, NULL, NULL, NULL),
('20', 'fusion', '23:00:00', '22:00:00', '100', '0', NULL, NULL),
('20', 'sulfurico', '23:00:00', '12:00:00', NULL, NULL, NULL, NULL),
('20', 'sulfurico1', '23:00:00', '12:00:00', '100', '90', NULL, NULL),
('20', 'sostener1', '15:00:00', NULL, '100', '0', NULL, NULL),
('20', 'sostener2', NULL, NULL, '100', '0', NULL, NULL),
('20', 'sostener3', NULL, '18:00:00', '100', '0', NULL, NULL),
('20', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('20', 'enfriado2', NULL, NULL, '100', '20', NULL, NULL),
('20', 'carga7001', '22:00:00', NULL, '100', '90', NULL, 'Continua adición .'),
('20', 'carga7002', NULL, NULL, '100', '80', NULL, 'Continua adición.'),
('20', 'carga7003', NULL, NULL, '100', '0', NULL, 'Continua adicion'),
('20', 'carga7004', NULL, NULL, '100', '0', NULL, 'Continua adición '),
('20', 'carga7005', NULL, '02:00:00', '100', '0', NULL, 'Fin adición'),
('20', 'reaccion1', '10:00:00', NULL, '100', '60', NULL, 'Proceso sostenido, refluja'),
('20', 'reaccion2', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('20', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('20', 'reaccion4', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja '),
('20', 'reaccion5', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('20', 'reaccion6', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('20', 'reaccion7', NULL, '17:00:00', '100', '0', NULL, 'Fin sostener'),
('20', 'adicionarstw', '17:00:00', '18:00:00', '100', '0', NULL, NULL),
('20', 'ReaccionNeutra1', '17:00:00', NULL, '100', '0', NULL, 'Continua adición, refluja.'),
('20', 'ReaccionNeutra2', NULL, NULL, '100', '0', NULL, '100'),
('20', 'ReaccionNeutra3', NULL, NULL, '100', '0', NULL, 'Continua adición, refluja.'),
('20', 'ReaccionNeutra4', NULL, '21:00:00', '100', '0', NULL, 'Continua adición, refluja'),
('20', 'homogenizacion', '21:00:00', NULL, '100', '0', NULL, 'Proceso sostenido'),
('20', 'homogenizacion2', NULL, NULL, '100', '0', NULL, 'Proceso sostenido'),
('20', 'homogenizacion3', NULL, '00:00:00', '100', '0', NULL, 'Proceso sostenido'),
('20', 'Enfriet85-', '16:00:00', '17:00:00', '100', NULL, NULL, NULL),
('20', 'DescargaIbc', '16:00:00', '17:00:00', NULL, NULL, NULL, NULL),
('20', 'PasoFinal', '18:00:00', '19:00:00', NULL, NULL, NULL, NULL),
('21', 'triturado', '09:13:00', '09:14:00', NULL, NULL, NULL, NULL),
('21', 'fusion', '09:20:00', '02:14:00', '122', '21', NULL, NULL),
('21', 'sulfurico', '09:15:00', '09:20:00', NULL, NULL, NULL, NULL),
('21', 'sulfurico1', '09:15:00', '09:20:00', '221', '22', NULL, NULL),
('21', 'sostener1', '09:15:00', NULL, '23', '21', NULL, NULL),
('21', 'sostener2', NULL, NULL, '23', '21', NULL, NULL),
('21', 'sostener3', NULL, '09:15:00', '23', '21', NULL, NULL),
('21', 'enfriado1', NULL, NULL, '231', '123', NULL, NULL),
('21', 'enfriado2', NULL, NULL, '123', '321', NULL, NULL),
('21', 'carga7001', '09:16:00', NULL, '123', '12', NULL, 'Continua adición .'),
('21', 'carga7002', NULL, NULL, '12', '21', NULL, 'Continua adición.'),
('21', 'carga7003', NULL, NULL, '123', '21', NULL, 'Continua adicion'),
('21', 'carga7004', NULL, NULL, '13', '123', NULL, 'Continua adición '),
('21', 'carga7005', NULL, '09:20:00', '123', '231', NULL, ' fin'),
('21', 'reaccion1', '10:17:00', NULL, '123', '13', NULL, 'Proceso sostenido, refluja'),
('21', 'reaccion2', NULL, NULL, '131', '123', NULL, 'Proceso sostenido, refluja'),
('21', 'reaccion3', NULL, NULL, '123', '23', NULL, 'Proceso sostenido, refluja'),
('21', 'reaccion4', NULL, NULL, '12', '123', NULL, 'Proceso sostenido, refluja '),
('21', 'reaccion5', NULL, NULL, '123', '123', NULL, 'Proceso sostenido'),
('21', 'reaccion6', NULL, NULL, '213', '123', NULL, 'Proceso sostenido, refluja'),
('21', 'reaccion7', NULL, '02:18:00', '123', '12', NULL, 'Fin sostener'),
('21', 'adicionarstw', '11:18:00', '03:19:00', '123', '131', NULL, NULL),
('21', 'ReaccionNeutra1', '01:19:00', NULL, '123', '13', NULL, 'Continua adición, refluja.'),
('21', 'ReaccionNeutra2', NULL, NULL, '123', '12', NULL, 'Continua adición, refluja.'),
('21', 'ReaccionNeutra3', NULL, NULL, '123', '21', NULL, 'Continua adición, refluja.'),
('21', 'ReaccionNeutra4', NULL, '02:20:00', '123', '21', NULL, 'Continua adición, refluja'),
('21', 'homogenizacion', '09:25:00', NULL, '123', '123', NULL, 'Proceso sostenido'),
('21', 'homogenizacion2', NULL, NULL, '123', '21', NULL, 'Proceso sostenido'),
('21', 'homogenizacion3', NULL, '09:20:00', '132', '23', NULL, 'Proceso sostenido'),
('21', 'Enfriet85-', '03:20:00', '02:20:00', '123', NULL, NULL, NULL),
('21', 'DescargaIbc', '09:24:00', '09:24:00', NULL, NULL, NULL, NULL),
('21', 'PasoFinal', '09:29:00', '03:23:00', NULL, NULL, NULL, NULL),
('25', 'triturado', '15:20:00', '15:50:00', NULL, NULL, NULL, NULL),
('25', 'fusion', '16:00:00', '17:05:00', '90', '60', NULL, NULL),
('25', 'sulfurico', '17:50:00', '17:50:00', NULL, NULL, NULL, NULL),
('25', 'sulfurico1', '17:50:00', '17:50:00', '155', '60', NULL, NULL),
('25', 'sostener1', '17:50:00', NULL, '154', '0', NULL, NULL),
('25', 'sostener2', NULL, NULL, '154', '0', NULL, NULL),
('25', 'sostener3', NULL, '20:50:00', '154', '0', NULL, NULL),
('25', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('25', 'enfriado2', NULL, NULL, '88', '0', NULL, NULL),
('25', 'carga7001', '23:00:00', NULL, '90', '', NULL, 'Continua adición '),
('25', 'carga7002', NULL, NULL, '100', '0', NULL, 'Continua adición '),
('25', 'carga7003', NULL, NULL, '102', '0', NULL, 'Continua adición'),
('25', 'carga7004', NULL, NULL, '101', '0', NULL, 'Fin adición, sostiene 7 horas '),
('25', 'carga7005', NULL, '03:15:00', '', '', NULL, ''),
('25', 'reaccion1', '03:15:00', NULL, '101', '0', NULL, 'Proceso sostenido'),
('25', 'reaccion2', NULL, NULL, '100', '0', NULL, 'Proceso sostenido'),
('25', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido'),
('25', 'reaccion4', NULL, NULL, '101', '5', NULL, 'Proceso sostenido'),
('25', 'reaccion5', NULL, NULL, '101', '5', NULL, 'Proceso sostenido'),
('25', 'reaccion6', NULL, NULL, '101', '5', NULL, 'Proceso sostenido'),
('25', 'reaccion7', NULL, '10:15:00', '100', '0', NULL, 'Fin sostener.'),
('25', 'adicionarstw', '10:15:00', '10:30:00', '100', '0', NULL, NULL),
('26', 'triturado', '15:20:00', '15:50:00', NULL, NULL, NULL, NULL),
('26', 'fusion', '16:00:00', '17:05:00', '99', '60', NULL, NULL),
('26', 'sulfurico', '15:50:00', '17:05:00', NULL, NULL, NULL, NULL),
('26', 'sulfurico1', '15:50:00', '17:05:00', '155', '60', NULL, NULL),
('26', 'sostener1', '17:50:00', NULL, '154', '0', NULL, NULL),
('26', 'sostener2', NULL, NULL, '154', '0', NULL, NULL),
('26', 'sostener3', NULL, '20:50:00', '154', '0', NULL, NULL),
('26', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('26', 'enfriado2', NULL, NULL, '88', '0', NULL, NULL),
('26', 'carga7001', '23:00:00', NULL, '90', '0', NULL, 'Continua adición.'),
('26', 'carga7002', NULL, NULL, '100', '0', NULL, 'Continua adición.'),
('26', 'carga7003', NULL, NULL, '102', '0', NULL, 'Continua adición.'),
('26', 'carga7004', NULL, NULL, '101', '0', NULL, 'Fin adición, sostiene 7 horas'),
('26', 'carga7005', NULL, '03:15:00', '', '', NULL, ''),
('26', 'reaccion1', '03:15:00', NULL, '101', '0', NULL, 'Proceso sostenido, refluja'),
('26', 'reaccion2', NULL, NULL, '100', '', NULL, 'Proceso sostenido, refluja'),
('26', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja'),
('26', 'reaccion4', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja '),
('26', 'reaccion5', NULL, NULL, '101', '5', NULL, 'Proceso sostenido, refluja'),
('26', 'reaccion6', NULL, NULL, '101', '5', NULL, 'Proceso sostenido, refluja'),
('26', 'reaccion7', NULL, '10:15:00', '100', '0', NULL, 'Fin sostener'),
('27', 'triturado', '22:00:00', '22:40:00', NULL, NULL, NULL, NULL),
('27', 'fusion', '23:20:00', '00:05:00', '100', '0', NULL, NULL),
('27', 'sulfurico', '22:40:00', '23:20:00', NULL, NULL, NULL, NULL),
('27', 'sulfurico1', '22:40:00', '23:20:00', '150', '1', NULL, NULL),
('27', 'sostener1', '00:35:00', NULL, '150', '1', NULL, NULL),
('27', 'sostener2', NULL, NULL, '150', '1', NULL, NULL),
('27', 'sostener3', NULL, '03:30:00', '150', '1', NULL, NULL),
('27', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('27', 'enfriado2', NULL, NULL, '84', '0', NULL, NULL),
('27', 'carga7001', '05:25:00', NULL, '84', '0', NULL, 'Continua adición.'),
('27', 'carga7002', NULL, NULL, '85', '0', NULL, 'Continua adición.'),
('27', 'carga7003', NULL, NULL, '85', '0', NULL, 'Continua adición.'),
('27', 'carga7004', NULL, NULL, '85', '0', NULL, 'Continua adición.'),
('27', 'carga7005', NULL, '10:20:00', '100', '0', NULL, 'Fin adición, sostiene 7 horas.'),
('27', 'reaccion1', '10:20:00', NULL, '101', '0', NULL, 'Proceso sostenido, refluja.'),
('27', 'reaccion2', NULL, NULL, '101', '0', NULL, 'Proceso sostenido, refluja.'),
('27', 'reaccion3', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja.'),
('27', 'reaccion4', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja.'),
('27', 'reaccion5', NULL, NULL, '100', '0', NULL, 'Proceso sostenido, refluja.'),
('27', 'reaccion6', NULL, NULL, '99', '0', NULL, 'Proceso sostenido, refluja.'),
('27', 'reaccion7', NULL, '17:25:00', '97', '0', NULL, 'Fin de proceso sostenido.'),
('27', 'adicionarstw', '17:25:00', '17:45:00', '97', '0', NULL, NULL),
('27', 'ReaccionNeutra1', '18:00:00', NULL, '97', '0', NULL, 'Continua adición, refluja.'),
('27', 'ReaccionNeutra2', NULL, NULL, '96', '0', NULL, 'Continua adición, refluja.'),
('27', 'ReaccionNeutra3', NULL, NULL, '95', '0', NULL, 'Continua adición, refluja.'),
('27', 'ReaccionNeutra4', NULL, '23:50:00', '95', '0', NULL, 'Continua adición, refluja.'),
('27', 'homogenizacion', '23:50:00', NULL, '96', '0', NULL, 'Proceso sostenido'),
('27', 'homogenizacion2', NULL, NULL, '96', '0', NULL, 'Proceso sostenido'),
('27', 'homogenizacion3', NULL, '03:50:00', '94', '0', NULL, 'Proceso sostenido'),
('27', 'Enfriet85-', '03:50:00', '05:00:00', '94', NULL, NULL, NULL),
('28', 'triturado', '23:15:00', '00:20:00', NULL, NULL, NULL, NULL),
('28', 'fusion', '01:40:00', '01:50:00', '97', '1', NULL, NULL),
('28', 'sulfurico', '00:25:00', '00:25:00', NULL, NULL, NULL, NULL),
('28', 'sulfurico1', '00:25:00', '00:25:00', '150', '1', NULL, NULL),
('28', 'sostener1', '02:20:00', NULL, '153', '0', NULL, NULL),
('28', 'sostener2', NULL, NULL, '153', '0', NULL, NULL),
('28', 'sostener3', NULL, '05:20:00', '153', '0', NULL, NULL),
('28', 'enfriado1', NULL, NULL, '101', '0', NULL, NULL),
('28', 'enfriado2', NULL, NULL, '101', '0', NULL, NULL),
('32', 'triturado', '23:00:00', '23:25:00', NULL, NULL, NULL, NULL),
('32', 'fusion', '01:00:00', '01:10:00', '96', '40', NULL, NULL),
('32', 'sulfurico', '23:40:00', '01:10:00', NULL, NULL, NULL, NULL),
('32', 'sulfurico1', '23:40:00', '01:10:00', '138', '40', NULL, NULL),
('32', 'sostener1', '01:40:00', NULL, '150', '40', NULL, NULL),
('32', 'sostener2', NULL, NULL, '150', '40', NULL, NULL),
('32', 'sostener3', NULL, '04:45:00', '150', '40', NULL, NULL),
('32', 'enfriado1', NULL, NULL, '100', '0', NULL, NULL),
('32', 'enfriado2', NULL, NULL, '87', '0', NULL, NULL),
('32', 'reaccion1', '10:20:00', NULL, '101', '0', NULL, 'Proceso sostenido.'),
('32', 'reaccion2', NULL, NULL, '97', '0', NULL, 'Proceso sostenido.'),
('32', 'reaccion3', NULL, NULL, '96', '0', NULL, 'Proceso sostenido.'),
('32', 'reaccion4', NULL, NULL, '96', '0', NULL, 'Proceso sostenido.'),
('32', 'reaccion5', NULL, NULL, '95', '0', NULL, 'Proceso sostenido.'),
('32', 'reaccion6', NULL, NULL, '95', '0', NULL, 'Proceso sostenido.'),
('32', 'reaccion7', NULL, '17:20:00', '93', '0', NULL, 'Fin sostener'),
('32', 'carga7001', '06:35:00', NULL, '102', '0', NULL, 'Continua adición .'),
('32', 'carga7002', NULL, NULL, '102', '0', NULL, 'Continua adición.'),
('32', 'carga7003', NULL, NULL, '101', '0', NULL, 'Continua adición.'),
('32', 'carga7004', NULL, NULL, '95', '0', NULL, 'Fin adición, sostiene 7 horas.'),
('32', 'carga7005', NULL, '10:20:00', '', '', NULL, ''),
('32', 'adicionarstw', '17:20:00', '17:45:00', '93', '0', NULL, NULL),
('32', 'ReaccionNeutra1', '18:00:00', NULL, '96', '0', NULL, 'Continua adición, refluja.'),
('32', 'ReaccionNeutra2', NULL, NULL, '97', '0', NULL, 'Continua adición, refluja.'),
('32', 'ReaccionNeutra3', NULL, NULL, '97', '0', NULL, 'Continua adición, refluja.'),
('32', 'ReaccionNeutra4', NULL, '23:50:00', '97', '0', NULL, 'Continua adición, refluja'),
('32', 'homogenizacion', '01:00:00', NULL, '96', '0', NULL, 'Proceso sostenido'),
('32', 'homogenizacion2', NULL, NULL, '94', '0', NULL, ''),
('32', 'homogenizacion3', NULL, '04:00:00', '92', '0', NULL, ''),
('32', 'Enfriet85-', '04:00:00', '05:20:00', '92', NULL, NULL, NULL),
('32', 'DescargaIbc', '15:30:00', '17:30:00', NULL, NULL, NULL, NULL),
('32', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('33', 'triturado', '14:13:00', '12:12:00', NULL, NULL, NULL, NULL),
('33', 'fusion', '12:12:00', '12:12:00', '12', '12', NULL, NULL),
('33', 'sulfurico', '00:12:00', '12:12:00', NULL, NULL, NULL, NULL),
('33', 'sulfurico1', '00:12:00', '12:12:00', '12', '12', NULL, NULL),
('33', 'sostener1', '12:12:00', NULL, '12', '12', NULL, NULL),
('33', 'sostener2', NULL, NULL, '12', '12', NULL, NULL),
('33', 'sostener3', NULL, '12:12:00', '12', '12', NULL, NULL),
('33', 'enfriado1', NULL, NULL, '12', '12', NULL, NULL),
('33', 'enfriado2', NULL, NULL, '21', '212', NULL, NULL),
('33', 'carga7001', '12:12:00', NULL, '12', '', NULL, ' c'),
('33', 'carga7002', NULL, NULL, '21', '12', NULL, 'Continua adición.'),
('33', 'carga7003', NULL, NULL, '12', '12', NULL, 'Continua adicion'),
('33', 'carga7004', NULL, NULL, '12', '12', NULL, '12'),
('33', 'carga7005', NULL, '12:12:00', '12', '12', NULL, '2'),
('33', 'reaccion1', '12:21:00', NULL, '21', '', NULL, ''),
('33', 'reaccion2', NULL, NULL, '12', '12', NULL, ''),
('33', 'reaccion3', NULL, NULL, '12', '', NULL, '2'),
('33', 'reaccion4', NULL, NULL, '21', '', NULL, 'Proceso sostenido, refluja '),
('33', 'reaccion5', NULL, NULL, '12', '', NULL, 'Proceso sostenido, refluja'),
('33', 'reaccion6', NULL, NULL, '12', '', NULL, 'Proceso sostenido, refluja'),
('33', 'reaccion7', NULL, '12:12:00', '12', '', NULL, 'Fin sostener'),
('33', 'adicionarstw', '12:21:00', '14:22:00', '21', '122', NULL, NULL),
('33', 'ReaccionNeutra1', '12:12:00', NULL, '12', '12', NULL, ''),
('33', 'ReaccionNeutra2', NULL, NULL, '122', '122', NULL, ''),
('33', 'ReaccionNeutra3', NULL, NULL, '212', '', NULL, ''),
('33', 'ReaccionNeutra4', NULL, '12:22:00', '12', '', NULL, ''),
('33', 'homogenizacion', '12:21:00', NULL, '12', '21', NULL, ''),
('33', 'homogenizacion2', NULL, NULL, '12', '12', NULL, ''),
('33', 'homogenizacion3', NULL, '12:12:00', '121', '12', NULL, ''),
('33', 'Enfriet85-', '00:12:00', '12:12:00', '12', NULL, NULL, NULL),
('33', 'DescargaIbc', '12:12:00', '02:12:00', NULL, NULL, NULL, NULL),
('33', 'PasoFinal', NULL, NULL, NULL, NULL, NULL, NULL),
('35', 'triturado', '10:50:00', '11:00:00', NULL, NULL, NULL, NULL),
('35', 'fusion', '00:00:00', '04:01:00', '10', '25', NULL, NULL),
('35', 'sulfurico', '10:00:00', '10:00:00', NULL, NULL, NULL, NULL),
('35', 'sulfurico1', '10:00:00', '10:00:00', '10', '10', NULL, NULL),
('35', 'sostener1', '10:10:00', NULL, '10', '10', NULL, NULL),
('35', 'sostener2', NULL, NULL, '10', '10', NULL, NULL),
('35', 'sostener3', NULL, '10:10:00', '10', '10', NULL, NULL),
('35', 'enfriado1', NULL, NULL, '10', '10', NULL, NULL),
('35', 'enfriado2', NULL, NULL, '10', '10', NULL, NULL),
('35', 'carga7001', '11:11:00', NULL, '3', '10', NULL, ''),
('35', 'carga7002', NULL, NULL, '10', '10', NULL, ''),
('35', 'carga7003', NULL, NULL, '10', '10', NULL, ''),
('35', 'carga7004', NULL, NULL, '10', '9', NULL, ''),
('35', 'carga7005', NULL, '10:10:00', '10', '10', NULL, ''),
('35', 'Enfriet85-', '10:10:00', '10:10:00', '10', NULL, NULL, NULL),
('35', 'DescargaIbc', '10:10:00', '10:10:00', NULL, NULL, NULL, NULL),
('35', 'PasoFinal', '10:10:00', '10:10:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materiaprima`
--

CREATE TABLE `materiaprima` (
  `IdRegMateriaPrima` int(11) NOT NULL,
  `nan000` varchar(10) DEFAULT '-1',
  `fdo037` varchar(10) DEFAULT '''-1''',
  `myo000` varchar(10) DEFAULT '''-1''',
  `stw0002` varchar(10) DEFAULT '''-1''',
  `csc050` varchar(10) DEFAULT '''-1''',
  `stw0003` varchar(10) DEFAULT '''-1''',
  `swf098` varchar(10) DEFAULT '-1',
  `stw000` varchar(10) DEFAULT '-1',
  `too00` float(5,2) NOT NULL DEFAULT -1.00,
  `torec0` float(5,2) NOT NULL DEFAULT -1.00,
  `sso000` float(5,2) NOT NULL DEFAULT -1.00,
  `glg000` float(5,2) NOT NULL DEFAULT -1.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materiaprima`
--

INSERT INTO `materiaprima` (`IdRegMateriaPrima`, `nan000`, `fdo037`, `myo000`, `stw0002`, `csc050`, `stw0003`, `swf098`, `stw000`, `too00`, `torec0`, `sso000`, `glg000`) VALUES
(1, '12', '2', '2', '2', '2', '2', '2', '2', -1.00, -1.00, -1.00, -1.00),
(2, '2', '5', '5', '6', '6', '6', '3', '4', -1.00, -1.00, -1.00, -1.00),
(3, '55', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(4, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(5, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(6, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(7, '555', '6', '6', '6', '6', '6', '6', '6', -1.00, -1.00, -1.00, -1.00),
(8, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(9, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(10, '25', '54', '54', '54', '54', '54', '55', '54', -1.00, -1.00, -1.00, -1.00),
(11, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(12, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(13, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(14, '3', '3', '3', '3', '3', '3', '3', '3', -1.00, -1.00, -1.00, -1.00),
(15, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(16, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(17, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(18, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(19, '100', '100', '100', '100', '100', '100', '100', '100', -1.00, -1.00, -1.00, -1.00),
(20, '100', '100', '100', '100', '100', '100', '100', '100', -1.00, -1.00, -1.00, -1.00),
(21, '21', '121', '12', '12', '12', '21', '12', '12', -1.00, -1.00, -1.00, -1.00),
(22, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(23, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(24, '5', '5', '5', '5', '5', '5', '5', '5', -1.00, -1.00, -1.00, -1.00),
(25, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(26, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(27, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(28, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(29, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(30, '900', '630', '50', '81', '900', '322', '840', '369', -1.00, -1.00, -1.00, -1.00),
(31, '5454', '5', '5', '5', '5', '5', '656', '5', -1.00, -1.00, -1.00, -1.00),
(32, '1000', '528', '38', '69', '700', '520', '700', '252', -1.00, -1.00, -1.00, -1.00),
(33, '21', '12', '212', '12', '21', '12', '21', '12', -1.00, -1.00, -1.00, -1.00),
(34, '', '', '', '', '', '', '', '', -1.00, -1.00, -1.00, -1.00),
(35, '10', '10', '10', '10', '10', '10', '10', '10', -1.00, -1.00, -1.00, -1.00),
(36, '12', '12', '11', '12', '12', '12', '12', '12', -1.00, -1.00, -1.00, -1.00);

-- --------------------------------------------------------

--
-- Table structure for table `nfo`
--

CREATE TABLE `nfo` (
  `IdProceso` int(11) NOT NULL,
  `nfo` varchar(50) NOT NULL,
  `numeroLote` varchar(50) NOT NULL,
  `MatPriFP04` varchar(2) DEFAULT NULL,
  `MatPriSeparada` varchar(2) DEFAULT NULL,
  `MateriaPrimacol` varchar(2) DEFAULT NULL,
  `ReactorLimpio` varchar(50) DEFAULT NULL,
  `HermeticidadReactor` varchar(50) DEFAULT NULL,
  `ReactorFunciona` varchar(50) DEFAULT NULL,
  `VacioFunciona` varchar(50) DEFAULT NULL,
  `VaporFunciona` varchar(50) DEFAULT NULL,
  `EnfriamientoFunciona` varchar(50) DEFAULT NULL,
  `EmisionesFunciona` varchar(50) DEFAULT NULL,
  `phsodatanque` varchar(50) DEFAULT NULL,
  `CondensadorFunciona` varchar(50) DEFAULT NULL,
  `ApruebaInicio` varchar(2) DEFAULT NULL,
  `RazonesNoAprob` varchar(200) DEFAULT NULL,
  `SeguridadNaftaleno` varchar(2) DEFAULT NULL,
  `EquipoNaftaleno` varchar(2) DEFAULT NULL,
  `EnfriamientoCerrado` varchar(2) DEFAULT NULL,
  `ValvBloqueo` varchar(2) DEFAULT NULL,
  `AbrirControlOlores` varchar(2) DEFAULT NULL,
  `Estartazos` varchar(2) DEFAULT NULL,
  `AgitadorOk` varchar(2) DEFAULT NULL,
  `ProblemaFund` varchar(2) DEFAULT NULL,
  `ProblemaFundirNaf` varchar(200) DEFAULT NULL,
  `SeguridadSulfurico` varchar(2) DEFAULT NULL,
  `EquipoSulfurico` varchar(2) DEFAULT NULL,
  `Vapor` varchar(2) DEFAULT NULL,
  `ProblemaSWFO` varchar(2) DEFAULT NULL,
  `TextoProblemaSWFO` varchar(500) DEFAULT NULL,
  `CierreControlOlores` varchar(2) DEFAULT NULL,
  `EvacuarCamisa` varchar(2) DEFAULT NULL,
  `SuministroVapor` varchar(2) DEFAULT NULL,
  `SeguridadFDO` varchar(2) DEFAULT NULL,
  `EquipoFDO` varchar(2) DEFAULT NULL,
  `LineaTierraOk` varchar(2) DEFAULT NULL,
  `BombaNeumaticaOk` varchar(2) DEFAULT NULL,
  `ConexionOk` varchar(2) DEFAULT NULL,
  `MangueraOk` varchar(2) DEFAULT NULL,
  `LineaCargaOk` varchar(2) DEFAULT NULL,
  `ValvulasCerradas` varchar(2) DEFAULT NULL,
  `CapacidadTanque` varchar(2) DEFAULT NULL,
  `ProblemaCondensacion` varchar(2) DEFAULT NULL,
  `TextoProblemaCondensacion` varchar(250) DEFAULT NULL,
  `SeguridadCSO` varchar(2) DEFAULT NULL,
  `EquipoCSO` varchar(2) DEFAULT NULL,
  `OlorFormol` varchar(2) DEFAULT NULL,
  `ph10` varchar(45) DEFAULT NULL,
  `Csc050Ajuste` varchar(45) DEFAULT NULL,
  `Stw00Ajuste` varchar(45) DEFAULT NULL,
  `ph10Fin` varchar(45) DEFAULT NULL,
  `ProductoBrillante` varchar(2) DEFAULT NULL,
  `HoraInicioLukas` time DEFAULT NULL,
  `HoraFinLukas` time DEFAULT NULL,
  `ProductoBrillante2` varchar(2) DEFAULT NULL,
  `NotificarLaboratorio` varchar(200) DEFAULT NULL,
  `SegNFO` varchar(2) DEFAULT NULL,
  `EquipoNFO` varchar(2) DEFAULT NULL,
  `AgitacionOff` varchar(2) DEFAULT NULL,
  `TalegoDescarga` varchar(2) DEFAULT NULL,
  `ResiduoTalego` varchar(2) DEFAULT NULL,
  `EnviarMuestraFinal` varchar(2) DEFAULT NULL,
  `Aspecto` varchar(100) DEFAULT NULL,
  `PorcentajeSolidos` varchar(45) DEFAULT NULL,
  `pH10Final` varchar(45) DEFAULT NULL,
  `Solubilidad10` varchar(45) DEFAULT NULL,
  `Solubilidad40` varchar(45) DEFAULT NULL,
  `Rendimiento` varchar(100) DEFAULT NULL,
  `ProcesoDif` varchar(2) DEFAULT NULL,
  `KgEnjuague` varchar(45) DEFAULT NULL,
  `KgLavado` varchar(45) DEFAULT NULL,
  `FechaMuestraLab` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nfo`
--

INSERT INTO `nfo` (`IdProceso`, `nfo`, `numeroLote`, `MatPriFP04`, `MatPriSeparada`, `MateriaPrimacol`, `ReactorLimpio`, `HermeticidadReactor`, `ReactorFunciona`, `VacioFunciona`, `VaporFunciona`, `EnfriamientoFunciona`, `EmisionesFunciona`, `phsodatanque`, `CondensadorFunciona`, `ApruebaInicio`, `RazonesNoAprob`, `SeguridadNaftaleno`, `EquipoNaftaleno`, `EnfriamientoCerrado`, `ValvBloqueo`, `AbrirControlOlores`, `Estartazos`, `AgitadorOk`, `ProblemaFund`, `ProblemaFundirNaf`, `SeguridadSulfurico`, `EquipoSulfurico`, `Vapor`, `ProblemaSWFO`, `TextoProblemaSWFO`, `CierreControlOlores`, `EvacuarCamisa`, `SuministroVapor`, `SeguridadFDO`, `EquipoFDO`, `LineaTierraOk`, `BombaNeumaticaOk`, `ConexionOk`, `MangueraOk`, `LineaCargaOk`, `ValvulasCerradas`, `CapacidadTanque`, `ProblemaCondensacion`, `TextoProblemaCondensacion`, `SeguridadCSO`, `EquipoCSO`, `OlorFormol`, `ph10`, `Csc050Ajuste`, `Stw00Ajuste`, `ph10Fin`, `ProductoBrillante`, `HoraInicioLukas`, `HoraFinLukas`, `ProductoBrillante2`, `NotificarLaboratorio`, `SegNFO`, `EquipoNFO`, `AgitacionOff`, `TalegoDescarga`, `ResiduoTalego`, `EnviarMuestraFinal`, `Aspecto`, `PorcentajeSolidos`, `pH10Final`, `Solubilidad10`, `Solubilidad40`, `Rendimiento`, `ProcesoDif`, `KgEnjuague`, `KgLavado`, `FechaMuestraLab`) VALUES
(2, '720NFOB00', 'Prueba2', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '0', '1', 're', '23', '', '9', '9', '88', '1', '56', '66', '0000-00-00 00:00:00.000000'),
(3, '720NFOB00', '59565', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '0', '0', 'Problema prueba', '1', '1', '0', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '8.0', '5', '5', '8.0', '1', NULL, NULL, '', 'JJ', '1', '1', '1', '1', '0', '1', 'OK', '8', '', '8', '8', 'OK', '1', '85', '85', '0000-00-00 00:00:00.000000'),
(4, '720NFOB00', 'Prueba3', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '8.5', '5', '5', '9.5', '1', NULL, NULL, '1', 'OK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(5, '720NFOB00', 'Prueba4', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '8.5', '5', '5', '5.5', '0', '00:26:00', '01:26:00', '1', '', '1', '1', '1', '1', '1', '1', '5', '5', '8.5', '8.5', '8.5', '554', '0', '', '', '0000-00-00 00:00:00.000000'),
(6, '720NFOB00', '111', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '5', '5', '5', '5.5', '0', '19:18:00', NULL, '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(7, '720NFOB00', '111222', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', 'DDD', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(8, '720NFOB00', '4444', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(9, '720NFOB00', 'Prueba5', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(10, '720NFOB00', 'L1245', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '8.1', '95', '95', '5.5', '0', '19:49:00', '20:49:00', '1', '', '1', '1', '1', '1', '1', '1', 'Claro', '5.5', '8.5', '4.5', '4.5', 'OK', '0', '505', '585', '0000-00-00 00:00:00.000000'),
(11, '720NFOB00', 'L72128', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '8.7', '0', '25', '2.5', '0', NULL, NULL, '1', 'OK', '1', '1', '1', '1', '0', '1', 'Brillante', '25', '11.25', '0', '0', '0', '0', '', '', '0000-00-00 00:00:00.000000'),
(12, '720NFOB00', '72424', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '11.50', '0', '3', '7.52', '0', '12:00:00', '22:00:00', '1', 'Laboratorio notificado', '1', '1', '1', '1', '0', '1', 'Brillante ', '48,75', '7,25', '0', '0', '4225', '0', '', '', '0000-00-00 00:00:00.000000'),
(13, '720NFOB00', '72424', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '8.48', '0', '1', '7.54', '0', NULL, NULL, '1', '', '1', '1', '1', '1', '0', '1', 'Brillante ', '49,12', '7,14', '', '', '4110', '0', '', '', '0000-00-00 00:00:00.000000'),
(14, '720NFOB00', '222', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '8.5', '0', '7', '55', '1', NULL, NULL, '', 'ok', '1', '1', '1', '1', '0', '1', 'Brillante', '5', '55', '5', '55', '5656', '0', '', '', '0000-00-00 00:00:00.000000'),
(15, '720NFOB00', '72423', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '8.48', '0', '1', '7.54', '1', NULL, NULL, '', '', '1', '1', '1', '1', '0', '1', 'Brillante ', '49,12', '7,14', '0', '0', '4110', '0', '', '', '0000-00-00 00:00:00.000000'),
(16, '720NFOB00', '565', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '5', '5', '5', '5', '1', NULL, NULL, '', '', '1', '1', '1', '1', '1', '1', '65', '656', '565', '565', '6565', '76767', '0', '', '', '0000-00-00 00:00:00.000000'),
(17, '720NFOB00', '72350', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '8.33', '0', '1', '7.39', '0', NULL, NULL, '1', 'notificado', '1', '1', '1', '1', '0', '1', 'Brillante', '48.51', '7.03', '0', '0', '4146', '0', '', '', '0000-00-00 00:00:00.000000'),
(18, '720NFOB00', '1515151', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '10.45', '0', '1', '7.50', '0', NULL, NULL, '1', 'Notificar', '1', '1', '1', '1', '0', '1', 'Brillante ', '49', '7', '0', '0', '5000', '0', '', '', '0000-00-00 00:00:00.000000'),
(19, '720NFOB00', 'Ensayo#1', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '10.14', '0', '3', '7.40', '0', '22:12:00', '12:50:00', '1', 'Notificar', '1', '1', '1', '1', '0', '1', 'Brillante ', '40.60', '7.46', '0', '0', '5000', '1', '200', '150', '0000-00-00 00:00:00.000000'),
(20, '720NFOB00', 'Ensayo#2', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '12.45', '0', '5', '7.54', '0', '15:00:00', '17:00:00', '1', 'Notificar', '1', '1', '1', '1', '0', '1', 'Brillante ', '48,10', '7,45', '15', '15', '500', '1', '100', '200', '0000-00-00 00:00:00.000000'),
(21, '720NFOB00', 'Ensayo#3', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '13.7', '0', '5', '8.56', '0', '09:23:00', '09:25:00', '1', 'Notificar', '1', '1', '1', '1', '1', '1', 'Brillante ', '40.50', '7.87', '10', '10', '9000', '1', '122', '123', '0000-00-00 00:00:00.000000'),
(22, '190NFOCON', 'Prueba1222', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(23, '190NFOCON', 'Prueba Feb1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(24, '720NFOB00', 'Prueba Feb 1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(25, '190NFOCON', '72479', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(26, '720NFOB00', '72479', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(27, '190NFOCON', '72349', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '12.08', '0', '12', '7.50', '0', NULL, NULL, '1', 'Notificado ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(28, '190NFOCON', '72350', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '0', '', '1', '1', '0', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(29, '190NFOCON', '72423', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(30, '190NFOCON', '72424', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(31, '720NFOB00', '1234', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(32, '720NFOB00', '72448', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '0', '', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '8.46', '0', '1', '7.37', '0', '05:30:00', '10:00:00', '1', 'Notificado ', '1', '1', '1', '1', '0', '1', 'Líquido ligeramente opaco (L.L.O)', '47.76', '7.76', 'Total', 'Total ', '5426', '0', '', '', '0000-00-00 00:00:00.000000'),
(33, '720NFOB00', 'Ensayo #4', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '0', '', '', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '0', '12.98', '12', '2', '12.00', '0', '00:12:00', '12:12:00', '1', 'Notificar', '1', '1', '1', '1', '0', '1', 'Líquido ligeramente opaco (L.L.O)', '49.12', '7.46', 'Total-10 ', 'Total-10', '5000', '0', '', '', '0000-00-00 00:00:00.000000'),
(34, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000'),
(35, '720NFOB00', '10', '1', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '0', '', '1', '1', '1', '1', '10', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', NULL, NULL, NULL, '10', '10', '10', '10', '0', NULL, NULL, '1', '', '1', '1', '1', '1', '0', '1', 'lll', '10', '1', '1', '1', 'lo', '1', '10', '10', '0000-00-00 00:00:00.000000'),
(36, '720NFOB00', '23123', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `procesos`
--

CREATE TABLE `procesos` (
  `NumLote` varchar(30) NOT NULL,
  `FechaInicial` date NOT NULL,
  `FechaFinal` date DEFAULT NULL,
  `HoraInicial` time NOT NULL,
  `HoraFinal` time DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `Cedula` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procesos`
--

INSERT INTO `procesos` (`NumLote`, `FechaInicial`, `FechaFinal`, `HoraInicial`, `HoraFinal`, `Estado`, `Cedula`) VALUES
('Prueba1', '2022-10-25', NULL, '15:53:59', NULL, 3, '112233'),
('Prueba2', '2022-10-25', '2022-10-25', '16:05:16', '17:49:41', 2, '414525'),
('59565', '2022-10-26', '2022-10-26', '10:20:33', '10:56:44', 2, '112233'),
('Prueba3', '2022-10-26', NULL, '13:55:12', NULL, 3, '112233'),
('Prueba4', '2022-10-28', '2022-10-28', '09:52:32', '10:28:53', 2, '112233'),
('111', '2022-10-28', NULL, '16:09:39', NULL, 3, '112233'),
('111222', '2022-10-28', NULL, '16:57:15', NULL, 3, '112233'),
('4444', '2022-10-28', NULL, '17:18:22', NULL, 3, '112233'),
('Prueba5', '2022-10-31', NULL, '11:09:38', NULL, 3, '112233'),
('L1245', '2022-11-23', '2022-11-23', '15:25:35', '17:05:02', 2, '112233'),
('L72128', '2022-11-29', '2023-01-30', '11:37:28', '13:45:15', 2, '112233'),
('72424', '2023-01-30', '2023-01-30', '10:21:13', '12:40:39', 2, '1001463673'),
('72424', '2023-01-30', '2023-01-30', '13:37:56', '14:37:07', 2, '1001463673'),
('222', '2023-01-30', '2023-01-30', '14:41:26', '14:48:44', 2, '1041326457'),
('72423', '2023-01-30', '2023-01-30', '14:46:41', '15:14:01', 2, '1001463673'),
('565', '2023-01-30', '2023-01-30', '15:16:13', '15:22:27', 2, '1001463673'),
('72350', '2023-01-30', '2023-01-30', '15:28:32', '16:09:34', 2, '1001463673'),
('1515151', '2023-01-30', '2023-01-30', '16:18:11', '16:29:21', 2, '1001463673'),
('Ensayo#1', '2023-01-31', '2023-01-31', '08:11:05', '08:36:56', 2, '1001463673'),
('Ensayo#2', '2023-01-31', '2023-01-31', '08:45:10', '09:09:41', 2, '1001463673'),
('Ensayo#3', '2023-01-31', '2023-01-31', '09:12:39', '09:23:51', 2, '1001463673'),
('Prueba1222', '2023-01-31', NULL, '16:24:47', NULL, 3, '112233'),
('Prueba Feb1', '2023-02-01', NULL, '10:25:18', NULL, 1, '112233'),
('Prueba Feb 1', '2023-02-01', NULL, '10:25:50', NULL, 3, '112233'),
('72479', '2023-02-01', NULL, '10:46:26', NULL, 3, '1001463673'),
('72479', '2023-02-01', NULL, '14:09:13', NULL, 3, '1001463673'),
('72349', '2023-02-07', NULL, '11:34:31', NULL, 3, '1001463673'),
('72350', '2023-02-07', NULL, '16:15:45', NULL, 3, '1001463673'),
('72423', '2023-02-07', NULL, '16:40:47', NULL, 3, '1001463673'),
('72424', '2023-02-07', NULL, '16:45:18', NULL, 3, '1001463673'),
('1234', '2023-02-28', NULL, '15:13:57', NULL, 3, '112233'),
('72448', '2023-03-01', '2023-03-01', '11:26:24', '12:35:27', 2, '1001463673'),
('Ensayo #4', '2023-03-01', '2023-03-01', '14:12:25', '14:21:34', 2, '1001463673'),
('', '2023-03-04', NULL, '15:16:27', NULL, 3, '112233'),
('10', '2023-03-06', '2023-03-06', '16:56:23', '17:15:36', 2, '1019983876'),
('23123', '2023-03-06', NULL, '19:18:58', NULL, 3, '1019983876');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conversion_tod100atoreco`
--

CREATE TABLE `tbl_conversion_tod100atoreco` (
  `idConversion` int(11) NOT NULL,
  `cargoTod100` tinyint(1) DEFAULT NULL,
  `adicionSso000yGlg000` tinyint(1) DEFAULT NULL,
  `homogenizarSuspenderReposar` tinyint(1) DEFAULT NULL,
  `kgStw000` float DEFAULT NULL,
  `KgToreco` tinyint(1) DEFAULT NULL,
  `torecoEtiquetado` tinyint(1) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destilacion_tod100`
--

CREATE TABLE `tbl_destilacion_tod100` (
  `idDestilacion` int(11) NOT NULL,
  `confirmInicioDestilacion` tinyint(1) NOT NULL,
  `inicioDestilacion` datetime DEFAULT NULL,
  `finDestilacion` datetime DEFAULT NULL,
  `kgTOD100` float(5,2) NOT NULL,
  `reactorEnEnfriamiento` tinyint(1) NOT NULL,
  `inicioEnfriamiento` datetime DEFAULT NULL,
  `finEnfriamiento` datetime DEFAULT NULL,
  `inicioSostener` datetime DEFAULT NULL,
  `finSostener` datetime DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_estado_equipo_atsme`
--

CREATE TABLE `tbl_estado_equipo_atsme` (
  `idEstado` int(11) NOT NULL,
  `reactorLimpio` tinyint(1) DEFAULT NULL,
  `bombaMangueraLineasLimpias` tinyint(1) DEFAULT NULL,
  `hermeticidadReactorOk` tinyint(1) DEFAULT NULL,
  `reactorFuncionaOk` tinyint(1) DEFAULT NULL,
  `sistemaVacioOk` tinyint(1) DEFAULT NULL,
  `sistemaVaporOk` tinyint(1) DEFAULT NULL,
  `sistemaEnfiramientoOk` tinyint(1) DEFAULT NULL,
  `condensadorSinFugas` tinyint(1) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fase_cargaswf098_atsme`
--

CREATE TABLE `tbl_fase_cargaswf098_atsme` (
  `idCarga` int(11) NOT NULL,
  `fichaLeida` tinyint(1) NOT NULL,
  `equipoSeguirdad` tinyint(1) NOT NULL,
  `swf098Transparente` tinyint(1) NOT NULL,
  `reactorEnEnfriamiento` tinyint(1) NOT NULL,
  `inicioCargaSWF098` datetime NOT NULL,
  `finCargaSWF098` datetime NOT NULL,
  `inicioVapor` tinyint(1) NOT NULL,
  `problemaAdicionAcido` tinyint(1) NOT NULL,
  `comentarioProblema` varchar(256) DEFAULT NULL,
  `equipoEnReflujo` tinyint(1) NOT NULL,
  `inicioReflujo` datetime NOT NULL,
  `finReflujo` datetime NOT NULL,
  `totalAguaDestilada` int(5) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fase_carga_too000`
--

CREATE TABLE `tbl_fase_carga_too000` (
  `idCarga` int(11) NOT NULL,
  `fichaLeída` tinyint(1) DEFAULT NULL,
  `equipoSeguridad` tinyint(1) DEFAULT NULL,
  `cargaBomba` tinyint(1) DEFAULT NULL,
  `conexionesAcoplesTuberiasOk` tinyint(1) DEFAULT NULL,
  `coloracionTOO` tinyint(1) DEFAULT NULL,
  `cargaConVacio` tinyint(1) DEFAULT NULL,
  `bloqueoAjusteVacio` tinyint(1) DEFAULT NULL,
  `inicioCargaTOO000` datetime DEFAULT NULL,
  `finCargaTOO000` datetime DEFAULT NULL,
  `problemaCarga` tinyint(1) DEFAULT NULL,
  `comentarioProblema` varchar(256) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fase_descarga`
--

CREATE TABLE `tbl_fase_descarga` (
  `idDescarga` int(11) NOT NULL,
  `fichaLeída` tinyint(1) DEFAULT NULL,
  `equipoSeguridad` tinyint(1) DEFAULT NULL,
  `RPMCilindro` int(5) DEFAULT NULL,
  `frecuenciaVariador` float(5,3) DEFAULT NULL,
  `temperaturaAgua` float(5,3) DEFAULT NULL,
  `telaFiltrante` tinyint(1) DEFAULT NULL,
  `inicioVapor` datetime DEFAULT NULL,
  `finVapor` datetime DEFAULT NULL,
  `inicioDescarga` datetime DEFAULT NULL,
  `finDescarga` datetime DEFAULT NULL,
  `kgAtsme0` float(5,2) DEFAULT NULL,
  `kgAtsxxx` float(5,2) DEFAULT NULL,
  `problemaEscamado` tinyint(1) DEFAULT NULL,
  `comentarioProblema` varchar(256) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lavado_equipo_atsme`
--

CREATE TABLE `tbl_lavado_equipo_atsme` (
  `idLavado` int(11) NOT NULL,
  `inicioEnjuague` datetime DEFAULT NULL,
  `finEnjuague` datetime DEFAULT NULL,
  `tuberiasLimpias` tinyint(1) DEFAULT NULL,
  `kgAguaLavada` float(5,2) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_muestra_segs_swf`
--

CREATE TABLE `tbl_muestra_segs_swf` (
  `idMuestra` int(11) NOT NULL,
  `nroHora` tinyint(3) NOT NULL,
  `muestraNecesaria` tinyint(1) NOT NULL,
  `resultadoMuestra` float(7,3) DEFAULT NULL,
  `muestraCumple` tinyint(1) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proceso_atsme`
--

CREATE TABLE `tbl_proceso_atsme` (
  `NumLote` varchar(30) NOT NULL,
  `NombreProceso` varchar(15) NOT NULL DEFAULT 'ATSME',
  `separacionFp04` tinyint(1) DEFAULT NULL,
  `materiaPrimaSeparada` tinyint(1) DEFAULT NULL,
  `problemaInicioProceso` tinyint(1) NOT NULL,
  `comentarioProblemaInicioProceso` varchar(100) NOT NULL,
  `aprobacionInicio` tinyint(1) DEFAULT NULL,
  `IdEquipo` int(11) NOT NULL,
  `IdRegMateriaPrima` int(11) NOT NULL,
  `seccion1` tinyint(1) NOT NULL DEFAULT 1,
  `seccion2` tinyint(1) NOT NULL DEFAULT 0,
  `seccion3` tinyint(1) NOT NULL DEFAULT 0,
  `seccion4` tinyint(1) NOT NULL DEFAULT 0,
  `seccion5` tinyint(1) NOT NULL DEFAULT 0,
  `seccion6` tinyint(1) NOT NULL DEFAULT 0,
  `seccion7` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seguimiento_cargaswf098`
--

CREATE TABLE `tbl_seguimiento_cargaswf098` (
  `idSeguimiento` int(11) NOT NULL,
  `nroHoraSeguimiento` int(3) DEFAULT NULL,
  `temperatura` float(5,2) DEFAULT NULL,
  `presion` float(5,2) DEFAULT NULL,
  `kgAguaDestilada` float(5,2) DEFAULT NULL,
  `observaciones` varchar(256) DEFAULT '',
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seguimiento_desttod100`
--

CREATE TABLE `tbl_seguimiento_desttod100` (
  `idSeguimiento` int(11) NOT NULL,
  `nroHoraSeguimiento` int(3) DEFAULT NULL,
  `temperatura` float(5,2) DEFAULT NULL,
  `presion` float(5,2) DEFAULT NULL,
  `vacio` tinyint(1) DEFAULT NULL,
  `kgTOD100` float(5,2) NOT NULL,
  `observaciones` varchar(256) DEFAULT NULL,
  `NumLote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Cedula` varchar(50) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1,
  `Rol` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Apellido`, `Cedula`, `CorreoElectronico`, `Contrasena`, `Estado`, `Rol`) VALUES
(1, 'Admin', 'Admin', '112233', 'admin@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 1, 0),
(2, 'Operador', 'Prueba', '414525', 'operador@colre.com', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 1),
(3, 'Supervisor', 'Prueba', '858585', 'supervisor@colre.com', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 2),
(4, 'Coordinador', 'Prueba', '858588', 'coordinador@colre.com', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 3),
(5, 'AMesa', '.', '1020415129', 'supervisor3@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 1),
(6, 'JChaves', '.', '71700631', 'supervisor2@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 1),
(7, 'AColorado', '.', '71392774', 'supervisor1@colresin.com', 'Colresin22', 1, 1),
(8, 'VOquendo', '.', '1036628471', 'produccion@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 3),
(9, 'AEscobar', '.', '43269442', 'dir.quimica@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 2),
(10, 'YArbelaez', '.', '1036939830', 'sistemas@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 0),
(11, 'DArbelaez', '.', '1036948651', 'laboratorio@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 2),
(12, 'ROesch', '.', '71577136', 'gerencia@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 2),
(13, 'MVargas', '.', '70549867', 'subgerencia@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 2),
(14, 'HAltmann', '.', '71385689', 'altmannconsulting@gmail.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 0),
(15, 'NBermeo', '.', '1001463673', 'auxproduccion@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 3),
(16, 'ECastaño', '.', '1041326457', 'auxcalidad2@colresin.com', '6c39d402736de86d5746b9a9ac3952dd', 1, 3),
(17, 'MCampuzano', ',', '1019983876', 'campuzanomiguel2208@gmail.com', 'c5baa535f598ab4a1caab080139cb89f', 1, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vistaprocesoatsme`
-- (See below for the actual view)
--
CREATE TABLE `vistaprocesoatsme` (
`NumLote` varchar(30)
,`separacionFp04` tinyint(1)
,`materiaPrimaSeparada` tinyint(1)
,`aprobacionInicio` tinyint(1)
,`problemaInicioProceso` tinyint(1)
,`comentarioProblemaInicioProceso` varchar(100)
,`IdEquipo` int(11)
,`IdRegMateriaPrima` int(11)
,`seccion1` tinyint(1)
,`seccion2` tinyint(1)
,`seccion3` tinyint(1)
,`seccion4` tinyint(1)
,`seccion5` tinyint(1)
,`seccion6` tinyint(1)
,`seccion7` tinyint(1)
,`dietrich1` tinyint(1)
,`escamador` tinyint(1)
,`too00` float(5,2)
,`torec0` float(5,2)
,`swf098` varchar(10)
,`stw000` varchar(10)
,`sso000` float(5,2)
,`glg000` float(5,2)
,`reactorLimpio` tinyint(1)
,`bombaMangueraLineasLimpias` tinyint(1)
,`hermeticidadReactorOk` tinyint(1)
,`reactorFuncionaOk` tinyint(1)
,`sistemaVacioOk` tinyint(1)
,`sistemaVaporOk` tinyint(1)
,`sistemaEnfiramientoOk` tinyint(1)
,`condensadorSinFugas` tinyint(1)
,`fichaLeidaToo` tinyint(1)
,`equipoSeguridadToo` tinyint(1)
,`cargaBomba` tinyint(1)
,`conexionesAcoplesTuberiasOk` tinyint(1)
,`coloracionTOO` tinyint(1)
,`cargaConVacio` tinyint(1)
,`bloqueoAjusteVacio` tinyint(1)
,`inicioCargaTOO000` datetime
,`finCargaTOO000` datetime
,`problemaCarga` tinyint(1)
,`comentarioProblemaCargaToo` varchar(256)
,`fichaLeidaSwf` tinyint(1)
,`equipoSeguirdad` tinyint(1)
,`swf098Transparente` tinyint(1)
,`reactorEnfriamientoSwf` tinyint(1)
,`inicioCargaSWF098` datetime
,`finCargaSWF098` datetime
,`inicioVaporSwf` tinyint(1)
,`problemaAdicionAcido` tinyint(1)
,`comentarioProblema` varchar(256)
,`equipoEnReflujo` tinyint(1)
,`inicioReflujo` datetime
,`finReflujo` datetime
,`totalAguaDestilada` int(5)
,`confirmInicioDestilacion` tinyint(1)
,`inicioDestilacion` datetime
,`finDestilacion` datetime
,`kgTOD100` float(5,2)
,`reactorEnfriamientoDestilacion` tinyint(1)
,`inicioEnfriamiento` datetime
,`finEnfriamiento` datetime
,`inicioSostener` datetime
,`finSostener` datetime
,`fichaLeidaDescarga` tinyint(1)
,`equipoSeguridadDescarga` tinyint(1)
,`RPMCilindro` int(5)
,`frecuenciaVariador` float(5,3)
,`temperaturaAgua` float(5,3)
,`telaFiltrante` tinyint(1)
,`inicioVaporDescarga` datetime
,`finVapor` datetime
,`inicioDescarga` datetime
,`finDescarga` datetime
,`kgAtsme0` float(5,2)
,`kgAtsxxx` float(5,2)
,`problemaEscamado` tinyint(1)
,`comentarioProblemaEscamado` varchar(256)
,`cargoTod100` tinyint(1)
,`adicionSso000yGlg000` tinyint(1)
,`homogenizarSuspenderReposar` tinyint(1)
,`kgStw000` float
,`KgToreco` tinyint(1)
,`torecoEtiquetado` tinyint(1)
,`inicioEnjuague` datetime
,`finEnjuague` datetime
,`tuberiasLimpias` tinyint(1)
,`kgAguaLavada` float(5,2)
);

-- --------------------------------------------------------

--
-- Structure for view `vistaprocesoatsme`
--
DROP TABLE IF EXISTS `vistaprocesoatsme`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaprocesoatsme`  AS SELECT `tbl_proceso_atsme`.`NumLote` AS `NumLote`, `tbl_proceso_atsme`.`separacionFp04` AS `separacionFp04`, `tbl_proceso_atsme`.`materiaPrimaSeparada` AS `materiaPrimaSeparada`, `tbl_proceso_atsme`.`aprobacionInicio` AS `aprobacionInicio`, `tbl_proceso_atsme`.`problemaInicioProceso` AS `problemaInicioProceso`, `tbl_proceso_atsme`.`comentarioProblemaInicioProceso` AS `comentarioProblemaInicioProceso`, `tbl_proceso_atsme`.`IdEquipo` AS `IdEquipo`, `tbl_proceso_atsme`.`IdRegMateriaPrima` AS `IdRegMateriaPrima`, `tbl_proceso_atsme`.`seccion1` AS `seccion1`, `tbl_proceso_atsme`.`seccion2` AS `seccion2`, `tbl_proceso_atsme`.`seccion3` AS `seccion3`, `tbl_proceso_atsme`.`seccion4` AS `seccion4`, `tbl_proceso_atsme`.`seccion5` AS `seccion5`, `tbl_proceso_atsme`.`seccion6` AS `seccion6`, `tbl_proceso_atsme`.`seccion7` AS `seccion7`, `equipos`.`dietrich1` AS `dietrich1`, `equipos`.`escamador` AS `escamador`, `materiaprima`.`too00` AS `too00`, `materiaprima`.`torec0` AS `torec0`, `materiaprima`.`swf098` AS `swf098`, `materiaprima`.`stw000` AS `stw000`, `materiaprima`.`sso000` AS `sso000`, `materiaprima`.`glg000` AS `glg000`, `tbl_estado_equipo_atsme`.`reactorLimpio` AS `reactorLimpio`, `tbl_estado_equipo_atsme`.`bombaMangueraLineasLimpias` AS `bombaMangueraLineasLimpias`, `tbl_estado_equipo_atsme`.`hermeticidadReactorOk` AS `hermeticidadReactorOk`, `tbl_estado_equipo_atsme`.`reactorFuncionaOk` AS `reactorFuncionaOk`, `tbl_estado_equipo_atsme`.`sistemaVacioOk` AS `sistemaVacioOk`, `tbl_estado_equipo_atsme`.`sistemaVaporOk` AS `sistemaVaporOk`, `tbl_estado_equipo_atsme`.`sistemaEnfiramientoOk` AS `sistemaEnfiramientoOk`, `tbl_estado_equipo_atsme`.`condensadorSinFugas` AS `condensadorSinFugas`, `tbl_fase_carga_too000`.`fichaLeída` AS `fichaLeidaToo`, `tbl_fase_carga_too000`.`equipoSeguridad` AS `equipoSeguridadToo`, `tbl_fase_carga_too000`.`cargaBomba` AS `cargaBomba`, `tbl_fase_carga_too000`.`conexionesAcoplesTuberiasOk` AS `conexionesAcoplesTuberiasOk`, `tbl_fase_carga_too000`.`coloracionTOO` AS `coloracionTOO`, `tbl_fase_carga_too000`.`cargaConVacio` AS `cargaConVacio`, `tbl_fase_carga_too000`.`bloqueoAjusteVacio` AS `bloqueoAjusteVacio`, `tbl_fase_carga_too000`.`inicioCargaTOO000` AS `inicioCargaTOO000`, `tbl_fase_carga_too000`.`finCargaTOO000` AS `finCargaTOO000`, `tbl_fase_carga_too000`.`problemaCarga` AS `problemaCarga`, `tbl_fase_carga_too000`.`comentarioProblema` AS `comentarioProblemaCargaToo`, `tbl_fase_cargaswf098_atsme`.`fichaLeida` AS `fichaLeidaSwf`, `tbl_fase_cargaswf098_atsme`.`equipoSeguirdad` AS `equipoSeguirdad`, `tbl_fase_cargaswf098_atsme`.`swf098Transparente` AS `swf098Transparente`, `tbl_fase_cargaswf098_atsme`.`reactorEnEnfriamiento` AS `reactorEnfriamientoSwf`, `tbl_fase_cargaswf098_atsme`.`inicioCargaSWF098` AS `inicioCargaSWF098`, `tbl_fase_cargaswf098_atsme`.`finCargaSWF098` AS `finCargaSWF098`, `tbl_fase_cargaswf098_atsme`.`inicioVapor` AS `inicioVaporSwf`, `tbl_fase_cargaswf098_atsme`.`problemaAdicionAcido` AS `problemaAdicionAcido`, `tbl_fase_cargaswf098_atsme`.`comentarioProblema` AS `comentarioProblema`, `tbl_fase_cargaswf098_atsme`.`equipoEnReflujo` AS `equipoEnReflujo`, `tbl_fase_cargaswf098_atsme`.`inicioReflujo` AS `inicioReflujo`, `tbl_fase_cargaswf098_atsme`.`finReflujo` AS `finReflujo`, `tbl_fase_cargaswf098_atsme`.`totalAguaDestilada` AS `totalAguaDestilada`, `tbl_destilacion_tod100`.`confirmInicioDestilacion` AS `confirmInicioDestilacion`, `tbl_destilacion_tod100`.`inicioDestilacion` AS `inicioDestilacion`, `tbl_destilacion_tod100`.`finDestilacion` AS `finDestilacion`, `tbl_destilacion_tod100`.`kgTOD100` AS `kgTOD100`, `tbl_destilacion_tod100`.`reactorEnEnfriamiento` AS `reactorEnfriamientoDestilacion`, `tbl_destilacion_tod100`.`inicioEnfriamiento` AS `inicioEnfriamiento`, `tbl_destilacion_tod100`.`finEnfriamiento` AS `finEnfriamiento`, `tbl_destilacion_tod100`.`inicioSostener` AS `inicioSostener`, `tbl_destilacion_tod100`.`finSostener` AS `finSostener`, `tbl_fase_descarga`.`fichaLeída` AS `fichaLeidaDescarga`, `tbl_fase_descarga`.`equipoSeguridad` AS `equipoSeguridadDescarga`, `tbl_fase_descarga`.`RPMCilindro` AS `RPMCilindro`, `tbl_fase_descarga`.`frecuenciaVariador` AS `frecuenciaVariador`, `tbl_fase_descarga`.`temperaturaAgua` AS `temperaturaAgua`, `tbl_fase_descarga`.`telaFiltrante` AS `telaFiltrante`, `tbl_fase_descarga`.`inicioVapor` AS `inicioVaporDescarga`, `tbl_fase_descarga`.`finVapor` AS `finVapor`, `tbl_fase_descarga`.`inicioDescarga` AS `inicioDescarga`, `tbl_fase_descarga`.`finDescarga` AS `finDescarga`, `tbl_fase_descarga`.`kgAtsme0` AS `kgAtsme0`, `tbl_fase_descarga`.`kgAtsxxx` AS `kgAtsxxx`, `tbl_fase_descarga`.`problemaEscamado` AS `problemaEscamado`, `tbl_fase_descarga`.`comentarioProblema` AS `comentarioProblemaEscamado`, `tbl_conversion_tod100atoreco`.`cargoTod100` AS `cargoTod100`, `tbl_conversion_tod100atoreco`.`adicionSso000yGlg000` AS `adicionSso000yGlg000`, `tbl_conversion_tod100atoreco`.`homogenizarSuspenderReposar` AS `homogenizarSuspenderReposar`, `tbl_conversion_tod100atoreco`.`kgStw000` AS `kgStw000`, `tbl_conversion_tod100atoreco`.`KgToreco` AS `KgToreco`, `tbl_conversion_tod100atoreco`.`torecoEtiquetado` AS `torecoEtiquetado`, `tbl_lavado_equipo_atsme`.`inicioEnjuague` AS `inicioEnjuague`, `tbl_lavado_equipo_atsme`.`finEnjuague` AS `finEnjuague`, `tbl_lavado_equipo_atsme`.`tuberiasLimpias` AS `tuberiasLimpias`, `tbl_lavado_equipo_atsme`.`kgAguaLavada` AS `kgAguaLavada` FROM (((((((((`tbl_proceso_atsme` left join `equipos` on(`tbl_proceso_atsme`.`IdEquipo` = `equipos`.`IdEquipo`)) left join `materiaprima` on(`tbl_proceso_atsme`.`IdRegMateriaPrima` = `materiaprima`.`IdRegMateriaPrima`)) left join `tbl_estado_equipo_atsme` on(`tbl_proceso_atsme`.`NumLote` = `tbl_estado_equipo_atsme`.`NumLote`)) left join `tbl_conversion_tod100atoreco` on(`tbl_proceso_atsme`.`NumLote` = `tbl_conversion_tod100atoreco`.`NumLote`)) left join `tbl_destilacion_tod100` on(`tbl_proceso_atsme`.`NumLote` = `tbl_destilacion_tod100`.`NumLote`)) left join `tbl_fase_cargaswf098_atsme` on(`tbl_proceso_atsme`.`NumLote` = `tbl_fase_cargaswf098_atsme`.`NumLote`)) left join `tbl_fase_carga_too000` on(`tbl_proceso_atsme`.`NumLote` = `tbl_fase_carga_too000`.`NumLote`)) left join `tbl_fase_descarga` on(`tbl_proceso_atsme`.`NumLote` = `tbl_fase_descarga`.`NumLote`)) left join `tbl_lavado_equipo_atsme` on(`tbl_proceso_atsme`.`NumLote` = `tbl_lavado_equipo_atsme`.`NumLote`)) GROUP BY `tbl_proceso_atsme`.`NumLote``NumLote`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`IdEquipo`);

--
-- Indexes for table `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`IdRegMateriaPrima`);

--
-- Indexes for table `nfo`
--
ALTER TABLE `nfo`
  ADD PRIMARY KEY (`IdProceso`),
  ADD UNIQUE KEY `IdProceso_UNIQUE` (`IdProceso`);

--
-- Indexes for table `tbl_conversion_tod100atoreco`
--
ALTER TABLE `tbl_conversion_tod100atoreco`
  ADD PRIMARY KEY (`idConversion`),
  ADD KEY `fk_tbl_conversion_tod100atoreco_NumLote` (`NumLote`);

--
-- Indexes for table `tbl_destilacion_tod100`
--
ALTER TABLE `tbl_destilacion_tod100`
  ADD PRIMARY KEY (`idDestilacion`),
  ADD KEY `fk_tbl_destilacion_tod100_tbl_proceso_atsme` (`NumLote`);

--
-- Indexes for table `tbl_estado_equipo_atsme`
--
ALTER TABLE `tbl_estado_equipo_atsme`
  ADD PRIMARY KEY (`idEstado`),
  ADD KEY `fk_tbl_estado_equipo_atsme_NumLote` (`NumLote`);

--
-- Indexes for table `tbl_fase_cargaswf098_atsme`
--
ALTER TABLE `tbl_fase_cargaswf098_atsme`
  ADD PRIMARY KEY (`idCarga`),
  ADD KEY `fk_NumLoteCargaSwfAtsme` (`NumLote`);

--
-- Indexes for table `tbl_fase_carga_too000`
--
ALTER TABLE `tbl_fase_carga_too000`
  ADD PRIMARY KEY (`idCarga`),
  ADD KEY `fk_tbl_fase_carga_too000_NumLote` (`NumLote`);

--
-- Indexes for table `tbl_fase_descarga`
--
ALTER TABLE `tbl_fase_descarga`
  ADD PRIMARY KEY (`idDescarga`),
  ADD KEY `fk_tbl_fase_descarga_NumLote` (`NumLote`);

--
-- Indexes for table `tbl_lavado_equipo_atsme`
--
ALTER TABLE `tbl_lavado_equipo_atsme`
  ADD PRIMARY KEY (`idLavado`),
  ADD KEY `fk_tbl_lavado_equipo_atsme_NumLote` (`NumLote`);

--
-- Indexes for table `tbl_muestra_segs_swf`
--
ALTER TABLE `tbl_muestra_segs_swf`
  ADD PRIMARY KEY (`idMuestra`),
  ADD KEY `fk_muestraSegSwf_NumLote` (`NumLote`);

--
-- Indexes for table `tbl_proceso_atsme`
--
ALTER TABLE `tbl_proceso_atsme`
  ADD PRIMARY KEY (`NumLote`),
  ADD KEY `fk_equipo_proceso` (`IdEquipo`),
  ADD KEY `fk_tbl_proceso_atsme_materiaprima` (`IdRegMateriaPrima`);

--
-- Indexes for table `tbl_seguimiento_cargaswf098`
--
ALTER TABLE `tbl_seguimiento_cargaswf098`
  ADD PRIMARY KEY (`idSeguimiento`),
  ADD KEY `seguimientoDestilacionSWF098Atsme` (`NumLote`);

--
-- Indexes for table `tbl_seguimiento_desttod100`
--
ALTER TABLE `tbl_seguimiento_desttod100`
  ADD PRIMARY KEY (`idSeguimiento`),
  ADD KEY `fk_tbl_seguimiento_desttod100_procesoAtsme` (`NumLote`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `IdUsuario_UNIQUE` (`IdUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `IdEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `IdRegMateriaPrima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `nfo`
--
ALTER TABLE `nfo`
  MODIFY `IdProceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_conversion_tod100atoreco`
--
ALTER TABLE `tbl_conversion_tod100atoreco`
  MODIFY `idConversion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_destilacion_tod100`
--
ALTER TABLE `tbl_destilacion_tod100`
  MODIFY `idDestilacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_estado_equipo_atsme`
--
ALTER TABLE `tbl_estado_equipo_atsme`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fase_cargaswf098_atsme`
--
ALTER TABLE `tbl_fase_cargaswf098_atsme`
  MODIFY `idCarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fase_carga_too000`
--
ALTER TABLE `tbl_fase_carga_too000`
  MODIFY `idCarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fase_descarga`
--
ALTER TABLE `tbl_fase_descarga`
  MODIFY `idDescarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lavado_equipo_atsme`
--
ALTER TABLE `tbl_lavado_equipo_atsme`
  MODIFY `idLavado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_muestra_segs_swf`
--
ALTER TABLE `tbl_muestra_segs_swf`
  MODIFY `idMuestra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seguimiento_cargaswf098`
--
ALTER TABLE `tbl_seguimiento_cargaswf098`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seguimiento_desttod100`
--
ALTER TABLE `tbl_seguimiento_desttod100`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_conversion_tod100atoreco`
--
ALTER TABLE `tbl_conversion_tod100atoreco`
  ADD CONSTRAINT `faseConversionTod100ProcesoAtsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `fk_tbl_conversion_tod100atoreco_NumLote` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_destilacion_tod100`
--
ALTER TABLE `tbl_destilacion_tod100`
  ADD CONSTRAINT `destilacionTOD100ProcesoAtsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `fk_tbl_destilacion_tod100_tbl_proceso_atsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_estado_equipo_atsme`
--
ALTER TABLE `tbl_estado_equipo_atsme`
  ADD CONSTRAINT `estadoEquipoDeProcesoAtsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `fk_tbl_estado_equipo_atsme_NumLote` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_fase_cargaswf098_atsme`
--
ALTER TABLE `tbl_fase_cargaswf098_atsme`
  ADD CONSTRAINT `fk_NumLote` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `fk_NumLoteCargaSwf` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `fk_NumLoteCargaSwfAtsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `procesoCargaSWF098Atsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_fase_carga_too000`
--
ALTER TABLE `tbl_fase_carga_too000`
  ADD CONSTRAINT `faseCargaTOO000ProcesoAtsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `fk_tbl_fase_carga_too000_NumLote` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_fase_descarga`
--
ALTER TABLE `tbl_fase_descarga`
  ADD CONSTRAINT `fk_tbl_fase_descarga_NumLote` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_lavado_equipo_atsme`
--
ALTER TABLE `tbl_lavado_equipo_atsme`
  ADD CONSTRAINT `fk_tbl_lavado_equipo_atsme_NumLote` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`),
  ADD CONSTRAINT `lavadoEquipoDeProcesoAtsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_muestra_segs_swf`
--
ALTER TABLE `tbl_muestra_segs_swf`
  ADD CONSTRAINT `fk_muestraSegSwf_NumLote` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_proceso_atsme`
--
ALTER TABLE `tbl_proceso_atsme`
  ADD CONSTRAINT `fk_equipo_proceso` FOREIGN KEY (`IdEquipo`) REFERENCES `equipos` (`IdEquipo`),
  ADD CONSTRAINT `fk_tbl_proceso_atsme_materiaprima` FOREIGN KEY (`IdRegMateriaPrima`) REFERENCES `materiaprima` (`IdRegMateriaPrima`);

--
-- Constraints for table `tbl_seguimiento_cargaswf098`
--
ALTER TABLE `tbl_seguimiento_cargaswf098`
  ADD CONSTRAINT `seguimientoDestilacionSWF098Atsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);

--
-- Constraints for table `tbl_seguimiento_desttod100`
--
ALTER TABLE `tbl_seguimiento_desttod100`
  ADD CONSTRAINT `fk_tbl_seguimiento_desttod100_procesoAtsme` FOREIGN KEY (`NumLote`) REFERENCES `tbl_proceso_atsme` (`NumLote`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
