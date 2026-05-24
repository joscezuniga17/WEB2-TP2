-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2026 a las 03:25:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_playlist`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id_cancion` int(11) NOT NULL,
  `nombre_cancion` varchar(100) NOT NULL,
  `artista` varchar(100) NOT NULL,
  `album` varchar(100) DEFAULT NULL,
  `genero` varchar(100) NOT NULL,
  `anio` year(4) DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `mood` varchar(45) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `id_playlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id_cancion`, `nombre_cancion`, `artista`, `album`, `genero`, `anio`, `duracion`, `mood`, `youtube_link`, `id_playlist`) VALUES
(1, 'Love me do', 'The Beatles', 'Please Please Me', 'Rock and Roll', '1963', '00:02:22', 'Amor', 'https://www.youtube.com/watch?v=0pGOFX1D_jg', 3),
(4, 'Billie Jean', '\r\nMichael Jackson', '\r\nThriller', '\r\nRhythm and blues y Dance pop', '1983', '00:04:54', 'Misterioso bailable', 'https://www.youtube.com/watch?v=Zi_XLOBDo_Y', 1),
(5, 'The Verve', 'Bitter Sweet Symphony', 'Urban Hymns', 'Britpop', '1997', '00:04:35', 'Melancolia', 'https://www.youtube.com/watch?v=1lyu1KKwC74&list=RD1lyu1KKwC74&start_radio=1', 1),
(6, 'Without Me', 'Eminem', '\r\nThe Eminem Show', 'Rap', '2000', '00:04:58', 'Energico', 'https://www.youtube.com/watch?v=YVkUvmDQ3HY&list=RDYVkUvmDQ3HY&start_radio=1', 1),
(7, 'That Should Be Me ', 'Justin Bieber', 'My World 2.0', 'Desamor', '2010', '00:03:52', 'Triste', 'https://www.youtube.com/watch?v=2Xulk9Ahqmc&list=RD2Xulk9Ahqmc&start_radio=1', 3),
(10, 'Climb', 'Miley Cyrus', 'Hannah Montana: La película', 'Country pop, Country', '2009', '00:03:49', 'Esperanza', 'https://www.youtube.com/watch?v=FOOsx9ytTzg&list=RDFOOsx9ytTzg&start_radio=1', 1),
(11, 'Viva la vida', 'Coldplay', 'Coldplay: A Head Full of Dreams', 'Pop/rock', '2008', '00:04:03', 'Melancolia', 'https://www.youtube.com/watch?v=dvgZkm1xWPE', 1),
(12, 'Super Trouper', 'Abba', 'Super trouper', 'Pop', '1980', '00:04:11', 'Amor', 'https://www.youtube.com/watch?v=BshxCIjNEjY', 5),
(13, 'The winer takes it all', 'Abba', NULL, '\r\nR&B/Soul', '1980', NULL, 'Triste', 'https://www.youtube.com/watch?v=92cwKCU8Z5c&list=RD92cwKCU8Z5c&start_radio=1', 5),
(14, 'Vivir así es morir de amor', 'Camilo Sesto', 'Vivir así es morir de amor', '', '1978', NULL, NULL, NULL, 6),
(15, 'Stayin\' Alive', 'Bee Gees', NULL, 'Funky', '1977', NULL, NULL, NULL, 6),
(18, 'Hotel California', 'Eagles', NULL, 'Rock', '1976', NULL, NULL, NULL, 6),
(19, 'Dream On', 'Aerosmith', NULL, '', '1973', NULL, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `nombre_playlist` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `nombre_playlist`, `id_usuario`) VALUES
(1, 'Music chill', 1),
(3, 'Amor', 2),
(4, 'Rock', 4),
(5, '80s', 2),
(6, '70s', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email`, `password`, `rol`) VALUES
(1, 'Josce', 'zunigajosce@gmail.com', '12345678', ''),
(2, 'Justin', 'justinbieber@gmail.com', '$2y$10$uN99Z1WvEMbCgOUbYvN8aeXfXGvYI0EWhfJ4rA2S8E8bA1mBqMv2.', ''),
(4, 'webadmin', 'webadmin@gmail.com', '$2y$10$uN99Z1WvEMbCgOUbYvN8aeXfXGvYI0EWhfJ4rA2S8E8bA1mBqMv2.', 'admin'),
(5, 'Maria', 'maria@gmail.com', 'hola', ''),
(6, 'julian alvarez', 'juli@gmail.com', 'riverteamo', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id_cancion`),
  ADD KEY `fk_canciones_playlist` (`id_playlist`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `fk_playlist_usuarios` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `fk_canciones_playlist` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id_playlist`);

--
-- Filtros para la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `fk_playlist_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
