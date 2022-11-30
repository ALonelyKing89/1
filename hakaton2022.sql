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

-- Дамп данных таблицы hakaton2022.category: ~2 rows (приблизительно)
DELETE FROM `category`;
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'Problem 1'),
	(2, 'Problem 2');

-- Дамп данных таблицы hakaton2022.photo: ~1 rows (приблизительно)
DELETE FROM `photo`;
INSERT INTO `photo` (`id_photo`, `name`) VALUES
	(1, 'asdfasfh');

-- Дамп данных таблицы hakaton2022.problem: ~1 rows (приблизительно)
DELETE FROM `problem`;
INSERT INTO `problem` (`id_problem`, `name`, `text`, `id_category`, `id_photo`, `status`, `time`, `id_user`) VALUES
	(1, 'asd', 'asd', 2, 1, 'новая', '2022-11-30 13:53:23', 7);

-- Дамп данных таблицы hakaton2022.request: ~1 rows (приблизительно)
DELETE FROM `request`;
INSERT INTO `request` (`id_request`, `name`, `description`, `id_category`, `photo`) VALUES
	(1, 'asfaf', '0asfasf', 1, 1);

-- Дамп данных таблицы hakaton2022.users: ~3 rows (приблизительно)
DELETE FROM `users`;
INSERT INTO `users` (`id_user`, `login`, `password`, `name`) VALUES
	(1, 'admin', 'admin', 'admin'),
	(2, 'ivan', 'zabi', 'Ivan'),
	(7, 'abobi', '123', 'Абобович');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
