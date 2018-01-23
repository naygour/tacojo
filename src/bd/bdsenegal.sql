-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 29 Janvier 2017 à 22:51
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdsenegal`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `mdp`) VALUES
(1, '1234', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1');

-- --------------------------------------------------------

--
-- Structure de la table `dispensation`
--

CREATE TABLE `dispensation` (
  `id_dispensation` int(11) NOT NULL,
  `num_inclusion` varchar(255) NOT NULL,
  `etat_dispensation` int(11) NOT NULL,
  `date_dispensation` date NOT NULL,
  `protocole` varchar(255) NOT NULL,
  `nb_jours_traitement` int(11) DEFAULT NULL,
  `date_fin_traitement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dispensation`
--

INSERT INTO `dispensation` (`id_dispensation`, `num_inclusion`, `etat_dispensation`, `date_dispensation`, `protocole`, `nb_jours_traitement`, `date_fin_traitement`) VALUES
(2, 'M0001', 2, '2017-01-18', '', 18, '0000-00-00'),
(3, 'sdqsdqd', 3, '0000-00-00', '', 1, '0000-00-00'),
(4, 'sdqsdqd', 2, '2015-12-12', '', 1, '0000-00-00'),
(5, '234322', 1, '2017-01-20', '', 15, '2017-02-04'),
(6, '234322', 1, '2017-01-31', '', 40, '2017-03-12'),
(7, 'sdqsdqd', 1, '2017-01-20', '', 10, '2017-01-30'),
(8, 'sdqsdqd', 1, '2017-01-20', '', 10, '2017-01-30'),
(9, 'sdqsdqd', 1, '2017-01-20', '', 15, '2017-02-04'),
(10, 'sdqsdqd', 1, '2017-01-12', '', 10, '2017-01-22'),
(11, 'sdqsdqd', 4, '0000-00-00', '', 0, '0000-00-00'),
(12, 'sdqsdqd', 1, '0000-00-00', '', 0, '0000-00-00'),
(13, 'sdqsdqd', 1, '0000-00-00', '', 0, '0000-00-00'),
(14, 'sdqsdqd', 1, '2017-01-05', '', 10, '2017-01-15'),
(15, 'sdqsdqd', 5, '0000-00-00', '', 0, '0000-00-00'),
(16, 'sdqsdqd', 1, '2017-01-01', '', 1, '2017-01-02'),
(17, 'sdqsdqd', 1, '2017-01-01', '', 1, '2017-01-02'),
(18, 'M1001', 1, '2017-01-29', '', 10, '2017-02-08'),
(19, 'M1001', 1, '2017-01-10', '', 5, '2017-01-15'),
(20, 'M1001', 1, '2017-01-10', '', 10, '2017-01-20'),
(21, 'M1001', 1, '2017-01-20', '', 10, '2017-01-30'),
(22, 'M1001', 1, '2017-01-01', '', 1, '2017-01-02'),
(23, 'M1001', 1, '2017-01-02', '', 2, '2017-01-04');

-- --------------------------------------------------------

--
-- Structure de la table `etat_dispensation`
--

CREATE TABLE `etat_dispensation` (
  `id_etat_dispen` int(11) NOT NULL,
  `nom_etat_dispen` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat_dispensation`
--

INSERT INTO `etat_dispensation` (`id_etat_dispen`, `nom_etat_dispen`) VALUES
(1, 'PrÃ©sent'),
(2, 'Absent'),
(3, 'DÃ©cÃ©dÃ©'),
(4, 'Abandon'),
(5, 'Transfert sortant');

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

