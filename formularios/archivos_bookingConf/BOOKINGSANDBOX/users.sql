-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2022 a las 19:00:18
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u101685278_tcargocomex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(29) NOT NULL,
  `Created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `empresa` varchar(255) NOT NULL,
  `permiso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `photo`, `email`, `pass`, `celular`, `name`, `last_name`, `Created_at`, `empresa`, `permiso`) VALUES
(41, 'TCARGO', '', 'tcargocomex@botzero.tech', '2427ac1227347930b9c5412ca729f502', 5492612128105, 'TCargo', 'Comex', '2022-05-26 12:50:09.956256', 'TCargoComex', 'Traffic'),
(42, 'TCARGO CUSTOMER', '', 'priopelliza@gmail.com', 'c31d7c9fee9b5829aed1486a82516c20', 5492612128105, 'Customer', 'TCargo', '2022-05-27 14:22:43.525580', 'TCargoComex', 'Customer'),
(43, 'Armando', '', 'armando.moron@t-cargo.com.ar', '960b83647b70f69bcbfc36986f1bf082', 5492616943373, 'Armando', 'Morón', '2022-06-03 15:35:03.224439', 'TCARGO ARGENTINA SA', 'Master'),
(44, 'MASTER', '', 'priopelliza2@gmail.com', 'c31d7c9fee9b5829aed1486a82516c20', 5492612128105, 'Master', 'TCargo', '2022-05-27 14:22:43.525580', 'TCargoComex', 'Master');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
