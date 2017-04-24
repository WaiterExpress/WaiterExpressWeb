-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 11:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `index` int(3) NOT NULL,
  `restaurante` varchar(25) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Precio` int(15) NOT NULL,
  `Cantidad` int(3) NOT NULL,
  `Imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`index`, `restaurante`, `categoria`, `Nombre`, `Precio`, `Cantidad`, `Imagen`) VALUES
(0, '', 'Entradas', 'Patacones', 1500, 0, 'http://epmghispanic.media.clients.ellingtoncms.com/img/photos/2014/09/24/pa_patacones_t670x470.jpg?2'),
(1, '', 'Entradas', 'Sopa de Cebolla', 1000, 0, 'http://www.sopadecebolla.es/ImagenesSopaDeCebolla/ImagenesSopaDeCebolla/SopaDeCebollaConAjo.jpg'),
(2, '', 'Bebidas', 'Naturales', 800, 0, 'http://www.entrepucheros.com/wp-content/uploads/2010/09/harvey-wallbanger.jpg'),
(3, '', 'Bebidas', 'Gaseosas', 1200, 0, 'http://pizzali.net/wp-content/uploads/2014/08/40-138-large.jpg'),
(4, '', 'Platos Fuertes', 'Pasta Alfredo', 4500, 0, 'http://static.betazeta.com/www.sabrosia.com/up/2013/05/FETTUCCINE-PORTADA.jpg'),
(5, '', 'Platos Fuertes', 'Pollo a la Plancha', 5000, 0, 'https://i.ytimg.com/vi/CsmIiZCgQ0g/maxresdefault.jpg'),
(6, '', 'Postres', 'Cheesecake', 2000, 0, 'http://foodnetwork.sndimg.com/content/dam/images/food/fullset/2013/12/9/0/FNK_Cheesecake_s4x3.jpg.re'),
(7, '', 'Postres', 'Tres Leches', 2500, 0, 'http://tastykitchen.com/recipes/wp-content/uploads/sites/2/2009/09/3908654410_7881d60245.jpg'),
(8, '', 'Cocteles', 'Mono Sucio', 2800, 0, 'https://s-media-cache-ak0.pinimg.com/236x/bf/42/c8/bf42c85f291aa834d269d0c44af6e248.jpg'),
(9, '', 'Cocteles', 'Mojito', 1200, 0, 'http://static1.saborgourmet.com/wp-content/uploads/mojito-casero.jpg'),
(10, '', 'Otros', 'Cuchara', 0, 0, 'http://t1.uccdn.com/images/3/7/8/img_33873_ins_3719514_600.jpg'),
(11, '', 'Entradas', 'Papas Frintas', 1000, 0, 'http://runrun.es/wp-content/uploads/2014/10/papas_fritas.jpg'),
(12, '', 'Entradas', 'Ceviche', 1200, 0, 'http://foodnetwork.sndimg.com/content/dam/images/food/fullset/2010/3/31/0/SM0304_wr2r-Ceviche_s4x3.j'),
(13, '', 'Entradas', 'Carne en salsa', 1600, 0, 'http://www.rebanando.com/uploads/media/carne-en-salsa-con-tomate1.jpg?1382189970'),
(14, '', 'Entradas', 'huevo', 800, 0, 'http://aucdn.ar-cdn.com/recipes/originalxl/fe508178-76b5-4b84-aeda-599c3ce4d573.jpg'),
(15, '', 'promociones', '2x1', 3000, 0, 'http://www.tatuadores.es/sites/default/files/upload/2x1_black.png'),
(0, 'Chelips', 'Entrada', 'Ceviche', 1500, 0, 'http://www.recetaceviche.com/ImagenesCeviche/ImagenesCeviche/CevicheDeLangostinos.jpg'),
(1, 'Chelips', 'Entrada', 'Carne mechada', 2000, 0, 'https://t2.rg.ltmcdn.com/es/images/9/6/0/img_carne_mechada_venezolana_56069_paso_7_600.jpg'),
(2, 'Chelips', 'Plato Fuerte', 'Papas Chelips', 3400, 0, 'https://igx.4sqi.net/img/general/600x600/59822685_MAk7cmKRdIO0hgWosoA_7okqRIOIQsi9fxzPHJ56s48.jpg'),
(0, 'Las pollitas', 'Entrada', 'papas ', 1500, 0, 'https://mejorconsalud.com/wp-content/uploads/2013/07/patatas-fritas--500x375.jpg'),
(1, 'Las pollitas', 'Plato Fuerte', 'Super Poderoso', 1000, 0, 'http://piolin2.com/wp-content/uploads/2013/02/SALTADO-MIXTO.jpg'),
(2, 'Las pollitas', 'Postres', 'Cheesecake', 1600, 0, 'https://www.thecheesecakefactory.com/assets/images/Menu-Import/CCF_FreshStrawberryCheesecake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `Nombre` varchar(40) NOT NULL,
  `BSSID` varchar(60) NOT NULL,
  `Imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurante`
--

INSERT INTO `restaurante` (`Nombre`, `BSSID`, `Imagen`) VALUES
('Chelips', '00:25:9c:d6:75:6e', 'https://irs2.4sqi.net/img/general/600x600/49654360_K84XEKMeSGSoegquzQXrfuvKNLSltsMYuCMxcT40f8Q.jpg'),
('Las pollitas', '48:f8:b3:b8:9e:32', 'http://cdn2.clasificados.com/cl/pictures/photos/000/309/457/original_pollitas.jp_8265.jpg'),
('Soda Tapia', '00:1b:2f:5b:53:78', 'https://pbs.twimg.com/profile_images/664451677152350208/i3FQHg3C.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `hash_pass` varchar(20) NOT NULL,
  `account_state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `token`, `phone`, `hash_pass`, `account_state`) VALUES
(1, 'daniefdsfdfl@gmail.com', 'sdfdfdfsdfdsfdsfdf', '87389992', 'danieljo', 0),
(3, 'romanorp@gmail.com', 'sdfdfdfsdfdsfdsfdf', '2147483647', 'danieljo', 0),
(30, 'romanorp2@gmail.com', '', '546745645', 'dfgdfgdfgdfg', 1),
(31, 'romanorp3@gmail.com', '', '546745645', 'dfgdfgdfgdfg', 1),
(32, 'romanorp2@gmail22.com', 'tokentest', '55345345', 'hash', 0),
(33, 'joaraya10.4@gmail.com', 'tokentest', '55345345', 'hash', 1),
(34, '', 'tokentest', '55345345', 'hash', 0),
(35, 'ggkffkfk@fkdk.com', 'tokentest', '55345345', 'hash', 0),
(36, 'u', 'tokentest', '55345345', 'hash', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
