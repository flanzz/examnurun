-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2017 a las 01:10:39
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gifs`
--

CREATE TABLE `gifs` (
  `idgif` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `ruta` varchar(1000) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gifs`
--

INSERT INTO `gifs` (`idgif`, `iduser`, `ruta`, `fecha`) VALUES
(6, 1, '../gifs/117-04-07giphy(1).gif', '2017-04-07 00:00:00'),
(7, 1, '../gifs/117-04-07giphy(2).gif', '2017-04-07 00:00:00'),
(8, 1, '../gifs/117-04-07giphy(3).gif', '2017-04-07 00:00:00'),
(11, 1, '../gifs/117-04-083M4NpbLCTxBqU.gif', '2017-04-08 00:00:00'),
(15, 1, '../gifs/117-04-08giphy(4).gif', '2017-04-08 00:00:00'),
(16, 1, '../gifs/117-04-08giphy.gif', '2017-04-08 00:00:00'),
(17, 1, '../gifs/117-04-09giphy(5).gif', '2017-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

CREATE TABLE `revision` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `rutagif` varchar(200) NOT NULL,
  `valor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `revision`
--

INSERT INTO `revision` (`id`, `iduser`, `rutagif`, `valor`) VALUES
(1, 1, '../gifs/117-04-08giphy.gif', 0),
(2, 1, '../gifs/117-04-09giphy(5).gif', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellido_paterno` varchar(15) NOT NULL,
  `apellido_materno` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla de usuarios';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `usuario`, `contrasena`) VALUES
(1, 'victor', 'mexicano', 'mondragon', 'vmmexicano@gmail.com', 'vmmexicano', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Rodrigo', 'Hernandez', 'Morales', 'electro001_@hotmail.com', 'Rodrigo', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Fer', 'Rueda', 'Olivar', 'fer@gmail.com', 'Fer', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Omar', 'Chaparro', 'Seron', 'omar@gmail.com', 'Omar', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gifs`
--
ALTER TABLE `gifs`
  ADD PRIMARY KEY (`idgif`);

--
-- Indices de la tabla `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gifs`
--
ALTER TABLE `gifs`
  MODIFY `idgif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
