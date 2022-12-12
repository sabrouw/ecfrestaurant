-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.8.3-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour apiresto
CREATE DATABASE IF NOT EXISTS `heroku_2618e6413fa1c0d` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `heroku_2618e6413fa1c0d`;

-- Listage de la structure de la table apiresto. allergy
CREATE TABLE IF NOT EXISTS `allergy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.allergy : ~4 rows (environ)
/*!40000 ALTER TABLE `allergy` DISABLE KEYS */;
INSERT INTO `allergy` (`id`, `name`, `description`) VALUES
	(1, 'fruit de mer', NULL),
	(2, 'fruit à coque', NULL),
	(3, 'gluten', NULL),
	(4, 'Lactose', 'produit laitier contenant du lactose');
/*!40000 ALTER TABLE `allergy` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.category : ~14 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'Desserts', 'un dessert peut etre une patisserie, une salade de fruit ou une glace faite maison'),
	(2, 'Soupes', 'Les soupes sont faites à base de légume cultivés en France et un bouillon, une soupe peut contenir de la crème fraiche, du fromage, des croutons et peut etre servie froide ou chaude au choix'),
	(3, 'Entrées', 'Une entrée peut etre une salade, un panache de légume avec sauce au choix, une combinaison de fruit de mer'),
	(4, 'Desserts', 'un dessert peut etre une patisserie, une salade de fruit ou une glace faite maison'),
	(5, 'Soupes', 'Les soupes sont faites à base de légume cultivés en France et un bouillon, une soupe peut contenir de la crème fraiche, du fromage, des croutons et peut etre servie froide ou chaude au choix'),
	(6, 'Entrées', 'Une entrée peut etre une salade, un panache de légume avec sauce au choix, une combinaison de fruit de mer'),
	(7, 'Viande', 'Nos viandes sont issues d\'animaux élevés sur le sol francais, selection des meilleurs morceaux afin de satisfaire les papilles, la cuisson peut être au choix'),
	(8, 'Poissons', 'Nos poissons sont frais et sont du jour, sans arrète et cuit de façon courte afin de garder les saveurs d\'origine'),
	(9, 'Desserts', 'un dessert peut etre une patisserie, une salade de fruit ou une glace faite maison'),
	(10, 'Soupes', 'Les soupes sont faites à base de légume cultivés en France et un bouillon, une soupe peut contenir de la crème fraiche, du fromage, des croutons et peut etre servie froide ou chaude au choix'),
	(11, 'Entrées', 'Une entrée peut etre une salade, un panache de légume avec sauce au choix, une combinaison de fruit de mer'),
	(12, 'Viande', 'Nos viandes sont issues d\'animaux élevés sur le sol francais, selection des meilleurs morceaux afin de satisfaire les papilles, la cuisson peut être au choix'),
	(13, 'Poissons', 'Nos poissons sont frais et sont du jour, sans arrète et cuit de façon courte afin de garder les saveurs d\'origine'),
	(14, 'Burger', 'Notre pain burger est fait maison et du jour.Nos burger peuvent etre à base de viande hachée, de poulet ou de steak végétal fait maison à base de tofu mariné, ils contiennent des légumes et sauces au choix dans notre liste maison');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. dish
CREATE TABLE IF NOT EXISTS `dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.dish : ~0 rows (environ)
/*!40000 ALTER TABLE `dish` DISABLE KEYS */;
/*!40000 ALTER TABLE `dish` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table apiresto.doctrine_migration_versions : ~6 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20221206154309', '2022-12-06 16:44:32', 1142),
	('DoctrineMigrations\\Version20221207042322', '2022-12-07 05:23:54', 1706),
	('DoctrineMigrations\\Version20221207042605', '2022-12-07 05:26:23', 556),
	('DoctrineMigrations\\Version20221207042721', '2022-12-07 05:27:29', 492),
	('DoctrineMigrations\\Version20221208052655', '2022-12-08 06:43:46', 1323),
	('DoctrineMigrations\\Version20221209154252', '2022-12-09 16:49:57', 9853);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.menu : ~0 rows (environ)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. messenger_messages
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.messenger_messages : ~0 rows (environ)
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nb_covered` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_42C84955A76ED395` (`user_id`),
  CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.reservation : ~0 rows (environ)
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. restaurant
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.restaurant : ~0 rows (environ)
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;

-- Listage de la structure de la table apiresto. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table apiresto.user : ~2 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
	(1, 'sabrow@hotmail.fr', 'ROLE_ADMIN', '$2y$13$3REnlbkthS4jhUnPYm2P6eDef5S4zpw1vtE/TkXglHlARs7J4KT/O'),
	(5, 'client@hotmail.fr', 'ROLE_USER', 'password');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
