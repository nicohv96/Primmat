-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2020 a las 08:02:38
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_primmat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(10) NOT NULL,
  `titulo_acticidad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_actividad` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen_actividad` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `archivo_actividad_principal` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_calificada`
--

CREATE TABLE `actividad_calificada` (
  `id_actividad_calificada` int(10) NOT NULL,
  `observacion` varchar(200) NOT NULL,
  `calificacion` varchar(200) NOT NULL,
  `rela_usuario` int(10) NOT NULL,
  `rela_actividad_desarrollada` int(10) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad_calificada`
--

INSERT INTO `actividad_calificada` (`id_actividad_calificada`, `observacion`, `calificacion`, `rela_usuario`, `rela_actividad_desarrollada`, `ruta`) VALUES
(10, 'observacion', '8', 2, 3, 'upload_1/CONTENIDOS.docx'),
(16, 'muy bueno', '8', 2, 2, 'upload_1/bd_PNG'),
(20, 'bueno', '5', 2, 2, 'upload_1/bd_PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_desarrollada`
--

CREATE TABLE `actividad_desarrollada` (
  `id_teoria_actividad_desarrollada` int(10) NOT NULL,
  `rela_usuario` int(10) DEFAULT NULL,
  `desc_actividad_desarrollada` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `size` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad_desarrollada`
--

INSERT INTO `actividad_desarrollada` (`id_teoria_actividad_desarrollada`, `rela_usuario`, `desc_actividad_desarrollada`, `ruta`, `tipo`, `size`) VALUES
(1, 1, 'db_analisis', 'upload/', 'image/png', 35277),
(2, 1, 'caso de uso', 'upload/', 'image/png', 54914),
(3, 1, 'caso de uso', 'upload/', 'image/png', 54914),
(4, 1, 'caso de uso', 'upload/', 'image/png', 54914),
(5, 1, 'caso de uso', 'upload/', 'image/png', 54914),
(6, 1, 'contenidos', 'upload/', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 19634),
(7, 1, 'alcanse', 'upload/alcance de proyecto de analisis.txt', 'text/plain', 726),
(8, 1, 'tp6', 'upload/Trabajo PrÃ¡ctico N6.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 43888),
(12, 1, 'plantilla', 'upload/plantillas de casos de usos de inicio SesiÃ³n.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 16080);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(10) NOT NULL,
  `codigo_clase` int(4) DEFAULT NULL,
  `nombre_clase` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_clase` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rela_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_clase`
--

CREATE TABLE `detalle_clase` (
  `id_detalle_clase` int(10) NOT NULL,
  `rela_usuario` int(10) DEFAULT NULL,
  `rela_clase` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_clase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_foro`
--

CREATE TABLE `detalle_foro` (
  `id_detalle_foro` int(10) NOT NULL,
  `rela_usuario` int(10) DEFAULT NULL,
  `rela_foro` int(10) DEFAULT NULL,
  `respuesta` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_foro` int(10) NOT NULL,
  `rela_clase` int(10) DEFAULT NULL,
  `rela_usuario` int(10) DEFAULT NULL,
  `mensaje` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) NOT NULL,
  `nombre_persona` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido_persona` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rela_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre_persona`, `apellido_persona`, `rela_usuario`) VALUES
(1, 'Nicolas', 'Villalba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(10) NOT NULL,
  `rela_tema` int(10) DEFAULT NULL,
  `desc_pregunta` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resp_correcta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resp_incorrecta1` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resp_incorrecta2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resp_incorrecta3` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(10) NOT NULL,
  `nivel` int(10) DEFAULT NULL,
  `titulo_tema` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_tema` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rela_clase` int(10) DEFAULT NULL,
  `rela_teoria` int(10) DEFAULT NULL,
  `rela_actividad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teoria`
--

CREATE TABLE `teoria` (
  `id_teoria` int(10) NOT NULL,
  `desc_teoria` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen_teoria` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `video_teoria` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `enlace_teoria` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(10) NOT NULL,
  `desc_tipo_usuario` varchar(40) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `desc_tipo_usuario`) VALUES
(1, 'alumno'),
(2, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `user_name` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rela_tipo_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `user_name`, `password`, `rela_tipo_usuario`) VALUES
(1, 'admin', 'admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `actividad_calificada`
--
ALTER TABLE `actividad_calificada`
  ADD PRIMARY KEY (`id_actividad_calificada`),
  ADD KEY `fk_actividad_calificada_usuario` (`rela_usuario`),
  ADD KEY `fk_actividadCalificada_actividadDesarrollada` (`rela_actividad_desarrollada`);

--
-- Indices de la tabla `actividad_desarrollada`
--
ALTER TABLE `actividad_desarrollada`
  ADD PRIMARY KEY (`id_teoria_actividad_desarrollada`),
  ADD KEY `fk_actividad_desarrollada_usuario` (`rela_usuario`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`),
  ADD KEY `fk_clase_usuario` (`rela_usuario`);

--
-- Indices de la tabla `detalle_clase`
--
ALTER TABLE `detalle_clase`
  ADD PRIMARY KEY (`id_detalle_clase`),
  ADD KEY `fk_detalle_clase_clase` (`rela_clase`),
  ADD KEY `fk_detalle_clase_usuario` (`rela_usuario`);

--
-- Indices de la tabla `detalle_foro`
--
ALTER TABLE `detalle_foro`
  ADD PRIMARY KEY (`id_detalle_foro`),
  ADD KEY `fk_detalle_foro_foro` (`rela_foro`),
  ADD KEY `fk_detalle_foro_usuario` (`rela_usuario`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_foro`),
  ADD KEY `fk_foro_clase` (`rela_clase`),
  ADD KEY `fk_foro_usuario` (`rela_usuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `rela_usuario_persona` (`rela_usuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `fk_pregunta_tema` (`rela_tema`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `fk_tema_actividad` (`rela_actividad`),
  ADD KEY `fk_tema_clase` (`rela_clase`),
  ADD KEY `fk_tema_teoria` (`rela_teoria`);

--
-- Indices de la tabla `teoria`
--
ALTER TABLE `teoria`
  ADD PRIMARY KEY (`id_teoria`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rela_tipo_usuario` (`rela_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividad_calificada`
--
ALTER TABLE `actividad_calificada`
  MODIFY `id_actividad_calificada` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `actividad_desarrollada`
--
ALTER TABLE `actividad_desarrollada`
  MODIFY `id_teoria_actividad_desarrollada` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detalle_clase`
--
ALTER TABLE `detalle_clase`
  MODIFY `id_detalle_clase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_foro`
--
ALTER TABLE `detalle_foro`
  MODIFY `id_detalle_foro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_foro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teoria`
--
ALTER TABLE `teoria`
  MODIFY `id_teoria` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_calificada`
--
ALTER TABLE `actividad_calificada`
  ADD CONSTRAINT `fk_actividadCalificada_actividadDesarrollada` FOREIGN KEY (`rela_actividad_desarrollada`) REFERENCES `actividad_desarrollada` (`id_teoria_actividad_desarrollada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_actividad_calificada_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividad_desarrollada`
--
ALTER TABLE `actividad_desarrollada`
  ADD CONSTRAINT `fk_actividad_desarrollada_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `fk_clase_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_clase`
--
ALTER TABLE `detalle_clase`
  ADD CONSTRAINT `fk_detalle_clase_clase` FOREIGN KEY (`rela_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_clase_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_foro`
--
ALTER TABLE `detalle_foro`
  ADD CONSTRAINT `fk_detalle_foro_foro` FOREIGN KEY (`rela_foro`) REFERENCES `foro` (`id_foro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_foro_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `fk_foro_clase` FOREIGN KEY (`rela_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_foro_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_usuario` FOREIGN KEY (`rela_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_tema` FOREIGN KEY (`rela_tema`) REFERENCES `tema` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_tema_actividad` FOREIGN KEY (`rela_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tema_clase` FOREIGN KEY (`rela_clase`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tema_teoria` FOREIGN KEY (`rela_teoria`) REFERENCES `teoria` (`id_teoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `rela_tipo_usuario` FOREIGN KEY (`rela_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
