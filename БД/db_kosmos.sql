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

-- --------------------------------------------------------

--
-- Структура таблицы `sinema`
--

CREATE TABLE `sinema` (
  `id` int NOT NULL,
  `Name` text NOT NULL,
  `Country` text NOT NULL,
  `Genre` text NOT NULL,
  `Timing` int NOT NULL,
  `Poster` text NOT NULL,
  `Information` text NOT NULL,
  `Ticket_price` double NOT NULL,
  `Age_imit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_Chair` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sinema`
--

INSERT INTO `sinema` (`id`, `Name`, `Country`, `Genre`, `Timing`, `Poster`, `Information`, `Ticket_price`, `Age_imit`, `id_Chair`) VALUES
(1, 'Ходячий замок', 'Япония', 'Мультфильм', 119, 'image/7d296e679bd0281c7b36545582d17e91.jpg', 'Злая колдунья превращает юную Софи в старушку. Волшебная сказка о силе любви по мотивам книги Дианы Уинн Джонс.', 500, '6+', 0),
(2, 'Лука', 'США', 'Мультфильм', 95, 'image/16453148555_14.jpg', 'Морские монстры в облике простых мальчишек изучают мир людей. Нежная летняя сказка о беззаботном детстве.', 200, '6+', 0),
(3, 'Шкатулка дьявола: Пробуждение зла', 'Великобритания', 'Ужасы', 93, 'image/87bfa47be00bf1e44349ad4acc06fdb51.jpg', 'Умирающая женщина идет на сделку с демоном в обмен на исцеление. Мистический триллер о жертвоприношениях', 200, '18+', 0),
(4, 'Когда она приходит', 'Россия', 'Триллер', 97, 'image/a57e7ce9bcee815c52d751d5ac466cb.jpg', 'Девушка с мистическим даром воплощает мечты клерка-неудачника. Триллер о темных безднах сокровенных желаний', 350, '18+', 0),
(5, 'Круэлла', 'США', 'Комедия', 134, 'image/AQAC4FteiN5_3J-ZgjvrqS5GVW65765564S94fC9-MUzdSWLi4YH5-p1v1JYNthaWeWtsPxo3-LIJzyuOPBZiu73kAWb7l3eJ0.jpg', 'Бунтарка покоряет модный мир Лондона. Предыстория злодейки из «101 далматинца» с «Оскаром» за костюмы.', 350, '12+', 0),
(6, 'Шан-Чи и легенда десяти колец', 'США', 'Фэнтези', 132, 'image/d5ea369ca30a50180c665f874ebc84c5a.jpg', 'Шан-Чи возвращается на родину, чтобы истребить Обитателя Тьмы. Первый фильм Marvel об азиатском супергерое.', 200, '16+', 0),
(7, 'Фантастические твари: Тайны Дамблдора', 'Великобритания', 'Фэнтези', 142, 'image/e5860c3ff6c5656343c78ab871e2f6a5.jpg', 'Добро пожаловать в мир, который населяют не только простые смертные, но и волшебники, обладающие сверхъестественными способностями. Чтобы развить врожденный дар, юные таланты поступают в школу волшебства и магии Хогвартс, которой долгие годы руководит Дамблдор. Именно о профессоре и пойдет речь в продолжении кинофраншизы \"Фантастические твари\", основанной на саге о Гарри Поттере и его друзьях.', 400, '12+', 0),
(8, 'Волк и лев', 'Франция', 'Приключения', 109, 'image/fe5921548828b8a8d14876876846ed57ba682.jpg', 'Хозяйка домика в лесу воспитывает маленьких хищников. Проникновенное семейное кино с завораживающими пейзажами.', 300, '6+', 0);

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
-- Индексы таблицы `datefilm`
--
ALTER TABLE `datefilm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_film` (`id_film`);

--
-- Индексы таблицы `kosmosusers`
--
ALTER TABLE `kosmosusers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sinema`
--
ALTER TABLE `sinema`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tablfilm`
--
ALTER TABLE `tablfilm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT для таблицы `datefilm`
--
ALTER TABLE `datefilm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `kosmosusers`
--
ALTER TABLE `kosmosusers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `sinema`
--
ALTER TABLE `sinema`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tablfilm`
--
ALTER TABLE `tablfilm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `timefilm`
--
ALTER TABLE `timefilm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `datefilm`
--
ALTER TABLE `datefilm`
  ADD CONSTRAINT `datefilm_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `sinema` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tablfilm`
--
ALTER TABLE `tablfilm`
  ADD CONSTRAINT `tablfilm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `kosmosusers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `timefilm`
--
ALTER TABLE `timefilm`
  ADD CONSTRAINT `timefilm_ibfk_1` FOREIGN KEY (`id_date`) REFERENCES `datefilm` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
