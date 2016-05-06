-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Avril 2016 à 22:15
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

--
-- Contenu de la table `breasts_type`
--

INSERT INTO `breasts_type` (`id`, `label`) VALUES
(5, ''),
(4, 'Large'),
(2, 'Medium'),
(3, 'Small'),
(1, 'Undefined');

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`id`, `label`) VALUES
(31, 'Argentina'),
(60, 'Armenia'),
(24, 'Australia'),
(33, 'Austria'),
(26, 'Belarus'),
(15, 'Belgium'),
(19, 'Brazil'),
(59, 'Bulgaria'),
(12, 'Canada'),
(22, 'Chile'),
(28, 'China'),
(54, 'Colombia'),
(47, 'Cuba'),
(48, 'Cyprus'),
(6, 'Czech Republic'),
(29, 'Denmark'),
(40, 'Dominican Republic'),
(7, 'Estonia'),
(44, 'Ethiopia'),
(55, 'Finland'),
(11, 'France'),
(34, 'Georgia'),
(17, 'Germany'),
(8, 'Hungary'),
(43, 'Iran'),
(32, 'Ireland'),
(37, 'Israel'),
(14, 'Italy'),
(30, 'Japan'),
(25, 'Kazakhstan'),
(49, 'Kyrgyzstan'),
(4, 'Latvia'),
(20, 'Lithuania'),
(58, 'Macedonia'),
(41, 'Mexico'),
(27, 'Moldova, Republic Of'),
(52, 'Mongolia'),
(39, 'Netherlands'),
(50, 'New Zealand'),
(38, 'Nigeria'),
(46, 'Palestine'),
(42, 'Philippines'),
(13, 'Poland'),
(57, 'Portugal'),
(18, 'Romania'),
(2, 'Russian Federation'),
(10, 'Slovakia'),
(61, 'Slovenia'),
(51, 'South Africa'),
(9, 'Spain'),
(23, 'Sweden'),
(36, 'Thailand'),
(45, 'Turkey'),
(3, 'Ukraine'),
(1, 'Undefined'),
(16, 'United Kingdom'),
(5, 'United States'),
(21, 'Unknown'),
(35, 'Uzbekistan'),
(56, 'Venezuela'),
(53, 'Yugoslavia');

--
-- Contenu de la table `ethnicity`
--

INSERT INTO `ethnicity` (`id`, `label`) VALUES
(4, ''),
(6, 'Asian'),
(2, 'Caucasian'),
(3, 'Ebony'),
(5, 'Hispanic'),
(7, 'Indian'),
(1, 'Undefined'),
(8, 'Unknown');

--
-- Contenu de la table `eye_color`
--

INSERT INTO `eye_color` (`id`, `label`) VALUES
(6, ''),
(5, 'Black'),
(4, 'Blue'),
(3, 'Brown'),
(2, 'Green'),
(7, 'Hazel'),
(1, 'Undefined');

--
-- Contenu de la table `gallery_type`
--

INSERT INTO `gallery_type` (`id`, `label`) VALUES
(1, 'photos'),
(2, 'movie');

--
-- Contenu de la table `hair_color`
--

INSERT INTO `hair_color` (`id`, `label`) VALUES
(6, ''),
(5, 'Black'),
(3, 'Blonde'),
(2, 'Brown'),
(4, 'Red'),
(1, 'Undefined');

--
-- Contenu de la table `shaved_type`
--

INSERT INTO `shaved_type` (`id`, `label`) VALUES
(5, ''),
(3, 'Hairy'),
(2, 'Shaved'),
(4, 'Trimmed'),
(1, 'Undefined');

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`login`, `password`, `last_connection`) VALUES
('saintbios', 'f43812ca8542ede82b17d4d2f0f2983d53078ea3', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
