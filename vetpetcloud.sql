-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2022 a las 02:58:41
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vetpetcloud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliacion`
--

CREATE TABLE `afiliacion` (
  `Afilb` varchar(20) NOT NULL,
  `dateafilb` date DEFAULT NULL,
  `id_mascota` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` varchar(20) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
('1', 'Activo'),
('2', 'Inactivo'),
('3', 'Sano'),
('4', 'Enfermo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotasclientes`
--

CREATE TABLE `mascotasclientes` (
  `id_mascota` varchar(10) NOT NULL,
  `nom_masc` char(10) DEFAULT NULL,
  `iduser` int(60) NOT NULL,
  `color` char(20) DEFAULT NULL,
  `id_tip_masc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `idMedicamento` varchar(20) NOT NULL,
  `Medicamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`idMedicamento`, `Medicamento`) VALUES
('med01', 'Antiinflamatorio Natural Para Mascotas Traumeel Ad'),
('med02', 'Solución Antiséptica Baxidin Valvula'),
('med03', 'Medicamento Homeopático Gastricumeel'),
('med04', 'Medicamento Dermatológico Para Perro Apoquel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `idRecibo` int(18) NOT NULL,
  `idVisita` int(11) DEFAULT NULL,
  `idMedicamento` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomascotas`
--

CREATE TABLE `tipomascotas` (
  `id_tip_masc` varchar(10) NOT NULL,
  `tip_masc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomascotas`
--

INSERT INTO `tipomascotas` (`id_tip_masc`, `tip_masc`) VALUES
('m1', 'perro'),
('m2', 'gato'),
('m3', 'conejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `tipoUsua` int(11) NOT NULL,
  `clasiUser` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`tipoUsua`, `clasiUser`) VALUES
(1, 'Administrador'),
(2, 'Propietario'),
(3, 'Veterinario'),
(4, 'LOCO'),
(6, 'enfermero'),
(7, 'ESPECIALISTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `iduser` int(60) NOT NULL,
  `nombreUser` varchar(50) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `tipoUsua` int(11) DEFAULT NULL,
  `id_estado` varchar(20) DEFAULT NULL,
  `contraseña` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`iduser`, `nombreUser`, `direccion`, `correo`, `tipoUsua`, `id_estado`, `contraseña`) VALUES
(88888, 'd', 'kr', 'hh@gmail.com', 2, '2', '23456'),
(99999, 'Miguel Suarez', 'Avda 4 n 12', 'suarez@hotmail.com', 1, '1', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `idVisita` int(11) NOT NULL,
  `dateVisita` date DEFAULT NULL,
  `timeVisita` time DEFAULT NULL,
  `iduser` int(60) DEFAULT NULL,
  `id_mascota` varchar(10) DEFAULT NULL,
  `id_estado` varchar(20) DEFAULT NULL,
  `temperatura` varchar(5) DEFAULT NULL,
  `ritmoCardio` varchar(5) DEFAULT NULL,
  `recomendaciones` text DEFAULT NULL,
  `valor` decimal(18,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliacion`
--
ALTER TABLE `afiliacion`
  ADD PRIMARY KEY (`Afilb`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `mascotasclientes`
--
ALTER TABLE `mascotasclientes`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_tip_masc` (`id_tip_masc`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`idMedicamento`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`idRecibo`),
  ADD KEY `idVisita` (`idVisita`),
  ADD KEY `idMedicamento` (`idMedicamento`);

--
-- Indices de la tabla `tipomascotas`
--
ALTER TABLE `tipomascotas`
  ADD PRIMARY KEY (`id_tip_masc`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`tipoUsua`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fK_tipoUser` (`tipoUsua`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idVisita`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `iduser` (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `idRecibo` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `tipoUsua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliacion`
--
ALTER TABLE `afiliacion`
  ADD CONSTRAINT `afiliacion_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotasclientes` (`id_mascota`);

--
-- Filtros para la tabla `mascotasclientes`
--
ALTER TABLE `mascotasclientes`
  ADD CONSTRAINT `mascotasclientes_ibfk_1` FOREIGN KEY (`id_tip_masc`) REFERENCES `tipomascotas` (`id_tip_masc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mascotasclientes_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuario` (`iduser`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD CONSTRAINT `recibos_ibfk_1` FOREIGN KEY (`idVisita`) REFERENCES `visita` (`idVisita`),
  ADD CONSTRAINT `recibos_ibfk_2` FOREIGN KEY (`idMedicamento`) REFERENCES `medicamentos` (`idMedicamento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tipoUsua`) REFERENCES `tipousuario` (`tipoUsua`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotasclientes` (`id_mascota`),
  ADD CONSTRAINT `visita_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `visita_ibfk_4` FOREIGN KEY (`iduser`) REFERENCES `usuario` (`iduser`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
