-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 28 Mars 2019 à 19:35
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jobportal`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `idCompetences` int(11) NOT NULL,
  `nomCompetence` varchar(255) NOT NULL,
  `fk_idDemandeur` int(11) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`idCompetences`, `nomCompetence`, `fk_idDemandeur`, `etat`) VALUES
(1, 'pianiste', 1, 1),
(2, 'demoliseur', 5, 1),
(3, 'ddd2', 5, 1),
(4, 'guitariste', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

CREATE TABLE `demandeur` (
  `idDemandeur` int(11) NOT NULL,
  `nomDemandeur` varchar(255) NOT NULL,
  `prenomDemandeur` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `adresseDemandeur` varchar(255) NOT NULL,
  `emailDemandeur` varchar(50) NOT NULL,
  `telephoneDemandeur` varchar(255) NOT NULL,
  `genre` varchar(1) NOT NULL,
  `dateNaissance` date NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  `etatCivil` varchar(255) NOT NULL,
  `imageProfile` varchar(255) DEFAULT NULL,
  `pseudo` varchar(10) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `demandeur`
--

INSERT INTO `demandeur` (`idDemandeur`, `nomDemandeur`, `prenomDemandeur`, `titre`, `adresseDemandeur`, `emailDemandeur`, `telephoneDemandeur`, `genre`, `dateNaissance`, `nationalite`, `etatCivil`, `imageProfile`, `pseudo`, `pwd`, `etat`) VALUES
(1, 'Tubongye', 'Roland Beni', 'Ingenieur', 'rubi', 'roland.beni1@gmail.com', '0991551044', 'm', '2019-03-02', 'CONGOLAISE', 'celibataire', 'uploads/demandeur/Tubongye.JPG', 'roben', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(2, 'Tshiokufila', 'Shekinah', 'Ingenieur', 'lubumbashi', 'majorsonshekinah@gmail.com', '+243976250495', 'm', '2019-03-13', 'CONGOLAISE', 'celibataire', NULL, 'shekmak', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(3, 'bbb', 'bbb', 'bbb', 'bbb', 'bbb@bbb.bbb', 'bbb', 'm', '2019-03-19', 'bbb', 'bbb', NULL, 'bbb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(4, 'ccc', 'ccc', 'ccc', 'ccc', 'ccc@ccc.cc', 'ccc', 'm', '2019-03-13', 'ccc', 'ccc', NULL, 'ccc', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(5, 'denvers', 'david', 'designer', 'de la liberty', 'denverdavid@gmail.com', '+256991551044', 'm', '1995-08-03', 'danoise', 'deliver', 'uploads/demandeur/denver.png', 'dave', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1);

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

CREATE TABLE `emplois` (
  `idEmplois` int(11) NOT NULL,
  `fk_idDemandeur` int(11) NOT NULL,
  `nomEntreprise` varchar(255) NOT NULL,
  `posteEmplois` varchar(255) NOT NULL,
  `dateDebutEmplois` year(4) NOT NULL,
  `dateFinEmplois` year(4) DEFAULT NULL,
  `etat` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emplois`
--

