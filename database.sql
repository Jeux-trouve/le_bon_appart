-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 nov. 2021 à 14:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wf3_php_intermediaire_jessica`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

DROP TABLE IF EXISTS `advert`;
CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `postal_code` char(5) NOT NULL,
  `city` varchar(32) NOT NULL,
  `type` varchar(8) NOT NULL,
  `price` float NOT NULL,
  `reservation_message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, 'LOCATION APPARTEMENT METZ', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '57000', 'METZ', '1', 550, 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.'),
(2, 'LOCATION APPARTEMENT NICE', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '06000', 'NICE', '1', 700, 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.'),
(3, 'lOCATION APPARTEMENT NICE', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '06000', 'NICE', 'location', 700, NULL),
(4, 'VENTE APPARTEMENT THIONVILLE', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '57100', 'THIONVILLE', 'vente', 150000, NULL),
(5, 'VENTE APPARTEMENT THIONVILLE', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '57100', 'THIONVILLE', 'vente', 150000, NULL),
(6, 'VENTE MAISON AMNEVILLE', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '57360', 'AMNEVILLE', 'vente', 350000, NULL),
(7, 'LOCATION APPARTEMENT JOEUF', 'Très bel appartement entièrement rénové installations neuves (salle de bains, wc, cuisine équipée parquets chauffage neuf etc).', '54240', 'JOEUF', 'location', 620, NULL),
(8, 'VENTE MAISON JOEUF', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '54240', 'JOEUF', 'vente', 250000, 'Cette annonce est réservée'),
(9, 'LOCATION MEUBLEE', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '57240', 'KNUTANGE', 'location', 630, NULL),
(10, 'LOCATION MEUBLEE', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '57100', 'THIONVILLE', 'location', 850, NULL),
(11, 'LOCATION APPARTEMENT', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '54000', 'NANCY', 'location', 975, NULL),
(12, 'VENTE APPARTEMENT', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '06310', 'BEAULIEU SUR MER', 'vente', 400000, 'Cette annonce est réservée '),
(13, 'VENTE MAISON ', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '68190', 'ENSISHEIM', 'vente', 275, NULL),
(14, 'VENTE MAISON', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '55170', 'ANCERVILLE', 'vente', 225000, NULL),
(15, 'VENTE MAISON ', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '67500', 'HAGUENAU', 'vente', 365000, 'Je souhaite mettre une option de réservation sur cette annonce'),
(16, 'LOCATION APPARTEMENT', 'Lorem ipsum dolor sit amet. Sed eius exercitationem et quibusdam internos aut adipisci consequatur vel laboriosam quia et nesciunt consequuntur qui quia exercitationem.', '57300', 'AY SUR MOSELLE', 'location', 600, 'je reserve'),
(17, 'LOCATION MAISON', 'Lorem ipsum dolor sit amet. Ut vero numquam et ullam quia sit vitae nihil eos dolorem architecto rerum laborum id nemo odit. Et deleniti amet qui nisi eveniet ut sequi ullam.', '57300', 'AY SUR MOSELLE', 'location', 450, NULL),
(18, 'VENTE APPARTEMENT', 'Lorem ipsum dolor sit amet. Ut vero numquam et ullam quia sit vitae nihil eos dolorem architecto rerum laborum id nemo odit. Et deleniti amet qui nisi eveniet ut sequi ullam.', '06000', 'NICE', 'vente', 50000, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
