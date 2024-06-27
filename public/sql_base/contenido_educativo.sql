-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-06-2024 a las 17:30:58
-- Versión del servidor: 5.7.36
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contenido_educativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `palabras_clave` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `area_conocimiento` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_contenido` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `imagen_portada` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `imagen_previa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `contenido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `soft_delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
