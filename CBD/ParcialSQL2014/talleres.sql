-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2014 a las 12:04:08
-- Versión del servidor: 5.1.33
-- Versión de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `taller`
--

CREATE DATABASE taller;
Use taller;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `DNI` int(11) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI`, `Apellido`, `Nombre`, `Telefono`, `Direccion`, `Ciudad`) VALUES
(9736583, 'Maina', 'Estela', '299-4405693', 'Rivadavia 115 P17', 'Neuquén'),
(9971908, 'Machado', 'Raul Eduardo', '299-4425974', 'Rio Limay 256', 'Cipolletti'),
(24435657, 'Monti', 'Juan Gabriel', '299-4412568', 'Belgrano 5874', 'Neuquén'),
(26458581, 'Sandoval', 'Diego Sebastian', '299-4458796', 'Túcuman 587', 'Centenario'),
(26810320, 'Duran', 'Romina', '299-155896321', 'Perito Moreno 834', 'Neuquén'),
(28355456, 'Flores', 'Martin', '154986325', 'Av. Martinez 21', 'Cipolletti'),
(30435974, 'Garcia', 'María del Carmen', '299-9845314', 'Mexico 5874', 'Centenario'),
(92831516, 'Flores', 'Roberto', '156874598', 'Alcorta 568 ', 'Centenario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE IF NOT EXISTS `reparaciones` (
  `idReparacion` int(11) NOT NULL AUTO_INCREMENT,
  `Patente` varchar(7) NOT NULL,
  `LegajoTecnico` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idReparacion`),
  KEY `Patente` (`Patente`,`LegajoTecnico`),
  KEY `LegajoTecnico` (`LegajoTecnico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`idReparacion`, `Patente`, `LegajoTecnico`, `Fecha`, `Importe`) VALUES
(1, 'AAJ-321', 3214, '2013-11-12', 345.00),
(2, 'IIG-528', 3217, '2014-01-13', 294.00),
(3, 'AAJ-321', 3216, '2014-01-13', 168.00),
(4, 'HQA-116', 3214, '2014-01-13', 584.32),
(5, 'IXK-173', 3217, '2014-02-01', 432.88),
(6, 'UTI-071', 3216, '2014-03-04', 215.33),
(7, 'WWT-098', 3214, '2014-02-11', 368.52),
(8, 'MDZ-290', 3214, '2014-03-10', 845.00),
(9, 'IIG-528', 3217, '2014-03-24', 625.33),
(10, 'LTI-088', 3214, '2014-03-26', 285.00),
(11, 'GVA-911', 3216, '2014-03-28', 265.55),
(12, 'HDK-397', 3217, '2014-04-07', 249.88),
(13, 'LTI-088', 3216, '2014-04-29', 568.21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE IF NOT EXISTS `repuestos` (
  `Codigo` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`Codigo`, `Descripcion`, `Stock`, `Precio`) VALUES
(1256, 'Cebador', 22, 82.33),
(1261, 'CONEXION RADIAL', 4, 112.99),
(4355, 'FILTRO DE AIRE', 54, 65.87),
(5422, 'CEPILLO DE BRONCE', 8, 155.00),
(5632, 'JUNTA DE FILTRO', 7, 43.00),
(6465, 'JUNTA DE BOMBA', 7, 32.00),
(6578, 'VALVULA BOMBITA', 4, 54.99),
(12321, 'Caño Inyección', 45, 312.00),
(13692, 'EXTREMO ACELERADOR', 6, 38.23),
(43265, 'Buje', 43, 10.55),
(45366, 'VASTAGO P/FILTROS', 5, 65.98),
(65433, 'EJE', 4, 42.99),
(77865, 'TORNILLO GUIA', 123, 12.00),
(89720, 'Arandela Calibración', 254, 3.56),
(99310, 'ABRAZADERAS', 342, 10.50),
(99734, 'Bomba Alimentación', 5, 296.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestosreparaciones`
--

CREATE TABLE IF NOT EXISTS `repuestosreparaciones` (
  `idReparacion` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idReparacion`,`Codigo`),
  KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `repuestosreparaciones`
--

INSERT INTO `repuestosreparaciones` (`idReparacion`, `Codigo`, `Cantidad`) VALUES
(1, 5632, 1),
(1, 89720, 2),
(2, 4355, 2),
(3, 43265, 2),
(4, 12321, 1),
(4, 89720, 2),
(5, 99310, 4),
(5, 99734, 1),
(6, 65433, 1),
(7, 45366, 3),
(9, 12321, 1),
(10, 13692, 1),
(10, 89720, 4),
(11, 6578, 1),
(12, 4355, 1),
(13, 6578, 1),
(13, 12321, 1),
(13, 43265, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE IF NOT EXISTS `tecnicos` (
  `Legajo` int(11) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  PRIMARY KEY (`Legajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`Legajo`, `Apellido`, `Nombre`, `Telefono`, `Direccion`) VALUES
(3214, 'Garcia', 'Manuel', '4453214', 'Min. Avellaneda 321'),
(3216, 'Ramires', 'Jose Luis', '15432134', 'San Martin 6533'),
(3217, 'Gonzales', 'Raul', '15564532', 'Av. Libertador 323');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
  `Patente` varchar(7) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Anio` int(11) NOT NULL,
  `DNIDuenio` int(11) NOT NULL,
  PRIMARY KEY (`Patente`),
  KEY `DNIDuenio` (`DNIDuenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`Patente`, `Marca`, `Modelo`, `Anio`, `DNIDuenio`) VALUES
('AAJ-321', 'Renault', 'Renault 9', 1995, 28355456),
('GVA-911', 'Ford', 'KA ACTION 1.6L ', 2007, 26810320),
('HDK-397', 'Volkswagen', 'POLO CLASSIC 1.6', 2008, 26810320),
('HQA-116', 'Toyota', 'Hilux 4x4 cabina doble', 2008, 92831516),
('IIG-528', 'Toyota', 'AVENSIS', 2009, 9971908),
('IXK-173', 'Volkswagen', 'Gol 1.4', 2010, 30435974),
('LTI-088', 'FORD', 'ECOSPORT 1.6', 2012, 28355456),
('LVF-865', 'Fiat', 'Palio 1.6', 2012, 9736583),
('MDZ-290', 'Mercedes-benz', 'OF1722', 2012, 26458581),
('UTI-071', 'Renault', '12 TL', 1992, 24435657),
('WWT-098', 'Ford', 'F100', 1973, 9971908);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD CONSTRAINT `reparaciones_ibfk_1` FOREIGN KEY (`Patente`) REFERENCES `vehiculos` (`Patente`),
  ADD CONSTRAINT `reparaciones_ibfk_2` FOREIGN KEY (`LegajoTecnico`) REFERENCES `tecnicos` (`Legajo`);

--
-- Filtros para la tabla `repuestosreparaciones`
--
ALTER TABLE `repuestosreparaciones`
  ADD CONSTRAINT `repuestosreparaciones_ibfk_2` FOREIGN KEY (`Codigo`) REFERENCES `repuestos` (`Codigo`),
  ADD CONSTRAINT `repuestosreparaciones_ibfk_1` FOREIGN KEY (`idReparacion`) REFERENCES `reparaciones` (`idReparacion`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`DNIDuenio`) REFERENCES `clientes` (`DNI`);
