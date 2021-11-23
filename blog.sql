-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 22 nov. 2021 à 21:24
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_date` date NOT NULL,
  `article_titre` varchar(255) NOT NULL,
  `article_contenu` text NOT NULL,
  `article_auteur` varchar(30) NOT NULL,
  `article_etat` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `article_date`, `article_titre`, `article_contenu`, `article_auteur`, `article_etat`) VALUES
(1, '2021-11-15', 'La nouvelle voiture d\'E. Macron', 'Phasellus mattis enim velit, vitae ultrices justo efficitur ac. Sed quis euismod lacus. Fusce vestibulum dictum dolor, at luctus risus cursus volutpat. Phasellus sodales, nisl in aliquet vestibulum, metus metus faucibus nunc, vitae blandit orci elit vel nisl. Fusce velit justo, pulvinar id condimentum a, bibendum et arcu. Ut faucibus molestie arcu non rhoncus. In et pharetra est, non iaculis enim. Nam nisl dui, semper in eros sagittis, efficitur sodales sem. Nunc eu tempor nisl.', 'Arthur', 1),
(3, '2021-11-11', 'Le budget des français au 11 du mois', 'Ut faucibus molestie arcu non rhoncus. In et pharetra est, non iaculis enim. Nam nisl dui, semper in eros sagittis, efficitur sodales sem. Nunc eu tempor nisl.\r\nPhasellus elementum, nisi at luctus dignissim, mi orci imperdiet turpis, malesuada aliquam risus nunc ac ligula. Nulla porta dui tempor efficitur imperdiet. Cras pretium vulputate velit id finibus. Nam a dictum lectus, quis laoreet sem. Quisque feugiat est ut sapien placerat dignissim. Aliquam placerat porttitor purus, sed laoreet ligula ultricies eget. Nam hendrerit massa quis neque rhoncus, sed rutrum arcu ullamcorper.\r\nPraesent a est in leo congue elementum. Suspendisse non nisl fermentum, mollis nunc eget, venenatis quam. Suspendisse accumsan metus sit amet nibh ultricies dictum. Nullam tincidunt purus nec ullamcorper maximus. Integer ornare arcu at ligula volutpat, eget placerat sapien placerat. Nam luctus ipsum eget nisl malesuada, nec suscipit risus pretium. Duis libero urna, efficitur ut erat quis, accumsan tristique eros. Maecenas ultricies nunc malesuada mauris lobortis, eu aliquam dolor feugiat. Nulla commodo ornare turpis a consectetur. Duis euismod ligula magna, nec placerat est facilisis vitae. Aenean congue, velit sed venenatis imperdiet, eros quam ullamcorper risus, vel porttitor velit neque a neque. Curabitur pharetra sit amet augue non ultricies. Ut ut aliquam arcu, vitae lobortis libero. Integer ex magna, lobortis in vehicula vitae, viverra nec nibh. In a aliquam nibh.', 'Clémentine', 1),
(4, '2021-11-22', 'COP26, l\'événement du moment', 'Vivamus nec augue ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam aliquet mollis ligula, eu dignissim est porta egestas. Fusce sollicitudin sapien orci, vitae iaculis turpis ornare non. Quisque suscipit viverra elementum. Mauris viverra pretium posuere. Phasellus mattis enim velit, vitae ultrices justo efficitur ac. Sed quis euismod lacus. Fusce vestibulum dictum dolor, at luctus risus cursus volutpat. Phasellus sodales, nisl in aliquet vestibulum, metus metus faucibus nunc, vitae blandit orci elit vel nisl. Fusce velit justo, pulvinar id condimentum a, bibendum et arcu. Ut faucibus molestie arcu non rhoncus. In et pharetra est, non iaculis enim. Nam nisl dui, semper in eros sagittis, efficitur sodales sem. Nunc eu tempor nisl.\r\n\r\nDuis egestas nec nunc id tristique. Duis venenatis vulputate tellus, sit amet ultricies nibh. Nullam ut feugiat metus. Nunc at arcu nisl. Suspendisse a suscipit urna. Praesent risus augue, vestibulum sagittis lacinia sit amet, hendrerit non dolor. Nulla fringilla pretium leo sollicitudin sollicitudin. Cras risus tellus, luctus a leo sed, tempus auctor nisl. Phasellus vel metus augue. Phasellus elementum, nisi at luctus dignissim, mi orci imperdiet turpis, malesuada aliquam risus nunc ac ligula. Nulla porta dui tempor efficitur imperdiet. Cras pretium vulputate velit id finibus. Nam a dictum lectus, quis laoreet sem. Quisque feugiat est ut sapien placerat dignissim. Aliquam placerat porttitor purus, sed laoreet ligula ultricies eget. Nam hendrerit massa quis neque rhoncus, sed rutrum arcu ullamcorper.', 'Herbert', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
