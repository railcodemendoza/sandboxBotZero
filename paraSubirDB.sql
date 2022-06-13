-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2022 a las 15:27:30
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
-- Estructura de tabla para la tabla `aduanas`
--

CREATE TABLE `aduanas` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km_from_town` int(11) NOT NULL,
  `link_maps` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `aduanas`
--

INSERT INTO `aduanas` (`id`, `description`, `pais`, `created_at`, `provincia`, `km_from_town`, `link_maps`) VALUES
(1, 'PTM', 'Argentina', '0000-00-00 00:00:00', 'Mendoza, AR', 0, 'https://www.google.es/maps?q=-32.932199, -68.805068'),
(2, 'Puerto Seco', 'Argentina', '0000-00-00 00:00:00', 'Mendoza, AR', 0, 'https://www.google.es/maps?q=-32.936154, -68.826932'),
(3, 'Mar Cantabrico SA', 'Argentina', '0000-00-00 00:00:00', 'Mendoza, AR', 0, 'https://www.google.es/maps?q=-32.933800, -68.826720'),
(4, 'TRAC SA', 'Argentina', '0000-00-00 00:00:00', 'Mendoza, AR', 0, 'https://www.google.es/maps?q=-32.947156, -68.734942'),
(5, 'Sarmiento San Juan', 'Argentina', '0000-00-00 00:00:00', 'San Juan, AR', 0, 'https://www.google.es/maps?q=-32.000819, -68.441590'),
(6, 'ZPA VILLA MERCEDES', 'ARGENTINA ', '2022-06-03 16:01:11', 'SAN LUIS', 0, 'https://www.google.es/maps?q=-33.64122484471936, -65.52932234092175'),
(7, 'DFC CORDOBA', 'ARGENTINA ', '2022-06-03 16:02:57', 'CORDOBA', 0, 'https://www.google.es/maps?q=-31.375231221391676, -64.07610684467404'),
(8, 'PTLA ', 'CHILE', '2022-06-03 16:08:22', 'LOS ANDES', 0, 'https://www.google.es/maps?q=-32.83661521012171, -70.5480049753141'),
(9, 'PINO HACHADO ', 'CHILE', '2022-06-03 16:08:22', 'LONQUIMAY', 0, 'https://www.google.es/maps?q=-38.64595660006634, -71.08756768906795');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puerto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observation_gral` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asign`
--

CREATE TABLE `asign` (
  `id` int(11) NOT NULL,
  `driver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cntr_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `booking` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `truck` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `truck_semi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transport_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observation_load` text COLLATE utf8_unicode_ci NOT NULL,
  `file_instruction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agent_port` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ata`
--

CREATE TABLE `ata` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` bigint(11) NOT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` bigint(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calification_customer`
--

