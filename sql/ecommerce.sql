-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 13 juil. 2018 à 00:56
-- Version du serveur :  5.7.22
-- Version de PHP :  7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `link`, `description`, `price`, `quantity`, `category`) VALUES
(1, 'images/fresh.php/41xYnnF58eL.jpg', 'Orange for America, pack of 5.', 3.99, 0, 'fresh'),
(2, 'images/fresh.php/300x300bb.jpg', 'Brocoli pack of 4', 5.99, 0, 'fresh'),
(3, 'images/fresh.php/0002028_red-long-pepper.jpeg', 'Variety of pepper , pack of 10', 5.99, 0, 'fresh'),
(4, 'images/fresh.php/4381654_001.jpg', 'Leek of India pack of 3', 6.99, 0, 'fresh'),
(5, 'images/fresh.php/1456358322Bitter_Gourd-300x300.jpg', 'Cucumber of Egyt pack of 4.', 6.99, 0, 'fresh'),
(6, 'images/fresh.php/basil-250x250.jpg', 'Basilic from Africa pack of 6.', 4.99, 0, 'fresh'),
(7, 'images/fresh.php/celery-300.jpg', 'Celery of Africa pack of 4', 7.99, 0, 'fresh'),
(8, 'images/fresh.php/icon_grapes_edelweiss.png', 'Raisin from France .', 9.99, 0, 'fresh'),
(9, 'images/fresh.php/carotte.jpg', 'Carote of Cameroon pack 6.', 8.99, 5, 'fresh'),
(10, 'images/fresh.php/il_300x300.1243094651_ti7d.jpg', 'Pepper of India.', 7.99, 6, 'fresh'),
(11, 'images/fresh.php/shutterstock_539050234.jpg', 'Green pepper pack of 5 ', 8.99, 7, 'fresh'),
(12, 'images/foodCupboard.php/41XGb7ObuFL._SY300_QL70.jpg', 'Noodles pasta massala pack of 4', 15.99, 6, 'cupboard'),
(13, 'images/foodCupboard.php/51DWKVDwYIL._SY300_QL70_.jpg', 'Near East coucous ', 20.99, 9, 'cupboard'),
(14, 'images/foodCupboard.php/51RCHZtFScL._SY300_QL70_.jpg', 'Corn flakes All Bran the one you need ', 14.99, 7, 'cupboard'),
(15, 'images/foodCupboard.php/51shbmtnUbL._SY300_QL70_.jpg', 'Nongshin Noodles pack of 6', 16.99, 8, 'cupboard'),
(16, 'images/foodCupboard.php/61J0Br6967L._SY300_QL70_.jpg', 'Honey Whole Wheat', 18.99, 9, 'cupboard'),
(17, 'images/foodCupboard.php/91w5O89txvL.jpg', 'Near East Cousocus since 1992 ', 14.99, 9, 'cupboard'),
(18, 'images/foodCupboard.php/568mlpint-channel.jpg', 'Milk shake pack of 12', 17.99, 6, 'cupboard'),
(19, 'images/foodCupboard.php/BASMATI-RICE-SILVER-5kg-300-300.png', 'Bamasti Rice Silver', 14.99, 5, 'cupboard'),
(20, 'images/foodCupboard.php/bikaneri-bhujia-250x250.jpg', 'Bikaneri', 14.99, 5, 'cupboard'),
(21, 'images/foodCupboard.php/images.jpg', 'Splenda Sugar pack of 20', 17.99, 8, 'cupboard'),
(22, 'images/foodCupboard.php/Product-Review-Vetta-340px-300x300.png', 'Smart pasta of Vetta', 20.99, 9, 'cupboard'),
(23, 'images/foodCupboard.php/size7-egg-300x300.jpg', 'Eggs pack of 30', 14.99, 6, 'cupboard'),
(24, 'images/frozen.php/1_daa4d395-585e.jpg', 'Pork meat pack of 2.', 5.99, 9, 'frozen'),
(25, 'images/frozen.php/58892011_1_640x640-300x300.jpg', 'Fresh Saumon pack of 3', 25.99, 8, 'frozen'),
(26, 'images/frozen.php/Bhetki-Fillet-500gm-300x300.jpg', 'Fresh fish', 10.99, 8, 'frozen'),
(27, 'images/frozen.php/butterflychick-300x300.jpg', 'Fresh chicken ', 10.54, 9, 'frozen'),
(28, 'images/frozen.php/Fish-Natholi-300x300.jpg', 'Fish Natholi ', 17.99, 9, 'frozen'),
(29, 'images/frozen.php/https-_d21jn5nyp06yex.cloudfront.net_cdn_p_15986_telapia-fish-34-pcs-net-weight-.jpg', 'Fresh thilapia', 17.99, 9, 'frozen'),
(30, 'images/frozen.php/Mutton_with_bone_i_large-300x300.jpg', 'Fresh Lamb', 12.99, 9, 'frozen'),
(31, 'images/frozen.php/Round-Steak.jpg', 'Steak', 8.99, 9, 'frozen'),
(32, 'images/frozen.php/Top-Sirloin-Steak.jpg', 'Sirloin Steak', 17.99, 9, 'frozen'),
(33, 'images/frozen.php/TSL2097-TUNA-LOIN-300x300.jpg', 'Tuna Loin ', 12.35, 6, 'frozen'),
(34, 'images/drinks.php/7-250x250 (2).jpg', 'Water pack 12', 2.99, 5, 'drinks'),
(35, 'images/drinks.php/300_300_productGfx.jpg', 'T2 juice pack 12', 5.99, 2, 'drinks'),
(36, 'images/drinks.php/5167-media-Cartograph-Wines.jpg.300x300.jpg', 'Cartographe wine ', 17.99, 0, 'drinks'),
(37, 'images/drinks.php/1037662.jpg', 'Schweppes refreshing drink', 4.99, 6, 'drinks'),
(38, 'images/drinks.php/AC89773.jpg', 'Milk Kefir', 12.99, 9, 'drinks'),
(39, 'images/drinks.php/bisleri_20litre_water_can.png', '20 Litres of Bisleri water', 17.99, 9, 'drinks'),
(40, 'images/drinks.php/ctg_wine_rose-1-300x300.jpg', 'Pink wine', 45.99, 9, 'drinks'),
(41, 'images/drinks.php/nectar-de-lucuma-bebidas-300-ml-frae.jpg', 'Nectar of Lucuma bebilas', 49.99, 8, 'drinks'),
(42, 'images/drinks.php/p1458642321.jpg', 'Coke cola pack of 12', 20.99, 9, 'drinks'),
(43, 'images/drinks.php/vn950a-300x300.jpg', 'Red  wine pack of 12', 79.99, 8, 'drinks'),
(44, 'images/drinks.php/white-wine-300-2014-malvasia-wines-250x250.png', 'Malvasia Wine', 78.99, 9, 'drinks');

