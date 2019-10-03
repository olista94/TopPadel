-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2019 a las 18:03:18
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
CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `todolist`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--

DROP TABLE IF EXISTS `parejas`;
CREATE TABLE IF NOT EXISTS `parejas` (
  `ID_Pareja` tinyint(5) NOT NULL AUTO_INCREMENT,
  `usuarios_login` varchar(45) NOT NULL,
  `usuarios_login1` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_Pareja`,`usuarios_login`,`usuarios_login1`),
  KEY `fk_usuarios_parejas` (`usuarios_login`),
  KEY `fk_usuarios_parejas1` (`usuarios_login1`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_has_torneos`
--

DROP TABLE IF EXISTS `parejas_has_torneos`;
CREATE TABLE IF NOT EXISTS `parejas_has_torneos` (
  `parejas_ID_Pareja` tinyint(5) NOT NULL,
  `torneos_ID_Torneo` tinyint(5) NOT NULL,
  PRIMARY KEY (`parejas_ID_Pareja`,`torneos_ID_Torneo`),
  KEY `fk_parejas_parejas_has_torneos` (`parejas_ID_Pareja`),
  KEY `fk_parejas_parejas_has_torneos3` (`torneos_ID_Torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pista`
--

DROP TABLE IF EXISTS `pista`;
CREATE TABLE IF NOT EXISTS `pista` (
  `ID_Pista` tinyint(5) NOT NULL AUTO_INCREMENT,
  `Nombre_Pista` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_Pista`),
  UNIQUE KEY `Nombre_Pista` (`Nombre_Pista`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pista`
--

INSERT INTO `pista` (`ID_Pista`, `Nombre_Pista`) VALUES
(1, 'Pista 1'),
(2, 'Pista 2'),
(5, 'Pista 3'),
(6, 'Pista 4'),
(7, 'Pista 5'),
(8, 'Pista 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

DROP TABLE IF EXISTS `promociones`;
CREATE TABLE IF NOT EXISTS `promociones` (
  `ID_Promo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora_fin` time NOT NULL,
  `usuarios_login_usuario` varchar(45) DEFAULT NULL,
  `pista_ID_Pista` tinyint(5) DEFAULT NULL,
  PRIMARY KEY (`ID_Promo`),
  KEY `usuarios_login_usuario` (`usuarios_login_usuario`),
  KEY `pista_ID_Pista` (`pista_ID_Pista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `usuarios_login` varchar(45) NOT NULL,
  `pista_ID_Pista` tinyint(5) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time DEFAULT NULL,
  PRIMARY KEY (`usuarios_login`,`pista_ID_Pista`,`hora_inicio`,`fecha_reserva`),
  KEY `fk_usuarios_has_pista_pista1` (`pista_ID_Pista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`usuarios_login`, `pista_ID_Pista`, `fecha_reserva`, `hora_inicio`, `hora_fin`) VALUES
('ypgarcia', 6, '2019-09-20', '20:30:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `ID_Torneo` tinyint(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `edicion` int(5) NOT NULL,
  `nivel` int(5) NOT NULL,
  PRIMARY KEY (`ID_Torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
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
  `cuenta` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `dni`, `nombre`, `apellidos`, `telefono`, `email`, `fecha`, `sexo`, `tipo`, `socio`, `cuenta`) VALUES
('admin', 'admin', '11111111H', 'Admin', 'Adminez Adminez', '676532185', 'admin@admin.es', '1991-05-14', 'Masculina', 'ADMIN', 'NO', NULL),
('belen', 'belen', '25038044Z', 'Belen', 'Varela Perez', '770249813', 'belenbelen@gmail.com', '1977-07-07', 'Femenina', 'NORMAL', 'NO', NULL),
('felipe', 'felipe', '12345678Z', 'Felipe Juan Pablo Alfonso', 'de Todos los Santos de Borbón y Grecia', '669680477', 'felipevi@gmail.com', '1968-01-30', 'Masculina', 'NORMAL', 'NO', NULL),
('juan', 'juan', '63498344J', 'Juan', 'Guerrero Vera', '660877067', 'juanjuan@gmail.com', '2001-06-22', 'Masculina', 'NORMAL', 'NO', NULL),
('manuel', 'manuel', '26685410M', 'Manuel', 'Abril Farres', '828297632', 'manuelmanuel@gmail.com', '1981-02-28', 'Masculina', 'NORMAL', 'NO', NULL),
('maria', 'maria', '92643593F', 'Maria', 'Saez de la Torre', '626851194', 'mariamaria@gmail.com', '1979-01-07', 'Femenina', 'NORMAL', 'NO', NULL),
('olista', '1234', '24252751X', 'Oscar', 'Lista Rivera', '643956059', 'adminadmin@gmail.com', '1994-05-22', 'Masculina', 'NORMAL', 'NO', NULL),
('pepa', 'pepa', '16581943R', 'Pepa', 'Gonzalez Perez', '670084078', 'pepapepa@gmail.com', '1976-10-27', 'Femenina', 'NORMAL', 'NO', NULL),
('rosa', 'rosa', '12393504T', 'Rosa', 'Cruz Moreno', '878127326', 'rosarosa@gmail.com', '1993-11-11', 'Femenina', 'NORMAL', 'NO', NULL),
('santi', 'santi', '71557134V', 'Santiago', 'Castor Nogales', '695259914', 'santisanti@gmail.com', '1997-01-01', 'Masculina', 'NORMAL', 'NO', NULL),
('sara', 'sara', '53518040F', 'Sara', 'Ezquerro Iglesias', '626693106', 'sarasara@gmail.com', '1988-08-03', 'Femenina', 'NORMAL', 'NO', NULL),
('ypgarcia', 'asdf', '44657078W', 'Iago', 'Perez Garcia', '669517850', 'ypgarcia@esei.uvigo.es', '1996-04-21', 'Masculina', 'NORMAL', 'NO', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD CONSTRAINT `promociones_ibfk_1` FOREIGN KEY (`usuarios_login_usuario`) REFERENCES `usuarios` (`login`) ON DELETE NO ACTION,
  ADD CONSTRAINT `promociones_ibfk_2` FOREIGN KEY (`pista_ID_Pista`) REFERENCES `pista` (`ID_Pista`);

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
