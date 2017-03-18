-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.1.13-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour projetgdp
DROP DATABASE IF EXISTS `projetgdp`;
CREATE DATABASE IF NOT EXISTS `projetgdp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projetgdp`;

-- Export de la structure de la table projetgdp. donateurs
DROP TABLE IF EXISTS `donateurs`;
CREATE TABLE IF NOT EXISTS `donateurs` (
  `id_donateu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `telephone` varchar(30) NOT NULL DEFAULT '0',
  `codepostal` varchar(30) NOT NULL DEFAULT '0',
  `type_donateurs` varchar(30) NOT NULL DEFAULT '0',
  `photo_user` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_donateu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Association Sociale';

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table projetgdp. fournisseurs
DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id_restaurant` int(11) NOT NULL AUTO_INCREMENT,
  `nom_restaurant` varchar(50) NOT NULL DEFAULT '0',
  `adresse_restaurant` varchar(100) NOT NULL DEFAULT '0',
  `codepostal` varchar(10) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `contrat` char(5) NOT NULL DEFAULT '0',
  `type_restaurant` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_restaurant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ils s''agient des restaurants !';

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table projetgdp. note_fournisseurs
DROP TABLE IF EXISTS `note_fournisseurs`;
CREATE TABLE IF NOT EXISTS `note_fournisseurs` (
  `id_fournisseurs` int(11) NOT NULL,
  `id_donateur` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id_fournisseurs`,`id_donateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table projetgdp. publication
DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `titre_publication` varchar(50) NOT NULL DEFAULT '0',
  `image_publication` varchar(50) DEFAULT '0',
  `date_publication` date NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '0',
  `etat` char(10) NOT NULL DEFAULT '0',
  `duree_validite` int(11) NOT NULL DEFAULT '0',
  `publicateur` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_publication`),
  KEY `publicateur` (`publicateur`),
  CONSTRAINT `FK__fournisseurs` FOREIGN KEY (`publicateur`) REFERENCES `fournisseurs` (`id_restaurant`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table projetgdp. vue_publication
DROP TABLE IF EXISTS `vue_publication`;
CREATE TABLE IF NOT EXISTS `vue_publication` (
  `id_publication` int(11) NOT NULL,
  `id_donateur` int(11) NOT NULL,
  PRIMARY KEY (`id_publication`,`id_donateur`),
  KEY `FK__donateurs` (`id_donateur`),
  CONSTRAINT `FK__donateurs` FOREIGN KEY (`id_donateur`) REFERENCES `donateurs` (`id_donateu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__publication` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
