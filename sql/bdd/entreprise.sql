-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 juil. 2023 à 14:34
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
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `idEmploye` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `service` varchar(25) DEFAULT NULL,
  `salaire` int(10) UNSIGNED DEFAULT NULL,
  `dateContrat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `nom`, `prenom`, `sexe`, `service`, `salaire`, `dateContrat`) VALUES
(1, 'Moscet', 'Sony', 'H', 'IT', 2000, '2021-07-14'),
(2, 'Tascon', 'Adrien', 'H', 'IT', 1200, '2020-04-15'),
(3, 'Oumira', 'Virginie', 'F', 'IT', 3000, '2023-03-15'),
(4, 'Pezaire', 'Fabrice', 'H', 'Support', 1500, '2023-01-17'),
(5, 'Molinié', 'Thibaut', 'H', 'Juridique', 4000, '2013-02-14'),
(6, 'Stasse', 'Olivier', 'H', 'Comptabilité', 1800, '2018-11-15'),
(7, 'Moro', 'Ryan', 'H', NULL, 1900, '2020-01-14'),
(8, 'Valdeyron', 'Anne', 'F', 'Marketing', 2500, '2013-09-14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `idEmploye` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
