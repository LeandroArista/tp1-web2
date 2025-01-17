-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2019 a las 01:15:24
-- Versión del servidor: 10.4.8-MariaDB
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
(1, 'Falcon1', '2006-06-24', 21, 2, 38, 1),
(2, 'Falcon9', '2010-06-04', 70, 3, 549, 1),
(3, 'Electron', '2007-05-25', 17, 1, 100, 2),
(4, 'Proton', '1965-07-16', 53, 7, 657, 3),
(5, 'Falcon Heavy', '2018-02-06', 70, 3, 1420, 1),
(6, 'New Glen 2-Stage', '2020-11-23', 30, 30, 300, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `texto` text NOT NULL,
  `fecha` datetime NOT NULL,
  `puntaje` tinyint(4) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cohete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `texto`, `fecha`, `puntaje`, `id_usuario`, `id_cohete`) VALUES
(2, 'esta bueno esto', '2019-11-13 17:38:02', 5, 2, 1),
(3, 'mi vieja mula ya no es lo que era', '2019-11-13 17:38:25', 5, 2, 1),
(5, 'esto funca', '2019-11-13 18:48:00', 2, 2, 1),
(8, 'es nuevo esta bueno', '2019-11-14 19:22:02', 3, 2, 2),
(9, 'estoy borrando por un sueño', '2019-11-14 20:49:59', 1, 5, 1),
(11, 'que hago aca', '2019-11-14 21:01:32', 2, 4, 1),
(12, 'esta andando todo ', '2019-11-19 21:11:36', 3, 5, 1),
(13, 'le falta css', '2019-11-19 21:12:43', 1, 5, 2);

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
(1, 'Spacex', 'Elon Musk', 'EEUU', '2002-05-06'),
(2, 'Rocket Lab', 'Peter Beck', 'EEUU', '2006-06-01'),
(3, 'International Launch Services', 'Frank McKenna', 'Rusia', '1993-04-15'),
(4, 'Blue Origin', ' Jeff Bezos', 'EEUU', '2000-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoscohetes`
--

CREATE TABLE `fotoscohetes` (
  `id_imagen` int(11) NOT NULL,
  `ruta` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_cohete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotoscohetes`
--

INSERT INTO `fotoscohetes` (`id_imagen`, `ruta`, `id_cohete`) VALUES
(9, 'img/5dc8da0e1cb5b.jpg', 2),
(10, 'img/5dc8da0e1e0d5.jpg', 2),
(11, 'img/5dc8da7d2c90a.jpg', 3),
(12, 'img/5dc8da7d2df22.jpg', 3),
(13, 'img/5dc8daffec165.jpg', 4),
(14, 'img/5dc8daffed3ed.jpg', 4),
(15, 'img/5dc8daffee5ab.jpg', 4),
(16, 'img/5dc8db6e6ee66.jpg', 5),
(18, 'img/5dc8db6e70f47.jpg', 5),
(21, 'img/5dc8deb496186.jpg', 6),
(22, 'img/5dc8def8e7405.jpg', 1),
(23, 'img/5dc8def8f2564.jpg', 1),
(24, 'img/5dc8df3285b9d.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `mail`, `clave`, `administrador`) VALUES
(1, 'usuario1', 'usuario1@gmail.com', '$2y$10$Q2OzG2UEQSd9SJhe1A0lp.xHLBRoUc6JfTImZ5Wn92y6fIfnQ0zvi', 1),
(2, 'usuario2', 'usuario2@gmail.com', '$2y$10$t57LTOFTEsivTZ8DMrqoLONpwpmGFMhSg/9ylKcLLS2Mh.77Lzali', 0),
(4, 'usuario3', 'usuario3@gmail.com', '$2y$10$0WmfGBXXN29Oz8XdHpO/ROWQVj5BaZrDzWQe9kiryEUsvDFiTmfTq', 0),
(5, 'leandro', 'leandroalbertoarista@gmail.com', '$2y$10$zMk62Udd55dCPsxcNG0E4OFBGgTEngE9XYC5cYkkjbjhAkxUpyMDC', 1);

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
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `fotoscohetes`
--
ALTER TABLE `fotoscohetes`
  ADD PRIMARY KEY (`id_imagen`);

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
  MODIFY `id_cohete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fotoscohetes`
--
ALTER TABLE `fotoscohetes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
