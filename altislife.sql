-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 13 Février 2019 à 21:25
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `altislife`
--

DELIMITER $$
--
-- Procédures
--
$$

$$

$$

$$

$$

$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `advanced_identity`
--

CREATE TABLE `advanced_identity` (
  `pid` varchar(64) NOT NULL,
  `name_player` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `naissance` text NOT NULL,
  `lieu_naissance` text NOT NULL,
  `taille` int(10) NOT NULL,
  `sexe` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `advanced_identity`
--

INSERT INTO `advanced_identity` (`pid`, `name_player`, `nom`, `prenom`, `naissance`, `lieu_naissance`, `taille`, `sexe`) VALUES
('76561198838208530', 'Nikola Notaras', 'Notaras', 'Nikola', '\"[15,7,1990]\"', '\"Européenne\"', 183, 1),
('76561198058130517', 'Anthony Vasilis', 'Vasilis', 'Anthony', '\"[20,5,1992]\"', '\"Européenne\"', 200, 1),
('76561197966637574', 'Constantin Caps', 'Constantin', 'caps', '\"[5,10,1954]\"', '\"Européenne\"', 169, 1),
('76561198292718521', 'Naero Srathen', 'SRATHEN', 'NAERO', '\"[20,11,1985]\"', '\"Européenne\"', 183, 1),
('76561197966637574', 'Pierre-Charles Sautron', 'Sautron', 'Pierre-Charles', '\"[5,10,1984]\"', '\"Océanie\"', 169, 1),
('76561198147471550', 'Lucas Beining', 'Beining', 'Lucas', '\"[16,6,2000]\"', '\"Européenne\"', 177, 1),
('76561198086525385', 'Ambrotos Solomos', 'Solomos', 'Ambrotos', '\"[27,8,1993]\"', '\"Européenne\"', 172, 1),
('76561198198156979', 'Markellos Solomos', 'Solomos', 'Markellos', '\"[25,7,1936]\"', '\"Européenne\"', 174, 1),
('76561198148996070', 'lakalach jojo', 'lakalach', 'jojo', '\"[9,9,2009]\"', '\"Européenne\"', 180, 1),
('76561198136535680', 'Connor Shepperd', 'Shepperd', 'Connor', '\"[27,2,1996]\"', '\"Américaine\"', 188, 1),
('76561198164580373', 'Vasili Laganakos', 'Laganakos', 'Vasili', '\"[28,9,1989]\"', '\"Européenne\"', 198, 1),
('76561198204470609', 'Thibault Verhaegen', 'Verhaegen', 'Thibault', '\"[20,1,2001]\"', '\"Européenne\"', 180, 1),
('76561198043214849', 'Oeeee Bien', 'Bien', 'Oeeee', '\"[10,2,1995]\"', '\"Européenne\"', 183, 1),
('76561197960288686', 'Antonio Vitellio', 'Vitellio', 'Antonio', '\"[4,12,1991]\"', '\"Américaine\"', 178, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cellphone`
--

CREATE TABLE `cellphone` (
  `pid` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `messages` text NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cellphone`
--

INSERT INTO `cellphone` (`pid`, `name`, `messages`, `insert_time`) VALUES
('76561197960288686', 'Antonio Vitellio', '\"[[`0607460768`,`H`,[1,[2019,2,8,17,10,33]]]]\"', '2019-02-08 16:59:57'),
('76561197966637574', 'Constantin Caps', '\"[[`0668251777`,`dzqdzqdqdqz`,[1,[2019,2,2,22,33,53]]]]\"', '2019-01-04 16:24:46'),
('76561198043214849', 'Oeeee Bien', '\"[]\"', '2019-02-05 12:39:54'),
('76561198058130517', '[DESPE] Joker Ramirez', '\"[[`0667749818`,`TG`,[1,[2019,2,3,17,41,13]]],[`0668251777`,`NIQUE TA RACE`,[1,[2019,2,3,17,41,11]]],[`20`,`Bonjour`,[1,[2019,1,31,23,8,10]]],[`20`,`NIQUE TA RACE`,[1,[2019,1,31,19,25,0]]],[`20`,`Nous travaillons aussi bien que nous le pouvons et serons avec vous dès que possible. S il vous plaît restez calme et suivez les instructions des autorités.<br/><br/><t color= #33CC33 >Position : <t color= #FFFFFF >084 198`,[1,[2019,1,31,19,22,52]]],[`20`,`Nous travaillons aussi bien que nous le pouvons et serons avec vous dès que possible. S il vous plaît restez calme et suivez les instructions des autorités.`,[1,[2019,1,31,19,22,9]]],[`0668251777`,`TZEQZTQ`,[1,[2019,1,31,19,11,43]]],[`0646571667`,`allo`,[1,[2019,1,31,19,10,57]]],[`0668251777`,`Test`,[1,[2019,1,3,13,31,0]]]]\"', '2019-01-03 12:27:39'),
('76561198086525385', 'pierre-rener de bonevois', '\"[]\"', '2019-01-03 20:13:22'),
('76561198136535680', 'Connor Shepperd', '\"[[`0667749818`,`Salut`,[1,[2019,2,2,16,17,18]]]]\"', '2019-02-02 13:52:10'),
('76561198147471550', 'Lucas Beining', '\"[]\"', '2019-01-24 18:52:13'),
('76561198148996070', 'Jairo Velasquez', '\"[[`0667749818`,`Bonjour`,[1,[2019,2,2,14,36,26]]],[`0668251777`,`UI`,[1,[2019,2,2,14,35,4]]]]\"', '2019-01-07 20:07:34'),
('76561198164580373', 'Ermenegildo Galluccio', '\"[[`20`,`Nous ne pouvons pas suivre cet appel car vos instructions ne sont pas claires. S il vous plaît nous donner plus d informations.<br/><br/><t color= #33CC33 >Position : <t color= #FFFFFF >153 161`,[1,[2019,2,8,17,12,8]]],[`0607460768`,`H`,[1,[2019,2,8,17,10,33]]],[`0622522514`,`asdsada`,[1,[2019,2,4,18,58,39]]],[`20`,`prenez l appel<br/><br/><t color= #33CC33 >Position : <t color= #FFFFFF >153 161`,[1,[2019,2,4,18,57,48]]],[`0622522514`,`ALED`,[1,[2019,2,4,18,57,21]]],[`0668251777`,`dzqdzqdqdqz`,[1,[2019,2,2,22,33,4]]],[`0668251777`,`TEST`,[1,[2019,2,2,22,31,59]]],[25,`TEST`,[1,[2019,2,2,22,31,53]]]]\"', '2019-01-05 20:06:50'),
('76561198198156979', 'Moka Nyang', '\"[[`20`,`Nous sommes désolés, mais comme nous manquons de personnel pour le moment, nous ne pouvons vous envoyer une unité.`,[1,[2019,2,2,16,18,44]]],[`20`,`Attend 3m frère`,[1,[2019,2,2,16,18,37]]],[`0667749818`,`Salut`,[1,[2019,2,2,16,17,18]]],[`20`,`Nous sommes désolés, mais comme nous manquons de personnel pour le moment, nous ne pouvons vous envoyer une unité.`,[1,[2019,2,2,14,37,36]]],[`20`,`NOUS ARIVON VER VOUS PEDAL`,[1,[2019,2,2,14,37,25]]],[`0667749818`,`Bonjour`,[1,[2019,2,2,14,36,26]]],[`0668251777`,`UI`,[1,[2019,2,2,14,35,4]]],[`0646571667`,`Salope`,[1,[2019,1,31,23,7,0]]]]\"', '2019-01-03 21:18:13'),
('76561198204470609', 'Thibault Verhaegen', '\"[[`0622522514`,`asdsada`,[1,[2019,2,4,18,58,39]]],[`0622522514`,`ALED`,[1,[2019,2,4,18,57,21]]]]\"', '2019-02-04 17:14:24'),
('76561198292718521', 'Naero Srathen', '\"[]\"', '2019-01-04 00:55:58'),
('76561198838208530', 'Nicolas de Saint-Saud', '\"[[`0668251777`,`dzqdzqdzqdzq`,[1,[2019,2,2,22,32,54]]],[`0667749818`,`Salut`,[1,[2019,2,2,16,17,18]]],[`0667749818`,`Bonjour`,[1,[2019,2,2,14,36,26]]],[`0668251777`,`UI`,[1,[2019,2,2,14,35,4]]],[`0646571667`,`ça soeur`,[1,[2019,1,31,20,14,27]]],[`0646571667`,` wesh negro`,[1,[2019,1,31,20,12,46]]],[`0646571667`,`ouille `,[1,[2019,1,31,19,24,27]]],[`0646571667`,`aie `,[1,[2019,1,31,19,20,51]]],[`0668251777`,`TZEQZTQ`,[1,[2019,1,31,19,11,43]]],[`0646571667`,`allo`,[1,[2019,1,31,19,10,57]]],[`0646571667`,`AH `,[1,[2019,1,24,21,31,3]]],[`0646571667`,`ah `,[1,[2019,1,19,20,32,1]]],[`0668251777`,`TEST`,[1,[2019,1,5,14,56,18]]],[`0646571667`,`ah`,[1,[2019,1,3,13,31,29]]]]\"', '2019-01-03 12:24:55');

-- --------------------------------------------------------

--
-- Structure de la table `containers`
--

CREATE TABLE `containers` (
  `id` int(6) NOT NULL,
  `pid` varchar(17) NOT NULL,
  `classname` varchar(32) NOT NULL,
  `pos` varchar(64) DEFAULT NULL,
  `inventory` text NOT NULL,
  `gear` text NOT NULL,
  `dir` varchar(128) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `owned` tinyint(1) DEFAULT '0',
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `containers`
--

INSERT INTO `containers` (`id`, `pid`, `classname`, `pos`, `inventory`, `gear`, `dir`, `active`, `owned`, `insert_time`) VALUES
(5, '76561198058130517', 'B_supplyCrate_F', '[14524.6,17292.3,0.914122]', '\"[[[`boltcutter`,1]],5]\"', '\"[[[],[]],[[`16Rnd_9x21_Mag`,`16Rnd_9x21_red_Mag`],[2,2]],[[`hgun_P07_F`],[1]],[[],[]]]\"', '[[-0.690918,-0.722933,0],[0,0,1]]', 0, 1, '2018-12-31 09:57:38'),
(6, '76561198058130517', 'B_supplyCrate_F', '[14522.3,17294.6,0.923143]', '\"[[[`boltcutter`,1]],5]\"', '\"[[[],[]],[[`16Rnd_9x21_green_Mag`,`16Rnd_9x21_yellow_Mag`],[2,1]],[[`hgun_P07_F`],[1]],[[],[]]]\"', '[[-0.68988,-0.723923,0],[0,0,1]]', 0, 1, '2018-12-31 09:57:45'),
(7, '76561198058130517', 'B_supplyCrate_F', '[14519.9,17296.9,0.193851]', '\"[[[`toolkit`,1]],4]\"', '\"[[[],[]],[[`30Rnd_9x21_Red_Mag`,`30Rnd_9x21_Mag`],[1,1]],[[`hgun_P07_F`],[1]],[[],[]]]\"', '[[-0.68988,-0.723923,0],[0,0,1]]', 0, 1, '2018-12-31 09:57:50'),
(8, '76561198058130517', 'B_supplyCrate_F', '[14517.1,17299.6,0.913027]', '\"[[[`redgull`,1]],1]\"', '\"[[[],[]],[[`30Rnd_9x21_Mag`],[2]],[[`hgun_P07_F`],[1]],[[],[]]]\"', '[[-0.689758,-0.72404,0],[0,0,1]]', 0, 1, '2018-12-31 09:57:56'),
(9, '76561198058130517', 'B_supplyCrate_F', '[14528.9,17299.8,0.185474]', '\"[[[`pickaxe`,1]],2]\"', '\"[[[],[]],[[`16Rnd_9x21_red_Mag`,`16Rnd_9x21_green_Mag`],[1,1]],[[`hgun_P07_F`],[1]],[[],[]]]\"', '[[0.658691,0.752413,0],[0,0,1]]', 0, 1, '2018-12-31 09:58:14'),
(10, '76561198058130517', 'B_supplyCrate_F', '[14526.2,17302,0.877068]', '\"[[[`redgull`,1]],1]\"', '\"[[[],[]],[[`16Rnd_9x21_yellow_Mag`],[2]],[[`hgun_P07_F`],[1]],[[],[]]]\"', '[[0.668396,0.743806,0],[0,0,1]]', 0, 1, '2018-12-31 09:58:22'),
(12, '76561198838208530', 'Land_CargoBox_V1_F', '[6260.74,16221.5,0.241936]', '\"[[],0]\"', '\"[]\"', '[[0.0394897,-0.99922,0],[0,0,1]]', 0, 1, '2019-02-02 14:46:52'),
(13, '76561198838208530', 'Land_CargoBox_V1_F', '[6266.01,16221.2,0.200005]', '\"[[],0]\"', '\"[]\"', '[[-0.0281982,-0.999602,0],[0,0,1]]', 0, 1, '2019-02-02 14:47:04'),
(14, '76561198838208530', 'Land_CargoBox_V1_F', '[6268.37,16221.3,0.866432]', '\"[[],0]\"', '\"[]\"', '[[-0.0117188,-0.999931,0],[0,0,1]]', 0, 1, '2019-02-02 14:47:16'),
(15, '76561198198156979', 'Land_CargoBox_V1_F', '[6263.22,16221.3,0.940414]', '\"[[],0]\"', '\"[]\"', '[[-0.0183716,-0.999831,0],[0,0,1]]', 0, 1, '2019-02-02 14:47:27'),
(16, '76561198198156979', 'Land_CargoBox_V1_F', '[6259.05,16221.5,0.242168]', '\"[[],0]\"', '\"[]\"', '[[0.0217285,-0.999764,0],[0,0,1]]', 0, 1, '2019-02-02 14:47:39'),
(17, '76561198198156979', 'Land_CargoBox_V1_F', '[6262.07,16223.2,0.258118]', '\"[[],0]\"', '\"[]\"', '[[0.00280762,-0.999996,0],[0,0,1]]', 0, 1, '2019-02-02 14:47:49');

-- --------------------------------------------------------

--
-- Structure de la table `dynmarket`
--

CREATE TABLE `dynmarket` (
  `id` int(11) NOT NULL DEFAULT '1',
  `prices` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `dynmarket`
--

INSERT INTO `dynmarket` (`id`, `prices`) VALUES
(1, '[[\"coton\",44.4463,0],[\"epi_ble\",44.4463,0],[\"relique\",340,0],[\"charbon\",163.435,0],[\"glass\",120,0],[\"salt_refined\",150,0],[\"iron_refined\",329,0],[\"plastique_r\",220,0],[\"emeraude\",923,0],[\"saphir\",1145,0],[\"salema_raw\",115,0],[\"ornate_raw\",225,0],[\"mackerel_raw\",125,0],[\"tuna_raw\",220,0],[\"mullet_raw\",105,0],[\"catshark_raw\",250,0],[\"argent_sale\",1392.75,0]]');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(6) NOT NULL,
  `from_pid` varchar(17) NOT NULL,
  `to_pid` varchar(17) NOT NULL,
  `to_name` varchar(32) NOT NULL,
  `company` text NOT NULL,
  `text` text NOT NULL,
  `price` int(100) NOT NULL DEFAULT '0',
  `payed` int(10) NOT NULL DEFAULT '0',
  `insert_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`id`, `from_pid`, `to_pid`, `to_name`, `company`, `text`, `price`, `payed`, `insert_time`, `last_update`) VALUES
(3, '76561198058130517', '76561198838208530', 'Nicolas de Saint-Saud', '\"Lunik&Co\"', '\"Ah ! \"', 500000, 2, '2019-01-16 21:01:15', '2019-01-16 21:04:15'),
(4, '76561198838208530', '76561198058130517', '[DESPE] Joker Ramirez', '\"CHEHHHHHHH\"', '\"TIEN CHECHHHHHHHHHHHHHHHHHH                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   pd va                 \"', 9999999, 1, '2019-01-16 21:05:06', '2019-01-17 17:53:38'),
(5, '76561198292718521', '76561198838208530', 'Nicolas de Saint-Saud', '\"DIEU\"', '\"Facture de droit divin a fersé a sont seigneur Naero Srathen alias \"\" Best Mappeur \"\" alias \"\"Admin\"\" alias \"\" DIEU \"\"\"', 20000000, 1, '2019-01-19 20:27:47', '2019-01-19 23:05:43'),
(6, '76561198198156979', '76561198838208530', 'Nikola Notaras', '\"Markellos Solomos \"', '\"Bonjour\"', 1, 2, '2019-02-02 13:49:50', '2019-02-02 14:32:56'),
(7, '76561197966637574', '76561198198156979', 'Markellos Solomos', '\"MSF\"', '\"extra pour les soins.\"', 100, 2, '2019-02-02 14:33:34', '2019-02-02 14:34:40');

-- --------------------------------------------------------

--
-- Structure de la table `fuel_stations`
--

CREATE TABLE `fuel_stations` (
  `type` text NOT NULL,
  `position` varchar(64) NOT NULL,
  `fuel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fuel_stations`
--

INSERT INTO `fuel_stations` (`type`, `position`, `fuel`) VALUES
('\"Land_fs_feed_F\"', '[14173.3,16541.9,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[16871.6,15476.8,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[15297.2,17565.9,0]', '\"[[`fuel_1`,300],[`fuel_2`,589],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[16875.2,15469.5,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[15781.1,17453.2,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[17417.2,13936.8,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[14221.3,18302.6,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[16751,12513.2,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[12028.5,15830,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[12026.5,15830.1,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[12024.5,15830,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[11831.5,14155.8,0]', '\"[[`fuel_1`,300],[`fuel_2`,547],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[20784.9,16666,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[20789.6,16672.4,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[19961.3,11454.5,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[19965.1,11447.5,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[9025.65,15729.4,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[9023.87,15729,0]', '\"[[`fuel_1`,300],[`fuel_2`,582],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[9021.95,15728.7,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[9205.86,12112.3,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[8481.81,18260.7,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[6798.15,15561.5,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[6242.66,16231,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[6242.75,16236.4,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[6198.93,15081.5,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[23379.3,19798.9,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[6233.95,16233.8,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[6225.15,16234,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[21230.5,7116.66,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[5023.15,14429.5,0]', '\"[[`fuel_1`,300],[`fuel_2`,580],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[5019.57,14436.7,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[5768.85,20085.8,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[4001.23,12592,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[3757.67,13485.9,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[3757.27,13477.9,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_fs_feed_F\"', '[25701.3,21372.6,0]', '\"[[`fuel_1`,300],[`fuel_2`,600],[`fuel_3`,0],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[15398.2,16044.4,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[15848.4,16915.7,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[15380.1,16048.9,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[15810.3,16917.1,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[15347.6,16068.3,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[17364,18276.8,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[17367.8,18281,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[15398.5,16043.8,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[14620.7,16774.9,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[15810.3,16917.1,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[15716.8,17487.7,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[11571.4,11911.9,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[26778.9,24646.4,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[9157.49,21637.8,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[20803.1,7222.03,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[16994.9,12835.9,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[3777.72,12985.5,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1200],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_02_pump_F\"', '[15800.3,16915.7,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,0],[`fuel_4`,1000]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[14264.7,16529.1,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1500],[`fuel_4`,0]]\"'),
('\"Land_FuelStation_01_pump_malevil_F\"', '[15314.8,17409.8,0]', '\"[[`fuel_1`,0],[`fuel_2`,0],[`fuel_3`,1500],[`fuel_4`,0]]\"');

-- --------------------------------------------------------

--
-- Structure de la table `gangs`
--

CREATE TABLE `gangs` (
  `id` int(6) NOT NULL,
  `owner` varchar(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `members` text,
  `maxmembers` int(3) DEFAULT '8',
  `bank` int(100) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `gangs`
--

INSERT INTO `gangs` (`id`, `owner`, `name`, `members`, `maxmembers`, `bank`, `active`, `insert_time`) VALUES
(7, '76561198838208530', 'TEST', '\"[`76561198838208530`]\"', 8, 0, 1, '2019-02-02 12:18:34'),
(8, '76561198058130517', 'Gilet Jaune', '\"[`76561198058130517`]\"', 8, 0, 1, '2019-02-02 17:00:46');

-- --------------------------------------------------------

--
-- Structure de la table `houses`
--

CREATE TABLE `houses` (
  `id` int(6) NOT NULL,
  `pid` varchar(17) NOT NULL,
  `pos` varchar(64) DEFAULT NULL,
  `owned` tinyint(1) DEFAULT '0',
  `security` tinyint(1) DEFAULT '0',
  `garage` tinyint(1) NOT NULL DEFAULT '0',
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `houses`
--

INSERT INTO `houses` (`id`, `pid`, `pos`, `owned`, `garage`, `insert_time`) VALUES
(12, '76561198058130517', '[14517.6,17299.1,0.20661]', 1, 0, '2018-12-31 09:57:03'),
(14, '76561198292718521', '[17370.6,18280.2,0.38]', 1, 0, '2019-01-05 23:53:04'),
(15, '76561198058130517', '[17540.5,18971,1.05609]', 1, 0, '2019-01-10 12:48:07'),
(16, '76561198058130517', '[17563.9,18970.4,1.96248]', 1, 0, '2019-01-10 12:48:19'),
(18, '76561198292718521', '[18025.5,18121.3,0.401772]', 1, 0, '2019-01-14 13:25:37'),
(35, '76561198198156979', '[6262.63,16231.6,0.242001]', 1, 0, '2019-01-30 18:10:51'),
(38, '76561198198156979', '[6295.42,16274.6,0.00714874]', 1, 1, '2019-02-02 14:39:12'),
(39, '76561198198156979', '[6262.56,16220.4,0.206001]', 1, 0, '2019-02-02 14:45:08');

-- --------------------------------------------------------

--
-- Structure de la table `interpol`
--

CREATE TABLE `interpol` (
  `id` int(6) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `naissance` text NOT NULL,
  `adresse` text NOT NULL,
  `ville` text NOT NULL,
  `numero` varchar(32) NOT NULL DEFAULT '0',
  `yeux` text NOT NULL,
  `details` text NOT NULL,
  `insert_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Contenu de la table `interpol`
--

INSERT INTO `interpol` (`id`, `prenom`, `nom`, `naissance`, `adresse`, `ville`, `numero`, `yeux`, `details`, `insert_time`) VALUES
(1, 'aaa', 'ddd', '\"[3,10,1993]\"', '\"Non renseigné\"', '\"Non renseigné\"', 'Non renseigné', '\"Non renseigné\"', '\"Aucun\"', '\"[2019,1,22,21,4,21]\"');

-- --------------------------------------------------------

--
-- Structure de la table `interpol_crimes`
--

CREATE TABLE `interpol_crimes` (
  `id` int(6) NOT NULL,
  `interpol_id` int(6) NOT NULL,
  `crime` varchar(64) NOT NULL,
  `price` int(100) NOT NULL,
  `payed` tinyint(1) NOT NULL DEFAULT '0',
  `insert_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `interpol_crimes`
--

INSERT INTO `interpol_crimes` (`id`, `interpol_id`, `crime`, `price`, `payed`, `insert_time`) VALUES
(1, 1, 'Actes terroristes', 5000000, 1, '\"[2019,1,22,21,4,52]\"'),
(2, 1, 'Refus de priorité', 650, 0, '\"[2019,1,22,21,4,59]\"');

-- --------------------------------------------------------

--
-- Structure de la table `plantes`
--

CREATE TABLE `plantes` (
  `id` int(6) NOT NULL,
  `classname` varchar(32) NOT NULL,
  `position` text NOT NULL,
  `created` text NOT NULL,
  `last_watering` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE `players` (
  `uid` int(6) NOT NULL,
  `name` varchar(32) NOT NULL,
  `aliases` text NOT NULL,
  `pid` varchar(17) NOT NULL,
  `cash` int(100) NOT NULL DEFAULT '0',
  `bankacc` int(100) NOT NULL DEFAULT '0',
  `coplevel` enum('0','1','2','3','4','5','6','7') NOT NULL DEFAULT '0',
  `mediclevel` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `civ_licenses` text NOT NULL,
  `cop_licenses` text NOT NULL,
  `med_licenses` text NOT NULL,
  `civ_gear` text NOT NULL,
  `cop_gear` text NOT NULL,
  `med_gear` text NOT NULL,
  `civ_stats` varchar(32) NOT NULL DEFAULT '"[100,100,0]"',
  `cop_stats` varchar(32) NOT NULL DEFAULT '"[100,100,0]"',
  `med_stats` varchar(32) NOT NULL DEFAULT '"[100,100,0]"',
  `arrested` tinyint(1) NOT NULL DEFAULT '0',
  `adminlevel` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `donorlevel` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `blacklist` tinyint(1) NOT NULL DEFAULT '0',
  `civ_alive` tinyint(1) NOT NULL DEFAULT '0',
  `civ_position` varchar(64) NOT NULL DEFAULT '"[]"',
  `playtime` varchar(32) NOT NULL DEFAULT '"[0,0,0]"',
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num` varchar(10) NOT NULL DEFAULT '0',
  `contact` text,
  `sms` int(10) NOT NULL DEFAULT '0',
  `appel` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `players`
--

INSERT INTO `players` (`uid`, `name`, `aliases`, `pid`, `cash`, `bankacc`, `coplevel`, `mediclevel`, `civ_licenses`, `cop_licenses`, `med_licenses`, `civ_gear`, `cop_gear`, `med_gear`, `civ_stats`, `cop_stats`, `med_stats`, `arrested`, `adminlevel`, `donorlevel`, `blacklist`, `civ_alive`, `civ_position`, `playtime`, `insert_time`, `last_seen`, `num`, `contact`, `sms`, `appel`) VALUES
(12, 'Markellos Solomos', '\"[`Dayton Caps`]\"', '76561198198156979', 49733676, 19473008, '0', '5', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,0],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,0],[`license_civ_depanneur`,1],[`license_civ_gouvernement`,1],[`license_civ_plastique`,1],[`license_civ_entreprise_petrole`,1],[`license_civ_pja`,1],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0],[`license_civ_solomos_petroleum_pdg`,0],[`license_civ_solomos_petroleum`,0]]\"', '\"[]\"', '\"[[`license_med_mAir`,0]]\"', '\"[`KAEL_SUITS_BLK_F`,``,`radio_invi`,``,`Skyline_HeadGear_Cowboy_01_F`,[`ItemMap`,`ItemCompass`,`tf_microdagr`,`ItemGPS`,`TRYK_Headset_NV`],``,`RH_bullb`,[`tf_microdagr`,`tf_microdagr`],[],[`ACE_CableTie`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_EarPlugs`,`A3R_ID_CARD`,`ACE_rope36`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`plp_bo_w_Cigar`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`EF_SH_BW`,`Skyline_HeadGear_Cowboy_05_F`,`plp_bo_w_CigarFine`,`plp_bo_w_CigarFine`,`plp_bo_w_CigarFine`,`ACE_epinephrine`,`Shemagh_FaceTan`,`ACE_epinephrine`,`G_Aviator`,`A3R_ID_CARD_MEDIC`,`R3F_HK416M`],[`murshun_cigs_matches`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`,`RH_6Rnd_454_Mag`],[],[],[``,``,``,``],[``,``,``,``],[[`storageBig`,1],[`redgull`,11],[`tbacon`,8],[`objet_ancien`,23],[`arrosoir`,1]]]\"', '\"[]\"', '\"[`msf_tenue`,`msf_gilet_1`,`radio_invi`,`Bear_RoundGlasses`,`msf_casque`,[`ItemMap`,`ItemCompass`,`Itemwatch`],[],[],[`collier_cv`],[],[`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`rds_car_FirstAidKit`,`rds_car_FirstAidKit`,`rds_car_FirstAidKit`,`rds_car_FirstAidKit`,`rds_car_FirstAidKit`,`ACE_surgicalKit`,`ACE_bloodIV`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`],[],[],[],[``,``,``,``],[``,``,``,``],[]]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '5', '0', 0, 1, '\"[13975.5,16347.4,0.00149918]\"', '\"[0,34,1905]\"', '2018-12-27 01:36:19', '2019-02-07 22:22:25', '0667749818', '\"[[`PGA`,`20`],[`MSF`,`25`],[`Dépanneurs`,`30`],[`Antony`,`0646571667`]]\"', 3849, 125978),
(13, 'Nikola Notaras', '\"[`Nicolas`]\"', '76561198838208530', 399076, 76177488, '0', '3', '\"[[`license_civ_driver`,1],[`license_civ_fille`,1],[`license_civ_gangster`,1],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,1],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,1],[`license_civ_transfo_ble`,1],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,1],[`license_civ_transfo_malt`,1],[`license_civ_transfo_charbon`,1],[`license_civ_transfo_rubis`,1],[`license_civ_transfo_saphir`,1],[`license_civ_transfo_emeraude`,1],[`license_civ_identification`,1],[`license_civ_lavage_champignon`,1],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,1],[`license_civ_depanneur`,1],[`license_civ_gouvernement`,1],[`license_civ_plastique`,1],[`license_civ_entreprise_petrole`,1],[`license_civ_pja`,1],[`license_civ_thebeast_pdg`,1],[`license_civ_thebeast`,1],[`license_civ_solomos_petroleum_pdg`,1],[`license_civ_solomos_petroleum`,1]]\"', '\"[]\"', '\"[[`license_med_mAir`,0]]\"', '\"[`EF_suit_Y2`,``,`radio_invi`,``,``,[`ItemMap`,`ItemCompass`,`tf_microdagr`,`tf_fadak_1`,`ItemGPS`,`Binocular`],``,``,[`tf_microdagr`,`tf_microdagr`,`tf_microdagr`,`tf_microdagr`],[`murshun_cigs_lighter`],[`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`item_carte_civil_gravisrp`,`item_permis_gravisrp`,`ACE_Altimeter`,`Bear_RoundGlasses_blk`,`murshun_cigs_cig0`,`murshun_cigs_cig0`,`murshun_cigs_cig0`,`murshun_cigs_cig0`,`ACE_Flashlight_XL50`,`SAN_Headlamp_v2`,`ToolKit`,`Xnooz_AppareilPhoto`],[`murshun_cigs_cigpack`],[],[],[``,``,``,``],[``,``,``,``],[[`apple`,1],[`peach`,1]]]\"', '\"[]\"', '\"[`msf_tenue`,`msf_gilet_3`,`radio_invi`,`TRYK_headset2_glasses`,`msf_casque`,[`ItemMap`,`ItemCompass`,`Itemwatch`],[],[],[`ACE_fieldDressing`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`],[`RH_6Rnd_357_Mag`,`RH_6Rnd_357_Mag`,`RH_6Rnd_357_Mag`],[`ACE_rope36`,`RH_python`],[],[],[],[``,``,``,``],[``,``,``,``],[[`spikeStrip`,2],[`barrier`,1]]]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '5', '0', 0, 1, '\"[15855.8,16901.4,0.00134659]\"', '\"[0,448,8156]\"', '2018-12-27 01:57:13', '2019-02-13 17:28:07', '0668251777', '\"[[`PGA`,`20`],[`MSF`,`25`],[`Dépanneurs`,`30`],[`LUNIK`,`0646571667`],[`MAX`,`0667749818`]]\"', 1648, 53898),
(14, 'Anthony Vasilis', '\"[`John Hollson`]\"', '76561198058130517', 19302, 5123007, '7', '0', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,1],[`license_civ_boat`,0],[`license_civ_pilot`,0],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,1],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,1],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,1],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,0],[`license_civ_depanneur`,0],[`license_civ_gouvernement`,0],[`license_civ_plastique`,1],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,1],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0],[`license_civ_solomos_petroleum_pdg`,0],[`license_civ_solomos_petroleum`,1]]\"', '\"[]\"', '\"[[`license_med_mAir`,0]]\"', '\"[`EF_suit_Y4`,``,`radio_invi`,`G_Spectacles_Tinted`,`V12_CASQUETTE_GUCCI2`,[`ItemMap`,`ItemCompass`,`Itemwatch`,`tf_anprc148jem_6`,`ItemGPS`],``,``,[],[],[`ACE_morphine`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_EarPlugs`,`A3R_ID_CARD`,`A3R_ID_CARD_MEDIC`,`TRYK_Headset_NV`,`ToolKit`,`ACE_morphine`,`R3F_JIM_LR`],[`Laserbatteries`,`Laserbatteries`],[],[],[``,``,``,``],[``,``,``,``],[[`lockpick`,10],[`barrier`,1],[`cone`,3],[`speedcam`,2]]]\"', '\"[]\"', '\"[`msf_tenue_r`,`msf_gilet`,`radio_invi`,`G_Spectacles`,``,[`ItemMap`,`ItemCompass`,`Itemwatch`,`tf_anprc148jem_1`],[],[],[`tf_anprc148jem_1`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_Flashlight_XL50`,`A3R_ID_CARD`,`ACE_bloodIV_500`,`ACE_bloodIV_500`,`ACE_bloodIV_500`,`ACE_bloodIV`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_quikclot`],[],[],[],[],[],[``,``,``,``],[``,``,``,``],[[`defibrillator`,1]]]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '5', '0', 0, 1, '\"[16873.3,12760.5,0.0505257]\"', '\"[0,102,5816]\"', '2018-12-27 10:48:19', '2019-02-08 20:51:38', '0646571667', '\"[[`JEAN`,`0668251777`]]\"', 547, 17914),
(15, 'PierreCharles Sautron', '\"[`Constantin Caps`]\"', '76561197966637574', 584821, 33338904, '0', '5', '\"[[`license_civ_driver`,0],[`license_civ_fille`,0],[`license_civ_gangster`,1],[`license_civ_boat`,0],[`license_civ_pilot`,0],[`license_civ_trucking`,0],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,1],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,1],[`license_civ_rebel`,1],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,1],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,1],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,1],[`license_civ_depanneur`,1],[`license_civ_gouvernement`,0],[`license_civ_plastique`,1],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,0],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0],[`license_civ_solomos_petroleum_pdg`,0],[`license_civ_solomos_petroleum`,0]]\"', '\"[[`license_cop_cAir`,0],[`license_cop_cg`,0]]\"', '\"[[`license_med_mAir`,0]]\"', '\"[`ice123_apo_cloak`,`V_PlateCarrier2_rgr_noflag_F`,`B_Kitbag_cbr`,`G_Bandanna_tan`,`ice123_apo_hood`,[`ItemMap`,`ItemCompass`,`tf_microdagr`,`R3F_JIM_LR_DES`],`hlc_rifle_FAL5061_XMAG`,`CSW_M500`,[`tf_microdagr`],[],[],[],[],[`hlc_10Rnd_762x51_B_fal`,`hlc_10Rnd_762x51_B_fal`,`hlc_10Rnd_762x51_B_fal`,`hlc_10Rnd_762x51_B_fal`,`CSW_5Rnd_127x41_Magnum`],[`hlc_muzzle_300blk_KAC`,``,`hlc_optic_suit`,``],[``,``,`optic_Holosight_blk_F`,``],[[`chaise`,1],[`arrosoir`,2],[`arrosoir`,2]]]\"', '\"[`U_Rangemaster`,`V_Rangemaster_belt`,`B_Carryall_cbr`,`G_Lady_Blue`,`H_Cap_police`,[`ItemMap`,`ItemCompass`,`Itemwatch`,`ItemGPS`],`arifle_MXC_F`,`hgun_P07_snds_F`,[],[`16Rnd_9x21_Mag`,`16Rnd_9x21_Mag`],[`arifle_SDAR_F`],[`20Rnd_556x45_UW_mag`,`30Rnd_65x39_caseless_mag`,`30Rnd_65x39_caseless_mag`],[],[`16Rnd_9x21_Mag`,`16Rnd_9x21_Mag`,`16Rnd_9x21_Mag`,`30Rnd_65x39_caseless_mag`,`16Rnd_9x21_Mag`],[``,``,``,``],[`muzzle_snds_L`,``,``,``],[]]\"', '\"[`msf_tenue_r`,`msf_gilet_5`,`radio_invi`,`NeckTight_GryCLR`,`H_Bandanna_gry`,[`ItemMap`,`ItemCompass`,`Itemwatch`,`tf_anprc148jem_2`,`ItemGPS`,`TRYK_Headset_NV`,`R3F_JIM_LR`],[],[],[`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`item_carte_medic_gravisrp`,`ACE_EarPlugs`,`ACE_EarPlugs`,`ACE_Flashlight_XL50`,`ACE_Flashlight_XL50`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`A3R_ID_CARD`,`ACE_morphine`],[],[`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`avon_SF12`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_EarPlugs`,`ToolKit`],[],[`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`],[],[``,``,``,``],[``,``,``,``],[[`graine_pavot`,2]]]\"', '\"[100,90,0]\"', '\"[90,100,0]\"', '\"[100,100,0]\"', 0, '5', '0', 0, 1, '\"[15828.3,16915.1,0.339777]\"', '\"[20,1015,1805]\"', '2018-12-27 14:42:34', '2019-02-13 17:26:01', '0601216658', '\"[[`fff`,`0668251777`],[`joker`,`0646571667`]]\"', 8250, 269993),
(16, 'Naero Srathen', '\"[`Naero Srathen`]\"', '76561198292718521', 109239912, 5900935, '7', '5', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,1],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,1],[`license_civ_sand`,1],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,1],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,1],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,1],[`license_civ_depanneur`,1],[`license_civ_gouvernement`,1],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,1],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0]]\"', '\"[]\"', '\"[]\"', '\"[`KAEL_SUITS_BR_F13`,`EF_SH_BK`,`radio_invi`,`V12_LUNETTE_BLANCHE`,`Skyline_HeadGear_Cowboy_01_F`,[`ItemMap`,`ItemGPS`],``,`RH_g19`,[`A3R_ID_CARD`,`A3R_ID_CARD_MEDIC`,`A3R_ID_CARD`,`ACE_Altimeter`,`ItemCompass`],[],[`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_EarPlugs`,`ACE_EarPlugs`,`ACE_EarPlugs`,`ACE_EarPlugs`,`ACE_EarPlugs`,`ACE_EarPlugs`,`ACE_EarPlugs`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`item_machete_gravisrp`,`A3R_ID_CARD`,`A3R_ID_CARD_MEDIC`],[],[],[`RH_17Rnd_9x19_g17`],[``,``,``,``],[`RH_gemtech9`,`RH_X300`,``,``],[[`pickaxe`,1],[`defibrillator`,1],[`objet_ancien`,12],[`largeBarrier`,4],[`sandbag`,2],[`sandbagr`,2],[`cone`,4],[`chaise`,3],[`speedcam`,1],[`bipbip`,1]]]\"', '\"[]\"', '\"[]\"', '\"[90,80,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '5', '0', 0, 1, '\"[9828.6,15978.7,0.514183]\"', '\"[0,0,1865]\"', '2018-12-30 22:46:22', '2019-02-03 19:01:45', '0687712525', '\"[[`Maxx`,`0667749818`]]\"', 11000, 359992),
(17, 'Ambrotos Solomos', '\"[`pierrerener de bonevois`]\"', '76561198086525385', 839799, 82468144, '7', '5', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,1],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,1],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,1],[`license_civ_transfo_emeraude`,1],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,1],[`license_civ_depanneur`,1],[`license_civ_gouvernement`,1],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,0],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0],[`license_civ_solomos_petroleum_pdg`,0],[`license_civ_solomos_petroleum`,0]]\"', '\"[]\"', '\"[]\"', '\"[`vvv_traje_mafioso_F_1`,``,`radio_invi`,`V12_LUNETTE_BLEU`,`Chapeau_Xz`,[`ItemMap`,`ItemCompass`,`tf_microdagr`,`tf_anprc148jem_1`,`ItemGPS`],``,`RH_g18`,[],[`RH_17Rnd_9x19_g17`],[`bipod_01_F_mtp`,`muzzle_snds_338_green`],[`10Rnd_300WM_Magazine`,`10Rnd_300WM_Magazine`,`10Rnd_300WM_Magazine`,`10Rnd_300WM_Magazine`,`10Rnd_300WM_Magazine`,`RH_17Rnd_9x19_g17`,`RH_33Rnd_9x19_g18`,`RH_33Rnd_9x19_g18`,`RH_17Rnd_9x19_g17`,`RH_19Rnd_9x19_g18`,`RH_19Rnd_9x19_g18`],[],[],[``,``,``,``],[``,``,``,``],[[`pickaxe`,1],[`largeBarrier`,1],[`bipbip`,1]]]\"', '\"[]\"', '\"[]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '5', '0', 0, 1, '\"[14290.4,18160.8,1.09736]\"', '\"[0,0,1454]\"', '2019-01-03 20:06:07', '2019-02-07 20:30:35', '0', NULL, 0, 0),
(18, 'Vasili Laganakos', '\"[`Ermenegildo Galluccio`]\"', '76561198164580373', 8797619, 929150, '7', '0', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,0],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,0],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,1],[`license_civ_depanneur`,1],[`license_civ_gouvernement`,1],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,1],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0],[`license_civ_solomos_petroleum_pdg`,0],[`license_civ_solomos_petroleum`,0]]\"', '\"[]\"', '\"[]\"', '\"[`tenue_pga`,`pga_gilet_8`,`radio_invi`,`V12_LUNETTE`,`pga_beret_8`,[`ItemMap`,`snb_4xGold`,`tf_anprc148jem_3`,`ItemGPS`,`R3F_JIM_LR`],`arifle_ARX_blk_F`,`Xnooz_AppareilPhoto`,[`item_carte_police_gravisrp`,`item_carte_police_gravisrp`,`item_carte_civil_gravisrp`,`item_carte_civil_gravisrp`,`item_carte_medic_gravisrp`,`item_carte_medic_gravisrp`,`A3R_ID_CARD`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_elasticBandage`,`optic_Hamr`],[],[`ACE_surgicalKit`,`ACE_surgicalKit`],[`RH_10Rnd_22LR_mk2`],[],[`30Rnd_65x39_caseless_green`],[`muzzle_snds_H`,`ACE_acc_pointer_green`,`optic_ERCO_blk_F`,`bipod_03_F_blk`],[``,``,``,``],[[`barrier`,1],[`largeBarrier`,1],[`sandbag`,1],[`cone`,1],[`Alcootest`,1],[`Test_drugs`,1]]]\"', '\"[]\"', '\"[]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '5', '0', 0, 1, '\"[15453.4,15914,0.0013628]\"', '\"[0,0,1150]\"', '2019-01-05 20:06:01', '2019-02-08 17:16:32', '0607460768', '\"[[`PGA`,`20`],[`MSF`,`25`],[`Dépanneurs`,`30`]]\"', 5500, 179986),
(19, 'lakalach jojo', '\"[`Jairo Velasquez`]\"', '76561198148996070', 3273450, 33475, '0', '0', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,0],[`license_civ_boat`,0],[`license_civ_pilot`,0],[`license_civ_trucking`,0],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,0],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,0],[`license_civ_depanneur`,0],[`license_civ_gouvernement`,0],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,0],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0]]\"', '\"[]\"', '\"[]\"', '\"[`TRYK_U_denim_jersey_blk`,``,`V12_BANANE1`,`G_Squares`,`H_Cap_blk`,[`ItemMap`,`ItemCompass`,`Itemwatch`,`ItemGPS`],`hlc_rifle_FN3011`,``,[`item_machete_gravisrp`],[`hlc_10Rnd_762x51_B_fal`],[],[`hlc_10Rnd_762x51_B_fal`,`hlc_10Rnd_762x51_B_fal`,`hlc_10Rnd_762x51_B_fal`,`hlc_10Rnd_762x51_B_fal`],[],[],[``,``,`hlc_optic_LeupoldM3A_3011`,``],[``,``,``,``],[]]\"', '\"[]\"', '\"[]\"', '\"[65,70,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '0', '0', 0, 1, '\"[15769.9,17458.9,0.00141144]\"', '\"[0,0,340]\"', '2019-01-07 20:07:20', '2019-02-05 18:37:44', '0620527841', '\"[]\"', 550, 18000),
(20, 'Lucas Beining', '\"[`Lucas Beining`]\"', '76561198147471550', 19810886, 85293408, '7', '5', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,1],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,0],[`license_civ_agentimo`,0],[`license_civ_depanneur`,0],[`license_civ_gouvernement`,0],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0]]\"', '\"[]\"', '\"[[`license_med_mAir`,0]]\"', '\"[`U_C_Poloshirt_stripped`,``,``,`G_Spectacles`,``,[`ItemMap`,`ItemCompass`,`tf_microdagr`],``,``,[],[],[],[],[],[],[``,``,``,``],[``,``,``,``],[[`redgull`,2],[`waterBottle`,3],[`tbacon`,13]]]\"', '\"[]\"', '\"[`msf_tenue_r`,``,`radio_invi`,`Bear_RoundGlasses_gold`,``,[`ItemMap`,`ItemCompass`,`ACE_Altimeter`,`ItemGPS`,`TRYK_Headset_NV`],[],[],[`item_carte_medic_gravisrp`,`A3R_ID_CARD`,`ACE_epinephrine`,`A3R_ID_CARD`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV`,`ACE_bloodIV_500`,`ACE_bloodIV_500`,`ACE_bloodIV_500`,`ACE_bloodIV_500`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_bloodIV_250`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_epinephrine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_quikclot`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_elasticBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_packingBandage`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`item_carte_medic_gravisrp`,`ACE_fieldDressing`],[`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`],[`ToolKit`],[`RH_7Rnd_50_AE`,`RH_7Rnd_50_AE`],[],[],[``,``,``,``],[``,``,``,``],[[`waterBottle`,3],[`tbacon`,2],[`rabbit`,4]]]\"', '\"[100,90,0]\"', '\"[100,100,0]\"', '\"[100,90,0]\"', 0, '5', '0', 0, 1, '\"[14643,16753.4,0.00143814]\"', '\"[0,177,330]\"', '2019-01-24 18:50:01', '2019-01-27 17:14:41', '0', NULL, 0, 0),
(21, 'Connor Shepperd', '\"[`Connor Shepperd`]\"', '76561198136535680', 2434, 964675, '0', '0', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,0],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,0],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,1],[`license_civ_agentimo`,0],[`license_civ_depanneur`,0],[`license_civ_gouvernement`,0],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,1],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0]]\"', '\"[]\"', '\"[]\"', '\"[`tenue_pga`,`pga_gilet_8`,`radio_invi`,`G_Aviator`,`pga_beret_8`,[`ItemMap`,`ItemCompass`,`Itemwatch`,`tf_anprc148jem_1`,`R3F_JIM_LR`],`arifle_SPAR_03_blk_F`,`DDOPP_X26`,[`A3R_ID_CARD`,`item_carte_police_gravisrp`,`ACE_Flashlight_XL50`,`item_permis_gravisrp`,`item_carte_civil_gravisrp`,`ACE_morphine`,`ACE_morphine`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_CableTie`,`ACE_fieldDressing`],[],[`ToolKit`,`rds_pistol_holster`,`polo_pga`,`pga_beret_2`,`hlc_muzzle_300blk_KAC`,`hgun_Pistol_01_F`,`hlc_pistol_P226US`],[`DDOPP_1Rnd_X26`,`DDOPP_1Rnd_X26`,`DDOPP_1Rnd_X26`,`SmokeShellPurple`,`SmokeShellPurple`,`SmokeShellPurple`,`DDOPP_1Rnd_X26`,`DDOPP_1Rnd_X26`],[],[`20Rnd_762x51_Mag`,`20Rnd_762x51_Mag`,`20Rnd_762x51_Mag`,`20Rnd_762x51_Mag`,`20Rnd_762x51_Mag`,`20Rnd_762x51_Mag`,`hlc_15Rnd_9x19_B_P226`,`hlc_15Rnd_9x19_B_P226`,`hlc_15Rnd_9x19_B_P226`,`20Rnd_762x51_Mag`,`20Rnd_762x51_Mag`,`DDOPP_1Rnd_X26`],[``,`acc_flashlight`,`optic_Hamr`,`bipod_01_F_blk`],[``,``,``,``],[[`spikeStrip`,2],[`redgull`,1],[`waterBottle`,4],[`donuts`,3],[`barrier`,3],[`largeBarrier`,3],[`sandbag`,2],[`sandbagr`,1],[`cone`,4],[`speedcam`,1],[`Alcootest`,1],[`Test_drugs`,1]]]\"', '\"[]\"', '\"[]\"', '\"[70,60,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '0', '0', 0, 1, '\"[13987,18643.4,0.170933]\"', '\"[0,0,294]\"', '2019-02-02 13:50:40', '2019-02-03 17:41:29', '0640689424', '\"[[`PGA`,`20`],[`MSF`,`25`],[`Dépanneurs`,`30`]]\"', 550, 17990),
(22, 'Thibault Verhaegen', '\"[`Thibault Verhaegen`]\"', '76561198204470609', 359300, 9200, '0', '0', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,0],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,1],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,0],[`license_civ_agentimo`,0],[`license_civ_depanneur`,0],[`license_civ_gouvernement`,0],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,0],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0]]\"', '\"[]\"', '\"[]\"', '\"[`tenue_pga`,`pga_gilet_6`,`radio_invi`,`G_Aviator`,`pga_beret_6`,[`ItemMap`,`ItemCompass`,`Itemwatch`,`TRYK_Headset_NV`,`R3F_JIM_LR`],`hlc_rifle_M4_x15`,`hlc_pistol_P226US`,[`A3R_ID_CARD`,`avon_SF12`,`item_carte_police_gravisrp`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_morphine`,`ACE_Flashlight_XL50`,`item_carte_police_gravisrp`,`murshun_cigs_cig3`],[`hlc_50rnd_556x45_EPR`,`hlc_50rnd_556x45_EPR`,`hlc_30rnd_556x45_EPR`,`hlc_30rnd_556x45_EPR`,`murshun_cigs_cigpack`,`murshun_cigs_lighter`,`hlc_15Rnd_9x19_B_P226`,`hlc_15Rnd_9x19_B_P226`,`hlc_15Rnd_9x19_B_P226`,`hlc_15Rnd_9x19_B_P226`,`hlc_15Rnd_9x19_B_P226`,`hlc_15Rnd_9x19_B_P226`,`hlc_50rnd_556x45_EPR`,`hlc_50rnd_556x45_EPR`,`hlc_50rnd_556x45_EPR`],[],[],[],[`hlc_30rnd_556x45_EPR`,`hlc_15Rnd_9x19_B_P226`],[``,`acc_flashlight`,`optic_Hamr`,`bipod_01_F_blk`],[``,``,``,``],[[`spikeStrip`,1],[`waterBottle`,2],[`donuts`,3],[`barrier`,1],[`largeBarrier`,1],[`cone`,1],[`speedcam`,1]]]\"', '\"[]\"', '\"[]\"', '\"[100,90,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '0', '0', 0, 1, '\"[3619.53,13111.5,0.00143051]\"', '\"[0,0,86]\"', '2019-02-04 17:13:51', '2019-02-04 19:32:07', '0687837156', '\"[[`PGA`,`20`],[`MSF`,`25`],[`Dépanneurs`,`30`]]\"', 550, 18000),
(23, 'Oeeee Bien', '\"[`Oeeee Bien`]\"', '76561198043214849', 851100, 10800, '0', '0', '\"[[`license_civ_driver`,1],[`license_civ_fille`,0],[`license_civ_gangster`,0],[`license_civ_boat`,1],[`license_civ_pilot`,1],[`license_civ_trucking`,1],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,1],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,0],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,0],[`license_civ_agentimo`,0],[`license_civ_depanneur`,0],[`license_civ_gouvernement`,0],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,0],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0]]\"', '\"[]\"', '\"[]\"', '\"[`NP_traje_test5`,``,`B_AssaultPack_sgg`,`G_Aviator`,`H_Cap_surfer`,[`ItemMap`,`ItemCompass`,`Itemwatch`],``,``,[`item_carte_civil_gravisrp`,`item_permis_gravisrp`,`Itemwatch`,`ItemMap`,`ACE_morphine`,`ACE_morphine`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_fieldDressing`,`ACE_morphine`,`ACE_fieldDressing`,`ACE_morphine`],[],[],[],[],[],[``,``,``,``],[``,``,``,``],[[`redgull`,5],[`waterBottle`,3],[`apple`,10],[`rabbit`,1]]]\"', '\"[]\"', '\"[]\"', '\"[95,90,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '0', '0', 0, 1, '\"[7481.94,16188,0.00111389]\"', '\"[0,0,121]\"', '2019-02-05 12:39:26', '2019-02-05 14:45:35', '0655879911', '\"[[`PGA`,`20`],[`MSF`,`25`],[`Dépanneurs`,`30`],[`Nikola`,`0668251777`]]\"', 550, 17977),
(24, 'Antonio Vitellio', '\"[`Antonio Vitellio`]\"', '76561197960288686', 500000, 7800, '0', '0', '\"[[`license_civ_driver`,0],[`license_civ_fille`,0],[`license_civ_gangster`,0],[`license_civ_boat`,0],[`license_civ_pilot`,0],[`license_civ_trucking`,0],[`license_civ_gun`,0],[`license_civ_dive`,0],[`license_civ_home`,0],[`license_civ_oil`,0],[`license_civ_diamond`,0],[`license_civ_salt`,0],[`license_civ_sand`,0],[`license_civ_iron`,0],[`license_civ_copper`,0],[`license_civ_cement`,0],[`license_civ_medmarijuana`,0],[`license_civ_cocaine`,0],[`license_civ_heroin`,0],[`license_civ_marijuana`,0],[`license_civ_rebel`,0],[`license_civ_transfo_ble`,0],[`license_civ_transfo_orge`,0],[`license_civ_transfo_mais`,0],[`license_civ_transfo_malt`,0],[`license_civ_transfo_charbon`,0],[`license_civ_transfo_rubis`,0],[`license_civ_transfo_saphir`,0],[`license_civ_transfo_emeraude`,0],[`license_civ_identification`,0],[`license_civ_lavage_champignon`,0],[`license_civ_pga_recrue`,0],[`license_civ_pga_officier`,0],[`license_civ_pga_sergent`,0],[`license_civ_pga_sergentc`,0],[`license_civ_pga_sergentm`,1],[`license_civ_pga_lieutenant`,0],[`license_civ_pga_capitaine`,0],[`license_civ_pga_general`,0],[`license_civ_agentimo`,0],[`license_civ_depanneur`,0],[`license_civ_gouvernement`,0],[`license_civ_plastique`,0],[`license_civ_entreprise_petrole`,0],[`license_civ_pja`,0],[`license_civ_thebeast_pdg`,0],[`license_civ_thebeast`,0],[`license_civ_solomos_petroleum_pdg`,0],[`license_civ_solomos_petroleum`,0]]\"', '\"[]\"', '\"[]\"', '\"[`U_C_Poloshirt_blue`,``,``,``,``,[`ItemMap`,`ItemCompass`,`tf_microdagr`],``,``,[],[],[],[],[],[],[``,``,``,``],[``,``,``,``],[]]\"', '\"[]\"', '\"[]\"', '\"[100,90,0]\"', '\"[100,100,0]\"', '\"[100,100,0]\"', 0, '0', '0', 0, 1, '\"[15208.5,17447,0.0014286]\"', '\"[0,0,22]\"', '2019-02-08 16:59:24', '2019-02-08 17:21:12', '0', '\"[[`PGA`,`20`],[`MSF`,`25`],[`Dépanneurs`,`30`]]\"', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(6) NOT NULL,
  `side` varchar(16) NOT NULL,
  `classname` varchar(64) NOT NULL,
  `type` varchar(16) NOT NULL,
  `pid` varchar(17) NOT NULL,
  `alive` tinyint(1) NOT NULL DEFAULT '1',
  `blacklist` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `plate` int(20) NOT NULL,
  `color` int(20) NOT NULL,
  `inventory` text NOT NULL,
  `gear` text NOT NULL,
  `fuel` double NOT NULL DEFAULT '1',
  `damage` varchar(256) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `immatriculation` text NOT NULL,
  `position` text NOT NULL,
  `fourriere` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `side`, `classname`, `type`, `pid`, `alive`, `blacklist`, `active`, `plate`, `color`, `inventory`, `gear`, `fuel`, `damage`, `insert_time`, `immatriculation`, `position`, `fourriere`) VALUES
(123, 'civ', 'd3s_titan_17', 'Car', '76561198058130517', 1, 0, 0, 583572, 0, '\"[[],0]\"', '\"[]\"', 0.976641, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-19 17:11:42', '\"NQ187OK\"', '\"[]\"', 0),
(124, 'civ', 'd3s_titan_17', 'Car', '76561198058130517', 1, 0, 1, 893132, 0, '\"[[],0]\"', '\"[]\"', 0.697902, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-19 17:12:36', '\"UR572ZO\"', '\"[[15913.1,16945.4,0.537758],338.951]\"', 0),
(125, 'med', 'touareg_msf', 'Car', '76561198838208530', 1, 0, 0, 722847, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-19 19:37:20', '\"DX707FN\"', '\"[]\"', 0),
(126, 'med', 'hellcat_msf', 'Air', '76561198838208530', 1, 0, 0, 155582, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-19 19:37:37', '\"BT535GA\"', '\"[]\"', 0),
(127, 'med', 'mh6m_msf', 'Air', '76561198838208530', 1, 0, 0, 538690, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-19 19:37:59', '\"JD339IE\"', '\"[]\"', 0),
(128, 'med', 'm4_msf', 'Car', '76561198058130517', 1, 0, 0, 962133, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-19 19:43:43', '\"KX315MW\"', '\"[]\"', 0),
(129, 'med', 'mh6m_msf', 'Air', '76561198058130517', 1, 0, 0, 517344, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-19 19:43:47', '\"BP223MC\"', '\"[]\"', 0),
(130, 'med', 'c63_msf', 'Car', '76561198838208530', 1, 0, 0, 583058, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 00:05:24', '\"FX460GQ\"', '\"[]\"', 0),
(133, 'med', 'mh6m_msf', 'Air', '76561198838208530', 1, 0, 0, 404357, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 13:42:13', '\"SS449SL\"', '\"[]\"', 0),
(134, 'med', 'hellcat_msf', 'Air', '76561198838208530', 1, 0, 0, 758137, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 13:43:03', '\"LB960CC\"', '\"[]\"', 0),
(135, 'med', 'vitto_msf', 'Car', '76561198838208530', 1, 0, 0, 239413, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 13:43:15', '\"RO760HH\"', '\"[]\"', 0),
(136, 'med', 'vitto_msf', 'Car', '76561198058130517', 1, 0, 0, 953151, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 13:47:15', '\"KE625BX\"', '\"[]\"', 0),
(137, 'civ', 'Renault_Range_T', 'Car', '76561198838208530', 1, 0, 0, 690995, 8, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 16:49:08', '\"XL639XT\"', '\"[]\"', 0),
(138, 'civ', 'focus3ch_civ', 'Car', '76561198838208530', 1, 0, 0, 776197, 12, '\"[[],0]\"', '\"[]\"', 0.966815, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-20 17:30:12', '\"CL336RJ\"', '\"[]\"', 0),
(139, 'med', 'mh6m_msf', 'Air', '76561197966637574', 1, 0, 0, 175220, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-20 20:25:29', '\"JP033CR\"', '\"[]\"', 0),
(140, 'med', 'hellcat_msf', 'Air', '76561197966637574', 1, 0, 0, 116730, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 20:26:01', '\"BL173KI\"', '\"[]\"', 0),
(141, 'med', 'uaz_msf', 'Car', '76561197966637574', 1, 0, 0, 408074, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 20:26:48', '\"SX324WU\"', '\"[]\"', 0),
(142, 'civ', 'd3s_svr_17_007', 'Car', '76561198838208530', 1, 0, 0, 507718, 5, '\"[[],0]\"', '\"[]\"', 0.999999, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-20 20:32:53', '\"XG217FA\"', '\"[]\"', 0),
(143, 'civ', 'd3s_novus_phantom_18_3', 'Car', '76561198198156979', 1, 0, 0, 519333, 3, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-20 20:36:38', '\"LS291QX\"', '\"[]\"', 0),
(144, 'civ', 'd3s_vv222_18', 'Car', '76561198838208530', 1, 0, 0, 652622, 5, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-20 20:36:54', '\"EC327EJ\"', '\"[]\"', 0),
(145, 'civ', 'd3s_evoque_si4_16', 'Car', '76561198838208530', 1, 0, 0, 795111, 0, '\"[[],0]\"', '\"[]\"', 0.991056, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-20 20:39:28', '\"DM353PC\"', '\"[]\"', 0),
(146, 'civ', 'd3s_novus_phantom_18', 'Car', '76561198198156979', 1, 0, 0, 682679, 0, '\"[[],0]\"', '\"[[[`tf_microdagr`],[1]],[[],[]],[[],[]],[[],[]]]\"', 0.988768, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-20 20:40:27', '\"PT054TF\"', '\"[]\"', 0),
(147, 'med', '206_msf', 'Car', '76561197966637574', 1, 0, 0, 375610, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-21 11:54:37', '\"ZG237IZ\"', '\"[]\"', 0),
(148, 'med', 'golf_msf', 'Car', '76561197966637574', 1, 0, 0, 424675, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-21 11:55:42', '\"TO822DW\"', '\"[]\"', 0),
(149, 'med', 'touareg_msf', 'Car', '76561197966637574', 1, 0, 0, 354144, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-21 11:56:11', '\"EG187OB\"', '\"[]\"', 0),
(150, 'med', 'm4_msf', 'Car', '76561197966637574', 1, 0, 0, 962702, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-21 11:56:34', '\"RY819VQ\"', '\"[]\"', 0),
(151, 'med', 'c63_msf', 'Car', '76561197966637574', 1, 0, 0, 274733, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-21 11:57:14', '\"UW856VK\"', '\"[]\"', 0),
(152, 'civ', 'touareg_pga', 'Car', '76561197966637574', 1, 0, 0, 940929, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-23 15:23:29', '\"MU443II\"', '\"[]\"', 0),
(153, 'civ', 'm4_pga', 'Car', '76561198838208530', 1, 0, 0, 274123, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-23 15:25:19', '\"IW114SJ\"', '\"[]\"', 0),
(154, 'civ', 'd3s_ghost_18_EWB_III', 'Car', '76561198838208530', 1, 0, 1, 960583, 5, '\"[[],0]\"', '\"[]\"', 0.999451, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-24 20:22:19', '\"TY315QX\"', '\"[[15413.2,16100.4,-0.00497246],140.113]\"', 0),
(155, 'civ', 'd3s_gl63amg_12_SE', 'Car', '76561198058130517', 1, 0, 0, 825551, 2, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-24 20:22:46', '\"NK121VA\"', '\"[]\"', 0),
(156, 'civ', 'd3s_model_a', 'Car', '76561198838208530', 1, 0, 0, 492872, 5, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-24 20:26:53', '\"LE773MU\"', '\"[]\"', 0),
(157, 'civ', 'd3s_raptor_SCR_17', 'Car', '76561198058130517', 1, 0, 0, 147918, 9, '\"[[],0]\"', '\"[]\"', 0.970858, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-24 20:27:26', '\"YX901UN\"', '\"[]\"', 0),
(159, 'med', 'mh6m_msf', 'Air', '76561198838208530', 1, 0, 0, 299482, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-24 22:33:29', '\"YS347CS\"', '\"[]\"', 0),
(160, 'med', 'hellcat_msf', 'Air', '76561198838208530', 1, 0, 0, 449149, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-24 22:33:49', '\"EH475GB\"', '\"[]\"', 0),
(161, 'med', 'mh6m_msf', 'Air', '76561198838208530', 1, 0, 0, 298053, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-24 22:47:18', '\"DW555XF\"', '\"[]\"', 0),
(162, 'med', 'c63_msf', 'Car', '76561198147471550', 1, 0, 0, 210260, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-25 16:05:16', '\"PF456KD\"', '\"[]\"', 0),
(163, 'med', 'm4_msf', 'Car', '76561198147471550', 1, 0, 0, 676064, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-25 16:16:05', '\"SN176RG\"', '\"[]\"', 0),
(166, 'med', 'tahoe_msf', 'Car', '76561198838208530', 1, 0, 0, 954470, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 12:27:16', '\"TM743LJ\"', '\"[]\"', 0),
(167, 'med', '635_msf', 'Air', '76561198838208530', 1, 0, 0, 308142, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 12:27:34', '\"GQ167TP\"', '\"[]\"', 0),
(168, 'med', 'mh6m_msf', 'Air', '76561198838208530', 1, 0, 0, 993863, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 12:27:42', '\"BU711JM\"', '\"[]\"', 0),
(169, 'med', '635_msf', 'Air', '76561198838208530', 1, 0, 0, 471951, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 12:27:58', '\"VL122BM\"', '\"[]\"', 0),
(170, 'med', 'mh6m_msf', 'Air', '76561198838208530', 1, 0, 0, 668626, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 12:30:30', '\"GD517MG\"', '\"[]\"', 0),
(171, 'med', 'tahoe_msf', 'Car', '76561198838208530', 1, 0, 0, 723813, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-26 12:30:36', '\"NL035FE\"', '\"[]\"', 0),
(172, 'med', 'durango_msf', 'Car', '76561198838208530', 1, 0, 0, 218707, 0, '\"[[],0]\"', '\"[]\"', 0.999663, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-26 12:31:16', '\"VR748MR\"', '\"[]\"', 0),
(173, 'med', 'range_msf', 'Car', '76561198838208530', 1, 0, 0, 78359, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-26 12:31:45', '\"JX331CC\"', '\"[]\"', 0),
(174, 'med', 'vitto_msf', 'Car', '76561198838208530', 1, 0, 0, 897857, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-26 12:32:26', '\"PK817YU\"', '\"[]\"', 0),
(175, 'med', 'uaz_msf', 'Car', '76561198838208530', 1, 0, 0, 414506, 0, '\"[[],0]\"', '\"[]\"', 0.99659, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-26 12:33:17', '\"AT924HM\"', '\"[]\"', 0),
(176, 'civ', 'V12_RS3_NOIR', 'Car', '76561198147471550', 1, 0, 0, 624869, 11, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 12:58:26', '\"TL776OX\"', '\"[]\"', 0),
(177, 'civ', 'C_Heli_Light_01_civil_F', 'Air', '76561198147471550', 1, 0, 0, 97451, 8, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 13:01:20', '\"GZ167GL\"', '\"[]\"', 0),
(179, 'civ', 'C_Plane_Civil_01_F', 'Air', '76561198147471550', 1, 0, 0, 60049, 5, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 13:31:54', '\"SY990LW\"', '\"[]\"', 0),
(180, 'civ', 'Ducato_civ', 'Car', '76561198198156979', 1, 0, 0, 926984, 1, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-26 15:39:11', '\"YC675PA\"', '\"[]\"', 0),
(181, 'civ', 'Ducato_civ', 'Car', '76561198086525385', 1, 0, 0, 584795, 11, '\"[[],0]\"', '\"[]\"', 1, '\"[1,1,1,1,0,1,0,1,1,1,1,0,0,0,0,0,0,0,0,0.89,1,1,1,1,1,1]\"', '2019-01-26 15:39:17', '\"ZF688YF\"', '\"[]\"', 0),
(183, 'civ', 'C_Scooter_Transport_01_F', 'Ship', '76561198147471550', 1, 0, 0, 284746, 6, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-26 16:40:11', '\"XH369KJ\"', '\"[]\"', 0),
(184, 'civ', 'd3s_continentalGT_18', 'Car', '76561198147471550', 1, 0, 0, 770068, 5, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-26 17:08:55', '\"SS726QR\"', '\"[]\"', 0),
(185, 'med', 'range_msf', 'Car', '76561197966637574', 1, 0, 0, 686945, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-27 12:11:28', '\"QD618MK\"', '\"[]\"', 0),
(186, 'civ', 'd3s_tahoe_UNM', 'Car', '76561198838208530', 1, 0, 0, 660361, 0, '\"[[],0]\"', '\"[]\"', 0.913129, '\"[0.492126,0.015748,0.122047,0.011811,0.011811,0.0629921,0,1,1,0.370079,0.417323,0.153543,0.0393701,0,0,0,0,0,0,0,0.141732,0.177165]\"', '2019-01-27 13:12:19', '\"QT737ER\"', '\"[]\"', 0),
(187, 'civ', 'd3s_svr_17_COP', 'Car', '76561198058130517', 1, 0, 1, 101353, 0, '\"[[],0]\"', '\"[[[`G_Squares_Tinted`,`ItemCompass`,`ACE_Altimeter`],[1,1,1]],[[`RH_7Rnd_50_AE`],[1]],[[],[]],[[],[]]]\"', 0.986895, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-27 13:12:51', '\"BT817FI\"', '\"[[4320.83,16327,-0.025692],235.181]\"', 0),
(188, 'med', 'range_msf', 'Car', '76561198147471550', 1, 0, 0, 372266, 0, '\"[[],0]\"', '\"[]\"', 0.978399, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-27 17:13:09', '\"WD753GA\"', '\"[]\"', 0),
(189, 'civ', 'd3s_urus_18', 'Car', '76561198838208530', 1, 0, 1, 400046, 0, '\"[[],0]\"', '\"[]\"', 0.999998, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-27 19:54:16', '\"SR643KG\"', '\"[[3075,12391.3,-0.0424509],238.382]\"', 0),
(190, 'med', '635_msf', 'Air', '76561197966637574', 1, 0, 0, 243789, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-30 17:30:55', '\"YG840VO\"', '\"[]\"', 0),
(191, 'med', '635_msf', 'Air', '76561197966637574', 1, 0, 0, 897396, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-30 17:33:58', '\"UY303PP\"', '\"[]\"', 0),
(192, 'civ', 'd3s_camaro_zl1_1le_18', 'Car', '76561198198156979', 1, 0, 0, 419157, 3, '\"[[],0]\"', '\"[]\"', 0.804482, '\"[1,0.0551181,1,0.0433071,0.011811,0.228346,0.137795,1,1,0.448819,1,0.366142,0.192913,0,0,0,0,0,0,0,0,0]\"', '2019-01-30 18:58:46', '\"OH316QD\"', '\"[]\"', 0),
(193, 'med', '635_msf', 'Air', '76561197966637574', 1, 0, 0, 442391, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-01-30 18:58:47', '\"UH577FV\"', '\"[]\"', 0),
(194, 'civ', 'chtwingoI_civ', 'Car', '76561198292718521', 1, 0, 0, 847488, 5, '\"[[],0]\"', '\"[]\"', 0.985921, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-30 19:34:56', '\"WH244JV\"', '\"[]\"', 0),
(195, 'civ', 'ClioIch_civ', 'Car', '76561198198156979', 1, 0, 0, 678252, 5, '\"[[],0]\"', '\"[]\"', 0.998405, '\"[0,0,0,0,0,0,0,0,0.0354331,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-30 19:35:16', '\"DS932WV\"', '\"[]\"', 0),
(196, 'civ', 'CarlosM3', 'Car', '76561198292718521', 1, 0, 0, 679391, 7, '\"[[],0]\"', '\"[]\"', 0.992192, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-30 19:35:46', '\"XP487NW\"', '\"[]\"', 0),
(197, 'civ', 'golf_pga', 'Car', '76561198838208530', 1, 0, 0, 41244, 0, '\"[[],0]\"', '\"[]\"', 0.99735, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-30 19:39:14', '\"FZ412IE\"', '\"[]\"', 0),
(198, 'civ', 'rs4_pga', 'Car', '76561198838208530', 1, 0, 0, 427170, 0, '\"[[],0]\"', '\"[]\"', 0.994354, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-30 19:39:56', '\"SS793WC\"', '\"[]\"', 0),
(199, 'civ', 'd3s_raptor_UNM_17', 'Car', '76561198058130517', 1, 0, 1, 819112, 0, '\"[[],0]\"', '\"[]\"', 0.682894, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-01-31 17:46:38', '\"IZ527OM\"', '\"[[15439.9,16050.6,0.00146198],52.5374]\"', 0),
(200, 'civ', 'd3s_gle63amgS_15', 'Car', '76561198148996070', 1, 0, 0, 17548, 5, '\"[[],0]\"', '\"[]\"', 0.998964, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 13:02:48', '\"XV613QT\"', '\"[]\"', 0),
(201, 'civ', 'Alessio206', 'Car', '76561198148996070', 1, 0, 0, 189672, 6, '\"[[],0]\"', '\"[]\"', 0.963387, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 13:16:20', '\"EU138KW\"', '\"[]\"', 0),
(202, 'civ', 'V12_E46_NOIR', 'Car', '76561198148996070', 1, 0, 0, 622067, 3, '\"[[],0]\"', '\"[]\"', 0.912344, '\"[1,1,0,0.011811,0,0.287402,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 13:22:56', '\"NQ875VQ\"', '\"[]\"', 0),
(203, 'med', 'uaz_msf', 'Car', '76561197966637574', 1, 0, 0, 930261, 0, '\"[[],0]\"', '\"[]\"', 0.919547, '\"[1,1,1,1,0.89,0.369196,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0.640453,0.524083]\"', '2019-02-02 13:56:56', '\"FL147UZ\"', '\"[]\"', 0),
(204, 'civ', 'V12_R34M_NOIR', 'Car', '76561198148996070', 1, 0, 0, 901543, 5, '\"[[],0]\"', '\"[]\"', 0.432076, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 13:58:27', '\"WV482IJ\"', '\"[]\"', 0),
(205, 'civ', 'd3s_titan_17_PPV', 'Car', '76561198058130517', 1, 0, 0, 61301, 0, '\"[[],0]\"', '\"[]\"', 0.997681, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 21:40:21', '\"FH504HW\"', '\"[]\"', 0),
(206, 'civ', 'd3s_raptor_UNM_17', 'Car', '76561198058130517', 1, 0, 0, 33540, 0, '\"[[],0]\"', '\"[]\"', 0.997133, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 21:41:07', '\"GE778IY\"', '\"[]\"', 0),
(207, 'civ', 'd3s_tahoe_UNM', 'Car', '76561198058130517', 1, 0, 0, 257040, 0, '\"[[],0]\"', '\"[]\"', 0.997212, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 21:41:32', '\"BB312VG\"', '\"[]\"', 0),
(208, 'civ', 'd3s_ghost_18_EWB_III', 'Car', '76561198058130517', 1, 0, 0, 752745, 5, '\"[[],0]\"', '\"[]\"', 0.871924, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-02 21:59:12', '\"PN456JS\"', '\"[]\"', 0),
(209, 'civ', 'O_Heli_Light_02_unarmed_F', 'Air', '76561198164580373', 1, 0, 0, 40162, 1, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-02-02 22:57:29', '\"II452IA\"', '\"[]\"', 0),
(210, 'civ', 'aventator_pga', 'Car', '76561198136535680', 1, 0, 0, 741508, 0, '\"[[],0]\"', '\"[]\"', 0.879134, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-03 11:03:48', '\"TS323SF\"', '\"[]\"', 0),
(211, 'civ', 'pga_mh6', 'Air', '76561198136535680', 1, 0, 0, 854787, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-02-03 12:30:26', '\"SW552YN\"', '\"[]\"', 0),
(212, 'civ', 'd3s_svr_17_007', 'Car', '76561198838208530', 1, 0, 0, 748265, 0, '\"[[],0]\"', '\"[]\"', 0.947499, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-03 16:32:43', '\"YL736RH\"', '\"[]\"', 0),
(213, 'med', 'vitto_msf', 'Car', '76561198838208530', 1, 0, 0, 565528, 0, '\"[[],0]\"', '\"[]\"', 0.994363, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-03 18:38:08', '\"OF285KS\"', '\"[]\"', 0),
(214, 'civ', 'd3s_savana_VAN', 'Car', '76561198838208530', 1, 0, 0, 59695, 5, '\"[[],0]\"', '\"[]\"', 0.962369, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-05 21:31:24', '\"RU525TA\"', '\"[]\"', 0),
(215, 'civ', 'citerne_thebeast', 'Car', '76561198838208530', 1, 0, 1, 733437, 0, '\"[[],0]\"', '\"[]\"', 0.991723, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-06 17:03:03', '\"JT845PV\"', '\"[[21056.5,14363.1,-0.0304887],16.3221]\"', 0),
(216, 'med', 'tahoe_msf', 'Car', '76561198838208530', 1, 0, 1, 221503, 0, '\"[[],0]\"', '\"[]\"', 0.994431, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 20:44:44', '\"VU158EY\"', '\"[[15227.2,17413.6,-0.0303421],226.986]\"', 0),
(217, 'med', 'durango_msf', 'Car', '76561198838208530', 1, 0, 1, 819708, 0, '\"[[],0]\"', '\"[]\"', 0.997275, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 20:45:20', '\"QL439DU\"', '\"[[15863.8,16941,0.454378],157.535]\"', 0),
(218, 'med', 'vitto_msf', 'Car', '76561198838208530', 1, 0, 1, 964668, 0, '\"[[],0]\"', '\"[]\"', 0.917106, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 20:46:58', '\"CR534PY\"', '\"[[15868.6,16943,0.422889],156.608]\"', 0),
(219, 'med', 'uaz_msf', 'Car', '76561198838208530', 1, 0, 1, 674414, 0, '\"[[],0]\"', '\"[]\"', 0.70157, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 20:47:48', '\"MK756IC\"', '\"[[15224.9,17415.1,-0.00658035],48.5889]\"', 0),
(220, 'med', '635_msf', 'Air', '76561198838208530', 1, 0, 0, 784157, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[]\"', '2019-02-07 20:48:43', '\"TF859TP\"', '\"[]\"', 0),
(221, 'civ', 'golf_pga', 'Car', '76561198058130517', 1, 0, 1, 518019, 0, '\"[[],0]\"', '\"[]\"', 0.998625, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 21:18:24', '\"FG242SG\"', '\"[[15384.9,16058.4,-0.0030756],73.1569]\"', 0),
(222, 'civ', 'rs4_pga', 'Car', '76561198058130517', 1, 0, 0, 252584, 0, '\"[[],0]\"', '\"[]\"', 0.997931, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 21:18:49', '\"XS772BC\"', '\"[]\"', 1),
(223, 'civ', 'm4_pga', 'Car', '76561198058130517', 1, 0, 1, 773586, 0, '\"[[],0]\"', '\"[]\"', 0.997594, '\"[0.125911,0.125911,0.125911,0.125911,0.0157388,0.0157388,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735,0.0196735]\"', '2019-02-07 21:19:07', '\"SW336XK\"', '\"[[15387,16052.7,0.00797367],74.7036]\"', 0),
(224, 'civ', 'wrx_pga', 'Car', '76561198058130517', 0, 0, 1, 721649, 0, '\"[[],0]\"', '\"[]\"', 0.998018, '\"[]\"', '2019-02-07 21:19:22', '\"VZ836KI\"', '\"[[15387.6,16049.5,-0.00114107],76.3974]\"', 0),
(225, 'civ', 'gtr_pga', 'Car', '76561198058130517', 1, 0, 1, 996393, 0, '\"[[],0]\"', '\"[]\"', 0.997985, '\"[0.184511,0.184511,0.184511,0.184511,0.0230639,0.0230639,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299,0.0288299]\"', '2019-02-07 21:19:44', '\"BK368QT\"', '\"[[15388.1,16046.6,0.0124927],69.3878]\"', 0),
(226, 'civ', 'touareg_pga', 'Car', '76561198058130517', 1, 0, 1, 258613, 0, '\"[[],0]\"', '\"[]\"', 0.997643, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 21:20:15', '\"CL870CN\"', '\"[[15388.9,16044.1,-0.00585842],74.9956]\"', 0),
(227, 'civ', 'aventator_pga', 'Car', '76561198058130517', 1, 0, 1, 969207, 0, '\"[[],0]\"', '\"[]\"', 0.463088, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-07 21:20:49', '\"BO896PI\"', '\"[[15390.3,16040.9,0.0585923],75.5563]\"', 0),
(228, 'civ', 'citerne_solomos', 'Car', '76561198838208530', 1, 0, 0, 969859, 0, '\"[[],0]\"', '\"[]\"', 1, '\"[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]\"', '2019-02-09 00:17:55', '\"JE198EK\"', '\"[]\"', 0);

-- --------------------------------------------------------

--
-- Structure de la table `wanted`
--

CREATE TABLE `wanted` (
  `wantedID` varchar(64) NOT NULL,
  `wantedName` varchar(32) NOT NULL,
  `wantedCrimes` text NOT NULL,
  `wantedBounty` int(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `wanted`
--

INSERT INTO `wanted` (`wantedID`, `wantedName`, `wantedCrimes`, `wantedBounty`, `active`, `insert_time`) VALUES
('76561197966637574', 'Pierre-Charles Sautron', '\"[`211`,`187`,`187`,`187`]\"', 6100, 1, '2019-01-06 11:55:18'),
('76561198058130517', 'Anthony Vasilis', '\"[`215`,`487`,`215`,`459`,`459`,`459`,`459`,`459`,`459`,`459`,`459`,`459`,`459`,`459`,`459`]\"', 8350, 1, '2019-01-02 19:40:29'),
('76561198086525385', 'Ambrotos Solomos', '[]', 0, 0, '2019-01-05 20:19:42'),
('76561198164580373', 'Vasili Laganakos', '\"[`187`,`211`,`187V`,`187`]\"', 4750, 1, '2019-01-06 20:57:05'),
('76561198198156979', 'Markellos Solomos', '\"[`187`,`187`,`187`,`187`,`187`,`187V`,`187V`,`187V`,`187V`,`211`,`211`,`187`,`187`]\"', 16800, 1, '2019-01-05 23:49:01'),
('76561198292718521', 'Naero Srathen', '\"[`187V`]\"', 650, 1, '2019-01-06 00:22:56'),
('76561198838208530', 'Nikola Notaras', '[]', 0, 0, '2018-12-30 23:50:40');

-- --------------------------------------------------------

--
-- Structure de la table `whitelist`
--

CREATE TABLE `whitelist` (
  `id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(64) DEFAULT NULL,
  `guid` varchar(64) DEFAULT NULL,
  `uid` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cellphone`
--
ALTER TABLE `cellphone`
  ADD PRIMARY KEY (`pid`);

--
-- Index pour la table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`id`,`pid`);

--
-- Index pour la table `dynmarket`
--
ALTER TABLE `dynmarket`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gangs`
--
ALTER TABLE `gangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Index pour la table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`,`pid`);

--
-- Index pour la table `interpol`
--
ALTER TABLE `interpol`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interpol_crimes`
--
ALTER TABLE `interpol_crimes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plantes`
--
ALTER TABLE `plantes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`),
  ADD KEY `name` (`name`),
  ADD KEY `blacklist` (`blacklist`);

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `side` (`side`),
  ADD KEY `pid` (`pid`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `wanted`
--
ALTER TABLE `wanted`
  ADD PRIMARY KEY (`wantedID`);

--
-- Index pour la table `whitelist`
--
ALTER TABLE `whitelist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `containers`
--
ALTER TABLE `containers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `gangs`
--
ALTER TABLE `gangs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `interpol`
--
ALTER TABLE `interpol`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `interpol_crimes`
--
ALTER TABLE `interpol_crimes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `plantes`
--
ALTER TABLE `plantes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `players`
--
ALTER TABLE `players`
  MODIFY `uid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT pour la table `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
