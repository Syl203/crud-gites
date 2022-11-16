-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 nov. 2022 à 09:56
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location_gites`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id_admin`, `email_admin`, `password_admin`) VALUES
(1, 'sylvain@site.com', 'zangetsu');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `type_gite` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type_gite`) VALUES
(1, 'Maison'),
(2, 'Villa'),
(3, 'Appartement'),
(4, 'Chalet'),
(5, 'Camping'),
(6, 'Hotel'),
(7, 'Igloo'),
(8, 'Yourt'),
(9, 'Cabane bois'),
(10, 'Tente');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `auteur_commentaire` varchar(255) NOT NULL,
  `contenu_commentaire` text NOT NULL,
  `gite_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `auteur_commentaire`, `contenu_commentaire`, `gite_id`, `utilisateur_id`) VALUES
(8, 'Sylvain', 'Super séjour !', 1, 0),
(9, 'Sylvain', 'Super appartement, je reviendrai !', 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `gites`
--

CREATE TABLE `gites` (
  `id_gite` int(11) NOT NULL,
  `nom_gite` varchar(250) NOT NULL,
  `description_gite` text NOT NULL,
  `img_gite` varchar(255) NOT NULL,
  `prix_semaine` float NOT NULL,
  `nombre_chambre` int(11) NOT NULL,
  `nombre_sdb` int(11) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `zone_geographique` int(11) NOT NULL,
  `date_arrivee` datetime NOT NULL,
  `date_depart` datetime DEFAULT NULL,
  `gite_categorie` int(11) NOT NULL,
  `commentaire_id` int(11) DEFAULT NULL,
  `nombre_personnes_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gites`
--

INSERT INTO `gites` (`id_gite`, `nom_gite`, `description_gite`, `img_gite`, `prix_semaine`, `nombre_chambre`, `nombre_sdb`, `disponible`, `zone_geographique`, `date_arrivee`, `date_depart`, `gite_categorie`, `commentaire_id`, `nombre_personnes_max`) VALUES
(1, 'Gite de Normandie', 'Charmant petit gite, proche de tous commerces, à 20km de la mer.', 'assets/img/gite-01.jfif', 325, 2, 1, 1, 9, '2022-05-19 00:00:00', '2022-05-28 00:00:00', 1, 1, 5),
(3, 'Gite de Bretagne', 'A proximité de tous commerces et services, au cœur du village, Sabrina et Thierry vous accueillent dans leur gite à l\'atmosphère familiale et chaleureuse. Proche de Perros-Guirec, à 20 minutes en voiture de la plage et du port.', 'assets/img/gite-02.jpg', 350, 2, 1, 1, 13, '2022-05-18 00:00:00', '2022-04-25 00:00:00', 1, 1, 4),
(5, 'Gite de Chartreuse', 'Maison en fustes pouvant accueillir jusqu\'à 6 personnes. Jolies randonnées à faire à proximité. Commerces à 10 minutes en voiture.', 'assets/img/gite-03.jfif', 510, 3, 2, 1, 16, '2022-05-14 00:00:00', '2015-05-26 00:00:00', 4, 1, 6),
(6, 'Gite du Var', 'Très jolie villa proche de la mer, et de toutes commodités. Pouvant accueillir jusqu\'à 8 personnes, avec garage à voiture.', 'assets/img/gite-04.jpg', 850, 4, 2, 1, 17, '2022-05-17 00:00:00', '2022-05-18 00:00:00', 2, 1, 8),
(7, 'Gite à Arcachon', 'Très jolie maison avec piscine, pour des vacances agréables tout au long de l\'année. Proche du centre-ville et de toutes commodités. La mer est à 5 minutes à pieds.', 'assets/img/gite-05.jfif', 490, 2, 1, 1, 14, '2022-05-18 00:00:00', '2020-05-29 00:00:00', 1, 1, 5),
(9, 'Gite à la Rochelle', 'En Nouvelle Aquitaine, ce petit havre de paix vous attend pour des vacances idéales en bord de mer. Pouvant accueillir jusqu\'à 4 personnes et disposant de 2 chambres, dont une avec lit 140 et une autre avec 2 lits de 90', 'assets/img/gite-07.jfif', 425, 2, 1, 1, 14, '2022-05-17 00:00:00', '2022-06-05 00:00:00', 1, 1, 4),
(10, 'Chalet en Savoie', 'A deux pas de Beaufort en Savoie, ce chalet vous promet des vacances agréables dans un cadre très \"vert\". A proximité, vous pourrez trouver des pistes de randonnées et de VTT, une station de ski en hiver et des commerces à 10 minutes en voiture.', 'assets/img/gite-08.jfif', 790, 3, 1, 1, 16, '2022-05-17 00:00:00', '2022-05-20 00:00:00', 5, 1, 6),
(11, 'Gite à Cassis', 'Magnifique villa avec piscine, proche de la mer et des calanques. ', 'assets/img/gite-09.jfif', 1290, 4, 2, 1, 17, '2022-05-18 00:00:00', '2022-06-24 00:00:00', 2, 1, 6),
(12, 'Appartement à Sète', 'Appartement proche de tous commerces, avec terrasse et une vue imprenable sur la mer. A 2 minutes de la plage. Location possible à la semaine uniquement.', 'assets/img/appartement.jpg', 430, 1, 1, 1, 17, '2022-05-17 00:00:00', '2022-05-31 00:00:00', 3, 1, 2),
(13, 'Mobile home à Corps', 'Avec une vue imprenable sur le lac du Sautet, vous pourrez pratiquer plusieurs activités à proximité, comme la baignade, le canoé kayak, la randonnée, la peche, etc... Il peut accueillir jusqu\'à 6 personnes.', 'assets/img/chalet-01.jpg', 300, 3, 1, 1, 16, '2022-05-17 00:00:00', '2022-05-29 00:00:00', 5, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`, `slug`) VALUES
(1, 'Guadeloupe', 'guadeloupe'),
(2, 'Martinique', 'martinique'),
(3, 'Guyane', 'guyane'),
(4, 'La Réunion', 'la reunion'),
(5, 'Mayotte', 'mayotte'),
(6, 'Île-de-France', 'ile de france'),
(7, 'Centre-Val de Loire', 'centre val de loire'),
(8, 'Bourgogne-Franche-Comté', 'bourgogne franche comte'),
(9, 'Normandie', 'normandie'),
(10, 'Hauts-de-France', 'hauts de france'),
(11, 'Grand Est', 'grand est'),
(12, 'Pays de la Loire', 'pays de la loire'),
(13, 'Bretagne', 'bretagne'),
(14, 'Nouvelle-Aquitaine', 'nouvelle aquitaine'),
(15, 'Occitanie', 'occitanie'),
(16, 'Auvergne-Rhône-Alpes', 'auvergne rhone alpes'),
(17, 'Provence-Alpes-Côte d\'Azur', 'provence alpes cote dazur'),
(18, 'Corse', 'corse'),
(19, 'Collectivités d\'Outre-Mer', 'collectivites doutre mer');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `email_utilisateur` varchar(250) NOT NULL,
  `password_utilisateur` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_user`, `email_utilisateur`, `password_utilisateur`) VALUES
(5, 'Sylvain', 'mounier.syl20@gmail.com', '$2y$10$9ALci6mLhGTnsaZ0Ogl0AuWblYzGTcD8d93koZ600HnL5WjOwDRg6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `gites`
--
ALTER TABLE `gites`
  ADD PRIMARY KEY (`id_gite`),
  ADD KEY `gite_category` (`gite_categorie`),
  ADD KEY `Indes des commentaires` (`commentaire_id`),
  ADD KEY `zone_geo` (`zone_geographique`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `gites`
--
ALTER TABLE `gites`
  MODIFY `id_gite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gites`
--
ALTER TABLE `gites`
  ADD CONSTRAINT `gites_ibfk_1` FOREIGN KEY (`gite_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gites_ibfk_3` FOREIGN KEY (`zone_geographique`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
