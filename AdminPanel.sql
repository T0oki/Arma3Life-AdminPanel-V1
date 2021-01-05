-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 13 Février 2019 à 21:25
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `AdminPanel`
--

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `ID` int(11) NOT NULL,
  `UID` varchar(17) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `LastActivity` varchar(255) DEFAULT NULL,
  `SafeCode` int(11) NOT NULL,
  `PERM_View_User` tinyint(1) NOT NULL,
  `PERM_Edit_User` tinyint(1) NOT NULL,
  `PERM_View_Vehicle` tinyint(1) NOT NULL,
  `PERM_Edit_Vehicle` tinyint(1) NOT NULL,
  `PERM_View_Gang` tinyint(1) NOT NULL,
  `PERM_Edit_Gang` tinyint(1) NOT NULL,
  `PERM_View_Home` tinyint(1) NOT NULL,
  `PERM_Edit_Home` tinyint(1) NOT NULL,
  `PERM_View_Container` tinyint(1) NOT NULL,
  `PERM_Edit_Container` tinyint(1) NOT NULL,
  `PERM_Login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`ID`, `UID`, `Email`, `Password`, `LastActivity`, `SafeCode`, `PERM_View_User`, `PERM_Edit_User`, `PERM_View_Vehicle`, `PERM_Edit_Vehicle`, `PERM_View_Gang`, `PERM_Edit_Gang`, `PERM_View_Home`, `PERM_Edit_Home`, `PERM_View_Container`, `PERM_Edit_Container`, `PERM_Login`) VALUES
(1, '76561198127652531', 'delgiudiceleo@gmail.com', '$2y$10$RWtUBBGrE9.m5gLdvbfDCeUmWmzT2nq1sfLLQbQm2vhBmOnG.N.Fu', '1550089172', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, '76561198075514290', 'guillaume@defour.net', '$2y$10$AuTQDMTeS5lz9323oM9I.uOxCue1IqbAIw1/xrvVMxZ4cTtpGhx7y', '1550089143', 79, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
