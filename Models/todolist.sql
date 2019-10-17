-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2019 a las 17:07:10
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

-- --------------------------------------------------------

CREATE TABLE `parejas` (
  `ID_Pareja` tinyint(5) NOT NULL,
  `usuarios_login` varchar(45) NOT NULL,
  `usuarios_login1` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas`
--

INSERT INTO `parejas` (`ID_Pareja`, `usuarios_login`, `usuarios_login1`) VALUES
(8, 'alvaro', 'joel'),
(9, 'borja', 'yago'),
(10, 'jorge', 'antonio'),
(11, 'david', 'alfredo'),
(12, 'sergio', 'jorginho'),
(13, 'cole', 'isaac'),
(14, 'fabio', 'teofilo'),
(15, 'carlos', 'oscar'),
(16, 'luis', 'luisinho'),
(17, 'javi', 'agenor'),
(29, 'rita', 'noemi'),
(30, 'diana', 'isabel'),
(31, 'maria1', 'paz'),
(32, 'pilar', 'tania'),
(33, 'esther', 'lucia'),
(34, 'olaya', 'mariana'),
(35, 'xiana', 'rocio'),
(36, 'ana', 'carmen'),
(37, 'rosina', 'celia');

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
(138, 1, 8, 9),
(139, 1, 8, 10),
(140, 1, 8, 11),
(141, 1, 8, 12),
(142, 1, 8, 13),
(143, 1, 8, 14),
(144, 1, 8, 15),
(145, 1, 8, 16),
(146, 1, 8, 17),
(147, 1, 9, 10),
(148, 1, 9, 11),
(149, 1, 9, 12),
(150, 1, 9, 13),
(151, 1, 9, 14),
(152, 1, 9, 15),
(153, 1, 9, 16),
(154, 1, 9, 17),
(155, 1, 10, 11),
(156, 1, 10, 12),
(157, 1, 10, 13),
(158, 1, 10, 14),
(159, 1, 10, 15),
(160, 1, 10, 16),
(161, 1, 10, 17),
(162, 1, 11, 12),
(163, 1, 11, 13),
(164, 1, 11, 14),
(165, 1, 11, 15),
(166, 1, 11, 16),
(167, 1, 11, 17),
(168, 1, 12, 13),
(169, 1, 12, 14),
(170, 1, 12, 15),
(171, 1, 12, 16),
(172, 1, 12, 17),
(173, 1, 13, 14),
(174, 1, 13, 15),
(175, 1, 13, 16),
(176, 1, 13, 17),
(177, 1, 14, 15),
(178, 1, 14, 16),
(179, 1, 14, 17),
(180, 1, 15, 16),
(181, 1, 15, 17),
(182, 1, 16, 17),
(183, 3, 29, 30),
(184, 3, 29, 31),
(185, 3, 29, 32),
(186, 3, 29, 33),
(187, 3, 29, 34),
(188, 3, 29, 35),
(189, 3, 29, 36),
(190, 3, 29, 37),
(191, 3, 30, 31),
(192, 3, 30, 32),
(193, 3, 30, 33),
(194, 3, 30, 34),
(195, 3, 30, 35),
(196, 3, 30, 36),
(197, 3, 30, 37),
(198, 3, 31, 32),
(199, 3, 31, 33),
(200, 3, 31, 34),
(201, 3, 31, 35),
(202, 3, 31, 36),
(203, 3, 31, 37),
(204, 3, 32, 33),
(205, 3, 32, 34),
(206, 3, 32, 35),
(207, 3, 32, 36),
(208, 3, 32, 37),
(209, 3, 33, 34),
(210, 3, 33, 35),
(211, 3, 33, 36),
(212, 3, 33, 37),
(213, 3, 34, 35),
(214, 3, 34, 36),
(215, 3, 34, 37),
(216, 3, 35, 36),
(217, 3, 35, 37),
(218, 3, 36, 37);

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
(8, 1, 0, 0, 0, 0),
(9, 1, 0, 0, 0, 0),
(10, 1, 0, 0, 0, 0),
(11, 1, 0, 0, 0, 0),
(12, 1, 0, 0, 0, 0),
(13, 1, 0, 0, 0, 0),
(14, 1, 0, 0, 0, 0),
(15, 1, 0, 0, 0, 0),
(16, 1, 0, 0, 0, 0),
(17, 1, 0, 0, 0, 0),
(29, 3, 0, 0, 0, 0),
(30, 3, 0, 0, 0, 0),
(31, 3, 0, 0, 0, 0),
(32, 3, 0, 0, 0, 0),
(33, 3, 0, 0, 0, 0),
(34, 3, 0, 0, 0, 0),
(35, 3, 0, 0, 0, 0),
(36, 3, 0, 0, 0, 0),
(37, 3, 0, 0, 0, 0);

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
  `Sets_Local` int(1) NOT NULL,
  `Sets_Visitante` int(1) NOT NULL,
  `JuegosSet1_Local` int(2) NOT NULL,
  `JuegosSet1_Visitante` int(2) NOT NULL,
  `JuegosSet2_Local` int(2) NOT NULL,
  `JuegosSet2_Visitante` int(2) NOT NULL,
  `JuegosSet3_Local` int(2) NOT NULL,
  `JuegosSet3_Visitante` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`ID_Partido`, `fecha`, `hora`, `ronda`, `jornada`, `grupo`, `pista_ID_Pista`, `Sets_Local`, `Sets_Visitante`, `JuegosSet1_Local`, `JuegosSet1_Visitante`, `JuegosSet2_Local`, `JuegosSet2_Visitante`, `JuegosSet3_Local`, `JuegosSet3_Visitante`) VALUES
(138, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(139, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(140, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(141, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(142, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(143, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(144, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(145, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(146, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(147, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(148, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(149, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(150, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(151, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(152, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(153, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(154, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(155, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(156, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(157, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(158, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(159, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(160, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(161, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(162, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(163, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(164, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(165, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(166, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(167, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(168, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(169, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(170, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(171, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(172, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(173, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(174, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(175, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(176, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(177, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(178, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(179, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(180, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(181, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(182, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(183, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(184, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(185, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(186, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(187, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(188, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(189, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(190, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(191, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(192, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(193, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(194, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(195, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(196, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(197, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(198, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(199, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(200, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(201, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(202, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(203, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(204, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(205, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(206, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(207, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(208, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(209, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(210, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(211, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(212, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(213, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(214, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(215, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(216, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(217, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0),
(218, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0);

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
(19, '2019-10-05', '08:00:00', 'felipe', 1, 'SI'),
(23, '2019-10-15', '08:00:00', 'admin', 8, 'SI'),
(24, '2020-10-15', '15:30:00', 'maria', 5, 'NO'),
(28, '2019-10-24', '08:00:00', 'admin', 1, 'NO'),
(29, '2019-11-09', '15:00:00', 'ypgarcia', 6, 'NO'),
(30, '2019-10-08', '08:00:00', 'ypgarcia', 1, 'NO'),
(31, '2019-10-31', '08:00:00', 'ypgarcia', 1, 'NO'),
(32, '2019-10-15', '08:00:00', 'ypgarcia', 1, 'NO');

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
(19, 'belen'),
(19, 'felipe'),
(19, 'santi'),
(19, 'ypgarcia'),
(23, 'admin'),
(23, 'maria'),
(23, 'olista'),
(23, 'ypgarcia'),
(24, 'admin'),
(24, 'maria'),
(24, 'ypgarcia'),
(28, 'admin'),
(28, 'ypgarcia'),
(29, 'olista'),
(29, 'ypgarcia'),
(30, 'ypgarcia'),
(31, 'ypgarcia'),
(32, 'ypgarcia');

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
('admin', 1, '2019-10-08', '08:00:00'),
('admin', 1, '2019-10-09', '08:00:00'),
('admin', 1, '2019-10-08', '09:30:00'),
('admin', 1, '2019-10-09', '09:30:00'),
('admin', 1, '2019-10-08', '11:00:00'),
('admin', 1, '2019-10-08', '12:30:00'),
('admin', 1, '2019-10-08', '14:00:00'),
('admin', 1, '2019-10-08', '15:30:00'),
('admin', 1, '2019-10-08', '17:00:00'),
('admin', 1, '2019-10-08', '18:30:00'),
('admin', 1, '2019-10-08', '20:00:00'),
('admin', 1, '2019-10-08', '21:30:00'),
('admin', 2, '2019-10-09', '08:00:00'),
('admin', 5, '2019-10-09', '08:00:00'),
('admin', 6, '2019-10-09', '08:00:00'),
('admin', 7, '2019-10-09', '08:00:00'),
('admin', 8, '2019-10-09', '08:00:00'),
('agenor', 2, '2019-10-09', '09:30:00'),
('agenor', 5, '2019-10-09', '09:30:00'),
('agenor', 6, '2019-10-09', '09:30:00'),
('agenor', 7, '2019-10-09', '09:30:00'),
('agenor', 8, '2019-10-09', '09:30:00'),
('alfredo', 1, '2019-10-09', '11:00:00'),
('olista', 2, '2019-10-09', '11:00:00'),
('ypgarcia', 5, '2019-10-23', '15:30:00');

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
(3, 'US Open', 'Femenina', '2019-09-12', 2019, 5),
(4, 'Australia Open', 'Femenina', '2019-01-14', 2019, 3),
(5, 'Portonovo Open', 'Mixta', '2019-10-22', 2019, 4),
(6, 'Ourense Tour', 'Mixta', '2019-12-25', 2019, 7);

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
('admin', 'admin', '11111111H', 'Admin', 'Adminez Adminez', '676532185', 'admin@admin.es', '1991-05-14', 'Masculina', 'ADMIN', 'NO', '', ''),
('agenor', 'agenor', '430524', 'Agenor', 'Quintas Lopez', '8646', 'agenor@gmail.com', '2019-10-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('alfredo', 'alfredo', '32542', 'Alfredo', 'Casas Talleres', '234567', 'alfredo@gmail.com', '2019-10-30', 'Masculina', 'NORMAL', 'NO', '', ''),
('alvaro', 'alvaro', '1234', 'Alvaro', 'Cardero Lopez', '5834', 'alvaro@gmail.com', '2019-10-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('ana', 'ana', '582398', 'Ana', 'Barreiro Blanco', '3928', 'ana@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('antonio', 'antonio', '456781', 'Antonio', 'Gonzalez Tejero', '2314411', 'antonio@gmail.com', '2019-10-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('belen', 'belen', '25038044Z', 'Belen', 'Varela Perez', '770249813', 'belenbelen@gmail.com', '1977-07-07', 'Femenina', 'NORMAL', 'NO', '', ''),
('borja', 'borja', '32441', 'Borja', 'Nuñez Gil', '23452', 'borja@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlos', 'carlos', '098482', 'Carlos', 'Aller Forum', '21', 'carlos@gmail.com', '2019-10-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('carmen', 'carmen', '5890421', 'Carmen', 'Formoso Lorenzo', '0935029', 'carmen@gmail.com', '2019-10-22', 'Femenina', 'NORMAL', 'NO', '', ''),
('celia', 'celia', '503025', 'Celia', 'Rodriguez Garcia', '390021', 'celia@gmail.com', '2019-10-08', 'Femenina', 'NORMAL', 'NO', '', ''),
('cole', 'cole', '21231', 'Cole', 'Ordoñez Irujo', '2211', 'cole@gmail.com', '2019-10-23', 'Masculina', 'NORMAL', 'NO', '', ''),
('david', 'david', '54353', 'David', 'Sanchez Sanchez', '54835', 'david@gmail.com', '2019-10-09', 'Masculina', 'NORMAL', 'NO', '', ''),
('diana', 'diana', '95202', 'Diana', 'Casanova Smith', '58239', 'diana@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'SI', 'er', 'erwtet'),
('esther', 'esther', '3475892', 'Esther', 'Montecelo Rivera', '3242', 'esther@gmail.com', '2019-10-09', 'Femenina', 'NORMAL', 'NO', '', ''),
('fabio', 'fabio', '32131', 'Fabio', 'Ledo Lid', '112313', 'fabio@gmail.com', '2019-10-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('felipe', 'felipe', '12345678Z', 'Felipe Juan Pablo Alfonso', 'de Todos los Santos de Borbón y Grecia', '669680477', 'felipevi@gmail.com', '1968-01-30', 'Masculina', 'NORMAL', 'NO', '', ''),
('isaac', 'isaac', '78923', 'Isaac', 'Prada Melon', '24567234', 'isaac@gmail.com', '2019-10-21', 'Masculina', 'NORMAL', 'NO', '', ''),
('isabel', 'isabel', '0352039', 'Isabel', 'Mata Gundersen', '6563', 'isabel@gmail.com', '2019-10-17', 'Femenina', 'NORMAL', 'NO', '', ''),
('javi', 'javi', '2313124', 'Javi', 'Iglesias Exposito', '321341', 'javi@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('joel', 'joel', '0982', 'Joel', 'Perez Hierro', '211111', 'joel@gmail.com', '2019-10-02', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorge', 'jorge', '241312', 'Jorge', 'Perez Perez', '4356253', 'jorge@gmail.com', '2019-10-31', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorginho', 'jorginho', '201834', 'Jorge', 'Rodriguez Duro', '345612', 'jorginho@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('juan', 'juan', '63498344J', 'Juan', 'Guerrero Vera', '660877067', 'juanjuan@gmail.com', '2001-06-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('lucia', 'lucia', '498592', 'Lucia', 'Nespereira Camba', '3903', 'lucia@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('luis', 'luis', '231222', 'Luis', 'Quintas Tellez', '65481', 'luis@gmail.com', '2019-10-16', 'Masculina', 'NORMAL', 'NO', '', ''),
('luisinho', 'luisinho', '54928', 'Luis', 'Quintela Antelo', '45232', 'luisinho@gmail.com', '2019-10-02', 'Masculina', 'NORMAL', 'NO', '', ''),
('manuel', 'manuel', '26685410M', 'Manuel', 'Abril Farres', '828297632', 'manuelmanuel@gmail.com', '1981-02-28', 'Masculina', 'NORMAL', 'NO', '', ''),
('maria', 'maria', '92643593F', 'Maria', 'Saez de la Torre', '626851194', 'mariamaria@gmail.com', '1979-01-07', 'Femenina', 'NORMAL', 'NO', '', ''),
('maria1', 'maria1', '984598', 'Maria', 'Pumar Baltar', '95830', 'maria@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('mariana', 'mariana', '959230', 'Mariana', 'Boveda Iglesias', '093295', 'mariana@gmail.com', '2019-10-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('noemi', 'noemi', '9592', 'Noemi', 'Quesada Delmonte', '98593', 'noemi@gmail.com', '2019-10-17', 'Femenina', 'NORMAL', 'NO', '', ''),
('olaya', 'olaya', '75485923', 'Olaya', 'Rodriguez Luz', '949328', 'olaya@gmail.com', '2019-10-13', 'Femenina', 'NORMAL', 'NO', '', ''),
('olista', '1234', '24252751X', 'Oscar', 'Lista Rivera', '643956059', 'adminadmin@gmail.com', '1994-05-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('oscar', 'oscar', '85923', 'Oscar', 'Fernandez Lista', '9523', 'oscar@gmail.com', '2019-10-02', 'Masculina', 'NORMAL', 'NO', '', ''),
('paz', 'paz', '5273875', 'Paz', 'Balboa Stallone', '9583257', 'paz@gmail.com', '2019-10-09', 'Femenina', 'NORMAL', 'NO', '', ''),
('pepa', 'pepa', '16581943R', 'Pepa', 'Gonzalez Perez', '670084078', 'pepapepa@gmail.com', '1976-10-27', 'Femenina', 'NORMAL', 'NO', '', ''),
('pilar', 'pilar', '35890', 'Pilar', 'Lado Derecho', '589485', 'pilar@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'NO', '', ''),
('rita', 'rita', '85932', 'Rita', 'Conde Barvera', '589203', 'rita@gmail.com', '2019-10-24', 'Femenina', 'NORMAL', 'NO', '', ''),
('rocio', 'rocio', '052839', 'Rocio', 'Fernandez Montero', '098325', 'rocio@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'NO', '', ''),
('rosa', 'rosa', '12393504T', 'Rosa', 'Cruz Moreno', '878127326', 'rosarosa@gmail.com', '1993-11-11', 'Femenina', 'NORMAL', 'NO', '', ''),
('rosina', 'rosina', '485239', 'Rosina', 'Fernandez Perez', '34490', 'rosina@gmail.com', '2019-10-30', 'Femenina', 'NORMAL', 'NO', '', ''),
('santi', 'santi', '71557134V', 'Santiago', 'Castor Nogales', '695259914', 'santisanti@gmail.com', '1997-01-01', 'Masculina', 'NORMAL', 'NO', '', ''),
('sara', 'sara', '53518040F', 'Sara', 'Ezquerro Iglesias', '626693106', 'sarasara@gmail.com', '1988-08-03', 'Femenina', 'NORMAL', 'NO', '', ''),
('sergio', 'sergio', '4234221', 'Sergio', 'Magan Lopez', '42314', 'sergio@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('tania', 'tania', '039520', 'Tania', 'Fernandez Gallego', '9523058', 'tania@gmail.com', '2019-10-22', 'Femenina', 'NORMAL', 'NO', '', ''),
('teofilo', 'teofilo', '094812', 'Teofilo', 'Martin Martin', '63424', 'teofilo@gmail.com', '2019-10-08', 'Masculina', 'NORMAL', 'NO', '', ''),
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
  MODIFY `ID_Pareja` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_Partido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
