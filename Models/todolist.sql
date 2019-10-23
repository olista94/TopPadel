-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2019 a las 22:51:39
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todolist`
--

--
-- Drops aqui
--

DROP SCHEMA IF EXISTS `todolist` ;

-- -----------------------------------------------------
-- Schema todolist
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8 ;
USE `todolist` ;

-- --------------------------------------------------------

-- -----------------------------------------------------
-- User todolist
-- -----------------------------------------------------

GRANT ALL PRIVILEGES ON todolist.* TO todolist@localhost IDENTIFIED BY "todolist";

CREATE TABLE `parejas` (
  `ID_Pareja` tinyint(5) NOT NULL,
  `usuarios_login` varchar(45) NOT NULL,
  `usuarios_login1` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas`
--

INSERT INTO `parejas` (`ID_Pareja`, `usuarios_login`, `usuarios_login1`) VALUES
(29, 'rita', 'noemi'),
(30, 'diana', 'isabel'),
(31, 'maria1', 'paz'),
(32, 'pilar', 'tania'),
(33, 'esther', 'lucia'),
(34, 'olaya', 'mariana'),
(35, 'xiana', 'rocio'),
(36, 'ana', 'carmen'),
(37, 'rosina', 'celia'),
(38, 'ypgarcia', 'ana'),
(39, 'belen', 'ypgarcia'),
(40, 'rita', 'noemi'),
(41, 'diana', 'isabel'),
(42, 'maria', 'paz'),
(43, 'pilar', 'tania'),
(44, 'esther', 'lucia'),
(45, 'olaya', 'mariana'),
(46, 'xiana', 'rocio'),
(47, 'ana', 'carmen'),
(48, 'rosina', 'celia'),
(49, 'ninoska', 'anais'),
(50, 'kelly', 'gertrudis'),
(51, 'ursula', 'remedios'),
(52, 'asuncion', 'vicentabenito'),
(53, 'flora', 'angelina'),
(54, 'pepa', 'belen'),
(55, 'maria1', 'rosa'),
(56, 'chica1', 'chica2'),
(57, 'chica3', 'chica4'),
(58, 'chica5', 'chica6'),
(59, 'chica7', 'chica8'),
(60, 'chica9', 'chica10'),
(61, 'chica11', 'chica12'),
(62, 'chica13', 'chica14'),
(63, 'chica15', 'chica16'),
(64, 'chica17', 'chica18'),
(65, 'chica19', 'chica20'),
(66, 'chica21', 'chica22'),
(67, 'chica23', 'chica24'),
(68, 'chica25', 'chica26'),
(69, 'chica27', 'chica28'),
(70, 'chica98', 'chica99'),
(71, 'chica1', 'chica2'),
(72, 'chica3', 'chica4'),
(73, 'chica5', 'chica6'),
(74, 'chica7', 'chica8'),
(75, 'chica9', 'chica10'),
(76, 'chica11', 'chica12'),
(77, 'chica13', 'chica14'),
(78, 'chica15', 'chica16'),
(79, 'chica17', 'chica18'),
(80, 'chica19', 'chica20'),
(81, 'chica21', 'chica22'),
(82, 'chica23', 'chica24'),
(83, 'chica25', 'chica26'),
(84, 'chica27', 'chica28'),
(85, 'chica98', 'chica99'),
(86, 'ana', 'anais'),
(88, 'ypgarcia', 'ana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_has_grupos`
--

CREATE TABLE `parejas_has_grupos` (
  `ID_Pareja` tinyint(5) NOT NULL,
  `grupo` int(2) NOT NULL,
  `ID_Torneo` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_has_grupos`
--

INSERT INTO `parejas_has_grupos` (`ID_Pareja`, `grupo`, `ID_Torneo`) VALUES
(71, 0, 3),
(72, 0, 3),
(73, 0, 3),
(74, 0, 3),
(75, 0, 3),
(76, 0, 3),
(77, 0, 3),
(78, 0, 3),
(79, 1, 3),
(80, 1, 3),
(81, 1, 3),
(82, 1, 3),
(83, 1, 3),
(84, 1, 3),
(85, 1, 3),
(86, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_has_partidos`
--

CREATE TABLE `parejas_has_partidos` (
  `ID_Partido` int(5) NOT NULL,
  `ID_Torneo` tinyint(5) NOT NULL,
  `ID_ParejaLocal` tinyint(5) NOT NULL,
  `ID_ParejaVisitante` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_has_partidos`
--

INSERT INTO `parejas_has_partidos` (`ID_Partido`, `ID_Torneo`, `ID_ParejaLocal`, `ID_ParejaVisitante`) VALUES
(2, 3, 71, 72),
(3, 3, 71, 73),
(4, 3, 71, 74),
(5, 3, 71, 75),
(6, 3, 71, 76),
(7, 3, 71, 77),
(8, 3, 71, 78),
(9, 3, 72, 73),
(10, 3, 72, 74),
(11, 3, 72, 75),
(12, 3, 72, 76),
(13, 3, 72, 77),
(14, 3, 72, 78),
(15, 3, 73, 74),
(16, 3, 73, 75),
(17, 3, 73, 76),
(18, 3, 73, 77),
(19, 3, 73, 78),
(20, 3, 74, 75),
(21, 3, 74, 76),
(22, 3, 74, 77),
(23, 3, 74, 78),
(24, 3, 75, 76),
(25, 3, 75, 77),
(26, 3, 75, 78),
(27, 3, 76, 77),
(28, 3, 76, 78),
(29, 3, 77, 78),
(30, 3, 79, 80),
(31, 3, 79, 81),
(32, 3, 79, 82),
(33, 3, 79, 83),
(34, 3, 79, 84),
(35, 3, 79, 85),
(36, 3, 79, 86),
(37, 3, 80, 81),
(38, 3, 80, 82),
(39, 3, 80, 83),
(40, 3, 80, 84),
(41, 3, 80, 85),
(42, 3, 80, 86),
(43, 3, 81, 82),
(44, 3, 81, 83),
(45, 3, 81, 84),
(46, 3, 81, 85),
(47, 3, 81, 86),
(48, 3, 82, 83),
(49, 3, 82, 84),
(50, 3, 82, 85),
(51, 3, 82, 86),
(52, 3, 83, 84),
(53, 3, 83, 85),
(54, 3, 83, 86),
(55, 3, 84, 85),
(56, 3, 84, 86),
(57, 3, 85, 86);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_has_torneos`
--

CREATE TABLE `parejas_has_torneos` (
  `parejas_ID_Pareja` tinyint(5) NOT NULL,
  `torneos_ID_Torneo` tinyint(5) NOT NULL,
  `PJ` int(5) NOT NULL,
  `PG` int(5) NOT NULL,
  `PP` int(5) NOT NULL,
  `Ptos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_has_torneos`
--

INSERT INTO `parejas_has_torneos` (`parejas_ID_Pareja`, `torneos_ID_Torneo`, `PJ`, `PG`, `PP`, `Ptos`) VALUES
(71, 3, 0, 0, 0, 0),
(72, 3, 0, 0, 0, 0),
(73, 3, 0, 0, 0, 0),
(74, 3, 0, 0, 0, 0),
(75, 3, 0, 0, 0, 0),
(76, 3, 0, 0, 0, 0),
(77, 3, 0, 0, 0, 0),
(78, 3, 0, 0, 0, 0),
(79, 3, 0, 0, 0, 0),
(80, 3, 0, 0, 0, 0),
(81, 3, 0, 0, 0, 0),
(82, 3, 0, 0, 0, 0),
(83, 3, 0, 0, 0, 0),
(84, 3, 0, 0, 0, 0),
(85, 3, 0, 0, 0, 0),
(86, 3, 0, 0, 0, 0),
(87, 3, 0, 0, 0, 0),
(88, 6, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `ID_Partido` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ronda` varchar(30) NOT NULL,
  `jornada` varchar(5) NOT NULL,
  `grupo` varchar(2) NOT NULL,
  `pista_ID_Pista` tinyint(5) DEFAULT NULL,
  `Sets_Local` int(1) DEFAULT NULL,
  `Sets_Visitante` int(1) DEFAULT NULL,
  `JuegosSet1_Local` int(2) DEFAULT NULL,
  `JuegosSet1_Visitante` int(2) DEFAULT NULL,
  `JuegosSet2_Local` int(2) DEFAULT NULL,
  `JuegosSet2_Visitante` int(2) DEFAULT NULL,
  `JuegosSet3_Local` int(2) DEFAULT NULL,
  `JuegosSet3_Visitante` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`ID_Partido`, `fecha`, `hora`, `ronda`, `jornada`, `grupo`, `pista_ID_Pista`, `Sets_Local`, `Sets_Visitante`, `JuegosSet1_Local`, `JuegosSet1_Visitante`, `JuegosSet2_Local`, `JuegosSet2_Visitante`, `JuegosSet3_Local`, `JuegosSet3_Visitante`) VALUES
(1, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pista`
--

CREATE TABLE `pista` (
  `ID_Pista` tinyint(5) NOT NULL,
  `Nombre_Pista` varchar(45) NOT NULL,
  `techo` enum('Interior','Exterior') NOT NULL,
  `suelo` enum('Blanda','Dura') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pista`
--

INSERT INTO `pista` (`ID_Pista`, `Nombre_Pista`, `techo`, `suelo`) VALUES
(1, 'Pista 1', 'Interior', 'Blanda'),
(2, 'Pista 2', 'Interior', 'Dura'),
(5, 'Pista 3', 'Exterior', 'Blanda'),
(6, 'Pista 4', 'Exterior', 'Dura'),
(7, 'Pista 5', 'Interior', 'Blanda'),
(8, 'Pista 6', 'Exterior', 'Blanda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `ID_Promo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `usuarios_login_usuario` varchar(45) DEFAULT NULL,
  `pista_ID_Pista` tinyint(5) DEFAULT NULL,
  `cerrada` enum('SI','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`ID_Promo`, `fecha`, `hora_inicio`, `usuarios_login_usuario`, `pista_ID_Pista`, `cerrada`) VALUES
(55, '2019-10-22', '17:00:00', 'ana', NULL, 'SI'),
(57, '2019-10-31', '17:00:00', 'angelina', 8, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones_has_usuarios`
--

CREATE TABLE `promociones_has_usuarios` (
  `promociones_ID_Promo` int(11) NOT NULL,
  `usuarios_login` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promociones_has_usuarios`
--

INSERT INTO `promociones_has_usuarios` (`promociones_ID_Promo`, `usuarios_login`) VALUES
(55, 'admin'),
(55, 'alfredo'),
(55, 'ana'),
(55, 'olista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `usuarios_login` varchar(45) NOT NULL,
  `pista_ID_Pista` tinyint(5) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_inicio` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`usuarios_login`, `pista_ID_Pista`, `fecha_reserva`, `hora_inicio`) VALUES
('admin', 5, '2019-10-23', '18:00:00'),
('admin', 7, '2019-10-25', '17:00:00'),
('admin', 7, '2019-10-30', '20:00:00'),
('admin', 8, '2019-10-30', '20:00:00'),
('agenor', 7, '2019-10-30', '18:00:00'),
('alvaro', 1, '2019-10-31', '17:00:00'),
('rita', 1, '2019-10-30', '20:00:00'),
('rita', 2, '2019-10-30', '20:00:00'),
('rita', 5, '2019-10-30', '20:00:00'),
('rita', 6, '2019-10-30', '20:00:00'),
('ypgarcia', 2, '2019-10-25', '12:30:00'),
('ypgarcia', 6, '2019-10-24', '15:30:00'),
('ypgarcia', 7, '2019-11-06', '14:00:00'),
('ypgarcia', 8, '2019-10-23', '21:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `ID_Torneo` tinyint(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `edicion` int(5) NOT NULL,
  `nivel` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`ID_Torneo`, `nombre`, `categoria`, `fecha`, `edicion`, `nivel`) VALUES
(1, 'Roland Garros', 'Masculina', '2019-05-22', 2019, 1),
(2, 'Wimbledon', 'Masculina', '2019-07-01', 2019, 1),
(3, 'US Open', 'Femenina', '2019-09-12', 2019, 2),
(4, 'Australia Open', 'Femenina', '2019-01-14', 2019, 3),
(5, 'Portonovo Open', 'Mixta', '2019-10-22', 2019, 3),
(6, 'Ourense Tour', 'Mixta', '2019-12-25', 2019, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fecha` date NOT NULL,
  `sexo` enum('Masculina','Femenina') NOT NULL,
  `tipo` enum('ADMIN','NORMAL','ENTRENADOR') NOT NULL,
  `socio` enum('SI','NO') NOT NULL DEFAULT 'NO',
  `IBAN` varchar(4) DEFAULT NULL,
  `cuenta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `dni`, `nombre`, `apellidos`, `telefono`, `email`, `fecha`, `sexo`, `tipo`, `socio`, `IBAN`, `cuenta`) VALUES
('aaaaa', 'aaaa', '00000000T', 'aasdd', 'few', '678453234', 'ypg3443arcia@esei.uvigo.es', '2019-10-23', 'Masculina', 'NORMAL', 'NO', '', ''),
('admin', 'admin', '11111111H', 'Admin', 'Adminez Adminez', '676532185', 'admin@admin.es', '1991-05-14', 'Masculina', 'ADMIN', 'NO', '', ''),
('agenor', 'agenor', '430524', 'Agenor', 'Quintas Lopez', '8646', 'agenor@gmail.com', '2019-10-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('alfredo', 'alfredo', '32542', 'Alfredo', 'Casas Talleres', '234567', 'alfredo@gmail.com', '2019-10-30', 'Masculina', 'NORMAL', 'NO', '', ''),
('alvaro', 'alvaro', '1234', 'Alvaro', 'Cardero Lopez', '5834', 'alvaro@gmail.com', '2019-10-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('ana', 'ana', '582398', 'Ana', 'Barreiro Blanco', '3928', 'ana@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('anais', 'anais', 'gtrg', 'anais', 'nbhgug', '88', 'fewfwe', '2019-10-22', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('angelina', 'angelina', 'gergeve', 'veverv', 'ververvev', 'veverv', 'bebveb', '2019-10-01', 'Femenina', '', 'NO', NULL, NULL),
('antonio', 'antonio', '456781', 'Antonio', 'Gonzalez Tejero', '2314411', 'antonio@gmail.com', '2019-10-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('asuncion', 'asuncion', 'vrewverv', 'ververv', 'vevev', 'vewverv', 'vreve', '2019-10-06', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('belen', 'belen', '25038044Z', 'Belen', 'Varela Perez', '770249813', 'belenbelen@gmail.com', '1977-07-07', 'Femenina', 'NORMAL', 'NO', '', ''),
('borja', 'borja', '32441', 'Borja', 'Nuñez Gil', '23452', 'borja@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlos', 'carlos', '098482', 'Carlos', 'Aller Forum', '21', 'carlos@gmail.com', '2019-10-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('carmen', 'carmen', '5890421', 'Carmen', 'Formoso Lorenzo', '0935029', 'carmen@gmail.com', '2019-10-22', 'Femenina', 'NORMAL', 'NO', '', ''),
('celia', 'celia', '503025', 'Celia', 'Rodriguez Garcia', '390021', 'celia@gmail.com', '2019-10-08', 'Femenina', 'NORMAL', 'NO', '', ''),
('chica1', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica10', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica11', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica12', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica13', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica14', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica15', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica16', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica17', 'chica', 'fwrgw', 'vwrfv', 'wvvrv', 'vewrvr', 'egerge', '2019-10-01', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica18', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica19', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica2', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica20', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica21', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica22', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica23', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica24', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica25', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica26', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica27', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica28', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica3', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica4', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica5', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica6', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica7', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica8', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica9', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica98', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('chica99', 'chica', '', '', '', '', '', '0000-00-00', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('cole', 'cole', '21231', 'Cole', 'Ordoñez Irujo', '2211', 'cole@gmail.com', '2019-10-23', 'Masculina', 'NORMAL', 'NO', '', ''),
('david', 'david', '54353', 'David', 'Sanchez Sanchez', '54835', 'david@gmail.com', '2019-10-09', 'Masculina', 'NORMAL', 'NO', '', ''),
('diana', 'diana', '95202', 'Diana', 'Casanova Smith', '58239', 'diana@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'SI', 'er', 'erwtet'),
('esther', 'esther', '3475892', 'Esther', 'Montecelo Rivera', '3242', 'esther@gmail.com', '2019-10-09', 'Femenina', 'NORMAL', 'NO', '', ''),
('fabio', 'fabio', '32131', 'Fabio', 'Ledo Lid', '112313', 'fabio@gmail.com', '2019-10-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('felipe', 'felipe', '12345678Z', 'Felipe Juan Pablo Alfonso', 'de Todos los Santos de Borbón y Grecia', '669680477', 'felipevi@gmail.com', '1968-01-30', 'Masculina', 'NORMAL', 'NO', '', ''),
('flora', 'flora', 'gerve', 'beve3v', 'gregve3v', 'be3ge3', 'g3eg3e', '2019-10-10', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('gertrudis', 'gertrudis', 'ferf', 'fewfe', 'vervre', 'cere', 'vevev', '2019-10-09', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('isaac', 'isaac', '78923', 'Isaac', 'Prada Melon', '24567234', 'isaac@gmail.com', '2019-10-21', 'Masculina', 'NORMAL', 'NO', '', ''),
('isabel', 'isabel', '0352039', 'Isabel', 'Mata Gundersen', '6563', 'isabel@gmail.com', '2019-10-17', 'Femenina', 'NORMAL', 'NO', '', ''),
('javi', 'javi', '2313124', 'Javi', 'Iglesias Exposito', '321341', 'javi@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('joel', 'joel', '0982', 'Joel', 'Perez Hierro', '211111', 'joel@gmail.com', '2019-10-02', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorge', 'jorge', '241312', 'Jorge', 'Perez Perez', '4356253', 'jorge@gmail.com', '2019-10-31', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorginho', 'jorginho', '201834', 'Jorge', 'Rodriguez Duro', '345612', 'jorginho@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('juan', 'juan', '63498344J', 'Juan', 'Guerrero Vera', '660877067', 'juanjuan@gmail.com', '2001-06-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('kelly', 'kelly', 'vr', 'vrevrv', 'vageg', 'bhrv', 'brhvrhs', '2019-10-23', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('lucia', 'lucia', '498592', 'Lucia', 'Nespereira Camba', '3903', 'lucia@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('luis', 'luis', '231222', 'Luis', 'Quintas Tellez', '65481', 'luis@gmail.com', '2019-10-16', 'Masculina', 'NORMAL', 'NO', '', ''),
('luisinho', 'luisinho', '54928', 'Luis', 'Quintela Antelo', '45232', 'luisinho@gmail.com', '2019-10-02', 'Masculina', 'NORMAL', 'NO', '', ''),
('manuel', 'manuel', '26685410M', 'Manuel', 'Abril Farres', '828297632', 'manuelmanuel@gmail.com', '1981-02-28', 'Masculina', 'NORMAL', 'NO', '', ''),
('maria', 'maria', '92643593F', 'Maria', 'Saez de la Torre', '626851194', 'mariamaria@gmail.com', '1979-01-07', 'Femenina', 'NORMAL', 'NO', '', ''),
('maria1', 'maria1', '984598', 'Maria', 'Pumar Baltar', '95830', 'maria@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('mariana', 'mariana', '959230', 'Mariana', 'Boveda Iglesias', '093295', 'mariana@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('ninoska', 'ninoska', 'fewwf', 'ninoska', 'fewf', '41', 'ninoska', '2019-10-07', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('noemi', 'noemi', '9592', 'Noemi', 'Quesada Delmonte', '98593', 'noemi@gmail.com', '2019-10-17', 'Femenina', 'NORMAL', 'NO', '', ''),
('olaya', 'olaya', '75485923', 'Olaya', 'Rodriguez Luz', '949328', 'olaya@gmail.com', '2019-10-13', 'Femenina', 'NORMAL', 'NO', '', ''),
('olista', '1234', '24252751X', 'Oscar', 'Lista Rivera', '643956059', 'adminadmin@gmail.com', '1994-05-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('oscar', 'oscar', '85923', 'Oscar', 'Fernandez Lista', '9523', 'oscar@gmail.com', '2019-10-02', 'Masculina', 'NORMAL', 'NO', '', ''),
('paz', 'paz', '5273875', 'Paz', 'Balboa Stallone', '9583257', 'paz@gmail.com', '2019-10-09', 'Femenina', 'NORMAL', 'NO', '', ''),
('pepa', 'pepa', '16581943R', 'Pepa', 'Gonzalez Perez', '670084078', 'pepapepa@gmail.com', '1976-10-27', 'Femenina', 'NORMAL', 'NO', '', ''),
('pilar', 'pilar', '35890', 'Pilar', 'Lado Derecho', '589485', 'pilar@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'NO', '', ''),
('remedios', 'remedios', 'fewrfr', 'vrewvr', 'ververvewrv', 'ververve', 'verv', '2019-10-24', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('rita', 'rita', '85932', 'Rita', 'Conde Barvera', '589203', 'rita@gmail.com', '2019-10-24', 'Femenina', 'NORMAL', 'NO', '', ''),
('rocio', 'rocio', '052839', 'Rocio', 'Fernandez Montero', '098325', 'rocio@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'NO', '', ''),
('rosa', 'rosa', '12393504T', 'Rosa', 'Cruz Moreno', '878127326', 'rosarosa@gmail.com', '1993-11-11', 'Femenina', 'NORMAL', 'NO', '', ''),
('rosina', 'rosina', '485239', 'Rosina', 'Fernandez Perez', '34490', 'rosina@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'NO', '', ''),
('santi', 'santi', '71557134V', 'Santiago', 'Castor Nogales', '695259914', 'santisanti@gmail.com', '1997-01-01', 'Masculina', 'NORMAL', 'NO', '', ''),
('sara', 'sara', '53518040F', 'Sara', 'Ezquerro Iglesias', '626693106', 'sarasara@gmail.com', '1988-08-03', 'Femenina', 'NORMAL', 'NO', '', ''),
('sergio', 'sergio', '4234221', 'Sergio', 'Magan Lopez', '42314', 'sergio@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('tania', 'tania', '039520', 'Tania', 'Fernandez Gallego', '9523058', 'tania@gmail.com', '2019-10-22', 'Femenina', 'NORMAL', 'NO', '', ''),
('teofilo', 'teofilo', '094812', 'Teofilo', 'Martin Martin', '63424', 'teofilo@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('ursula', 'ursula', 'ferfcer', 'fwrecwerc', 'vwervwerv', 'vewrverv', 'ervwev', '2019-10-18', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('vicentabenito', 'vicentabenito', 'vwwrvr', 'verv', 'ververv', 'vewrverv', 'ver', '2019-10-17', 'Femenina', 'NORMAL', 'NO', NULL, NULL),
('xiana', 'xiana', '343817', 'Xiana', 'Golpe Sainz', '58320', 'xiana@gmail.com', '2019-10-09', 'Femenina', 'NORMAL', 'NO', '', ''),
('yago', 'yago', '211243', 'Yago', 'Gonzalez Urdiales', '2131412', 'yago@gmail.com', '2019-10-02', 'Masculina', 'NORMAL', 'NO', '', ''),
('ypgarcia', 'asdf', '44657078W', 'Iago', 'Perez Garcia', '669517850', 'ypgarcia@esei.uvigo.es', '1996-04-21', 'Masculina', 'NORMAL', 'SI', 'ES00', '1234567890123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `parejas`
--
ALTER TABLE `parejas`
  ADD PRIMARY KEY (`ID_Pareja`,`usuarios_login`,`usuarios_login1`),
  ADD KEY `fk_usuarios_parejas` (`usuarios_login`),
  ADD KEY `fk_usuarios_parejas1` (`usuarios_login1`);

--
-- Indices de la tabla `parejas_has_grupos`
--
ALTER TABLE `parejas_has_grupos`
  ADD PRIMARY KEY (`ID_Pareja`,`grupo`,`ID_Torneo`);

--
-- Indices de la tabla `parejas_has_partidos`
--
ALTER TABLE `parejas_has_partidos`
  ADD PRIMARY KEY (`ID_Partido`) USING BTREE,
  ADD KEY `ID_Partido` (`ID_Partido`),
  ADD KEY `ID_Pareja` (`ID_ParejaLocal`) USING BTREE,
  ADD KEY `ID_ParejaVisitante` (`ID_ParejaVisitante`);

--
-- Indices de la tabla `parejas_has_torneos`
--
ALTER TABLE `parejas_has_torneos`
  ADD PRIMARY KEY (`parejas_ID_Pareja`,`torneos_ID_Torneo`),
  ADD KEY `fk_parejas_parejas_has_torneos` (`parejas_ID_Pareja`),
  ADD KEY `fk_parejas_parejas_has_torneos3` (`torneos_ID_Torneo`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`ID_Partido`),
  ADD KEY `pista_ID_Pista` (`pista_ID_Pista`);

--
-- Indices de la tabla `pista`
--
ALTER TABLE `pista`
  ADD PRIMARY KEY (`ID_Pista`),
  ADD UNIQUE KEY `Nombre_Pista` (`Nombre_Pista`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`ID_Promo`),
  ADD KEY `usuarios_login_usuario` (`usuarios_login_usuario`),
  ADD KEY `pista_ID_Pista` (`pista_ID_Pista`);

--
-- Indices de la tabla `promociones_has_usuarios`
--
ALTER TABLE `promociones_has_usuarios`
  ADD PRIMARY KEY (`promociones_ID_Promo`,`usuarios_login`),
  ADD KEY `ID_Promo` (`promociones_ID_Promo`),
  ADD KEY `ID_Promo_2` (`promociones_ID_Promo`),
  ADD KEY `usuarios_login` (`usuarios_login`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`usuarios_login`,`pista_ID_Pista`,`hora_inicio`,`fecha_reserva`),
  ADD KEY `fk_usuarios_has_pista_pista1` (`pista_ID_Pista`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`ID_Torneo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `parejas`
--
ALTER TABLE `parejas`
  MODIFY `ID_Pareja` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_Partido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `ID_Torneo` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parejas_has_partidos`
--
ALTER TABLE `parejas_has_partidos`
  ADD CONSTRAINT `parejas_has_partidos_ibfk_1` FOREIGN KEY (`ID_ParejaLocal`) REFERENCES `parejas` (`ID_Pareja`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`pista_ID_Pista`) REFERENCES `pista` (`ID_Pista`);

--
-- Filtros para la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD CONSTRAINT `promociones_ibfk_1` FOREIGN KEY (`usuarios_login_usuario`) REFERENCES `usuarios` (`login`) ON DELETE NO ACTION,
  ADD CONSTRAINT `promociones_ibfk_2` FOREIGN KEY (`pista_ID_Pista`) REFERENCES `pista` (`ID_Pista`);

--
-- Filtros para la tabla `promociones_has_usuarios`
--
ALTER TABLE `promociones_has_usuarios`
  ADD CONSTRAINT `promociones_has_usuarios_ibfk_1` FOREIGN KEY (`usuarios_login`) REFERENCES `usuarios` (`login`),
  ADD CONSTRAINT `promociones_has_usuarios_ibfk_2` FOREIGN KEY (`promociones_ID_Promo`) REFERENCES `promociones` (`ID_Promo`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_usuarios_has_pista_pista1` FOREIGN KEY (`pista_ID_Pista`) REFERENCES `pista` (`ID_Pista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_pista_usuarios` FOREIGN KEY (`usuarios_login`) REFERENCES `usuarios` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
