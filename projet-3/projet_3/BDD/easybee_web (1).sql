-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 avr. 2025 à 21:24
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `easybee_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `detailsformation`
--

DROP TABLE IF EXISTS `detailsformation`;
CREATE TABLE IF NOT EXISTS `detailsformation` (
  `idFormation` int NOT NULL,
  `idModalitesFormation` int NOT NULL,
  `idPrerequisFormation` int NOT NULL,
  `idEquipementsNecessaires` int NOT NULL,
  PRIMARY KEY (`idFormation`,`idModalitesFormation`,`idPrerequisFormation`,`idEquipementsNecessaires`),
  KEY `idModalitesFormation` (`idModalitesFormation`),
  KEY `idPrerequisFormation` (`idPrerequisFormation`),
  KEY `idEquipementsNecessaires` (`idEquipementsNecessaires`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `equipementformation`
--

DROP TABLE IF EXISTS `equipementformation`;
CREATE TABLE IF NOT EXISTS `equipementformation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelleEquipement` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `equipementformation`
--

INSERT INTO `equipementformation` (`id`, `libelleEquipement`) VALUES
(1, '1 Jean à toile forte (non élastique - leggings et pantalons noir proscrits)'),
(2, '1 paire de chaussures de marche'),
(3, '1 chandail (fraîcheur des fins de journées)');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomFormateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `prenomFormateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `mailFormateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `telFormateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomFormation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `descriptionFormation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `dateHeureDebutFormation` datetime NOT NULL,
  `dateHeureFinFormation` datetime NOT NULL,
  `prixTTC` double NOT NULL,
  `nbrParticipants` int NOT NULL,
  `placesDispo` int NOT NULL,
  `idThemeFormation` int NOT NULL,
  `idNiveauFormation` int NOT NULL,
  `idLieuFormation` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idThemeFormation` (`idThemeFormation`),
  KEY `idNiveauFormation` (`idNiveauFormation`),
  KEY `idLieuFormation` (`idLieuFormation`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `nomFormation`, `descriptionFormation`, `dateHeureDebutFormation`, `dateHeureFinFormation`, `prixTTC`, `nbrParticipants`, `placesDispo`, `idThemeFormation`, `idNiveauFormation`, `idLieuFormation`) VALUES
