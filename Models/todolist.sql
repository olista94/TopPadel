-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2019 a las 23:36:33
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

--
-- Estructura de tabla para la tabla `parejas`
--

CREATE TABLE `parejas` (
  `ID_Pareja` tinyint(5) NOT NULL,
  `usuarios_login` varchar(45) NOT NULL,
  `usuarios_login1` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas`
--

INSERT INTO `parejas` (`ID_Pareja`, `usuarios_login`, `usuarios_login1`) VALUES
(109, 'manuelangel', 'alvarocardero'),
(110, 'javierlorenzo', 'mariohernandez'),
(111, 'juancorral', 'guillermomtnez'),
(112, 'jorgepuertas', 'cristoffpereira'),
(113, 'alfredocasas', 'juanllano'),
(114, 'juancarlos', 'diegoportela'),
(115, 'juansoler', 'joseantonio'),
(116, 'albertordgz', 'luiscarmona'),
(117, 'luisviejo', 'diegojorreto'),
(118, 'carlosperez', 'arturolopez'),
(119, 'joseluis', 'teofilomartin'),
(120, 'diegocurras', 'jaimesalgado'),
(121, 'jesusiglesias', 'josemaria'),
(122, 'abelardoglez', 'linogonzalez'),
(123, 'luiscaride', 'oscarfernadez'),
(124, 'fabioroson', 'rubengonzalez'),
(125, 'oscardominguez', 'carlosconde'),
(126, 'jorgesabucedo', 'pacobarrio');

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
(109, 0, 1),
(110, 0, 1),
(111, 0, 1),
(112, 0, 1),
(113, 0, 1),
(114, 0, 1),
(115, 0, 1),
(116, 0, 1),
(117, 0, 1),
(118, 1, 1),
(119, 1, 1),
(120, 1, 1),
(121, 1, 1),
(122, 1, 1),
(123, 1, 1),
(124, 1, 1),
(125, 1, 1),
(126, 1, 1);

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
(1, 1, 109, 110),
(2, 1, 109, 111),
(3, 1, 109, 112),
(4, 1, 109, 113),
(5, 1, 109, 114),
(6, 1, 109, 115),
(7, 1, 109, 116),
(8, 1, 109, 117),
(9, 1, 110, 111),
(10, 1, 110, 112),
(11, 1, 110, 113),
(12, 1, 110, 114),
(13, 1, 110, 115),
(14, 1, 110, 116),
(15, 1, 110, 117),
(16, 1, 111, 112),
(17, 1, 111, 113),
(18, 1, 111, 114),
(19, 1, 111, 115),
(20, 1, 111, 116),
(21, 1, 111, 117),
(22, 1, 112, 113),
(23, 1, 112, 114),
(24, 1, 112, 115),
(25, 1, 112, 116),
(26, 1, 112, 117),
(27, 1, 113, 114),
(28, 1, 113, 115),
(29, 1, 113, 116),
(30, 1, 113, 117),
(31, 1, 114, 115),
(32, 1, 114, 116),
(33, 1, 114, 117),
(34, 1, 115, 116),
(35, 1, 115, 117),
(36, 1, 116, 117),
(37, 1, 118, 119),
(38, 1, 118, 120),
(39, 1, 118, 121),
(40, 1, 118, 122),
(41, 1, 118, 123),
(42, 1, 118, 124),
(43, 1, 118, 125),
(44, 1, 118, 126),
(45, 1, 119, 120),
(46, 1, 119, 121),
(47, 1, 119, 122),
(48, 1, 119, 123),
(49, 1, 119, 124),
(50, 1, 119, 125),
(51, 1, 119, 126),
(52, 1, 120, 121),
(53, 1, 120, 122),
(54, 1, 120, 123),
(55, 1, 120, 124),
(56, 1, 120, 125),
(57, 1, 120, 126),
(58, 1, 121, 122),
(59, 1, 121, 123),
(60, 1, 121, 124),
(61, 1, 121, 125),
(62, 1, 121, 126),
(63, 1, 122, 123),
(64, 1, 122, 124),
(65, 1, 122, 125),
(66, 1, 122, 126),
(67, 1, 123, 124),
(68, 1, 123, 125),
(69, 1, 123, 126),
(70, 1, 124, 125),
(71, 1, 124, 126),
(72, 1, 125, 126);

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
(109, 1, 1, 0, 1, 1),
(110, 1, 1, 1, 0, 3),
(111, 1, 0, 0, 0, 0),
(112, 1, 0, 0, 0, 0),
(113, 1, 0, 0, 0, 0),
(114, 1, 0, 0, 0, 0),
(115, 1, 0, 0, 0, 0),
(116, 1, 0, 0, 0, 0),
(117, 1, 0, 0, 0, 0),
(118, 1, 0, 0, 0, 0),
(119, 1, 0, 0, 0, 0),
(120, 1, 0, 0, 0, 0),
(121, 1, 0, 0, 0, 0),
(122, 1, 0, 0, 0, 0),
(123, 1, 0, 0, 0, 0),
(124, 1, 0, 0, 0, 0),
(125, 1, 0, 0, 0, 0),
(126, 1, 0, 0, 0, 0);

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
(1, '2019-10-28', '08:00:00', 'Grupos', '', '', 1, 0, 2, 0, 0, 0, 0, 0, 0),
(2, '2019-10-28', '09:30:00', 'Grupos', '', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2019-10-29', '17:00:00', 'Grupos', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2019-10-28', '21:30:00', 'Grupos', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2019-10-30', '14:00:00', 'Grupos', '', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(57, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones_has_usuarios`
--

CREATE TABLE `promociones_has_usuarios` (
  `promociones_ID_Promo` int(11) NOT NULL,
  `usuarios_login` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('manuelangel', 1, '2019-10-28', '08:00:00'),
('manuelangel', 1, '2019-10-30', '14:00:00'),
('manuelangel', 1, '2019-10-29', '17:00:00'),
('manuelangel', 1, '2019-10-28', '21:30:00'),
('manuelangel', 2, '2019-10-28', '08:00:00'),
('olista', 7, '2019-10-31', '15:30:00');

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
('abelardoglez', 'abelardoglez', '41717337Y', 'Abelardo', 'Gonzalez Villamil', '695435343', 'villamilaberlard@gmail.com', '1969-03-23', 'Masculina', 'NORMAL', 'NO', '', ''),
('admin', 'admin', '11111111H', 'Admin', 'Adminez Adminez', '676532185', 'admin@admin.es', '1991-05-14', 'Masculina', 'ADMIN', 'NO', '', ''),
('albertordgz', 'albertordgz', '16084051J', 'Alberto', 'Rodriguez EspaÃ±a', '983473423', 'arespaÃ±a@esei.uvigo.es', '1998-03-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('alfredocasas', 'alfredocasas', '99025185L', 'Alfredo', 'Casas Rojas', '988734623', 'alfredhard_occ@aol.es', '2001-01-01', 'Masculina', 'NORMAL', 'NO', '', ''),
('alvarocardero', 'alvarocardero', '14408363J', 'Alvaro', 'Cardero Hernandez', '678493213', 'alvaritorito@gmail.com', '1997-11-20', 'Masculina', 'NORMAL', 'NO', '', ''),
('arturolopez', 'arturolopez', '76578256D', 'Arturo', 'Lopez Rivera', '988374342', 'arturo_arturito@gmail.com', '1978-11-01', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlosconde', 'carlosconde', '66882682Q', 'Carlos', 'Conde Trueba', '674835332', 'condetrueba1@uvigo.es', '1974-04-04', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlosperez', 'carlosperez', '12383305J', 'Carlos', 'Perez Matias', '666234236', 'carlitosperez@gmail.com', '1987-04-16', 'Masculina', 'NORMAL', 'NO', '', ''),
('cristoffpereira', 'cristoffpereira', '10412725G', 'Cristoff', 'Pereira Tellez', '683743212', 'cristoffpertell@outlook.com', '1986-04-12', 'Masculina', 'NORMAL', 'NO', '', ''),
('diegocurras', 'diegocurras', '13904461H', 'Diego', 'Curras Blas', '683423423', 'currasblasmas@gmail.com', '1965-05-13', 'Masculina', 'NORMAL', 'NO', '', ''),
('diegojorreto', 'diegojorreto', '74838615L', 'Diego', 'Jorreto Dominguez', '684538434', 'diegooooljorreto@yahoo.com', '1997-10-12', 'Masculina', 'NORMAL', 'NO', '', ''),
('diegoportela', 'diegoportela', '66245444Q', 'Diego', 'Portela Lopez', '674382421', 'diegol@outlook.com', '1985-06-20', 'Masculina', 'NORMAL', 'NO', '', ''),
('fabioroson', 'fabioroson', '35924493B', 'Fabio', 'Roson Rosales', '674853223', 'rosonrosales@hotmail.com', '1985-04-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('guillermomtnez', 'guillermomtnez', '28875991C', 'Guillermo', 'Martinez Soria', '683742432', 'guille_1989@gmail.com', '1989-11-25', 'Masculina', 'NORMAL', 'NO', '', ''),
('jaimesalgado', 'jaimesalgado', '04152746G', 'Jaime', 'Salgado Gutierrez', '666437322', 'jaimito456_salga@gmail.com', '1995-12-04', 'Masculina', 'NORMAL', 'NO', '', ''),
('javierlorenzo', 'javierlorenzo', '15396085T', 'Javier', 'Lorenzo Gil', '678321241', 'superjavi@yahoo.com', '1987-06-17', 'Masculina', 'NORMAL', 'NO', '', ''),
('jesusiglesias', 'jesusiglesias', '77523701Q', 'Jesus', 'Iglesias de la Torre', '987534234', 'jesusinho_towers@yahoo.es', '2001-07-04', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorgepuertas', 'jorgepuertas', '90471642S', 'Jorge', 'Puertas Ugarte', '987563421', 'jorginho_69@yahoo.com', '2002-07-30', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorgesabucedo', 'jorgesabucedo', '51907965R', 'Jorge', 'Sabucedo Montes', '985847543', 'jorge4ever@gmail.com', '1994-07-26', 'Masculina', 'NORMAL', 'NO', '', ''),
('joseantonio', 'joseantonio', '06956257E', 'Jose Antonio', 'Moyano Brey', '683473292', 'breysuperstar@gmail.com', '2000-11-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('joseluis', 'joseluis', '23227175G', 'Jose Luis', 'Rodriguez Espinosa', '673482344', 'jlrodrinosa@hotmail.com', '1990-09-13', 'Masculina', 'NORMAL', 'NO', '', ''),
('josemaria', 'josemaria', '06361196V', 'Jose Maria', 'Gonzalez Gonzalez', '667432434', 'chemaglezglez@hotmail.com', '1993-10-06', 'Masculina', 'NORMAL', 'NO', '', ''),
('juancarlos', 'juancarlos', '01538777P', 'Juan Carlos', 'Perez Perez', '988462342', 'juankar_bombom96@gmail.com', '1996-12-21', 'Masculina', 'NORMAL', 'NO', '', ''),
('juancorral', 'juancorral', '73539077G', 'Juan', 'Corral Perez', '699384234', 'juanitocorral@hotmail.com', '1991-02-26', 'Masculina', 'NORMAL', 'NO', '', ''),
('juanllano', 'juanllano', '97401039H', 'Juan', 'Llano Fernandez', '678432342', 'juanllanollano@yahoo.com', '1994-09-11', 'Masculina', 'NORMAL', 'NO', '', ''),
('juansoler', 'juansoler', '12705621F', 'Juan', 'Soler Jimenez', '674832231', 'solerjimjuan@uvigo.es', '1973-05-24', 'Masculina', 'NORMAL', 'NO', '', ''),
('linogonzalez', 'linogonzalez', '09915233W', 'Lino', 'Gonzalez Fuster', '674534233', 'linoavelino@yahoo.com', '1982-05-31', 'Masculina', 'NORMAL', 'NO', '', ''),
('luiscaride', 'luiscaride', '60545480G', 'Luis', 'Caride Abril', '678345352', 'luiscarabril@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', ''),
('luiscarmona', 'luiscarmona', '61033162V', 'Luis', 'Carmona Goya', '653243243', 'luisinhocarmona@yahoo.com', '1980-08-24', 'Masculina', 'NORMAL', 'NO', '', ''),
('luisviejo', 'luisviejo', '25474614K', 'Luis', 'Viejo Gil', '683843422', 'luisviejo_09876@gmail.com', '1976-02-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('manuelangel', 'manuelangel', '03960290N', 'Manuel Angel', 'Perez Jimenez', '666234234', 'manuangel@hotmail.com', '1973-01-14', 'Masculina', 'NORMAL', 'NO', '', ''),
('mariohernandez', 'mariohernandez', '22474502Y', 'Mario', 'Hernandez Hermoso', '689242312', 'supermario64@gmail.com', '1964-04-03', 'Masculina', 'NORMAL', 'NO', '', ''),
('olista', '1234', '24252751X', 'Oscar', 'Lista Rivera', '643956059', 'adminadmin@gmail.com', '1994-05-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('oscardominguez', 'oscardominguez', '40315187M', 'Oscar', 'Dominguez Sanz', '674324233', 'oscardomsanz456@hotmail.com', '1991-11-18', 'Masculina', 'NORMAL', 'NO', '', ''),
('oscarfernadez', 'oscarfernadez', '36416302B', 'Oscar', 'Fernandez Dorado', '746345332', 'oscardorado98@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', ''),
('pacobarrio', 'pacobarrio', '52957832X', 'Paco', 'Barrio Leon', '647583423', 'pacoleon@yahoo.com', '1977-03-28', 'Masculina', 'NORMAL', 'NO', '', ''),
('rubengonzalez', 'rubengonzalez', '43257679S', 'Ruben', 'Gonzalez Hurtado', '674357232', 'ruben7star@gmail.com', '1999-07-25', 'Masculina', 'NORMAL', 'NO', '', ''),
('teofilomartin', 'teofilomartin', '25557539P', 'Teofilo', 'Martin Vidal', '987543532', 'teofilo_87832@gmail.com', '1983-07-13', 'Masculina', 'NORMAL', 'NO', '', ''),
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
  MODIFY `ID_Pareja` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_Partido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
