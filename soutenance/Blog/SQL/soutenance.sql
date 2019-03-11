-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 fév. 2019 à 08:27
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `soutenance`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `pass` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `register` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UC_admin` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `pass`, `mail`, `register`) VALUES
(1, 'monsieur', 'azerty', 'lol@azerty.fr', 1),
(43, 'Gaetan Henry', '9999', 'fzef@fzef.frnnjk', 1),
(44, 'Gaetan Henry', '9999', 'gaetanhenry76@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentary` text NOT NULL,
  `register_valid` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`id`, `commentary`, `register_valid`, `id_post`) VALUES
(121, 'a la la je suis la', 1, 36),
(120, 'le meilleur commentaire', 1, 36),
(119, 'le meilleur commentaire', 1, 36);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `contained` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `chapo`, `contained`, `author`, `date_post`) VALUES
(36, 'Intempéries : 7 départements en vigilance orange, risque d’avalanches sur des routes des Alpes ', 'Neige, verglas, avalanches, pluie et inondations concernent différentes régions.', 'Neige, verglas, avalanches, pluie et inondations concernent différentes régions.\r\n\r\n\r\n\r\nDifférents risques météorologiques pèsent sur le pays ce vendredi. Météo France. « Les massifs de Haute-Savoie présentent également un risque fort, de niveau 4. »\r\n\r\n« En conséquence, pour l’ensemble des massifs alpins, des avalanches sont susceptibles d’atteindre des routes de montagne », prévient l’organisme météorologique.\r\n\r\nCumuls de risques en Corse, attention sur le littoral dans le sud-est.\r\n\r\nLa Corse, en particulier la Corse-du-Sud, fait face à un triple facteur de risque. Il y a plu beaucoup, d’où la vigilance pluie et inondations. Elle fait aussi face à un risque de vagues submersives. Celles-ci peuvent compliquer l’écoulement des pluies. Enfin, la fonte des neiges renforce le risque d’inondations.\r\n\r\nLe Var et les Alpes-Maritimes sont également en vigilance orange en raison du risque de vagues submersives. Ces vagues prennent de l’ampleur dans la journée.\r\n\r\nLa prudence est aussi de mise dans les Bouches-du-Rhône et en Haute-Corse, mais aussi le long de l’Atlantique dans les Pyrénées-Atlantiques, dans les Landes et en Gironde, ces cinq départements étant en vigilance jaune en raison du même risque.', 'Le Parisiens', '2019-02-01 14:55:21'),
(41, 'Coupe du monde de ski : le Vosgien Clément Noël remporte le slalom en Autriche', 'Déjà vainqueur dimanche dernier du slalom de Wengen en Suisse, le skieur vosgien Clément Noël s\'est à nouveau imposé ce samedi dans le slalom de Kitzbühel en Autriche. L\'épreuve compte pour la coupe du monde.', '                 Vosges, France\r\n \r\n \r\nEt de deux pour Clément Noël! Après avoir remporté avec brio le slalom de Wengen en Suisse dimanche dernier, le skieur vosgien s\'est à nouveau imposé ce samedi à Kitzbühel en Autriche, ravissant la première place au maître de la discipline, l\'Autrichien Marcel Hirscher.\r\n\r\n\r\n\r\nLa première manche a pourtant été remportée par le Suisse Ramon Zenhaüsern, réalisant le meilleur temps devant Clément Noël (2e, +12/100es) mais le Vosgien a fait un sans faute dans la deuxième manche arrivant en tête (29/100es d\'avance) devant l\'Autrichien Hirsher et le Français Alexis Pinturault\r\n       ', 'France Bleu Sud Lorraine', '2019-02-01 14:58:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
