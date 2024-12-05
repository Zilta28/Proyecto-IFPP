-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2023 a las 05:43:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina_ifpp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceptacion_ep`
--

CREATE TABLE `aceptacion_ep` (
  `id_ep` int(11) NOT NULL,
  `nombreExpide` varchar(100) NOT NULL,
  `cargoP` varchar(150) NOT NULL,
  `nombreEscuela` varchar(200) NOT NULL,
  `nombrePrestatario` varchar(100) NOT NULL,
  `nombreLic` varchar(50) NOT NULL,
  `noCuenta` int(10) NOT NULL,
  `horas` int(10) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aceptacion_ep`
--

INSERT INTO `aceptacion_ep` (`id_ep`, `nombreExpide`, `cargoP`, `nombreEscuela`, `nombrePrestatario`, `nombreLic`, `noCuenta`, `horas`, `ruta`) VALUES
(2, 'JUAN', 'FFD', '1', '1', '1', 1, 1, ''),
(3, 'FDSF', 'BV', '1', '1', '1', 1, 1, ''),
(4, '1', 'GRGSDDSFDS', '1', '1', '1', 1, 1, ''),
(6, 'JUAN', 'DIRECTOR', 'UAEH', 'OLIVER', 'CC', 25, 500, ''),
(7, 'GFDG', 'DIRECTOR', 'SDF', 'DFGDF', '54HGFH', 0, 545, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceptacion_pp`
--

CREATE TABLE `aceptacion_pp` (
  `Id_pp` int(11) NOT NULL,
  `nombreExpide` varchar(100) NOT NULL,
  `cargoPer` varchar(150) NOT NULL,
  `nombreEscuela` varchar(100) NOT NULL,
  `nombreEstudiante` varchar(50) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `noCuenta` int(10) NOT NULL,
  `numHoras` int(10) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aceptacion_pp`
--

INSERT INTO `aceptacion_pp` (`Id_pp`, `nombreExpide`, `cargoPer`, `nombreEscuela`, `nombreEstudiante`, `carrera`, `noCuenta`, `numHoras`, `ruta`) VALUES
(5, 'HSHS', 'SJSJS', 'SSS', 'SSS', 'DD', 0, 727, ''),
(6, 'DFGFDDFSDF', 'INSTITUTO DE FORMACIóN PROFESIONAL DE LA PROCURADURíA DE HIDALGO', 'HGJGHJ', 'HJGHJGHJ', 'INSTITUTO DE FORMACIóN PROFESIONAL DE LA PROCURADU', 0, 768, 'Fotografias/undraw_Female_avatar_efig.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceptacion_ss`
--

CREATE TABLE `aceptacion_ss` (
  `Id_ss` int(11) NOT NULL,
  `directivo` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `escuela` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `prestatario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `carrera` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `horas` int(5) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aceptacion_ss`
--

INSERT INTO `aceptacion_ss` (`Id_ss`, `directivo`, `cargo`, `escuela`, `prestatario`, `carrera`, `matricula`, `horas`, `ruta`) VALUES
(6, 'JUANA', 'DIRECTORA', 'DFG', 'WQ', 'SA', '21', 453, ''),
(11, 'SDF', 'DSF', 'EW', 'EW', 'WE', 'EW3', 323, ''),
(12, 'SDFS', 'DSFSD', 'SDFSD', 'SDFSD', 'FSDF', 'fsdfs', 323, 'Foto_Carta_Aceptacion_SS/Invitación Vertical para Baby Shower Safari Ilustrado.png'),
(13, 'DFGDF', 'T6YTRYTR', 'TRYRTYRTH', 'JKJHKHJKJHK', 'HJKJHKHJK', 'kjhkjh', 554, 'Fotografias/Gato.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terminacion_ep`
--

CREATE TABLE `terminacion_ep` (
  `Id_ep` int(11) NOT NULL,
  `nombreExpide` varchar(130) NOT NULL,
  `cargoPer` varchar(150) NOT NULL,
  `nombreEscuela` varchar(200) NOT NULL,
  `nombreEstudiante` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `noCuenta` varchar(20) NOT NULL,
  `area` varchar(100) NOT NULL,
  `subarea` varchar(100) NOT NULL,
  `jefeInmediato` varchar(130) NOT NULL,
  `numHoras` int(5) NOT NULL,
  `periodo_inicio` varchar(100) NOT NULL,
  `periodo_final` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `terminacion_ep`
--

INSERT INTO `terminacion_ep` (`Id_ep`, `nombreExpide`, `cargoPer`, `nombreEscuela`, `nombreEstudiante`, `carrera`, `noCuenta`, `area`, `subarea`, `jefeInmediato`, `numHoras`, `periodo_inicio`, `periodo_final`, `ruta`) VALUES
(1, '1', 'FDSF', '1', '1', '1', '1', '1SDF', '', '1', 1, '1', '554', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terminacion_pp`
--

CREATE TABLE `terminacion_pp` (
  `Id_pp` int(11) NOT NULL,
  `nombreExpide` varchar(130) NOT NULL,
  `cargoPer` varchar(150) NOT NULL,
  `nombreEscuela` varchar(200) NOT NULL,
  `nombreEstudiante` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `noCuenta` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(100) NOT NULL,
  `subarea` varchar(130) NOT NULL,
  `jefeInmediato` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `numHoras` int(5) NOT NULL,
  `periodo_inicio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `periodo_final` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `terminacion_pp`
--

INSERT INTO `terminacion_pp` (`Id_pp`, `nombreExpide`, `cargoPer`, `nombreEscuela`, `nombreEstudiante`, `carrera`, `noCuenta`, `area`, `subarea`, `jefeInmediato`, `numHoras`, `periodo_inicio`, `periodo_final`, `ruta`) VALUES
(1, '1', '', '1', '1', '1', '1', '', '', '1', 1, '1', '', ''),
(2, '1', '', '1', '1', '1', '1', '', '', '1', 1, '1', '', ''),
(3, '1', '', '1', '1', '1', '1', '1', '', '1', 1, '1', '', ''),
(6, '', '', '', '', '', '0', '', '', '', 0, '', '', ''),
(7, '', '', '', '', '', '0', '', '', '', 0, '', '', ''),
(8, 'HGFH', 'GFH', 'GFHF', 'GHGF', 'GFH', 'gfh', 'GHF', 'FGSGF', 'GFH', 453, 'FDGDF', 'FDG', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terminacion_ss`
--

CREATE TABLE `terminacion_ss` (
  `Id_ss` int(11) NOT NULL,
  `nombreExpide` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cargoPer` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombreEscuela` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombreEstudiante` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `carrera` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `noCuenta` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `subarea` varchar(100) NOT NULL,
  `jefeInmediato` varchar(130) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numHoras` int(5) NOT NULL,
  `periodo_inicio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `periodo_final` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `terminacion_ss`
--

INSERT INTO `terminacion_ss` (`Id_ss`, `nombreExpide`, `cargoPer`, `nombreEscuela`, `nombreEstudiante`, `carrera`, `noCuenta`, `area`, `subarea`, `jefeInmediato`, `numHoras`, `periodo_inicio`, `periodo_final`, `ruta`) VALUES
(1, 'LAURA', 'DIRECTORA', 'ICEA', 'DANIEL', 'MERCADOTECNIA', '626262', 'INSTITUTO DE FORMACIóN PROFESIONAL DE LA PROCURADURíA DE HIDALGO', 'DFSD', '626262', 500, '09 DE ENERO', '30 DE JUNIO', ''),
(2, 'WER', 'EWRWE', 'EWR', 'FGDF', 'DFG', 'DFG', 'DFGD', '', 'GDF', 434, 'DFGD', 'DFGDF', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `pass`) VALUES
(1, 'Sheila', 'adminifpp2023'),
(2, 'Sheila', 'adminifpp2023'),
(3, 'admin', 'admin2023'),
(4, 'admin', 'admin2023'),
(5, 'administrador3', 'NRd62BKeo$'),
(6, 'administrador3', 'NRd62BKeo$');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aceptacion_ep`
--
ALTER TABLE `aceptacion_ep`
  ADD PRIMARY KEY (`id_ep`);

--
-- Indices de la tabla `aceptacion_pp`
--
ALTER TABLE `aceptacion_pp`
  ADD PRIMARY KEY (`Id_pp`);

--
-- Indices de la tabla `aceptacion_ss`
--
ALTER TABLE `aceptacion_ss`
  ADD PRIMARY KEY (`Id_ss`);

--
-- Indices de la tabla `terminacion_ep`
--
ALTER TABLE `terminacion_ep`
  ADD PRIMARY KEY (`Id_ep`);

--
-- Indices de la tabla `terminacion_pp`
--
ALTER TABLE `terminacion_pp`
  ADD PRIMARY KEY (`Id_pp`);

--
-- Indices de la tabla `terminacion_ss`
--
ALTER TABLE `terminacion_ss`
  ADD PRIMARY KEY (`Id_ss`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aceptacion_ep`
--
ALTER TABLE `aceptacion_ep`
  MODIFY `id_ep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `aceptacion_pp`
--
ALTER TABLE `aceptacion_pp`
  MODIFY `Id_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `aceptacion_ss`
--
ALTER TABLE `aceptacion_ss`
  MODIFY `Id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `terminacion_ep`
--
ALTER TABLE `terminacion_ep`
  MODIFY `Id_ep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `terminacion_pp`
--
ALTER TABLE `terminacion_pp`
  MODIFY `Id_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `terminacion_ss`
--
ALTER TABLE `terminacion_ss`
  MODIFY `Id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
