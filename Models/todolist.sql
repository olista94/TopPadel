-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2019 a las 20:56:51
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

-- --------------------------------------------------------
-- --------------------------------------------------------

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
(70, 'chica98', 'chica99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_has_grupos`
--

CREATE TABLE `parejas_has_grupos` (
  `ID_Pareja` tinyint(5) NOT NULL,
  `grupo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_has_grupos`
--

INSERT INTO `parejas_has_grupos` (`ID_Pareja`, `grupo`) VALUES
(0, 3),
(40, 0),
(41, 0),
(42, 0),
(43, 0),
(44, 0),
(45, 0),
(46, 0),
(47, 0),
(48, 0),
(49, 0),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 3);

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
(1, 4, 40, 41),
(2, 4, 40, 42),
(3, 4, 40, 43),
(4, 4, 40, 44),
(5, 4, 40, 45),
(6, 4, 40, 46),
(7, 4, 40, 47),
(8, 4, 40, 48),
(9, 4, 40, 49),
(10, 4, 40, 50),
(11, 4, 40, 51),
(12, 4, 40, 52),
(13, 4, 40, 53),
(14, 4, 40, 54),
(15, 4, 40, 55),
(16, 4, 40, 56),
(17, 4, 40, 57),
(18, 4, 40, 58),
(19, 4, 40, 59),
(20, 4, 40, 60),
(21, 4, 40, 61),
(22, 4, 40, 62),
(23, 4, 40, 63),
(24, 4, 40, 64),
(25, 4, 40, 65),
(26, 4, 40, 66),
(27, 4, 40, 67),
(28, 4, 40, 68),
(29, 4, 40, 69),
(30, 4, 40, 70),
(31, 4, 41, 42),
(32, 4, 41, 43),
(33, 4, 41, 44),
(34, 4, 41, 45),
(35, 4, 41, 46),
(36, 4, 41, 47),
(37, 4, 41, 48),
(38, 4, 41, 49),
(39, 4, 41, 50),
(40, 4, 41, 51),
(41, 4, 41, 52),
(42, 4, 41, 53),
(43, 4, 41, 54),
(44, 4, 41, 55),
(45, 4, 41, 56),
(46, 4, 41, 57),
(47, 4, 41, 58),
(48, 4, 41, 59),
(49, 4, 41, 60),
(50, 4, 41, 61),
(51, 4, 41, 62),
(52, 4, 41, 63),
(53, 4, 41, 64),
(54, 4, 41, 65),
(55, 4, 41, 66),
(56, 4, 41, 67),
(57, 4, 41, 68),
(58, 4, 41, 69),
(59, 4, 41, 70),
(60, 4, 42, 43),
(61, 4, 42, 44),
(62, 4, 42, 45),
(63, 4, 42, 46),
(64, 4, 42, 47),
(65, 4, 42, 48),
(66, 4, 42, 49),
(67, 4, 42, 50),
(68, 4, 42, 51),
(69, 4, 42, 52),
(70, 4, 42, 53),
(71, 4, 42, 54),
(72, 4, 42, 55),
(73, 4, 42, 56),
(74, 4, 42, 57),
(75, 4, 42, 58),
(76, 4, 42, 59),
(77, 4, 42, 60),
(78, 4, 42, 61),
(79, 4, 42, 62),
(80, 4, 42, 63),
(81, 4, 42, 64),
(82, 4, 42, 65),
(83, 4, 42, 66),
(84, 4, 42, 67),
(85, 4, 42, 68),
(86, 4, 42, 69),
(87, 4, 42, 70),
(88, 4, 43, 44),
(89, 4, 43, 45),
(90, 4, 43, 46),
(91, 4, 43, 47),
(92, 4, 43, 48),
(93, 4, 43, 49),
(94, 4, 43, 50),
(95, 4, 43, 51),
(96, 4, 43, 52),
(97, 4, 43, 53),
(98, 4, 43, 54),
(99, 4, 43, 55),
(100, 4, 43, 56),
(101, 4, 43, 57),
(102, 4, 43, 58),
(103, 4, 43, 59),
(104, 4, 43, 60),
(105, 4, 43, 61),
(106, 4, 43, 62),
(107, 4, 43, 63),
(108, 4, 43, 64),
(109, 4, 43, 65),
(110, 4, 43, 66),
(111, 4, 43, 67),
(112, 4, 43, 68),
(113, 4, 43, 69),
(114, 4, 43, 70),
(115, 4, 44, 45),
(116, 4, 44, 46),
(117, 4, 44, 47),
(118, 4, 44, 48),
(119, 4, 44, 49),
(120, 4, 44, 50),
(121, 4, 44, 51),
(122, 4, 44, 52),
(123, 4, 44, 53),
(124, 4, 44, 54),
(125, 4, 44, 55),
(126, 4, 44, 56),
(127, 4, 44, 57),
(128, 4, 44, 58),
(129, 4, 44, 59),
(130, 4, 44, 60),
(131, 4, 44, 61),
(132, 4, 44, 62),
(133, 4, 44, 63),
(134, 4, 44, 64),
(135, 4, 44, 65),
(136, 4, 44, 66),
(137, 4, 44, 67),
(138, 4, 44, 68),
(139, 4, 44, 69),
(140, 4, 44, 70),
(141, 4, 45, 46),
(142, 4, 45, 47),
(143, 4, 45, 48),
(144, 4, 45, 49),
(145, 4, 45, 50),
(146, 4, 45, 51),
(147, 4, 45, 52),
(148, 4, 45, 53),
(149, 4, 45, 54),
(150, 4, 45, 55),
(151, 4, 45, 56),
(152, 4, 45, 57),
(153, 4, 45, 58),
(154, 4, 45, 59),
(155, 4, 45, 60),
(156, 4, 45, 61),
(157, 4, 45, 62),
(158, 4, 45, 63),
(159, 4, 45, 64),
(160, 4, 45, 65),
(161, 4, 45, 66),
(162, 4, 45, 67),
(163, 4, 45, 68),
(164, 4, 45, 69),
(165, 4, 45, 70),
(166, 4, 46, 47),
(167, 4, 46, 48),
(168, 4, 46, 49),
(169, 4, 46, 50),
(170, 4, 46, 51),
(171, 4, 46, 52),
(172, 4, 46, 53),
(173, 4, 46, 54),
(174, 4, 46, 55),
(175, 4, 46, 56),
(176, 4, 46, 57),
(177, 4, 46, 58),
(178, 4, 46, 59),
(179, 4, 46, 60),
(180, 4, 46, 61),
(181, 4, 46, 62),
(182, 4, 46, 63),
(183, 4, 46, 64),
(184, 4, 46, 65),
(185, 4, 46, 66),
(186, 4, 46, 67),
(187, 4, 46, 68),
(188, 4, 46, 69),
(189, 4, 46, 70),
(190, 4, 47, 48),
(191, 4, 47, 49),
(192, 4, 47, 50),
(193, 4, 47, 51),
(194, 4, 47, 52),
(195, 4, 47, 53),
(196, 4, 47, 54),
(197, 4, 47, 55),
(198, 4, 47, 56),
(199, 4, 47, 57),
(200, 4, 47, 58),
(201, 4, 47, 59),
(202, 4, 47, 60),
(203, 4, 47, 61),
(204, 4, 47, 62),
(205, 4, 47, 63),
(206, 4, 47, 64),
(207, 4, 47, 65),
(208, 4, 47, 66),
(209, 4, 47, 67),
(210, 4, 47, 68),
(211, 4, 47, 69),
(212, 4, 47, 70),
(213, 4, 48, 49),
(214, 4, 48, 50),
(215, 4, 48, 51),
(216, 4, 48, 52),
(217, 4, 48, 53),
(218, 4, 48, 54),
(219, 4, 48, 55),
(220, 4, 48, 56),
(221, 4, 48, 57),
(222, 4, 48, 58),
(223, 4, 48, 59),
(224, 4, 48, 60),
(225, 4, 48, 61),
(226, 4, 48, 62),
(227, 4, 48, 63),
(228, 4, 48, 64),
(229, 4, 48, 65),
(230, 4, 48, 66),
(231, 4, 48, 67),
(232, 4, 48, 68),
(233, 4, 48, 69),
(234, 4, 48, 70),
(235, 4, 49, 50),
(236, 4, 49, 51),
(237, 4, 49, 52),
(238, 4, 49, 53),
(239, 4, 49, 54),
(240, 4, 49, 55),
(241, 4, 49, 56),
(242, 4, 49, 57),
(243, 4, 49, 58),
(244, 4, 49, 59),
(245, 4, 49, 60),
(246, 4, 49, 61),
(247, 4, 49, 62),
(248, 4, 49, 63),
(249, 4, 49, 64),
(250, 4, 49, 65),
(251, 4, 49, 66),
(252, 4, 49, 67),
(253, 4, 49, 68),
(254, 4, 49, 69),
(255, 4, 49, 70),
(256, 4, 50, 51),
(257, 4, 50, 52),
(258, 4, 50, 53),
(259, 4, 50, 54),
(260, 4, 50, 55),
(261, 4, 50, 56),
(262, 4, 50, 57),
(263, 4, 50, 58),
(264, 4, 50, 59),
(265, 4, 50, 60),
(266, 4, 50, 61),
(267, 4, 50, 62),
(268, 4, 50, 63),
(269, 4, 50, 64),
(270, 4, 50, 65),
(271, 4, 50, 66),
(272, 4, 50, 67),
(273, 4, 50, 68),
(274, 4, 50, 69),
(275, 4, 50, 70),
(276, 4, 51, 52),
(277, 4, 51, 53),
(278, 4, 51, 54),
(279, 4, 51, 55),
(280, 4, 51, 56),
(281, 4, 51, 57),
(282, 4, 51, 58),
(283, 4, 51, 59),
(284, 4, 51, 60),
(285, 4, 51, 61),
(286, 4, 51, 62),
(287, 4, 51, 63),
(288, 4, 51, 64),
(289, 4, 51, 65),
(290, 4, 51, 66),
(291, 4, 51, 67),
(292, 4, 51, 68),
(293, 4, 51, 69),
(294, 4, 51, 70),
(295, 4, 52, 53),
(296, 4, 52, 54),
(297, 4, 52, 55),
(298, 4, 52, 56),
(299, 4, 52, 57),
(300, 4, 52, 58),
(301, 4, 52, 59),
(302, 4, 52, 60),
(303, 4, 52, 61),
(304, 4, 52, 62),
(305, 4, 52, 63),
(306, 4, 52, 64),
(307, 4, 52, 65),
(308, 4, 52, 66),
(309, 4, 52, 67),
(310, 4, 52, 68),
(311, 4, 52, 69),
(312, 4, 52, 70),
(313, 4, 53, 54),
(314, 4, 53, 55),
(315, 4, 53, 56),
(316, 4, 53, 57),
(317, 4, 53, 58),
(318, 4, 53, 59),
(319, 4, 53, 60),
(320, 4, 53, 61),
(321, 4, 53, 62),
(322, 4, 53, 63),
(323, 4, 53, 64),
(324, 4, 53, 65),
(325, 4, 53, 66),
(326, 4, 53, 67),
(327, 4, 53, 68),
(328, 4, 53, 69),
(329, 4, 53, 70),
(330, 4, 54, 55),
(331, 4, 54, 56),
(332, 4, 54, 57),
(333, 4, 54, 58),
(334, 4, 54, 59),
(335, 4, 54, 60),
(336, 4, 54, 61),
(337, 4, 54, 62),
(338, 4, 54, 63),
(339, 4, 54, 64),
(340, 4, 54, 65),
(341, 4, 54, 66),
(342, 4, 54, 67),
(343, 4, 54, 68),
(344, 4, 54, 69),
(345, 4, 54, 70),
(346, 4, 55, 56),
(347, 4, 55, 57),
(348, 4, 55, 58),
(349, 4, 55, 59),
(350, 4, 55, 60),
(351, 4, 55, 61),
(352, 4, 55, 62),
(353, 4, 55, 63),
(354, 4, 55, 64),
(355, 4, 55, 65),
(356, 4, 55, 66),
(357, 4, 55, 67),
(358, 4, 55, 68),
(359, 4, 55, 69),
(360, 4, 55, 70),
(361, 4, 56, 57),
(362, 4, 56, 58),
(363, 4, 56, 59),
(364, 4, 56, 60),
(365, 4, 56, 61),
(366, 4, 56, 62),
(367, 4, 56, 63),
(368, 4, 56, 64),
(369, 4, 56, 65),
(370, 4, 56, 66),
(371, 4, 56, 67),
(372, 4, 56, 68),
(373, 4, 56, 69),
(374, 4, 56, 70),
(375, 4, 57, 58),
(376, 4, 57, 59),
(377, 4, 57, 60),
(378, 4, 57, 61),
(379, 4, 57, 62),
(380, 4, 57, 63),
(381, 4, 57, 64),
(382, 4, 57, 65),
(383, 4, 57, 66),
(384, 4, 57, 67),
(385, 4, 57, 68),
(386, 4, 57, 69),
(387, 4, 57, 70),
(388, 4, 58, 59),
(389, 4, 58, 60),
(390, 4, 58, 61),
(391, 4, 58, 62),
(392, 4, 58, 63),
(393, 4, 58, 64),
(394, 4, 58, 65),
(395, 4, 58, 66),
(396, 4, 58, 67),
(397, 4, 58, 68),
(398, 4, 58, 69),
(399, 4, 58, 70),
(400, 4, 59, 60),
(401, 4, 59, 61),
(402, 4, 59, 62),
(403, 4, 59, 63),
(404, 4, 59, 64),
(405, 4, 59, 65),
(406, 4, 59, 66),
(407, 4, 59, 67),
(408, 4, 59, 68),
(409, 4, 59, 69),
(410, 4, 59, 70),
(411, 4, 60, 61),
(412, 4, 60, 62),
(413, 4, 60, 63),
(414, 4, 60, 64),
(415, 4, 60, 65),
(416, 4, 60, 66),
(417, 4, 60, 67),
(418, 4, 60, 68),
(419, 4, 60, 69),
(420, 4, 60, 70),
(421, 4, 61, 62),
(422, 4, 61, 63),
(423, 4, 61, 64),
(424, 4, 61, 65),
(425, 4, 61, 66),
(426, 4, 61, 67),
(427, 4, 61, 68),
(428, 4, 61, 69),
(429, 4, 61, 70),
(430, 4, 62, 63),
(431, 4, 62, 64),
(432, 4, 62, 65),
(433, 4, 62, 66),
(434, 4, 62, 67),
(435, 4, 62, 68),
(436, 4, 62, 69),
(437, 4, 62, 70),
(438, 4, 63, 64),
(439, 4, 63, 65),
(440, 4, 63, 66),
(441, 4, 63, 67),
(442, 4, 63, 68),
(443, 4, 63, 69),
(444, 4, 63, 70),
(445, 4, 64, 65),
(446, 4, 64, 66),
(447, 4, 64, 67),
(448, 4, 64, 68),
(449, 4, 64, 69),
(450, 4, 64, 70),
(451, 4, 65, 66),
(452, 4, 65, 67),
(453, 4, 65, 68),
(454, 4, 65, 69),
(455, 4, 65, 70),
(456, 4, 66, 67),
(457, 4, 66, 68),
(458, 4, 66, 69),
(459, 4, 66, 70),
(460, 4, 67, 68),
(461, 4, 67, 69),
(462, 4, 67, 70),
(463, 4, 68, 69),
(464, 4, 68, 70),
(465, 4, 69, 70);

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
(8, 1, 1, 0, 1, 1),
(9, 1, 1, 1, 0, 3),
(10, 1, 0, 0, 0, 0),
(11, 1, 0, 0, 0, 0),
(12, 1, 0, 0, 0, 0),
(13, 1, 0, 0, 0, 0),
(14, 1, 0, 0, 0, 0),
(15, 1, 0, 0, 0, 0),
(16, 1, 0, 0, 0, 0),
(17, 1, 0, 0, 0, 0),
(29, 3, 2, 1, 1, 4),
(30, 3, 1, 0, 1, 1),
(31, 3, 1, 1, 0, 3),
(32, 3, 0, 0, 0, 0),
(33, 3, 0, 0, 0, 0),
(34, 3, 0, 0, 0, 0),
(35, 3, 0, 0, 0, 0),
(36, 3, 0, 0, 0, 0),
(37, 3, 0, 0, 0, 0),
(38, 5, 0, 0, 0, 0),
(39, 6, 0, 0, 0, 0),
(40, 4, 0, 0, 0, 0),
(41, 4, 0, 0, 0, 0),
(42, 4, 0, 0, 0, 0),
(43, 4, 0, 0, 0, 0),
(44, 4, 0, 0, 0, 0),
(45, 4, 0, 0, 0, 0),
(46, 4, 0, 0, 0, 0),
(47, 4, 0, 0, 0, 0),
(48, 4, 0, 0, 0, 0),
(49, 4, 0, 0, 0, 0),
(50, 4, 0, 0, 0, 0),
(51, 4, 0, 0, 0, 0),
(52, 4, 0, 0, 0, 0),
(53, 4, 0, 0, 0, 0),
(54, 4, 0, 0, 0, 0),
(55, 4, 0, 0, 0, 0),
(56, 4, 0, 0, 0, 0),
(57, 4, 0, 0, 0, 0),
(58, 4, 0, 0, 0, 0),
(59, 4, 0, 0, 0, 0),
(60, 4, 0, 0, 0, 0),
(61, 4, 0, 0, 0, 0),
(62, 4, 0, 0, 0, 0),
(63, 4, 0, 0, 0, 0),
(64, 4, 0, 0, 0, 0),
(65, 4, 0, 0, 0, 0),
(66, 4, 0, 0, 0, 0),
(67, 4, 0, 0, 0, 0),
(68, 4, 0, 0, 0, 0),
(69, 4, 0, 0, 0, 0),
(70, 4, 0, 0, 0, 0);

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
(72, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(263, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(268, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(342, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(346, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(349, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(350, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(351, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(352, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(353, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(354, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(355, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(357, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(358, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(360, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(361, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(362, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(363, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(364, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(365, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(366, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(367, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(368, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(369, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(370, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(371, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(372, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(373, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(374, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(375, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(376, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(377, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(378, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(379, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(380, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(381, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(382, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(383, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(384, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(385, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(386, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(387, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(388, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(389, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(390, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(391, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(392, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(393, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(394, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(396, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(398, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(399, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(400, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(401, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(402, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(403, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(404, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(405, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(406, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(407, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(408, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(409, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(410, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(411, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(412, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(414, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(415, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(416, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(417, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(418, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(419, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(420, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(421, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(422, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(423, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(424, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(425, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(426, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(427, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(428, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(429, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(430, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(431, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(432, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(433, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(434, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(435, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(436, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(437, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(438, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(439, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(440, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(441, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(442, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(443, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(444, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(445, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(446, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(447, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(448, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(449, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(450, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(451, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(452, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(453, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(454, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(455, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(456, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(457, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(458, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(459, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(460, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(461, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(462, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(463, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(464, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(465, '0000-00-00', '00:00:00', 'Grupos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(55, '2019-10-22', '17:00:00', 'ana', NULL, 'NO');

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
(55, 'alfredo'),
(55, 'ana'),
(55, 'olista'),
(55, 'ypgarcia');

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
  ADD PRIMARY KEY (`ID_Pareja`,`grupo`);

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
  MODIFY `ID_Pareja` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_Partido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