-- --------------------------------------------------------

--
-- Structure de la table `article_commande`
--

CREATE TABLE `article_commande` (
  `id_commande` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article_commande`
--

INSERT INTO `article_commande` (`id_commande`, `id_article`, `quantite`) VALUES
(12, 3, 3),
(12, 7, 4),
(14, 4, 1),
(14, 8, 1),
(14, 14, 1),
(14, 18, 1),
(14, 21, 1),
(14, 23, 3),
(14, 33, 1),
(14, 41, 1),
(16, 3, 1),
(16, 7, 1),
(16, 9, 1),
(16, 10, 1),
(16, 33, 1),
(16, 43, 1),
(17, 4, 1),
(17, 33, 1),
(17, 37, 1),
(18, 4, 1),
(28, 4, 1),
(28, 5, 1),
(28, 8, 3),
(28, 9, 1),
(31, 5, 1),
(31, 6, 1),
(31, 7, 1),
(31, 8, 1),
(31, 12, 1),
(32, 4, 1),
(32, 5, 1),
(32, 6, 1),
(32, 7, 1),
(32, 8, 1),
(34, 4, 1),
(34, 5, 1),
(34, 6, 1),
(34, 7, 1),
(34, 8, 1),
(35, 4, 1),
(35, 5, 1),
(35, 6, 1),
(35, 7, 1),
(35, 8, 1),
(36, 5, 1),
(36, 6, 1),
(36, 7, 1),
(38, 5, 1),
(38, 6, 1),
(38, 8, 1),
(39, 5, 1),
(39, 6, 1),
(39, 8, 1),
(43, 6, 1),
(43, 9, 1),
(43, 10, 1),
(43, 11, 1),
(43, 12, 1),
(44, 4, 1),
(44, 26, 1),
(44, 34, 3),
(44, 35, 1),
(44, 36, 2),
(44, 37, 1),
(46, 34, 1),
(46, 35, 1),
(46, 36, 6),
(46, 37, 1),
(48, 36, 2),
(49, 4, 1),
(49, 12, 1),
(49, 19, 4),
(49, 20, 4),
(50, 18, 2),
(51, 6, 1),
(52, 10, 1),
(54, 11, 1),
(55, 9, 1),
(56, 4, 1),
(56, 6, 1),
(56, 9, 1),
(56, 10, 1),
(56, 11, 1),
(56, 12, 1),
(56, 13, 1),
(56, 14, 1),
(56, 15, 1),
(56, 16, 1),
(56, 17, 1),
(56, 18, 1),
(56, 19, 1),
(56, 20, 1),
(56, 21, 1),
(56, 22, 1),
(56, 23, 1),
(56, 24, 1),
(56, 25, 1),
(56, 26, 1),
(56, 27, 1),
(56, 28, 1),
(56, 29, 1),
(56, 30, 1),
(56, 31, 1),
(56, 32, 1),
(56, 33, 1),
(56, 34, 1),
(56, 35, 1),
(56, 37, 1),
(56, 38, 1),
(56, 39, 1),
(56, 40, 1),
(56, 41, 1),
(56, 42, 1),
(56, 43, 1),
(56, 44, 1),
(57, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_user`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'toto', 'toto'),
(2, 'matthieu', '6f5cfecdfcff7f44912789ae5933dcdac629ae4d'),
(3, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(4, 'tata', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c'),
(5, 'test1', 'b444ac06613fc8d63795be9ad0beaf55011936ac'),
(6, 'test2', '109f4b3c50d7b0df729d299bc6f8e9ef9066971f');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_commande`
--
ALTER TABLE `article_commande`
  ADD PRIMARY KEY (`id_commande`,`id_article`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
