-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 13 2018 г., 09:17
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `localhost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `login`, `email`, `password`) VALUES
(1, 'Paul', 'login', 'example@gmail.com', 'password'),
(2, 'name', 'login1', 'email', 'password'),
(3, 'name', 'login12', 'email', 'password'),
(4, 'name', 'loginz', 'example@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Структура таблицы `denominations`
--

CREATE TABLE `denominations` (
  `id` int(64) NOT NULL,
  `appellation` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `denominations`
--

INSERT INTO `denominations` (`id`, `appellation`) VALUES
(1, 'Hoodies');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(64) NOT NULL,
  `appellation` varchar(256) NOT NULL COMMENT 'Название товара',
  `denomination` varchar(64) NOT NULL COMMENT 'К какой категории относиться',
  `category` varchar(64) NOT NULL,
  `img` varchar(64) NOT NULL,
  `price` varchar(8) NOT NULL,
  `ended` int(64) NOT NULL DEFAULT '0' COMMENT 'Если "1", тогда продан'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `appellation`, `denomination`, `category`, `img`, `price`, `ended`) VALUES
(1, 'INSPIRE TRAVEL LEARN T SHIRT - \"THE SKETCH\" [BLACK]', 'hoodies', 'men', 'product.png', '24.40', 0),
(2, 'Road to the Dream V-shape Logo Худи – Бордовый', 'hoodies', 'men', 'product.png', '24.40', 0),
(3, 'INSPIRE BLACK REX', 'hoodies', 'men', 'hoodie.png', '52.40', 0),
(4, 'INSPIRE CUP', 'hoodies', 'men', 'cup.png', '24.40', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `current` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `title`, `current`) VALUES
(1, 'Text', 0),
(2, 'Second post', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `saved`
--

CREATE TABLE `saved` (
  `id` int(64) NOT NULL,
  `client` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `denominations`
--
ALTER TABLE `denominations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `denominations`
--
ALTER TABLE `denominations`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