CREATE TABLE `ligne` (
  `id_ligne` int(11) NOT NULL,
  `nom_ligne` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligne`
--

INSERT INTO `ligne` (`id_ligne`, `nom_ligne`) VALUES
(1, 'L1'),
(2, 'L2'),
(3, 'L3');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `num_id_national` varchar(255) DEFAULT NULL,
  `num_inclusion` varchar(255) NOT NULL,
  `profil_serologique` int(11) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `protocole` int(11) NOT NULL,
  `poids` float DEFAULT NULL,
  `ligne` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `num_id_national`, `num_inclusion`, `profil_serologique`, `sexe`, `date_de_naissance`, `protocole`, `poids`, `ligne`) VALUES
(1, 'qsdqsdqsd', 'sdqsdqd', 1, '', '0000-00-00', 2, 0, '1'),
(2, '131', '234322', 1, 'F', '0000-00-00', 1, 0, '1'),
(3, 'E230218', 'M1001', 3, 'M', '1990-10-10', 20, 60, '1');

-- --------------------------------------------------------

--
-- Structure de la table `profil_serologique`
--

CREATE TABLE `profil_serologique` (
  `id_profil` int(11) NOT NULL,
  `nom_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profil_serologique`
--

INSERT INTO `profil_serologique` (`id_profil`, `nom_profil`) VALUES
(1, 'VIH1'),
(2, 'VIH2'),
(3, 'VIH1+VIH2');

-- --------------------------------------------------------

--
-- Structure de la table `protocole`
--

CREATE TABLE `protocole` (
  `id_proto` int(11) NOT NULL,
  `type_protocole` int(11) NOT NULL,
  `nom_proto` varchar(255) NOT NULL,
  `adulte` tinyint(1) NOT NULL,
  `enfant` tinyint(1) NOT NULL,
  `remarque` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `protocole`
--

INSERT INTO `protocole` (`id_proto`, `type_protocole`, `nom_proto`, `adulte`, `enfant`, `remarque`) VALUES
(1, 1, 'ABC+3TC+EFV', 0, 1, 'enfant > 3 ans ou poids > 10kg (EFV)'),
(2, 1, 'ABC+3TC+LPV/r', 1, 1, 'enfant > 14 jours (LPV/r)'),
(3, 1, 'ABC+3TC+NVP', 0, 1, ''),
(4, 1, 'AZT+3TC+ABC', 0, 1, ''),
(5, 1, 'AZT+3TC+DRV/r', 1, 0, ''),
(6, 1, 'AZT+3TC+EFV', 1, 1, 'enfant > 3 ans ou poids > 10kg (EFV)'),
(7, 1, 'AZT+3TC+LPV/r', 1, 1, 'enfant > 14 jours (LPV/r)'),
(8, 1, 'AZT+3TC+NVP', 1, 1, ''),
(9, 1, 'AZT+TDF+3TC+DRV/r', 1, 0, ''),
(10, 1, 'AZT+TDF+3TC+LPV/r', 1, 0, ''),
(11, 1, 'AZT+TDF+FTC+LPV/r', 1, 0, ''),
(12, 1, 'AZT+TDF+FTC+LPV/r', 1, 0, ''),
(13, 1, 'DRV/r+RAL+ETR', 1, 0, ''),
(14, 1, 'TDF+3TC+DRV/r', 1, 0, ''),
(15, 1, 'TDF+3TC+EFV', 1, 1, 'enfant > 3 ans ou poids > 10kg (EFV)'),
(16, 1, 'TDF+3TC+LPV/r', 1, 1, 'enfant > 2 ans (TDF)'),
(17, 1, 'TDF+3TC+NVP', 1, 1, 'enfant > 2 ans (TDF)'),
(18, 1, 'TDF+FTC+EFV', 1, 1, 'enfant > 3 ans ou poids > 10kg (EFV)'),
(19, 1, 'TDF+FTC+LPV/r', 1, 0, ''),
(20, 1, 'TDF+FTC+NVP', 1, 1, 'enfant > 2 ans (TDF)'),
(21, 2, 'ABC+ABC+ABC', 1, 0, 'Adulte');

-- --------------------------------------------------------

--
-- Structure de la table `suivi_presence`
--

CREATE TABLE `suivi_presence` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `mois` int(11) NOT NULL,
  `etat_dispensation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `suivi_presence`
--

INSERT INTO `suivi_presence` (`id`, `id_patient`, `annee`, `mois`, `etat_dispensation`) VALUES
(19, 3, 2017, 1, 0),
(20, 3, 2017, 2, 0),
(21, 3, 2017, 1, 0),
(22, 3, 2017, 1, 0),
(23, 3, 2017, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_protocole`
--

CREATE TABLE `type_protocole` (
  `id_type_protocole` int(11) NOT NULL,
  `type_protocole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_protocole`
--

INSERT INTO `type_protocole` (`id_type_protocole`, `type_protocole`) VALUES
(1, 'National'),
(2, 'Atypique');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dispensation`
--
ALTER TABLE `dispensation`
  ADD PRIMARY KEY (`id_dispensation`);

--
-- Index pour la table `etat_dispensation`
--
ALTER TABLE `etat_dispensation`
  ADD PRIMARY KEY (`id_etat_dispen`);

--
-- Index pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD PRIMARY KEY (`id_ligne`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`),
  ADD UNIQUE KEY `num_inclusion` (`num_inclusion`),
  ADD UNIQUE KEY `num_id_national` (`num_id_national`);

--
-- Index pour la table `profil_serologique`
--
ALTER TABLE `profil_serologique`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `protocole`
--
ALTER TABLE `protocole`
  ADD PRIMARY KEY (`id_proto`);

--
-- Index pour la table `suivi_presence`
--
ALTER TABLE `suivi_presence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_protocole`
--
ALTER TABLE `type_protocole`
  ADD PRIMARY KEY (`id_type_protocole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `dispensation`
--
ALTER TABLE `dispensation`
  MODIFY `id_dispensation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `etat_dispensation`
--
ALTER TABLE `etat_dispensation`
  MODIFY `id_etat_dispen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ligne`
--
ALTER TABLE `ligne`
  MODIFY `id_ligne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `profil_serologique`
--
ALTER TABLE `profil_serologique`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `protocole`
--
ALTER TABLE `protocole`
  MODIFY `id_proto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `suivi_presence`
--
ALTER TABLE `suivi_presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `type_protocole`
--
ALTER TABLE `type_protocole`
  MODIFY `id_type_protocole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
