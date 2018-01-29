-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 06 Novembre 2017 à 16:32
-- Version du serveur :  5.5.57-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdsenegal`
--

-- --------------------------------------------------------

--
-- Structure de la table `ASS_GRADE_DROIT`
--

CREATE TABLE IF NOT EXISTS `ASS_GRADE_DROIT` (
  `id_grade` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ASS_GRADE_DROIT`
--

INSERT INTO `ASS_GRADE_DROIT` (`id_grade`, `id_droit`) VALUES
(1, 11),
(2, 10),
(3, 7),
(3, 8),
(3, 9),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `CENTRE`
--

CREATE TABLE IF NOT EXISTS `CENTRE` (
`id_centre` int(11) NOT NULL,
  `nom_centre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `niveau_centre` int(11) NOT NULL,
  `structure_centre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `CENTRE`
--

INSERT INTO `CENTRE` (`id_centre`, `nom_centre`, `niveau_centre`, `structure_centre`) VALUES
(1, 'centre principal', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `CO_INFECTION`
--

CREATE TABLE IF NOT EXISTS `CO_INFECTION` (
`id_co_infection` int(11) NOT NULL,
  `nom_co_infection` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `CO_INFECTION`
--

INSERT INTO `CO_INFECTION` (`id_co_infection`, `nom_co_infection`) VALUES
(1, 'AUCUNE'),
(2, 'VHB'),
(3, 'VHC'),
(4, 'TB');

-- --------------------------------------------------------

--
-- Structure de la table `DISPENSATION`
--

CREATE TABLE IF NOT EXISTS `DISPENSATION` (
`id_dispensation` int(11) NOT NULL,
  `num_inclusion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `etat_dispensation` int(11) NOT NULL,
  `date_dispensation` date NOT NULL,
  `date_debut_traitement` date NOT NULL,
  `nb_jours_traitement` int(11) DEFAULT NULL,
  `date_fin_traitement` date DEFAULT NULL,
  `rdv` date NOT NULL,
  `poids` int(11) NOT NULL,
  `observations` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `DISPENSATION`
--

INSERT INTO `DISPENSATION` (`id_dispensation`, `num_inclusion`, `etat_dispensation`, `date_dispensation`, `date_debut_traitement`, `nb_jours_traitement`, `date_fin_traitement`, `rdv`, `poids`, `observations`) VALUES
(7, 'M0001', 1, '2017-01-03', '0000-00-00', 14, '2017-01-04', '2017-06-13', 0, ''),
(8, 'M0001', 1, '2017-01-03', '0000-00-00', 14, '2017-01-04', '0000-00-00', 0, ''),
(9, 'M111', 1, '2017-01-02', '0000-00-00', 15, '2017-01-03', '0000-00-00', 0, ''),
(10, 'M111', 1, '2017-02-07', '0000-00-00', 15, '0000-00-00', '2017-07-12', 0, ''),
(11, 'M222', 1, '2017-02-07', '0000-00-00', 10, '0000-00-00', '2017-09-13', 0, ''),
(12, 'M222', 1, '2017-02-08', '0000-00-00', 40, '0000-00-00', '2017-08-09', 0, ''),
(13, 'M111', 1, '2017-02-24', '0000-00-00', 10, '2017-03-06', '2017-06-18', 0, ''),
(14, 'Z30023', 1, '2017-01-21', '0000-00-00', 10, '2017-01-31', '0000-00-00', 0, ''),
(15, 'Z30023', 1, '2017-02-17', '0000-00-00', 20, '2017-03-09', '2017-06-24', 0, ''),
(16, '132313', 1, '2017-01-14', '0000-00-00', 30, '2017-02-13', '2017-09-20', 0, ''),
(17, 'M139942', 1, '2017-01-21', '0000-00-00', 35, '2017-02-25', '2017-06-13', 0, ''),
(18, 'Z30023', 3, '2017-04-01', '0000-00-00', 0, '0000-00-00', '0000-00-00', 0, ''),
(19, 'Z30023', 1, '2017-05-01', '0000-00-00', 30, '2017-05-31', '2017-06-30', 0, ''),
(20, 'Z30023', 1, '2017-04-01', '0000-00-00', 0, '2017-04-22', '0000-00-00', 0, ''),
(21, 'Z20034', 1, '2017-02-21', '0000-00-00', 90, '2017-05-22', '2017-06-02', 0, ''),
(22, '', 1, '2017-03-01', '0000-00-00', 30, '2017-03-31', '0000-00-00', 0, ''),
(23, '', 1, '2017-04-01', '0000-00-00', 30, '2017-05-01', '2017-06-13', 0, ''),
(24, 'Z20064', 1, '2017-04-01', '0000-00-00', 0, '0000-00-00', '2017-06-20', 0, ''),
(25, 'M111', 1, '2017-04-01', '0000-00-00', 30, '2017-05-01', '2017-06-20', 0, ''),
(26, 'M139942', 1, '2017-04-01', '0000-00-00', 30, '2017-05-01', '2017-09-12', 0, ''),
(27, '333', 1, '2017-03-01', '0000-00-00', 60, '2017-04-30', '0000-00-00', 16, ''),
(28, '333', 1, '2017-05-03', '0000-00-00', 30, '2017-05-31', '2017-06-18', 0, ''),
(44, 'Z20034', 1, '2017-04-01', '2017-04-01', 30, '2017-05-01', '2017-04-01', 46, 'Bahh');

-- --------------------------------------------------------

--
-- Structure de la table `DROIT`
--

CREATE TABLE IF NOT EXISTS `DROIT` (
`id_droit` int(11) NOT NULL,
  `remarque` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `DROIT`
--

INSERT INTO `DROIT` (`id_droit`, `remarque`) VALUES
(1, 'Droits d''accÃ¨s aux fonctions courantes du module de Gestion de la dispensation, y compris les fonctions de gestion des dossiers patients sous traitement ARV.'),
(2, 'Droit d''accÃ¨s en mode consultation aux tables de rÃ©fÃ©rence liÃ©es au module de Gestion de la dispensation'),
(3, 'Droit d''accÃ¨s ouvert Ã  la table correspondant aux dossiers Patients'),
(4, 'Droits d''accÃ¨s aux fonctions de saisie des rapports sous le module de Gestion du systÃ¨me d''information logistique'),
(5, 'Droit d''accÃ¨s en mode consultation aux tables de rÃ©fÃ©rence et de paramÃ©trage du module de Gestion du systÃ¨me d''information logistique '),
(6, 'Droits d''accÃ¨s aux fonctions de saisie et d''Ã©dition des rapports sous le module de Gestion du systÃ¨me d''information logistique'),
(7, 'Droits d''accÃ¨s aux fonctions d''Ã©dition des rapports sous le module de Gestion du systÃ¨me d''information logistique'),
(8, 'Droit d''accÃ¨s en mode consultation et modification partielle aux tables de rÃ©fÃ©rence et de paramÃ©trage du module de Gestion du systÃ¨me d''information logistique'),
(9, 'Droits d''accÃ¨s pour le responsable de chaque structure Ã  la fonction de mise Ã  jour de la base de donnÃ©es (importation des tables de mise Ã  jour lorsqu''elles sont envoyÃ©es par le niveau central)'),
(10, 'Droits d''accÃ¨s en mode consultation uniquement Ã  tous les menus, fonctions et tables du logiciels '),
(11, 'Droits d''accÃ¨s au module de gestion des utilisateurs: crÃ©ation d''un nouvel utilisateur, gestion des droits d''accÃ¨s');

-- --------------------------------------------------------

--
-- Structure de la table `ETAT_DISPENSATION`
--

CREATE TABLE IF NOT EXISTS `ETAT_DISPENSATION` (
`id_etat_dispen` int(11) NOT NULL,
  `nom_etat_dispen` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ETAT_DISPENSATION`
--

INSERT INTO `ETAT_DISPENSATION` (`id_etat_dispen`, `nom_etat_dispen`) VALUES
(1, 'Présent'),
(2, 'Absent'),
(3, 'Décédé'),
(4, 'Abandon'),
(5, 'Transfert sortant');

-- --------------------------------------------------------

--
-- Structure de la table `GRADE`
--

CREATE TABLE IF NOT EXISTS `GRADE` (
`id_grade` int(11) NOT NULL,
  `nom_grade` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `GRADE`
--

INSERT INTO `GRADE` (`id_grade`, `nom_grade`, `id_role`) VALUES
(1, 'Administrateur', 5),
(2, 'Superviseur', 4),
(3, 'Responsable', 3),
(4, 'Gestionnaire des données', 2),
(5, 'Dispensateur', 1)
(6, 'Assistant Social', 8);

-- --------------------------------------------------------

--
-- Structure de la table `INCLUSION`
--

CREATE TABLE IF NOT EXISTS `INCLUSION` (
  `idInclusion` varchar(255) NOT NULL,
  `dateInclusion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `LIGNE`
--

CREATE TABLE IF NOT EXISTS `LIGNE` (
`id_ligne` int(11) NOT NULL,
  `nom_ligne` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `LIGNE`
--

INSERT INTO `LIGNE` (`id_ligne`, `nom_ligne`) VALUES
(1, 'L1'),
(2, 'L2'),
(3, 'L3');

-- --------------------------------------------------------

--
-- Structure de la table `MEDICAMENT`
--

CREATE TABLE IF NOT EXISTS `MEDICAMENT` (
`id_medicament` int(11) NOT NULL,
  `acronyme_medicament` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nom_medicament` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `MEDICAMENT`
--

INSERT INTO `MEDICAMENT` (`id_medicament`, `acronyme_medicament`, `nom_medicament`) VALUES
(1, '3TC', 'Lamivudine'),
(2, 'ABC', 'Abacavir'),
(4, 'ATV', 'Atazanavir'),
(5, 'AZT', 'Zidovudine'),
(8, 'EFV', 'Efavirenz'),
(9, 'LPV/r', 'Lopinavir/Ritonavir'),
(13, 'TDF', 'Ténofovir'),
(16, 'DRV', 'Darunavir'),
(17, 'FTC', 'Emtricitabine'),
(18, 'NVP', 'Névirapine'),
(21, 'DTG', 'Dolutegravir'),
(22, 'RAL', 'Raltégravir'),
(23, 'RTV', 'Ritonavir');

-- --------------------------------------------------------

--
-- Structure de la table `NIVEAU`
--

CREATE TABLE IF NOT EXISTS `NIVEAU` (
`id_niveau` int(11) NOT NULL,
  `nom_niveau` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `NIVEAU`
--

INSERT INTO `NIVEAU` (`id_niveau`, `nom_niveau`) VALUES
(1, 'niveau central'),
(2, 'niveau intermédiaire'),
(3, 'niveau périphérique');

-- --------------------------------------------------------

--
-- Structure de la table `PATIENT`
--

CREATE TABLE IF NOT EXISTS `PATIENT` (
`id_patient` int(11) NOT NULL,
  `num_id_national` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `num_inclusion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `profil_serologique` int(11) NOT NULL,
  `sexe` varchar(1) CHARACTER SET utf8 NOT NULL,
  `date_de_naissance` date NOT NULL,
  `protocole` int(11) NOT NULL,
  `poids` float DEFAULT NULL,
  `ligne` int(11) NOT NULL,
  `co_infections` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123456819 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `PATIENT`
--

INSERT INTO `PATIENT` (`id_patient`, `num_id_national`, `num_inclusion`, `profil_serologique`, `sexe`, `date_de_naissance`, `protocole`, `poids`, `ligne`, `co_infections`) VALUES
(123456795, '111', 'M111', 1, 'M', '2017-01-02', 1, 55, 2, 1),
(123456796, '222', 'M222', 1, 'F', '2017-01-09', 16, 45, 2, 1),
(123456797, '', 'Z30023', 2, 'F', '2016-07-06', 7, 49.1, 1, 1),
(123456798, '2320013', '132313', 1, 'M', '1990-10-10', 1, 50, 1, 1),
(123456799, '4400491', 'M139942', 3, 'M', '2002-10-12', 64, 45, 2, 1),
(123456800, '023102M0989', '', 1, 'F', '1980-04-22', 6, 0, 1, 1),
(123456810, '021101P0014', 'Z20034', 1, 'F', '1952-05-17', 18, 56, 1, 3),
(123456811, '021101C0078', 'Z20064', 1, 'M', '0000-00-00', 1, 0, 1, 1),
(123456812, '3', '333', 3, 'M', '2000-05-15', 11, 0, 1, 1),
(123456813, 'testSatut', 'TestStatut', 1, 'M', '1555-01-06', 16, 0, 3, 1),
(123456814, 'statut', 'statut', 1, 'M', '1999-01-06', 1, 0, 1, 1),
(123456815, 'M010101', 'M0001', 1, 'F', '2000-02-06', 5, 0, 2, 1),
(123456816, 'MZZZZ', 'MZZZZ', 3, 'M', '2017-02-02', 1, 0, 3, 1),
(123456817, '151bfd', '10001', 2, 'F', '1998-02-17', 2, 0, 2, 1),
(123456818, '115974661', 'B47', 3, 'F', '1994-11-09', 9, 0, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `PROFIL_SEROLOGIQUE`
--

CREATE TABLE IF NOT EXISTS `PROFIL_SEROLOGIQUE` (
`id_profil` int(11) NOT NULL,
  `nom_profil` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `PROFIL_SEROLOGIQUE`
--

INSERT INTO `PROFIL_SEROLOGIQUE` (`id_profil`, `nom_profil`) VALUES
(1, 'VIH1'),
(2, 'VIH2'),
(3, 'VIH1+2');

-- --------------------------------------------------------

--
-- Structure de la table `PROTOCOLE`
--

CREATE TABLE IF NOT EXISTS `PROTOCOLE` (
`id_proto` int(11) NOT NULL,
  `type_protocole` int(11) NOT NULL,
  `nom_proto` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adulte` varchar(1) CHARACTER SET utf8 NOT NULL,
  `enfant` varchar(1) CHARACTER SET utf8 NOT NULL,
  `remarque` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `PROTOCOLE`
--

INSERT INTO `PROTOCOLE` (`id_proto`, `type_protocole`, `nom_proto`, `adulte`, `enfant`, `remarque`) VALUES
(1, 1, 'ABC+3TC+EFV', '0', '1', 'enfant > 3 ans ou poids > 10kg (EFV)'),
(2, 1, 'ABC+3TC+LPV/r', '1', '1', 'enfant > 14 jours (LPV/r)'),
(3, 1, 'ABC+3TC+NVP', '0', '1', ''),
(4, 1, 'AZT+3TC+ABC', '0', '1', ''),
(5, 1, 'AZT+3TC+DRV/r', '1', '0', ''),
(6, 1, 'AZT+3TC+EFV', '1', '1', 'enfant > 3 ans ou poids > 10kg (EFV)'),
(7, 1, 'AZT+3TC+LPV/r', '1', '1', 'enfant > 14 jours (LPV/r)'),
(8, 1, 'AZT+3TC+NVP', '1', '1', ''),
(9, 1, 'AZT+TDF+3TC+DRV/r', '1', '0', ''),
(10, 1, 'AZT+TDF+3TC+LPV/r', '1', '0', ''),
(11, 1, 'AZT+TDF+FTC+LPV/r', '1', '0', ''),
(12, 1, 'AZT+TDF+FTC+LPV/r', '1', '0', ''),
(13, 1, 'DRV/r+RAL+ETR', '1', '0', ''),
(14, 1, 'TDF+3TC+DRV/r', '1', '0', ''),
(15, 1, 'TDF+3TC+EFV', '1', '1', 'enfant > 3 ans ou poids > 10kg (EFV)'),
(16, 1, 'TDF+3TC+LPV/r', '1', '1', 'enfant > 2 ans (TDF)'),
(17, 1, 'TDF+3TC+NVP', '1', '1', 'enfant > 2 ans (TDF)'),
(18, 1, 'TDF+FTC+EFV', '1', '1', 'enfant > 3 ans ou poids > 10kg (EFV)'),
(19, 1, 'TDF+FTC+LPV/r', '1', '0', ''),
(20, 1, 'TDF+FTC+NVP', '1', '1', 'enfant > 2 ans (TDF)'),
(42, 2, 'ABC+3TC+ATV/r', '1', '1', 'enfant > 3 mois (ATV/r)'),
(44, 1, 'ABC+3TC+DTG', '1', '1', 'cfdbhsuvdbsvjnsd'),
(47, 1, 'ABC+3TC+RAL', '0', '1', 'enfant > 4 semaines (RAL)'),
(48, 1, 'ABC+FTC+ATV/r', '0', '1', 'enfant > 3 mois (ATV/r)'),
(49, 1, 'ABC+FTC+DTG', '1', '0', ''),
(50, 1, 'ABC+FTC+LPV/r', '0', '1', 'enfant > 14 jours (LPV/r)'),
(51, 1, 'ABC+FTC+NVP', '1', '0', ''),
(52, 1, 'AZT+3TC+ATV/r', '1', '1', 'enfant > 3 mois (ATV/r)'),
(53, 1, 'AZT+3TC+RAL', '0', '1', 'enfant > 4 semaines (RAL)'),
(54, 1, 'AZT+TDF+3TC+ATV/r', '1', '0', ''),
(55, 1, 'AZT+TDF+FTC+ATV/r', '1', '0', ''),
(56, 1, 'TDF+3TC+ATV/r', '1', '1', 'enfant > 2 ans (TDF)'),
(57, 1, 'TDF+3TC+DTG', '1', '0', ''),
(58, 1, 'TDF+FTC+ATV/r', '1', '1', 'enfant > 2 ans (TDF)'),
(59, 1, 'TDF+FTC+DRV/r', '1', '0', ''),
(60, 1, 'TDF+FTC+DTG', '1', '0', ''),
(62, 1, 'ARV1 + ARV2 + ARV3', '2', '0', ''),
(64, 2, 'ARV1+ARV2+ARV3', '0', '1', 'enfant > 10 semaines'),
(65, 1, 'TEST', 'X', ' ', ''),
(66, 1, 'TEST2', ' ', 'X', ''),
(67, 1, 'petitTest', 'X', ' ', 'Ceci est un test'),
(68, 2, 'blabla', 'X', 'X', '');

-- --------------------------------------------------------

--
-- Structure de la table `RAPPORT`
--

CREATE TABLE IF NOT EXISTS `RAPPORT` (
`Id` int(100) NOT NULL,
  `Age` int(3) NOT NULL,
  `Sexe` varchar(2) CHARACTER SET utf8 NOT NULL,
  `Nb_patient_suivit` int(10) NOT NULL,
  `Nb_patient_nouveau` int(10) NOT NULL,
  `Nb_patient_decede` int(10) NOT NULL,
  `Nb_patient_PDV` int(10) NOT NULL,
  `Nb_patient_PDV_revenu` int(10) NOT NULL,
  `Nb_patient_transfere_TE` int(10) NOT NULL,
  `Nb_patient_transfere_TA` int(10) NOT NULL,
  `Nb_patient_suivit_regulierement` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `RAPPORT`
--

INSERT INTO `RAPPORT` (`Id`, `Age`, `Sexe`, `Nb_patient_suivit`, `Nb_patient_nouveau`, `Nb_patient_decede`, `Nb_patient_PDV`, `Nb_patient_PDV_revenu`, `Nb_patient_transfere_TE`, `Nb_patient_transfere_TA`, `Nb_patient_suivit_regulierement`) VALUES
(1, 0, 'M', 1, 2, 0, 1, 0, 2, 0, 3),
(2, 3, 'H', 1, 3, 4, 2, 1, 5, 6, 2),
(3, 12, 'F', 1, 0, 1, 0, 3, 0, 1, 4),
(4, 43, 'F', 0, 2, 3, 0, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `STRUCTURE`
--

CREATE TABLE IF NOT EXISTS `STRUCTURE` (
`id_structure` int(11) NOT NULL,
  `nom_structure` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `STRUCTURE`
--

INSERT INTO `STRUCTURE` (`id_structure`, `nom_structure`) VALUES
(1, 'centre hospitalier régional'),
(2, 'district sanitaire');

-- --------------------------------------------------------

--
-- Structure de la table `SUIVI_PRESENCE`
--

CREATE TABLE IF NOT EXISTS `SUIVI_PRESENCE` (
`id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `mois` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `SUIVI_PRESENCE`
--

INSERT INTO `SUIVI_PRESENCE` (`id`, `id_patient`, `annee`, `mois`) VALUES
(1, 123456795, 2017, 1),
(2, 123456796, 2017, 1),
(3, 123456796, 2017, 2),
(4, 123456795, 2017, 2),
(5, 123456797, 2017, 1),
(6, 123456797, 2017, 2),
(7, 123456798, 2017, 1),
(8, 123456799, 2017, 1),
(9, 123456797, 2017, 4),
(10, 123456797, 2017, 5),
(11, 123456797, 2017, 6),
(12, 123456810, 2017, 2),
(13, 123456800, 2017, 3),
(14, 123456800, 2017, 4),
(15, 123456811, 2017, 4),
(16, 123456795, 2017, 4),
(17, 123456799, 2017, 4),
(18, 123456812, 2017, 3),
(19, 123456812, 2017, 5),
(38, 123456810, 2017, 4);

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_PROTOCOLE`
--

CREATE TABLE IF NOT EXISTS `TYPE_PROTOCOLE` (
`id_type_protocole` int(11) NOT NULL,
  `type_protocole` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `TYPE_PROTOCOLE`
--

INSERT INTO `TYPE_PROTOCOLE` (`id_type_protocole`, `type_protocole`) VALUES
(1, 'Pré-enregistré'),
(2, 'Atypique');

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE IF NOT EXISTS `UTILISATEUR` (
`id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom_utilisateur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 NOT NULL,
  `grade` int(11) NOT NULL,
  `centre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `login`, `mdp`, `grade`, `centre`) VALUES
(6, 'Administrateur', 'admin', 'admin@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1, 1),
(7, 'Superviseur', 'super', 'super', '095fd63ec4594cc8117cce148c660d64ba02adab', 2, 1),
(8, 'Responsable', 'respon', 'respon', 'c3122308c6bc90b6fb8102ed343c47e030a21103', 3, 1),
(9, 'Gestionnaire des donnÃ©es', 'gestionnaire', 'gestio', '8c1e8f6f2816034c641d1ddcef0542072c268e65', 4, 1),
(10, 'Dispensateur', 'dispensateur', 'dispen', 'ed81bcc002eddf559ad9dda6699c63ffe0631974', 5, 1),
(11, 'Nom test', 'PrÃ©nom test', 'Test', '4028a0e356acc947fcd2bfbf00cef11e128d484a', 1, 0),
(12, 'Test 1', '<f<f', 's<fg', '891c9c8874143c1064754972536452b8a447f1b8', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ASS_GRADE_DROIT`
--
ALTER TABLE `ASS_GRADE_DROIT`
 ADD PRIMARY KEY (`id_grade`,`id_droit`), ADD KEY `id_grade` (`id_grade`), ADD KEY `id_droit` (`id_droit`);

--
-- Index pour la table `CENTRE`
--
ALTER TABLE `CENTRE`
 ADD PRIMARY KEY (`id_centre`), ADD KEY `structure_centre` (`structure_centre`), ADD KEY `niveau_centre` (`niveau_centre`);

--
-- Index pour la table `CO_INFECTION`
--
ALTER TABLE `CO_INFECTION`
 ADD PRIMARY KEY (`id_co_infection`);

--
-- Index pour la table `DISPENSATION`
--
ALTER TABLE `DISPENSATION`
 ADD PRIMARY KEY (`id_dispensation`), ADD KEY `etat_dispensation` (`etat_dispensation`);

--
-- Index pour la table `DROIT`
--
ALTER TABLE `DROIT`
 ADD PRIMARY KEY (`id_droit`);

--
-- Index pour la table `ETAT_DISPENSATION`
--
ALTER TABLE `ETAT_DISPENSATION`
 ADD PRIMARY KEY (`id_etat_dispen`);

--
-- Index pour la table `GRADE`
--
ALTER TABLE `GRADE`
 ADD PRIMARY KEY (`id_grade`);

--
-- Index pour la table `INCLUSION`
--
ALTER TABLE `INCLUSION`
 ADD PRIMARY KEY (`idInclusion`);

--
-- Index pour la table `LIGNE`
--
ALTER TABLE `LIGNE`
 ADD PRIMARY KEY (`id_ligne`);

--
-- Index pour la table `MEDICAMENT`
--
ALTER TABLE `MEDICAMENT`
 ADD PRIMARY KEY (`id_medicament`);

--
-- Index pour la table `NIVEAU`
--
ALTER TABLE `NIVEAU`
 ADD PRIMARY KEY (`id_niveau`);

--
-- Index pour la table `PATIENT`
--
ALTER TABLE `PATIENT`
 ADD PRIMARY KEY (`id_patient`), ADD KEY `profil_serologique` (`profil_serologique`), ADD KEY `protocole` (`protocole`), ADD KEY `ligne` (`ligne`), ADD KEY `num_inclusion` (`num_inclusion`), ADD KEY `co_infections` (`co_infections`);

--
-- Index pour la table `PROFIL_SEROLOGIQUE`
--
ALTER TABLE `PROFIL_SEROLOGIQUE`
 ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `PROTOCOLE`
--
ALTER TABLE `PROTOCOLE`
 ADD PRIMARY KEY (`id_proto`), ADD KEY `type_protocole` (`type_protocole`);

--
-- Index pour la table `RAPPORT`
--
ALTER TABLE `RAPPORT`
 ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `STRUCTURE`
--
ALTER TABLE `STRUCTURE`
 ADD PRIMARY KEY (`id_structure`);

--
-- Index pour la table `SUIVI_PRESENCE`
--
ALTER TABLE `SUIVI_PRESENCE`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TYPE_PROTOCOLE`
--
ALTER TABLE `TYPE_PROTOCOLE`
 ADD PRIMARY KEY (`id_type_protocole`);

--
-- Index pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
 ADD PRIMARY KEY (`id_utilisateur`), ADD KEY `grade` (`grade`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `CENTRE`
--
ALTER TABLE `CENTRE`
MODIFY `id_centre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `CO_INFECTION`
--
ALTER TABLE `CO_INFECTION`
MODIFY `id_co_infection` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `DISPENSATION`
--
ALTER TABLE `DISPENSATION`
MODIFY `id_dispensation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `DROIT`
--
ALTER TABLE `DROIT`
MODIFY `id_droit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `ETAT_DISPENSATION`
--
ALTER TABLE `ETAT_DISPENSATION`
MODIFY `id_etat_dispen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `GRADE`
--
ALTER TABLE `GRADE`
MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `LIGNE`
--
ALTER TABLE `LIGNE`
MODIFY `id_ligne` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `MEDICAMENT`
--
ALTER TABLE `MEDICAMENT`
MODIFY `id_medicament` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `NIVEAU`
--
ALTER TABLE `NIVEAU`
MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `PATIENT`
--
ALTER TABLE `PATIENT`
MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123456819;
--
-- AUTO_INCREMENT pour la table `PROFIL_SEROLOGIQUE`
--
ALTER TABLE `PROFIL_SEROLOGIQUE`
MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `PROTOCOLE`
--
ALTER TABLE `PROTOCOLE`
MODIFY `id_proto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `RAPPORT`
--
ALTER TABLE `RAPPORT`
MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `STRUCTURE`
--
ALTER TABLE `STRUCTURE`
MODIFY `id_structure` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `SUIVI_PRESENCE`
--
ALTER TABLE `SUIVI_PRESENCE`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `TYPE_PROTOCOLE`
--
ALTER TABLE `TYPE_PROTOCOLE`
MODIFY `id_type_protocole` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ASS_GRADE_DROIT`
--
ALTER TABLE `ASS_GRADE_DROIT`
ADD CONSTRAINT `ASS_GRADE_DROIT_ibfk_1` FOREIGN KEY (`id_grade`) REFERENCES `GRADE` (`id_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ASS_GRADE_DROIT_ibfk_2` FOREIGN KEY (`id_droit`) REFERENCES `DROIT` (`id_droit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `CENTRE`
--
ALTER TABLE `CENTRE`
ADD CONSTRAINT `CENTRE_ibfk_1` FOREIGN KEY (`structure_centre`) REFERENCES `STRUCTURE` (`id_structure`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `CENTRE_ibfk_2` FOREIGN KEY (`niveau_centre`) REFERENCES `NIVEAU` (`id_niveau`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `DISPENSATION`
--
ALTER TABLE `DISPENSATION`
ADD CONSTRAINT `DISPENSATION_ibfk_1` FOREIGN KEY (`etat_dispensation`) REFERENCES `ETAT_DISPENSATION` (`id_etat_dispen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PATIENT`
--
ALTER TABLE `PATIENT`
ADD CONSTRAINT `PATIENT_ibfk_4` FOREIGN KEY (`co_infections`) REFERENCES `CO_INFECTION` (`id_co_infection`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `PATIENT_ibfk_1` FOREIGN KEY (`profil_serologique`) REFERENCES `PROFIL_SEROLOGIQUE` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `PATIENT_ibfk_2` FOREIGN KEY (`protocole`) REFERENCES `PROTOCOLE` (`id_proto`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `PATIENT_ibfk_3` FOREIGN KEY (`ligne`) REFERENCES `LIGNE` (`id_ligne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PROTOCOLE`
--
ALTER TABLE `PROTOCOLE`
ADD CONSTRAINT `PROTOCOLE_ibfk_1` FOREIGN KEY (`type_protocole`) REFERENCES `TYPE_PROTOCOLE` (`id_type_protocole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
ADD CONSTRAINT `UTILISATEUR_ibfk_1` FOREIGN KEY (`grade`) REFERENCES `GRADE` (`id_grade`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
