-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 19-07-2021 a las 14:41:39
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `asociados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociado`
--

CREATE TABLE `asociado` (
  `idAsociado` int(11) NOT NULL,
  `nombreAsociado` varchar(50) NOT NULL,
  `ApellidoAsociado` varchar(50) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(17) NOT NULL,
  `codEstadoCivil` int(11) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `codLocalizacion` int(11) NOT NULL,
  `codInfoUsuario` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asociado`
--

INSERT INTO `asociado` (`idAsociado`, `nombreAsociado`, `ApellidoAsociado`, `dui`, `nit`, `codEstadoCivil`, `fechaIngreso`, `codLocalizacion`, `codInfoUsuario`, `active`) VALUES
(1, 'Gregor', 'Molina', '21321312-3', '1231-231232-132-1', 2, '2021-07-18', 11, 1, 1),
(2, 'Baron', 'Cortez', '06445785-3', '2398-472389-423-4', 1, '2021-07-19', 13, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombreDepartamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombreDepartamento`) VALUES
(1, 'Ahuachapán'),
(2, 'Cabañas'),
(3, 'Chalatenango'),
(4, 'Cuscatlán'),
(5, 'La Libertad'),
(6, 'La Paz'),
(7, 'La Unión'),
(8, 'Morazán'),
(9, 'San Miguel'),
(10, 'San Salvador'),
(11, 'San Vicente'),
(12, 'Santa Ana'),
(13, 'Sonsonate'),
(14, 'Usulután');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoCivil`
--

CREATE TABLE `estadoCivil` (
  `idEstadoCivil` int(11) NOT NULL,
  `nombreEstadoCivil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadoCivil`
--

INSERT INTO `estadoCivil` (`idEstadoCivil`, `nombreEstadoCivil`) VALUES
(1, 'Casado/a'),
(2, 'Soltero/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infoUsuario`
--