(6, 'INTRODUCTION A L\'APICULTURE', 'Découvrez les bases de l’apiculture : types de ruches, équipement nécessaire, réglementation et premières étapes pour installer un rucher.', '2025-03-14 15:23:33', '2025-03-14 15:23:33', 25, 30, 21, 1, 1, 1),
(7, 'CYCLE DE VIE DES ABEILLES', 'Apprenez à reconnaître les différentes castes d’abeilles, leur rôle au sein de la ruche et l’importance de la reine pour la colonie.', '2025-03-15 16:24:34', '2025-03-15 16:24:34', 25, 30, 13, 1, 1, 1),
(8, 'MALADIES ET PARASITES', 'Identifiez les principales maladies et parasites (varroa, loque, etc.), et apprenez à les prévenir et les traiter efficacement.', '2025-03-16 16:25:28', '2025-03-16 16:25:28', 30, 20, 9, 1, 2, 1),
(9, 'ÉLEVAGE DE REINES', 'Maîtrisez les techniques d’élevage de reines pour améliorer la génétique de votre rucher et garantir la pérennité de vos colonies.', '2025-03-17 16:26:32', '2025-03-17 16:26:32', 30, 20, 16, 1, 2, 1),
(10, 'RÉCOLTE ET EXTRACTION DU MIEL', 'Apprenez les bonnes pratiques pour récolter le miel sans stress pour les abeilles, extraire proprement et conserver votre production.', '2025-03-17 16:27:03', '2025-03-17 16:27:03', 30, 20, 14, 1, 2, 1),
(11, 'GÉNÉTIQUE DES COLONIES', 'Approfondissez vos connaissances sur la sélection des meilleures colonies pour la production et la résistance aux maladies.', '2025-03-14 15:31:27', '2025-03-14 15:31:27', 35, 15, 7, 1, 3, 1),
(12, 'LES PRODUITS DE LA RUCHE', 'Explorez la diversification des produits apicoles : pollen, propolis, gelée royale et cire d’abeille.', '2025-03-26 16:32:14', '2025-03-26 16:32:14', 35, 15, 12, 1, 3, 1),
(13, 'CONCEPTION D’UN RUCHER ', 'Apprenez à gérer un rucher à grande échelle, optimiser l’organisation et développer un projet apicole rentable.', '2025-03-24 16:33:33', '2025-03-24 16:33:33', 35, 15, 3, 1, 3, 1),
(14, 'APICULTURE BIODYNAMIQUE ET NATURELLE', 'Découvrez une approche alternative et respectueuse des abeilles basée sur des pratiques naturelles et écologiques.\r\n', '2025-03-12 16:34:18', '2025-03-12 16:34:18', 35, 15, 10, 1, 3, 1),
(15, 'RÉCUPÉRATION D\'ABEILLES', 'Développez vos compétences pour capturer des essaims sauvages en toute sécurité et les intégrer dans votre rucher.', '2025-03-28 16:35:17', '2025-03-28 16:35:17', 35, 15, 4, 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `idStagiaire` int NOT NULL,
  `idFormation` int NOT NULL,
  `etatInscription` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `dateInscription` date NOT NULL,
  PRIMARY KEY (`idStagiaire`,`idFormation`),
  KEY `idFormation` (`idFormation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `lieuformation`
--

DROP TABLE IF EXISTS `lieuformation`;
CREATE TABLE IF NOT EXISTS `lieuformation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomLieu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `lieuformation`
--

INSERT INTO `lieuformation` (`id`, `nomLieu`) VALUES
(1, 'Limoges'),
(2, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `modaliteformation`
--

DROP TABLE IF EXISTS `modaliteformation`;
CREATE TABLE IF NOT EXISTS `modaliteformation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelleModalite` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `modaliteformation`
--

INSERT INTO `modaliteformation` (`id`, `libelleModalite`) VALUES
(1, 'sur site'),
(2, 'en distanciel');

-- --------------------------------------------------------

--
-- Structure de la table `niveauformation`
--

DROP TABLE IF EXISTS `niveauformation`;
CREATE TABLE IF NOT EXISTS `niveauformation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelleNiveau` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `niveauformation`
--

INSERT INTO `niveauformation` (`id`, `libelleNiveau`) VALUES
(1, 'débutant'),
(2, 'intermédiaire'),
(3, 'confirmé ');

-- --------------------------------------------------------

--
-- Structure de la table `prerequisformation`
--

DROP TABLE IF EXISTS `prerequisformation`;
CREATE TABLE IF NOT EXISTS `prerequisformation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libellePrerequis` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `prerequisformation`
--

INSERT INTO `prerequisformation` (`id`, `libellePrerequis`) VALUES
(1, 'Connaissance de la lecture du couvain: œufs, larves, couvain operculé'),
(2, 'pratique d\'une saison complète de conduite de rucher (y compris en débutant) est un minimum');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomStagiaire` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `prenomStagiaire` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `mailStagiaire` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `telStagiaire` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `login` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`id`, `nomStagiaire`, `prenomStagiaire`, `mailStagiaire`, `telStagiaire`, `login`, `password`) VALUES
(2, 'Admin', 'Admin', 'admin@admin', '0000000', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `themeformation`
--

DROP TABLE IF EXISTS `themeformation`;
CREATE TABLE IF NOT EXISTS `themeformation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelleTheme` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `themeformation`
--

INSERT INTO `themeformation` (`id`, `libelleTheme`) VALUES
(1, 'propoliculture'),
(2, 'préparation à l\'hivernage'),
(3, 'conduite de rucher'),
(4, 'entretien des ruches'),
(5, 'création d\'essaims artificiels');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detailsformation`
--
ALTER TABLE `detailsformation`
  ADD CONSTRAINT `detailsformation_ibfk_1` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `detailsformation_ibfk_2` FOREIGN KEY (`idModalitesFormation`) REFERENCES `modaliteformation` (`id`),
  ADD CONSTRAINT `detailsformation_ibfk_3` FOREIGN KEY (`idPrerequisFormation`) REFERENCES `prerequisformation` (`id`),
  ADD CONSTRAINT `detailsformation_ibfk_4` FOREIGN KEY (`idEquipementsNecessaires`) REFERENCES `equipementformation` (`id`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`idThemeFormation`) REFERENCES `themeformation` (`id`),
  ADD CONSTRAINT `formation_ibfk_2` FOREIGN KEY (`idNiveauFormation`) REFERENCES `niveauformation` (`id`),
  ADD CONSTRAINT `formation_ibfk_3` FOREIGN KEY (`idLieuFormation`) REFERENCES `lieuformation` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`idStagiaire`) REFERENCES `stagiaire` (`id`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
