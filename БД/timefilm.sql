-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2022 г., 10:03
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_kosmos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `timefilm`
--

CREATE TABLE `timefilm` (
  `id` int NOT NULL,
  `id_date` int NOT NULL,
  `time` varchar(5) NOT NULL,
  `ticketsnumber` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `timefilm`
--

INSERT INTO `timefilm` (`id`, `id_date`, `time`, `ticketsnumber`) VALUES
(1, 1, '12:00', 25),
(2, 1, '14:00', 20),
(11, 10, '12:00', 10),
(12, 10, '14:00', 0),
(13, 11, '16:00', 20),
(14, 13, '12:00', 20),
(15, 15, '12:00', 20),
(16, 16, '12:00', 20),
(17, 17, '16:00', 20);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `timefilm`
--
ALTER TABLE `timefilm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_date` (`id_date`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `timefilm`
--
ALTER TABLE `timefilm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `timefilm`
--
ALTER TABLE `timefilm`
  ADD CONSTRAINT `timefilm_ibfk_1` FOREIGN KEY (`id_date`) REFERENCES `datefilm` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
