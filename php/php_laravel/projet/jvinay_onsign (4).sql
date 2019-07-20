-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 15 Mars 2018 à 18:44
-- Version du serveur :  5.5.55-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `onsign`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
`id_cours` int(2) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `niveau` varchar(2) NOT NULL,
  `texte_cours` text NOT NULL,
  `video` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `titre`, `niveau`, `texte_cours`, `video`) VALUES
(36, 'Initiation : les premiers mots ', 'A', 'Ce cours vous permettra d''apprendre vos premiers mots en LSF. \r\nce sont les bases de la langue des signes. \r\nN''hésitez pas à regarder la vidéo plusieurs fois afin de tous les retenir.', '1.mp4'),
(37, 'Les bases ', 'A', 'Ce cours vous permettra d''aller plus loin dans l''apprentissage de la LSF. Ici, vous verrez la suite des bases du langage des signes.', '2.mp4'),
(38, 'Les bases 2 : aller plus loin ', 'A', 'Ce cours vous permettra d''aller plus loin dans l''apprentissage des bases de la LSF. \r\nN''hésitez pas à regarder la vidéo plusieurs fois et à reproduire les gestes.', '3.mp4'),
(39, 'Commencez à vous exprimer ', 'A', 'Ce cours vous permettra d''avoir assez de vocabulaire pour commencer à vous exprimer en LSF et à transmettre vos idées. \r\n', '4.mp4'),
(40, 'Reprendre les bases ', 'B', 'ce cours vous permet de reprendre les bases afin de bien commencer votre formation de LSF intermédiaire. ', '1.mp4'),
(41, 'Les verbes', 'B', 'Ce cours vous permet d''apprendre les verbes. En effet, ils sont essentiels pour pouvoir avancer dans l''apprentissage de la LSF. ', '3.mp4'),
(42, 'Aller plus loin', 'B', 'Ce cours vous permet d''aller plus loin dans l''apprentissage de la LSF et de pouvoir vous exprimer en pubic. ', '2.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `cours_irl`
--

CREATE TABLE IF NOT EXISTS `cours_irl` (
  `lieu_rdv` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id_user` int(11) NOT NULL,
  `question` varchar(20) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cours_irl`
--

INSERT INTO `cours_irl` (`lieu_rdv`, `id_user`, `question`, `feedback`) VALUES
('Paris', 11, 'BO', 'J''adore ! '),
('Marseille', 33, 'pub', 'Ca fait 3 min ... \r\nMais merci !! ');

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

CREATE TABLE IF NOT EXISTS `quizz` (
  `id_cours` int(11) NOT NULL,
  `id_quizz` int(11) NOT NULL,
  `mot` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `video1` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `video2` varchar(100) NOT NULL,
  `video3` varchar(100) NOT NULL,
  `reussi` int(1) DEFAULT '0',
  `niveau` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `quizz`
--

INSERT INTO `quizz` (`id_cours`, `id_quizz`, `mot`, `video1`, `video2`, `video3`, `reussi`, `niveau`) VALUES
(36, 0, 'anniversaire', 'aujourdhui.mp4', 'anniversaire.mp4', 'cassette.mp4', 1, 'A'),
(37, 1, 'merci', 'merci.mp4', 'bonsoir.mp4', 'pardon.mp4', 0, 'A'),
(38, 2, 'arbre', 'campagne.mp4', 'arbre.mp4', 'exemple.mp4', 0, 'A'),
(39, 3, 'souvent', 'poubelle.mp4', 'ville.mp4', 'souvent.mp4', 0, 'A'),
(40, 4, 'comprendre', 'comprendre.mp4', 'bureau.mp4', 'avant.mp4', 1, 'B'),
(41, 5, 'avocat', 'campagne.mp4', 'avocat.mp4', 'froid.mp4', 1, 'B'),
(42, 6, 'merci', 'comprendre.mp4', 'anniversaire.mp4', 'merci.mp4', 1, 'B');

-- --------------------------------------------------------

--
-- Structure de la table `reussi`
--

CREATE TABLE IF NOT EXISTS `reussi` (
  `reussi1` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `id_quizz` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reussi`
--

INSERT INTO `reussi` (`reussi1`, `id`, `id_quizz`) VALUES
(1, 28, 40),
(1, 28, 41),
(1, 28, 42),
(1, 11, 42),
(1, 11, 41),
(1, 11, 40),
(0, 29, 39),
(0, 29, 38),
(0, 29, 37),
(0, 29, 36),
(0, 27, 36),
(0, 27, 37),
(1, 27, 38),
(1, 27, 39),
(1, 30, 40),
(0, 30, 41),
(0, 30, 42),
(0, 31, 36),
(0, 31, 37),
(0, 31, 38),
(0, 31, 39),
(0, 32, 36),
(0, 32, 37),
(0, 32, 38),
(0, 32, 39),
(1, 33, 36),
(1, 33, 37),
(1, 33, 38),
(1, 33, 39),
(0, 12, 40),
(0, 12, 41),
(0, 12, 42),
(0, 9, 36),
(0, 9, 37),
(0, 9, 38),
(0, 9, 39);

-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

CREATE TABLE IF NOT EXISTS `tchat` (
`id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`id_message`, `id_user`, `message`, `date_time`, `prenom`) VALUES
(21, 12, 'Salut :)', '2018-03-13 09:23:36', 'Clément'),
(25, 11, 'Hey ! ', '2018-03-13 09:27:08', 'jeanne'),
(29, 13, 'Coucou les gars ', '2018-03-13 13:47:42', 'Thirry'),
(31, 26, 'Grave cool le site +1', '2018-03-14 10:43:52', 'Grégoire'),
(38, 28, 'Personne sur Boulogne pour réviser ensemble la LSF avant de passer la certification ? ', '2018-03-14 15:06:01', 'jeanne'),
(44, 29, 'j''adore la barre de progression, elle est très bien réaliser ', '2018-03-14 17:59:16', 'progression'),
(50, 28, 'Ca vous dit qu''on se rencontre avant d''aller passer la certification ?', '2018-03-15 14:47:47', 'jeanne'),
(51, 31, 'Bonjour Jeanne ! Carrément, on se fait un café révisions ? ', '2018-03-15 14:57:08', 'Jérome'),
(54, 31, 'Bonjour Jeanne ! Carrément, on se fait un café révisions ? Des personnes intéresées pour se voir ce soir au Vaudeville sur Paris ?', '2018-03-15 14:57:45', 'Jérome'),
(55, 28, 'Ah ce serait cool, je serais la vers 20 h ! ', '2018-03-15 14:58:32', 'jeanne'),
(56, 32, 'Oh je suis sur Paris aussi mais je viens de commencer la formation je risque de vous ralentir ...', '2018-03-15 14:59:36', 'Lisa'),
(57, 31, 'Oh mais non viens avec nous, on t''aidera ;)', '2018-03-15 15:00:03', 'Jérome');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `adresse` text NOT NULL,
  `complement_adresse` varchar(200) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `niveau_forfait` varchar(1) DEFAULT NULL,
  `niveau_formation` varchar(2) DEFAULT NULL,
  `mdp` varchar(100) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `adresse`, `complement_adresse`, `telephone`, `date_inscription`, `niveau_forfait`, `niveau_formation`, `mdp`, `admin`) VALUES
(9, 'Nom test', 'Prenom test', 'test@gmail.com', '28 place de la bourse ', '75002 Paris', '0101010101', '2018-03-12 00:00:00', '3', 'A', 'onsign', 0),
(10, 'admin ', 'Ziad', 'admin@gmail.com', '28 place de la Bourse', '75002 Paris', '0505050505', '2018-03-12 00:00:00', '3', 'A', 'okok', 1),
(11, 'vinay', 'jeanne', 'jeanne.vinay@eemi.com', '3 clos des marguerites', '27120 HC ', '050505', '2018-03-13 00:00:00', '1', 'B', 'onsign', 1),
(12, 'Zerbibi', 'Clément', 'clem.zerbi@gmail.com', '35 rue de dantzig, digicode 3695A, rdc', 'zerbibi cp_adresse', '0607080901', '2018-03-13 08:49:34', '2', 'B', 'aledaled', 1),
(25, 'Joli', 'Pomme', 'jolipomme@yopmail.com', '24 rue des Jolipommes 75002 Bruxelles', '', '0606060606', '2018-03-14 10:20:32', '3', 'A', 'jolipomme', NULL),
(26, 'Sayer', 'Grégoire', 'gregoire.sayer@eemi.com', 'blobloblob', 'ploploploploplop', 'cmor', '2018-03-14 10:40:57', '1', 'B', 'test', NULL),
(27, 'Testttttttt', 'Jeanne', 'vinayjeanne@gmail.com', '3 clos des marguerites', '3 clos des marguerites', '323232', '2018-03-14 11:49:34', '3', 'A', 'onsign', NULL),
(28, 'jeanne', 'jeanne', 'j@gmail.com', 'zz', 'zz', '5555', '2018-03-14 15:00:22', '2', 'B', 'onsign', NULL),
(30, 'machin', 'tristan', 'm@b.fr', 'fhjkl', 'zertyui', '65432', '2018-03-15 14:18:08', '1', 'B', 'azerty', NULL),
(31, 'Jérome', 'Jérome', 'jj@gmail.com', 'oui', 'oui', '555555', '2018-03-15 14:56:21', '3', 'A', 'onsign', NULL),
(32, 'Lisa', 'Lisa', 'l@gmail.com', 'oui', 'oui', '444', '2018-03-15 14:58:59', '3', 'A', 'onsign', NULL),
(33, 'Chekroun', 'Mickael', 'mickael.chekroun@eemi.com', '??', '??', '0617048119', '2018-03-15 15:44:18', '3', 'A', 'root', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
 ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `quizz`
--
ALTER TABLE `quizz`
 ADD PRIMARY KEY (`id_quizz`), ADD KEY `id_cours` (`id_cours`);

--
-- Index pour la table `tchat`
--
ALTER TABLE `tchat`
 ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
MODIFY `id_cours` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `tchat`
--
ALTER TABLE `tchat`
MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
