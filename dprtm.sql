-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 sep. 2021 à 23:11
-- Version du serveur :  5.7.28
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dprtm`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(20) NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(50) NOT NULL,
  `prenom_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom_admin`, `prenom_admin`, `email`, `mdp`, `Image`) VALUES
(1, 'Driss', 'ABBADI', 'elmehdi.elhamine@gmail.com', '$2y$10$2ANXo.j2ea7akGdDJytcL.Khu3HPGy/c2B3hVB.gnQR7NP86lcoVS', 'admin.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

DROP TABLE IF EXISTS `candidats`;
CREATE TABLE IF NOT EXISTS `candidats` (
  `id_candidat` int(11) NOT NULL AUTO_INCREMENT,
  `poste` int(11) NOT NULL,
  `professeur` int(11) NOT NULL,
  PRIMARY KEY (`id_candidat`,`professeur`,`poste`) USING BTREE,
  KEY `professeur` (`professeur`),
  KEY `poste` (`poste`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id_candidat`, `poste`, `professeur`) VALUES
(143, 35, 1),
(149, 27, 1),
(132, 27, 5),
(179, 50, 5),
(144, 35, 8),
(146, 34, 9),
(147, 35, 11),
(145, 34, 13),
(135, 27, 14);

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

DROP TABLE IF EXISTS `cycle`;
CREATE TABLE IF NOT EXISTS `cycle` (
  `id_cycle` int(20) NOT NULL AUTO_INCREMENT,
  `nom_cycle` varchar(50) NOT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cycle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id_cycle`, `nom_cycle`, `DateCreation`) VALUES
(1, 'Licence', '2021-08-09 13:48:08'),
(2, 'Master', '2021-08-09 13:48:08'),
(3, 'Doctorat', '2021-08-13 11:50:03'),
(4, 'Bachelor', '2021-08-13 11:50:03'),
(5, 'Licence Professionnelle', '2021-08-31 14:36:47'),
(6, 'Master Spécialisé', '2021-08-31 14:36:47');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id_dprtm` int(20) NOT NULL AUTO_INCREMENT,
  `nom_dprtm` varchar(50) NOT NULL,
  `chefDepartement` int(20) DEFAULT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_dprtm`),
  KEY `chefDepartement` (`chefDepartement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_dprtm`, `nom_dprtm`, `chefDepartement`, `DateCreation`) VALUES
(1, 'science économique et gestion', NULL, '2021-08-09 13:51:47'),
(2, 'Droit francais', 5, '2021-08-09 13:51:47'),
(3, 'droit arab', NULL, '2021-08-31 14:28:14'),
(4, 'Mathématique - statistique et Informatique', NULL, '2021-08-31 14:28:14');

-- --------------------------------------------------------

--
-- Structure de la table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `id_election` int(11) NOT NULL AUTO_INCREMENT,
  `nom_election` varchar(255) NOT NULL,
  `date_election` date NOT NULL,
  `date_debut_insc` date NOT NULL,
  `date_fin_insc` date NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id_election`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `election`
--

INSERT INTO `election` (`id_election`, `nom_election`, `date_election`, `date_debut_insc`, `date_fin_insc`, `status`) VALUES
(1, 'élections  2023', '2021-09-02', '2021-08-24', '2021-09-15', 'active'),
(2, 'election 2021iiii', '2021-08-29', '2021-08-07', '2021-08-20', 'inactive');

-- --------------------------------------------------------

--
-- Structure de la table `equipe_pedagogique`
--

DROP TABLE IF EXISTS `equipe_pedagogique`;
CREATE TABLE IF NOT EXISTS `equipe_pedagogique` (
  `id_equipe` int(20) NOT NULL AUTO_INCREMENT,
  `intitule_equipe` varchar(50) NOT NULL,
  `coorModule` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_equipe`),
  KEY `coorModule` (`coorModule`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipe_pedagogique`
--

INSERT INTO `equipe_pedagogique` (`id_equipe`, `intitule_equipe`, `coorModule`) VALUES
(1, 'EQUIPE1', 1),
(5, 'EQUIPE2', 8),
(6, 'EQUIPE3', 9);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int(20) NOT NULL AUTO_INCREMENT,
  `intitule_filiere` varchar(50) NOT NULL,
  `Langue` varchar(50) DEFAULT NULL,
  `objectifs` longtext,
  `competences` longtext,
  `debouches` longtext,
  `conditions_acces` longtext,
  `listeDesModules` longtext,
  `moyens_logistiques` longtext,
  `partenariats_cooperation` longtext,
  `pfe` longtext,
  `stage` longtext,
  `coorFiliere` int(20) DEFAULT NULL,
  `id_cycle` int(20) NOT NULL,
  `id_departement` int(20) NOT NULL,
  `volumeHoraireGlobal` int(11) DEFAULT NULL,
  `isAccredited` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_filiere`),
  KEY `coorFiliere` (`coorFiliere`),
  KEY `id_cycle` (`id_cycle`),
  KEY `id_departement` (`id_departement`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `intitule_filiere`, `Langue`, `objectifs`, `competences`, `debouches`, `conditions_acces`, `listeDesModules`, `moyens_logistiques`, `partenariats_cooperation`, `pfe`, `stage`, `coorFiliere`, `id_cycle`, `id_departement`, `volumeHoraireGlobal`, `isAccredited`) VALUES
(24, 'Licence d\'etude fondamental sciences economiques e', 'Francais', 'blablablablablablabla', 'blablablablabla', 'blablablablablablablabla', 'blablablablablablabla', 'blablablablablablabla', 'blablablablablablablabla', 'blablablablablablabla', 'blablablablablablablbla', 'blablablablablablabla', 8, 1, 1, 1710, 1),
(27, 'Droit en langue francais', '', '', '', '', '', '', '', '', '', '', NULL, 1, 1, 0, 1),
(31, 'AUDIT ET CONTROLE DE GESTION ET SYSTEME D\'INFORMAT', '', '', '', '', '', '', '', '', '', '', NULL, 2, 1, 0, 1),
(32, 'AUDIT ET CONTROLE DE GESTION ET SYSTEME D\'INFORMAT', '', '', '', '', '', '', '', '', '', '', NULL, 2, 1, 0, 1),
(33, 'AUDIT ET CONTROLE DE GESTION ET SYSTEME D\'INFORMAT', '', '', '', '', '', '', '', '', '', '', NULL, 2, 1, 0, 1),
(34, 'ECONOMIE ET EVALUATION DES POLITIQUES PUBLIQUES (E', '', 'Ce Master a pour objectif principal d’accompagner la demande sociale croissante visant la systématisation, l’ancrage et la\r\npromotion des politiques publiques fondées sur les preuves (Evidence based public policy), d’autant que la constitution de 2011\r\na gravé dans son marbre le principe d’évaluation des politiques publiques et bien d’autres règles de bonne gestion de la chose\r\npublique. Dans cette perspective, il vise à renforcer et professionnaliser le rôle de l’économiste dans les travaux d’évaluation\r\ndes politiques publiques. Sans s’y réduire, il vise notamment à faire acquérir aux étudiants l’expertise, les techniques et outils\r\nmodernes d’évaluation des politiques publiques, en phase avec les meilleures pratiques internationales en la matière.', '', 'Former des cadres capables d’assister les\r\nordonnateurs et les donneurs d’ordre dans le\r\npilotage des projets d’évaluation des projets\r\net politiques publics\r\nformer des cadres capables de participer\r\net/ou de conduire une mission d’évaluation\r\ndes projets et politiques publics', 'DIPLOMES REQUIS : Licence en Sciences Economiques et\r\ndiplômes équivalents ;\r\nPRE-REQUIS PEDAGOGIQUES SPECIFIQUES :\r\nMicroéconomie de base, Macro-économie, statistiques et\r\nprobabilités, Econométrie de base, politiques\r\néconomiques ;\r\nPROCEDURE DE SELECTION EN 3 ETAPES :\r\n1- Présélection sur étude des dossiers / 2- Test écrit / 3-\r\nEntretien.\r\n', '', '', '', 'pfe', 'stage', 13, 2, 1, 0, 1),
(35, 'Actuariat et finance', '', '', '', '', '', '', '', '', '', '', NULL, 2, 1, 0, 1),
(36, 'Droit en langue francais', '', '', '', '', '', '', '', '', '', '', NULL, 2, 1, 0, 0),
(37, '', '', '', '', '', '', '', '', '', '', '', 5, 1, 1, 0, 1),
(38, 'miage', 'francais', 'cette formation permet de bien ', 'Maitrise des méthodes et des technologies de développement informatique \r\nAnalyse, conception et gestion des Systèmes d’Information (SI) \r\nGestion et administration de bases de données \r\nCompétences en gestion de l’entreprise selon une approche informatique \r\nInitiation aux outils d’aide à la décision informatisée \r\nExploration des environnements Big Data \r\nConnaissance en sciences sociales et communications professionnelles ', 'Analyste et Concepteur de systèmes d’information ;\r\nConcepteur des Systèmes d’information Décisionnels ;\r\nChef de Projet junior en développement ;\r\nAdministrateur de systèmes de Bases de Données ;\r\nGestionnaire et développeur de projets informatiques ;\r\nConsultant junior en système d’information ;\r\nConsultant ERP ;\r\nManager d’entreprise dans les domaines informatiques', 'L’inscription en Licence Professionnelle est ouverte aux titulaires d’un Bac +2 (DUT ou DEUG) , diplôme Technicien Spécialisé OFPPT validé, ou équivalent.\r\n\r\nAvec étude de dossier au cas par cas selon la réglementation en vigueur et l\'autorisation du ministère de tutelle.\r\nEtude de dossier par la commission d\'orientation, de ce fait il faut :\r\n\r\nRemplir le dossier de candidature : \r\nRejoindre le dossier de candidature des bulletins 1ère et 2ème Bac (Terminale) et les Relevés des années universitaires disponibles, documents à scanner et envoyer à l’adresse ', 'Développement des applications\r\nGestion de l’entreprise\r\nSystèmes d’informations\r\nAlgorithmique et Statistiques\r\nConception et gestion des bases de données\r\nProgrammation Orientée Objet (Java)\r\nManagement de projet\r\nDroit de l’informatique\r\nCommunication et sciences sociales\r\nStage professionnel', 'test', 'UniversitÃ© de Versailles', 'pppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp', 'stage de fin d\'etude', 2, 1, 1, 105, 0),
(39, 'TEST', NULL, 'gujh', 'guk', 'gkujbuj', 'bkujb', NULL, NULL, NULL, 'kbjbj', 'vhjh', 11, 1, 1, NULL, 0),
(40, 'MANAGEMENT DES ENTREPRISES ET GESTION DE PROJETS', NULL, '', '', '', '', NULL, NULL, NULL, '', '', 1, 2, 1, NULL, 0),
(41, 'naknkefrefef', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, 2, 1, NULL, 0),
(42, 'sdgrth', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, 1, 1, NULL, 0),
(43, 'Ffffff', NULL, '', '', '', '', NULL, NULL, NULL, '', '', 1, 2, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `liste_modules`
--

DROP TABLE IF EXISTS `liste_modules`;
CREATE TABLE IF NOT EXISTS `liste_modules` (
  `id_filiere` int(20) NOT NULL,
  `id_module` int(20) NOT NULL,
  `prof_cours` int(20) DEFAULT NULL,
  `prof_TD` int(20) DEFAULT NULL,
  `prof_TP` int(20) DEFAULT NULL,
  `semestre` varchar(20) NOT NULL,
  `NatureModule` varchar(30) NOT NULL,
  `volumeHoraire` int(11) NOT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_filiere`,`id_module`),
  KEY `id_prof` (`prof_cours`),
  KEY `id_module` (`id_module`),
  KEY `prof_TD` (`prof_TD`,`prof_TP`),
  KEY `prof_TP` (`prof_TP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liste_modules`
--

INSERT INTO `liste_modules` (`id_filiere`, `id_module`, `prof_cours`, `prof_TD`, `prof_TP`, `semestre`, `NatureModule`, `volumeHoraire`, `DateCreation`) VALUES
(24, 31, 2, NULL, NULL, 'Semestre 1', '', 0, '2021-08-16 13:54:50'),
(24, 40, 8, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-16 13:54:50'),
(24, 50, 1, NULL, NULL, 'Semestre 5', 'Majeur', 24, '2021-08-22 12:02:17'),
(27, 31, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 45, '2021-08-16 13:54:50'),
(27, 41, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-16 13:54:50'),
(34, 33, 2, NULL, NULL, 'Semestre 1', '', 0, '2021-08-16 13:54:50'),
(35, 31, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-18 15:28:42'),
(35, 48, 11, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-18 13:08:37'),
(35, 50, 11, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-18 13:09:08'),
(35, 51, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-18 13:09:27'),
(35, 52, 1, NULL, NULL, 'Semestre 1', 'Complementaire', 45, '2021-08-18 13:09:57'),
(35, 53, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-18 13:10:27'),
(35, 57, NULL, NULL, NULL, 'Semestre 2', 'Majeur', 50, '2021-08-18 15:47:45'),
(35, 58, NULL, NULL, NULL, 'Semestre 3', 'Majeur', 50, '2021-08-18 16:12:12'),
(36, 31, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 45, '2021-08-19 15:47:12'),
(38, 49, NULL, NULL, NULL, 'Semestre 5', 'Majeur', 24, '2021-08-22 11:20:25'),
(38, 61, 5, 5, 5, 'Semestre 5', 'supplémentaire', 50, '2021-08-24 17:48:58'),
(38, 62, 18, 8, 11, 'Semestre 5', 'majeurs', 50, '2021-08-24 17:48:58'),
(38, 63, 5, 5, 5, 'Semestre 5', 'majours', 50, '2021-08-24 17:49:57'),
(38, 64, 1, 12, NULL, 'Semestre 5', 'supplémentaire', 50, '2021-08-24 17:53:09'),
(38, 66, 9, 13, NULL, 'Semestre 6', 'majours', 50, '2021-08-24 17:45:56'),
(38, 67, 9, 9, 9, 'Semestre 6', 'supplémentaire', 50, '2021-08-24 17:50:28'),
(38, 68, 15, NULL, NULL, 'Semestre 6', 'majours', 50, '2021-08-24 17:54:15'),
(38, 69, NULL, NULL, NULL, 'Semestre 6', 'majours', 50, '2021-08-24 17:53:09'),
(41, 31, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-29 23:05:36'),
(41, 32, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-29 23:06:56'),
(41, 40, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-29 23:07:22'),
(41, 42, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-29 23:07:40'),
(41, 49, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-29 23:07:54'),
(41, 51, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-29 23:08:08'),
(41, 54, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-29 23:08:29'),
(43, 31, NULL, NULL, NULL, 'Semestre 1', 'Majeur', 50, '2021-08-30 18:24:58');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(20) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(20) NOT NULL,
  `outgoing_msg_id` int(20) NOT NULL,
  `msg` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `date_msg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `date_msg`, `status`) VALUES
(9, 1, 8, 'salut', '2021-08-21 22:22:44', 0),
(10, 8, 1, 'slm cv', '2021-08-21 23:11:03', 0),
(11, 1, 8, 'cv hmd ', '2021-08-22 00:03:58', 0),
(12, 1, 8, 'et toi ?', '2021-08-22 00:04:02', 0),
(13, 8, 1, 'aussi hmd', '2021-08-22 00:04:31', 0),
(14, 8, 1, 'bonjour monsieur ahmed ', '2021-08-22 23:42:00', 0),
(15, 12, 11, 'bonsoir', '2021-08-24 19:22:50', 0),
(16, 1, 11, 'hi ahmed', '2021-08-28 22:04:46', 0),
(17, 11, 1, 'hi cv ?', '2021-08-28 23:41:30', 0),
(18, 1, 11, 'cv hmd', '2021-08-29 07:38:12', 0),
(19, 1, 11, 'toi ?', '2021-08-29 07:38:16', 0),
(20, 17, 2, 'nnnn', '2021-08-29 13:30:50', 1),
(21, 16, 11, 'salut', '2021-08-29 14:09:47', 1);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(20) NOT NULL AUTO_INCREMENT,
  `intitule_module` varchar(50) NOT NULL,
  `PreRequis_pedagogiques` text NOT NULL,
  `Langue` varchar(50) NOT NULL,
  `ModeEnseignement` varchar(30) NOT NULL,
  `ModeEvaluation` varchar(255) NOT NULL,
  `Coefficient` double NOT NULL,
  `Competence` text NOT NULL,
  `Objectifs` text NOT NULL,
  `mobilite` varchar(30) NOT NULL,
  `alternance` varchar(30) NOT NULL,
  `Coord_module` int(20) DEFAULT NULL,
  `coord_etablissement` varchar(50) DEFAULT NULL,
  `equipe_pedagogique` int(20) DEFAULT NULL,
  `id_departement` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_module`),
  KEY `Coord_module` (`Coord_module`),
  KEY `equipe_pedagogique` (`equipe_pedagogique`),
  KEY `id_departement` (`id_departement`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `intitule_module`, `PreRequis_pedagogiques`, `Langue`, `ModeEnseignement`, `ModeEvaluation`, `Coefficient`, `Competence`, `Objectifs`, `mobilite`, `alternance`, `Coord_module`, `coord_etablissement`, `equipe_pedagogique`, `id_departement`) VALUES
(31, 'INTRODUCTION A L ECONOMIE', 'étudiants ayant un bac scientifique et manifestant un intérêt pour les sciences économiques.', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablablablablablabla', 'Ce cours a pour objectif de fournir aux étudiants, de formation de base différente en économie, une boîte à outils pour répondre aux questions économiques. L’introduction à l’économie leur permettra ainsi de s’initier avec les instruments de base du raisonnement économique : l’offre, la demande, le mécanisme des prix, l’équilibre, l’optimum, etc. Ce cours a également pour objectif de familiariser les étudiants avec les principaux auteurs et courants de pensée qui, au cours des deux derniers siècles, ont exercé une influence déterminante sur la formation de la science économique.', '0', '0', 1, 'blablablablabl', 1, 1),
(32, 'MICROECONOMIE (I)', 'blablablablablablabla', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablablablablablabla', 'L’objectif de ce module est de donner à l’étudiant les outils d’analyse économique qui lui permettent de comprendre le comportement des acteurs économiques dans un cadre de la concurrence pure et parfaite.', '0', '0', 5, 'blablablablabl', 1, 1),
(33, 'COMPTABILITE GENERALE (I)', 'Eudiants ayant un baccalauréat scientifique et manifestant un intérêt pour les sciences économiques et les sciences de gestion.', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablablablabla', 'Faire acquérir aux étudiants les notions de base de la comptabilité se rapportant au bilan, au compte de produits et de charges ; maîtriser le processus d’enregistrement des opérations courantes de l’entreprise depuis la facture jusqu’à l’établissement des états de synthèse (bilan, cpc..).', '0', '0', 9, 'blablablabla', 5, 1),
(40, 'Finance d’Entreprise', 'xvxcvx', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'vzdv', 'Sfasf', 'Non', 'Non', NULL, NULL, NULL, 1),
(41, 'M1', 'M', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'M', 'M', 'Non', 'Non', NULL, NULL, NULL, 1),
(42, 'Modèles de croissance économique', 'blablabl', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablabla', 'blablabla', 'Non', 'Non', NULL, NULL, NULL, 1),
(43, 'Modèles de croissance économique', 'blablabl', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablabla', 'blablabla', 'Non', 'Non', NULL, NULL, NULL, 1),
(44, 'Modèles de croissance économique', 'blablabl', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablabla', 'blablabla', 'Non', 'Non', NULL, NULL, NULL, 1),
(45, 'Modèles de croissance économique', 'blablabl', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablabla', 'blablabla', 'Non', 'Non', NULL, NULL, NULL, 1),
(46, 'Modèles de croissance économique', 'blablabl', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablabla', 'blablabla', 'Non', 'Non', NULL, NULL, NULL, 1),
(47, 'Modèles de croissance économique', 'blablabl', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'blablabla', 'blablabla', 'Non', 'Non', NULL, NULL, NULL, 1),
(48, 'poo', 'sdvsd', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'sdvsd', 'wfw', 'Non', 'Non', NULL, NULL, NULL, 1),
(49, 'poo', 'cxv', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'xcf', 'saadsfg', 'Non', 'Non', NULL, NULL, NULL, 1),
(50, 'blabla', 'cvb n', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'gnm', 'sdfghj', 'Non', 'Non', NULL, NULL, NULL, 1),
(51, 'sdfcgvbhnfdg', 'vbn f', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'vbn asdf', 'xdcfvbn', 'Non', 'Non', NULL, NULL, NULL, 1),
(52, 'xdcfvbn as', 'cHAkjsmd', 'Francais', 'Presentiel', 'Contrôles continus :', 1, 'cfghjknamsd', 'tuiokl,w vabnm m', 'Non', 'Non', NULL, NULL, NULL, 1),
(53, 'tfyguoi;owas', 'M AA', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'gvbhNQW', 'BHSDNFNJVKASNGM', 'Non', 'Non', NULL, NULL, NULL, 1),
(54, 'DJDVD', 'DNM,DV', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'NXMVDNXD', 'Z DSVNMSDS', 'Non', 'Non', NULL, NULL, NULL, 1),
(55, 'sMEFJRG', 'NMMD', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'KENFMSD', 'MNW', 'Non', 'Non', NULL, NULL, NULL, 1),
(56, 'mmmm', 'erf', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'ferff', 'qsdwef', 'Non', 'Non', NULL, NULL, NULL, 1),
(57, 'qfeqgqnju', 'ehwh', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'gbeyh', 'fgwrth5wn6', 'Non', 'Non', NULL, NULL, NULL, 1),
(58, 'm,dncsmdc', ',smdnc', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'md c,mdc,m', 'dmncsdn', 'Non', 'Non', 9, NULL, 5, 1),
(59, 'm,dncsmdc', ',smdnc', 'Francais', 'Presentiel', 'Examen final de fin de semestre', 1, 'md c,mdc,m', 'dmncsdn', 'Non', 'Non', 9, NULL, 5, 1),
(60, 'poo', 'programmation en php', 'français', 'presentiel', 'exam final', 0.5, 'maitrisé l\'orienté objet', 'aaa', '1', '0', 2, 'fsjes ain sebaa', 1, NULL),
(61, 'comptabilité generale ', 'des connaissances en économie', 'français', 'presentiel', 'exam final', 0.5, 'technique comptable', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 1, NULL),
(62, 'recherche operationnelle', 'mathematique', 'francais', 'presentiel', 'exam final', 0.5, 'mathematique', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 1, NULL),
(63, 'Réseau', 'routage adressage IPV4  ', '', 'presentiel', 'exam final', 0.5, 'réseau', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 1, NULL),
(64, 'Management des Projets', 'gestion de projet communication anglais ', 'francais et anglais', 'presentiel', 'exam final', 0.5, 'chef de projets', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 1, NULL),
(65, 'Technique de développement', 'connissance en html css javascript php ', 'français', 'presentiel', 'exam final', 0.5, 'développer des application web', 'aaa', '1', '0', 2, 'fsjes ain sebaa', 1, NULL),
(66, 'Base des données Avancées', 'sql oracle', 'francais', 'presentiel', 'exam final', 0.5, 'systeme d\'information', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 5, NULL),
(67, 'gestion financiere', 'analyse financière comptabilité', 'français', 'presentiel', 'exam final', 0.5, 'analyse financière et budgétaire', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 5, NULL),
(68, 'systeme d\'information', 'conception des systeme d\'information', 'francais', 'presentiel', 'exam final', 0.5, 'modelisation uml', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 5, NULL),
(69, 'pfe/stage', 'pfe', 'français', 'presentiel', 'exam final', 0.5, 'pfe', 'aaa', '1', '0', 5, 'fsjes ain sebaa', 5, NULL),
(70, 'Comptabilité général I', 'comptabilité', 'français', 'presentiel', 'exam final', 0.5, 'comptbilité', 'aaa', '0', '1', 2, 'fsjes ain sebaa', 6, NULL),
(71, 'droit social', 'droit', 'français', 'presentiel', 'exam final', 0.5, 'droit', 'aaa', '0', '0', 11, 'fsjes ain sebaa', 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notif` int(20) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date_notif` date NOT NULL,
  `id_admin` int(20) NOT NULL,
  `id_prof` int(20) NOT NULL,
  PRIMARY KEY (`id_notif`),
  KEY `id_admin` (`id_admin`,`id_prof`),
  KEY `id_prof` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` varchar(255) NOT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Statut` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`Id`, `Content`, `DateCreation`, `Statut`) VALUES
(1, 'une cérémonie de remise de diplôme va être le 10/07/2021', '2021-08-09 19:58:07', 0),
(3, 'La rentrée universitaire 2021-2022 débutera la mi-septembre ', '2021-08-09 20:01:29', 0);

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `id_poste` int(11) NOT NULL AUTO_INCREMENT,
  `nom_poste` varchar(100) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `id_election` int(11) NOT NULL,
  `condition_poste` longtext,
  `id_departement` int(11) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `condition_grade` varchar(255) DEFAULT NULL,
  `condition_specialite` varchar(255) DEFAULT NULL,
  `condition_type_prof` varchar(255) DEFAULT NULL,
  `condition_anciennete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_poste`),
  UNIQUE KEY `id_departement` (`id_departement`) USING BTREE,
  UNIQUE KEY `id_filiere` (`id_filiere`) USING BTREE,
  KEY `id_election` (`id_election`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `nom_poste`, `max_vote`, `description`, `id_election`, `condition_poste`, `id_departement`, `id_filiere`, `condition_grade`, `condition_specialite`, `condition_type_prof`, `condition_anciennete`) VALUES
(27, 'Chef de departement', 6, 'participer', 1, 'bbbbbbbbbbbb', 2, NULL, 'A B C D', 'informatique , économie et gestion ', 'professeurs de l\'enseignement supérieur', 6),
(33, 'Coordinateur', 1, 'zzzzzzzzzzzzz', 1, 'aaaaaaaaaaaaaaaa', NULL, 32, 'A', 'droit', 'professeurs de l\'enseignement supérieur', 2),
(34, 'Coordinateur', 1, 'aaaaaaa', 1, 'szzzzzzzzzzz', NULL, 34, 'A', 'mathématique', 'professeurs de l\'enseignement supérieur', 3),
(35, 'Coordinateur', 1, 'eeeeeeeee', 1, 'zzzzzzz', NULL, 24, 'A', 'informatique', 'professeurs de l\'enseignement supérieur', 3),
(36, 'Coordinateur', 1, 'vvcvcvcvcvv', 1, 'jssajkkk,k,', NULL, 35, 'A', 'informatique', 'professeur assistant', 4),
(43, 'Coordinateur', 1, 'aaaa', 1, NULL, NULL, 31, 'B,C,D,', 'economie et gestion', NULL, 2),
(44, 'Coordinateur', 1, 'dddd', 1, NULL, NULL, 27, 'A,B,C,D,', 'droit arabe', 'professeurs de l\'enseignement supérieur,professeur habilité', 2),
(50, 'Chef de departement', 1, 'aaabbbbbb', 1, '', 1, NULL, 'A,B,C,D,', 'economie et gestion', 'professeur enseignement supérieur,professeur assistant,professeur habilité,professeur non permanent,', 2),
(51, 'Coordinateur', 1, 'rien', 1, NULL, NULL, 36, 'A,B,C,', 'economie et gestion', 'professeur de l\'enseignement supérieur,professeur assistant,professeur habilité,', 4);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id_prof` int(20) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) NOT NULL,
  `nomPrenom_prof` varchar(50) NOT NULL,
  `CIN_prof` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `isCoordFiliere` tinyint(1) NOT NULL DEFAULT '0',
  `isChefDepartement` tinyint(1) NOT NULL DEFAULT '0',
  `isCoordModule` tinyint(1) NOT NULL DEFAULT '0',
  `specialite` varchar(50) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `anciennete` int(20) NOT NULL,
  `type_prof` varchar(50) NOT NULL,
  `Etablissement` varchar(50) NOT NULL DEFAULT 'FSJES AIN SEBAA',
  `id_equipe` int(20) DEFAULT NULL,
  `cv_prof` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `tele` int(11) NOT NULL,
  PRIMARY KEY (`id_prof`),
  KEY `id_equipe` (`id_equipe`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_prof`, `Image`, `nomPrenom_prof`, `CIN_prof`, `Age`, `email`, `mdp`, `isCoordFiliere`, `isChefDepartement`, `isCoordModule`, `specialite`, `grade`, `anciennete`, `type_prof`, `Etablissement`, `id_equipe`, `cv_prof`, `status`, `ville`, `tele`) VALUES
(1, 'profile2.jpg', 'Eddaoui Ahmed', 'HH8976', 0, 'ahmededdaoui@gmail.com', '$2y$10$2ANXo.j2ea7akGdDJytcL.Khu3HPGy/c2B3hVB.gnQR7NP86lcoVS', 0, 0, 0, 'informatique', 'A', 8, 'professeurs de l\'enseignement supérieur', 'fsjes ain sebaa', 1, '', 'en ligne', 'Mohammedia', 0),
(2, 'talha.jpg', 'Gmira Faiq', 'RR4567', 0, 'Gmirafaiq@gmail.com', '$2y$10$2ANXo.j2ea7akGdDJytcL.Khu3HPGy/c2B3hVB.gnQR7NP86lcoVS', 1, 0, 0, 'informatique', 'A', 7, 'professeurs de l\'enseignement supérieur', 'fsjes ain sebaa', 6, '', 'en ligne', 'Agadir', 0),
(5, 'femme.jpg', 'Sebar Wafae', 'KL67895', 0, 'maryemtajer@gmail.com', '$2y$10$77anbJ0OtbFVjHUHAClNOuN7GRUbfY/GE48ZRzKQl.cCRdXBFy0Yu', 1, 0, 0, 'gestion de projet', 'A', 10, 'professeur habilité', 'fsjes ain sebaa', 1, '', 'en ligne', 'casablanca', 0),
(8, 'profile.jpg', 'Laguidi Ahmed', 'LL9999', 0, 'nouraconcours123@gmail.com', '$2y$10$jAmmXLzyxWPhCMhDBS6LjOJi3g/f7Vp0Ysl7mREiG8fn7BEAhixTK', 1, 0, 0, 'orienté objets', 'A', 10, 'professeur habilité', 'fsjes ain sebaa', 1, '', 'en ligne', 'Casablanca', 0),
(9, 'user.png', 'Hassouni Laarbi', 'Ml23456', 0, 'hasssounilaarbi', '$2y$10$2ANXo.j2ea7akGdDJytcL.Khu3HPGy/c2B3hVB.gnQR7NP86lcoVS', 0, 0, 0, 'systeme d\'information', 'A', 3, 'professeur assistant', 'fsjes ain sebba', 5, '', 'hors ligne', 'Marrakech', 0),
(11, 'routeur2.PNG', 'Meftah Ibrahim', 'U67895', 44, 'fatimaelkhattar@gmail.com', '$2y$10$vfnJYP1zCAM8qyt2ZTsbq.elYe1uZDdo217bQlEvRLpBLvIdQ.9NO', 0, 0, 0, 'base de donnees', 'B', 10, 'professeur de l\'enseignement supérieur', 'fsjes ain sebaa', 1, '', 'hors ligne', 'Rabat', 0),
(12, 'conf2_router.PNG', 'Akram Insaf', 'aa67898', 45, 'insafAkram@gamil.com', '$2y$10$aEK.4cc.4.5lPvmuE5cvWeoS95WxYMYYJgr5Uy23xEKZgn3Zf8svG', 0, 0, 0, 'programmtion orienté objets', 'A', 4, 'professeur de l\'enseignement supérieur', 'fsjes ain sebaa', 1, 'TP MPM (1).pdf', 'hors ligne', 'Fes', 0),
(13, 'user.png', 'Safi Amina', 'P87654', 50, 'saiamina@gmail.com', '$2y$10$aEK.4cc.4.5lPvmuE5cvWeoS95WxYMYYJgr5Uy23xEKZgn3Zf8svG', 0, 0, 0, 'gestion economique', 'A', 3, 'professeurs de l\'enseignement supérieur', 'fsjes ain sebaa', 5, '', 'hors ligne', 'Rabat', 0),
(14, 'user10.png', 'Amid Farouq', 'U87654', 60, 'farouqamid@gmail.com', '$2y$10$aEK.4cc.4.5lPvmuE5cvWeoS95WxYMYYJgr5Uy23xEKZgn3Zf8svG', 0, 0, 0, 'économie', 'B', 6, 'professeurs de l\'enseignement supérieur', 'fsjes ain sebaa', 1, '', 'en ligne', 'Bni Mellal', 0),
(15, 'user6.jpg', 'Fettah Fettah', 'A23456', 51, 'fettah66@gmail.com', '$2y$10$aEK.4cc.4.5lPvmuE5cvWeoS95WxYMYYJgr5Uy23xEKZgn3Zf8svG', 0, 0, 0, 'économie', 'A', 3, 'professeurs de l\'enseignement supérieur', 'fsjes ain sebaa', 5, '', 'hors ligne', 'Agadir', 0),
(16, 'user.png', 'Nacer Kebbaj', 'F543678', 60, 'nacerkebbaj@gmail.com', '$2y$10$aEK.4cc.4.5lPvmuE5cvWeoS95WxYMYYJgr5Uy23xEKZgn3Zf8svG', 0, 0, 0, 'économie', 'B', 4, 'professeurs de l\'enseignement supérieur', 'fsjes ain sebaa', 6, '', 'en ligne', 'Rabat', 0),
(17, 'femme.jpg', 'RAFIE Hafssa', 'A3456', 38, 'hafssarafie38@gmail.com', '$2y$10$2ANXo.j2ea7akGdDJytcL.Khu3HPGy/c2B3hVB.gnQR7NP86lcoVS', 0, 0, 0, 'Gestion financière', 'A', 6, 'professeurs de l\'enseignement supérieur', 'fsjes ain sebaa', 5, '', 'hors ligne', 'OUARZAZAT', 0),
(18, 'pdp.PNG', 'ndkan', 'dkkslf4', 45, 'scsmndfn@dnc', '$2y$10$T35.BIXdlGx4awkhr3HZ6uHfxAYh5c7aUgEQ5Df7XBjylzOKzeNOe', 0, 0, 0, 'dkfjdf', 'A', 8, 'professeur de l\'enseignement supérieur', 'fsjes ain sebaa', 1, 'cv elhamine elmehdi.pdf', NULL, NULL, 0),
(21, 'python.jpg', 'ELMEHDI ELHAMINE', 'BH627984', 45, 'elmehdi99elhamine@gmail.com', '$2y$10$DADWcZUalzKVF76jlmOAT.mb1TR/0E/14lwRj7SaiPKQ1o1ver6dG', 0, 0, 0, 'kj', 'A', 7, 'professeur de l\'enseignement supérieur', 'fsjes ain sebaa', 1, 'cv_elhamine_elmehdi.pdf', 'hors ligne', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reset_psswd_tempe`
--

DROP TABLE IF EXISTS `reset_psswd_tempe`;
CREATE TABLE IF NOT EXISTS `reset_psswd_tempe` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reset_psswd_tempe`
--

INSERT INTO `reset_psswd_tempe` (`email`, `cle`, `expDate`) VALUES
('elmehdi99elhamine@gmail.com', '78c25ae0e446af7f26a35850d450f992549597c330', '2021-08-30'),
('elmehdi99elhamine@gmail.com', '630eaf44ecd561b53f1425460b65018fa2ad383916', '2021-08-30'),
('laguidiahmed@gmail.com', '865838df74e33e635b326a15a20555c155b03dee85', '2021-08-30'),
('elmehdi99elhamine@gmail.com', '2b07dfe53f8ecf1d76dfe359792835ec3a83f60e1b', '2021-08-30'),
('dkonfs123@gmail.com', '04b3de158ef96bfdf7a62b3c0b4c4b0395d4218ed5', '2021-08-30'),
('elmehdi99elhamine@gmail.com', 'b21d79bd63b5474a323191f8c61c0e00a76fe5eb33', '2021-08-30'),
('elmehdi99elhamine@gmail.com', 'ea5454b9b9791faf53b715e5eb97f404890ffee7f0', '2021-08-30'),
('elmehdi99elhamine@gmail.com', '754cd03dfb98181ea02157f08365ef8234a0c73bf7', '2021-08-30'),
('dkonfs123@gmail.com', 'dd8b12174ea92b2a75a17af0bc88d2bdc394dadca0', '2021-08-30'),
('fatimaelkhattar@gmail.com', '4f97e846c75fe4af1c2c38a255f7c14620abfc9fb6', '2021-08-30'),
('elmehdi99elhamine@gmail.com', '2e10ad8adca98b31b071a11e46119553935f1ffef9', '2021-08-30'),
('elmehdi99elhamine@gmail.com', '8ccdbc7fad7774ac4dd0deca477fa8f448c5ee18be', '2021-08-30'),
('dkonfs123@gmail.com', '6357a96c5769f7cbfc909f919c3fbe5bdb15afa7e5', '2021-08-30'),
('maryemtajer@gmail.com', 'a18292adcada6828d8845ce9fc2b68e2c5dce970c9', '2021-08-30'),
('maryemtajer@gmail.com', 'a26fec291bde1e68c2ed790ffa4d11deef5b1a38e6', '2021-08-30'),
('nouraconcours123@gmail.com', 'd2a9ec15433717f9e063938d12e2bd3ead4d8f8540', '2021-08-30'),
('nouraconcours123@gmail.com', '300069d8cf012a14ef8b51d66aa4bf4ad7747d1a87', '2021-08-30'),
('elmehdi99elhamine@gmail.com', '397b8271973e535fb3afd135e4d2bd57adb9cfc50b', '2021-08-30');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id_vote` int(11) NOT NULL AUTO_INCREMENT,
  `id_voters` int(11) NOT NULL,
  `id_candidat` int(11) NOT NULL,
  PRIMARY KEY (`id_vote`),
  KEY `id_candidat` (`id_candidat`),
  KEY `id_voters` (`id_voters`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id_vote`, `id_voters`, `id_candidat`) VALUES
(3, 15, 132),
(18, 9, 132),
(23, 12, 135),
(35, 2, 145),
(36, 5, 145),
(37, 5, 146),
(38, 9, 144),
(39, 11, 132),
(40, 2, 132),
(41, 2, 147),
(42, 5, 143),
(43, 8, 143);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `candidats_ibfk_1` FOREIGN KEY (`professeur`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidats_ibfk_2` FOREIGN KEY (`poste`) REFERENCES `poste` (`id_poste`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`chefDepartement`) REFERENCES `professeur` (`id_prof`);

--
-- Contraintes pour la table `equipe_pedagogique`
--
ALTER TABLE `equipe_pedagogique`
  ADD CONSTRAINT `equipe_pedagogique_ibfk_1` FOREIGN KEY (`coorModule`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `filiere_ibfk_1` FOREIGN KEY (`id_cycle`) REFERENCES `cycle` (`id_cycle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filiere_ibfk_2` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_dprtm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filiere_ibfk_3` FOREIGN KEY (`coorFiliere`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `liste_modules`
--
ALTER TABLE `liste_modules`
  ADD CONSTRAINT `liste_modules_ibfk_1` FOREIGN KEY (`prof_cours`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liste_modules_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liste_modules_ibfk_3` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liste_modules_ibfk_4` FOREIGN KEY (`prof_TD`) REFERENCES `professeur` (`id_prof`),
  ADD CONSTRAINT `liste_modules_ibfk_5` FOREIGN KEY (`prof_TP`) REFERENCES `professeur` (`id_prof`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`Coord_module`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_ibfk_2` FOREIGN KEY (`equipe_pedagogique`) REFERENCES `equipe_pedagogique` (`id_equipe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_ibfk_3` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_dprtm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `administrateur` (`id_admin`);

--
-- Contraintes pour la table `poste`
--
ALTER TABLE `poste`
  ADD CONSTRAINT `poste_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `poste_ibfk_2` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_dprtm`),
  ADD CONSTRAINT `poste_ibfk_3` FOREIGN KEY (`id_election`) REFERENCES `election` (`id_election`);

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe_pedagogique` (`id_equipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`id_voters`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
