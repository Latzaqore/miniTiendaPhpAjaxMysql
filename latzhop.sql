-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2020 a las 16:59:39
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `latzhop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(6) UNSIGNED ZEROFILL NOT NULL,
  `productos` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `productos`, `cantidad`, `precio_total`) VALUES
(000009, 'LAPTOP ASUS X543UB-GQ1204,LAPTOP ASUS X407UA-BV274,Laptop Acer Aspire 3 A314-21,Laptop Acer Aspire 3 A315-41-R05S,', 3, '5397.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laptop`
--

CREATE TABLE `laptop` (
  `id_laptop` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laptop`
--

INSERT INTO `laptop` (`id_laptop`, `nombre`, `descripcion`, `precio`, `imagen`, `marca_id`) VALUES
(13, 'Laptop HP 14-cm1024la', 'Procesador AMD Ryzen™ 3\r\nWindows 10 Home 64\r\nSATA de 1 TB y 5400 rpm\r\n4 GB de SDRAM DDR4-2400 (1 x 4 GB)\r\nPantalla con retroiluminación WLED HD SVA BrightView de 14\" en diagonal (1366 x 768)', 1499, 'Laptop_HP_14-cm1024la.png', 2),
(14, 'Laptop HP 15-da0023la', 'Procesador de 7a generación Intel® Core™ i5\r\nWindows 10 Home 64\r\nSATA de 1 TB y 5400 rpm\r\n4 GB de SDRAM DDR4-2133 (1 x 4 GB)\r\nPantalla con retroiluminación WLED HD SVA BrightView de 15,6\" en diagonal', 2099, 'Laptop_HP_15-da0023la.png', 2),
(15, 'Laptop HP 15-db0009la', 'Procesador AMD Ryzen™ 3\r\nWindows 10 Home 64\r\nSATA de 1 TB y 5400 rpm\r\n8 GB de SDRAM DDR4-2400 (1 x 8 GB)\r\nPantalla con retroiluminación WLED HD SVA BrightView de 15,6\" en diagonal (1366 x 768)', 2199, 'Laptop_HP_15-db0009la.png', 2),
(16, 'Laptop HP Pavilion x360 Convertible 15-cr0002la', 'Procesador Intel® Core™ i5 de 8° generación\r\nWindows 10 Home 64\r\nSATA de 1 TB y 5400 rpm\r\n8 GB de SDRAM DDR4-2400 (1 x 8 GB)\r\nPantalla con retroiluminación WLED HD SVA multitáctil de vidrio borde a bo', 2999, 'Laptop_HP_Pavilion_Gaming_15-ec0002la.png', 2),
(17, 'Laptop HP Pavilion Gaming 15-ec0002la', 'Procesador AMD Ryzen™ 5\r\nWindows 10 Home 64\r\nHDD SATA de 1 TB y 5400 RPM\r\n8 GB de SDRAM DDR4-2400 (1 x 8 GB)\r\nPantalla con retroiluminación WLED FHD SVA antirreflectante con microborde, de 15,6\"', 2999, 'Laptop_HP_Pavilion_Gaming_15-ec0002la.png', 2),
(18, 'Laptop HP Pavilion 15-cw1008la', 'Procesador AMD Ryzen™ 7\r\nWindows 10 Home 64\r\nSSD M.2 PCIe® NVMe™ de 512 GB\r\n8 GB de SDRAM DDR4-2400 (1 x 8 GB)\r\nPantalla con retroiluminación WLED FHD IPS BrightView de microborde y 15,6\" en diagonal', 2499, 'Laptop_HP_Pavilion_15-cw1008la.png', 2),
(19, 'Laptop OMEN HP 15-dc1002la', 'Procesador Intel® Core™ i5 de 9.ª generación\r\nWindows 10 Home 64\r\nSSD M.2 PCIe® NVMe™ de 512 GB\r\nSDRAM DDR4-2666 de 8 GB (1 x 8 GB)\r\nPantalla con retroiluminación WLED FHD IPS antirreflectante con mic', 3589, 'Laptop_OMEN_HP_15-dc1002la.png', 2),
(20, 'Laptop HP ProBook 450 G6', 'Procesador Intel® Core™ i5 de 8° generación\r\nWindows 10 Pro 64\r\nSATA de 1 TB y 5400 rpm\r\n8 GB de SDRAM DDR4-2400 (1 x 8 GB)\r\nPantalla con retroiluminación LED HD SVA eDP antirreflectante, de 15,6\"', 4020, 'Laptop_HP_ProBook_450_G6.png', 2),
(21, 'Laptop HP Pavilion Gaming 15-ec0003la', 'Procesador AMD Ryzen™ 5\r\nWindows 10 Home 64\r\nSSD M.2 NVME™ PCIe® de 512 GB\r\n8 GB DDR4-2400 de SDRAM (1 x 8 GB)\r\nPantalla con retroiluminación WLED FHD IPS antirreflejo con micromarco, de 15,6\"', 3120, 'Laptop_HP_Pavilion_Gaming_15-ec0003la.png', 2),
(22, 'Laptop Acer Aspire 3 A314-21-91Y1', 'AMD A9-9420e 1.8GHz hasta 2.7GHz\r\nMemoria RAM: 4 GB DDR4 / Disco Sólido 128GB\r\nPantalla LED 14\'\' HD (1366x768) CineCrystal LCD\r\nVideo integrado AMD Radeon R5 graphics\r\nWi-FI, Bluetooth, Peso 1.65 Kg', 1299, 'Laptop_Acer_Aspire_3_A314-21-91Y1.png', 1),
(23, 'Laptop Acer Aspire 3 A314-21', 'AMD A9-9420e 1.8GHz hasta 2.7GHz\r\nMemoria RAM: 8 GB DDR4 / Disco Sólido 128GB\r\nPantalla LED 14\'\' HD (1366x768) CineCrystal LCD\r\nVideo integrado AMD Radeon R5 graphics\r\nWi-FI, Bluetooth, Peso 1.65 Kg', 1499, 'Laptop_Acer_Aspire_3_A314-21.png', 1),
(24, 'Laptop Acer Aspire 3 A315-41-R05S', 'Procesador AMD Ryzen 5 Quad-Core 2.0GHz\r\nPantalla LED 15.6\'\' HD Acer CineCrystal\r\nRAM 8 GB DDR4 / Disco Duro 1 TB\r\nGráficos AMD Radeon Vega 8, Wi-FI, Bluetooth, \r\nWindows 10 Home 64 bits', 1799, 'Laptop_Acer_Aspire_3_A315-41-R05S.png', 1),
(25, 'Laptop Acer Nitro AN515-52', 'Intel Core i5-8300H 2.3 / 4.0GHz - 4 núcleos, 8va Generación\r\nMemoria : 24GB (RAM 8Gb DDR4 +  Optane 16GB) \r\nDisco duro  : 1 TB SATA \r\nPantalla LED 15.6\'\' Full HD (1920x1080) IPS ComfyView\r\nVideo: Nvi', 3099, 'Laptop_Acer_Nitro_AN515-52.png', 1),
(26, 'Laptop ACER Aspire 7 A715', 'Intel Core i7-8750H 2.2GHz (3.9GHz c/TB) seis núcleos - 8va generación\r\nRAM : 16 GB DDR4 / Discos : HDD 1TB + SSD 256GB PCIe\r\nPantalla LED 15.6\" Full HD (1920x1080) IPS\r\nVideo 4 GB ddr5 Nvidia GeForce', 4299, 'Laptop_ACER_Aspire_7_A715.png', 1),
(27, 'Laptop Acer Predator Helios 300 PH315-51', 'Intel® Core™ i7-8750H 2.2GHz hasta 3.9 GHz, Hexa-core (6 Core™)\r\nMemoria RAM: 16 GB DDR4-2666 ampliable \r\nDiscos : Sólido SSD 256GB PCIe  + 1 TB Serie ATA\r\nPantalla LED 15.6\'\' Full HD (1920x1080) Tecn', 5499, 'Laptop_Acer_Predator_Helios_300_PH315-51.png', 1),
(28, 'Laptop Acer Predator Helios 300 PH315-52', 'Intel® Core™ Core i7-9750H 2.6 / 4.5GHz, 6 núcleos - Novena Generación.\r\nMemoria RAM: 16 GB DDR4 / Discos : Sólido SSD 256GB PCIe \r\nPantalla LED 15.6\'\' Full HD (1920x1080) Frecuencia a 144Hz\r\nVideo Nv', 5499, 'Laptop_Acer_Predator_Helios_300_PH315-52.png', 1),
(30, 'LAPTOP ASUS X543UB-GQ1204', 'Marca : Asus\r\nProducto : Laptop\r\nProcesador : Core™ i3\r\nTarjeta de video : NVidia MX 110\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 15.6\" HD\r\nSistema Operativo : FreeDOS', 1589, 'LAPTOP_ASUS_X543UB-GQ1204.png', 4),
(31, 'LAPTOP ASUS X509FB I5-8265U', 'Marca : Asus\r\nModelo : X509FB\r\nProducto : Laptop\r\nProcesador : Core i5 - 8th Gen\r\nTarjeta de video : NVidia MX 110\r\nMemoria RAM : 12GB DDR4\r\nAlmacenamiento : 512GB(SSD)\r\nPantalla : 15.6\" HD\r\nTeclado : Español\r\nSistema Operativo : FreeDOS', 2569, 'LAPTOP_ASUS_X509FB_I5-8265U.png', 4),
(32, 'LAPTOP ASUS X407UA-BV274', 'Marca : Asus\r\nModelo : X407UA-BV274\r\nProducto : Laptop\r\nProcesador : Core™ i3\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 14\" HD\r\nSistema Operativo : Endless', 1239, 'LAPTOP_ASUS_X407UA-BV274.png', 4),
(33, 'LAPTOP ASUS X510QA-BR130T', 'Marca : Asus\r\nModelo : X510QA-BR130T\r\nProducto : Laptop\r\nProcesador : AMD™ A12\r\nTarjeta de video : AMD Radeon R7\r\nMemoria RAM : 8GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 15.6\" HD\r\nSistema Operativo : Windows 10', 1699, 'LAPTOP_ASUS_X510QA-BR130T.png', 4),
(34, 'LAPTOP ASUS N580GD-E4192', 'Marca : Asus\r\nModelo : N580GD-E4192\r\nProducto : Laptop\r\nProcesador : Core™ i5\r\nTarjeta de video : NVIDIA GTX 1050\r\nMemoria RAM : 8GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 15.6\'\'FHD\r\nSistema Operativo : Endless', 3499, 'LAPTOP_ASUS_N580GD-E4192.png', 4),
(35, 'LAPTOP ASUS X540BP-GO062', 'Marca : Asus\r\nProducto : Laptop\r\nProcesador : AMD™ A9\r\nTarjeta de video : AMD Radeon R5\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 15.6\" HD\r\nTeclado : Español\r\nSistema Operativo : Endless', 1259, 'LAPTOP_ASUS_X540BP-GO062.png', 4),
(36, 'LAPTOP LENOVO S145-14IWL', 'Marca : Lenovo\r\nProducto : Laptop\r\nProcesador : Core™ i3\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 14\" HD\r\nSistema Operativo : FreeDOS', 1289, 'LAPTOP_LENOVO_S145-14IWL.png', 3),
(37, 'LAPTOP LENOVO IPS340-15IWL', 'Marca : Lenovo\r\nProducto : Laptop\r\nProcesador : Core i7 - 10th Gen\r\nTarjeta de video : NVIDIA MX 230\r\nMemoria RAM : 8GB DDR4\r\nAlmacenamiento : HDD + SSD\r\nPantalla : 15.6\'\'FHD\r\nSistema Operativo : FreeDOS', 3389, 'LAPTOP_LENOVO_IPS340-15IWL.png', 3),
(38, 'LAPTOP LENOVO V130-14IKB', 'Marca : Lenovo\r\nModelo : V130-14IKB\r\nProducto : Laptop\r\nProcesador : Core™ i3\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 14\" HD\r\nTeclado : Español\r\nSistema Operativo : FreeDOS', 1299, 'LAPTOP_LENOVO_V130-14IKB.png', 3),
(39, 'LAPTOP LENOVO V145-15AST', 'Marca : Lenovo\r\nModelo : V145-15AST\r\nProducto : Laptop\r\nProcesador : AMD™ A6\r\nTarjeta de video : AMD Radeon R4\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 500GB (HDD)\r\nPantalla : 15.6\" HD\r\nSistema Operativo : FreeDOS', 959, 'LAPTOP_LENOVO_V145-15AST.png', 3),
(40, 'LAPTOP LENOVO S145 I5-8265U', 'Marca : Lenovo\r\nModelo : S145\r\nProducto : Laptop\r\nProcesador : Core™ i5\r\nTarjeta de video : NVidia MX 110\r\nMemoria RAM : 8GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 14\" HD\r\nSistema Operativo : FreeDOS', 2199, 'LAPTOP_LENOVO_S145_I5-8265U.png', 3),
(41, 'LAPTOP LENOVO V330-14IKB CI5-8250U', 'Marca : Lenovo\r\nModelo : V330-14IKB\r\nProducto : Laptop\r\nProcesador : Core™ i5\r\nTarjeta de video : Intel HD Graphics\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 14\" HD\r\nSistema Operativo : FreeDOS', 1769, 'LAPTOP_LENOVO_V330-14IKB_CI5-8250U.png', 3),
(42, 'LAPTOP LENOVO IP330-14IGM CELERON', 'Marca : Lenovo\r\nModelo : IP330-14IGM\r\nProducto : Laptop\r\nProcesador : Intel® Celeron™\r\nTarjeta de video : Intel HD Graphics\r\nMemoria RAM : 4GB DDR4\r\nAlmacenamiento : 1TB (HDD)\r\nPantalla : 14\" HD\r\nSistema Operativo : FreeDOS', 999, 'LAPTOP_LENOVO_IP330-14IGM_CELERON.png', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, 'Acer'),
(2, 'Hp'),
(3, 'Lenovo'),
(4, 'Asus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(6) UNSIGNED ZEROFILL NOT NULL,
  `cliente` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `cliente`, `email`, `direccion`) VALUES
(000009, 'Latzaqore', 'latzaqore@gmail.com', 'Jr: Los Próceres #451');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `clave` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `email`) VALUES
(1, 'latzaqore', '123456', 'latzaqore@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id_laptop`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
