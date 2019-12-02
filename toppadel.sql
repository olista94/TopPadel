-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 20:45:14
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
-- Base de datos: `toppadel`
--
DROP SCHEMA IF EXISTS `toppadel`;

CREATE DATABASE IF NOT EXISTS `toppadel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `toppadel`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_grupales`
--

CREATE TABLE `clases_grupales` (
  `ID_Clase` int(5) NOT NULL,
  `login_entrenador` varchar(15) NOT NULL,
  `tope` int(5) NOT NULL,
  `tipo` enum('ESCUELAS','CLINICS') NOT NULL,
  `descripcion` varchar(128) NOT NULL,
  `invitado` varchar(50) NOT NULL,
  `fecha_clase` date NOT NULL,
  `hora_clase` time NOT NULL,
  `ID_Pista` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_grupales`
--

INSERT INTO `clases_grupales` (`ID_Clase`, `login_entrenador`, `tope`, `tipo`, `descripcion`, `invitado`, `fecha_clase`, `hora_clase`, `ID_Pista`) VALUES
(23, 'guardiola', 10, 'ESCUELAS', 'Mejora en Android Studio', '', '2019-11-29', '15:30:00', 1),
(24, 'guardiola', 11, 'ESCUELAS', 'A la verga', '', '2019-12-01', '21:30:00', 1),
(27, 'guardiola', 3, 'ESCUELAS', 'Hoals', '', '2019-11-27', '15:30:00', 1),
(28, 'mourinho', 5, 'ESCUELAS', 'sadfghjk', '', '2019-11-27', '15:30:00', 2),
(32, 'guardiola', 1, 'CLINICS', 'Clinic 1', 'Rafa Nadal', '2019-11-27', '21:30:00', 1),
(33, 'mourinho', 2, 'CLINICS', 'Clinic 2', 'Roger Federer', '2019-11-27', '21:30:00', 2),
(34, 'sisu', 3, 'CLINICS', 'Clinic 3', 'Djokovic', '2019-11-27', '21:30:00', 5),
(35, 'guardiola', 5, 'CLINICS', 'jh', 'Paquito', '2019-11-27', '12:30:00', 1),
(36, 'mourinho', 43, 'CLINICS', 'No pep', 'fsefewegregf3', '2019-11-27', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_grupales_has_usuarios`
--

CREATE TABLE `clases_grupales_has_usuarios` (
  `ID_Clase` int(5) NOT NULL,
  `login_usuario` varchar(15) NOT NULL,
  `dia1` int(5) NOT NULL,
  `dia2` int(5) NOT NULL,
  `dia3` int(5) NOT NULL,
  `dia4` int(5) NOT NULL,
  `dia5` int(5) NOT NULL,
  `dia6` int(5) NOT NULL,
  `dia7` int(5) NOT NULL,
  `dia8` int(5) NOT NULL,
  `dia9` int(5) NOT NULL,
  `dia10` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_grupales_has_usuarios`
--

INSERT INTO `clases_grupales_has_usuarios` (`ID_Clase`, `login_usuario`, `dia1`, `dia2`, `dia3`, `dia4`, `dia5`, `dia6`, `dia7`, `dia8`, `dia9`, `dia10`) VALUES
(16, 'ypgarcia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(23, 'anabarreiro', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'carmenformoso', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'davidmiguez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'jesusiglesias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'jorgepuertas', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'olista', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'ritaconde', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'rosinafdez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'xianagolpe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'ypgarcia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'davidmiguez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(27, 'davidmiguez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(28, 'davidmiguez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(32, 'ypgarcia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_particulares`
--

CREATE TABLE `clases_particulares` (
  `ID_Clase` int(5) NOT NULL,
  `login_usuario` varchar(15) NOT NULL,
  `login_entrenador` varchar(15) NOT NULL,
  `fecha_clase` date NOT NULL,
  `hora_clase` time NOT NULL,
  `ID_Pista` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_particulares`
--

INSERT INTO `clases_particulares` (`ID_Clase`, `login_usuario`, `login_entrenador`, `fecha_clase`, `hora_clase`, `ID_Pista`) VALUES
(18, 'ypgarcia', 'mourinho', '2019-12-01', '21:30:00', 6),
(21, 'olista', 'guardiola', '2019-11-27', '17:00:00', 1),
(24, 'olista', 'sisu', '2019-11-29', '20:00:00', 7),
(25, 'ypgarcia', 'mourinho', '2019-11-26', '08:00:00', 5),
(26, 'ypgarcia', 'guardiola', '2019-11-29', '17:00:00', 8),
(27, 'ypgarcia', 'mourinho', '2019-11-29', '12:30:00', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--

CREATE TABLE `parejas` (
  `ID_Pareja` int(5) NOT NULL,
  `usuarios_login` varchar(45) NOT NULL,
  `usuarios_login1` varchar(45) NOT NULL
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
  `ID_Pareja` int(5) NOT NULL,
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
  `ID_ParejaLocal` int(5) NOT NULL,
  `ID_ParejaVisitante` int(5) NOT NULL
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
(72, 1, 125, 126),
(386, 1, 109, 116),
(387, 1, 117, 110),
(388, 1, 111, 113),
(389, 1, 112, 115),
(390, 1, 123, 120),
(391, 1, 119, 121),
(392, 1, 126, 125),
(393, 1, 122, 118);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_has_torneos`
--

CREATE TABLE `parejas_has_torneos` (
  `parejas_ID_Pareja` int(5) NOT NULL,
  `torneos_ID_Torneo` tinyint(5) NOT NULL,
  `PJ` int(5) NOT NULL,
  `PG` int(5) NOT NULL,
  `PP` int(5) NOT NULL,
  `Ptos` int(5) NOT NULL,
  `SF` int(5) NOT NULL,
  `SC` int(5) NOT NULL,
  `JF` int(5) NOT NULL,
  `JC` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_has_torneos`
--

INSERT INTO `parejas_has_torneos` (`parejas_ID_Pareja`, `torneos_ID_Torneo`, `PJ`, `PG`, `PP`, `Ptos`, `SF`, `SC`, `JF`, `JC`) VALUES
(109, 1, 8, 7, 1, 22, 14, 2, 97, 23),
(110, 1, 8, 3, 5, 14, 6, 11, 65, 82),
(111, 1, 8, 5, 3, 18, 12, 7, 93, 81),
(112, 1, 8, 5, 3, 18, 11, 7, 87, 73),
(113, 1, 8, 4, 4, 16, 11, 8, 93, 83),
(114, 1, 8, 0, 8, 8, 0, 16, 14, 96),
(115, 1, 8, 5, 3, 18, 10, 9, 96, 95),
(116, 1, 8, 1, 7, 10, 4, 14, 70, 93),
(117, 1, 8, 6, 2, 20, 12, 6, 86, 75),
(118, 1, 8, 5, 3, 18, 10, 7, 81, 66),
(119, 1, 8, 6, 2, 20, 14, 4, 98, 59),
(120, 1, 8, 1, 7, 10, 4, 14, 51, 90),
(121, 1, 8, 2, 6, 12, 4, 13, 52, 86),
(122, 1, 8, 6, 2, 20, 13, 7, 104, 76),
(123, 1, 8, 7, 1, 22, 14, 3, 99, 46),
(124, 1, 8, 0, 8, 8, 0, 16, 8, 96),
(125, 1, 8, 3, 5, 14, 7, 10, 69, 78),
(126, 1, 8, 6, 2, 20, 13, 5, 95, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `ID_Partido` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ronda` varchar(30) NOT NULL,
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

INSERT INTO `partidos` (`ID_Partido`, `fecha`, `hora`, `ronda`, `pista_ID_Pista`, `Sets_Local`, `Sets_Visitante`, `JuegosSet1_Local`, `JuegosSet1_Visitante`, `JuegosSet2_Local`, `JuegosSet2_Visitante`, `JuegosSet3_Local`, `JuegosSet3_Visitante`) VALUES
(1, '2019-10-28', '08:00:00', 'Grupos', 1, 2, 0, 6, 3, 7, 5, 0, 0),
(2, '2019-10-28', '09:30:00', 'Grupos', 2, 0, 2, 6, 1, 6, 3, 0, 0),
(3, '2019-10-29', '17:00:00', 'Grupos', 1, 2, 0, 6, 0, 6, 1, 0, 0),
(4, '2019-10-28', '21:30:00', 'Grupos', 1, 2, 0, 6, 1, 6, 4, 0, 0),
(5, '2019-10-30', '14:00:00', 'Grupos', 1, 2, 0, 6, 0, 6, 0, 0, 0),
(6, '2019-10-31', '17:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(7, '2019-11-01', '20:00:00', 'Grupos', 1, 2, 0, 6, 0, 6, 2, 0, 0),
(8, '2019-10-31', '21:30:00', 'Grupos', 1, 2, 0, 6, 0, 6, 1, 0, 0),
(9, '2019-10-31', '17:00:00', 'Grupos', 2, 0, 2, 3, 6, 3, 6, 0, 0),
(10, '2019-11-02', '11:00:00', 'Grupos', 1, 2, 0, 7, 5, 6, 3, 0, 0),
(11, '2019-10-30', '20:00:00', 'Grupos', 1, 0, 2, 3, 6, 2, 6, 0, 0),
(12, '2019-11-05', '17:00:00', 'Grupos', 1, 2, 0, 6, 0, 6, 0, 0, 0),
(13, '2019-10-28', '21:30:00', 'Grupos', 2, 0, 2, 2, 6, 0, 6, 0, 0),
(14, '2019-11-14', '21:30:00', 'Grupos', 1, 2, 1, 1, 6, 6, 4, 6, 3),
(15, '2019-10-31', '20:00:00', 'Grupos', 1, 0, 2, 3, 6, 3, 6, 0, 0),
(16, '2019-10-28', '21:30:00', 'Grupos', 5, 2, 1, 5, 7, 6, 4, 6, 3),
(17, '2019-10-29', '17:00:00', 'Grupos', 2, 0, 2, 4, 6, 1, 6, 0, 0),
(18, '2019-11-02', '11:00:00', 'Grupos', 2, 2, 0, 6, 0, 6, 0, 0, 0),
(19, '2019-10-31', '08:00:00', 'Grupos', 1, 1, 2, 6, 4, 5, 7, 6, 7),
(20, '2019-11-01', '15:30:00', 'Grupos', 1, 2, 0, 6, 3, 6, 2, 0, 0),
(21, '2019-11-07', '14:00:00', 'Grupos', 1, 1, 2, 6, 1, 6, 7, 2, 6),
(22, '2019-10-28', '21:30:00', 'Grupos', 6, 2, 1, 3, 6, 7, 5, 6, 3),
(23, '2019-10-30', '18:30:00', 'Grupos', 1, 2, 0, 6, 0, 6, 0, 0, 0),
(24, '2019-11-01', '21:30:00', 'Grupos', 1, 2, 0, 6, 4, 6, 4, 0, 0),
(25, '2019-11-02', '12:30:00', 'Grupos', 1, 2, 0, 6, 2, 6, 4, 0, 0),
(26, '2019-10-17', '14:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 2, 0, 0),
(27, '2019-10-28', '21:30:00', 'Grupos', 7, 2, 0, 6, 3, 6, 4, 0, 0),
(28, '2019-10-31', '15:30:00', 'Grupos', 1, 1, 2, 2, 6, 6, 3, 5, 7),
(29, '2019-11-04', '17:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 3, 0, 0),
(30, '2019-10-31', '20:00:00', 'Grupos', 2, 1, 2, 3, 6, 7, 6, 3, 6),
(31, '2019-10-28', '21:30:00', 'Grupos', 8, 0, 2, 4, 6, 3, 6, 0, 0),
(32, '2019-10-31', '15:30:00', 'Grupos', 2, 0, 2, 0, 6, 0, 6, 0, 0),
(33, '2019-11-01', '20:00:00', 'Grupos', 2, 0, 2, 0, 6, 0, 6, 0, 0),
(34, '2019-10-28', '20:00:00', 'Grupos', 1, 2, 1, 5, 7, 7, 6, 7, 6),
(35, '2019-11-12', '15:30:00', 'Grupos', 1, 0, 2, 4, 6, 5, 7, 0, 0),
(36, '2019-10-31', '17:00:00', 'Grupos', 5, 0, 2, 5, 7, 4, 6, 0, 0),
(37, '2019-10-29', '11:00:00', 'Grupos', 1, 2, 1, 4, 6, 6, 2, 6, 3),
(38, '2019-10-30', '14:00:00', 'Grupos', 2, 2, 0, 6, 3, 7, 5, 0, 0),
(39, '2019-10-31', '17:00:00', 'Grupos', 6, 2, 0, 6, 4, 6, 2, 0, 0),
(40, '2019-10-30', '08:00:00', 'Grupos', 1, 0, 2, 4, 6, 4, 6, 0, 0),
(41, '2019-10-28', '20:00:00', 'Grupos', 2, 0, 2, 3, 6, 2, 6, 0, 0),
(42, '2019-10-28', '20:00:00', 'Grupos', 5, 2, 0, 6, 0, 6, 0, 0, 0),
(43, '2019-11-01', '11:00:00', 'Grupos', 1, 2, 0, 6, 2, 6, 3, 0, 0),
(44, '2019-11-03', '14:00:00', 'Grupos', 1, 0, 2, 3, 6, 0, 6, 0, 0),
(45, '2019-10-29', '14:00:00', 'Grupos', 1, 2, 0, 6, 2, 6, 2, 0, 0),
(46, '2019-10-31', '20:00:00', 'Grupos', 5, 2, 0, 6, 0, 6, 0, 0, 0),
(47, '2019-10-29', '11:00:00', 'Grupos', 2, 1, 2, 4, 6, 6, 4, 3, 6),
(48, '2019-11-01', '12:30:00', 'Grupos', 1, 2, 0, 7, 6, 6, 4, 0, 0),
(49, '2019-10-31', '20:00:00', 'Grupos', 6, 2, 0, 6, 0, 6, 0, 0, 0),
(50, '2019-10-31', '17:00:00', 'Grupos', 7, 2, 0, 6, 1, 6, 3, 0, 0),
(51, '2019-11-05', '17:00:00', 'Grupos', 2, 2, 0, 7, 5, 6, 4, 0, 0),
(52, '2019-10-28', '20:00:00', 'Grupos', 6, 1, 2, 6, 4, 4, 6, 4, 6),
(53, '2019-10-30', '08:00:00', 'Grupos', 2, 1, 2, 6, 1, 2, 6, 2, 6),
(54, '2019-11-01', '12:30:00', 'Grupos', 2, 0, 2, 0, 6, 1, 6, 0, 0),
(55, '2019-11-04', '17:00:00', 'Grupos', 2, 2, 0, 6, 0, 6, 0, 0, 0),
(56, '2019-10-31', '17:00:00', 'Grupos', 8, 0, 2, 0, 6, 0, 6, 0, 0),
(57, '2019-10-30', '20:00:00', 'Grupos', 2, 0, 2, 1, 6, 1, 6, 0, 0),
(58, '2019-10-28', '20:00:00', 'Grupos', 7, 0, 2, 4, 6, 3, 6, 0, 0),
(59, '2019-11-02', '12:30:00', 'Grupos', 2, 0, 2, 0, 6, 1, 6, 0, 0),
(60, '2019-10-31', '20:00:00', 'Grupos', 7, 2, 0, 6, 0, 6, 0, 0, 0),
(61, '2019-11-07', '21:30:00', 'Grupos', 1, 0, 2, 1, 6, 3, 6, 0, 0),
(62, '2019-11-02', '20:00:00', 'Grupos', 1, 0, 2, 4, 6, 2, 6, 0, 0),
(63, '2019-10-28', '20:00:00', 'Grupos', 8, 0, 2, 3, 6, 5, 7, 0, 0),
(64, '2019-11-01', '15:30:00', 'Grupos', 2, 2, 0, 6, 0, 6, 0, 0, 0),
(65, '2019-11-02', '18:30:00', 'Grupos', 1, 2, 1, 6, 7, 6, 2, 6, 1),
(66, '2019-10-31', '08:00:00', 'Grupos', 2, 1, 2, 6, 3, 4, 6, 3, 6),
(67, '2019-10-28', '18:30:00', 'Grupos', 1, 2, 0, 6, 0, 6, 0, 0, 0),
(68, '2019-11-02', '12:30:00', 'Grupos', 5, 2, 0, 6, 4, 6, 3, 0, 0),
(69, '2019-11-06', '08:00:00', 'Grupos', 1, 2, 1, 6, 4, 4, 6, 6, 1),
(70, '2019-10-30', '11:00:00', 'Grupos', 1, 0, 2, 4, 6, 4, 6, 0, 0),
(71, '2019-11-01', '09:30:00', 'Grupos', 1, 0, 2, 0, 6, 0, 6, 0, 0),
(72, '2019-11-02', '08:00:00', 'Grupos', 1, 0, 2, 4, 6, 3, 6, 0, 0),
(386, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(387, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(388, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(389, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(390, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(391, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(392, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(393, '0000-00-00', '00:00:00', 'Cuartos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(78, '2019-12-04', '12:30:00', 'dianacasanova', NULL, 'NO'),
(87, '2019-12-20', '18:30:00', 'hugo_mejide', NULL, 'NO'),
(90, '2019-12-21', '12:30:00', 'admin', NULL, 'NO'),
(98, '2019-12-04', '09:30:00', 'adrianantolinez', NULL, 'NO');

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
(78, 'admin'),
(78, 'adrianblanco'),
(78, 'dianacasanova'),
(87, 'hugo_mejide'),
(87, 'jfperez'),
(98, 'adrianantolinez');

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
('alfredocasas', 8, '2019-12-27', '08:00:00'),
('carmenformoso', 2, '2019-12-06', '15:30:00'),
('celiarodriguez', 1, '2019-12-11', '12:30:00'),
('celiarodriguez', 1, '2019-12-04', '21:30:00'),
('jaimesalgado', 1, '2019-12-12', '14:00:00'),
('jaimesalgado', 1, '2019-12-20', '15:30:00'),
('jorgepuertas', 1, '2019-12-05', '17:00:00'),
('jorgepuertas', 7, '2019-12-27', '08:00:00'),
('jorgesabucedo', 1, '2019-12-10', '11:00:00'),
('josedacal', 1, '2019-12-17', '09:30:00'),
('josedacal', 1, '2019-12-16', '18:30:00'),
('linogonzalez', 1, '2019-12-27', '17:00:00'),
('linogonzalez', 1, '2019-12-10', '18:30:00'),
('linogonzalez', 5, '2019-12-27', '08:00:00'),
('lucianespereira', 1, '2019-12-19', '20:00:00'),
('lucianespereira', 6, '2019-12-27', '08:00:00'),
('luisa_sevilla', 1, '2019-12-27', '09:30:00'),
('mariaboveda', 1, '2019-12-27', '08:00:00'),
('mariaboveda', 1, '2019-12-10', '12:30:00'),
('mariaboveda', 1, '2019-12-02', '15:30:00'),
('mariaboveda', 1, '2019-12-06', '15:30:00'),
('mariaboveda', 1, '2019-12-11', '20:00:00'),
('ritaconde', 1, '2019-12-12', '12:30:00'),
('rosinafdez', 1, '2019-12-18', '08:00:00'),
('rosinafdez', 1, '2019-12-23', '11:00:00'),
('rosinafdez', 1, '2019-12-06', '14:00:00'),
('rosinafdez', 1, '2019-12-04', '18:30:00'),
('rosinafdez', 2, '2019-12-27', '08:00:00');

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
(1, 'Ourense Open M2', 'Masculina', '2019-10-01', 2019, 2);

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
  `cuenta` varchar(30) DEFAULT NULL,
  `ranking` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `dni`, `nombre`, `apellidos`, `telefono`, `email`, `fecha`, `sexo`, `tipo`, `socio`, `IBAN`, `cuenta`, `ranking`) VALUES
('abelardoglez', 'abelardoglez', '41717337Y', 'Abelardo', 'Gonzalez Villamil', '695435343', 'villamilaberlard@gmail.com', '1969-03-23', 'Masculina', 'NORMAL', 'SI', 'ES66', '21000418401234567891', 16),
('admin', 'admin', '11111111H', 'Admin', 'Adminez Adminez', '676532185', 'admin@admin.es', '1991-05-14', 'Masculina', 'ADMIN', 'NO', '', '', 0),
('adrianantolinez', 'adrianantolinez', '51575699Q', 'Adrian', 'Antolinez Riestra', '647554523', 'mrfarenheit143@yahoo.com', '1980-02-21', 'Masculina', 'NORMAL', 'NO', '', '', 10),
('adrianblanco', 'adrianblanco', '91259143L', 'Adrian', 'Blanco Calvo', '673434324', 'blanquitocalvo@aol.es', '1972-08-22', 'Masculina', 'NORMAL', 'SI', 'DK18', '32005847916555800078', 30),
('albertordgz', 'albertordgz', '16084051J', 'Alberto', 'Rodriguez EspaÃ±a', '983473423', 'arespaÃ±a@esei.uvigo.es', '1998-03-08', 'Masculina', 'NORMAL', 'NO', '', '', -4),
('alejandrocastro', 'alejandrocastro', '44189814Y', 'Alejandro', 'Castro Montero', '673847234', 'acmontero@esei.uvigo.es', '1979-01-04', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('alexandrefdez', 'alexandrefdez', '98790014T', 'Alexandre', 'Fernandez Gallego', '635426347', 'alexitomolon@yahoo.com', '1988-04-20', 'Masculina', 'NORMAL', 'NO', '', '', 18),
('alfonsoroman', 'alfonsoroman', '23882364S', 'Alfonso', 'Roman Romasanta', '674573432', 'romasantaroman@gmail.com', '1965-11-22', 'Masculina', 'NORMAL', 'SI', 'ES82', '50039592929781916551', 6),
('alfredocasas', 'alfredocasas', '99025185L', 'Alfredo', 'Casas Rojas', '988734623', 'alfredhard_occ@aol.es', '2001-01-01', 'Masculina', 'NORMAL', 'NO', '', '', 1),
('alvarocardero', 'alvarocardero', '14408363J', 'Alvaro', 'Cardero Hernandez', '678493213', 'alvaritorito@gmail.com', '1997-11-20', 'Masculina', 'NORMAL', 'NO', '', '', 20),
('anabarreiro', 'anabarreiro', '30104099C', 'Ana', 'Barreiro Sequeiros', '983472822', 'anabarqueiros@hotmail.com', '2000-10-27', 'Femenina', 'NORMAL', 'SI', 'ES60', '78945551900533010001', 12),
('angelmonteagudo', 'angelmonteagudo', '42629771F', 'Angel', 'Monteagudo Leal', '666234237', 'angelmonteleal92@gmail.com', '1992-02-22', 'Masculina', 'NORMAL', 'NO', '', '', 18),
('arturolopez', 'arturolopez', '76578256D', 'Arturo', 'Lopez Rivera', '988374342', 'arturo_arturito@gmail.com', '1978-11-01', 'Masculina', 'NORMAL', 'NO', '', '', 12),
('carlosconde', 'carlosconde', '66882682Q', 'Carlos', 'Conde Trueba', '674835332', 'condetrueba1@uvigo.es', '1974-04-04', 'Masculina', 'NORMAL', 'NO', '', '', 4),
('carlosguede', 'carlosguede', '00849468D', 'Carlos', 'Guede Brown', '983423432', 'carlinhosbrown@yahoo.com', '1996-04-17', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('carlosperez', 'carlosperez', '12383305J', 'Carlos', 'Perez Matias', '666234236', 'carlitosperez@gmail.com', '1987-04-16', 'Masculina', 'NORMAL', 'NO', '', '', 12),
('carlossiota', 'carlossiota', '63892881P', 'Carlos', 'Siota Albino', '674324234', 'alpanpanyalbinvino@gmail.com', '2002-12-31', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('carmenformoso', 'carmenformoso', '48224992H', 'Carmen', 'Formoso Benito', '654636237', 'carmencita_1@yahoo.com', '1996-07-24', 'Femenina', 'NORMAL', 'NO', '', '', 25),
('celiarodriguez', 'celiarodriguez', '12564638Z', 'Celia', 'Rodriguez Recio', '754736232', 'celiarecio@gmail.com', '1997-08-24', 'Femenina', 'NORMAL', 'NO', '', '', 17),
('cristoffpereira', 'cristoffpereira', '10412725G', 'Cristoff', 'Pereira Tellez', '683743212', 'cristoffpertell@outlook.com', '1986-04-12', 'Masculina', 'NORMAL', 'NO', '', '', 12),
('danielceballos', 'danielceballos', '09224837C', 'Daniel', 'Ceballos Cebollas', '734724323', 'callmeElCebolo@gmail.com', '1998-09-12', 'Masculina', 'NORMAL', 'NO', '', '', 6),
('davidmanuel', 'davidmanuel', '49443998R', 'David Manuel', 'Gimenez Montoya', '675847289', 'gmontaya_eldavis@gmail.com', '1983-08-09', 'Masculina', 'NORMAL', 'NO', '', '', 10),
('davidmiguez', 'davidmiguez', '27980947K', 'David', 'Miguez Lopez', '984583243', 'miguezdavidlopez@esei.uvigo.es', '1990-10-28', 'Masculina', 'NORMAL', 'NO', '', '', 30),
('dianacasanova', 'dianacasanova', '46527792B', 'Diana', 'Casanova Hernandez', '643734284', 'dianadinamita@hotmail.com', '1990-06-23', 'Femenina', 'NORMAL', 'SI', 'ES60', '00491500051234567892', -4),
('diegocurras', 'diegocurras', '13904461H', 'Diego', 'Curras Blas', '683423423', 'currasblasmas@gmail.com', '1965-05-13', 'Masculina', 'NORMAL', 'NO', '', '', -4),
('diegojorreto', 'diegojorreto', '74838615L', 'Diego', 'Jorreto Dominguez', '684538434', 'diegooooljorreto@yahoo.com', '1997-10-12', 'Masculina', 'NORMAL', 'NO', '', '', 16),
('diegoportela', 'diegoportela', '66245444Q', 'Diego', 'Portela Lopez', '674382421', 'diegol@outlook.com', '1985-06-20', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('enrique_lopez', 'enrique_lopez', '15321397Q', 'Enrique', 'Lopez Llano', '985647434', 'quiquelopezllan@gmail.com', '1978-06-27', 'Masculina', 'NORMAL', 'NO', '', '', 13),
('esthermontecelo', 'esthermontecelo', '12441494N', 'Esther', 'Montecelo Ledo', '984374233', 'esthercitamonteledo@yahoo.com', '1985-01-22', 'Femenina', 'NORMAL', 'NO', '', '', 24),
('fabioroson', 'fabioroson', '35924493B', 'Fabio', 'Roson Rosales', '674853223', 'rosonrosales@hotmail.com', '1985-04-15', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('felixperez', 'felixperez', '70053511L', 'Felix', 'Perez Feliz', '984834272', 'felixfeliz@hotmail.com', '1972-01-26', 'Masculina', 'NORMAL', 'NO', '', '', 2),
('franciscobretal', 'franciscobretal', '13359330X', 'Francisco', 'Bretal Franco', '674582374', 'francobretal90@gmail.com', '1990-09-27', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('guardiola', 'guardiola', '31897064C', 'Josep', 'Guardiola i Sala', '669384473', 'josepguardiol@hotmail.com', '1971-01-18', 'Masculina', 'ENTRENADOR', 'NO', '', '', 0),
('guillermomtnez', 'guillermomtnez', '28875991C', 'Guillermo', 'Martinez Soria', '683742432', 'guille_1989@gmail.com', '1989-11-25', 'Masculina', 'NORMAL', 'NO', '', '', 12),
('hugo_mejide', 'hugo_mejide', '07814102J', 'Hugo', 'Mejide Perez', '657367423', 'mejidehugo1990_43@yahoo.com', '1990-02-04', 'Masculina', 'NORMAL', 'SI', 'ES94', '20805801101234567891', 1),
('isabelmata', 'isabelmata', '85038738X', 'Isabel', 'Mata Trillo', '694845332', 'isabelitaii@gmail.com', '1988-03-25', 'Femenina', 'NORMAL', 'NO', '', '', -4),
('ivanvalcarcel', 'ivanvalcarcel', '02608914R', 'Ivan', 'Valcarcel Gil', '678234733', 'valcarcelinho@yahoo.es', '1981-07-13', 'Masculina', 'NORMAL', 'NO', '', '', 2),
('jacobohermida', 'jacobohermida', '57300386A', 'Jacobo', 'Hermida Lista', '674854323', 'elprimojacob@hotmail.com', '1993-03-16', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('jaimesalgado', 'jaimesalgado', '04152746G', 'Jaime', 'Salgado Gutierrez', '666437322', 'jaimito456_salga@gmail.com', '1995-12-04', 'Masculina', 'NORMAL', 'NO', '', '', 9),
('jantoniooute', 'jantoniooute', '78207899X', 'Jose Antonio', 'OuteiriÃ±o Baltar', '673857231', 'antoniÃ±obaltarin@eduxunta.gal', '1994-05-15', 'Masculina', 'NORMAL', 'SI', 'ES90', '00246912501234567891', 14),
('javierlorenzo', 'javierlorenzo', '15396085T', 'Javier', 'Lorenzo Gil', '678321241', 'superjavi@yahoo.com', '1987-06-17', 'Masculina', 'NORMAL', 'NO', '', '', 4),
('jesusiglesias', 'jesusiglesias', '77523701Q', 'Jesus', 'Iglesias de la Torre', '987534234', 'jesusinho_towers@yahoo.es', '2001-07-04', 'Masculina', 'NORMAL', 'NO', '', '', 0),
('jfperez', 'joni', '44493919M', 'Jonathan', 'Fernandez Perez', '696627322', 'jfperez3@esei.uvigo.es', '1995-10-25', 'Masculina', 'NORMAL', 'NO', '', '', 0),
('jordigonzalez', 'jordigonzalez', '35474611D', 'Jordi', 'Gonzalez Puig', '653472342', 'puigpuig3@hotmail.com', '1963-12-15', 'Masculina', 'NORMAL', 'NO', '', '', 26),
('jorgepuertas', 'jorgepuertas', '90471642S', 'Jorge', 'Puertas Ugarte', '987563421', 'jorginho_69@yahoo.com', '2002-07-30', 'Masculina', 'NORMAL', 'NO', '', '', 25),
('jorgesabucedo', 'jorgesabucedo', '51907965R', 'Jorge', 'Sabucedo Montes', '985847543', 'jorge4ever@gmail.com', '1994-07-26', 'Masculina', 'NORMAL', 'NO', '', '', 21),
('joseantonio', 'joseantonio', '06956257E', 'Jose Antonio', 'Moyano Brey', '683473292', 'breysuperstar@gmail.com', '2000-11-08', 'Masculina', 'NORMAL', 'NO', '', '', 12),
('josedacal', 'josedacal', '84792302L', 'Jose', 'Dacal Fernandez', '948348353', 'josiÃ±opower@hotmail.com', '1995-03-20', 'Masculina', 'NORMAL', 'NO', '', '', 5),
('joseluis', 'joseluis', '23227175G', 'Jose Luis', 'Rodriguez Espinosa', '673482344', 'jlrodrinosa@hotmail.com', '1990-09-13', 'Masculina', 'NORMAL', 'NO', '', '', 16),
('josemaria', 'josemaria', '06361196V', 'Jose Maria', 'Gonzalez Gonzalez', '667432434', 'chemaglezglez@hotmail.com', '1993-10-06', 'Masculina', 'NORMAL', 'NO', '', '', 0),
('juancarlos', 'juancarlos', '01538777P', 'Juan Carlos', 'Perez Perez', '988462342', 'juankar_bombom96@gmail.com', '1996-12-21', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('juancorral', 'juancorral', '73539077G', 'Juan', 'Corral Perez', '699384234', 'juanitocorral@hotmail.com', '1991-02-26', 'Masculina', 'NORMAL', 'NO', '', '', 12),
('juanllano', 'juanllano', '97401039H', 'Juan', 'Llano Fernandez', '678432342', 'juanllanollano@yahoo.com', '1994-09-11', 'Masculina', 'NORMAL', 'NO', '', '', 8),
('juansoler', 'juansoler', '12705621F', 'Juan', 'Soler Jimenez', '674832231', 'solerjimjuan@uvigo.es', '1973-05-24', 'Masculina', 'NORMAL', 'NO', '', '', 12),
('linogonzalez', 'linogonzalez', '09915233W', 'Lino', 'Gonzalez Fuster', '674534233', 'linoavelino@yahoo.com', '1982-05-31', 'Masculina', 'NORMAL', 'NO', '', '', 29),
('lucianespereira', 'lucianespereira', '05932693G', 'Lucia', 'Nespereira Cuesta', '678432423', 'sorayanespe1995@hotmail.com', '1995-11-20', 'Femenina', 'NORMAL', 'NO', '', '', 29),
('luisa_sevilla', 'luisa_sevilla', '96676329S', 'Luisa', 'Sevilla Dominguez', '674834579', 'luisa_sevilla87@gmail.com', '1987-12-20', 'Femenina', 'NORMAL', 'SI', 'ES71', '00302053091234567895', 13),
('luiscaride', 'luiscaride', '60545480G', 'Luis', 'Caride Abril', '678345352', 'luiscarabril@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', '', 20),
('luiscarmona', 'luiscarmona', '61033162V', 'Luis', 'Carmona Goya', '653243243', 'luisinhocarmona@yahoo.com', '1980-08-24', 'Masculina', 'NORMAL', 'NO', '', '', -4),
('luisviejo', 'luisviejo', '25474614K', 'Luis', 'Viejo Gil', '683843422', 'luisviejo_09876@gmail.com', '1976-02-15', 'Masculina', 'NORMAL', 'NO', '', '', 16),
('manuelangel', 'manuelangel', '03960290N', 'Manuel Angel', 'Perez Jimenez', '666234234', 'manuangel@hotmail.com', '1973-01-14', 'Masculina', 'NORMAL', 'NO', '', '', 20),
('marcoscudeiro', 'marcoscudeiro', '17517361D', 'Marcos', 'Cudeiro Viso', '674853453', 'chinocudeiro@gmail.cn', '2000-02-29', 'Masculina', 'NORMAL', 'NO', '', '', 26),
('mariaboveda', 'mariaboveda', '66818651V', 'Maria', 'Boveda Ruiz', '984734823', 'mbruiz@uvigo.es', '1993-05-23', 'Femenina', 'NORMAL', 'NO', '', '', 29),
('mariapumar', 'mariapumar', '78078690S', 'Maria', 'Pumar Vazquez', '683472331', 'pumarvazquezmar1234@gmail.com', '1997-03-18', 'Femenina', 'NORMAL', 'SI', 'AD66', '19518195619519819619', -8),
('mariohernandez', 'mariohernandez', '22474502Y', 'Mario', 'Hernandez Hermoso', '689242312', 'supermario64@gmail.com', '1964-04-03', 'Masculina', 'NORMAL', 'NO', '', '', 4),
('marta_castro', 'marta_castro', '28072495Y', 'Marta', 'Castro Xil', '678457393', 'martitaxil1@hotmail.com', '2000-11-19', 'Femenina', 'NORMAL', 'SI', 'ES10', '00492352082414205416', 1),
('mourinho', 'mourinho', '49565820S', 'Jose Mario', 'dos Santos Mourinho Felix', '753274223', 'xoxemourinho@gmail.com', '1963-01-26', 'Masculina', 'ENTRENADOR', 'NO', '', '', 0),
('noemiquesada', 'noemiquesada', '82023628Q', 'Noemi', 'Quesada Lopez', '643237323', 'nquelopez@esei.uvigo.es', '2003-03-31', 'Femenina', 'NORMAL', 'NO', '', '', 12),
('olallardgez', 'olallardgez', '50566997W', 'Olalla', 'Rodriguez Perez', '678433189', 'superolalla@yahoo.com', '1997-12-21', 'Femenina', 'NORMAL', 'NO', '', '', 16),
('olista', '1234', '24252751X', 'Oscar', 'Lista Rivera', '643956059', 'olista@gmail.com', '1994-05-22', 'Masculina', 'NORMAL', 'SI', 'ES00', '1234567890123456', 0),
('oscardominguez', 'oscardominguez', '40315187M', 'Oscar', 'Dominguez Sanz', '674324233', 'oscardomsanz456@hotmail.com', '1991-11-18', 'Masculina', 'NORMAL', 'NO', '', '', 4),
('oscarfernadez', 'oscarfernadez', '36416302B', 'Oscar', 'Fernandez Dorado', '746345332', 'oscardorado98@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', '', 20),
('pacobarrio', 'pacobarrio', '52957832X', 'Paco', 'Barrio Leon', '647583423', 'pacoleon@yahoo.com', '1977-03-28', 'Masculina', 'NORMAL', 'SI', 'ES82', '78945102345873061212', 16),
('pazbalboa', 'pazbalboa', '76101387E', 'Paz', 'Balboa Leon', '984375437', 'pacitabalboa94@gmail.com', '1994-01-05', 'Femenina', 'NORMAL', 'NO', '', '', -8),
('pedrocuesta', 'pedrocuesta', '72983428N', 'Pedro', 'Cuesta Morales', '669454344', 'pcmorales@uvigo.es', '1977-01-20', 'Masculina', 'NORMAL', 'SI', 'ES42', '11848468464655222222', 2),
('pilarlado', 'pilarlado', '89199880S', 'Pilar', 'Lado Izquierdo', '735637432', 'plizquierdo@esei.uvigo.es', '1999-07-17', 'Femenina', 'NORMAL', 'NO', '', '', 0),
('ritaconde', 'ritaconde', '24176992J', 'Rita', 'Conde Sanchez', '848543322', 'ritaorita@gmail.com', '1981-11-22', 'Femenina', 'NORMAL', 'NO', '', '', 5),
('robertotato', 'robertotato', '37336487N', 'Roberto', 'Tato Panadero', '637482344', 'jugamosaltato@hotmail.com', '2000-11-06', 'Masculina', 'NORMAL', 'SI', 'AL42', '78945687431597125824', 2),
('rociofernandez', 'rociofernandez', '74484850V', 'Rocio', 'Fernandez Blanco', '987635467', 'rociofer_blan_88@gmail.com', '1988-08-21', 'Femenina', 'NORMAL', 'NO', '', '', 16),
('rosinafdez', 'rosinafdez', '28491046A', 'Rosina', 'Fernandez Rojas', '976543345', 'rfrojas@gmail.com', '1983-06-24', 'Femenina', 'NORMAL', 'NO', '', '', 9),
('rubencorral', 'rubencorral', '69287892R', 'Ruben', 'Corral Cabreiroa', '768453443', 'cabreiroawaters@yahoo.com', '1992-11-11', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('rubengonzalez', 'rubengonzalez', '43257679S', 'Ruben', 'Gonzalez Hurtado', '674357232', 'ruben7star@gmail.com', '1999-07-25', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('sisu', 'sisu', '11111111h', 'ssssd', 'ssss', '666234234', 'ypgarcissssssssssssa@esei.uvigo.es', '2019-11-14', 'Masculina', 'ENTRENADOR', 'NO', '', '', 0),
('taniafernandez', 'taniafernandez', '36772892D', 'Tania', 'Fernandez Domingo', '687343884', 'domingotaniafernan@gmail.com', '1992-06-23', 'Femenina', 'NORMAL', 'NO', '', '', 0),
('teofilomartin', 'teofilomartin', '25557539P', 'Teofilo', 'Martin Vidal', '987543532', 'teofilo_87832@gmail.com', '1983-07-13', 'Masculina', 'NORMAL', 'SI', 'ES17', '20852066623456789011', 16),
('xacoboiglesias', 'xacoboiglesias', '28569206D', 'Xacobo', 'Iglesias Altomano', '983423242', 'xacoaltomano@hotmail.com', '1982-03-16', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('xianagolpe', 'xianagolpe', '95350359H', 'Xiana', 'Golpe Fuertes', '673264373', 'golpefuertesxi@aol.com', '1999-02-15', 'Femenina', 'NORMAL', 'NO', '', '', 16),
('ypgarcia', 'asdf', '44657078W', 'Iago', 'Perez Garcia', '669517850', 'ypgarcia@esei.uvigo.es', '1996-04-21', 'Masculina', 'NORMAL', 'SI', 'ES40', '12345678912345678912', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases_grupales`
--
ALTER TABLE `clases_grupales`
  ADD PRIMARY KEY (`ID_Clase`);

--
-- Indices de la tabla `clases_grupales_has_usuarios`
--
ALTER TABLE `clases_grupales_has_usuarios`
  ADD PRIMARY KEY (`ID_Clase`,`login_usuario`);

--
-- Indices de la tabla `clases_particulares`
--
ALTER TABLE `clases_particulares`
  ADD PRIMARY KEY (`ID_Clase`),
  ADD KEY `ID_Pista` (`ID_Pista`) USING BTREE;

--
-- Indices de la tabla `parejas`
--
ALTER TABLE `parejas`
  ADD PRIMARY KEY (`ID_Pareja`,`usuarios_login`,`usuarios_login1`);

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
-- AUTO_INCREMENT de la tabla `clases_grupales`
--
ALTER TABLE `clases_grupales`
  MODIFY `ID_Clase` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `clases_particulares`
--
ALTER TABLE `clases_particulares`
  MODIFY `ID_Clase` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `parejas`
--
ALTER TABLE `parejas`
  MODIFY `ID_Pareja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_Partido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `ID_Torneo` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

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
