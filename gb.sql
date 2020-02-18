-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 18 2020 г., 15:29
-- Версия сервера: 5.6.43
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messanges`
--

CREATE TABLE `messanges` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messanges`
--

INSERT INTO `messanges` (`id`, `users_id`, `name_user`, `image_user`, `comment`, `data`) VALUES
(1, 1, 'Юля', 'avatar1.jpg', 'вход1', '10 февраля 2020'),
(50, 3, 'хаккер', 'avatar2.jpg', 'вход4', '13 февраля 2020'),
(51, 2, 'Боря', 'avatar3.jpg', 'Прикольная аватарка Юля!', '13 февраля 2020'),
(54, 17, 'admin', 'no-image.png', 'Привет я ваш администратор!', '14 февраля 2020'),
(55, 46, 'Дима', 'no-image.png', 'Всем привет я Дима!', '17 февраля 2020'),
(56, 1, 'Юля', 'avatar1.jpg', 'Привет Дима.', '17 февраля 2020');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `image`) VALUES
(1, 'Юля', 'avatar1.jpg'),
(2, 'Боря', 'avatar3.jpg'),
(3, 'хаккер', 'avatar2.jpg'),
(4, 'Иван', 'avatar4.jpg'),
(59, 'Дима', 'no-image.png'),
(60, 'admin', 'no-image.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messanges`
--
ALTER TABLE `messanges`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messanges`
--
ALTER TABLE `messanges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
