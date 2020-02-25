-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-11-2018 a las 16:08:15
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id7523663_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `edicion` varchar(10) NOT NULL,
  `tomo` varchar(20) NOT NULL,
  `editorial` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `ano` int(6) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `clasificacion` varchar(50) NOT NULL,
  `ejemplares` int(200) NOT NULL,
  `portada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `edicion`, `tomo`, `editorial`, `pais`, `ano`, `isbn`, `clasificacion`, `ejemplares`, `portada`) VALUES
(1, 'EL PRINCIPITO', 'ANTONIE SAINT EXUPERY', '', '', 'CORONA BOREALIS ', 'ESPA&Ntilde;A', 2016, '9788494510519', 'GENERAL', 10, 'portadas_libros/EL PRINCIPITO.jpg'),
(2, 'CALCULO DIFERENCIAL: PROBLEMAS RESUELTOS', 'VV AA', '7a EDICION', '', 'REVERTE EDICIONES', 'M&Eacute;XICO', 2008, '9789686708783', 'MATEMATICAS', 10, 'portadas_libros/CALCULO DIFERENCIAL: PROBLEMAS RESUELTOS.jpg'),
(3, 'CALCULO DIFERENCIAL E INTEGRAL', 'WILLIAM ANTHONY GRANVILLE', '6a EDICION', '', 'LIMUSA', 'M&Eacute;XICO', 2016, '9789681811785', 'MATEMATICAS', 10, 'portadas_libros/CALCULO DIFERENCIAL E INTEGRAL.jpg'),
(4, 'PROGRAMACION DESARROLLO WEB CON PHP Y MYSQL', 'LUKE WELLING LAURA THOMSON', '5a EDICION', '', 'ANAYA MULTIMEDIA', 'M&Eacute;XICO', 2009, '9788441525535', 'PROGRAMACION', 10, 'portadas_libros/PROGRAMACION DESARROLLO WEB CON PHP Y MYSQL.jpg'),
(5, 'HISTORIA DE LA FILOSOF&Iacute;A II. EDAD MODERNA, EDAD CONTEMPOR&Aacute;NEA', 'HIRSCHBERGER  ', '6a EDICION', '', 'HERDER', 'M&Eacute;XICO', 2011, '9788425425042', 'FILOSOFIA', 10, 'portadas_libros/HISTORIA DE LA FILOSOF&Iacute;A II. EDAD MODERNA, EDAD CONTEMPOR&Aacute;NEA.jpg'),
(6, 'MECATRONICA', 'JUAN CARLOS HERRERA', '1ra edicio', '', 'IPN', 'M&Eacute;XICO', 2017, '', 'INGENIERIA', 5, 'portadas_libros/portada.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `ejemplar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `titulo`, `autor`, `nombre`, `fecha_inicial`, `fecha_limite`, `status`, `ejemplar`) VALUES
(1, 'EL PRINCIPITO', 'ANTONIE SAINT EXUPERY', 'ALVAREZ CORTES VICTOR LEONARDO', '1970-01-01', '2018-11-11', 'DEVUELTO', 1),
(2, 'CALCULO DIFERENCIAL E INTEGRAL', 'WILLIAM ANTHONY GRANVILLE', 'MARTINEZ DE LA CRUZ MARIA PALO', '1970-01-01', '1970-01-09', 'PRESTADO', 1),
(3, 'CALCULO DIFERENCIAL E INTEGRAL', 'WILLIAM ANTHONY GRANVILLE', 'MARTINEZ DE LA CRUZ MARIA PALO', '1970-01-01', '1970-01-09', 'PRESTADO', 1),
(4, 'PROGRAMACION DESARROLLO WEB CON PHP Y MYSQL', 'LUKE WELLING LAURA THOMSON', 'MARTINEZ DE LA CRUZ MARIA PALO', '1970-01-01', '1970-01-09', 'PRESTADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `ruta`) VALUES
(1, 'slider/878.jpg'),
(2, 'slider/623.jpg'),
(3, 'slider/209.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `colegio` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` text NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `bloqueo` int(2) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `matricula`, `colegio`, `telefono`, `direccion`, `nivel`, `foto`, `correo`, `bloqueo`, `contraseña`) VALUES
(1, 'ADMINISTRADOR', '', '', '54348790', '', 'ADMINISTRADOR', 'foto_perfil/administrador@sbeuacm.com.jpg', 'administrador@sbeuacm.com', 1, 'admin'),
(2, 'ALVAREZ CORTES VICTOR LEONARDO', '14-011-0989', 'CCYT', '778848773', 'c. campeche, lt 1203', 'PROFESOR', 'foto_perfil/perfil.png', 'vlac9398@gmail.com', 1, 'ZST55CHG'),
(3, 'MARTINEZ DE LA CRUZ MARIA PALO', '13-011-0168', 'CCYT', '2225632596', 'c. campeche, lt 1203', 'ALUMNO', 'foto_perfil/perfil.png', 'palomita2205@gmail.com', 1, 'CCF6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
