-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2019 a las 00:56:31
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tpespecial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cohetes`
--

CREATE TABLE `cohetes` (
  `id_cohete` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `altura` int(11) NOT NULL,
  `diametro` int(11) NOT NULL,
  `masa` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cohetes`
--

INSERT INTO `cohetes` (`id_cohete`, `nombre`, `fecha_creacion`, `altura`, `diametro`, `masa`, `id_empresa`) VALUES
(1, 'falcon1', '2006-06-24', 21, 2, 38, 1),
(2, 'falcon9', '2010-06-04', 70, 3, 549, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `propietario` varchar(60) NOT NULL,
  `pais` varchar(60) NOT NULL,
  `fecha_fundacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `propietario`, `pais`, `fecha_fundacion`) VALUES
(1, 'spacex', 'elon musk', 'eeuu', '2002-05-06'),
(2, 'Rocket Lab', 'Peter Beck', 'eeuu', '2006-06-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `mail`, `clave`) VALUES
(1, 'usuario1', 'usuario1@gmail.com', '$2y$10$Q2OzG2UEQSd9SJhe1A0lp.xHLBRoUc6JfTImZ5Wn92y6fIfnQ0zvi'),
(2, 'usuario2', 'usuario2@gmail.com', '$2y$10$t57LTOFTEsivTZ8DMrqoLONpwpmGFMhSg/9ylKcLLS2Mh.77Lzali');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cohetes`
--
ALTER TABLE `cohetes`
  ADD PRIMARY KEY (`id_cohete`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cohetes`
--
ALTER TABLE `cohetes`
  MODIFY `id_cohete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cohetes`
--
ALTER TABLE `cohetes`
  ADD CONSTRAINT `cohetes_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
