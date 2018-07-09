-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Juillet 2018 à 11:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `article`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `link`, `Description`, `price`, `quantity`) VALUES
(1, 'images/fresh.php/41xYnnF58eL.jpg', 'Orange for America, pack of 5.', 3.99, 10),
(2, 'images/fresh.php/300x300bb.jpg', 'Brocoli pack of 4', 5.99, 10),
(3, 'images/fresh.php/0002028_red-long-pepper.jpeg', 'Variety of pepper , pack of 10', 5.99, 10),
(4, 'images/fresh.php/4381654_001.jpg', 'Leek of India pack of 3', 6.99, 10),
(5, 'images/fresh.php/1456358322Bitter_Gourd-300x300.jpg', 'Cucumber of Egyt pack of 4.', 6.99, 10),
(6, 'images/fresh.php/basil-250x250.jpg', 'Basilic from Africa pack of 6.', 4.99, 10),
(7, 'images/fresh.php/celery-300.jpg', 'Celery of Africa pack of 4', 7.99, 10),
(8, 'images/fresh.php/icon_grapes_edelweiss.png', 'Raisin from France .', 9.99, 10),
(9, 'images/fresh.php/carotte.jpg', 'Carote of Cameroon pack 6.', 8.99, 10),
(10, 'images/fresh.php/il_300x300.1243094651_ti7d.jpg', 'Pepper of India.', 7.99, 10),
(11, 'images/fresh.php/shutterstock_539050234.jpg', 'Green pepper pack of 5 ', 8.99, 10),
(12, 'images/foodCupboard.php/41XGb7ObuFL._SY300_QL70.jpg', 'Noodles pasta massala pack of 4', 15.99, 10),
(13, 'images/foodCupboard.php/51DWKVDwYIL._SY300_QL70_.jpg', 'Near East coucous ', 20.99, 10),
(14, 'images/foodCupboard.php/51RCHZtFScL._SY300_QL70_.jpg', 'Corn flakes All Bran the one you need ', 14.99, 10),
(15, 'images/foodCupboard.php/51shbmtnUbL._SY300_QL70_.jpg', 'Nongshin Noodles pack of 6', 16.99, 10),
(16, 'images/foodCupboard.php/61J0Br6967L._SY300_QL70_.jpg', 'Honey Whole Wheat', 18.99, 10),
(17, 'images/foodCupboard.php/91w5O89txvL.jpg', 'Near East Cousocus since 1992 ', 14.99, 10),
(18, 'images/foodCupboard.php/568mlpint-channel.jpg', 'Milk shake pack of 12', 17.99, 10),
(19, 'images/foodCupboard.php/BASMATI-RICE-SILVER-5kg-300-300.png', 'Bamasti Rice Silver', 14.99, 10),
(20, 'images/foodCupboard.php/bikaneri-bhujia-250x250.jpg', 'Bikaneri', 14.99, 10),
(21, 'images/foodCupboard.php/images.jpg', 'Splenda Sugar pack of 20', 17.99, 10),
(22, 'images/foodCupboard.php/Product-Review-Vetta-340px-300x300.png', 'Smart pasta of Vetta', 20.99, 10),
(23, 'images/foodCupboard.php/size7-egg-300x300.jpg', 'Eggs pack of 30', 14.99, 10),
(24, 'images/frozen.php/1_daa4d395-585e.jpg', 'Pork meat pack of 2.', 5.99, 10),
(25, 'images/frozen.php/58892011_1_640x640-300x300.jpg', 'Fresh Saumon pack of 3', 25.99, 10),
(26, 'images/frozen.php/Bhetki-Fillet-500gm-300x300.jpg', 'Fresh fish', 10.99, 10),
(27, 'images/frozen.php/butterflychick-300x300.jpg', 'Fresh chicken ', 10.54, 10),
(28, 'images/frozen.php/Fish-Natholi-300x300.jpg', 'Fish Natholi ', 17.99, 10),
(29, 'images/frozen.php/https-_d21jn5nyp06yex.cloudfront.net_cdn_p_15986_telapia-fish-34-pcs-net-weight-.jpg', 'Fresh thilapia', 17.99, 10),
(30, 'images/frozen.php/Mutton_with_bone_i_large-300x300.jpg', 'Fresh Lamb', 12.99, 10),
(31, 'images/frozen.php/Round-Steak.jpg', 'Steak', 8.99, 10),
(32, 'images/frozen.php/Top-Sirloin-Steak.jpg', 'Sirloin Steak', 17.99, 10),
(33, 'images/frozen.php/TSL2097-TUNA-LOIN-300x300.jpg', 'Tuna Loin ', 12.35, 10),
(34, 'images/drinks.php/7-250x250 (2).jpg', 'Water pack 12', 2.99, 10),
(35, 'images/drinks.php/300_300_productGfx.jpg', 'T2 juice pack 12', 5.99, 10),
(36, 'images/drinks.php/5167-media-Cartograph-Wines.jpg.300x300.jpg', 'Cartographe wine ', 17.99, 10),
(37, 'images/drinks.php/1037662.jpg', 'Schweppes refreshing drink', 4.99, 10),
(38, 'images/drinks.php/AC89773.jpg', 'Milk Kefir', 12.99, 10),
(39, 'images/drinks.php/bisleri_20litre_water_can.png', '20 Litres of Bisleri water', 17.99, 10),
(40, 'images/drinks.php/ctg_wine_rose-1-300x300.jpg', 'Pink wine', 45.99, 10),
(41, 'images/drinks.php/nectar-de-lucuma-bebidas-300-ml-frae.jpg', 'Nectar of Lucuma bebilas', 49.99, 10),
(42, 'images/drinks.php/p1458642321.jpg', 'Coke cola pack of 12', 20.99, 10),
(43, 'images/drinks.php/vn950a-300x300.jpg', 'Red  wine pack of 12', 79.99, 10),
(44, 'images/drinks.php/white-wine-300-2014-malvasia-wines-250x250.png', 'Malvasia Wine', 78.99, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
