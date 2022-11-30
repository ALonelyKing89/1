-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 30 2022 г., 22:33
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hakaton2022`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `name_category` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Problem 1'),
(2, 'Problem 2');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id_photo` int NOT NULL,
  `name_photo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id_photo`, `name_photo`) VALUES
(1, 'asdfasfh');

-- --------------------------------------------------------

--
-- Структура таблицы `problem`
--

CREATE TABLE `problem` (
  `id_problem` int NOT NULL,
  `name_problem` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text_problem` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_category` int NOT NULL,
  `id_photo` int NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'новая',
  `time` timestamp NULL DEFAULT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `problem`
--

INSERT INTO `problem` (`id_problem`, `name_problem`, `text_problem`, `id_category`, `id_photo`, `status`, `time`, `id_user`) VALUES
(1, 'asd', 'asd', 2, 1, 'новая', '2022-11-30 13:53:23', 7),
(2, 'какойто калл', 'dada', 1, 1, 'решена', '2022-11-30 19:30:11', 2),
(3, 'фввв', 'фвыфвфв', 2, 1, 'решена', '2022-11-30 19:30:11', 1),
(4, 'какойто калл', 'dada', 1, 1, 'решена', '2022-11-30 19:30:11', 2),
(5, 'фввв', 'фвыфвфв', 2, 1, 'решена', '2022-11-30 19:30:11', 1),
(6, 'вфывф', 'фуцйуйу123', 1, 1, 'новая', '2022-11-30 19:31:42', 1),
(7, '1231', 'ыапкупыцк', 2, 1, 'решена', '2022-11-30 19:31:42', 9),
(8, 'вфывф', 'фуцйуйу123', 1, 1, 'новая', '2022-11-30 19:31:42', 1),
(9, '1231', 'ыапкупыцк', 2, 1, 'решена', '2022-11-30 19:31:42', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name_user` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `name_user`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.ru'),
(2, 'ivan', 'zabi', 'Ivan', 'ivan@ivan.ru'),
(7, 'abobi', '123', 'Абобович', 'abobi@abobi.ru'),
(8, 'opo', 'zabo', 'ivan', 'ivan@ivan.ru'),
(9, 'asdasd', 'asd', 'фывфыв', 'asdas@asdasd.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Индексы таблицы `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id_problem`),
  ADD KEY `FK_problem_photo` (`id_photo`),
  ADD KEY `FK_problem_category` (`id_category`),
  ADD KEY `FK_problem_users` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `problem`
--
ALTER TABLE `problem`
  MODIFY `id_problem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `FK_problem_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_problem_photo` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_problem_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
