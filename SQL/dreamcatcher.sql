-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 25 2016 г., 12:33
-- Версия сервера: 5.7.13-log
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dreamcatcher`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Photos`
--

CREATE TABLE IF NOT EXISTS `Photos` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `phname` varchar(250) NOT NULL,
  `photo_name` varchar(200) NOT NULL DEFAULT 'no name'
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Photos`
--

INSERT INTO `Photos` (`id`, `userid`, `phname`, `photo_name`) VALUES
(34, 26, 'Marina455381472101694.jpg', 'no name'),
(35, 26, 'Marina260711472101698.jpg', 'no name');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `usr` varchar(32) COLLATE utf8_bin NOT NULL,
  `pas` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `regIP` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `age` int(3) NOT NULL DEFAULT '18',
  `user_name` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `about` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `usr`, `pas`, `email`, `regIP`, `age`, `user_name`, `about`) VALUES
(1, 'igor', '123', 'igor@mail.com', 'NULL', 18, NULL, NULL),
(2, 'der', '123', 'nier@mail.ru', 'NULL', 18, NULL, NULL),
(3, 'res', 'err', 'try123@mail.ru', 'NULL', 18, NULL, NULL),
(4, 'nix', '123', '12asdad3@mail.ru', 'NULL', 18, NULL, NULL),
(23, 'Anton', '123456', '123@list.ru', NULL, 18, 'Антон', 'Ничего не расскажу'),
(24, 'Chrom', '123', '123asdaw@list.ru', NULL, 18, NULL, NULL),
(25, 'nixasdfa111', '123', '123@list.ru', NULL, 18, NULL, NULL),
(26, 'Marina', '123456', 'marina@list.ru', NULL, 18, NULL, NULL),
(27, 'nixasdfa', '123', '123@list.ru', NULL, 18, NULL, NULL),
(28, 'nixasdfagtg5', '123', '123@list.ru', NULL, 18, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Photos`
--
ALTER TABLE `Photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
