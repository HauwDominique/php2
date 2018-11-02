-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 02 nov. 2018 à 16:54
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(14, 'Appartement 6 chambres', '100 rue des ames perdues', 'Lille', 59000, 80, 89000, 'img/appartement.jpg', 'location', 'blabalblabalblabalblabalblabalblabalblabalblabalblabalblabal'),
(15, 'Appartement 6 chambres', '100 rue des ames perdues', 'Lille', 59000, 80, 89000, 'img/maison.jpg', 'location', 'blabalblabalblabalblabalblabalblabalblabalblabalblabalblabal'),
(16, 'Appartement 6 chambres', '44 chemin des alouettes', 'ARRAS', 62000, 55, 64000, 'img/maison.jpg', 'location', 'Idéalement situé dans le Vieux Lille rue des Chats Bossus TIII traversant Lumineux et charme assuré a visiter avec votre agence Nexity Contacter Sandrine JANICKI 06.75.08.33.88 Réf. annonce : FL0614439 \r\n'),
(17, 'Studio centre ville', '20 rue des oublietes', 'Roubaix', 59200, 30, 65000, '', 'vente', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni expedta odio doloremque eos obcaecati quos voluptas ab culpa odit, doloribus debitis et commodi assumenda perferendis rem quisquam laborum quidem quod.'),
(18, 'Studio centre ville', '20 rue des oublietes', 'Roubaix', 59200, 100, 64000, '', 'location', 'njlkjhkjhlkjhjkhkjlhlkjhkjhlh:'),
(19, 'Studio centre ville', '20 rue des oublietes', 'Roubaix', 59200, 100, 64000, '', 'location', 'njlkjhkjhlkjhjkhkjlhlkjhkjhlh:'),
(20, 'Studio centre ville', '20 rue des oublietes', 'Roubaix', 59200, 100, 64000, '', 'location', 'njlkjhkjhlkjhjkhkjlhlkjhkjhlh:'),
(21, 'Studio centre ville', '20 rue des oublietes', 'Roubaix', 59200, 100, 64000, '', 'location', 'njlkjhkjhlkjhjkhkjlhlkjhkjhlh:'),
(22, 'Studio centre ville', '20 rue des oublietes', 'Roubaix', 59200, 100, 64000, '', 'location', 'njlkjhkjhlkjhjkhkjlhlkjhkjhlh:'),
(23, 'Studio centre ville', '20 rue des oublietes', 'Roubaix', 59200, 100, 64000, '', 'location', 'njlkjhkjhlkjhjkhkjlhlkjhkjhlh:');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
