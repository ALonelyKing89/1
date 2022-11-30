-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.24 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6376
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных hakaton2022
CREATE DATABASE IF NOT EXISTS `hakaton2022` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hakaton2022`;

-- Дамп структуры для таблица hakaton2022.category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы hakaton2022.category: ~2 rows (приблизительно)
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'Problem 1'),
	(2, 'Problem 2');

-- Дамп структуры для таблица hakaton2022.photo
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы hakaton2022.photo: ~0 rows (приблизительно)
INSERT INTO `photo` (`id_photo`, `name`) VALUES
	(1, 'asdfasfh');

-- Дамп структуры для таблица hakaton2022.problem
CREATE TABLE IF NOT EXISTS `problem` (
  `id_problem` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `id_category` int NOT NULL,
  `id_photo` int NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'новая',
  `time` timestamp NULL DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id_problem`),
  KEY `FK_problem_photo` (`id_photo`),
  KEY `FK_problem_category` (`id_category`),
  KEY `FK_problem_users` (`id_user`),
  CONSTRAINT `FK_problem_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_problem_photo` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_problem_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы hakaton2022.problem: ~0 rows (приблизительно)
INSERT INTO `problem` (`id_problem`, `name`, `text`, `id_category`, `id_photo`, `status`, `time`, `id_user`) VALUES
	(1, 'asd', 'asd', 2, 1, 'новая', '2022-11-30 13:53:23', 7);

-- Дамп структуры для таблица hakaton2022.request
CREATE TABLE IF NOT EXISTS `request` (
  `id_request` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(50) NOT NULL DEFAULT '0',
  `id_category` int NOT NULL DEFAULT '0',
  `photo` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_request`),
  KEY `FK_request_photo` (`photo`),
  CONSTRAINT `FK_request_photo` FOREIGN KEY (`photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы hakaton2022.request: ~0 rows (приблизительно)
INSERT INTO `request` (`id_request`, `name`, `description`, `id_category`, `photo`) VALUES
	(1, 'asfaf', '0asfasf', 1, 1);

-- Дамп структуры для таблица hakaton2022.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы hakaton2022.users: ~3 rows (приблизительно)
INSERT INTO `users` (`id_user`, `login`, `password`, `name`) VALUES
	(1, 'admin', 'admin', 'admin'),
	(2, 'ivan', 'zabi', 'Ivan'),
	(7, 'abobi', '123', 'Абобович');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
