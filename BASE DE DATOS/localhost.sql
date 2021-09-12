-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-09-2021 a las 22:32:26
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--
CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `agenda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_departamento`
--

CREATE TABLE `cat_departamento` (
  `cod_depto` int(10) NOT NULL COMMENT 'Codigo del departamento',
  `des_depto` varchar(150) NOT NULL COMMENT 'Nombre del departamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla catalogo que almcena los departamentos';

--
-- Volcado de datos para la tabla `cat_departamento`
--

INSERT INTO `cat_departamento` (`cod_depto`, `des_depto`) VALUES
(1, 'Contabilidad'),
(2, 'Recusos Humanos'),
(4, 'Auditoria'),
(6, 'Gerencia General'),
(7, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_tipoempresa`
--

CREATE TABLE `cat_tipoempresa` (
  `cod_empresa` int(10) NOT NULL COMMENT 'Campo que almacena el codigo tipo empresa del telefono.',
  `des_empresa` varchar(150) NOT NULL COMMENT 'Descripcion del tipo de empresa del telefono.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla tipo catalogo que almacena los tipos de empresa de tel';

--
-- Volcado de datos para la tabla `cat_tipoempresa`
--

INSERT INTO `cat_tipoempresa` (`cod_empresa`, `des_empresa`) VALUES
(1, 'Claro'),
(2, 'Tigo'),
(3, 'Movistar'),
(4, 'Tuenti');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_tipotelefono`
--

CREATE TABLE `cat_tipotelefono` (
  `cod_tipo` int(10) NOT NULL COMMENT 'Codigo del tipo de telefono',
  `des_tipo` varchar(150) NOT NULL COMMENT 'Descripcion del tipo de telefono'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Catalogo de tipos de telefono';

--
-- Volcado de datos para la tabla `cat_tipotelefono`
--

INSERT INTO `cat_tipotelefono` (`cod_tipo`, `des_tipo`) VALUES
(18, 'Personal'),
(19, 'Laboral'),
(20, 'Familiar'),
(21, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cod_persona` int(10) NOT NULL COMMENT 'Codigo de persona',
  `primer_nombre` varchar(100) NOT NULL COMMENT 'Primer nombre',
  `segundo_nombre` varchar(100) DEFAULT NULL COMMENT 'Segundo nombre',
  `primer_apellido` varchar(100) NOT NULL COMMENT 'Primer apellido',
  `segundo_apellido` varchar(100) DEFAULT NULL COMMENT 'Segundo apellido',
  `cod_depto` int(10) DEFAULT NULL COMMENT 'Codigo de departamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cod_persona`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cod_depto`) VALUES
(17, 'Cinthya ', 'Marisol', 'Yax', '', 7),
(18, 'Pedro', '', 'Perez', '', 4),
(19, 'Luis', 'Antonio', 'Lopez', 'Lopez', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_personatelefono`
--

CREATE TABLE `registro_personatelefono` (
  `num_telefono` int(10) NOT NULL COMMENT 'Campo que registra el numero telefónico por persona',
  `cod_persona` int(10) NOT NULL COMMENT 'Campo que registra a la persona.',
  `cod_tipo` int(10) NOT NULL COMMENT 'Campo que registra el tipo de telefono.',
  `cod_empresa` int(10) DEFAULT NULL COMMENT 'Campo que registra la empresa telefonica',
  `des_extension` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Campo que registra la extensión telefónica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla tipo registro que almacena el telefono por persona';

--
-- Volcado de datos para la tabla `registro_personatelefono`
--

INSERT INTO `registro_personatelefono` (`num_telefono`, `cod_persona`, `cod_tipo`, `cod_empresa`, `des_extension`) VALUES
(22585050, 19, 19, 3, '123'),
(37325786, 17, 18, 2, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_departamento`
--
ALTER TABLE `cat_departamento`
  ADD PRIMARY KEY (`cod_depto`);

--
-- Indices de la tabla `cat_tipoempresa`
--
ALTER TABLE `cat_tipoempresa`
  ADD PRIMARY KEY (`cod_empresa`);

--
-- Indices de la tabla `cat_tipotelefono`
--
ALTER TABLE `cat_tipotelefono`
  ADD PRIMARY KEY (`cod_tipo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cod_persona`);

--
-- Indices de la tabla `registro_personatelefono`
--
ALTER TABLE `registro_personatelefono`
  ADD PRIMARY KEY (`num_telefono`,`cod_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_departamento`
--
ALTER TABLE `cat_departamento`
  MODIFY `cod_depto` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del departamento', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cat_tipoempresa`
--
ALTER TABLE `cat_tipoempresa`
  MODIFY `cod_empresa` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Campo que almacena el codigo tipo empresa del telefono.', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cat_tipotelefono`
--
ALTER TABLE `cat_tipotelefono`
  MODIFY `cod_tipo` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de telefono', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `cod_persona` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de persona', AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
