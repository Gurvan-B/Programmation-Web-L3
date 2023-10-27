-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : ven. 22 jan. 2021 à 18:09
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inventory`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `nomCarte` varchar(20) DEFAULT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`nomCarte`, `classe`, `type`, `categorie`) VALUES
('Oratrice-gidra', 'Druide', 'Serviteur', 'LÃ©gendaire'),
('Vautour-malade', 'DÃ©moniste', 'Serviteur', 'Ã‰pique'),
('Eclair', 'Chaman', 'Sort', 'Commune');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `idcom` int(30) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `likes` int(30) NOT NULL DEFAULT '0',
  `date_public` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(20) NOT NULL,
  `page_id` varchar(40) NOT NULL,
  PRIMARY KEY (`idcom`),
  KEY `pages_constr` (`page_id`),
  KEY `users_constr` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idcom`, `contenu`, `likes`, `date_public`, `user_id`, `page_id`) VALUES
(1, 'C nul', 10, '2020-12-31 23:00:00', 30, '2'),
(2, 'c bien', 10, '2020-11-09 23:00:00', 14, '2'),
(3, 'mouais c pas ouf', 0, '2021-01-08 16:56:55', 10, '2'),
(10, 'c ok', 0, '2021-01-08 18:17:16', 30, '2'),
(11, 'c ok', 0, '2021-01-08 18:19:45', 30, '2'),
(14, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, '2021-01-08 18:25:31', 30, '2'),
(16, 'Hearthstone is a free-to-play online digital collectible card game developed and published by Blizzard Entertainment. Originally subtitled Heroes of Warcraft, Hearthstone builds upon the existing lore of the Warcraft series by using the same elements, characters, and relics. It was first released for Microsoft Windows and macOS in March 2014, with ports for iOS and Android releasing later that year. The game features cross-platform play, allowing players on any supported device to compete with one another, restricted only by geographical region account limits.', 0, '2021-01-08 18:30:12', 30, '2'),
(20, 'TrÃ¨s belle page !', 0, '2021-01-08 19:24:31', 30, '2'),
(27, 'TrÃ¨s bon deck !', 0, '2021-01-10 22:43:06', 30, 'usertab_6b23d5b022cb3ac57b0da1ffa3c6a312'),
(28, 'plebs', 0, '2021-01-10 22:44:12', 31, 'usertab_6b23d5b022cb3ac57b0da1ffa3c6a312'),
(30, 'C nul ta liste', 0, '2021-01-15 15:24:15', 30, 'usertab_c6c535d7effc214a23393c9d7c067460'),
(50, 'dd', 0, '2021-01-15 18:27:36', 30, 'usertab_c6c535d7effc214a23393c9d7c067460'),
(51, '&lt;iframe width=&quot;622&quot; height=&quot;350&quot; src=&quot;https://www.youtube.com/embed/12Q0x_gn6co&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;', 0, '2021-01-15 18:27:55', 30, 'usertab_c6c535d7effc214a23393c9d7c067460'),
(52, '&lt;iframe width=&quot;622&quot; height=&quot;350&quot; src=&quot;https://www.youtube.com/embed/12Q0x_gn6co&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;', 0, '2021-01-15 18:28:04', 30, 'usertab_c6c535d7effc214a23393c9d7c067460');

-- --------------------------------------------------------

--
-- Structure de la table `essais`
--

