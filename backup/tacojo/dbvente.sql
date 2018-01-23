-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Mars 2016 à 21:41
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbvente`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `mdp`, `nom`, `prenom`) VALUES
(19, 'dziugas.g@hotmail.fr', '5a967421f46e8ca4f61d0cbdbabad103fd183845', 'Dziugas', 'Andruskevicius'),
(20, 'aurimaduh@gmail.com', '2620c5f1018ab54ff54a9662d1530fff2f1fd95a', 'aurima', 'duhamel'),
(21, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(22, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(23, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(24, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(25, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(26, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(27, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(28, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(29, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(30, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(31, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(32, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(33, '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', ''),
(34, 'dziugas.g@hotmail.fr', '5a967421f46e8ca4f61d0cbdbabad103fd183845', 'fd', 'd'),
(35, 'dziugas.g@hotmail.fr', '5a967421f46e8ca4f61d0cbdbabad103fd183845', 'fd', 'd'),
(36, 'dziugas.g@hotmail.fr', '5a967421f46e8ca4f61d0cbdbabad103fd183845', 'fd', 'd'),
(37, 'dziugas.g@hotmail.fr', '5a967421f46e8ca4f61d0cbdbabad103fd183845', 'fd', 'd'),
(38, 'dziugas.g@hotmail.fr', '5a967421f46e8ca4f61d0cbdbabad103fd183845', 'fd', 'd');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`login`, `mdp`, `nom`, `prenom`) VALUES
('', '', '', ''),
('1622', '', '1622', '1622'),
('anth', '', 'lol', 'ant'),
('aurima', '', 'trollface', 'aurima'),
('d', '', 'd', 'd'),
('dziugas_andruskevicius', '30000', 'Dziugas', 'Andruskevicius'),
('m', '', 'm', 'm'),
('oooo', '', 'ooo', 'ooo'),
('q', '', 'q', 'q'),
('qsd', '', 'qsd', 'qs'),
('test', '333333', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `refproduit` char(10) NOT NULL,
  `designproduit` char(30) NOT NULL,
  `descproduit` text NOT NULL,
  `photoproduit` char(30) NOT NULL,
  `prixproduit` int(11) NOT NULL,
  `notype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`refproduit`, `designproduit`, `descproduit`, `photoproduit`, `prixproduit`, `notype`) VALUES
('', '', '', '', 0, 0),
('1', '1', '1', '', 1, 0),
('1010', 'test', 'test', '', 100, 0),
('200', 'sad', 'sad', '', 20, 0),
('2000', 'kompiuteris1', 'asdasdkaskd', '', 200, 0),
('2002', 'Souris', 'lol', '', 10, 0),
('20020', 'Souris', 'C''est une souris sans fils', '', 5, 0),
('300', 'lol', 'test', '', 20, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `notype` int(11) NOT NULL,
  `nomtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`notype`, `nomtype`) VALUES
(1, 'Souris Sans-Fil'),
(2, 'Souris'),
(3, 'test'),
(4, '220'),
(5, 'aaa'),
(6, 'a'),
(7, 'a'),
(8, 'a'),
(9, '1'),
(10, 'kompiuteris');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`refproduit`),
  ADD KEY `notype` (`notype`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`notype`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `notype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
