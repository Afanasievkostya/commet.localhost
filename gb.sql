-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 08 2020 г., 17:06
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
(87, 1, 'Юля', 'avatar1.jpg', 'Всем привет я Юля.', '08 марта 2020'),
(88, 1, 'Юля', 'avatar1.jpg', 'Сообщение 1', '08 марта 2020'),
(89, 71, 'Ира', 'no-image.png', 'Привет я Ира.', '08 марта 2020');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `image`) VALUES
(1, '0K7Qu9GP', '$2y$10$uJf4Yzr05nZ7rNWF61VrGeK7SbJqZy8mXscqMv.2drmRj7vWFc/Ra', 'avatar1.jpg'),
(2, '0JHQvtGA0Y8=', '$2y$10$q31E3EmOBEb6ysZq0/8QAebE5fHG2cGEcnMbt/YkhSI1o8kKAPy9e', 'avatar3.jpg'),
(3, '0YXQsNC60LrQtdGA', '$2y$10$fMN8kC8UY.oaJiEpPcgv2.gfIGKdKlKJq0PeDeP4Bs5njjLeHhTca', 'avatar2.jpg'),
(4, '0JjQstCw0L0=', '$2y$10$JOIxwALVZJtnqySG03UTFezHHPrcx/w.mD7KdyYzMhhnKBCS2pD8C', 'avatar4.jpg'),
(59, '0JTQuNC80LA=', '$2y$10$k9XvAWb3kJs5SZc.JR9ZyeLJszdKxNa1u/OAUMR/8zLyfm3.DWlPC', 'no-image.png'),
(66, 'YWRtaW4=', '$2y$10$56xPjatqUSbiS6YjBc9Qc.fMmuXlV0mcHPZ5BhubNPPErbZIR2/ju', 'no-image.png'),
(70, '0KHQsNGI0LA=', '$2y$10$s7L4qI4h0puqBSiVyQPSIuOTcYMVPxHeQEZFs5mNXKLwQ72fPdYQC', 'no-image.png'),
(71, '0JjRgNCw', '$2y$10$fRylyzEs.NMaNxlpIRCDN..jlo7kppJ7nKGd9uSJu9uDD.BJ89Dw6', 'no-image.png');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
