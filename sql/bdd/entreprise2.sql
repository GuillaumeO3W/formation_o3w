-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 juil. 2023 à 14:22
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `entreprise`
--

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `idDirecteur` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`idDirecteur`, `nom`, `prenom`) VALUES
(1, 'Guignabaudet', 'Damien'),
(2, 'Fabien', 'Nalin'),
(3, 'Sonny', 'Baccam');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `idEmploye` int(10) UNSIGNED NOT NULL,
  `idService` int(10) UNSIGNED DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `salaire` int(10) UNSIGNED DEFAULT NULL,
  `dateContrat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `idService`, `nom`, `prenom`, `sexe`, `salaire`, `dateContrat`) VALUES
(1, 3, 'Moscet', 'Sony', 'H', 2000, '2021-07-14'),
(2, 1, 'Tascon', 'Adrien', 'H', 1200, '2020-04-15'),
(3, 3, 'Oumira', 'Virginie', 'F', 3000, '2023-03-15'),
(4, 1, 'Pezaire', 'Fabrice', 'H', 1500, '2023-01-17'),
(5, 2, 'Molinié', 'Thibaut', 'H', 4000, '2013-02-14'),
(6, 1, 'Stasse', 'Olivier', 'H', 1800, '2018-11-15'),
(7, NULL, 'Moro', 'Ryan', 'H', 1900, '2020-01-14'),
(8, 3, 'Valdeyron', 'Anne', 'F', 2500, '2013-09-14');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(10) UNSIGNED NOT NULL,
  `idDirecteur` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `idDirecteur`, `nom`) VALUES
(1, 1, 'IT'),
(2, 2, 'Juridique'),
(3, 3, 'Marketing'),
(4, 1, 'RH');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`idDirecteur`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD KEY `idService` (`idService`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`),
  ADD KEY `idDirecteur` (`idDirecteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `directeur`
--
ALTER TABLE `directeur`
  MODIFY `idDirecteur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `idEmploye` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`idDirecteur`) REFERENCES `directeur` (`idDirecteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