CREATE TABLE `infoUsuario` (
  `idInfoUsuario` int(11) NOT NULL,
  `nombreEmpleado` varchar(50) NOT NULL,
  `apellidoEmpleado` varchar(50) NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `infoUsuario`
--

INSERT INTO `infoUsuario` (`idInfoUsuario`, `nombreEmpleado`, `apellidoEmpleado`, `codUsuario`) VALUES
(1, 'Alberto', 'Grande', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `idLocalizacion` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `codDepartamento` int(11) NOT NULL,
  `codMunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`idLocalizacion`, `direccion`, `codDepartamento`, `codMunicipio`) VALUES
(5, 'qwe', 1, 1),
(6, 'eqweqw', 1, 1),
(7, 'eqweqw', 1, 1),
(8, 'eqweqw', 1, 1),
(9, 'eqweqw', 1, 1),
(10, 'eqweqw', 1, 1),
(11, 'Calle al Volcan\r\n', 6, 96),
(12, 'qweqweqweqwe', 3, 27),
(13, 'Calle al Volcan', 8, 140);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `nombreMunicipio` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `codDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `nombreMunicipio`, `codDepartamento`) VALUES
(1, 'Ahuachapán', 1),
(2, 'Apaneca', 1),
(3, 'Atiquizaya', 1),
(4, 'Concepción de Ataco', 1),
(5, 'El Refugio', 1),
(6, 'Guaymango', 1),
(7, 'Jujutla', 1),
(8, 'San Francisco Menéndez', 1),
(9, 'San Lorenzo', 1),
(10, 'San Pedro Puxtla', 1),
(11, 'Tacuba', 1),
(12, 'Turín', 1),
(13, 'Sensuntepeque', 2),
(14, 'Cinquera', 2),
(15, 'Dolores', 2),
(16, 'Guacotecti', 2),
(17, 'Ilobasco', 2),
(18, 'Jutiapa', 2),
(19, 'San Isidro', 2),
(20, 'Tejutepeque', 2),
(21, 'Victoria', 2),
(22, 'Chalatenango', 3),
(23, 'Agua Caliente', 3),
(24, 'Arcatao', 3),
(25, 'Azacualpa', 3),
(26, 'Cancasque', 3),
(27, 'Citalá', 3),
(28, 'Comalapa', 3),
(29, 'Concepción Quezaltepeque', 3),
(30, 'Dulce Nombre de María', 3),
(31, 'El Carrizal', 3),
(32, 'El Paraíso', 3),
(33, 'La Laguna', 3),
(34, 'La Palma', 3),
(35, 'La Reina', 3),
(36, 'Las Flores', 3),
(37, 'Las Vueltas', 3),
(38, 'Nombre de Jesús', 3),
(39, 'Nueva Concepción', 3),
(40, 'Nueva Trinidad', 3),
(41, 'Ojos de Agua', 3),
(42, 'Potonico', 3),
(43, 'San Antonio de la Cruz', 3),
(44, 'San Antonio Los Ranchos', 3),
(45, 'San Fernando', 3),
(46, 'San Francisco Lempa', 3),
(47, 'San Francisco Morazán', 3),
(48, 'San Ignacio', 3),
(49, 'San Isidro Labrador', 3),
(50, 'San Luis del Carmen', 3),
(51, 'San Miguel de Mercedes', 3),
(52, 'San Rafael', 3),
(53, 'Santa Rita', 3),
(54, 'Tejutla', 3),
(55, 'Cojutepeque', 4),
(56, 'Candelaria', 4),
(57, 'El Carmen', 4),
(58, 'El Rosario', 4),
(59, 'Monte San Juan', 4),
(60, 'Oratorio de Concepción', 4),
(61, 'San Bartolomé Perulapía', 4),
(62, 'San Cristóbal', 4),
(63, 'San José Guayabal', 4),
(64, 'San Pedro Perulapán', 4),
(65, 'San Rafael Cedros', 4),
(66, 'San Ramón', 4),
(67, 'Santa Cruz Analquito', 4),
(68, 'Santa Cruz Michapa', 4),
(69, 'Suchitoto', 4),
(70, 'Tenancingo', 4),
(71, 'Santa Tecla', 5),
(72, 'Antiguo Cuscatlán', 5),
(73, 'Chiltiupán', 5),
(74, 'Ciudad Arce', 5),
(75, 'Colón', 5),
(76, 'Comasagua', 5),
(77, 'Huizúcar', 5),
(78, 'Jayaque', 5),
(79, 'Jicalapa', 5),
(80, 'La Libertad', 5),
(81, 'Nuevo Cuscatlán', 5),
(82, 'Quezaltepeque', 5),
(83, 'San Juan Opico', 5),
(84, 'Sacacoyo', 5),
(85, 'San José Villanueva', 5),
(86, 'San Matías', 5),
(87, 'San Pablo Tacachico', 5),
(88, 'Talnique', 5),
(89, 'Tamanique', 5),
(90, 'Teotepeque', 5),
(91, 'Tepecoyo', 5),
(92, 'Zaragoza', 5),
(93, 'Zacatecoluca', 6),
(94, 'Cuyultitán', 6),
(95, 'El Rosario', 6),
(96, 'Jerusalén', 6),
(97, 'Mercedes La Ceiba', 6),
(98, 'Olocuilta', 6),
(99, 'Paraíso de Osorio', 6),
(100, 'San Antonio Masahuat', 6),
(101, 'San Emigdio', 6),
(102, 'San Francisco Chinameca', 6),
(103, 'San Pedro Masahuat', 6),
(104, 'San Juan Nonualco', 6),
(105, 'San Juan Talpa', 6),
(106, 'San Juan Tepezontes', 6),
(107, 'San Luis La Herradura', 6),
(108, 'San Luis Talpa', 6),
(109, 'San Miguel Tepezontes', 6),
(110, 'San Pedro Nonualco', 6),
(111, 'San Rafael Obrajuelo', 6),
(112, 'Santa María Ostuma', 6),
(113, 'Santiago Nonualco', 6),
(114, 'Tapalhuaca', 6),
(115, 'La Unión', 7),
(116, 'Anamorós', 7),
(117, 'Bolívar', 7),
(118, 'Concepción de Oriente', 7),
(119, 'Conchagua', 7),
(120, 'El Carmen', 7),
(121, 'El Sauce', 7),
(122, 'Intipucá', 7),
(123, 'Lislique', 7),
(124, 'Meanguera del Golfo', 7),
(125, 'Nueva Esparta', 7),
(126, 'Pasaquina', 7),
(127, 'Polorós', 7),
(128, 'San Alejo', 7),
(129, 'San José', 7),
(130, 'Santa Rosa de Lima', 7),
(131, 'Yayantique', 7),
(132, 'Yucuaiquín', 7),
(133, 'San Francisco Gotera', 8),
(134, 'Arambala', 8),
(135, 'Cacaopera', 8),
(136, 'Chilanga', 8),
(137, 'Corinto', 8),
(138, 'Delicias de Concepción', 8),
(139, 'El Divisadero', 8),
(140, 'El Rosario', 8),
(141, 'Gualococti', 8),
(142, 'Guatajiagua', 8),
(143, 'Joateca', 8),
(144, 'Jocoaitique', 8),
(145, 'Jocoro', 8),
(146, 'Lolotiquillo', 8),
(147, 'Meanguera', 8),
(148, 'Osicala', 8),
(149, 'Perquín', 8),
(150, 'San Carlos', 8),
(151, 'San Fernando', 8),
(152, 'San Isidro', 8),
(153, 'San Simón', 8),
(154, 'Sensembra', 8),
(155, 'Sociedad', 8),
(156, 'Torola', 8),
(157, 'Yamabal', 8),
(158, 'Yoloaiquín', 8),
(159, 'San Miguel', 9),
(160, 'Carolina', 9),
(161, 'Chapeltique', 9),
(162, 'Chinameca', 9),
(163, 'Chirilagua', 9),
(164, 'Ciudad Barrios', 9),
(165, 'Comacarán', 9),
(166, 'El Tránsito', 9),
(167, 'Lolotique', 9),
(168, 'Moncagua', 9),
(169, 'Nueva Guadalupe', 9),
(170, 'Nuevo Edén de San Juan', 9),
(171, 'Quelepa', 9),
(172, 'San Antonio', 9),
(173, 'San Gerardo', 9),
(174, 'San Jorge', 9),
(175, 'San Luis de la Reina', 9),
(176, 'San Rafael Oriente', 9),
(177, 'Sesori', 9),
(178, 'Uluazapa', 9),
(179, 'San Salvador', 10),
(180, 'Aguilares', 10),
(181, 'Apopa', 10),
(182, 'Ayutuxtepeque', 10),
(183, 'Cuscatancingo', 10),
(184, 'Delgado', 10),
(185, 'El Paisnal', 10),
(186, 'Guazapa', 10),
(187, 'Ilopango', 10),
(188, 'Mejicanos', 10),
(189, 'Nejapa', 10),
(190, 'Panchimalco', 10),
(191, 'Rosario de Mora', 10),
(192, 'San Marcos', 10),
(193, 'San Martín', 10),
(194, 'Santiago Texacuangos', 10),
(195, 'Santo Tomás', 10),
(196, 'Soyapango', 10),
(197, 'Tonacatepeque', 10),
(198, 'San Vicente', 11),
(199, 'Apastepeque', 11),
(200, 'Guadalupe', 11),
(201, 'San Cayetano Istepeque', 11),
(202, 'San Esteban Catarina', 11),
(203, 'San Ildefonso', 11),
(204, 'San Lorenzo', 11),
(205, 'San Sebastián', 11),
(206, 'Santa Clara', 11),
(207, 'Santo Domingo', 11),
(208, 'Tecoluca', 11),
(209, 'Tepetitán', 11),
(210, 'Verapaz', 11),
(211, 'Santa Ana', 12),
(212, 'Candelaria de la Frontera', 12),
(213, 'Chalchuapa', 12),
(214, 'Coatepeque', 12),
(215, 'El Congo', 12),
(216, 'El Porvenir', 12),
(217, 'Masahuat', 12),
(218, 'Metapán', 12),
(219, 'San Antonio Pajonal', 12),
(220, 'San Sebastián Salitrillo', 12),
(221, 'Santa Rosa Guachipilín', 12),
(222, 'Santiago de la Frontera', 12),
(223, 'Texistepeque', 12),
(224, 'Sonsonate', 13),
(225, 'Acajutla', 13),
(226, 'Armenia', 13),
(227, 'Caluco', 13),
(228, 'Cuisnahuat', 13),
(229, 'Izalco', 13),
(230, 'Juayúa', 13),
(231, 'Nahuizalco', 13),
(232, 'Nahulingo', 13),
(233, 'Salcoatitán', 13),
(234, 'San Antonio del Monte', 13),
(235, 'San Julián', 13),
(236, 'Santa Catarina Masahuat', 13),
(237, 'Santa Isabel Ishuatán', 13),
(238, 'Santo Domingo de Guzmán', 13),
(239, 'Sonzacate', 13),
(240, 'Usulután', 14),
(241, 'Alegría', 14),
(242, 'Berlín', 14),
(243, 'California', 14),
(244, 'Concepción Batres', 14),
(245, 'El Triunfo', 14),
(246, 'Ereguayquín', 14),
(247, 'Estanzuelas', 14),
(248, 'Jiquilisco', 14),
(249, 'Jucuapa', 14),
(250, 'Jucuarán', 14),
(251, 'Mercedes Umaña', 14),
(252, 'Nueva Granada', 14),
(253, 'Ozatlán', 14),
(254, 'Puerto El Triunfo', 14),
(255, 'San Agustín', 14),
(256, 'San Buenaventura', 14),
(257, 'San Dionisio', 14),
(258, 'San Francisco Javier', 14),
(259, 'Santa Elena', 14),
(260, 'Santa María', 14),
(261, 'Santiago de María', 14),
(262, 'Tecapán', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `password`) VALUES
(1, 'alberto.grande', 'd812dcb0c98fed47d8aaf144b8886910e7815baf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asociado`
--
ALTER TABLE `asociado`
  ADD PRIMARY KEY (`idAsociado`),
  ADD KEY `codInfoUsuario` (`codInfoUsuario`),
  ADD KEY `codLocalizacion` (`codLocalizacion`),
  ADD KEY `codEstadoCivil` (`codEstadoCivil`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `estadoCivil`
--
ALTER TABLE `estadoCivil`
  ADD PRIMARY KEY (`idEstadoCivil`);

--
-- Indices de la tabla `infoUsuario`
--
ALTER TABLE `infoUsuario`
  ADD PRIMARY KEY (`idInfoUsuario`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`idLocalizacion`),
  ADD KEY `codDepartamento` (`codDepartamento`),
  ADD KEY `codMunicipio` (`codMunicipio`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `codDepartamento` (`codDepartamento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociado`
--
ALTER TABLE `asociado`
  MODIFY `idAsociado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estadoCivil`
--
ALTER TABLE `estadoCivil`
  MODIFY `idEstadoCivil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `infoUsuario`
--
ALTER TABLE `infoUsuario`
  MODIFY `idInfoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  MODIFY `idLocalizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asociado`
--
ALTER TABLE `asociado`
  ADD CONSTRAINT `asociado_ibfk_1` FOREIGN KEY (`codLocalizacion`) REFERENCES `localizacion` (`idLocalizacion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asociado_ibfk_2` FOREIGN KEY (`codInfoUsuario`) REFERENCES `infoUsuario` (`idInfoUsuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `asociado_ibfk_3` FOREIGN KEY (`codEstadoCivil`) REFERENCES `estadoCivil` (`idEstadoCivil`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `infoUsuario`
--
ALTER TABLE `infoUsuario`
  ADD CONSTRAINT `infousuario_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD CONSTRAINT `localizacion_ibfk_1` FOREIGN KEY (`codMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `localizacion_ibfk_2` FOREIGN KEY (`codDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE CASCADE;
