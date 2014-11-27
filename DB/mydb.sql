-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2014 a las 17:59:30
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
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDepa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombreDepa`) VALUES
(1, 'administracion'),
(2, 'almacen'),
(3, 'finanza'),
(4, 'callcenter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleticket`
--

CREATE TABLE IF NOT EXISTS `detalleticket` (
  `iddetalleTicket` int(11) NOT NULL AUTO_INCREMENT,
  `descripcio` varchar(45) DEFAULT NULL,
  `descripciondetallada` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddetalleTicket`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `detalleticket`
--

INSERT INTO `detalleticket` (`iddetalleTicket`, `descripcio`, `descripciondetallada`) VALUES
(1, 'no enciende ', 'componentes cayeron '),
(2, 'se interrumpe ', 'se cae cada media hora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoticket`
--

CREATE TABLE IF NOT EXISTS `estadoticket` (
  `idestadoTicket` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idestadoTicket`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estadoticket`
--

INSERT INTO `estadoticket` (`idestadoTicket`, `estado`) VALUES
(1, 'urgente  desarrollo'),
(2, 'urgencia level'),
(3, 'urgencia minima');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idlogin`, `usuario`, `password`, `rol_idrol`) VALUES
(1, 'angel', 'angel', 1),
(2, 'lili', 'lili', 2),
(3, 'mary', 'mary', 2),
(4, 'pedro', 'pedro', 2),
(5, 'denis', 'denis', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `Snombre`, `apellido`, `Sapellido`, `telefono`, `documento`, `login_idlogin`, `departamento_iddepartamento`) VALUES
(1, 'jose', 'angel', 'gomez', 'alvarado', '22806019', '821990127987', 1, 1),
(2, 'lil', 'ana', 'linarez', 'fuentes', '22806018', '23456789', 2, 2),
(3, 'mary', 'vanessa', 'gomez', 'alvarez', '22806032', '4567890', 3, 2),
(4, 'pedro', 'javier', 'linarez', 'jaime', '23456789', '781982389', 4, 2),
(5, 'denis', 'jose', 'fuentes', 'alvarado', '22806022', '781263109837109', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priorida`
--

CREATE TABLE IF NOT EXISTS `priorida` (
  `idpriorida` int(11) NOT NULL AUTO_INCREMENT,
  `nombreprio` varchar(45) NOT NULL,
  PRIMARY KEY (`idpriorida`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `priorida`
--

INSERT INTO `priorida` (`idpriorida`, `nombreprio`) VALUES
(1, 'Urgente'),
(2, 'medio'),
(3, 'leve');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

CREATE TABLE IF NOT EXISTS `problema` (
  `idproblema` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProblema` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproblema`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `problema`
--

INSERT INTO `problema` (`idproblema`, `nombreProblema`) VALUES
(1, 'PC'),
(2, 'conexion'),
(3, 'hardware'),
(4, 'software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`) VALUES
(1, 'empleado'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `idticket` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticketcol` varchar(45) DEFAULT NULL,
  `problema_idproblema` int(11) NOT NULL,
  `detalleTicket_iddetalleTicket` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `estadoTicket_idestadoTicket` int(11) NOT NULL,
  `priorida_idpriorida` int(11) NOT NULL,
  `idempleado` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idticket`,`problema_idproblema`,`detalleTicket_iddetalleTicket`,`persona_idpersona`,`estadoTicket_idestadoTicket`,`priorida_idpriorida`),
  KEY `fk_ticket_problema1_idx` (`problema_idproblema`),
  KEY `fk_ticket_detalleTicket1_idx` (`detalleTicket_iddetalleTicket`),
  KEY `fk_ticket_persona1_idx` (`persona_idpersona`),
  KEY `fk_ticket_estadoTicket1_idx` (`estadoTicket_idestadoTicket`),
  KEY `fk_ticket_priorida1_idx` (`priorida_idpriorida`),
  KEY `fk_ticket_persona2_idx` (`idempleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idticket`, `fechaCreacion`, `ticketcol`, `problema_idproblema`, `detalleTicket_iddetalleTicket`, `persona_idpersona`, `estadoTicket_idestadoTicket`, `priorida_idpriorida`, `idempleado`, `estado`) VALUES
(1, '2014-11-27 16:49:01', 'caida de pc', 1, 1, 2, 2, 2, 1, 'revisado'),
(2, '2014-11-27 16:53:42', 'flaso de conexion', 2, 2, 3, 2, 1, NULL, NULL);

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
  ADD CONSTRAINT `fk_ticket_persona2` FOREIGN KEY (`idempleado`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_priorida1` FOREIGN KEY (`priorida_idpriorida`) REFERENCES `priorida` (`idpriorida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_problema1` FOREIGN KEY (`problema_idproblema`) REFERENCES `problema` (`idproblema`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
