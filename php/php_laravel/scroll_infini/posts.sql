-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 26 mars 2018 à 21:46
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bubblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `type` int(2) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `content` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `pictures` varchar(255) DEFAULT NULL,
  `author` varchar(30) NOT NULL,
  `rating` float(5,1) NOT NULL DEFAULT '0.0',
  `count_vote` int(11) NOT NULL DEFAULT '0',
  `count_comments` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_post`, `title`, `type`, `category`, `content`, `link`, `pictures`, `author`, `rating`, `count_vote`, `count_comments`, `created_at`, `updated_at`) VALUES
(1, 'Mon Titre 1', 1, 'Economie', 'Voici le contenu de mon article 1.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.', NULL, 'sport.jpg', 'L\'Equipe', 3.0, 1, 3, '2018-02-06 11:48:26', '2018-03-13 14:26:11'),
(2, 'Mon Titre 2', 1, 'Sante', 'Voici le contenu de mon article 2.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.', NULL, 'economie.jpg', 'Les Echos', 3.7, 3, 3, '2018-02-06 11:48:26', '2018-03-08 13:02:23'),
(3, 'Mon titre 3', 1, 'Finance', 'Voici le contenu de mon article 1.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.', NULL, 'politique1.jpeg', 'Le Figaro', 2.7, 3, 0, '2018-02-06 11:49:21', '2018-03-08 13:02:23'),
(4, 'Mon titre 4', 1, 'Finance', 'Voici le contenu de mon article 2.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.<br>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet perferendis provident dolore aperiam ea commodi officia error rerum reiciendis obcaecati quisquam, dolorum numquam adipisci deserunt voluptate cum. Sequi, optio.', NULL, 'politique2.jpg', 'Sebastie Alliot', 3.7, 3, 5, '2018-02-06 11:50:03', '2018-03-08 17:12:36'),
(14, 'Réforme du bac : un cours obligatoire sur les « humanités numériques » dès 2019', 2, 'Education', 'Le gouvernement a présenté hier sa réforme du bac, qui entrera progressivement en vigueur jusqu’en 2021. Dès la rentrée 2019, les élèves de première suivront tous un cours d’ « humanités scientifiques et numériques » (dont les contours demeurent extrêmement flous). Un enseignement de spécialité sur l’informatique sera également proposé.Lire la suite', 'https://www.nextinpact.com/news/106145-reforme-bac-cours-obligatoire-sur-humanites-numeriques-des-2019.htm', 'https://cdn3.nextinpact.com/dlx/68747470733A2F2F63646E322E6E657874696E706163742E636F6D2F696D616765732F62642F776964652D6C696E6B65642D6D656469612F373834322E6A7067', 'Next Impact', 3.0, 2, 2, '0000-00-00 00:00:00', '2018-03-08 17:25:56'),
(15, 'JO 2018 : Martin Fourcade, héros fatigué', 2, 'Sport', 'Tombé malade après son titre olympique, le roi du biathlon a commis deux fautes par manque de lucidité sur son dernier tir. Il a le sentiment d’avoir offert l’or à son rival Johannes Boe.', 'http://www.lemonde.fr/jeux-olympiques-pyeongchang-2018/article/2018/02/15/jo-2018-martin-fourcade-heros-fatigue_5257527_5193626.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/02/15/644x322/5257524_3_dbe1_martin-fourcade_42652ed059d9332bd3a0c32076975eb1.jpg', 'Lemonde', 0.0, 0, 5, '0000-00-00 00:00:00', '2018-03-08 17:18:13'),
(17, 'Enquête sur l’essayiste Bat Ye’or, auteure d’« Eurabia » et égérie des milieux islamophobes', 2, 'Société', 'Citée par Michel Houellebecq dans « Soumission », cette figure controversée, à l’influence mondiale, signe son autobiographie politique.', 'http://www.lemonde.fr/livres/article/2018/02/15/bat-ye-or-l-egerie-des-nouveaux-croises_5257152_3260.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/02/15/644x322/5257150_3_9f47_l-intellectuelle-britannique-bat-ye-or-ph_890735eb3d71aa3ed2bfa1ade4a0260c.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', '2018-03-08 13:04:14'),
(18, 'Ce que l\'on sait de Nikolas Cruz, le tueur du lycée de Floride', 2, 'Société', 'Nikolas Cruz, 19 ans, a abattu 17 personnes mercredi à l\'aide d\'un fusil automatique dans un lycée de Floride. Le jeune homme, emprisonné, est présenté comme un déséquilibré. La question du port d\'armes passe, elle, au second plan.', 'http://www.france24.com/fr/20180215-tuerie-lycee-floride-nikolas-cruz-portrait-desequilibre-armes-trump', 'http://scd.france24.com/fr/files_fr/imagecache/france24_ct_api_medium2/article/image/rsz_063_918560148.jpg', 'France 24', 0.0, 0, 0, '0000-00-00 00:00:00', '2018-03-08 13:04:14'),
(20, 'Assurance chômage: la négociation bute toujours sur les contrats courts', 2, 'Société', 'Les partenaires sociaux vont-ils s\'entendre sur l\'épineuse question des contrats courts ? Les syndicats, qui ont retrouvé le patronat pour une séance de négociation supposée être la dernière sur l\'assurance chômage, doutaient qu\'un accord puisse être trouvé dès jeudi.A l\'issue de la réunion, les négociateurs doivent être en mesure de transmettre au gouvernement un texte commun, mettant en musique trois promesses de campagne d\'Emmanuel Macron : l\'extension du régime aux indépendants, l\'indemnisation des salariés qui démissionnent avec un projet de reconversion, et la mise en place d\'un dispositif de lutte contre les contrats précaires.Sur ce troisième thème, qui cristallise les oppositions, le patronat a fait un geste en direction des syndicats dans un nouveau projet d\'accord transmis dans la nuit.Il propose désormais d\'', 'http://www.france24.com/fr/20180215-assurance-chomage-negociation-bute-toujours-contrats-courts', NULL, 'France 24', 0.0, 0, 0, '0000-00-00 00:00:00', '2018-03-08 13:04:14'),
(21, 'Le dossier médical partagé prend son envol', 2, 'Sante', 'Après quatorze années d\'errance, la numérisation du dossier du patient décolle enfin. L\'année 2018 sera aussi celle de la généralisation de la...', 'https://www.lesechos.fr/journal20180215/lec1_une/0301298691581-le-dossier-medical-partage-prend-son-envol-2153744.php#xtor=RSS-37', NULL, 'Les Echos', 0.0, 0, 0, '0000-00-00 00:00:00', '2018-03-08 13:04:14'),
(22, 'bruxelles : tensions sur l\'avenir de la commission', 2, 'Politique', 'Jean-Claude Juncker défend le système de « tête de liste » pour désigner son successeur en 2019, en dépit de l\'opposition de nombreux Etats...', 'https://www.lesechos.fr/journal20180215/lec1_une/0301298781856-bruxelles-tensions-sur-lavenir-de-la-commission-2153857.php#xtor=RSS-37', NULL, 'Les Echos', 0.0, 0, 0, '0000-00-00 00:00:00', '2018-03-08 13:04:14'),
(23, 'Les ventes tactiques dopent le marché auto', 2, 'Automobile', 'Les ventes de véhicules de démonstration ou de courtoisie, peu lucratives, ont représenté 27 % du marché des voitures neuves en...', 'https://www.lesechos.fr/journal20180215/lec1_une/0301298503397-les-ventes-tactiques-dopent-le-marche-auto-2153753.php#xtor=RSS-37', NULL, 'Les Echos', 0.0, 0, 0, '0000-00-00 00:00:00', '2018-03-08 13:04:14'),
(24, 'Mitt Romney, ex-candidat à la Maison Blanche, dans la course pour le Sénat américain', 2, 'Politique', 'Le mormon de Salt Lake City, qui avait échoué face à Barack Obama en 2012, se présente à la course pour le siège de sénateur de l’Utah.', 'http://www.lemonde.fr/ameriques/article/2018/02/16/mitt-romney-ex-candidat-a-la-maison-blanche-dans-la-course-pour-le-senat-americain_5258097_3222.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/02/16/644x322/5258095_3_c26f_mitt-romney-lors-d-une-conference-a-salt-lak_83063a8baa9a155158d99fbdd12e5cf3.jpg', 'TechChrunch', 0.0, 0, 0, '0000-00-00 00:00:00', '2018-03-08 13:04:14'),
(25, 'Journée des droits des femmes : « L’affaire Weinstein fait de ce 8 mars un moment charnière »', 2, NULL, 'Des associations et des syndicats ont rappelé, lors du rassemblement organisé jeudi place de la République, à Paris, les inégalités dont les femmes continuent d’être victimes.', 'http://www.lemonde.fr/societe/article/2018/03/08/journee-des-droits-des-femmes-un-collectif-appelle-a-la-mobilisation-et-a-cesser-le-travail-a-15-h-40_5267530_3224.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/03/08/644x322/5267909_3_f5f5_a-demonstrator-holds-a-placard-reading-same_80039cbcad45de535286a8b1c31b28cd.jpg', 'TechChrunch', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(26, 'Le plan social d’Airbus reçoit un accueil mesuré à Toulouse', 2, NULL, 'L’avionneur européen a annoncé, mercredi, un plan de suppression de 3 700 postes, dont 470 en France. A Toulouse, 320 personnes seront concernées, essentiellement des intérimaires ou des CDD.', 'http://www.lemonde.fr/economie/article/2018/03/08/le-plan-social-d-airbus-recoit-un-accueil-mesure-a-toulouse_5267863_3234.html?xtor=RSS-3208', 'http://s1.lemde.fr/image/2018/03/08/644x322/5267862_3_d7be_des-techniciens-travaillent-sur-un-airbus-a380_057d53dac89a0b11044c1502a5b369d0.jpg', 'TechChrunch', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(27, 'Brexit : chacun campe sur ses positions', 2, 'Journal', 'Le dialogue est de plus en plus tendu entre l\'Union européenne et la Grande-Bretagne au sujet des conditions de leur partenariat...', 'https://www.lesechos.fr/journal20180308/lec1_une/0301389974698-brexit-chacun-campe-sur-ses-positions-2159303.php#xtor=RSS-37', '', 'TechChrunch', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(28, 'Des horloges accumulent du retard en Europe... à cause du réseau électrique', 2, 'Matériel', 'La situation est assez cocasse et touche notamment celles des fours et des radio-reveil, mais pas des ordinateurs ou des smartphones, qui se basent sur des serveurs NTP. Pour se maintenir à l\'heure, les horloges branchées sur secteur ut...Lire la suite', 'https://www.nextinpact.com/brief/des-horloges-accumulent-du-retard-en-europe----a-cause-du-reseau-electrique-2981.htm', 'https://cdn3.nextinpact.com/dlx/68747470733A2F2F63646E322E6E657874696E706163742E636F6D2F696D616765732F62642F776964652D6C696E6B65642D6D656469612F31393438322E6A7067', 'TechChrunch', 4.0, 1, 0, '0000-00-00 00:00:00', '2018-03-09 09:01:55'),
(29, 'Que représente la Française des jeux, dont le gouvernement veut ouvrir le capital ?', 2, NULL, 'Gérald Darmanin a confirmé, jeudi, que le capital de la FDJ pourrait être ouvert, mais que l’Etat conserverait le monopole des loteries et jeux à gratter.', 'http://www.lemonde.fr/les-decodeurs/article/2018/03/08/que-represente-la-francaise-des-jeux-dont-le-gouvernement-veut-ouvrir-le-capital_5267884_4355770.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/03/08/644x322/5267876_3_0bb0_la-francaise-des-jeux-a-engrange-1_75ac03ea9679fdd9ee7c857ee6d42c11.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(30, 'Michel et Augustin prennent du champ', 2, 'Journal', 'L\'entreprise à 40 % rachetée par Danone se dote d\'un nouveau directeur général et d\'un responsable du bureau de New York.', 'https://www.lesechos.fr/journal20180309/lec2_industrie_et_services/0301395234252-michel-et-augustin-prennent-du-champ-2159632.php#xtor=RSS-37', 'https://www.lesechos.fr/medias/2018/03/09/2159632_michel-et-augustin-prennent-du-champ-web-0301392432437_300x160.jpg', 'Les Echos', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(31, 'L’Inde dans une bataille identitaire', 2, NULL, 'Avec l’arrivée au pouvoir en 2014 du nationalisme hindou, l’idée d’une nation séculière célébrée par Nehru semble vivre ses derniers jours. Enquête, à l’occasion de la visite d’Etat de Macron jusqu’au 12 mars.', 'http://www.lemonde.fr/idees/article/2018/03/09/l-inde-dans-une-bataille-identitaire_5267968_3232.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/03/09/644x322/5267966_3_d2cd_atelier-de-sculpture-a-bhedaghat-madhya_2d5ed80314f674432d13b807cbef95bb.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(32, 'Cheminots, fonctionnaires, aviation… quelles perturbations attendre jeudi ?', 2, NULL, 'Des syndicats de différents secteurs appellent à la grève ou à des manifestations jeudi. Le point des revendications et des perturbations à prévoir.', 'http://www.lemonde.fr/societe/article/2018/03/21/cheminots-fonctionnaires-aviation-civile-quelles-perturbations-attendre-jeudi_5274179_3224.html?xtor=RSS-3208', 'http://s1.lemde.fr/image/2018/03/21/644x322/5274177_3_db32_un-employe-de-la-sncf-en-greve-le-17-juin-2014_6ef3b9aaba29e736f43b1fdd5646b0ba.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(33, 'Classement 2018 : les lycées qui font réussir leurs élèves', 2, NULL, 'Ce palmarès s’appuie sur quatre des indicateurs publiés par l’Education nationale, qui visent à mesurer la capacité des lycées publics et privés de France à faire mieux qu’attendu.', 'http://www.lemonde.fr/lycee/article/2018/03/21/classement-des-lycees-2018-ces-lycees-qui-font-reussir-leurs-eleves_5273908_5019416.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/03/21/644x322/5273903_3_d51a_affichage-des-resultats-de-la-session-2017-du_03bc129e3e3aa878b2248eb9b19fb8e3.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(35, 'Le Conseil de Paris divisé sur le travail dominical', 2, 'Journal', 'Après l\'avoir combattue, la maire de la capitale défend désormais l\'ouverture des commerces le dimanche contre une partie de sa majorité...', 'https://www.lesechos.fr/journal20180321/lec1_une/0301463091921-le-conseil-de-paris-divise-sur-le-travail-dominical-2162860.php#xtor=RSS-37', '', 'Les Echos', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(36, 'Marlène Schiappa présente son projet de loi contre les violences sexuelles et sexistes', 2, NULL, 'Le texte dévoilé mercredi en conseil des ministres renforce l’interdiction des relations sexuelles entre majeurs et mineurs de moins de 15 ans.', 'http://www.lemonde.fr/societe/article/2018/03/21/marlene-schiappa-presente-son-projet-de-loi-contre-les-violences-sexuelles-et-sexistes_5273934_3224.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/03/21/644x322/5273930_3_e57f_la-secretaire-d-etat-chargee-de-l-e_420ac8f1138a984e28207c6161fc88f3.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(37, 'Grève du 22 mars : suivez en direct la mobilisation des fonctionnaires et cheminots', 2, NULL, 'Fonction publique, SNCF, RATP... Suivez en direct les manifestations de jeudi contre les projets de réforme du gouvernement.', 'http://www.lemonde.fr/societe/live/2018/03/22/greve-du-22-mars-suivez-en-direct-les-manifestations-des-fonctionnaires-et-des-cheminots_5274742_3224.html?xtor=RSS-3208', 'http://s1.lemde.fr/image/2018/03/22/644x322/5274849_3_cd7e_au-depart-du-cortege-des-cheminots-gare-de-l_4e5f168fdf5c9af47e4525abce1699ca.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', NULL),
(38, 'Nicolas Sarkozy, l’indispensable justice', 2, NULL, 'Editorial. Ce n’est pas d’acharnement, mais d’une remarquable ténacité, dont les juges du pôle financier ont fait preuve en mettant de nouveau en examen l’ancien président de la République.', 'http://www.lemonde.fr/idees/article/2018/03/22/mise-en-examen-de-nicolas-sarkozy-indispensable-justice_5274759_3232.html?xtor=RSS-3208', 'http://s2.lemde.fr/image/2018/03/22/644x322/5274786_3_a1cf_nicolas-sarkozy-et-brice-hortefeux-en-mai-2015_bccbc1c0c01cde08b00de7f020c6f59a.jpg', 'Lemonde', 0.0, 0, 0, '0000-00-00 00:00:00', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
