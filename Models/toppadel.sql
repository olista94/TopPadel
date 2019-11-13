-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 09:56:47
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
(126, 'jorgesabucedo', 'pacobarrio'),
(130, 'adrianblanco', 'davidmiguez'),
(131, 'marcoscudeiro', 'jordigonzalez'),
(132, 'alexandrefdez', 'angelmonteagudo'),
(133, 'xacoboiglesias', 'carlosguede'),
(134, 'carlossiota', 'jantoniooute'),
(135, 'adrianantolinez', 'davidmanuel'),
(136, 'danielceballos', 'alfonsoroman'),
(137, 'robertotato', 'felixperez'),
(138, 'pedrocuesta', 'ivanvalcarcel'),
(139, 'jacobohermida', 'alejandrocastro'),
(140, 'franciscobretal', 'rubencorral'),
(141, 'ritaconde', 'noemiquesada'),
(142, 'dianacasanova', 'isabelmata'),
(143, 'mariapumar', 'pazbalboa'),
(144, 'pilarlado', 'taniafernandez'),
(145, 'esthermontecelo', 'lucianespereira'),
(146, 'olallardgez', 'mariaboveda'),
(147, 'xianagolpe', 'rociofernandez'),
(148, 'anabarreiro', 'carmenformoso'),
(149, 'rosinafdez', 'celiarodriguez'),
(152, 'lucianespereira', 'josedacal'),
(153, 'linogonzalez', 'celiarodriguez'),
(154, 'jorgepuertas', 'carmenformoso'),
(155, 'rosinafdez', 'jorgesabucedo'),
(156, 'alfredocasas', 'ritaconde'),
(157, 'mariaboveda', 'jaimesalgado'),
(158, 'luisa_sevilla', 'hugo_mejide'),
(159, 'marta_castro', 'enrique_lopez'),
(160, 'mariaboveda', 'jaimesalgado'),
(161, 'rosinafdez', 'jorgesabucedo'),
(162, 'linogonzalez', 'celiarodriguez'),
(163, 'lucianespereira', 'josedacal'),
(164, 'jorgepuertas', 'carmenformoso'),
(165, 'alfredocasas', 'ritaconde'),
(166, 'marta_castro', 'hugo_mejide'),
(167, 'enrique_lopez', 'luisa_sevilla'),
(168, 'adrianblanco', 'abelardoglez'),
(169, 'fabioroson', 'adrianantolinez'),
(170, 'alejandrocastro', 'albertordgz'),
(171, 'carlosconde', 'felixperez'),
(172, 'ypgarcia', 'carlosguede'),
(173, 'olista', 'enrique_lopez'),
(174, 'pedrocuesta', 'alfredocasas'),
(175, 'josedacal', 'alexandrefdez'),
(176, 'alfonsoroman', 'alvarocardero'),
(177, 'arturolopez', 'angelmonteagudo'),
(178, 'carlosperez', 'carlossiota'),
(179, 'diegocurras', 'cristoffpereira'),
(180, 'danielceballos', 'davidmiguez'),
(181, 'davidmanuel', 'diegojorreto'),
(182, 'diegoportela', 'hugo_mejide'),
(183, 'franciscobretal', 'guillermomtnez');

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
(126, 1, 1),
(130, 0, 2),
(131, 0, 2),
(132, 0, 2),
(133, 0, 2),
(134, 0, 2),
(135, 0, 2),
(136, 0, 2),
(137, 0, 2),
(138, 0, 2),
(139, 0, 2),
(140, 0, 2),
(141, 0, 8),
(142, 0, 8),
(143, 0, 8),
(144, 0, 8),
(145, 0, 8),
(146, 0, 8),
(147, 0, 8),
(148, 0, 8),
(149, 0, 8),
(160, 0, 16),
(161, 0, 16),
(162, 0, 16),
(163, 0, 16),
(164, 0, 16),
(165, 0, 16),
(166, 0, 16),
(167, 0, 16);

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
(128, 2, 130, 131),
(129, 2, 130, 132),
(130, 2, 130, 133),
(131, 2, 130, 134),
(132, 2, 130, 135),
(133, 2, 130, 136),
(134, 2, 130, 137),
(135, 2, 130, 138),
(136, 2, 130, 139),
(137, 2, 130, 140),
(138, 2, 131, 132),
(139, 2, 131, 133),
(140, 2, 131, 134),
(141, 2, 131, 135),
(142, 2, 131, 136),
(143, 2, 131, 137),
(144, 2, 131, 138),
(145, 2, 131, 139),
(146, 2, 131, 140),
(147, 2, 132, 133),
(148, 2, 132, 134),
(149, 2, 132, 135),
(150, 2, 132, 136),
(151, 2, 132, 137),
(152, 2, 132, 138),
(153, 2, 132, 139),
(154, 2, 132, 140),
(155, 2, 133, 134),
(156, 2, 133, 135),
(157, 2, 133, 136),
(158, 2, 133, 137),
(159, 2, 133, 138),
(160, 2, 133, 139),
(161, 2, 133, 140),
(162, 2, 134, 135),
(163, 2, 134, 136),
(164, 2, 134, 137),
(165, 2, 134, 138),
(166, 2, 134, 139),
(167, 2, 134, 140),
(168, 2, 135, 136),
(169, 2, 135, 137),
(170, 2, 135, 138),
(171, 2, 135, 139),
(172, 2, 135, 140),
(173, 2, 136, 137),
(174, 2, 136, 138),
(175, 2, 136, 139),
(176, 2, 136, 140),
(177, 2, 137, 138),
(178, 2, 137, 139),
(179, 2, 137, 140),
(180, 2, 138, 139),
(181, 2, 138, 140),
(182, 2, 139, 140),
(183, 8, 141, 142),
(184, 8, 141, 143),
(185, 8, 141, 144),
(186, 8, 141, 145),
(187, 8, 141, 146),
(188, 8, 141, 147),
(189, 8, 141, 148),
(190, 8, 141, 149),
(191, 8, 142, 143),
(192, 8, 142, 144),
(193, 8, 142, 145),
(194, 8, 142, 146),
(195, 8, 142, 147),
(196, 8, 142, 148),
(197, 8, 142, 149),
(198, 8, 143, 144),
(199, 8, 143, 145),
(200, 8, 143, 146),
(201, 8, 143, 147),
(202, 8, 143, 148),
(203, 8, 143, 149),
(204, 8, 144, 145),
(205, 8, 144, 146),
(206, 8, 144, 147),
(207, 8, 144, 148),
(208, 8, 144, 149),
(209, 8, 145, 146),
(210, 8, 145, 147),
(211, 8, 145, 148),
(212, 8, 145, 149),
(213, 8, 146, 147),
(214, 8, 146, 148),
(215, 8, 146, 149),
(216, 8, 147, 148),
(217, 8, 147, 149),
(218, 8, 148, 149),
(247, 16, 160, 161),
(248, 16, 160, 162),
(249, 16, 160, 163),
(250, 16, 160, 164),
(251, 16, 160, 165),
(252, 16, 160, 166),
(253, 16, 160, 167),
(254, 16, 161, 162),
(255, 16, 161, 163),
(256, 16, 161, 164),
(257, 16, 161, 165),
(258, 16, 161, 166),
(259, 16, 161, 167),
(260, 16, 162, 163),
(261, 16, 162, 164),
(262, 16, 162, 165),
(263, 16, 162, 166),
(264, 16, 162, 167),
(265, 16, 163, 164),
(266, 16, 163, 165),
(267, 16, 163, 166),
(268, 16, 163, 167),
(269, 16, 164, 165),
(270, 16, 164, 166),
(271, 16, 164, 167),
(272, 16, 165, 166),
(273, 16, 165, 167),
(274, 16, 166, 167);

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
(109, 1, 8, 7, 1, 22, 14, 2, 96, 18),
(110, 1, 7, 2, 5, 11, 4, 10, 47, 68),
(111, 1, 8, 5, 3, 18, 12, 7, 88, 69),
(112, 1, 8, 5, 3, 18, 11, 7, 87, 72),
(113, 1, 8, 4, 4, 16, 11, 8, 93, 76),
(114, 1, 8, 0, 8, 8, 0, 16, 0, 96),
(115, 1, 8, 5, 3, 18, 10, 9, 95, 80),
(116, 1, 7, 1, 6, 9, 3, 12, 43, 78),
(117, 1, 8, 6, 2, 20, 12, 6, 85, 69),
(118, 1, 8, 4, 4, 16, 9, 8, 77, 71),
(119, 1, 8, 7, 1, 22, 15, 3, 103, 55),
(120, 1, 8, 1, 7, 10, 4, 14, 50, 91),
(121, 1, 8, 2, 6, 12, 4, 13, 53, 85),
(122, 1, 8, 6, 2, 20, 13, 7, 100, 75),
(123, 1, 8, 7, 1, 22, 14, 3, 98, 42),
(124, 1, 8, 0, 8, 8, 0, 16, 0, 96),
(125, 1, 8, 3, 5, 14, 7, 10, 69, 70),
(126, 1, 8, 6, 2, 20, 13, 5, 95, 60),
(130, 2, 10, 10, 0, 30, 20, 4, 142, 81),
(131, 2, 10, 9, 1, 28, 18, 3, 119, 65),
(132, 2, 10, 7, 3, 24, 17, 9, 132, 109),
(133, 2, 10, 6, 4, 22, 14, 8, 105, 86),
(134, 2, 10, 6, 4, 22, 13, 9, 104, 87),
(135, 2, 10, 5, 5, 20, 11, 11, 97, 108),
(136, 2, 10, 4, 6, 18, 11, 14, 110, 117),
(137, 2, 10, 3, 7, 16, 7, 14, 78, 109),
(138, 2, 10, 3, 7, 16, 6, 15, 82, 114),
(139, 2, 10, 1, 9, 12, 3, 18, 72, 114),
(140, 2, 10, 1, 9, 12, 3, 18, 61, 112),
(141, 8, 8, 5, 3, 18, 12, 6, 91, 74),
(142, 8, 8, 1, 7, 10, 2, 15, 49, 99),
(143, 8, 8, 0, 8, 8, 2, 16, 47, 103),
(144, 8, 8, 2, 6, 12, 4, 13, 56, 91),
(145, 8, 8, 8, 0, 24, 16, 1, 103, 50),
(146, 8, 8, 6, 2, 20, 12, 5, 88, 53),
(147, 8, 8, 6, 2, 20, 12, 4, 86, 57),
(148, 8, 8, 5, 3, 18, 10, 7, 85, 70),
(149, 8, 8, 3, 5, 14, 7, 10, 68, 76),
(152, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(153, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(154, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(155, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(156, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(157, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(158, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(159, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(160, 16, 7, 5, 2, 17, 11, 8, 98, 84),
(161, 16, 7, 3, 4, 13, 8, 9, 72, 81),
(162, 16, 7, 5, 2, 17, 12, 7, 94, 75),
(163, 16, 7, 3, 4, 13, 7, 9, 59, 71),
(164, 16, 7, 5, 2, 17, 11, 5, 86, 70),
(165, 16, 7, 0, 7, 7, 2, 14, 63, 95),
(166, 16, 7, 2, 5, 11, 7, 11, 77, 88),
(167, 16, 7, 5, 2, 17, 10, 5, 69, 54),
(168, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(169, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(170, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(171, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(172, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(173, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(174, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(175, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(176, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(177, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(178, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(179, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(180, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(181, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(182, 17, 0, 0, 0, 0, 0, 0, 0, 0),
(183, 17, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, '2019-10-28', '08:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 2, 0, 0),
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
(14, '2019-11-14', '21:30:00', 'Grupos', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2019-10-31', '20:00:00', 'Grupos', 1, 0, 2, 3, 6, 3, 6, 0, 0),
(16, '2019-10-28', '21:30:00', 'Grupos', 5, 2, 1, 6, 4, 4, 6, 6, 4),
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
(27, '2019-10-28', '21:30:00', 'Grupos', 7, 2, 0, 6, 0, 6, 0, 0, 0),
(28, '2019-10-31', '15:30:00', 'Grupos', 1, 1, 2, 2, 6, 6, 3, 5, 7),
(29, '2019-11-04', '17:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 3, 0, 0),
(30, '2019-10-31', '20:00:00', 'Grupos', 2, 1, 2, 3, 6, 7, 6, 3, 6),
(31, '2019-10-28', '21:30:00', 'Grupos', 8, 0, 2, 0, 6, 0, 6, 0, 0),
(32, '2019-10-31', '15:30:00', 'Grupos', 2, 0, 2, 0, 6, 0, 6, 0, 0),
(33, '2019-11-01', '20:00:00', 'Grupos', 2, 0, 2, 0, 6, 0, 6, 0, 0),
(34, '2019-10-28', '20:00:00', 'Grupos', 1, 2, 1, 6, 7, 6, 2, 6, 2),
(35, '2019-11-12', '15:30:00', 'Grupos', 1, 0, 2, 4, 6, 5, 7, 0, 0),
(36, '2019-10-31', '17:00:00', 'Grupos', 5, 0, 2, 2, 6, 1, 6, 0, 0),
(37, '2019-10-29', '11:00:00', 'Grupos', 1, 1, 2, 4, 6, 6, 4, 2, 6),
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
(52, '2019-10-28', '20:00:00', 'Grupos', 6, 1, 2, 4, 6, 7, 5, 2, 6),
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
(63, '2019-10-28', '20:00:00', 'Grupos', 8, 0, 2, 2, 6, 2, 6, 0, 0),
(64, '2019-11-01', '15:30:00', 'Grupos', 2, 2, 0, 6, 0, 6, 0, 0, 0),
(65, '2019-11-02', '18:30:00', 'Grupos', 1, 2, 1, 6, 7, 6, 2, 6, 1),
(66, '2019-10-31', '08:00:00', 'Grupos', 2, 1, 2, 6, 3, 4, 6, 3, 6),
(67, '2019-10-28', '18:30:00', 'Grupos', 1, 2, 0, 6, 0, 6, 0, 0, 0),
(68, '2019-11-02', '12:30:00', 'Grupos', 5, 2, 0, 6, 4, 6, 3, 0, 0),
(69, '2019-11-06', '08:00:00', 'Grupos', 1, 2, 1, 6, 4, 4, 6, 6, 1),
(70, '2019-10-30', '11:00:00', 'Grupos', 1, 0, 2, 0, 6, 0, 6, 0, 0),
(71, '2019-11-01', '09:30:00', 'Grupos', 1, 0, 2, 0, 6, 0, 6, 0, 0),
(72, '2019-11-02', '08:00:00', 'Grupos', 1, 0, 2, 3, 6, 4, 6, 0, 0),
(128, '2019-10-11', '14:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 3, 0, 0),
(129, '2019-10-03', '14:00:00', 'Grupos', 1, 2, 1, 6, 7, 6, 4, 6, 2),
(130, '2019-09-27', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 4, 6, 6, 0),
(131, '2019-10-09', '20:00:00', 'Grupos', 1, 2, 0, 7, 5, 7, 6, 0, 0),
(132, '2019-10-10', '08:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 3, 0, 0),
(133, '2019-10-10', '12:30:00', 'Grupos', 1, 2, 1, 6, 7, 7, 6, 6, 4),
(134, '2019-10-10', '08:00:00', 'Grupos', 8, 2, 0, 6, 2, 6, 1, 0, 0),
(135, '2019-10-22', '17:00:00', 'Grupos', 1, 2, 0, 6, 0, 6, 3, 0, 0),
(136, '2019-10-02', '21:30:00', 'Grupos', 1, 2, 0, 7, 6, 6, 2, 0, 0),
(137, '2019-10-14', '15:30:00', 'Grupos', 1, 2, 1, 6, 1, 2, 6, 6, 0),
(138, '2019-10-10', '21:30:00', 'Grupos', 1, 2, 1, 6, 2, 2, 6, 7, 5),
(139, '2019-10-26', '11:00:00', 'Grupos', 1, 2, 0, 6, 4, 7, 5, 0, 0),
(140, '2019-10-21', '14:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(141, '2019-10-10', '17:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 2, 0, 0),
(142, '2019-10-25', '17:00:00', 'Grupos', 1, 2, 0, 6, 4, 6, 4, 0, 0),
(143, '2019-10-09', '15:30:00', 'Grupos', 1, 2, 0, 7, 5, 6, 2, 0, 0),
(144, '2019-10-19', '08:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 2, 0, 0),
(145, '2019-10-03', '20:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(146, '2019-10-16', '18:30:00', 'Grupos', 1, 2, 0, 6, 2, 6, 2, 0, 0),
(147, '2019-10-08', '08:00:00', 'Grupos', 1, 2, 1, 6, 4, 4, 6, 7, 6),
(148, '2019-10-19', '12:30:00', 'Grupos', 1, 1, 2, 6, 3, 1, 6, 4, 6),
(149, '2019-10-18', '08:00:00', 'Grupos', 1, 2, 1, 4, 6, 6, 4, 6, 3),
(150, '2019-10-16', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 2),
(151, '2019-09-28', '15:30:00', 'Grupos', 1, 2, 0, 6, 2, 6, 3, 0, 0),
(152, '2019-10-01', '21:30:00', 'Grupos', 1, 2, 0, 6, 4, 6, 2, 0, 0),
(153, '2019-10-19', '15:30:00', 'Grupos', 1, 2, 0, 6, 1, 7, 5, 0, 0),
(154, '2019-10-17', '20:00:00', 'Grupos', 1, 2, 0, 6, 2, 6, 4, 0, 0),
(155, '2019-10-09', '08:00:00', 'Grupos', 1, 2, 0, 6, 4, 6, 1, 0, 0),
(156, '2019-10-10', '12:30:00', 'Grupos', 2, 2, 0, 6, 2, 6, 1, 0, 0),
(157, '2019-10-18', '14:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 3, 0, 0),
(158, '2019-10-11', '11:00:00', 'Grupos', 1, 2, 0, 6, 2, 6, 2, 0, 0),
(159, '2019-10-11', '14:00:00', 'Grupos', 2, 2, 0, 6, 4, 6, 2, 0, 0),
(160, '2019-09-30', '15:30:00', 'Grupos', 1, 2, 0, 6, 1, 7, 5, 0, 0),
(161, '2019-09-27', '17:00:00', 'Grupos', 1, 0, 2, 0, 6, 0, 6, 0, 0),
(162, '2019-10-03', '08:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 1, 0, 0),
(163, '2019-10-11', '15:30:00', 'Grupos', 1, 1, 2, 6, 2, 3, 6, 2, 6),
(164, '2019-09-24', '18:30:00', 'Grupos', 1, 2, 0, 6, 3, 6, 1, 0, 0),
(165, '2019-10-12', '17:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 3, 0, 0),
(166, '2019-10-20', '17:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 2, 0, 0),
(167, '2019-10-10', '08:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 4, 0, 0),
(168, '2019-10-09', '14:00:00', 'Grupos', 1, 2, 1, 6, 4, 3, 6, 6, 1),
(169, '2019-10-08', '08:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 4, 0, 0),
(170, '2019-10-10', '08:00:00', 'Grupos', 2, 2, 0, 7, 6, 7, 6, 0, 0),
(171, '2019-09-27', '12:30:00', 'Grupos', 1, 2, 0, 6, 2, 6, 4, 0, 0),
(172, '2019-10-16', '14:00:00', 'Grupos', 1, 2, 0, 6, 2, 7, 6, 0, 0),
(173, '2019-10-08', '08:00:00', 'Grupos', 2, 2, 1, 6, 3, 3, 6, 6, 3),
(174, '2019-10-10', '08:00:00', 'Grupos', 5, 0, 2, 5, 7, 3, 6, 0, 0),
(175, '2019-10-11', '17:00:00', 'Grupos', 1, 2, 0, 6, 4, 6, 3, 0, 0),
(176, '2019-10-01', '18:30:00', 'Grupos', 1, 2, 0, 6, 0, 6, 3, 0, 0),
(177, '2019-10-04', '18:30:00', 'Grupos', 1, 2, 0, 6, 3, 6, 4, 0, 0),
(178, '2019-09-28', '09:30:00', 'Grupos', 1, 2, 0, 6, 3, 6, 3, 0, 0),
(179, '2019-10-18', '08:00:00', 'Grupos', 1, 2, 0, 6, 4, 6, 4, 0, 0),
(180, '2019-10-04', '17:00:00', 'Grupos', 1, 2, 1, 6, 4, 1, 6, 6, 4),
(181, '2019-09-24', '17:00:00', 'Grupos', 1, 2, 0, 6, 0, 7, 6, 0, 0),
(182, '2019-10-18', '15:30:00', 'Grupos', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(183, '2019-07-04', '14:00:00', 'Grupos', 1, 2, 0, 6, 2, 7, 5, 0, 0),
(184, '2019-06-20', '17:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 2, 0, 0),
(185, '2019-06-28', '15:30:00', 'Grupos', 1, 2, 0, 7, 6, 6, 3, 0, 0),
(186, '2019-07-19', '14:00:00', 'Grupos', 1, 1, 2, 5, 7, 6, 4, 5, 7),
(187, '2019-07-01', '08:00:00', 'Grupos', 1, 1, 2, 6, 3, 1, 6, 1, 6),
(188, '2019-07-02', '18:30:00', 'Grupos', 1, 0, 2, 4, 6, 0, 6, 0, 0),
(189, '2019-07-05', '14:00:00', 'Grupos', 1, 2, 0, 6, 4, 7, 5, 0, 0),
(190, '2019-06-29', '21:30:00', 'Grupos', 1, 2, 0, 6, 0, 6, 1, 0, 0),
(191, '2019-07-02', '18:30:00', 'Grupos', 2, 2, 1, 1, 6, 6, 2, 6, 4),
(192, '2019-07-17', '11:00:00', 'Grupos', 1, 0, 2, 3, 6, 0, 6, 0, 0),
(193, '2019-07-03', '20:00:00', 'Grupos', 1, 0, 2, 1, 6, 5, 7, 0, 0),
(194, '2019-07-06', '08:00:00', 'Grupos', 1, 0, 2, 0, 6, 2, 6, 0, 0),
(195, '2019-07-10', '09:30:00', 'Grupos', 1, 0, 2, 3, 6, 5, 7, 0, 0),
(196, '2019-06-30', '17:00:00', 'Grupos', 1, 0, 2, 4, 6, 0, 6, 0, 0),
(197, '2019-06-27', '18:30:00', 'Grupos', 1, 0, 2, 3, 6, 3, 6, 0, 0),
(198, '2019-07-09', '11:00:00', 'Grupos', 1, 1, 2, 3, 6, 7, 5, 5, 7),
(199, '2019-07-01', '18:30:00', 'Grupos', 1, 0, 2, 2, 6, 1, 6, 0, 0),
(200, '2019-07-02', '20:00:00', 'Grupos', 8, 0, 2, 1, 6, 2, 6, 0, 0),
(201, '2019-07-01', '08:00:00', 'Grupos', 1, 0, 2, 2, 6, 1, 6, 0, 0),
(202, '2019-07-01', '21:30:00', 'Grupos', 1, 0, 2, 0, 6, 4, 6, 0, 0),
(203, '2019-07-16', '17:00:00', 'Grupos', 1, 0, 2, 3, 6, 1, 6, 0, 0),
(204, '2019-07-02', '18:30:00', 'Grupos', 1, 0, 2, 0, 6, 1, 6, 0, 0),
(205, '2019-06-25', '08:00:00', 'Grupos', 1, 0, 2, 0, 6, 2, 6, 0, 0),
(206, '2019-07-11', '15:30:00', 'Grupos', 1, 0, 2, 3, 6, 2, 6, 0, 0),
(207, '2019-07-03', '20:00:00', 'Grupos', 1, 0, 2, 2, 6, 4, 6, 0, 0),
(208, '2019-06-29', '12:30:00', 'Grupos', 1, 0, 2, 3, 6, 0, 6, 0, 0),
(209, '2019-07-04', '11:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 4, 0, 0),
(210, '2019-06-28', '21:30:00', 'Grupos', 1, 2, 0, 6, 2, 6, 3, 0, 0),
(211, '2019-07-03', '20:00:00', 'Grupos', 2, 2, 0, 6, 4, 6, 3, 0, 0),
(212, '2019-07-10', '12:30:00', 'Grupos', 1, 2, 0, 6, 3, 6, 2, 0, 0),
(213, '2019-07-05', '08:00:00', 'Grupos', 1, 0, 2, 2, 6, 3, 6, 0, 0),
(214, '2019-07-02', '14:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 4, 0, 0),
(215, '2019-07-15', '15:30:00', 'Grupos', 1, 2, 0, 6, 1, 7, 6, 0, 0),
(216, '2019-07-04', '08:00:00', 'Grupos', 1, 0, 2, 4, 6, 4, 6, 0, 0),
(217, '2019-07-01', '08:00:00', 'Grupos', 2, 2, 0, 6, 4, 6, 4, 0, 0),
(218, '2019-07-11', '14:00:00', 'Grupos', 1, 2, 1, 6, 2, 2, 6, 6, 3),
(247, '2019-12-02', '15:30:00', 'Grupos', 1, 2, 1, 6, 1, 4, 6, 7, 5),
(248, '2019-12-11', '20:00:00', 'Grupos', 1, 2, 1, 1, 6, 6, 2, 6, 4),
(249, '2019-12-27', '08:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 0, 0, 0),
(250, '2019-12-10', '12:30:00', 'Grupos', 1, 0, 2, 3, 6, 5, 7, 0, 0),
(251, '2019-12-06', '15:30:00', 'Grupos', 1, 2, 1, 3, 6, 7, 6, 7, 6),
(252, '2019-12-12', '14:00:00', 'Grupos', 1, 2, 1, 5, 7, 6, 1, 6, 4),
(253, '2019-12-20', '15:30:00', 'Grupos', 1, 1, 2, 6, 3, 2, 6, 6, 7),
(254, '2019-12-27', '08:00:00', 'Grupos', 2, 1, 2, 6, 1, 3, 6, 4, 6),
(255, '2019-12-04', '18:30:00', 'Grupos', 1, 2, 0, 6, 1, 6, 0, 0, 0),
(256, '2019-12-18', '08:00:00', 'Grupos', 1, 0, 2, 1, 6, 1, 6, 0, 0),
(257, '2019-12-23', '11:00:00', 'Grupos', 1, 2, 0, 6, 4, 6, 3, 0, 0),
(258, '2019-12-06', '14:00:00', 'Grupos', 1, 2, 1, 7, 6, 6, 7, 7, 6),
(259, '2019-12-10', '11:00:00', 'Grupos', 1, 0, 2, 1, 6, 0, 6, 0, 0),
(260, '2019-12-27', '08:00:00', 'Grupos', 5, 2, 1, 5, 7, 6, 1, 6, 4),
(261, '2019-12-27', '17:00:00', 'Grupos', 1, 1, 2, 5, 7, 6, 1, 3, 6),
(262, '2019-12-10', '18:30:00', 'Grupos', 1, 2, 0, 6, 1, 6, 4, 0, 0),
(263, '2019-12-11', '12:30:00', 'Grupos', 1, 2, 1, 7, 5, 1, 6, 6, 3),
(264, '2019-12-04', '21:30:00', 'Grupos', 1, 2, 0, 6, 1, 6, 3, 0, 0),
(265, '2019-12-27', '08:00:00', 'Grupos', 6, 2, 1, 6, 3, 5, 7, 7, 6),
(266, '2019-12-19', '20:00:00', 'Grupos', 1, 2, 0, 6, 1, 6, 0, 0, 0),
(267, '2019-12-17', '09:30:00', 'Grupos', 1, 2, 0, 6, 1, 6, 0, 0, 0),
(268, '2019-12-16', '18:30:00', 'Grupos', 1, 0, 2, 1, 6, 2, 6, 0, 0),
(269, '2019-12-27', '08:00:00', 'Grupos', 7, 2, 0, 7, 6, 7, 6, 0, 0),
(270, '2019-12-05', '17:00:00', 'Grupos', 1, 2, 0, 6, 3, 6, 1, 0, 0),
(271, '2019-12-06', '15:30:00', 'Grupos', 2, 0, 2, 1, 6, 4, 6, 0, 0),
(272, '2019-12-27', '08:00:00', 'Grupos', 8, 1, 2, 5, 7, 6, 2, 2, 6),
(273, '2019-12-12', '12:30:00', 'Grupos', 1, 0, 2, 5, 7, 2, 6, 0, 0),
(274, '2019-12-27', '09:30:00', 'Grupos', 1, 2, 0, 6, 0, 6, 0, 0, 0);

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
(72, '2019-11-14', '15:30:00', 'admin', NULL, 'NO'),
(75, '2019-11-13', '15:30:00', 'admin', 1, 'SI'),
(77, '2019-11-27', '21:30:00', 'ritaconde', NULL, 'NO'),
(78, '2019-12-04', '12:30:00', 'dianacasanova', NULL, 'NO'),
(80, '2019-11-22', '15:30:00', 'joseluis', NULL, 'NO'),
(81, '2019-11-30', '14:00:00', 'joseluis', 1, 'SI'),
(83, '2019-11-13', '15:30:00', 'fabioroson', 2, 'SI'),
(84, '2019-11-19', '20:00:00', 'teofilomartin', NULL, 'NO'),
(87, '2019-12-20', '18:30:00', 'hugo_mejide', NULL, 'NO'),
(88, '2019-11-16', '08:00:00', 'rosinafdez', NULL, 'NO'),
(89, '2019-11-21', '17:00:00', 'rosinafdez', NULL, 'NO'),
(90, '2019-12-21', '12:30:00', 'admin', NULL, 'NO'),
(91, '2019-11-16', '12:30:00', 'jfperez', NULL, 'NO');

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
(75, 'admin'),
(75, 'dianacasanova'),
(75, 'ritaconde'),
(75, 'ypgarcia'),
(77, 'hugo_mejide'),
(77, 'joseluis'),
(77, 'ritaconde'),
(78, 'adrianblanco'),
(78, 'dianacasanova'),
(80, 'joseluis'),
(80, 'xianagolpe'),
(81, 'adrianblanco'),
(81, 'fabioroson'),
(81, 'joseluis'),
(81, 'rosinafdez'),
(83, 'diegocurras'),
(83, 'esthermontecelo'),
(83, 'fabioroson'),
(83, 'teofilomartin'),
(84, 'diegocurras'),
(84, 'teofilomartin'),
(87, 'hugo_mejide'),
(87, 'jfperez'),
(88, 'olista'),
(88, 'rosinafdez'),
(89, 'rosinafdez'),
(91, 'jfperez');

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
('admin', 1, '2019-11-20', '09:30:00'),
('admin', 2, '2019-11-20', '11:00:00'),
('admin', 5, '2019-11-20', '17:00:00'),
('admin', 6, '2019-11-14', '17:00:00'),
('alfredocasas', 8, '2019-12-27', '08:00:00'),
('carmenformoso', 2, '2019-12-06', '15:30:00'),
('celiarodriguez', 1, '2019-12-11', '12:30:00'),
('celiarodriguez', 1, '2019-12-04', '21:30:00'),
('jaimesalgado', 1, '2019-12-12', '14:00:00'),
('jaimesalgado', 1, '2019-12-20', '15:30:00'),
('jfperez', 1, '2019-11-14', '11:00:00'),
('jfperez', 2, '2019-11-18', '17:00:00'),
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
('mariohernandez', 1, '2019-11-14', '21:30:00'),
('olista', 2, '2019-11-13', '12:30:00'),
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
(1, 'Ourense Open M2', 'Masculina', '2019-10-01', 2019, 2),
(2, 'Ourense Open M3', 'Masculina', '2019-09-01', 2019, 3),
(8, 'Ourense Open F', 'Femenina', '2019-06-01', 2019, 1),
(16, 'Xmas Cup', 'Mixta', '2019-12-01', 2019, 1),
(17, 'Ourense Open M1', 'Masculina', '2019-10-01', 2019, 1);

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
('abelardoglez', 'abelardoglez', '41717337Y', 'Abelardo', 'Gonzalez Villamil', '695435343', 'villamilaberlard@gmail.com', '1969-03-23', 'Masculina', 'NORMAL', 'SI', 'ES66', '21000418401234567891'),
('admin', 'admin', '11111111H', 'Admin', 'Adminez Adminez', '676532185', 'admin@admin.es', '1991-05-14', 'Masculina', 'ADMIN', 'NO', '', ''),
('adrianantolinez', 'adrianantolinez', '51575699Q', 'Adrian', 'Antolinez Riestra', '647554523', 'mrfarenheit143@yahoo.com', '1980-02-21', 'Masculina', 'NORMAL', 'NO', '', ''),
('adrianblanco', 'adrianblanco', '91259143L', 'Adrian', 'Blanco Calvo', '673434324', 'blanquitocalvo@aol.es', '1972-08-22', 'Masculina', 'NORMAL', 'SI', 'DK18', '32005847916555800078'),
('albertordgz', 'albertordgz', '16084051J', 'Alberto', 'Rodriguez EspaÃ±a', '983473423', 'arespaÃ±a@esei.uvigo.es', '1998-03-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('alejandrocastro', 'alejandrocastro', '44189814Y', 'Alejandro', 'Castro Montero', '673847234', 'acmontero@esei.uvigo.es', '1979-01-04', 'Masculina', 'NORMAL', 'NO', '', ''),
('alexandrefdez', 'alexandrefdez', '98790014T', 'Alexandre', 'Fernandez Gallego', '635426347', 'alexitomolon@yahoo.com', '1988-04-20', 'Masculina', 'NORMAL', 'NO', '', ''),
('alfonsoroman', 'alfonsoroman', '23882364S', 'Alfonso', 'Roman Romasanta', '674573432', 'romasantaroman@gmail.com', '1965-11-22', 'Masculina', 'NORMAL', 'SI', 'ES82', '50039592929781916551'),
('alfredocasas', 'alfredocasas', '99025185L', 'Alfredo', 'Casas Rojas', '988734623', 'alfredhard_occ@aol.es', '2001-01-01', 'Masculina', 'NORMAL', 'NO', '', ''),
('alvarocardero', 'alvarocardero', '14408363J', 'Alvaro', 'Cardero Hernandez', '678493213', 'alvaritorito@gmail.com', '1997-11-20', 'Masculina', 'NORMAL', 'NO', '', ''),
('anabarreiro', 'anabarreiro', '30104099C', 'Ana', 'Barreiro Sequeiros', '983472822', 'anabarqueiros@hotmail.com', '2000-10-27', 'Femenina', 'NORMAL', 'SI', 'ES60', '78945551900533010001'),
('angelmonteagudo', 'angelmonteagudo', '42629771F', 'Angel', 'Monteagudo Leal', '666234237', 'angelmonteleal92@gmail.com', '1992-02-22', 'Masculina', 'NORMAL', 'NO', '', ''),
('arturolopez', 'arturolopez', '76578256D', 'Arturo', 'Lopez Rivera', '988374342', 'arturo_arturito@gmail.com', '1978-11-01', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlosconde', 'carlosconde', '66882682Q', 'Carlos', 'Conde Trueba', '674835332', 'condetrueba1@uvigo.es', '1974-04-04', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlosguede', 'carlosguede', '00849468D', 'Carlos', 'Guede Brown', '983423432', 'carlinhosbrown@yahoo.com', '1996-04-17', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlosperez', 'carlosperez', '12383305J', 'Carlos', 'Perez Matias', '666234236', 'carlitosperez@gmail.com', '1987-04-16', 'Masculina', 'NORMAL', 'NO', '', ''),
('carlossiota', 'carlossiota', '63892881P', 'Carlos', 'Siota Albino', '674324234', 'alpanpanyalbinvino@gmail.com', '2002-12-31', 'Masculina', 'NORMAL', 'NO', '', ''),
('carmenformoso', 'carmenformoso', '48224992H', 'Carmen', 'Formoso Benito', '654636237', 'carmencita_1@yahoo.com', '1996-07-24', 'Femenina', 'NORMAL', 'NO', '', ''),
('celiarodriguez', 'celiarodriguez', '12564638Z', 'Celia', 'Rodriguez Recio', '754736232', 'celiarecio@gmail.com', '1997-08-24', 'Femenina', 'NORMAL', 'NO', '', ''),
('cristoffpereira', 'cristoffpereira', '10412725G', 'Cristoff', 'Pereira Tellez', '683743212', 'cristoffpertell@outlook.com', '1986-04-12', 'Masculina', 'NORMAL', 'NO', '', ''),
('danielceballos', 'danielceballos', '09224837C', 'Daniel', 'Ceballos Cebollas', '734724323', 'callmeElCebolo@gmail.com', '1998-09-12', 'Masculina', 'NORMAL', 'NO', '', ''),
('davidmanuel', 'davidmanuel', '49443998R', 'David Manuel', 'Gimenez Montoya', '675847289', 'gmontaya_eldavis@gmail.com', '1983-08-09', 'Masculina', 'NORMAL', 'NO', '', ''),
('davidmiguez', 'davidmiguez', '27980947K', 'David', 'Miguez Lopez', '984583243', 'miguezdavidlopez@esei.uvigo.es', '1990-10-28', 'Masculina', 'NORMAL', 'NO', '', ''),
('dianacasanova', 'dianacasanova', '46527792B', 'Diana', 'Casanova Hernandez', '643734284', 'dianadinamita@hotmail.com', '1990-06-23', 'Femenina', 'NORMAL', 'SI', 'ES60', '00491500051234567892'),
('diegocurras', 'diegocurras', '13904461H', 'Diego', 'Curras Blas', '683423423', 'currasblasmas@gmail.com', '1965-05-13', 'Masculina', 'NORMAL', 'NO', '', ''),
('diegojorreto', 'diegojorreto', '74838615L', 'Diego', 'Jorreto Dominguez', '684538434', 'diegooooljorreto@yahoo.com', '1997-10-12', 'Masculina', 'NORMAL', 'NO', '', ''),
('diegoportela', 'diegoportela', '66245444Q', 'Diego', 'Portela Lopez', '674382421', 'diegol@outlook.com', '1985-06-20', 'Masculina', 'NORMAL', 'NO', '', ''),
('enrique_lopez', 'enrique_lopez', '15321397Q', 'Enrique', 'Lopez Llano', '985647434', 'quiquelopezllan@gmail.com', '1978-06-27', 'Masculina', 'NORMAL', 'NO', '', ''),
('esthermontecelo', 'esthermontecelo', '12441494N', 'Esther', 'Montecelo Ledo', '984374233', 'esthercitamonteledo@yahoo.com', '1985-01-22', 'Femenina', 'NORMAL', 'NO', '', ''),
('fabioroson', 'fabioroson', '35924493B', 'Fabio', 'Roson Rosales', '674853223', 'rosonrosales@hotmail.com', '1985-04-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('felixperez', 'felixperez', '70053511L', 'Felix', 'Perez Feliz', '984834272', 'felixfeliz@hotmail.com', '1972-01-26', 'Masculina', 'NORMAL', 'NO', '', ''),
('franciscobretal', 'franciscobretal', '13359330X', 'Francisco', 'Bretal Franco', '674582374', 'francobretal90@gmail.com', '1990-09-27', 'Masculina', 'NORMAL', 'NO', '', ''),
('guillermomtnez', 'guillermomtnez', '28875991C', 'Guillermo', 'Martinez Soria', '683742432', 'guille_1989@gmail.com', '1989-11-25', 'Masculina', 'NORMAL', 'NO', '', ''),
('hugo_mejide', 'hugo_mejide', '07814102J', 'Hugo', 'Mejide Perez', '657367423', 'mejidehugo1990_43@yahoo.com', '1990-02-04', 'Masculina', 'NORMAL', 'SI', 'ES94', '20805801101234567891'),
('isabelmata', 'isabelmata', '85038738X', 'Isabel', 'Mata Trillo', '694845332', 'isabelitaii@gmail.com', '1988-03-25', 'Femenina', 'NORMAL', 'NO', '', ''),
('ivanvalcarcel', 'ivanvalcarcel', '02608914R', 'Ivan', 'Valcarcel Gil', '678234733', 'valcarcelinho@yahoo.es', '1981-07-13', 'Masculina', 'NORMAL', 'NO', '', ''),
('jacobohermida', 'jacobohermida', '57300386A', 'Jacobo', 'Hermida Lista', '674854323', 'elprimojacob@hotmail.com', '1993-03-16', 'Masculina', 'NORMAL', 'NO', '', ''),
('jaimesalgado', 'jaimesalgado', '04152746G', 'Jaime', 'Salgado Gutierrez', '666437322', 'jaimito456_salga@gmail.com', '1995-12-04', 'Masculina', 'NORMAL', 'NO', '', ''),
('jantoniooute', 'jantoniooute', '78207899X', 'Jose Antonio', 'OuteiriÃ±o Baltar', '673857231', 'antoniÃ±obaltarin@eduxunta.gal', '1994-05-15', 'Masculina', 'NORMAL', 'SI', 'ES90', '00246912501234567891'),
('javierlorenzo', 'javierlorenzo', '15396085T', 'Javier', 'Lorenzo Gil', '678321241', 'superjavi@yahoo.com', '1987-06-17', 'Masculina', 'NORMAL', 'NO', '', ''),
('jesusiglesias', 'jesusiglesias', '77523701Q', 'Jesus', 'Iglesias de la Torre', '987534234', 'jesusinho_towers@yahoo.es', '2001-07-04', 'Masculina', 'NORMAL', 'NO', '', ''),
('jfperez', 'joni', '44493919M', 'Jonathan', 'Fernandez Perez', '696627322', 'jfperez3@esei.uvigo.es', '1995-10-25', 'Masculina', 'NORMAL', 'NO', '', ''),
('jordigonzalez', 'jordigonzalez', '35474611D', 'Jordi', 'Gonzalez Puig', '653472342', 'puigpuig3@hotmail.com', '1963-12-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorgepuertas', 'jorgepuertas', '90471642S', 'Jorge', 'Puertas Ugarte', '987563421', 'jorginho_69@yahoo.com', '2002-07-30', 'Masculina', 'NORMAL', 'NO', '', ''),
('jorgesabucedo', 'jorgesabucedo', '51907965R', 'Jorge', 'Sabucedo Montes', '985847543', 'jorge4ever@gmail.com', '1994-07-26', 'Masculina', 'NORMAL', 'NO', '', ''),
('joseantonio', 'joseantonio', '06956257E', 'Jose Antonio', 'Moyano Brey', '683473292', 'breysuperstar@gmail.com', '2000-11-08', 'Masculina', 'NORMAL', 'NO', '', ''),
('josedacal', 'josedacal', '84792302L', 'Jose', 'Dacal Fernandez', '948348353', 'josiÃ±opower@hotmail.com', '1995-03-20', 'Masculina', 'NORMAL', 'NO', '', ''),
('joseluis', 'joseluis', '23227175G', 'Jose Luis', 'Rodriguez Espinosa', '673482344', 'jlrodrinosa@hotmail.com', '1990-09-13', 'Masculina', 'NORMAL', 'NO', '', ''),
('josemaria', 'josemaria', '06361196V', 'Jose Maria', 'Gonzalez Gonzalez', '667432434', 'chemaglezglez@hotmail.com', '1993-10-06', 'Masculina', 'NORMAL', 'NO', '', ''),
('juancarlos', 'juancarlos', '01538777P', 'Juan Carlos', 'Perez Perez', '988462342', 'juankar_bombom96@gmail.com', '1996-12-21', 'Masculina', 'NORMAL', 'NO', '', ''),
('juancorral', 'juancorral', '73539077G', 'Juan', 'Corral Perez', '699384234', 'juanitocorral@hotmail.com', '1991-02-26', 'Masculina', 'NORMAL', 'NO', '', ''),
('juanllano', 'juanllano', '97401039H', 'Juan', 'Llano Fernandez', '678432342', 'juanllanollano@yahoo.com', '1994-09-11', 'Masculina', 'NORMAL', 'NO', '', ''),
('juansoler', 'juansoler', '12705621F', 'Juan', 'Soler Jimenez', '674832231', 'solerjimjuan@uvigo.es', '1973-05-24', 'Masculina', 'NORMAL', 'NO', '', ''),
('linogonzalez', 'linogonzalez', '09915233W', 'Lino', 'Gonzalez Fuster', '674534233', 'linoavelino@yahoo.com', '1982-05-31', 'Masculina', 'NORMAL', 'NO', '', ''),
('lucianespereira', 'lucianespereira', '05932693G', 'Lucia', 'Nespereira Cuesta', '678432423', 'sorayanespe1995@hotmail.com', '1995-11-20', 'Femenina', 'NORMAL', 'NO', '', ''),
('luisa_sevilla', 'luisa_sevilla', '96676329S', 'Luisa', 'Sevilla Dominguez', '674834579', 'luisa_sevilla87@gmail.com', '1987-12-20', 'Femenina', 'NORMAL', 'SI', 'ES71', '00302053091234567895'),
('luiscaride', 'luiscaride', '60545480G', 'Luis', 'Caride Abril', '678345352', 'luiscarabril@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', ''),
('luiscarmona', 'luiscarmona', '61033162V', 'Luis', 'Carmona Goya', '653243243', 'luisinhocarmona@yahoo.com', '1980-08-24', 'Masculina', 'NORMAL', 'NO', '', ''),
('luisviejo', 'luisviejo', '25474614K', 'Luis', 'Viejo Gil', '683843422', 'luisviejo_09876@gmail.com', '1976-02-15', 'Masculina', 'NORMAL', 'NO', '', ''),
('manuelangel', 'manuelangel', '03960290N', 'Manuel Angel', 'Perez Jimenez', '666234234', 'manuangel@hotmail.com', '1973-01-14', 'Masculina', 'NORMAL', 'NO', '', ''),
('marcoscudeiro', 'marcoscudeiro', '17517361D', 'Marcos', 'Cudeiro Viso', '674853453', 'chinocudeiro@gmail.cn', '2000-02-29', 'Masculina', 'NORMAL', 'NO', '', ''),
('mariaboveda', 'mariaboveda', '66818651V', 'Maria', 'Boveda Ruiz', '984734823', 'mbruiz@uvigo.es', '1993-05-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('mariapumar', 'mariapumar', '78078690S', 'Maria', 'Pumar Vazquez', '683472331', 'pumarvazquezmar1234@gmail.com', '1997-03-18', 'Femenina', 'NORMAL', 'SI', 'AD66', '19518195619519819619'),
('mariohernandez', 'mariohernandez', '22474502Y', 'Mario', 'Hernandez Hermoso', '689242312', 'supermario64@gmail.com', '1964-04-03', 'Masculina', 'NORMAL', 'NO', '', ''),
('marta_castro', 'marta_castro', '28072495Y', 'Marta', 'Castro Xil', '678457393', 'martitaxil1@hotmail.com', '2000-11-19', 'Femenina', 'NORMAL', 'SI', 'ES10', '00492352082414205416'),
('noemiquesada', 'noemiquesada', '82023628Q', 'Noemi', 'Quesada Lopez', '643237323', 'nquelopez@esei.uvigo.es', '2003-03-31', 'Femenina', 'NORMAL', 'NO', '', ''),
('olallardgez', 'olallardgez', '50566997W', 'Olalla', 'Rodriguez Perez', '678433189', 'superolalla@yahoo.com', '1997-12-21', 'Femenina', 'NORMAL', 'NO', '', ''),
('olista', '1234', '24252751X', 'Oscar', 'Lista Rivera', '643956059', 'adminadmin@gmail.com', '1994-05-22', 'Masculina', 'NORMAL', 'SI', 'ES00', '1234567890123456'),
('oscardominguez', 'oscardominguez', '40315187M', 'Oscar', 'Dominguez Sanz', '674324233', 'oscardomsanz456@hotmail.com', '1991-11-18', 'Masculina', 'NORMAL', 'NO', '', ''),
('oscarfernadez', 'oscarfernadez', '36416302B', 'Oscar', 'Fernandez Dorado', '746345332', 'oscardorado98@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', ''),
('pacobarrio', 'pacobarrio', '52957832X', 'Paco', 'Barrio Leon', '647583423', 'pacoleon@yahoo.com', '1977-03-28', 'Masculina', 'NORMAL', 'SI', 'ES82', '78945102345873061212'),
('pazbalboa', 'pazbalboa', '76101387E', 'Paz', 'Balboa Leon', '984375437', 'pacitabalboa94@gmail.com', '1994-01-05', 'Femenina', 'NORMAL', 'NO', '', ''),
('pedrocuesta', 'pedrocuesta', '72983428N', 'Pedro', 'Cuesta Morales', '669454344', 'pcmorales@uvigo.es', '1977-01-20', 'Masculina', 'NORMAL', 'SI', 'ES42', '11848468464655222222'),
('pilarlado', 'pilarlado', '89199880S', 'Pilar', 'Lado Izquierdo', '735637432', 'plizquierdo@esei.uvigo.es', '1999-07-17', 'Femenina', 'NORMAL', 'NO', '', ''),
('ritaconde', 'ritaconde', '24176992J', 'Rita', 'Conde Sanchez', '848543322', 'ritaorita@gmail.com', '1981-11-22', 'Femenina', 'NORMAL', 'NO', '', ''),
('robertotato', 'robertotato', '37336487N', 'Roberto', 'Tato Panadero', '637482344', 'jugamosaltato@hotmail.com', '2000-11-06', 'Masculina', 'NORMAL', 'SI', 'AL42', '78945687431597125824'),
('rociofernandez', 'rociofernandez', '74484850V', 'Rocio', 'Fernandez Blanco', '987635467', 'rociofer_blan_88@gmail.com', '1988-08-21', 'Femenina', 'NORMAL', 'NO', '', ''),
('rosinafdez', 'rosinafdez', '28491046A', 'Rosina', 'Fernandez Rojas', '976543345', 'rfrojas@gmail.com', '1983-06-24', 'Femenina', 'NORMAL', 'NO', '', ''),
('rubencorral', 'rubencorral', '69287892R', 'Ruben', 'Corral Cabreiroa', '768453443', 'cabreiroawaters@yahoo.com', '1992-11-11', 'Masculina', 'NORMAL', 'NO', '', ''),
('rubengonzalez', 'rubengonzalez', '43257679S', 'Ruben', 'Gonzalez Hurtado', '674357232', 'ruben7star@gmail.com', '1999-07-25', 'Masculina', 'NORMAL', 'NO', '', ''),
('taniafernandez', 'taniafernandez', '36772892D', 'Tania', 'Fernandez Domingo', '687343884', 'domingotaniafernan@gmail.com', '1992-06-23', 'Femenina', 'NORMAL', 'NO', '', ''),
('teofilomartin', 'teofilomartin', '25557539P', 'Teofilo', 'Martin Vidal', '987543532', 'teofilo_87832@gmail.com', '1983-07-13', 'Masculina', 'NORMAL', 'SI', 'ES17', '20852066623456789011'),
('xacoboiglesias', 'xacoboiglesias', '28569206D', 'Xacobo', 'Iglesias Altomano', '983423242', 'xacoaltomano@hotmail.com', '1982-03-16', 'Masculina', 'NORMAL', 'NO', '', ''),
('xianagolpe', 'xianagolpe', '95350359H', 'Xiana', 'Golpe Fuertes', '673264373', 'golpefuertesxi@aol.com', '1999-02-15', 'Femenina', 'NORMAL', 'NO', '', ''),
('ypgarcia', 'asdf', '44657078W', 'Iago', 'Perez Garcia', '669517850', 'ypgarcia@esei.uvigo.es', '1996-04-21', 'Masculina', 'NORMAL', 'SI', 'ES40', '12345678912345678912');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `parejas`
--
ALTER TABLE `parejas`
  MODIFY `ID_Pareja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_Partido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
