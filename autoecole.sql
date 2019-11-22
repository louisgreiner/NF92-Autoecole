-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 22 nov. 2019 à 14:02
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `autoecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `ideleve` int(11) NOT NULL,
  `nom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `dateNaiss` date NOT NULL,
  `dateInscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`ideleve`, `nom`, `prenom`, `dateNaiss`, `dateInscription`) VALUES
(16, 'Greiner', 'Louis', '2000-01-18', '2019-11-18'),
(17, 'yhbkjnlk', 'jpokl,n', '2019-11-06', '2019-11-20'),
(18, 'azeaze', 'azeaze', '2019-11-07', '2019-11-20'),
(19, 'az', 'a', '2019-10-29', '2019-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `seances`
--

CREATE TABLE `seances` (
  `idseance` int(11) NOT NULL,
  `DateSeance` date NOT NULL,
  `EffMax` int(11) NOT NULL,
  `idthème` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `idtheme` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `supprime` tinyint(1) NOT NULL,
  `descriptif` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`idtheme`, `nom`, `supprime`, `descriptif`) VALUES
(14, 'Premiers secours', 0, 'Pansements et dÃ©sinfectant'),
(15, 'Politesse', 0, 'Bonjour au revoir'),
(16, 'Voiture', 0, 'MÃ©canique'),
(17, 'Clignotants', 1, 'Pas la lumiÃ¨re Ã  tous les Ã©tages'),
(18, 'Justin', 1, 'Justin est beau gosse');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`ideleve`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `ideleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `seances`
--
ALTER TABLE `seances`
  MODIFY `idseance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `idtheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