CREATE TABLE `calification_customer` (
  `id` int(11) NOT NULL,
  `calification_customer` int(2) NOT NULL,
  `cntr_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `booking` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calification_driver`
--

CREATE TABLE `calification_driver` (
  `id` int(11) NOT NULL,
  `calification_driver` int(2) NOT NULL,
  `cntr_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `booking` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calification_transport`
--

CREATE TABLE `calification_transport` (
  `id` int(11) NOT NULL,
  `calification_transport` int(2) NOT NULL,
  `cntr_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `booking` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `id` int(11) NOT NULL,
  `booking` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `shipper` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commodity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `load_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `load_date` date NOT NULL,
  `unload_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cut_off_fis` datetime NOT NULL,
  `cut_off_doc` date NOT NULL,
  `oceans_line` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vessel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voyage` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `final_point` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ETA` date NOT NULL,
  `ETD` date NOT NULL,
  `consignee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notify` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom_place_impo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custom_agent_impo` int(11) NOT NULL,
  `ref_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referencia_carga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observation_customer` text COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO ASIGNED',
  `big_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `document_bookingConf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `vto_carnet` date NOT NULL,
  `WhatsApp` bigint(20) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transporte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_chofer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Observaciones` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cntr`
--

CREATE TABLE `cntr` (
  `id_cntr` int(11) NOT NULL,
  `booking` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cntr_number` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cntr_seal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cntr_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_weight` int(11) NOT NULL,
  `retiro_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `set_` int(11) NOT NULL,
  `set_humidity` int(11) NOT NULL,
  `set_vent` int(11) NOT NULL,
  `document_invoice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_packing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_cntr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_cntr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO ASIGNED',
  `in_usd` decimal(11,2) NOT NULL,
  `company_invoice_out` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modo_pago_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plazo_de_pago_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `out_usd` decimal(11,2) NOT NULL,
  `plazo_de_pago_out` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modo_pago_out` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `interchange` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cntr_crt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cntr_micdta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profit` decimal(11,2) NOT NULL,
  `calificacion_carga` int(2) DEFAULT NULL,
  `feedback_customer` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cntr_type`
--

CREATE TABLE `cntr_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teu` int(11) NOT NULL,
  `weight` decimal(11,2) NOT NULL,
  `height` decimal(11,2) NOT NULL,
  `width` decimal(11,2) NOT NULL,
  `longitud` decimal(11,2) NOT NULL,
  `observation` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cntr_type`
--

INSERT INTO `cntr_type` (`id`, `title`, `teu`, `weight`, `height`, `width`, `longitud`, `observation`, `created_at`, `user`, `company`) VALUES
(1, '20 DRY', 1, '2300.00', '2.50', '2.40', '6.00', '', 0, 'USER', 'TCargoComex'),
(2, '40 DRY', 2, '3500.00', '2.60', '2.40', '12.00', '', 0, 'USER', 'TCargoComex'),
(3, '20 AF', 1, '2300.00', '2.50', '2.40', '6.00', '', 0, 'USER', 'TCargoComex'),
(5, '40 RF', 2, '3500.00', '2.60', '2.40', '12.00', '', 0, 'USER', 'TCargoComex'),
(6, '40 RHC', 2, '3500.00', '2.89', '2.40', '12.00', '', 0, 'USER', 'TCargoComex'),
(9, '40 OT', 2, '2000.00', '2.59', '2.44', '12.00', '', 0, 'USER', 'TCargoComex'),
(10, 'Carga Suelta', 0, '0.00', '0.00', '0.00', '0.00', '', 0, '', 'TCargoComex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commodity`
--

CREATE TABLE `commodity` (
  `id` int(11) NOT NULL,
  `commodity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `commodity`
--

INSERT INTO `commodity` (`id`, `commodity`, `user`, `created_at`, `company`) VALUES
(1, 'SUGAR', 'USER', '2020-09-02 14:00:20', 'TCargoComex'),
(2, 'MAIZ PARTIDO', 'DATABASE', '2022-06-03 15:43:23', ''),
(3, 'MUEBLES', 'DATABASE', '2022-06-03 15:43:34', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer.cnee`
--

CREATE TABLE `customer.cnee` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` bigint(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `create_user` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer.ntfy`
--

CREATE TABLE `customer.ntfy` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` bigint(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `create_user` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer.shipper`
--

CREATE TABLE `customer.shipper` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` bigint(30) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `create_user` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_load_place`
--

CREATE TABLE `customer_load_place` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_maps` text COLLATE utf8_unicode_ci NOT NULL,
  `lat_lon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km_from_town` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_unload_place`
--

CREATE TABLE `customer_unload_place` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_maps` text COLLATE utf8_unicode_ci NOT NULL,
  `lat_lon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km_from_town` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custom_agent`
--

CREATE TABLE `custom_agent` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` bigint(11) NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `custom_agent`
--

INSERT INTO `custom_agent` (`id`, `razon_social`, `tax_id`, `pais`, `provincia`, `created_at`, `mail`, `phone`, `user`, `empresa`) VALUES
(1, 'LGA Despa', 30710087911, 'Argentina', 'Mendoza', '2022-05-26 19:54:57', 'lga@estudioabel.com.ar', 2614311898, 'TCARGO', 'TCargoComex'),
(2, 'Sul Mineira SA', 30710087912, 'Argentina', 'Mendoza', '2020-09-02 14:00:52', 'info@sulmineira.com', 2614311898, 'USER', 'Total Trade Group'),
(3, 'Fontana', 30710087913, 'Argentina', 'Mendoza', '2020-09-02 14:00:52', 'info@fontana.com', 2614311898, 'USER', 'Total Trade Group'),
(4, 'Estudio Traetta', 30710087914, 'Argentina', 'Mendoza', '2020-09-02 14:00:52', 'info@traetta.com.ar', 2614311898, 'USER', 'Total Trade Group'),
(5, 'All IN', 30710087915, 'Argentina', 'Mendoza', '2020-09-02 14:00:52', 'Info@allin.com.ar', 2614311898, 'USER', 'Total Trade Group'),
(6, 'Clement y Asociados SRL', 30710087916, 'Argentina', 'Mendoza', '2020-09-02 14:00:52', 'info@clemente.ar', 2614311898, 'USER', 'Total Trade Group'),
(7, 'Herrero & Asoc', 30710087917, 'Argentina', 'San Juan', '2020-09-02 14:00:52', 'info@herrero.com.ar', 2614311898, 'USER', 'Total Trade Group');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos_de_retiro`
--

CREATE TABLE `depositos_de_retiro` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km_from_town` int(11) NOT NULL,
  `lat_lon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_maps` text COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `depositos_de_retiro`
--

INSERT INTO `depositos_de_retiro` (`id`, `title`, `address`, `country`, `city`, `km_from_town`, `lat_lon`, `link_maps`, `user`, `empresa`, `created_at`) VALUES
(1, 'TPS VALPARAISO j', 'Antonio Varas 2, Valparaiso', 'Chile ', 'Valparaiso', 0, '-33.033709, 71.629729', 'https://www.google.es/maps?q=-33.033709, 71.629729', 'TCARGO', 'TCargoComex', '2022-05-26 19:55:54'),
(2, 'SITRANS SAN ANTONIO', 'San Anotnio ', 'Chile ', 'Valparaiso', 0, '-33.592411, -71.586848', 'https://www.google.es/maps?q=-33.592411, -71.586848', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(3, 'CONTOPSA SAN ANTONIO', 'Av. Las Factorias 8150, San Antonio', 'Chile ', 'Valparaiso', 0, '-33.576035, -71.536752', 'https://www.google.es/maps?q=-33.576035, -71.536752', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(4, 'PRONAVE SA', 'Montevideo 545, Mendoza', 'Argentina', 'Mendoza', 0, '-32.967099, -68.875468', 'https://www.google.es/maps?q=-32.967099, -68.875468', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(5, 'EXOLGAN SA', 'Manual Alberti 4, Dock Sud Prov. BA', 'Argentina', 'Buenos Aires', 0, '-34.641978, -58.348184', 'https://www.google.es/maps?q=-34.641978, -58.348184', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(6, 'DYC SANTIAGO ', 'Pudahuel, Region Metropolitana', 'Chile ', 'Santiago', 0, '-33.429545, -70.821136', 'https://www.google.es/maps?q=-33.429545, -70.821136', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(7, 'SUD CONTAINERS S.A.', 'Gral. Gutierres 88, Coquimbito - Maipu', 'Argentina', 'Mendoza', 0, '-32.969711, -68.777957', 'https://www.google.es/maps?q=-32.969711, -68.777957', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(8, 'SAAM SAN ANTONIO', 'Pablo Neruda 289, San Antonio', 'Chile ', 'Valparaiso', 0, '-33.602502, -71.618800', 'https://www.google.es/maps?q=-33.602502, -71.618800', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(9, 'SAAM VALPARAISO', 'Blanco 937', 'Chile ', 'Valparaiso', 0, '-33.038376, -71.625899', 'https://www.google.es/maps?q=-33.038376, -71.625899', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(10, 'DYC SAN ANTONIO', 'Ruta G94 F Nuevo Acceso al Puerto 35590, Barrio Industrial', 'Chile ', 'Valparaiso', 0, '-33.588609, -71.584687', 'https://www.google.es/maps?q=-33.588609, -71.584687', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(11, 'DYC VALPARAISO', 'Camino La Polvora, ', 'Chile ', 'Valparaiso', 0, ' -33.069810, -71.636814', 'https://www.google.es/maps?q=-33.069810, -71.636814', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17'),
(12, 'TRANSPORTE MOSCA SA ', 'Neuquen 98, Mendoza', 'Argentina', 'Mendoza', 0, '-32.865488, -68.830979', 'https://www.google.es/maps?q=-32.865488, -68.830979', 'USER ', 'Total Trade Group', '2020-09-02 14:01:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CUIT` bigint(11) NOT NULL,
  `IIBB` int(255) NOT NULL,
  `mail_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_logistic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_logistic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cel_admin` bigint(20) NOT NULL,
  `cel_logistic` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instruction`
--

CREATE TABLE `instruction` (
  `id` int(11) NOT NULL,
  `booking` varchar(255) NOT NULL,
  `cntr_number` varchar(255) NOT NULL,
  `type_instruction` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `packing_number` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `transport_agent` varchar(255) NOT NULL,
  `port_agent` varchar(255) NOT NULL,
  `transport_driver` varchar(255) NOT NULL,
  `mic_dta` varchar(255) NOT NULL,
  `doc_mic_dta` blob NOT NULL,
  `crt` varchar(255) NOT NULL,
  `doc_crt` blob NOT NULL,
  `out_usd` int(11) NOT NULL,
  `rs_invoice_out` varchar(255) NOT NULL,
  `modo_de_pago_out` varchar(255) NOT NULL,
  `plazo_de_pago_out` varchar(255) NOT NULL,
  `observation_payment_out` varchar(255) NOT NULL,
  `user_instruction` varchar(255) NOT NULL,
  `file_instruction` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modos_de_pago`
--

CREATE TABLE `modos_de_pago` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_to` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sta_carga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_create` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `company_create` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cntr_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `booking` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocean_lines`
--

CREATE TABLE `ocean_lines` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `andress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ocean_lines`
--

INSERT INTO `ocean_lines` (`id`, `razon_social`, `pais`, `tax_id`, `user`, `empresa`, `created_at`, `andress`, `mail`) VALUES
(1, 'HAMBURG SUD', 'ALEMANIA', 8900090, 'DATABASE', 'T-CARGO COMEX', '2022-06-01 14:41:45', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazos_de_pago`
--

CREATE TABLE `plazos_de_pago` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `port`
--

CREATE TABLE `port` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `link_maps` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `km_from_frontier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profit`
--

CREATE TABLE `profit` (
  `id` int(11) NOT NULL,
  `cntr_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `in_usd` decimal(11,2) NOT NULL,
  `in_razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_detalle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `out_usd` decimal(11,2) NOT NULL,
  `out_razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `out_detalle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon_social`
--

CREATE TABLE `razon_social` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` bigint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cntr_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_type`
--

CREATE TABLE `status_type` (
  `id` int(11) NOT NULL,
  `STATUS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `status_type`
--

INSERT INTO `status_type` (`id`, `STATUS`, `description`, `created_at`, `user`) VALUES
(1, 'ASIGNADA', '0', 0, 'USER'),
(2, 'YENDO A CARGAR', '0', 0, 'USER'),
(3, 'CARGANDO', '0', 0, 'USER'),
(4, 'EN ADUANA', '0', 0, 'USER'),
(5, 'YENDO A DESCARGAR', '0', 0, 'USER'),
(6, 'STACKING', '0', 0, 'USER'),
(7, 'CON PROBLEMA', '0', 0, 'USER'),
(8, 'ON BOARD', '0', 0, 'USER'),
(9, 'NO ASIGNADA', '0', 0, 'USER'),
(10, 'TERMINADA', '', 0, 'USER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_unidades`
--

CREATE TABLE `tipo_de_unidades` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CUIT` bigint(11) NOT NULL,
  `Direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contacto_logistica_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contacto_logistica_celular` bigint(30) NOT NULL,
  `contacto_logistica_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contacto_admin_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contacto_admin_celular` bigint(20) NOT NULL,
  `contacto_admin_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aduanas`
--
ALTER TABLE `aduanas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asign`
--
ALTER TABLE `asign`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cntr_number` (`cntr_number`),
  ADD KEY `cntr_number_2` (`cntr_number`);

--
-- Indices de la tabla `ata`
--
ALTER TABLE `ata`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calification_customer`
--
ALTER TABLE `calification_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calification_driver`
--
ALTER TABLE `calification_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calification_transport`
--
ALTER TABLE `calification_transport`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking` (`booking`);

--
-- Indices de la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cntr`
--
ALTER TABLE `cntr`
  ADD PRIMARY KEY (`id_cntr`);

--
-- Indices de la tabla `cntr_type`
--
ALTER TABLE `cntr_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer.cnee`
--
ALTER TABLE `customer.cnee`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer.ntfy`
--
ALTER TABLE `customer.ntfy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer.shipper`
--
ALTER TABLE `customer.shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer_load_place`
--
ALTER TABLE `customer_load_place`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customer_unload_place`
--
ALTER TABLE `customer_unload_place`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `custom_agent`
--
ALTER TABLE `custom_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `depositos_de_retiro`
--
ALTER TABLE `depositos_de_retiro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instruction`
--
ALTER TABLE `instruction`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modos_de_pago`
--
ALTER TABLE `modos_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ocean_lines`
--
ALTER TABLE `ocean_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plazos_de_pago`
--
ALTER TABLE `plazos_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `razon_social`
--
ALTER TABLE `razon_social`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status_type`
--
ALTER TABLE `status_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aduanas`
--
ALTER TABLE `aduanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asign`
--
ALTER TABLE `asign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ata`
--
ALTER TABLE `ata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calification_customer`
--
ALTER TABLE `calification_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calification_driver`
--
ALTER TABLE `calification_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calification_transport`
--
ALTER TABLE `calification_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cntr`
--
ALTER TABLE `cntr`
  MODIFY `id_cntr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cntr_type`
--
ALTER TABLE `cntr_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `commodity`
--
ALTER TABLE `commodity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `customer.cnee`
--
ALTER TABLE `customer.cnee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customer.ntfy`
--
ALTER TABLE `customer.ntfy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customer.shipper`
--
ALTER TABLE `customer.shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customer_load_place`
--
ALTER TABLE `customer_load_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customer_unload_place`
--
ALTER TABLE `customer_unload_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `custom_agent`
--
ALTER TABLE `custom_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `depositos_de_retiro`
--
ALTER TABLE `depositos_de_retiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instruction`
--
ALTER TABLE `instruction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modos_de_pago`
--
ALTER TABLE `modos_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ocean_lines`
--
ALTER TABLE `ocean_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plazos_de_pago`
--
ALTER TABLE `plazos_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `port`
--
ALTER TABLE `port`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profit`
--
ALTER TABLE `profit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `razon_social`
--
ALTER TABLE `razon_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status_type`
--
ALTER TABLE `status_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
