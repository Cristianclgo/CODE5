-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 03:20:29
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

--
-- Volcado de datos para la tabla `afiliacion`
--

INSERT INTO `afiliacion` (`Afilb`, `dateafilb`, `id_mascota`) VALUES
('55', '2022-09-12', '78');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(10) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Sano'),
(4, 'Enfermo'),
(8, 'aplastado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotasclientes`
--

CREATE TABLE `mascotasclientes` (
  `id_mascota` varchar(10) NOT NULL,
  `nom_masc` char(10) DEFAULT NULL,
  `iduser` int(60) NOT NULL,
  `color` char(20) DEFAULT NULL,
  `id_tip_masc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascotasclientes`
--

INSERT INTO `mascotasclientes` (`id_mascota`, `nom_masc`, `iduser`, `color`, `id_tip_masc`) VALUES
('58', 'niko', 44444, 'gris', 2),
('78', 'pancho', 22222, 'cafe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `idMedicamento` int(10) NOT NULL,
  `Medicamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`idMedicamento`, `Medicamento`) VALUES
(1, 'Antiinflamatorio Natural Para Mascotas Traumeel Ad'),
(2, 'Solución Antiséptica Baxidin Valvula'),
(3, 'Medicamento Homeopático Gastricumeel'),
(4, 'Medicamento Dermatológico Para Perro Apoquel'),
(5, 'dolex'),
(6, 'aspirina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `idRecibo` int(18) NOT NULL,
  `idVisita` int(11) DEFAULT NULL,
  `idMedicamento` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`idRecibo`, `idVisita`, `idMedicamento`) VALUES
(1, 69, 6),
(2, 1, 3),
(3, 12, 3),
(12, 58, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomascotas`
--

CREATE TABLE `tipomascotas` (
  `id_tip_masc` int(10) NOT NULL,
  `tip_masc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomascotas`
--

INSERT INTO `tipomascotas` (`id_tip_masc`, `tip_masc`) VALUES
(1, 'perro'),
(2, 'gato'),
(3, 'conejo'),
(5, 'loro'),
(6, 'mosca');

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
(7, 'ESPECIALISTA'),
(8, 'medico');

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
  `id_estado` int(10) DEFAULT NULL,
  `contraseña` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`iduser`, `nombreUser`, `direccion`, `correo`, `tipoUsua`, `id_estado`, `contraseña`) VALUES
(22222, 'carlos Lopez', 'call 180', 'camcar@gmail.com', 2, 1, '34567'),
(33333, 'paola martinez', 'calle 60 # 12 -6', 'paolacol@gmail.com', 3, 1, '23456'),
(44444, 'maria rindon', 'calle 12 # 22-18', 'mariaren@hotmail.com', 2, 1, '78945'),
(55555, 'pablo lopez', 'cr 12', 'pablo@hotmail.com', 3, 1, '12345'),
(99999, 'Miguel Suarez', 'Avda 4 n 12', 'suarez@hotmail.com', 1, 1, '12345');

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
  `id_estado` int(10) DEFAULT NULL,
  `temperatura` varchar(5) DEFAULT NULL,
  `ritmoCardio` varchar(5) DEFAULT NULL,
  `recomendaciones` text DEFAULT NULL,
  `valor` decimal(18,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `dateVisita`, `timeVisita`, `iduser`, `id_mascota`, `id_estado`, `temperatura`, `ritmoCardio`, `recomendaciones`, `valor`) VALUES
(1, '2022-09-27', '18:52:00', 22222, '78', 8, '25', '2', 'planchar para hacer tapete', '20000.000'),
(12, '2022-09-28', '18:32:57', 44444, '58', 3, '30', '12', 'por favor que no salga a la calle todavía ya que esta con vértigo', '30000.000'),
(58, '2022-09-06', '22:40:00', 22222, '78', 3, '60', '10', 'sdcsad', '80000.000'),
(69, '2022-09-21', '20:47:00', 22222, '78', 4, '19', '30', 'mucho cuidado', '100000.000');

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
  ADD KEY `iduser` (`iduser`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `idMedicamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `idRecibo` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipomascotas`
--
ALTER TABLE `tipomascotas`
  MODIFY `id_tip_masc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `tipoUsua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
  ADD CONSTRAINT `mascotasclientes_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuario` (`iduser`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mascotasclientes_ibfk_3` FOREIGN KEY (`id_tip_masc`) REFERENCES `tipomascotas` (`id_tip_masc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD CONSTRAINT `recibos_ibfk_1` FOREIGN KEY (`idVisita`) REFERENCES `visita` (`idVisita`),
  ADD CONSTRAINT `recibos_ibfk_2` FOREIGN KEY (`idMedicamento`) REFERENCES `medicamentos` (`idMedicamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tipoUsua`) REFERENCES `tipousuario` (`tipoUsua`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotasclientes` (`id_mascota`),
  ADD CONSTRAINT `visita_ibfk_4` FOREIGN KEY (`iduser`) REFERENCES `usuario` (`iduser`) ON UPDATE CASCADE,
  ADD CONSTRAINT `visita_ibfk_5` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
