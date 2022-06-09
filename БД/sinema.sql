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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sinema`
--
ALTER TABLE `sinema`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sinema`
--
ALTER TABLE `sinema`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
