-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:8889
-- Généré le : jeu. 21 jan. 2021 à 13:40
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `breaking_badge`
--

-- --------------------------------------------------------

--
-- Structure de la table `badge`
--

CREATE TABLE `badge` (
  `id_badge` int(11) NOT NULL,
  `name_badge` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description_badge` text COLLATE utf8mb4_bin NOT NULL,
  `shape_badge` text COLLATE utf8mb4_bin NOT NULL,
  `color_badge` varchar(7) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `badge`
--

INSERT INTO `badge` (`id_badge`, `name_badge`, `description_badge`, `shape_badge`, `color_badge`) VALUES
(1, 'php lvl 1', 'Bravo tu a gagner le lvl 1 en php', 'https://www.publicdomainpictures.net/pictures/310000/velka/red-circle.png', '#ff0000'),
(2, 'php_lvl2', 'Congrats tu upgrade en php lv2', 'blue circle', '#ff0000'),
(3, 'php_lvl3', 'wow t\'es un malade de php', 'green circle', '#00ff00'),
(5, 'php_lvl5', 'wowowow grand fou du php va', 'orange circle', 'orange'),
(6, 'php_lvl5', 'wowowow grand fou du php va', 'orange circle', 'orange');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `account_type` enum('ADMIN','NORMIE') NOT NULL DEFAULT 'NORMIE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `account_type`) VALUES
(1, 'admin@example.com', '$2y$10$HnC5R/DMLctfv94iHORJH.kmaxrtYNJted4mmv0uhXVd0VCtHMCG.', 'Grace', 'Hopper', 'ADMIN'),
(2, 'normie@example.com', '$2y$10$mhE/p8tmq.dsZfK/HDIF1uJJBwSQwrJ0DTwaN4wCVSk3zoC15zTd6', 'Johnny', 'Normie', 'NORMIE');

-- --------------------------------------------------------

--
-- Structure de la table `users_has_badge`
--

CREATE TABLE `users_has_badge` (
  `id_users_has_badge` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `users_has_badge`
--

INSERT INTO `users_has_badge` (`id_users_has_badge`, `users_id`, `badge_id`) VALUES
(1, 2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id_badge`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `users_has_badge`
--
ALTER TABLE `users_has_badge`
  ADD PRIMARY KEY (`id_users_has_badge`),
  ADD KEY `users_has_badge_fkuser_id_user` (`users_id`),
  ADD KEY `users_has_badge_fkbadge_id_badge` (`badge_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `badge`
--
ALTER TABLE `badge`
  MODIFY `id_badge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users_has_badge`
--
ALTER TABLE `users_has_badge`
  MODIFY `id_users_has_badge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users_has_badge`
--
ALTER TABLE `users_has_badge`
  ADD CONSTRAINT `users_has_badge_fkbadge_id_badge` FOREIGN KEY (`badge_id`) REFERENCES `badge` (`id_badge`),
  ADD CONSTRAINT `users_has_badge_fkuser_id_user` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
