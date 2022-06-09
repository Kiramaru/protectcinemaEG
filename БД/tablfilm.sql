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
-- Структура таблицы `tablfilm`
--

CREATE TABLE `tablfilm` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `tickets` int NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tablfilm`
--

INSERT INTO `tablfilm` (`id`, `id_user`, `name`, `date`, `time`, `tickets`, `cost`) VALUES
(2, 6, 'Ходячий замок', '2022-06-10', '12:00', 6000, 12),
(3, 6, 'Лука', '2022-06-10', '12:00', 2000, 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tablfilm`
--
ALTER TABLE `tablfilm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tablfilm`
--
ALTER TABLE `tablfilm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tablfilm`
--
ALTER TABLE `tablfilm`
  ADD CONSTRAINT `tablfilm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `kosmosusers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
