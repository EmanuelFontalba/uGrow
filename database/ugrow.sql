-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2016 a las 20:23:40
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ugrow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(7, 'Almeria'),
(8, 'Cadiz'),
(1, 'Córdoba'),
(6, 'Granada'),
(9, 'Huelva'),
(4, 'Jaen'),
(5, 'Malaga'),
(3, 'Sevilla'),
(10, 'Valencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(6) NOT NULL,
  `idUser_creator` int(3) NOT NULL,
  `idUser_target` int(3) NOT NULL,
  `content` varchar(300) NOT NULL,
  `date` varchar(10) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `idUser_creator`, `idUser_target`, `content`, `date`, `value`) VALUES
(1, 19, 28, 'No son nada del otro mundo', '', 3),
(2, 19, 29, 'Genial producto!', '', 5),
(3, 19, 33, 'Muy bueno y fresco', '', 4),
(4, 19, 35, 'Las acelgas estaban pasadas', '', 2),
(5, 19, 36, 'Acelgas de calidad de Mac!', '', 5),
(6, 28, 32, 'Buen producto, recomiendo intercambiar!', '', 4),
(7, 28, 33, 'Buena persona, mejor Grower', '', 4),
(8, 29, 33, 'No me termina de convencer ', '', 2),
(9, 29, 34, 'Las patatas son buenas para freir pero quedan granuladas cocidas', '', 3),
(10, 29, 35, 'Acelgas de una excelente calidad', '', 5),
(11, 29, 36, 'Algunas estaban podridas', '', 0),
(12, 29, 19, 'Muy buenas patatas para freir', '', 4),
(13, 29, 19, 'Las acelgas no me gustaron demasiado', '', 3),
(14, 32, 33, 'Pof, sin comentarios', '', 2),
(15, 32, 34, 'Malisimas las patatas!', '', 1),
(16, 32, 35, 'Estupendo producto!', '', 5),
(17, 32, 36, 'Bastante buen producto, no tengo quejas', '', 4),
(18, 32, 19, 'Las acelgas se pusieron malas al día siguiente', '', 1),
(19, 33, 34, 'Buen producto', '', 4),
(20, 33, 35, 'Genial', '', 4),
(21, 33, 19, 'Muy buenas patatas', '', 4),
(22, 34, 35, 'El producto, regular', '', 2),
(23, 34, 36, 'Odio a los manzanitas', '', 0),
(24, 34, 19, 'No me gustaron nada, estaban arenosas', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exchange`
--

CREATE TABLE `exchange` (
  `id` int(11) NOT NULL,
  `idOfferIssue` int(11) NOT NULL,
  `idOffer` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `confirmation` int(1) NOT NULL DEFAULT '0',
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `emiter` int(11) NOT NULL,
  `recept` int(11) NOT NULL,
  `product_interest` int(11) NOT NULL,
  `product_offer` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `idOffer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `emiter`, `recept`, `product_interest`, `product_offer`, `quantity`, `type`, `idOffer`) VALUES
