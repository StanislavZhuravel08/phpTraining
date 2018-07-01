-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 01 2018 г., 23:05
-- Версия сервера: 5.7.22-0ubuntu18.04.1
-- Версия PHP: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dvTraining`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`actor_id`, `first_name`, `last_name`, `dob`) VALUES
(1, 'James', 'Carrey', '1962-01-17'),
(2, 'Daniel', 'Radcliffe', '1989-07-23'),
(3, 'Rupert', 'Grint', '1988-08-24'),
(4, 'Emma', 'Watson', '1990-04-15'),
(5, 'Macaulay', 'Culkin', '1980-08-26'),
(6, 'Daniel', 'Stern', '1957-08-28'),
(7, 'Harrison', 'Ford', '1942-06-13'),
(8, 'Catherine', 'Blanchett', '1969-05-14'),
(9, 'Arnold', 'Schwarzenegger', '1947-07-30'),
(10, 'James', 'Jones', '1931-01-17'),
(11, 'Howard', 'Stern', '1954-01-12'),
(12, 'Cameron', 'Diaz', '1972-08-30'),
(13, 'Mark', 'Sinclair', '1967-06-18'),
(14, 'Jordi', 'Mollà', '1968-06-01'),
(15, 'Aaron', 'Taylor-Johnson', '1990-06-13'),
(16, 'Chloë', 'Moretz', '1997-02-10');

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `film_id` int(11) UNSIGNED NOT NULL,
  `film_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `director` varchar(45) COLLATE utf8_bin NOT NULL,
  `year` year(4) NOT NULL,
  `budget` bigint(20) UNSIGNED NOT NULL,
  `box_office` bigint(20) UNSIGNED NOT NULL,
  `running_time` tinyint(3) UNSIGNED NOT NULL COMMENT 'min',
  `genre` varchar(45) COLLATE utf8_bin NOT NULL,
  `studio_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='this table describes films';

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`film_id`, `film_name`, `director`, `year`, `budget`, `box_office`, `running_time`, `genre`, `studio_id`) VALUES
(1, 'Rubberface (Introducting… Janet)', 'Glen Salzman', 1981, 1000000, 10000000, 48, 'comedy', 1),
(2, 'Copper Mountain', 'David Mitchell', 1983, 1000000, 50000000, 60, 'comedy', 1),
(3, 'Harry Potter and the Philosopher\'s Stone', 'Chris Columbus', 2001, 125000000, 974800000, 152, 'fantasy', 2),
(4, 'Home Alone', 'Chris Columbus', 1990, 18000000, 476700000, 103, 'comedy', 4),
(5, 'Indiana Jones and the Kingdom of the Crystal Skull', 'Steven Spielberg', 2008, 185000000, 786600000, 119, 'action-adventure', 5),
(6, 'Conan the Barbarian', 'Buzz Feitshans', 1982, 16000000, 130000000, 129, 'fantasy', 6),
(7, 'The Mask', 'Charles Russell', 1994, 23000000, 351600000, 101, 'comedy', 7),
(8, 'Riddick', 'David Twohy', 2013, 38000000, 98300000, 119, 'science fiction', 5),
(9, 'Kick-Ass 2', 'Jeff Wadlow', 2013, 28000000, 60700000, 103, 'black comedy', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `actor_id` int(10) UNSIGNED NOT NULL,
  `gonorar` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`payment_id`, `film_id`, `actor_id`, `gonorar`) VALUES
(1, 6, 10, 1000000),
(2, 6, 9, 1200000),
(3, 6, 9, 200000),
(4, 6, 9, 480000),
(5, 2, 1, 800000),
(6, 5, 7, 654000),
(7, 5, 8, 560404),
(8, 4, 6, 6650040),
(9, 1, 1, 6540205),
(10, 1, 1, 440050),
(11, 4, 5, 100000),
(12, 4, 5, 210000),
(13, 2, 1, 100000),
(14, 3, 4, 100000),
(15, 3, 3, 332000),
(16, 2, 1, 32000),
(17, 3, 4, 360000),
(18, 3, 3, 500000),
(19, 3, 2, 1203300),
(20, 3, 2, 900000),
(21, 3, 4, 45242542),
(22, 3, 3, 3323232),
(23, 3, 2, 3242434),
(24, 7, 1, 300000),
(25, 7, 12, 380000),
(26, 7, 1, 450000),
(27, 7, 12, 520000),
(28, 7, 1, 200000),
(29, 7, 12, 250000),
(30, 8, 13, 1500000),
(31, 8, 14, 900000),
(32, 8, 13, 1200000),
(33, 8, 14, 700000),
(34, 8, 13, 200000),
(35, 8, 14, 100000),
(36, 9, 1, 1200000),
(37, 9, 15, 780000),
(38, 9, 16, 900300),
(39, 9, 15, 860000),
(40, 9, 16, 950000);

-- --------------------------------------------------------

--
-- Структура таблицы `studios`
--

CREATE TABLE `studios` (
  `studio_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `foundation_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `studios`
--

INSERT INTO `studios` (`studio_id`, `name`, `foundation_year`) VALUES
(1, 'Rose & Ruby Productions', 1980),
(2, 'Warner Bros Studio, Leavesden, UK', 1940),
(4, 'Paramount Pictures Corporation', 1912),
(5, 'Universal Pictures', 1912),
(6, '20th Century Fox', 1935),
(7, 'Dark Horse Entertainment', 1992);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `dob` (`dob`);

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `studio_id` (`studio_id`),
  ADD KEY `year` (`year`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`,`film_id`,`actor_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Индексы таблицы `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`studio_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `studios`
--
ALTER TABLE `studios`
  MODIFY `studio_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`studio_id`);

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
