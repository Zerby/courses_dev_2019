-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 26 Mars 2018 à 20:07
-- Version du serveur :  5.5.55-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `alliot_listes`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
`id_annonce` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `id_modele`, `titre`, `prix`) VALUES
(1, 7, 'Mégane RS neuve ', 15000),
(2, 7, 'Mégane RS occasion', 7500),
(3, 1, '206 en bon état, à récupérer', 2000),
(4, 26, 'Superbe Classe A45 AMG 360cv', 49000),
(5, 6, 'Belle 106 d''époque', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE IF NOT EXISTS `marque` (
`id_marque` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `name`) VALUES
(1, 'Peugeot'),
(2, 'Renault'),
(3, 'Citroen'),
(4, 'Audi'),
(5, 'BMW'),
(6, 'Mercedes');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE IF NOT EXISTS `modele` (
`id_modele` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `modele`
--

INSERT INTO `modele` (`id_modele`, `id_marque`, `name`) VALUES
(1, 1, '206'),
(2, 1, '207'),
(3, 2, 'Clio 3'),
(4, 2, 'Clio 4'),
(5, 1, '306 GTI'),
(6, 1, '106 Sport'),
(7, 2, 'Megane RS'),
(8, 2, 'Twingo'),
(9, 2, 'Clio 2 Sport'),
(10, 2, 'R5'),
(11, 3, 'C1'),
(12, 3, 'C2'),
(13, 3, 'C3'),
(14, 3, 'C4 picasso'),
(15, 3, 'DS3'),
(16, 4, 'A1'),
(17, 4, 'A3'),
(18, 4, 'TT Sport'),
(19, 4, 'A5'),
(20, 4, 'R8'),
(21, 5, 'Serie 1'),
(22, 5, 'Serie 3 '),
(23, 5, 'X3'),
(24, 5, 'X1'),
(25, 5, 'X6 Sport'),
(26, 6, 'Classe A AMG'),
(27, 6, 'Classe B'),
(28, 6, 'Classe C AMG'),
(29, 6, 'Classe E'),
(30, 6, 'voiture mercedes');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
 ADD PRIMARY KEY (`id_annonce`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
 ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
 ADD PRIMARY KEY (`id_modele`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
MODIFY `id_modele` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
