-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2015 a las 22:20:15
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `idbitacora` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `idProducto` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`idbitacora`),
  KEY `FK_producto_bitacora` (`idProducto`),
  KEY `FK_Empleado_bitacora` (`idEmpleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idbitacora`, `descripcion`, `idProducto`, `idEmpleado`) VALUES
(1, 'bitacora numero 1', 1, 1),
(2, 'bitacora numero 2', 2, 1),
(3, 'bitacora numero 3', 3, 1),
(4, 'bitacora numero 4', 4, 1),
(5, 'bitacora numero 5', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE IF NOT EXISTS `bodega` (
  `idBodega` int(11) NOT NULL AUTO_INCREMENT,
  `idSucursal` int(11) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idBodega`),
  KEY `fk_sucursal_bodega` (`idSucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`idBodega`, `idSucursal`, `nombre`) VALUES
(1, 1, 'uno'),
(2, 4, 'dos'),
(3, 3, 'tres'),
(4, 5, 'cuatro'),
(5, 2, 'cinco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE IF NOT EXISTS `catalogo` (
  `idcatalogo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaCierre` date NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcatalogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`idcatalogo`, `nombre`, `descripcion`, `fechaInicio`, `fechaCierre`, `imagen`) VALUES
(1, 'catalogo1', 'es el primer catalogo', '2003-05-21', '2003-08-21', 'image1'),
(2, 'catalogo2', 'es el segundo catalogo', '2004-05-21', '2004-08-21', 'image2'),
(3, 'catalogo3', 'es el tercer catalogo', '2005-05-21', '2005-08-21', 'image3'),
(4, 'catalogo4', 'es el cuarto catalogo', '2006-05-21', '2006-08-21', 'image4'),
(5, 'catalogo5', 'es el quinto catalogo', '2006-05-21', '2006-08-21', 'image5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) NOT NULL,
  `CreditoFiscal` varchar(20) NOT NULL,
  `FechaAlta` date NOT NULL,
  `FechaBaja` date NOT NULL,
  `empleado` tinyint(1) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_persona_cliente` (`idPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idPersona`, `CreditoFiscal`, `FechaAlta`, `FechaBaja`, `empleado`, `estado`) VALUES
(1, 1, '123456-1', '2012-10-21', '2014-02-13', 1, 0),
(2, 2, '136588-2', '2011-04-04', '2012-07-01', 1, 1),
(3, 3, '114745-0', '2010-02-22', '2011-05-25', 1, 0),
(4, 4, '171854-2', '2011-11-11', '2012-11-18', 1, 1),
(5, 5, '145588-3', '2009-08-17', '2010-12-20', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE IF NOT EXISTS `cobro` (
  `idCobro` int(11) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `Monto` double DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Telefono` varchar(60) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`idCobro`, `idPersona`, `Monto`, `Fecha`, `Telefono`, `Estado`) VALUES
(1, 1, 100, '2003-05-21', '22205662', 1),
(2, 2, 200, '2013-05-21', '22205663', 0),
(3, 3, 30.5, '2014-05-21', '22205664', 1),
(4, 3, 12.5, '2015-04-09', '2121-2121', 1),
(5, 1, 12.51, '2015-03-14', '2115-4566', 1),
(6, 3, 30, '2015-03-20', '2252-5465', 0),
(7, 1, 2.55, '2015-03-13', '7854-6556', 0),
(8, 1, 12.55, '2015-03-13', '2212-1212', 0),
(9, 1, 21.25, '2015-03-13', '2123-1231', 0),
(10, 1, 21.25, '2015-03-20', '2354-6546', 1),
(11, 1, 23.25, '2015-03-20', '2536-5646', 0),
(12, 2, 23.25, '2015-03-20', '7894-5656', 0),
(13, 4, 12.56, '2015-03-13', '7489-4564', 0),
(14, 5, 12, '2015-07-10', '4545-4564', 1),
(15, 3, 45, '2015-03-13', '2561-5165', 1),
(16, 4, 15, '2015-06-13', '2561-5166', 1),
(17, 5, 30.51, '2015-04-30', '2654-5642', 1),
(18, 2, 12.5, '2015-04-11', '2212-1212', 1),
(19, 1, 12, '2015-04-11', '2545-4654', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `idcolor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idcolor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idcolor`, `nombre`, `codigo`) VALUES
(1, 'Azul', '#000888'),
(2, 'Blanco', '#FFFFFF'),
(3, 'Celeste', '#01DFD7'),
(4, 'Morado', '#8904B1'),
(5, 'Rojo', '#FF0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consignacion`
--

CREATE TABLE IF NOT EXISTS `consignacion` (
  `IDConsignaciones` int(11) NOT NULL AUTO_INCREMENT,
  `PrimerNombre` varchar(45) NOT NULL,
  `SegundoNombre` varchar(45) NOT NULL,
  `PrimerApellido` varchar(45) NOT NULL,
  `SegundoApellido` varchar(45) NOT NULL,
  `Referencia` varchar(45) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `Concepto` varchar(45) NOT NULL,
  `valor` double NOT NULL,
  `pay` varchar(45) NOT NULL,
  PRIMARY KEY (`IDConsignaciones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `consignacion`
--

INSERT INTO `consignacion` (`IDConsignaciones`, `PrimerNombre`, `SegundoNombre`, `PrimerApellido`, `SegundoApellido`, `Referencia`, `Telefono`, `direccion`, `Concepto`, `valor`, `pay`) VALUES
(1, 'asdfasfadg', 'jojo', 'jojojojj', 'aosdfaslkjkh', 'jaja jaja', '4444-4444', 'calle', 'preatamo', 14, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idContacto` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoContacto` int(11) DEFAULT NULL,
  `Contacto` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idContacto`),
  KEY `fk_tipocontacto_contaco` (`idTipoContacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `idTipoContacto`, `Contacto`) VALUES
(1, 2, '77222020'),
(2, 1, '22222020'),
(3, 3, '24222020'),
(4, 2, '77222021'),
(5, 1, '22222020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `idPais` int(11) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idDepartamento`),
  KEY `fk_pais_departamento` (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `idPais`, `Nombre`) VALUES
(1, 1, 'San Salvador'),
(2, 1, 'Sonsonate'),
(3, 1, 'San Miguel'),
(4, 1, 'Morazan'),
(5, 1, 'La Union'),
(6, 1, 'Santa Ana'),
(7, 1, 'La Paz'),
(8, 1, 'Caba?as'),
(9, 1, 'Libertad'),
(10, 1, 'Chalatenango'),
(11, 1, 'Usulutan'),
(12, 1, 'Cuscatlan'),
(13, 1, 'San vicente'),
(14, 1, 'Ahuchapan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleordendecompra`
--

CREATE TABLE IF NOT EXISTS `detalleordendecompra` (
  `idDetalleOrdenDeCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto_talla` int(11) DEFAULT NULL,
  `idOrdenDeCompra` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetalleOrdenDeCompra`),
  KEY `FK_producto_talla_DetalleOrdenCompra` (`idproducto_talla`),
  KEY `FK_OrdenDeCompra` (`idOrdenDeCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleordendeventa`
--

CREATE TABLE IF NOT EXISTS `detalleordendeventa` (
  `idDetalleOrdenDeVenta` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto_talla` int(11) DEFAULT NULL,
  `idOrdenDeVenta` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetalleOrdenDeVenta`),
  KEY `fk_producto_talla_DetalleOrdenDeVenta` (`idproducto_talla`),
  KEY `fk_DetalleOrdenDeVenta_OrdenDeVenta` (`idOrdenDeVenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `detalleordendeventa`
--

INSERT INTO `detalleordendeventa` (`idDetalleOrdenDeVenta`, `idproducto_talla`, `idOrdenDeVenta`, `cantidad`) VALUES
(1, 1, 2, 15),
(2, 2, 3, 18),
(3, 1, 3, 12),
(4, 4, 3, 11),
(5, 2, 2, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `salario` double(10,2) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `fk_persona_empleado` (`idPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `idPersona`, `usuario`, `cargo`, `salario`, `clave`, `estado`) VALUES
(1, 1, 'Administrador1', 'Administrador', 1000.00, '7815696ecbf1c96e6894b779456d330e', 0),
(2, 2, 'Administrador2', 'adm2', 1200.00, 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 3, 'Administrador3', 'adm3', 1000.00, 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 4, 'Administrador4', 'adm4', 1200.00, 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 5, 'Administrador5', 'adm5', 1000.00, 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `idhistorial` int(11) NOT NULL AUTO_INCREMENT,
  `fechapago` date NOT NULL,
  `monto` double(10,2) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nombre` varchar(140) NOT NULL,
  PRIMARY KEY (`idhistorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idhistorial`, `fechapago`, `monto`, `telefono`, `nombre`) VALUES
(1, '2015-04-02', 25.00, 23245462, 'Carlos Perez'),
(2, '2015-04-01', 34.00, 22223333, 'Kevin Canales'),
(3, '2015-04-11', 34.90, 22343345, 'Elmer Cruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
  `idlinea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`idlinea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`idlinea`, `nombre`, `descripcion`) VALUES
(1, 'linea1', 'linea numero 1'),
(2, 'linea2', 'linea numero 2'),
(3, 'linea3', 'linea numero 3'),
(4, 'linea4', 'linea numero 4'),
(5, 'linea5', 'linea numero 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nombre`, `descripcion`) VALUES
(1, 'NIKE', 'Marca 1'),
(2, 'CAT', 'Marca 2'),
(3, 'PUMA', 'Marca 3'),
(4, 'HEATHERLAND', 'Marca 4'),
(5, 'FILA', 'Marca 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `idMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartamento` int(11) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idMunicipio`),
  KEY `fk_departamento_municipio` (`idDepartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `idDepartamento`, `Nombre`) VALUES
(1, 1, 'San Salvador'),
(2, 6, 'Metapan'),
(3, 9, 'Teotepeque'),
(4, 14, 'Ataco'),
(5, 2, 'Armenia'),
(6, 12, 'Sushitoto'),
(7, 1, 'Apopa'),
(8, 14, 'San Lorenzo'),
(9, 1, 'Cojutepeque'),
(10, 13, 'Apastepeuqe'),
(11, 8, 'Ilobasco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_remision`
--

CREATE TABLE IF NOT EXISTS `nota_remision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `articulo` varchar(45) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `nota_remision`
--

INSERT INTO `nota_remision` (`id`, `numero`, `articulo`, `nombre`, `dui`, `cantidad`, `precio`, `fecha`) VALUES
(1, NULL, 'A52', 'Pedro Joven', '4561237-9', 12, 40.5, '2015-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE IF NOT EXISTS `ofertas` (
  `idoferta` int(11) NOT NULL AUTO_INCREMENT,
  `precioventa` double(10,2) DEFAULT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `disponible` int(11) DEFAULT NULL,
  PRIMARY KEY (`idoferta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`idoferta`, `precioventa`, `producto`, `disponible`) VALUES
(1, 25.50, 'Zapatilla', 37),
(2, 39.99, 'Bota', 18),
(3, 22.00, 'Tenis', 25),
(4, 5.89, 'nombreb', 1),
(5, 54.15, 'nombrea', 1),
(6, 5.00, 'nombrea', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendecompra`
--

CREATE TABLE IF NOT EXISTS `ordendecompra` (
  `idOrdenDeCompra` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCreacion` date DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `enTransito` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idOrdenDeCompra`),
  KEY `FK_proveedor_OrdenDeCompra` (`idProveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ordendecompra`
--

INSERT INTO `ordendecompra` (`idOrdenDeCompra`, `fechaCreacion`, `fechaEntrega`, `idProveedor`, `enTransito`) VALUES
(1, '2012-10-21', '2014-02-13', 1, 1),
(2, '2011-02-25', '2012-08-21', 1, 1),
(3, '2010-10-13', '2011-01-14', 1, 1),
(4, '2009-06-20', '2010-09-11', 1, 1),
(5, '2012-01-17', '2013-12-01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendeventa`
--

CREATE TABLE IF NOT EXISTS `ordendeventa` (
  `idOrdenDeVenta` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCreacion` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`idOrdenDeVenta`),
  KEY `fk_cliente_ordenDeCompra` (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ordendeventa`
--

INSERT INTO `ordendeventa` (`idOrdenDeVenta`, `fechaCreacion`, `fechaEntrega`, `idCliente`, `estado`) VALUES
(1, '2012-10-21', '2014-02-13', 1, 1),
(2, '2011-02-28', '2012-09-12', 1, 1),
(3, '2010-05-25', '2011-04-04', 2, 1),
(4, '2009-09-09', '2010-12-13', 1, 1),
(5, '2011-08-19', '2012-12-12', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `idPais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `nombre`) VALUES
(1, 'El Salvador'),
(2, 'Guatemala'),
(3, 'Honduras'),
(4, 'Nicaragua'),
(5, 'Costa Rica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pendiente`
--

CREATE TABLE IF NOT EXISTS `pendiente` (
  `idpendiente` int(11) NOT NULL AUTO_INCREMENT,
  `gerente` varchar(140) NOT NULL,
  `zona` varchar(140) NOT NULL,
  `departamento` varchar(140) NOT NULL,
  `municipio` varchar(140) NOT NULL,
  `cliente` varchar(140) NOT NULL,
  PRIMARY KEY (`idpendiente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT=':v' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pendiente`
--

INSERT INTO `pendiente` (`idpendiente`, `gerente`, `zona`, `departamento`, `municipio`, `cliente`) VALUES
(1, 'Ger', 'Zon', 'Dep', 'Mun', 'Clie'),
(2, 'Ger 2', 'Zon 2', 'Dep 2', 'Muun', 'Cliee'),
(3, 'Gerr', 'Zoon', 'Deep', 'Muun', 'Clie'),
(4, 'Geer 2', 'Zoon 2', 'Deep 2', 'Muuun', 'Cliiee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `Primer_Nombre` varchar(30) DEFAULT NULL,
  `Segundo_Nombre` varchar(30) DEFAULT NULL,
  `Primer_Apellido` varchar(30) DEFAULT NULL,
  `Segundo_Apellido` varchar(30) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `DUI` varchar(10) DEFAULT NULL,
  `NIT` varchar(20) DEFAULT NULL,
  `genero` tinyint(1) DEFAULT NULL,
  `estadoCivil` tinyint(1) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPersona`),
  KEY `fk_municipio_persona` (`idMunicipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Direccion`, `DUI`, `NIT`, `genero`, `estadoCivil`, `FechaNacimiento`, `idMunicipio`, `estado`) VALUES
(1, 'Roberto', 'Antonio', 'Flores', 'Ayala', 'Canton El cojutillo, calle el amate #123', '02487847-2', '0215-55671-3524-1', 1, 1, '1992-02-01', 1, 1),
(2, 'Cesar', 'Ernesto', 'Iglesias', 'Cuellar', 'Canton El juancho, calle el amate #124', '02487848-2', '0215-55671-3255-1', 1, 1, '1993-02-01', 1, 1),
(3, 'Morfeo', 'Orfeo', 'Trinity', 'War', 'Canton El juancho, calle el amate #124', '02487848-2', '0215-55671-3552-1', 1, 1, '1993-02-02', 1, 1),
(4, 'Herson', 'Ernesto', 'Serrano', 'Asencio', 'Canton El juancho, calle el amate #124', '02487848-2', '0215-55671-3535-1', 1, 1, '1994-02-01', 1, 0),
(5, 'Juan', 'Pedro', 'San', 'Java', 'Canton El manguito, calle el amate #123', '12487847-2', '0216-55671-3354-1', 1, 1, '1989-02-01', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_contacto`
--

CREATE TABLE IF NOT EXISTS `persona_contacto` (
  `idPersona_Contacto` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) DEFAULT NULL,
  `idContacto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersona_Contacto`),
  KEY `fk_persona_persona_contacto` (`idPersona`),
  KEY `fk_contacto_persona_contacto` (`idContacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `persona_contacto`
--

INSERT INTO `persona_contacto` (`idPersona_Contacto`, `idPersona`, `idContacto`) VALUES
(1, 2, 1),
(2, 1, 5),
(3, 3, 4),
(4, 2, 2),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porteria_ce`
--

CREATE TABLE IF NOT EXISTS `porteria_ce` (
  `id_cambio` int(11) DEFAULT NULL,
  `factura_in` int(11) DEFAULT NULL,
  `producto_in` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_talla` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `porteria_ce`
--

INSERT INTO `porteria_ce` (`id_cambio`, `factura_in`, `producto_in`, `id_color`, `id_talla`, `fecha`) VALUES
(1, 1, 1, 3, 2, '2015-03-10'),
(4, 1, 1, 3, 2, '2015-03-12'),
(12, 1, 1, 1, 1, '1111-11-11'),
(14, 1, 1, 2, 2, '2015-03-12'),
(15, 1, 1, 1, 1, '2015-03-12'),
(16, 123, 123, 122, 123, '2015-03-13'),
(31, 1, 1, 1, 1, '2015-03-13'),
(32, 1, 1, 2, 1, '2015-03-13'),
(33, 1, 1, 6, 1, '2015-03-13'),
(34, 1, 1, 1, 1, '2015-03-13'),
(35, 1, 1, 1, 1, '2015-03-13'),
(36, 1, 1, 1, 1, '2015-03-13'),
(37, 27, 2, 3, 2, '2015-03-13'),
(NULL, 1, 1, 3, 1, '2015-04-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porteria_ci`
--

CREATE TABLE IF NOT EXISTS `porteria_ci` (
  `id_cambio` int(11) NOT NULL AUTO_INCREMENT,
  `factura_in` int(11) NOT NULL,
  `producto_in` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_cambio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `porteria_ci`
--

INSERT INTO `porteria_ci` (`id_cambio`, `factura_in`, `producto_in`, `id_color`, `id_talla`, `fecha`) VALUES
(1, 1, 1, 1, 1, '2015-04-08'),
(2, 1, 1, 4, 1, '2015-04-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE IF NOT EXISTS `premios` (
  `idpremios` int(11) NOT NULL AUTO_INCREMENT,
  `afiliado` varchar(50) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `premio` double(10,2) NOT NULL,
  `rango` varchar(50) NOT NULL,
  `pagos` int(11) NOT NULL,
  `gerente` varchar(100) NOT NULL,
  `zona` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  PRIMARY KEY (`idpremios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='lawea' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`idpremios`, `afiliado`, `monto`, `premio`, `rango`, `pagos`, `gerente`, `zona`, `cliente`) VALUES
(1, 'Afiliado', '250.00', 5.00, 'A', 0, 'Gerente 1', 'Zona 1', 'Cliente 1'),
(2, 'Afiliado 2', '300.00', 10.00, 'B', 0, 'Gerente 2', 'Zona 2', 'Cliente 2'),
(3, 'Afiliado 3', '350.00', 15.00, 'C', 0, 'Gerente 3', 'Zona 3', 'Kliente 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `estilo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `codigoOrigen` varchar(45) NOT NULL,
  `linea` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `idCatalogo` int(11) DEFAULT NULL,
  `nPag` varchar(10) DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `propiedad` varchar(45) DEFAULT NULL,
  `garantia` int(11) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`estilo`),
  KEY `FK_linea_producto` (`linea`),
  KEY `FK_proveedor_producto` (`idProveedor`),
  KEY `FK_marca_producto` (`idMarca`),
  KEY `FK_catalogo_producto` (`idCatalogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`estilo`, `nombre`, `idProveedor`, `codigoOrigen`, `linea`, `descripcion`, `idCatalogo`, `nPag`, `idMarca`, `propiedad`, `garantia`, `observacion`, `estado`) VALUES
(1, 'nombrea', 1, '25', 1, 'produto de Fila', 1, '2', 2, 'cuero', 12, 'calidad 1/2', 1),
(2, 'nombreb', 2, '25', 1, 'produto de Fila', 1, '2', 2, 'cuero', 12, 'calidad 1/2', 1),
(3, 'nombrec', 3, '25', 1, 'produto de Fila', 1, '2', 2, 'cuero', 12, 'calidad 1/2', 0),
(4, 'nombred', 4, '25', 1, 'produto de Fila', 1, '2', 2, 'cuero', 12, 'calidad 1/2', 1),
(5, 'nombree', 5, '25', 1, 'produto de Fila', 1, '2', 2, 'cuero', 12, 'calidad 1/2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_talla`
--

CREATE TABLE IF NOT EXISTS `producto_talla` (
  `idproducto_talla` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) DEFAULT NULL,
  `idtalla` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproducto_talla`),
  KEY `FK_talla_producto_talla_idx` (`idtalla`),
  KEY `FK_producto_producto_talla_idx` (`idproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `producto_talla`
--

INSERT INTO `producto_talla` (`idproducto_talla`, `idproducto`, `idtalla`) VALUES
(1, 1, 2),
(2, 2, 4),
(3, 3, 1),
(4, 4, 3),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE IF NOT EXISTS `promocion` (
  `ID_Promo` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_inicio` date NOT NULL,
  `Disponible` int(2) NOT NULL,
  `Descuento` int(3) NOT NULL,
  `Producto` varchar(45) NOT NULL,
  `Condicion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_Promo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`ID_Promo`, `Fecha_inicio`, `Disponible`, `Descuento`, `Producto`, `Condicion`) VALUES
(1, '2015-04-24', 1, 5, 'nombred', 'contado'),
(2, '2015-04-22', 9, 7, 'nombrec', 'promo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `registroFiscal` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `nomContacto` varchar(30) NOT NULL,
  `nota` varchar(200) DEFAULT NULL,
  `diasCredito` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `idPais` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`),
  KEY `FK_pais_proveedor` (`idPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `registroFiscal`, `telefono`, `nomContacto`, `nota`, `diasCredito`, `correo`, `direccion`, `nit`, `idPais`) VALUES
(1, 'NIKE', '123456-1', '22205662', 'Leticia', 'riesgo uno', 30, 'nike@gmail.com', 'calle 13 de octubre #12', '1234-123456-123-1', 1),
(2, 'CAT', '321456-2', '22307845', 'Roxana', 'dificultad dos', 30, 'cat@gmail.com', '', '', 1),
(3, 'PUMA', '875412-1', '23820215', 'Pedro', 'ayuda tres', 30, 'puma@gmail', 'avenica jerusarel casa 5', '2546-022589-574-0', 1),
(4, 'HEATHERLAND', '784521-1', '22207896', 'Amilcar', 'llegada cuatro', 30, 'heatherland@gmail', 'colonia san patricio casa 27', '1234-458967-741-3', 1),
(5, 'FILA', '321456-1', '22707412', 'Leonardo', 'Retirada cinco', 30, 'fila@gmail', 'colonia san ramon pasaje 3 casa 7', '8977-356545-123-2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE IF NOT EXISTS `recepcion` (
  `idrecepcion` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` varchar(50) NOT NULL,
  `pares` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL,
  PRIMARY KEY (`idrecepcion`),
  KEY `idproveedor` (`idproveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `recepcion`
--

INSERT INTO `recepcion` (`idrecepcion`, `idproveedor`, `pares`, `observacion`) VALUES
(4, 'NIKE', 5, '8'),
(5, 'FILA', 7, 'zapatos'),
(6, 'HEATHERLAND', 25, 'dfghj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `idSucursal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  PRIMARY KEY (`idSucursal`),
  KEY `fk_Municipio_Sucursal` (`idMunicipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idSucursal`, `nombre`, `idMunicipio`) VALUES
(1, 'uno', 1),
(2, 'dos', 6),
(3, 'tres', 8),
(4, 'cuatro', 11),
(5, 'cinco', 2),
(6, 'seis', 10),
(7, 'siete', 3),
(8, 'ocho', 4),
(9, 'nueve', 5),
(10, 'diez', 7),
(11, 'once', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE IF NOT EXISTS `talla` (
  `idtalla` int(11) NOT NULL AUTO_INCREMENT,
  `talla` varchar(10) NOT NULL,
  `genero` tinyint(1) DEFAULT NULL,
  `idcolor` int(11) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idtalla`),
  KEY `FK_color_talla` (`idcolor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`idtalla`, `talla`, `genero`, `idcolor`, `precio`) VALUES
(1, '30', 1, 1, '25.00'),
(2, '35', 1, 2, '25.00'),
(3, '40', 1, 3, '22.00'),
(4, '38', 1, 4, '21.00'),
(5, '38', 1, 1, '25.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_bodega`
--

CREATE TABLE IF NOT EXISTS `talla_bodega` (
  `idProducto_Bodega` int(11) NOT NULL AUTO_INCREMENT,
  `idBodega` int(11) DEFAULT NULL,
  `idProducto_Talla` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProducto_Bodega`),
  KEY `fk_bodega_producto_bodega` (`idBodega`),
  KEY `fk_producto_talla_talla_bodega` (`idProducto_Talla`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `talla_bodega`
--

INSERT INTO `talla_bodega` (`idProducto_Bodega`, `idBodega`, `idProducto_Talla`, `stock`) VALUES
(1, 1, 5, 15),
(2, 2, 4, 18),
(3, 3, 2, 11),
(4, 4, 3, 13),
(5, 5, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontacto`
--

CREATE TABLE IF NOT EXISTS `tipocontacto` (
  `idTipoContacto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoContacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipocontacto`
--

INSERT INTO `tipocontacto` (`idTipoContacto`, `Nombre`) VALUES
(1, 'Telefono'),
(2, 'Celular'),
(3, 'Fax');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `gerente` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `zona` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(140) COLLATE utf8_spanish2_ci NOT NULL,
  `cliente` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `dia` date NOT NULL,
  `metas` double(10,2) NOT NULL,
  PRIMARY KEY (`idventa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='ctmwnqliao' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `gerente`, `zona`, `departamento`, `cliente`, `dia`, `metas`) VALUES
(1, 'Gerente 1', 'Zona 1', 'depto 1', 'cliente 1', '2015-04-01', 350.00),
(2, 'Gerente 2', 'Zona 2', 'depto 2', 'cliente 2', '2015-04-02', 250.00),
(3, 'A gerente', 'A Zona', 'A dep', 'A clien', '2015-04-03', 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `idZona` int(11) NOT NULL AUTO_INCREMENT,
  `idMunicipio` int(11) DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idZona`),
  KEY `fk_empelado_zona` (`idEmpleado`),
  KEY `fk_municipio_zona` (`idMunicipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idZona`, `idMunicipio`, `idEmpleado`) VALUES
(1, 2, 1),
(2, 1, 5),
(3, 3, 4),
(4, 2, 2),
(5, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `FK_Empleado_bitacora` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_bitacora` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`estilo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD CONSTRAINT `fk_sucursal_bodega` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_persona_cliente` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_tipocontacto_contaco` FOREIGN KEY (`idTipoContacto`) REFERENCES `tipocontacto` (`idTipoContacto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_pais_departamento` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleordendecompra`
--
ALTER TABLE `detalleordendecompra`
  ADD CONSTRAINT `FK_OrdenDeCompra` FOREIGN KEY (`idOrdenDeCompra`) REFERENCES `ordendecompra` (`idOrdenDeCompra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_talla_DetalleOrdenCompra` FOREIGN KEY (`idproducto_talla`) REFERENCES `producto_talla` (`idproducto_talla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleordendeventa`
--
ALTER TABLE `detalleordendeventa`
  ADD CONSTRAINT `fk_DetalleOrdenDeVenta_OrdenDeVenta` FOREIGN KEY (`idOrdenDeVenta`) REFERENCES `ordendeventa` (`idOrdenDeVenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_talla_DetalleOrdenDeVenta` FOREIGN KEY (`idproducto_talla`) REFERENCES `producto_talla` (`idproducto_talla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_persona_empleado` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_departamento_municipio` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordendecompra`
--
ALTER TABLE `ordendecompra`
  ADD CONSTRAINT `FK_proveedor_OrdenDeCompra` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordendeventa`
--
ALTER TABLE `ordendeventa`
  ADD CONSTRAINT `fk_cliente_ordenDeCompra` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_municipio_persona` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  ADD CONSTRAINT `fk_contacto_persona_contacto` FOREIGN KEY (`idContacto`) REFERENCES `contacto` (`idContacto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_persona_contacto` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_catalogo_producto` FOREIGN KEY (`idCatalogo`) REFERENCES `catalogo` (`idcatalogo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_linea_producto` FOREIGN KEY (`linea`) REFERENCES `linea` (`idlinea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_marca_producto` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_proveedor_producto` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_talla`
--
ALTER TABLE `producto_talla`
  ADD CONSTRAINT `FK_producto_producto_talla` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`estilo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_talla_producto_talla` FOREIGN KEY (`idtalla`) REFERENCES `talla` (`idtalla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `FK_pais_proveedor` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_Municipio_Sucursal` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla`
--
ALTER TABLE `talla`
  ADD CONSTRAINT `FK_color_talla` FOREIGN KEY (`idcolor`) REFERENCES `color` (`idcolor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla_bodega`
--
ALTER TABLE `talla_bodega`
  ADD CONSTRAINT `fk_bodega_producto_bodega` FOREIGN KEY (`idBodega`) REFERENCES `bodega` (`idBodega`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_talla_talla_bodega` FOREIGN KEY (`idProducto_Talla`) REFERENCES `producto_talla` (`idproducto_talla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `fk_empelado_zona` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_municipio_zona` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
