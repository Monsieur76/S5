-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 17 jan. 2019 à 14:22
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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `chapo`, `contained`, `author`, `date_post`) VALUES
(35, 'poil', 'le plus beau l\'abricot', '&lt;strong&gt;lol&lt;/strong&gt;', 'capcom', '2019-01-17 12:03:59'),
(34, 'lol', 'chapo', '<strong>lol</strong>', 'abricot', '2019-01-17 12:02:23'),
(33, 'poil', 'le plus beau l\'abricot', 'l\'abricot est orange.', 'capcom', '2019-01-17 12:01:49'),
(36, 'poil', 'le plus beau l\'abricot', 'bhjufiyukvhg', 'capcom', '2019-01-17 13:33:23'),
(37, 'l\'arnaque', 'cété une arnaque', '&lt;strong&gt;lol&lt;/strong&gt;', 'capcom', '2019-01-17 13:41:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
