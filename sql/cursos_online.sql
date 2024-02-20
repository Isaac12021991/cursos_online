-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2024 a las 18:25:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursos_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `j001t_cursos_online`
--

CREATE TABLE `j001t_cursos_online` (
  `id` int(11) NOT NULL,
  `nb_cursos_online` varchar(100) NOT NULL,
  `ca_puntaje` int(11) DEFAULT 1,
  `ff_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `ff_modificacion` datetime DEFAULT NULL,
  `in_activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla principal de cursos';

--
-- Volcado de datos para la tabla `j001t_cursos_online`
--

INSERT INTO `j001t_cursos_online` (`id`, `nb_cursos_online`, `ca_puntaje`, `ff_creacion`, `ff_modificacion`, `in_activo`) VALUES
(1, 'Vocabulario sobre Trabajo en Inglés', 5, '2024-02-20 13:22:28', NULL, 1),
(2, ' Conversaciones de Trabajo en Inglés', 5, '2024-02-20 13:22:44', NULL, 1),
(3, 'Trabajos y ocupaciones en Inglés', 1, '2024-02-20 13:23:04', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `j002t_cursos_online_detalle`
--

CREATE TABLE `j002t_cursos_online_detalle` (
  `id` int(11) NOT NULL,
  `co_cursos_online` int(11) NOT NULL,
  `co_tipo_clase` int(11) DEFAULT NULL,
  `co_tipo_evaluacion` int(11) DEFAULT NULL,
  `ff_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `ff_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `in_activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `j002t_cursos_online_detalle`
--

INSERT INTO `j002t_cursos_online_detalle` (`id`, `co_cursos_online`, `co_tipo_clase`, `co_tipo_evaluacion`, `ff_creacion`, `ff_modificacion`, `in_activo`) VALUES
(1, 1, 1, 1, '2024-02-20 13:22:28', '2024-02-20 13:22:28', 1),
(2, 2, 1, 1, '2024-02-20 13:22:44', '2024-02-20 13:22:44', 1),
(3, 3, 2, 1, '2024-02-20 13:23:04', '2024-02-20 13:23:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `j003t_tipo_evaluacion`
--

CREATE TABLE `j003t_tipo_evaluacion` (
  `id` int(11) NOT NULL,
  `nb_tipo_evaluacion` varchar(100) NOT NULL,
  `ff_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `ff_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `in_activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `j003t_tipo_evaluacion`
--

INSERT INTO `j003t_tipo_evaluacion` (`id`, `nb_tipo_evaluacion`, `ff_creacion`, `ff_modificacion`, `in_activo`) VALUES
(1, 'Selección', '2024-02-20 09:46:24', '2024-02-20 09:46:24', 1),
(2, 'Pregunta', '2024-02-20 09:46:24', '2024-02-20 09:46:24', 1),
(3, 'Respuesta', '2024-02-20 09:46:42', '2024-02-20 09:46:42', 1),
(4, 'Completacion', '2024-02-20 09:46:42', '2024-02-20 09:46:42', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `j004t_tipo_clase`
--

CREATE TABLE `j004t_tipo_clase` (
  `id` int(11) NOT NULL,
  `nb_tipo_clase` varchar(100) NOT NULL,
  `ff_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `in_activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `j004t_tipo_clase`
--

INSERT INTO `j004t_tipo_clase` (`id`, `nb_tipo_clase`, `ff_creacion`, `in_activo`) VALUES
(1, 'Clase', '2024-02-20 09:45:46', 1),
(2, 'Examen', '2024-02-20 09:45:46', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `j001t_cursos_online`
--
ALTER TABLE `j001t_cursos_online`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `j002t_cursos_online_detalle`
--
ALTER TABLE `j002t_cursos_online_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `j003t_tipo_evaluacion`
--
ALTER TABLE `j003t_tipo_evaluacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `j004t_tipo_clase`
--
ALTER TABLE `j004t_tipo_clase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `j001t_cursos_online`
--
ALTER TABLE `j001t_cursos_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `j002t_cursos_online_detalle`
--
ALTER TABLE `j002t_cursos_online_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `j003t_tipo_evaluacion`
--
ALTER TABLE `j003t_tipo_evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `j004t_tipo_clase`
--
ALTER TABLE `j004t_tipo_clase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
