-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2025 a las 01:52:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vetdog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `dateCreation`) VALUES
(1, 'Beatriz Fagundez', 'admin@gmail.com', '$2y$10$vHBfIahZzL7gT6FclZ42Xeode28Dn2pj3fKvXdjIdY3yeo9StAKn2', '2024-03-09 03:02:19'),
(3, 'admin2', 'admin2@gmail.com', '$2y$10$t0gJ0kcdN9GmFcL9LFBYFeSomImJwd0iw1WxaOtlXXhyepdCzYU2C', '2024-03-09 08:00:00'),
(4, 'Beatriz Fagundez', 'Betty.fag@gmail.com', '$2y$10$kQ/9UuybBMQQRiAxZKMGIuB0MQjvKeffhcITTf/gAR.VAXDCxIwYW', '2024-03-29 04:00:00'),
(5, 'Ana', 'Anais@gmail.com', '$2y$10$VhM870LXBX0zQld2TJVPxesr.6FwN1pvK6BuHNL/wpueTimoXCyeC', '2024-04-01 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `id_animal` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `condicion` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `estado` enum('disponible','no disponible') NOT NULL DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id_animal`, `nombre`, `edad`, `tipo`, `condicion`, `imagen`, `estado`) VALUES
(1, 'Fido', 2, 'perro', 'saludable', 'fido.jpg', 'disponible'),
(2, 'Mittens', 3, 'gato', 'saludable', 'mittens.jpg', 'disponible'),
(3, 'Buddy', 1, 'perro', 'en tratamiento', 'buddy.jpg', 'disponible'),
(4, 'Whiskers', 4, 'gato', 'saludable', 'whiskers.jpg', 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit`
--

CREATE TABLE `audit` (
  `audit` int(11) NOT NULL,
  `tableID` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL,
  `userID` int(11) NOT NULL,
  `rol` varchar(18) NOT NULL DEFAULT 'administrador',
  `action` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `audit`
--

INSERT INTO `audit` (`audit`, `tableID`, `table_name`, `userID`, `rol`, `action`, `date`) VALUES
(142, 57, 'mascota', 21, 'usuario', 'Se eliminó una mascota', '2024-03-20 01:33:19'),
(143, 188, 'cita', 21, 'usuario', 'Se creó una cita', '2024-03-20 07:15:20'),
(144, 54, 'mascota', 21, 'cliente', 'Se actualizó una mascota', '2024-03-20 07:17:02'),
(145, 21, 'cita', 21, 'usuario', 'Se actualizó un usuario', '2024-03-20 09:29:51'),
(146, 15, 'veterinario', 15, 'veterinario', 'Se actualizó un veterinario', '2024-03-20 10:17:59'),
(147, 189, 'cita', 1, 'administrador', 'Se creó una cita', '2024-03-23 11:23:53'),
(148, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-03-26 09:27:20'),
(149, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-03-28 18:29:17'),
(150, 27, 'cliente', 1, 'administrador', 'Se creÃ³ un cliente', '2024-03-28 18:39:49'),
(151, 4, 'administrador', 1, 'administrador', 'Se creÃ³ un administrador', '2024-03-29 07:07:27'),
(152, 5, 'categoria', 4, 'administrador', 'Se eliminÃ³ una categorÃ­a', '2024-03-29 07:39:46'),
(153, 26, 'cliente', 4, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 07:45:26'),
(154, 28, 'cliente', 4, 'administrador', 'Se creÃ³ un cliente', '2024-03-29 07:47:58'),
(155, 12, 'tipo mascota', 4, 'administrador', 'Se creÃ³ un tipo de mascota', '2024-03-29 07:49:43'),
(156, 13, 'tipo mascota', 4, 'administrador', 'Se creÃ³ un tipo de mascota', '2024-03-29 07:49:58'),
(157, 12, 'tipo mascota', 4, 'administrador', 'Se actualizÃ³ un tipo de mascota', '2024-03-29 07:50:14'),
(158, 55, 'mascota', 4, 'administrador', 'Se creÃ³ una mascota', '2024-03-29 07:51:12'),
(159, 56, 'mascota', 4, 'administrador', 'Se creÃ³ una mascota', '2024-03-29 07:51:58'),
(160, 190, 'cita', 4, 'administrador', 'Se creÃ³ una cita', '2024-03-29 07:52:44'),
(161, 29, 'cliente', 1, 'administrador', 'Se creÃ³ un cliente', '2024-03-29 08:02:30'),
(162, 26, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 08:38:41'),
(163, 26, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 08:40:11'),
(164, 16, 'veterinario', 1, 'administrador', 'Se creÃ³ un veterinario', '2024-03-29 08:48:10'),
(165, 26, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 08:54:42'),
(166, 26, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 08:57:53'),
(167, 26, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 08:59:12'),
(168, 26, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 09:00:16'),
(169, 26, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-03-29 18:37:20'),
(170, 191, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-03-29 18:42:38'),
(171, 192, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-03-29 19:39:30'),
(172, 193, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-03-29 20:21:29'),
(173, 30, 'cliente', 30, 'usuario', 'Se creÃ³ un cliente', '2024-03-29 21:33:12'),
(174, 21, 'categoria', 1, 'administrador', 'Se creÃ³ una categorÃ­a', '2024-03-30 04:10:57'),
(175, 18, 'producto', 1, 'administrador', 'Se creÃ³ un producto', '2024-03-30 04:11:49'),
(176, 14, 'tipo mascota', 1, 'administrador', 'Se creÃ³ un tipo de mascota', '2024-03-30 04:12:58'),
(177, 45, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-30 04:13:21'),
(178, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-03-30 04:15:25'),
(179, 13, 'servicio', 1, 'administrador', 'Se creÃ³ un servicio', '2024-03-30 04:19:04'),
(180, 14, 'servicio', 1, 'administrador', 'Se creÃ³ un servicio', '2024-03-30 04:19:29'),
(181, 22, 'categoria', 1, 'administrador', 'Se creÃ³ una categorÃ­a', '2024-03-30 09:48:50'),
(182, 22, 'categoria', 1, 'administrador', 'Se actualizÃ³ una categorÃ­a', '2024-03-30 09:49:03'),
(183, 31, 'cliente', 1, 'administrador', 'Se creÃ³ un cliente', '2024-03-30 09:50:53'),
(184, 57, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-03-30 09:53:13'),
(185, 194, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-03-30 10:16:41'),
(186, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-03-30 21:06:21'),
(187, 195, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-03-30 21:12:19'),
(188, 13, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-03-30 22:34:29'),
(189, 14, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-03-30 22:34:47'),
(190, 12, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-03-30 22:35:23'),
(191, 11, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-03-30 22:40:19'),
(192, 15, 'servicio', 1, 'administrador', 'Se creÃ³ un servicio', '2024-03-30 22:40:38'),
(193, 196, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-03-30 22:41:26'),
(194, 18, 'producto', 1, 'administrador', 'Se actualizÃ³ un producto', '2024-03-30 23:45:12'),
(195, 22, 'categoria', 1, 'administrador', 'Se actualizÃ³ una categorÃ­a', '2024-03-30 23:47:16'),
(196, 197, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-03-31 07:14:15'),
(197, 46, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:04:17'),
(198, 47, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:04:50'),
(199, 48, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:05:16'),
(200, 49, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:05:36'),
(201, 50, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:05:53'),
(202, 51, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:07:09'),
(203, 52, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:07:42'),
(204, 53, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:10:39'),
(205, 54, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:11:02'),
(206, 55, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:11:42'),
(207, 56, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:12:02'),
(208, 57, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:12:16'),
(209, 58, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:12:43'),
(210, 59, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:13:00'),
(211, 60, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:13:27'),
(212, 61, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:13:56'),
(213, 62, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:14:25'),
(214, 63, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:14:54'),
(215, 64, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:15:16'),
(216, 65, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:15:39'),
(217, 66, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:16:06'),
(218, 67, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:16:37'),
(219, 68, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:17:14'),
(220, 69, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:17:45'),
(221, 70, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:20:38'),
(222, 71, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:20:52'),
(223, 72, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:21:09'),
(224, 73, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:21:59'),
(225, 74, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:22:21'),
(226, 75, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:22:51'),
(227, 76, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:24:06'),
(228, 77, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:24:44'),
(229, 78, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:25:08'),
(230, 79, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:25:25'),
(231, 80, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:25:50'),
(232, 81, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:26:15'),
(233, 82, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:26:42'),
(234, 83, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:28:19'),
(235, 84, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:29:47'),
(236, 85, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:30:24'),
(237, 86, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:31:18'),
(238, 87, 'raza', 1, 'administrador', 'Se creÃ³ una raza', '2024-03-31 08:31:36'),
(239, 32, 'cliente', 32, 'usuario', 'Se creÃ³ un cliente', '2024-04-01 02:55:20'),
(240, 33, 'cliente', 33, 'usuario', 'Se creÃ³ un cliente', '2024-04-01 03:12:00'),
(241, 34, 'cliente', 34, 'usuario', 'Se creÃ³ un cliente', '2024-04-01 03:30:58'),
(242, 17, 'veterinario', 1, 'administrador', 'Se creÃ³ un veterinario', '2024-04-01 04:05:42'),
(243, 5, 'administrador', 1, 'administrador', 'Se creÃ³ un administrador', '2024-04-01 04:15:00'),
(244, 35, 'cliente', 35, 'usuario', 'Se creÃ³ un cliente', '2024-04-01 08:57:14'),
(245, 23, 'categoria', 1, 'administrador', 'Se creÃ³ una categorÃ­a', '2024-04-01 09:02:19'),
(246, 23, 'categoria', 1, 'administrador', 'Se eliminÃ³ una categorÃ­a', '2024-04-01 09:09:57'),
(247, 24, 'categoria', 1, 'administrador', 'Se creÃ³ una categorÃ­a', '2024-04-01 09:10:17'),
(248, 19, 'producto', 1, 'administrador', 'Se creÃ³ un producto', '2024-04-01 09:12:53'),
(249, 59, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-04-01 09:25:42'),
(250, 45, 'raza', 1, 'administrador', 'Se actualizÃ³ una raza', '2024-04-01 09:27:40'),
(251, 46, 'raza', 1, 'administrador', 'Se eliminÃ³ una raza', '2024-04-01 09:43:26'),
(252, 198, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-01 10:05:15'),
(253, 11, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-04-01 10:10:53'),
(254, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-01 10:18:10'),
(255, 199, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-04-01 10:56:50'),
(256, 200, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-01 12:20:38'),
(257, 24, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-04-01 12:36:38'),
(258, 21, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-04-01 12:38:15'),
(259, 11, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-04-01 20:02:31'),
(260, 12, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-04-01 20:02:54'),
(261, 13, 'servicio', 1, 'administrador', 'Se actualizÃ³ un servicio', '2024-04-01 20:03:08'),
(262, 20, 'producto', 1, 'administrador', 'Se creÃ³ un producto', '2024-04-01 20:44:04'),
(263, 201, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-01 20:47:47'),
(264, 202, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-04-01 20:51:36'),
(265, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-01 20:53:23'),
(266, 203, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-04-01 20:55:06'),
(267, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-01 20:56:18'),
(268, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-01 21:02:52'),
(269, 204, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-05 23:14:03'),
(270, 26, 'cliente', 26, 'usuario', 'Se actualizÃ³ un usuario', '2024-04-06 05:30:41'),
(271, 55, 'mascota', 26, 'cliente', 'Se actualizÃ³ una mascota', '2024-04-06 05:31:06'),
(272, 205, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-04-06 05:32:50'),
(273, 21, 'producto', 1, 'administrador', 'Se creÃ³ un producto', '2024-04-06 05:34:48'),
(274, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-06 05:38:50'),
(275, 206, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-04-06 06:49:23'),
(276, 207, 'cita', 26, 'usuario', 'Se creÃ³ una cita', '2024-04-06 07:13:12'),
(277, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-06 07:16:06'),
(278, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-06 07:20:00'),
(279, 20, 'producto', 1, 'administrador', 'Se actualizÃ³ un producto', '2024-04-12 11:23:50'),
(280, 20, 'producto', 1, 'administrador', 'Se actualizÃ³ un producto', '2024-04-12 11:23:55'),
(281, 20, 'producto', 1, 'administrador', 'Se actualizÃ³ un producto', '2024-04-12 11:23:58'),
(282, 18, 'producto', 1, 'administrador', 'Se actualizÃ³ un producto', '2024-04-12 11:24:15'),
(283, 18, 'producto', 1, 'administrador', 'Se actualizÃ³ un producto', '2024-04-12 11:24:26'),
(284, 21, 'producto', 1, 'administrador', 'Se actualizÃ³ un producto', '2024-04-12 11:24:45'),
(285, 26, 'cliente', 26, 'usuario', 'Se actualizÃ³ un usuario', '2024-04-15 18:07:32'),
(286, 24, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-04-15 18:23:52'),
(287, 28, 'cliente', 1, 'administrador', 'Se actualizÃ³ un cliente', '2024-04-15 18:28:11'),
(288, 62, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-04-15 18:38:23'),
(289, 63, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-04-15 18:39:14'),
(290, 64, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-04-15 18:40:27'),
(291, 65, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-04-15 18:41:38'),
(292, 66, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-04-15 18:44:00'),
(293, 67, 'mascota', 1, 'administrador', 'Se creÃ³ una mascota', '2024-04-15 18:46:05'),
(294, 208, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-15 18:50:18'),
(295, 209, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-15 19:01:07'),
(296, 210, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-15 19:03:28'),
(297, 211, 'cita', 1, 'administrador', 'Se creÃ³ una cita', '2024-04-15 19:05:04'),
(298, 212, 'cita', 34, 'usuario', 'Se creÃ³ una cita', '2024-04-15 19:11:38'),
(299, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-15 19:13:39'),
(300, 213, 'cita', 28, 'usuario', 'Se creÃ³ una cita', '2024-04-15 19:20:05'),
(301, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-15 19:22:01'),
(302, 214, 'cita', 28, 'usuario', 'Se creÃ³ una cita', '2024-04-15 19:37:42'),
(303, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-04-15 19:39:37'),
(304, 215, 'cita', 34, 'usuario', 'Se creÃ³ una cita', '2024-04-16 18:21:56'),
(305, 55, 'mascota', 26, 'cliente', 'Se actualizÃ³ una mascota', '2024-04-16 18:37:15'),
(306, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2024-06-10 19:03:14'),
(307, 17, 'producto', 1, 'administrador', 'Se eliminó un producto', '2024-09-13 02:04:20'),
(308, 21, 'producto', 1, 'administrador', 'Se actualizó un producto', '2024-09-13 02:04:44'),
(309, 68, 'mascota', 1, 'administrador', 'Se creó una mascota', '2024-09-13 02:22:40'),
(310, 11, 'producto', 1, 'administrador', 'Se creó un producto', '2024-09-13 18:49:52'),
(311, 12, 'producto', 1, 'administrador', 'Se creó un producto', '2024-09-13 20:33:22'),
(312, 13, 'producto', 1, 'administrador', 'Se creó un producto', '2024-09-13 20:37:09'),
(313, 25, 'categoria', 1, 'administrador', 'Se creó una categoría', '2025-01-16 21:43:14'),
(314, 40, 'venta', 0, 'administrador', 'Se insertó una venta', '2025-03-25 23:38:07'),
(315, 216, 'cita', 26, 'usuario', 'Se creó una cita', '2025-03-26 05:00:00'),
(316, 217, 'cita', 26, 'usuario', 'Se creó una cita', '2025-03-26 05:06:04'),
(317, 218, 'cita', 26, 'usuario', 'Se creó una cita', '2025-03-26 05:07:11'),
(318, 219, 'cita', 26, 'usuario', 'Se creó una cita', '2025-03-26 05:07:34'),
(319, 41, 'venta', 0, 'administrador', 'Se insertó una venta', '2025-03-26 00:16:35'),
(320, 42, 'venta', 0, 'administrador', 'Se insertó una venta', '2025-03-26 00:18:36'),
(321, 220, 'cita', 26, 'usuario', 'Se creó una cita', '2025-03-26 05:25:23'),
(322, 221, 'cita', 26, 'usuario', 'Se creó una cita', '2025-03-26 05:40:28'),
(323, 222, 'cita', 26, 'usuario', 'Se creó una cita', '2025-03-26 05:47:39'),
(324, 0, 'cita', 1, 'administrador', 'Se acepto una solicitud de cita', '2025-03-26 05:48:38'),
(325, 43, 'venta', 0, 'administrador', 'Se insertó una venta', '2025-03-26 00:51:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `nomcate` varchar(50) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_cate`, `nomcate`, `fere`) VALUES
(2, 'Collares', '2024-01-25 08:00:00'),
(3, 'Correas', '2024-01-25 08:00:00'),
(6, 'Snack', '2024-01-25 08:00:00'),
(9, 'Complementos y Suplementos', '2024-01-25 08:00:00'),
(10, 'Higiene y limpieza', '2024-01-25 08:00:00'),
(12, 'Juguetes', '2024-01-25 08:00:00'),
(15, 'Estanques', '2024-01-25 08:00:00'),
(16, 'Comedores y bebedores', '2024-01-25 08:00:00'),
(17, 'Incubadoras', '2024-01-25 08:00:00'),
(19, 'Humedad', '2024-01-25 08:00:00'),
(20, 'Vallas y cercados', '2024-01-25 08:00:00'),
(21, 'vitaminas', '2024-03-30 04:00:00'),
(22, 'Desparasitantes', '2024-03-30 04:00:00'),
(24, 'analgÃ©sicos ', '2024-04-01 04:00:00'),
(25, 'Prueba', '2025-01-16 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) NOT NULL,
  `id_prove` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tipoc` varchar(25) NOT NULL,
  `tipopa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `fecha`, `estado`, `id_prove`, `total`, `tipoc`, `tipopa`) VALUES
(1, '2021-12-22', '0', 6, 31.00, 'Ticket', 'Contado'),
(2, '2021-12-22', '1', 3, 75.00, 'Factura', 'Contado'),
(3, '2021-12-10', '1', 2, 195.00, 'Factura', 'Credito'),
(4, '2021-12-06', '1', 1, 31.00, 'Boleta', 'Contado'),
(5, '2021-12-23', '0', 12, 60.00, 'Ticket', 'Credito'),
(6, '2021-12-23', '1', 13, 15.00, 'Boleta', 'Contado'),
(7, '2021-12-24', '1', 13, 382.00, 'Boleta', 'Contado'),
(8, '2021-12-25', '0', 13, 351.00, 'Boleta', 'Contado'),
(9, '2024-09-13', '1', 1, 31.00, 'Ticket', 'Contado'),
(10, '2024-09-13', '1', 1, 12.00, 'Ticket', 'Contado'),
(11, '2024-09-13', '1', 3, 22.00, 'Factura', 'Contado'),
(12, '2024-09-13', '1', 12, 31.00, 'Factura', 'Credito'),
(13, '2024-09-13', '1', 1, 12.00, 'Ticket', 'Contado'),
(14, '2024-09-13', '0', 2, 12.00, 'Boleta', 'Contado');

--
-- Disparadores `compra`
--
DELIMITER $$
CREATE TRIGGER `after_compra_insert` AFTER INSERT ON `compra` FOR EACH ROW BEGIN
    INSERT INTO audit (tableID, table_name, userID, rol, action, date)
    VALUES (NEW.id_compra, 'compra', USER(), 'administrador', 'Se insertó una compra', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_compra_update` AFTER UPDATE ON `compra` FOR EACH ROW BEGIN
    INSERT INTO audit (tableID, table_name, userID, rol, action, date)
    VALUES (NEW.id_compra, 'compra', USER(), 'administrador', 'Se actualizó una compra', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `timestamp`) VALUES
(1, 15, 26, 'Hola', '2024-10-25 23:36:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `owner`
--

CREATE TABLE `owner` (
  `id_due` int(11) NOT NULL,
  `dni_due` char(8) NOT NULL,
  `nom_due` varchar(35) NOT NULL,
  `ape_due` varchar(35) NOT NULL,
  `movil` char(11) NOT NULL,
  `fijo` char(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `direc` varchar(150) NOT NULL,
  `estado` char(1) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `owner`
--

INSERT INTO `owner` (`id_due`, `dni_due`, `nom_due`, `ape_due`, `movil`, `fijo`, `correo`, `direc`, `estado`, `contra`, `cargo`, `fere`) VALUES
(21, '26613419', 'Edinson', 'Tenias', '04140904623', '', 'Teniasedi123@gmail.com', 'Las Mercedes', '1', '$2y$10$uVZcpICRUbLaUnWCrGFbhuNP7vjYChwRtfgNZZ.6wGy6J85aHXN0.', 2, '2024-03-09 08:00:00'),
(24, '7255747', 'Jorge', 'Perez', '04125352365', '', 'Jorge_01@gmail.com', 'Maracay', '1', '$2y$10$fuSZzVJcx5iFacySa01aTumoMnJEzknA26P81BEw4oUrunUQ3ptr6', 2, '0000-00-00 00:00:00'),
(26, '27049930', 'Yorgelis', 'Fernandez', '04128967556', '', 'yorgelisferlo27@gmail.com', 'Sabaneta, Municipio Jose Rafael Revenga.', '1', '$2y$10$G2CzpJS3eOYUMw97F2WEuOhf0LBiO/C4/pxu1iIuV6Q2cHHb9oJki', 2, '2024-03-16 08:00:00'),
(27, '20759000', 'Maria Daniela ', 'Fernandez Lobata', '04129211870', '', 'maferlob1018@hotmail.co', 'Santa RosalÃ­a, Sabaneta del Consejo, Estado Aragua', '1', '$2y$10$gh7o88mgnxmGa0eXq.58uewlz8FuhrWVB4mgk/s4QrxxHs9ppcfxe', 2, '2024-03-28 18:39:49'),
(28, '21025504', 'Yeison', 'Tenias', '04123056056', '', 'Yeisontenias@gmail.com', 'Santa Rosalia, Municipio Jose Rafael Revenga.', '1', '$2y$10$M4w5L6tcUWKjuFOouZmNm.o8hK2yzzOShv3VA8NrnIXIq/9QPMXXy', 2, '2024-03-29 07:47:58'),
(30, '7184479', 'Enrique', 'Tenias', '04126789863', '', 'Luistenias@gmail.com', 'La mora.', '1', '$2y$10$4Ye8arlpVDhgCgCQdo1oiunhZYCFTWvNiICskOVDOvBucAoaYlQge', 2, '2024-03-29 21:33:12'),
(31, '14556223', 'rosa', 'lopez', '04126567789', '', 'rosalopez@gmail.com', 'el consejo', '1', '$2y$10$j3Fz5gV44rEJ9LUhoWPI9uQBeA.7GK/cMwyby2JWmoen1lR.8z0N6', 2, '2024-03-30 09:50:53'),
(34, '13952710', 'Tibisay', 'Montesinos', '04121774360', '', 'Montesinoslisbi78@gmail.com', 'La Mora', '1', '$2y$10$MBvVAoFxCsTdeKd3MnAxoekfqyArWKjY3hsbClbobpCuKkBCEPaom', 2, '2024-04-01 03:30:58'),
(35, '', 'Nanamis', 'Kento', '', '', 'jmrm19722@gmail.com', '', '1', 'f6015242d72929144748c476840db4b4', 2, '2024-09-14 02:22:23'),
(36, '', 'Nanami', 'Kento', '', '', 'jmrm19723@gmail.com', '', '1', 'f6015242d72929144748c476840db4b4', 2, '2024-10-10 21:03:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL,
  `nomas` varchar(50) NOT NULL,
  `id_tiM` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL,
  `weightID` int(11) NOT NULL,
  `id_due` int(11) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `edad` int(3) NOT NULL,
  `typeAge` varchar(10) NOT NULL,
  `tamano` varchar(15) NOT NULL,
  `peso` char(6) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `pet`
--

INSERT INTO `pet` (`id_pet`, `nomas`, `id_tiM`, `id_raza`, `weightID`, `id_due`, `sexo`, `edad`, `typeAge`, `tamano`, `peso`, `estado`, `fere`) VALUES
(53, 'garfield', 11, 44, 1, 21, 'Macho', 2, 'años', 'Pequeña', '11', '1', '2024-03-18 08:00:00'),
(54, 'firulais', 11, 44, 3, 21, 'Macho', 1, 'años', 'Pequeña', '11', '1', '2024-03-19 08:00:00'),
(55, 'Patica', 11, 44, 1, 26, 'Macho', 12, 'aÃ±os', 'Grande', '20', '1', '2024-03-29 04:00:00'),
(56, 'Chiva', 11, 44, 1, 26, 'Macho', 15, 'aÃ±os', 'PequeÃ±a', '10', '1', '2024-03-29 04:00:00'),
(57, 'canela', 11, 45, 1, 31, 'Macho', 15, 'aÃ±os', 'Grande', '20', '1', '2024-03-30 04:00:00'),
(58, 'coral', 11, 45, 1, 26, 'Hembra', 8, 'meses', 'PequeÃ±a', '6', '1', '2024-03-30 04:00:00'),
(59, 'pancho', 12, 75, 1, 26, 'Macho', 2, 'aÃ±os', 'Grande', '1', '1', '2024-04-01 04:00:00'),
(60, 'pepita', 13, 78, 1, 26, 'Hembra', 3, 'aÃ±os', 'PequeÃ±a', '2', '1', '2024-04-01 04:00:00'),
(61, 'vela', 12, 73, 3, 26, 'Hembra', 5, 'aÃ±os', 'PequeÃ±a', '200', '1', '2024-04-06 04:00:00'),
(62, 'Chivita', 11, 56, 1, 28, 'Macho', 3, 'aÃ±os', 'PequeÃ±a', '5', '1', '2024-04-15 04:00:00'),
(63, 'Oracio', 12, 73, 3, 28, 'Macho', 1, 'aÃ±os', 'PequeÃ±a', '200', '1', '2024-04-15 04:00:00'),
(64, 'Chimplis', 11, 58, 1, 28, 'Hembra', 4, 'aÃ±os', 'PequeÃ±a', '7', '1', '2024-04-15 04:00:00'),
(65, 'Panda', 11, 45, 1, 30, 'Hembra', 6, 'aÃ±os', 'Grande', '13', '1', '2024-04-15 04:00:00'),
(66, 'Shawan', 11, 57, 1, 34, 'Hembra', 4, 'aÃ±os', 'Grande', '9', '1', '2024-04-15 04:00:00'),
(67, 'Fatima', 13, 79, 1, 24, 'Hembra', 2, 'aÃ±os', 'Grande', '4', '1', '2024-04-15 04:00:00'),
(68, 'Lucy', 13, 80, 1, 24, 'Hembra', 6, 'años', 'Pequeña', '3', '1', '2024-09-12 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet_type`
--

CREATE TABLE `pet_type` (
  `id_tiM` int(11) NOT NULL,
  `noTiM` varchar(35) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `pet_type`
--

INSERT INTO `pet_type` (`id_tiM`, `noTiM`, `estado`, `fere`) VALUES
(3, 'caballo', '1', '2024-01-12'),
(4, 'cerdo', '1', '2024-01-12'),
(11, 'perro', '1', '2024-03-17'),
(12, 'aves', '1', '2024-03-29'),
(13, 'gatos', '1', '2024-03-29'),
(14, 'conejos', '1', '2024-03-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comprados`
--

CREATE TABLE `productos_comprados` (
  `id_pcomp` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_comprados`
--

INSERT INTO `productos_comprados` (`id_pcomp`, `id_prod`, `canti`, `id_compra`) VALUES
(1, 1, 1, 1),
(2, 5, 3, 2),
(3, 8, 3, 2),
(4, 3, 3, 3),
(5, 1, 1, 4),
(6, 5, 3, 5),
(7, 8, 3, 6),
(8, 1, 4, 7),
(9, 2, 3, 7),
(10, 3, 3, 7),
(11, 1, 3, 8),
(12, 2, 3, 8),
(13, 3, 3, 8),
(14, 1, 1, 9),
(15, 12, 1, 10),
(16, 13, 1, 11),
(17, 1, 1, 12),
(18, 12, 1, 13),
(19, 12, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id_pvendi` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id_pvendi`, `id_prod`, `canti`, `id_venta`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 2),
(3, 8, 3, 2),
(4, 1, 3, 3),
(5, 5, 3, 3),
(6, 2, 3, 4),
(7, 8, 3, 4),
(8, 1, 1, 5),
(9, 12, 1, 6),
(10, 13, 1, 7),
(11, 13, 1, 8),
(12, 12, 1, 9),
(13, 1, 1, 10),
(14, 13, 1, 11),
(15, 13, 1, 12),
(16, 1, 1, 13),
(17, 1, 1, 14),
(18, 1, 1, 15),
(19, 3, 1, 16),
(20, 3, 1, 17),
(21, 1, 1, 18),
(22, 1, 1, 19),
(23, 12, 1, 20),
(24, 1, 1, 21),
(25, 1, 1, 22),
(26, 9, 1, 23),
(27, 1, 1, 24),
(28, 1, 1, 25),
(29, 1, 1, 26),
(30, 1, 1, 27),
(31, 1, 1, 28),
(32, 1, 1, 29),
(33, 1, 1, 30),
(34, 1, 1, 31),
(35, 1, 1, 32),
(36, 1, 1, 33),
(37, 1, 1, 34),
(38, 1, 1, 35),
(39, 1, 1, 36),
(40, 1, 1, 37),
(41, 1, 1, 38),
(42, 1, 1, 39),
(43, 1, 1, 40),
(44, 1, 1, 41),
(45, 1, 1, 42),
(46, 1, 1, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_prod` int(11) NOT NULL,
  `codigo` char(14) NOT NULL,
  `id_cate` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nompro` varchar(100) NOT NULL,
  `peso` char(5) NOT NULL,
  `weightID` int(11) NOT NULL,
  `id_prove` int(11) NOT NULL,
  `descp` varchar(255) NOT NULL,
  `preciC` decimal(10,2) NOT NULL,
  `precV` decimal(10,2) NOT NULL,
  `stock` char(4) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_prod`, `codigo`, `id_cate`, `foto`, `nompro`, `peso`, `weightID`, `id_prove`, `descp`, `preciC`, `precV`, `stock`, `estado`, `fere`) VALUES
(1, '00000001', 2, 'collar1.jpeg', 'Julius K9 Collar de Adiestramiento Cordino', '90 GR', 0, 2, 'El collar cordino Julius K9 es la elección perfecta para entrenamientos en lugar de collares. Hecho de cordón textil rígido de 3,5 mm, utilizado frecuentemente por entrenadores de perros para perros agresivos o perros en pánico. Recomendado para usar con ', 31.00, 21.00, '78', '1', '2025-03-26 00:51:30'),
(2, '00000002', 7, 'anti.jpg', 'Specialcan Insecticida Ambiental Perros Y Gatos 250 Ml', '250ml', 0, 1, 'Specialcan Insecticida Ambiental Perros Y Gatos 250 Ml.', 21.00, 35.00, '38', '1', '2024-09-12 20:13:44'),
(3, '00000003', 6, 'snac.jpg', 'Apetitus Galletas Vainilla Biscuits', '500GR', 0, 1, 'Las Galletas Vainilla Biscuits de Apetitus son snacks para perro para dar como premio o recompensa en cualquier momento del día como parte de una dieta equilibrada. Su calidad se obtiene gracias a los ingredientes y al Bakery Selection', 65.00, 35.00, '28', '1', '2025-01-18 21:36:27'),
(5, '00000007', 7, 'anti2.jpg', 'Bayer Advantage Pipeta Gato 0-4 kg.', '80', 0, 3, 'Advantage® Spot-On es una solución de Imidacloprid lista para su aplicación tópica sobre la piel del gato. Mata las pulgas dentro de las 24 horas de aplicado. Previene las re-infestaciones por hasta 1 mes. De muy fácil aplicación es ideal para evitar el e', 20.00, 30.00, '93', '1', '2021-12-26 02:37:00'),
(8, '00000009', 14, 'omidaanimal.jpg', 'COMIDA PARA PERRO POLLO Y VEGETALES', '374 g', 0, 1, 'Hecho con ingredientes de fibras naturales', 5.00, 10.00, '98', '1', '2021-12-26 05:02:50'),
(9, '12959031410057', 3, 'Cepillo.jpg', 'Cepillo Desenredante para Perros y Gatos \"PetCare\"', '33', 0, 3, 'Cepillo suave y eficaz para eliminar nudos y pelo suelto en perros y gatos. Ideal para mascotas con pelajes largos o densos. Su diseño ergonómico facilita su uso y reduce el estrés del cepillado.', 20.00, 5.00, '97', '1', '2025-01-19 01:56:06'),
(12, '05ZGLKRDY7FHQN', 16, 'Arena.jpg', 'Arena para Gatos \"CleanPaws\" (10kg)', '3', 1, 1, 'Arena aglomerante de alta absorción, diseñada para eliminar olores y facilitar la limpieza diaria del arenero. Hecha de materiales ecológicos y suaves para las patas de tu gato.', 12.00, 22.00, '8', '1', '2025-01-19 01:16:53'),
(13, '0MXY3TGK0JED57', 15, 'Correa.jpg', 'Correa Extensible para Perros \"Flexi Leash\" (5m)', '12', 1, 1, 'Correa retráctil de hasta 5 metros, ideal para dar libertad a tu perro durante los paseos sin perder el control. Con mango ergonómico y sistema de frenado rápido para mayor seguridad.', 22.00, 33.00, '-1', '1', '2024-11-03 12:05:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

CREATE TABLE `quotes` (
  `quotesID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `vetID` int(11) DEFAULT NULL,
  `number_quote` varchar(10) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `attended` varchar(100) NOT NULL,
  `cost` float NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `quotes`
--

INSERT INTO `quotes` (`quotesID`, `ownerID`, `vetID`, `number_quote`, `diagnosis`, `attended`, `cost`, `start`, `end`, `dateCreation`, `status`) VALUES
(187, 21, 15, 'FAC-943895', 'realizado', 'yo', 9, '2024-03-28', '2024-03-29', '2024-03-19 23:53:16', '1'),
(188, 21, 15, 'FAC-622998', 'gewserftghuijolp', 'juancito', 10, '2024-03-26', '2024-04-05', '2024-03-20 07:15:20', '1'),
(189, 21, 15, 'FAC-883397', 'Se murio de hambre', 'Juan Pablito', 10, '2024-03-23', '2024-04-06', '2024-03-23 11:23:53', '1'),
(190, 26, 15, 'FAC-978961', 'realizado', 'yor', 5, '2024-03-29', '2024-03-30', '2024-03-29 07:52:44', '1'),
(191, 26, 15, 'FAC-307174', 'Se realizo consulta, una vacunaciÃ³n..', 'yo', 5, '2024-03-29', '2024-03-30', '2024-03-29 18:42:38', '1'),
(192, 26, 16, 'FAC-985168', 'se realiza pre-operaciÃ³n leve', 'Beatriz Fagundez', 5, '2024-03-30', '2024-03-30', '2024-03-29 19:39:29', '1'),
(193, 26, 16, 'FAC-167813', 'desparasitaciÃ³n', 'beatriz', 10, '2024-03-30', '2024-03-31', '2024-03-29 20:21:29', '1'),
(194, 26, 16, 'FAC-733718', 'se realiza el servicio', 'beatriz fagundez', 4, '2024-04-01', '2024-04-01', '2024-03-30 10:16:41', '1'),
(195, 26, 16, 'FAC-706802', '', 'betty', 19, '2024-04-02', '2024-04-02', '2024-03-30 21:12:19', '0'),
(196, 26, 16, 'FAC-810211', 'se realiza estudios y reposo por 21 dÃ­as, pos tratamiento 14 dÃ­as vÃ­a oral', 'bety', 10, '2024-04-01', '2024-04-01', '2024-03-30 22:41:25', '1'),
(197, 26, 16, 'FAC-458264', 'segguhsjidwfgff fvfgrv', 'yuli', 20, '2024-03-31', '2024-04-01', '2024-03-31 07:14:14', '1'),
(198, 26, 16, 'FAC-288333', 'Limpieza y  ColocaciÃ³n de  Vacuna', 'betty', 5, '2024-04-02', '2024-04-02', '2024-04-01 10:05:15', '1'),
(199, 26, 17, 'FAC-773544', 'servicio de estÃ©tica y cirugÃ­a bÃ¡sica', 'Lisbi', 5, '2024-04-02', '2024-04-02', '2024-04-01 10:56:50', '1'),
(200, 26, 16, 'FAC-703314', '', 'betty', 10, '2024-04-02', '2024-04-02', '2024-04-01 12:20:38', '0'),
(201, 26, 16, 'FAC-606250', 'Se realiza VacunaciÃ³n', 'elias vargas', 5, '2024-04-01', '2024-04-02', '2024-04-01 20:47:47', '1'),
(202, 26, 16, 'FAC-720315', '', 'Karlis', 5, '2024-04-03', '2024-04-03', '2024-04-01 20:51:36', '0'),
(203, 26, 17, 'FAC-523880', 'se  realiza consulta', 'Karlis', 50, '2024-04-01', '2024-04-02', '2024-04-01 20:55:06', '1'),
(204, 31, 16, 'FAC-181848', 'se realizan todos los servicios', 'yorgelis', 10, '2024-04-05', '2024-04-06', '2024-04-05 23:14:03', '1'),
(205, 26, 16, 'FAC-138754', 'se realizo limpieza sin ningÃºn tipo de observaciÃ³n.', 'yeison tenias', 5, '2024-04-08', '2024-04-08', '2024-04-06 05:32:50', '1'),
(206, 26, 16, 'FAC-608227', '', 'Ana Perez', 4, '2024-04-09', '2024-04-09', '2024-04-06 06:49:23', '0'),
(207, 26, 16, 'FAC-823367', 'se realiza consulta sin vacuna', 'Ana Perez', 5, '2024-04-08', '2024-04-08', '2024-04-06 07:13:12', '1'),
(208, 24, 17, 'FAC-420800', 'sin observaciones', 'Beatriz Fagundez', 3, '2024-04-16', '2024-04-16', '2024-04-15 18:50:18', '1'),
(209, 30, 17, 'FAC-435028', '', 'Nohemi Fernandez', 3, '2024-04-16', '2024-04-16', '2024-04-15 19:01:07', '0'),
(210, 28, 15, 'FAC-980389', '', 'Nohemi Fernandez', 5, '2024-04-17', '2024-04-17', '2024-04-15 19:03:28', '0'),
(211, 28, 15, 'FAC-917135', 'cirugÃ­a leve', 'Nohemi Fernandez', 45, '2024-04-19', '2024-04-19', '2024-04-15 19:05:04', '1'),
(212, 34, 15, 'FAC-756350', 'Se realiza estÃ©tica y limpieza', 'Nohemi Fernandez', 5, '2024-04-16', '2024-04-16', '2024-04-15 19:11:38', '1'),
(213, 28, 17, 'FAC-197750', 'Se realiza servicio de estÃ©tica y limpieza.', 'Beatriz Fagundez', 5, '2024-04-16', '2024-04-16', '2024-04-15 19:20:05', '1'),
(214, 28, 17, 'FAC-982971', 'Se realiza el servicio sin observaciones', 'Beatriz Fagundez', 5, '2024-04-16', '2024-04-16', '2024-04-15 19:37:42', '1'),
(215, 34, 17, 'FAC-522973', '', 'yo', 4, '2024-06-11', '2024-06-11', '2024-04-16 18:21:56', '0'),
(220, 26, 15, 'FAC-929902', '', '', 0, '0000-00-00', '0000-00-00', '2025-03-26 05:25:23', '0'),
(221, 26, NULL, 'FAC-499783', '', '', 0, '2025-03-26', '2025-03-27', '2025-03-26 05:40:28', '0'),
(222, 26, 15, 'FAC-133234', '', 'Betty', 10, '2025-03-26', '2025-03-27', '2025-03-26 05:47:39', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes_pets`
--

CREATE TABLE `quotes_pets` (
  `quotes_petsID` int(11) NOT NULL,
  `quotesID` int(11) NOT NULL,
  `petsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `quotes_pets`
--

INSERT INTO `quotes_pets` (`quotes_petsID`, `quotesID`, `petsID`) VALUES
(231, 187, 53),
(232, 187, 54),
(233, 188, 53),
(234, 188, 54),
(235, 189, 53),
(236, 189, 54),
(237, 190, 55),
(238, 191, 55),
(239, 191, 56),
(240, 192, 55),
(241, 192, 56),
(242, 193, 56),
(243, 194, 56),
(244, 195, 58),
(245, 196, 55),
(246, 197, 55),
(247, 198, 55),
(248, 199, 55),
(249, 199, 56),
(250, 200, 55),
(251, 200, 56),
(252, 201, 60),
(253, 202, 55),
(254, 202, 60),
(255, 203, 55),
(256, 203, 56),
(257, 203, 58),
(258, 203, 59),
(259, 204, 57),
(260, 205, 61),
(261, 206, 55),
(262, 207, 56),
(263, 208, 67),
(264, 209, 65),
(265, 210, 63),
(266, 211, 64),
(267, 212, 66),
(268, 213, 62),
(269, 213, 64),
(270, 214, 62),
(271, 214, 64),
(272, 215, 66),
(279, 220, 58),
(280, 221, 56),
(281, 222, 59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes_services`
--

CREATE TABLE `quotes_services` (
  `quotes_servicesID` int(11) NOT NULL,
  `quotesID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `price` float NOT NULL,
  `priceTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `quotes_services`
--

INSERT INTO `quotes_services` (`quotes_servicesID`, `quotesID`, `serviceID`, `price`, `priceTotal`) VALUES
(234, 189, 11, 10, 20),
(235, 189, 12, 5, 10),
(236, 188, 11, 10, 20),
(237, 188, 12, 5, 10),
(238, 187, 11, 10, 20),
(239, 190, 11, 10, 10),
(240, 190, 12, 5, 5),
(241, 191, 11, 10, 20),
(242, 191, 12, 5, 10),
(243, 192, 12, 5, 10),
(245, 193, 11, 10, 10),
(247, 194, 12, 5, 5),
(249, 196, 11, 10, 10),
(250, 196, 12, 5, 5),
(251, 196, 13, 10, 10),
(252, 196, 14, 5, 5),
(253, 196, 15, 8, 8),
(254, 197, 11, 10, 10),
(255, 197, 12, 5, 5),
(256, 197, 13, 10, 10),
(257, 198, 11, 10, 10),
(258, 195, 13, 10, 10),
(261, 200, 11, 10, 20),
(262, 200, 13, 10, 20),
(263, 201, 13, 5, 5),
(265, 202, 13, 5, 10),
(271, 203, 11, 10, 40),
(272, 203, 12, 25, 100),
(273, 203, 13, 5, 20),
(274, 203, 14, 5, 20),
(275, 203, 15, 8, 32),
(276, 199, 11, 10, 20),
(277, 199, 12, 25, 50),
(278, 204, 11, 10, 10),
(279, 204, 12, 25, 25),
(281, 205, 15, 8, 8),
(284, 207, 11, 10, 10),
(285, 206, 11, 10, 10),
(286, 208, 11, 10, 10),
(287, 208, 15, 8, 8),
(288, 209, 13, 5, 5),
(289, 210, 11, 10, 10),
(290, 211, 12, 25, 25),
(293, 212, 11, 10, 10),
(294, 212, 15, 8, 8),
(297, 213, 11, 10, 20),
(298, 213, 15, 8, 16),
(300, 214, 13, 5, 10),
(302, 215, 11, 10, 10),
(308, 220, 13, 5, 5),
(309, 221, 12, 25, 25),
(311, 222, 13, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id_raza` int(11) NOT NULL,
  `nomraza` varchar(50) NOT NULL,
  `id_tiM` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id_raza`, `nomraza`, `id_tiM`, `estado`, `date`) VALUES
(44, 'bulldog', 11, '1', '2024-03-17'),
(45, 'mestizo', 11, '1', '2024-03-30'),
(47, 'tiro belga', 3, '1', '2024-03-31'),
(48, 'trakehner', 3, '1', '2024-03-31'),
(49, 'arabe', 3, '1', '2024-03-31'),
(50, 'paso fino', 3, '1', '2024-03-31'),
(51, 'purasangre de carrera', 3, '1', '2024-03-31'),
(52, 'landrace', 4, '1', '2024-03-31'),
(53, 'chester white', 4, '1', '2024-03-31'),
(54, 'yorkshire', 4, '1', '2024-03-31'),
(55, 'porcina landrace belga', 4, '1', '2024-03-31'),
(56, 'chihuahua', 11, '1', '2024-03-31'),
(57, 'caniche', 11, '1', '2024-03-31'),
(58, 'beagle', 11, '1', '2024-03-31'),
(59, 'bÃ³xer', 11, '1', '2024-03-31'),
(60, 'bull terrier', 11, '1', '2024-03-31'),
(61, 'husky siberiano', 11, '1', '2024-03-31'),
(62, 'dÃ¡lmata', 11, '1', '2024-03-31'),
(63, 'shar pei', 11, '1', '2024-03-31'),
(64, 'rottweiler', 11, '1', '2024-03-31'),
(65, 'labrador', 11, '1', '2024-03-31'),
(66, 'san bernardo ', 11, '1', '2024-03-31'),
(67, 'gallina', 12, '1', '2024-03-31'),
(68, 'ganso', 12, '1', '2024-03-31'),
(69, 'pavo', 12, '1', '2024-03-31'),
(70, 'avestruz ', 12, '1', '2024-03-31'),
(71, 'paloma', 12, '1', '2024-03-31'),
(72, 'codorniz', 12, '1', '2024-03-31'),
(73, 'periquitos', 12, '1', '2024-03-31'),
(74, 'bÃºho', 12, '1', '2024-03-31'),
(75, 'tucÃ¡n', 12, '1', '2024-03-31'),
(76, 'persa', 13, '1', '2024-03-31'),
(77, 'siamÃ©s', 13, '1', '2024-03-31'),
(78, 'bengalÃ­', 13, '1', '2024-03-31'),
(79, 'angora', 13, '1', '2024-03-31'),
(80, 'oriental', 13, '1', '2024-03-31'),
(81, 'comÃºn europeo', 13, '1', '2024-03-31'),
(82, 'himalayo', 13, '1', '2024-03-31'),
(83, 'toy', 14, '1', '2024-03-31'),
(84, 'belier', 14, '1', '2024-03-31'),
(85, 'cabeza de leÃ³n', 14, '1', '2024-03-31'),
(86, 'enano holandÃ©s', 14, '1', '2024-03-31'),
(87, 'mini lop', 14, '1', '2024-03-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `id_servi` int(11) NOT NULL,
  `nomser` varchar(100) NOT NULL,
  `estado` char(1) NOT NULL,
  `price` float NOT NULL,
  `fere` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`id_servi`, `nomser`, `estado`, `price`, `fere`) VALUES
(11, 'Corte de Pelo', '1', 10, '2024-03-17'),
(12, 'CirugÃ­a', '1', 25, '2024-03-17'),
(13, 'Vacuna', '1', 5, '2024-03-30'),
(14, 'DesparasitaciÃ³n ', '1', 5, '2024-03-30'),
(15, 'limpieza', '1', 8, '2024-03-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `id_due` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE `supplier` (
  `id_prove` int(11) NOT NULL,
  `nomprove` varchar(255) NOT NULL,
  `ruc` char(14) NOT NULL,
  `direcc` varchar(200) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `tele` char(12) NOT NULL,
  `corre` varchar(35) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id_prove`, `nomprove`, `ruc`, `direcc`, `pais`, `tele`, `corre`, `estado`, `fere`) VALUES
(1, 'Hiper Plaza Vea', '11223232323232', 'Castilla, el indio MZ L3 32', 'Brasil', '977777777', 'hiperplazavea@gmail.com', '1', '2021-12-01 05:19:25'),
(2, 'Pet Shop Patitas Feliz', '12434343434334', 'Castilla Mz D4 LT 26', 'Ecuador', '888888888', 'petshop@gmail.com', '1', '2021-12-01 06:54:26'),
(3, 'Pet Shop Mi Jeffrey', '88888888888888', 'Castilla el Indio Mz c5', 'Argentina', '999999999', 'mijefreypetshop@gmail.com', '1', '2021-08-10 20:37:56'),
(6, 'Empresa de ejemplo', '10039399393933', 'ejemplo de direcion', 'Peru', '959595959', 'empresa@gmail.com', '1', '2021-11-30 21:51:17'),
(7, 'Otra empresa', '10887474747474', 'otra empresa de direccion', 'Mexico', '977777777', 'otraempresa@gmail.com', '1', '2021-12-01 06:17:46'),
(9, 'fdf', '10933333333333', 'sdfsdf', 'sfsf', '976545434', 'dfsfsdf@gmail.com', '1', '2021-12-01 06:25:28'),
(12, 'LECHE GLORIA SOCIEDAD ANONIMA - GLORIA S.A.', '20100190797', 'AV. REPUBLICA DE PANAMA NRO 2461 URB. SANTA CATALINA ', 'LIMA', '948484832', 'leee@gmail.com', '1', '2024-09-13 15:56:08'),
(13, 'HIPERMERCADOS TOTTUS S.A', '20508565934', 'AV. ANGAMOS ESTE NRO 1805 INT. P10 ', 'LIMA', '', '', '1', '2021-12-24 01:26:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `numfact` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `id_due` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tipoc` varchar(25) NOT NULL,
  `tipopa` varchar(25) NOT NULL,
  `numtarj` char(20) NOT NULL,
  `typetarj` varchar(20) NOT NULL,
  `nomtarj` varchar(40) NOT NULL,
  `expmon` char(1) NOT NULL,
  `expyear` char(2) NOT NULL,
  `cvc` char(4) NOT NULL,
  `recibir` decimal(10,2) NOT NULL,
  `cambio` decimal(10,2) NOT NULL,
  `ref` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `numfact`, `estado`, `id_due`, `total`, `tipoc`, `tipopa`, `numtarj`, `typetarj`, `nomtarj`, `expmon`, `expyear`, `cvc`, `recibir`, `cambio`, `ref`) VALUES
(15, '2025-01-18 17:31:41', 15, '1', 24, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(16, '2025-01-18 17:32:49', 16, '1', 21, 35.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(17, '2025-01-18 17:36:27', 17, '1', 26, 35.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(18, '2025-01-18 21:12:26', 18, '1', 26, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(19, '2025-01-18 21:14:50', 19, '1', 26, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(20, '2025-01-18 21:16:53', 20, '1', 26, 22.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(21, '2025-01-18 21:52:52', 21, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(22, '2025-01-18 21:53:58', 22, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(23, '2025-01-18 21:56:06', 23, '1', 0, 5.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(24, '2025-01-18 21:56:23', 24, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(25, '2025-01-18 21:57:41', 25, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(26, '2025-01-18 22:00:49', 26, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(27, '2025-01-18 22:11:47', 27, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(28, '2025-01-18 22:13:13', 28, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(29, '2025-01-18 22:13:56', 29, '1', 0, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(30, '2025-01-18 22:14:50', 30, '1', 26, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(31, '2025-01-18 22:17:20', 31, '1', 26, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(32, '2025-01-18 22:17:59', 32, '0', 26, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(33, '2025-01-18 22:54:49', 33, '0', 26, 21.00, 'Factura', 'tarjeta', '', '', '', '', '', '', 0.00, 0.00, NULL),
(34, '2025-03-25 17:36:45', 34, '1', 26, 21.00, 'Factura', 'pagomovil', '', '', '', '', '', '', 0.00, 0.00, NULL),
(35, '2025-03-25 17:43:18', 35, '1', 26, 21.00, 'Factura', 'pagomovil', '', '', '', '', '', '', 0.00, 0.00, NULL),
(36, '2025-03-25 17:48:41', 36, '1', 26, 21.00, 'Factura', 'pagomovil', '', '', '', '', '', '', 0.00, 0.00, NULL),
(37, '2025-03-25 17:53:23', 37, '1', 26, 21.00, 'Factura', 'pagomovil', '', '', '', '', '', '', 0.00, 0.00, NULL),
(38, '2025-03-25 17:55:20', 38, '1', 26, 21.00, 'Factura', 'pagomovil', '', '', '', '', '', '', 0.00, 0.00, NULL),
(39, '2025-03-25 17:58:57', 39, '1', 26, 21.00, 'Factura', '0', '', '', '', '', '', '0', 0.00, 0.00, '1212'),
(40, '2025-03-25 19:38:07', 40, '1', 26, 21.00, 'Factura', '0', '', '', '', '', '', '0', 0.00, 0.00, '122'),
(41, '2025-03-25 20:16:35', 41, '1', 26, 21.00, 'Factura', '0', '', '', '', '', '', '0', 0.00, 0.00, '1212'),
(42, '2025-03-25 20:18:36', 42, '1', 26, 21.00, 'Factura', '0', '', '', '', '', '', '0', 0.00, 0.00, '111'),
(43, '2025-03-25 20:51:30', 43, '1', 26, 21.00, 'Factura', '0', '', '', '', '', '', '0', 0.00, 0.00, '1432');

--
-- Disparadores `venta`
--
DELIMITER $$
CREATE TRIGGER `after_venta_insert` AFTER INSERT ON `venta` FOR EACH ROW BEGIN
    INSERT INTO audit (tableID, table_name, userID, rol, action, date)
    VALUES (NEW.id_venta, 'venta', USER(), 'administrador', 'Se insertó una venta', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_venta_update` AFTER UPDATE ON `venta` FOR EACH ROW BEGIN
    INSERT INTO audit (tableID, table_name, userID, rol, action, date)
    VALUES (NEW.id_venta, 'venta', USER(), 'administrador', 'Se actualizó una venta', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarian`
--

CREATE TABLE `veterinarian` (
  `id_vet` int(11) NOT NULL,
  `dnivet` char(8) NOT NULL,
  `nomvet` varchar(35) NOT NULL,
  `apevet` varchar(35) NOT NULL,
  `direcc` varchar(50) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `fijo` char(11) NOT NULL,
  `movil` char(11) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `veterinarian`
--

INSERT INTO `veterinarian` (`id_vet`, `dnivet`, `nomvet`, `apevet`, `direcc`, `sexo`, `correo`, `fijo`, `movil`, `contra`, `estado`, `fere`) VALUES
(15, '5072178', 'BETTY', 'Fagundez', 'Mercedes', 'Femenino', 'betty.fag2@gmail.com', '02445671902', '04161072307', '$2y$10$i1IuzusKnfhD/wvcNkDDAuN9XgE0jcGwIobskj0VhZQ2ufS5FttMG', '1', '2024-03-09'),
(16, '20758999', 'Nohemi', 'Fernandez', 'Maracay', 'Femenino', 'Nohemiferlob@gmail.com', '', '04124567235', '$2y$10$heFfDD5E1A7kq6fQOXDGfOUnx5BwQaZA.bTSI9DJv.liOunPr9gU2', '1', '0000-00-00'),
(17, '10059758', 'Magaly', 'Lobata', 'La Victoria', 'Femenino', 'Magalynohemi@gmail.com', '', '04124395250', '$2y$10$1bN3mqCO.nYkPdhQHVvuROyQ8YCWHPe4.xy.k6ctqMQru06LIQc7K', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `weight`
--

CREATE TABLE `weight` (
  `weightID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Volcado de datos para la tabla `weight`
--

INSERT INTO `weight` (`weightID`, `name`, `date`, `status`) VALUES
(1, 'Kilogramos (kg)', '2024-03-15', 1),
(3, 'Gramos (g)', '2024-03-15', 1),
(4, 'Toneladas (t)', '2024-03-15', 1),
(5, 'Mililitros (ml)', '2024-03-22', 1),
(6, 'Microgramos (mcg)', '2024-03-22', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id_animal`);

--
-- Indices de la tabla `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`audit`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indices de la tabla `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_due`);

--
-- Indices de la tabla `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_tiM` (`id_tiM`),
  ADD KEY `id_raza` (`id_raza`),
  ADD KEY `id_due` (`id_due`),
  ADD KEY `weightID` (`weightID`);

--
-- Indices de la tabla `pet_type`
--
ALTER TABLE `pet_type`
  ADD PRIMARY KEY (`id_tiM`);

--
-- Indices de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD PRIMARY KEY (`id_pcomp`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id_pvendi`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_cate` (`id_cate`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quotesID`),
  ADD KEY `ownerID` (`ownerID`),
  ADD KEY `vetID` (`vetID`);

--
-- Indices de la tabla `quotes_pets`
--
ALTER TABLE `quotes_pets`
  ADD PRIMARY KEY (`quotes_petsID`),
  ADD KEY `quotes_pets_ibfk_1` (`quotesID`),
  ADD KEY `quotes_pets_ibfk_2` (`petsID`);

--
-- Indices de la tabla `quotes_services`
--
ALTER TABLE `quotes_services`
  ADD PRIMARY KEY (`quotes_servicesID`),
  ADD KEY `quotes_services_ibfk_1` (`quotesID`),
  ADD KEY `quotes_services_ibfk_3` (`serviceID`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id_raza`),
  ADD KEY `id_tiM` (`id_tiM`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_servi`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_due` (`id_due`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_prove`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_due` (`id_due`);

--
-- Indices de la tabla `veterinarian`
--
ALTER TABLE `veterinarian`
  ADD PRIMARY KEY (`id_vet`);

--
-- Indices de la tabla `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`weightID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `audit`
--
ALTER TABLE `audit`
  MODIFY `audit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `owner`
--
ALTER TABLE `owner`
  MODIFY `id_due` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `pet_type`
--
ALTER TABLE `pet_type`
  MODIFY `id_tiM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  MODIFY `id_pcomp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id_pvendi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quotesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de la tabla `quotes_pets`
--
ALTER TABLE `quotes_pets`
  MODIFY `quotes_petsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT de la tabla `quotes_services`
--
ALTER TABLE `quotes_services`
  MODIFY `quotes_servicesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id_raza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `id_servi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_prove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `veterinarian`
--
ALTER TABLE `veterinarian`
  MODIFY `id_vet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `weight`
--
ALTER TABLE `weight`
  MODIFY `weightID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_prove`) REFERENCES `supplier` (`id_prove`);

--
-- Filtros para la tabla `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_tiM`) REFERENCES `pet_type` (`id_tiM`),
  ADD CONSTRAINT `pet_ibfk_2` FOREIGN KEY (`id_raza`) REFERENCES `raza` (`id_raza`),
  ADD CONSTRAINT `pet_ibfk_3` FOREIGN KEY (`id_due`) REFERENCES `owner` (`id_due`),
  ADD CONSTRAINT `pet_ibfk_4` FOREIGN KEY (`weightID`) REFERENCES `weight` (`weightID`);

--
-- Filtros para la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`ownerID`) REFERENCES `owner` (`id_due`),
  ADD CONSTRAINT `quotes_ibfk_2` FOREIGN KEY (`vetID`) REFERENCES `veterinarian` (`id_vet`);

--
-- Filtros para la tabla `quotes_pets`
--
ALTER TABLE `quotes_pets`
  ADD CONSTRAINT `quotes_pets_ibfk_1` FOREIGN KEY (`quotesID`) REFERENCES `quotes` (`quotesID`),
  ADD CONSTRAINT `quotes_pets_ibfk_2` FOREIGN KEY (`petsID`) REFERENCES `pet` (`id_pet`);

--
-- Filtros para la tabla `quotes_services`
--
ALTER TABLE `quotes_services`
  ADD CONSTRAINT `quotes_services_ibfk_1` FOREIGN KEY (`quotesID`) REFERENCES `quotes` (`quotesID`),
  ADD CONSTRAINT `quotes_services_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service` (`id_servi`);

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`id_tiM`) REFERENCES `pet_type` (`id_tiM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_due`) REFERENCES `owner` (`id_due`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `animales` (`id_animal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
