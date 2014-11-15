-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2014 a las 22:05:57
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDepa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombreDepa`) VALUES
(1, 'unp'),
(2, 'unp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleticket`
--

CREATE TABLE IF NOT EXISTS `detalleticket` (
  `iddetalleTicket` int(11) NOT NULL AUTO_INCREMENT,
  `descripcio` varchar(45) DEFAULT NULL,
  `descripciondetallada` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddetalleTicket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoticket`
--

CREATE TABLE IF NOT EXISTS `estadoticket` (
  `idestadoTicket` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idestadoTicket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `rol_idrol` int(11) NOT NULL,
  PRIMARY KEY (`idlogin`,`rol_idrol`),
  KEY `fk_login_rol_idx` (`rol_idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idlogin`, `usuario`, `password`, `rol_idrol`) VALUES
(1, 'angel', 'angel', 1),
(2, 'mary', 'mary', 2),
(3, 'ANGEL', 'ANGEL', 1),
(4, '', '', 1),
(5, 'angell', 'angell', 1),
(6, 'mier', 'mierda', 1),
(7, 'angelll', 'angelll', 1),
(8, 'ertyu', 'ertyui', 1),
(9, 'df', 'fgh', 1),
(10, 'fgh', 'fgh', 1),
(11, 'fgh', 'f', 1),
(12, 'dfg', 'fgh', 1),
(13, 'dfgh', 'fgh', 1),
(14, 'XD', 'XD', 1),
(15, 'XD', 'XD', 1),
(16, 'XDD', 'XDD', 1),
(17, 'angell', 'angelll', 1),
(18, 'ajsj', 'jashj', 1),
(19, 'shdjh', 'jashj', 1),
(20, 'pedro', 'pedro', 1),
(21, 'ajsj', 'angel', 1),
(22, 'hjh', 'jhj', 1),
(23, 'angel', 'angel', 1),
(24, 'angelll', 'angell', 1),
(25, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `Snombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) NOT NULL,
  `Sapellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) NOT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `login_idlogin` int(11) NOT NULL,
  `departamento_iddepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idpersona`,`login_idlogin`,`departamento_iddepartamento`),
  KEY `fk_persona_departamento1_idx` (`departamento_iddepartamento`),
  KEY `fk_persona_login1_idx` (`login_idlogin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `Snombre`, `apellido`, `Sapellido`, `telefono`, `documento`, `login_idlogin`, `departamento_iddepartamento`) VALUES
(6, 'fg', 'fgh', 'fgh', 'fgh', 'gh', 'gh', 1, 1),
(7, 'jose', 'angel', 'gomez', 'Alvardo', '22806019', '12638990', 2, 1),
(8, 'angel', 'jose', 'gomez', 'alvarado', '23456789', '456789', 2, 1),
(9, '', '', '', '', '', '', 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priorida`
--

CREATE TABLE IF NOT EXISTS `priorida` (
  `idpriorida` int(11) NOT NULL AUTO_INCREMENT,
  `nombreprio` varchar(45) NOT NULL,
  PRIMARY KEY (`idpriorida`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `priorida`
--

INSERT INTO `priorida` (`idpriorida`, `nombreprio`) VALUES
(1, 'John'),
(2, 'ange'),
(3, 'ya veo'),
(4, 'hah');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

CREATE TABLE IF NOT EXISTS `problema` (
  `idproblema` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProblema` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproblema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`) VALUES
(1, 'cliente'),
(2, 'empleado'),
(3, 'cliente'),
(4, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `idticket` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCreacion` date NOT NULL,
  `ticketcol` varchar(45) DEFAULT NULL,
  `problema_idproblema` int(11) NOT NULL,
  `detalleTicket_iddetalleTicket` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `estadoTicket_idestadoTicket` int(11) NOT NULL,
  `priorida_idpriorida` int(11) NOT NULL,
  PRIMARY KEY (`idticket`,`problema_idproblema`,`detalleTicket_iddetalleTicket`,`persona_idpersona`,`estadoTicket_idestadoTicket`,`priorida_idpriorida`),
  KEY `fk_ticket_problema1_idx` (`problema_idproblema`),
  KEY `fk_ticket_detalleTicket1_idx` (`detalleTicket_iddetalleTicket`),
  KEY `fk_ticket_persona1_idx` (`persona_idpersona`),
  KEY `fk_ticket_estadoTicket1_idx` (`estadoTicket_idestadoTicket`),
  KEY `fk_ticket_priorida1_idx` (`priorida_idpriorida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_rol` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_departamento1` FOREIGN KEY (`departamento_iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_login1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_detalleTicket1` FOREIGN KEY (`detalleTicket_iddetalleTicket`) REFERENCES `detalleticket` (`iddetalleTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_estadoTicket1` FOREIGN KEY (`estadoTicket_idestadoTicket`) REFERENCES `estadoticket` (`idestadoTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_priorida1` FOREIGN KEY (`priorida_idpriorida`) REFERENCES `priorida` (`idpriorida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_problema1` FOREIGN KEY (`problema_idproblema`) REFERENCES `problema` (`idproblema`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
