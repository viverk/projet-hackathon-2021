-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 12 fév. 2021 à 04:35
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `wello_assist`
--

-- --------------------------------------------------------

--
-- Structure de la table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `wello_plate` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `sound_nature` varchar(255) NOT NULL,
  `user_alert` tinyint(1) NOT NULL,
  `user_confirmation` tinyint(1) DEFAULT NULL,
  `user_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alert`
--

INSERT INTO `alert` (`id`, `wello_plate`, `datetime`, `sound_nature`, `user_alert`, `user_confirmation`, `user_comment`) VALUES
(16, '', '2021-02-11 00:00:00', 'Gunshot, gunfire', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `code_alerte`
--

CREATE TABLE `code_alerte` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `code_alerte`
--

INSERT INTO `code_alerte` (`id`, `code`, `description`) VALUES
(1, 'Code 10', 'Explosion'),
(2, 'Code 11', 'Coups de feu'),
(3, 'Code 12', 'Crissement de pneu'),
(4, 'Code 13', 'Animal Sauvage');

-- --------------------------------------------------------

--
-- Structure de la table `velo`
--

CREATE TABLE `velo` (
  `id` int(11) NOT NULL,
  `plaque` varchar(255) NOT NULL,
  `start_wello` tinyint(1) NOT NULL,
  `listenning_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `velo`
--

INSERT INTO `velo` (`id`, `plaque`, `start_wello`, `listenning_status`) VALUES
(1, 'DMIA-2021', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `code_alerte`
--
ALTER TABLE `code_alerte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `velo`
--
ALTER TABLE `velo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `code_alerte`
--
ALTER TABLE `code_alerte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `velo`
--
ALTER TABLE `velo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
