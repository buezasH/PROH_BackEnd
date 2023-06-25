-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-06-2022 a las 13:13:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bddtienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `codigo_pedido` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `unidades` int(11) DEFAULT NULL,
  `precio_unitario` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`codigo_pedido`, `codigo_producto`, `unidades`, `precio_unitario`) VALUES
(2, 8, 2, '112.00'),
(28, 7, 1, '140.00'),
(28, 10, 1, '170.00'),
(28, 11, 2, '220.00'),
(29, 7, 1, '140.00'),
(29, 10, 1, '170.00'),
(30, 7, 1, '140.00'),
(42, 9, 2, '120.00'),
(42, 11, 1, '220.00'),
(43, 7, 1, '140.00'),
(43, 8, 1, '55.00'),
(44, 9, 1, '120.00'),
(44, 10, 2, '170.00'),
(45, 9, 1, '120.00'),
(45, 11, 1, '220.00'),
(46, 8, 1, '55.00'),
(46, 9, 1, '120.00'),
(47, 10, 1, '170.00'),
(47, 11, 1, '220.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `codigo` int(11) NOT NULL,
  `persona` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `importe` decimal(8,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`codigo`, `persona`, `fecha`, `importe`, `estado`) VALUES
(2, 3, '2022-04-04', '256.00', 3),
(28, 1, '2022-06-25', '750.00', 1),
(29, 1, '2022-06-25', '310.00', 2),
(30, 1, '2022-06-25', '480.00', 1),
(41, 2, '2022-06-26', '128.00', 3),
(42, 1, '2022-06-26', '460.00', 0),
(43, 1, '2022-06-26', '195.00', 3),
(44, 2, '2022-06-26', '460.00', 0),
(45, 2, '2022-06-26', '340.00', 3),
(46, 1, '2022-06-27', '175.00', 0),
(47, 1, '2022-06-27', '390.00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `descripcion`, `precio`, `existencias`, `imagen`) VALUES
(7, 'Air Force 1 Mid', '140.00', 12, 'airforce-mid.jpeg'),
(8, 'Jordan Long Sleeve T-Shirt ', '55.00', 24, 'mj-tee.jpeg'),
(9, 'Reebok Classic Leather', '120.00', 11, 'reebok-classic.jpeg'),
(10, 'Air Jordan 1 Retro High OG Heritaga', '170.00', 11, 'jordan1-retro.jpeg'),
(11, 'Comme des Garçons Black', '220.00', 13, 'eaglexnike.jpeg'),
(22, 'Prueba1', '170.75', 10, 'p1.png'),
(23, 'Prueba2', '122.00', 52, 'll.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `activo` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `usuario` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL,
  `clave` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL,
  `nombre` varchar(64) COLLATE utf8mb4_bin DEFAULT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `domicilio` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `poblacion` varchar(64) COLLATE utf8mb4_bin DEFAULT NULL,
  `provincia` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL,
  `cp` char(5) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefono` char(9) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `activo`, `admin`, `usuario`, `clave`, `nombre`, `apellidos`, `domicilio`, `poblacion`, `provincia`, `cp`, `telefono`) VALUES
(1, 1, 1, 'alexisdlhb', '123456', 'Alexis', 'de la Hoz Buezas', 'Cura Aguilar 19,1', 'Valencia', 'VLC', '46020', '658652359'),
(2, 1, 0, 'petardo', 'petardo', 'Pepe', 'Pepe', 'calle jaca', 'Valencia', 'Valencia', '46008', '644027284'),
(3, 1, 0, 'pacopatates', '123', 'Daniel', 'Medal', 'Calle Paco', 'Valencia', 'Valencia', '46007', '644025284'),
(4, 1, 0, 'lacfya', '12345', 'Lara', 'Navarro', 'Mi casa', 'Valencia', 'Valencia', '46000', '666666666'),
(5, 1, 0, 'prueba', '123', 'Prue', 'Ba', 'c/prb 2', '123', '123', '123', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`codigo_pedido`,`codigo_producto`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `persona` (`persona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`codigo_pedido`) REFERENCES `pedidos` (`codigo`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`persona`) REFERENCES `usuarios` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