(48, 36, 33, 8, 4, 2, 'ok', 67),
(50, 36, 35, 8, 4, 2, 'ok', 67),
(57, 19, 34, 8, 8, 1, 'ok', 71),
(58, 19, 35, 8, 4, 1, 'ok', 70),
(59, 19, 36, 8, 4, 1, 'ok', 70),
(60, 32, 19, 4, 8, 4, 'trade', 70),
(61, 33, 19, 8, 8, 4, 'trade', 71),
(63, 34, 19, 8, 4, 3, 'ok', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `offers`
--

INSERT INTO `offers` (`id`, `quantity`, `photo`, `idProduct`, `idUser`) VALUES
(24, 12, '', 8, 28),
(26, 2, '', 18, 28),
(27, 23, '', 14, 28),
(28, 4, '', 13, 28),
(29, 5, '', 9, 28),
(36, 5, '', 8, 29),
(37, 3, '', 9, 29),
(38, 56, '', 5, 29),
(39, 10, '', 13, 29),
(40, 3, '', 18, 29),
(41, 10, '', 16, 29),
(42, 17, '', 4, 29),
(43, 4, '', 3, 29),
(44, 27, '', 2, 29),
(45, 40, '', 8, 32),
(46, 50, '', 17, 32),
(47, 10, '', 6, 32),
(48, 4, '', 11, 32),
(49, 42, '', 4, 32),
(50, 5, '', 12, 32),
(51, 45, '', 5, 33),
(52, 34, '', 16, 33),
(53, 11, '', 4, 33),
(54, 5, '', 3, 33),
(55, 26, '', 4, 34),
(56, 23, '', 14, 34),
(57, 5, '', 18, 34),
(58, 7, '', 6, 34),
(59, 34, '', 3, 34),
(60, 40, '', 8, 35),
(61, 34, '', 9, 35),
(62, 54, '', 10, 35),
(63, 27, '', 4, 35),
(64, 5, '', 2, 35),
(65, 25, '', 8, 36),
(66, 53, '', 10, 36),
(67, 31, '', 4, 36),
(68, 5, '', 2, 36),
(70, 23, '', 4, 19),
(71, 14, '', 8, 19),
(72, 15, '', 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `product`) VALUES
(8, 'Acelgas'),
(9, 'Ajos'),
(5, 'Batatas'),
(19, 'Brocoli'),
(10, 'Cebollas'),
(15, 'Cherrys'),
(13, 'Esparragos'),
(7, 'Espinacas'),
(18, 'Fresas'),
(11, 'Lechugas'),
(16, 'Limones'),
(17, 'Melón'),
(14, 'Nabos'),
(4, 'Patatas'),
(2, 'Pepinos'),
(12, 'Remolacha'),
(6, 'Sandias'),
(1, 'Tomates'),
(3, 'Zanahorias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `siembra`
--

CREATE TABLE `siembra` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `siembra`
--

INSERT INTO `siembra` (`id`, `idUser`, `idProduct`, `date`) VALUES
(3, 30, 8, '20-08-2016'),
(4, 30, 17, '01-09-2016'),
(5, 30, 1, '20-11-2016'),
(6, 28, 4, '20-12-2016'),
(7, 28, 8, '30-12-2016'),
(8, 31, 10, '01-01-2017'),
(9, 31, 11, '01-01-2017'),
(10, 31, 4, '01-03-2017'),
(11, 29, 15, '01-01-2017'),
(12, 29, 17, '01-01-2017'),
(13, 29, 6, '01-01-2017'),
(14, 29, 13, '01-01-2017'),
(15, 32, 13, '01-01-2017'),
(16, 32, 2, '01-01-2017'),
(17, 32, 7, '01-01-2017'),
(18, 33, 8, '01-01-2017'),
(19, 33, 9, '01-01-2017'),
(20, 33, 15, '01-01-2017'),
(21, 34, 10, '01-01-2017'),
(22, 34, 13, '01-01-2017'),
(23, 34, 4, '01-01-2017'),
(24, 34, 7, '01-01-2017'),
(25, 35, 8, '01-01-2017'),
(26, 35, 9, '01-01-2017'),
(27, 35, 18, '01-01-2017'),
(28, 36, 8, '01-01-2017'),
(29, 36, 5, '01-01-2017'),
(30, 36, 7, '01-01-2017'),
(31, 19, 8, '11-12-2016'),
(32, 19, 10, '20-03-2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tips`
--

CREATE TABLE `tips` (
  `id` int(5) NOT NULL,
  `idUser` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tips`
--

INSERT INTO `tips` (`id`, `idUser`, `title`, `date`, `content`, `link`) VALUES
(11, 28, 'Regar correctamente ', '13-06-2016', 'Video tutorial sobre como regar correctamente en lugares pequeños', 'www.youtube.es'),
(13, 29, 'Cultivando con soltura', '13-06-2016', 'Cultiva consumiendo el menor tiempo posible', 'www.google.es'),
(14, 29, 'Noticia: Productos nocivos', '13-06-2016', 'Productos nocivos en los vegetales y frutas', 'www.youtube.es'),
(15, 32, 'Sembrando en secreto', '13-06-2016', 'Que no os pillen', 'www.google.es'),
(16, 33, 'Mimando a tu huerto', '13-06-2016', 'Mimar a tu huerto como si fuese un bebé', 'www.twitter.com'),
(17, 33, 'uGrow Noticia en TV', '13-06-2016', 'Ya somos noticia!', 'www.a3media.com'),
(18, 34, 'Usando uGrow', '13-06-2016', 'Primeros pasos para usar uGrow', 'www.ugrow.es'),
(19, 34, 'Ventajas de los huertos urbanos', '13-06-2016', 'Lo que nos ofrecen los huertos urbanos', 'www.google.es'),
(20, 35, 'Siembra...', '13-06-2016', 'Siembra, cuida y recolecta', 'www.google.es'),
(21, 35, 'Growers por el mundo', '13-06-2016', 'Blog de growers que facilitan sus perfiles', 'www.linkedin.com'),
(22, 36, 'Apple y uGrow', '13-06-2016', 'Las manzanas de uGrow', 'www.apple.es'),
(23, 19, 'Manteniendo el huerto sano', '14-06-2016', 'Si mantienes el huerto sano, todo sabrá mucho mejor', 'www.google.es'),
(24, 19, 'El origen de uGrow', '14-06-2016', 'La historia de un proyecto de fin de ciclo', 'www.ugrow.com'),
(25, 19, 'Adorna el huerto', '14-06-2016', 'Decorando el huerto para que sea más agradable', 'www.google.es'),
(26, 19, 'Tiendas recomendadas', '14-06-2016', 'Lugares donde comprar de todo para tus huertos', 'www.emanuelfontalba.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `trades` int(3) NOT NULL,
  `rating` int(2) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `location` varchar(100) NOT NULL,
  `register` varchar(10) NOT NULL,
  `idCity` int(11) NOT NULL,
  `rol` varchar(15) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `name`, `lastname`, `mail`, `birthdate`, `trades`, `rating`, `picture`, `description`, `location`, `register`, `idCity`, `rol`) VALUES
(19, 'Fonty', 'a749ab61457d462d37ceb9c8f1f19473', 'Emanuel', 'Galván', 'info@emanuelfontalba.es', '30-09-1991', 0, 0, '', 'Un buen usuario', 'Calle Judios 10', '27-05-2016', 1, 'admin'),
(28, 'javi', 'a749ab61457d462d37ceb9c8f1f19473', 'Javier', 'Benitez del Pozo', 'info@javibenitez.com', '04-08-1990', 0, 0, '', 'Soy un entusiasmado de la naturaleza, me gusta comer cosas frescas y naturales, de ahí mi pasión por los huertos urbanos.', 'C/ Arcos de la frontera n.10 1-2', '13-06-2016', 1, 'user'),
(29, 'francis', 'a749ab61457d462d37ceb9c8f1f19473', 'Francisco', 'Duran Castillejo', 'info@francisduran.com', '30-07-1958', 0, 0, '', 'Tras ver la oferta que propone el mercado hoy en día con los vegetales, decidí crearme mi propio huerto urbano en el patio de casa. ', 'C/ Sagasta n.10 ', '13-06-2016', 1, 'user'),
(32, 'isi', 'a749ab61457d462d37ceb9c8f1f19473', 'Isabel', 'Navarro Suarez', 'info@isabelnavarro.es', '04-12-1975', 0, 0, '', 'Junto al mar, disfruto cuidando mi huerto urbano', 'C/ Marinera n20', '13-06-2016', 7, 'user'),
(33, 'rober', 'a749ab61457d462d37ceb9c8f1f19473', 'Roberto Carlos', 'Flores Gomez', 'info@robertocarlos.com', '20-09-1993', 0, 0, '', 'No soy el jugador de futbol. Apasionado de lo natural y la belleza verde. Nuevo Grower!', 'C/ Trinidad n.10 Esc A 2-4', '13-06-2016', 3, 'user'),
(34, 'lauri', 'a749ab61457d462d37ceb9c8f1f19473', 'Laura', 'Ruiz Perez ', 'info@lauri.es', '12-03-1978', 0, 0, '', 'Mi pasión por las frutas y verduras viene desde pequeña en el huerto de mi abuelo. Ahora no puedo pasar un día sin visitar el de mi patio.', 'C/Olivares n.10', '13-06-2016', 4, 'user'),
(35, 'juanji', 'a749ab61457d462d37ceb9c8f1f19473', 'Juan', 'Jimenez Muñoz', 'info@juanji.com', '04-03-1992', 0, 0, '', 'Naturalista de extremo a extremo!', 'C/Almanzor n34 ', '13-06-2016', 5, 'user'),
(36, 'david', 'a749ab61457d462d37ceb9c8f1f19473', 'David', 'Peralvo Gomez', 'info@davidperalvo.com', '09-19-1991', 0, 0, '', 'Sevillano y grower', 'C/Huerto n.45 ', '13-06-2016', 3, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city` (`city`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser_creator` (`idUser_creator`),
  ADD KEY `idUser_target` (`idUser_target`);

--
-- Indices de la tabla `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOfferIssue` (`idOfferIssue`),
  ADD KEY `idOffer` (`idOffer`),
  ADD KEY `date` (`date`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product` (`product`);

--
-- Indices de la tabla `siembra`
--
ALTER TABLE `siembra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`),
  ADD KEY `idUser_3` (`idUser`);

--
-- Indices de la tabla `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCity` (`idCity`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `exchange`
--
ALTER TABLE `exchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `siembra`
--
ALTER TABLE `siembra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idUser_creator`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idUser_target`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `exchange`
--
ALTER TABLE `exchange`
  ADD CONSTRAINT `exchange_ibfk_1` FOREIGN KEY (`idOfferIssue`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exchange_ibfk_2` FOREIGN KEY (`idOffer`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tips`
--
ALTER TABLE `tips`
  ADD CONSTRAINT `tips_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
