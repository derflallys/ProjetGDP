-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 31 Mars 2017 à 15:00
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetgdp`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande_pub`
--

CREATE TABLE `demande_pub` (
  `id_publication` int(11) NOT NULL,
  `id_donateur` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `date_demande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demande_pub`
--

INSERT INTO `demande_pub` (`id_publication`, `id_donateur`, `id_fournisseur`, `date_demande`) VALUES
(12, 2, 1, '2017-03-26'),
(12, 4, 1, '2017-03-31'),
(13, 2, 1, '2017-03-26'),
(14, 2, 1, '2017-03-26'),
(15, 2, 1, '2017-03-26'),
(16, 2, 1, '2017-03-30'),
(16, 4, 1, '2017-03-31'),
(17, 4, 3, '2017-03-31');

-- --------------------------------------------------------

--
-- Structure de la table `donateurs`
--

CREATE TABLE `donateurs` (
  `id_donateu` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `telephone` varchar(30) NOT NULL DEFAULT '0',
  `codepostal` varchar(30) NOT NULL DEFAULT '0',
  `adresse` varchar(155) DEFAULT NULL,
  `type_donateurs` varchar(30) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Association Sociale';

--
-- Contenu de la table `donateurs`
--

INSERT INTO `donateurs` (`id_donateu`, `nom`, `email`, `telephone`, `codepostal`, `adresse`, `type_donateurs`, `password`) VALUES
(1, 'Resto Du Coeur', 'resto@gmail.com', '0398509345', '17000', NULL, 'Aide Alimentaire', 'repasser'),
(2, 'Aide Social', 'aide@gmail.com', '06453245', '17400', NULL, 'Aide Sociale', 'repasser'),
(3, 'Alfred', 'derfladev@gmail.com', '0651584295', '17000', NULL, 'Je sais pas', 'f5e1cb848fc54baae761c3cf40598dfb70df314a681930240c05f6ba78c06413'),
(4, 'Resto Du Coeur', 'alfsylla@esp.sn', '0651584295', '17000', '111 ', 'Aide Sociale', 'f5e1cb848fc54baae761c3cf40598dfb70df314a681930240c05f6ba78c06413');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_restaurant` int(11) NOT NULL,
  `nom_restaurant` varchar(50) NOT NULL DEFAULT '0',
  `adresse_restaurant` varchar(100) NOT NULL DEFAULT '0',
  `codepostal` varchar(10) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `contrat` char(5) NOT NULL DEFAULT '0',
  `type_restaurant` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(150) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ils s''agient des restaurants !';

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_restaurant`, `nom_restaurant`, `adresse_restaurant`, `codepostal`, `email`, `contrat`, `type_restaurant`, `password`, `tel`) VALUES
(1, 'Resto', '111 Rue de Coureilles', '17000', 'a.aboubacar.sylla@gmail.com', 'true', 'fast-food', 'repasser', '0651584295'),
(3, 'Dominos', 'Les Minimes', '17000', 'derfladev@gmail.com', 'false', 'Fast-Food', 'f5e1cb848fc54baae761c3cf40598dfb70df314a681930240c05f6ba78c06413', '0651584295');

-- --------------------------------------------------------

--
-- Structure de la table `note_fournisseurs`
--

CREATE TABLE `note_fournisseurs` (
  `id_fournisseurs` int(11) NOT NULL,
  `id_donateur` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note_fournisseurs`
--

INSERT INTO `note_fournisseurs` (`id_fournisseurs`, `id_donateur`, `note`, `id_publication`) VALUES
(1, 1, 6, 11),
(1, 1, 8, 12),
(1, 1, 4, 13),
(1, 1, 7, 14),
(1, 2, 5, 12),
(1, 2, 8, 13),
(1, 2, 8, 14),
(1, 2, 7, 15),
(1, 2, 6, 16),
(1, 4, 8, 14),
(1, 4, 8, 16),
(3, 4, 8, 17);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `titre_publication` varchar(50) NOT NULL DEFAULT '0',
  `image_publication` varchar(50) DEFAULT '0',
  `date_publication` date NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '0',
  `etat` char(10) NOT NULL DEFAULT '0',
  `duree_validite` int(11) NOT NULL DEFAULT '0',
  `publicateur` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `contenu`, `titre_publication`, `image_publication`, `date_publication`, `quantite`, `etat`, `duree_validite`, `publicateur`) VALUES
(11, 'Curabitur faucibus nulla at dapibus gravida. Fusce sit amet felis ornare, tempus purus eget, varius enim. Pellentesque a sem tempor, laoreet enim eget, ornare dui. Nam feugiat nibh iaculis elit convallis, ', 'OUHJ', 'img/msn.jpg', '2017-03-19', 89, 'bon', 9, 1),
(12, 'Curabitur faucibus nulla at dapibus gravida. Fusce sit amet felis ornare, tempus purus eget, varius enim. Pellentesque a sem tempor, laoreet enim eget, ornare dui. Nam feugiat nibh iaculis elit convallis.', 'Pain', 'img/home_pain.jpg', '2017-03-19', 12, 'bon', 21, 1),
(13, 'Une bonne soupe ', 'Soupe', 'img/soupes-potages-Fotolias_18958555.png', '2017-03-19', 12, 'bon', 2, 1),
(14, 'Vivamus venenatis eleifend tortor, at elementum quam accumsan sit amet. Ut porta finibus ex vitae euismod. Nullam at erat nunc. Sed blandit, libero sed ornare dapibus, tellus leo finibus sapien, non egestas eros massa sit amet risus. Duis nisi arcu', 'Lait', 'img/lait.jpg', '2017-03-23', 12, 'bon', 3, 1),
(15, 'Vivamus pellentesque ante nisi, sit amet vehicula diam posuere vitae. Sed at nulla ac nibh gravida interdum. Donec sit amet euismod nibh. Cras non lacus vitae metus iaculis egestas', 'Yaourt', 'img/yaourt.jpg', '2017-03-25', 10, 'bon', 5, 1),
(16, 'PÃ¢tes Ã  tartiner Confitures et CÃ©rÃ©ales Epicerie', 'Cacaouette', 'img/cacaouette.jpg', '2017-03-30', 12, 'bon', 12, 1),
(17, 'La biscotte est un aliment cÃ©rÃ©alier obtenu Ã  partir d''une tranche de pain cuite deux fois, d''oÃ¹ son appellation. Ce procÃ©dÃ© est Ã  l''origine destinÃ© Ã  prolonger la durÃ©e de conservation du pain', 'Biscotte', 'img/biscotte.jpg', '2017-03-31', 12, 'bon', 5, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `demande_pub`
--
ALTER TABLE `demande_pub`
  ADD PRIMARY KEY (`id_publication`,`id_donateur`),
  ADD KEY `FK__donateurs` (`id_donateur`),
  ADD KEY `demande_pub_fournisseurs_id_restaurant_fk` (`id_fournisseur`);

--
-- Index pour la table `donateurs`
--
ALTER TABLE `donateurs`
  ADD PRIMARY KEY (`id_donateu`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Index pour la table `note_fournisseurs`
--
ALTER TABLE `note_fournisseurs`
  ADD PRIMARY KEY (`id_fournisseurs`,`id_donateur`,`id_publication`),
  ADD KEY `publication` (`id_publication`),
  ADD KEY `fk_notefournisseurs_donateur` (`id_donateur`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `publicateur` (`publicateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `donateurs`
--
ALTER TABLE `donateurs`
  MODIFY `id_donateu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `demande_pub`
--
ALTER TABLE `demande_pub`
  ADD CONSTRAINT `FK__donateurs` FOREIGN KEY (`id_donateur`) REFERENCES `donateurs` (`id_donateu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__publication` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demande_pub_fournisseurs_id_restaurant_fk` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseurs` (`id_restaurant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note_fournisseurs`
--
ALTER TABLE `note_fournisseurs`
  ADD CONSTRAINT `fk_notefournisseurs_donateur` FOREIGN KEY (`id_donateur`) REFERENCES `donateurs` (`id_donateu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notefournisseurs_fourni` FOREIGN KEY (`id_fournisseurs`) REFERENCES `fournisseurs` (`id_restaurant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notefournisseurs_pub` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `FK__fournisseurs` FOREIGN KEY (`publicateur`) REFERENCES `fournisseurs` (`id_restaurant`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
