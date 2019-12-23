-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2019 a las 14:13:38
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
(23, 'guardiola', 10, 'ESCUELAS', 'Mejora en el saque', '', '2019-11-29', '15:30:00', 1),
(24, 'sisu', 11, 'ESCUELAS', 'Mejora en el reves', '', '2019-12-01', '21:30:00', 1),
(27, 'guardiola', 3, 'ESCUELAS', 'Entender a tu compañero', '', '2019-11-27', '15:30:00', 1),
(28, 'mourinho', 5, 'ESCUELAS', 'Posicionamiento', '', '2019-12-27', '15:30:00', 2),
(36, 'mourinho', 10, 'CLINICS', 'Dejadas', 'Juan Lebron', '2019-12-27', '17:00:00', 1),
(38, 'guardiola', 5, 'ESCUELAS', 'sdfg', '', '2020-01-03', '18:30:00', 1);

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
  `dia10` int(5) NOT NULL,
  `pago` varchar(15) NOT NULL,
  `CCV` int(3) DEFAULT NULL,
  `num_tarjeta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_grupales_has_usuarios`
--

INSERT INTO `clases_grupales_has_usuarios` (`ID_Clase`, `login_usuario`, `dia1`, `dia2`, `dia3`, `dia4`, `dia5`, `dia6`, `dia7`, `dia8`, `dia9`, `dia10`, `pago`, `CCV`, `num_tarjeta`) VALUES
(23, 'anabarreiro', 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 'Paypal', NULL, NULL),
(23, 'carmenformoso', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(23, 'davidmiguez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(23, 'jesusiglesias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(23, 'jorgepuertas', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'Paypal', NULL, NULL),
(23, 'olista', 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(23, 'ritaconde', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(23, 'rosinafdez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(23, 'xianagolpe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(23, 'ypgarcia', 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 'Tarjeta', 123, '1234567890123456'),
(24, 'adrianblanco', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', 123, '11111111111111111111111111'),
(24, 'carlossiota', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', 567, '1234567890098765'),
(24, 'olista', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(24, 'xianagolpe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(24, 'ypgarcia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(27, 'davidmiguez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Paypal', NULL, NULL),
(28, 'davidmiguez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Paypal', NULL, NULL),
(28, 'xianagolpe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(28, 'ypgarcia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(32, 'adrianblanco', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(32, 'jfperez', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(32, 'olista', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(32, 'ritaconde', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(32, 'xacoboiglesias', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(32, 'ypgarcia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Paypal', NULL, NULL),
(35, 'ypgarcia', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(36, 'carlossiota', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(36, 'olista', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(36, 'ritaconde', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Tarjeta', 111, '9998887776665554'),
(36, 'xianagolpe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Tarjeta', 123, '1234567890123456'),
(36, 'ypgarcia', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL);

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
  `ID_Pista` tinyint(5) NOT NULL,
  `borrado` varchar(2) NOT NULL,
  `pago` varchar(15) NOT NULL,
  `CCV` int(3) DEFAULT NULL,
  `num_tarjeta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_particulares`
--

INSERT INTO `clases_particulares` (`ID_Clase`, `login_usuario`, `login_entrenador`, `fecha_clase`, `hora_clase`, `ID_Pista`, `borrado`, `pago`, `CCV`, `num_tarjeta`) VALUES
(41, 'xianagolpe', 'guardiola', '2019-12-26', '08:00:00', 1, '', 'Tarjeta', 123, '1234567890123456'),
(43, 'fabioroson', 'guardiola', '2019-12-24', '20:00:00', 6, '', 'Contrareembloso', NULL, NULL),
(44, 'ypgarcia', 'guardiola', '2019-12-31', '17:00:00', 7, 'SI', 'Tarjeta', 123, '1234567890123456'),
(45, 'rosinafdez', 'mourinho', '2019-12-26', '12:30:00', 5, 'SI', 'Paypal', NULL, NULL),
(47, 'xianagolpe', 'mourinho', '2019-12-31', '08:00:00', 1, '', 'Contrareembolso', NULL, NULL),
(48, 'ypgarcia', 'mourinho', '2019-12-24', '09:30:00', 5, '', 'Tarjeta', 123, '1234567890123456'),
(49, 'ypgarcia', 'sisu', '2019-12-24', '14:00:00', 1, '', 'Contrareembolso', NULL, NULL);

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
(185, 'esthermontecelo', 'lucianespereira'),
(186, 'xianagolpe', 'rociofernandez'),
(187, 'olallardgez', 'mariaboveda'),
(188, 'ritaconde', 'noemiquesada'),
(189, 'anabarreiro', 'carmenformoso'),
(190, 'rosinafdez', 'celiarodriguez'),
(191, 'pilarlado', 'taniafernandez'),
(192, 'dianacasanova', 'isabelmata'),
(193, 'mariapumar', 'pazbalboa'),
(203, 'manuelangel', 'alvarocardero'),
(204, 'luisviejo', 'diegojorreto'),
(205, 'jorgepuertas', 'cristoffpereira'),
(206, 'juansoler', 'joseantonio'),
(207, 'alfredocasas', 'juanllano'),
(208, 'juancorral', 'guillermomtnez'),
(209, 'javierlorenzo', 'mariohernandez'),
(210, 'albertordgz', 'luiscarmona'),
(211, 'juancarlos', 'diegoportela'),
(212, 'joseluis', 'teofilomartin'),
(213, 'luiscaride', 'oscarfernadez'),
(214, 'jorgesabucedo', 'pacobarrio'),
(215, 'abelardoglez', 'linogonzalez'),
(216, 'carlosperez', 'arturolopez'),
(217, 'oscardominguez', 'carlosconde'),
(218, 'jesusiglesias', 'josemaria'),
(219, 'diegocurras', 'jaimesalgado'),
(220, 'fabioroson', 'rubengonzalez'),
(221, 'adrianblanco', 'davidmiguez'),
(222, 'marcoscudeiro', 'jordigonzalez'),
(223, 'alexandrefdez', 'angelmonteagudo'),
(224, 'xacoboiglesias', 'carlosguede'),
(225, 'carlossiota', 'jantoniooute'),
(226, 'adrianantolinez', 'davidmanuel'),
(227, 'danielceballos', 'alfonsoroman'),
(228, 'robertotato', 'felixperez'),
(229, 'pedrocuesta', 'ivanvalcarcel'),
(230, 'ypgarcia', 'anabarreiro'),
(231, 'ypgarcia', 'anabarreiro'),
(232, 'ypgarcia', 'anabarreiro'),
(233, 'ypgarcia', 'anabarreiro'),
(234, 'olista', 'carmenformoso'),
(235, 'jfperez', 'celiarodriguez'),
(238, 'ypgarcia', 'anabarreiro'),
(239, 'olista', 'carmenformoso'),
(240, 'jfperez', 'celiarodriguez'),
(242, 'ritaconde', 'abelardoglez'),
(243, 'xianagolpe', 'adrianantolinez');

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
(185, 0, 21),
(186, 0, 21),
(187, 0, 21),
(188, 0, 21),
(189, 0, 21),
(190, 0, 21),
(191, 0, 21),
(192, 0, 21),
(193, 0, 21),
(203, 0, 1),
(204, 0, 1),
(205, 0, 1),
(206, 0, 1),
(207, 0, 1),
(208, 0, 1),
(209, 0, 1),
(210, 0, 1),
(211, 0, 1),
(212, 1, 1),
(213, 1, 1),
(214, 1, 1),
(215, 1, 1),
(216, 1, 1),
(217, 1, 1),
(218, 1, 1),
(219, 1, 1),
(220, 1, 1),
(221, 2, 1),
(222, 2, 1),
(223, 2, 1),
(224, 2, 1),
(225, 2, 1),
(226, 2, 1),
(227, 2, 1),
(228, 2, 1),
(229, 2, 1);

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
(416, 21, 185, 186),
(417, 21, 185, 187),
(418, 21, 185, 188),
(419, 21, 185, 189),
(420, 21, 185, 190),
(421, 21, 185, 191),
(422, 21, 185, 192),
(423, 21, 185, 193),
(424, 21, 186, 187),
(425, 21, 186, 188),
(426, 21, 186, 189),
(427, 21, 186, 190),
(428, 21, 186, 191),
(429, 21, 186, 192),
(430, 21, 186, 193),
(431, 21, 187, 188),
(432, 21, 187, 189),
(433, 21, 187, 190),
(434, 21, 187, 191),
(435, 21, 187, 192),
(436, 21, 187, 193),
(437, 21, 188, 189),
(438, 21, 188, 190),
(439, 21, 188, 191),
(440, 21, 188, 192),
(441, 21, 188, 193),
(442, 21, 189, 190),
(443, 21, 189, 191),
(444, 21, 189, 192),
(445, 21, 189, 193),
(446, 21, 190, 191),
(447, 21, 190, 192),
(448, 21, 190, 193),
(449, 21, 191, 192),
(450, 21, 191, 193),
(451, 21, 192, 193),
(452, 21, 191, 185),
(453, 21, 192, 193),
(454, 21, 191, 185),
(455, 21, 192, 193),
(456, 21, 191, 185),
(457, 21, 192, 193),
(458, 21, 191, 185),
(459, 21, 192, 193),
(460, 21, 191, 185),
(461, 21, 192, 193),
(462, 21, 191, 185),
(463, 21, 192, 193),
(464, 21, 189, 193),
(465, 21, 185, 190),
(466, 21, 187, 192),
(467, 21, 188, 186),
(468, 21, 191, 185),
(469, 21, 192, 193),
(470, 21, 189, 193),
(471, 21, 185, 190),
(472, 21, 187, 192),
(473, 21, 188, 186),
(474, 21, 190, 193),
(475, 21, 191, 192),
(476, 21, 189, 193),
(477, 21, 185, 190),
(478, 21, 187, 192),
(479, 21, 188, 186),
(480, 21, 190, 191),
(481, 21, 189, 193),
(482, 21, 185, 190),
(483, 21, 187, 192),
(484, 21, 188, 186),
(485, 21, 190, 189),
(486, 21, 186, 187),
(487, 21, 190, 189),
(488, 21, 186, 187),
(489, 21, 190, 189),
(490, 21, 186, 187),
(491, 21, 190, 189),
(492, 21, 186, 187),
(493, 21, 190, 186),
(494, 21, 189, 193),
(495, 21, 185, 190),
(496, 21, 187, 192),
(497, 21, 188, 186),
(498, 21, 185, 189),
(499, 21, 187, 188),
(500, 21, 185, 186),
(501, 21, 185, 189),
(502, 21, 187, 188),
(503, 21, 185, 187),
(630, 1, 203, 204),
(631, 1, 203, 205),
(632, 1, 203, 206),
(633, 1, 203, 207),
(634, 1, 203, 208),
(635, 1, 203, 209),
(636, 1, 203, 210),
(637, 1, 203, 211),
(638, 1, 204, 205),
(639, 1, 204, 206),
(640, 1, 204, 207),
(641, 1, 204, 208),
(642, 1, 204, 209),
(643, 1, 204, 210),
(644, 1, 204, 211),
(645, 1, 205, 206),
(646, 1, 205, 207),
(647, 1, 205, 208),
(648, 1, 205, 209),
(649, 1, 205, 210),
(650, 1, 205, 211),
(651, 1, 206, 207),
(652, 1, 206, 208),
(653, 1, 206, 209),
(654, 1, 206, 210),
(655, 1, 206, 211),
(656, 1, 207, 208),
(657, 1, 207, 209),
(658, 1, 207, 210),
(659, 1, 207, 211),
(660, 1, 208, 209),
(661, 1, 208, 210),
(662, 1, 208, 211),
(663, 1, 209, 210),
(664, 1, 209, 211),
(665, 1, 210, 211),
(666, 1, 212, 213),
(667, 1, 212, 214),
(668, 1, 212, 215),
(669, 1, 212, 216),
(670, 1, 212, 217),
(671, 1, 212, 218),
(672, 1, 212, 219),
(673, 1, 212, 220),
(674, 1, 213, 214),
(675, 1, 213, 215),
(676, 1, 213, 216),
(677, 1, 213, 217),
(678, 1, 213, 218),
(679, 1, 213, 219),
(680, 1, 213, 220),
(681, 1, 214, 215),
(682, 1, 214, 216),
(683, 1, 214, 217),
(684, 1, 214, 218),
(685, 1, 214, 219),
(686, 1, 214, 220),
(687, 1, 215, 216),
(688, 1, 215, 217),
(689, 1, 215, 218),
(690, 1, 215, 219),
(691, 1, 215, 220),
(692, 1, 216, 217),
(693, 1, 216, 218),
(694, 1, 216, 219),
(695, 1, 216, 220),
(696, 1, 217, 218),
(697, 1, 217, 219),
(698, 1, 217, 220),
(699, 1, 218, 219),
(700, 1, 218, 220),
(701, 1, 219, 220),
(702, 1, 221, 222),
(703, 1, 221, 223),
(704, 1, 221, 224),
(705, 1, 221, 225),
(706, 1, 221, 226),
(707, 1, 221, 227),
(708, 1, 221, 228),
(709, 1, 221, 229),
(710, 1, 222, 223),
(711, 1, 222, 224),
(712, 1, 222, 225),
(713, 1, 222, 226),
(714, 1, 222, 227),
(715, 1, 222, 228),
(716, 1, 222, 229),
(717, 1, 223, 224),
(718, 1, 223, 225),
(719, 1, 223, 226),
(720, 1, 223, 227),
(721, 1, 223, 228),
(722, 1, 223, 229),
(723, 1, 224, 225),
(724, 1, 224, 226),
(725, 1, 224, 227),
(726, 1, 224, 228),
(727, 1, 224, 229),
(728, 1, 225, 226),
(729, 1, 225, 227),
(730, 1, 225, 228),
(731, 1, 225, 229),
(732, 1, 226, 227),
(733, 1, 226, 228),
(734, 1, 226, 229),
(735, 1, 227, 228),
(736, 1, 227, 229),
(737, 1, 228, 229),
(738, 1, 203, 210),
(739, 1, 204, 209),
(740, 1, 205, 208),
(741, 1, 206, 207),
(742, 1, 212, 218),
(743, 1, 220, 217),
(744, 1, 213, 216),
(745, 1, 214, 215),
(746, 1, 221, 227),
(747, 1, 229, 226),
(748, 1, 222, 225),
(749, 1, 223, 224),
(750, 1, 203, 210),
(751, 1, 204, 209),
(752, 1, 205, 208),
(753, 1, 206, 207),
(754, 1, 212, 219),
(755, 1, 213, 218),
(756, 1, 214, 217),
(757, 1, 215, 216),
(758, 1, 221, 228),
(759, 1, 222, 227),
(760, 1, 223, 226),
(761, 1, 224, 225),
(762, 1, 207, 210),
(763, 1, 208, 209),
(764, 1, 212, 215),
(765, 1, 213, 214),
(766, 1, 224, 222),
(767, 1, 225, 221),
(768, 1, 211, 205),
(769, 1, 203, 204),
(770, 1, 216, 219),
(771, 1, 217, 218),
(772, 1, 224, 227),
(773, 1, 225, 226),
(774, 1, 211, 205),
(775, 1, 203, 204),
(776, 1, 216, 219),
(777, 1, 217, 218),
(778, 1, 224, 227),
(779, 1, 225, 226),
(780, 1, 211, 205),
(781, 1, 203, 204),
(782, 1, 216, 219),
(783, 1, 217, 218),
(784, 1, 224, 227),
(785, 1, 225, 226),
(786, 1, 208, 211),
(787, 1, 209, 210),
(788, 1, 213, 216),
(789, 1, 214, 215),
(790, 1, 224, 223),
(791, 1, 225, 222),
(792, 1, 208, 211),
(793, 1, 209, 210),
(794, 1, 213, 216),
(795, 1, 214, 215),
(796, 1, 224, 223),
(797, 1, 225, 222),
(798, 1, 208, 211),
(799, 1, 209, 210),
(800, 1, 213, 216),
(801, 1, 214, 215),
(802, 1, 224, 223),
(803, 1, 225, 222),
(804, 1, 203, 206),
(805, 1, 204, 205),
(806, 1, 213, 212),
(807, 1, 214, 215),
(808, 1, 222, 221),
(809, 1, 223, 224),
(810, 1, 203, 204),
(811, 1, 213, 214),
(812, 1, 222, 223),
(813, 1, 203, 213),
(814, 1, 203, 213),
(815, 1, 203, 222),
(816, 1, 213, 222),
(817, 1, 203, 213),
(818, 1, 203, 213),
(819, 1, 203, 222),
(820, 1, 213, 222),
(821, 1, 203, 213),
(822, 1, 203, 213),
(823, 1, 203, 222),
(824, 1, 213, 222),
(825, 1, 203, 213),
(826, 1, 203, 213),
(827, 1, 203, 222),
(828, 1, 213, 222),
(829, 1, 203, 213),
(830, 1, 203, 222),
(831, 1, 213, 222);

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
  `JC` int(5) NOT NULL,
  `PtosCuartos` int(3) NOT NULL,
  `PtosSemis` int(3) NOT NULL,
  `PtosFinal` int(3) NOT NULL,
  `PtosSuperFinal` int(3) NOT NULL,
  `PJ_SF` int(3) NOT NULL,
  `PG_SF` int(3) NOT NULL,
  `PP_SF` int(3) NOT NULL,
  `SF_SF` int(3) NOT NULL,
  `SC_SF` int(3) NOT NULL,
  `JF_SF` int(3) NOT NULL,
  `JC_SF` int(3) NOT NULL,
  `pago` varchar(15) NOT NULL,
  `CCV` int(3) DEFAULT NULL,
  `num_tarjeta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_has_torneos`
--

INSERT INTO `parejas_has_torneos` (`parejas_ID_Pareja`, `torneos_ID_Torneo`, `PJ`, `PG`, `PP`, `Ptos`, `SF`, `SC`, `JF`, `JC`, `PtosCuartos`, `PtosSemis`, `PtosFinal`, `PtosSuperFinal`, `PJ_SF`, `PG_SF`, `PP_SF`, `SF_SF`, `SC_SF`, `JF_SF`, `JC_SF`, `pago`, `CCV`, `num_tarjeta`) VALUES
(185, 21, 8, 6, 2, 20, 13, 7, 108, 87, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(186, 21, 8, 4, 4, 16, 10, 9, 97, 92, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(187, 21, 8, 5, 3, 18, 11, 9, 103, 84, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(188, 21, 8, 4, 4, 16, 11, 9, 95, 91, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(189, 21, 8, 7, 1, 22, 14, 6, 116, 85, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(190, 21, 8, 3, 5, 14, 9, 10, 94, 95, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(191, 21, 8, 1, 7, 10, 4, 15, 60, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(192, 21, 8, 4, 4, 16, 8, 10, 83, 95, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(193, 21, 8, 2, 6, 12, 9, 14, 101, 121, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(203, 1, 8, 8, 0, 24, 16, 8, 104, 64, 3, 3, 3, 4, 2, 1, 1, 3, 3, 30, 27, '', NULL, NULL),
(204, 1, 8, 7, 1, 22, 15, 9, 99, 69, 3, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(205, 1, 8, 6, 2, 20, 14, 10, 94, 74, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(206, 1, 8, 5, 3, 18, 13, 11, 89, 79, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(207, 1, 8, 4, 4, 16, 12, 12, 84, 84, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(208, 1, 8, 3, 5, 14, 11, 13, 79, 89, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(209, 1, 8, 2, 6, 12, 10, 14, 74, 94, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(210, 1, 8, 1, 7, 10, 9, 15, 69, 99, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(211, 1, 8, 0, 8, 8, 8, 16, 64, 104, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(212, 1, 8, 8, 0, 24, 16, 8, 104, 64, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(213, 1, 8, 7, 1, 22, 15, 9, 99, 69, 3, 3, 3, 4, 2, 1, 1, 3, 3, 29, 30, '', NULL, NULL),
(214, 1, 8, 6, 2, 20, 14, 10, 94, 74, 3, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(215, 1, 8, 5, 3, 18, 13, 11, 89, 79, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(216, 1, 8, 4, 4, 16, 12, 12, 84, 84, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(217, 1, 8, 3, 5, 14, 11, 13, 79, 89, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(218, 1, 8, 2, 6, 12, 10, 14, 74, 94, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(219, 1, 8, 1, 7, 10, 9, 15, 69, 99, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(220, 1, 8, 0, 8, 8, 8, 16, 64, 104, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(221, 1, 8, 8, 0, 24, 16, 8, 104, 64, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(222, 1, 8, 7, 1, 22, 15, 9, 99, 69, 3, 3, 3, 4, 2, 1, 1, 3, 3, 26, 28, '', NULL, NULL),
(223, 1, 8, 6, 2, 20, 14, 10, 94, 74, 3, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(224, 1, 8, 5, 3, 18, 13, 11, 89, 79, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(225, 1, 8, 4, 4, 16, 12, 12, 84, 84, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(226, 1, 8, 3, 5, 14, 11, 13, 79, 89, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(227, 1, 8, 2, 6, 12, 10, 14, 74, 94, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(228, 1, 8, 1, 7, 10, 9, 15, 69, 99, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(229, 1, 8, 0, 8, 8, 8, 16, 64, 104, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL),
(233, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(234, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(235, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Tarjeta', 222, '22222222222222222222222'),
(238, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Tarjeta', 123, '1234567890098765'),
(239, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Paypal', NULL, NULL),
(240, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(242, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL),
(243, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Contrareembolso', NULL, NULL);

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
(416, '2019-12-24', '21:30:00', 'Grupos', 1, 2, 1, 6, 1, 3, 6, 6, 4),
(417, '2020-01-10', '21:30:00', 'Grupos', 5, 1, 2, 6, 4, 4, 6, 4, 6),
(418, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 1, 6, 3, 0, 0),
(419, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 7, 5, 7, 6, 0, 0),
(420, '2020-01-10', '21:30:00', 'Grupos', 5, 0, 2, 4, 6, 4, 6, 0, 0),
(421, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 4, 6, 6, 3, 6, 3),
(422, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 3, 6, 3, 0, 0),
(423, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 4, 4, 6, 7, 5),
(424, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 3, 7, 5, 0, 0),
(425, '2020-01-10', '21:30:00', 'Grupos', 5, 0, 2, 4, 6, 3, 6, 0, 0),
(426, '2020-01-10', '21:30:00', 'Grupos', 5, 1, 2, 5, 7, 7, 6, 3, 6),
(427, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 4, 7, 5, 0, 0),
(428, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 1, 6, 1, 0, 0),
(429, '2020-01-10', '21:30:00', 'Grupos', 5, 0, 2, 5, 7, 4, 6, 0, 0),
(430, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 4, 5, 7, 6, 3),
(431, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 3, 3, 6, 6, 2),
(432, '2020-01-10', '21:30:00', 'Grupos', 5, 0, 2, 4, 6, 4, 6, 0, 0),
(433, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 4, 6, 7, 5, 6, 1),
(434, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 0, 6, 0, 0, 0),
(435, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 1, 7, 5, 0, 0),
(436, '2020-01-10', '21:30:00', 'Grupos', 5, 1, 2, 5, 7, 6, 3, 3, 6),
(437, '2020-01-10', '21:30:00', 'Grupos', 5, 1, 2, 4, 6, 6, 3, 3, 6),
(438, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 1, 6, 4, 0, 0),
(439, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 7, 5, 7, 6, 0, 0),
(440, '2020-01-10', '21:30:00', 'Grupos', 5, 1, 2, 4, 6, 6, 4, 3, 6),
(441, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 4, 6, 6, 3),
(442, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 7, 5, 6, 7, 7, 6),
(443, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 0, 6, 0, 0, 0),
(444, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 4, 6, 3, 0, 0),
(445, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 3, 3, 6, 6, 1),
(446, '2020-01-10', '21:30:00', 'Grupos', 5, 1, 2, 4, 6, 6, 3, 3, 6),
(447, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 1, 7, 5, 0, 0),
(448, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 0, 6, 1, 6, 3, 0, 0),
(449, '2020-01-10', '21:30:00', 'Grupos', 5, 0, 2, 4, 6, 3, 6, 0, 0),
(450, '2020-01-10', '21:30:00', 'Grupos', 5, 1, 2, 3, 6, 6, 4, 4, 6),
(451, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 4, 4, 6, 7, 6),
(494, '2020-01-10', '21:30:00', 'Cuartos', 5, 2, 0, 6, 1, 6, 1, 0, 0),
(495, '2020-01-10', '21:30:00', 'Cuartos', 5, 2, 0, 6, 2, 6, 3, 0, 0),
(496, '2020-01-10', '21:30:00', 'Cuartos', 5, 2, 0, 6, 1, 6, 4, 0, 0),
(497, '2020-01-10', '21:30:00', 'Cuartos', 5, 2, 0, 6, 2, 6, 3, 0, 0),
(501, '2020-01-10', '08:00:00', 'Semis', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(502, '2020-01-11', '11:00:00', 'Semis', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(503, '2020-01-12', '12:30:00', 'Final', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(630, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(631, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(632, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(633, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(634, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(635, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(636, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(637, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(638, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(639, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(640, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(641, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(642, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(643, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(644, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(645, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(646, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(647, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(648, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(649, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(650, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(651, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(652, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(653, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(654, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(655, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(656, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(657, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(658, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(659, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(660, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(661, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(662, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(663, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(664, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(665, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(666, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(667, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(668, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(669, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(670, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(671, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(672, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(673, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(674, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(675, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(676, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(677, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(678, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(679, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(680, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(681, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(682, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(683, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(684, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(685, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(686, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(687, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(688, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(689, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(690, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(691, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(692, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(693, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(694, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(695, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(696, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(697, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(698, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(699, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(700, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(701, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(702, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(703, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(704, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(705, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(706, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(707, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(708, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(709, '2020-01-13', '15:00:00', 'Grupos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(710, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(711, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(712, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(713, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(714, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(715, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(716, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(717, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(718, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(719, '2020-01-10', '08:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(720, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(721, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(722, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(723, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(724, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(725, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(726, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(727, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(728, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(729, '2020-01-11', '11:00:00', 'Grupos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(730, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(731, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(732, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(733, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(734, '2020-01-10', '21:30:00', 'Grupos', 5, 2, 1, 6, 1, 1, 6, 6, 1),
(735, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(736, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(737, '2020-01-12', '12:30:00', 'Grupos', 2, 2, 1, 6, 1, 1, 6, 6, 1),
(750, '2020-01-13', '15:00:00', 'Cuartos', 6, 2, 1, 6, 1, 1, 6, 6, 1),
(751, '2020-01-10', '08:00:00', 'Cuartos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(752, '2020-01-11', '11:00:00', 'Cuartos', 1, 2, 1, 6, 1, 1, 6, 6, 1),
(753, '2020-01-12', '12:30:00', 'Cuartos', 2, 2, 0, 6, 1, 7, 5, 0, 0),
(754, '2020-01-10', '21:30:00', 'Cuartos', 5, 2, 0, 6, 1, 6, 1, 0, 0),
(755, '2020-01-13', '15:00:00', 'Cuartos', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(756, '2020-01-13', '15:00:00', 'Cuartos', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(757, '2020-01-13', '15:00:00', 'Cuartos', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(758, '2020-01-13', '15:00:00', 'Cuartos', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(759, '2020-01-13', '15:00:00', 'Cuartos', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(760, '2020-01-13', '15:00:00', 'Cuartos', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(761, '2020-01-10', '08:00:00', 'Cuartos', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(804, '2020-01-10', '21:30:00', 'Semis', 5, 2, 0, 6, 1, 6, 1, 0, 0),
(805, '2020-01-13', '15:00:00', 'Semis', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(806, '2020-01-13', '15:00:00', 'Semis', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(807, '2020-01-13', '15:00:00', 'Semis', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(808, '2020-01-13', '15:00:00', 'Semis', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(809, '2020-01-13', '15:00:00', 'Semis', 6, 2, 0, 6, 1, 6, 1, 0, 0),
(810, '2020-01-10', '08:00:00', 'Final', 1, 2, 1, 6, 1, 5, 7, 7, 6),
(811, '2020-01-10', '08:00:00', 'Final', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(812, '2020-01-11', '11:00:00', 'Final', 1, 2, 0, 6, 1, 6, 1, 0, 0),
(829, '2020-01-11', '11:00:00', 'Superfinal', 1, 1, 2, 6, 3, 4, 6, 5, 7),
(830, '2020-01-12', '12:30:00', 'Superfinal', 2, 2, 1, 6, 1, 3, 6, 6, 4),
(831, '2020-01-12', '12:30:00', 'Superfinal', 2, 1, 2, 6, 3, 3, 6, 4, 6);

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
  `cerrada` enum('SI','NO') NOT NULL,
  `pago` varchar(15) NOT NULL,
  `CCV` int(3) DEFAULT NULL,
  `num_tarjeta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`ID_Promo`, `fecha`, `hora_inicio`, `usuarios_login_usuario`, `pista_ID_Pista`, `cerrada`, `pago`, `CCV`, `num_tarjeta`) VALUES
(128, '2019-12-24', '08:00:00', 'ritaconde', NULL, 'NO', 'Paypal', NULL, NULL),
(130, '2019-12-26', '17:00:00', 'carmenformoso', NULL, 'NO', 'Contrareembloso', NULL, NULL),
(131, '2019-12-23', '12:30:00', 'robertotato', NULL, 'NO', 'Paypal', NULL, NULL),
(132, '2019-12-24', '08:00:00', 'admin', NULL, 'NO', '', NULL, NULL),
(133, '2020-01-06', '18:30:00', 'admin', NULL, 'NO', '', NULL, NULL),
(134, '2019-12-28', '14:00:00', 'adrianblanco', NULL, 'NO', 'Contrareembloso', NULL, NULL),
(135, '2019-12-30', '11:00:00', 'adrianblanco', NULL, 'NO', 'Tarjeta', 123, '1234567890123456'),
(136, '2019-12-27', '17:00:00', 'olista', NULL, 'NO', 'Tarjeta', 222, '11111111111111111111111111'),
(138, '2019-12-23', '08:00:00', 'xianagolpe', NULL, 'NO', 'Tarjeta', 123, '1234567890123456'),
(139, '2019-12-24', '21:30:00', 'xianagolpe', NULL, 'NO', 'Contrareembolso', NULL, NULL),
(140, '2019-12-24', '08:00:00', 'admin', 8, 'SI', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones_has_usuarios`
--

CREATE TABLE `promociones_has_usuarios` (
  `ID_Promo` int(11) NOT NULL,
  `usuarios_login` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promociones_has_usuarios`
--

INSERT INTO `promociones_has_usuarios` (`ID_Promo`, `usuarios_login`) VALUES
(128, 'carmenformoso'),
(128, 'ritaconde'),
(128, 'xianagolpe'),
(130, 'carmenformoso'),
(131, 'robertotato'),
(132, 'olista'),
(134, 'adrianblanco'),
(134, 'olista'),
(135, 'adrianblanco'),
(136, 'olista'),
(138, 'xianagolpe'),
(139, 'xianagolpe'),
(140, 'olista'),
(140, 'ritaconde'),
(140, 'xianagolpe'),
(140, 'ypgarcia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `usuarios_login` varchar(45) NOT NULL,
  `pista_ID_Pista` tinyint(5) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `pago` varchar(30) NOT NULL,
  `CCV` int(5) DEFAULT NULL,
  `num_tarjeta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`usuarios_login`, `pista_ID_Pista`, `fecha_reserva`, `hora_inicio`, `pago`, `CCV`, `num_tarjeta`) VALUES
('admin', 7, '2019-12-24', '08:00:00', 'Paypal', NULL, NULL),
('alfredocasas', 8, '2019-12-27', '08:00:00', '', NULL, NULL),
('jfperez', 2, '2019-12-24', '08:00:00', 'Paypal', NULL, NULL),
('jorgepuertas', 7, '2019-12-27', '08:00:00', '', NULL, NULL),
('linogonzalez', 1, '2019-12-27', '17:00:00', '', NULL, NULL),
('linogonzalez', 5, '2019-12-27', '08:00:00', '', NULL, NULL),
('lucianespereira', 6, '2019-12-27', '08:00:00', '', NULL, NULL),
('luisa_sevilla', 1, '2019-12-27', '09:30:00', '', NULL, NULL),
('mariaboveda', 1, '2019-12-27', '08:00:00', '', NULL, NULL),
('olista', 1, '2019-12-24', '18:30:00', 'Paypal', NULL, NULL),
('rosinafdez', 1, '2019-12-23', '11:00:00', '', NULL, NULL),
('rosinafdez', 2, '2019-12-27', '08:00:00', '', NULL, NULL),
('xianagolpe', 1, '2019-12-25', '08:00:00', 'Paypal', NULL, NULL),
('xianagolpe', 1, '2019-12-24', '09:30:00', 'Paypal', NULL, NULL),
('xianagolpe', 5, '2019-12-24', '08:00:00', 'Tarjeta', 123, '1234567890123456'),
('xianagolpe', 6, '2019-12-24', '08:00:00', 'Contrareembolso', NULL, NULL),
('ypgarcia', 1, '2019-12-24', '08:00:00', 'Tarjeta', 567, '1234567890098765');

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
(21, 'Ourense Open F', 'Femenina', '2019-12-03', 2020, 1),
(25, 'AAA', 'Mixta', '2019-12-23', 2003, 2);

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
('abelardoglez', 'abelardoglez', '41717337Y', 'Abelardo', 'Gonzalez Villamil', '695435343', 'villamilaberlard@gmail.com', '1969-03-23', 'Masculina', 'NORMAL', 'SI', 'ES66', '21000418401234567891', 14),
('admin', 'admin', '11111111H', 'Admin', 'Adminez Adminez', '676532185', 'admin@admin.es', '1991-05-14', 'Masculina', 'ADMIN', 'NO', '', '', 0),
('adrianantolinez', 'adrianantolinez', '51575699Q', 'Adrian', 'Antolinez Riestra', '647554523', 'mrfarenheit143@yahoo.com', '1980-02-21', 'Masculina', 'NORMAL', 'NO', '', '', 3),
('adrianblanco', 'adrianblanco', '91259143L', 'Adrian', 'Blanco Calvo', '673434324', 'blanquitocalvo@aol.es', '1972-08-22', 'Masculina', 'NORMAL', 'SI', 'DK18', '32005847916555800078', 26),
('albertordgz', 'albertordgz', '16084051J', 'Alberto', 'Rodriguez EspaÃ±a', '983473423', 'arespaÃ±a@esei.uvigo.es', '1998-03-08', 'Masculina', 'NORMAL', 'NO', '', '', -5),
('alejandrocastro', 'alejandrocastro', '44189814Y', 'Alejandro', 'Castro Montero', '673847234', 'acmontero@esei.uvigo.es', '1979-01-04', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('alexandrefdez', 'alexandrefdez', '98790014T', 'Alexandre', 'Fernandez Gallego', '635426347', 'alexitomolon@yahoo.com', '1988-04-20', 'Masculina', 'NORMAL', 'NO', '', '', 21),
('alfonsoroman', 'alfonsoroman', '23882364S', 'Alfonso', 'Roman Romasanta', '674573432', 'romasantaroman@gmail.com', '1965-11-22', 'Masculina', 'NORMAL', 'SI', 'ES82', '50039592929781916551', -1),
('alfredocasas', 'alfredocasas', '99025185L', 'Alfredo', 'Casas Rojas', '988734623', 'alfredhard_occ@aol.es', '2001-01-01', 'Masculina', 'NORMAL', 'NO', '', '', 7),
('alvarocardero', 'alvarocardero', '14408363J', 'Alvaro', 'Cardero Hernandez', '678493213', 'alvaritorito@gmail.com', '1997-11-20', 'Masculina', 'NORMAL', 'NO', '', '', 35),
('anabarreiro', 'anabarreiro', '30104099C', 'Ana', 'Barreiro Sequeiros', '983472822', 'anabarqueiros@hotmail.com', '2000-10-27', 'Femenina', 'NORMAL', 'SI', 'ES60', '78945551900533010001', 22),
('angelmonteagudo', 'angelmonteagudo', '42629771F', 'Angel', 'Monteagudo Leal', '666234237', 'angelmonteleal92@gmail.com', '1992-02-22', 'Masculina', 'NORMAL', 'NO', '', '', 21),
('arturolopez', 'arturolopez', '76578256D', 'Arturo', 'Lopez Rivera', '988374342', 'arturo_arturito@gmail.com', '1978-11-01', 'Masculina', 'NORMAL', 'NO', '', '', 7),
('carlosconde', 'carlosconde', '66882682Q', 'Carlos', 'Conde Trueba', '674835332', 'condetrueba1@uvigo.es', '1974-04-04', 'Masculina', 'NORMAL', 'NO', '', '', 3),
('carlosguede', 'carlosguede', '00849468D', 'Carlos', 'Guede Brown', '983423432', 'carlinhosbrown@yahoo.com', '1996-04-17', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('carlosperez', 'carlosperez', '12383305J', 'Carlos', 'Perez Matias', '666234236', 'carlitosperez@gmail.com', '1987-04-16', 'Masculina', 'NORMAL', 'NO', '', '', 7),
('carlossiota', 'carlossiota', '63892881P', 'Carlos', 'Siota Albino', '674324234', 'alpanpanyalbinvino@gmail.com', '2002-12-31', 'Masculina', 'NORMAL', 'NO', '', '', 7),
('carmenformoso', 'carmenformoso', '48224992H', 'Carmen', 'Formoso Benito', '654636237', 'carmencita_1@yahoo.com', '1996-07-24', 'Femenina', 'NORMAL', 'NO', '', '', 22),
('celiarodriguez', 'celiarodriguez', '12564638Z', 'Celia', 'Rodriguez Recio', '754736232', 'celiarecio@gmail.com', '1997-08-24', 'Femenina', 'NORMAL', 'NO', '', '', 3),
('cristoffpereira', 'cristoffpereira', '10412725G', 'Cristoff', 'Pereira Tellez', '683743212', 'cristoffpertell@outlook.com', '1986-04-12', 'Masculina', 'NORMAL', 'NO', '', '', 18),
('danielceballos', 'danielceballos', '09224837C', 'Daniel', 'Ceballos Cebollas', '734724323', 'callmeElCebolo@gmail.com', '1998-09-12', 'Masculina', 'NORMAL', 'NO', '', '', -1),
('davidmanuel', 'davidmanuel', '49443998R', 'David Manuel', 'Gimenez Montoya', '675847289', 'gmontaya_eldavis@gmail.com', '1983-08-09', 'Masculina', 'NORMAL', 'NO', '', '', 3),
('davidmiguez', 'davidmiguez', '27980947K', 'David', 'Miguez Lopez', '984583243', 'miguezdavidlopez@esei.uvigo.es', '1990-10-28', 'Masculina', 'NORMAL', 'NO', '', '', 26),
('dianacasanova', 'dianacasanova', '46527792B', 'Diana', 'Casanova Hernandez', '643734284', 'dianadinamita@hotmail.com', '1990-06-23', 'Femenina', 'NORMAL', 'SI', 'ES60', '00491500051234567892', 7),
('diegocurras', 'diegocurras', '13904461H', 'Diego', 'Curras Blas', '683423423', 'currasblasmas@gmail.com', '1965-05-13', 'Masculina', 'NORMAL', 'NO', '', '', -5),
('diegojorreto', 'diegojorreto', '74838615L', 'Diego', 'Jorreto Dominguez', '684538434', 'diegooooljorreto@yahoo.com', '1997-10-12', 'Masculina', 'NORMAL', 'NO', '', '', 25),
('diegoportela', 'diegoportela', '66245444Q', 'Diego', 'Portela Lopez', '674382421', 'diegol@outlook.com', '1985-06-20', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('enrique_lopez', 'enrique_lopez', '15321397Q', 'Enrique', 'Lopez Llano', '985647434', 'quiquelopezllan@gmail.com', '1978-06-27', 'Masculina', 'NORMAL', 'NO', '', '', 13),
('esthermontecelo', 'esthermontecelo', '12441494N', 'Esther', 'Montecelo Ledo', '984374233', 'esthercitamonteledo@yahoo.com', '1985-01-22', 'Femenina', 'NORMAL', 'NO', '', '', 22),
('fabioroson', 'fabioroson', '35924493B', 'Fabio', 'Roson Rosales', '674853223', 'rosonrosales@hotmail.com', '1985-04-15', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('felixperez', 'felixperez', '70053511L', 'Felix', 'Perez Feliz', '984834272', 'felixfeliz@hotmail.com', '1972-01-26', 'Masculina', 'NORMAL', 'NO', '', '', -5),
('franciscobretal', 'franciscobretal', '13359330X', 'Francisco', 'Bretal Franco', '674582374', 'francobretal90@gmail.com', '1990-09-27', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('guardiola', 'guardiola', '31897064C', 'Josep', 'Guardiola i Sala', '669384473', 'josepguardiol@hotmail.com', '1971-01-18', 'Masculina', 'ENTRENADOR', 'NO', '', '', 0),
('guillermomtnez', 'guillermomtnez', '28875991C', 'Guillermo', 'Martinez Soria', '683742432', 'guille_1989@gmail.com', '1989-11-25', 'Masculina', 'NORMAL', 'NO', '', '', 3),
('hugo_mejide', 'hugo_mejide', '07814102J', 'Hugo', 'Mejide Perez', '657367423', 'mejidehugo1990_43@yahoo.com', '1990-02-04', 'Masculina', 'NORMAL', 'SI', 'ES94', '20805801101234567891', 1),
('isabelmata', 'isabelmata', '85038738X', 'Isabel', 'Mata Trillo', '694845332', 'isabelitaii@gmail.com', '1988-03-25', 'Femenina', 'NORMAL', 'NO', '', '', 7),
('ivanvalcarcel', 'ivanvalcarcel', '02608914R', 'Ivan', 'Valcarcel Gil', '678234733', 'valcarcelinho@yahoo.es', '1981-07-13', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('jacobohermida', 'jacobohermida', '57300386A', 'Jacobo', 'Hermida Lista', '674854323', 'elprimojacob@hotmail.com', '1993-03-16', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('jaimesalgado', 'jaimesalgado', '04152746G', 'Jaime', 'Salgado Gutierrez', '666437322', 'jaimito456_salga@gmail.com', '1995-12-04', 'Masculina', 'NORMAL', 'NO', '', '', -5),
('jantoniooute', 'jantoniooute', '78207899X', 'Jose Antonio', 'OuteiriÃ±o Baltar', '673857231', 'antoniÃ±obaltarin@eduxunta.gal', '1994-05-15', 'Masculina', 'NORMAL', 'SI', 'ES90', '00246912501234567891', 7),
('javierlorenzo', 'javierlorenzo', '15396085T', 'Javier', 'Lorenzo Gil', '678321241', 'superjavi@yahoo.com', '1987-06-17', 'Masculina', 'NORMAL', 'NO', '', '', -1),
('jesusiglesias', 'jesusiglesias', '77523701Q', 'Jesus', 'Iglesias de la Torre', '987534234', 'jesusinho_towers@yahoo.es', '2001-07-04', 'Masculina', 'NORMAL', 'NO', '', '', -1),
('jfperez', 'joni', '44493919M', 'Jonathan', 'Fernandez Perez', '696627322', 'jfperez3@esei.uvigo.es', '1995-10-25', 'Masculina', 'NORMAL', 'NO', '', '', 0),
('jordigonzalez', 'jordigonzalez', '35474611D', 'Jordi', 'Gonzalez Puig', '653472342', 'puigpuig3@hotmail.com', '1963-12-15', 'Masculina', 'NORMAL', 'NO', '', '', 31),
('jorgepuertas', 'jorgepuertas', '90471642S', 'Jorge', 'Puertas Ugarte', '987563421', 'jorginho_69@yahoo.com', '2002-07-30', 'Masculina', 'NORMAL', 'NO', '', '', 18),
('jorgesabucedo', 'jorgesabucedo', '51907965R', 'Jorge', 'Sabucedo Montes', '985847543', 'jorge4ever@gmail.com', '1994-07-26', 'Masculina', 'NORMAL', 'NO', '', '', 21),
('joseantonio', 'joseantonio', '06956257E', 'Jose Antonio', 'Moyano Brey', '683473292', 'breysuperstar@gmail.com', '2000-11-08', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('josedacal', 'josedacal', '84792302L', 'Jose', 'Dacal Fernandez', '948348353', 'josiÃ±opower@hotmail.com', '1995-03-20', 'Masculina', 'NORMAL', 'NO', '', '', 5),
('joseluis', 'joseluis', '23227175G', 'Jose Luis', 'Rodriguez Espinosa', '673482344', 'jlrodrinosa@hotmail.com', '1990-09-13', 'Masculina', 'NORMAL', 'NO', '', '', 26),
('josemaria', 'josemaria', '06361196V', 'Jose Maria', 'Gonzalez Gonzalez', '667432434', 'chemaglezglez@hotmail.com', '1993-10-06', 'Masculina', 'NORMAL', 'NO', '', '', -1),
('juancarlos', 'juancarlos', '01538777P', 'Juan Carlos', 'Perez Perez', '988462342', 'juankar_bombom96@gmail.com', '1996-12-21', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('juancorral', 'juancorral', '73539077G', 'Juan', 'Corral Perez', '699384234', 'juanitocorral@hotmail.com', '1991-02-26', 'Masculina', 'NORMAL', 'NO', '', '', 3),
('juanllano', 'juanllano', '97401039H', 'Juan', 'Llano Fernandez', '678432342', 'juanllanollano@yahoo.com', '1994-09-11', 'Masculina', 'NORMAL', 'NO', '', '', 7),
('juansoler', 'juansoler', '12705621F', 'Juan', 'Soler Jimenez', '674832231', 'solerjimjuan@uvigo.es', '1973-05-24', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('linogonzalez', 'linogonzalez', '09915233W', 'Lino', 'Gonzalez Fuster', '674534233', 'linoavelino@yahoo.com', '1982-05-31', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('lucianespereira', 'lucianespereira', '05932693G', 'Lucia', 'Nespereira Cuesta', '678432423', 'sorayanespe1995@hotmail.com', '1995-11-20', 'Femenina', 'NORMAL', 'NO', '', '', 22),
('luisa_sevilla', 'luisa_sevilla', '96676329S', 'Luisa', 'Sevilla Dominguez', '674834579', 'luisa_sevilla87@gmail.com', '1987-12-20', 'Femenina', 'NORMAL', 'SI', 'ES71', '00302053091234567895', 13),
('luiscaride', 'luiscaride', '60545480G', 'Luis', 'Caride Abril', '678345352', 'luiscarabril@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', '', 31),
('luiscarmona', 'luiscarmona', '61033162V', 'Luis', 'Carmona Goya', '653243243', 'luisinhocarmona@yahoo.com', '1980-08-24', 'Masculina', 'NORMAL', 'NO', '', '', -5),
('luisviejo', 'luisviejo', '25474614K', 'Luis', 'Viejo Gil', '683843422', 'luisviejo_09876@gmail.com', '1976-02-15', 'Masculina', 'NORMAL', 'NO', '', '', 25),
('manuelangel', 'manuelangel', '03960290N', 'Manuel Angel', 'Perez Jimenez', '666234234', 'manuangel@hotmail.com', '1973-01-14', 'Masculina', 'NORMAL', 'NO', '', '', 35),
('marcoscudeiro', 'marcoscudeiro', '17517361D', 'Marcos', 'Cudeiro Viso', '674853453', 'chinocudeiro@gmail.cn', '2000-02-29', 'Masculina', 'NORMAL', 'NO', '', '', 31),
('mariaboveda', 'mariaboveda', '66818651V', 'Maria', 'Boveda Ruiz', '984734823', 'mbruiz@uvigo.es', '1993-05-23', 'Femenina', 'NORMAL', 'NO', '', '', 18),
('mariapumar', 'mariapumar', '78078690S', 'Maria', 'Pumar Vazquez', '683472331', 'pumarvazquezmar1234@gmail.com', '1997-03-18', 'Femenina', 'NORMAL', 'SI', 'AD66', '19518195619519819619', -1),
('mariohernandez', 'mariohernandez', '22474502Y', 'Mario', 'Hernandez Hermoso', '689242312', 'supermario64@gmail.com', '1964-04-03', 'Masculina', 'NORMAL', 'NO', '', '', -1),
('marta_castro', 'marta_castro', '28072495Y', 'Marta', 'Castro Xil', '678457393', 'martitaxil1@hotmail.com', '2000-11-19', 'Femenina', 'NORMAL', 'SI', 'ES10', '00492352082414205416', 1),
('mourinho', 'mourinho', '49565820S', 'Jose Mario', 'dos Santos Mourinho Felix', '753274223', 'xoxemourinho@gmail.com', '1963-01-26', 'Masculina', 'ENTRENADOR', 'NO', '', '', 0),
('noemiquesada', 'noemiquesada', '82023628Q', 'Noemi', 'Quesada Lopez', '643237323', 'nquelopez@esei.uvigo.es', '2003-03-31', 'Femenina', 'NORMAL', 'NO', '', '', 10),
('olallardgez', 'olallardgez', '50566997W', 'Olalla', 'Rodriguez Perez', '678433189', 'superolalla@yahoo.com', '1997-12-21', 'Femenina', 'NORMAL', 'NO', '', '', 18),
('olista', '1234', '24252751X', 'Oscar', 'Lista Rivera', '643956059', 'olista@gmail.com', '1994-05-22', 'Masculina', 'NORMAL', 'SI', 'ES00', '1234567890123456', 0),
('oscardominguez', 'oscardominguez', '40315187M', 'Oscar', 'Dominguez Sanz', '674324233', 'oscardomsanz456@hotmail.com', '1991-11-18', 'Masculina', 'NORMAL', 'NO', '', '', 3),
('oscarfernadez', 'oscarfernadez', '36416302B', 'Oscar', 'Fernandez Dorado', '746345332', 'oscardorado98@gmail.com', '0000-00-00', 'Masculina', 'NORMAL', 'NO', '', '', 31),
('pacobarrio', 'pacobarrio', '52957832X', 'Paco', 'Barrio Leon', '647583423', 'pacoleon@yahoo.com', '1977-03-28', 'Masculina', 'NORMAL', 'SI', 'ES82', '78945102345873061212', 21),
('pazbalboa', 'pazbalboa', '76101387E', 'Paz', 'Balboa Leon', '984375437', 'pacitabalboa94@gmail.com', '1994-01-05', 'Femenina', 'NORMAL', 'NO', '', '', -1),
('pedrocuesta', 'pedrocuesta', '72983428N', 'Pedro', 'Cuesta Morales', '669454344', 'pcmorales@uvigo.es', '1977-01-20', 'Masculina', 'NORMAL', 'SI', 'ES42', '11848468464655222222', -8),
('pilarlado', 'pilarlado', '89199880S', 'Pilar', 'Lado Izquierdo', '735637432', 'plizquierdo@esei.uvigo.es', '1999-07-17', 'Femenina', 'NORMAL', 'NO', '', '', -4),
('ritaconde', 'ritaconde', '24176992J', 'Rita', 'Conde Sanchez', '848543322', 'ritaorita@gmail.com', '1981-11-22', 'Femenina', 'NORMAL', 'NO', '', '', 10),
('robertotato', 'robertotato', '37336487N', 'Roberto', 'Tato Panadero', '637482344', 'jugamosaltato@hotmail.com', '2000-11-06', 'Masculina', 'NORMAL', 'SI', 'AL42', '78945687431597125824', -5),
('rociofernandez', 'rociofernandez', '74484850V', 'Rocio', 'Fernandez Blanco', '987635467', 'rociofer_blan_88@gmail.com', '1988-08-21', 'Femenina', 'NORMAL', 'NO', '', '', 7),
('rosinafdez', 'rosinafdez', '28491046A', 'Rosina', 'Fernandez Rojas', '976543345', 'rfrojas@gmail.com', '1983-06-24', 'Femenina', 'NORMAL', 'NO', '', '', 3),
('rubencorral', 'rubencorral', '69287892R', 'Ruben', 'Corral Cabreiroa', '768453443', 'cabreiroawaters@yahoo.com', '1992-11-11', 'Masculina', 'NORMAL', 'NO', '', '', -6),
('rubengonzalez', 'rubengonzalez', '43257679S', 'Ruben', 'Gonzalez Hurtado', '674357232', 'ruben7star@gmail.com', '1999-07-25', 'Masculina', 'NORMAL', 'NO', '', '', -8),
('sisu', 'sisu', '11111111h', 'Zinedine', 'Yazid Zidane', '666234234', 'zidanin@esei.uvigo.es', '1972-06-23', 'Masculina', 'ENTRENADOR', 'NO', '', '', 0),
('taniafernandez', 'taniafernandez', '36772892D', 'Tania', 'Fernandez Domingo', '687343884', 'domingotaniafernan@gmail.com', '1992-06-23', 'Femenina', 'NORMAL', 'NO', '', '', -4),
('teofilomartin', 'teofilomartin', '25557539P', 'Teofilo', 'Martin Vidal', '987543532', 'teofilo_87832@gmail.com', '1983-07-13', 'Masculina', 'NORMAL', 'SI', 'ES17', '20852066623456789011', 26),
('xacoboiglesias', 'xacoboiglesias', '28569206D', 'Xacobo', 'Iglesias Altomano', '983423242', 'xacoaltomano@hotmail.com', '1982-03-16', 'Masculina', 'NORMAL', 'NO', '', '', 14),
('xianagolpe', 'xianagolpe', '95350359H', 'Xiana', 'Golpe Fuertes', '673264373', 'golpefuertesxi@aol.com', '1999-02-15', 'Femenina', 'NORMAL', 'NO', '', '', 7),
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
  ADD PRIMARY KEY (`ID_Promo`,`usuarios_login`),
  ADD KEY `ID_Promo` (`ID_Promo`),
  ADD KEY `ID_Promo_2` (`ID_Promo`),
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
  MODIFY `ID_Clase` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `clases_particulares`
--
ALTER TABLE `clases_particulares`
  MODIFY `ID_Clase` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `parejas`
--
ALTER TABLE `parejas`
  MODIFY `ID_Pareja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `ID_Partido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=832;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `ID_Torneo` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  ADD CONSTRAINT `promociones_has_usuarios_ibfk_2` FOREIGN KEY (`ID_Promo`) REFERENCES `promociones` (`ID_Promo`);

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
