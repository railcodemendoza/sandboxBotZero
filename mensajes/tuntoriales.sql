-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2017 a las 20:25:14
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tuntoriales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `leido` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `titulo`, `mensaje`, `de`, `para`, `fecha`, `leido`, `estado`) VALUES
(1, 'dcdaf', 'fwsfgsf', 2, 1, '2017-04-24 22:30:40', 0, 'eliminado'),
(2, 'Hola', 'Hola pikaman', 3, 1, '2017-04-24 22:32:27', 0, 'normal'),
(3, 'Oferta el 20% de dcto', 'Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta Oferta ', 2, 1, '2017-04-24 22:48:40', 0, 'normal'),
(4, 'prueba de no leido', 'erwgfgwsa', 3, 1, '2017-04-24 22:51:31', 0, 'eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `avatar`, `fecha_reg`) VALUES
(1, 'tuntoriales', '4d186321c1a7f0f354b297e8914ab240', 'images/default.png', '2017-04-19'),
(2, 'pikaman', '4d186321c1a7f0f354b297e8914ab240', 'images/pikabob.png', '2017-04-12'),
(3, 'bot', '4d186321c1a7f0f354b297e8914ab240', 'images/pig.png', '2017-04-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
