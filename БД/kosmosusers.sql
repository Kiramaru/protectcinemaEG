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
-- Структура таблицы `kosmosusers`
--

CREATE TABLE `kosmosusers` (
  `id` int NOT NULL,
  `email` varchar(61) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cardnum` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `kosmosusers`
--

INSERT INTO `kosmosusers` (`id`, `email`, `password`, `cardnum`) VALUES
(6, 'box1@mail.ru', '$2y$10$2kbOQQy9Lr7m7vztrtzDXOxj1WSvanGOfWUXiRfTZZme77Of6yHH.', 2200893009980400),
(7, 'box2@mail.ru', '$2y$10$OE02QXILSgnwpKfSBkNr/.vd3k./l/BkRQx09YYErsfEuEDDUfFkO', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kosmosusers`
--
ALTER TABLE `kosmosusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kosmosusers`
--
ALTER TABLE `kosmosusers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
