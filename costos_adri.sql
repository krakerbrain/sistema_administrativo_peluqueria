-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2023 a las 02:56:54
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
-- Base de datos: `costos_adri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `correo_cliente` varchar(200) NOT NULL,
  `ultimo_servicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `id_servicio`, `nombre_cliente`, `correo_cliente`, `ultimo_servicio`) VALUES
(1, 1, 'gdfgfsd', '', '2023-01-18'),
(2, 1, 'sadas', '', '2023-01-18'),
(3, 2, 'Adriana Alfonzo', '', '2023-01-18'),
(4, 2, 'MArio Montenegro', '', '2023-01-18'),
(5, 1, 'ricardo meruane', '', '2023-01-18'),
(8, 1, 'Adamarys Rojas', 'hola@gmail.com', '2023-01-24'),
(9, 1, 's', '', '2023-01-25'),
(10, 1, 's', '', '2023-01-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_registro`
--

CREATE TABLE `clientes_registro` (
  `idcliente` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `correo_cliente` varchar(200) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes_registro`
--

INSERT INTO `clientes_registro` (`idcliente`, `nombre_cliente`, `correo_cliente`, `fecha_creacion`) VALUES
(1, 'Adriana', 'adriana@gmail.com', '2023-01-25'),
(2, 'Adrian Montenegro', 'adrianzor@gmail.com', '2023-01-25'),
(3, 'Daniel Martinez', 'daniel@gmail.com', '2023-01-25'),
(4, 'Enzo Fernandez', 'enzo@gmail.com', '2023-01-25'),
(5, 'Luis Flores', 'luis@gmail.com', '2023-01-25'),
(6, 'Pablo Pez', 'pecesilo@gmail.com', '2023-01-25'),
(7, 'jacinto fernandez', 'jaci@gmail.com', '2023-01-25'),
(8, 'Julio Foosaa', 'Julito@gmail.com', '2023-01-25'),
(9, 'xiomara Bello', 'Xiomara@gmail.com', '2023-01-25'),
(10, 'Ignacio Islas', 'ignacio@gmail.com', '2023-01-25'),
(11, 'alejandro', 'ale@gmail.com', '2023-01-25'),
(12, 'didier drogba', 'didier@gmail.com', '2023-01-25'),
(13, 'Esteban cambiasso', 'elses@gmail.com', '2023-01-25'),
(14, 'cosecha', 'coe@gmail.com', '2023-01-25'),
(15, 'prueba', 'otrop@gmail.com', '2023-01-25'),
(16, 'rosario Tijeras', 'tecorto@gmail.com', '2023-01-25'),
(17, 'jose mujica', 'josem@gmail.com', '2023-01-28'),
(18, '', '', '2023-01-28'),
(19, 'asdsad', 'asdas@gmail.com', '2023-01-28'),
(20, 'alfonso', 'alfi@gmail.com', '2023-01-28'),
(21, 'Josefa perez', 'jose@gmail.com', '2023-01-29'),
(22, 'Sonia rosales', 'sonia@gmail.com', '2023-02-04'),
(23, 'Rosita', 'rosi@gmail.com', '2023-02-14'),
(24, 'Endersonia', 'endersonia@gmail.com', '2023-02-27'),
(25, 'fernanda gonzalez', 'feña@gmail.com', '2023-03-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilistas`
--

CREATE TABLE `estilistas` (
  `idestilista` int(11) NOT NULL,
  `nombre_estilista` varchar(100) NOT NULL,
  `porcentaje_ganancia` int(11) NOT NULL DEFAULT 0,
  `activa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estilistas`
--

INSERT INTO `estilistas` (`idestilista`, `nombre_estilista`, `porcentaje_ganancia`, `activa`) VALUES
(1, 'Adriana Alfonzo', 100, 1),
(5, 'Eduarlys', 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulas`
--

CREATE TABLE `formulas` (
  `idformula` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `largo_cabello` varchar(15) NOT NULL,
  `volumen_cabello` varchar(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formulas`
--

INSERT INTO `formulas` (`idformula`, `id_servicio`, `largo_cabello`, `volumen_cabello`, `id_producto`, `cantidad`, `unidad_medida`) VALUES
(11, 2, 'largo', 'abundante', 2, 900, 'gr'),
(12, 2, 'largo', 'abundante', 8, 50, 'gr'),
(13, 2, 'largo', 'abundante', 6, 20, 'gr'),
(15, 4, 'largo', 'normal', 1, 100, 'gr'),
(16, 4, 'largo', 'abundante', 1, 120, 'gr'),
(17, 2, 'largo', 'normal', 12, 50, 'gr'),
(18, 3, 'largo', 'abundante', 13, 80, 'gr'),
(19, 2, 'largo', 'normal', 14, 10, 'gr'),
(23, 3, 'largo', 'normal', 8, 20, 'gr'),
(34, 1, 'largo', 'abundante', 1, 100, 'gr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_fijos`
--

CREATE TABLE `gastos_fijos` (
  `id_gasto_fijo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos_fijos`
--

INSERT INTO `gastos_fijos` (`id_gasto_fijo`, `descripcion`, `monto`) VALUES
(1, 'Electricidad', 4520),
(2, 'Arriendo', 250000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `costo_producto` float NOT NULL,
  `peso_neto` int(11) NOT NULL,
  `unidad_medida` varchar(3) NOT NULL,
  `costo_unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre_producto`, `costo_producto`, `peso_neto`, `unidad_medida`, `costo_unitario`) VALUES
(1, 'Crema de Peinar', 25000, 5000, 'gr', 5000),
(2, 'alisante', 30500, 2000, 'gr', 15250),
(3, 'decolorante', 30000, 800, 'gr', 37500),
(4, 'agua oxigenada', 10500, 1000, 'gr', 10500),
(5, 'protector termico', 13000, 500, 'gr', 26000),
(6, 'ewr', 34, 213, 'gr', 160),
(8, 'shampoo', 9000, 900, 'gr', 10000),
(9, 'acondicionador', 9000, 900, 'gr', 10000),
(12, 'prueba reg', 1925, 200, 'gr', 9626),
(13, 'prueba 1', 152, 125, 'gr', 1218),
(14, 'prueba2', 1251, 50, 'gr', 25010),
(15, 'prueba 3', 101, 100, 'gr', 1005),
(16, 'prueba4', 101, 200, 'gr', 504),
(17, 'prueba5', 123, 100, 'gr', 1232),
(18, 'prueba6', 123, 100, 'gr', 1232),
(19, 'prueba6', 123, 100, 'gr', 1232),
(20, 'prueba7', 123, 100, 'gr', 1232),
(21, 'prueba8', 123, 100, 'gr', 1232),
(22, 'prueba8', 123, 100, 'gr', 1232),
(23, 'prueba9', 123, 100, 'gr', 1232),
(24, 'prueba10', 123, 100, 'gr', 1232),
(29, 'apr2', 125.58, 200, 'gr', 627.9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_principales`
--

CREATE TABLE `servicios_principales` (
  `idservicio` int(11) NOT NULL,
  `nombre_servicio` varchar(100) NOT NULL,
  `fecha_creacion_servicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios_principales`
--

INSERT INTO `servicios_principales` (`idservicio`, `nombre_servicio`, `fecha_creacion_servicio`) VALUES
(1, 'Balayage', '2023-01-28'),
(2, 'Alisado', '2023-01-29'),
(3, 'Hidratacion', '2023-02-02'),
(4, 'Hidratacion', '2023-02-03'),
(5, 'Botox', '2023-02-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_registro`
--

CREATE TABLE `servicios_registro` (
  `idservicio_realizado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_estilista` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `largo_cabello` varchar(15) NOT NULL,
  `volumen_cabello` varchar(15) NOT NULL,
  `monto_cobrado` int(11) NOT NULL,
  `costo_servicio` int(11) NOT NULL,
  `gastos_fijos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios_registro`
--

INSERT INTO `servicios_registro` (`idservicio_realizado`, `fecha`, `id_estilista`, `id_cliente`, `id_servicio`, `largo_cabello`, `volumen_cabello`, `monto_cobrado`, `costo_servicio`, `gastos_fijos`) VALUES
(1, '2023-01-25', 1, 2, 1, 'largo', 'abundante', 45000, 0, 0),
(2, '2023-01-25', 1, 15, 1, 'medio', 'abundante', 35000, 0, 0),
(3, '2023-01-25', 1, 11, 2, 'medio', 'abundante', 58000, 0, 0),
(4, '2023-01-25', 2, 16, 2, 'corto', 'normal', 50000, 0, 0),
(5, '2023-01-28', 1, 4, 1, 'medio', 'normal', 28740, 0, 0),
(6, '2023-01-29', 1, 21, 2, 'medio', 'abundante', 85000, 0, 0),
(7, '2023-02-04', 1, 16, 1, 'largo', 'abundante', 85000, 0, 0),
(8, '2023-02-04', 1, 11, 1, 'largo', 'abundante', 77000, 0, 0),
(9, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(10, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(11, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(12, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(13, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(14, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(15, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(16, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(17, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(18, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 0, 0),
(19, '2023-02-04', 1, 11, 1, 'largo', 'abundante', 77000, 0, 0),
(20, '2023-02-04', 1, 11, 1, 'largo', 'abundante', 77000, 0, 0),
(21, '2023-02-04', 1, 11, 2, 'largo', 'abundante', 77000, 970, 0),
(22, '2023-02-04', 1, 16, 3, 'largo', 'normal', 77000, 0, 0),
(23, '2023-02-04', 2, 22, 3, 'largo', 'normal', 55000, 20, 0),
(24, '2023-02-14', 1, 23, 5, 'medio', 'abundante', 80000, 0, 0),
(25, '2023-02-14', 1, 3, 1, 'largo', 'normal', 70000, 250, 0),
(26, '2023-03-14', 5, 11, 2, 'largo', 'abundante', 70000, 970, 1768),
(27, '2023-03-14', 1, 2, 1, 'largo', 'abundante', 55000, 0, 1768),
(28, '2023-03-14', 1, 2, 1, 'largo', 'abundante', 55000, 0, 1768),
(29, '2023-03-14', 1, 2, 1, 'largo', 'abundante', 55000, 0, 1768),
(30, '2023-03-14', 1, 2, 1, 'largo', 'abundante', 55000, 0, 1768),
(31, '2023-03-14', 1, 3, 1, 'largo', 'abundante', 45000, 100, 1768),
(32, '2023-03-15', 5, 16, 2, 'largo', 'normal', 35000, 60, 5302),
(33, '2023-03-15', 1, 25, 1, 'largo', 'abundante', 120000, 100, 5302);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_servicios_realizados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_servicios_realizados` (
`fecha` date
,`nombre_estilista` varchar(100)
,`nombre_cliente` varchar(100)
,`nombre_servicio` varchar(100)
,`monto_cobrado` int(11)
,`largo_cabello` varchar(15)
,`volumen_cabello` varchar(15)
,`costo_servicio` int(11)
,`gastos_fijos` int(11)
,`pago_estilista` decimal(22,0)
,`ganancia_aprox` decimal(25,0)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_servicios_realizados`
--
DROP TABLE IF EXISTS `vw_servicios_realizados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_servicios_realizados`  AS SELECT `s`.`fecha` AS `fecha`, `e`.`nombre_estilista` AS `nombre_estilista`, `c`.`nombre_cliente` AS `nombre_cliente`, `sv`.`nombre_servicio` AS `nombre_servicio`, `s`.`monto_cobrado` AS `monto_cobrado`, `s`.`largo_cabello` AS `largo_cabello`, `s`.`volumen_cabello` AS `volumen_cabello`, `s`.`costo_servicio` AS `costo_servicio`, `s`.`gastos_fijos` AS `gastos_fijos`, round(`s`.`monto_cobrado` - `s`.`monto_cobrado` * `e`.`porcentaje_ganancia` / 100,0) AS `pago_estilista`, `s`.`monto_cobrado`- (`s`.`costo_servicio` + round(`s`.`monto_cobrado` - `s`.`monto_cobrado` * `e`.`porcentaje_ganancia` / 100,0) + `s`.`gastos_fijos`) AS `ganancia_aprox` FROM (((`servicios_registro` `s` join `estilistas` `e` on(`s`.`id_estilista` = `e`.`idestilista`)) join `clientes_registro` `c` on(`c`.`idcliente` = `s`.`id_cliente`)) join `servicios_principales` `sv` on(`sv`.`idservicio` = `s`.`id_servicio`)) ORDER BY `s`.`idservicio_realizado` DESC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_cliente_servicios` (`id_servicio`);

--
-- Indices de la tabla `clientes_registro`
--
ALTER TABLE `clientes_registro`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `estilistas`
--
ALTER TABLE `estilistas`
  ADD PRIMARY KEY (`idestilista`);

--
-- Indices de la tabla `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`idformula`),
  ADD KEY `fk_productos_formulas` (`id_producto`),
  ADD KEY `fk_servicios_formulas` (`id_servicio`);

--
-- Indices de la tabla `gastos_fijos`
--
ALTER TABLE `gastos_fijos`
  ADD PRIMARY KEY (`id_gasto_fijo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `servicios_principales`
--
ALTER TABLE `servicios_principales`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `servicios_registro`
--
ALTER TABLE `servicios_registro`
  ADD PRIMARY KEY (`idservicio_realizado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes_registro`
--
ALTER TABLE `clientes_registro`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `estilistas`
--
ALTER TABLE `estilistas`
  MODIFY `idestilista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `formulas`
--
ALTER TABLE `formulas`
  MODIFY `idformula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `gastos_fijos`
--
ALTER TABLE `gastos_fijos`
  MODIFY `id_gasto_fijo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `servicios_principales`
--
ALTER TABLE `servicios_principales`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios_registro`
--
ALTER TABLE `servicios_registro`
  MODIFY `idservicio_realizado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cliente_servicios` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulas`
--
ALTER TABLE `formulas`
  ADD CONSTRAINT `fk_productos_formulas` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`idproducto`),
  ADD CONSTRAINT `fk_servicios_formulas` FOREIGN KEY (`id_servicio`) REFERENCES `servicios_principales` (`idservicio`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
