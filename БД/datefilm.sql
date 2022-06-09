-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2022 г., 10:02
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
-- Структура таблицы `datefilm`
--

CREATE TABLE `datefilm` (
  `id` int NOT NULL,
  `id_film` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `datefilm`
--

INSERT INTO `datefilm` (`id`, `id_film`, `date`) VALUES
(1, 1, '2022-06-10'),
(10, 2, '2022-06-10'),
(11, 3, '2022-06-10'),
(13, 4, '2022-06-10'),
(14, 5, '2022-06-10'),
(15, 6, '2022-06-10'),
(16, 7, '2022-06-10'),
(17, 8, '2022-06-10');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `datefilm`
--
ALTER TABLE `datefilm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_film` (`id_film`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `datefilm`
--
ALTER TABLE `datefilm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `datefilm`
--
ALTER TABLE `datefilm`
  ADD CONSTRAINT `datefilm_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `sinema` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