DROP TABLE IF EXISTS `essais`;
CREATE TABLE IF NOT EXISTS `essais` (
  `ip` varchar(40) DEFAULT NULL,
  `nessais` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `essais`
--

INSERT INTO `essais` (`ip`, `nessais`) VALUES
('::1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tableaux`
--

DROP TABLE IF EXISTS `tableaux`;
CREATE TABLE IF NOT EXISTS `tableaux` (
  `tab_id` varchar(40) NOT NULL,
  `auteur_id` int(20) NOT NULL,
  `title` varchar(20) NOT NULL DEFAULT 'Sans titre',
  `date_maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(20) NOT NULL DEFAULT '#353148',
  PRIMARY KEY (`tab_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tableaux`
--

INSERT INTO `tableaux` (`tab_id`, `auteur_id`, `title`, `date_maj`, `color`) VALUES
('42', 30, 'Deck 5', '2021-01-18 13:36:10', '#669900'),
('41', 10, 'Deck 4', '2021-01-18 19:21:01', '#353148'),
('40', 10, 'Deck 3', '2021-01-10 21:40:54', '#0088a9'),
('39', 30, 'Deck 2', '2021-01-10 21:38:23', '#ff9f00'),
('6b23d5b022cb3ac57b0da1ffa3c6a312', 30, 'Druide quÃªte', '2021-01-18 13:13:20', '#669900'),
('14852d7ba9c682ebb2e3d46ee04d5bb4', 32, 'Mage tempo', '2021-01-11 19:18:24', '#0088a9'),
('c6c535d7effc214a23393c9d7c067460', 33, 'BB', '2021-01-15 15:24:23', '#0088a9');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `icon_id` varchar(40) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `login`, `mdp`, `icon_id`) VALUES
(4, 'million', '33c381af2d1e41fe40556f1663244b34', '-0'),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', '-3'),
(20, '<script>alert()</script>', '202cb962ac59075b964b07152d234b70', '-0'),
(29, 'azertyuiopqsdfghjklm', 'c20ad4d76fe97759aa27a0c99bff6710', '-0'),
(30, 'crepo', '054ba43bb613d8686a4063900b492e63', '~60060733bf7468.77060388'),
(31, 'hydro', '7215ee9c7d9dc229d2921a40e899ec5f', '-2'),
(32, 'Kolento', '02f937387e7be8d41e5813e7164f7d80', '-2'),
(33, 'astaninja', '4a7d1ed414474e4033ac29ccb8653d9b', '-0');

-- --------------------------------------------------------

--
-- Structure de la table `usertab_6b23d5b022cb3ac57b0da1ffa3c6a312`
--

DROP TABLE IF EXISTS `usertab_6b23d5b022cb3ac57b0da1ffa3c6a312`;
CREATE TABLE IF NOT EXISTS `usertab_6b23d5b022cb3ac57b0da1ffa3c6a312` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `cout` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rarete` varchar(20) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usertab_6b23d5b022cb3ac57b0da1ffa3c6a312`
--

INSERT INTO `usertab_6b23d5b022cb3ac57b0da1ffa3c6a312` (`row_id`, `cout`, `nom`, `classe`, `type`, `rarete`) VALUES
(3, 1, 'Expedition-lucrative', 'Druide', 'Sort', 'Commune'),
(4, 9, 'Cenarius', 'Druide', 'Serviteur', 'LÃ©gendaire'),
(5, 6, 'Oasis-cachee', 'Druide', 'Sort', 'Rare'),
(6, 2, 'Zephrys-le-grand', 'Neutre', 'Serviteur', 'LÃ©gendaire'),
(7, 7, 'Debordement', 'Druide', 'Sort', 'Rare');

-- --------------------------------------------------------

--
-- Structure de la table `usertab_39`
--

DROP TABLE IF EXISTS `usertab_39`;
CREATE TABLE IF NOT EXISTS `usertab_39` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `cout` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rarete` varchar(20) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `usertab_40`
--

DROP TABLE IF EXISTS `usertab_40`;
CREATE TABLE IF NOT EXISTS `usertab_40` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `cout` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rarete` varchar(20) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `usertab_41`
--

DROP TABLE IF EXISTS `usertab_41`;
CREATE TABLE IF NOT EXISTS `usertab_41` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `cout` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rarete` varchar(20) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usertab_41`
--

INSERT INTO `usertab_41` (`row_id`, `cout`, `nom`, `classe`, `type`, `rarete`) VALUES
(4, 0, 'dfgh', 'Neutre', 'Serviteur', 'Basique');

-- --------------------------------------------------------

--
-- Structure de la table `usertab_42`
--

DROP TABLE IF EXISTS `usertab_42`;
CREATE TABLE IF NOT EXISTS `usertab_42` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `cout` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rarete` varchar(20) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `usertab_14852d7ba9c682ebb2e3d46ee04d5bb4`
--

DROP TABLE IF EXISTS `usertab_14852d7ba9c682ebb2e3d46ee04d5bb4`;
CREATE TABLE IF NOT EXISTS `usertab_14852d7ba9c682ebb2e3d46ee04d5bb4` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `cout` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rarete` varchar(20) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usertab_14852d7ba9c682ebb2e3d46ee04d5bb4`
--

INSERT INTO `usertab_14852d7ba9c682ebb2e3d46ee04d5bb4` (`row_id`, `cout`, `nom`, `classe`, `type`, `rarete`) VALUES
(1, 4, 'boule-de-feu', 'Mage', 'Sort', 'Basique');

-- --------------------------------------------------------

--
-- Structure de la table `usertab_c6c535d7effc214a23393c9d7c067460`
--

DROP TABLE IF EXISTS `usertab_c6c535d7effc214a23393c9d7c067460`;
CREATE TABLE IF NOT EXISTS `usertab_c6c535d7effc214a23393c9d7c067460` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `cout` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rarete` varchar(20) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usertab_c6c535d7effc214a23393c9d7c067460`
--

INSERT INTO `usertab_c6c535d7effc214a23393c9d7c067460` (`row_id`, `cout`, `nom`, `classe`, `type`, `rarete`) VALUES
(1, 4, 'CHASSEUR1', 'Chasseur', 'Arme', 'Basique');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