INSERT INTO `emplois` (`idEmplois`, `fk_idDemandeur`, `nomEntreprise`, `posteEmplois`, `dateDebutEmplois`, `dateFinEmplois`, `etat`) VALUES
(1, 1, 'pbreakers', 'ceo', 2018, NULL, 1),
(2, 5, 'demolition entreprise', 'chef demolisseur', 2018, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `employeur`
--

CREATE TABLE `employeur` (
  `idEmployeur` int(11) NOT NULL,
  `nomEmployeur` varchar(255) NOT NULL,
  `adresseEmployeur` varchar(255) NOT NULL,
  `emailEmployeur` varchar(255) NOT NULL,
  `telephoneEmployeur` varchar(255) NOT NULL,
  `siteEmployeur` varchar(255) DEFAULT NULL,
  `codePostal` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employeur`
--

INSERT INTO `employeur` (`idEmployeur`, `nomEmployeur`, `adresseEmployeur`, `emailEmployeur`, `telephoneEmployeur`, `siteEmployeur`, `codePostal`, `fax`, `logo`, `pseudo`, `pwd`, `etat`) VALUES
(1, 'pbreakers', 'lubumbashi', 'pbreakers@gmail.com', '+243991551044', 'www.pbreakers.org', '00243', '991-551-044', 'uploads/employeur/pbreakers.png', 'pbreakers', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(7, 'majiyetu', 'lubumbashi', 'majiyetu@gmail.com', '0991551044', 'www.majiyetu.groupe', '00243', '', 'uploads/employeur/majiyetu.png', 'majiyetu', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(8, 'zikalizer', 'lubumbashi', 'zikalizer@gmail.com', '0991888702', 'www.zikalizer.io', '00243', '', NULL, 'zikalizer', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(9, 'aaa', 'aaa', 'aaa@aaa.com', 'aaa', 'aaaaaa.aaa', 'aaaa', 'aaa', NULL, 'aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `nomFormation` varchar(255) NOT NULL,
  `nomInstitution` varchar(255) NOT NULL,
  `dateDebutFormation` year(4) NOT NULL,
  `dateFinFormation` year(4) DEFAULT NULL,
  `diplomeFormation` varchar(255) DEFAULT NULL,
  `resultatFormation` double DEFAULT NULL,
  `descriptionFormation` varchar(255) DEFAULT NULL,
  `fk_idDemandeur` int(11) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `nomFormation`, `nomInstitution`, `dateDebutFormation`, `dateFinFormation`, `diplomeFormation`, `resultatFormation`, `descriptionFormation`, `fk_idDemandeur`, `etat`) VALUES
(1, 'ethical hacking', 'pbreakers', 2018, 2018, 'ethical pentesteur', 85, 'is for security', 1, 1),
(2, 'l\'art de parler en publique', 'pbreakers', 2019, NULL, NULL, NULL, NULL, 1, 1),
(3, 'destruction', 'delaware university', 2018, 2018, 'destruction des batiments', 52, '', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `posteOffre` varchar(255) NOT NULL,
  `dateDebutOffre` date NOT NULL,
  `dateFinOffre` date NOT NULL,
  `fk_idEmployeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `posteOffre`, `dateDebutOffre`, `dateFinOffre`, `fk_idEmployeur`) VALUES
(1, 'comptable', '2019-03-12', '2019-03-19', 1),
(2, 'programmeur sur materiel', '2019-03-22', '2019-03-31', 7),
(3, 'pentesteur', '2019-03-17', '2019-04-17', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offredemande`
--

CREATE TABLE `offredemande` (
  `idoffredemande` int(11) NOT NULL,
  `fk_idOffre` int(11) NOT NULL,
  `fk_idDemandeur` int(11) NOT NULL,
  `dateSoumission` datetime NOT NULL,
  `reponse` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `offredemande`
--

INSERT INTO `offredemande` (`idoffredemande`, `fk_idOffre`, `fk_idDemandeur`, `dateSoumission`, `reponse`) VALUES
(1, 3, 1, '2019-03-23 19:05:03', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

CREATE TABLE `realisation` (
  `idRealisation` int(11) NOT NULL,
  `nomRealisation` varchar(255) NOT NULL,
  `dateRealisation` year(4) NOT NULL,
  `lienRealisation` varchar(255) NOT NULL,
  `descriptionRealisation` varchar(255) NOT NULL,
  `fk_idDemandeur` int(11) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `realisation`
--

INSERT INTO `realisation` (`idRealisation`, `nomRealisation`, `dateRealisation`, `lienRealisation`, `descriptionRealisation`, `fk_idDemandeur`, `etat`) VALUES
(1, 'majiyetu', 2018, 'majiyetu.group', 'j\'ai oublier les descriptions', 1, 1),
(2, 'module de destruction automatique', 2019, 'ddd', '', 5, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`idCompetences`),
  ADD KEY `fk_idDemandeur` (`fk_idDemandeur`);

--
-- Index pour la table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`idDemandeur`),
  ADD UNIQUE KEY `emailDemandeur` (`emailDemandeur`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `emplois`
--
ALTER TABLE `emplois`
  ADD PRIMARY KEY (`idEmplois`),
  ADD KEY `fk_idDemandeur` (`fk_idDemandeur`);

--
-- Index pour la table `employeur`
--
ALTER TABLE `employeur`
  ADD PRIMARY KEY (`idEmployeur`),
  ADD UNIQUE KEY `emailEmployeur` (`emailEmployeur`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`),
  ADD KEY `fk_idDemandeur` (`fk_idDemandeur`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `fk_idEmployeur` (`fk_idEmployeur`);

--
-- Index pour la table `offredemande`
--
ALTER TABLE `offredemande`
  ADD PRIMARY KEY (`idoffredemande`),
  ADD KEY `fk_idDemandeur` (`fk_idDemandeur`),
  ADD KEY `fk_idOffre` (`fk_idOffre`);

--
-- Index pour la table `realisation`
--
ALTER TABLE `realisation`
  ADD PRIMARY KEY (`idRealisation`),
  ADD KEY `idDemandeur` (`fk_idDemandeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `idCompetences` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `idDemandeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `emplois`
--
ALTER TABLE `emplois`
  MODIFY `idEmplois` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `employeur`
--
ALTER TABLE `employeur`
  MODIFY `idEmployeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `offredemande`
--
ALTER TABLE `offredemande`
  MODIFY `idoffredemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `realisation`
--
ALTER TABLE `realisation`
  MODIFY `idRealisation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`fk_idDemandeur`) REFERENCES `demandeur` (`idDemandeur`);

--
-- Contraintes pour la table `emplois`
--
ALTER TABLE `emplois`
  ADD CONSTRAINT `emplois_ibfk_1` FOREIGN KEY (`fk_idDemandeur`) REFERENCES `demandeur` (`idDemandeur`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`fk_idDemandeur`) REFERENCES `demandeur` (`idDemandeur`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`fk_idEmployeur`) REFERENCES `employeur` (`idEmployeur`);

--
-- Contraintes pour la table `offredemande`
--
ALTER TABLE `offredemande`
  ADD CONSTRAINT `offredemande_ibfk_1` FOREIGN KEY (`fk_idDemandeur`) REFERENCES `demandeur` (`idDemandeur`),
  ADD CONSTRAINT `offredemande_ibfk_2` FOREIGN KEY (`fk_idOffre`) REFERENCES `offre` (`idOffre`);

--
-- Contraintes pour la table `realisation`
--
ALTER TABLE `realisation`
  ADD CONSTRAINT `realisation_ibfk_1` FOREIGN KEY (`fk_idDemandeur`) REFERENCES `demandeur` (`idDemandeur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
