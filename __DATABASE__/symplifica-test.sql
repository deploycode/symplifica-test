-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2020 a las 03:19:19
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `symplifica-test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `boss_id` int(11) DEFAULT NULL,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('MALE','FEMALE') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `type_of_contract` enum('TERMINO INDEFINIDO','TERMINO DEFINIDO','TIEMPO PARCIAL') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`id`, `boss_id`, `name`, `gender`, `identification_number`, `phone_number`, `address`, `date_of_birth`, `type_of_contract`) VALUES
(1, NULL, 'Elon Musk', 'MALE', '1234567890', '0987654321', 'California - EEUU', '1971-06-28', NULL),
(2, 1, 'Ryan Donnelly', 'MALE', '45754347', '9876544567', NULL, NULL, 'TERMINO DEFINIDO'),
(3, 1, 'Charlyn Manuyag', 'MALE', '45754347', '9876544567', NULL, NULL, 'TIEMPO PARCIAL'),
(4, 1, 'David Lau', 'MALE', '45754347', '9876544567', NULL, NULL, 'TERMINO DEFINIDO'),
(5, NULL, 'Taylor Otwell', 'MALE', '45754347', '9876544567', 'California EEUU', '1965-02-02', NULL),
(6, 5, 'Smit Desai', 'MALE', '45754347', '9876544567', NULL, NULL, 'TIEMPO PARCIAL'),
(7, 5, 'hetal sorathiya', 'FEMALE', '45754347', '9876544567', NULL, NULL, 'TERMINO INDEFINIDO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5D9F75A1261FB672` (`boss_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_5D9F75A1261FB672` FOREIGN KEY (`boss_id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
