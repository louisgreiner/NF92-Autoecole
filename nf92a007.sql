-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 24 Janvier 2020 à 08:05
-- Version du serveur :  5.5.43
-- Version de PHP :  5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nf92a007`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `ideleve` int(11) NOT NULL,
  `nom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `dateNaiss` date NOT NULL,
  `dateInscription` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`ideleve`, `nom`, `prenom`, `dateNaiss`, `dateInscription`) VALUES
(101, 'Greiner', 'Louis', '2000-01-18', '2020-01-13'),
(102, 'Goasdoue', 'Justin', '2002-02-12', '2020-01-13'),
(103, 'Duvauchel', 'Antonin', '1997-03-25', '2020-01-13'),
(104, 'Brochu', 'Colette', '1985-05-20', '2020-01-13'),
(105, 'lounis', 'ahmed', '1990-01-01', '2020-01-13'),
(106, 'lounis', 'ahmed', '1990-01-01', '2020-01-13'),
(107, 'lounis', '5555', '1990-01-01', '2020-01-13');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `idseance` int(11) NOT NULL DEFAULT '0',
  `ideleve` int(11) NOT NULL DEFAULT '0',
  `note` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`idseance`, `ideleve`, `note`) VALUES
(90, 101, 5),
(90, 103, 12),
(90, 104, 30),
(91, 102, -1),
(91, 104, -1),
(92, 101, -1),
(92, 103, -1),
(93, 102, -1),
(93, 103, -1);

-- --------------------------------------------------------

--
-- Structure de la table `seances`
--

CREATE TABLE IF NOT EXISTS `seances` (
  `idseance` int(11) NOT NULL,
  `jourseance` date NOT NULL,
  `debutseance` time NOT NULL,
  `finseance` time NOT NULL,
  `effmax` int(11) NOT NULL,
  `idtheme` int(11) NOT NULL,
  `placesrestantes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Contenu de la table `seances`
--

INSERT INTO `seances` (`idseance`, `jourseance`, `debutseance`, `finseance`, `effmax`, `idtheme`, `placesrestantes`) VALUES
(90, '2019-01-31', '13:20:00', '14:20:00', 15, 47, 12),
(91, '2019-01-29', '15:30:00', '16:15:00', 12, 49, 10),
(92, '2020-01-24', '12:12:00', '13:27:00', 20, 47, 18),
(93, '2020-01-15', '13:00:00', '14:30:00', 15, 49, 13),
(94, '2020-04-01', '10:00:00', '10:45:00', 10, 47, 10);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `idtheme` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `supprime` tinyint(1) NOT NULL,
  `descriptif` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Contenu de la table `themes`
--

INSERT INTO `themes` (`idtheme`, `nom`, `supprime`, `descriptif`) VALUES
(47, 'Philosophie', 1, 'Parce que rouler, c''est faire un pas dans la vie.'),
(48, 'Manger au volant', 0, 'De l''huile de moteur pour les bons lipides.'),
(49, 'Arrestation', 1, 'Mains sur le capot.'),
(50, 'test', 0, 'test''test');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`ideleve`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idseance`,`ideleve`);

--
-- Index pour la table `seances`
--
ALTER TABLE `seances`
  ADD PRIMARY KEY (`idseance`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`idtheme`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `ideleve` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT pour la table `seances`
--
ALTER TABLE `seances`
  MODIFY `idseance` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `idtheme` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
