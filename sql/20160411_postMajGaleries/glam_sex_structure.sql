-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Avril 2016 à 18:43
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `glam_sex`
--
CREATE DATABASE IF NOT EXISTS `glam_sex` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `glam_sex`;

-- --------------------------------------------------------

--
-- Structure de la table `breasts_type`
--

DROP TABLE IF EXISTS `breasts_type`;
CREATE TABLE IF NOT EXISTS `breasts_type` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(72) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(72) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ethnicity`
--

DROP TABLE IF EXISTS `ethnicity`;
CREATE TABLE IF NOT EXISTS `ethnicity` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(72) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `eye_color`
--

DROP TABLE IF EXISTS `eye_color`;
CREATE TABLE IF NOT EXISTS `eye_color` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(72) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `photographer_id_fk` smallint(4) UNSIGNED NOT NULL,
  `gallery_type_id_fk` tinyint(1) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `short_description` varchar(3072) DEFAULT NULL,
  `long_description` mediumtext,
  `blog_description` mediumtext,
  `number_of_models` tinyint(1) UNSIGNED NOT NULL,
  `number_of_pics_fhg` tinyint(2) UNSIGNED NOT NULL,
  `number_of_pics` tinyint(3) UNSIGNED NOT NULL,
  `external_link` varchar(768) NOT NULL,
  `zip_file_url` varchar(768) NOT NULL,
  `cover_url` varchar(768) NOT NULL,
  `cover_width` int(11) DEFAULT NULL,
  `cover_height` int(11) DEFAULT NULL,
  `rating` float UNSIGNED DEFAULT NULL,
  `rating_date` date DEFAULT NULL,
  `zip_complete` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `cover_complete` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `activation_date` date DEFAULT NULL,
  `has_video_trailer` tinyint(1) UNSIGNED DEFAULT '0',
  `metart_id` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Photographer` (`photographer_id_fk`),
  KEY `fk_GalleryType` (`gallery_type_id_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=12354 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gallery_type`
--

DROP TABLE IF EXISTS `gallery_type`;
CREATE TABLE IF NOT EXISTS `gallery_type` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(72) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hair_color`
--

DROP TABLE IF EXISTS `hair_color`;
CREATE TABLE IF NOT EXISTS `hair_color` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(72) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(144) NOT NULL,
  `hair_color_id_fk` tinyint(1) UNSIGNED NOT NULL,
  `eye_color_id_fk` tinyint(1) UNSIGNED NOT NULL,
  `breasts_type_id_fk` tinyint(1) UNSIGNED NOT NULL,
  `shaved_type_id_fk` tinyint(1) UNSIGNED NOT NULL,
  `ethnicity_id_fk` tinyint(1) UNSIGNED NOT NULL,
  `country_id_fk` tinyint(3) UNSIGNED NOT NULL,
  `bio` mediumtext NOT NULL,
  `headshot_url` varchar(768) DEFAULT NULL,
  `headshot_width` int(11) DEFAULT NULL,
  `headshot_height` int(11) DEFAULT NULL,
  `rating` float UNSIGNED DEFAULT NULL,
  `rating_date` date DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `activation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_HairColor` (`hair_color_id_fk`),
  KEY `fk_EyeColor` (`eye_color_id_fk`),
  KEY `fk_BreastsType` (`breasts_type_id_fk`),
  KEY `fk_Ethnicity` (`ethnicity_id_fk`),
  KEY `fk_Country` (`country_id_fk`),
  KEY `fk_Shaved` (`shaved_type_id_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=3260 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `model_gallery`
--

DROP TABLE IF EXISTS `model_gallery`;
CREATE TABLE IF NOT EXISTS `model_gallery` (
  `model_id` smallint(5) UNSIGNED NOT NULL,
  `gallery_id` smallint(5) UNSIGNED NOT NULL,
  `age_published` tinyint(2) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`model_id`,`gallery_id`),
  KEY `fk_ModelGalleryGallery` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `model_tag`
--

DROP TABLE IF EXISTS `model_tag`;
CREATE TABLE IF NOT EXISTS `model_tag` (
  `model_id` smallint(5) UNSIGNED NOT NULL,
  `tag_id` smallint(4) UNSIGNED NOT NULL,
  PRIMARY KEY (`model_id`,`tag_id`),
  KEY `fk_ModelTagTag` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photographer`
--

DROP TABLE IF EXISTS `photographer`;
CREATE TABLE IF NOT EXISTS `photographer` (
  `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(192) NOT NULL,
  `rating` float UNSIGNED DEFAULT NULL,
  `rating_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photographer_tag`
--

DROP TABLE IF EXISTS `photographer_tag`;
CREATE TABLE IF NOT EXISTS `photographer_tag` (
  `photographer_id` smallint(4) UNSIGNED NOT NULL,
  `tag_id` smallint(4) UNSIGNED NOT NULL,
  PRIMARY KEY (`photographer_id`,`tag_id`),
  KEY `fk_PhotographerTagTag` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `shaved_type`
--

DROP TABLE IF EXISTS `shaved_type`;
CREATE TABLE IF NOT EXISTS `shaved_type` (
  `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(72) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9986 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` VARCHAR(128) NOT NULL ,
  `password` CHAR(40) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL ,
  `last_connection` DATETIME NULL ,
  PRIMARY KEY (`login`)
) ENGINE = MyISAM;

-- --------------------------------------------------------

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_GalleryType` FOREIGN KEY (`gallery_type_id_fk`) REFERENCES `gallery_type` (`id`),
  ADD CONSTRAINT `fk_Photographer` FOREIGN KEY (`photographer_id_fk`) REFERENCES `photographer` (`id`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `fk_BreastsType` FOREIGN KEY (`breasts_type_id_fk`) REFERENCES `breasts_type` (`id`),
  ADD CONSTRAINT `fk_Country` FOREIGN KEY (`country_id_fk`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `fk_Ethnicity` FOREIGN KEY (`ethnicity_id_fk`) REFERENCES `ethnicity` (`id`),
  ADD CONSTRAINT `fk_EyeColor` FOREIGN KEY (`eye_color_id_fk`) REFERENCES `eye_color` (`id`),
  ADD CONSTRAINT `fk_HairColor` FOREIGN KEY (`hair_color_id_fk`) REFERENCES `hair_color` (`id`),
  ADD CONSTRAINT `fk_Shaved` FOREIGN KEY (`shaved_type_id_fk`) REFERENCES `shaved_type` (`id`);

--
-- Contraintes pour la table `model_gallery`
--
ALTER TABLE `model_gallery`
  ADD CONSTRAINT `fk_ModelGalleryGallery` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`),
  ADD CONSTRAINT `fk_ModelGalleryModel` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`);

--
-- Contraintes pour la table `model_tag`
--
ALTER TABLE `model_tag`
  ADD CONSTRAINT `fk_ModelTagModel` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `fk_ModelTagTag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Contraintes pour la table `photographer_tag`
--
ALTER TABLE `photographer_tag`
  ADD CONSTRAINT `fk_PhotographerTagPhotographer` FOREIGN KEY (`photographer_id`) REFERENCES `photographer` (`id`),
  ADD CONSTRAINT `fk_PhotographerTagTag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
